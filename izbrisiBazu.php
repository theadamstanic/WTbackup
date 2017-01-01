<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
 if(! $conn ) {
 die('Could not connect: ' . mysql_error());
 }
 //echo 'Connected successfully';
 

	  
 $sql = 'DROP Database AdamStanicSpirala_db';
 $retval = mysql_query($sql, $conn);
 if(! $retval ) {
 die('Could not create database: ' . mysql_error());
 }

?>