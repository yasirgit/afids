<?php
error_reporting(E_ALL);
//error_reporting(E_ERROR);
ini_set('display_errors', true);
//ini_set('display_errors', false);


//added by Singleton to check the permission for the reports

ini_set('memory_limit', '382M');
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
$context = sfContext::createInstance($configuration);
$user = $context->getUser();

$user = $context->getUser();

require_once('config.php');

// $reportDefDirectory comes from the report_config.php file
$reportDefFileName = $reportDefDirectory."report_specs.xml";
$reportDefXML = simplexml_load_file($reportDefFileName);
if (!$reportDefXML) {
	// throw and error
	$errMsg = "The report definition file was not passed";
	handle_xml_error($errMsg);
}

// Get the global permissions
$xpathQuery = ".//globalInfo/security/userRoles/userRole";
$global_permissions = $reportDefXML->xpath($xpathQuery);
$roleArr = array();
foreach($global_permissions as $global_permission) {
	$globalRoleArr[] = $global_permission;
}

if (!$user->hasCredential($globalRoleArr,false)) {
	header('Location:/secure/signIn');	
}

$reportStylesheetFileName = $reportDefDirectory."report_menu.xsl";
$xsl = new DomDocument;

if (!$xsl->load($reportStylesheetFileName)) {
	echo 'failed'.$reportStylesheetFileName;
}
$stylesheet = new XsltProcessor();
$stylesheet->importStylesheet($xsl);
		
if (!$translatedResponse = $stylesheet->transformToXML($reportDefXML)) {
	echo "XSL Failed";
}
//echo $translatedResponse;
//exit;
$sortedXML = simplexml_load_string($translatedResponse);
if (!$sortedXML) {
	echo "xsl error";
}


	include("header.php"); 
	echo "<h2>Reports</h2>";
	$xpathQuery = ".//report";
	$reports = $sortedXML->xpath($xpathQuery);
	$lastCat = "";
	$lastCat_2 = "";
	$currentLevel = 0;
	$reportRoleArr = array();
	echo "<ul>";
	foreach ($reports as $report) {
		$report_permissions = null;
		$reportRoleArr = null;
		// check the report specific permissions, if there are any. if not, the global permissions take precedence
		$xpathQuery = "security/userRoles/userRole";
		$report_permissions = $report->xpath($xpathQuery);
		if ($report_permissions) {
			foreach($report_permissions as $report_permission) {
				$reportRoleArr[] = $report_permission;
			}
		} else {
			$report_permissions = null;
			$reportRoleArr = null;
		}
		if ($report->active == 'true') {
			if (strcmp($report->category,$lastCat) && $report->category != '') {
				 if ($currentLevel == 1) echo "</ul>";
				 if ($currentLevel == 2) echo "</ul></ul>";
				 echo "<li class=\"category\">".$report->category."</li><ul>";
				 $currentLevel = 1;
			}
			if (strcmp($report->category_2,$lastCat_2) && $report->category_2 != '') {
				 if ($currentLevel == 1) echo "</ul>";
				 if ($currentLevel == 2) echo "</ul></ul>";
				echo "<ul><li class=\"subcategory\">".$report->category_2."</li><ul>";
				$currentLevel = 2;
			}
			if ($report_permissions == null || $user->hasCredential($reportRoleArr,false)) {			
				echo "<li class=\"report\">";
				if ($report->active == 'true') {
					echo "<a href=\"reports.php?reportDef=report_specs.xml&reportName=".$report->reportName."\">".$report->title."</a></li>";
				} else {
					echo $report->title."</li>";
				}
			}
			$lastCat = $report->category;
			$lastCat_2 = $report->category_2;
		}
	}
	echo "</ul>";
	include("footer.php");
?>
