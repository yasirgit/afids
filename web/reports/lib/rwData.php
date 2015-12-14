<?php
/**
* rwData
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
class rwData {

/**
* Global variables
*/


public $sql_statement;

/**
* sql query resylt
*/
public $sql_result;

/**
* array of the columns to include, key => dataType
*/
public $column_arr;

/* class constructor
*/
function rwData () {
	// don't need to do anything here for now

}

function csv() {
		// check to be sure sql_result is set, otherwise, throw an error

		// check to be sure column_arr is set, otherwise, throw an error

		$csv_string = "";
		// create the header
		foreach ($this->column_arr as $fieldName => $dataType) {
			$csv_string.= '"'.$fieldName.'",';
		}
		$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
		while($row = mysql_fetch_assoc($this->sql_result)) {
			foreach($row as $key => $value) {
				if (isset($this->column_arr[$key])) {
					$csv_string.= '"'.$value.'",';
				}
			}
			$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
  	}
		return $csv_string;
}

} // end of class
?>