<?php 
use_helper('Form', 'Object');
$date_widget = $sf_data->getRaw('date_widget');
$time_widget = $sf_data->getRaw('time_widget');
if (isset($selected_companions)) $selected_companions = $sf_data->getRaw('selected_companions');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
$sf_response->addJavascript('http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key='.sfConfig::get('app_gmap_key'));
$sf_response->addJavascript('/js/markerclusterer.js');
$sf_response->addJavascript('/js/jquery.meio.mask.min.js');
?>

<?php if($frommission){ ?>
  <a href="<?php echo $back ?>" > << Back to mission view </a>
<?php } else{  ?>
  <a href="<?php echo $back ?>" > << Back to previous link </a>
<?php }  ?>
<div class="add-mission-entry">
  <h2>Itinerary #<?php echo $itinerary->getId()?> Details:</h2>
    <div class="add-mission">
    <div class="wrap">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
            <a href="<?php echo url_for('@itinerary_edit?id='.$itinerary->getId())?>" class="btn-action" style="padding-right: 10px;">
                <span>&nbsp; Edit &nbsp;</span>
                <strong></strong>
            </a>
        <?php } ?>
        <?php if($itinerary->getCancelItinerary() == 1): ?>
            <a href="javascript:void(0)" itineraryid="<?php echo $itinerary->getId()?>" class="btn-action action-cancel">
                <span>&nbsp; Cancel This Itinerary &nbsp;</span>
                <strong></strong>
            </a>
        <?php elseif($itinerary->getCancelItinerary() == 0): ?>
            <span style="position: relative; top: 7px;"><?php echo '<font color="red">This itinerary was cancelled</font>';?></span>
        <?php endif;?>
    </div>
    </div>
  </div>
  <div class="add-mission-entry">
   <form action="#">
    <fieldset>
      <div class="mission-dtls">
      <dl>
      <dt>Mission Type:</dt>
      <dd>
      <?php
      if($itinerary->getMissionTypeId()){
        $mission_type = MissionTypePeer::retrieveByPK($itinerary->getMissionTypeId());
        echo $mission_type->getName();
      }
      ?>
      </dd>
      <?php if($itinerary->getOrginCity() || $itinerary->getOrginState()):?>
      <dt>Origin</dt>
      <dd>
      <!--<a href="#">-->
       <?php echo $itinerary->getOrginCity().' , '. $itinerary->getOrginState()?>
      <!--</a>-->
      </dd>
      <?php endif;?>
      </dl>
      <dl>
      <dt>Passenger:</dt>
      <dd>
      <a href="#">
      <?php
      if($itinerary->getPassengerId()){
        $passenger = PassengerPeer::retrieveByPK($itinerary->getPassengerId());
        $person = $passenger->getPerson();
        if(isset($passenger) && $passenger->getPersonId()){
          if($passenger->getPerson()){
            echo $passenger->getPerson()->getTitle().' . '.$passenger->getPerson()->getFirstName() .' '.$passenger->getPerson()->getLastName();
          }
          $p_person =$passenger->getPerson();
        }

        if ($passenger) {
              $ground_addresses['lodging'] = $passenger->getLodgingName().' '.$passenger->getLodgingPhone().'<br/>'.$itinerary->getDestCity().', '.$itinerary->getDestState();
              $ground_addresses['facility'] = $passenger->getFacilityName().' '.$passenger->getFacilityPhone().'<br/>'.$itinerary->getDestCity().', '.$itinerary->getDestState();

              $ground_addresses['patient'] = $person->getAddress1().' '
              .$person->getAddress2().' '
              .$person->getCity().', '
              .$person->getState().' '
              .$person->getZipcode();
              $ground_addresses['airport'] = $person->getAddress1().' '
              .$person->getAddress2().' '
              .$person->getCity().', '
              .$person->getState().' '
              .$person->getZipcode();
            }
      }
      ?>
      </a>
      <div class="dtl-pop-up">
      <div class="t"> </div>
      <div class="c"> 
          <?php
          if(isset($p_person)){
            if($p_person){
              if($p_person->getCity() || $p_person->getState() || $p_person->getCountry()){
                echo $p_person->getCity() .' , '. $p_person->getState() .' , '.$p_person->getCountry();
              }
              if($p_person->getDayPhone()){
                echo $p_person->getDayPhone().'('.$p_person->getDayComment().')';
              }
              if($p_person->getEveningPhone()){
                echo $p_person->getEveningPhone().'('.$p_person->getEveningComment().')';
              }
              if($p_person->getMobilePhone()){
                echo $p_person->getMobilePhone().'('.$p_person->getMobileComment().')';
              }
            }
          }
          ?>
      </div>
      <div class="b"> </div>
      </div>
      </dd>
      <dt>Passenger Type:</dt>
      <dd>
      <!--<a href="#">-->
      <?php
      if($itinerary->getPassengerId()){
        if($passenger){
          $type = PassengerTypePeer::retrieveByPK($passenger->getPassengerTypeId());
          if(isset($type)){echo $type->getName();}
        }
      }
      ?>
      <!--</a>-->
      <!--<div class="dtl-pop-up">
      <div class="t"> </div>
      <div class="c"> [detailed information] </div>
      <div class="b"> </div>
      </div>-->
      </dd>
      <dt>Requester:</dt>
      <dd>
      <a href="javascript:void(0)">
      <?php
      if($itinerary->getRequesterId()){
        $requester = RequesterPeer::retrieveByPK($itinerary->getRequesterId());
        if($requester){
          $req_person = $requester->getPerson();
          if(isset($req_person)){echo $req_person->getTitle().' . '.$req_person->getFirstName().' '.$req_person->getLastName();}
        }
      }
      ?>
      </a>
      <div class="dtl-pop-up dtl-pop-up-req">
      <div class="t"> </div>
      <div class="c">
          <?php
          if(isset($req_person)){
            if($req_person){
              if($req_person->getCity() || $req_person->getState() || $req_person->getCountry()){
                echo $req_person->getCity() .' , '. $req_person->getState() .' , '.$req_person->getCountry();
              }
              if($req_person->getDayPhone()){
                echo $req_person->getDayPhone().'('.$req_person->getDayComment().')';
              }
              if($req_person->getEveningPhone()){
                echo $req_person->getEveningPhone().'('.$req_person->getEveningComment().')';
              }
              if($req_person->getMobilePhone()){
                echo $req_person->getMobilePhone().'('.$req_person->getMobileComment().')';
              }
            }
          }
          ?>
      </div>
      <div class="b"> </div>
      </div>
      </dd>
      <dt>Destination:</dt>
      <dd>
      <a href="#">
      <?php if($itinerary->getDestCity() || $itinerary->getDestState()):?><?php echo $itinerary->getDestCity().' , '. $itinerary->getDestState()?><?php endif;?>
      </a>
      </dd>
      </dl>
      </div>
      <input class="hide" type="submit" value="submit"/>
    </fieldset>
  </form>
  </div>
  <?php if($mis):?>
  <div class="mission-requests">
    <?php if($mis->getStart() == 1){
      $from = "Home";
      $to = "Treatment";
    }else{
      $from = "Treatment";
      $to = "Home";
    }

    ?>
    <h3>Mission #1: <?php echo $mis->getMissionDate('m/d/Y').' - '.' From '.$from.' to '.$to?></h3>
    <h3 style="color:red"><?php if($mis->getCancelMission() == NULL):?>Mission <?php echo $mis->getId(); ?> is canceled so to create mission leg need to activate this <?php echo link_to('mission', 'mission/edit?id='.$mis->getId()) ?>.<?php endif;?></h3>
    <ul class="mission-tabs">
      <li id="route" class="" style="margin-top: 10px">
        <span>Route:</span>
      </li>
      <li id="general">
        <a href="javascript:getGeneral()" id="general_info"><span><img style="margin-top: 8px" src="<?php if($mis->getStart() == 1){echo url_for('/images/ico-home.gif');}else{echo url_for('/images/ico-hospital.gif');}?>" /></span></a>
      </li>
      <?php foreach($mis_legs as $mis_leg):?>
      <li id="gto_<?php echo $mis_leg->getId()?>">
        <a href="javascript:getGroundTo(<?php echo $mis_leg->getId()?>)" id="to<?php echo $mis_leg->getId()?>">
          <span>
            <?php if($mis_leg->getTransportation()== 'ground_mission'):?>
              <img style="margin-top: 8px" src="<?php echo url_for('/images/ico-car-active.gif');?>" />
            <?php else:?>
              <?php echo $mis_leg->getPrefix();?>
            <?php endif;?>
          </span>
        </a>
      </li>
      <?php endforeach;?>
      <!--<li id="ato">
        <a href="javascript:getAirTo()" id="air_to"><span>Air(to)</span></a>
      </li>
      <li id="afrom">
        <a href="javascript:getAirFrom()" id="air_from"><span>Air(from)</span></a>
      </li>
      <li id="gfrom">
        <a href="javascript:getGroundFrom()" id="ground_from"><span>Ground(from)</span></a>
      </li>-->
      <li id="act">
        <a href="javascript:getActivityLog()" id="activity"><span><img style="margin-top: 8px" src="<?php if($mis->getStart() == 1){echo url_for('/images/ico-hospital.gif');}else{echo url_for('/images/ico-home.gif');}?>" /></span></a>
      </li>
      <?php if($mis->getCancelMission() == 1):?>
      <li id="addleg">
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {  ?>
        <a href="javascript:getAddleg()" id="add_leg"><span>Add Leg</span></a>
     <?php } ?>
      </li>
      <?php endif; ?>
    </ul>
    <div class="frame">

      <div class="holder" id="mis_comment_info_holder" style="margin-left: 50px">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId().'&com=1')?>" method="post">
        <div class="air-mission-info">
              <div class="holder">
                <div class="wrap">
                  <label for="mis_comment">Comment:</label>
                  <textarea id="mis_comment" rows="20" cols="40" name="mis_comment"><?php echo $mis_comment;?></textarea>
                </div>
                <br clear="all"/>
                <a class="btn-action" href="#" onclick="jQuery('#mis_comment_info_holder form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>
              </div>
        </div>
          
        </form>
      </div>

      <div class="holder" id="general_info_holder" style="display:none">
        <h4>Patient Information</h4>
          <table class="table-head">
            <tbody>
              <tr>
                <td class="cell-1">Passenger Name</td>
                <td class="cell-2">Address1</td>
                <td class="cell-3">Address2</td>
                <td class="cell-4">City / State</td>
                <td class="cell-5">Phone</td>
                <td class="cell-6">Zipcode</td>
                <td class="cell-7">Country</td>
                <td>Action</td>
              </tr>
            </tbody>
          </table>
          <table>
            <tbody>
              <tr>
                <td class="cell-1"><?php echo $passenger->getPerson()->getName();?></td>
                <td class="cell-2"><?php echo $passenger->getPerson()->getAddress1()?></td>
                <td class="cell-3"><?php echo $passenger->getPerson()->getAddress2()?></td>
                <td class="cell-4"><?php echo $passenger->getPerson()->getCity().' / '.$passenger->getPerson()->getState()?></td>
                <td class="cell-5"><?php echo $passenger->getPerson()->getDayPhone();?></td>
                <td class="cell-6"><?php echo $passenger->getPerson()->getZipcode()?></td>
                <td class="cell-7"><?php echo $passenger->getPerson()->getCountry()?></td>
                <td>
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) { ?>
                      <a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                      <a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>
        
      </div>

      <?php foreach($mis_legs as $lega):?>
      <div class="holder" id="leg_<?php echo $lega->getId()?>_holder" style="display:none">
        <h4><?php echo $mission->getId().'-'.$lega->getPrefix()?></h4>

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
        <?php if($lega->getTransportation()== 'ground_mission'):?>
          <!--<table class="table-head">
              <tbody>
                <tr>
                  <td class="cell-1">Leg Number</td>
                  <td colspan="2" class="cell-9">Origin</td>
                  <td colspan="2" class="cell-9">Destination</td>
                  <td>Action</td>
                </tr>
              </tbody>
            </table>-->
                <?php
                $ground_origin = $lega->getGroundOrigin();
                $ground_dest   = $lega->getGroundDestination();
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_origin])){echo $ground_addr_sel[$ground_origin];}?></td>
                  <td class="cell-1">
                      <?php if(isset($ground_addresses[$ground_origin]))
                        {
                          echo $ground_addresses[$ground_origin];
                        }
                        else
                        {
                            echo $ground_origin;
                        }
                      ?>
                  </td>
                  <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_dest])){echo $ground_addr_sel[$ground_dest];}?></td>
                  <td class="cell-1"><?php if(isset($ground_addresses[$ground_dest])){echo $ground_addresses[$ground_dest];}else{echo $ground_dest;}?></td>
                  <td align="center">
                    <?php if ($sf_user->hasCredential(array('Administratoifr','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a><?php endif?>
                    <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                        <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                    <?php  echo  link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                    <?php endif?>
                  </td>
                </tr>
        <?php elseif($lega->getTransportation() == 'air_mission'):
                $from_airport = AirportPeer::retrieveByPK($lega->getFromAirportId());
                $to_airport = AirportPeer::retrieveByPK($lega->getToAirportId());
                if($from_airport && $to_airport):
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php echo $from_airport->getIdent()?></td>
                  <td class="cell-1"><?php echo $from_airport->getCity() .' , '.$from_airport->getState()?></td>
                  <td class="cell-2"><?php echo $to_airport->getIdent();?></td>
                  <td class="cell-1"><?php echo $to_airport->getCity() .' , '.$to_airport->getState()?></td>
                  <td align="center">
                    <!--<a href="<?php //echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                    <a href="<?php //echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>-->
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a><?php endif?>
                  <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                      <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                      <?php echo link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                  <?php endif?>
                  </td>
                </tr>
                <?php endif;?>
        <?php elseif($lega->getTransportation() == 'commercial_mission'):
                if ($lega->getAirline()) $airline = $lega->getAirline()->getName(); else $airline = '';
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php echo $lega->getCommOrigin()?></td>
                  <td class="cell-1"><?php echo $airline.' #'.$lega->getFlightNumber().'<br/>'.$lega->getDeparture('g:i A')?></td>
                  <td class="cell-2"><?php echo $lega->getCommDest();?></td>
                  <td class="cell-1"><?php echo $airline.' #'.$lega->getFlightNumber().'<br/>'.$lega->getArrival('g:i A')?></td>
                  <td align="center">
                    <!--<a href="<?php //echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                    <a href="<?php //echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>-->
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?>
                      <a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a>                      
                  <?php endif?>
                  <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                      <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                      <?php echo link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                  <?php endif?>
                  </td>
                </tr>
        <?php endif;?>
          </tbody>
        </table>
      </div>
        
      <?php endforeach?>
       
       <div class="holder" id="activity_holder" style="display:none">
         <h4>Facility Information</h4>
          <table class="table-head">
            <tbody>
              <tr>
                <td class="cell-1">Passenger Name</td>
                <td class="cell-2">Facility</td>
                <td class="cell-3">Facility City</td>
                <td class="cell-4">Facility State</td>
                <td class="cell-5">Phone</td>
                <td class="cell-6">Phone Comment</td>
                <td>Action</td>
              </tr>
            </tbody>
          </table>
          <table>
            <tbody>
              <tr>
                <td class="cell-1"><?php echo $passenger->getPerson()->getName();?></td>
                <td class="cell-2"><?php echo $passenger->getFacilityName()?></td>
                <td class="cell-3"><?php echo $passenger->getFacilityCity()?></td>
                <td class="cell-4"><?php echo $passenger->getFacilityState()?></td>
                <td class="cell-5"><?php echo $passenger->getFacilityPhone();?></td>
                <td class="cell-6"><?php echo $passenger->getFacilityPhoneComment()?></td>
                <td>
                  <?php if ($sf_user->hasCredential(array('Administrator', 'Staff'), false)) { ?>
                      <a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                      <a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>

      </div>

      <div id="addleg_holder" style="display:none; min-height: 28px;">
        <div style="min-width: 400px; margin-left: 100px; margin-top: 6px;">
        <label>Transportation Type*:</label>
        <select class="tab-switcher" id="types" onchange="transportChange()">
              <option value="">Select</option>
              <option <?php if($sf_params->get('transportation') == 'air_mission') echo 'selected' ?> value="air_mission">Air Mission</option>
              <option <?php if($sf_params->get('transportation') == 'ground_mission') echo 'selected' ?> value="ground_mission">Ground Mission</option>
              <option <?php if($sf_params->get('transportation') == 'commercial_mission') echo 'selected' ?> value="commercial_mission">Commercial Mission</option>
            </select>
            <div id="message_display"></div>
        </div>
            <div id="air_mission_tab" class="air-mission" style="display:none; margin-left: 50px; margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="air_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <table>
              <tr>
                <td><h3>Air Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancel(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>
            
            <hr/>
            <?php if ($sf_params->get('transportation') == 'air_mission' && isset($errors) && count($errors)) {?>
                <ul class="error_list">
                <?php foreach ($errors as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
            <div class="destination">
              <label for="form-item-5">Origin Airport:</label>
              <input type="text" class="text" id="ident_from"/>

              <label for="form-item-6">Destination Airport:</label>
              <input type="text" class="text" id="ident_to"/>

              <label id="ident_distance"></label>

              <a class="btn-save-leg" href="#" onclick="save_leg(); return false;">
                <span>Save This Leg</span>
              </a>
            </div>
            <div style="color:red;" id="air_notification"></div>

            <div class="wrap">
              <table id="legs">
                <tr>
                  <th>Orgin Airport</th>
                  <th>Destination Airport</th>
                  <th></th>
                </tr>
              </table>
            </div>

            <div class="mission-map">
              <div id="map_canvas" style="width:573px;height:300px;"></div>
            </div>

            <input type="hidden" id="or_airport" name="or_airport" value=""/>
            <input type="hidden" id="de_airport" name="de_airport" value=""/>

            <input class="hide" type="submit" value="submit" id="air_form_submit"/>
            <br clear="all"/>
            <a class="btn-action" href="#" onclick="jQuery('#air_mission_tab form').submit()" style="float: right">
                    <span>Save</span>
                    <strong></strong>
                    </a>
          </div><!-- End Frame-->
        </form>
      </div><!-- End Air Mission Tab-->
            <div id="ground_mission_tab" class="air-mission" style="display: none; margin-left: 50px; margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="ground_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">

            <table>
              <tr>
                <td><h3>Ground Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancel(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>

            <hr/>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'ground_mission' && isset($errors) && count($errors)) {?>
                <ul class="error_list">
                <?php foreach ($errors as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder">
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Origin</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo select_tag('ground_origin', options_for_select($ground_addr_sel, $sf_params->get('ground_origin'), array('include_custom' => '-- select --')))?>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Destination</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo select_tag('ground_destination', options_for_select($ground_addr_sel, $sf_params->get('ground_destination'), array('include_custom' => '-- select --')))?>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <!--<a class="btn-action" href="#" onclick="jQuery('#ground_mission_tab form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>-->
                <h4>Please select the origin and destination above,
                or enter them on the fields below.
                </h4>
                <hr>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Origin</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <input type="text" name="orginset" style="width: 220px;" value="<?php echo $orginset;?>">
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Destination</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <input type="text" name="destset" style="width: 220px;" value="<?php echo $destset;?>">
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <a class="btn-action" href="#" onclick="jQuery('#ground_mission_tab form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>
              </div>

              <div class="holder">
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Patient's Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $person->getAddress1()?>
                      <?php echo $person->getAddress2()?>
                      <br/>
                      <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Lodging Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getLodgingPhone().' '.$passenger->getLodgingName()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Facility Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getFacilityName().' '.$passenger->getFacilityPhone()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Airport Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getFacilityName()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
              </div>
            </div><!-- air-mission-info -->
            <input class="hide" type="submit" value="submit" id="ground_form_submit"/>
          </div><!-- frame -->
        </form>
      </div>
      <div id="commercial_mission_tab" class="air-mission" style="display: none; margin-left: 50px;margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post" id="commercial_form">
          <input type="hidden" name="transportation" value="commercial_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame" style="width: 630px;">

            <table>
              <tr>
                <td><h3>Commercial Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancel(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>

            <hr/>
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
                  <label for="form-item-1">Mission Date*:</label>
                  <?php echo $date_widget->render('mission_date', $sf_params->get('mission_date'), array('id' => 'comm_date'));?>
                </div>
                <div class="wrap">
                  <label>Flight Time</label>
                  <?php echo $time_widget->render('flight_time', $sf_params->get('flight_time'))?>
                </div>
                <div class="wrap">
                  <label for="airline_id">Airline*:</label>
                  <?php echo select_tag('airline_id', objects_for_select($airlines, 'getId', 'getName', $sf_params->get('airline_id'), array('include_custom' => 'Please Select')).'<option value="other">Other</option>')?>
                  
                </div>
                <div class="wrap">                  
                  <label>&nbsp;&nbsp;&nbsp;</label>
                  <input id="airline_custom" class="text" type="text" name="airline_custom" value="<?php echo $sf_params->get('airline_custom')?>"/>
                </div>
                <div class="wrap">
                  <label for="fund_id">Commercial Fund:</label>
                  <?php echo select_tag('fund_id', objects_for_select($funds, 'getId', 'getFundDesc', $sf_params->get('fund_id'), array('include_custom' => 'None')), array('class' => 'select'))?>
                </div>
                <div class="wrap">
                  <label>Confirmation Code:</label>
                  <input class="text" type="text" name="confirm_code" value="<?php echo $sf_params->get('confirm_code')?>"/>
                </div>
                <div class="wrap">
                  <label>Flight Cost:</label>
                  <input class="text" type="text" name="flight_cost" value="<?php echo $sf_params->get('flight_cost')?>"/>
                </div>
              </div>
            </div><!-- air-mission-info -->
            <br clear="all"/>
            <br clear="all"/>
            <h3>Flight Details</h3>
            <hr>
            <table id="comm_flight_details">
              <tr>
                <td>Origin</td>
                <td>Destination</td>
                <td>Flight #</td>
                <td>Departure</td>
                <td>Arrival</td>
                <td></td>
              </tr>
              <tr id="comm_flight_template" class="hide">
                <td><input type="text" name="origin[]" size="10"/></td>
                <td><input type="text" name="destination[]" size="10"/></td>
                <td><input type="text" name="flight_number[]" size="10"/></td>
                <td><?php echo $time_widget->render('departure[]')?></td>
                <td><?php echo $time_widget->render('arrival[]')?></td>
                <td><a href="#" onclick="$(this).parent().parent().remove(); return false;" class="action-remove"></a></td>
              </tr>
            </table>

            <a class="btn-action" onclick="commAddRow(); return false;" href="#"><span>Add Another</span><strong/></a>

            <div class="air-mission-info">
              <div class="holder">
                <div class="wrap">
                  <label for="comm_comment">Special Needs:</label>
                  <textarea id="comm_comment" rows="20" cols="20" name="comment"></textarea>
                </div>
              </div>
            </div>

            <a class="btn-action" href="#" onclick="jQuery('#commercial_mission_tab form').submit()" style="float: right">
                    <span>Save</span>
                    <strong></strong>
                    </a>

          </div><!-- frame -->
        </form>
      </div>
      </div>
            
    </div>
    <br/>
    </div>
  <?php endif;?>


<?php if($mis2):?>
  <div class="mission-requests">
    <?php if($mis2->getStart() == 1){
      $from1 = "Home";
      $to1 = "Treatment";
    }else{
      $from1 = "Treatment";
      $to1 = "Home";
    }

    ?>
    <h3>Mission #2: <?php echo $mis2->getMissionDate('m/d/Y').' - '.' From '.$from1.' to '.$to1?></h3>
    <ul class="mission-tabs">
      <li id="routet" class="" style="margin-top: 10px">
        <span>Route:</span>
      </li>
      <li id="generalt">
        <a href="javascript:getGeneralt()" id="general_infot"><span><img style="margin-top: 8px" src="<?php if($mis2->getStart() == 1){echo url_for('/images/ico-home.gif');}else{echo url_for('/images/ico-hospital.gif');}?>" /></span></a>
      </li>
      <?php foreach($mis2_legs as $mis_leg):?>
      <li id="gtot_<?php echo $mis_leg->getId()?>">
        <a href="javascript:getGroundTot(<?php echo $mis_leg->getId()?>)" id="tot<?php echo $mis_leg->getId()?>">
          <span>
            <?php if($mis_leg->getTransportation()== 'ground_mission'):?>
              <img style="margin-top: 8px" src="<?php echo url_for('/images/ico-car-active.gif');?>" />
            <?php else:?>
              <?php echo $mis_leg->getPrefix();?>
            <?php endif;?>
          </span>
        </a>
      </li>
      <?php endforeach;?>
      <!--<li id="ato">
        <a href="javascript:getAirTo()" id="air_to"><span>Air(to)</span></a>
      </li>
      <li id="afrom">
        <a href="javascript:getAirFrom()" id="air_from"><span>Air(from)</span></a>
      </li>
      <li id="gfrom">
        <a href="javascript:getGroundFrom()" id="ground_from"><span>Ground(from)</span></a>
      </li>-->
      <li id="actt">
        <a href="javascript:getActivityLogt()" id="activityt"><span><img style="margin-top: 8px" src="<?php if($mis2->getStart() == 1){echo url_for('/images/ico-hospital.gif');}else{echo url_for('/images/ico-home.gif');}?>" /></span></a>
      </li>
      <?php if(!$mis2_legs && $mis_legs):?>
      <li id="reverse">
        <a href="<?php echo url_for('itinerary/reverse?miss_id='.$mis->getId().'&mis2_id='.$mis2->getId())?>" id="reverse_leg"><span>Reverse Above</span></a>
      </li>
      <?php elseif(!$mis2_legs && !$mis_legs):?>
      <?php else:?>
      <li id="addlegt">
      <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) {  ?>
        <a href="javascript:getAddlegt()" id="add_legt"><span>Add Leg</span></a>
      <?php } ?>
      </li>
      <?php endif;?>
    </ul>
    <div class="frame">
      <div class="holder" id="mist_comment_info_holder" style="margin-left: 50px">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId().'&com=2')?>" method="post">
        <div class="air-mission-info">
              <div class="holder">
                <div class="wrap">
                  <label for="mist_comment">Comment:</label>
                  <textarea id="mist_comment" rows="20" cols="40" name="mist_comment"><?php echo $mist_comment;?></textarea>
                </div>
                <br clear="all"/>
                <a class="btn-action" href="#" onclick="jQuery('#mist_comment_info_holder form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>
              </div>
        </div>
        </form>
      </div>

      <div class="holder" id="generalt_info_holder" style="display:none">
        <h4>Patient Information</h4>
          <table class="table-head">
            <tbody>
              <tr>
                <td class="cell-1">Passenger Name</td>
                <td class="cell-2">Address1</td>
                <td class="cell-3">Address2</td>
                <td class="cell-4">City / State</td>
                <td class="cell-5">Phone</td>
                <td class="cell-6">Zipcode</td>
                <td class="cell-7">Country</td>
                <td>Action</td>
              </tr>
            </tbody>
          </table>
          <table>
            <tbody>
              <tr>
                <td class="cell-1"><?php echo $passenger->getPerson()->getName();?></td>
                <td class="cell-2"><?php echo $passenger->getPerson()->getAddress1()?></td>
                <td class="cell-3"><?php echo $passenger->getPerson()->getAddress2()?></td>
                <td class="cell-4"><?php echo $passenger->getPerson()->getCity().' / '.$passenger->getPerson()->getState()?></td>
                <td class="cell-5"><?php echo $passenger->getPerson()->getDayPhone();?></td>
                <td class="cell-6"><?php echo $passenger->getPerson()->getZipcode()?></td>
                <td class="cell-7"><?php echo $passenger->getPerson()->getCountry()?></td>
                <td>
                <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) {?>
                  <a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                  <a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>
                <?php }?>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <?php foreach($mis2_legs as $lega):?>
      <div class="holder" id="legt_<?php echo $lega->getId()?>_holder" style="display:none">
        <h4><?php echo $mission2->getId().'-'.$lega->getPrefix()?></h4>
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
        <?php if($lega->getTransportation()== 'ground_mission'):?>
          <!--<table class="table-head">
              <tbody>
                <tr>
                  <td class="cell-1">Leg Number</td>
                  <td colspan="2" class="cell-9">Origin</td>
                  <td colspan="2" class="cell-9">Destination</td>
                  <td>Action</td>
                </tr>
              </tbody>
            </table>-->
                <?php
                  $ground_origin = $lega->getGroundOrigin();
                  $ground_dest   = $lega->getGroundDestination();
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_origin])){echo $ground_addr_sel[$ground_origin];}else{echo $ground_origin;}?></td>
                  <td class="cell-1"><?php if(isset($ground_addresses[$ground_origin])){echo $ground_addresses[$ground_origin];}?></td>
                  <td class="cell-2"><?php if(isset($ground_addr_sel[$ground_dest])){echo $ground_addr_sel[$ground_dest];}else{echo $ground_dest;}?></td>
                  <td class="cell-1"><?php if(isset($ground_addresses[$ground_dest])){echo $ground_addresses[$ground_dest];}?></td>
                  <td align="center">
                    <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a><?php endif?>
                  <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                      <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                    <?php echo link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                  <?php endif?>
                  </td>
                </tr>
        <?php elseif($lega->getTransportation() == 'air_mission'):
                $from_airport = AirportPeer::retrieveByPK($lega->getFromAirportId());
                $to_airport = AirportPeer::retrieveByPK($lega->getToAirportId());
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php echo $from_airport->getIdent()?></td>
                  <td class="cell-1"><?php echo $from_airport->getCity() .' , '.$from_airport->getState()?></td>
                  <td class="cell-2"><?php echo $to_airport->getIdent();?></td>
                  <td class="cell-1"><?php echo $to_airport->getCity() .' , '.$to_airport->getState()?></td>
                  <td align="center">
                    <!--<a href="<?php //echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                    <a href="<?php //echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>-->
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a><?php endif?>
                  <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                      <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                      <?php  echo  link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                  <?php endif?>
                  </td>
                </tr>
        <?php elseif($lega->getTransportation() == 'commercial_mission'):
                if ($lega->getAirline()) $airline = $lega->getAirline()->getName(); else $airline = '';
                ?>
                <tr>
                  <td class="cell-1"><?php echo $lega->getLegNumber();?></td>
                  <td class="cell-2"><?php echo $lega->getCommOrigin()?></td>
                  <td class="cell-1"><?php echo $airline.' #'.$lega->getFlightNumber().'<br/>'.$lega->getDeparture('g:i A')?></td>
                  <td class="cell-2"><?php echo $lega->getCommDest();?></td>
                  <td class="cell-1"><?php echo $airline.' #'.$lega->getFlightNumber().'<br/>'.$lega->getArrival('g:i A')?></td>
                  <td align="center">
                    <!--<a href="<?php //echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                    <a href="<?php //echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>-->
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$lega->getId())?>" class="link-edit">edit</a><?php endif?>
                  <?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
                    <!--a href="<?php //echo url_for('@leg_delete?id='.$lega->getId())?>" class="action-remove">remove</a -->
                  <?php  echo  link_to('remove', url_for('@leg_delete?id='.$lega->getId()), array('class' => 'action-remove','confirm' => 'Are you sure?', 'absolute' => true));?>
                  <?php endif?>
                  </td>
                </tr>
        <?php endif;?>
          </tbody>
        </table>
      </div>
      <?php endforeach?>
       <div class="holder" id="activityt_holder" style="display:none">
         <h4>Facility Information</h4>
          <table class="table-head">
            <tbody>
              <tr>
                <td class="cell-1">Passenger Name</td>
                <td class="cell-2">Facility</td>
                <td class="cell-3">Facility City</td>
                <td class="cell-4">Facility State</td>
                <td class="cell-5">Phone</td>
                <td class="cell-6">Phone Comment</td>
                <td>Action</td>
              </tr>
            </tbody>
          </table>
          <table>
            <tbody>
              <tr>
                <td class="cell-1"><?php echo $passenger->getPerson()->getName();?></td>
                <td class="cell-2"><?php echo $passenger->getFacilityName()?></td>
                <td class="cell-3"><?php echo $passenger->getFacilityCity()?></td>
                <td class="cell-4"><?php echo $passenger->getFacilityState()?></td>
                <td class="cell-5"><?php echo $passenger->getFacilityPhone();?></td>
                <td class="cell-6"><?php echo $passenger->getFacilityPhoneComment()?></td>
                <td>
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)){?>
                      <a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a>
                      <a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a>
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <div id="addlegt_holder" style="display:none; min-height: 28px;">
        <div style="min-width: 400px; margin-left: 100px; margin-top: 6px;">
        <label>Transportation Type*:</label>
        <select class="tab-switcher" id="typest" onchange="transportChanget()">
              <option value="">Select</option>
              <option <?php if($sf_params->get('transportation') == 'air_mission') echo 'selected' ?> value="air_mission">Air Mission</option>
              <option <?php if($sf_params->get('transportation') == 'ground_mission') echo 'selected' ?> value="ground_mission">Ground Mission</option>
              <option <?php if($sf_params->get('transportation') == 'commercial_mission') echo 'selected' ?> value="commercial_mission">Commercial Mission</option>
            </select>
            <div id="message_display"></div>
        </div>
            <div id="airt_mission_tab" class="air-mission" style="display:none; margin-left: 50px; margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="air_mission"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <table>
              <tr>
                <td><h3>Air Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancelt(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>
            <hr/>
            <?php if ($sf_params->get('transportation') == 'air_mission' && isset($errors2) && count($errors2)) {?>
                <ul class="error_list">
                <?php foreach ($errors2 as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
            <div class="destination">
              <label for="form-item-5">Origin Airport:</label>
              <input type="text" class="text" id="identt_from"/>
              <label for="form-item-6">Destination Airport:</label>
              <input type="text" class="text" id="identt_to"/>
              <label id="ident_distance"></label>
              <a class="btn-save-leg" href="#" onclick="save_legt(); return false;">
                <span>Save This Leg</span>
              </a>
            </div>
            <div style="color:red;" id="airt_notification"></div>
            <div class="wrap">
              <table id="legst">
                <tr>
                  <th>Orgin Airport</th>
                  <th>Destination Airport</th>
                  <th></th>
                </tr>
              </table>
            </div>
            <div class="mission-map">
              <div id="mapt_canvas" style="width:573px;height:300px;"></div>
            </div>
            <input type="hidden" id="or_airport" name="or_airport" value=""/>
            <input type="hidden" id="de_airport" name="de_airport" value=""/>
            <input type="hidden" id="misstsave" name="misstsave" value="1"/>
            <input class="hide" type="submit" value="submit" id="airt_form_submit"/>
            <br clear="all"/>
            <a class="btn-action" href="#" onclick="jQuery('#airt_mission_tab form').submit()" style="float: right">
                    <span>Save</span>
                    <strong></strong>
                    </a>
          </div><!-- End Frame-->
        </form>
      </div><!-- End Air Mission Tab-->
            <div id="groundt_mission_tab" class="air-mission" style="display: none; margin-left: 50px; margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post">
          <input type="hidden" name="transportation" value="ground_mission"/>
          <input type="hidden" id="misstsave" name="misstsave" value="1"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame">
            <table>
              <tr>
                <td><h3>Ground Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancelt(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>
            <hr/>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'ground_mission' && isset($errors2) && count($errors2)) {?>
                <ul class="error_list">
                <?php foreach ($errors2 as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder">
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Origin</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo select_tag('groundt_origin', options_for_select($ground_addr_sel, $sf_params->get('groundt_origin'), array('include_custom' => '-- select --')))?>
                    </td>
                  </tr>
                </table>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Destination</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo select_tag('groundt_destination', options_for_select($ground_addr_sel, $sf_params->get('groundt_destination'), array('include_custom' => '-- select --')))?>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <!--<a class="btn-action" href="#" onclick="jQuery('#ground_mission_tab form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>-->
                <h4>Please select the origin and destination above,
                or enter them on the fields below.
                </h4>
                <hr>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Origin</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <input type="text" name="orgintset" style="width: 220px;" value="<?php echo $orgintset;?>">
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Set Destination</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <input type="text" name="desttset" style="width: 220px;" value="<?php echo $desttset;?>">
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                
                <a class="btn-action" href="#" onclick="jQuery('#groundt_mission_tab form').submit()">
                    <span>Save</span>
                    <strong></strong>
                    </a>
              </div>

              <div class="holder">
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Patient's Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $person->getAddress1()?>
                      <?php echo $person->getAddress2()?>
                      <br/>
                      <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Lodging Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getLodgingPhone().' '.$passenger->getLodgingName()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Facility Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getFacilityName().' '.$passenger->getFacilityPhone()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
                <br clear="all"/>
                <table class="clear">
                  <tr>
                    <td>
                      <h3>Airport Address</h3>
                      <hr>
                    </td>
                  </tr>
                  <tr
                    <td>
                      <?php echo $passenger->getFacilityName()?><br/>
                      <?php echo $itinerary->getDestCity().', '.$itinerary->getDestState()?>
                      <br clear="all"/>
                    </td>
                  </tr>
                </table>
              </div>
            </div><!-- air-mission-info -->
            <input class="hide" type="submit" value="submit" id="groundt_form_submit"/>
          </div><!-- frame -->
        </form>
      </div>
      <div id="commercialt_mission_tab" class="air-mission" style="display: none; margin-left: 50px;margin-bottom: 10px;">
        <form action="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" method="post" id="commercial_form">
          <input type="hidden" name="transportation" value="commercial_mission"/>
          <input type="hidden" id="misstsave" name="misstsave" value="1"/>
          <?php if(isset($group_camp_id)):?><input type="hidden" name="add_passengers" value="<?php echo $group_camp_id?>"/><?php endif?>
          <div class="frame" style="width: 630px;">

            <table>
              <tr>
                <td><h3>Commercial Mission Detail</h3></td>
                <td>
                    <a class="btn-save-leg" href="#" onclick="cancelt(); return false;">
                    <span>Cancel</span>
                    </a>
                </td>
              </tr>
            </table>

            <hr/>
            <div class="air-mission-info">
              <?php if ($sf_params->get('transportation') == 'commercial_mission' && isset($errors2) && count($errors2)) {?>
                <ul class="error_list">
                <?php foreach ($errors2 as $error) {?>
                  <li><?php echo $error?></li>
                <?php }?>
                </ul>
              <?php }?>
              <div class="holder" style="width:262px;">
                <div class="wrap">
                  <label for="form-item-1">Mission Date*:</label>
                  <?php echo $date_widget->render('mission_date', $sf_params->get('mission_date'), array('id' => 'comm_date'));?>
                </div>
                <div class="wrap">
                  <label>Flight Time</label>
                  <?php echo $time_widget->render('flight_time', $sf_params->get('flight_time'))?>
                </div>
                <div class="wrap">
                  <label for="airline_id">Airline*:</label>
                  <?php echo select_tag('airline_id', objects_for_select($airlines, 'getId', 'getName', $sf_params->get('airline_id'), array('include_custom' => 'Please Select')).'<option value="other">Other</option>')?>
                 
                </div>
                <div class="wrap">
                  <label>&nbsp;&nbsp;</label>
                  <input id="airline_custom" class="text" type="text" name="airline_custom" value="<?php echo $sf_params->get('airline_custom')?>"/>
                </div>
                <div class="wrap">
                  <label for="fund_id">Commercial Fund:</label>
                  <?php echo select_tag('fund_id', objects_for_select($funds, 'getId', 'getFundDesc', $sf_params->get('fund_id'), array('include_custom' => 'None')), array('class' => 'select'))?>
                </div>
                <div class="wrap">
                  <label>Confirmation Code:</label>
                  <input class="text" type="text" name="confirm_code" value="<?php echo $sf_params->get('confirm_code')?>"/>
                </div>
                <div class="wrap">
                  <label>Flight Cost:</label>
                  <input class="text" type="text" name="flight_cost" value="<?php echo $sf_params->get('flight_cost')?>"/>
                </div>
              </div>
            </div><!-- air-mission-info -->
            <br clear="all"/>
            <br clear="all"/>
            <h3>Flight Details</h3>
            <hr>
            <table id="commt_flight_details">
              <tr>
                <td>Origin</td>
                <td>Destination</td>
                <td>Flight #</td>
                <td>Departure</td>
                <td>Arrival</td>
                <td></td>
              </tr>
              <tr id="commt_flight_template" class="hide">
                <td><input type="text" name="origin[]" size="10"/></td>
                <td><input type="text" name="destination[]" size="10"/></td>
                <td><input type="text" name="flight_number[]" size="10"/></td>
                <td><?php echo $time_widget->render('departure')?></td>
                <td><?php echo $time_widget->render('arrival')?></td>
                <td><a href="#" onclick="$(this).parent().parent().remove(); return false;" class="action-remove"></a></td>
              </tr>
            </table>

            <a class="btn-action" onclick="commAddRowt(); return false;" href="#"><span>Add Another</span><strong/></a>

            <div class="air-mission-info">
              <div class="holder">
                <div class="wrap">
                  <label for="comm_comment">Special Needs:</label>
                  <textarea id="comm_comment" rows="20" cols="20" name="comment"></textarea>
                </div>
              </div>
            </div>

            <a class="btn-action" href="#" onclick="jQuery('#commercialt_mission_tab form').submit()" style="float: right">
                    <span>Save</span>
                    <strong></strong>
                    </a>

          </div><!-- frame -->
        </form>
      </div>
      </div>
    </div>
    <br/>
    </div>
  <?php endif;?>
  <div><a href="<?php echo url_for('@itinerary_copy_form?id='.$itinerary->getId())?>">Copy This Itinerary</a></div>
<script type="text/javascript">
  //<![CDATA[
  $(document).ready(function() {
  });
  function getGeneral(){

    <?php if(isset($mis_legs)) { foreach($mis_legs as $tleg):?>
      $('#gto_<?php echo $tleg->getId()?>').attr('class','');
      $('#leg_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach; } ?>
    if($('#act').attr('class') == 'active'){
      $('#act').attr('class','');
    }
    //
    if($('#general').attr('class') == ''){
      $('#general').attr('class','active');
    }

    if($('#activity_holder').css('display') == 'block'){
      $('#activity_holder').css('display','none');
    }
    $('#mis_comment_info_holder').css('display','none');

    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //
    if($('#general_info_holder').css('display') == 'none'){
      $('#general_info_holder').css('display','block');
    }

    if($('#addleg_holder').css('display') == 'block'){
      $('#addleg_holder').css('display','none');
    }
    if($('#addleg').attr('class') == 'active'){
      $('#addleg').attr('class','');
    }
  }

  function getGroundTo(id){
    <?php if(isset($mis_legs)) { foreach($mis_legs as $tleg):?>
      $('#gto_<?php echo $tleg->getId()?>').attr('class','');
      $('#leg_<?php echo $tleg->getId()?>_holder').css('display','none');
    
    <?php endforeach; } ?>

    if($('#gto_'+id).attr('class') == ''){
        $('#gto_'+id).attr('class','active');
      }
      
    if($('#act').attr('class') == 'active'){
      $('#act').attr('class','');
    }
    if($('#general').attr('class') == 'active'){
      //alert("asdf");
      $('#general').attr('class','');
    }
    //
    if($('#addleg').attr('class') == 'active'){
      $('#addleg').attr('class','');
    }
    $('#mis_comment_info_holder').css('display','none');
    if($('#general_info_holder').css('display') == 'block'){
      $('#general_info_holder').css('display','none');
    }
    if($('#activity_holder').css('display') == 'block'){
      $('#activity_holder').css('display','none');
    }
    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //


    if($('#leg_'+id+'_holder').css('display') == 'none'){
      $('#leg_'+id+'_holder').css('display','block');
    }

    if($('#addleg_holder').css('display') == 'block'){
      $('#addleg_holder').css('display','none');
    }
    
  }
	
  function getActivityLog(){
    <?php if(isset($mis_legs)) { foreach($mis_legs as $tleg):?>
      $('#gto_<?php echo $tleg->getId()?>').attr('class','');
      $('#leg_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach; } ?>
    if($('#general').attr('class') == 'active'){
      $('#general').attr('class','');
    }
    //
    if($('#act').attr('class') == ''){
      $('#act').attr('class','active');
    }
    if($('#general_info_holder').css('display') == 'block'){
      $('#general_info_holder').css('display','none');
    }
    if($('#addleg_holder').css('display') == 'block'){
      $('#addleg_holder').css('display','none');
    }

    $('#mis_comment_info_holder').css('display','none');
    if($('#addleg').attr('class') == 'active'){
      $('#addleg').attr('class','');
    }
    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //
    if($('#activity_holder').css('display') == 'none'){
      $('#activity_holder').css('display','block');
    }
  }

  function getAddleg(){
    <?php if(isset($mis_legs)) { foreach($mis_legs as $tleg):?>
      $('#gto_<?php echo $tleg->getId()?>').attr('class','');
      $('#leg_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach; } ?>
    if($('#general').attr('class') == 'active'){
      $('#general').attr('class','');
    }
    //
    if($('#act').attr('class') == 'active'){
      $('#act').attr('class','');
    }
    if($('#general_info_holder').css('display') == 'block'){
      $('#general_info_holder').css('display','none');
    }
    $('#mis_comment_info_holder').css('display','none');
    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //
    if($('#activity_holder').css('display') == 'block'){
      $('#activity_holder').css('display','none');
    }
    if($('#addleg_holder').css('display') == 'none'){
      $('#addleg_holder').css('display','block');
    }
    if($('#addleg').attr('class') == ''){
      $('#addleg').attr('class','active');
    }
  }

  function getDetail(id){
    if($('#detail'+id).attr('checked')){
      if($('#air_detail'+id).css('display','none')){
        $('#air_detail'+id).css('display','block');
      }
    }else{
      if($('#air_detail'+id).css('display','block')){
        $('#air_detail'+id).css('display','none');
      }
    }
  }

function gaAirportClick(marker)
{
  var $from = $('#ident_from');
  var $to = $('#ident_to');

  if ($from.val() == '') {
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
  }else if ($to.val() == '') {
    $to.val(marker.ident);
    $('#ident_distance').html(gCalculateDistance($from.data('coord'), marker.getLatLng()) + 'miles');
  }else{
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
    $to.val('');
  }
}

function gahAirportClick(marker)
{
  var $from = $('#identt_from');
  var $to = $('#identt_to');

  if ($from.val() == '') {
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
  }else if ($to.val() == '') {
    $to.val(marker.ident);
    $('#ident_distance').html(gCalculateDistance($from.data('coord'), marker.getLatLng()) + 'miles');
  }else{
    $from.val(marker.ident);
    $from.data('coord', marker.getLatLng());
    $to.val('');
  }
}

  function cancel(){
        jQuery('#air_mission_tab').css('display', 'none');
        jQuery('#ground_mission_tab').css('display', 'none');
        jQuery('#commercial_mission_tab').css('display', 'none');
  }



function gaMarker(lat, lng, title, ident)
{
  var marker;
  marker = new GMarker(new GLatLng(lat, lng), { title: title});
  marker.ident = ident;
  GEvent.addListener(marker, 'click', function () { gaAirportClick(marker); });
  return marker;
}

function gahMarker(lat, lng, title, ident)
{
  var marker;
  marker = new GMarker(new GLatLng(lat, lng), { title: title});
  marker.ident = ident;
  GEvent.addListener(marker, 'click', function () { gahAirportClick(marker); });
  return marker;
}
function gInitialize()
{
  if (GBrowserIsCompatible()) {
    var map1 = null, map2 = null;
    var markers1 = [], markers2 = [];

    map1 = new GMap2(document.getElementById("map_canvas"), { size: new GSize(573, 300) });
    map1.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map1.setMapType(G_HYBRID_MAP);
    map1.addControl(new GSmallMapControl());
    map1.addControl(new GMapTypeControl());
    <?php if($mis2):?>
    map2 = new GMap2(document.getElementById("mapt_canvas"), { size: new GSize(573, 300) });
    map2.setCenter(new GLatLng(36.080055,-115.15225), 5);
    map2.setMapType(G_HYBRID_MAP);
    map2.addControl(new GSmallMapControl());
    map2.addControl(new GMapTypeControl());
    <?php endif;?>

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
          GEvent.addListener(tmpMarker, 'click', function () { gaAirportClick(tmpMarker); });
          markers1.push(tmpMarker);
       });
       var markerCluster1 = new MarkerClusterer(map1, markers1);
<?php if($mis2):?>
      jQuery.each(mapsData, function(key, value){
          var tmpMarker;
          tmpMarker = new GMarker(new GLatLng(value.lat, value.lng), { title: value.title});
          tmpMarker.ident = value.ident;
          GEvent.addListener(tmpMarker, 'click', function () { gahAirportClick(tmpMarker); });
          markers2.push(tmpMarker);
       });
       var markerCluster2 = new MarkerClusterer(map2, markers2);
<?php endif?>
  }
}

$(function() {
  gInitialize(); // google map
  window.onbeforeunload = GUnload; // google map

  $("#types").change(function(){
    $('#air_mission_tab, #ground_mission_tab, #commercial_mission_tab').hide();
    $('#' + $(this).val() + '_tab').show();
  });

  $('#types').change();

  $('#airline_id').change(function(){
    if ($(this).val() == 'other') {
      $('#airline_custom').focus();
    }
  });
  commAddRow();
  <?php if($mis2):?>
  commAddRowt();
  <?php endif;?>

  <?php
  if ($sf_params->get('transportation') == 'air_mission' && isset($origin_idents) && isset($dest_idents)) {
    if (count($sf_data->getRaw('origin_idents')) && count($sf_data->getRaw('dest_idents'))) {
      $idents = array_combine($sf_data->getRaw('origin_idents'), $sf_data->getRaw('dest_idents'));
      foreach ($idents as $src => $dst) {?>
      $('#ident_from').val('<?php echo $src?>');
      $('#ident_to').val('<?php echo $dst?>');
      save_leg();
      <?php }
    }
  }
  ?>
});

  function commAddRow()
  {
    var $tmp=$('#comm_flight_template');
    $('#comm_flight_details').append('<tr>'+$tmp.removeClass('hide').html()+'</tr>');
    $tmp.addClass('hide');
  }


  function save_leg()
{
  var from = $('#ident_from').val();
  var to = $('#ident_to').val();

  // check empty
  if (from == '' || to == '') {
    $('#air_notification').html('Please fill both origin and destination');
    return;
  }

  var duplicate = false;

  // check duplicate
  $('#legs tr').each(function () {
    var children = $(this).children('td').children('input');
    if (children.length) {
      if (children[0].value == from && children[1].value == to) {
        duplicate = true;
        return false; // stop loop
      }
    }
  });

  if (duplicate) {
    $('#air_notification').html('Origin and destination is already in the list');
    return;
  }

  html = '<td>'+from+'<input type="hidden" name="origin_idents[]" value="'+from+'"/>'+'</td>';
  html += '<td>'+to+'<input type="hidden" name="destination_idents[]" value="'+to+'"/>'+'</td>';
  html += '<td><a class="action-remove" href="#" onclick="$(this).parent().parent().remove();return false;">remove</a></td>';

  $('#legs').append('<tr>'+html+'</tr>');
}



  function transportChange(){
    if(jQuery('#types').val() == 'air_mission'){
      jQuery('#ground_mission_tab').css('display', 'none');
      jQuery('#commercial_mission_tab').css('display', 'none');
      jQuery('#air_mission_tab').css('display', 'block');
    }else{
      if(jQuery('#types').val() == 'ground_mission'){
        jQuery('#air_mission_tab').css('display', 'none');
        jQuery('#commercial_mission_tab').css('display', 'none');
        jQuery('#ground_mission_tab').css('display', 'block');
    }else{
      if(jQuery('#types').val() == 'commercial_mission'){
        jQuery('#air_mission_tab').css('display', 'none');
        jQuery('#ground_mission_tab').css('display', 'none');
        jQuery('#commercial_mission_tab').css('display', 'block');
      }else{
        jQuery('#air_mission_tab').css('display', 'none');
        jQuery('#ground_mission_tab').css('display', 'none');
        jQuery('#commercial_mission_tab').css('display', 'none');
      }
    }
  }
  }
 
  //]]>
  </script>

<?php if($mis2):?>
<script type="text/javascript">
  function cancelt(){
        jQuery('#airt_mission_tab').css('display', 'none');
        jQuery('#groundt_mission_tab').css('display', 'none');
        jQuery('#commercialt_mission_tab').css('display', 'none');
  }

 function commAddRowt()
  {
    var $tmp=$('#commt_flight_template');
    $('#commt_flight_details').append('<tr>'+$tmp.removeClass('hide').html()+'</tr>');
    $tmp.addClass('hide');
  }

function save_legt()
{
  var fromt = $('#identt_from').val();
  var tot = $('#identt_to').val();

  // check empty
  if (fromt == '' || tot == '') {
    $('#airt_notification').html('Please fill both origin and destination');
    return;
  }

  var duplicatet = false;

  // check duplicate
  $('#legst tr').each(function () {
    var children = $(this).children('td').children('input');
    if (children.length) {
      if (children[0].value == fromt && children[1].value == tot) {
        duplicatet = true;
        return false; // stop loop
      }
    }
  });

  if (duplicatet) {
    $('#airt_notification').html('Origin and destination is already in the list');
    return;
  }

  html = '<td>'+fromt+'<input type="hidden" name="origint_idents[]" value="'+fromt+'"/>'+'</td>';
  html += '<td>'+tot+'<input type="hidden" name="destinationt_idents[]" value="'+tot+'"/>'+'</td>';
  html += '<td><a class="action-remove" href="#" onclick="$(this).parent().parent().remove();return false;">remove</a></td>';

  $('#legst').append('<tr>'+html+'</tr>');
}

   function transportChanget(){
    if(jQuery('#typest').val() == 'air_mission'){
      jQuery('#groundt_mission_tab').css('display', 'none');
      jQuery('#commercialt_mission_tab').css('display', 'none');
      jQuery('#airt_mission_tab').css('display', 'block');
    }else{
      if(jQuery('#typest').val() == 'ground_mission'){
        jQuery('#airt_mission_tab').css('display', 'none');
        jQuery('#commercialt_mission_tab').css('display', 'none');
        jQuery('#groundt_mission_tab').css('display', 'block');
    }else{
      if(jQuery('#typest').val() == 'commercial_mission'){
        jQuery('#airt_mission_tab').css('display', 'none');
        jQuery('#groundt_mission_tab').css('display', 'none');
        jQuery('#commercialt_mission_tab').css('display', 'block');
      }else{
        jQuery('#airt_mission_tab').css('display', 'none');
        jQuery('#groundt_mission_tab').css('display', 'none');
        jQuery('#commercialt_mission_tab').css('display', 'none');
      }
    }
  }
  }
 function getGeneralt(){

    <?php foreach($mis2_legs as $tleg):?>
      $('#gtot_<?php echo $tleg->getId()?>').attr('class','');
      $('#legt_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach;?>
    if($('#actt').attr('class') == 'active'){
      $('#actt').attr('class','');
    }
    //
    if($('#generalt').attr('class') == ''){
      $('#generalt').attr('class','active');
    }

    if($('#activityt_holder').css('display') == 'block'){
      $('#activityt_holder').css('display','none');
    }
    $('#mist_comment_info_holder').css('display','none');

    //if($('#air_detail').css('display') == 'block'){
    //$('#air_detail').css('display','none');
    //}
    //
    if($('#generalt_info_holder').css('display') == 'none'){
      $('#generalt_info_holder').css('display','block');
    }

    if($('#addlegt_holder').css('display') == 'block'){
      $('#addlegt_holder').css('display','none');
    }
    if($('#addlegt').attr('class') == 'active'){
      $('#addlegt').attr('class','');
    }
  }

  function getGroundTot(id){
    <?php foreach($mis2_legs as $tleg):?>
      $('#gtot_<?php echo $tleg->getId()?>').attr('class','');
      $('#legt_<?php echo $tleg->getId()?>_holder').css('display','none');

    <?php endforeach;?>

    if($('#gtot_'+id).attr('class') == ''){
        $('#gtot_'+id).attr('class','active');
      }

    if($('#actt').attr('class') == 'active'){
      $('#actt').attr('class','');
    }
    if($('#generalt').attr('class') == 'active'){
      //alert("asdf");
      $('#generalt').attr('class','');
    }
    //
    if($('#addlegt').attr('class') == 'active'){
      $('#addlegt').attr('class','');
    }
    $('#mist_comment_info_holder').css('display','none');
    if($('#generalt_info_holder').css('display') == 'block'){
      $('#generalt_info_holder').css('display','none');
    }
    if($('#activityt_holder').css('display') == 'block'){
      $('#activityt_holder').css('display','none');
    }
    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //

    if($('#legt_'+id+'_holder').css('display') == 'none'){
      $('#legt_'+id+'_holder').css('display','block');
    }

    if($('#addlegt_holder').css('display') == 'block'){
      $('#addlegt_holder').css('display','none');
    }
  }

  function getActivityLogt(){
    <?php foreach($mis2_legs as $tleg):?>
      $('#gtot_<?php echo $tleg->getId()?>').attr('class','');
      $('#legt_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach;?>
    if($('#generalt').attr('class') == 'active'){
      $('#generalt').attr('class','');
    }
    //
    if($('#actt').attr('class') == ''){
      $('#actt').attr('class','active');
    }
    if($('#generalt_info_holder').css('display') == 'block'){
      $('#generalt_info_holder').css('display','none');
    }
    if($('#addlegt_holder').css('display') == 'block'){
      $('#addlegt_holder').css('display','none');
    }

    $('#mist_comment_info_holder').css('display','none');
    if($('#addlegt').attr('class') == 'active'){
      $('#addlegt').attr('class','');
    }
    //    if($('#air_detail').css('display') == 'block'){
    //      $('#air_detail').css('display','none');
    //    }
    //
    if($('#activityt_holder').css('display') == 'none'){
      $('#activityt_holder').css('display','block');
    }
  }

  function getAddlegt(){
    <?php foreach($mis2_legs as $tleg):?>
      $('#gtot_<?php echo $tleg->getId()?>').attr('class','');
      $('#legt_<?php echo $tleg->getId()?>_holder').css('display','none');
    <?php endforeach;?>
    if($('#generalt').attr('class') == 'active'){
      $('#generalt').attr('class','');
    }
    //
    if($('#actt').attr('class') == 'active'){
      $('#actt').attr('class','');
    }
    if($('#generalt_info_holder').css('display') == 'block'){
      $('#generalt_info_holder').css('display','none');
    }
    $('#mist_comment_info_holder').css('display','none');
    //if($('#air_detail').css('display') == 'block'){
    //$('#air_detail').css('display','none');
    //}
    //
    if($('#activityt_holder').css('display') == 'block'){
      $('#activityt_holder').css('display','none');
    }
    if($('#addlegt_holder').css('display') == 'none'){
      $('#addlegt_holder').css('display','block');
    }
    if($('#addlegt').attr('class') == ''){
      $('#addlegt').attr('class','active');
    }
  }
</script>
<?php endif;?>
<?php if(count($errors)):?>
  <script type="text/javascript">
    javascript:getAddleg();
  </script>
<?php endif;?>
<?php if(count($errors2)):?>
  <script type="text/javascript">
    javascript:getAddlegt();
    $('#typest').change();
  </script>
<?php endif;?>

  <div id="action-cancel" style="display:none">
    <form id="persons_emails_form" method="post" action="<?php //echo url_for('missionLeg/sendLegEmail')?>">
        <input type="hidden" name="id" value="<?php echo $itinerary->getId();?>">
      <?php
            //echo input_hidden_tag('leg_id', $mission_leg->getId());
           if($itinerary->getPassengerId()) $passenger = PassengerPeer::retrieveByPK($itinerary->getPassengerId());
           if($itinerary->getRequesterId()) $requester = RequesterPeer::retrieveByPK($itinerary->getRequesterId());
           if($itinerary->getAgencyId()) $agency = AgencyPeer::retrieveByPK($itinerary->getAgencyId());
       ?>
        <div class="passenger-form">
    <div class="box full">
        <div id="show-alert" style="display: none; color: red">please select emails checkbox for sending mail</div>
      <div class="wrap">
          <h1>Send To:</h1>
      </div>
      <div class="wrap">
          <div class="legemail_box">
              <div class="heading">Passenger : <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getFirstName();?> <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getLastName();?> </div>
              <div class="chbox">&nbsp;&nbsp;
                <input type="checkbox" <?php if(isset($passenger) && $passenger->getPerson() && $passenger->getPerson()->getEmail()): ?> value="<?php echo $passenger->getPerson()->getEmail();?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="passenger_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getPassengerId()) echo $passenger->getPerson()->getEmail();?>
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Requester : <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getFirstName();?> <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($requester && $requester->getPerson() && $requester->getPerson()->getEmail()): ?> value="<?php echo $requester->getPerson()->getEmail();?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="requester_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getRequesterId()) echo $requester->getPerson()->getEmail(); ?>
              </div>
          </div>
          <div class="legemail_box">
              <div class="heading">Agency : <?php if($itinerary->getAgencyId()) echo $agency->getName(); ?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($agency) && $agency->getEmail()): ?> value="<?php if($itinerary->getAgencyId()) echo $agency->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="agency_mail" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($itinerary->getAgencyId()) echo $agency->getEmail(); ?>
              </div>
          </div>
          <?php
          if($itinerary->getId()) $mission = MissionPeer::getAllMissionByItineraryId($itinerary->getId());
            foreach($mission as $mission_list):
               if($mission_list->getCoordinatorId()) $coordinator = CoordinatorPeer::retrieveByPK($mission_list->getCoordinatorId());
                if($coordinator):
          ?>
          <div class="legemail_box">
              <div class="heading">Coordinator for Mission <?php $mission_list->getId(); ?>: <?php if($coordinator->getMember()) echo $coordinator->getMember()->getPerson()->getFirstName(); ?> <?php if($coordinator->getMember()) echo $coordinator->getMember()->getPerson()->getLastName(); ?></div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($coordinator) && $coordinator->getMember()): ?> value="<?php echo $coordinator->getMember()->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="coordinator_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php if($coordinator->getMember())  echo $coordinator->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
               $other_requester_id = RequesterPeer::retrieveByPK($mission_list->getOtherRequesterId());
               if($other_requester_id):
          ?>
          <div class="legemail_box">
              <div class="heading">Requester : <?php echo $other_requester_id->getPerson()->getFirstName();?> <?php echo $requester->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($other_requester_id) && $other_requester_id->getPerson() && $other_requester_id->getPerson()->getEmail() ): ?> value="<?php echo $other_requester_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="other_requester_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $other_requester_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                endif;
                $mission_leg = MissionLegPeer::getAllMissionLegByMissionId($mission_list->getId());
                foreach ($mission_leg as $miss_leg):
                    $pilot_id = PilotPeer::retrieveByPK($miss_leg->getPilotId());
                    if($pilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Pilot : <?php echo $pilot_id->getMember()->getPerson()->getFirstName(); ?> <?php echo $pilot_id->getMember()->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($pilot_id->getMember() && $pilot_id->getMember()->getPerson() && $pilot_id->getMember()->getPerson()->getEmail()): ?> value="<?php echo $pilot_id->getMember()->getPerson()->getEmail()?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="pilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $pilot_id->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $copilot_id = MemberPeer::retrieveByPK($miss_leg->getCopilotId());
                    if($copilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Co Pilot : <?php echo $copilot_id->getPerson()->getFirstName(); ?> <?php echo $copilot_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($copilot_id) && $copilot_id->getPerson() && $copilot_id->getPerson()->getEmail() ): ?> value="<?php echo $copilot_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="copilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $copilot_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $miss_assis_id = MemberPeer::retrieveByPK($miss_leg->getMissAssisId());
                    if($miss_assis_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Mission Assistant : <?php echo $miss_assis_id->getPerson()->getFirstName(); ?> <?php echo $miss_assis_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($miss_assis_id) && $miss_assis_id->getPerson() && $miss_assis_id->getPerson()->getEmail()): ?> value="<?php echo $miss_assis_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="miss_assis_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $miss_assis_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                    $backup_pilot_id = PilotPeer::retrieveByPK($miss_leg->getBackupPilotId());
                    if($backup_pilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Pilot: <?php echo $backup_pilot_id->getMember()->getPerson()->getFirstName(); ?> <?php echo $backup_pilot_id->getMember()->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if(isset($backup_pilot_id) && $backup_pilot_id->getMember() && $backup_pilot_id->getMember()->getPerson() && $backup_pilot_id->getMember()->getPerson()->getEmail()): ?> value="<?php echo $backup_pilot_id->getMember()->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_pilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_pilot_id->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
        endif;
        $backup_copilot_id = MemberPeer::retrieveByPK($miss_leg->getBackupCopilotId());
        if($backup_copilot_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Co Pilot: <?php echo $backup_copilot_id->getPerson()->getFirstName(); ?> <?php echo $backup_copilot_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($backup_copilot_id->getPerson() && $backup_copilot_id->getPerson()->getEmail()): ?> value="<?php echo $backup_copilot_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_copilot_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_copilot_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
        endif;
        $backup_miss_assis_id = MemberPeer::retrieveByPK($miss_leg->getBackupMissAssisId());
        if($backup_miss_assis_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Backup Co Pilot: <?php echo $backup_miss_assis_id->getPerson()->getFirstName(); ?> <?php echo $backup_miss_assis_id->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($backup_miss_assis_id->getPerson() && $backup_miss_assis_id->getPerson()->getEmail()): ?> value="<?php echo $backup_miss_assis_id->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="backup_miss_assis_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $backup_miss_assis_id->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
          endif;
          $pilot_aircraft_id = PilotAircraftPeer::retrieveByPK($miss_leg->getPilotAircraftId());  
          if($pilot_aircraft_id):
          ?>
           <div class="legemail_box">
               <div class="heading">Pilot Aircraft: <?php echo $pilot_aircraft_id->getMember()->getPerson()->getFirstName(); ?> <?php echo $pilot_aircraft_id->getMember()->getPerson()->getLastName();?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($pilot_aircraft_id->getMember()->getPerson() && $pilot_aircraft_id->getMember()->getPerson()->getEmail() ): ?> value="<?php echo $pilot_aircraft_id->getMember()->getPerson()->getEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="pilot_aircraft_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $pilot_aircraft_id->getMember()->getPerson()->getEmail(); ?>
              </div>
          </div>
          <?php
            endif;
            $afa_org = AfaOrgPeer::retrieveByPK($miss_leg->getShareAfaOrgId());
            if($afa_org):
          ?>
           <div class="legemail_box">
               <div class="heading">Afa Org: <?php echo $afa_org->getName(); ?> </div>
              <div class="chbox">
                  <input type="checkbox" <?php if($afa_org && $afa_org->getRefContactEmail()): ?> value="<?php echo $afa_org->getRefContactEmail(); ?>" class="mailable" <?php else: ?> disabled="disabled" <?php endif;?> name="ref_contact_mail[]" />
              </div>
              <div class="leglabel">Email: </div>
              <div class="leg_filed">
                  <?php echo $afa_org->getRefContactEmail(); ?>
              </div>
          </div>
          <?php
                    endif;
                endforeach;
            endforeach;
          ?>
          </div>
      </div>
    </div>
    </form>
</div>
<div id="loading-lightbox-overlay" style="display:none;opacity: 0.55; background-color: rgb(0, 0, 0); position: absolute; overflow: hidden; top: 0px; left: 0px; z-index: 100000; width: 976px; height: auto;">
  <span>
         <img id="loading-lightbox-overlay-image" src="/images/ajax-loader.gif">
    </span>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#loading-lightbox-overlay").height((jQuery(document).height() + 175)).width(jQuery(document).width());
    jQuery('#loading-lightbox-overlay-image').center();
});

jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", ( jQuery(window).height() - this.height() ) / 2+jQuery(window).scrollTop() + "px");
        this.css("left", ( jQuery(window).width() - this.width() ) / 2+jQuery(window).scrollLeft() + "px");
        return this;
}

function isCheckedBoxChecked(){
    var flag = false;
    jQuery('.mailable').each(function(){
        if(jQuery(this).is(':checked')) {
            flag = true;
        }
    });
    return flag;
}

function sendemaileToAllPersonsReelatedToItinerary(){
    jQuery.ajax({
                url: '<?php echo url_for('itinerary/cancelItinerary')?>',
                data: jQuery('#persons_emails_form').serialize(),
                dataType: 'html',
                method: 'post',
                success: function(html){
                    //jQuery('#action-cancel').html(html);
                    //jQuery('#action-cancel').show();
                    window.location.href = window.location.href;
                    jQuery("#loading-lightbox-overlay").hide();
                },
                error:function(){
                    alert('error');
                },
                beforeSend: function(){
                    jQuery("#loading-lightbox-overlay").height((jQuery(document).height() + 175)).width(jQuery(document).width());
                    jQuery('#loading-lightbox-overlay-image').center();
                    jQuery("#loading-lightbox-overlay").show();
                }
            });
}

jQuery('.action-cancel').click(function(){
    var itineraryid = jQuery(this).attr("itineraryid");
    
   jQuery('#action-cancel').dialog({
       buttons: {
           "No": function() {
             jQuery(this).dialog("close");
           },
           "Yes" : function(){
              if(isCheckedBoxChecked())
              {
                  jQuery(this).dialog("close");
                  jQuery("#show-alert").hide();
                  sendemaileToAllPersonsReelatedToItinerary();
              }else {
                 jQuery("#show-alert").show();
              }
           }
       },
       title: "Cancel Itinerary",
       width: 850,
       hide: "slide",
       modal: true,
       show: 'slide'
  });
  jQuery('#action-cancel').dialog("open");
});
</script>