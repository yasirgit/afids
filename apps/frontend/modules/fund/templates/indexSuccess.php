<div class="person-view"> 
<h2>Fund List</h2>
</div>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('fund/update') ?>">Add Fund</a>
<?php } ?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Fund desc</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($fund_list as $fund): ?>
    <tr>
      <td><?php echo $fund->getId() ?></td>
      <td><?php echo $fund->getFundDesc() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/edit16.png'),'@fund_edit?id='.$fund->getId());?><?php endif; ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/delete.png'), '@fund_delete?id='.$fund->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

