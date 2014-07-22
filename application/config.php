<?php

namespace LAM\Moj;

class Config {

	// $_SERVER["SERVER_NAME"] returns default root (www.leomuniz.com.br)

	static $protocol = "http://";
	static $siteDirectory = "/moj"; // fill-in if MOJ is installed in a subdirectory (without slash at the end)
	static $debug = true; // evolution-point: define debug mode according the environment
	static $defaultTemplate = "_default";
	static $criptoKey = 'choose-a-key'; // Chave gerada para funções de criptografia
	

	// Configures index method on URLs (passing parameters)
	// When it is "false" this url: /<controller>/index/<param>/
	// will be the same as this url: /<controller>/<param>/ if <param> is not a method name
	//
	// Important: If it is set to "false" pay attention to not duplicate URL because of SEO reasons
	// You can create a 301 redirect on .htaccess or inside controller->index() method
	// You can also use a canonical tag on your head code, just like this: <link rel=”canonical” href=”<your-url>” />
	static $indexMethod = false; 	
	

	// Variables to connect Database
	// Fill-in with your own database configuration.
	static $dbType = "mysql";
	static $dbName = "your-database-name";
	static $dbUser = "your-database-user";
	static $dbPassword = "your-database-password";
	static $dbHost = "your-database-host";
	static $dbCharset = "utf8";
	static $dbCollate = "";

}