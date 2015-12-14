<h2>Find Matching People</h2>
<br/>
Please review the following people currently in the database to see if they match with the contact who requested information.
This will help prevent duplicate entries in the database.
<div style="width: 325px;" class="preferences">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4><?php echo $application_temp->getFirstName().' '.$application_temp->getLastName()?></h4>
        <dl>
          <dt>Address</dt>
          <dd>
            <?php if ($application_temp->getAddress2().$application_temp->getAddress1()) {?>
              <?php echo $application_temp->getAddress1() ? $application_temp->getAddress1().'<br/>' : ''?>
              <?php echo $application_temp->getAddress2()?>
            <?php }?>
          </dd>
          <dt>City/State/Zipcode</dt>
          <dd>
            <?php echo $application_temp->getCity()?>,
            <?php echo $application_temp->getState()?>
            <?php echo $application_temp->getZipcode()?>
          </dd>
        </dl>
      </div>
    </div>
  </div>
</div>

<p>If you find a match, click on the "Use This Person" link, otherwise, click on
the link to "Add New Person"</p>

If there are no matches, click here to <?php echo link_to('Add a New Person', 'contact/processStep1?id='.$application_temp->getId())?>
<br/>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'contact/processRequest?id='.$application_temp->getId().'&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('contact/processRequest?id='.$application_temp->getId())?>">
      <?php echo link_to('Previous', 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Contact Requester Name</td>
    <td>Person Name</td>
    <td>Zip</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($people as $person): ?>
  <tr>
    <td class="cell-6">
      <?php echo $application_temp->getFirstName().' '.$application_temp->getLastName()?>
    </td>
    <td class="cell-6">
      <?php echo $person->getName()?>
    </td>
    <td class="cell-1"><?php echo $person->getZipcode()?></td>
    <td class="cell-6">
      <?php echo link_to('Use this Person', 'contact/processStep1?id='.$application_temp->getId().'&person_id='.$person->getId(), array('class' => 'action-edit'))?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  People per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'contact/processRequest?id='.$application_temp->getId().'&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('contact/processRequest?id='.$application_temp->getId())?>">
      <?php echo link_to('Previous', 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'contact/processRequest?id='.$application_temp->getId().'&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>