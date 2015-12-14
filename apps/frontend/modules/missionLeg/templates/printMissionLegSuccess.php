<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link rel="stylesheet" href="/css/print.css" type="text/css"/>
<div class="person-view">
  <h2>AFIDS Mission Leg View </h2>
  <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Leg Information</h4>
            <dl>
              <dt>Leg Number:</dt>
              <dd><?php echo $leg->getLegNumber() ? $leg->getLegNumber() : '--'?></dd>

              <dt>Waiver Received:</dt>
              <dd><?php if($itinerary) echo $itinerary->getWaiverNeed()==1?'Yes':'No'?></dd>

              <dt>Coordinated off web:</dt>
              <dd><?php echo $leg->getWebCoordinated()==1?'Yes':'No'?></dd>

              <dt>Cancel Reason:</dt>
              <dd><?php echo $leg->getCancelled() ? $leg->getCancelled() : '--';?></dd>

              <dt>Cancel Comment:</dt>
              <dd><?php echo $leg->getCancelComment() ? $leg->getCancelComment() : '--'?></dd>
            </dl>
        </div>
       </div>
     </div>
    </div>

    <?php
    if(isset($leg)){
      if($leg->getFromAirportId()){
        $o_airport = AirportPeer::retrieveByPK($leg->getFromAirportId());
      }
      if($leg->getToAirportId()){
        $d_airport = AirportPeer::retrieveByPK($leg->getToAirportId());
      }
    }

    ?>
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Mission Information</h4>
              <dl class="person-data">
              <dt>Itinerary ID:</dt>
              <dd><?php if(isset($itinerary)) echo $itinerary->getId()?></dd>

      <dt>Mission External ID:</dt>
      <dd><?php echo $mission->getExternalId()  ?></dd>
              <dt>Mission Type:</dt>
              <dd><?php if ($mission->getMissionType()) echo $mission->getMissionType()->getName();?></dd>

              <dt>Transportation:</dt>
              <dd>
                <?php switch ($leg->getTransportation()) {
                  case 'air_mission': echo 'Air Mission'; break;
                  case 'ground_mission': echo 'Ground Mission'; break;
                  case 'commercial_mission': echo 'Commercial Mission'; break;
                }?>
              </dd>

              <dt>Baggage Weight:</dt>
              <dd><?php echo $leg->getBaggageWeight()?></dd>

              <dt>Baggage Description:</dt>
              <dd><?php echo $leg->getBaggageDesc()?></dd>

              <dt>Specific Comment:</dt>
              <dd><?php echo $mission->getMissionSpecificComments()?></dd>
            </dl>
            
        </div>
       </div>
     </div>
    </div>
   </div>
  
    <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Passenger Information</h4>
              <dl class="person-data">             
               <?php if($person) {?>
                  <dt>Passenger :</dt>
                  <dd><?php if($person->getTitle()){ echo $person->getTitle().'.';}?>&nbsp;<?php echo $person->getFirstName()?>&nbsp;<?php echo $person->getLastName()?></dd>
                  <?php if($person->getEveningPhone()) {?>
                  <dt>Evening :</dt>
                  <dd><?php echo $person->getEveningPhone()?></dd>
                  <?php } ?>
                  <?php if($person->getMobilePhone()) {?>
                  <dt>Mobile :</dt>
                  <dd><?php echo $person->getMobilePhone()?></dd>
                  <?php } ?>
                  <?php if($person->getOtherPhone()) {?>
                  <dt>Other:</dt>
                  <dd><?php echo $person->getOtherPhone()?></dd>
                  <?php } ?>
                  <?php if($pass->getDateOfBirth()) {?>
                  <dt>Birth Date : </dt>
                  <dd><?php echo $pass->getDateOfBirth()?></dd>
                  <?php } ?>
                  <?php if($pass->getWeight()) {?>
                  <dt>Passenger Weight:</dt>
                  <dd><?php echo $pass->getWeight()?></dd>
                  <?php } ?>
                  <?php if($pass->getIllness()) {?>
                  <dt>Passenger Illness :</dt>
                  <dd><?php echo $pass->getIllness()?></dd>
                  <?php } ?>
              <?php }?>                         
            </dl>           
        </div>
       </div>
     </div>
    </div>
   
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Requester Information</h4>
            <?php if($req_person) {?>
            <dl>
              <dt>Name :</dt>
              <dd><?php echo $req_person->getFirstName();?>&nbsp; <?php echo $req_person->getLastName();?></dd>
            </dl>
            <?php if($requester->getTitle()) {?>
            <dt>Title :</dt>
            <dd><?php echo $requester->getTitle()?></dd>
            <?php } ?>
            <?php if($agency) {?>
            <dt>Agency :</dt>
            <dd><?php echo $agency->getName()?></dd>
            <?php } ?>
            <?php if($req_person->getAddress1()) {?>
            <dt>Location :</dt>
            <dd><?php echo $req_person->getAddress1()?><br /><?php echo $req_person->getAddress2()?></dd>
            <?php } ?>
            <?php if($req_person->getDayPhone()) {?>
            <dt>Day :</dt>
            <dd><?php echo $req_person->getDayPhone()?></dd>
            <?php } ?>
            <?php if($req_person->getMobilePhone()) {?>
            <dt>Mobile :</dt>
            <dd><?php echo $req_person->getMobilePhone()?></dd>
            <?php } ?>
            <?php } ?>
        </div>
       </div>
     </div>
    </div>
  </div>

  <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">

            <h4>Companions</h4>
            <?php if($companions){?>
            <table border="1" cellpadding="2" width="300" cellspacing="0">
              <tr>                
                <td width="150" valign="top" align="left"><strong><small>Relationship</small></strong></td>
                <td width="75" valign="top" align="right"><strong><small>Age</small></strong></td>
                <td width="75" valign="top" align="right"><strong><small>Weight</small></strong></td>                
              </tr>
              <?php $totalWeight=0; foreach ($companions as $companion) { $totalWeight+=$companion->getWeight();?>
              <tr>
                <td width="150" valign="top" align="left"><small><?php echo $companion->getRelationship();?></small></td>
                <td width="75" valign="top" align="right"><small><?php
                if($companion->getDateOfBirth()){
                    $today = strtotime("NOW");
                    $myBirthDate = strtotime($companion->getDateOfBirth());
                    $totalTime=round(abs($today-$myBirthDate));
                    $days=($totalTime/86400);
                    $ages=round($days/365);
                    echo $ages;
                }else{
                    echo "---";
                }
                ?></small></td>
                
                <td width="75" valign="top" align="right"><small><?php echo $companion->getWeight();?></small></td>
                
              </tr>
              <?php } ?>
              <tr>
                <td claspan="2" valign="top" align="right"><small><strong>Total Mission Leg Weight (incl. baggage):</strong></small></td>
                <td width="75" valign="top" align="right"><small><?php echo $totalWeight;?>&nbsp;Lbs.</small></td>
              </tr>
            </table>
            <?php } else { ?>
            <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php } ?>
        </div>
       </div>
     </div>
    </div>

    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Mission FBO</h4>
            <?php if(isset($fbo)):?>
            <dt>Mission FBO</dt>
            <dd>            
                <?php
                if($fbo->getAirportId()){
                  $fbo_airport = AirportPeer::retrieveByPK($fbo->getAirportId());
                }
                ?>
                <?php if(isset($fbo_airport)):?>
                  <?php echo 'Ident: '.$fbo_airport->getIdent().' /Name: '.$fbo_airport->getName()?>
                    <?php if($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@airport_edit?id='.$fbo_airport->getId().'&leg='.$leg->getid())?>" class="action-edit"></a><?php endif?>
                <?php else:?>
                    <?php if($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@airport_create?leg='.$leg->getid())?>" class="link-add"></a><?php endif?>
                <?php endif?>
            </dd>
            <?php else:?>
            <?php endif?>
        </div>
       </div>
     </div>
    </div>
  </div>

 
  <?php if ($leg->getTransportation() == 'air_mission') { ?>
  <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Origin Airport</h4>
              <dl class="person-data">
                <dt>Identifier:</dt>
                <dd><?php if($o_airport) echo $o_airport->getIdent()?></dd>
                <dt>Name:</dt>
                <dd><?php if($o_airport) echo $o_airport->getName()?></dd>
                <dt>City:</dt>
                <dd><?php if($o_airport) echo $o_airport->getCity()?></dd>
                <dt>State:</dt>
                <dd><?php if($o_airport) echo $o_airport->getState()?></dd>
            </dl>
        </div>
       </div>
     </div>
    </div>
      
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Destination Airport</h4>
            <dl>
              <dt>Identifier:</dt>
              <dd><?php if($d_airport) echo $d_airport->getIdent()?></dd>
              <dt>Name:</dt>
              <dd><?php if($d_airport) echo $d_airport->getName()?></dd>
              <dt>City:</dt>
              <dd><?php if($d_airport) echo $d_airport->getCity()?></dd>
              <dt>State:</dt>
              <dd><?php if($d_airport) echo $d_airport->getState()?></dd>
            </dl>
        </div>
       </div>
     </div>
    </div>
  </div>
 <?php } elseif ($leg->getTransportation() == 'ground_mission') { ?>
  <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <dl class="person-data">
                <dt>Origin</dt>
                  <dd><?php echo $ground_addr_sel[$leg->getGroundOrigin()]?></dd>
                  <dt>Address</dt>
                  <dd><?php echo $ground_addresses[$leg->getGroundOrigin()]?></dd>
                </dl>
                <dl class="person-data">
                  <dt>Destination</dt>
                  <dd><?php echo $ground_addr_sel[$leg->getGroundDestination()]?></dd>
                  <dt>Address</dt>
                  <dd><?php echo $ground_addresses[$leg->getGroundDestination()]?></dd>
                </dl>
                 <?php
                 if($leg->getFboId()):
                  $fbo_name = FboPeer::retrieveByPK($leg->getFboId());
                 ?>
                <dl class="person-data">
                  <dt>FBO Name</dt>
                  <dd><?php echo $fbo_name->getName()?></dd>
                </dl>
                <dl class="person-data">
                  <dt>FBO Address</dt>
                  <dd><?php echo $leg->getFboAddressNew() ? $leg->getFboAddressNew() : '--'?></dd>
                </dl>
              <?php endif;?>
        </div>
       </div>
     </div>
    </div>

    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
        &nbsp;
    </div>
  </div>
 <?php } elseif ($leg->getTransportation() == 'commercial_mission') {?>
   <div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <?php if ($leg->getAirline()) $airline = $leg->getAirline()->getName(); else $airline = '';?>
            <dl class="person-data">
              <dt>Origin</dt>
              <dd><?php echo $leg->getCommOrigin();?></dd>
              <dt>Destination</dt>
              <dd><?php echo $leg->getCommDest();?></dd>
              <dt>Airline</dt>
              <dd><?php echo $airline?></dd>
              <dt>Flight Number</dt>
              <dd><?php echo $leg->getFlightNumber()?></dd>
              <dt>Departure</dt>
              <dd><?php echo $leg->getDeparture('g:i A') ? $leg->getDeparture('g:i A') : '--'?></dd>
              <dt>Arrival</dt>
              <dd><?php echo $leg->getArrival('g:i A') ? $leg->getArrival('g:i A') : '--'?></dd>
              <dt>Flight Time</dt>
              <dd><?php echo $leg->getFlightTime('g:i A') ? $leg->getFlightTime('g:i A') : '--'?></dd>
              <dt>Flight Cost</dt>
              <dd><?php echo $leg->getFlightCost()?></dd>
              <dt>Commercial Fund</dt>
              <dd><?php if ($leg->getFund()) echo $leg->getFund()->getFundDesc()?></dd>
              <dt>Confirmation Code</dt>
              <dd><?php echo $leg->getConfirmCode()?></dd>
            </dl>          
        </div>
       </div>
     </div>
    </div>
       
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
        &nbsp;
    </div>
  </div>
 <?php } ?>
<div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Pilot</h4>
              <dl class="person-data">
              <dt>Name :</dt>
              <dd>
                  <?php if(isset($pilot)):?>
                  <?php $person_p = $pilot->getMember()->getPerson();?>
                  <?php if(isset($person_p)):?><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?><?php endif?>
                 <?php else:?>
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false) && isset($member)):?><a href="<?php echo url_for('@pilot_create?leg='.$leg->getId().'&member='.$member->getId())?>" class="link-add"></a><?php endif?>
                 <?php endif?>
              </dd>
              <dt>Pilot's Aircraft :</dt>
              <dd>
                 <?php if(isset($pilot) && isset($pilot_member)):?>
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
                      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false) && isset($member)):?><a href="<?php echo url_for('@paircraft_create?leg='.$leg->getId().'&member='.$member->getId())?>" class="link-add"></a><?php endif?>
                      <br/>
                      <?php for ($i =0;$i<count($aircrafts);$i++):?>
                        <?php echo 'Make : '.$aircrafts[$i]->getMake().' / Model : '.$aircrafts[$i]->getModel().' /Name : '.$aircrafts[$i]->getName()?>
                        
                      <?php endfor;?>
                  <?php else:?>
                     
                  <?php endif?>
                <?php endif?>
             <?php else:?>
                 No Pilot
              <?php endif?>
              </dd>
              
            </dl>
        </div>
       </div>
     </div>
    </div>
   
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Backup Pilot</h4>
            <?php if(isset($backup_pilot)):?>
            <dl>
              <?php if(isset($bp_person)):?>
              <dt>Name:</dt>
              <dd><?php echo $bp_person->getTitle().' . '.$bp_person->getFirstName().' '.$bp_person->getLastName();?></dd>
            </dl>
            <?php endif?>
            <?php else:?>
                <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php endif?>
        </div>
       </div>
     </div>
    </div>
