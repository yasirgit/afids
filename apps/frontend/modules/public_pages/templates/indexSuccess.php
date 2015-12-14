<?php //use_javascript('js/tabbing.js');?>
<?php //use_javascript('js/addthis_widget.js');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: AFW </title>
<link rel="stylesheet" href="/css/style.css" type="text/css" />
<!--[if IE 6]>
<script language="javascript" type="text/javascript" src="/js/db_png.js"></script>
<script>
  DD_belatedPNG.fix('img, .top_menu ul li a, .login-row1 .login-top-left, .login-row1 .login-top-middle, .login-row1 .login-top-right, .login-row2 .login-middle-left, .login-row2 .login-middle-middle, .login-row2 .login-middle-right, .login-row3 .login-bottom-left, .login-row3 .login-bottom-middle, .login-row3 .login-bottom-right');
</script>
<![endif]-->
<script language="javascript" type="text/javascript" src="/js/jquery-1.4.4.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/tabbing.js"></script>
<script type="text/javascript" src="/js/addthis_widget.js"></script>
<script type="text/javascript">
    jQuery(document).ready(
        function(){
            $('#login').removeAttr('disabled');
            $('#popup-close').removeAttr('disabled');
        }
    );
</script>
</head>

<body>
<?php if (!$sf_user->getId()): ?>
<div class="login-pannel">
	<!--start login panel-->
	<div class="login-row1">
		<div class="login-top-left">&nbsp;</div>
		<div class="login-top-middle">&nbsp;</div>
		<div class="login-top-right">&nbsp;</div>
	</div>
	<div class="login-row2">
		<div class="login-middle-left">&nbsp;</div>
		<div class="login-middle-middle">
			<h2 class="login-title">AFIDS Login</h2>
			<div class="login_area">
                                <script type="text/javascript">
                                    jQuery(document).ready(function(){
                                        jQuery('#login_form').keypress(function(e){
                                            if(e.which == 13){
                                                $('#login_form').submit();
                                            }
                                        });
                                    });
                                </script>
				<form id="login_form" action="<?php echo url_for('secure/signIn')?>" method="post">
					<input type="hidden" name="referer" value="<?php echo $referer?>"/>
					<?php echo $sf_data->getRaw('csrf_tag')?>
					<div class="login">
						<div class="login_left">User Name :</div>
						<div class="login_right">
							<input type="text" id="lf_username" class="input3" name="username" value="<?php if (isset($username)) echo $username?>"/>
						</div>							
					</div>
					<div class="clear"></div>
					<div class="login">
						<div class="login_left">Password :</div>
						<div class="login_right">
							<input class="input3" type="password" id="lf_password" name="password"/>
						</div>
					</div>
					<div class="clear"></div>
					<div class="login">
						<div class="login_left">&nbsp;</div>
						<div class="login_right">
							<input onclick="$('#login_form').submit(); $('#login').attr('disabled', 'disabled');$('#popup-close').attr('disabled', 'disabled');return false;" type="button" name="login" id="login" value="Login" />
							<button id="popup-close">Cancel</button>
						</div>
					</div>
					<div class="clear"></div>
					<p>No username? <a href="secure/retrievePassword">Click Here</a><br />
					 Forgot password? <?php echo link_to('Click here.', 'secure/forgotPassword')?></p>
			  </form>
	  </div>
  		</div>
  		<div class="login-middle-right">&nbsp;</div>
    </div>
    <div class="login-row3">
		<div class="login-bottom-left">&nbsp;</div>
		<div class="login-bottom-middle">&nbsp;</div>
		<div class="login-bottom-right">&nbsp;</div>
	</div>
	<!--End login panel-->
</div>
<?php endif;?>
<div class="top"> <!--start top-->
	<div class="top_left"></div>
        <?php if (!$sf_user->getId()): ?>
            <div class="loginPanel"></div>
        <?php else:?>            
            <a class="logoutPanel" href="/secure/signOut"></a>            
        <?php endif;?>
	<div class="search"></div>
	<div class="search_area">
		<div class="search_box"><input class="input" type="text" id="search" name="search"/></div>
		<div class="search_btn"><input type="image" src="/images/go.gif" name="go" id="go" /></div>		
	</div>
</div><!--End top-->
<div class="clear"></div>
<div class="top_menu"> <!--start top menu-->
    <ul>
            <li class="img1"><a href="/mission_photo/upload_photo"></a></li>
            <li class="img2"><a href="/contact_request"></a></li>
            <li class="img3">
                    <a href="<?php echo url_for("pending_member/step1")?>"></a>
            </li>
            <li class="img4"><a href="<?php echo url_for("missionRequest/userStep")?>"></a></li>
            <li class="img5"><a href="/calendar"></a></li>
            <li class="img6"><a href="/contact_request/pilot"></a></li>
    </ul>
