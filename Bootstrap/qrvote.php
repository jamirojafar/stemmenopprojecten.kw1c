<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<?php
	$pdoConn = openPDOConnection();
	$sqlResult = $pdoConn->query("SELECT categorie, naam FROM items WHERE `id` = ".$_REQUEST['id']." LIMIT 1");
	if($sqlResult->rowCount() > 0){		
		foreach($sqlResult as $item){
			$name = $item['naam'];
			$cat = $item['categorie'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>
	<script type="text/javascript">
		$(document).ready(function(){	 
			 $('#votebox, #overlay').fadeIn('fast');
			 $('#votebox .projectname').html("<?php echo $name; ?>");
			 
			 // Maak een post request naar de stem handler
			 $('#votebox button[name="stem"]').click(function(){
				$.post("assets/php/votehandler.php", { 
					itemid: <?php echo $_REQUEST['id'] ?>,
					cat: <?php echo $cat; ?>}, 
				function(data) {
					$('#votebox p').html('Bezig met stemmen...');
					$('#votebox, #overlay').fadeOut('fast');
					console.log(data);
					if(data.result == true){
						$('h1.result').html("Stem succesvol uitgebracht");
						$('#infotext').html('De site kan nu worden afgesloten. Je kan ook via deze website verder stemmen op andere categori&euml;n.');
					}
					else{
						$('h1.result').html("Stemmen mislukt");
						$('#infotext').html('Stem niet succesvol doorgevoerd.<br/><i style="color: red;">"'+data.err+'"</i>');
					}
				}, "json");
			});
		});
	</script>

	<div class="container">
	  <div class="changes">
		<h1 class='result'>Bezig met stemmen...</h1>
		<p id='infotext'>Stemmen op: <?php echo $name; ?></p>
	  </div>
	 </div>

	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<!-- 24/03 We sluiten de PDO verbinding aan het eind van de pagina -->
	<?php 
	
		get_footer(); 
		
	?>
  </body>
</html>