</div>
<div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Mission Assistant</h4>
            <?php if(isset($mission_assistant)):?>
               <?php $person_p = $mission_assistant->getMember()->getPerson();?>
               <?php if(isset($person_p)):?>
                <dl class="person-data">
                    <dt>Name </dt>
                    <dd><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?></dd>
                </dl>
               <?php endif?>
            <?php else:?>
                <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php endif?>

        </div>
       </div>
     </div>
    </div>
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Backup Co-pilot</h4>
            <?php if(isset($backup_co_pilot)):?>
                <?php if(isset($bp_co_person)):?>
                <dl>
                  <dt>Name :</dt>
                  <dd><?php echo $bp_co_person->getTitle().' . '.$bp_co_person->getFirstName().' '.$bp_co_person->getLastName();?></dd>
                </dl>
                <?php endif?>
            <?php else:?>
                <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php endif?>
        </div>
       </div>
     </div>
    </div>
</div>

<div class="person-info">
     <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Coordinator</h4>
            <?php if(isset($mission_assistant)):?>
               <?php $person_p = $mission_assistant->getMember()->getPerson();?>
               <?php if(isset($person_p)):?>
                <dl class="person-data">
                    <dt>Name </dt>
                    <dd><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?></dd>
                </dl>
               <?php endif?>
            <?php else:?>
                <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php endif?>

        </div>
       </div>
     </div>
    </div>
    <div style="width:30px;float:left;">&nbsp;</div>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Camp</h4>
            <?php if(isset($camp)):?>
                <?php if($camp->getCampName()):?>
                <dl>
                  <dt>Name :</dt>
                  <dd><?php echo $camp->getCampName();?></dd>
                </dl>
                <?php endif?>
            <?php else:?>
                <dl class="person-data">
                    <dt>&nbsp;</dt>
                    <dd>None</dd>
                </dl>
            <?php endif?>
        </div>
       </div>
     </div>
    </div>
 </div>
