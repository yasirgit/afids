<?php
/**
* rwUI_Elements
*
*
* A PHP class to create UI elements for the Report Writer
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

require_once 'variables.php';

date_default_timezone_set('America/Los_Angeles');

class rwUI_Elements {

// Global variables

/**
* This is the node from the report definition file, the full report node
*/
var $reportXMLNode;

var $reportDef;
var $reportName;

/* class constructor
*/
function rwUI_Elements () {


}

function linkStr() {
	$linkStr = "";
	$xpathQuery = "dataset/inputParameters/inputParameter";
	$input_params = $this->reportNode->xpath($xpathQuery);
	foreach ($input_params as $paramNode) {	
		$paramName = strval($paramNode->attributes()->paramName);
		$fieldType = $paramNode->attributes()->fieldType;
		if ($fieldType == 'checkbox') {
			$xpathQuery = "checkboxOption";
			if ($paramNode->xpath($xpathQuery)) { 
				$selectOptions = $paramNode->xpath($xpathQuery);
				foreach ($selectOptions as $selectOption) {
					$fieldName = strval($selectOption->attributes()->fieldName);
					//echo "<p>".$fieldName."=".$_REQUEST[$fieldName];
					if (isset($_REQUEST[$fieldName])) $linkStr.= "&".$fieldName."=".$_REQUEST[$fieldName]; else $linkStr.= "&".$fieldName."=";
				}
			}		
		} else {
			$linkStr.= "&".$paramName."=";
			if (isset($_REQUEST[$paramName])) $linkStr.= $_REQUEST[$paramName];
		}
	}
	return $linkStr;
}

function make_input_field($paramNode) {
	$fieldType = $paramNode->attributes()->fieldType;
	$paramName =  strval($paramNode->attributes()->paramName);
	if ($fieldType == 'text') $fieldHTML = $this->text($paramNode, $paramName);
	if ($fieldType == 'checkbox') $fieldHTML = $this->checkbox($paramNode, $paramName);
	if ($fieldType == 'radio') $fieldHTML = $this->radio($paramNode, $paramName);
	if ($fieldType == 'select') $fieldHTML = $this->select($paramNode, $paramName);
	return $fieldHTML; 
}

function checkbox($paramNode) {
	$elemHtml = "";
	$xpathQuery = "checkboxOption";
	$required = $paramNode->attributes()->required;
	if ($paramNode->xpath($xpathQuery)) { 
		$selectOptions = $paramNode->xpath($xpathQuery);
		foreach ($selectOptions as $selectOption) {
			$fieldName = strval($selectOption->attributes()->fieldName);
			$elemHtml.= "<input type=\"checkbox\" name=\"".$fieldName."\" value=\"".$selectOption->attributes()->fieldValue."\"";
			if ($required == 'yes') $elemHTML.= " required=\"yes\" ";
			if (isset($_REQUEST[$fieldName])) {
				if ($_REQUEST[$fieldName] == $selectOption->attributes()->fieldValue) $elemHtml.= " checked=\"checked\">"; else $elemHtml.= ">";
			} else {
				if ($selectOption->attributes()->checked == 'yes') $elemHtml.= " checked=\"checked\">"; else $elemHtml.= ">";
			}	
			$elemHtml.= $selectOption->attributes()->description."<br/>";
		}
	}
	return $elemHtml;
}

function radio($paramNode, $paramName) {
	$elemHtml = "";
	$xpathQuery = "radioOption";
	$required = $paramNode->attributes()->required;
	if ($paramNode->xpath($xpathQuery)) { 
		$selectOptions = $paramNode->xpath($xpathQuery);
		foreach ($selectOptions as $selectOption) {
			$elemHtml.= "<input type=\"radio\" name=\"".$paramName."\" value=\"".$selectOption->attributes()->value."\"";
			if ($required == 'yes') $elemHTML.= " required=\"yes\" ";
			if (isset($_REQUEST[$paramName])) {
				if ($_REQUEST[$paramName] == $selectOption->attributes()->value) $elemHtml.= " checked=\"checked\">"; else $elemHtml.= ">";
			} else {
				if ($selectOption->attributes()->checked == 'yes') $elemHtml.= " checked=\"checked\">"; else $elemHtml.= ">";
			}	
			$elemHtml.= $selectOption->attributes()->description."<br/>";
		}
	}
	return $elemHtml;
}

