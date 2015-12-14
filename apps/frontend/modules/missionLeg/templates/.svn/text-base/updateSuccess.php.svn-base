<?php use_helper('Form', 'Object');
$date_widget = $sf_data->getRaw('date_widget');
$time_widget = $sf_data->getRaw('time_widget');
$ground_addr_sel = $sf_data->getRaw('ground_addr_sel');
$ground_addresses = $sf_data->getRaw('ground_addresses');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$sf_response->addJavascript('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.sfConfig::get('app_gmap_key'));
$sf_response->addJavascript('/js/markerclusterer.js');
$can_edit = $sf_user->hasCredential(array('Administrator','Staff'), false);
$can_edit_req = $sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false);
?>
<?php use_helper('Javascript', 'jQuery') ?>
<?php //use_helper('jQuery', 'Form') ?>
<?php echo jq_javascript_tag()?>
function setAircraftId(text, li)
{
  var id = li.id;
  jQuery('#pilot_aircraft_id').val(id);
}
function setCoordiId(text, li)
{
  var id = li.id;
  jQuery('#coordinator_id').val(id);
}
function setPilotId(text, li)
{ 
  var id = li.id;  
  jQuery('#pilot_id').val(id);

}
function setBackupPilotId(text, li)
{
  var id = li.id;
  jQuery('#backup_pilot_id').val(id);

}
function setBackupCopilotId(text, li)
{
  var id = li.id;
  jQuery('#backup_copilot_id').val(id);

}