</div><!--End top menu-->
<div class="header_area"><!--start header area-->
<div class="header"> <!--start header-->
	<div class="header_left">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="701" height="456" title="AFW">
        <param name="movie" value="/flash/AFW_homepage.swf" />
        <param name="quality" value="high" />
		<param name="wmode" value="transparent" />
        <embed src="/flash/AFW_homepage.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="701" height="456" wmode="transparent"></embed>
      </object>
	</div>	
	<div class="header_right">
		<div class="rightImage">
			<div class="rightImage_menu">
				<ul>
					<li><a href="http://www.angelflightwest.org/index.php?/members/become_an_afw_pilot/"></a></li>
					<li><a href="http://www.angelflightwest.org/index.php?/how_it_works/afw_flights/request_a_flight/"></a></li>
					<li><a href="http://www.angelflightwest.org/index.php?/how_you_can_help/angel_flight_west_foundation/"></a></li>
					<li><a href="https://afids.angelflightwest.org/donation_entry.asp"></a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_right_bottom">
		Receive AFW announcements by adding <br/>your email to our list.

			<div class="search_area">
				<div class="search_box"><input class="input2" type="text" id="email" name="email" value="Your Mail"/></div>
				<div class="search_btn"><input type="image" src="/images/submit.gif" /></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<!--End header-->
</div><!--End header area-->
<div class="clear"></div>
<div class="pageview"> <!--start the page view-->
	<div class="content_box"> <!--start content box-->
                <?php include_partial('global/message');?>
		<div class="content_box_left"> <!--start content box left-->
			<h1>Angel Flight West</h1>
			<p><a href="">Angel Flight West</a> is a nonprofit, volunteer-driven organization that arranges free, non-emergency air travel for children and adults with serious medical conditions and other compelling needs. Our network of 1,900 pilots throughout the <a href="#">13 western states</a> donate their aircraft, piloting skills, and all flying costs to help families in need, enabling them to receive vital treatment that might otherwise be inaccessible because of financial, medical, or geographic limitations.  Take a look at our current </p>
		</div><!--End content box left-->
		<div class="content_box_right"> <!--start content box right-->
			<div class="tabMenu"> <!--start tab menu-->
				<ul>
					<li class="selected"><a href="#">Events</a></li>
					<li><a href="#">Recent Passenger Stories</a></li>
				</ul>
				<div class="tabcontentstyle">
					<!--start tab content 1-->
						<div id="tabContent1" class="tab_content">
							<div class="contentBox1">
								<h3>04/02/2011 	</h3>
								<div class="margintop">&raquo; <a href="#">  View all </a></div>
							</div>
							<div class="contentBox2">
								2011 FAA Safety Stand Down
							</div>					
						</div>
					<!--End tab content 1-->
					
					<!--start tab content 2-->
						<div id="tabContent2" class="tab_content">
							<div class="contentBox1">
								<a href="#">A Social Worker Speaks</a>
							</div>
							<div class="contentBox2">
								<h3><a href="#">Sawyer&acute;s Story</a></h3>
								Sawyer's mom talks about her son and how Angel Flight West has helped them.
							</div>					
						</div>
					<!--End tab content 2-->
				</div>
			</div><!--end tab menu-->
			<div class="add"> <!--start addvertisement-->
				<div class="box1 border">
					<h3>New AFW Public Service Announcement</h3>
					<p>Take a look at our new PSA on youtube! Let us know what you think. Share it with others. </p>
				</div>
				<div class="box2 border">
						<h3>Shop & Support AFW </h3>
						<div class="margintop"><img src="/images/amazone.jpg" alt="" /></div>
						<p>Buy anything at Amazon.com through this link and AFW will earn 4-15%. </p>
				</div>
				<div class="box3">
					<h3>Many Thanks to our sponsor Alaska Airlines </h3>
					<div class="margintop"><img src="/images/alaska.jpg" alt="" /></div>
					<p>Donate Alaska Airlines Miles </p>
				</div>
			</div><!--End addvertisement-->
			<div class="clear"></div>			
		</div><!--End content box right-->
	</div><!--End content box-->
	<div class="clear"></div>
</div><!--End the page view-->
<div class="footer"> <!--start footer-->
		<ul>
			<li><a href="#"> Contact Us </a></li>
			<li><a href="#"> FAQs</a></li>
			<li><a href="#"> Privacy Policy</a></li>
			<li><a href="#"> AFW Store </a></li>
			<li class="bookmark"><a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4accfbb84986b4eb"><img src="/images/lg-share-en.gif" alt="" /></a></li>
			<li><span class="padding_left"> &copy; <?php echo date("Y")?> Angel Flight West. All Rights Reserved. Phone: (888) 4-AN-ANGEL or (888) 426-2643</span> </li>
		</ul>
</div><!--End footer-->
	<div class="clear"></div>
	<div class="pageBottom"></div>
</body>
</html>
