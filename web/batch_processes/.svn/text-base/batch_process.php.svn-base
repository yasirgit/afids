<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

/*
Types of emails:
* the recipient dataset contains data that goes into the email body for personalized emails
* each recipient gets the same email body, so there is a separate dataset for the body and the recipient list


*/

require_once('config.php');

// We'll accumulate this string with errors to send to the admin
$error_log = "";

if (isset($_REQUEST['bpDef'])) {
	$bpDef = $_REQUEST['bpDef'];
} else {
	$errMsg = "The batch process definition file was not passed (parameter missing)";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);
}
if (isset($_REQUEST['processName'])) {
	$processName = $_REQUEST['processName'];
} else {
	$errMsg = "The batch process name was not passed";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);
}

if ($bpDef == '') {
	$errMsg = "The batch process definition file was not passed ";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);
}
if ($processName == '') {
	$errMsg = "The batch process name was not passed";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);
}

$bpDefFileName = $bpDefDirectory.$bpDef;
$bpDefXML = simplexml_load_file($bpDefFileName);
if (!$bpDefXML) {
	// throw and error
	$errMsg = "The report definition file could not be parsed.";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);
}

// Check to make sure the report definition is in the file
$xpathQuery = ".//process[processName = '".$processName."']";
$thisProcess = $bpDefXML->xpath($xpathQuery);
if (!$thisProcess) {
	$errMsg = "The definition block was not found for the specified process in the batch process definition XML";
	$error_log.= "<p>".$errMsg;
	log_system_error($errMsg, true);;
}

/*
 Get the top level values for this procedure
*/

$testing = $bpDefXML->test;
$personalized = $thisProcess[0]->personalized;

$subject = $thisProcess[0]->subject;
$subject = replace_variables($subject);

if ($thisProcess[0]->notify_to_name) $notify_to_name = $thisProcess[0]->notify_to_name; else $notify_to_name = "";
if ($thisProcess[0]->notify_to_name->attributes()->useDefault) $ntn_default = $thisProcess[0]->notify_to_name->attributes()->useDefault; else $ntn_default = "";
// the useDefault setting overrides a specified value
if ($ntn_default == 'yes') {
	// look up the default in the globals
	$notify_to_name = get_default('notify_to_name');
}
$notify_to_email = $thisProcess[0]->notify_to_email;
$nte_default = $thisProcess[0]->notify_to_email->attributes()->useDefault;
if ($nte_default == 'yes') {
	// look up the default in the globals
	$notify_to_email = get_default('notify_to_email');
}
$notify_admin_name = $thisProcess[0]->notify_admin_name;
$nan_default = $thisProcess[0]->notify_admin_name->attributes()->useDefault;
if ($nan_default == 'yes') {
	// look up the default in the globals
	$notify_admin_name = get_default('notify_admin_name');
}
$notify_admin_email = $thisProcess[0]->notify_admin_email;
$nae_default = $thisProcess[0]->notify_admin_email->attributes()->useDefault;
if ($nae_default == 'yes') {
	// look up the default in the globals
	$notify_admin_email = get_default('notify_admin_email');
}
// We have to have a sender name, so get the default if the sender name is not specified
if ($thisProcess[0]->sender_name) {
	$sender_name = $thisProcess[0]->sender_name;
	if ($thisProcess[0]->sender_name->attributes()->useDefault) $sn_default = $thisProcess[0]->sender_name->attributes()->useDefault; else $sn_default = "no";
} else {
	$sender_name = "";
	$sn_default = "no";
}
if ($sn_default == 'yes' || $sender_name = "") {
	// look up the default in the globals
	$sender_name = get_default('sender_name');
}
if ($thisProcess[0]->sender_email) {
	$sender_email = $thisProcess[0]->sender_email;
	if ($thisProcess[0]->sender_email->attributes()->useDefault) $se_default = $thisProcess[0]->sender_email->attributes()->useDefault; else $se_default = "no";
} else {
	$sender_email = "";
	$se_default = "no";
}
if ($se_default == 'yes' || $sender_email = "") {
	// look up the default in the globals
	$sender_email = get_default('sender_email');
}
// if the sender name or email is still blank, return an error message


