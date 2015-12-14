<?php
/**
* rwOutput
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

class rwOutput {

/**
* Global variables
*/


public $sql_statement;

/**
* sql query result
*/
public $sql_result_text;
public $sql_result_proc;

/**
* Base XML structure (string value)
* Use this to add in any pervasive nodes
*/
public $xml_base_structure;

/**
* array of the columns to include, key => dataType
*/
public $column_arr;

/* class constructor
*/
function rwOutput () {
	// don't need to do anything here for now

}

/*  old version
function csv($sql_result) {
		// check to be sure sql_result is set, otherwise, throw an error

		$csv_string = "";

		// create the header
		// if the column_arr variable is set, then use that array to build the column list
		// otherwise, use all the fields. This gives the report creator the ability to limit the fields
		// displayed/returned.
		if (count($this->column_arr) > 0) {
			foreach ($this->column_arr as $columnIndex => $dataType) {
				$header_string.= '"'.$columnIndex.'",';
			}
		}
		
		while($row = mysql_fetch_assoc($sql_result)) {
			if (count($this->column_arr) == 0) $header_string = "";
			foreach($row as $field => $value) {
				if (count($this->column_arr) == 0) {
					$header_string.= '"'.$field.'",';
					$csv_string.= '"'.$value.'",';
				} else {
					if (array_key_exists($field,$this->column_arr)) {
						$csv_string.= '"'.$value.'",';
					}
				}
			}
			$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
  	}
		$header_string = substr($header_string,0,strlen($header_string)-1)."\n";
		$csv_string = $header_string.$csv_string;
		return $csv_string;
}
*/

function csv($commandType) {
	$csv_string = "";

	// create the header
	// if the column_arr variable is set, then use that array to build the column list
	// otherwise, use all the fields. This gives the report creator the ability to limit the fields
	// displayed/returned.
	if (count($this->column_arr) > 0) {
		foreach ($this->column_arr as $columnIndex => $dataType) {
			$header_string.= '"'.$columnIndex.'",';
		}
	}

	if ($commandType == 'adCmdText') {
		while($row = mysql_fetch_assoc($this->sql_result_text)) {
			if (count($this->column_arr) == 0) $header_string = "";
			foreach($row as $field => $value) {
				if (count($this->column_arr) == 0) {
					$header_string.= '"'.$field.'",';
					$csv_string.= '"'.$value.'",';
				} else {
					if (array_key_exists($field,$this->column_arr)) {
						$csv_string.= '"'.$value.'",';
					}
				}
			}
			$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
  	}
		$header_string = substr($header_string,0,strlen($header_string)-1)."\n";
		$csv_string = $header_string.$csv_string;
		return $csv_string;
	}

	if ($commandType == 'adCmdStoredProc') {
		foreach($this->sql_result_proc as $row) {
			if (count($this->column_arr) == 0) $header_string = "";
			foreach($row as $field => $value) {
				if (count($this->column_arr) == 0) {
					$header_string.= '"'.$field.'",';
					$csv_string.= '"'.$value.'",';
				} else {
					if (array_key_exists($field,$this->column_arr)) {
						$csv_string.= '"'.$value.'",';
					}
				}
			}
			$csv_string = substr($csv_string,0,strlen($csv_string)-1)."\n";
  	}
		$header_string = substr($header_string,0,strlen($header_string)-1)."\n";
		$csv_string = $header_string.$csv_string;
		return $csv_string;
	}
}

