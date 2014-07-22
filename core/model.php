<?php

namespace LAM\Moj;

class Model {

	// There is practically no use for this parent model class yet. 
	// But probably in the future some implementations should be commom to all models declared :)

	public $db;

	public function __construct() { }
	
	public function dbConnect() {
		$connection = new db();
		$this->db = $connection->db;
	}
}