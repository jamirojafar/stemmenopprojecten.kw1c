<?php
	/* cookie aanmaken en doorsturen naar homepage */
	setcookie('ipad','true',time()+3600*24,'/');
	echo "Je bent nu ingelogd als iPad. Je wordt zo doorgestuurd.";
	header('refresh:3;url=/');
?>	