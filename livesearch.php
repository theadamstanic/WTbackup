<?php


$str = $_REQUEST['q'];
$str = htmlspecialchars($str, ENT_QUOTES, "UTF-8");
$rezultat ="";
$tip=false;
$brojac=0;

$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}

 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');
 

if(isset($_REQUEST["tip"]) && $_REQUEST["tip"]=="korisnici")
	$tip=true;

if($tip)
{
	
	$sql = 'SELECT id,username,ime,prezime,password,tip,email FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 
	 $el1=strtolower("{$row['ime']}");
	 $el2=strtolower($str);
	 $el3=strtolower("{$row['prezime']}");
	 
	 if (((strpos($el1, $el2) !== false ) || (strpos($el3, $el2) !== false ))&& $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1 ." ".$el3;
		}
	 
	 
 }
 
}
	
	/*$file = 'korisnici.xml';
		if(!$xml = simplexml_load_file($file))
		{
			$rezultat="greska";
			exit('Failed to open '.$file);
		}
		$brojac=0;
		
		
		

	foreach($xml->children() as $korisnik)
	{
		
		$el1 = strtolower($korisnik->ime);
		$el2 = strtolower($str);
		$el3 = strtolower($korisnik->prezime);
		
		if (((strpos($el1, $el2) !== false ) || (strpos($el3, $el2) !== false ))&& $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1 ." ".$el3;
		}
		
		
	}*/


else
{
	$sql = 'SELECT naziv FROM artikli';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 
	$el1 = strtolower("{$row['naziv']}");
		$el2 = strtolower($str);
		//$el3 = $artikal->cijena;
		
		if (strpos($el1, $el2) !== false && $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1;
		}
	 
 }
 
}
	
	
	/*$file = 'artikli.xml';
		if(!$xml = simplexml_load_file($file))
			exit('Failed to open '.$file);

		$brojac=0;
		
		

	foreach($xml->children() as $artikal)
	{
		
		$el1 = strtolower($artikal->naziv);
		$el2 = strtolower($str);
		//$el3 = $artikal->cijena;
		
		if (strpos($el1, $el2) !== false && $brojac<10) 
		{
			$brojac++;
			$rezultat=$rezultat."|". $el1;
		}
		/*if( strpos($el3,$el2)!== false && $brojac<10)
		{
			$brojac++;
			$rezultat=$rezultat."|".$el3;
		}*/
	



echo $rezultat;

?>