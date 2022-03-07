<?php
	include("API-lbutf/api.php");
	include("inc/form.php");
	include("inc/fileupload.php");
?>

<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !IE]>
<html dir="ltr" lang="en-US">
<![endif]-->
    
    <!-- START HEAD -->
    <head>
        
        <meta charset="UTF-8" />
        <!-- this line will appear only if the website is visited with an iPad -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
        
        <title>Lostbutfound | Found-it</title>
        
        <!-- [favicon] begin -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
        <!-- For iPad3 with retina display: -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x.png" />
        <!-- For first- and second-generation iPad: -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x.png" />
        <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x.png" />
        <!-- [favicon] end -->
        
        <!-- CSSs -->
        <link rel="stylesheet" type="text/css" media="all" href="css/reset.css" /> <!-- RESET STYLESHEET -->
        <link rel="stylesheet" type="text/css" media="all" href="style.css" /> <!-- MAIN THEME STYLESHEET -->
        <link rel="stylesheet" id="max-width-1024-css" href="css/max-width-1024.css" type="text/css" media="screen and (max-width: 1240px)" />
        <link rel="stylesheet" id="max-width-768-css" href="css/max-width-768.css" type="text/css" media="screen and (max-width: 987px)" />
        <link rel="stylesheet" id="max-width-480-css" href="css/max-width-480.css" type="text/css" media="screen and (max-width: 480px)" />
        <link rel="stylesheet" id="max-width-320-css" href="css/max-width-320.css" type="text/css" media="screen and (max-width: 320px)" />
        
        <!-- CSSs Plugin -->
        <link rel="stylesheet" id="thickbox-css" href="css/thickbox.css" type="text/css" media="all" />
        <link rel="stylesheet" id="styles-minified-css" href="css/style-minifield.css" type="text/css" media="all" />
        <link rel="stylesheet" id="buttons" href="css/buttons.css" type="text/css" media="all" />
        <link rel="stylesheet" id="cache-custom-css" href="css/cache-custom.css" type="text/css" media="all" />
        <link rel="stylesheet" id="custom-css" href="css/custom.css" type="text/css" media="all" />
        <link rel="stylesheet" href="css/new_contact.css" type="text/css" media="all" />
	    
        <!-- FONTs -->
        <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
        <link rel='stylesheet' href='css/font-awesome.css' type='text/css' media='all' />
        
        <!-- JAVASCRIPTs -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/comment-reply.js"></script>
        <script type="text/javascript" src="js/jquery.quicksand.js"></script>
        <script type="text/javascript" src="js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="js/jquery.cycle.min.js"></script>
        <script type="text/javascript" src="js/jquery.anythingslider.js"></script>
        <script type="text/javascript" src="js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="js/jquery.easing.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="js/jquery.aw-showcase.js"></script>
        <script type="text/javascript" src="js/layerslider.kreaturamedia.jquery-min.js"></script>
        <script type="text/javascript" src="js/shortcodes.js"></script>
		<script type="text/javascript" src="js/jquery.colorbox-min.js"></script> 
		<script type="text/javascript" src="js/jquery.tweetable.js"></script>
        
    </head>
    <!-- END HEAD -->
    
    <!-- START BODY -->
    <body class="no_js responsive stretched">
        
        <!-- START BG SHADOW -->
        <div class="bg-shadow">
            
            <!-- START WRAPPER -->
            <div id="wrapper" class="group">
                
                <!-- START HEADER -->
              <header>
         	<div class = "logo">
		 		<img src = "images/lost.png" alt = "logo" id = "logo" />
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
				<ul class = "top-header">
					<li class = "welc" ><i>Welcome <?php echo $_SESSION['username']; ?> !!</i></li>
                    <li><a href = "index.php">Home</a></li>
					<li><a href = "ads.php">Post an ad</a></li>
					<li><a href = "inc/logout.php">Logout</a></li>
				</ul> 
					<?php
						}
						else
						{
							?>
                            	<ul class = "top-header">
                                	<li><a href = "index.php">Home</a></li>
                                	<li><a href = "login.php">Login</a></li>
                                </ul>
                            <?php
                            
						}
						
					
				?> 
			</div>
		
		</header>
        
                
               
				<!-- START PRIMARY -->
				<div id="primary" class="sidebar-left">
				    <div class="inner group">
				        <!-- START CONTENT -->
				        <div id="content-page" class="content group">
				            <div class="hentry group">
				                <form id="contact-form-contact-us" class="contact-form" method="POST" enctype="multipart/form-data" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
				                    <div class="usermessagea"></div>
				                    <fieldset>
				                        <ul>
				                            <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Item Name</span>
				                                <br />					<span class="sublabel">This is the name of the item in question</span><br />
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="item_name" id="name-contact-us" class="required" value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
				                   
								   <li class="text-field">
				                                <label for="email-contact-us">
				                                <span class="label">Finders name</span>
				                                <br />					<span class="sublabel">Finders-name</span><br />
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="finders_name" id="email-contact-us" class="required email-validate" value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
											
											<li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Your Telephone Address</span>
				                                <br />					<span class="sublabel">Phone Address</span><br />
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="phone_no" id="name-contact-us" class="required" value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
											
											
											<li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Where you found the item</span>
				                                <br />					<span class="sublabel">Where you found the item</span><br />
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="location" id="name-contact-us" class="required" value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
				                           
				                            <li class="textarea-field">
				                                <label for="message-contact-us">
				                                <span class="label">Give some Information about the item</span>
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span><textarea name="little_info" id="message-contact-us" rows="8" cols="30" class="required"></textarea></div>
				                                <div class="msg-error"></div>
				                            </li>
				                            <li class="submit-button">
				                    
				                                <input type = "file" id = "picture" placeholder = "picture" name = "picture" />
				                                <input type="submit" name="submit" value="DONE" class="sendmail alignright" />			
				                            </li>
				                        </ul>
				                    </fieldset>
				                </form>
				                <script type="text/javascript">
				                    var messages_form_126 = {
				                    	name: "Please, fill in your name",
				                    	email: "Please, insert a valid email address",
				                    	message: "Please, insert your message"
				                    };
				                </script>
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>
				        <!-- END CONTENT -->
				        <!-- START SIDEBAR -->
				        <div id="sidebar-contact" class="sidebar group">
				            <div class="widget-first widget contact-info">
				                <h3>Contact Us</h3><hr/>
				                <div class="sidebar-nav">
				                    <ul>
				                        <li>
				                            <i class="icon-map-marker" style="color:#979797;font-size:20pxpx"></i> 	N/A
				                        </li>
				                        <li>
				                            <i class="icon-envelope" style="color:#979797;font-size:20pxpx"></i> Email: support@lbutf.com
				                        </li>
				                    </ul>
				                </div>
				            </div>
				            <div class="widget-last widget text-image">
				                <h3>Notice for finder</h3>
				               <hr/>
				                <p> you should always try to upload a picture of what you have find to enable people locate their properties easily<br/> ..... @Lostbutfound Team  </p>
				            </div>
				        </div>
				        <!-- END SIDEBAR -->
				        <!-- START EXTRA CONTENT -->
				        <!-- END EXTRA CONTENT -->
				    </div>
				</div>
				<!-- END PRIMARY -->
				
				
				<!-- START COPYRIGHT -->
                
                <!-- END COPYRIGHT -->
            </div>
			
			
            <!-- END WRAPPER -->
        </div>
        <!-- END BG SHADOW -->
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
        <script type="text/javascript" src="js/jquery.custom.js"></script>
        <script type="text/javascript" src="js/contact.js"></script>
        <script type="text/javascript" src="js/jquery.mobilemenu.js"></script> 
        
    </body>
    <!-- END BODY -->
</html>
</html>