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

		if (file_exists("views/".$controller."/".$method.".php")) {

			$content = "views/".$controller."/".$method.".php";
			if ($this->template == null) {	$this->template = Config::$defaultTemplate; }
			include "templates/".$this->template.".php";			

		} else {
			if (Config::$debug) 
				echo "View <strong>".$method."</strong> inside <strong>".$controller."</strong> controller not found.<br>File not found: views/".$controller."/".$method.".php<br>";
			else 
				Application::showDefaultPage("page404");
		}

	}
	
	
	protected function dbConnect() {
		try {

			$this->db = new PDO(Config::$dbType.":host=".Config::$dbHost.";dbname=".Config::$dbName.";charset=".Config::$dbCharset, Config::$dbUser , Config::$dbPassword);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		} catch (PDOException $e) {

		    if (Config::$debug) 
		    	echo 'Connection failed: ' . $e->getMessage();
		    else 
		    	die("Site offline for maintenance");

		}	

	}
	
	
	protected function loadModel($modelName = null) {
		if ($modelName == null) {
			$whoCalled = debug_backtrace(); 
			$modelName = $whoCalled[1]["class"]."model";
		}
	
		if (file_exists("models/".strtolower($modelName).'.php')) {

	        require 'models/' . strtolower($modelName) . '.php';

			if ($this->db)
				$model = new $modelName($this->db);
			else
				$model = new $modelName();
	
	        return $model;
	        
	    } else {
			if (Config::$debug) 
				echo "Model <strong>".$modelName."</strong> not found.<br>File not found: models/".$modelName.".php<br>";
			else 
				Application::showDefaultPage("page404");	    
	    
	    }

    }
	
}