function xml($basenode, $commandType) {
	//$sql_result, $structure = NULL, $basenode = 'xml', $columnsArr) {
   	// turn off compatibility mode as simple xml throws a wobbly if you don't.
	if (ini_get('zend.ze1_compatibility_mode') == 1)
	{
		ini_set ('zend.ze1_compatibility_mode', 0);
	}

	if ($this->xml_base_structure == NULL) {
		$structure = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$basenode/>");
	} else {
		$structure = simplexml_load_string($this->xml_base_structure);
	}
	
	// this works for the stored procedure results
	if ($commandType == 'adCmdStoredProc') {
		foreach($this->sql_result_proc as $row) {
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
				echo "array!";
				exit;
				$node = $structure->addChild($key);
				// recrusive call.
				$this->xml($basenode);
			} else {
				// add single node.
				if ($this->column_arr) {
					if (array_key_exists($key,$this->column_arr)) {
						// format according to the data type
						if ($this->column_arr[$key] == 'date') {
							$value = substr($value,0,10);
						}
						if ($this->column_arr[$key] == 'money') {
							$value = "$".$value;
						}
					}
				}
				$value = htmlentities($value, ENT_NOQUOTES, "UTF-8");

				if (array_key_exists($key,$this->column_arr) || count($this->column_arr) == 0) {
					$cellNode = $record->addChild($key, $value);
					if ($this->column_arr) {
						if ($this->column_arr[$key] == 'money') {
							$cellNode->addAttribute("align","right");
						}
						if ($this->column_arr[$key] == 'number') {
							$cellNode->addAttribute("align","right");
						}
					}
				}
			}
  		}
  	}
	}
	
	// this works for the sql commands
	if ($commandType == 'adCmdText') {
		while($row = mysql_fetch_assoc($this->sql_result_text)) {
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
				echo "array!";
				exit;
				$node = $structure->addChild($key);
				// recrusive call.
				$this->xml($basenode);
			} else {
				// add single node.
				if (count($this->column_arr) > 0) {
					if (array_key_exists($key,$this->column_arr)) {
						// format according to the data type
						if ($this->column_arr[$key] == 'date') {
							$value = substr($value,0,10);
						}
						if ($this->column_arr[$key] == 'money') {
							$value = "$".$value;
						}
					}
				}
				$value = htmlentities($value, ENT_NOQUOTES, "UTF-8");
				if (array_key_exists($key,$this->column_arr) || count($this->column_arr) == 0) {

					$cellNode = $record->addChild($key, $value);
					if ($this->column_arr) {
						if ($this->column_arr[$key] == 'money') {
							$cellNode->addAttribute("align","right");
						}
						if ($this->column_arr[$key] == 'number') {
							$cellNode->addAttribute("align","right");
						}
					}
				}
			}
  		}
  	}
	}
	
	// pass back as string. or simple xml object if you want!
	return $structure;	


  	
	
}

function json($iDisplayStart,$iDisplayLength) {

	$iDisplayStart = $_GET['iDisplayStart'];
	$iDisplayLength = $_GET['iDisplayLength'];
	$final_sql = $this->sql_statement;
	if (isset($_GET['iDisplayStart'])) $final_sql.= " LIMIT ".$iDisplayStart;
	if (isset($_GET['iDisplayLength'])) $final_sql.= ",".$iDisplayLength;
	//echo $final_sql;
	//exit;
	$rResult = mysql_query($final_sql) or die(mysql_error());

	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$fromClause = substr($this->sql_statement,stripos($this->sql_statement,"FROM"), strlen($this->sql_statement)-stripos($this->sql_statement,"FROM"));
	$totalCountSql = "SELECT count(*) as totalCount ".$fromClause;
	
	$rResultFilterTotal = mysql_query($totalCountSql) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal['totalCount'];
	$iTotal = $iFilteredTotal;
	
	$sOutput = '{';
	$sOutput .= '"sEcho": '.intval($_GET['sEcho']).', ';
	$sOutput .= '"iTotalRecords": '.$iTotal.', '; //should be the total number of rows in the dataset without filtering and with out paging
	$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', '; //should be the total number of rows in the dataset with filtering and with out paging
	$sOutput .= '"aaData": [ ';
	while($aRow = mysql_fetch_assoc($rResult)) {
		$sOutput .= "[";
		foreach($aRow as $field => $value) {
			$value = str_replace("'","\'",$value);
			if (array_key_exists($field,$this->column_arr) || count($this->column_arr) == 0) $sOutput .= '"'.$value.'",';
		}
		$sOutput = substr($sOutput,0,strlen($sOutput)-1);
		$sOutput .= "],";
	}
	$sOutput = substr_replace( $sOutput, "", -1 );
	$sOutput .= '] }';
	
	return $sOutput;

}

} // end of class
?>