        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=SITE_DIRECTORY?>/static/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="<?=SITE_DIRECTORY?>/static/js/main.js"></script>
        
       	<?
       		// Inserts common javascript file to all methods of a controller
			// For homepage => Controller: _default; Javascript File: /static/js/_default/commom.js
			// For other js => Javascript File: /static/js/<controller>/commom.js
			$javascriptFile = SITE_DIRECTORY."/static/js/".$controller."/commom.js";
			if (is_file($_SERVER["DOCUMENT_ROOT"].$javascriptFile)) echo '<script src="'.$javascriptFile.'"></script>';
	   		

			// Inserts javascript file with Method name inside Controller folder (inside /js/ folder)
			// For homepage => Controller: _default; Method: index; Javascript File: /static/js/_default/index.js
			// For other js => Javascript File: /static/js/<controller>/<method>.js
			$javascriptFile = SITE_DIRECTORY."/static/js/".$controller."/".$method.".js";
			if (is_file($_SERVER["DOCUMENT_ROOT"].$javascriptFile)) echo '<script src="'.$javascriptFile.'"></script>';

			
			// Inserts specific javascript files defined by $this->variables["jsFiles"] array
			for ($i = 0; $i < count($jsFiles); $i++) {  
				$javascriptFile = SITE_DIRECTORY."/static/js/".$jsFiles[0];
				if (is_file($_SERVER["DOCUMENT_ROOT"].$javascriptFile)) echo '<script src="'.$javascriptFile.'"></script>';
			} 
		?>

		<? include "elements/google-analytics.php" ?>
    </body>
</html>