function text($paramNode, $paramName) {
	$default =  $paramNode->attributes()->default;
	$fieldSize = $paramNode->attributes()->fieldSize;
	$datatype = $paramNode->attributes()->datatype;
	$required = $paramNode->attributes()->required;
	$maxFieldSize = $paramNode->attributes()->maxFieldSize;
	
	// figure out the default value if applicable
	// if there is an input value, override the default value
	$defaultVal = "";
	if (isset($_REQUEST[$paramName]) && $_REQUEST[$paramName] != '') {
		$defaultVal = $_REQUEST[$paramName];
	} else {
		if ($default != '') {
			$defaultVal = $default;
			if ($datatype == 'date') $defaultVal = $this->dateDefaults($default);
			if ($datatype == 'int') $defaultVal = $this->intDefaults($default);
			if ($datatype == 'string') $defaultVal = $this->stringDefaults($default);
		}
	}

	$returnHTML = "<input type=\"text\" ";
	if ($datatype == 'date') $returnHTML.= "class=\"datePick\" ";
	if ($required == 'yes') $returnHTML.= "required=\"yes\" ";
	$returnHTML.= "dataType=\"$datatype\" ";
	$returnHTML.= "id=\"".$paramName."\" name=\"".$paramName."\" value=\"".$defaultVal."\" size=\"".$fieldSize."\"";
  if ($maxFieldSize) $returnHTML.= " maxlength=\"".$maxFieldSize."\"";	
	$returnHTML.= "/>";
	return $returnHTML;
}

function select($paramNode, $paramName) {
	global $state_list;
	global $month_list;
	global $month_abbr;

	$returnHTML = "";
	$defaultVal =  $paramNode->attributes()->default;
	$required =  $paramNode->attributes()->required;
	if ($paramNode->attributes()->refSourceTable && $paramNode->attributes()->refSourceTable != '') {
		$refSourceTable =  $paramNode->attributes()->refSourceTable;
		$refSourceIDField =  $paramNode->attributes()->refSourceIDField;
		$refSourceDescField =  $paramNode->attributes()->refSourceDescField;

		// get the recordset
		$sqlStatement = "SELECT `".$refSourceIDField."`, `".$refSourceDescField."` FROM ".$refSourceTable." ORDER BY ".$refSourceDescField;
    $ref_result = mysql_query($sqlStatement);
    $colCount=mysql_num_rows($ref_result);
		$returnHTML.= "<SELECT name=\"".$paramName."\" size=\"1\">";
		if ($required == 'yes') $returnHTML.= " required=\"yes\" ";
		$returnHTML.= "<option value=\"\">Please Select</option>";
    while ($row = mysql_fetch_array($ref_result)) {
			$returnHTML.= "<option value=\"".$row[0]."\"";
			if (isset($_REQUEST[$paramName])) {
				if ($_REQUEST[$paramName] == $row[0]) $returnHTML.= " selected=\"selected\"";
			} else {
				if ($defaultVal != '') {
					if ($defaultVal == $row[0]) $returnHTML.= " selected=\"selected\"";
				}
			}
			$returnHTML.= ">".$row[1]."</option>";
		}
		$returnHTML.= "</select>";
		mysql_free_result($ref_result);
	}
	if ($paramNode->attributes()->populateSelect) { 
	  $returnHTML.= "<SELECT name=\"".$paramName."\" size=\"1\">";
		if ($required == 'yes') $returnHTML.= " required=\"yes\" ";
	  $psStr = $paramNode->attributes()->populateSelect;
		if (substr($psStr,0,5) == 'years') {
			$curYear = date('Y');
			if (substr($psStr,0,6) == 'years-') {
				$noYrArr = explode('-',$psStr);
				$noYrs = $noYrArr[1]; 
				for ($y=$curYear;$y>$curYear-$noYrs;$y--) {
					$returnHTML.= "<option value=\"".$y."\"";	
					if (isset($_REQUEST[$paramName])) {
						if ($_REQUEST[$paramName] == $y) $returnHTML.= " selected=\"selected\"";
					} else {
						if ($defaultVal != '') {
							if ($defaultVal == $y) $returnHTML.= " selected=\"selected\"";
						}						
					}
					$returnHTML.= ">".$y."</option>";
				}
			}
			if (substr($psStr,0,6) == 'years+') {
				$noYrArr = explode('+',$psStr);
				$noYrs = $noYrArr[1]; 
				for ($y=$curYear;$y>$curYear+$noYrs;$y++) {
					$returnHTML.= "<option value=\"".$y."\"";	
					if (isset($_REQUEST[$paramName])) {
						if ($_REQUEST[$paramName] == $y) $returnHTML.= " selected=\"selected\"";
					} else {
						if ($defaultVal != '') {
							if ($defaultVal == $y) $returnHTML.= " selected=\"selected\"";
						}						
					}
					$returnHTML.= ">".$y."</option>";
				}
			}
			if (substr($psStr,0,6) == 'years_') {
				$endYrArr = explode('_',$psStr);
				$endYr = $endYrArr[1];
				if ($endYr > $curYear) {
					for ($y=$curYear;$y<=$endYr;$y++) {
						$returnHTML.= "<option value=\"".$y."\"";
						if (isset($_REQUEST[$paramName])) {
							if ($_REQUEST[$paramName] == strval($y)) $returnHTML.= " selected=\"selected\"";
						} else {
							if ($defaultVal != '') {
								if ($defaultVal == $y) $returnHTML.= " selected=\"selected\"";
							}						
						}
						$returnHTML.= ">".$y."</option>";
					}
				} else {
					for ($y=$curYear;$y>=$endYr;$y--) {
						$returnHTML.= "<option value=\"".$y."\"";	
						if (isset($_REQUEST[$paramName])) {
							if ($_REQUEST[$paramName] == $y) $returnHTML.= " selected=\"selected\"";
						} else {
							if ($defaultVal != '') {
								if ($defaultVal == $y) $returnHTML.= " selected=\"selected\"";
							}						
						}
						$returnHTML.= ">".$y."</option>";
					}
				}
			}
		}
		if ($paramNode->attributes()->populateSelect == 'month_name') {
			$returnHTML.= "<option value=\"\">Please Select</option>";
			foreach($month_list as $month_name => $month_no) {
				$returnHTML.= "<option value=\"".$month_no."\"";
				if (isset($_REQUEST[$paramName])) {
					if ($_REQUEST[$paramName] == $month_no) $returnHTML.= " selected=\"selected\"";
				} else {
					if ($defaultVal != '') {
						if ($defaultVal == $month_no) $returnHTML.= " selected=\"selected\"";
					}
				}
				$returnHTML.= ">".$month_name."</option>";	
			}
		}
		if ($paramNode->attributes()->populateSelect == 'month_abbr') {
			$returnHTML.= "<option value=\"\">Please Select</option>";
			foreach($month_abbr as $month_name => $month_no) {
				$returnHTML.= "<option value=\"".$month_no."\"";
				if (isset($_REQUEST[$paramName])) {
					if ($_REQUEST[$paramName] == $month_no) $returnHTML.= " selected=\"selected\"";
				} else {
					if ($defaultVal != '') {
						if ($defaultVal == $month_no) $returnHTML.= " selected=\"selected\"";
					}
				}
				$returnHTML.= ">".$month_name."</option>";	
			}
		}
		if ($paramNode->attributes()->populateSelect == 'us_states') {
			$returnHTML.= "<option value=\"\">Please Select</option>";
			foreach($state_list as $state_name => $state_abbr) {
				$returnHTML.= "<option value=\"".$state_abbr."\"";
				if (isset($_REQUEST[$paramName])) {
					if ($_REQUEST[$paramName] == $state_abbr) $returnHTML.= " selected=\"selected\"";
				} else {
					if ($defaultVal != '') {
						if ($defaultVal == $state_abbr) $returnHTML.= " selected=\"selected\"";
					}
				}
				$returnHTML.= ">".$state_name."</option>";	
			}
		}
		$returnHTML.= "</select>";
	}
	$xpathQuery = "selectOption";
	if ($paramNode->xpath($xpathQuery)) { 
	  $returnHTML.= "<SELECT name=\"".$paramName."\" size=\"1\">";
		$returnHTML.= "<option value=\"\">Please Select</option>";
		$selectOptions = $paramNode->xpath($xpathQuery);
		foreach ($selectOptions as $selectOption) {
			$returnHTML.= "<option value=\"".$selectOption->attributes()->value."\"";
			if (isset($_REQUEST[$paramName])) {
				if ($_REQUEST[$paramName] == $selectOption->attributes()->value) $returnHTML.= " selected=\"selected\"";
			} else {
				if ($defaultVal != '') {
					if ($defaultVal == $selectOption->attributes()->value) $returnHTML.= " selected=\"selected\"";
				}
			}
			$returnHTML.= ">".$selectOption->attributes()->description."</option>";
		}
		$returnHTML.= "</select>";
	}	

	return $returnHTML;
}

