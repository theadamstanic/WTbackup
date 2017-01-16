<?php

session_start();



function ucitajizXML()
{
    
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    
    $username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");
    
    $file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);
$pronadjen=false;
foreach($xml->children() as $korisnik)
{
	if($korisnik->username==$username)
	{
		if($korisnik->password==$password)
		{
			$pronadjen=true;

			if($korisnik->tip=="admin")
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="admin";
				echo "true admin";

				
			}
			else
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="obicni";
				echo "true";
			}
	
		}
	}
	
}
if($pronadjen==false)
{
	$_SESSION["username"]="none";
				$_SESSION["tip"]="none";
				echo "false";
}


}


//ucitajizXML();
//return;
$username = $_REQUEST['username'];
$password= $_REQUEST['password'];

$username = htmlspecialchars($username, ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($password, ENT_QUOTES, "UTF-8");


$pronadjen=false;

$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
    
    
}

 if(!mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db'))
 {
     ucitajizXML();
     
 }
else
{
 
 $sql = 'SELECT username,password,tip FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) 
{

	if("{$row['username']}"==$username)
		{
			if("{$row['password']}"==$password)
				{
					$pronadjen=true;
					
					if("{$row['tip']}"=="admin")
						{
							$_SESSION["username"]=$username;
							$_SESSION["tip"]="admin";
							echo "true admin";
						}
						else
						{
							$_SESSION["username"]=$username;
							$_SESSION["tip"]="obicni";
							echo "true";
						}
				}
		}
	 
}

if($pronadjen==false)
{
	$_SESSION["username"]="none";
				$_SESSION["tip"]="none";
				echo "false";
}
    
}
/*$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

foreach($xml->children() as $korisnik)
{
	if($korisnik->username==$username)
	{
		if($korisnik->password==$password)
		{
			$pronadjen=true;

			if($korisnik->tip=="admin")
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="admin";
				echo "true admin";

				
			}
			else
			{
				$_SESSION["username"]=$username;
				$_SESSION["tip"]="obicni";
				echo "true";
			}
	
		}
	}
	
}
if($pronadjen==false)
{
	$_SESSION["username"]="none";
				$_SESSION["tip"]="none";
				echo "false";
}
*/

?>