// Create the XML header which includes the process-specific variables
$headerXML = create_xml_header();

// get the email contents
$ct_source = $thisProcess[0]->email_contents->attributes()->source;
$ct_command = $thisProcess[0]->email_contents->command;
$ct_command = replace_variables($ct_command);
if ($thisProcess[0]->email_contents->xsl_file) $ct_style = $thisProcess[0]->email_contents->xsl_file; else $ct_style = null;
if ($thisProcess[0]->email_contents->attach_data) $attach_data = $thisProcess[0]->email_contents->attach_data; else $attach_data = "";
if ($thisProcess[0]->email_contents->attach_filename) $attach_filename = $thisProcess[0]->email_contents->attach_filename; else $attach_filename = "";
if ($thisProcess[0]->email_contents->attach_format) $attach_format = $thisProcess[0]->email_contents->attach_format; else $attach_format = "";
$attach_filename = replace_variables($attach_filename);
if ($thisProcess[0]->email_contents->attach_zip) $attach_zip = $thisProcess[0]->email_contents->attach_zip; else $attach_zip = "";

$attach_result = null;
if ($ct_source == "none") {
	/* There are two possibilities here. 
	There is no dataset, but there is a stylesheet, which means that we just feed variables into the xml and transform it	
	There is no dataset and no stylesheet, which means that 
	*/
	
} else {
	// if this is not personalized, then create the email body once here
	if ($personalized == 'merge') {
		// grab a single dataset here that will be merged with a record for each recipient
		$mergeArr = get_contents_dataset($ct_source, $ct_command, 'contents');
	}
	if ($personalized == 'no') {
		// this function returns xml
		$returnArr = get_contents_dataset($ct_source, $ct_command, 'contents');
		if (!$returnArr) {
			// what do we do if the query returns no results?
			
		}
		$bodyXML = xml($headerXML, $returnArr);

		// if this is going in the body of the email, transform it
		// otherwise, it could be attached as a text, csv, or pdf file
		if ($ct_style) {
			// get html for the email body
			$htmlBody = transform_xml();
		} else {
			// look for a body message in the definition
			if ($thisProcess[0]->notify_email_body) {
				$htmlBody = $thisProcess[0]->notify_email_body;
				$htmlBody = replace_variables($htmlBody);
			} else {
				// put in a generic message so nothing fails
				$htmlBody = "This is a scheduled notification from AFIDS";
			}
		}
		if ($attach_data == "yes") {
			$attach_result = save_attachment();
		} else {
			$attach_result = null;	
		}
		// See if there is an body message to go along with an attachment
	} else {
		// personalized emails cannot have attachments?
		
	}
}

$send_count = 0;
$error_count = 0;

// get the recipients
if ($thisProcess[0]->recipient_list) {
	$rl_source = $thisProcess[0]->recipient_list->attributes()->source;
	$rl_command = $thisProcess[0]->recipient_list->command;
	$rl_command = replace_variables($rl_command);
	$returnArr = get_contents_dataset($rl_source, $rl_command, 'recipients');

	foreach($returnArr as $row) {
		// if the email is personalized, create a new emailbody now using the data from the recipient list
		if ($personalized == "yes" || $personalized == "merge") {
			// create a new dataset and transform it here
			$rowArr[] = $row;
			if ($personalized == 'merge') {
				// merge in the static dataset that we got earlier
				$rowMergeArr[0] = array_merge($rowArr[0], $mergeArr[0]);
				$bodyXML = xml($headerXML, $rowMergeArr);
			} else {
				$bodyXML = xml($headerXML, $rowArr);
			}

			$htmlBody = transform_xml();
		}

		$first_name = $row['firstName'];
		$last_name = $row['lastName'];
		$recipientName = $first_name." ".$last_name;
		$recipientEmail = $row['email'];
		// sender variables come from config.php
		if ($testing == 1) {
			$recipientEmail = "stephan@meliorist.com";
		}
		$result = send_mail($emailSenderName, $emailSenderAddress, $recipientName, $recipientEmail, $subject, $htmlBody, $attach_filename, $attach_result);
		if ($result == "Success") {
			$send_count+= 1;
		} else {
			$error_count+=1;
			// log the error
		}
		if ($testing == 1) break;
	}
}

