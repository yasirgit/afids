<?php
        error_reporting(E_ALL);
	ini_set('display_errors', true);
    date_default_timezone_set("America/Phoenix");

//added by Singleton to check the permission for the reports

ini_set('memory_limit', '382M');
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
$context = sfContext::createInstance($configuration);
$user = $context->getUser();

#security
if( !$user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $user->setFlash("warning", 'You don\'t have permission to access this url ');
        header("Location:/dashboard");
}
    

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


require_once('config.php');

$uiElem = new rwUI_Elements;
$rwOutput = new rwOutput;
$rwDatabase = new rwDatabase;

$rwDatabase->date_format_database = "Y/m/d";
$rwDatabase->date_format_user = "m/d/Y";

// Get the parameters that were passed
if (isset($_REQUEST['startPage'])) {
	$startPage = $_REQUEST['startPage'];
} else {
	$startPage = 1;
}
if ($startPage == '') $startPage = 1;

$page_size = 25;
if (isset($_REQUEST['reportDef'])) {
	$reportDef = $_REQUEST['reportDef'];
        
} else {
	$errMsg = "The report definition file was not passed (parameter missing)";
	handle_xml_error($errMsg);
}
if (isset($_REQUEST['reportName'])) {
	$reportName = $_REQUEST['reportName'];
       // echo $reportName;
} else {
	$errMsg = "The report name was not passed";
	handle_xml_error($errMsg);
}
if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = '';
}
if (isset($_REQUEST['outtype'])) {
	$outtype = $_REQUEST['outtype'];
} else {
	$outtype = 'html';
}
if (isset($_REQUEST['responseformat'])) {
	$responseformat = $_REQUEST['responseformat'];
} else {
	$responseformat = '';
}

if ($reportDef == '') {
	$errMsg = "The report definition file was not passed";
	handle_xml_error($errMsg);
}
if ($reportName == '') {
	$errMsg = "The report name was not passed";
	handle_xml_error($errMsg);
}
$reportDefFileName = $reportDefDirectory.$reportDef;
$reportDefXML = simplexml_load_file($reportDefFileName);
if (!$reportDefXML) {
	// throw and error
	$errMsg = "The report definition file was not passed";
	handle_xml_error($errMsg);
}
// $reportDefDirectory comes from the report_config.php file
$reportDefFileName = $reportDefDirectory.$reportDef;
$reportDefXML = simplexml_load_file($reportDefFileName);
if (!$reportDefXML) {
	// throw and error
	$errMsg = "The report definition file was not passed";
	handle_xml_error($errMsg);
}

// Check to make sure the report definition is in the file
$xpathQuery = ".//report[reportName = '".$reportName."']";
$thisReport = $reportDefXML->xpath($xpathQuery);
if (!$thisReport) {
	$errMsg = "The report definition block was not found in the report definition XML";
	handle_xml_error($errMsg);
}

// If there are no input parameters, override the display option
$xpathQuery = ".//report[reportName = '".$reportName."']/dataset/inputParameters/inputParameter[@useroption = 'yes']";
if (!$reportDefXML->xpath($xpathQuery)) $action = "display";

$reportTitle = $thisReport[0]->title;
$descriptionText = $thisReport[0]->descriptionText;

$reportCommandText = $thisReport[0]->dataset[0]->attributes()->commandText;
$reportCommandType = $thisReport[0]->dataset[0]->attributes()->commandType;
$reportCommandTimeout = $thisReport[0]->dataset[0]->attributes()->commandTimeout;
$rwDatabase->reportCommandText = $reportCommandText;
$rwDatabase->reportCommandType = $reportCommandType;
$rwDatabase->reportCommandTimeout = $reportCommandTimeout;

$page_size = $thisReport[0]->pageSize;

if ($page_size == '') $page_size = 25;
if ($page_size == 0) $page_size = 25;

