<?php
	include("inc/session.php");
	include("API-lbutf/api.php");
	include("inc/form.php");
	
?>

<html>
	<head>
			<title>Lostbutfound | Find it</title>
			<link rel = "stylesheet" href = "css/styles.css" />
			<link rel = "stylesheet" href = "css/lost.css" />	
	</head>
	
	<body>
		<header>
			<img src = "images/lost.png" id = "logo" class = "logo" />
			
			
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
					<li><a href = "foundit.php">Found something</a></li>
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
		
			<?php 
				show_full_n_info();
				get_itemlist();
				_delete_lost_items();
				
				
				
			?>
	
		
		<div class = "footr">
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
