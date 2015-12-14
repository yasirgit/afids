<?php

// production
//$reportDefDirectory = "xsl_templates/";
//$conn=mysql_connect ("localhost", "afidsApp", "secure2009") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("afids");
//$mysqli = new MySQLI('localhost','afidsApp','afids4020','afids');

// development
require_once('report_functions.php');

// Set a custom error handler so we can present friendly errors
//set_error_handler('errorHandler');

//$bpDefDirectory = "";
//$conn=mysql_connect ("localhost", "sfopeano", "bonanza") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("afids");
//$mysqli = new MySQLI('localhost','root','','afids');

// ATJEU Production
//require_once('/var/www/html/web/reports/lib/report_functions.php');
//require_once('/var/www/html/web/reports/lib/pdf_functions.php');
//require_once('/var/www/html/web/reports/lib/rwUI_Elements.php');
//require_once('/var/www/html/web/reports/lib/rwOutput.php');
//require_once('/var/www/html/web/reports/lib/rwDatabase.php');

$bpDefDirectory = "";
$conn=mysql_connect ("localhost", "afidsApp", "2yf4Gs9") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("afids");
$mysqli = new MySQLI('localhost','afidsApp','2yf4Gs9','afids');

date_default_timezone_set('America/Los_Angeles');

global $date_format_database;
$date_format_database = "Y/m/d";
$date_format_user = "m/d/Y";
$defaultTemplateOption = "afidFrame";
$defaultStylesheet = "afwHTMLReport.xsl";

$emailSenderName = "Angel Flight West";
$emailSenderAddress = "postmaster@angelflightwest.org";

?>