if ($action == '') {

	// Get user parameters
	// Are there input parameters? If so, display a find page
	$xpathQuery = "dataset/inputParameters/inputParameter";
	$input_params = $thisReport[0]->xpath($xpathQuery);
	if ($input_params) {
		include("header.php"); 
		//There are input parameters
		//Display a find page
		?>
		<h2><?php echo $reportTitle ?></h2>
		<p><?php echo $descriptionText ?></p>
		<div id="form_div">
			<form action="reports.php" method="post">
				<input type="hidden" name="action" value="display"/>
				<input type="hidden" name="reportDef" value="<?php echo $reportDef ?>"/>
				<input type="hidden" name="reportName" value="<?php echo $reportName ?>"/>
				<input type="hidden" name="debug" value="<?php echo $debug ?>"/>
				<table border="0" cellpadding="4" cellspacing="4">
				<?php
					foreach ($input_params as $paramNode) {
						$fieldDesc = $paramNode->attributes()->fieldDesc;
						$required = $paramNode->attributes()->required;
						echo "<tr>";
						echo "<td>".$fieldDesc;
						if ($required == 'yes') echo "*</td>"; else echo "</td>";
						echo "<td>";
						echo $uiElem->make_input_field($paramNode,$_REQUEST); 
						echo "</td></tr>";
					}
				?>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Submit"></td>
				</tr>
				</table>
				<p>* indicates required field</p>
			</form>
		</div>
		<?php 
		include("footer.php");
		exit;
	}
}

