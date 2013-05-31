
    <!-- Footer
    ================================================== -->
    <footer class="footer">	
      <div class="container">
        <p>Ontwikkeld door studenten van de <a title="KW1C ICT academie" href="http://kw1c.nl/afdeling/811/ict-academie">KW1C ICT-academie (AO)</a>: <a href='https://bitlabs.nl'>Dirk Groenen</a> | <a href="http://nl.linkedin.com/pub/mitchel-van-amstel/3b/886/a47">Mitchel van Amstel</a></p>
		<p><?php echo ($_COOKIE['ipad'] == true) ? '<i>Ingelogd als iPad</i>' : '' ;?></p>
		<div id='logos'>
			<?php 
				if($_GET['cat'] != 1){
					echo "<a href='http://kw1c.nl/community-week' target='_new'><img src='/assets/images/c_week.jpg' alt='communityweek logo'/></a>";
				}
				else{
					echo "<a target='_new' href='http://werkenaandewereld.nl'><img src='http://werkenaandewereld.nl/vsowerk/images/werkenaandewereld_logo.png' alt='werken aan de wereld logo'/></a>";
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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41184423-1', 'stemmenopprojectenkw1c.nl');
	  ga('send', 'pageview');

	</script>
