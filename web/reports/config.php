<?php

// production
//$reportDefDirectory = "xsl_templates/";
//$conn=mysql_connect ("localhost", "welock", "secure2009") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("afids");
//$mysqli = new MySQLI('localhost','afidsApp','afids4020','afids');

// development

require_once('lib/report_functions.php');
require_once('lib/pdf_functions.php');
require_once('lib/rwUI_Elements.php');
require_once('lib/rwOutput.php');
require_once('lib/rwDatabase.php');


// Set a custom error handler so we can present friendly errors
set_error_handler('errorHandler');

//$reportDefDirectory = "xsl_templates/";
//$conn=mysql_connect ("localhost", "sfopeano", "bonanza") or die ('I cannot connect to the database because: ' . mysql_error());
//mysql_select_db ("afids");
//$mysqli = new MySQLI('localhost','root','','afids');

// ATJEU Production
/*
require_once('lib/report_functions.php');
require_once('lib/pdf_functions.php');
require_once('lib/rwUI_Elements.php');
require_once('lib/rwOutput.php');
require_once('lib/rwDatabase.php');
*/

$reportDefDirectory = "xsl_templates/";
$conn=mysql_connect ("localhost", "afidsApp", "2yf4Gs9") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("afids");
$mysqli = new MySQLI('localhost','afidsApp','2yf4Gs9','afids');

global $date_format_database;
$date_format_database = "Y/m/d";
$date_format_user = "m/d/Y";
$defaultTemplateOption = "afidFrame";
$defaultStylesheet = "afwHTMLReport.xsl";

$emailSender = "postmaster@angelflightwest.org";

?>