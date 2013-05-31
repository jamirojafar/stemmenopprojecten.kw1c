<?php
	require_once('mysql.php');

	if(isset($_POST['submit'])){
		$pdoConn = openPDOConnection();

		$csvfile = $_FILES['csv'];

		if(!empty($csvfile['tmp_name'])){	
			$content .= '<table>';
			$file_handle = fopen($csvfile['tmp_name'], "r");
			while (!feof($file_handle) ) {
				$text = fgetcsv($file_handle, 1024, ';');
				
				$content .= "<tr>";
				for($x = 0;$x < count($text);$x++){
					$content .= "<td>".$text[$x]."</td>";
				}
					
				// Toevoegen aan DB
				try{
					$sqlResult = $pdoConn->prepare("INSERT INTO items (id,naam,link,categorie) VALUES (".$text[0].",'".$text[2]."','".$text[1]."', 2)");
					// TEMP $sqlResult->execute();
					
					if($sqlResult->rowCount()> 0){
						$content .= "<td style='color: green;'>Added</td>";
					}
					else{
						$content .= "<td style='color: red;'>Failed</td>";
					}
				}
				catch (PDOExceoption $e){
					echo $e;
				}

				$content .= "</tr>";
			}
			fclose($file_handle);
			$content .= '</table>';
			
			echo $content;
			
			
		}
	}
?>

<html>
	<head></head>
	<body>
		<h2>Selecteer CSV bestand</h2>
		<form action="#" method="POST" enctype="multipart/form-data">
			<input type="file" name="csv"/>
			<input type="submit" name="submit" value="Submit"/>
		</form>
	</body>
</html>