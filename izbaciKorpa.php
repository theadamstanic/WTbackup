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
$q=(string)$q;


foreach ($_SESSION["korpa"] as $element)
{
	array_push($niz,$element);
}
$_SESSION["korpa"]=array();

$nadjen=false;
	foreach($niz as $artikal)
		{
			
				$j=0;
				$id="";
				while($artikal[$j]!=',')
				{
					$id=$id.$artikal[$j];
					$j++;
				}
				if($id==$q && !$nadjen) 
				{
					$nadjen=true;
					continue;
					
				}
				else
				{
					array_push($_SESSION["korpa"],$artikal);
				}
			
	}

	echo "lmao";
?>