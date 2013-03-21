<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>

<div class="container">
  <div class="changes">
    <h1>Community Week2013</h1>
    <p class="marketing-byline">Gebruik deze website om op jouw favoriete project te stemmen.</p>
	<?php
		if(!allowVoting()){
			echo "<p class='marketing-byline red-error'>Op dit moment kan er nog niet gestemd worden. Kom terug op 12-04-2013 tussen 11:00 en 14:00.</p>";
		}
	?>
    <div class="row">
      <div class="span12">
        <h3>Hoe te stemmen?</h3>
		<p>Stemmen is mogelijk op [datum] tussen [00:00] en [00:00]. Iedereen mag per categorie maximaal een keer stemmen op zijn of haar lievelings project.</p>
        <p>Hieronder staat beschreven hoe je kan stemmen op jouw favoriete project. Je hebt de mogelijkheid uit drie maniere: stemmen vanuit een overzicht, stemmen door een nummer in te vullen en stemmen via een QR-code.</p>
      </div>
	</div>
	<div class='row'>
      <div class="span4">
        <h3><a href="#">Vanuit het overzicht</a></h3>
        <p>Om te stemmen vanuit een overzicht met alle projecten kies je bovenaan deze site een categorie. Er zal vervolgens een overzicht worden getoond vanuit waar je kan stemmen op jouw  favoriete project.</p>
      </div>
      <div class="span4">
        <h3><a href="#">Via het project-nummer</a></h3>
        <p>Weet je al op welk project je wilt stemmen? Stem dan direct op je favoriete project doormiddel van het invoeren van het project-nummer.</p>
        <p>Het invoeren van het project-nummer kan je doen via de pagina <a href=''>'Direct Stemmen'</a></p>
      </div>
      <div class="span4">
        <h3><a href="#">Scan de QR-code</a></h3>
        <p>Bij elk project hangt een QR-code. Scan deze code met je telefoon of tablet om direct te stemmen op jouw favoriete project.</p>
      </div>
    </div>
  </div>

</div>

	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_footer(); ?>
  </body>
</html>