if ($action == 'display') {
	$uiElem->reportName = $reportName;
	$uiElem->reportDef = $reportDef;
	
	// if no stylesheet is specified, use the default from config.php
	$reportStylesheet = $defaultStylesheet;
	$templateOption = $defaultTemplateOption;
	$printTemplate = 'stdReport'; // this should be a variable in config
	
	if ($outtype == '') {
		$outtype = 'html';
		$xpathQuery = "outputformats/outputformat[@primary='yes']";
		$outputFormats = $thisReport[0]->xpath($xpathQuery);
		$templateOption = $outputFormats[0]->attributes()->templateOption;
		$outtype = $outputFormats[0]->attributes()->type;
		$reportStylesheet = $outputFormats[0]->attributes()->stylesheet;
	} else {
		$xpathQuery = "outputformats/outputformat[@type='".$outtype."']";
		$outputFormats = $thisReport[0]->xpath($xpathQuery);
		if ($outputFormats) {
			$templateOption = $outputFormats[0]->attributes()->templateOption;
			$reportStylesheet = $outputFormats[0]->attributes()->stylesheet;
			if ($outputFormats[0]->attributes()->printTemplate) $printTemplate = $outputFormats[0]->attributes()->printTemplate;
		}
	}
	// We need the print stylesheet for formatting an email attachment, so grab it into a separate variable
	$xpathQuery = "outputformats/outputformat[@type='print']";
	$outputFormatPrint = $thisReport[0]->xpath($xpathQuery);
	if ($outputFormatPrint) {
		$printStylesheet = $outputFormatPrint[0]->attributes()->stylesheet;
	} else {
		// use the default
		$printStylesheet = $reportStylesheet;
	}

	// ajax load means that we don't need to load the dataset, just the XSL template
	// but only do it if we're not sending back json
	if ($thisReport[0]->dataset[0]->attributes()->ajaxload == 'true' && $responseformat != 'json' && $outtype == 'html') {
		$reportStylesheetFileName = $reportDefDirectory.$reportStylesheet;
		$xsl = new DomDocument;
		if (!$xsl->load($reportStylesheetFileName)) {
			$systemMsg = 'Unable to load report template '.$reportStylesheetFileName;
			handle_error($systemMsg, $outtype);
		}
		$stylesheet = new XsltProcessor();
		$stylesheet->importStylesheet($xsl);
		$dataXML = new DomDocument;
		// compile the where clause
		$whereStr = "";
		foreach ($_REQUEST as $field=>$value) {
			if ($field != 'action' && $field != 'responseFormat' && $field != 'reportDef' && $field != 'reportName') {
				$whereStr.= $field."=".$value."&";
			}
		}
		$whereStr = substr($whereStr,0,strlen($whereStr)-1);
		$dataXML->loadXML("<xml><whereClause><![CDATA[".$whereStr."]]></whereClause></xml>");
		if (!$translatedResponse = $stylesheet->transformToXML($dataXML)) {
			$systemMsg = 'Unable to transform report template '.$reportStylesheetFileName;
			handle_error($systemMsg, $outtype);
		} else {
			if ($outtype == 'html') {
				include("header.php");
				echo "<h2>".$reportTitle."</h2>";
				echo "<p>".$descriptionText."</p>";
				echo $translatedResponse;
				// include the bottom options
				$uiElem->reportNode = $thisReport[0];
				// the paramter is true if the record set is empty
				echo $uiElem->bottomUserInput(false);
				include("app/sendData.inc");
				include("footer.php");
			}
		}
		exit;
	}

	$page_link = "";
	$page_link = $page_link."<pair><name>startPage</name><value>".$startPage."</value></pair>";
	$linkStr = "?action=display&reportDef=".$reportDef."&reportName=".$reportName."&startPage=".$startPage;

	$input_params = $thisReport[0]->xpath($xpathQuery);
	//foreach($_REQUEST as $field=>$value) {
	//	echo "<p>".$field." = ".$value;
	//}
	//exit;
	$rwDatabase->requestArr = $_REQUEST;
	$xpathQuery = "dataset/inputParameters/inputParameter[@useroption = 'yes']";
	$inputParams = $thisReport[0]->xpath($xpathQuery);
	$rwDatabase->inputParams = $inputParams;
	$xpathQuery = "dataset/groupByFields/groupByField";
	$rwDatabase->groupByParams = $thisReport[0]->xpath($xpathQuery);
	$xpathQuery = "dataset/orderByFields/orderByField";
	$rwDatabase->orderByParams = $thisReport[0]->xpath($xpathQuery);

	$validationErrMsg = $rwDatabase->validateUserInput();
	if ($validationErrMsg != '') {
		handle_error($validationErrMsg, $outtype);		
	}

	if ($reportCommandType == 'adCmdText') {
		if ($inputParams) {
			if (!strpos($reportCommandText,'WHERE')) {
				if ($rwDatabase->whereClause() != '') $reportCommandText.= " WHERE ".$rwDatabase->whereClause();
			} else {
				if ($rwDatabase->whereClause() != '') $reportCommandText.= " AND ".$rwDatabase->whereClause();
			}
			$reportCommandText.= $rwDatabase->groupBy();
			$reportCommandText.= $rwDatabase->orderBy();
		}
	}

	$columnsArr = array();
	// check to see if there are column definitions
	$xpathQuery = "outputformats/outputformat[@type='$outtype']/column";
	if ($thisReport[0]->xpath($xpathQuery)) {
			$columns = $thisReport[0]->xpath($xpathQuery);
			foreach ($columns as $column) {
				$fieldDataType = $column->attributes()->dataType;
				$fieldName = strval($column->attributes()->field);
				$columnsArr[$fieldName] = $fieldDataType;
			}
	}
//var_dump($columnsArr);
//exit;

	if ($responseformat == 'json') {
		//$jsonResult = format_json($reportCommandText, Null, $columnsArr);
		$rwOutput->sql_statement = $reportCommandText;
		$rwOutput->column_arr = $columnsArr;
		$displayStart = 0;
		$displayLength = 0;
		$jsonResult = $rwOutput->json($displayStart,$displayLength);		
		echo $jsonResult;
		exit;
	}

	if ($reportCommandType == 'adCmdText') {
		$rwDatabase->sqlStatement = $reportCommandText;
		//echo $reportCommandText;
		//exit;
		$report_result = $rwDatabase->cmdText();
		$recordCount = mysql_num_rows($report_result);	
	}

	if ($reportCommandType == 'adCmdStoredProc') {
		$recordArr = $rwDatabase->cmdProc();
		$recordCount = count($recordArr);
	}

	if ($recordCount == 0) {
		include("header.php");
		echo "<h2>".$reportTitle."</h2>";
		echo "<p>".$descriptionText."</p>";
		echo "<p>No records found according to the criteria you selected.</p>";
		if ($reportCommandType == 'adCmdText') mysql_free_result($report_result);
		// display the bottom user options			
		$uiElem->reportNode = $thisReport[0];
		// the paramter is true if the record set is empty
		echo $uiElem->bottomUserInput(true);
		include("footer.php");
		exit;
	}
	
	if ($outtype == 'download') {
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Type: application/download");;
		header("Content-Transfer-Encoding: binary ");
		header("Content-Disposition: attachment; filename=\"$reportName.csv\"");

		if ($reportCommandType == 'adCmdText') {
			//$dataXML = format_xml($report_result, NULL, $basenode = 'afids_report', $columnsArr);
			$rwOutput->sql_result_text = $report_result;
			$rwOutput->column_arr = $columnsArr;
 			echo $rwOutput->csv($reportCommandType);
			mysql_free_result($report_result);
		}
		if ($reportCommandType == 'adCmdStoredProc') {
			$rwOutput->sql_result_proc = $recordArr;
			$rwOutput->column_arr = $columnsArr;
 			echo $rwOutput->csv($reportCommandType);
		}
 		exit;
	}
	
	// this function converts the mySql dataset to XML
		if ($reportCommandType == 'adCmdText') {
			//$dataXML = format_xml($report_result, NULL, $basenode = 'afids_report', $columnsArr);
			$rwOutput->sql_result_text = $report_result;
			$rwOutput->column_arr = $columnsArr;
			$dataXML = $rwOutput->xml('afids_report','adCmdText');
			mysql_free_result($report_result);
		}
		if ($reportCommandType == 'adCmdStoredProc') {
			//$dataXML = format_xml_sp($recordArr, NULL, $basenode = 'afids_report', Null);
			$rwOutput->sql_result_proc = $recordArr;
			$rwOutput->column_arr = $columnsArr;
			$dataXML = $rwOutput->xml('afids_report','adCmdStoredProc');
		}
		// add a node for the report information, including the parameters. Parameters are used by the xsl for logic and creating links
		$reportHeaderNode = $dataXML->addChild("reportHeader");
		$xpathQuery = "dataset/inputParameters/inputParameter";
		$input_params = $thisReport[0]->xpath($xpathQuery);
		if ($input_params) $paramsNode = $reportHeaderNode->addChild("params");
		foreach ($input_params as $paramNode) {	
			$paramName = strval($paramNode->attributes()->paramName);
			$fieldType = $paramNode->attributes()->fieldType;
			if ($fieldType == 'checkbox') {
				$xpathQuery = "checkboxOption";
				if ($paramNode->xpath($xpathQuery)) { 
					$selectOptions = $paramNode->xpath($xpathQuery);
					foreach ($selectOptions as $selectOption) {
						$fieldName = strval($selectOption->attributes()->fieldName);
						$pNode = $paramsNode->addChild("param");
						$pNode->addAttribute("field",$fieldLabel);
						if (isset($_REQUEST[$fieldName])) {
							$pNode->addAttribute("value",$_REQUEST[$fieldName]);
						}
					}
				}		
			} else {
				$pNode = $paramsNode->addChild("param");
				$pNode->addAttribute("field",$paramName);
				if (isset($_REQUEST[$paramName]) && $_REQUEST[$paramName] != '') {
					$pNode->addAttribute("value",$_REQUEST[$paramName]);
				}
			}
		}	

		// check to see if there are column definitions
		// the column definitions are used to create headers for the standard report template, and to add formatting attributes to the table cells
		$xpathQuery = "outputformats/outputformat";
		$headerNode = $dataXML->addChild("header");
		$typesNode = $headerNode->addChild("outputTypes");
		foreach ($thisReport[0]->xpath($xpathQuery) as $thisOuttype) {
			$columns = $thisOuttype->xpath("column");
			$outType = $thisOuttype->attributes()->type;
			$typeNode = $typesNode->addChild("outputType");
			$typeNode->addAttribute("outputType", $outType);
			$columnsNode = $typeNode->addChild("columns");
			foreach ($columns as $column) {
				$fieldLabel = $column->attributes()->label;
				$columnNode = $columnsNode->addChild("column", $fieldLabel);
				$fieldName = $column->attributes()->field;
				$columnNode->addAttribute("field", $fieldName);
				$fieldWidth = $column->attributes()->width;
				$columnNode->addAttribute("width",$fieldWidth);
				$fieldDataType = $column->attributes()->dataType;
				$columnNode->addAttribute("dataType",$fieldDataType);
				$fieldAlign = $column->attributes()->align;
				$columnNode->addAttribute("align",$fieldAlign);
				$fieldClass = $column->attributes()->class;
				if ($fieldClass && $fieldClass != '') $columnNode->addAttribute("class",$fieldClass);
				$totalColumn = $column->attributes()->totalColumn;
				$columnNode->addAttribute("totalColumn",$totalColumn);
			}
		}
		
		$reportStylesheetFileName = $reportDefDirectory.$reportStylesheet;
		$xsl = new DomDocument;
		if (!$xsl->load($reportStylesheetFileName)) {
			$systemErrMsg = 'Unable to load report template: '.$reportStylesheetFileName;
			handle_error($systemErrMsg, $outtype);
		}
		$stylesheet = new XsltProcessor();
		$stylesheet->importStylesheet($xsl);
		
		//echo $dataXML->asXML();
		//exit;

		if (!$translatedResponse = $stylesheet->transformToXML($dataXML)) {
			$systemErrMsg = 'XSL translation failed for report template: '.$reportStylesheetFileName;
			handle_error($systemErrMsg, $outtype);
		}

		if ($outtype == 'email') {
			// this is a response to an
			$to = $_REQUEST['recipient_email'];
			$subject = $_REQUEST['subject'];
			$body = $_REQUEST['message']."\n\n";
			
			if ($_REQUEST['attachment_in_body'] == 1) {
				$body.= $translatedResponse;
				// $emailSender is set in config.php
				$headers = "From: $emailSender\r\nReply-To: $emailSender"."\r\n";
				$headers .= 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
			}
			if ($_REQUEST['attachment_as_pdf'] == 1) {
				// re-transform the xml using the report template so the attachment is in the print format
				$printStylesheetFileName = $reportDefDirectory.$printStylesheet;
				$printXsl = new DomDocument;
				if (!$printXsl->load($printStylesheetFileName)) {
					$systemErrMsg = 'The report template was not found: '.$printStylesheetFileName;
					// this is a response to an ajax call
					echo '{"response":"'.$systemErrMsg.'"}';
					exit;
				}
				$attachStylesheet = new XsltProcessor();
				$attachStylesheet->importStylesheet($printXsl);

				if (!$printResponse = $attachStylesheet->transformToXML($dataXML)) {
					$systemErrMsg = 'XSL translation failed for report template: '.$printStylesheetFileName;
					// this is a response to an ajax call
					echo '{"response":"'.$systemErrMsg.'"}';
					exit;
				}

				$pdfString = createPDF(tidyHTML($printResponse), $reportTitle, 'string', $printTemplate);

				$headers = "From: ".$emailSender;
							
				$semi_rand = md5(time());
				$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

				$headers .= "\nMIME-Version: 1.0\n" .
					"Content-Type: multipart/mixed;\n" .
					" boundary=\"{$mime_boundary}\"";

				$body .= "This is a multi-part message in MIME format.\n\n" .
					"--{$mime_boundary}\n" .
					"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
					"Content-Transfer-Encoding: 7bit\n\n".$body.= "\n\n";

				$pdfString = chunk_split(base64_encode($pdfString));
				$reportFileName = "report.pdf";
				$reportFileType = "application/pdf";

				$body .= "--{$mime_boundary}\n" .
						"Content-Type: {$reportFileName};\n" .
						" name=\"{$reportFileName}\"\n" .
						//"Content-Disposition: attachment;\n" .
						//" filename=\"{$reportFileName}\"\n" .
						"Content-Transfer-Encoding: base64\n\n" .
						$pdfString .= "\n\n" .
						"--{$mime_boundary}--\n";
			}			
			
			if (mail($to, $subject, $body, $headers)) {
  			$responseMsg = "The report was send successfully to ".$to;
 			} else {
  			$responseMsg = "There was an error sending your email. Please check the email address to make sure it is valid.";
			}
			
			// this is a response to an ajax call
			echo '{"response":"'.$responseMsg.'"}';
			exit;
		}

			//echo $translatedResponse;
			//exit;


		if ($outtype == 'html') {
			include("header.php");
			echo "<h2>".$reportTitle."</h2>";
			echo "<p>".$descriptionText."</p>";
			echo $translatedResponse;
			// display the bottom user options
			$uiElem->reportNode = $thisReport[0];
			// the paramter is true if the record set is empty
			echo $uiElem->bottomUserInput(false);
			include("app/sendData.inc");
			include("footer.php");
		}
			
		if ($outtype == 'print') {
			//createPDF(tidyHTML($translatedResponse), $reportTitle, 'browser', $printTemplate);
			// disable tidy temporarily because tidy is not loaded properly on the server
			createPDF($translatedResponse, $reportTitle, 'browser', $printTemplate);	
		}
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

function handle_error($errorMsg, $outtype) {
	if ($outtype == 'email') {
		// return json
		echo '{"response":"'.$errorMsg.'"}';
	} else {
		include("header.php");
		echo "<h3>Error</h3>";
		echo "<p>$errorMsg ($outtype)</p>";
		echo "<p>Please use the back button on your browser to return to the previous screen and correct your entry";
		include("footer.php");
	}
	exit;
}

function handle_xml_error($error_description) {
	include("header.php");
	echo "<h3>Error</h3>";
	echo "<p>There is an error in the report definition file.</p>";
	echo "<p>Error Description: $error_description</p>";
	include("footer.php");
	exit;
}

?>