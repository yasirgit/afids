<?php use_helper('jQuery');
$sf_response->addJavascript('/js/jquery-ui.min.js');?>

<?php include_partial('role_permission/tab', array('tab' => 'role'))?>
<div class="raw_frame">
  <span id="indicator" style="display:none;">Please wait ...</span>
  <span id="notification"></span>
  
  <?php echo jq_form_remote_tag(array(
    'url'     => 'role/save',
    'before'  => "$('#notification').html('');",
    'loading' => "$('#indicator').show();",
    'success' => "$('#indicator').hide(); navigate($('#role_page').val()); if (data.substring(0, 2) == 'e1') { data=data.substring(2, data.length); } else resetForm(); $('#notification').html(data).effect('highlight', '', 3000);",
    'dataType'=> "text",
  ), array('id' => 'rr_form'))?>
    <input type="hidden" name="id"/>
    <input type="text" name="title"/>
    <input type="submit" id="rr_form_submit" value="Add Role"/>
    <?php echo jq_button_to_function('New Role', "resetForm()", array('style' => 'display:none', 'id' => 'rr_form_new'));?>
  </form>
  
  <div id="roles">
  <?php include_partial('role/list', array(
    'role_list' => $role_list,
    'max_array' => $max_array,
    'max' => $max,
    'pager' => $pager,
    'page' => $page
  ));?>
  </div>
</div>

<?php jq_javascript_tag()?>
function navigate(page)
{
  page = parseInt(page);
  <?php echo jq_remote_function(array(
    'url'     => 'role/list',
    'with'    => "{ page: page }",
    'before'  => "$('#indicator').show();",
    'success' => "$('#indicator').hide(); $('#roles').html(data);",
  ));?>
}

function resetForm()
{
  $('#rr_form input=[name=id], #rr_form input=[name=title]').val('');
  $('#rr_form_submit').val('Add Role');
  $('#rr_form_new').hide();
}

function fillForm(id, title)
{
  $('#rr_form input=[name=id]').val(id);
  $('#rr_form input=[name=title]').val(title);
  $('#rr_form_submit').val('Save Role');
  $('#rr_form_new').show();
}
<?php jq_end_javascript_tag()?>