<?php

namespace LAM\Moj;

class Config {

	// $_SERVER["SERVER_NAME"] returns default root (www.leomuniz.com.br)

	static $siteRoot = "www.leomuniz.com.br";
	static $siteDirectory = "/moj"; // fill-in if MOJ is installed in a subdirectory (without add slash at the end)
	static $debug = true; // evolution-point: define debug mode according the environment
	static $defaultTemplate = "_default";

}