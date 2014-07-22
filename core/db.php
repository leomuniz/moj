<?php

namespace LAM\Moj;

use \PDO;

class db {

	public $db;

	public function __construct() {
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
}