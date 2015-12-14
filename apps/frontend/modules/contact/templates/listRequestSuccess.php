<?php use_helper('Form', 'Object');
$can_view = $sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false);
/* @var $req ContactRequest */
?>

<h2>Contact Requests</h2>

<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Contact per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'contact/listRequest?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('contact/listRequest')?>">
      <?php echo link_to('Previous', 'contact/listRequest?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'contact/listRequest?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'contact/listRequest?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>City, State</td>
    <td>Email</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php
  foreach ($request_list as $request):
  ?>
  <tr>
    <td class="cell-2">
      <?php echo $request->getFirstName().' '.$request->getLastName()?>
    </td>
    <td class="cell-5">
      <?php echo $request->getCity() ? $request->getCity().', ' : ''?>
      <?php echo $request->getState()?>
    </td>
    <td class="cell-6">
      <?php echo $request->getEmail()?>
    </td>
    <td>
      <ul class="action-list">
        <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
            <?php echo link_to('Process', 'contact/processRequest?id='.$request->getId(), array('class' => 'action-edit'))?>
        <?php } ?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){?>
            <?php echo link_to('View', 'contact/viewRequest?id='.$request->getId(), array('class' => 'action-view'))?>
        <?php } ?>
        <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
            <?php echo link_to('Remove', 'contact/deleteRequest?id='.$request->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Are you sure?'))?>
        <?php } ?>
      </ul>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Contact per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'contact/listRequest?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('contact/listRequest')?>">
      <?php echo link_to('Previous', 'contact/listRequest?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'contact/listRequest?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'contact/listRequest?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

