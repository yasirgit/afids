<?php
$sf_response->addJavascript('/js/tiny_mce/tiny_mce.js');
$sf_response->addJavascript('/js/jquery.validate.js');
use_helper('Form', 'jQuery', 'Object');
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#emails_diff_persons_form").validate();
    });
</script>
<h2>Sending Mission Data</h2>
<h3>Send the mission information form by fax or email to the following recipients:</h3>

<a href="#addpassenger-popup" class="open-popup" id="open_popup"></a>

<form id="emails_diff_persons_form" method="post" action="<?php echo url_for('missionLeg/sendLegEmail')?>" enctype="multipart/form-data">
  <?php echo input_hidden_tag('leg_id', $mission_leg->getId());?>  
  <div class="passenger-form">
    <div class="box full">      
      <div class="wrap">
        <label for="sender_email">Attach Waiver:</label>
        <input type="radio" value="1" name="waiver" id="waiver"/>
        <label>Yes</label>
        <input type="radio" checked="checked" value="0" name="waiver" id="waiver"/>
        <label>No</label>
      </div>
      <div class="wrap" style="overflow-x: auto;">
        <label for="message">Cover Note:</label><br clear="all"/>
        <?php echo textarea_tag('message', $cover_note, array('style' => 'width: 520px; height: 200px;'))?>
      </div>
      <div class="wrap">
          <h1>Send To:</h1>
      </div>
      <div class="wrap">        
          <div class="legemail_box">
              <div class="heading">Passenger : <?php echo $person->getFirstName();?> <?php echo $person->getLastName();?> </div>
              <!--div class="chbox">&nbsp;&nbsp;
                <input type="checkbox" disabled="disabled" value="1" name="emails[ch_passwelcome_leg_all_otherfax]" />
              </div>
              <div class="leglabel">Other Fax:</div>
              <div class="leg_filed">
                <?php //echo input_tag('emails[passwelcome_leg_all_otherfax]', $passwelcome_leg_all_otherfax, array('class' => 'text','disabled'=>'disabled'));?>
              </div-->
              <?php if($person->getEmail()){?>
              <div class="chbox">&nbsp;&nbsp;
                <input type="checkbox" value="1" name="emails[ch_passwelcome_leg_all_email]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
              <?php echo $person->getEmail();?>
                  <input type="hidden" value="<?php echo $person->getEmail();?>" name="emails[passwelcome_leg_all_email]">
              </div>
              <?php } ?>
              <div class="chbox">&nbsp;&nbsp;
                <input type="checkbox" value="1" name="emails[ch_passwelcome_leg_all_otheremail]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed">
                  <?php echo input_tag('emails[passwelcome_leg_all_otheremail]', $passwelcome_leg_all_otheremail, array('class' => 'text email'));?>
              </div>
          </div>          
          <div class="legemail_box">
              <div class="heading">Requester : <?php echo $requesterPerson->getFirstName();?> <?php echo $requesterPerson->getLastName();?></div>
              <!--div class="chbox">
                  <input type="checkbox" disabled="disabled" value="1" name="emails[ch_req_leg_all_otherfax]" />
              </div>
              <div class="leglabel">Other Fax:</div>
                <div class="leg_filed">
                  <?php //echo input_tag('emails[req_leg_all_otherfax]', $req_leg_all_otherfax, array('class' => 'text','disabled'=>'disabled'));?>
                </div-->
              <?php if($requesterPerson->getEmail()){?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_req_leg_all_email]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">                  
                  <?php echo $requesterPerson->getEmail();?>
                  <input type="hidden" value="<?php echo $requesterPerson->getEmail();?>" name="emails[req_leg_all_email]">
              </div>
              <?php } ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_req_leg_all_otheremail]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed"><?php echo input_tag('emails[req_leg_all_otheremail]', $req_leg_all_otheremail, array('class' => 'text email'));?></div>
          </div>
          <?php if ($allMissionLegs) {
          $index = 0;
          foreach ($allMissionLegs as $mleg) {

            if($mleg->getPilotId()) {
               $pilot_info= PilotPeer::retrieveByPK($mleg->getPilotId());
               $pilot_person = $pilot_info->getMember()->getPerson();
            }
            if($mleg->getMissAssisId())
            {
                $memberMiss = MemberPeer::retrieveByPK($mleg->getMissAssisId());
                $miss_preson= $memberMiss->getPerson();
            }

            if($mleg->getBackupPilotId())
            {           
                $backup_pilot_info = PilotPeer::retrieveByPK($mleg->getPilotId());
                $backup_pilot_preson = $backup_pilot_info->getMember()->getPerson();
            }            
           
            if($mleg->getCoordinatorId())
            {
                $coordinator = CoordinatorPeer::retrieveByPK($mleg->getCoordinatorId());
                if($coordinator->getMemberId())
                {
                   $coordinator_preson = $coordinator->getMember()->getPerson();
                }
            }
          ?>
          <div class="legemail_box">
              <div class="heading">Pilot, Leg#: <?php echo $mleg->getLegNumber();?> <?php if(!$mleg->getPilotId()) echo " Not assigned";?></div>
              <?php if(isset($pilot_person) && $pilot_person->getFaxPhone1()){?>
              <!--div class="chbox">
                  <input type="checkbox" disabled="disabled" value="1" name="emails[ch_pilot_primaryfax_<?php //echo $index;?>]" />
              </div>
              <div class="leglabel">Primary Fax :</div>

              <div class="leg_filed"><?php echo $pilot_person->getFaxPhone1();?>
                  <input type="hidden" value="<?php //echo $pilot_person->getFaxPhone1();?>" name="emails[pilot_primaryfax_<?php //echo $index;?>]" />
              </div-->
              <?php } ?>
              <!--div class="chbox">
                  <input type="checkbox" disabled="disabled" value="1" name="emails[ch_pilot_otherfax_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Fax:</div>
              <div class="leg_filed">
                  <input type="text" disabled="disabled" class="text" name="emails[pilot_otherfax_leg_<?php echo $index;?>]" />
              </div-->
              <?php if($mleg->getPilotId()){?>              
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_pilot_email_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $pilot_person->getEmail();?>
                  <input type="hidden" class="text" value="<?php echo $pilot_person->getEmail();?>" name="emails[pilot_email_leg_<?php echo $index;?>]" />
              </div>
              <?php } ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_pilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed">
                  <input type="text" class="text email"  email="true" name="emails[pilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Mission Assistant, Leg# <?php echo $mleg->getLegNumber();?> <?php if(!$mleg->getMissAssisId()) echo " Not assigned";?></div>
              <!--div class="chbox">
                  <input type="checkbox" disabled="disabled" value="1" name="emails[ch_copilot_otherfax_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Fax:</div>
              <div class="leg_filed">
                  <input type="text" disabled="disabled" class="text" value="" name="emails[copilot_otherfax_leg_<?php echo $index;?>]" />
              </div-->
              <?php if($mleg->getMissAssisId()) {?>              
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_copilot_email_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Email : </div>
              <div class="leg_filed">
                  <?php echo $miss_preson->getEmail();?>
                  <input type="hidden" class="text" value="<?php echo $miss_preson->getEmail();?>" name="emails[copilot_email_leg_<?php echo $index;?>]" />
              </div>
              <?php } ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_copilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed">
                  <input type="text" class="text email" value="" email="true" name="emails[copilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Backup Pilot, Leg#: <?php echo $mleg->getLegNumber();?> <?php if(!$mleg->getBackupPilotId()) echo " Not assigned";?></div>
              <!--div class="chbox">
                  <input type="checkbox" disabled="disabled" value="1" name="emails[ch_backuppilot_otherfax_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Fax:</div>
              <div class="leg_filed">
                  <input type="text" class="text" value="" disabled="disabled" name="emails[backuppilot_otherfax_leg_<?php echo $index;?>]" />
              </div-->
              <?php if($mleg->getBackupPilotId()){?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_backuppilot_email_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_pilot_preson->getEmail();?>
                  <input type="hidden" class="text" value="<?php echo $backup_pilot_preson->getEmail();?>" name="emails[backuppilot_email_leg_<?php echo $index;?>]" />
              </div>
              <?php } ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_backuppilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed">
                  <input type="text" class="text email" value="" email="true" name="emails[backuppilot_otheremail_leg_<?php echo $index;?>]" />
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Volunteer coordinator, Leg# : <?php echo $mleg->getLegNumber();?> <?php if($mleg->getCoordinatorId() && $coordinator->getMemberId()) { echo ""; } else { echo " Not assigned"; }?> </div>
              <!--div class="chbox">
                  <input type="checkbox" value="1" disabled="disabled" name="emails[ch_coord_otherfax_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Fax:</div>
              <div class="leg_filed">
                  <input type="text" class="text" disabled="disabled" value="" name="emails[coord_otherfax_leg_<?php echo $index;?>]" />
              </div-->
              <?php if($mleg->getCoordinatorId() && $coordinator->getMemberId())  { ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_coord_email_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                   <?php echo $coordinator_preson->getEmail();?>
                  <input type="hidden" class="text" value="<?php echo $coordinator_preson->getEmail();?>" name="emails[coord_email_leg_<?php echo $index;?>]" />
              </div>
              <?php } ?>
              <div class="chbox">
                  <input type="checkbox" value="1" name="emails[ch_coord_otheremail_leg_<?php echo $index;?>]" />
              </div>
              <div class="leglabel">Other Email:</div>
              <div class="leg_filed">
                  <input type="text" class="text email" value="" email="true" name="emails[coord_otheremail_leg_<?php echo $index;?>]" />
              </div>
          </div>       
       <?php $index++;
            }
           }?>
      </div>         
      <div class="form-submit">
        <a class="btn-action" href="#" onclick="$('#form_submit').click();return false;"><span>Send Email &raquo;</span><strong> </strong></a>
        <input type="submit" id="form_submit" class="hide" />
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
tinyMCE.init({
  mode : "exact",
  theme : "advanced",
  elements: "message",
  plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
  theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true
});

