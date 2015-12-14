<?php

// Get the parameters that were passed
if (isset($_REQUEST['debug'])) {
	$debug = $_REQUEST['debug'];
} else {
	$debug = 0;
}

if ($debug == 0) {
	error_reporting(E_ERROR);
	ini_set('display_errors', false);
} else {
	error_reporting(E_ALL);
	ini_set('display_errors', true);
}

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once('/var/www/html/web/reports/config.php');

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	// that is an error
	$errorMsg = "No value for the action was passed.";
	handle_system_error($errorMsg);
}

if (isset($_REQUEST['memberid'])) {
	$member_id = $_REQUEST['memberid'];
} else {
	// that is an error
	$errorMsg = "The member ID was not passed.";
	handle_system_error($errorMsg);
}

if ($action == "badge") {
	$sql = "UPDATE member Set badge_made = Now() WHERE id = ".$member_id;
	$update = mysql_query($sql);
	if (!$update) {
		// throw an error
		$errorMsg = "There was an error updating the member.";
		handle_system_error($errorMsg);
	} else {
		// redirect back to the report
		$url = "/reports/reports.php?action=display&reportDef=report_specs.xml&reportName=newMembersNeedingBadge&wing=&outtype=html";
		header("Location: $url");
		exit;
	}
}

if ($action == "notebook") {
	$sql = "UPDATE member Set notebook_sent = Now() WHERE id = ".$member_id;
	$update = mysql_query($sql);
	if (!$update) {
		// throw an error
		$errorMsg = "There was an error updating the member.";
		handle_system_error($errorMsg);
	} else {
		$url = "/reports/reports.php?action=display&reportDef=report_specs.xml&reportName=newMembersNeedingBadge&wing=&outtype=html";
		header("Location: $url");
		exit;
	}
}
?>