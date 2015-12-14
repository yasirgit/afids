<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

  <?php include_title() ?>
  <?php include_http_metas() ?>
    <!--[if IE]>
      <xml:namespace ns="urn:schemas-microsoft-com:vml" prefix="v"/>
      <STYLE>
      v\:* {behavior:url(#default#VML);position:absolute}
      </STYLE>
   <![endif]-->
  <?php include_metas() ?>
  <link rel="shortcut icon" href="/favicon.png" />
  <link rel="stylesheet" href="/css/style.css" type="text/css"/>
  <!--[if lt IE 7]>
    <link rel="stylesheet" href="css/lt7.css" type="text/css"/>
    <script type="text/javascript" src="js/ie-png.js"></script>
  <![endif]-->
</head>
<body>
  <!--wrapper starts-->
  <div class="w1">
    <div class="w2">
      <div id="wrapper" <?php if(!$sf_user->getId()):?>style="padding-top: 220px"<?php endif;?>>
       <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
        <!--logo-->
        <h1 class="logo"><a href="/dashboard">AngelFlight</a></h1>
        <?php }?>
        <!--main starts-->

        <div id="main">
          <!--content starts-->
          <div id="content">
            <?php include_partial('global/message');?>
            <?php echo $sf_content ?>
          </div>
          <!--content ends-->
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) :?>
            <?php include_partial('global/sidebar');?>
          <?php endif;?>

        </div>
        <!--main ends-->
       
        <?php if($sf_user->getId()){?>
        	<?php include_partial('global/header');?>
        <?php }else {?>
        	<?php include_partial('global/headerPublic');?>
        <?php }?>
        <?php include_partial('global/footer');?>
        
      </div>
    </div>
  </div>
  <!--wrapper ends-->
  <?php if (has_slot('popup')) include_slot('popup')?>
</body>
</html>

