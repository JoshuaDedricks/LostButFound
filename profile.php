<?php
	include("inc/session.php");
	include("inc/form.php");
	
	
?>
<html>
	<head>
		<link rel = "stylesheet" href = "css/profile.css" />
        <link rel = "stylesheet" href = "css/styles.css" />
		<title>
		<?php 
			if(isset($_SESSION['username']))
			{
				$username = $_SESSION['username'];
				
				echo $username. "'s Profile";
			}
			?>
		</title>
	</head>
	
	<body>
		
			
 			<!-- <img src = "images/icon.png" class = "menu-icon" width = 50 height = 50 /> -->
		<header>
            <div id = "logo">
                <img src = "images/lost.png" class = "logo" />
            </div>
            
            <div class = "top-list">
				 	<?php
						if(empty($_SESSION))
						{
							session_start();
						}
						if(isset($_SESSION['username']))
						{
						 
					?>
				<ul class = "top-head">
					<li class = "welc" ><i>Welcome <?php echo $_SESSION['username']; ?> !!</i></li>
                    <li><a href = "index.php">Home</a></li>
                    <li><a href = "foundit.php">Found It</a></li>
					<li><a href = "inc/logout.php">Logout</a></li>
				</ul> 
					<?php
						}
						else
						{
							?>
                            	<ul class = "top-header">
                                	<li><a href = "Foundit.php">Found It</a></li>
                                	<li><a href = "login.php">Login</a></li>
                                </ul>
                            <?php
                            
						}
				?> 
			</div>
		
            
		
		</header>
        
   
        
        <div class = "contain">
			<div class = "bio">
				<h3>Bio</h3>
				<hr/>
			</div>  

			<div class = "lost">
			</div>
			
			<div class = "found">
			</div>
			
			<div class = "notes">
			</div>
        </div>
        
       
        
        <div class = "footer">
        	<div id = " listed">
                <p id = "copyright"><i>&copy; Copyright 2015, Socialcloud, Inc.</i></p>
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
            <div id = "contact-us">
            	<h2 id = "feeds">Feedback</h2><hr/>
            	<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
                	<textarea placeholder = "Tell us what you feel about lostbutfound" name = "feedback"></textarea><br/>
                    <button name = "feed_send">Send</button>
                </form>
            </div>
        </div>		
	<!-- 	<div id = "lost_stuff">
			<h1 id = "lo">Lost Items Here</h1>
			<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type = "text" name = "name" class = "lost_name" /><br/>
				<textarea class = "little_info" name = "information"></textarea>
			</form>
			
			<h1 id = "lo">Lost Items List</h1>
		</div> -->
		
		
	</body>
</html>