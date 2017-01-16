<?php


$username= "";//= $_REQUEST['username'];
$nacin=$_REQUEST["nacin"];
$ime="";
$prezime="";
$string =" ";

//$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');




$nacin = htmlspecialchars($nacin, ENT_QUOTES, "UTF-8");


/*$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
*/
	
if($nacin=="username")
{
	$username=$_REQUEST["username"];
	$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
		
		$sql = 'SELECT id,username,ime,prezime,password,tip,email FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 //array_push($usernamesBaza,"{$row['username']}");
  
	if(strpos("{$row['username']}",$username)!==false)
		{
			$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}" ."%" . "{$row['tip']}" ."/". "{$row['email']}";

		}
  
 }
		
		
	/*foreach($xml->children() as $korisnik)
	{
			$el1 = strtolower($korisnik->username);
			$el2 = strtolower($username);
		
		if(strpos($el1,$el2)!==false)
		{
			$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
		}
	}*/

}

else
{
	$ime=$_REQUEST["ime"];
	$prezime=$_REQUEST["prezime"];
	$ime = htmlspecialchars($ime, ENT_QUOTES, "UTF-8");
	$prezime = htmlspecialchars($prezime, ENT_QUOTES, "UTF-8");
	$praznoPrezime=true;
	$praznoIme=true;
	$imeBaza="";
	$prezimeBaza="";
	
	for($i=0;$i<strlen($prezime);$i++)
	{
		if($prezime[$i]!=" ")
			$praznoPrezime=false;
	}
	for($i=0;$i<strlen($ime);$i++)
	{
		if($ime[$i]!=" ")
			$praznoIme=false;
	}
	
	$sql = 'SELECT id,username,ime,prezime,password,tip,email FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
  
  $imeBaza=strtolower("{$row['ime']}");
  $prezimeBaza=strtolower("{$row['prezime']}");
  $ime = strtolower($ime);
  $prezime= strtolower($prezime);
  
  if(!$praznoPrezime && !$praznoIme)
		{
			if(strpos($imeBaza,$ime)!==false && strpos($prezimeBaza,$prezime)!==false)
			{
				$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}". "%" . "{$row['tip']}". "/". "{$row['email']}";
			}
		}
		elseif($praznoPrezime && !$praznoIme)
		{
			if(strpos($imeBaza,$ime)!==false || strpos($prezimeBaza,$ime)!==false )
			{
				$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}". "%" . "{$row['tip']}". "/". "{$row['email']}";
			}
		}
		elseif(!$praznoPrezime && $praznoIme)
		{
			if(strpos($imeBaza,$prezime)!==false || strpos($prezimeBaza,$prezime)!==false )
			{
				$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}". "%" . "{$row['tip']}". "/". "{$row['email']}";
			}
		}
		elseif($praznoIme && $praznoPrezime)
		{
				$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}". "%" . "{$row['tip']}". "/". "{$row['email']}";

		}
  
  
  
  
  
	/*if($username == "{$row['username']}")
		{
			$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}" "%" . "{$row['tip']}" "/". "{$row['email']}";

		}*/
  
 }
	/*foreach($xml->children() as $korisnik)
	{
			$el1 = strtolower($korisnik->ime);
			$el2 = strtolower($korisnik->prezime);
			$ime = strtolower($ime);
			$prezime= strtolower($prezime);
			
		if(!$praznoPrezime && !$praznoIme)
		{
			if(strpos($el1,$ime)!==false && strpos($el2,$prezime)!==false)
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif($praznoPrezime && !$praznoIme)
		{
			if(strpos($el1,$ime)!==false || strpos($el2,$ime)!==false )
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif(!$praznoPrezime && $praznoIme)
		{
			if(strpos($el1,$prezime)!==false || strpos($el2,$prezime)!==false )
			{
				$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;
			}
		}
		elseif($praznoIme && $praznoPrezime)
		{
							$string = $string."|".$korisnik->id."*".  $korisnik->username. "&" . $korisnik->ime . "?" . $korisnik->prezime . "^" . $korisnik->password. "%" . $korisnik->tip. "/". $korisnik->email;

		}
	}*/
}
echo $string;

?>