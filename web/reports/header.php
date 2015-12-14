<?php
//added by Singleton to check the permission for the reports

ini_set('memory_limit', '382M');
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
$context = sfContext::createInstance($configuration);
$user = $context->getUser();

sfContext::getInstance()->getConfiguration()->loadHelpers('Partial', 'Asset');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<script type="text/javascript" src="/reports/js/jquery.js"></script>
<script type="text/javascript" src="/reports/js/jquery-ui-1.8rc3.custom.min.js"></script>
<script type="text/javascript" src="/reports/js/tabs.js"></script>
<script type="text/javascript" src="/reports/js/hover.js"></script>
<script type="text/javascript" src="/reports/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script> 
<link rel="stylesheet" type="text/css" media="screen" href="/reports/css/all.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/reports/css/reports.css" /> 
<link rel="stylesheet" type="text/css" media="screen" href="/reports/css/demo_table.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/reports/css/ui-lightness/jquery-ui-1.8rc3.custom.css" /> 
<link rel="shortcut icon" href="/favicon.png" />
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("input[class='datePick']").datepicker();
	});
</script>
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
            