<?php use_helper('Pilot')?>
<div class="add-mission">
<h2>Request Mission</h2>
<br/>
<?php if(isset($mission_leg)):?>
  <?php 
  if($mission_leg->getMissionId()){
    $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
  }
  ?>
        <table class="leg-info">
                <tbody>
                  <tr>
                    <td class="cell-1">
                      <strong class="leg">
                       <?php 
                       if($mission_leg->getLegNumber()){
                         echo 'Leg '.$mission_leg->getLegNumber();
                       }
                       ?>
                      </strong>
                      <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd>
                          <strong>
                          <?php 
                          $miss = MissionPeer::retrieveByPK($mission_leg->getMissionId());
                          if(isset($miss)){
                            if($miss->getMissionDate()){
                              echo $miss->getMissionDate('m/d/y');
                            }else{
                              echo '--';
                            }
                          }
                          ?>
                          </strong>
<!--                          <strong>8/2/09</strong>-->
<!--                          (Sat) to-->
<!--                          <strong>8/3/09</strong>-->
<!--                          (Sun)-->
                        </dd>
                        <dt>Time:</dt>
                        <dd>
                        <?php 
                        if(isset($miss)){
                          if($miss->getFlightTime()){
                            echo $miss->getFlightTime();
                          }else{
                            echo 'Can leave anytime';
                          }
                        }
                        ?>
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-2">
                      <dl class="destination-list">
                        <dt>From:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if($mission_leg->getFromAirportId()){
                            $airport_from = AirportPeer::retrieveByPK($mission_leg->getFromAirportId());
                            if(isset($airport_from)){
                              echo $airport_from->getIdent();
                            }
                          }
                          ?>
                          </strong>
                          <?php 
                          if(isset($airport_from)){
                            if($airport_from->getCity() || $airport_from->getState()){
                              echo '( '.$airport_from->getCity() . ', ' . $airport_from->getState() .' )';
                            }
                          }
                          ?>
                          <em>PST</em>
                        </dd>
                        <dt>To:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if($mission_leg->getToAirportId()){
                            $airport_to = AirportPeer::retrieveByPK($mission_leg->getToAirportId());
                            if(isset($airport_to)){
                              echo $airport_to->getIdent();
                            }
                          }
                          ?>
                          </strong>
                          <?php 
                          if(isset($airport_to)){
                            if($airport_to->getCity() || $airport_to->getState()){
                              echo '( '.$airport_to->getCity() . ', ' . $airport_to->getState() .' )';
                            }
                          }
                          ?>
                          <em>PST</em>                      
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-3">
                      <dl class="mission-ad-info">
                        <dt>Passengers:</dt>
                        <dd>
                        <?php 
                        if(isset($mission)){
                          if($mission->getPassengerId()){
                            $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());
                          }
                          if(isset($pass)){
                            $comps = CompanionPeer::getByPassId($pass->getId());
                            $county = 0;
                            $weg = 0;
                            foreach ($comps as $comp){
                              $county ++;
                              $weg = $weg + $comp->getWeight();
                            }
                            if($county != 0 && isset($pass)){
                              echo 1+$county;
                            }
                          }
                        }
                        ?>
                        </dd>
                        <dt>Weight:</dt>
                        <dd>
                        <?php 
                        if(isset($pass) && isset($weg)){
                          echo $pass->getWeight()+$weg;
                        }else{
                          echo $pass->getWeight();
                        }
                        ?>
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-4">
                      <dl class="mission-ad-info">
                        <dt>Distance:</dt>
                        <dd>
                          <?php
                            if ($mission_leg->getTransportation() == 'air_mission') {
                              $fa = $mission_leg->getAirportRelatedByFromAirportId();
                              $ta = $mission_leg->getAirportRelatedByToAirportId();
                              $dist = distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
                              echo $dist;
                            }else{
                              echo "-";
                            }
                            ?>
                        </dd>
                        <dt>Efficiency:</dt>
                        <dd>
                          <?php if ($airport && $mission_leg->getTransportation() == 'air_mission') {
                              $fa = $mission_leg->getAirportRelatedByFromAirportId();
                              $ta = $mission_leg->getAirportRelatedByToAirportId();
                              echo efficiency($airport->getLatitude(), $airport->getLongitude(), $fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'%';
                            }else{
                              echo "-";
                            }?>
                        </dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_com'.$mission->getId().$mission_leg->getLegNumber()?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <span>Special conditions and circumstances listed here.</span>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="passenger-form">
              <form action="<?php echo url_for('@pilot_req?id='.$mission_leg->getId())?>" id="form3" method="post">
                           <table>
                           <tr>
                            <td><h4>This passenger can fly on a range of dates. Please choose the date you are available.</h4></td>
                           </tr> 
                           <tr> 
                             <?php 
                             $start_date = date('m/d/y',strtotime($mission->getMissionDate()));
                             $check_date = $start_date;
                             $end_date = date('m/d/y',strtotime($mission->getApptDate()));
                             ?>
                              <td>
                              <?php $count=0;?>
                                 <?php while ($check_date != $end_date && $count!=10) :?>
                                    <?php  $check_date = date ("m/d/y", strtotime ("+1 day", strtotime($check_date)));?>
                                    <label>
                                    <input name="date" type="radio" value="<?php echo $check_date?>" id="date"/>
                                    <?php echo $check_date?></label>
                                    <?php $count++?>
                                 <?php endwhile;?>
                               </td>
                               </tr>
                           </table>
                             <?php if(isset($date_e)):?><label style="color:red;width:350px;heigth:20px">Please choice at least one date you can available to fly!</label><?php endif?>
                             <?php if(isset($date_other_e)):?>
                             <input type="hidden" id="other_state" value="1"/>
                             <input type="hidden" id="type" value="<?php echo $type?>"/>
                             <?php endif?>
                             <br/>
                 <div class="wrap">
                    <label>Pliot Type:</label>
                    <select id="pilot_type" name="pilot_type" class="text">
                      <option>Command Pilot</option>
                      <option>Mission Assistant</option>
                      <option>Back Up Command Pilot</option>
                      <option>Back Up Mission Assistant</option>
                      <option>Earth Angel</option>
                    </select>
                 </div>
               <div id="staff_for_cp">  
               <input type="hidden" id="other_pilot" name="other_pilot" value="1"/>
               <div class="wrap">
                   <label>Select Your Aircraft</label>
                      <?php if(isset($pilot_aircrafts)):?>
                         <select id="aircraft" name="aircraft" class="text">
                         <?php foreach ($pilot_aircrafts as $aircraft):?>
                          <?php if($aircraft->getAircraftId()):?>
                              <?php $aircraft = AircraftPeer::retrieveByPK($aircraft->getAircraftId())?>
                          <?php endif;?>
                          <option>
                          <?php 
                          if(isset($aircraft)){
                            echo $aircraft->getName() .' '.$aircraft->getMake() . '( '.$aircraft->getModel() . ')';
                          }
                          ?>
                          </option>
                         <?php endforeach;?>
                        </select>
                      <?php else:?>  
                        <?php if(isset($pilot)):?>(No Aircraft)<a href="<?php echo url_for('@pilot_view?id='.$pilot->getId())?>" class="link-add"> Pilot view </a><?php endif;?>
                      <?php endif;?>
                   </div>
                   <div class="wrap">
                      <label>Tail</label>
                      <input type="text" name="tail" class="text narrow"/>
                   </div>
               <div class="wrap">
                          <table>
                           <tr>
                            <td><label>IFR Backup Wanted?</label></td>
                           </tr>
                           <tr> 
                              <td><label>
                                <input name="IFR" type="radio" value="1" id="acc_cre"/>
                                Yes</label>
                                  <label>
                                  <input name="IFR" type="radio" value="0" id="rej_cre"/>
                                No</label>
                               </td>
                               </tr>
                           </table>
               </div>
               <div class="wrap">
                        <table>
                           <tr>
                            <td><label>Mission Assistant Wanted?</label></td>
                           </tr> 
                           <tr> 
                              <td><label>
                                <input name="mission_assis" type="radio" value="1" id="acc_cre"/>
                                Yes</label>
                                  <label>
                                  <input name="mission_assis" type="radio" value="0" id="rej_cre"/>
                                No</label>
                               </td>
                               </tr>
                           </table>
                           <p>
                           One or more members have requested to assist. Click "yes" to view and choose.
                           </p>
                           <p>
                           We encourage you to select "yes" and make this mission available to new members and others who wish to fly as a Mission Assistant.
                          </p>
               </div>
               </div>
<!--               END STAFF FOR PILOT-->
               <div class="wrap">
                <label>Comment</label>
                <textarea rows="5" cols="20" class="text" name="comment"></textarea>
               </div>
               <div class="wrap">
                   <a class="btn-action" href="#" onclick="$('#form3').submit();return false;">
                    <span>Request Mission</span>
                    <strong></strong>
                   </a>
                   <input type="submit" class="hide" value="submit"/>
               </div>
              </form>
             </div>
<?php endif;?>
</div>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  if($('#other_state').val() == 1){
    $('#staff_for_cp').hide()
    $('#pilot_type').val($('#type').val());
  }
});

$('#pilot_type').change(function() {
  if($('#pilot_type').val() != 'Command Pilot'){
    if($('#staff_for_cp').show()){
      $('#staff_for_cp').hide()
    }
  }else{
    if($('#staff_for_cp').hide()){
      $('#staff_for_cp').show()
    }
  }
});
//]]>
</script>