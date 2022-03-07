<?php
	
?>
<html>
	<head>
		<title>Lostbutfound | Search-Results</title>
		<link rel = "stylesheet" href = "css/search_result.css" />
	</head>
	
	<body>
		<header>
         	<div class = "lo">
		 		<img src = "images/lost.png" alt = "logo" id = "logo" />
            </div>
			
			<div id = "top-search-box">
				<form method = "GET" action = "search_result.php">
					<input type = "text" name = "search_key" class = "result-search" autocomplete = "off" />
					<input type = "submit" value = "" name = "submit-form" class = "none" />
				</form>
			</div>
            <div class = "top-list">
				 	<?php
					error_reporting(E_ERROR);
					if(empty($_SESSION))
					{
							session_start();
					}
						if(isset($_SESSION['username']))
						{
						 
					?>
				<ul class = "top-head">
					
                    <li><a href = "index.php">Home</a></li>
					<li><a href = "foundit.php">Foundit</a></li>
					<li><a href = "inc/logout.php">Logout</a></li>
				</ul> 
					<?php
						}
						else
						{
							?>
                            	<ul class = "top-head">
                                	<li><a href = "index.php">Home</a></li>
                                	<li><a href = "login.php">Login</a></li>
                                </ul>
                            <?php
                            
						}
						
					
				?> 
			</div>
		
		</header>
			<div class = "contain">
				
				<div id = "space">
					<h4 id = "adl">Sponsored Ads</h4>
					
					<ul id = "space-settings">
						<li><a href = "search-history.php" target = "new">View Search History</a></li>
						<li><a href = "setting.php" target = "new">Change search settings</a></li>
						<li><a href = "#">Delete Search history</a></li>
					</ul>
				</div>
				<?php
					include ("inc/form.php");
				?>
				
				<div id = "side-bar-left">
				<hr/>
					<p>&copy;2015. SocialCloud, Inc. ALL RIGHTS RESERVED</p>
					<ul class = "foot-lit">
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
                    <li><a href = "#">Investor relations</a></li>
                    <li><a href = "#">Languages</a></li>
                    <li><a href = "#">Contact Us</a></li>
                </ul>
					<p>Version 1.0000, (<a href = "#">REPORT BUG</a>)</p>
				<hr/>
				</div>
				
			</div>
			
			
			
					
	</body>
</html>