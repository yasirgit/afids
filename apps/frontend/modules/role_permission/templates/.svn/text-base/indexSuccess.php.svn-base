<?php
use_helper('Form', 'Object', 'jQuery');
$sf_response->addJavascript('/sfFormExtraPlugin/js/double_list.js');
$sf_response->addJavascript('/js/jquery-ui.min.js');
?>

<?php include_partial('role_permission/tab', array('tab' => 'assign'))?>
<div class="raw_frame">
  <?php
  if (isset($search)) 
      $selected = $search;
  elseif (isset($role_list[0])) {
      $selected = $role_list[0]; 
  }
  else $selected = null;

   
  echo select_tag('role', objects_for_select($role_list, 'getId', 'getTitle', $selected->getId()));
  ?>
  <br clear="all"/>
  
  <span id="indicator" style="display:none;">Please wait ...</span>
  <span id="notification"></span>
  <div id="role_permission"></div>
</div>



<?php if ($selected !== null) { jq_javascript_tag()?>
$(window).load(function() {
  showRights(<?php echo $selected->getId();?>);
});

$('#role').change(function() {
  showRights($(this).val());
});

function showRights(id)
{
  $('#indicator').show();
  $('#role_permission, #notification').html('');
  $.ajax({
    url: '<?php echo url_for('role_permission/show')?>',
    data: { id: id },
    dataType: 'html',
    success: function (html) {
      $('#role_permission').html(html);
      $('#indicator').hide();
    }
  });
}

function saveRights(id)
{
  <?php echo jq_remote_function(array(
    'url' => 'role_permission/save',
    'loading' => "$('#indicator').show();",
    'success' => "$('#indicator').hide(); $('#notification').html(data).effect('highlight', '', 3000);",
    'dataType'=> "text",
  ))?>
}

<?php jq_end_javascript_tag(); }?>