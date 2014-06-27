<?php

class User extends LAM\moj\Controller {
	
	
	public function index($params) {
		echo "Paramêtros recebidos: ";
		print_r($params);
	}
	
	public function add() {
		$this->template = "loggedUser";
		$this->renderView("addUser");
	}
	
	
}