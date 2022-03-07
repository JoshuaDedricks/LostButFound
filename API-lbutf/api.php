<?php
	function get_search_results($search_key, $paginate)
	{
		$sanitized_key_ = $search_key;
		display_ads($sanitized_key_);
		_populate_search_history_($search_key);
		$new_query = "SELECT COUNT(*) FROM found_stuff WHERE name LIKE '%".$sanitized_key_."%' OR littleinfo LIKE '%".$sanitized_key_."%' OR
        location LIKE '%".$sanitized_key_."%' OR  findersname LIKE '%".$sanitized_key_."%'";
		$ini = mysql_query($new_query) or die(mysql_error());
		echo "<div class = 'embody'>";
		if($row = mysql_fetch_array($ini))
		{
			echo "<h4 id = 'ursearch'><b>Your Search(".$sanitized_key_.") returned ".$row[0]. " results <b><h4><hr/>";
			pagination($row[0], $sanitized_key_);
			
			
			
			if($row[0] == 0)
			{
				$first_sub = substr($sanitized_key_, 0, 1);
				$second_sub = substr($sanitized_key_, 0, 2);
				$third_sub = substr($sanitized_key_, 0, 3);
				echo "<h1>You do not have any search results</h1><hr/>";
				?>
					<p>You can try other search terms like <br/> <a href = "search_result.php?search_key=<?php echo $first_sub; ?>" ><?php echo $first_sub ?></a></p>
					<p><a href = "search_result.php?search_key=<?php echo $second_sub; ?>" ><?php echo $second_sub ?></a></p>
					<p><a href = "search_result.php?search_key=<?php echo $third_sub; ?>" ><?php echo $third_sub ?></a></p>
				<?php
			}
		}
		

			if($paginate == 0)
			{
				$start = 0;
				$limit = 6;
			}
			
			if($paginate == 1)
			{
				$start = 0;
				$limit = 6;
			}
			
			if($paginate == 2)
			{
				$start = 7;
				$limit = 12;
			}
			
			if($paginate == 3)
			{
				$start = 13;
				$limit = 18;
			}
			if($paginate == 4)
			{
				$start = 19;
				$limit = 24;
			}
			
			if($paginate == 5)
			{
				$start = 25;
				$limit = 30;
			}
			
			if($paginate == 6)
			{
				$start = 31;
				$limit = 36;
			}
			
			if($paginate == 7)
			{
				$start = 37;
				$limit = 42;
			}
			
			if($paginate == 8)
			{
				$start = 43;
				$limit = 48;
			}
			
			if($paginate == 9)
			{
				$start = 49;
				$limit = 54;
			}
			
			if($paginate == 10)
			{
				$start = 55;
				$limit = 60;
			}
			
			if($paginate == 11)
			{
				$start = 61;
				$limit = 66;
			}
			
			$new_quer = "SELECT * FROM found_stuff WHERE name LIKE '%".$sanitized_key_."%' OR littleinfo LIKE '%".$sanitized_key_."%' OR
			location LIKE '%".$sanitized_key_."%' OR  findersname LIKE '%".$sanitized_key_."%' LIMIT  $start, $limit";
			$in = mysql_query($new_quer) or die(mysql_error());
			
			
			while($boat = mysql_fetch_array($in))
			{
				echo "<div class = 'results'>";
				echo "<img src= 'images/".$boat['picture']."' width = 80 height = 80 id = 'picture'>";
				echo "<p id = 'wholey'>A <i><a href = 'rest.php?result=".$boat['name']."&rand_code=".$boat['random_code']."' target = 'new' id = 'name-list'>".$boat['name']. "</a></i> was found at <i> ".$boat['location']."</i><br/>";
				echo "The finder also told us something like <i> '".$boat['littleinfo']. "'</i><br/>";
				echo "You can contact user on this phone Address : ".$boat['phoneno']."</p>";
				echo "</div><br/>";
			}
			echo "</div>";

//<a href = 'lostit.php?it-fli-\\ck=".$notify_row['random_code']."' id = 'lost_result' target = 'new'>";			
		}
		
		
	
	
	function input_found($item_name, $picture, $location, $finders_name, $little_info, $phone_no)
	{
		if(empty($_SESSION))
		{
			session_start();
		}
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
		}
		
		else
		{
			$username = '';
		}
		$qury = "INSERT INTO found_stuff(id, name, littleinfo, picture, phoneno, location, findersname, username) 
		VALUES(NULL, '".$item_name."', '".$little_info."', '".$picture."', '".$phone_no."',
		'".$location."', '".$finders_name."', '".$username."')";
		
		$initialize = mysql_query($qury) or die(mysql_error());
		
	}
	
	function establish_connection($host, $user, $pass, $db)
	{
		mysql_connect($host, $user, $pass) or die(mysql_error());
		mysql_select_db($db) or die("cannot select database");
	}
	
	function generate_profile()
	{
		//profile generator
		
		if(isset($_SESSION['username']))
		{
			$profile_query = "SELECT * FROM registration_data WHERE username = '".$_SESSION['username']."'";
			$profile_query_init = mysql_query($profile_query) or die(mysql_error());
			
			while($row_profile = mysql_fetch_array($profile_query_init))
			{
				echo $row_profile['username'];
				echo $row_profile['email'];
				echo $row_profile['badges'];
			}
		}
		
	}
	

	
	
	function handle_registration_($username, $password, $email)
	{
		$reg_query = "INSERT INTO registration_data(id, username, password,
		foundstuff, loststuff, recoveredstuff, email, badges, three_way_auth) VALUES(NULL, '".$username."', '".$password."', '', '', '',
		'".$email."', '', '')";
		$init_reg_query = mysql_query($reg_query) or die(mysql_error());
		
		if(empty($_SESSION))
		{
			session_start();
		}
		
		$_SESSION['username'] = $username;
	}
	
	function generate_BMF_profile()
	{
		function get_all_badges()
		{
			
		}
	}
	
	function check_for_match()
	{
		if(empty($_SESSION))
		{
			session_start();
		}
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$match_query = "SELECT name, location, littleinfo FROM lost_stuff WHERE username = '".$username."'";
			$init_match_query = mysql_query($match_query) or die(mysql_error());
			
			while($row_check_init = mysql_fetch_array($init_match_query))
			{
				$segunda_query = "SELECT * FROM found_stuff WHERE name LIKE '%".$row_check_init['name']."%' OR littleinfo LIKE '%".$row_check_init['littleinfo']."%'
				OR location LIKE '%".$row_check_init['location']."%'";
				$seg_init = mysql_query($segunda_query) or die(mysql_error());
				
				
				while($pinsh = mysql_fetch_array($seg_init))
				{
					$delete_notify = "DELETE FROM notification WHERE notificationname = '".$pinsh['name']."' && notificationinfo = '".$pinsh['littleinfo']."' &&
					origin = '".$row_check_init['name']."' && location = '".$pinsh['location']."'";
					$delete_notify_init = mysql_query($delete_notify) or die(mysql_error());
					$random_code = rand(1,1000000);
					$do_pinsh = "INSERT INTO notification(id, username, notificationname, notificationinfo, origin, picture, random_code, code_gen, location)
					VALUES(NULL, '".$username."', '".$pinsh['name']."', '".$pinsh['littleinfo']."', '".$row_check_init['name']."', '".$pinsh['picture']."', '".$random_code."', '".$pinsh['random_code']."', '".$pinsh['location']."')";
					$do_pinsh_query = mysql_query($do_pinsh) or die(mysql_error());
					
				}
				
				
			}
			
			
		}
	}
	
	function show_notification()
	{
	
	check_for_match();
		
		
		if(isset($_SESSION['username']))
		{
			
			$username = $_SESSION['username'];
			
			if(isset($_GET['see-more']))
			{
				echo "<div class = 'not'>";
				$show_n_count = "SELECT COUNT(*) FROM notification WHERE username = '".$username."'";
				$show_n_init = mysql_query($show_n_count) or die(mysql_error());
				
				while($row_n = mysql_fetch_array($show_n_init))
				{
					echo "<p id = 'takenote' >".$row_n[0]."notifications</p>";
				}
				echo "<div class = 'inner'>";
				
				$show_notify = "SELECT * FROM notification WHERE username = '".$username."'";
				$show_notify_init_w_limit = mysql_query($show_notify) or die(mysql_error());
				
				while($no_limits = mysql_fetch_array($show_notify_init_w_limit))
				{
					echo "<img src = 'images/".$no_limits['picture']."' width = 100 height = 100 />";
					echo "<div id='rem'>";
					echo "Some <b>".$no_limits['notificationname']."</b> with brief info : <br/>";
					echo "<b>".$no_limits['notificationinfo']."</b><br/> By the Way it was found at <br/>";
					echo "<b>".$no_limits['location']."</b><br/> A response to what you lost :";
					echo "<b>".$no_limits['origin']."</b></div><br/><hr/><br/>"; 
				}
				echo "</div>";
				echo "</div>";
			}
		
			if($_SERVER['PHP_SELF'] == "/lbutf/index.php")
			{
				$show_notify = "SELECT * FROM notification WHERE username = '".$username."' LIMIT 0,4";
				$show_notify_init = mysql_query($show_notify) or die(mysql_error());
				$row_ch = mysql_num_rows($show_notify_init);
				
				if($row_ch == NULL)
				{
					print "no notifications";
				}
				else
				{
					
					while($notify_row = mysql_fetch_array($show_notify_init))
					{
						echo "<a href = 'lostit.php?it-fli-\\ck=".$notify_row['random_code']."' id = 'lost_result' target = 'new'>";
						?>
						<img src = "images/<?php echo $notify_row['picture']; ?>" width = 70 height = 70 />
						<?php
						echo "Some <b>".$notify_row['notificationname']."</b> with brief info : <br/>";
						echo "<b>".$notify_row['notificationinfo']."</b><br/> By the Way it was found at <br/>";
						echo "<b>".$notify_row['location']."</b><br/> A response to what you lost :";
						echo "<b>".$notify_row['origin']."</b><br/><hr/><br/>";
						echo "</a>";
					}
					
					echo "<a href = 'new.php?see-more=true' target = 'parent'>See more ...</a>";
				}
			}
			
			
			
		}
		
	}
	
	function get_itemlist()
	{
		
		if(isset($_GET['item~list']))
			{
				echo "<div class = 'not'>";
				echo "<div class = 'inner'>";
				if(isset($_GET['paginated']))
				{
					$item_listed = "SELECT * FROM lost_stuff WHERE username = '".$_SESSION['username']."'";
					$query_item_listed = mysql_query($item_listed) or die(mysql_error());
					$num_row = mysql_num_rows($query_item_listed);
					
					if($num_row == NULL)
					{
						echo "You do not have any upload lost items";
					}
					
					while($item_listed_arr = mysql_fetch_array($query_item_listed))
					{
						echo $item_listed_arr['name']."<br/>";
						echo $item_listed_arr['littleinfo']."<br/>";
						echo $item_listed_arr['location']."<br/>";
						echo $item_listed_arr['time']."<br/>";
						echo "<a href = 'edit.php?case=".$item_listed_arr['id']."' target='new'>Edit item info</a><br/><br/>";
					}
				}
				
				else
				{
				
					$item_listed = "SELECT * FROM lost_stuff WHERE username = '".$_SESSION['username']."' LIMIT 0, 5";
					$query_item_listed = mysql_query($item_listed) or die(mysql_error()."which one");
					
					$count_lost = "SELECT COUNT(*) FROM lost_stuff WHERE username = '".$_SESSION['username']."'";
					$count_lost_query = mysql_query($count_lost) or die(mysql_error());
					
					while($countlostrow = mysql_fetch_array($count_lost_query))
					{
						echo "<p id = 'nooflost'>You lost ".$countlostrow[0]." item</p><hr/><br/>";
						if($countlostrow[0] > 5)
						{
							echo "<a href = 'lostit.php?item~list=true&paginated=1'>see more</a><br/>";
						}
						if($countlostrow[0] == 0)
						{	
							echo "<p id = 'nolost'><i>You have no lost items in store !!!</i></p>";
							echo "<p id = 'nooflost'>Looks like, you've been careful with your properties this days
							if you ever loose anything, just go <a href = 'index.php'>back to the homepage</a>,<br/><br/> Click on '<i>Lost something</i>', fill the form, and then look 
							out for <i>notifications</i> on the header of the homepage as well as <i>emails</i>, if you are not satisfied with it, you can use the <i>search engine</i>, Always be precise with <i>search terms</i> so that you
							can get <i>precise results</i>.<br/><br/>
							
							.... @Lostbutfound team</p><hr/>";
						}
						
					}
					
					while($item_listed_arr = mysql_fetch_array($query_item_listed))
					{
						echo "You lost a ".$item_listed_arr['name']."<br/>";
						echo "with information (".$item_listed_arr['littleinfo'].")<br/>";
						echo "@ (".$item_listed_arr['location'].")<br/>";
						echo "on (".$item_listed_arr['time'].")<br/>";
						echo "<a href='lostit.php?delete=true&alias=".$item_listed_arr['id']."'>  Delete to stop receiving notifications on this item</a><br/><br/>";
					}
				}
				echo "</div>";
				echo "</div>";
			}
		
	}
	
	function show_full_n_info()
	{
		
		if(isset($_SESSION['username']))
		{
			if(isset($_GET['it-fli-\ck']))
			{
				echo "<div class = 'not'>";
				$code_generated = $_GET['it-fli-\ck'];
				$full_info_query = "SELECT * FROM notification WHERE random_code = '".$code_generated."'";
				$full_init = mysql_query($full_info_query) or die(mysql_error);
				
				while($row_full = mysql_fetch_array($full_init))
				{
					 //username 	notificationname 	notificationinfo 	origin 	picture 	random_code 	location 
					echo "<img src='images/".$row_full['picture']."' id = 'image_full' width = 450 height = 450 />";
					echo "<div class = 'plat'>";
					echo "Finders name : ".$row_full['username']."<br/><br/>";
					echo "Item name :".$row_full['notificationname']."<br/><br/>";
					echo "Item information".$row_full['notificationinfo']."<br/><br/>";
					echo "Notification originated from (".$row_full['origin'].") that you were searching for. <br/>";
					$cde_query = "SELECT phoneno FROM found_stuff WHERE random_code = '".$row_full['code_gen']."'";
					$cde_init = mysql_query($cde_query) or die(mysql_error());
					
					$reww = mysql_fetch_array($cde_init);
					
					echo "Contact user on this phone address : ".$reww['phoneno'];
					echo "</div>";
					
				}
				echo "</div>";
			}
		}
		
	}
	
	function _populate_search_history_($key)
	{	
		if(isset($_SESSION['username']))
		{
			$history = "INSERT INTO `lostbutfound`.`search_history` (`id`, `username`, `date`, `key`) VALUES (NULL, '".$_SESSION['username']."', NOW(), '".$key."')";
			$query_his = mysql_query($history) or die(mysql_error());
		}
	}
	
	function get_search_history_no($host_s, $use_r, $pas_s, $d_b)
	{
		establish_connection($host_s, $use_r, $pas_s, $d_b);
		if(isset($_SESSION['username']))
		{
			$history_check_no = "SELECT count(*) FROM search_history WHERE username = '".$_SESSION['username']."'";
			$check_query_no = mysql_query($history_check_no) or die (mysql_error());
		
			while($row_check = mysql_fetch_array($check_query_no))
			{	
				echo $row_check[0]."<br/>";
			}
		}
	}
	
	function get_search_history()
	{
		
		if(isset($_SESSION['username']))
		{
			$history_check = "SELECT * FROM search_history WHERE username = '".$_SESSION['username']."'";
			$check_query = mysql_query($history_check) or die (mysql_error());
		
			while($row_check = mysql_fetch_array($check_query))
			{
				echo $row_check['key']."<br/><br/>";
				echo $row_check['date']."<br/>";
			}
		}
		
	}
	
	function badge_checker()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}
	
	function attach_process()
	{
		
	}
	
	function delete_search_history($username)
	{
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$delete = "DELETE FROM search_history WHERE username = '".$username."'";
			$query = mysql_query($delete) or die(mysql_error());
		}		
	}
	
	
	function three_way_auth()
	{
		if(isset($_SESSION['username']))
		{
			 $jackie_randomize = rand(1,10000000);
			 echo $jackie_randomize;
		}
	}
	
	function three_way_auth_falsify()
	{
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username']; 
			$falsify_auth = "UPDATE registration_data WHERE username = '".$username."' set three_way_auth = 'false'";
			$false_query - mysql_query($falsify_auth) or die(mysql_error());
			//security code sent to your phone
		}
	}
	
	function three_way_auth_true()
	{
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			
			$truth_auth = "UPDATE registration_data WHERE username = '".$username."' set three_way_auth = 'true'";
			$true_query - mysql_query($truth_auth) or die(mysql_error());
		}
	}
	
	function receive_ads($url, $name, $little_intro, $category)
	{
		if(isset($_SESSION['username']))
		{
			$ad_query = "INSERT INTO ads(id, url, name, littleinfo, category, username)
			VALUES(NULL, '".$url."', '".$name."', '".$little_intro."', '".$category."',
			'".$_SESSION['username']."')";
			$init_ad_query = mysql_query($ad_query) or die('cannot post ad');
			
			if($init_ad_query)
			{
				echo 'you have successfully posted an ad for url : '.$url.'<br/> and name : '.$name;
			}
			
			else
			{
				echo 'you can try again';
			}
			
		}
	}

	
	function print_lbutf_certificate()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}

	
	function delete_all_notifications()
	{
		if(isset($_SESSION['username']))
		{
			$del_pinsh = "DELETE FROM notification WHERE username = '".$_SESSION['username']."'";
			$del_query = mysql_query($del_pinsh) or die(mysql_error);
			
			if($del_query)
			{
				echo 'all your notifications have been deleted';
			}
			
			else
			{	
				echo 'you can try again';
			}
		}
	}
	
	function display_ads($__key__ads)
	{
	
			$__query = "SELECT * FROM ads ORDER BY RAND() LIMIT 0,5";
			$init__query = mysql_query($__query) or die(mysql_error());
			 $check_ad_row = mysql_num_rows($init__query);
			 
			 if($check_ad_row == NULL)
			 {
				echo "No advertisements now";
				echo "You could post your ads @ www.lbutf/ads";
				echo "or visit the website here";
			 }
				echo "<div class = 'features'>";
				echo "<h5>Ads</h5><br/>";
				while($t_query = mysql_fetch_array($init__query))
				{
					
					
					
					echo "<div id = 'ads'>";
						?>
							<a href = "http://<?php echo $t_query['url']; ?>/" target = "new" id = "adlink" >Visit The website</a>
						<?php 
						echo "<p>".$t_query['name']."</p>";
						echo "<p>".$t_query['littleinfo']. "</p>";
						echo "<p>".$t_query['category']."</p>";
						echo "</div><br/>";	
				}
				echo "</div>";
	}
	
	function send_match_emails()
	{
			$username = $_SESSION['username'];
			$email_query = "SELECT username, email FROM registration_data WHERE
			username = '".$username."'";
			$init_email_query = mysql_query($email_query) or die(mysql_error());
			
			while($__email = mysql_fetch_array($init_email_query))
			{
				$email_check = $__email['email'];
			}
			$email = "This list of found items have a match with the ones you have lost";
			$subject = "You've got a match";
			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/plain; charset=iso-8859-1";
			$headers[] = "From:Lostbutfound <match@lbutf.com>";
			$headers[] = "Bcc: <>";
			$headers[] = "Subject: {$subject}";
			$headers[] = "X-Mailer: PHP/".phpversion();

			mail($to, $subject, $email, implode("\r\n", $headers));
	}
	
	function check_referrer()
	{
	
		if(!isset($_SESSION['username']))
		{
			
			if(!isset($_SESSION['redirect_page']))
			{
				$_SESSION['redirect_page'] = $_SERVER['PHP_SELF'];
				
			}
			$MM_redirectLoginSuccess = "login.php";
			header("Location: ".$MM_redirectLoginSuccess);
		}
		
	}
	
	function _populate_lost_items($name, $littleinformation, $location)
	{
		if(empty($_SESSION))
		{
			session_start();
		}
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$lost_query = "INSERT INTO lost_stuff(id, name, littleinfo, location, username, time) VALUES(NULL, '".$name."', '".$littleinformation."', '".$location."', '".$username."', NOW())";
			$init_lost_query = mysql_query($lost_query) or die(mysql_error());
			
			
		}
	}
	
	function _delete_lost_items()
	{
		if(!empty($_SESSION))
		{
			session_start();
		}
		
		if(isset($_SESSION['username']))
		{
			if(isset($_GET['delete'] ) && isset($_GET['alias']))
			{
				$delete = $_GET['delete'];
				if($delete == 'true')
				{
					$lost_delete = "DELETE FROM lost_stuff WHERE username = '".$_SESSION['username']."' && id = '".$_GET['alias']."'";
					$lost_delete_init = mysql_query($lost_delete) or die(mysql_error());
					$url = "lostit.php?item~list=true";
					header("Location: " . $url);
				}
				
				else
				{
					echo "We don't know who you are but did you just edit that url? <br/>";
					echo "<a href = 'index.php'>Back to homepage</a>";
				}
			}
		}
	}
	
	function edit_setup()
	{
		if(empty($_SESSION))
		{
			session_start();
		}
		
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			if(isset($_GET['edit']) && isset($_GET['al']))
			{
				$edit = $_GET['edit'];
				$alias = $_GET['al'];
				if($edit == 'true')
				{
					$edit_query = "SELECT * FROM lost_stuff WHERE username = '".$username."' AND id = '".$alias."'";
					$edit_query_init = mysql_query($edit_query) or die(mysql_error());
					$edit_num = mysql_num_rows($edit_query_init);
					
					if($edit_num = NULL)
					{
						echo "you cannot edit items you never even uploaded";
						
						
					}
					
					$edit_row = mysql_fetch_array($edit_query_init);
					echo "<div id = 'infolab'>";
					echo "<h1 id = 'hcurrent'>Current information about '".$edit_row['name']."'</h1><hr/>";
					echo "<label>Item Name :</label> ".$edit_row['name']."<br/>";
					echo "<label>Item Location :</label>".$edit_row['littleinfo']."<br/>";
					echo "<label>Where you found it :</label>".$edit_row['location']."<br/>";
					echo "</div>";
					
					echo "<h1 id = 'update'>Update Current information here</h1><hr/>";
					echo "<form method = 'POST' action = '".$_SERVER['PHP_SELF']."'>";
					echo "<input type='text' name='update_name' placeholder = 'newname' id = 'newname' /><br/><br/>";
					echo "<input type='text' name='update_location' placeholder = 'newlocation' id = 'newlocation' /><br/><br/>";
					echo "<textarea name = 'update_info' placeholder='newinformation' id = 'newinfo'></textarea><br/><br/>";
					echo "<button name='update_submit'>UPDATE</button>";
					echo "</form>";
					
				}
				else
				{
					echo 'i\'m surprised you keep on editing url\'s and giving me work to do';
				}
			}
			
			if(empty($_GET))
			{
				$lur = "index.php";
				header("Location: " . $lur);
			}
		}
	}
		//REWARDS
		
		//finder side
	function include_rewards_finder($reward)
	{
		if(isset($_SESSION['username']))
		{
			$reward_query = "INSERT INTO reward_list() VALUES()";
			$init_reward_query = mysql_query($reward_query) or die(mysql_error());
		}
		
		else
		{
			$reward_query = "INSERT INTO reward_list() VALUES()";
			$init_reward_query = mysql_query($reward_query) or die(mysql_error());
		}
	}
	
	function remove_rewards_finder($user_generated_code)
	{
		if(isset($_SESSION['username']))
		{
			$delete_reward = "DELETE FROM reward_list WHERE user_no = '".$user_generated_code."'";
			$init_delete_reward = mysql_query($delete_reward);
		}
		
		else
		{
			$delete_reward = "DELETE FROM reward_list WHERE user_no = '".$user_generated_code."'";
			$init_delete_reward = mysql_query($delete_reward);
		}
	}
	
	function update_reward_finder()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}
	
		//lookout side
		
	function include_rewards_lookout()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}
	
	function remove_rewards_lookout()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}
	
	function update_reward_lookout()
	{
		if(isset($_SESSION['username']))
		{
			
		}
	}
	
	function handle_feedback($feedback)
	{
		if(isset($_SESSION['username']))
		{
			$feedback_query = "INSERT INTO lostbutfound.feedback VALUES(NULL, '".$feedback."', '".$_SESSION['username']."')";
			$feedback_query_init = mysql_query($feedback_query) or die(mysql_error());
			
			if($feedback_query_init)
			{
				echo 'Thanks, the Lostbutfound team just got your feedback';
			}
		}
	}
	

	
	function username()
	{
		if(isset($_SESSION['username']))
		{
			echo $_SESSION['username'];
		}
	}
	function acknowledge()
	{
		if(isset($_GET['name']) && isset($_GET['contact']))
		{
			$name =  $_GET['name'];
			$contact =  $_GET['contact'];
			
			if(($name == '') && ($contact == ''))
			{
				echo 'We are sorry, but no arguments were passed';
			}
			
			else
			{
				
				echo "We used <b>".$name. "</b> as your <i>finders name</i><br/>";
				echo "Users can contact you on this <i>Phone no : </i><b>".$contact."</b>";					
			}
		}
					
	}
	
	
	function pagination($number, $key)
	{
		if($number > 6 && $number <= 12 )
		{
			echo "<ul id = 'pagination'>";
			echo "<li><a href = 'search_result.php?pagin=1&&key=".$key."' >1</a><li>";
			echo "<li><a href = 'search_result.php?pagin=2&&key=".$key."' >2</a><li>";
			echo "</ul>";
		}
		
		if($number > 12 && $number <= 18)
		{
			echo "<ul id = 'pagination'>";
			echo "<li><a href = 'search_result.php?pagin=1&&key=".$key."' >1</a><li>";
			echo "<li><a href = 'search_result.php?pagin=2&&key=".$key."' >2</a><li>";
			echo "<li><a href = 'search_result.php?pagin=3&&key=".$key."' >3</a><li>";
			echo "</ul>";
		}
		
		if($number > 18)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "</ul>";
		}
		
		if($number > 24)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "</ul>";
		}
		
		if($number > 36)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "</ul>";
		
		}
		
		else if($number > 42)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "</ul>";
		}
		
		else if($number > 48)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "</ul>";
		}
		
		else if($number > 54)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "</ul>";
		}
		
		else if($number > 60)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "</ul>";
		}
		
		else if($number > 66)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "</ul>";
		}
		
		else if($number > 72)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "</ul>";
		}
		
		else if($number > 78)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "<li><a href = 'search_result.php?pagin=13'>13</a></li>";
			echo "</ul>";
		}
		
		else if($number > 84)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "<li><a href = 'search_result.php?pagin=13'>13</a></li>";
			echo "<li><a href = 'search_result.php?pagin=14'>14</a></li>";
			echo "</ul>";
		}
		
		else if($number > 90)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "<li><a href = 'search_result.php?pagin=13'>13</a></li>";
			echo "<li><a href = 'search_result.php?pagin=14'>14</a></li>";
			echo "<li><a href = 'search_result.php?pagin=15'>15</a></li>";
			echo "</ul>";
		}
		
		else if($number > 96)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "<li><a href = 'search_result.php?pagin=13'>13</a></li>";
			echo "<li><a href = 'search_result.php?pagin=14'>14</a></li>";
			echo "<li><a href = 'search_result.php?pagin=15'>15</a></li>";
			echo "<li><a href = 'search_result.php?pagin=16'>16</a></li>";
			echo "</ul>";
		}
		
		else if($number > 100)
		{
			echo "<ul id = 'pagination'>";
			echo "<li>1<li>";
			echo "<li><a href = 'search_result.php?pagin=2'>2</a></li>";
			echo "<li><a href = 'search_result.php?pagin=3'>3</a></li>";
			echo "<li><a href = 'search_result.php?pagin=4'>4</a></li>";
			echo "<li><a href = 'search_result.php?pagin=5'>5</a></li>";
			echo "<li><a href = 'search_result.php?pagin=6'>6</a></li>";
			echo "<li><a href = 'search_result.php?pagin=7'>7</a></li>";
			echo "<li><a href = 'search_result.php?pagin=8'>8</a></li>";
			echo "<li><a href = 'search_result.php?pagin=9'>9</a></li>";
			echo "<li><a href = 'search_result.php?pagin=10'>10</a></li>";
			echo "<li><a href = 'search_result.php?pagin=11'>11</a></li>";
			echo "<li><a href = 'search_result.php?pagin=12'>12</a></li>";
			echo "<li><a href = 'search_result.php?pagin=13'>13</a></li>";
			echo "<li><a href = 'search_result.php?pagin=14'>14</a></li>";
			echo "<li><a href = 'search_result.php?pagin=15'>15</a></li>";
			echo "<li><a href = 'search_result.php?pagin=16'>16</a></li>";
			echo "<li><a href = 'search_result.php?pagin=17'>17</a></li>";
			echo "</ul>";
		}
	
	}
	
	
