<?php

	require_once('assets/php/mysql.php');
	
	if($_COOKIE['userid'] != '3'){
		echo "Alleen de admin mag projecten verwijderen.";
	}
	else{
		$pdoConn = openPDOConnection();
		$sqlResult = $pdoConn->query("DELETE FROM items WHERE id = '".$_GET["id"]."'");
	
		header("Location: items.php");
	}
?>