<div class="person-info" style="padding-left:5px;">
    <dl class="person-data">
        <dt>Private Coordinator's Note</dt>
        <dd>
           <?php if($leg->getPrivateCNote() != null):?>
            <?php echo $leg->getPrivateCNote()?>
          <?php endif?>
        </dd>
    </dl>
    <dl class="person-data">        
        <?php if(isset($back_up_mission_assistant)):?>
        <dt>BackUp Mission Assistants</dt>
        <dd>
           <?php $person_p = $back_up_mission_assistant->getMember()->getPerson();?>
           <?php if(isset($person_p)):?><?php echo $person_p->getTitle().' '.$person_p->getFirstName().' '.$person_p->getLastName()?><?php endif?>
           <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_view?id='.$back_up_mission_assistant->getId().'&leg='.$leg->getId())?>" class="link-view"></a><?php endif?>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@pilot_edit?id='.$back_up_mission_assistant->getId().'&leg='.$leg->getId())?>" class="action-edit"></a><?php endif?>
            <?php else:?>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false) && isset($member)):?><a href="<?php echo url_for('@pilot_create?leg='.$leg->getId().'&member='.$member->getId())?>" class="link-add"></a><?php endif?>

        </dd>
        <?php endif?>
        <?php if($leg->getPublicCNote() != null):?>
        <dt>Public Coordinator's Note</dt>
        <dd>
           <?php echo $leg->getPublicCNote();?>
        </dd>
        <?php endif?>
    </dl>
</div>
</div>
<div>
    <br/>
    <div>
        <a href="#" onClick="window.print()" class="btn-action"><span>Print Mission Leg</span><strong>&nbsp;</strong></a>
    </div>
     <div style="clear:both;padding-top:10px;">
         <a href="/leg_view/<?php echo $leg->getId();?>"  class="btn-action"><span>Back to Mission Leg</span><strong>&nbsp;</strong></a>
    </div>
</div>