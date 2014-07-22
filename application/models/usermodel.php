<?php

class UserModel extends LAM\moj\Model {

	public function __construct() {

		// Commom model's function to establish a database connection
		$this->dbConnect();

		if ($this->db) { // $this->db = PDO Object
			echo "Database connection established";
		} else {
			echo "Database connection error";		
		}
	}
	
	public function getAllUsers() {
		$query = "select * from usuarios limit 0,10";
        $query = $this->db->prepare($query);
        $query->execute();
		return $query->fetchAll();	
	}
	
}