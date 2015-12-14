<div class="person-view"> 
<h2>Passenger Illness Category List</h2>
</div>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('passenger/updateIllness') ?>">Add Passenger Illness Category</a>
<?php } ?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Category description</th>
      <th>Super category description</th>
      <th>Edit</th>
      <?php  if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
      <th>Delete</th>
      <?php }?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ills as $ill): ?>
    <tr>
      <td><?php echo $ill->getId() ?></td>
      <td><?php echo $ill->getCategoryDescription() ?></td>
      <td><?php echo $ill->getSuperCategoryDescription() ?></td>
      <td><?php  if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/edit16.png'),'@pill_edit?id='.$ill->getId());?><?php endif;?></td>
      <?php  if ($sf_user->hasCredential(array('Administrator'), false))  {?>
          <td><?php  if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/delete.png'), '@pill_delete?id='.$ill->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
      <?php }?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

