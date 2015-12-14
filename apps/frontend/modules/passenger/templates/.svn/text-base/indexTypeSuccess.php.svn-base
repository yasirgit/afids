<div class="person-view"> 
<h2>Passenger Type List</h2>
</div>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('passenger/updateType') ?>">Add Passenger Type</a>
<?php } ?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Edit</th>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
      <th>Delete</th>
      <?php }?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($types as $type): ?>
    <tr>
      <td><?php echo $type->getId() ?></td>
      <td><?php echo $type->getName() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/edit16.png'),'@ptype_edit?id='.$type->getId());?><?php endif;?></td>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
        <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/delete.png'), '@ptype_delete?id='.$type->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
      <?php }?>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

