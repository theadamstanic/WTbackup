
<?php


	$id = $_REQUEST["q"];
$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}

 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');
 
 $sql = 'DELETE FROM artikli WHERE id='.$id;
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 
 

//$doc = new DOMDocument(); 
//$doc->load('artikli.xml');

/*$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	$index = 0;
	$rel=0;
	$id = $_REQUEST["q"];
	$nodeToRemove=null;
	$str = "";
	foreach($xml->children() as $artikal){

	if($artikal->id == $id)
	{
		$nodeToRemove = $artikal;
		$str = $nodeToRemove->naziv . " " . $nodeToRemove->cijena;
		$rel=$index;
	}
	
	$index++;
}
	
	if($nodeToRemove!=null)
	{
		unset($nodeToRemove[0]);
	}
	echo $xml->saveXML("artikli.xml");
	
	/*$el1 = strtolower($artikal->naziv);
	$el2 = strtolower($naziv);
	if(strpos($el1,$el2)!==false)
	{
		$string = $string."|".  $artikal->naziv . "^" . $artikal->cijena . "%" . $artikal->ikona;
	}*/






//this gives you a list of the messages
//$list = $doc->getElementsByTagName('artikal');
//$str = $list[0]->getAttribute("cijena");
//figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
//$nodeToRemove = null;
//foreach ($thedocument->childNodes as $domElement){
  /*$attrValue = $domElement->getAttribute('naziv');
  if ($attrValue == $_REQUEST['q']) {
    $nodeToRemove = $domElement; //will only remember last one- but this is just an example :)
  }*/
//  $str=$domElement->getAttribute('naziv');
//}

//Now remove it.
//if ($nodeToRemove != null)
//$thedocument->removeChild($nodeToRemove);
//$doc->saveXML(); 
?>

