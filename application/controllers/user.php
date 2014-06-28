<?php

class User extends LAM\moj\Controller {
	
	
	public function index($params) {
		echo "Paramêtros recebidos: ";
		print_r($params);
	}
	
	public function add() {
		$this->variables["variable"] = "Testing variable declaration"; // this variable will be available to use in the view as $variable
		$this->template = "loggedUser"; // using templates/loggedUser.php as template to renders this view
		$this->renderView("addUser"); // changing the default view for this method (add) to another one: addUser
	}
	
	
}