<?php
session_start();
$q = $_REQUEST["q"];
$brojac=0;
$index=-1;
$ende= false;/*
foreach ($_SESSION["korpa"] as $element)
{
	
	if(!$ende)
	{
		$rijec=substr($element,0 , strpos($element," ") );
	
	if($rijec==$q)
	{
		$index=$brojac;
		$ende=true;
	}
	$brojac++;
	
	
	
	}
}
*/
$niz = array();
$q=(int)$q;

foreach ($_SESSION["korpa"] as $element)
{
	array_push($niz,$element);
}
$_SESSION["korpa"]=array();

for($i=0;$i<count($niz);$i++)
{
	if($i==$q) 
	{
		continue;
	}
	else
	{
		array_push($_SESSION["korpa"],$niz[$i]);
	}
}
?>