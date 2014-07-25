<?php

namespace LAM\Moj;

use \PDO;

class Controller {
	
	public $template = null;
	public $variables = [];
	public $db = null;
	
	function __construct() { } 
	
	protected function renderView($view = null) { // renders the view
		
		foreach ($this->variables as $key => $value) { $$key = $value; } // creates variables to use in the view
	
		// discovers which method of which controller called the function
		$whoCalled = debug_backtrace(); 
		
		$controller = $whoCalled[1]["class"];
		$controller = explode("\\",$controller);
		$controller = strtolower($controller[count($controller)-1]);
		
		$method = $view == null?$whoCalled[1]["function"]:$view;
		$method = str_replace("_","-",$method); // replaces underline on url by hifen
		
		if (file_exists("views/".$controller."/".$method.".php")) {

			$content = "views/".$controller."/".$method.".php";
			if ($this->template == null) {	$this->template = DEFAULT_TEMPLATE; }
			include "templates/".$this->template.".php";			

		} else {
			if (DEBUG) 
				echo "View <strong>".$method."</strong> inside <strong>".$controller."</strong> controller not found.<br>File not found: views/".$controller."/".$method.".php<br>";
			else 
				Application::showDefaultPage("page404");
		}

	}
	
	
	protected function dbConnect() {
		$connection = new db();
		$this->db = $connection->db;
	}
	
	
	protected function loadModel($modelName = null, $param = null) {
		if ($modelName == null) {
			$whoCalled = debug_backtrace(); 
			$modelName = $whoCalled[1]["class"];
		}
	        
	    if (class_exists($modelName)) {

			if ($param)
				$model = new $modelName($param);
			else 
				$model = new $modelName();
				
	        return $model;
	        
	    } else {
			if (DEBUG) 
				echo "Model <strong>".$modelName."</strong> not found.<br>File not found: models/".$modelName.".php<br>";
			else 
				Application::showDefaultPage("page404");	    
	    
	    }

    }
	
}
