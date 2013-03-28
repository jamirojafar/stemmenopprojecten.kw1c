<?php 
	require_once('functions.php'); 
	
	if(allowVoting()){
		// Hier moet de stem worden geplaatst in de database!
		// Dit zal vervolgens een true of false returnen welke wordt gebruikt op de andere pagina
		// Vervolgens moet er worden gezorgd dat de huidige gebruiker niet meer kan stemmen; er moet dus in de functie allowVoting worden bijgehouden of er mag worden gestemd.
		
		$result = array('result' => true);
	}
	else{
		$result = array('result' => false);
	}
	
	// Poep de json array uit welke zal worden ontvangen door de stempagina om de gebruik te vertellen of het stemmen is gelukt
	echo json_encode($result);
?>