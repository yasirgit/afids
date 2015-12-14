<div class="person-view"> 
<h2>Donor List</h2>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('donor/update') ?>">Add Donor</a>
<?php } ?>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Co donor</th>
      <th>Affiliation</th>
      <th>Block mailings</th>
      <th>Prospect comment</th>
      <th>Salutation</th>
      <th>Company</th>
      <th>Position</th>
      <th>Donor potential</th>
      <th>Person</th>
      <th>Date added</th>
      <th>Date updated</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($donor_list as $donor): ?>
    <tr>
      <td><?php echo $donor->getId() ?></td>
      <td><?php echo $donor->getCoDonorId() ?></td>
      <td><?php echo $donor->getAffiliationId() ?></td>
      <td><?php echo $donor->getBlockMailings() ?></td>
      <td><?php echo $donor->getProspectComment() ?></td>
      <td><?php echo $donor->getSalutation() ?></td>
      <td><?php echo $donor->getCompanyId() ?></td>
      <td><?php echo $donor->getPosition() ?></td>
      <td><?php echo $donor->getDonorPotential() ?></td>
      <td><?php echo $donor->getPersonId() ?></td>
      <td><?php echo $donor->getDateAdded() ?></td>
      <td><?php echo $donor->getDateUpdated() ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/edit16.png'),'@donor_edit?id='.$donor->getId());?><?php endif; ?></td>
      <td><?php if ($sf_user->hasCredential(array('Administrator'), false)) :?><?php echo link_to(image_tag('icons/delete.png'), '@donor_delete?id='.$donor->getId(),array('post' => true, 'confirm' => 'Are you sure?')); ?><?php endif;?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
