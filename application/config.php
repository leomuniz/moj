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
define("TRANSLATION",true,true); // Turn on multi-language site
define("LANGUAGES","br",true); // addicional site languages
define("CRIPTO_KEY","choose-a-key", true);

// Constants to connect Database
// Fill-in with your own database configuration.
define("DB_TYPE","mysql", true);
define("DB_NAME","your-db-name", true);
define("DB_USER","your-db-user", true);
define("DB_PASSWORD","your-db-password", true);
define("DB_HOST","your-db-host", true);
define("DB_CHARSET","utf8", true);
define("DB_COLLATE","", true);


// Configures index method as the default method if the called method doesn't exist (passing parameters)
// When it is "true" this url: /<controller>/index/<param>/
// will be the same as this url: /<controller>/<param>/ if <param> is not a method name
//
// Important: If it is set to "true" pay attention to not duplicate URL because of SEO reasons
// You can create a 301 redirect on .htaccess or inside controller class; method index;
// You can also use a canonical tag on your head code, just like this: <link rel=”canonical” href=”<your-url>” />
define("AUTO_INDEX_METHOD", true, true);


// Configures _default controller as the default controller if the called controller doesn't exist (passing methods and params)
// When it is "true" this url: /<method>/<param>/
// will be the same as this url: /_default/<method>/<param>/ if <method> is not a controller name
//
// Important: If it is set to "true" pay attention to not duplicate URL because of SEO reasons
// You can create a 301 redirect on .htaccess or inside controller class; method index;
// You can also use a canonical tag on your head code, just like this: <link rel=”canonical” href=”<your-url>” />
define("AUTO_DEFAULT_CONTROLLER", false, true);

// ***********
// !! WARNING: using AUTO_INDEX_METHOD=true and AUTO_DEFAULT_CONTROLLER=true together will cause never happens a 404 page.
// Every request to an unknown page will call index method of _default controller (homepage) with url variables as parameters
// ***********






