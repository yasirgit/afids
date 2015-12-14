<h1>Vocation List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vocation_class_list as $vocation_class): ?>
    <tr>
      <td><a href="<?php echo url_for('vocation/edit?id='.$vocation_class->getId()) ?>"><?php echo $vocation_class->getId() ?></a></td>
      <td><?php echo $vocation_class->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
  <a href="<?php echo url_for('vocation/new') ?>">New</a>
<?php } ?>