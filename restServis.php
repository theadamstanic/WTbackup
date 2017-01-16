<?php

function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {

$ids=array();
$nazivi=array();
$cijene=array();
$ikone=array();

$dbhost=getenv('MYSQL_SERVICE_HOST');
$dbuser = 'spirala';
$dbpass = 'password';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
if(! $conn ) {
die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
 mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');

 $sql = 'SELECT id,naziv,cijena,ikona FROM artikli';
 $retval = mysqli_query( $conn ,  $sql);
 if(! $retval ) {
 die('Could not get data: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 while($row = mysqli_fetch_assoc($retval)) {
	
		array_push($ids,"{$row['id']}");
		array_push($nazivi,"{$row['naziv']}");
		array_push($cijene,"{$row['cijena']}");
		array_push($ikone,"{$row['ikona']}");
		
			//$string = $string."|". "{$row['id']}"."*". "{$row['naziv']}" . "^" . "{$row['cijena']}" . "%" . "{$row['ikona']}";
		}
		
		$podaci=array();
		$artikli=array();

		for($i=0;$i<count($ids);$i++)
		{
			$artikal=(object)array('naziv'=>$nazivi[$i],'cijena'=>$cijene[$i],'ikona'=>$ikone[$i]);
			//array_push($artikal,$ids[i])
			//array_push($podaci,$ids[$i].)
			array_push($artikli,$artikal);
		}
		$final=array('artikli'=>$artikli);
		echo json_encode($final);

}



function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}


?>