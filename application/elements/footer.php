        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=LAM\Moj\Config::$siteDirectory?>/static/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="<?=LAM\Moj\Config::$siteDirectory?>/static/js/main.js"></script>
        
       	<?
			// Inserts javascript file with Method name inside Controller folder (inside /js/ folder)
			// For homepage => Controller: _default; Method: index; Javascript File: /static/js/_default/index.js
			// For other js => Javascript File: /static/js/<controller>/<method>.js

			$javascriptFile = LAM\Moj\Config::$siteDirectory."/static/js/".$controller."/".$method.".js";
			if (is_file($_SERVER["SITE_HTMLROOT"].$javascriptFile)) echo '<script src="'.$javascriptFile.'"></script>';
			
		?> 


<? include "elements/google-analytics.php" ?>
    </body>
</html>