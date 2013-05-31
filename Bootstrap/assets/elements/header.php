<head>
    <meta charset="utf-8">
    <title>KW1C - Community Week</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="assets/css/kw1c.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

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
          <a class="brand" href="./index2.php">KW1C</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./categorie.php?cat=1">Werken aan de wereld</a>
              </li>
			  <li class="active">
                <a href="./categorie.php?cat=2">Community week [Project]</a>
              </li><!--
			  <li class="active">
                <a href="./categorie.php?cat=3">Community week [Kraam]</a>
              </li>
			  -->
			  <li class="active right">
                <a href="./nummer.php">Via nummer</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	
	<!-- Vote box, box wordt geopend wanneer er op de vote knop wordt gedrukt -->
	<div id='overlay'></div>
	<div id="votebox">
		<h2>Stem: <span class='projectname'></span></h2>
		<?php 
			if(allowVoting($_GET['cat'])){
				echo "<p>Weet je zeker dat je wilt stemmen op dit project? Een stem kan niet ongedaan worden gemaakt</p>
		<button name='stem' onclick='speel();' class='button'>Stem</button><button name='close' class='button red'>Sluiten</button>";
			}
			else{
				echo "<p>Je hebt geen toegang om op dit item te stemmen.</p><button name='close' class='button red'>Sluiten</button>";
			}
		?>
	</div>