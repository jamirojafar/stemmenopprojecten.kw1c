<?php require_once('assets/php/mysql.php'); loginCheck();?>
<html>
	<head>
	
		<title>Items invoeren - KW1C Community Week</title>
	
	</head>
	
	<body>
	
		<a href="index.php"><- Terug</a>
		
		<br /><br />
		
		<table border="1">
		
			<tr>
			
				<td><strong>Project ID</strong></td>
				<td><strong>Projectnaam</strong></td>
				<td><strong>Categorie</strong></td>
				<td><strong>Bewerk</strong></td>
				<!-------<td><strong>Verwijder</strong></td>-------->
				<td><strong>QR-Code</strong></td>
			
			</tr>
			
			<?php
			
				$pdoConn = openPDOConnection();
				$sqlResult = $pdoConn->query("SELECT * FROM items ORDER BY naam ASC");
				
				if($sqlResult->rowCount() > 0)
				{
				
					foreach($sqlResult as $item)
					{
					
						$cat = $item["categorie"];
						$catId = $item["categorie"];
						
						switch($cat)
						{
						
							case 1:
								$cat = "Werken aan de Wereld";
							break;
							
							case 2:
								$cat = "Community week [Project]";
							break;
							
							case 3:
								$cat = "Community week [Kraam]";
							break;
						
						}
					
						?>
						
						<tr>
			
							<?php
							
							if($catId == 2)
							{
								$itemId = explode("/", $item["link"]);
								$itemId = $itemId[5];
							} else {
							
								$itemId = $item["id"];
							
							}
							
							?>
							
							<td><?php echo $itemId; ?></td>
							<td><?php echo $item["naam"]; ?></td>
							<td><?php echo $cat; ?></td>
							<td><a href="edit.php?id=<?php echo $item["id"]; ?>">[E]</a></td>
							<!-------<td><a href="delete.php?id=<?php echo $item["id"]; ?>">[X]</a></td>------>
							<td><a href="qrcode/?id=<?php echo $item["id"]; ?>">[QR]</a></td>
			
						</tr>
						
						<?php
					
					}
				
				}
			
			?>
		
		</table>
		
		<br /><br />
		
		<a href="add.php">Nieuwe toevoegen</a>

	</body>
</html>