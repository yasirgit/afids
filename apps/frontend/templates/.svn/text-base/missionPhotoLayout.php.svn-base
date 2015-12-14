<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

  <?php include_title() ?>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <link rel="shortcut icon" href="/favicon.png" />

  <!--[if lt IE 7]>
    <link rel="stylesheet" href="css/lt7.css" type="text/css"/>
    <script type="text/javascript" src="js/ie-png.js"></script>
  <![endif]-->
</head>
<body>
  <!--wrapper starts-->
  <div class="w1">
    <div class="w2">
      <div id="wrapper">
        <!--logo-->
        <h1 class="logo"><a href="/">AngelFlight</a></h1>
        <!--main starts-->

        <div id="main">
          <!--content starts-->
          <div id="content">
            <?php include_partial('global/message');?>
            <?php echo $sf_content ?>
          </div>
          <!--content ends-->
          
          <?php include_partial('global/sidebar');?>

        </div>
        <!--main ends-->
        
        <?php if (!$sf_user->hasCredential(array('Staff', 'Administrator'), false)) {?>
				<?php $nav_menu = get_slot('nav_menu');
				if (!isset($nav_menu[0])) $nav_menu[0] = '';
				if (!isset($nav_menu[1])) $nav_menu[1] = '';
				?>
				<!--header starts-->
				<div id="header">
				  <!--additional navigation-->
				  <div class="ad-nav">
				    <ul>
				      <li><a href="/">AFW West Home</a></li>
				    </ul>
				  </div>
				  <p class="welcome">Welcome, <?php echo $sf_user->getFirstname().' '.$sf_user->getLastname();?> of Angel Flight West</p>
				  
				</div>
				<!--header end-->
				<?php } else {?>
				<?php include_partial('global/header');?>
				<?php }?>
        <?php include_partial('global/footer');?>
      </div>
    </div>
  </div>
  <!--wrapper ends-->
  <?php if (has_slot('popup')) include_slot('popup')?>
</body>
</html>

