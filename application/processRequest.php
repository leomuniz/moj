<?php
setlocale(LC_CTYPE, 'pt_BR');
header ('Content-type: text/html; charset=UTF-8'); 

require_once "config.php";
require_once "functions.php";

require_once "../core/autoloader.php";

session_start();
$app = new LAM\Moj\Application();