// returns date values for supported default date options
function dateDefaults($default) {
	global $date_format_user;
	
	// $date_format_user comes from the config.php file and is used to internationalize dates
	if ($default == 'monthstart') {
		$defaultVal = date($date_format_user, strtotime(date('m').'/01/'.date('Y').' 00:00:00')); 
	}
	if ($default == 'monthend') {
		$defaultVal = date($date_format_user, strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00'))));
	}
	if ($default == 'yearstart') {
		$defaultVal = date($date_format_user, strtotime('01/01/'.date('Y').' 00:00:00'));
	}
	if ($default == 'yearend') {
		$defaultVal = date($date_format_user, strtotime('12/31/'.date('Y').' 00:00:00'));
	}
	// other options to support:
	// nextmonthstart, nextmonthend, prevmonthstart, prevmonthend, nextyearstart, nextyearend, prevyearstart, prevyearend

	return $defaultVal;
}

// returns integer values for supported default int options
function intDefaults($default) {

	if ($default == 'currentyear') {
		$defaultVal = date('Y');
	}
	if ($default == 'prevyear') {
		$defaultVal = date('Y') - 1;
	}
	if ($default == 'nextyear') {
		$defaultVal = date('Y') + 1;
	}	
	// other options to support:
	// 

	return $defaultVal;
}

// returns string values for supported default string options
function stringDefaults($default) {

	// options to support:
	// 
	$defaultVal = "";
	return $defaultVal;
}

function bottomUserInput($recordSetIsEmpty) {
	$bottomUserInputHTML = "";
	$xpathQuery = "dataset/inputParameters/inputParameter";
	$input_params = $this->reportNode->xpath($xpathQuery);
	if ($input_params && count($input_params) > 0) {
		// There are input parameters
		$optionsHTML = "";
		$colCount = 0;
		$hiddenFields = "";
		foreach ($input_params as $paramNode) {
			$colCount+= 1;
			$bottomOption = $paramNode->attributes()->bottomoption;	
			$fieldDesc = $paramNode->attributes()->fieldDesc;
			$paramName = strval($paramNode->attributes()->paramName);
			if ($bottomOption == 'yes') {
				$optionsHTML.= "<div class=\"holder\" style=\"width: 150px;\">";
				$optionsHTML.="<label for=\"form-item-".$colCount."\">".$fieldDesc."</label>";
				$optionsHTML.=$this->make_input_field($paramNode,$_REQUEST);
				$optionsHTML.= "</div>";
			} else {
				if (in_array($paramName, $_REQUEST)) {
					$hiddenFields.= "<input type=\"hidden\" name=\"".$paramName."\" & value=\"".$_REQUEST[$paramName]."\">";
				} else {
					$hiddenFields.= "<input type=\"hidden\" name=\"".$paramName."\" & value=\"\">";
				}
			}
		}
	
		$bottomUserInputHTML.= "<div class=\"filtering\" style=\"width: 784px;\">";
		$bottomUserInputHTML.= "<form action=\"reports.php\" method=\"post\">";
		$bottomUserInputHTML.= "<input type=\"hidden\" name=\"action\" value=\"display\">";
		$bottomUserInputHTML.= "<input type=\"hidden\" name=\"reportDef\" value=\"".$this->reportDef."\">";
		$bottomUserInputHTML.= "<input type=\"hidden\" name=\"reportName\" value=\"".$this->reportName."\">";
		$bottomUserInputHTML.= $hiddenFields;
    $bottomUserInputHTML.= "<fieldset>";
		$bottomUserInputHTML.= $optionsHTML;
    $bottomUserInputHTML.= "<div class=\"holder\" style=\"padding-top:10px;width:120px\">";
    $bottomUserInputHTML.= "	<input type=\"submit\" value=\"Update Report\">";
    $bottomUserInputHTML.= "</div>";
    $bottomUserInputHTML.= "</fieldset>";
    $bottomUserInputHTML.= "</form>";
    $bottomUserInputHTML.= "</div>";
	}
		
	// Insert the remaining output options here
	$xpathQuery = "outputformats/outputformat";
	$output = $this->reportNode->xpath($xpathQuery);
	$linkStr = $this->linkStr();
	$bottomUserInputHTML.= "<p><a href=\"reports.php?reportDef=".$this->reportDef."&reportName=".$this->reportName.$this->linkStr()."\">Search Again</a>";
	if (!$recordSetIsEmpty) $bottomUserInputHTML.= "&nbsp;|&nbsp;";
	if ($output && !$recordSetIsEmpty) {
		$nCount = 0;
		foreach ($output as $outputNode) {
	 		$outType = $outputNode->attributes()->type;
	 		$newWindow = $outputNode->attributes()->newwindow;
	 		$description = $outputNode->attributes()->description;
			if ($outType != 'html') {
				if ($outType == 'email') {
					$bottomUserInputHTML.= "<a href=\"javascript:void(0)\"";
					$bottomUserInputHTML.= " onclick=\"sendReportFormOpen('$this->reportDef', '$this->reportName', '".$this->linkStr()."');\">";
					$bottomUserInputHTML.= "$description</a>";							
				} else {
					$bottomUserInputHTML.= "<a href=\"reports.php?action=display&reportDef=".$this->reportDef."&reportName=".$this->reportName.$linkStr."&outtype=$outType\"";
					if ($newWindow == 'yes') $bottomUserInputHTML.= " target=\"new\"";
					$bottomUserInputHTML.= ">";
					$bottomUserInputHTML.= $description;
					$bottomUserInputHTML.= "</a>";
				}
				if ($nCount < (count($output) - 1)) $bottomUserInputHTML.= "&nbsp;|&nbsp;";
			}
	 		$nCount+=1;
		}
	}
  $bottomUserInputHTML.= "<p>";	
	// return the response
	return $bottomUserInputHTML;
}

} // end of class
?>