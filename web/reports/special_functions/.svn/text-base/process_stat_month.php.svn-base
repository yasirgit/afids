<?php

require_once('/var/www/html/web/reports/config.php');

error_reporting(E_ALL);
ini_set('display_errors', true);

if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = "";
}

$monthArr = array("January","February","March","April","May","June","July","August","September","October","November","December");

if ($action == "") {
	//Confirm their request

	$sql = "SELECT year_no, month_no FROM mission_type_wing_stats ORDER BY year_no DESC, month_no DESC LIMIT 1";
	$find = mysql_query($sql);
  if (mysql_error()) {
		$systemErrMsg = "MySql error: ".mysql_error()." ".$ct_command;
		handle_system_error($systemErrMsg);
	}
	$findRow = mysql_fetch_array($find);
	if ($findRow['month_no'] == 12) {
		$next_year_no = $findRow['year_no'] + 1;
		$next_month_no = 1;
	} else {
		$next_year_no = $findRow['year_no'];
		$next_month_no = $findRow['month_no'] +1;		
	}
	include("../app/templates/input_header.html");

	echo "<h3>Permanent Mission Statistics Processing</h3>";
	echo "<p style=\"font-weight:bold\">Please Confirm</p>";
	echo "<p>You are about to permanently process the mission statistics for the month of ".$monthArr[$next_month_no-1].", ".$next_year_no.". Please be certain that all the mission reports have been processed and any discrepancies reconciled.</p>";
	echo "<p>The processing may take as long as two minutes. Please be patient while the process completes.</p>";
	echo "<p><a href=\"process_stat_month.php?monthNo=$next_month_no&yearNo=$next_year_no&action=confirm\" onclick=\"this.disabled=true\">Click here to confirm that you wish to continue.</a></p>";
	include("../app/templates/input_footer.html");
	exit;

}

if ($action == "confirm") {
	if (isset($_REQUEST['monthNo'])) {
		$month_no = $_REQUEST['monthNo'];
	} else {
		// that is an error
		$errorMsg = "The month was not passed.";
		handle_system_error($errorMsg);
	}
	if (isset($_REQUEST['yearNo'])) {
		$year_no = $_REQUEST['yearNo'];
	} else {
		// that is an error
		$errorMsg = "The year was not passed.";
		handle_system_error($errorMsg);
	}
	if ($month_no == "") {
		// that is an error
		$errorMsg = "The month passed is not valid.";
		handle_system_error($errorMsg);
	}
	if ($year_no == "") {
		// that is an error
		$errorMsg = "The year passed is not valid.";
		handle_system_error($errorMsg);
	}
	include("../app/templates/input_header.html");
	$paramString = $month_no.",".$year_no;
	$query = "CALL afids.rp_insert_mission_type_wing_stats(".$paramString.")";
	if ($mysqli->multi_query($query)) {
		echo "<h3>Permanent Mission Statistics Processing</h3>";
		echo "<p style=\"font-weight:bold\">Success</p>";
		echo "<p>The permanent statistics were saved successfully.</p>";
		// process the charts now
	} else {
		echo "<h3>Error</h3>";
		echo "<p>The statistics were not saved. The following error was returned:</p>";
		echo "<p>".mysql_error()."</p>";
	}

	echo "<p><a href=\"/reports/reports.php?action=display&reportDef=report_specs.xml&reportName=missionTypeWingStatsLeg&wingID=&yearNo=$year_no&outtype=html\">Return to Report</a></p>";
	include("../app/templates/input_footer.html");
	exit;
}
?>