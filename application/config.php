<?php

// SETS LOCALE INFORMATION
setlocale(LC_CTYPE, 'pt_BR');

// COMMON HEADER
header ('Content-type: text/html; charset=UTF-8'); 


// WEBSITE CONSTANTS
// note: $_SERVER["SERVER_NAME"] returns default root (www.phpboilerplate.com)
define("PROTOCOL","http://", true);
define("SITE_DIRECTORY","/moj", true);
define("DEBUG", true, true);
define("DEFAULT_TEMPLATE","_default", true);
define("CRIPTO_KEY","choose-a-key", true);


// Configures index method on URLs (passing parameters)
// When it is "false" this url: /<controller>/index/<param>/
// will be the same as this url: /<controller>/<param>/ if <param> is not a method name
//
// Important: If it is set to "false" pay attention to not duplicate URL because of SEO reasons
// You can create a 301 redirect on .htaccess or inside controller->index() method
// You can also use a canonical tag on your head code, just like this: <link rel=”canonical” href=”<your-url>” />
define("INDEX_METHOD", false, true);


// Constants to connect Database
// Fill-in with your own database configuration.
define("DB_TYPE","mysql", true);
define("DB_NAME","your-db-name", true);
define("DB_USER","your-db-user", true);
define("DB_PASSWORD","your-db-password", true);
define("DB_HOST","your-db-host", true);
define("DB_CHARSET","utf8", true);
define("DB_COLLATE","", true);



