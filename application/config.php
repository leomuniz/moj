<?php

namespace LAM\Moj;

class Config {

	// $_SERVER["SERVER_NAME"] returns default root (www.leomuniz.com.br)

	static $siteDirectory = "/moj"; // fill-in if MOJ is installed in a subdirectory (without slash at the end)
	static $debug = true; // evolution-point: define debug mode according the environment
	static $defaultTemplate = "_default";
	

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