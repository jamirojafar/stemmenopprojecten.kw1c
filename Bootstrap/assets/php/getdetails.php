<?php

	include("functions.php");

	//Dit script wordt aangeroepen met JSON via JQuery
	
	$projectid = $_GET["id"];
	
	$pdoConn = openPDOConnection();
	$projectid = $pdoConn->quote($projectid);
	
	$query = "SELECT * FROM items WHERE id = ".$projectid;
	$sqlResult = $pdoConn->query($query);
	
	if($sqlResult->rowCount() > 0)
	{
	
		foreach($sqlResult as $item)
		{
		
			if($item["categorie"] == 2)
			{
			
				$return = Array($item["naam"], "<a href=\"".$item["link"]."\" target=\"_blank\">Klik hier voor meer informatie over dit project</a>", $item["id"], $item["categorie"]);
			
			} else {
		
				$return = Array($item["naam"], nl2br($item["beschrijving"]), $item["id"], $item["categorie"]);
				
			}
		
		}
	
	}
	
	$return = json_encode($return);
	echo $return;

?>