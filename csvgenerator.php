<?php

$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$ids=array();
	$nazivi=array();
	$cijene=array();
	$ikone=array();
	$data=array();
/*	
foreach($xml->children() as $artikal)
{
	array_push($data,$artikal->id.",".$artikal->naziv.",".$artikal->cijena.",".$artikal->ikona);
	array_push($ids,$artikal->id);
	array_push($nazivi,$artikal->naziv);
	array_push($cijene,$artikal->cijena);
	array_push($ikone,$artikal->ikona);
}

*/

$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');

 $sql = 'SELECT id,naziv,cijena,ikona FROM artikli';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 
	 array_push($data,"{$row['id']}".","."{$row['naziv']}".","."{$row['cijena']}".","."{$row['ikona']}");
	array_push($ids,"{$row['id']}");
	array_push($nazivi,"{$row['naziv']}");
	array_push($cijene,"{$row['cijena']}");
	array_push($ikone,"{$row['ikona']}");			

		}
	



$fp = fopen('CSVFile.csv', 'w');
$pocetak=explode(",","id,naziv,cijena,ikona");
fputcsv($fp,$pocetak);
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);

$contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('CSVFile.csv') . "\";");
        readfile('CSVFile.csv');
        exit();
?>