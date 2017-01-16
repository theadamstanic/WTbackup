<?php


require_once('fpdf/fpdf.php');
$pdffajl = new FPDF();


$title = 'Artikli_pdf';
$pdffajl->SetTitle($title);

$pdffajl->AddPage();




$pdffajl->SetFont('Arial','B',18);

$pdffajl->Cell(40,10,'Pregled korisnika:',0,1,'c');
$pdffajl->SetFont('Arial','B',10);

$ids=array();
$imena=array();
$prezimena=array();
$usernames=array();
$passwords=array();
$emails=array();
$tipovi=array();


$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');

 
 $sql = 'SELECT id,username,ime,prezime,password,tip,email FROM korisnici';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	 array_push($ids,"{$row['id']}");
	 array_push($imena,"{$row['ime']}");
	 array_push($prezimena,"{$row['prezime']}");
	 array_push($usernames,"{$row['username']}");
	 array_push($passwords,"{$row['password']}");
	 array_push($emails,"{$row['email']}");
	 array_push($tipovi,"{$row['tip']}");
	 
  
  
 }

/*

$file = 'korisnici.xml';
    if(!$xml = simplexml_load_file($file))
        exit('Failed to open '.$file);

	foreach($xml->children() as $artikal){

	array_push($ids,$artikal->id);
	array_push($imena,$artikal->ime);
	array_push($prezimena,$artikal->prezime);
	array_push($usernames,$artikal->username);
	array_push($passwords,$artikal->password);
	array_push($emails,$artikal->email);
	array_push($tipovi,$artikal->tip);

	
	
}*/
	
for ($i=0; $i<count($ids); $i++)
{
    $pdffajl->Cell(40,10,'id:'.$ids[$i].' . Ime: '.$imena[$i].' Prezime: '.$prezimena[$i]. ' Username: ' . $usernames[$i]. ' Password: ' . $passwords[$i] . ' Email: ' . $emails[$i] . ' Tip: ' . $tipovi[$i],0,1);
    
    
    
}





//$pdffajl->Output();

$pdffajl->Output('pdffajl.pdf', 'F');


$contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('pdffajl.pdf') . "\";");
        readfile('pdffajl.pdf');
        exit();
?>