// Now send the email to the notify list
// Send a copy of the email, plus an email with the results
// the copy of the email will be the last body generated.

if ($testing == 0) {
	echo send_mail($emailSenderName, $emailSenderAddress, $notify_to_name, $notify_to_email, $subject, $htmlBody, $attach_filename, $attach_result);
} else {
	echo send_mail($emailSenderName, $emailSenderAddress, "Stephan Fopeano", "stephan@meliorist.com", $subject, $htmlBody, $attach_filename, $attach_result);	
}
/*
	If there were errors encountered, send an email to the admin
*/

//$notify_admin_name
//$notify_admin_email
//send_mail($emailSylenderName, $emailSenderAddress, $notify_to_name, $notify_to_email, $subject, $textBody, $htmlBody, $attach_filename, $attach_result);

echo "<p>".$send_count." messages sent. Error count: ".$error_count;

/* FUNCTIONS +++++++++++++++++++++++++++++++++++++++ */

function save_attachment() {
	global $returnArr;
	global $attach_format;
	global $attach_filename;
	if ($attach_format == "csv") {
		$csv_string = "";
		$header_string = "";
		$rCounter = 0;
		foreach($returnArr as $row) {
			foreach($row as $field => $value) {
				if ($rCounter == 0) $header_string.= '"'.$field.'",';
				$csv_string.= '"'.$value.'",';
			}
			$rCounter+=1;
			$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
  	}
		$header_string = substr($header_string,0,strlen($header_string)-1)."\n";
		$csv_string = $header_string.$csv_string;
		if ($attach_filename != "") {
			$fOut = fopen("files/".$attach_filename,"w");
			fwrite($fOut, $csv_string);
			fclose($fOut); 
		}
		return $csv_string;
	}
		
	
}

function create_xml_header() {
	global $thisProcess;
	/* This function takes the variables specified in the batch process definition and includes them in the xml dataset that goes
	to transformation. This enables the process creator to insert process specific values
	*/
	$datasetXML = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><afids_batch_process/>");
	// cycle through the variables
	$xPath = "xsl_attributes/xsl_attribute";
	$attributes = $thisProcess[0]->xpath($xPath);
	$variables = $datasetXML->addChild('variables');
	foreach ($attributes as $attribute) {
		$attributeStr = $attribute[0];
		$attributeStr = replace_variables($attributeStr);
		$variables->addChild($attribute->attributes()->name,$attributeStr);
	}
	return $datasetXML;
}

function get_contents_dataset($source, $command, $nodeType) {
	global $thisProcess;
	global $mysqli;

	if ($source == "sql_procedure") {
		$returnArr = array();
		$paramString = "";
		if ($nodeType == 'contents') $parameters = $thisProcess[0]->email_contents->parameters->parameter;
		if ($nodeType == 'recipients') $parameters = $thisProcess[0]->recipient_list->parameters->parameter;
		if (count($parameters) > 0) {
			foreach ($parameters as $parameter) {
				$parameter = replace_variables($parameter);
				$paramString.= "'".$parameter."',";
			}
			if ($paramString != '') $paramString = substr($paramString, 0, strlen($paramString)-1);
		} else $paramString = "";
		$query = "CALL afids.".$command."(".$paramString.")";
		//echo $query;
		//exit;
		if ($mysqli->multi_query($query)) {
 	  	do {
 	     	/* store first result set */
 	       if ($result = $mysqli->store_result()) {
 	       	while ($row = $result->fetch_assoc()) {
 	         	$returnArr[] = $row;
 	         }
 	         $result->free();
 	       }
 	   	} while ($mysqli->next_result());
 	   	$recordCount = 1;
		} else {
			$recordCount = 0;
		}
	}

	if ($source == "sql_text") {
 	 $report_dataSet = mysql_query($command);
 	 if (mysql_error()) {
			$systemErrMsg = "MySql error: ".mysql_error()." ".$command;
			handle_error($systemErrMsg);
		}
		while($row = mysql_fetch_assoc($report_dataSet)) {
			$returnArr[] = $row;
		}
	}
	return $returnArr;
}


