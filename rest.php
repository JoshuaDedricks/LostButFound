<?php 
	include("API-lbutf/api.php");
	include("inc/form.php");
	
	if(isset($_GET['result']) && isset($_GET['rand_code']))
	{
		
		if(($_GET['result'] == '') || ($_GET['rand_code'] == ''))
		{
			echo "thanks for editing that url";
		}
		
		else
		{
			$query = "SELECT * FROM found_stuff WHERE random_code = '".$_GET['rand_code']."'";
			$query_init = mysql_query($query) or die(mysql_error());
			
			echo "<div class = 'full_in'>";
			while($query_ro_init = mysql_fetch_array($query_init))
			{
				echo "<img src='images/".$query_ro_init['picture']."' width = 400 height = 400 />";
				echo "<div id = 'intact'>";					
				echo $query_ro_init['name'];
				echo " was found at <i>".$query_ro_init['location']."</i>";
				echo " with information like : <br/> ".$query_ro_init['littleinfo']."<br/>";
				echo "Finder name : <i>".$query_ro_init['findersname']."</i><br/>";
				echo "it was found on <i>".$query_ro_init['time']."</i><br/><br/>";
				echo "You can contact finder on this phone address : ".$query_ro_init['phoneno'];
				echo "</div>";
			}
			echo "</div>";
		}
	}
	
	else
	{
		
	}
	
	
?>
<html>
	<head>
				<title>LostbutFound | Find it</title>
		<link rel = "stylesheet" href = "css/styles.css" />
		<link rel = "stylesheet" href = "css/flip.css" />
		<style type = "text/css">
			body
			{
				overflow:hidden;
			}
		</style>
		
	

		
	</head>
	
	<body>

	
		 <header>
         	<div class = "logo">
		 		<img src = "images/lost.png" alt = "logo" id = "logo" />
            </div>
			<script src = "js/jquery-2.1.3.min.js"></script>
			<script src = "js/pd.js"></script>
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
                    <li><a href = "foundit.php">Found It</a></li>
					<li><a href = "#" class  = "notify">Notifications</a></li>
					<li><a href = "#" id = "dlost">Lost something</a></li>
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
		
		 <div class = "foot">
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
</html>