<?php

class User extends LAM\moj\Controller {
	
	
	public function index($params) {
		echo "Paramêtros recebidos: ";
		print_r($params);
	}
	
	public function add() {
		$this->variables["variable"] = "Testing variable declaration"; // this variable will be available to use in the view as $teste

		$this->template = "loggedUser";
		$this->renderView("addUser");
	}
	
	
}