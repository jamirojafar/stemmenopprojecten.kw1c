<?php require_once('mysql.php'); ?>
<html>
	<head>
		<!--Load the AJAX API-->
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
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Topping');
			data.addColumn('number', 'Slices');
			data.addRows([
			  ['Mushrooms', 3],
			  ['Onions', 1],
			  ['Olives', 1],
			  ['Zucchini', 1],
			  ['Pepperoni', 2]
			]);

			// Set chart options
			var options = {'title':'How Much Pizza I Ate Last Night',
						   'width':700,
						   'height':600};

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		  } 
		</script>
	</head>
	
	<body>
		<?php 
			$pdoConn = openPDOConnection();
			$sqlResult = $pdoConn->query("SELECT COUNT(*) as total, item_id as id FROM stemmen GROUP BY `item_id`");
			
			if($sqlResult->rowCount() > 0){		
				echo "<table>";
				echo "<tr><th>Project nummer</th><th>Project naam</th><th>Totaal gestemd</th></tr>";
				foreach($sqlResult as $item){
					echo "<tr><td>".$item['id']."</td><td></td><td>".$item['total']."</td></tr>";
				}
				
				echo "</table>";
				echo '  <div id="chart_div"></div>';
			} 
			else {
				echo "Er zijn geen items in deze categorie";
			}
		?>
	</body>
</html>