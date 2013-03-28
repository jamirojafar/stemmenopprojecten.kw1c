<?php
	// Functions bestand. Verzameling van functies die meerdere malen worden gebruikt over de website
	// Include dit bestand op elke pagina met "require_once('assets/php/functions.php');"
	
	
	// 24/03 We includen het MySQL functiebestand hier
	
	require_once('/assets/php/mysql.php');
	
	function allowVoting(){
		return true;
	}
	
	function get_header(){
		require_once('/assets/elements/header.php');	
	}
	
	function get_footer(){
		require_once('/assets/elements/footer.php');	
	}
	
	function renderItem($item){
		echo "<div class=\"span4 item\">";
		echo "<img src=\"assets/images/".$item["afbeelding_bestandsnaam"]."\" />";
		echo "<div class=\"stembalk\">";
		echo "<p class='name'>".$item["naam"]."</p>";
		if(!allowVoting()){
			echo "<div class=\"stembox closed\" ></div>";
		} else {
			echo "<div class=\"stembox\" onclick=\"openVoteBox(this,'".$item['id']."','".$item['categorie']."')\"></div>";
		}
		echo "</div>";
		echo "</div>";
	}
?>