function xml($basenode, $rowArr) {

	if ($basenode == null) {
		$structure = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><afids_batch_process/>");
	} else {
		$structure = $basenode;
	}
	
	foreach($rowArr as $row) {
			$record = $structure->addChild("record");
			foreach($row as $key => $value) {
				// remove numbers from the keys in the xml
				if (is_numeric($key)) {
					$key = "item";
				}

				// replace anything not alpha numeric
				$key = preg_replace('/[^a-z]/i', '', $key);

				// if there is another array found recursively call this function
				if (is_array($value)) {
					//echo "array!";
					//exit;
					$node = $structure->addChild($key);
					// recrusive call.
					xml($basenode,$node);
				} else {
					// add single node.
					$value = htmlentities($value, ENT_NOQUOTES, "UTF-8");
					$cellNode = $record->addChild($key, $value);
  			}
  		}
  }
	return $structure;
}

function transform_xml() {
	global $bodyXML;
	global $ct_style;
	$bpDefDirectory = "";
	$bodyStylesheetFileName = $bpDefDirectory.$ct_style;

	$xsl = new DomDocument;
	if (!$xsl->load($bodyStylesheetFileName)) {
		$systemErrMsg = 'Unable to load batch process template: '.$bodyStylesheetFileName;
		handle_error($systemErrMsg, $outtype);
	}
	$stylesheet = new XsltProcessor();
	$stylesheet->importStylesheet($xsl);
	
	if (!$htmlBody = $stylesheet->transformToXML($bodyXML)) {
		$systemErrMsg = 'XSL translation failed for report template: '.$bodyStylesheetFileName;
		handle_error($systemErrMsg, $outtype);
	}		
	return $htmlBody;
}

function send_mail($senderName, $senderEmail, $recipientName, $recipientEmail, $subject, $htmlBody, $attachment_filename, $attachment_string) {
	global $processName;
	global $attach_format;
	global $ct_style;

	if ($senderName && $senderName != "") {
		$sender = "$senderName <$senderEmail>";
	} else {
		$sender = $senderEmail;	
	}
	if ($recipientName && $recipientName != "") {
		$recipient = "$recipientName <$recipientEmail>";
	} else {
		$recipient = $recipientEmail;	
	}
	$email_sender = $senderName." <".$senderEmail.">";

	// $semi_rand = md5(time());
	$semi_rand = "xc75j85x";
	$mime_boundary = "==Multipart_Boundary_$semi_rand";

	if (!$attachment_string) {
		$headers = "From: $senderEmail\r\n";
	 	  "Reply-To: $senderEmail" . "\r\n" .
 		  'X-Mailer: PHP/' . phpversion(). ' ';
		$headers.= 'MIME-Version: 1.0' . "\r\n";
		if ($ct_style != '') $headers.= "Content-Type: multipart/mixed;\n" .
			" boundary=\"{$mime_boundary}\"";
		if ($ct_style == '') $headers.= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    
		$body = $htmlBody;
	} else {
		$headers = "From: $senderEmail\r\n" .
	 	  "Reply-To: $senderEmail" . "\r\n" .
 		  'X-Mailer: PHP/' . phpversion(). ' ';						

		$headers .= "\nMIME-Version: 1.0\n" .
			"Content-Type: multipart/mixed;\n" .
			" boundary=\"{$mime_boundary}\"";

		$attachment_string = chunk_split(base64_encode($attachment_string));
		$fileName = "report.csv";
		$fileType = "application/excel";
		if ($attachment_filename) $attachFileName = $attachment_filename; else $attachFileName = $processName.".csv";

		$body = "This is a multi-part message in MIME format.\n\n" .
			"--{$mime_boundary}\n" .
			"Content-Type:text/plain; charset=\"iso-8859-1\"\n" .
			"Content-Transfer-Encoding: 7bit\n\n".$htmlBody.= "\n\n";

		$body.= "--{$mime_boundary}\n" .
			"Content-Type: {$attachFileName};\n" .
			" name=\"{$attachFileName}\"\n" .
			"Content-Transfer-Encoding: base64\n\n" .
			$attachment_string.= "\n\n" .
			"--{$mime_boundary}--\n";	
	}

	if (mail($recipient, $subject, $body, $headers)) {
		return 'Success';
	} else {
		return 'Failure';
	}
}

