
<?php


$usernames = array();
$imena = array();
$prezimena = array();
$passwords = array();
$tipovi = array();
$emails = array();

function napuni()
{
    napuniusername();
    napunipassword();
    napunitip();
	napuniemail();
	napuniimena();
	napuniprezimena();
}

function napuniusername()
{
	global $usernames;
	array_push($usernames,"Adam");
	array_push($usernames,"Irfan");
	array_push($usernames,"Vensada");
	array_push($usernames,"asd");
}
function napuniimena()
{
	global $imena;
	array_push($imena,"Ad");
	array_push($imena,"Irf");
	array_push($imena,"Vens");
	array_push($imena,"asads");
	
}
function napuniprezimena()
{
	global $prezimena;
	array_push($prezimena,"Stanic");
	array_push($prezimena,"Prazina");
	array_push($prezimena,"Okanovic");
	array_push($prezimena,"Nesto");
	
}
function napunipassword()
{
	global $passwords;
	array_push($passwords,"aaaaa1");
	array_push($passwords,"aaaaa1");
	array_push($passwords,"aaaaa1");
	array_push($passwords,"asd123");
}
function napunitip()
{
	global $tipovi;
	array_push($tipovi,"admin");
	array_push($tipovi,"admin");
	array_push($tipovi,"obicni");
	array_push($tipovi,"obicni");
}
function napuniemail()
{
	global $emails;
	array_push($emails,"astanic@etf.unsa.ba");
	array_push($emails,"irfo@etf.unsa.ba");
	array_push($emails,"vensada@etf.unsa.ba");
	array_push($emails,"adam@yahoo.com");
}



napuni();
	global $usernames,$imena,$prezimena,$passwords,$tipovi,$emails;


unlink('korisnici.xml');

$xml = new DOMDocument();

$xml_artikli = $xml->createElement("korisnici");
$xml->appendChild($xml_artikli);


for($i=0;$i<count($usernames);$i++)
{
	$xml_artikal=$xml->createElement("korisnik");

	$xml_id=$xml->createElement("id");

	$xml_id->appendChild($xml->createTextNode((string)($i+1)));
	$xml_artikal->appendChild($xml_id);
	
	
			$xml_naziv=$xml->createElement("username");

	$xml_naziv->appendChild($xml->createTextNode($usernames[$i]));
	$xml_artikal->appendChild($xml_naziv);
	
	$xml_ime=$xml->createElement("ime");

	$xml_ime->appendChild($xml->createTextNode($imena[$i]));
	$xml_artikal->appendChild($xml_naziv);
	
	$xml_prezime=$xml->createElement("prezime");

	$xml_prezime->appendChild($xml->createTextNode($prezimena[$i]));
	$xml_artikal->appendChild($xml_naziv);
	
		$xml_cijena=$xml->createElement("password");

	$xml_cijena->appendChild($xml->createTextNode($passwords[$i]));
	$xml_artikal->appendChild($xml_cijena);
	
	$xml_ikona=$xml->createElement("tip");

	$xml_ikona->appendChild($xml->createTextNode($tipovi[$i]));
	$xml_artikal->appendChild($xml_ikona);
	
	
	$xml_email=$xml->createElement("email");

	$xml_email->appendChild($xml->createTextNode($emails[$i]));
	$xml_artikal->appendChild($xml_email);
	
	
	

	
	$xml_naziv->nodeValue=$usernames[$i];
	$xml_ime->nodeValue=$imena[$i];
	$xml_prezime->nodeValue=$prezimena[$i];


	$xml_cijena->nodeValue=$passwords[$i];
	$xml_ikona->nodeValue=$tipovi[$i];
	$xml_email->nodeValue=$emails[$i];
	
	
	$xml_artikal->appendChild($xml_id);
	$xml_artikal->appendChild($xml_naziv);
	$xml_artikal->appendChild($xml_ime);
	$xml_artikal->appendChild($xml_prezime);

	$xml_artikal->appendChild($xml_cijena);
	$xml_artikal->appendChild($xml_ikona);
	$xml_artikal->appendChild($xml_email);
	
	
			$xml_artikli->appendChild($xml_artikal);

	
}

$xml->save("korisnici.xml");
echo "true";

?>

