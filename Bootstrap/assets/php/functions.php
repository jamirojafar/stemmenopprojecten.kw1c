<?php
	// Functions bestand. Verzameling van functies die meerdere malen worden gebruikt over de website
	// Include dit bestand op elke pagina met "require_once('assets/php/functions.php');"
	
	
	// 24/03 We includen het MySQL functiebestand hier
	
	require_once('mysql.php');
	// Deze functie zorgt geeft een true of false afhankelijk of de gebruiker nog mag stemmen in de categorie.
	// @param1 Deze parameter is niet verplicht mee te geven, maar hiermee kan worden gekeken of de gebruiker nog mag stemmen op een individuele categorie pagina
	// @returns true of false
	function allowVoting($cat = null){	
		if($cat == null){
			return true;
		}
		else{
			// Check of de gebruiker nog mag stemmen in de categorie waar hij zich bevindt
			if($_COOKIE[$cat] == true){
				return false;
			}
			else{
				return true;
			}
		}
	}

	function timeToVote(){
		// Check of de gebruiker op dit tijdstip mag stemmen
		if(check_in_range('2013-05-24 11:00', '2013-05-24 13:00', date('Y-m-d H:i:s'))){
			return true;
		}
		else{
			return false;
		}
	}
	
	function check_in_range($start_date, $end_date, $date_from_user){
		// Convert to timestamp
		$start_ts = strtotime($start_date);
		$end_ts = strtotime($end_date);
		$user_ts = strtotime($date_from_user);

		// Check that user date is between start & end
		return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
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