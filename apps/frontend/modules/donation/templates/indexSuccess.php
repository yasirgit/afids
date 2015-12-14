<div class="person-view"> 
<h2>Donation List</h2>
</div>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('donation/update') ?>">Add Donation</a>
  <a href="<?php echo url_for('donation/indexGift') ?>">Gift Type</a>
<?php } ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Donor</th>
      <th>Gift date</th>
      <th>Gift amount</th>
      <th>Gift type</th>
      <th>Check number</th>
      <th>Campain</th>
      <th>Fund</th>
      <th>Gift note</th>
      <th>Follow up</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($donation_list as $donation): ?>
    <tr>
      <td><a href="<?php echo url_for('donation/show?id='.$donation->getId()) ?>"><?php echo $donation->getId() ?></a></td>
      <td><?php echo $donation->getDonorId() ?></td>
      <td><?php echo $donation->getGiftDate() ?></td>
      <td><?php echo $donation->getGiftAmount() ?></td>
      <td><?php echo $donation->getGiftType() ?></td>
      <td><?php echo $donation->getCheckNumber() ?></td>
      <td><?php echo $donation->getCampainId() ?></td>
      <td><?php echo $donation->getFundId() ?></td>
      <td><?php echo $donation->getGiftNote() ?></td>
      <td><?php echo $donation->getFollowUp() ?></td>
      <td><?php echo $donation->getPremiumOrderDate() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/edit16.png'),'@donation_edit?id='.$donation->getId());?><?php endif;?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/delete.png'), '@donation_delete?id='.$donation->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

