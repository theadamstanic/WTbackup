<?php

	$naziv = $_REQUEST["naziv"];
	$cijena = $_REQUEST["cijena"];
	$link = $_REQUEST["link"];
	$postoji=false;

	$naziv = htmlspecialchars($naziv, ENT_QUOTES, "UTF-8");
	$cijena = htmlspecialchars($cijena, ENT_QUOTES, "UTF-8");
	$link = htmlspecialchars($link, ENT_QUOTES, "UTF-8");
	
	
	$response="";
	
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
 while($row = mysqli_fetch_assoc($retval)) 
{
	 
	if("{$row['naziv']}" == $naziv) $postoji = true;
}
		
		
if(!$postoji)
{
			$sql =' INSERT INTO artikli '.
		'(naziv,cijena,ikona) '.
		'VALUES ("'.$naziv.'",
		"'.$cijena.'",
		"'.$link.'") ' ;
		
		//mysql_select_db(''adamstanicspirala_db'');
	 $retval = mysqli_query( $conn, $sql);
	 if(! $retval ) {
	 die('Could not enter data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
	 }

	 }
	
 
 
/*$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
	$brojac=0;
	
	
foreach($xml->children() as $korisnik)
{
	$brojac++;	
}

	
	$child = $xml->addChild("artikal");
	$child->addChild("id",(string)($brojac+1));
	$child->addChild("naziv",$naziv);
	$child->addChild("cijena",$cijena);
	
	
	$child->addChild("ikona",$link);
	
	
	
	$response="true";
	/*$sxe = new SimpleXMLElement($xml->asXML());
	$korisniciNode = $sxe->korisnici[0];
	$korisnik = $korisnici->addChild("korisnik");
	
	$korisnik->addChild("username",$ime);
	$korisnik->addChild("password",$password);
	$korisnik->addChild("tip","obicni");
	$korisnik->addChild("email",$email);
	
	$sxe->asXML("korisnici.xml");
	echo "true";*/
	
	if($postoji) $response = "Artikal s tim nazivom vec postoji";
	else
		$response = "true";
	echo $response;
	

?>