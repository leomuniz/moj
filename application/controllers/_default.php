<?php

namespace LAM\Moj;

class _default extends Controller {

	public function index() { // home - index.php

		// Inserts specific Javascript and CSS files to this method
		array_push($this->variables["jsFiles"], "widget.js");
		array_push($this->variables["cssFiles"], "widget.css");

		// renders views/_default/index.php using the default template defined on config.php
		$this->renderView(); 
	}
	
	public function page404() {
		echo "404 - page not found";
	}
	
}