function setCopilotId(text, li)
{
  var id = li.id;
  jQuery('#copilot_id').val(id);

}
function setMissionAssistantsId(text, li)
{
  var id = li.id;
  jQuery('#miss_assis_id').val(id);
}
function setBackupcMissionAssistantsId(text, li)
{
  var id = li.id;
  jQuery('#backup_miss_assis_id').val(id);
}
<?php echo jq_end_javascript_tag()?>
<div class="passenger-form">
<form action="<?php echo url_for('@leg_save?id='.$leg->getId())?>" method="post">
<div class="person-view">
   <h2><?php echo $title.' # '.$mission->getExternalId().(($leg->getLegNumber()) ? ' - '.$leg->getLegNumber():'')?></h2>

  <h3><?php if(isset($mission)):?><?php echo 'Mission # '.$mission->getExternalId()?><?php endif;?></h3>
  <div class="person-info">
    <?php
    if(isset($mission)){
      if($mission->getItineraryId()){
        $iti = ItineraryPeer::retrieveByPK($mission->getItineraryId());
      }
    }
    ?>
    <dl class="person-data">
      <dt>Itinerary ID:</dt>
      <dd>
        <?php
        if(isset($iti)){
          echo $iti->getId();
        }else{
          echo '--';
        }
        ?>
      </dd>
      <dt>Mission Date:</dt>
      <dd>
          <?php if(isset($mission)):?><?php if($mission->getMissionDate()):?><?php echo $mission->getMissionDate('m/d/y')?$mission->getMissionDate('m/d/y'):'--'?><?php endif;?><?php endif;?>
      </dd>      
      <?php if($leg->getTransportation() == 'air_mission'):?>
      <dt>Coordinator:</dt>
      <dd>
        <?php echo input_auto_complete_tag('coordinator_name', "",
          'missionLeg/autoCompleteCoordinatorSearch',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'width:200px'),
          array(
          'use_style'    => true,
          'indicator'    =>'coordinator_indicator',
          'after_update_element' => 'setCoordiId'
          )
           );
          ?>
        <input type="hidden" id="coordinator_id" name="coordinator_id" value="<?php echo $leg->getPilotId();?>" />
        <span id="coordinator_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /> <br />
        <?php if(isset($coordinator) && $coordinator):?>
         <?php if($coordinator->getMemberId()):?>
           <?php $member = $coordinator->getMember();?>
           <?php if(isset($member)):?>
              <?php $person = PersonPeer::retrieveByPK($member->getPersonId());?>
              <?php if(isset($person) && $person instanceof Person):?>
                <?php echo $person->getTitle() .' '.$person->getFirstName().' '.$person->getlastName();?>
                <a href="<?php echo url_for('@coordinator_edit?id='.$coordinator->getId().'&leg='.$leg->getId())?>" class="action-edit">edit</a>
              <?php endif?>
         <?php endif?>
          <?php endif?>
           <?php else:?>             
           <?php endif;?>
      </dd>
      <dt>ACN Leg</dt>
      <dd>--</dd>      
      <h4 style="color:blue">Origin Airport
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false) && isset($fromAirport)):?><a href="<?php echo url_for('@airport_edit?id='.$fromAirport->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
      </h4>
      <dt>identifier</dt>
      <dd><?php if(isset($fromAirport)):?><?php echo $fromAirport->getIdent()?><?php else:?>--<?php endif?></dd>
      <dt>Name</dt>
      <dd><?php if(isset($fromAirport)):?><?php echo $fromAirport->getName()?><?php else:?>--<?php endif?></dd>
      <dt>City</dt>
      <dd><?php if(isset($fromAirport)):?><?php echo $fromAirport->getCity()?><?php else:?>--<?php endif?></dd>
      <dt>State</dt>
      <dd><?php if(isset($fromAirport)):?><?php echo $fromAirport->getState()?><?php else:?>--<?php endif?></dd>
    </dl>
    <dl class="person-data">
      <dt>Mission Leg Number</dt>
      <dd>
      <?php if($leg->getLegNumber()):?>
        <input type="text" class="text" name="leg_number" value="<?php echo $leg->getLegNumber()?>">
      <?php else:?>
        <input type="text" class="text" value="" name="leg_number">
      <?php endif?>
      </dd>
      <dt>Waiver Received</dt>
      <dd>
        <?php echo $date_widget->render('waiver_rec', $waiver_rec);?>
      </dd>
      <dt>Coordinated web off</dt>
      <dd>
      <?php if($leg->getWebCoordinated() == 1):?>
      <input type="checkbox" id="coor_web_off" name="coor_web_off" checked="checked">
      <?php else:?>
      <input type="checkbox" id="coor_web_off" name="coor_web_off">
      <?php endif?>
      </dd>
      <dt>Cancel Reason</dt>
      <dd>
      <?php if($leg->getCancelled() != null):?>
      <input type="text" id="cancel_reason" name="cancel_reason" class="text" value="<?php echo $leg->getCancelled()?>"/>
      <?php else:?>
      <input type="text" id="cancel_reason" name="cancel_reason" class="text"/>
      <?php endif?>
      </dd>
      <dt>Cancel Comment</dt>
      <dd>
      <?php if($leg->getCancelComment() != null):?>
      <textarea rows="3" cols="20" class="text" name="cancel_comment"><?php echo $leg->getCancelComment()?></textarea>
        <?php else:?>
      <textarea rows="3" cols="20" class="text" name="cancel_comment"></textarea>
      <?php endif?>
      </dd>      
       <h4 style="color:blue">Destination Airport
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false) && isset($toAirport)):?><a href="<?php echo url_for('@airport_edit?id='.$toAirport->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
      </h4>
      <dt>identifier</dt>
      <dd><?php if(isset($toAirport)):?><?php echo $toAirport->getIdent()?><?php else:?>--<?php endif?></dd>
      <dt>Name</dt>
      <dd><?php if(isset($toAirport)):?><?php echo $toAirport->getName()?><?php else:?>--<?php endif?></dd>
      <dt>City</dt>
      <dd><?php if(isset($toAirport)):?><?php echo $toAirport->getCity()?><?php else:?>--<?php endif?></dd>
      <dt>State</dt>
      <dd><?php if(isset($toAirport)):?><?php echo $toAirport->getState()?><?php else:?>--<?php endif?></dd>
    </dl>
  </div>
  <div class="person-info">
  <dl class="person-data">
    <dt>Pilot</dt>
    <dd>
      <?php echo input_auto_complete_tag('pilot_name', "",
      'missionLeg/autoCompletePilotSearch',
      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'pilot_indicator',
      'after_update_element' => 'setPilotId'
      )
       );
      ?>      
    <input type="hidden" id="pilot_id" name="pilot_id" value="<?php echo $leg->getPilotId();?>" />
    <span id="pilot_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /> <br /> 
   <?php if(isset($pilot)):?>
      <?php $person_p = $pilot->getMember()->getPerson();?>
      <?php if(isset($person_p)):?><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$pilot->getId().'&leg='.$leg->getId())?>" class="link-view"></a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$pilot->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
        <?php echo link_to('remove', '@legpilot_delete?id='.$leg->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove and related information?', 'class' => 'action-remove')); ?>
      <?php } ?>
      <?php else:?>
      
    <?php endif?>
    </dd>
    <dt>Pilot's Aircraft</dt>
    <dd> 
    <?php if(isset($pilot) && isset($pilot_member)):?>
        <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('account/newAircraft?id='.$pilot->getMemberId().'&leg='.$leg->getId())?>" class="link-add"></a><?php endif?>
    <br />
    <?php if(isset($pilot)):?>
        <?php $has_p_aircrafts = PilotAircraftPeer::getByMemberId($pilot_member->getId());?>
        <?php
        $aircrafts =array();
        $c = 0;
        if(isset($has_p_aircrafts)){
          foreach ($has_p_aircrafts as $pilot_aircraft){
            if($pilot_aircraft->getAircraftId()){
              $aircrafts[$c] = AircraftPeer::retrieveByPK($pilot_aircraft->getAircraftId());
              $c++;
            }
          }
        }
        ?>
        <?php if(count($aircrafts)):?>              
              <br/>
              <?php for ($i =0;$i<count($aircrafts);$i++):?>
                <?php echo 'Make : '.$aircrafts[$i]->getMake().' / Model : '.$aircrafts[$i]->getModel().' /Name : '.$aircrafts[$i]->getName()?>
                <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@aircraft_edit?id='.$aircrafts[$i]->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?> <br />
              <?php endfor;?>
          <?php else:?>
                
          <?php endif?>
             
        <?php endif?>
     <?php else:?>
         No Pilot
      <?php endif?>
    </dd>
    <dt>Mission Assistant</dt>
    <dd>  
        <?php echo input_auto_complete_tag('mission_assistants_name', "",
          'missionLeg/autoCompleteMissionAssistants',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
          array(
          'use_style'    => true,
          'indicator'    =>'mission_assistants_indicator',
          'after_update_element' => 'setMissionAssistantsId'
          )
           );
          ?>
        <input type="hidden" id="miss_assis_id" name="miss_assis_id" value="<?php echo $leg->getMissAssisId();?>" />
        <span id="mission_assistants_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span> <br /> <br />
          <?php if(isset($mission_assistant)):?>
          <?php $person_p = $mission_assistant->getMember()->getPerson();?>
          <?php if(isset($person_p)):?><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$mission_assistant->getId().'&leg='.$leg->getId())?>" class="link-view"></a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$mission_assistant->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
        <?php else:?>
          
        <?php endif?>
    
    </dd>   
    <dt>Private Coordinator's Note</dt>
   <?php if($leg->getPrivateCNote() != null):?>
          <textarea rows="3" cols="20" name="private_coor_note" class="text"><?php echo $leg->getPrivateCNote()?></textarea>
   <?php else:?>
          <textarea rows="3" cols="20" name="private_coor_note" class="text"></textarea>
    <?php endif?>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
  </dl>
  <dl class="person-data">
   <dt>Mission FBO</dt>
    <dd>
    <?php if(isset($fbo)):?>
        <?php 
        if($fbo->getAirportId()){
          $fbo_airport = AirportPeer::retrieveByPK($fbo->getAirportId());
        }
        ?>
        <?php if(isset($fbo_airport)):?>
          <?php echo 'Ident: '.$fbo_airport->getIdent().' /Name: '.$fbo_airport->getName()?>
            <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@airport_edit?id='.$fbo_airport->getId().'&leg='.$leg->getid())?>" class="action-edit"></a><?php endif?>
        <?php else:?>
            <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@airport_create?leg='.$leg->getid())?>" class="link-add"></a><?php endif?>
        <?php endif?>
    <?php else:?>
       <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@fbo_create?leg='.$leg->getid())?>" class="link-add"></a><?php endif?>
    <?php endif?>
    </dd>
    <dt>BackUp Pilot</dt>
    <dd>
    <?php echo input_auto_complete_tag('backup_pilot_name', "",
      'missionLeg/autoCompleteBackupPilotSearch',
      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'backup_pilot_indicator',
      'after_update_element' => 'setBackupPilotId'
      )
       );
      ?>
    <input type="hidden" id="backup_pilot_id" name="backup_pilot_id" value="<?php echo $leg->getBackupPilotId();?>" />
    <span id="backup_pilot_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br />
    <?php if(isset($backup_pilot)):?>
      <?php if(isset($bp_person)):?><?php echo $bp_person->getTitle().' . '.$bp_person->getFirstName().' '.$bp_person->getLastName();?><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$backup_pilot->getId())?>" class="link-view"></a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$backup_pilot->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
    <?php else:?>
       <?php $id =1?>
       
    <?php endif?>
    </dd>
    <dt>BackUp Co-Pilot</dt>
    <dd>
     <?php echo input_auto_complete_tag('backup_copilot_name', "",
      'missionLeg/autoCompleteBackupCopilotSearch',
      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'backup_copilot_indicator',
      'after_update_element' => 'setBackupCopilotId'
      )
       );
      ?>
    <input type="hidden" id="backup_copilot_id" name="backup_copilot_id" value="<?php echo $leg->getBackupCopilotId();?>" />
    <span id="backup_copilot_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /><br />
    <?php if(isset($backup_co_pilot)):?>
      <?php if(isset($bp_co_person)):?><?php echo $bp_co_person->getTitle().' . '.$bp_co_person->getFirstName().' '.$bp_co_person->getLastName();?><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$backup_co_pilot->getId())?>" class="link-view"></a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$backup_co_pilot->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
    <?php else:?>
       <?php $id =1?>
       
    <?php endif?>
    </dd>
    <dt>BackUp Mission Assistants</dt>
    <dd>
     <?php echo input_auto_complete_tag('backup_mission_assistants_name', "",
      'missionLeg/autoCompleteBackupMissionAssistants',
      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
      array(
      'use_style'    => true,
      'indicator'    =>'backup_mission_assistants_indicator',
      'after_update_element' => 'setBackupcMissionAssistantsId'
      )
       );
      ?>
    <input type="hidden" id="backup_miss_assis_id" name="backup_miss_assis_id" value="<?php echo $leg->getBackupMissAssisId();?>" />
    <span id="backup_mission_assistants_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span><br /><br />
    <?php if(isset($back_up_mission_assistant)):?>
      <?php $person_p = $back_up_mission_assistant->getMember()->getPerson();?>
      <?php if(isset($person_p)):?><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$back_up_mission_assistant->getId().'&leg='.$leg->getId())?>" class="link-view"></a><?php endif?>
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$back_up_mission_assistant->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
    <?php else:?>
      
    <?php endif?>
    
    </dd>
     <dt>Public Coordinator's Note</dt>
    <br/>
    <br/>
    <dd>
   <?php if($leg->getPublicCNote() != null):?>
          <textarea rows="3" cols="20" name="public_coor_note" class="text"><?php echo $leg->getPublicCNote()?></textarea>
   <?php else:?>
          <textarea rows="3" cols="20" name="public_coor_note" class="text"></textarea>
    <?php endif?>
    </dd>
    <?php endif?>
  </dl>
  </div>
  <?php if($leg->getTransportation() == 'air_mission'):?>
    <a class="btn-action" onclick="jQuery('#leg_form_submit').click();return false;" href="#">
    <span>Modify</span>
    <strong/>
  </a>
        <?php endif?>
  <input type="hidden" name="leg_id" value="<?php echo $leg->getId()?>"/>
  <input type="submit" class="hide" id="leg_form_submit"/>
