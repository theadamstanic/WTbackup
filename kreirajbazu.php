<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
 if(! $conn ) {
 die('Could not connect: ' . mysql_error());
 }
 //echo 'Connected successfully';
 

	  
 $sql = 'CREATE Database IF NOT EXISTS AdamStanicSpirala_db';
 $retval = mysql_query($sql, $conn);
 if(! $retval ) {
 die('Could not create database: ' . mysql_error());
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
	 
mysql_select_db("AdamStanicSpirala_db");	 
$retval = mysql_query($sql, $conn);
 if(! $retval ) {
 die('Could not create table: ' . mysql_error());
 }
 
 $retval = mysql_query($sql2, $conn);
 if(! $retval ) {
 die('Could not create table: ' . mysql_error());
 }
 
 //echo "Table employee created successfully\n";*/
 //echo "Database test_db created successfully\n";
 
 


?>