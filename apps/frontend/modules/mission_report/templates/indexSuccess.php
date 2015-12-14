<h2>Mission Reports Outstanding</h2>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Mission Date</td>
      <td>Origin</td>
      <td>Destination</td>
      <td>Passenger</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mission_legs as $mission_leg) {?>
    <?php
      /* @var $mission_leg MissionLeg */
      $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
      $to_airport = $mission_leg->getAirportRelatedByToAirportId();
      $passenger = $mission_leg->getMission()->getPassenger();
    ?>
    <tr>
      <td><?php echo $mission_leg->getMission()->getMissionDate('m/d/Y');?></td>
      <td><?php echo $from_airport->getIdent()?></td>
      <td><?php echo $to_airport->getIdent()?></td>
      <td><?php echo $passenger->getPerson()->getName()?></td>
      <td>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){?>
        <?php if ($mission_leg->getMissionReportId()) {
          echo 'reported<br/>'.link_to('Edit Report', 'mission_report/edit?leg_id='.$mission_leg->getId());
        }else{
          echo link_to('File Report', 'mission_report/new?leg_id='.$mission_leg->getId());
        }?>
        <?php } ?>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
