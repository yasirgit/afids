<?php use_helper('Form');
$can_view = $sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false);
?>

<h2>Subscribers for <?php echo $email_list->getDescription();?></h2>

<?php if ($pager->getNbResults()) {?>
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'person/mailingList?max='.$v.'&page='.$page.'&id='.$email_list->getId());
  }?>
  <div>
    <form action="<?php echo url_for('person/mailingList?max='.$max.'&id='.$email_list->getId())?>">
      <?php echo link_to('Previous', 'person/mailingList?max='.$max.'&page='.$pager->getPreviousPage().'&id='.$email_list->getId(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'person/mailingList?max='.$max.'&id='.$email_list->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'person/mailingList?max='.$max.'&id='.$email_list->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Name</td>
    <td>Address</td>
    <td>Contact</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($persons as $person): ?>
  <tr>
    <td class="cell-1">
      <?php echo $person->getName()?>
    </td>
    <td class="cell-1"><?php echo $person->getAddress1()?></td>
    <td>
      <div class="name-list">
        <dl>
          <?php if ($person->getDayPhone().$person->getDayComment()) {?>
          <dt>Work:</dt>
          <dd><?php echo $person->getDayPhone().' <i>'.$person->getDayComment().'</i>'?></dd>
          <?php }?>
          <?php if ($person->getEveningPhone().$person->getEveningComment()) {?>
          <dt>Home:</dt>
          <dd><?php echo $person->getEveningPhone().' <i>'.$person->getEveningComment().'</i>'?></dd>
          <?php }?>
          <?php if ($person->getMobilePhone().$person->getMobileComment()) {?>
          <dt>Cell:</dt>
          <dd><?php echo $person->getMobilePhone().' <i>'.$person->getMobileComment().'</i>'?></dd>
          <?php }?>
        </dl>
        <?php if ($person->getEmail()) echo mail_to($person->getEmail())?>
      </div>
    </td>
    <td>
      <?php if ($can_view){?>
      <ul class="action-list">
        <li><a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a></li>
      </ul>
      <?php }?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'person/mailingList?max='.$v.'&page='.$page.'&id='.$email_list->getId());
  }?>
  <div>
    <form action="<?php echo url_for('person/mailingList?max='.$max.'&id='.$email_list->getId())?>">
      <?php echo link_to('Previous', 'person/mailingList?max='.$max.'&page='.$pager->getPreviousPage().'&id='.$email_list->getId(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'person/mailingList?max='.$max.'&id='.$email_list->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'person/mailingList?max='.$max.'&id='.$email_list->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
