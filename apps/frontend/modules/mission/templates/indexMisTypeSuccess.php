<div class="person-view">
<h2>Mission List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { 
      echo link_to('Add Mission Type', '@mis_type_create');
}?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Stat count</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mis_types as $mtype): ?>
    <tr>
      <td><?php echo $mtype->getId() ?></td>
      <td><?php echo $mtype->getName() ?></td>
      <td><?php echo $mtype->getStatCount() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to('edit'.image_tag('icons/edit16.png'),'@mis_type_edit?id='.$mtype->getId());?><?php endif; ?></td>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
          <td><?php echo link_to('delete'.image_tag('icons/delete.png'), '@mis_type_delete?id='.$mtype->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?></td>
      <?php }?>
      
    <?php endforeach; ?>
  </tbody>
</table>
</div>
