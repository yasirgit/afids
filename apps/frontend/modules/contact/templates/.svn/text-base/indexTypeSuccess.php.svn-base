<div class="person-view">
<h2>Contact Type List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('contact/updateType') ?>">Add Contact Type</a>
<?php } ?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <td></td>
    <?php foreach ($contact_type as $type): ?>
    <tr>
      <td><?php echo $type->getId() ?></td>
      <td><?php echo $type->getContactTypeDesc() ?></td>
      <td>
         <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a class="link-edit" href="<?php echo url_for('@ctype_edit?id='.$type->getId())?>">edit</a><?php endif?>
         <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to('remove', '@ctype_delete?id='.$type->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to delete ? ', 'class' => 'action-remove'));?><?php endif;?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
