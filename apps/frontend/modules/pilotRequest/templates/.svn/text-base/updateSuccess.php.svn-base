<?php use_helper('Pilot')?>
<div class="add-mission">
<h2>Request Mission</h2>
<br/>
<?php if(isset($mission_leg)):?>
  <?php if($mission_leg->getTransportation() == 'ground_mission'):?>
    <input type="hidden" id="leg_type" value="1"/>
  <?php endif?>
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
                      if(isset($mission)){
                          
                        $start_dat = date('mdY',strtotime($mission->getMissionDate()));
                        $end_dat = date('mdY',strtotime($mission->getApptDate()));
                        $mission_date = intval($start_dat);
                        $appt_date = intval($end_dat);
                        
                        if( $mission_date == $appt_date ){
                            echo $mission->getMissionDate('m/d/y');
                        }
                        else{
                            if($mission->getMissionDate() && $mission->getApptDate()){
                                  /*if( $mission_date > $appt_date ){
                                      echo $mission->getApptDate('m/d/y').'-'.$mission->getMissionDate('m/d/y');
                                  }
                                  else{                                */
                                     echo $mission->getMissionDate('m/d/y').'-'.$mission->getApptDate('m/d/y');
                                  //}
                            }else{
                              echo '--';
                            }
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
                    if(isset($mission)){
                      if($mission->getFlightTime()){
                        echo $mission->getFlightTime();
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
                          if($fa && $ta)
                             echo distance($fa->getLatitude(), $fa->getLongitude(), $ta->getLatitude(), $ta->getLongitude()).'mi';
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
                          if($fa && $ta)
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
                <?php if($mission->getMissionSpecificComments()):?>
                <span><?php echo $mission->getMissionSpecificComments()?></span>
                <?php else:?>
                <span>Special conditions and circumstances listed here.</span>
                <?php endif?>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="passenger-form">
          <form action="<?php echo url_for('@pilot_request?id='.$mission_leg->getId())?>" id="form3" method="post">
                        <?php if(isset($pre_requests) && count($pre_requests)):?>
                        <h4>Your last requesterd date is : </h4>
                         <?php foreach ($pre_requests as $p_req):?>
                                  <?php echo ' ( '.date('m/d/y',strtotime($p_req->getDate())) .' ),'?>
                         <?php endforeach;?>
                       <?php endif;?>
                       <table>
                       <tr>
                        <?php if( $mission_date == $appt_date ){?>
                                <td><h4>This passenger can fly on bellow date.</h4></td>
                        <?php } else { ?>
                                <td><h4>This passenger can fly on a range of dates. Please choose the date you are available.</h4></td>
                        <?php } ?>
                       </tr>
                       <tr>
                         <?php
                         //2009-6-5 1:17:22
                         //Y-m-d G:i:s                                                  
                         $start_date_check = date('mdY',strtotime($mission->getMissionDate()));
                         $end_date_check = date('mdY',strtotime($mission->getApptDate()));

                         $mission_date = intval($start_date_check);
                         $appt_date = intval($end_date_check);

                         if( $mission_date > $appt_date ){
                             $start_date = date('Y-m-d G:i:s',strtotime($mission->getApptDate()));
                             $end_date = date("U",strtotime($mission->getMissionDate()));
                             $check_date = date("U",strtotime($mission->getApptDate()));
                         }else{
                             $start_date = date('Y-m-d G:i:s',strtotime($mission->getMissionDate()));
                             $end_date = date("U",strtotime($mission->getApptDate()));
                             $check_date = date("U",strtotime($mission->getMissionDate()));
                         }
                         
                         ?>
                          <?php $count = 1;?>
                           <?php $ar = array()?>
                           <?php if(isset($pre_requests)):?>
                             <?php foreach ($pre_requests as $p_req):?>
                                <?php $ar[$count] = date('Y-m-d G:i:s',strtotime($p_req->getDate()))?>
                             <?php endforeach;?>
                           <?php endif?>
                           <td>
                                <table>
                                    <tr>
                                        <td> Date : &nbsp </td>
                                        <td>
                                           <?php if( $mission_date == $appt_date ){?>
                                                    <label style="width:150px;">
                                                    <input name="date" type="radio" checked="checked" value="<?php echo $start_date;?>" id="date"/>
                                                    <?php echo " &nbsp ".date('m-d-Y',strtotime($mission->getMissionDate()));?></label>
                                           <?php } else {  ?>
                                                   <?php $i = 1; ?>
                                                   <?php $temp_date = date ('Y-m-d G:i:s', strtotime ("U", strtotime($start_date)));?>
                                                   <?php $show_temp_date = date ('m-d-Y', strtotime ("U", strtotime($start_date)));?>
                                                        <select name="date" id="date">
                                                            <?php while ( $check_date <= $end_date ) {?>
                                                                <label style="width:150px;">
                                                                    <option value="<?php echo $temp_date;?>" ><?php echo $show_temp_date; ?></option>
                                                                </label>
                                                                 <?php $temp_date = date ("Y-m-d G:i:s", strtotime ("+".$i."day", strtotime($start_date)));?>
                                                                 <?php $show_temp_date = date ('m-d-Y', strtotime ("+".$i."day", strtotime($start_date)));?>
                                                                 <?php $check_date = date ("U", strtotime ("+".$i."day", strtotime($start_date)));?>
                                                                 <?php $i++; ?>
                                                                <?php }  ?>
                                                        </select>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                             </td>
                          </tr>
                       </table>
                        
                         <?php if(isset($date_e)):?><label style="color:red;width:350px;heigth:20px">Please choice at least one date you can available to fly!</label><?php endif?>
                         <?php if(isset($date_other_e)):?>
                            <input type="hidden" id="other_state" value="1"/>
                         <?php endif?>
                         <?php if(isset($type)):?><input type="hidden" id="type" value="<?php echo $type?>"/><?php endif?>
                         <br/>
             <div class="wrap" id="for_air" style="display:none">
                <label>Pilot Type:</label>
                <select id="pilot_type" name="pilot_type" class="text">
                  <option value="Command Pilot">Command Pilot</option>
                  <option value="Mission Assistant">Mission Assistant</option>
                  <option value="Back Up Command Pilot">Back Up Command Pilot</option>
                  <option value="Back Up Mission Assistant">Back Up Mission Assistant</option>
                  <option value="Earth Angel">Earth Angel</option>
                </select>
             </div>
             <!--div class="wrap" id="for_ground" style="display:none">
                <label>Pliot Type:</label>
                <select id="pilot_type" name="pilot_type" class="text">
                  <option value="Mission Assistant">Mission Assistant</option>
                  <option value="Back Up Mission Assistant">Back Up Mission Assistant</option>
                  <option value="Earth Angel">Earth Angel</option>
                </select>
             </div-->
           <div id="staff_for_cp">
           <input type="hidden" id="other_pilot" name="other_pilot" value=""/>
           <input type="hidden" id="s_a" name="s_a" value=""/>
           <div class="wrap">
                  <?php if(count($pilot_aircrafts)): ?>
                     <?php $arr = array(); $co = 0;?>
                     <label>Select Your Aircraft</label>
                     <select id="aircraft" name="aircraft" class="text">
                         <?php foreach ($pilot_aircrafts as $paircraft):?>

                          <?php if($paircraft->getAircraftId()):?>
                              <?php  $aircraft = AircraftPeer::retrieveByPK($paircraft->getAircraftId())?>
                          <?php endif;?>
                          <?php
                          if(isset($aircraft)){?>
                              <?php $arr[$aircraft->getId()]= $paircraft->getNNumber(); $co++;?>
                             <option value='<?php echo $aircraft->getId()?>' <?php echo $aircraft->getId()?'selected':''?>>
                          <?php  echo $aircraft->getName() .' '.$aircraft->getMake() . '( '.$aircraft->getModel() . ')';
                             echo '</option>';
                          ?>
                          <?php
                          }?>
                         <?php endforeach;?>
                      </select>

                  <?php else:?>
                    <label>Add Your Aircraft</label>
                    <?php if(isset($pilot)):?><a href="<?php echo url_for('@paircraft_create?req='.$mission_leg->getId())?>" class="link-add" id="add_aircraft">Add Aircraft</a><?php endif;?>
                  <?php endif;?>
               </div>
               <div class="wrap">
                  <label>Tail</label>
                  <input type="text" name="tail" id="tail" class="text narrow" value="<?php if(isset($paircraft)) echo $paircraft->getNNumber();?>"/>
               </div>
               <div class="wrap">
                 <table id="radio">
                    <tbody>
                      <tr>
                      </tr>
                      <tr>
                      <td>
                      <label style="margin-left: -3px;">IFR Backup Wanted?</label>
                      <label>
                      <input id="IFR" type="radio" value="1" name="IFR"/>
                      Yes
                      </label>
                      <label>
                      <input id="IFR" type="radio" value="0" name="IFR"/>
                      No
                      </label>
                      </td>
                      </tr>
                      <tr> </tr>
                    </tbody>
                  </table>
               </div>
               <div class="wrap">
               <table id="radio">
                    <tbody>
                      <tr>
                      </tr>
                      <tr>
                      <td>
                      <label style="margin-left: -3px;">Mission Assistant Wanted?</label>
                      <label>
                      <input id="acc_cre" type="radio" value="yes" name="acc_cre"/>
                      Yes
                      </label>
                      <label>
                      <input id="acc_cre" type="radio" value="no" name="acc_cre"/>
                      No
                      </label>
                      <br/>                     
                      <?php $count =0?>
                      <div id="mas" style="display:none">
                       <?php if(isset($mission_assistants)):?>
                       <?php $li = 0;?>
                       <?php foreach ($mission_assistants as $mission_assistant):?>
                            <?php $member = MemberPeer::retrieveByPK($mission_assistant->getMemberId())?>
                              <?php if($member->getPersonId()):?>
                                <?php $m_person = $member->getPerson()?>
                                <?php $m_pass= PassengerPeer::getByPersonId($m_person->getId())?>
                              <?php endif?>
                              <?php if(isset($m_person)):?>
                                <div class="mission-dtls">
                                <dl>
                                <dt><?php $count++; $li++;?></dt>
                                <label><input type="radio" id="<?php echo 'ma_'.$member->getId()?>" name="ma_ids" value="<?php echo $member->getId()?>"/>Choose this assistant</label>
                                <dd><a hef="<?php echo url_for('@member_view?id='.$member->getId())?>" style="color:blue"><?php echo $m_person->getTitle().' '.$m_person->getLastName().' '.$m_person->getFirstName()?></a>
                                <div class="dtl-pop-up">
                                  <div class="t"></div>
                                      <div class="c">
                                                <?php if(isset($m_person)){
                                                  //&& isset($m_pass
                                                  if($m_person){
                                                    if($m_person->getCity() || $m_person->getState() || $m_person->getCountry()){
                                                      echo $m_person->getCity() .' , '. $m_person->getState() .' , '.$m_person->getCountry();
                                                    }
                                                    if(isset($m_pass) && $m_pass->getWeight()){
                                                      echo $m_pass->getWeight();
                                                    }
                                                    if($m_person->getMobilePhone()){
                                                      echo $m_person->getMobilePhone().'('.$m_person->getMobileComment().')';
                                                    }
                                                  }
                                                }else{
                                                  echo "";
                                                }?>
                                      </div>
                                  <div class="b"></div>
                                </div>
                                </dd>
                                </dl>
                                </div>
                         <?php endif?>
                       <?php endforeach;?>
                    <?php endif?>
                  </div>
                  </td>
                  </tr>
                  <tr> </tr>
                </tbody>
              </table>
                   <?php if($mission_assistants){?>
              <p style="color:red;font:italy;">
               One or more members have requested to assist. Click "yes" to view and choose.
               </p>
               <?php } ?>
               <p id="warning">
               We encourage you to select "yes" and make this mission available to new members and others who wish to fly as a Mission Assistant.
              </p>
       </div>
       </div>
       <!--END STAFF FOR PILOT-->
       <div class="wrap">
        <label>Comment</label>
        <textarea rows="5" cols="20" class="text" name="comment"></textarea>
       </div>
       <div class="wrap">
           <a class="btn-action" href="#" onclick="$('#form3').submit();return false;" id="submit">
            <span>Request Mission</span>
            <strong></strong>
           </a>
           <input type="submit" class="hide" value="submit"/>
       </div>
      </form>
     </div>
<?php endif;?>
</div>
<div id="missionAssistantPopUp" title="Distance Calculation" style="display:none;"></div>
<script type="text/javascript">

<?php if(!$mission_assistants){?>    
    jQuery(document).ready(function(){        
        jQuery('#acc_cre').click(function(){
            var html = 'Mission Assistance not available in this mission.';
            jQuery('#missionAssistantPopUp').html(html).dialog('open');
            jQuery('#acc_cre').attr('checked', false);
        });       
     });     
     jQuery().ready(function(){
        jQuery('#missionAssistantPopUp').dialog({
              autoOpen: false,
              width: 350,
              buttons: {
                  "Cancel": function() {
                    jQuery(this).dialog("close");
                    jQuery('#acc_cre').attr('checked', false);
                  }
                },
               title: "Mission Assistance report",
               hide: "slide",
               modal: true,
               show: 'slide'
        });
      });
<?php } ?>

<?php
$is_ma = array();
foreach ($members as $member){
  if($member->getFlightStatus() == 'Mission Assistant'){
    $is_ma[] = "{$member->getId()} : '{$member->getFlightStatus()}'";
  }
}
?>
var is_ma = {<?php echo join(',', $is_ma)?>};
//<![CDATA[
$(document).ready(function() {
  if($('#leg_type').val() == 1){
    $('#for_air').css('display','none');
    $('#for_ground').css('display','block');
    $('#staff_for_cp').hide()
  }else{
    $('#for_ground').css('display','none');
    $('#for_air').css('display','block');
  }

  $('#aircraft').change(function(){
    var aircraftIds = <?php echo json_encode($arr)?>;
    $('#tail').val(aircraftIds[$('#aircraft').val()]);
  });

  $('#pilot_type').change(function() {
    if($('#for_air').css('display') == 'block'){
      if($('#pilot_type').val() != 'Command Pilot' && $('#pilot_type').val() != 'Back Up Command Pilot'){
        if($('#staff_for_cp').show()){
          $('#staff_for_cp').hide()
          $('#other_pilot').val(1);
        }
      }else{
        if($('#staff_for_cp').hide()){
          $('#staff_for_cp').show()
          $('#other_pilot').val(0);
        }
      }
    }
  });

  if($('#other_state').val() == 1 && $('#pilot_type').val() != 'Command Pilot' && $('#pilot_type').val() != 'Back Up Command Pilot'){
    $('#staff_for_cp').hide()
    $('#pilot_type').val($('#type').val());
  }else{
    $('#staff_for_cp').show()
    $('#pilot_type').val($('#type').val());
  }
});

if($('#pilot_type').val() != 'Command Pilot' && $('#pilot_type').val() != 'Back Up Command Pilot'){
  $('#other_pilot').val(1);
}else{
  $('#other_pilot').val(0);
}

if($('#type').val()){
  if($('#for_air').css('display') == 'block'){
    $('#pilot_type').val($('#type').val());
  }
}

$("#radio input[name=acc_cre]").change(function(){
  //  var the_value = $('#radio input:#acc_cre:checked').val();
  var the_value = $('input[name=acc_cre]').attr('checked');
  if(the_value){
    if($('#mas').css('display') == 'none'){
      $('#mas').css('display','block');
    }
  }else{
    if($('#mas').css('display') == 'block'){
      $('#mas').css('display','none');
    }
  }
});
//]]>
</script>
