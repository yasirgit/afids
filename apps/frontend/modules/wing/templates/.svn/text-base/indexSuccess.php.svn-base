<div class="person-veiw">
<h2>Wing List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
    <a href="<?php echo url_for('wing/update') ?>" id="add_wing" name="add_wing">Add Wing</a>
    <?php endif;?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Newsletter abbreviation</th>
      <th>Display name</th>
      <th>State</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($wing_list as $wing): ?>
    <tr>
      <td><?php echo $wing->getId() ?></td>
      <td><?php echo $wing->getName() ?></td>
      <td><?php echo $wing->getNewsletterAbbreviation() ?></td>
      <td><?php echo $wing->getDisplayName() ?></td>
      <td><?php echo $wing->getState() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to('edit'.image_tag('icons/edit16.png'),'@wing_edit?id='.$wing->getId());?><?php endif; ?></td>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to('delete'.image_tag('icons/delete.png'), '@wing_delete?id='.$wing->getId(),array('method' => 'delete', 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
      <?php }?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
