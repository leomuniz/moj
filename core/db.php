<?php

namespace LAM\Moj;

use \PDO;

class db {

	public $db;

	public function __construct() {
		try {

			$this->db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USER , DB_PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		} catch (PDOException $e) {

		    if (DEBUG) 
		    	echo 'Connection failed: ' . $e->getMessage();
		    else 
		    	die("Site offline for maintenance");

		}		
	}
}