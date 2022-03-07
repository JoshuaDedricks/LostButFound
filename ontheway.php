<?php
	include("inc/session.php");
	
	$cut =  substr($_SESSION['comingsoon'], 7,14);
	
	if($cut = 'setting.php')
	{
		echo "<h1>your settings page is coming soon</h1>";		
	}
	
	
?>