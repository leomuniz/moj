<?php

namespace LAM\Moj;

class Application {

	private $request;
	private $language = "";
	private $max_params = 3;
	
    public function __construct() {
    	$this->processURL();
		
		if ((stripos(LANGUAGES,$this->request[0]) !== false) && (TRANSLATION)) $this->language = array_shift($this->request);
		
		if ($this->request[0]) { // loads controller
		
			$controller = $this->request[0];

			if (!class_exists($controller) && (AUTO_DEFAULT_CONTROLLER)) { $controller = "LAM\Moj\_default"; } 

			if (class_exists($controller)) {
				$controller = new $controller(); // creates an instance of this controller 
				
				//$this->request[1] = !$this->request[1]?"index":$this->request[1]; // index is the default method
				//$method = $this->request[1];
				$method = (get_class($controller)=="LAM\Moj\_default")?$this->request[0]:((!$this->request[1])?"index":$this->request[1]);
				$method = str_replace("-","_",$method); // replaces hifen on url by underline
				$method = ( (!method_exists($controller, $method)) && (AUTO_INDEX_METHOD) ) ? "index" : $method;
				
	            if (method_exists($controller, $method)) {
	            	$firstParam = ($method == "index") && ($this->request[1] != "index") ? 1 : 2;
					for ($i = $firstParam; ($i < count($this->request)) && (($i - $firstParam) < $this->max_params); $i++) $params[$i - $firstParam] = $this->request[$i]; // concatenates params inside an Array

	            	if ((TRANSLATION) && (!$controller->disableTranslation)) {
						$classname = explode("\\",get_class($controller)); // ignore namespace
						$classname = strtolower(end($classname)); 
	            		$this->loadLanguage($classname, $method);
	            	}
	            	
	            	$controller->{$method}($params); // calls the method, passing params inside an array
	            } else {
       				if (DEBUG) 
       					echo "Error: method <strong>".$method."</strong> not found inside <strong>".$this->request[0]."</strong> controller.";	
       				else
       					$this->showDefaultPage("page404");
	            }
				
			} else {
				if (DEBUG) 
					echo "Error: controller <strong>".$this->request[0]."</strong> not found";
   				else
   					$this->showDefaultPage("page404");
			}

		} else { // if there is no controller, shows homepage (index.php) = index method inside default controller
			$this->showDefaultPage("index");
		}
		
    }

	
	private function processURL() {

	    $url = rtrim($_GET['url'], '/');
	    $url = filter_var($url, FILTER_SANITIZE_URL);
	    $url = filter_var($url, FILTER_SANITIZE_MAGIC_QUOTES);
	    $url = filter_var($url, FILTER_SANITIZE_SPECIAL_CHARS); // avoid cross-site scripting (xss)
	    $url = explode('/', $url);
	    
	   	//print_r($url);
		$this->request = $url;
	}
	
	
	public function showDefaultPage($method) {
		$defaultController = new _default();
		if (TRANSLATION) $this->loadLanguage("_default",$method);
		$defaultController->{$method}();
	}
	

	
	private function loadLanguage ($controller = "_default",$method = "index") {
		global $translation;
		if ($this->language == "") $this->language = "default_language";
		
		// Insert commom translation file to all controllers
		if (file_exists("translation/".$this->language."/commom.php"))
			include  "translation/".$this->language."/commom.php";
		else if (DEBUG) 
			trigger_error("Translation file (application/translation/".$this->language."/commom.php) not found.",E_USER_WARNING);

		
		// Insert translation file specific to controller (available to all methods)
		if (file_exists("translation/".$this->language."/".$controller."/commom.php"))
			include  "translation/".$this->language."/".$controller."/commom.php";
		else if (DEBUG) 
			trigger_error("Translation file (application/translation/".$this->language."/".$controller."/commom.php) not found.",E_USER_WARNING);


		// Insert translation file specific to method
		if (file_exists("translation/".$this->language."/".$controller."/".$method.".php"))
			include  "translation/".$this->language."/".$controller."/".$method.".php";
		else if (DEBUG) 
			trigger_error("Translation file (application/translation/".$this->language."/".$controller."/".$method.".php) not found.",E_USER_WARNING);

	}
	
}


