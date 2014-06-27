<?php
	
header ('Content-type: text/html; charset=UTF-8'); 
	
require_once "config.php";
require_once "../core/application.php";
require_once "../core/controller.php";

use LAM\Moj as moj;

$app = new moj\Application();
