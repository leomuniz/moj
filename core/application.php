<?php

namespace LAM\Moj;

class Application {

	private $request;
	private $max_params = 3;
	
    public function __construct() {
    	$this->processURL();
		
		if ($this->request[0]) { // loads controller
		
			$controller = $this->request[0];

			if (file_exists("controllers/".$controller.".php")) { // verifies if this controller exists
				require_once "controllers/".$controller.".php";
				$controller = new $controller(); // creates an instance of this controller 
				
				$this->request[1] = !$this->request[1]?"index":$this->request[1]; // index is the default method
				$method = $this->request[1];
				
	            if (method_exists($controller, $method)) {
					for ($i=0; ($i < count($this->request)-2) && ($i < $this->max_params); $i++) $params[$i] = $this->request[2+$i]; // concatenates params inside an Array
	            	$controller->{$method}($params); // calls the method, passing params inside an array
	            } else {
       				if (Config::$debug) 
       					echo "Error: method <strong>".$this->request[1]."</strong> not found inside <strong>".$this->request[0]."</strong> controller.";	
       				else
       					$this->showDefaultPage("page404");
	            }
				
			} else {
				if (Config::$debug) 
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
		require_once "controllers/_default.php";
		$defaultController = new _default();
		$defaultController->{$method}();
	}
	
}


