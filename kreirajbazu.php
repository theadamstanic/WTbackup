<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = ($GLOBALS["___mysqli_ston"] = mysqli_connect($dbhost,  $dbuser,  $dbpass));
 if(! $conn ) {
 die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 //echo 'Connected successfully';
 

	  
 $sql = 'CREATE Database IF NOT EXISTS adamstanicspirala_db';
 $retval = mysqli_query( $conn, $sql);
 if(! $retval ) {
 die('Could not create database: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 

	  $sql = 'CREATE TABLE artikli( '.'id INT NOT NULL AUTO_INCREMENT, '.
 'naziv VARCHAR(200) NOT NULL, '.
 'cijena VARCHAR(20) NOT NULL, '.
 'ikona VARCHAR(200) NOT NULL, '.
 'primary key (id))';
 
	$sql2 = 'CREATE TABLE korisnici( '.
 'id INT NOT NULL AUTO_INCREMENT, '.
 'username VARCHAR(20) NOT NULL, '.
 'ime VARCHAR(20) NOT NULL, '.
 'prezime VARCHAR(20) NOT NULL, '.
 'password VARCHAR(20) NOT NULL, '.
 'tip VARCHAR(20) NOT NULL, '.
 'email VARCHAR(20) NOT NULL, '.
 
 
 'primary key (id))';
	 
mysqli_select_db($GLOBALS["___mysqli_ston"], 'adamstanicspirala_db');	 
$retval = mysqli_query( $conn, $sql);
 if(! $retval ) {
 die('Could not create table: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 
 $retval = mysqli_query( $conn, $sql2);
 if(! $retval ) {
 die('Could not create table: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
 }
 
 //echo "Table employee created successfully\n";*/
 //echo "Database test_db created successfully\n";
 
 


?>