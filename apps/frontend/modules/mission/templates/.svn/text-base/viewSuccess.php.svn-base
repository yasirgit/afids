<?php
$ground_addresses['airport'] = $person->getAddress1().' '
      .$person->getAddress2().' '
      .$person->getCity().', '
      .$person->getState().' '
      .$person->getZipcode();
?>
<div class="person-view">
<?php if(isset($urltrue)){    ?>
    <a href="<?php echo $backurl ?>" > << Back to missions medical release status  </a>
<?php } ?>
<h2>Mission View </h2>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {
  echo link_to('Edit Mission Information', '@mission_edit?id='.$mission->getId(), array('class' => 'action-edit')); ?> |
<?php echo link_to('Copy Mission Information', '@mission_copy?id='.$mission->getId().'&type=copy', array('class' => 'action-copy'));
}?>
<?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
  | <?php echo link_to('Delete Mission Information', '@mission_delete?id='.$mission->getId(), array('class' => 'action-remove')); ?>
<?php endif;?>

<div class="person-info">
  <dl class="person-data">
    <dt>Mission External ID:</dt>
    <dd><?php echo $mission->getExternalId()?></dd>

    <dt>Mission Type:</dt>
    <dd><?php echo $mission->getMissionType()->getName();?></dd>

    <dt>Mission Date:</dt>
    <dd><?php echo $mission->getMissionDate('U')?$mission->getMissionDate('m/d/Y'):'--'?></dd>

    <dt>Date Requested:</dt>
    <dd><?php echo $mission->getDateRequested()?$mission->getDateRequested('m/d/Y'):'--'?></dd>
    <dt>Passenger:</dt>
      <dd>
        <?php if(isset($mission)):?><?php $pass = PassengerPeer::retrieveByPK($mission->getPassengerId())?><?php endif;?>
        <?php if(isset($pass)):?><?php $person = PersonPeer::retrieveByPK($pass->getPersonId())?><?php endif;?>
        <?php if(isset($person)):?><?php echo $person->getTitle().' '. $person->getFirstName() .' '.$person->getLastName()?><?php endif;?>
        <br/>
        <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
             <a href="<?php echo url_for('@default?module=passenger&action=change&for='.$mission->getId())?>" class="link-add">change</a>
        <?php endif?>
        
        <?php if(isset($person) && $sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@person_view?id='.$person->getId())?>" class="action-view">view</a><?php endif;?>
        <?php if(isset($pass) && $sf_user->hasCredential(array('Administrator','Staff'), false)):?><a href="<?php echo url_for('@passenger_edit?id='.$pass->getId())?>" class="action-edit">edit</a><?php endif;?>
      </dd>
      <dt>Requester:</dt>
      <dd>
        <?php if(isset($mission)):?><?php $req = RequesterPeer::retrieveByPK($mission->getRequesterId())?><?php endif;?>
        <?php if(isset($req)):?><?php $rperson = PersonPeer::retrieveByPK($req->getPersonId())?><?php endif;?>
        <?php if(isset($rperson)):?><?php echo $rperson->getTitle().' '. $rperson->getFirstName() .' '.$rperson->getLastName()?><?php endif;?>
        <br/>
        <?php if (isset($mission)):?>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@default?module=requester&action=change&for='.$mission->getId())?>" class="link-add">change</a><?php endif?>
        <?php endif;?>
        <?php if(isset($rperson) && $sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@person_view?id='.$rperson->getId())?>" class="action-view">view</a><?php endif;?>
        <?php if(isset($req) && $sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@requester_edit?id='.$req->getId())?>" class="action-edit">edit</a><?php endif;?>
      </dd>
  </dl>

  <div class="preferences" style="width:325px; float:left;">
    <div class="frame">
      <div class="bg">
        <div class="holder">
          <h4>Passenger Record
          <?php if ($passenger){?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="action-view">view</a><?php endif; ?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a><?php endif; ?>
            <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
               <?php if(isset($passenger)):?><?php if ($sf_user->hasCredential(array('Administrator'), false)) echo link_to('remove', '@default?module=passenger&action=delete&id='.$passenger->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$person->getName().'?', 'class' => 'action-remove')); ?><?php endif?>
            <?php endif;?>
          <?php }?>
          </h4>
          <?php if($passenger){?>
          <dl>
            <dt>Passenger Type:</dt>
            <dd><?php if($passenger->getPassengerType()) echo $passenger->getPassengerType()->getName(); else echo '--'?></dd>
            <dt>Name:</dt>
            <dd><?php echo $person->getTitle().' '.$person->getName()?></dd>
          </dl>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <?php if($itinerary){?>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Itinerary Record
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@itinerary_detail?id='.$itinerary->getId())?>" class="action-view">view</a><?php endif;?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@itinerary_edit?id='.$itinerary->getId())?>" class="link-edit">edit</a><?php endif;?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
               <?php if(isset($passenger)):?><?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) echo link_to('remove', '@itinerary_delete?id='.$itinerary->getId(), array('method' => 'delete', 'confirm' => '"Do you really want to remove this itinerary?" Yes / Cancel', 'class' => 'action-remove')); ?><?php endif?>
            <?php endif;?>
            </h4>
            <dl>
              <dt>ID:</dt>
              <dd><?php echo $itinerary->getId()?></dd>

              <dt>Orgin:</dt>
              <dd><?php echo $itinerary->getOrginCity() .', '.$itinerary->getOrginState()?></dd>

              <dt>Destination:</dt>
              <dd><?php echo $itinerary->getDestCity() .', '.$itinerary->getDestState()?></dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
</div>

<h3>Main Requester</h3>
<?php if ($requester) {?>
<div class="person-info">
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@person_view?id='.$requester->getPerson()->getId())?>" class="action-view">Person Record</a><?php endif; ?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@requester_edit?id='.$requester->getId())?>" class="action-edit">Edit Requester Info</a><?php endif; ?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
               <?php if(isset($requester)):?><?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) echo link_to('remove', '@default?module=requester&action=delete&id='.$requester->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove ', 'class' => 'action-remove')); ?><?php endif?>
            <?php endif;?>
  <dl class="person-data">
    <dt>Name:</dt>
    <dd><?php echo $requester->getPerson()->getTitle().' '.$requester->getPerson()->getName();?></dd>

    <dt>Title:</dt>
    <dd><?php echo $requester->getTitle() ? $requester->getTitle() : '--'?></dd>
  </dl>
</div>
<?php }else echo 'None'?>

<h3>Main Agency</h3>
<?php if ($agency){?>
<div class="person-info">
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@agency_edit?id='.$agency->getId())?>" class="action-edit">edit</a><?php endif; ?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
               <?php  echo link_to('remove', '@agency_delete?id='.$agency->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove ', 'class' => 'action-remove')); ?>
  <?php endif;?>
  <dl class="person-data">
    <dt>Name:</dt>
    <dd><?php echo $agency->getName()?></dd>

    <dt>Location:</dt>
    <dd>
      <?php echo $agency->getCity()?$agency->getCity().', ':''?>
      <?php echo $agency->getState()?$agency->getState():''?>
      <?php echo $agency->getCountry()?$agency->getCountry():''?>
    </dd>
  </dl>
</div>
<?php }else echo 'None'?>

<h3>Flight Information</h3>
<div class="person-info">
  <dl class="person-data">
    <dt>Appointment:</dt>
    <dd><?php echo $mission->getApptDate('m/d/y')?$mission->getApptDate('m/d/y'):'--'?></dd>

    <dt>Flight Time:</dt>
    <dd><?php echo $mission->getFlightTime()?$mission->getFlightTime():'--'?></dd>
  </dl>
</div>

<h3>Companions</h3>
<?php echo link_to('Edit Companions', 'mission/companions?id='.$mission->getId(), array('class' => 'action-edit'));?>
<div class="person-info">
  <?php if($passenger){?>
    <?php $mis_coms = $mission->getMissionCompanionsJoinCompanion()?>
    <?php if(count($mis_coms)):?>
      <dl class="person-data">
      <?php foreach ($mis_coms as $mis_com):?>
        <?php $com = $mis_com->getCompanion()?>
        <dt>Name:</dt>
        <dd><?php echo $com->getName()?$com->getName():'--'?></dd>
        <dt>Relationship:</dt>
        <dd><?php echo $com->getRelationship()?$com->getRelationship():'--'?></dd>
      <?php endforeach;?>
      </dl>
    <?php else:?>
      None
    <?php endif;?>
  <?php }?>
</div>

<?php $miss_legs = $mission_legs;?>
<h3>Mission Legs</h3>
<?php if(count($miss_legs)) {?>
  <table class="mission-request-table">
    <thead>
      <tr>
        <td>Leg Number</td>
        <td colspan="2">Origin</td>
        <td colspan="2">Destination</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($miss_legs as $leg) {?>
      <?php if ($leg->getTransportation() == 'air_mission') {
        $from_airport = AirportPeer::retrieveByPK($leg->getFromAirportId());
        $to_airport = AirportPeer::retrieveByPK($leg->getToAirportId());
        if($from_airport && $to_airport):
        ?>
        <tr style="<?php echo $leg->getCancelled() ? 'color:gray' : ''?>">
          <td class="cell-1"><?php echo $leg->getLegNumber()?></td>
          <td class="cell-2"><?php echo $from_airport->getIdent();?></td>
          <td class="cell-1"><?php echo $from_airport->getCity() .' , '.$from_airport->getState()?></td>
          <td class="cell-2"><?php echo $to_airport->getIdent();?></td>
          <td class="cell-1"><?php echo $to_airport->getCity() .' , '.$to_airport->getState()?></td>
          <td class="cell-2">
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$leg->getId())?>" class="action-edit">edit</a><?php endif?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$leg->getId())?>" class="action-view">view</a><?php endif?>
            <?php 
              if ($sf_user->hasCredential(array('Administrator'), false)):?> <a href="<?php
              echo url_for('@leg_delete?id='.$leg->getId())?> " class="action-remove">remove</a>
              <?php endif?>
          </td>
        </tr>
        <?php
        endif;
      }elseif($leg->getTransportation() == 'ground_mission') {

        ?>
        <?php
                $ground_origin = $leg->getGroundOrigin();
                $ground_dest   = $leg->getGroundDestination();
                ?>
        <tr style="<?php echo $leg->getCancelled() ? 'color:gray' : ''?>">
          <td class="cell-1"><?php echo $leg->getLegNumber()?></td>
          <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_origin])){echo $ground_addr_sel[$ground_origin];}?></td>
        <td class="cell-1"><?php if(isset($ground_addresses[$ground_origin])){echo $ground_addresses[$ground_origin];}else{echo $ground_origin;}?></td>
        <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_dest])){echo $ground_addr_sel[$ground_dest];}?></td>
        <td class="cell-1"><?php if(isset($ground_addresses[$ground_dest])){echo $ground_addresses[$ground_dest];}else{echo $ground_dest;}?></td>
        <td class="cell-2">
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$leg->getId())?>" class="action-edit">edit</a><?php endif?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$leg->getId())?>" class="action-view">view</a><?php endif?>
           
          </td>
        </tr>
        <?php
      }elseif($leg->getTransportation() == 'commercial_mission') {
        if ($leg->getAirline()) $airline = $leg->getAirline()->getName(); else $airline = '';
        ?>
        <tr style="<?php echo $leg->getCancelled() ? 'color:gray' : ''?>">
          <td class="cell-1"><?php echo $leg->getLegNumber()?></td>
          <td class="cell-2"><?php echo $leg->getCommOrigin();?></td>
          <td class="cell-1"><?php echo $airline.' #'.$leg->getFlightNumber().'<br/>'.$leg->getDeparture('g:i A')?></td>
          <td class="cell-2"><?php echo $leg->getCommDest();?></td>
          <td class="cell-1"><?php echo $airline.' #'.$leg->getFlightNumber().'<br/>'.$leg->getArrival('g:i A')?></td>
          <td class="cell-2">
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$leg->getId())?>" class="action-edit">edit</a><?php endif?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$leg->getId())?>" class="action-view">view</a><?php endif?>
           
          </td>
        </tr>
        <?php
      }?>
    <?php }?>
    </tbody>
  </table>
<?php }?>
      <?php if(isset($group_camp_id)):?>
        <a href="<?php echo url_for('@add_passengers?id='.$itinerary->getId())?>" class="link-view">
        Return Adding Process
        </a>
      <?php endif?>
<?php if($mission->getCancelMission() == 1):?>
  <a href="<?php echo url_for('@leg_create?mis='.$mission->getId())?>" class="link-add">Add Leg</a>
<?php endif; ?>
<h3 style="color:red"><?php if($mission->getCancelMission() == NULL):?>Mission <?php echo $mission->getId(); ?> is canceled so to create mission leg need to activate this <?php echo link_to('mission', 'mission/edit?id='.$mission->getId()) ?>.<?php endif;?></h3>
</div>