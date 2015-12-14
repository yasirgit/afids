<table>
  <thead>
    <tr>
      <th>Right</th>
      <th>Code</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($permission_list as $permission): ?>
    <tr>
      <td><?php echo $permission->getTitle()?></td>
      <td><?php echo $permission->getCode()?></td>
      <td>
        <?php echo jq_link_to_function('edit', "fillForm(".$permission->getId().", '".escape_javascript($permission->getTitle())."', '".$permission->getCode()."')", array('class' => 'link-edit'))?>
        <?php echo link_to('remove', 'permission/delete?id='.$permission->getId(), array('class' => 'link-de-activate', 'method' => 'delete', 'confirm' => 'Are you sure to delete \''.$permission->choiceText().'\'?')) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>



Items per page:
<?php foreach ($max_array as $i => $v) {
  if ($i) echo ' | ';
  if ($max != $v) {
    echo jq_link_to_remote($v, array(
      'url'     => 'permission/list?max='.$v,
      'before'  => "$('#indicator').show();",
      'success' => "$('#indicator').hide(); $('#permissions').html(data);",
    ));
  }else{
    echo $v;
  }
}?>

<div class="pager">
  <form onsubmit="navigate($('#permission_page').val());return false;" action="#">
    <?php echo jq_link_to_function('Previous', "navigate(".$pager->getPreviousPage().")", array('class' => 'btn-pager-prev'))?>
    <input type="text" id="permission_page" class="active-page" value="<?php echo $pager->getPage()?>"/>
    <strong>of <?php echo jq_link_to_function($pager->getLastPage(), "navigate(".$pager->getLastPage().")")?></strong>
    <?php echo jq_link_to_function('Previous', "navigate(".$pager->getNextPage().")", array('class' => 'btn-pager-next'))?>
    <input type="submit" class="hide"/>
  </form>
</div>