<?php use_helper('jQuery')?>
<?php $role_ids = array()?>
<?php foreach ($email_list->getEmailListRolesJoinRole() as $i => $email_list_role) {?>
  <?php $role_ids[] = $email_list_role->getRoleId() ?>
  <?php echo ($i?',':'').$email_list_role->getRole()->getTitle()?>
<?php }?>
<br/>
<?php echo jq_link_to_function('edit', 'editManagersFor('.$email_list->getId().', ['.implode(',', $role_ids).'], this)')?>