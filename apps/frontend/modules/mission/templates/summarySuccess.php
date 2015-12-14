<h2>Mission Summary</h2>

<ul class="mission-tabs">
  <li <?php if (!$past) echo 'class="active"'?>><a href="<?php echo url_for('mission/summary')?>"><span>Future Missions</span></a></li>
  <li <?php if ($past) echo 'class="active"'?>><a href="<?php echo url_for('mission/summary?past=1')?>"><span>Past Missions</span></a></li>
</ul>

<?php if (count($mission_legs)>0) {?>
<div class="pager">
  <div>
    <form action="<?php echo url_for('mission/summary')?>">
      <a href="<?php echo url_for('mission/summary?'.($past?'past=1&':'').'page='.$pager->getPreviousPage())?>" class="btn-pager-prev">Previous</a>
      <input type="text" value="<?php echo $pager->getPage()?>" class="active-page" name="page">
      <input type="hidden" name="past" value="<?php echo $past?1:0?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission/summary?page='.$pager->getLastPage().($past?'&past=1':''))?></strong>
      <a href="<?php echo url_for('mission/summary?page='.$pager->getNextPage().($past?'&past=1':''))?>" class="btn-pager-next">Next</a>
      <input type="submit" class="hide">
    </form>
  </div>
</div>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Passenger</td>
      <td>Mission</td>
      <td>CoPilot</td>
    </tr>
  </thead>
  <tbody>
    <?php /* @var $mission Mission */
    /* @var $mission_leg MissionLeg */?>
	<?php foreach ( $mission_legs as $mission_leg ) {?>
    <?php
    $mission = $mission_leg->getMission();
    $passenger = $mission->getPassenger();
    $person = $passenger->getPerson();
    $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
    $to_airport = $mission_leg->getAirportRelatedByToAirportId();
    $copilot = $mission_leg->getCopilot();
    if ($copilot) $coperson = $copilot->getMember()->getPerson();
    ?>
    <tr>
      <td>
        <b><?php echo $person->getName()?></b><br/> 
        Weight: <?php
        echo ($passenger->getWeight()?$passenger->getWeight():'--').'<br/>';
        if ($person->getDayPhone()) echo $person->getDayPhone().' '.$person->getDayComment().'<br/>';
        if ($person->getEveningPhone()) echo $person->getEveningPhone().' '.$person->getEveningComment().'<br/>';
        if ($person->getMobilePhone()) echo $person->getMobilePhone().' '.$person->getMobileComment().'<br/>';
        if ($person->getPagerPhone()) echo $person->getPagerPhone().' '.$person->getPagerComment().'<br/>';
        if ($person->getEmail()) echo mail_to($person->getEmail());
        ?>
      </td>
      <td>
        <?php echo $mission->getId()?><br/>
        Date: <?php echo $mission->getMissionDate('m/d/Y')?><br/>
        From: <?php if(isset($from_airport)) { echo $from_airport->getName().' ('.$from_airport->getCity().')'; } else { echo "No airport selected"; } ?><br/>
        To:   <?php if(isset($to_airport))   { echo $to_airport->getName().' ('.$to_airport->getCity().')';     } else { echo "No airport selected"; } ?><br/>
      </td>
      <td>
        CoPilot: <?php if ($copilot) {
          echo '<b>'.$coperson->getName().'</b><br/>';
          if ($coperson->getDayPhone()) echo $coperson->getDayPhone().' '.$coperson->getDayComment().'<br/>';
          if ($coperson->getEveningPhone()) echo $coperson->getEveningPhone().' '.$coperson->getEveningComment().'<br/>';
          if ($coperson->getMobilePhone()) echo $coperson->getMobilePhone().' '.$coperson->getMobileComment().'<br/>';
          if ($coperson->getPagerPhone()) echo $coperson->getPagerPhone().' '.$coperson->getPagerComment().'<br/>';
          if ($coperson->getEmail()) echo mail_to($coperson->getEmail());
        } else echo 'Not yet assigned'?>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>

<div class="pager">
  <div>
    <form action="<?php echo url_for('mission/summary')?>">
      <a href="<?php echo url_for('mission/summary?'.($past?'past=1&':'').'page='.$pager->getPreviousPage())?>" class="btn-pager-prev">Previous</a>
      <input type="text" value="<?php echo $pager->getPage()?>" class="active-page" name="page">
      <input type="hidden" name="past" value="<?php echo $past?1:0?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission/summary?page='.$pager->getLastPage().($past?'&past=1':''))?></strong>
      <a href="<?php echo url_for('mission/summary?page='.$pager->getNextPage().($past?'&past=1':''))?>" class="btn-pager-next">Next</a>
      <input type="submit" class="hide">
    </form>
  </div>
</div>
<?php }else{?>
<br/>
<div>
     No Missions Found
  </div>
<?php }?>