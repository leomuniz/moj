<?php

function moj_slugify($text) { 
	// depends on setlocale function
	
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	
	// trim
	$text = trim($text, '-');
	
	// transliterate
	$text = iconv('utf-8', 'ASCII//TRANSLIT', $text);
	
	// lowercase
	$text = strtolower($text);
	
	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);
	
	if (empty($text)) { return 'n-a'; }
	
	return $text;
}


function moj_crypt($str,$key) { 
	$str = strrev($str);
	
	for ($i = 0; $i < strlen($str); $i++) 
		$cript .= chr(ord($key[$i])+ord($str[$i]));
	
	return urlencode(base64_encode($cript)); 
}


function moj_decrypt($str,$key) { 
	$str = base64_decode($str);

	for ($i = 0; $i < strlen($str); $i++) 
		$decript .= chr(ord($str[$i])-ord($key[$i]));
	
	return strrev($decript);
}	



function moj_brazilianDate($date) {
	$date = explode("-", $date);
	return $date[2]."/".$date[1]."/".$date[0];
}



function moj_pagination($foundRows,$pagina = 0,$itensPorPagina = 20, $classe="pagination", $active = "active") {
	
	$ultimaPagina = ceil($foundRows / $itensPorPagina) - 1;
	if ($ultimaPagina == 0) return ""; // se só existir uma página, não exibe a paginação

	$paginaAnterior = ($pagina - 1) < 0 ? 0 : ($pagina - 1);
	$proximaPagina = ($pagina + 1) > $ultimaPagina ? $ultimaPagina : ($pagina + 1);
	
	$variacaoInferior = ($pagina - 2) < 0 ? abs($pagina - 2) : 0;
	$variacaoSuperior = ($pagina + 2) > $ultimaPagina ? ($pagina + 2) - $ultimaPagina : 0;
	
	$firstButton = ($pagina - 2 - $variacaoSuperior) >= 0 ? ($pagina - 2 - $variacaoSuperior) : 0;
	$lastButton = ($pagina + 2 + $variacaoInferior) > $ultimaPagina ? $ultimaPagina : ($pagina + 2 + $variacaoInferior);
	
	$html = '<ul class="'.$classe.'">';
	$html.= '	<li><a href="?p=0">&laquo;</a></li>';
	$html.= '	<li><a href="?p='.$paginaAnterior.'"><</a></li>';
	
	for ($i = $firstButton; $i <= $lastButton; $i++) 
		$html.= '	<li><a '.(($i == $pagina) ? 'class="'.$active.'"' : '') .'href="?p='.$i.'">'.($i+1).'</a></li>';

	$html.= '	<li><a href="?p='.$proximaPagina.'">></a></li>';		
	$html.= '	<li><a href="?p='.$ultimaPagina.'">&raquo;</a></li>';
	$html.= '</ul>';
	
	return $html;
}


// functions to translate strings 
// echo found translate
function __($stringIndex, $substitutions = "") {
	global $translation;
	
	echo $translation[$stringIndex];
}

// return found translate
function _t($stringIndex, $substitutions = "") {
	global $translation;
	
	return $translation[$stringIndex];
}