function addAttachment(el)
{
  $('input[type=file]').each(function () {
    if ($(this).is(':visible') == false) {
      $(this).show();
      return false;
    }
  });
  if ($('#attachment5').is(':visible')) {
    $(el).hide();
    $('#attachment_message').show();
  }
}

function saveTemplate()
{
  var data = tinyMCE.get('message').getContent();
  var subject = $('#subject').val();
  var name = $('#sender_name').val();
  var email = $('#sender_email').val();
  var template = $('#template_name').val();

  $('#template_message').hide();

  $.ajax({
    url: '<?php echo url_for('email_template/ajaxSave')?>',
    data: { body: data, subject: subject, name: name, email: email, template: template },
    dataType: 'html',
    success: function (html) {
      if (html[0] == '#') {
        html = html.substr(1);
        setTimeout("$('#template_message').hide();", 3000);
      }
      $('#template_message').show().html(html);
    }
  });
}

function loadTemplate(el)
{
  var v = $(el).val();
  if (v) {
    $('#template_loading').show();
    $.ajax({
      url: '<?php echo url_for('email_template/ajaxGetTemplate')?>',
      data: { id: v },
      dataType: 'json',
      success: function (json){
        $('#subject').val(json.subject);
        $('#sender_name').val(json.name);
        $('#sender_email').val(json.email);
        tinyMCE.get('message').setContent(json.message);
        $('#template_loading').hide();
      }
    });
  }
}

