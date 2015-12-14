<?php use_helper('Form')?>

<h2>Missions Pending</h2>

<div class="filtering">
  <form method="get" action="<?php echo url_for('mission/pending?filter=1')?>">
    <fieldset>
      <div class="holder">
        <label for="ff_wing_id">Airport Wing</label>
        <?php echo select_tag('wing_id', options_for_select($wings, $wing_id, array('include_custom' => 'All')), array('id' => 'ff_wing_id'))?>
      </div>
      <div class="holder">
        <label for="ff_ident">Airport</label>
        <?php echo input_tag('ident', $ident, array('id' => 'ff_ident', 'class' => 'text'))?>
      </div>
      <input type="submit" value="Update list">
    </fieldset>
  </form>
</div>

<div class="pager">
  Showing per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'mission/pending?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('mission/pending')?>">
      <?php echo link_to('Previous', 'mission/pending?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission/pending?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'mission/pending?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
<thead>
  <tr>
    <td>Mission #</td>
    <td>Date / Type</td>
    <td>Passenger / Requester</td>
    <td>Origin / Destination</td>
    <td>Pilot / Assistant</td>
    <td></td>
  </tr>
</thead>
<tbody>
  <?php foreach ($mission_legs as $mission_leg) {
    $mission = $mission_leg->getMission();
    $passenger = $mission->getPassenger();
    $passenger_type = null;
    if ($passenger) $passenger_type = $passenger->getPassengerType();
    $requester = $mission->getRequesterRelatedByRequesterId();
    $is_air = ($mission_leg->getTransportation() == 'air_mission');
    if ($is_air) {
      $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
      $to_airport = $mission_leg->getAirportRelatedByToAirportId();
    }
    $pilot = $mission_leg->getPilotRelatedByPilotId();
  ?>
  <tr>
    <td>
      <a href="<?php echo url_for('missionLeg/view?id='.$mission_leg->getId())?>">
        <?php echo ($mission->getExternalId() ? $mission->getExternalId() : 'none').'-'.$mission_leg->getLegNumber()?>
      </a>
      <br/>
      <?php if ($mission_leg->getPilotId() != null) {
        echo '(filled)';
      }else{
        echo '(open)';
      }?>
    </td>
    <td>
      <?php echo $mission->getMissionDate('m/d/Y')?>
      <?php if ($passenger_type) echo '<br/>'.$passenger_type->getName()?>
    </td>
    <td>
      <?php if ($passenger) echo link_to($passenger->getPerson()->getName(), 'passenger/view?id='.$passenger->getId())?>
      <br/>
      <?php if ($requester) echo link_to($requester->getPerson()->getName(), '@requester_edit?id='.$requester->getId())?>
    </td>
    <td>
      <?php if ($is_air) {
        if(isset($from_airport)){
            echo link_to($from_airport->getIdent().' ('.$from_airport->getCity().', '.$from_airport->getState().')', '@airport_edit?id='.$from_airport->getId());
        }
        echo '<br/>';
        if(isset($to_airport)){
            echo link_to($to_airport->getIdent().' ('.$to_airport->getCity().', '.$to_airport->getState().')', '@airport_edit?id='.$to_airport->getId());
        }
      }?>
    </td>
    <td>
      <?php if ($pilot) echo link_to($pilot->getMember()->getPerson()->getName(), 'pilot/view?id='.$pilot->getId())?>
    </td>
    <td>
      <?php if ($passenger) echo 'Illness: '.$passenger->getIllness()?>
      <br/>
      <?php if ($mission->getFlightTime()) echo 'Flight Time: '.$mission->getFlightTime()?>
    </td>
  </tr>
  <?php }?>
</tbody>
</table>

<div class="pager">
  Showing per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'mission/pending?max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('mission/pending')?>">
      <?php echo link_to('Previous', 'mission/pending?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission/pending?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'mission/pending?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
