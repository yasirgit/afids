<table>
  <tbody>
    <?php foreach ($role_list as $role): ?>
    <tr>
      <td><?php echo $role->getTitle() ?></td>
      <td>
        <?php echo jq_link_to_function('edit', "fillForm(".$role->getId().", '".addslashes($role->getTitle(ESC_RAW))."');", array('class' => 'link-edit'))?>
        <?php echo link_to('remove', 'role/delete?id='.$role->getId(), array('class' => 'link-de-activate', 'method' => 'delete', 'confirm' => 'Are you sure to delete role \''.esc_entities(addslashes($role->getTitle(ESC_RAW))).'\''))?>
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
      'url'     => 'role/list?max='.$v,
      'before'  => "$('#indicator').show();",
      'success' => "$('#indicator').hide(); $('#roles').html(data);",
    ));
  }else{
    echo $v;
  }
}?>

<div class="pager">
  <form onsubmit="navigate($('#role_page').val());return false;" action="#">
    <?php echo jq_link_to_function('Previous', "navigate(".$pager->getPreviousPage().")", array('class' => 'btn-pager-prev'))?>
    <input type="text" id="role_page" class="active-page" value="<?php echo $pager->getPage()?>"/>
    <strong>of <?php echo jq_link_to_function($pager->getLastPage(), "navigate(".$pager->getLastPage().")")?></strong>
    <?php echo jq_link_to_function('Next', "navigate(".$pager->getNextPage().")", array('class' => 'btn-pager-next'))?>
    <input type="submit" class="hide"/>
  </form>
</div>