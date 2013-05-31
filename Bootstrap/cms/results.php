<?php require_once('assets/php/mysql.php'); loginCheck(); ?>
<html>
	<head>
		<!--Load the AJAX API-->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  // Load the Visualization API and the piechart package.
		  google.load('visualization', '1.0', {'packages':['corechart']});

		  // Set a callback to run when the Google Visualization API is loaded.
		  google.setOnLoadCallback(drawChart);

		  // Callback that creates and populates a data table,
		  // instantiates the pie chart, passes in the data and
		  // draws it.
		  function drawChart() {

			// Create the data table.
			var jsonData = $.ajax({
			  url: "assets/php/resultsparser.php",
			  dataType:"json",
			  data: {cat : <?php echo $_GET['cat']; ?>},
			  async: false
			  }).responseText;
			  
			console.log(jsonData);

			// Set chart options
			var options = {'title':'Resultaten Community Week',
						   'width':800,
						   'height':600};

			// Create our data table out of JSON data loaded from server.
			var data = new google.visualization.DataTable(jsonData);
						   
			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		  } 
		</script>
		
		<style>
			body{
				font-family: arial;
			}
			td,th{
				padding: 4px;
			}
			
			@media print {
				.noPrint {
					display:none;
				}
			}
		</style>
	</head>
	
	<body>
		<h1>Resultaten <a class='noPrint' href='./index.php'>[Terug]</a></h1>
		<p class='noPrint'>Hieronder vindt je de stem resultaten van de community week. Gebruik onderstaande dropdown om de categorie te selecteren. </br>Klik <a href="javascript:if(window.print)window.print()">hier</a> om de resultaten te printen.</p>
		<form action='#' method='GET'>
			<select name='cat' onchange='$(form).submit();'>
				<?php
					$options[] = array('value' => '0', 'name' => '-- Selecteer --');
					$options[] = array('value' => '1', 'name' => 'Werken aan de Wereld');
					$options[] = array('value' => '2', 'name' => 'Community Week [Project]');
					$options[] = array('value' => '3', 'name' => 'Community Week [Kraam]');
					
					foreach($options as $option){
						$selected = ($_GET['cat'] == $option['value']) ? 'SELECTED' : '';
						echo "<option value='".$option['value']."' ".$selected.">".$option['name']."</option>";
					}
				?>
			</select>
		</form>
		<div id="chart_div"></div>
		<h2>Tekst versie</h2>
		<table border='1' style='border-collapse: collapse;'>
			<tr><th>Positie</th><th>Project</th><th>Totaal</th></tr>
		<?php
			$pdoConn = openPDOConnection();
			$sqlResult = $pdoConn->query("SELECT COUNT(*) as total, item_id as id FROM stemmen GROUP BY `item_id` ORDER BY total DESC");
					
			if($sqlResult->rowCount() > 0){		
				$counter = 1;
				foreach($sqlResult as $item){
					$catQuery = $pdoConn->query("SELECT categorie FROM items WHERE `id` = '".$item['id']."'");
					if($catQuery->rowCount() > 0){
						foreach($catQuery as $result){
							if($result['categorie'] == $_REQUEST['cat']){
								$nameQuery = $pdoConn->query("SELECT naam FROM items where `id` = '".$item['id']."'");
								if($nameQuery->rowCount() > 0){
									foreach($nameQuery as $result){
										$projectnaam = $result['naam'];
									}
								}
								echo "<tr><td>".$counter++."<sup>e</sup></td><td>".$projectnaam.' ['.$item['id'].']'."</td><td>".(int)$item['total']."</td></tr>";
							}
						}
					}
				}
			} 
		?>
		</table>
	</body>
</html>