</div>
</form>
</div>
 <?php 
 $from_airport1 = AirportPeer::retrieveByPK($leg->getFromAirportId());
 $to_airport1 = AirportPeer::retrieveByPK($leg->getToAirportId());
?>
<?php $miss_legs = MissionLegPeer::getbyMissId($mission->getId());?>
<?php if(count($miss_legs)):?>
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
  <?php foreach ($miss_legs as $mission_leg) {?>
    <?php if ($mission_leg->getTransportation() == 'air_mission') {
      $from_airport = AirportPeer::retrieveByPK($mission_leg->getFromAirportId());
      $to_airport = AirportPeer::retrieveByPK($mission_leg->getToAirportId());
      if($from_airport && $to_airport):
      ?>
      <tr style="<?php echo $mission_leg->getCancelled() ? 'color:gray' : ''?>">
        <td class="cell-1"><?php echo $mission_leg->getLegNumber()?></td>
        <td class="cell-2"><?php echo $from_airport->getIdent();?></td>
        <td class="cell-1"><?php echo $from_airport->getCity() .' , '.$from_airport->getState()?></td>
        <td class="cell-2"><?php echo $to_airport->getIdent();?></td>
        <td class="cell-1"><?php echo $to_airport->getCity() .' , '.$to_airport->getState()?></td>
        <td class="cell-2">
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$mission_leg->getId())?>" class="action-edit">edit</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$mission_leg->getId())?>" class="action-view">view</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
              <!-- a href="<?php //echo url_for('@leg_delete?id='.$mission_leg->getId())?>" class="action-remove">remove</a -->
              <?php echo link_to('remove', url_for('@leg_delete?id='.$mission_leg->getId()), array('class' => 'action-remove', 'confirm' => 'Are you sure to remove?')); ?>
          <?php endif?>
        </td>
      </tr>
      <?php
      endif;
    }elseif($mission_leg->getTransportation() == 'ground_mission') {
       $ground_addresses['airport'] = $person->getAddress1().' '
      .$person->getAddress2().' '
      .$person->getCity().', '
      .$person->getState().' '
      .$person->getZipcode();
      ?>
      <?php
                $ground_origin = $mission_leg->getGroundOrigin();
                $ground_dest   = $mission_leg->getGroundDestination();
                ?>
      <tr style="<?php echo $mission_leg->getCancelled() ? 'color:gray' : ''?>">

        <td class="cell-1"><?php echo $mission_leg->getLegNumber()?></td>
        <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_origin])){echo $ground_addr_sel[$ground_origin];}?></td>
        <td class="cell-1"><?php if(isset($ground_addresses[$ground_origin])){echo $ground_addresses[$ground_origin];}else{echo $ground_origin;}?></td>
        <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_dest])){echo $ground_addr_sel[$ground_dest];}?></td>
        <td class="cell-1"><?php if(isset($ground_addresses[$ground_dest])){echo $ground_addresses[$ground_dest];}else{echo $ground_dest;}?></td>
        <td class="cell-2">
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$mission_leg->getId())?>" class="action-edit">edit</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$mission_leg->getId())?>" class="action-view">view</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
            <!--a href="<?php //echo url_for('@leg_delete?id='.$mission_leg->getId())?>" class="action-remove">remove</a -->
            <?php echo link_to('remove', url_for('@leg_delete?id='.$mission_leg->getId()), array('class' => 'action-remove', 'confirm' => 'Are you sure to remove?')); ?>
          <?php endif?>
        </td>
      </tr>
      <?php
    }elseif($mission_leg->getTransportation() == 'commercial_mission') {
      if ($mission_leg->getAirline()) $airline = $mission_leg->getAirline()->getName(); else $airline = '';
      ?>
      <tr style="<?php echo $mission_leg->getCancelled() ? 'color:gray' : ''?>">
        <td class="cell-1"><?php echo $mission_leg->getLegNumber()?></td>
        <td class="cell-2"><?php echo $mission_leg->getCommOrigin();?></td>
        <td class="cell-1"><?php echo $airline.' #'.$mission_leg->getFlightNumber().'<br/>'.$mission_leg->getDeparture('g:i A')?></td>
        <td class="cell-2"><?php echo $mission_leg->getCommDest();?></td>
        <td class="cell-1"><?php echo $airline.' #'.$mission_leg->getFlightNumber().'<br/>'.$mission_leg->getArrival('g:i A')?></td>
        <td class="cell-2">
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$mission_leg->getId())?>" class="action-edit">edit</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$mission_leg->getId())?>" class="action-view">view</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
            <!--a href="<?php //echo url_for('@leg_delete?id='.$mission_leg->getId())?>" class="action-remove">remove</a -->
            <?php echo link_to('remove', url_for('@leg_delete?id='.$mission_leg->getId()), array('class' => 'action-remove', 'confirm' => 'Are you sure to remove?')); ?>
          <?php endif?>
        </td>
      </tr>
      <?php
    }?>
  <?php }?>
  </tbody>
