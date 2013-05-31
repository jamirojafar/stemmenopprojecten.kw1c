<?php
	require_once('mysql.php');
	
	function loginCheck(){
		// Stukje cheaten om te zorgen dat mensen altijd naar login pagina gaan als ze niet zijn ingelogd
		$pdoConn = openPDOConnection();
		$sqlResult = $pdoConn->prepare("SELECT COUNT(*) as counter FROM sessies WHERE `user` = '".$_COOKIE['userid']."' AND `sessie` = '".$_COOKIE['sessie']."' LIMIT 1 ");
		$sqlResult->execute();
		$result = $sqlResult->fetch(PDO::FETCH_ASSOC);
		
		
		if($result['counter'] == 0){
			header('Location: ./login.php');
		}
	}
?>