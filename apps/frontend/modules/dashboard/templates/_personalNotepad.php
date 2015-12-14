<?php $sf_response->addJavascript('/js/tiny_mce/tiny_mce.js');
$note = $sf_data->getRaw('note');
$allowed_tags = $sf_data->getRaw('allowed_tags');
?>

<script type="text/javascript">
tinyMCE.init({
  mode : "exact",
  theme : "advanced",
  elements: "personal_note",
  theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,bullist,numlist",
  theme_advanced_buttons2 : "",
  theme_advanced_buttons3 : ""
});

function teamNotes()
{
 tinyMCE.get('personal_note').setContent($('#personal_note_read').hide().html());
 jQuery('#personal_note_save, #personal_edit').toggle();
      $('#personal_note_edit').show();
  
}

function saveTeamNotes()
{
      $('#personal_note_edit').hide();
      jQuery('#personal_note_loading').show();
      var data = tinyMCE.get('personal_note').getContent();
      $.ajax({
        url: '<?php echo url_for('dashboard/savePersonalNote')?>',
        data: { note: data },
        success: function (){
          $('#personal_note_read').show();
          $('#personal_note_loading').hide();
          jQuery('#personal_note_save, #personal_edit').toggle();
        }
      });
      $('#personal_note_read').html(data);
}

</script>

<div class="holder">
  <h3 id="personal_note_toggle" style="cursor:pointer;">
   <a id="personal_edit" onclick="teamNotes();return false;" style="float:right; margin-right: 10px;" href="#">Edit&nbsp;</a>
    <a href="#" id="personal_note_save" onclick="saveTeamNotes();return false;" style="float: right; margin-right: 10px; text-transform: lowercase; display: none;">save</a>
    personal notepad <?php echo image_tag('/images/loading.gif', array('id' => 'personal_note_loading', 'style' => 'display:none;'))?></h3>
  <div id="personal_note_edit" class="frame" style="display:none;padding:0px;">
    
    <textarea id="personal_note" name="content" style="width:100%; height:100%;">
    </textarea>
    
  </div>
  <div onclick="teamNotes();return false;" id="personal_note_read" class="frame">
    <?php echo strip_tags($note->getNote(), $allowed_tags)?>
  </div>
</div>