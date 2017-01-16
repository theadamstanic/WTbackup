<?php
session_start();

				

				$ids=array();
				$nazivi=array();
				$ikone=array();
				$cijene=array();
				foreach($_SESSION["korpa"] as $element)
				{
					$i=0;
					$id="";
					$naziv="";
					$ikona="";
					$cijena="";
					while($element[$i]!=",")
					{
						$id=$id.$element[$i];
						$i++;
					}
					$i++;
					while($element[$i]!=",")
					{
						$naziv=$naziv.$element[$i];
						$i++;
					}
					$i++;
					while($element[$i]!="|")
					{
						$cijena=$cijena.$element[$i];
						$i++;
					}
					$i++;
					while($element[$i]!="#")
					{
						$ikona=$ikona.$element[$i];
						$i++;
					}
					
					array_push($ids,$id);array_push($nazivi,$naziv);array_push($cijene,$cijena);array_push($ikone,$ikona);
				}
				
				$kolicine=array();
				$kljucevi=array();
				$kljucevinazivi=array();
				$kljucevicijene=array();
				$kljuceviikone=array();
				$k=0;
				foreach($ids as $artikal)
				{
					$brojac=0;
					for($j=0;$j<count($ids);$j++)
					{
						if($artikal == $ids[$j])
							$brojac++;
					}
					if(!in_array($artikal,$kljucevi))
					{
						array_push($kljucevi,$artikal);
						array_push($kolicine,$brojac);
						array_push($kljucevinazivi,$nazivi[$k]);
						array_push($kljucevicijene,$cijene[$k]);
						array_push($kljuceviikone,$ikone[$k]);
						
						
					}
					$k++;
				}
				

				$korisnik_id=0;
				$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');

 $sql = 'SELECT id,username FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 //array_push($usernamesBaza,"{$row['username']}");
  
	if( "{$row['username']}" ==$_SESSION["username"])
		{
			$korisnik_id="{$row['id']}";
		}
  
 }
 
 
 
 for($i=0;$i<count($kljucevi);$i++)
 {
	 $sql =' INSERT INTO narudzbe '.
			'(artikal,korisnik,kolicina,datum) '.
			'VALUES ("'.$kljucevi[$i].'",
			"'.$korisnik_id.'",
			"'.$kolicine[$i].'",
			"'.date("d.m.y").'") ' ;
	 $retval = mysqli_query( $conn ,  $sql);
	 if(! $retval ) {
	 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
	 }
 }

$_SESSION["korpa"]=array(); 

?>