<?php 

require_once('assets/php/mysql.php'); 

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	// Formulier verwerken
	
	$pdoConn = openPDOConnection();
	
	$id = $pdoConn->quote($_POST["id"]);
	$name = $pdoConn->quote($_POST["naam"]);
	$cat = $pdoConn->quote($_POST["cat"]);
	$desc = $pdoConn->quote($_POST["desc"]);
	$photo = $_FILES["photo"];

	$uploadMap = "../assets/images/";
	move_uploaded_file($photo["tmp_name"], $uploadMap."/".$photo["name"]);

	$sqlResult = $pdoConn->query("INSERT INTO items (id, naam, beschrijving, afbeelding_bestandsnaam, categorie) VALUES (".$id.", ".strip_tags($name).", ".strip_tags($desc).", '".$photo["name"]."', ".$cat.")");
	
	closePDOConnection($pdoConn);
	
	header("Location: items.php");
	exit;
	
}

?>
<html>
	<head>
	
		<title>Item bewerken - KW1C Community Week</title>
	
	</head>
	
	<body>
	
		<a href="items.php"><- Terug</a>
		
		<br /><br />
		
		<table border="1">
		
			<tr>
			
				<td><strong>Project ID</strong></td>
				<td><strong>Projectnaam</strong></td>
				<td><strong>Categorie</strong></td>
			
			</tr>
			
			<form method="post" action="add.php" enctype="multipart/form-data">
						
						<tr>
			
							<td><input type="text" id="id" name="id" /></td>
							<td><input type="text" id="naam" name="naam" /></td>
							<td>
							
								<select name="cat">
									<?php
										$options[] = array('value' => '0', 'name' => '--Selecteer--');
										$options[] = array('value' => '1', 'name' => 'Werken aan de Wereld');
										$options[] = array('value' => '2', 'name' => 'Community Week [Project]');
										$options[] = array('value' => '3', 'name' => 'Community Week [Kraam]');
										
										foreach($options as $option){
											$selected = ($_GET['cat'] == $option['value']) ? 'SELECTED' : '';
											echo "<option value='".$option['value']."' ".$selected.">".$option['name']."</option>";
										}
									?>
								</select>
							
							</td>
			
						</tr>
						
						
		
						</table>
						
						<br /><br />
						
						Beschrijving:
						
						<br />
						
						<textarea name="desc" id="desc" rows="10" cols="10"></textarea>
						
						<br /><br />
						
						Foto:
						<br />
						<i>Zorg dat je een grote afbeelding upload, kleine plaatjes worden <u><b>NIET</u></b> vergroot. (Max 8 mb)</i>
						
						<br />
						
						<input type="file" id="photo" name="photo" />
						
						<br />
						<br />
						
						<input type="submit" value="Opslaan" />

						</form>
		
	</body>
</html>