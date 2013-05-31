<?php
	setcookie('userid','1',time()-3600*24,'/');
	setcookie('sessie','1',time()-3600*24,'/');
	header('Location: login.php');
?>