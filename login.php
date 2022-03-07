<?php 
	include ("inc/session.php"); 
	include("API-lbutf/api.php");
	include ("inc/form.php");
	
	
	
	if(isset($_SESSION['username']))
	{
		$redirect_p = "index.php";
		header("Location: ". $redirect_p);
	}
?>

<html>
	<head>
		<title>Lostbutfound | Login</title>
        <link rel = "stylesheet" href = "css/styles.css" />
        <link rel = "stylesheet" href = "css/login.css" />
	</head>
	
	<body>
    
    <header>
    	<div class = "logo">
        	<img src = "images/lost.png" alt = "logo" id = "logo" />
        </div>
        
        <div class = "top-list">
        	<ul class = "top-header">
        		<li><b><a href = "#" id = "expect">We've been expecting you</a></b></li>
        		<li><b><a href = "Foundit.php" id = "foun">Found It</a></b></li>
        	</ul>
        </div>
		
    </header>
    <div class = "contain">
    	<div class = "login-form">
            <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" id = "commit">
            	<h3 id = "already">Already have an account, Sign in</h3>
                <input type = "text" name = "user_id" placeholder="username" id = "uer" />
                <input type = "password" name = "user_password" placeholder="password" id = "sap" />
                <input type = "submit" name = "handle_login" value = "Log in" id = "el_sub" />
            </form>
			<p id = "problems"><b><a href = "problems.php" class = "p_link">Having problems with sign in ?</a></b></p>
		
			<br/><br/><br/>
            <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" id = "form_reg">
            	<h3 id = "alread">You Don't have an account yet, Sign up</h3>
                <input type = "email" name = "email" placeholder = "email" id = "thesame" /><br/><br/>
                <input type = "text" name = "username" placeholder = "username" id = "thesame" /><br/><br/>
                <input type = "password" name = "password" placeholder = "password" id="thesame" /><br/><br/>
                <input type = "submit" name = "register_account" value="Register" />
			</form>
         </div>
     </div>
     <?php
		if(isset($_SESSION['redirect_page']))
		{
			$url = $_SESSION['redirect_page'];
		}
		else
		{
			$url = "index.php";
		}
		
		if(isset($_POST['handle_login']))
			{
				if(!empty($_POST['user_id']) && !empty($_POST['user_password']))
				{
					$username_id = $_POST['user_id'];
					$pass_id = md5($_POST['user_password']);
					
					$logon_query = "SELECT username, password FROM registration_data 
					WHERE username = '".$username_id."' AND password = '".$pass_id."'";
					$init_logon_query = mysql_query($logon_query) or die(mysql_error());
					$found_user = mysql_num_rows($init_logon_query);
					if($found_user)
					{
						if(empty($_SESSION))
						{
							session_start();
						}
						if(!isset($_SESSION['username']))
						{
							$_SESSION['username'] = $username_id;
						}
						header("Location: ". $url);
					}else{
						
						print "<p id = 'nomatch'><i>Incorrect username and password combination</i></p>";
					
					}
	
				}
				else
				{
					print "<p id = 'nomatch'><i>Empty input</i></p>'";
				}
			}
		
	 ?>
    <div class = "footer">
        	<div id = " listed">
                <p id = "copyright"><i>&copy; 2015 Socialcloud, Inc. </i><b>ALL RIGHTS RESERVED</b></p>
                <ul class = "footer-list">
                    <li><a href = "#">Privacy Policy</a></li>
                    <li><a href = "#">Terms of Use</a></li>
                    <li><a href = "#">Ads</a></li>
                    <li><a href = "#">Business</a></li>
                    <li><a href = "#">About Us</a></li>
                    <li><a href = "#">Careers</a></li>
                    <li><a href = "#">The Lostbutfound </a></li><br/><br/>
                    <li><a href = "#">Licenses</a></li>
                    <li><a href = "#">Projects</a></li>
                    <li><a href = "#">Finance</a></li>
                    <li><a href = "#">Investors</a></li>
                    <li><a href = "#">Languages</a></li>
                    <li><a href = "#">Contact Us</a></li>
                </ul>
            </div>
      </div>
	</body>
</html>