</table>
<?php endif?>
<div class="add-mission">
  <div class="add-mission-entry">
    <!--  Mission Tabs-->
    <br/>
    <?php if ($leg->isNew()) {?>
    <b><label for="types">Transportation Type*</label></b>
    <select class="tab-switcher" id="types">
      <option value="">Select</option>
      <option <?php if($sf_params->get('transportation') == 'air_mission') echo 'selected' ?> value="air_mission">Air Mission</option>
      <option <?php if($sf_params->get('transportation') == 'ground_mission') echo 'selected' ?> value="ground_mission">Ground Mission</option>
      <option <?php if($sf_params->get('transportation') == 'commercial_mission') echo 'selected' ?> value="commercial_mission">Commercial Mission</option>
    </select>
    <?php }?>

    <?php if($sf_params->get("id") > 0) $leg_id = $sf_params->get("id"); else $leg_id = null;?>
    
    <?php if ((!$leg->isNew() && $leg->getTransportation() == 'air_mission') || $leg->isNew()) {?>
    <div id="air_mission_tab" class="air-mission" style="<?php if ($leg->getTransportation() != 'air_mission') echo 'display:none'?>">
      <div class="frame">
        <!--
        Author: Bayarsaikhan
        Description: Always editing leg. Never adds new leg. We need to retrieve leg_id from Parameter if it is in edit mode. Other we create new leg for the mission with no ID parameter.
        -->
        <?php //if(isset($leg)) $leg_id = $leg->getId(); else $leg_id = null;?>
        <form action="<?php echo url_for($leg_id ? '@leg_edit?id='.$leg_id : '@leg_create')?>" method="post">
          <input type="hidden" name="transportation" value="air_mission"/>
          <?php if(isset($mission)):?><input type="hidden" id="mission_id" name="mission_id" value="<?php echo $mission->getId()?>"/><?php endif;?>
          <h3>Air Mission Detail</h3>
          <?php if ($sf_params->get('transportation') == 'ground_mission' && isset($errors)){?>
            <ul class="error_list">
            <?php foreach ($errors as $error) {?>
              <li><?php echo $error?></li>
            <?php }?>
            </ul>
          <?php }?>
          <div class="air-mission-info">
            <div class="holder">
              <div class="wrap">
                <label>Cancel Reason:</label>
                <input type="text" id="cancelled" name="cancelled" value="<?php echo $sf_params->has('cancelled') ? $sf_params->get('cancelled') : $leg->getCancelled()?>" class="text"/>
              </div>
              <div class="wrap">
                <label for="form-item-1">Current Pilot:</label>
                <?php
                if(isset($leg)){
                  if($leg->getPilotId()){
                    $pilot = PilotPeer::retrieveByPK($leg->getPilotId());
                  }
                }?>

                <?php if(isset($pilot)):?>
                  <?php
                  if($pilot->getMemberId()){
                    $member = $pilot->getMember();
                    if(isset($member)){
                      if($member->getPersonId()){
                        $person = $member->getPerson();
                        if(isset($person)){
                          echo $person->getTitle().' . '.$person->getFirstName().' '.$person->getLastName();
                        }
                      }
                    }
                  }
                  ?>
                <?php else:?>
                    <?php echo '--' ?>
                <?php endif;?>
              </div>
            </div><!-- holder end -->

            <div class="holder">
              <input type="checkbox" name="add_another" value="1" id="add_another"/>
              <label for="add_another" style="display:inline;">Add another leg?</label>
            </div><!-- holder end -->

          </div><!-- air-mission-info end -->

          <div class="destination">
            <label for="ident_from">Origin Airport: </label>
            <input type="text" class="text" id="ident_from" name="orgin_airport" value="<?php if (!$leg->isNew() && $leg->getAirportRelatedByFromAirportId()) echo $leg->getAirportRelatedByFromAirportId()->getIdent()?>"/>

            <label for="ident_to">Destination Airport:</label>
            <input type="text" class="text" id="ident_to" name="dest_airport" value="<?php if (!$leg->isNew() && $leg->getAirportRelatedByToAirportId())echo $leg->getAirportRelatedByToAirportId()->getIdent()?>"/>

            <a class="btn-save-leg" href="#" onclick="jQuery('#form_submit').click();return false;">
              <span>Save This Leg</span>
            </a>
          </div>

          <div class="mission-map">
            <div id="map_canvas" style="width:573px;height:300px;"></div>
          </div>

          <input class="hide" type="submit" value="submit" id="form_submit"/>

        </form>
      </div>
      <!--            End Frame-->
    </div>
    <!--            End Air Mission Tab-->
    <?php }?>
    
    <?php if ((!$leg->isNew() && $leg->getTransportation() == 'ground_mission') || $leg->isNew()) {?>
    <div id="ground_mission_tab" class="air-mission" style="<?php if ($leg->getTransportation() != 'ground_mission') echo 'display:none'?>">
      <form action="<?php echo url_for($leg_id ? '@leg_edit?id='.$leg_id : '@leg_create')?>" method="post">
        <input type="hidden" name="transportation" value="ground_mission"/>
        <?php if(isset($mission)):?><input type="hidden" id="mission_id" name="mission_id" value="<?php echo $mission->getId()?>"/><?php endif;?>
        <div class="frame">
          <h3>Ground Mission Detail</h3>
          <div class="air-mission-info">
            <?php if ($sf_params->get('transportation') == 'ground_mission' && isset($errors) && count($errors)) {?>
              <ul class="error_list">
              <?php foreach ($errors as $error) {?>
                <li><?php echo $error?></li>
              <?php }?>
              </ul>
            <?php }?>
            <?php
            $orig_a = $leg->getGroundOrigin();
            $dest_a = $leg->getGroundDestination();
              if(!isset($ground_addresses[$orig_a])){$orig_set = $orig_a;}
              if(!isset($ground_addresses[$dest_a])){$dest_set = $dest_a;}
            ?>
            <div class="holder">
              <div class="wrap">
                <label>Origin Address</label>
                <?php echo select_tag('ground_origin', options_for_select($ground_addr_sel, ($sf_params->has('ground_origin') ? $sf_params->get('ground_origin') : $leg->getGroundOrigin()), array('include_custom' => '-- select --')), array("onchange" => "changeGroundMissionDetails(this)"))?>
              </div>
              <div class="wrap">
                <label>Destination Address</label>
                <?php echo select_tag('ground_destination', options_for_select($ground_addr_sel, ($sf_params->has('ground_destination') ? $sf_params->get('ground_destination') : $leg->getGroundDestination()), array('include_custom' => '-- select --')),array("onchange" => "changeGroundMissionDetails(this)"))?>
              </div>
               <?php
                  $c = new Criteria();
                  $c->add(FboPeer::NAME, '', Criteria::NOT_EQUAL);
                  $c->addAscendingOrderByColumn(FboPeer::NAME);
                  $fbo_addresses = FboPeer::doSelect($c);
                  foreach($fbo_addresses as $fbo_address){
                     $options[$fbo_address->getId()] = $fbo_address->getName();
                  }
               ?>
              <div class="wrap">
                <label>FBO Name</label>
                <?php echo select_tag('fbo_address', options_for_select($options, ($leg ? ($leg->getFboId()): null), array('include_custom' => '-- select --')))?>
              </div>
              <div class="wrap">
                <label>FBO Address</label>
                <input type="text" name="fbo_address_new" value="<?php echo $new_fbo_address ;?>" style="width: 220px;" />
              </div>
            </div>

            <div class="holder">
              <div class="wrap">
                <label>Origin Address</label>
                <input type="text" name="orig_set" value="<?php echo $orig_set;?>" style="width: 220px;">
              </div>

              <div class="wrap">
                <label>Destination Address</label>
                <input type="text" name="dest_set" value="<?php echo $dest_set;?>" style="width: 220px;">
              </div>
            </div>
          </div><!-- air-mission-info -->

          <div class="air-mission-info">
            <div class="holder">

              <label>Patient's Address</label>
              <?php echo $person->getAddress1()?>
              <?php echo $person->getAddress2()?>
              <br/>
              <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
              <br clear="all"/>
              <br clear="all"/>
            <input type="checkbox" name="add_another" value="1" id="add_another_ground"/>
            <label for="add_another_ground" style="display:inline;">Add another leg?</label>
            </div>
            <div class="holder">
              <label>Lodging Address</label>
              <?php echo $passenger->getLodgingName()?><br/>
              <?php echo $iti->getDestCity().', '.$iti->getDestState()?>
              <br clear="all"/>

              <label>Facility Address</label>
              <?php echo $passenger->getFacilityName()?><br/>
              <?php echo $iti->getDestCity().', '.$iti->getDestState()?>
            </div>

          </div>

          <input class="hide" type="submit" value="submit" id="ground_form_submit"/>
          <a class="btn-save-leg" href="#" onclick="jQuery('#ground_form_submit').click();return false;">
            <span>Save This Leg</span>
          </a>
        </div><!-- frame -->
      </form>
    </div>
    <?php }?>

    <?php if ((!$leg->isNew() && $leg->getTransportation() == 'commercial_mission') || $leg->isNew()) {?>
    <div id="commercial_mission_tab" class="air-mission" style="<?php if ($leg->getTransportation() != 'commercial_mission') echo 'display:none'?>">
      <form action="<?php echo url_for($leg_id ? '@leg_edit?id='.$leg_id : '@leg_create')?>" method="post" id="commercial_form">
        <?php if(isset($mission)):?><input type="hidden" id="mission_id" name="mission_id" value="<?php echo $mission->getId()?>"/><?php endif;?>
        <input type="hidden" name="transportation" value="commercial_mission"/>
        <div class="frame">
          <h3>Commercial Mission Detail</h3>
          <div class="air-mission-info">
            <?php if ($sf_params->get('transportation') == 'commercial_mission' && isset($errors) && count($errors)) {?>
              <ul class="error_list">
              <?php foreach ($errors as $error) {?>
                <li><?php echo $error?></li>
              <?php }?>
              </ul>
            <?php }?>
            <div class="holder" style="width:262px;">
              <div class="wrap">
                <label>Flight Time</label>
                <?php echo $time_widget->render('flight_time', ($sf_params->has('flight_time') ? $sf_params->get('flight_time') : $leg->getFlightTime()))?>
              </div>
              <div class="wrap">
                <label for="comm_baggage_weight">Baggage Weight:</label>
                <input id="comm_baggage_weight" class="text narrower" type="text" value="<?php echo $sf_params->has('baggage_weight') ? $sf_params->get('baggage_weight') : $leg->getBaggageWeight()?>" name="baggage_weight"/>
                <select>
                  <option value="LB">LB</option>
                  <option value="KG">KG</option>
                </select>
              </div>
              <div class="wrap">
                <label for="comm_baggage_desc">Baggage Description:</label>
                <input id="comm_baggage_desc" class="text" type="text" name="baggage_desc" value="<?php echo $sf_params->has('baggage_desc') ? $sf_params->get('baggage_desc') : $leg->getBaggageDesc()?>"/>
              </div>
              <div class="wrap">
                <label for="airline_id">Airline*:</label>
                <?php echo select_tag('airline_id', objects_for_select($airlines, 'getId', 'getName', ($sf_params->has('airline_id') ? $sf_params->get('airline_id') : $leg->getAirlineId()), array('include_custom' => 'Please Select')).'<option value="other">Other</option>')?>
                <label>&nbsp;</label>
                <input id="airline_custom" class="text" type="text" name="airline_custom" value="<?php echo $sf_params->get('airline_custom')?>"/>
              </div>
              <div class="wrap">
                <label for="fund_id">Commercial Fund:</label>
                <?php echo select_tag('fund_id', objects_for_select($funds, 'getId', 'getFundDesc', ($sf_params->has('fund_id') ? $sf_params->get('fund_id') : $leg->getFundId()), array('include_custom' => 'None')), array('class' => 'select'))?>
              </div>
              <div class="wrap">
                <label>Confirmation Code:</label>
                <input class="text" type="text" name="confirm_code" value="<?php echo $sf_params->has('confirm_code') ? $sf_params->get('confirm_code') : $leg->getConfirmCode()?>"/>
              </div>
              <div class="wrap">
                <label>Flight Cost:</label>
                <input class="text" type="text" name="flight_cost" value="<?php echo $sf_params->has('flight_cost') ? $sf_params->get('flight_cost') : $leg->getFlightCost()?>"/>
              </div>
            </div>
          </div><!-- air-mission-info -->

          <h3>Flight Detail</h3>
          <table id="comm_flight_details">
            <tr>
              <td>Origin</td>
              <td>Destination</td>
              <td>Flight #</td>
              <td>Departure</td>
              <td>Arrival</td>
            </tr>
            <tr>
              <td><input type="text" name="origin" size="10" value="<?php echo $sf_params->has('origin') ? $sf_params->get('origin') : $leg->getCommOrigin()?>"/></td>
              <td><input type="text" name="destination" size="10" value="<?php echo $sf_params->has('destination') ? $sf_params->get('destination') : $leg->getCommDest()?>"/></td>
              <td><input type="text" name="flight_number" size="10" value="<?php echo $sf_params->has('flight_number') ? $sf_params->get('flight_number') : $leg->getFlightNumber()?>"/></td>
              <td><?php echo $time_widget->render('departure', ($sf_params->has('departure') ? $sf_params->get('departure') : $leg->getDeparture()))?></td>
              <td><?php echo $time_widget->render('arrival', ($sf_params->has('arrival') ? $sf_params->get('arrival') : $leg->getArrival()))?></td>
            </tr>
          </table>

          <input class="hide" type="submit" value="submit" id="commercial_form_submit"/>
          <a class="btn-save-leg" href="#" onclick="jQuery('#commercial_form_submit').click();return false;">
            <span>Save This Leg</span>
          </a>
        </div><!-- frame -->
      </form>
    </div>
    <?php }?>
  </div>
