<?php

	$ime = $_REQUEST["ime"];
	$prezime = $_REQUEST["prezime"];
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$username = $_REQUEST["username"];
	$tip=$_REQUEST["tip"];
	
	
	$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
	$ime = htmlspecialchars($ime, ENT_QUOTES, "UTF-8");
	$prezime= htmlspecialchars($prezime, ENT_QUOTES, "UTF-8");
	$email= htmlspecialchars($email, ENT_QUOTES, "UTF-8");
	$password= htmlspecialchars($password, ENT_QUOTES, "UTF-8");
	$tip= htmlspecialchars($tip, ENT_QUOTES, "UTF-8");

	
	$response="";
	$pronadjen=false;
	
	$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
die('Could not connect: ' . mysql_error());
}

 mysql_select_db('adamstanicspirala_db');

	$sql = 'SELECT username FROM korisnici';
 $retval = mysql_query( $sql, $conn );
 if(! $retval ) {
 die('Could not get data: ' . mysql_error());
 }
 while($row = mysql_fetch_assoc($retval)) 
{
	 
	if("{$row['username']}" == $username) $pronadjen = true;
}

if(!$pronadjen)
{
	$sql =' INSERT INTO korisnici '.
		'(username,ime,prezime,password,tip,email) '.
		'VALUES ("'.$username.'",
		"'.$ime.'",
		"'.$prezime.'",
		"'.$password.'",
		"'.$tip.'",

		"'.$email.'") ' ;
		
		//mysql_select_db('adamstanicspirala_db');
	 $retval = mysql_query($sql, $conn);
	 if(! $retval ) {
	 die('Could not enter data: ' . mysql_error());
	 }
}
	
	
/*$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
	$brojac=0;
	
	
	
	
foreach($xml->children() as $korisnik)
{
	if($korisnik->email==$email || $korisnik->username==$username)
	{
		$response="zauzet";
		$pronadjen=true;  
	}
	
	$brojac++;
	
	
}
if($pronadjen==false)
{
	
	$child = $xml->addChild("korisnik");
	$child->addChild("id",(string)($brojac+1));
	$child->addChild("ime",$ime);
	$child->addChild("prezime",$prezime);
	
	
	$child->addChild("username",$username);
	$child->addChild("password",$password);
	$child->addChild("tip",$tip);
	$child->addChild("email",$email);
	
	
	$response="true";
	/*$sxe = new SimpleXMLElement($xml->asXML());
	$korisniciNode = $sxe->korisnici[0];
	$korisnik = $korisnici->addChild("korisnik");
	
	$korisnik->addChild("username",$ime);
	$korisnik->addChild("password",$password);
	$korisnik->addChild("tip","obicni");
	$korisnik->addChild("email",$email);
	
	$sxe->asXML("korisnici.xml");
	echo "true";
	
	}*/
	$pronadjen=!$pronadjen;
	
	if($pronadjen)
	{
		$response="true";
	}
	else
		$response="zauzet";
	
	echo $response;
	

?>