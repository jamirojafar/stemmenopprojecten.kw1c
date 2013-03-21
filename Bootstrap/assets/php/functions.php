<?php
	// Functions bestand. Verzameling van functies die meerdere malen worden gebruikt over de website
	// Include dit bestand op elke pagina met "require_once('assets/php/functions.php');"
	
	function allowVoting(){
		return false;
	}
	
	function get_header(){
		require_once('/assets/elements/header.php');	
	}
	
	function get_footer(){
		require_once('/assets/elements/footer.php');	
	}
?>