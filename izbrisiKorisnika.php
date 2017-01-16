<?php


$username = $_REQUEST["q"];
$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}

 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');
 
 $sql = 'DELETE FROM korisnici WHERE username="'.$username.'"';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
/*
$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$ime = $_REQUEST["q"];
	$nodeToRemove=null;
	foreach($xml->children() as $artikal){

	if($artikal->username == $ime)
	{
		$nodeToRemove = $artikal;
	}
	
}
	
	if($nodeToRemove!=null)
	{
		unset($nodeToRemove[0]);
	}
	echo $xml->saveXML("korisnici.xml");
*/	

?>