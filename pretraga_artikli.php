
<?php
session_start();


$naziv = $_REQUEST['q'];
$naziv = htmlspecialchars($naziv, ENT_QUOTES, "UTF-8");
$string =" ";
$pronadjen=false;
/*$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
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
	
		if($naziv=="pretrazi_sve")
		{
			$string = $string."|". "{$row['id']}"."*". "{$row['naziv']}" . "^" . "{$row['cijena']}" . "%" . "{$row['ikona']}";
		$pronadjen=true;
		}
		else
		{
			$el1 = strtolower("{$row['naziv']}");
			$el2 = strtolower($naziv);
			if(strpos($el1,$el2)!==false)
			{
				$string = $string."|". "{$row['id']}"."*". "{$row['naziv']}" . "^" . "{$row['cijena']}" . "%" . "{$row['ikona']}";
				$pronadjen=true;

			}

		}
	
 }
/*foreach($xml->children() as $artikal)
{
	if($naziv=="pretrazi_sve")
	{
		$string = $string."|". $artikal->id."*". $artikal->naziv . "^" . $artikal->cijena . "%" . $artikal->ikona;
		$pronadjen=true;
	}
	
	else
	{
		$el1 = strtolower($artikal->naziv);
		$el2 = strtolower($naziv);
		if(strpos($el1,$el2)!==false)
		{
			$string = $string."|". $artikal->id."*". $artikal->naziv . "^" . $artikal->cijena . "%" . $artikal->ikona;
			$pronadjen=true;
		}
	}
	
}*/

if(!$pronadjen)
	$string="false";

echo $string;

?>