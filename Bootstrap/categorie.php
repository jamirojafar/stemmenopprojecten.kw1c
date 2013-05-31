<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>
	
	<audio id="speler"><source src="ping.wav" type="audio/wav"></audio>
	
	<script>
		function getDesc(iid) {
			
			$.getJSON( "assets/php/getdetails.php", {
					id: iid
				})
			.done(function( json ) {
				
					$('.modalHeader').html(json[0]);
					$('.modalDescription').html(json[1]);
					$('#modalVoteBtn').attr('onClick', 'openVoteBox(this, ' + json[2] + ', ' + json[3] + ');');
					$('#voteInfoBox').modal('show');
					
				});
			
		}
		
	</script>
	
	<div class="container">
	  <div class="changes">
		<?php
			if($_GET['cat'] == 1){
				echo "<h1 class=\"pagina-header\">Werken aan de Wereld</h1>";
				echo '<p class="marketing-byline">In de afgelopen weken hebben klassen van 4 afdelingen gewerkt aan \'wereldburgerschap\'. Om te laten zien wat wereldburgerschap is en wat voor wereldburger zij zelf zijn (geworden), hebben de studenten een eindproduct gemaakt. Ze mochten zelf kiezen hoe het product eruit moest zien. Jij mag kiezen welk product jij het beste vindt.</p>';
			}
			else{
				echo "<h1 class=\"pagina-header\">Community Week 2013</h1>";
				echo '<p class="marketing-byline">Gebruik deze website om op jouw favoriete project te stemmen.</p>';
			}
		
			// 24/03 We controleren of er een categorie is meegegeven, en deze valide is
			if(!allowVoting($_GET['cat'])){
				echo "<p class='marketing-byline red-error'>Op dit moment kan er nog niet gestemd worden of je hebt al gestemd.</p>";
			}
			else{
				if(!isset($_GET["cat"]) || empty($_GET["cat"]))
				{
					echo "Er is geen categorie opgegeven";
				}
				elseif(isset($_GET["cat"]) && $_GET["cat"] > 3)
				{
					echo "Er is een ongeldige categorie opgegeven";
				}
				else{
					// 24/03 We openen de PDO verbinding met de MySQL database met een handige functie
					// NOTE ik heb hier even gebruikersnaam kw1c en ww kw1c van gemaakt; mijn wamp had niet zo zin in een root zonder ww kennelijk...
					$pdoConn = openPDOConnection();
					
					// Met deze functie halen we "rare" dingen uit het id zodat er geen rare trucjes uitgevoerd kunnen worden, just in case
					$catId = $pdoConn->quote($_GET["cat"]);
					
					echo '<div class="row">
						  <div class="span12">
							<h3 class="subtitle">Dit zijn de inzendingen.</h3>
						  </div>
						</div>
						';
						
					// 26/03 We gaan hier de resultaten uit de MySQL database halen.
					$sqlQuery = "SELECT * FROM items WHERE categorie = ".$catId." ORDER BY id, naam ASC";
					
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
					
					// Sluit de connectie
					closePDOConnection($pdoConn);
				}	
			}
			
		?>	
	  </div>
	 </div>
	 
	<div id="voteInfoBox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 class="modalHeader">Informatie</h3>
		</div>
		<div class="modal-body">
			<p class="modalDescription">Hier komt informatie over dit project</p>
		</div>
		<div class="modal-footer">
			<a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Sluiten</a>
			<a href="#" id="modalVoteBtn" data-dismiss="modal" aria-hidden="true" class="btn btn-success">Stemmen!</a>
		</div>
    </div>
	
	
	 
	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<!-- 24/03 We sluiten de PDO verbinding aan het eind van de pagina -->
	<?php 
	
		get_footer(); 
		
	?>
	
  </body>
</html>
