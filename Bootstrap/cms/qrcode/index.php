<?php    
/*
 * PHP QR Code encoder for de communityweek
 *
 */
    
	DEFINE('BASEURL','http://stemmenopprojectenkw1c.nl/qrvote.php?id=');
	
	if (isset($_GET['id']))
		$urltoconvert = BASEURL.intval($_GET['id']);
	else
		$urltoconvert = BASEURL.'0';
	
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';
    //if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    //    $errorCorrectionLevel = $_REQUEST['level'];    
		

    $matrixPointSize = 10;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($urltoconvert)) { 
    
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($urltoconvert.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($urltoconvert, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    //QRtools::timeBenchmark();    
?>