<?php
/**
* rwDatabase
*
*
* A PHP class to format output for the Report Writer
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

class rwDatabase {

/**
* Global variables
*/

public $date_format_database;
public $date_format_user;

public $requestArr = array();

/**
* Parameters from the recordset connection
*/
public $reportCommandText;
public $reportCommandType;
public $reportCommandTimeout;

/**
* The XML node containing all the input parameters
*/
public $inputParams;
public $groupByParams;
public $orderByParams;

/**
* array of the columns to include, key => dataType
*/
public $column_arr;

/**
* The sql command to process
*/
public $sqlStatement;

/* class constructor
*/
function rwDatabase () {
	// don't need to do anything here for now

}

function validateUserInput() {
	$errStr = "";
	foreach ($this->inputParams as $paramNode) {
		$paramName = strval($paramNode->attributes()->paramName);
		$fieldDesc = strval($paramNode->attributes()->fieldDesc);
		if ($fieldDesc == '' || !$fieldDesc) $fieldDesc = $paramName;
		// validate the data types
		if (isset($_REQUEST[$paramName]) && $_REQUEST[$paramName] != '') {
			if ($paramNode->attributes()->datatype == 'date') {
				if (strtotime($_REQUEST[$paramName]) == false) {
					$errStr = $errStr."<li>Please enter a valid date for the <span style=\"font-weight:bold\">".$fieldDesc."</span> field.</li>";
				}
			}
			if ($paramNode->attributes()->datatype == 'int') {
				if (!is_numeric($_REQUEST[$paramName])) {
					$errStr = $errStr."<li>Please enter a valid integer for the <span style=\"font-weight:bold\">".$fieldDesc."</span> field.</li>";
				}
			}
		}
		if ($paramNode->attributes()->required == 'yes') {
			if (!isset($_REQUEST[$paramName])) {
				$errStr = $errStr."<li>Please enter a value for the <span style=\"font-weight:bold\">".$fieldDesc."</span> field.</li>";
			} else {
				if ($_REQUEST[$paramName] == '') {
					$errStr = $errStr."<li>Please enter a value for the <span style=\"font-weight:bold\">".$fieldDesc."</span> field.</li>";
				}
			}	
		}
	}
	return $errStr;	
}

function procParamString() {
	$paramString = "";
	foreach ($this->inputParams as $paramNode) {
		// check to see if the user entered a value
		$paramName = strval($paramNode->attributes()->paramName);
		if (isset($paramName, $this->requestArr)) {
			if ($paramNode->attributes()->datatype == 'int') {
				if ($this->requestArr[$paramName] == '') {
					$paramString.= "0,";
				} else {
					$paramString.= $this->requestArr[$paramName].",";
				}
			} else {
				if ($paramNode->attributes()->datatype == 'date') {
					// convert the date to the format required by the database
					$user_date = date($this->date_format_user, strtotime($this->requestArr[$paramName].' 00:00:00'));
					$paramValue = date($this->date_format_database, strtotime($user_date.' 00:00:00'));
					$paramString.= "'".$paramValue."',";
				} else {
					$paramString.= "'".$this->requestArr[$paramName]."',";
				}
			}
		} else {
			$paramString.= "Null,";
		}	
	}
	if ($paramString != '') $paramString = substr($paramString, 0, strlen($paramString)-1);
	return $paramString;
}

function whereClause() {
	$whereClause = "";
	foreach ($this->inputParams as $paramNode) {
		// check to see if the user entered a value
		$paramName = strval($paramNode->attributes()->paramName);
		if (isset($paramName, $this->requestArr)) {
			if ($paramNode->attributes()->fieldType == 'checkbox') {
				$whereClause.= $this->parseCheckbox($paramNode);
			} else {
				$whereClause.= $this->parseSingleFields($paramNode,$paramName);
			}
		}
	}
	if ($whereClause != '') {
		$whereClause = substr($whereClause, 0, strlen($whereClause) - 5);
	}
	
	return $whereClause;
}

function groupBy() {
	$groupByStr = "";
	if ($this->groupByParams) {
		$groupByStr.= " GROUP BY ";
		foreach ($this->groupByParams as $groupField) {
			$groupByStr.= $groupField.", ";
		}
		$groupByStr = substr($groupByStr, 0, strlen($groupByStr) - 2);
	}
	return $groupByStr;
}

