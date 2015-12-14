<?php

function DateAdd($start_date, $unit, $interval) {

$curdate = new DateTime($start_date);
$newDate = $curdate->date_add(new DateInterval("P1D"));

return $newDate;

}

function firstOfMonth($date_format) {
	return date($date_format, strtotime(date('m').'/01/'.date('Y').' 00:00:00')); 	
} 
 
function lastOfMonth($date_format) { 
	return date($date_format, strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00')))); 
}

function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext) {

	// Here I am using the switch() statement to take action depending on the value of $errno. 
	// Anything less than E_USER_ERROR will be ignored and processing will continue.

	// Note that by defining your own error handler the standard PHP error handler is completely bypassed and any settings for error_reporting() are completely ignored.
	// This is why we are checking for all possible error levels, not just fatal errors.

  switch ($errno) {
     case E_USER_WARNING:
     case E_USER_NOTICE:
     case E_WARNING:
     case E_NOTICE:
     case E_CORE_WARNING:
     case E_COMPILE_WARNING:
        break;
     case E_USER_ERROR:
     case E_ERROR:
     case E_PARSE:
     case E_CORE_ERROR:
     case E_COMPILE_ERROR:

	// Here I am picking up the last SQL query from a global variable. 
	// I am them checking the contents of $errstr to see if this error was triggered with the string 'SQL' so I know when 
	// to include some additional information.

		global $query;
   
		if (preg_match('/^(sql)$/i', $errstr)) {
    	$MYSQL_ERRNO = mysql_errno();
    	$MYSQL_ERROR = mysql_error();
      	$errstr = "MySQL error: $MYSQL_ERRNO : $MYSQL_ERROR";
		} else {
  		$query = NULL;
		}

		$errorstring = "<h2>" .date('Y-m-d H:i:s') ."</h2>\n";
    $errorstring .= "<p>Fatal Error: $errstr (# $errno).</p>\n";

		if ($query) $errorstring .= "<p>SQL query: $query</p>\n";

// These next lines will identify the filename and line number where the error was triggered, plus the name of the currently executing script.

		$errorstring .= "<p>Error in line $errline of file '$errfile'.</p>\n";
		$errorstring .= "<p>Script: '{$_SERVER['PHP_SELF']}'.</p>\n";

// These next lines of code show you how it is possible to extract some more information about the context of the current error. In this case if the context is an object it will extract the name of the class and the name of the parent class (if it is a derived class).

		if (isset($errcontext['this'])) {
    	if (is_object($errcontext['this'])) {
      	$classname = get_class($errcontext['this']);
        $parentclass = get_parent_class($errcontext['this']);
        $errorstring .= "<p>Object/Class: '$classname', Parent Class: '$parentclass'.</p>\n";
    	}
    }

// This next group of lines will send the error message to the client's browser.

		echo "<h2>This system is temporarily unavailable</h2>\n";
    echo "<p>The following has been reported to the administrator:</p>\n";
    echo "<b><font color='red'>\n$errorstring\n</b></font>";

// This next line of code will send the error details to the system administrator by email.

         error_log($errorstring, 1, $_SERVER['SERVER_ADMIN']);

// Here I am appending the error details to a disk file with the extension '.html' so that I can easily view its contents with my browser. This means that I do not have to wait for the email to arrive to obtain the details of the error.

         $logfile = $_SERVER['DOCUMENT_ROOT'] .'/errorlog.html';
         error_log($errorstring, 3, $logfile);

// The final act is to terminate the current session then cease processing altogether.

         session_start();
         session_unset();
         session_destroy();
         die();
      default:
         break;
   } // switch
} // errorHandler

function handle_system_error($errorMsg) {
	include("/reports/app/templates/input_header.html");
	echo "<h3>Error</h3>";
	echo "<p>$errorMsg</p>";
	echo "<p>We apologize for the inconvenience. A system administrator has been notified of this error.";
	include("/reports/app/templates/input_footer.html");
	exit;
}
?>