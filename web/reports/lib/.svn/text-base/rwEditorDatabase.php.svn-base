<?php
/**
* rwEditorDatabase
*
*
* A PHP class to manage the report definition data
*
*
* IMPORTANT NOTE
* 
* 
* LICENCE
* 
*
* @author		Stephan Fopeano
* @version 	001
* @package	Report Writer
*/

class rwEditorDatabase {

/**
* Global variables
*/

// the report definition xml document
public $xml_report_definition;
// the report name (id)
public $reportName;

/* class constructor
*/
function rwEditorDatabase () {
	// don't need to do anything here for now

}

function getReportDefinitionForm() {
	$fileName = "c:/web/afids_reports/trunk/writer/xsl_templates/reportDefinition.xsl";
	$xsl = new DomDocument;
	if (!$xsl->load($fileName)) {
			echo 'failed'.$fileName;
	}
	$stylesheet = new XsltProcessor();
	$stylesheet->importStylesheet($xsl);
	// pass the report name (id) to the xsl and the filtering is done there
	$stylesheet->setParameter(null, "reportName", $this->reportName);

	if (!$translatedResponse = $stylesheet->transformToXML($this->xml_report_definition)) {
		return "error";
	} else {
		return $translatedResponse;
		//echo $translatedResponse;
	}
}

function saveData() {
	// get the report node
	$xPath = new DOMXPath($this->xml_report_definition);
	$reportNode = $xPath->query(".//reports/report[reportName='campPassengers']", $this->xml_report_definition)->item(0);

	foreach($_GET as $field=>$value) {
		if ($reportNode->getElementsByTagName($field)->length > 0) {
			$fieldNode = $reportNode->getElementsByTagName($field)->item(0);
			$fieldNode->nodeValue = $value;
		}
	}

	// don't need to return the xml, it's in the property of the object
	return true;
}


} // end of class
?>