$('#open_popup').click(function () {
  $('#popup_loader').show();
  $.ajax({
    url: '<?php echo url_for('pilot/wingslist')?>',
    dataType: 'html',
    success: function (html) {
      $('#popup_content').html(html);
      $('#popup_loader').hide();
    }
  });
});

function countFiltered(form_id)
{
  var leg_ids = '';
  $('input[name=leg_ids[]]').each(function () {
    leg_ids += '&leg_ids[]=' + $(this).val();
  });
  $.ajax({
    url: '<?php echo url_for('pilot/ajaxFilterEmailCount')?>',
    data: $('#'+form_id).serialize() + leg_ids,
    dataType: 'html',
    success: function (html) {
      $('#matches').html(html);
    }
  });
}

function getFiltered(form_id)
{
  var leg_ids = '';
  $('input[name=leg_ids[]]').each(function () {
    leg_ids += '&leg_ids[]=' + $(this).val();
  });

  $.ajax({
    url: '<?php echo url_for('pilot/ajaxFilterEmailMatches')?>',
    data: $('#'+form_id).serialize() + leg_ids,
    dataType: 'html',
    success: function (html) {

      $('#recipients').val(html);
    }

  });
 $('#lightbox-overlay').click();
}
</script>

<?php slot('popup')?>
	<div class="add-passenger" id="addpassenger-popup">
		<div class="holder">
			<div class="bg">
        <div id="popup_content"></div>
        <img src="/images/loading.gif" id="popup_loader"/>
			</div>
		</div>
	</div>
<?php end_slot()?>