</div>

<script type="text/javascript">
//<![CDATA[
function changeGroundMissionDetails(selectElem){
   if(jQuery(selectElem).find("option:selected").val() == ""){
      jQuery("#ground_destination").find("option").show();
      jQuery("#ground_origin").find("option").show();
      return;
   }
   if(selectElem.id == "ground_origin"){
      jQuery("#ground_destination").find("option").show();
      jQuery("#ground_origin").find("option").show();
      jQuery("#ground_destination").find("option[value='"+jQuery(selectElem).find("option:selected").val()+"']").hide();
      if(jQuery("#ground_destination").find("option:selected").val() == jQuery(selectElem).find("option:selected").val()){
         jQuery("#ground_destination").find("option:selected").removeAttr("selected");
      }
   }else{
      jQuery("#ground_destination").find("option").show();
      jQuery("#ground_origin").find("option").show();
      jQuery("#ground_origin").find("option[value='"+jQuery(selectElem).find("option:selected").val()+"']").hide()
      if(jQuery("#ground_origin").find("option:selected").val() == jQuery(selectElem).find("option:selected").val()){
         jQuery("#ground_origin").find("option:selected").removeAttr("selected");
      }
   }
}
function gMarker(lat, lng, title, ident)
{
  var marker;
  marker = new GMarker(new GLatLng(lat, lng), { title: title});
  marker.ident = ident;
  GEvent.addListener(marker, 'click', function () { gAirportClick(marker); });
  return marker;
}

