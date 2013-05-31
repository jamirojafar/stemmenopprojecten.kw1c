<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>
	
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
