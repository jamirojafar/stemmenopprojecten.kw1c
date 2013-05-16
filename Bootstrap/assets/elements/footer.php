
    <!-- Footer
    ================================================== -->
    <footer class="footer">	
      <div class="container">
        <p>Ontwikkeld door: <a href='https://bitlabs.nl'>Dirk Groenen</a> | Mitchel van Amstel</a></p>
		<p><?php echo ($_COOKIE['ipad'] == true) ? '<i>Ingelogd als iPad</i>' : '' ;?></p>
		<div id='logos'>
			<?php 
				if($_GET['cat'] != 1){
					echo "<img src='http://www.kw1c.nl/_layout/afbeeldingen/logo.gif' alt='werken aan de wereld logo'/>";
				}
				else{
					echo "<img src='http://werkenaandewereld.nl/vsowerk/images/werkenaandewereld_logo.png' alt='werken aan de wereld logo'/>";
				}
			?>
	
		</div>
      </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>