function gInitialize()
{
  if (GBrowserIsCompatible()) {
    var map = null;
    var markers = [];
    map = new GMap2(document.getElementById("map_canvas"), { size: new GSize(500, 300) });
    map.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map.setMapType(G_HYBRID_MAP);
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

<?php
$mapData = array();
foreach($airport_list as $i => $airport){
  $mapData[] = array('lat' => $airport->getLatitude(),
                     'lng' => $airport->getLongitude(),
                     'title' => $airport->getName(),
                     'ident' => $airport->getIdent()
  );
}?>
    var mapsData = <?php echo json_encode($mapData)?>;
    jQuery.each(mapsData, function(key, value){
          var tmpMarker;
          tmpMarker = new GMarker(new GLatLng(value.lat, value.lng), { title: value.title});
          tmpMarker.ident = value.ident;
          GEvent.addListener(tmpMarker, 'click', function () { gAirportClick(tmpMarker); });
          markers.push(tmpMarker);
       });
       var markerCluster1 = new MarkerClusterer(map, markers);
  }
}

function gAirportClick(marker)
{
  var $from = jQuery('#ident_from');
  var $to = jQuery('#ident_to');

  if ($from.val() == '') {
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
  }else if ($to.val() == '') {
    $to.val(marker.ident);
    jQuery('#ident_distance').html(gCalculateDistance($from.data('coord'), marker.getLatLng()) + 'miles');
  }else{
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
    $to.val('');
  }
}

function gCalculateDistance(from, to) // in miles
{
  var distance = from.distanceFrom(to, 3959).toFixed(1);

  var max = <?php echo sfConfig::get('app_max_airport_distance')?>;
  var msg = '';
  if (distance > max) msg = 'Distance is more than ' + max + '. But you can override!';
  jQuery('#air_notification').html(msg);

  return distance;
}
jQuery(document).ready(function() {
  jQuery("#types").change(function(){
    jQuery('#air_mission_tab, #ground_mission_tab, #commercial_mission_tab').hide();
    jQuery('#' + jQuery(this).val() + '_tab').show();
  });
  jQuery('#types').change();
  gInitialize(); // google map
  window.onbeforeunload = GUnload; // google map
});
//]]>
</script>
