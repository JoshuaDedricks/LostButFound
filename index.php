<?php
 include("API-lbutf/api.php");
 include("inc/form.php");
 

?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		
		
		
		<title>LostbutFound | Find it</title>
		<link rel = "stylesheet" href = "css/styles.css" />
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
        
        <div class = "container">
        	<div class = "intro">
            	<h2 id = "d1">Over a Billion people loose things everyday,</p></h2><br/>
                <h2 id = "d2">Be the first to find yours.</h2>
               
            </div>
            
            <div class = "main">
				<form method = "GET" action = "search_result.php">
					<input type = "text" name = "search_key" class = "user-id" placeholder = "What you lost, a phone, your book" autocomplete = off />
					<button id = "none" name = "submit-form" ></button>
				</form>
			</div>
		
        </div> 
        
		<div class = "notifications">
			<div id = "enclosed">
			<hr/>
				<?php
					show_notification();
				?>
			</div>
			<img src = "images/top-move.png" id = "move_up" />
		</div>
		
		<div class = "lostit"><br/>
			<h3 id = "fill">Fill this form, were sure you'll find it</h3>
			<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type = "text" name = "it_name" id = "it_name" placeholder = "item-name" />
				<input type = "text" name = "it_locale" id = "it_name" placeholder = "location" /><br/><br/>
				<textarea  name = "it_inf" placeholder = "brief information about the item"> </textarea>
				<input type = "submit" name = "t_lostit" />
				
			</form>
			
			<img src = "images/top-move.png" id = "move" />
			<a href = "lostit.php?item~list=true" target = "new">Check your list of lost items</a>
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
