<?php

namespace LAM\Moj;

class autoloader {
	
	// Classes autoloader functions. 
	// All classes will always be loaded from /application/ folder 
	// Because every request is processed at /application/processRequest.php file
	
	static public function coreClasses ($classname) {
		$classname = autoloader::ignoreNamespace($classname);
		if (file_exists("../core/".$classname.".php")) require_once("../core/".$classname.".php");
	}
	
	
	static public function controllers ($classname) {
		$classname = autoloader::ignoreNamespace($classname);
		if (file_exists("controllers/".$classname.".php")) require_once ("controllers/".$classname.".php");
	}
	
	
	static public function models ($classname) {
		$classname = autoloader::ignoreNamespace($classname);
		if (file_exists("models/".$classname.".php")) require_once("models/".$classname.".php");
	}	
	
	
	static public function modules ($classname) {
		$classname = autoloader::ignoreNamespace($classname);
		if (file_exists("modules/".$classname.".php")) require_once("modules/".$classname.".php");
	}	
	
	
	private static function ignoreNamespace ($classname) {
		$classname = explode("\\",$classname);
		return strtolower(end($classname));
	}

}

// Registering autoload functions
spl_autoload_register("LAM\Moj\autoloader::coreClasses");
spl_autoload_register("LAM\Moj\autoloader::controllers");
spl_autoload_register("LAM\Moj\autoloader::models");
spl_autoload_register("LAM\Moj\autoloader::modules");


