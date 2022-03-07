<?php
	include ("inc/session.php");
	include ("inc/form.php");
?>
<html>
	<head>
		<title>Post your Ads | <?php echo $_SESSION['username']; ?> </title>
	</head>
	
	<body>
		
		<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type = "text" name = "name" placeholder = "name" /><br/>
			<input type = "text" name = "url" placeholder = "url" /><br/>
			<textarea  name = "intro" placeholder = "intro"></textarea><br/>
			<h2>Category</h2>
			<hr/>
			<select placeholder = "Category" name = "category">
				<option>Business</option>
				<option>Tech Startup</option>
				<option>Sales Firm</option>
				<option>Stylist Website</option>
				<option>Sports Website</option>
				<option>Business</option>
			</select>
			
			<input type = "submit" name = "ad_submit" /> 
		</form>
		
	</body>
</html>