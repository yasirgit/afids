<?php use_helper('jQuery');
$sf_response->addJavascript('/js/jquery-ui.min.js');?>

<?php include_partial('role_permission/tab', array('tab' => 'right'))?>
<div class="raw_frame">
  <span id="indicator" style="display:none;">Please wait ...</span>
  <span id="notification"></span>
  
  <?php echo jq_form_remote_tag(array(
    'url'     => 'permission/save',
    'before'  => "$('#notification').html('');",
    'loading' => "$('#indicator').show();",
    'success' => "$('#indicator').hide(); if (data.substring(0, 2) == 'e1') { data=data.substring(2, data.length); } else resetForm(); navigate($('#permission_page').val()); $('#notification').html(data).effect('highlight', '', 3000);",
    'dataType'=> "text",
  ), array('id' => 'rr_form'))?>
    <input type="hidden" name="id"/>
    Title: <input type="text" name="title" maxlength="30" />
    Code: <input type="text" name="code" maxlength="30" />
    <input type="submit" id="rr_form_submit" value="Add Right"/>
    <?php echo jq_button_to_function('New Right', "resetForm()", array('style' => 'display:none', 'id' => 'rr_form_reset'));?>
  </form>
  
  <div id="permissions">
  <?php include_partial('permission/list', array(
    'permission_list' => $permission_list, 
    'max_array' => $max_array,
    'max' => $max,
    'pager' => $pager,
    'page' => $page,
  ));?>
  </div>
</div>

<?php jq_javascript_tag()?>
function navigate(page)
{
  page = parseInt(page);
  <?php echo jq_remote_function(array(
    'url'     => 'permission/list',
    'with'    => "{ page: page }",
    'before'  => "$('#indicator').show();",
    'success' => "$('#indicator').hide(); $('#permissions').html(data);",
  ));?>
}

function resetForm()
{
  $('#rr_form input=[name=id], #rr_form input=[name=title], #rr_form input=[name=code]').val('');
  $('#rr_form_submit').val('Add Right');
  $('#rr_form_reset').hide();
}

function fillForm(id, title, code)
{
  $('#rr_form input=[name=id]').val(id);
  $('#rr_form input=[name=title]').val(title);
  $('#rr_form input=[name=code]').val(code);
  $('#rr_form_submit').val('Save Right');
  $('#rr_form_reset').show();
}
<?php jq_end_javascript_tag()?>