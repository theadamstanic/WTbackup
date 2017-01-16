<?php

session_start();

$string="false";
if(isset($_SESSION["username"]) && isset($_SESSION["tip"]))
{
	if($_SESSION["username"]!="none" && $_SESSION["tip"]!="none")
		$string="true";

	if($_SESSION["tip"]=="admin")
		$string=$string." "."admin";
}


echo $string;


?>