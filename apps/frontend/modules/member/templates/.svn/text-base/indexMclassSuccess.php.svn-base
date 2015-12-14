<?php if($mclasses):?>
<div class="person-view">
<h2>Member Class List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
      <?php echo link_to('Add Member Class', '@mclass_create'); ?>
<?php }?>
<table>
<thead>
  <tr>
   <th>Name</th>
   <th>Fly Missons</th>
   <th>Newsletter</th>
   <th>Action</th>
  <tr/>
<thead>

<tbody>
<?php foreach ($mclasses as $mclass):?>
<tr>
  <td><?php if($mclass->getName()):?><?php echo $mclass->getName() ?><?php endif?></td>
  <td><?php if($mclass->getFlyMissions()):?><?php echo $mclass->getFlyMissions() ?><?php endif?></td>
  <td><?php if($mclass->getNewsletters()):?><?php echo $mclass->getNewsletters() ?><?php endif?></td>
  <td>
  <?php if ($sf_user->hasCredential(array('Administrator'), false)) :?>
      <a class="link-edit" href="<?php echo url_for('@mclass_edit?id='.$mclass->getId())?>">edit</a>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
         <?php echo link_to('remove', '@mclass_delete?id='.$mclass->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove and related information?', 'class' => 'action-remove')); ?>
      <?php } ?>
      
  <?php endif ?>
  </td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<?php endif;?>
</div>