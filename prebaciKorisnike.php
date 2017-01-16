<?php

$usernames=array();
$imena=array();
$prezimena=array();
$passwords=array();
$tipovi=array();
$emails=array();

$usernamesBaza=array();




$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

		
	foreach($xml->children() as $korisnik)
	{
			array_push($usernames,$korisnik->username);
			array_push($imena,$korisnik->ime);
			array_push($prezimena,$korisnik->prezime);
			array_push($passwords,$korisnik->password);
			array_push($tipovi,$korisnik->tip);
			array_push($emails,$korisnik->email);
			
			
			
	}
	
$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}


$sql = 'SELECT username FROM korisnici';
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
  //"EMP ID :{$row['naziv']} " . " CIJENA : {$row['cijena']}" ;
  array_push($usernamesBaza,"{$row['username']}");
  /*array_push($cijeneBaza,"{$row['cijena']}");
  array_push($ikoneBaza,"{$row['ikona']}");
  */
 }
 //mysql_close($conn);
 
 
 $usernamesRazlika=array();
 $imenaRazlika=array();
 $prezimenaRazlika=array();
 $passwordsRazlika=array();
 $tipoviRazlika=array();
 $emailsRazlika=array();
 
 
 $str="";
 $brojac=0;
 	$nadjen=false;
	
	//$naziviRazlika = array_diff($nazivi,$naziviBaza);
	
	//for($i=0;$i<count($naziviBaza);$i++)
	//	$brojac=$brojac.$naziviBaza[$i];

for($i=0;$i<count($imena);$i++)
{
	$temp=$usernames[$i];
	$nadjen=false;
	for($j=0;$j<count($usernamesBaza);$j++)
	{
		if($usernamesBaza[$j]==$temp)
		{
			$nadjen=true;
		}
		
	}
	if(!$nadjen)
		{
			array_push($usernamesRazlika,$usernames[$i]);
		array_push($imenaRazlika,$imena[$i]);
		array_push($prezimenaRazlika,$prezimena[$i]);
		array_push($passwordsRazlika,$passwords[$i]);
		array_push($tipoviRazlika,$tipovi[$i]);
		array_push($emailsRazlika,$emails[$i]);
		
		$brojac++;
		}
	
	
	
}




	for($i=0;$i<count($usernamesRazlika);$i++)
	{
		$sql =' INSERT INTO korisnici '.
		'(username,ime,prezime,password,tip,email) '.
		'VALUES ("'.$usernamesRazlika[$i].'",
		"'.$imenaRazlika[$i].'",
		"'.$prezimenaRazlika[$i].'",
		"'.$passwordsRazlika[$i].'",
		"'.$tipoviRazlika[$i].'",

		"'.$emailsRazlika[$i].'") ' ;
		
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
echo "prebaceno " . $brojac." korisnika";


?>