<?php
use_helper('jQuery');
/* @var $mission_leg MissionLeg */?>
<table>
  <tr>
    <th>Mission #</th>
    <th>Leg</th>
    <th>Date</th>
    <th>Origin</th>
    <th>Destination</th>
  </tr>
  <?php foreach ($mission_legs as $mission_leg) {?>
  <?php
  $mission = $mission_leg->getMission();
  $passenger = $mission->getPassenger();
  if ($passenger) $passenger_type = $passenger->getPassengerType();
  $is_air = $mission_leg->getTransportation() == 'air_mission';
  if ($is_air) {
    $to_airport = $mission_leg->getAirportRelatedByToAirportId();
    $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
  }
  ?>
  <tr>
    <td>
      <?php echo sprintf('%06d', $mission_leg->getMissionId())?>
      <?php if ($passenger && $passenger_type) echo '<br/>('.$passenger_type->getName().')'?>
    </td>
    <td>
      - <?php echo $mission_leg->getLegNumber()?><br/>
      <?php echo $mission_leg->getPilotId() != null ? '(filled)' : '(open)'?>
    </td>
    <td>
      <?php echo $mission->getMissionDate('m/d/Y')?><br/>
      <?php echo $mission->getMissionDate('l')?>
    </td>
    <td>
      <?php if ($is_air) echo $from_airport->getIdent().' ('.$from_airport->getCity().', '.$from_airport->getState().')';?>
    </td>
    <td>
      <?php if ($is_air) echo $to_airport->getIdent().' ('.$to_airport->getCity().', '.$to_airport->getState().')';?>
    </td>
  </tr>
  <tr>
     <td claspan="5" style="padding-top:10px;padding-bottom:10px;">
          <a class="btn-request" target="_blank" href=<?php echo url_for('pilotRequest/update?id='.$mission_leg->getId(), true)?>><span>Request This Mission</span></a>
      </td>
  </tr>
  <?php }?>
</table>