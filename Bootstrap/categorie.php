<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>

<div class="container">
  <div class="changes">
    <h1>Community Week 2013</h1>
    <p class="marketing-byline">Gebruik deze website om op jouw favoriete project te stemmen.</p>
	<?php
	
		// 24/03 We controleren of er een categorie is meegegeven, en deze valide is
		
		if(!isset($_GET["cat"]) || empty($_GET["cat"]))
		{
			echo "Er is geen categorie opgegeven";
			exit;
		}
		
		if(isset($_GET["cat"]) && $_GET["cat"] > 3)
		{
			echo "Er is een ongeldige categorie opgegeven";
			exit;
		}
		
		if(!allowVoting()){
			echo "<p class='marketing-byline red-error'>Op dit moment kan er nog niet gestemd worden. Kom terug op 12-04-2013 tussen 11:00 en 14:00.</p>";
		}
		
		// 24/03 We openen de PDO verbinding met de MySQL database met een handige functie
	
		$pdoConn = openPDOConnection();
		
		// Met deze functie halen we "rare" dingen uit het id zodat er geen rare trucjes uitgevoerd kunnen worden, just in case
		$catId = $pdoConn->quote($_GET["cat"]);
		
	?>
    <div class="row">
      <div class="span12">
        <h3>Dit zijn de inzendingen.</h3>
      </div>
	</div>
	
	
	<?php

	// 26/03 We gaan hier de resultaten uit de MySQL database halen.
	$sqlQuery = "SELECT * FROM items WHERE categorie = ".$catId;
	
	$sqlResult = $pdoConn->query($sqlQuery);
	
	if($sqlResult->rowCount() > 0)
	{
		
		echo "<div class='row'>";
		
		foreach($sqlResult as $item)
		{
		
			renderItem($item);
		
		}
		
		echo "</div>";
	
	} else {
		echo "Er zijn geen items in deze categorie";
	}
	
	?>	
  </div>
  </div>
  
</div>
</div>

	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<!-- 24/03 We sluiten de PDO verbinding aan het eind van de pagina -->
	<?php 
	
		get_footer(); 
		closePDOConnection($pdoConn);
		
	?>
  </body>
</html>
