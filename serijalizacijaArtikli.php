
<?php


$ikone = array();
$imena = array();
$cijene = array();

function napuni()
{
    napuniimena();
    napunicijene();
    napunislike();
}


function napuniimena()
{
	global $ikone,$imena,$cijene;
	array_push($imena,"Asus nVidia GeForce GT710");
	array_push($imena,"Asus nVidia GeForce GT730");
	array_push($imena,"Gigabyte nVidia GeForce GT730");
	array_push($imena,"Gigabyte nVidia GeForce GT740");
	array_push($imena,"Asus AMD Radeon Strix");
	array_push($imena,"Asus Strix AMD Radeon");
	array_push($imena,"naziv1");
	array_push($imena,"naziv2");
	array_push($imena,"naziv3");
	array_push($imena,"naziv4");
	array_push($imena,"VGA GIGABYTE nVIDIA GV-N210SL-1GI");
	array_push($imena,"VGA GIGABYTE AMD GV-R724OC-2GI 2.1");
   
    
}

function napunicijene()
{
		global $ikone,$imena,$cijene;

	array_push($cijene,"215.00 KM");
	array_push($cijene,"122.00 KM");
	array_push($cijene,"414.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	array_push($cijene,"215.00 KM");
	
   
}

function napunislike()
{
		global $ikone,$imena,$cijene;

	array_push($ikone,"http://imtec.ba/141998-large_default/asus-nvidia-geforce-gt710-silent-1gb-ddr3.jpg");
	array_push($ikone,"http://imtec.ba/5021-large_default/asus-nvidia-geforce-gt730-1gd3-gt730-sl-1gd3-brk.jpg");
	array_push($ikone,"http://imtec.ba/2752-large_default/gigabyte-nvidia-geforce-gt730-2gb-ddr3-gv-n730-2gi.jpg");
	array_push($ikone,"http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg");
	array_push($ikone,"http://imtec.ba/142082-large_default/asus-amd-radeon-strix-rx460-gaming-4gb-ddr5.jpg");
	array_push($ikone,"http://imtec.ba/3696-large_default/asus-strix-amd-radeon-r7-370-2gb-ddr5-gaming.jpg");
	array_push($ikone,"https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
	array_push($ikone,"http://imtec.ba/43752-home_default/intel-core-i3-4160-3-6-ghz-lga1150-box.jpg");
	array_push($ikone,"https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
	array_push($ikone,"https://cdn4.iconfinder.com/data/icons/computer-hardware/512/RAM.png");
	array_push($ikone,"http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg");
	array_push($ikone,"http://www.plus.ba/assets/products/vga_gigabyte_amd_gv-r724oc-2gi_201.jpg");
	
	
}




napuni();
	global $ikone,$imena,$cijene;


unlink('artikli.xml');

$xml = new DOMDocument();

$xml_artikli = $xml->createElement("artiklovi");
$xml->appendChild($xml_artikli);


for($i=0;$i<count($imena);$i++)
{
	$xml_artikal=$xml->createElement("artikal");

		$xml_id=$xml->createElement("id");

	$xml_id->appendChild($xml->createTextNode((string)($i+1)));
	$xml_artikal->appendChild($xml_id);
	
	
			$xml_naziv=$xml->createElement("naziv");

	$xml_naziv->appendChild($xml->createTextNode($imena[$i]));
	$xml_artikal->appendChild($xml_naziv);
	
	
		$xml_cijena=$xml->createElement("cijena");

	$xml_cijena->appendChild($xml->createTextNode($cijene[$i]));
	$xml_artikal->appendChild($xml_cijena);
	
	$xml_ikona=$xml->createElement("ikona");

	$xml_ikona->appendChild($xml->createTextNode($ikone[$i]));
	$xml_artikal->appendChild($xml_ikona);
	
	
	
	

	$xml_id->nodeValue=(string)($i+1);
	$xml_naziv->nodeValue=$imena[$i];
	$xml_cijena->nodeValue=$cijene[$i];
	$xml_ikona->nodeValue=$ikone[$i];
	
	
	$xml_artikal->appendChild($xml_id);
	$xml_artikal->appendChild($xml_naziv);
	$xml_artikal->appendChild($xml_cijena);
	$xml_artikal->appendChild($xml_ikona);
	
	
			$xml_artikli->appendChild($xml_artikal);

	
}

$xml->save("artikli.xml");
echo "true";

?>

