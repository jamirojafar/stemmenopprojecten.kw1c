<?php 
	require_once('functions.php'); 
	
	if(!timeToVote()){
		$result = array('result' => false,'err'=>'Er mag nog niet worden gestemd. Stemmen kan alleen tussen 11:00 en 13:00 op 24-mei-2013.');
	}
	elseif(allowVoting($_REQUEST['cat'])){
		// Hier moet de stem worden geplaatst in de database!
		// Dit zal vervolgens een true of false returnen welke wordt gebruikt op de andere pagina
		// Vervolgens moet er worden gezorgd dat de huidige gebruiker niet meer kan stemmen; er moet dus in de functie allowVoting worden bijgehouden of er mag worden gestemd.
		$pdoConn = openPDOConnection();
		
		$id = $pdoConn->quote($_REQUEST["itemid"]);
		$sqlQuery = "INSERT INTO stemmen (`item_id`,`ip_adres`) VALUES (".$id.", '".$_SERVER['REMOTE_ADDR']."')";
			
		try{			
			$sqlResult = $pdoConn->query($sqlQuery);
			if($sqlResult->rowCount() > 0){
				// Succesvol geplaatst in de database
				// Plaats een cookie met als naam van de categorie, de iPad cookie verloopt na 60 seconden; de cookie voor alle overige apparaten verploopt pas na 24 uur
				if(isset($_COOKIE['ipad'])){
					setcookie($_REQUEST['cat'],'true',time()+60,'/');
				}
				else{
					setcookie($_REQUEST['cat'],'true',time()+3600*24,'/');
				}
				
				// Return het true statement
				$result = array('result' => true);
			}
			else{
				$result = array('result' => false,'err' => 'Geen rijen beinvloedt');
			}
		}
		catch(PDOException $err){
			$result = array('result' => false,'err' => $err);
		}	
	}
	else{
		$result = array('result' => false,'err'=>'Geen toegang');
	}
	
	// Poep de json array uit welke zal worden ontvangen door de stempagina om de gebruiker te vertellen of het stemmen is gelukt
	echo json_encode($result);
?>