<?php

namespace LAM\Moj;

class _default extends Controller {

	public function index() { // home - index.php

		$this->renderView(); // renders views/_default/index.php using the default template defined on config.php
	}
	
	public function page404() {
		echo "404 - page not found";
	}
	
}