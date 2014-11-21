<!DOCTYPE html>
<html lang="pt-br" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
	    <meta name="author" content="Léo Muniz">
	    
		<link rel="shortcut icon" href="<?=SITE_DIRECTORY?>/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?=SITE_DIRECTORY?>/favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?=SITE_DIRECTORY?>/static/css/normalize.min.css">
        <link rel="stylesheet" href="<?=SITE_DIRECTORY?>/static/css/main.css">
        <?
			// Inserts commom css file to all methods of a controller (inside /css/ folder)
			// For homepage => Controller: _default; CSS File: /static/css/_default/commom.js
			// For other css => CSS File: /static/css/<controller>/commom.js

			$cssFile = SITE_DIRECTORY."/static/css/".$controller."/commom.css";
			if (is_file($_SERVER["DOCUMENT_ROOT"].$cssFile)) echo '<link rel="stylesheet" href="'.$cssFile.'">';


			// Inserts css file with Method name inside Controller folder (inside /css/ folder)
			// For homepage => Controller: _default; Method: index; CSS File: /static/css/_default/index.js
			// For other css => CSS File: /static/css/<controller>/<method>.js

			$cssFile = SITE_DIRECTORY."/static/css/".$controller."/".$method.".css";
			if (is_file($_SERVER["DOCUMENT_ROOT"].$cssFile)) echo '<link rel="stylesheet" href="'.$cssFile.'">';
			
			
			// Inserts specific css files defined by $this->variables["cssFiles"] array
			for ($i = 0; $i < count($cssFiles); $i++) {  
				$cssFile = SITE_DIRECTORY."/static/css/".$cssFiles[0];
				if (is_file($_SERVER["DOCUMENT_ROOT"].$cssFile)) echo '<link rel="stylesheet" href="'.$cssFile.'">';
			} 			
		?>  

        <!--script src="<?=SITE_DIRECTORY?>/static/js/vendor/modernizr-2.6.2.min.js"></script-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->