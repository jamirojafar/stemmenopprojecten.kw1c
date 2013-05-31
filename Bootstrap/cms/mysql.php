<?php
	
	// Basis functie bestand voor MySQL verbinding dmv PDO
	// Alleen het opzetten en het sluiten van de verbinding gebeurt hier
	
	function openPDOConnection()
	{
	
		$mysqlHostname = "localhost";
		$mysqlUsername = "kw1c";
		$mysqlPassword = "kw1c";
		$mysqlDatabase = "stemmen";
		
		try {
			$pdoConnection = new PDO("mysql:host=".$mysqlHostname.";dbname=".$mysqlDatabase, $mysqlUsername, $mysqlPassword);
			$pdoConnection->exec('SET NAMES "utf8"'); 
		} catch (PDOException $e) {
			echo "Er is een fout opgetreden met het opzetten van een PDO Database connectie: ".$e->getMessage();
			exit;
		}
		
		return $pdoConnection;
		
	}
	
	function closePDOConnection($pdoConnection)
	{
	
		$pdoConnection = NULL;
	
	}
	
?>