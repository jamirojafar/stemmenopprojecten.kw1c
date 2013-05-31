<?php 

require_once('assets/php/mysql.php'); 

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	// Formulier verwerken
	
	$pdoConn = openPDOConnection();
	
	$name = $pdoConn->quote($_POST["naam"]);
	$cat = $pdoConn->quote($_POST["cat"]);
	$desc = $pdoConn->quote($_POST["desc"]);
	$photo = $_FILES["photo"];

	$uploadMap = "../assets/images/";
	move_uploaded_file($photo["tmp_name"], $uploadMap."/".$photo["name"]);

	if(!empty($photo["name"]))
	{
		$sqlResult = $pdoConn->query("UPDATE items SET naam = ".strip_tags($name).", beschrijving = ".strip_tags($desc, "<iframe>").", categorie = ".$cat.", afbeelding_bestandsnaam = '".$photo["name"]."' WHERE id = '".$_GET["id"]."'");
	} else {
		$sqlResult = $pdoConn->query("UPDATE items SET naam = ".strip_tags($name).", beschrijving = ".strip_tags($desc, "<iframe>").", categorie = ".$cat." WHERE id = '".$_GET["id"]."'");
	}
	
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
			
				<td><strong>Projectnaam</strong></td>
				<td><strong>Categorie</strong></td>
			
			</tr>
			
			<form method="post" action="edit.php?id=<?php echo $_GET["id"]; ?>" enctype="multipart/form-data">
			
			<?php
			
				$pdoConn = openPDOConnection();
				$sqlResult = $pdoConn->query("SELECT * FROM items WHERE id = '".$_GET["id"]."'");
				
				if($sqlResult->rowCount() > 0)
				{
				
					foreach($sqlResult as $item)
					{
					
						$cat = $item["categorie"];
						
						switch($cat)
						{
						
							case 1:
								$catName = "Werken aan de Wereld";
							break;
							
							case 2:
								$catName = "Community week [Project]";
							break;
							
							case 3:
								$catName = "Community week [Kraam]";
							break;
						
						}
					
						?>
						
						<tr>
			
							<td><input type="text" id="naam" name="naam" value="<?php echo $item["naam"]; ?>" /></td>
							<td>
							
								<select name="cat">
									<?php
										$options[] = array('value' => '0', 'name' => '-- Selecteer --');
										$options[] = array('value' => '1', 'name' => 'Werken aan de Wereld');
										$options[] = array('value' => '2', 'name' => 'Community Week [Project]');
										$options[] = array('value' => '3', 'name' => 'Community Week [Kraam]');
										
										foreach($options as $option){
											$selected = ($cat == $option['value']) ? 'SELECTED' : '';
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
						
						<textarea name="desc" id="desc" rows="10" cols="10"><?php echo $item["beschrijving"]; ?></textarea>
						
						<br /><br />
						
						Foto:<br />
						<i>Zorg dat je een grote afbeelding upload, kleine plaatjes worden <u><b>NIET</u></b> vergroot. (Max 8 mb)</i>
						
						<br />
						
						<input type="file" id="photo" name="photo" />
						
						<br />
						<br />
						
						Huidige foto:<br />
						<img src="../assets/images/<?php echo $item["afbeelding_bestandsnaam"]; ?>" />
						
						<br /><br />
						
						<input type="submit" value="Opslaan" />

						</form>
		
		<?php
					
					}
				
				}
				
				closePDOConnection($pdoConn);
			
			?>
		
	</body>
</html>