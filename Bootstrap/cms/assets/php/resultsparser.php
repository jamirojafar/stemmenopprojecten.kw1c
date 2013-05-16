<?php
	header('Content-type: application/json');
	header('Cache-Control: no-cache, must-revalidate');
	
	// Database connectie bestand inladen
	require_once('mysql.php');
	
	// Maak de kolommen aan voor de chart
	$columns[] = array( 'id' => '',
						'label' => 'Project naam',
						'pattern' => '',
						'type' => 'string');
						
	$columns[] = array( 'id' => '',
						'label' => 'Stemmen',
						'pattern' => '',
						'type' => 'number');
	
	$pdoConn = openPDOConnection();
	$sqlResult = $pdoConn->query("SELECT COUNT(*) as total, item_id as id FROM stemmen GROUP BY `item_id` ORDER BY total DESC");
			
	if($sqlResult->rowCount() > 0){		
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
					
						$rowpart = null;
						$rowpart[] = array('v' => $projectnaam.' ['.$item['id'].']','f' => null);
						$rowpart[] = array('v' => (int)$item['total'],'f' => null);
						
						$rows[] = array('c' => $rowpart);
					}
				}
			}
		}
	} 
	
	// Resultaten samenvoegen
	$result['cols'] = $columns;
	$result['rows'] = $rows;
	
	echo json_encode($result);
?>