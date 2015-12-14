<?php $sf_response->addJavascript('/js/tiny_mce/tiny_mce.js');
$allowed_tags = $sf_data->getRaw('allowed_tags');
$team_notes = $sf_data->getRaw('team_notes');
?>

<script type="text/javascript">
tinyMCE.init({
  mode : "exact",
  theme : "advanced",
  elements: "team_note",
  theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,bullist,numlist",
  theme_advanced_buttons2 : "",
  theme_advanced_buttons3 : ""
});

function teamNote(id)
{
  tinyMCE.get('team_note').setContent(jQuery('#team_' + id + '_note').html());
  jQuery('#team_note_edit, #team_note_read, #team_note_save, #team_edit').toggle();
  jQuery('#team_note_id').val(id);
}

function saveTeamNote()
{
  var id = jQuery('#team_note_id').val();
  var data = tinyMCE.get('team_note').getContent();
  jQuery('#team_note_loading').show();
  jQuery.ajax({
    url: '<?php echo url_for('dashboard/saveTeamNote')?>',
    data: { note: data, id: id },
    dataType: 'html',
    success: function (html) {
      jQuery('#team_note_loading').hide();
      jQuery('#team_note_edit, #team_note_read, #team_note_save, #team_edit').toggle();
    }
  });
  jQuery('#team_' + id + '_note').show().html(data);
}

var reloadFunc = function(functionname, timeout){
  window.setTimeout(function(){
    eval(functionname);
    reloadFunc(functionname, timeout);
  }, timeout);
}

reloadFunc("reLoadTeamNote();", 60000);

function reLoadTeamNote()
{
  var id = <?php echo $person_role->getRoleId()?>;
  jQuery.ajax({
    url: '<?php echo url_for('dashboard/reloadTeamNote')?>',
    data: { id: id },
    success: function (html) {
      jQuery('#team_' + id + '_note').html(html)
      tinyMCE.getInstanceById('team_note').setContent(html)
    }
  });
}
</script>

<div class="holder">
  <h3 class="heading-2">
    <a id="team_edit" onclick="teamNote(<?php echo $person_role->getRoleId()?>);return false;" style="float:right; margin-right: 10px;" href="#">Edit&nbsp;</a>
    <a href="#" id="team_note_save" onclick="saveTeamNote();return false;" style="float: right; margin-right: 10px; text-transform: lowercase; display: none;">save changes</a>
    team notepad
    <?php echo image_tag('/images/loading.gif', array('id' => 'team_note_loading', 'style' => 'display:none;'))?>
  </h3>
  <div id="team_note_read" class="frame" style="padding:0px;">
    <?php //foreach ($person_roles as $person_role){?>
    
      
    
    <div onclick="teamNote(<?php echo $person_role->getRoleId()?>);return false;" style="padding: 0 0 5px 14px;" id="team_<?php echo $person_role->getRoleId()?>_note">
      <?php foreach ($team_notes as $team_note) {
          echo strip_tags($team_note->getNote(), $allowed_tags);
      }?>
    </div>
    <?php //}?>
  </div>

  <div id="team_note_edit" class="frame" style="display:none; padding:0;">
    <input type="hidden" id="team_note_id"/>
    <textarea id="team_note" name="content" style="width:100%; height:100%;"></textarea>
  </div>
</div>