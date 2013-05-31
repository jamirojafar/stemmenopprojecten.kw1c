<?php
	/* cookie aanmaken en doorsturen naar homepage */
	setcookie('ipad','true',time()+3600*24,'/');
	
	/* Categorie cookies verwijderen als ze al aangemaakt zijn */
	setcookie ("1", "false", time()-3600*24, '/');
	setcookie ("2", "false", time()-3600*24, '/');
	setcookie ("3", "false", time()-3600*24, '/');
	
	echo "Je bent nu ingelogd als iPad. Je wordt zo doorgestuurd.";
	header('refresh:3;url=/');
?>	
