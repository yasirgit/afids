<h1>Wingleader List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Person</th>
      <th>Startyear</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($wing_leader_list as $wing_leader): ?>
    <tr>
     
      <td>
          <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
            <a href="<?php echo url_for('wingleader/edit?id='.$wing_leader->getId()) ?>"><?php echo $wing_leader->getId() ?></a>
          <?php } else { ?>
            <?php echo $wing_leader->getId() ?>
          <?php } ?>
      </td>
      <td><?php echo $wing_leader->getPersonId() ?></td>
      <td><?php echo $wing_leader->getStartyear() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
  <a href="<?php echo url_for('wingleader/new') ?>">New</a>
<?php }?>
  
