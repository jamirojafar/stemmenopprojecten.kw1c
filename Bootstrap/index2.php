<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<!-- De header staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_header(); ?>

<div class="container">
  <div class="changes">
    <h1 class="pagina-header">Community Week 2013</h1>
    <p class="marketing-byline">Stem-app van het Koning Willem I College voor stemmen op verschillende categorie&euml;n:<br/><br/>
	1. Het beste product van Werken aan de Wereld</br>2. Jouw favoriete project van de community week.</p>
</p>
	<?php
		if(!allowVoting()){
			echo "<p class='marketing-byline red-error'>Op dit moment kan er nog niet gestemd worden. Kom terug op 12-04-2013 tussen 11:00 en 14:00.</p>";
		}
	?>
    <div class="row">
      <div class="span12">
        <h3>Hoe te stemmen?</h3>
		<p>Stemmen is mogelijk op 24 mei 2013 tussen 11:00 en 13:00 uur. </p>
		<p>Je mag per categorie maximaal &eacute;&eacute;n keer stemmen. Dus je kan tweemaal (per categorie &eacute;&eacute;n keer) stemmen.</p>
		<p>Je kan op drie verschillende manieren stemmen:</p>
      </div>
	</div>
	<div class='row'>
      <div class="span4">
        <h3>Vanuit het overzicht</h3>
        <p>Om te stemmen vanuit een overzicht kies je bovenaan deze site een categorie. Er zal vervolgens een overzicht worden getoond vanuit waar je kan stemmen op jouw favoriete project.</p>
      </div>
      <div class="span4">
        <h3><a href="nummer.php">Via het project-nummer</a></h3>
        <p>Weet je al op welk product of op welk project je wilt stemmen? Stem dan direct op je favoriet doormiddel van het invoeren van het nummer, dat je vindt bij de presentatie of op de projectenmarkt.</p>
        <p>Het invoeren van het project-nummer kan je doen via de pagina <a href='nummer.php'>'Direct Stemmen'</a></p>
      </div>
      <div class="span4">
        <h3>Scan de QR-code</h3>
        <p>Van elk product en bij elk project hangt een QR-code. Scan deze code met je telefoon of tablet om direct te stemmen op jouw favoriete product of project. Heb je een smartphone en heb je geen qr-code scanner, download er dan één uit de store (gratis).</p>
      </div>
    </div>
  </div>

</div>

	<!-- De footer staat in een centraal bestand, deze verkrijg je met onderstaande functie -->
	<?php get_footer(); ?>
  </body>
</html>
