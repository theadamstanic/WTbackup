<?php
session_start();

$q = $_REQUEST["q"];

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




?>