<?php

namespace LAM\Moj;

class Controller {
	
	public $template = null;
	public $variables = [];
	
	function __construct() { } 
	
	protected function renderView($view = null) { // renders the view
		
		foreach ($this->variables as $key => $value) { $$key = $value; } // creates variables to use in the view
	
		// discover which method of which controller called the function
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
	
}
