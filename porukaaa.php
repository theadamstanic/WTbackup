<?php
ob_start();
$ime = $_POST["ime_kontakt"];
$prezime = $_POST["prezime_kontakt"];
$poruka = $_POST["poruka_kontakt"];
/*

$ime = htmlspecialchars($ime, ENT_QUOTES, "UTF-8");
	$prezime = htmlspecialchars($prezime, ENT_QUOTES, "UTF-8");
	$poruka = htmlspecialchars($poruka, ENT_QUOTES, "UTF-8");

	*/
	$imena=array();
	$prezimena=array();
	$poruke=array();
	
	$row = 1;
if (($handle = fopen("CSVPoruke.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $row++;
	if($row>2)
	{
		array_push($imena,$data[0]);
			array_push($prezimena,$data[1]);
			array_push($poruke,$data[2]);
	}		
    }
    fclose($handle);
}

$data=array();

for($i=0;$i<count($imena);$i++)
{
	array_push($data,$imena[$i].",".$prezimena[$i].",".$poruke[$i]);
}

array_push($data,$ime.",".$prezime.",".$poruka);



//header('Content-Type: application/excel');
//header('Content-Disposition: attachment; filename="CSVPoruke.csv"');


$fp = fopen('CSVPoruke.csv', 'w');
$pocetak=explode(",","ime,prezime,poruka");
fputcsv($fp,$pocetak);
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);
ob_get_contents();


?>