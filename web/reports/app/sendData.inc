<!-- dialog for the send email form-->
<div id="dialog_send_report" title="Send Report">
	<div>
		<form id="sendReportForm" style="width:475px">
			<input type="hidden" name="action" id="action" value="display"/>
			<input type="hidden" name="outtype" id="outtype" value="email"/>			
			<input type="hidden" name="reportDef" id="reportDef" value=""/>
			<input type="hidden" name="reportName" id="reportName" value=""/>
			<input type="hidden" name="startDate" id="startDate" value="1/1/2010"/>
			<input type="hidden" name="endDate" id="endDate" value="1/15/2010"/>
			<table border="0" cellpadding="4" cellspacing="4">
				<tr>
					<td>Recipient Email:</td>
					<td><input type="text" name="recipient_email" id="recipient_email" size="25" value=""/>&nbsp;<span id="recipient_email_error"></span></td>
				</tr>
				<tr>
					<td>Subject:</td>
					<td><input type="text" name="subject" id="subject" size="50" value=""/>&nbsp;<span id="subject_error"></span></td>
				</tr>
				<tr>
					<td>Message:</td>
					<td><textarea name="message" id="message" rows="5" cols="45"></textarea></td>
				</tr>
				<tr>
					<td>Attachment:</td>
					<td>
						<input type="checkbox" name="attachment_in_body" id"attachment_in_body" value="1" checked="checked"/>Include report in body of email
						<br/><input type="checkbox" name="attachment_as_pdf" id"attachment_as_pdf" value="1" checked="checked"/>Attach as PDF file	
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><div id="responseMessage" style="width:250px"></div>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Submit"/></td>
				</tr>
				</table>	
		</form>
	</div>
</div>
<script type="text/javascript" language="javascript">
	// create the dialog that we'll use for choices
  jQuery("#dialog_send_report").dialog({
  	autoOpen: false,
    modal: true,
		resizable: false,
		title: "Send Report",
		height: 500,
		width: 500,
		closeable: false,
    buttons: {
    	"Close": function() {
		  	// clear any loading message
  			jQuery("#responseMessage").html("");
    		jQuery(this).dialog("close"); 
    		return false;
    	}
    }
   });
   
  jQuery('#sendReportForm').submit(function() {
  	if (jQuery("#recipient_email").val() == '') {
  		jQuery("#recipient_email_error").html('Required');
  		return false;
  	}
  	if (jQuery("#subject").val() == '') {
  		jQuery("#subject_error").html('Required');
  		return false;
  	}
  	// add a loading message
  	jQuery("#responseMessage").html("<img src='/reports/images/loader.gif' border='0'/>Sending your report...");
  	var postData = jQuery(this).serialize();
  	jQuery.ajax({
		  type: 'POST',
  		url: '/reports/reports.php',
  		data: postData,
  		success: postDataSuccess,
  		error: postDataError,
  		dataType: 'json'
		});
  	return false;
	});
	

function postDataSuccess(responseData) {
	if (responseData.response) {
		jQuery("#responseMessage").html(responseData.response);
	} else {
		jQuery("#responseMessage").html("There was an error sending your email. " + responseData);
	}
}

function postDataError(XMLHttpRequest, textStatus, errorThrown) {
	var errMsg = 'Unspecified error: ' + textStatus;
	if (textStatus == 'parsererror') errMsg = "The response from the server was not valid. Please notify the webmaster.";
	// call to an error service that notifies the webmaster
	
	jQuery("#responseMessage").html("There was an error sending your email: " + errMsg);
}

function sendReportFormOpen(reportDef, reportName, paramStr) {
	jQuery("#reportName").val(reportName);
	jQuery("#reportDef").val(reportDef);
	// the params from the report are passed as &name=value. We need to parse them into hidden fields in the form
	var paramArr = paramStr.split('&');
	for (var p = 0; p < paramArr.length; p++) {
		var itemArr = paramArr[p].split('='); 
		jQuery('#sendReportForm').append('<input type="hidden" name="' + itemArr[0] + '" id="' + itemArr[0] + '" value="' + itemArr[1] + '"/>');
	}
	jQuery("#dialog_send_report").dialog('open');	
}	
</script>