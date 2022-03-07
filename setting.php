<?php
	include("inc/session.php");
	include("API-lbutf/api.php");
	check_referrer();
	
	if(!isset($_SESSION['comingsoon']))
	{
		$_SESSION['comingsoon'] = $_SERVER['PHP_SELF'];
	}
	
	
	$header = "ontheway.php";
	
	header("Location: " . $header);
?>