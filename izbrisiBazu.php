<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
 if(! $conn ) {
 die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 //echo 'Connected successfully';
 

	  
 $sql = 'DROP Database adamstanicspirala_db';
 $retval = mysqli_query( $conn, $sql);
 if(! $retval ) {
 die('Could not create database: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }

?>