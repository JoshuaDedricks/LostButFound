<?php include("inc/form.php"); ?>
<html>
	<head>
		<title>New Account</title>
	</head>
	
	<body>
		<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type = "email" name = "email" placeholder = "email" />
			<input type = "text" name = "username" placeholder = "username" />
			<input type = "password" name = "password" placeholder = "password" />
			<input type = "password" name = "auth" placeholder = "Retype password" />
			<input type = "submit" name = "register_account" />
		</form>
	</body>
</html>