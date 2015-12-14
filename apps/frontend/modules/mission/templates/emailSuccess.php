<?php
$sf_response->addJavascript('/js/tiny_mce/tiny_mce.js');
use_helper('Form', 'jQuery', 'Object');
?>
<h2>Send Missions to Pilot</h2>

<a href="#addpassenger-popup" class="open-popup" id="open_popup"></a>

<form method="post" action="<?php echo url_for('mission/sendEmail')?>" enctype="multipart/form-data">
  <?php foreach ($mission_legs as $mission_leg) echo input_hidden_tag('leg_ids[]', $mission_leg->getId(), array('id' => 'leg_id_'.$mission_leg->getId()))?>
  <div class="passenger-form">
    <div class="box full">
      <div class="wrap">
        <label for="recipients">To</label>
        <a href="#" onclick="$('#open_popup').click();return false;">select from list</a>
        <textarea rows="5" cols="40" class="text" name="recipients" id="recipients"><?php echo $recipients?></textarea>
        <?php if (isset($errors['email'])) {?>
        <ul class="error_list">
          <?php foreach ($errors['email'] as $e) {?>
          <li><?php echo $e?></li>
          <?php }?>
        </ul>
        <?php }?>
      </div>
      <div class="wrap">
        <label for="template_id">Load from template</label>
        <?php echo select_tag('template_id', objects_for_select($email_templates, 'getId', 'getName', null, array('include_custom' => 'No Template')), array('class' => 'text', 'onchange' => 'loadTemplate(this);'))?>
        <img src="/images/loading.gif" id="template_loading" style="display:none;"/>
      </div>
      <div class="wrap">
        <label for="subject">Subject</label>
        <?php echo input_tag('subject', $subject, array('class' => 'text'));?>
        <?php if (isset($errors['subject'])) {?>
        <ul class="error_list">
          <li><?php echo $errors['subject']?></li>
        </ul>
        <?php }?>
      </div>
      <div class="wrap">
        <label for="sender_name">Sender Name</label>
        <?php echo input_tag('sender_name', $sender_name, array('class' => 'text'));?>
      </div>
      <div class="wrap">
        <label for="sender_email">Sender Email</label>
        <?php echo input_tag('sender_email', $sender_email, array('class' => 'text'));?>
        <?php if (isset($errors['sender_email'])) {?>
        <ul class="error_list">
          <li><?php echo $errors['sender_email']?></li>
        </ul>
        <?php }?>
      </div>
      <div class="wrap" style="overflow-x: auto;">
        <label for="message">Message</label><br clear="all"/>
        <?php echo textarea_tag('message', $message, array('style' => 'width: 500px; height: 200px;'))?>
      </div>
      <div class="wrap">
        <label>Included Missions</label>
        <div class="wrap" style="overflow-y:scroll; height: 150px;">
          <?php include_component('mission', 'includedMissions', array('mission_legs' => $mission_legs))?>
        </div>
      </div>
      <div class="wrap">
        <label for="save_template">Save as a template</label>
        <div class="wrap">
          <input type="checkbox" value="1" id="save_template" onchange="$('#new_template').toggle();"/><br/>
          <span id="new_template" style="display:none;">
            <label for="template_name">Template Name</label>
            <input type="text" class="text narrow" id="template_name"/>
            <a href="#" onclick="saveTemplate(); return false;">Save</a>
            <div id="template_message" style="display:none; clear:both;"></div>
          </span>
        </div>
      </div>
      <div class="wrap">
        <label>Attachment</label>
        <div class="wrap">
          <input type="file" name="attachment1" id="attachment1"/>
          <input type="file" name="attachment2" id="attachment2" style="clear:left; display: none;"/>
          <input type="file" name="attachment3" id="attachment3" style="clear:left; display: none;"/>
          <input type="file" name="attachment4" id="attachment4" style="clear:left; display: none;"/>
          <input type="file" name="attachment5" id="attachment5" style="clear:left; display: none;"/>
          <br clear="all"/>
          <span id="attachment_message" style="display: none;">You attach up to 5 files</span>
          <?php echo jq_link_to_function('+ add another file', 'addAttachment(this);', array('style' => 'clear:left;'))?>
        </div>
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