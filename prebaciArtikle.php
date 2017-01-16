<?php

$nazivi=array();
$cijene=array();
$ikone=array();
$naziviBaza=array();
$cijeneBaza=array();
$ikoneBaza=array();



$file = 'artikli.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

		
	foreach($xml->children() as $korisnik)
	{
			array_push($nazivi,$korisnik->naziv);
			array_push($cijene,$korisnik->cijena);
			array_push($ikone,$korisnik->ikona);
			
			
	}
	
$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}


$sql = 'SELECT naziv, cijena, ikona FROM artikli';
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
  //"EMP ID :{$row['naziv']} " . " CIJENA : {$row['cijena']}" ;
  array_push($naziviBaza,"{$row['naziv']}");
  /*array_push($cijeneBaza,"{$row['cijena']}");
  array_push($ikoneBaza,"{$row['ikona']}");
  */
 }
 //mysql_close($conn);
 
 
 $naziviRazlika=array();
 $cijeneRazlika=array();
 $ikoneRazlika=array();
 
 $str="";
 $brojac=0;
 	$nadjen=false;
	
	//$naziviRazlika = array_diff($nazivi,$naziviBaza);
	
	//for($i=0;$i<count($naziviBaza);$i++)
	//	$brojac=$brojac.$naziviBaza[$i];

for($i=0;$i<count($nazivi);$i++)
{
	$temp=$nazivi[$i];
	$nadjen=false;
	for($j=0;$j<count($naziviBaza);$j++)
	{
		if($naziviBaza[$j]==$temp)
		{
			$nadjen=true;
		}
		
	}
	if(!$nadjen)
		{
			array_push($naziviRazlika,$nazivi[$i]);
		array_push($cijeneRazlika,$cijene[$i]);
		array_push($ikoneRazlika,$ikone[$i]);
		$brojac++;
		}
	
	
	
}




	for($i=0;$i<count($naziviRazlika);$i++)
	{
		$sql =' INSERT INTO artikli '.
		'(naziv,cijena,ikona) '.
		'VALUES ("'.$naziviRazlika[$i].'",
		"'.$cijeneRazlika[$i].'",
		"'.$ikoneRazlika[$i].'") ' ;
		
		//mysql_select_db(''adamstanicspirala_db'');
	 $retval = mysqli_query( $conn, $sql);
	 if(! $retval ) {
	 die('Could not enter data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
	 }
	}


/*for($i=0;$i<count($nazivi);$i++)
{
	
	$sql =' INSERT INTO artikli '.
	'(naziv,cijena,ikona) '.
	'VALUES ("'.$nazivi[$i].'",
	"'.$cijene[$i].'",
	"'.$ikone[$i].'")' ;
	
	mysql_select_db(''adamstanicspirala_db'');
 $retval = mysql_query($sql, $conn);
 if(! $retval ) {
 die('Could not enter data: ' . mysql_error());
 }

}	

*/
echo "prebaceno " . $brojac . " artikala";


?>