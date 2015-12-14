<script language="javascript" type="text/javascript" src="/js/tabbing.js"></script>
<div id="header">    
<?php if (!$sf_user->getId()): ?>
<div class="login-pannel">
	<!--start login panel-->
	<div class="login-row1">
		<div class="login-top-left">&nbsp;</div>
		<div class="login-top-middle">&nbsp;</div>
		<div class="login-top-right">&nbsp;</div>
	</div>
        <?php
            $form = new sfForm();
            $csrf_tag = $form['_csrf_token'];
        ?>
	<div class="login-row2">
		<div class="login-middle-left">&nbsp;</div>
		<div class="login-middle-middle">
			<h2 class="login-title">AFIDS Login</h2>
			<div class="login_area">
				<form id="login_form" action="<?php echo url_for('secure/signIn')?>" method="post">
                        <?php echo $csrf_tag?>
                        <?php if (has_slot('public_pages_hidden_fields')): ?>
                          <?php include_slot('public_pages_hidden_fields') ?>
                        <?php endif;?>
                  <input type="hidden" value="<?php if(isset($referer)) echo $referer; else echo $sf_request->getUri();?>" name="referer">
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
					<p>No username? <a href="/secure/retrievePassword">Click Here</a><br />
					 Forgot password? <?php echo link_to('Click here.', '/secure/forgotPassword')?></p>
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
		<div class="search_box"><input class="input" type="text" id="search" name="search" /></div>
		<div class="search_btn"><input type="image" src="/images/go.gif" name="go" id="go" /></div>
		
	</div>
</div><!--End top-->
<div class="clear"></div>
<div class="top_menu"> <!--start top menu-->
		<ul>
			<!--<li class="img1.."><a href="http://www.angelflightwest.org/index.php?/about_us/"></a></li>-->
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
	<div class="header2"> <!--start header2 -->
		<ul>
			<li><a href="/"></a></li>
		</ul>
	</div>
	
	
	<div class="pics_area"><div class="pics"></div></div>
	<div class="pics_bottom"></div>
</div><!--End header area-->
</div>