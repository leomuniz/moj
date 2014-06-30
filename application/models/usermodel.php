<?php

class UserModel extends LAM\moj\Model {

	public function __construct($db) {
		parent::__construct($db); // necessary call to execute the parent's constructor function (class Model)

		if ($this->db) { // $this->db = PDO Object
			echo "Database connection established";
		} else {
			echo "Database connection error";		
		}
	}
	
	public function getAllUsers() {
		$query = "select * from users limit 0,10";
        $query = $this->db->prepare($query);
        $query->execute();
		return $query->fetchAll();	
	}
	
}