function get_default($alias) {
  global $bpDefXML;
	$xpathQuery = ".//defaults/".$alias;
	$default = $bpDefXML->xpath($xpathQuery);
	if ($default) return $default[0]; else return null;
}

function replace_variables($raw_text) {
	if (strpos($raw_text,"{") === false) {
		$clean_text = $raw_text;
	} else {
	global $bpDefXML;
	$clean_text = "";
	$clean_start = 0;
	do {
		$sta_pos = strpos($raw_text, "{");
		$end_pos = strpos($raw_text, "}", $sta_pos+1);
		$var = substr($raw_text,$sta_pos+1,$end_pos-($sta_pos+1));
		$clean_text.= substr($raw_text,$clean_start,$sta_pos);
		// replace the variable
		if ($var == "getdate()") {
			$variable = array('8/10/2010');
		} else if ($var == "month()") {
			$variable = array(date("n"));
		} else if ($var == "day()") {
			$variable = array(date("j"));			
		} else if ($var == "year()") {
			$variable = array(date("Y"));				
		} else {
			$xpathQuery = ".//globals/".$var;
			if (!$variable = $bpDefXML->xpath($xpathQuery)) {
				$errorMsg = "Referenced variable ".$var." is not defined in globals.";
				log_system_error($errorMsg, false);
			}
		}
		$clean_text.= $variable[0];
		// trim the raw_text
		$raw_text = substr($raw_text,$end_pos+1,strlen($raw_text)-($end_pos+1));

	} while (strpos($raw_text, "{") > 0 );
	$clean_text.= substr($raw_text,$clean_start,strlen($raw_text)-$clean_start);
	}
	return $clean_text;
}

function tidyHTML($htmlString) {
	$tidyConfig = array(
         'indent'         => true,
         'output-xhtml'   => true,
         'wrap'           => 200);

	// Tidy
	$tidy = new tidy;
	$tidy->parseString($htmlString, $tidyConfig, 'utf8');
	$tidy->cleanRepair();
	return $tidy;
}

function log_entry() {
	// Since this is an unattended process, log the process events for later reference

}

function handle_error($errorMsg) {
	echo "<h3>Error</h3>";
	echo "<p>$errorMsg</p>";
	echo "<p>Please use the back button on your browser to return to the previous screen and correct your entry";
	exit;
}

function handle_xml_error($error_description) {
	include("app/templates/input_header.html");
	echo "<h3>Error</h3>";
	echo "<p>There is an error in the report definition file.</p>";
	echo "<p>Error Description: $error_description</p>";
	include("app/templates/input_footer.html");
	exit;
}

function log_system_error($error_description, $fatal) {
	global $notify_admin_name;
	global $notify_admin_email;
	global $error_log;
	global $processName;
	global $emailSenderName, $emailSenderAddress;
	echo "<p>System error $error_description</p>";
	// log it
	$logSql = "INSERT INTO bp_error_log (`error_date`, `process_name`, `error_description`) VALUES (Now(), $processName, $error_description)";
	//$log_insert = mysql_query($logSql);
 	if (mysql_error()) {
		echo "MySql error: ".mysql_error()." ".$logSql;
	}
	if ($fatal) {
		// send the email now
		$subject = "AFIDS Batch Process Fatal Error";
		$htmlBody = "<p>A fatal error occured in batch process $processName<p>".$error_log;
		send_mail($emailSenderName, $emailSenderAddress, $notify_admin_name, $notify_admin_email, $subject, $htmlBody, null);
		exit;
	}
}

?>