function orderBy() {
	$orderByStr = "";
	if ($this->orderByParams) {
		$orderByStr.= " ORDER BY ";
		foreach ($this->orderByParams as $orderField) {
			$orderByStr.= $orderField." ".$orderField->attributes()->type.", ";
		}
		$orderByStr = substr($orderByStr, 0, strlen($orderByStr) - 2);
	}	
	return $orderByStr;
}

function parseCheckbox($paramNode) {
	$whereClause = "";
	$xpathQuery = "checkboxOption";
	if ($paramNode->xpath($xpathQuery)) { 
		$selectOptions = $paramNode->xpath($xpathQuery);
		foreach ($selectOptions as $selectOption) {
			$fieldName = strval($selectOption->attributes()->fieldName);
			if (isset($_REQUEST[$fieldName])) {
				if ($_REQUEST[$fieldName] != '') {
					if ($_REQUEST[$fieldName] == strval($selectOption->attributes()->fieldValue)) {
						$whereClause.= $fieldName." = ".$selectOption->attributes()->fieldValue." OR ";
					}
				}
			}
		}
		if ($whereClause != '') {
			$whereClause = substr($whereClause,0,strlen($whereClause)-4);
			$whereClause = "(".$whereClause.") AND ";
		}
	}
	return $whereClause;
}

function parseSingleFields($paramNode,$paramName) {
	$whereString = "";
 	if (isset($this->requestArr[$paramName])) {
		if ($this->requestArr[$paramName] != '' && $this->requestArr[$paramName] != 'all') {
			$whereString = $paramNode->attributes()->fieldName;
			if ($_REQUEST[$paramName] == 'Is Null' || $_REQUEST[$paramName] == 'Is Not Null') {
				if ($_REQUEST[$paramName] == 'Is Null') $whereString = $whereString." Is Null AND ";
				if ($_REQUEST[$paramName] == 'Is Not Null') $whereString = $whereString." Is Not Null AND ";
			} else {
				if ($paramNode->attributes()->operator == 'ge') {
					$whereString = $whereString." >= "; 
				} else if ($paramNode->attributes()->operator == 'le') {
					$whereString = $whereString." <= "; 
				} else if ($paramNode->attributes()->operator == 'eq') {
					$whereString = $whereString." = "; 
				} else if ($paramNode->attributes()->operator == 'like') {
					$whereString = $whereString." LIKE "; 
				}
				if ($paramNode->attributes()->datatype == 'date' || $paramNode->attributes()->datatype == 'text' || $paramNode->attributes()->datatype == 'int') {
					if ($paramNode->attributes()->datatype == 'date') {
					// convert the date to the format required by the database
						$user_date = date($this->date_format_user, strtotime($_REQUEST[$paramName].' 00:00:00'));
						$paramValue = date($this->date_format_database, strtotime($user_date.' 00:00:00'));
					}
					if ($paramNode->attributes()->datatype == 'text' || $paramNode->attributes()->datatype == 'int') {
						// escape the text entry to make sure that quotes and special characters are escaped
						$paramValue = mysql_real_escape_string($_REQUEST[$paramName]);
					}
					if ($paramNode->attributes()->operator == "like") {
						$whereString = $whereString."'%".$paramValue."%' AND ";
					} else {
						$whereString = $whereString."'".$paramValue."' AND ";
					}
				} else {
					$whereString = $whereString.$_REQUEST[$paramName]." AND ";
				}
			}
		}
	}	
	return $whereString;
}

function cmdText() {
	//echo $this->sqlStatement;
	//exit;
  $report_dataSet = mysql_query($this->sqlStatement);
  if (mysql_error()) {
		$systemErrMsg = "MySql error: ".mysql_error()." ".$this->sqlStatement;
		handle_error($systemErrMsg);
	}
	return $report_dataSet;
}

/*
  Gets the results from a stored procedure
*/
function cmdProc() {

	// defined in config.php
	global $mysqli;

	$returnArr = array();
	$paramString = $this->procParamString();
	$query = "CALL afids.".$this->reportCommandText."(".$paramString.")";
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
	//var_dump($returnArr);
	//exit;
	return $returnArr;
}

} // end of class
?>