<?php

$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');

	$index = 0;
	$rel=0;
	$id = $_REQUEST["id"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost, ENT_QUOTES, "UTF-8");
	
	$str = "";
	
	
	if($atribut=="naziv")
	{
		$sql = 'UPDATE artikli SET naziv="'. $vrijednost . '"
			WHERE id="'.$id.'"';
		 
	
	}
	else
	{
		$sql = 'UPDATE artikli SET cijena="'. $vrijednost . '"
			WHERE id="'.$id.'"';
	}
	
	$retval = mysqli_query( $conn ,  $sql);
		 if(! $retval ) {
		 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
		 }
	
	
	

/*$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$index = 0;
	$rel=0;
	$id = $_REQUEST["id"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost, ENT_QUOTES, "UTF-8");
	
	$node=null;
	$str = "";
	
	foreach($xml->children() as $artikal){

	if($artikal->id== $id)
	{
		$node = $artikal;
		
	}
	
}
	
	if($node!=null)
	{
		if($atribut=="naziv")
		{
			$node->naziv=$vrijednost;
		}
		else
		{
			$vrijednost=(string)$vrijednost;
			$node->cijena=($vrijednost.".00 KM");
		}
	}
	echo $xml->saveXML("artikli.xml");*/
?>