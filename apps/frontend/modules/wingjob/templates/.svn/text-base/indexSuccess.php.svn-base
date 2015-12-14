<h1>Wingjob List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Person</th>
      <th>Name</th>
      <th>Short name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($wing_job_list as $wing_job): ?>
    <tr>
      <td
         <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
            <a href="<?php echo url_for('wingjob/edit?id='.$wing_job->getId()) ?>"><?php echo $wing_job->getId() ?></a>
         <?php }else {?>
            <?php echo $wing_job->getId() ?>
          <?php } ?>
      </td>
      <td><?php echo $wing_job->getPersonId() ?></td>
      <td><?php echo $wing_job->getName() ?></td>
      <td><?php echo $wing_job->getShortName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
    <a href="<?php echo url_for('wingjob/new') ?>">New</a>
<?php }?>