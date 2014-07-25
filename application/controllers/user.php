<?php

class User extends LAM\moj\Controller {
	
	
	public function index() {
		
		// Commom controller's function to establish a database connection
		$this->dbConnect(); 
		

		// You can call SQL queries directly from the controller, just like this (using $this->db object)
		// But it is not recommended because, on large projects, 
		// you will probably repeat yourself using the same queries on different places
		$query = "select * from usuarios limit 0,10";
        $query = $this->db->prepare($query);
        $query->execute();
		$this->variables["usersWithoutModel"] = $query->fetchAll();


		// Or you can create model files to make your code nicer and call it just like the code above		
		// To load the model with the same name of this controller, just call $this->loadModel()
		// To load a different model you should specify as argument: $this->loadModel("movies");
		// Recommend: name the models with "model" suffix: usermodel.php. That way it will be easier when many files are open simultaneously		
		$userModel = $this->loadModel("usermodel"); 
		$this->variables["usersModel"] = $userModel->getAllUsers(); // the variable $usersModel will be available to use in the view
		
		$this->renderView(); // renders the view with the default template defined ate config.php
	}
	
	public function add($params) {
		print_r($params);
		
		$this->variables["variable"] = "Testing variable declaration"; // this variable will be available to use in the view as $variable
		$this->template = "loggedUser"; // defines templates/loggedUser.php as template to renders this view
		$this->renderView("addUser"); // changing this method (add) default's view by another one: addUser ==> views/user/addUser.php
	}
	
	
}