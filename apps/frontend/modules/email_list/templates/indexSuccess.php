<?php
use_helper('jQuery', 'Form');
/* @var $email_list EmailList */
$role_widget = $sf_data->getRaw('role_widget');
?>

<h2>Mailing List Management</h2>

<table>
  <thead>
    <tr>
      <th></th>
      <th>Subscribers</th>
      <th>Management</th>
      <th>Subscriptions</th>
      <th>Batch process notifications</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($email_lists as $email_list) {?>
    <tr>
      <td>
        <?php echo $email_list->getDescription()?><br/>
        <?php echo jq_link_to_function('edit', '', array('class' => 'action-edit'))?>
        <?php echo jq_link_to_function('remove', '', array('class' => 'action-remove'))?>
      </td>
      <td>
        <?php echo link_to($email_list->countEmailListPersons(), 'person/mailingList?id='.$email_list->getId())?>
        <?php echo link_to('add', 'person/subscribe?id='.$email_list->getId(), array('class' => 'link-add'))?>
      </td>
      <td id="roles_for_<?php echo $email_list->getId()?>">
        <?php $role_ids = array()?>
        <?php foreach ($email_list->getEmailListRolesJoinRole() as $i => $email_list_role) {?>
          <?php $role_ids[] = $email_list_role->getRoleId() ?>
          <?php echo ($i?',':'').$email_list_role->getRole()->getTitle()?>
        <?php }?>
        <br/>
        <?php echo jq_link_to_function('edit', 'editManagersFor('.$email_list->getId().', ['.implode(',', $role_ids).'], this)')?>
      </td>
      <td><?php echo select_tag('is_private_'.$email_list->getId(), options_for_select(array('Self-subscribe', 'Admin-Subscribe'), $email_list->getIsPrivate() ? 1 : 0), array('onchange' => 'saveIsPrivate('.$email_list->getId().')'))?></td>
      <td>not sure what this is going to do</td>
    </tr>
    <?php }?>
  </tbody>
</table>

<div id="management" style="display:none; position:absolute; background-color: white; border:1px solid;">
  <form id="management_form" onsubmit="saveManagersFor(); return false;">
    <?php echo $role_widget->render('roles')?>
    <?php echo input_hidden_tag('email_list_id')?>
    <br/>
    <?php echo submit_tag('save')?>
    <?php echo jq_link_to_function('cancel', "$('#management').hide();")?>
  </form>
  <img src="/images/loading.gif" id="management_loader" style="display: none;"/>
</div>

<script type="text/javascript">
//<![CDATA[
function saveIsPrivate(id)
{
  var $el = $('#is_private_'+id);
  $el.after('<img src="/images/loading.gif" id="loader_'+id+'"/>');
  $.ajax({
    url: '<?php echo url_for('email_list/ajaxSavePrivate')?>',
    data: { value: $el.val(), id: id },
    dataType: 'html',
    success: function (id) {
      $('#loader_'+id).remove();
    }
  });
}

function editManagersFor(id, selected, el)
{
  var pos = $(el).position();
  $('#management').css({
    top: pos.top+'px',
    left: pos.left+'px'
  }).show();
  $('#email_list_id').val(id);
  $('#roles option').each(function (i, option) {
    if ($.inArray(parseInt($(option).val()), selected) != -1) {
      $(option).attr('selected', true);
    }else{
      $(option).removeAttr('selected');
    }
  });
}

var id;

function saveManagersFor()
{
  var data = $('#management_form').serialize();
  $('#management_loader').show();
  id = $('#email_list_id').val();
  $.ajax({
    url: '<?php echo url_for('email_list/ajaxSaveRoles')?>',
    data: data,
    dataType: 'html',
    success: function (html) {
      $('#management, #management_loader').hide();
      $('#roles_for_'+id).html(html);
    }
  });
}
//]]>
</script>