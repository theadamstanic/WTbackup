<?php


$nacin=$_REQUEST["nacin"];
$q=$_REQUEST["q"];
$q=(string)$q;


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
$string="<table style='margin-left:auto;margin-right:auto;border:1px solid white; color:rgb(37,37,37);'><tr><td>id</td><td>artikal</td><td>korisnik</td><td>kolicina</td><td>datum</td></tr>";

if($nacin=="korisnik")
{
	
		$sql = 'SELECT id,artikal,korisnik,kolicina,datum FROM narudzbe';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 //array_push($usernamesBaza,"{$row['username']}");
  
	if("{$row['korisnik']}"==$q)
		{
			//$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}" ."%" . "{$row['tip']}" ."/". "{$row['email']}";
			$string=$string."<tr><td>"."{$row['id']}"."</td><td>" . "{$row['artikal']}"."</td><td>" . "{$row['korisnik']}"."</td><td>" . "{$row['kolicina']}"."</td><td>" ."{$row['datum']}"."</td><td>" .  "</tr>";
		}
  
 } 
}

else
{
	$sql = 'SELECT id,artikal,korisnik,kolicina,datum FROM narudzbe';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 //array_push($usernamesBaza,"{$row['username']}");
  
	if(strpos((string)("{$row['artikal']}"),$q)!==false)
		{
			//$string = $string."|"."{$row['id']}"."*".  "{$row['username']}". "&" . "{$row['ime']}" . "?" . "{$row['prezime']}" . "^" . "{$row['password']}" ."%" . "{$row['tip']}" ."/". "{$row['email']}";
			$string=$string."<tr><td>"."{$row['id']}"."</td><td>" . "{$row['artikal']}"."</td><td>" . "{$row['korisnik']}"."</td><td>" . "{$row['kolicina']}"."</td><td>" ."{$row['datum']}"."</td><td>" .  "</tr>";
		}
  
 }
}
$string=$string."</table>";
echo $string;

?>