<div class="person-view"> 
<h2>Campaign List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('campaign/update') ?>">Add Campiagn</a>
<?php } ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Campaign decs</th>
      <th>Premium sku</th>
      <th>Premium min</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($campaign_list as $campaign): ?>
    <tr>
      <td><?php echo $campaign->getId() ?></td>
      <td><?php echo $campaign->getCampaignDecs() ?></td>
      <td><?php echo $campaign->getPremiumSku() ?></td>
      <td><?php echo $campaign->getPremiumMin() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/edit16.png'),'@campaign_edit?id='.$campaign->getId());?><?php endif;?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)):?><?php echo link_to(image_tag('icons/delete.png'), '@campaign_delete?id='.$campaign->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

