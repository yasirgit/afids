<?php use_helper('Form', 'Object', 'jQuery')?>

<h2>Add Mission Orientation Pilots</h2>
<?php if ($pager->getNbResults()) {?>
<div class="pager">
  <div>
    <form action="<?php echo url_for('pilot/mopAdd')?>">
      <?php echo link_to('Previous', 'pilot/mopAdd?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'pilot/mopAdd?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'pilot/mopAdd?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Pilot</td>
      <td>Contact</td>
      <td></td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pilots as $pilot) {
      /* @var $pilot Pilot */
      $member = $pilot->getMember();
      $person = $member->getPerson();
    ?>
    <tr>
      <td>
        <strong><?php echo link_to($person->getName(), 'pilot/view?id='.$pilot->getId())?></strong><br/>
        <?php echo $person->getAddress1().' '.$person->getAddress2()?><br/>
        <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
      </td>
      <td>
        <?php
        if ($person->getDayPhone()) echo 'Day: '.$person->getDayPhone().' '.$person->getDayComment().'<br/>';
        if ($person->getEveningPhone()) echo 'Eve: '.$person->getEveningPhone().' '.$person->getEveningComment().'<br/>';
        if ($person->getMobilePhone()) echo 'Mobile: '.$person->getMobilePhone().' '.$person->getMobileComment().'<br/>';
        if ($person->getFaxPhone1()) echo 'Fax1: '.$person->getFaxPhone1().' '.$person->getFaxComment1().'<br/>';
        if ($person->getPagerPhone()) echo 'Pager: '.$person->getPagerPhone().' '.$person->getPagerComment().'<br/>';
        if ($person->getEmail()) echo 'Email: '.mail_to($person->getEmail());
        ?>
      </td>
      <td>
        SEI: <?php echo $pilot->getSeInstructor() ? $pilot->getSeInstructor() : 'No'?><br/>
        MEI: <?php echo $pilot->getMeInstructor() ? $pilot->getMeInstructor() : 'No'?>
      </td>
      <td>
          <center>
            <?php if ($sf_user->hasCredential( array( 'Administrator', 'Staff'), false)):?>
               <?php echo link_to("add", "pilot/update?id=".$pilot->getId(), array("class" => "link-add"))?>
           <?php endif;?>
          </center>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<div class="pager">
  <div>
    <form action="<?php echo url_for('pilot/mopAdd')?>">
      <?php echo link_to('Previous', 'pilot/mopAdd?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'pilot/mopAdd?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'pilot/mopAdd?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
Total <?php echo $pager->getNbResults()?> Active Pilots Selected <br/>
<?php }?>