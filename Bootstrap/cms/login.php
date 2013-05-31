<?php	
	require_once('assets/php/mysql.php');
	
	if(isset($_POST['submit'])){
		if(!empty($_POST['user']) && !empty($_POST['pass'])){
			$user = $_POST['user'];
			$password = $_POST['pass'];
			
			$pdoConn = openPDOConnection();
			$sqlResult = $pdoConn->query("SELECT COUNT(*) as counter, id FROM beheerders WHERE `gebruikersnaam` = '".$user."' AND `wachtwoord` = '".md5($password)."' LIMIT 1 ");
						
			if($sqlResult->rowCount() == 1){		
				foreach($sqlResult as $item){
					if($item['counter'] > 0){
						// Sessie toevoegen
						$session = rand(1000,50000);
						$insert = $pdoConn->prepare("INSERT INTO sessies (user,sessie) VALUES ('".$item['id']."', '".$session."')");
						$insert->execute();
						
						if($insert->rowCount() > 0){
							// Login succesvol, plaats cookie
							setcookie('userid',$item['id'],time()+3600*24,'/');
							setcookie('sessie',$session,time()+3600*24,'/');
							
							header('Location: index.php');
						}
						else{
							echo "<h2 style='color: red;'>Woops, error opgetreden tijdens inloggen.</h2>";
						}
					}
					else{
						echo "<h2 style='color: red;'>Gegevens kloppen niet.</h2>";
					}
				}
			}
			else{
				echo "<h2 style='color: red;'>Gegevens kloppen niet.</h2>";
			}
		}
	}
?>
<html>
	<head></head>
	<body>
		<h2>Inloggen</h2>
		<form action="#" method="POST">
			<table>
				<tr><td>Naam</td><td><input type="text" name="user" /></br></td></tr>
				<tr><td>Wachtwoord</td><td><input type="password" name="pass"/></td></tr>
				<tr><td></td><td><input type="submit" name="submit" value="Inloggen"/></td></tr>
			</table> 
		</form>
	</body>
</html>