<div class="person-view"> 
<h2>Gift Type List</h2>
</div>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('donation/updateGift') ?>">Add Gift Type</a>
<?php } ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Gift date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($gift_type_list as $type): ?>
    <tr>
      <td><?php echo $type->getId() ?></td>
      <td><?php echo $type->getGiftTypeDesc() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/edit16.png'),'@gift_edit?id='.$type->getId());?><?php endif;?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/delete.png'), '@gift_delete?id='.$type->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

