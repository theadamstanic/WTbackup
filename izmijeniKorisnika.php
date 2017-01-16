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
	$username = $_REQUEST["username"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost, ENT_QUOTES, "UTF-8");
	
	$str = "";
	
	
	if($atribut=="username")
	{
		$sql = 'UPDATE korisnici SET username="'. $vrijednost. '"
			WHERE username="'.$username.'"';
		 
	
	}
	elseif($atribut=="ime")
	{
		$sql = 'UPDATE korisnici SET ime="'. $vrijednost . '"
			WHERE username="'.$username.'"';
	}
	elseif($atribut=="prezime")
	{
		$sql = 'UPDATE korisnici SET prezime="'. $vrijednost . '"
			WHERE username="'.$username.'"';
	}elseif($atribut=="password")
	{
		$sql = 'UPDATE korisnici SET password="'. $vrijednost . '"
			WHERE username="'.$username.'"';
	}elseif($atribut=="tip")
	{
		$sql = 'UPDATE korisnici SET tip="'. $vrijednost . '"
			WHERE username="'.$username.'"';
	}else
	{
		$sql = 'UPDATE korisnici SET email="'. $vrijednost . '"
			WHERE username="'.$username.'"';
	}
	
	
	$retval = mysqli_query( $conn ,  $sql);
		 if(! $retval ) {
		 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
		 }
	
	


/*$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$index = 0;
	$rel=0;
	$username = $_REQUEST["username"];
	$atribut = $_REQUEST["atribut"];
	$vrijednost = $_REQUEST["vrijednost"];
	
	$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
	$vrijednost = htmlspecialchars($vrijednost , ENT_QUOTES, "UTF-8");
	$atribut = htmlspecialchars($atribut, ENT_QUOTES, "UTF-8");
	
	
	
	$node=null;
	$str = "";
	
	foreach($xml->children() as $korisnik){

	if($korisnik->username== $username)
	{
		$node = $korisnik;
		
	}
	
}
	
	if($node!=null && $node->username!="Adam")
	{
		if($atribut=="username")
		{
			$node->username=$vrijednost;
		}
		if($atribut=="ime")
		{
			$node->ime=$vrijednost;
		}
		elseif($atribut=="prezime")
		{
			$node->prezime=$vrijednost;
		}
		
		elseif($atribut=="password")
		{
			$node->password=$vrijednost;
		}
		elseif($atribut=="tip")
		{
			$node->tip=$vrijednost;
		}
		elseif($atribut=="email")
		{
			$node->email=$vrijednost;
		}
		
	}
	 $xml->saveXML("korisnici.xml");*/
?>