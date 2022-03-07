<?php
	include("API-lbutf/api.php");
	include("inc/form.php");
?>
<html>
	<head>
		<title>Thanks a Lot</title>
		<link rel = "stylesheet" href = "css/styles.css" />
		<link rel = "stylesheet" href = "css/ack.css" />
	</head>
	
	<body>
		<header>
         	<div class = "logo">
		 		<img src = "images/lost.png" alt = "logo" id = "logo" />
            </div><hr/>
            <div class = "top-list">
				 	<?php
						if(empty($_SESSION))
						{
							session_start();
						}
						if(isset($_SESSION['username']))
						{
						 
					?>
				<ul class = "top-header">
					<li class = "welc" ><i>Welcome <?php echo $_SESSION['username']; ?> !!</i></li>
					<li><a href = "index.php">Home</a></li>
                    <li><a href = "foundit.php">Found It</a></li>
					<li><a href = "profile.php">Profile</a></li>
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
		
		<div class ="ack-contain">
			<div class = "ack">
				<h1>Thanks <?php username(); ?></h1><hr/>
					
				<p>That's impressive, you have found something, do you know you can attach rewards
				to the items you have <br/> found, add rewards here <a href = "add-reward.php" id = "finger">Add rewards</a></p><br/>
				<p>Wanna know how Lostbutfound works <a href = "#" id = "finger">The Lostbutfound</a></p>
				
				<h3>Notice</h3>
				<?php
					acknowledge();
					
				?>
				
				<p id = "thanks"><i><b>Thanks once again !! @Lostbutfound Team</b></i></p>
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
        </div>		
	</body>
</html>