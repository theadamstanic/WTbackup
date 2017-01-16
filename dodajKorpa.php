<?php
session_start();

$q = $_REQUEST["q"];


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

  $el1 = strtolower("{$row['id']}");
  if($el1==$q)
  {
    array_push($_SESSION["korpa"], "{$row['id']}" . "," . "{$row['naziv']}"  . "," . "{$row['cijena']}" . "|" . "{$row['ikona']}" . "#");
}

}
/*
$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$string="false";

foreach($xml->children() as $artikal)
{





		if($artikal->id==$q)
		{
			array_push($_SESSION["korpa"],$artikal-> id . " naziv " . $artikal->naziv . " cijena " . $artikal->cijena );
			$string = "true";
		}



}
echo $string;
*/



?>
