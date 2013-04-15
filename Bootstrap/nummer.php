<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>
	
	<div class="container">
	  <div class="changes">
		<h1>Community Week 2013</h1>
		<p class="marketing-byline">Vul hieronder het nummer van het item in waar je op wilt stemmen.</p>
		
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<input type="text" id="nummer" name="nummer" <?php if($_SERVER["REQUEST_METHOD"] == "POST") { echo "value=\"".$_POST["nummer"]."\""; } ?> /><br />
		<button class="nummer" id="nummerButton">Zoek</button>
		</form>
		
		<?php
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
		
			$pdoConn = openPDOConnection();
			
			$nummer = $pdoConn->quote($_POST["nummer"]);
			
			$sqlQuery = "SELECT * FROM items WHERE id = ".$nummer;
				
			$sqlResult = $pdoConn->query($sqlQuery);
				
			if($sqlResult->rowCount() == 1)
			{
				
				echo "<div class='row'>";
				
				foreach($sqlResult as $item)
				{
				
					renderItem($item);
				
				}
				
				echo "</div>";
				
			} else {
				echo "Er is geen item met dit nummer";
			}
		
			closePDOConnection($pdoConn);
		}
		
		?>
		
	  </div>
	 </div>

	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<!-- 24/03 We sluiten de PDO verbinding aan het eind van de pagina -->
	<?php 
	
		get_footer(); 
		
	?>
  </body>
</html>
