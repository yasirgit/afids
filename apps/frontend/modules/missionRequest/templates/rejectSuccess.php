
<form name="frmSample" action="<?php echo url_for('missionRequest/reject')?>" method="post" onSubmit="return ValidateForm()">
    <input type="hidden" value="1" name="send_mail" />
    <input type="hidden" value="<?php echo $mission_req->getId()?>" name="id" />
    <input type="hidden" name="hemail" value="<?php echo $mission_req->getFollowUpEmail();?>"
<table>
	<tr>
		<td><b>Pass:</b></td>
		<td><input disabled="disabled" type="text" value="<?php echo $mission_req->getPassFirstName()?>"></td>
	</tr>
	<tr>
		<td><b>Follow Up Contact:</b></td>
		<td><input disabled="disabled" type="text" value="<?php echo $mission_req->getFollowUpContactName()?>"></td>
	</tr>
	<tr>
		<td><b>Email:</b></td>
                <td><input  type="text" id="email" disabled="disabled" class="text" name="email" value="<?php echo $mission_req->getFollowUpEmail();?>"></td>
	</tr>
	<tr>
		<td><b>Subject:</b></td>
		<td><input type="text" id="subject" class="text" name="subject" value="Mission Request Rejected"></td>
	</tr>
	<tr>
		<td><b>Text:</b></td>
		<td><textarea rows="14" cols="40" id="body" name="body">The request has been rejected</textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><INPUT type="submit" value="Send"></td>
	</tr>
</table>
</form>

<script language="Javascript">
function echeck(str) {

    var at="@"
    var dot="."
    var lat=str.indexOf(at)
    var lstr=str.length
    var ldot=str.indexOf(dot)
    if (str.indexOf(at)==-1){
       alert("Invalid E-mail ID")
       return false
    }

    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
       alert("Invalid E-mail ID")
       return false
    }

    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
        alert("Invalid E-mail ID")
        return false
    }

     if (str.indexOf(at,(lat+1))!=-1){
        alert("Invalid E-mail ID")
        return false
     }

     if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
        alert("Invalid E-mail ID")
        return false
     }

     if (str.indexOf(dot,(lat+2))==-1){
        alert("Invalid E-mail ID")
        return false
     }
    
     if (str.indexOf(" ")!=-1){
        alert("Invalid E-mail ID")
        return false
     }

     return true          
  }

function ValidateForm(){
  var emailID = document.frmSample.email;
  var text    = document.frmSample.body;
  var subject = document.frmSample.subject;

  if ((emailID.value==null)||(emailID.value=="")){
    alert("Please Enter Email")
    emailID.focus()
    return false
  }
  if (echeck(emailID.value)==false){
      emailID.value=""
      emailID.focus()
      return false
    }
  
  if ((subject.value==null)||(subject.value=="")){
      alert("Please Enter subject")
      subject.focus()
      return false
    }
  if ((text.value==null)||(text.value=="")){
	    alert("Please Enter email text")
	    text.focus()
	    return false
	  }
  return true
 }
</script>