/** LOSTBUTFOUND WEB ANALYTICS STARTS 

#	Day of Launch
#	Month of Launch
#	No. of Requests per Day
#	No. of Searches per Day
#	No. of Searches per Month
#	No. of Registered Users
#	No. of Admin. Login per Day
#	Percentage Increase in searches Per Day (%)
#	domain : analytics.lbutf.com
#	Percentage Increase as of Last Month in searches (%)
#	Percentage Increase as of Last Year in searches (%)
#	Percentage Increase as of Last Month in ads (%)
#	Percentage Increase as of Last Year in ads (%)
#	Percentage Increase as of Last Month in revenue (%)
#	Percentage Increase as of Last Year in revenue (%) 

     END OF LOSTBUTFOUND ANALTICS  **/	
	 
	 function launch_date()
	 {
		
	 }
	 
	 function daily_request()
	 {
		
	 }
	 
	 function monthly_request()
	 {
		
	 }
	 
	 function searches_per_day()
	 {
		
	 }
	 
	 function searches_per_month()
	 {
		
	 }
	
     function run_whois()
	 {
		
	 }
	 
	 function handle_admin_login()
	 {
		
	 }
	 
	 function handle_admin_registration()
	 {
		
	 }
	 
	 function send_admin_request()
	 {
	 
	 }
	 
	 function count_admin_login()
	 {
		
	 }
	 
	 function percent_daily_increase_search()
	 {
		
	 }
	 
	 function percent_monthly_increase_search()
	 {
			
	 }
	 
	 function percent_yearly_increase_search()
	 {
		
	 }
	 
	 //cron jobs
	 
	 function generate_cron_data()
	 {
	 
		
		send_match_emails();

	 }
	 
	 function generate_notification($username)
	 {
		
		check_for_match_cron();
	 }	
	 
	 function remove_notification($username)
	 {
		$notif_del = "DELETE FROM notification WHERE username = '".$username.
		"'";
		$notif_del_init = mysql_query($notif_del) or die(mysql_error());
	 }
	 
	 function check_for_match_cron($username)
	 {
		$cron_query_lost = "SELECT * FROM lost_stuff WHERE username = '".$username."'";
		$init_cron_lost = mysql_query($cron_query_lost) or die(mysql_error());
		
		while($cron_row = mysql_fetch_array($init_cron_lost))
		{
			//tabledata
			//id, username, littleinfo, location, username
			//$nested_query = "SELECT * FROM found_stuff WHERE "
		}
	 }
	 //cronjob constructor
	 function cron_job_constructor()
	 {
		
	 }
	 
?>	
 
