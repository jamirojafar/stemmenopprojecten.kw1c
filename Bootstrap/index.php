<!-- Include functie bestand -->
<?php require_once('assets/php/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>KW1C - Community Week</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

  <body>

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.html">KW1C</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.php">Categorie 1</a>
              </li>
			  <li class="active">
                <a href="./index.php">Categorie 2</a>
              </li>
			  <li class="active">
                <a href="./index.php">Categorie 3</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

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



    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <p>Ruimte voor de namen van de beste ontwikkelaars van het Koning Willem I College</p>
      </div>
    </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

  </body>
</html>
