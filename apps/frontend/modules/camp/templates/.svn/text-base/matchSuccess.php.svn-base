<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php use_helper('jQuery'); ?>

<div class="add-mission-entry">
  <h2>Camp/Pilot Match</h2>
  <br/>
  <h3>Camp Name:<?php if(isset($camp)):?><?php echo $camp->getCampName()?><?php else:?><?php echo '--'?><?php endif?></h3>
  <h3>Location:
  <?php if(isset($camp)):?>
    <?php if($camp->getAgency()):?>
      <?php echo $camp->getAgency()->getName()?>
    <?php endif?>
  <?php endif?>
    </h3>
  <?php
  $missions = MissionPeer::getByCampId($camp->getId());

  $mission_dates = array();
  foreach($missions as $mission){
    if($mission->getMissionDate()){
        $mission_dates[$mission->getMissionDate('m/d/Y')] = $mission->getMissionDate();
   }
  }
  $mission = $missions[0];
  /*
  $start_date = date('m/d/y',strtotime($mission->getMissionDate()));
  $check_date = $start_date;
  $end_date = date('m/d/y',strtotime($mission->getApptDate()));

  $start_date2 = $start_date;
  $check_date2 = $start_date2;
  $end_date2 = $end_date;

  $start_date3 = $start_date;
  $check_date3 = $start_date3;
  $end_date3 = $end_date;
*/
  $count =0;
  $count2 =0;
  $count3 =0;
  $c =0;

  $dates= array();
  $date_check= array();
  ?>
<!--
  <h3>Camp flight Dates:</h3>
   <?php while ($check_date3 != date ("m/d/y", strtotime ("+1 day", strtotime($end_date3))) && $count3 != 10) :?>
        <label style="color:blue"><?php echo $check_date3?>
        <?php echo ' ('.date('l',strtotime($check_date3)).')'?>
        <?php echo ','?>
        </label>
        <?php
        $check_date3 = date ("m/d/y", strtotime ("+1 day", strtotime($check_date3)));
        $count3++;?>
   <?php endwhile;?>
   <br/>
-->
   <?php $div_id =0;?>
   <?php $div_id2 =0;?>
   <a href="#assign_passengers_popup" id="assing_pass" class="open-popup"></a>

  <div class="camp-match">
   <ul class="mission-tabs">
   <?php
   //while ($check_date != date ("m/d/y", strtotime ("+1 day", strtotime($end_date))) && $count != 10) :
   foreach ($mission_dates as $key => $value){
   ?>
      <li id="<?php echo 'general_'.$div_id?>" class="inactive">
        <a href="javascript:getInfo(<?php echo $div_id?>)" id="<?php echo $div_id?>">
            <span>
          <label>
          <?php echo $key?>
          <?php echo date('l',strtotime($value))?>
          </label>
        </span></a>
      </li>
      <?php $div_id++?>
      <?php $dates[$c] = $key?>
      <?php $date_check[$c] = $key?>
      <?php  //$check_date = date ("m/d/y", strtotime ("+1 day", strtotime($check_date)));?>
      <?php $c++?>
      <?php $count++?>
   <?php
   }
   //endwhile;?>
   </ul>
   <?php
   foreach ($mission_dates as $key => $value){
        //var_date used in flight_date hidden value
        $var_date = date('Ymd', strtotime($key));

   //while ($check_date2 != date ("m/d/y", strtotime ("+1 day", strtotime($end_date2))) && $count2 != 10) :?>
              <div class="frame" id="<?php echo 'frame_'.$div_id2 ?>" style="display: none">
                  <div class="holder" id="<?php echo 'info_'.$div_id2 ?>" style="display: none">
                  <br/>
                  <?php

                    $requests_of_this_date = PilotDatePeer::getByDateIdCampId($key, $camp->getId());
                    ?>
                    <table>
                      <thead>
                          <tr>
                              <th class="aa">Pilot</th>
                            <th  class="aa">Aircraft</th>
                            <th class="aa">Home Base</th>
                            <th class="aa">Seats</th>
                            <th class="aa">Weights</th>
                            <th class="aa">Multiple Stops?</th>
                            <th class="aa">Comments</th>
                          </tr>
                      </thead>
                      <tbody>

                      <?php
                    foreach($requests_of_this_date as $rq){
                      $member_id = $rq->getMemberId();
                      $pilot_req = PilotRequestPeer::retrieveByPK($rq->getPilotRequestId());
                      $pilot = PilotPeer::getByMemberId($member_id);
                      if(isset($pilot) && $pilot instanceof Pilot){
                        $person =  $pilot->getMember()->getPerson();
                        $pilot_aircraft =  PilotAircraftPeer::getPrimary($member_id);
                        #pilot's aircraft
                        if(isset($pilot_aircraft) && $pilot_aircraft instanceof PilotAircraft){
                          $aircraft = $pilot_aircraft->getAircraft();
                        }
                      }

                    ?>
                      <?php if(isset($pilot) && $pilot instanceof Pilot){?>
                          <tr>
                          <td  class="aa"><?php if(isset($person) && $person instanceof Person):?><?php echo $person->getLastName().' '.$person->getFirstName()?><?php endif?></td>
                          <td class="aa"><?php if(isset($aircraft) && $aircraft instanceof Aircraft):?><?php echo $aircraft->getName().' '.$aircraft->getModel()?><?php endif?></td>
                          <td class="aa"><?php if(isset($pilot_req)):?><?php echo $pilot_req->getHomeBase()?><?php endif?></td>
                          <td class="aa"><?php if(isset($pilot_req)):?><?php echo $pilot_req->getNumberSeats()?><?php endif?></td>
                          <td class="aa"><?php if(isset($pilot_req)):?><?php echo $pilot_req->getTotalWeight()?><?php endif?></td>
                          <td class="aa">
                          <?php if(isset($pilot_req)):?>
                                <?php if($pilot_req->getMultiplePick() == 1):?>
                                  <?php echo 'Yes'?>
                               <?php else:?>
                                  <?php echo 'No'?>
                                <?php endif?>
                          <?php endif?>
                          </td>
                          <td class="aa"><?php if(isset($pilot_req)):?><?php echo $pilot_req->getComment()?><?php endif?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="7" class="noborder">
<?php
                      #get passengers assigned to this pilot date

                      if(isset($pilot_req) && $pilot_req instanceof PilotRequest){
                        if($pilot_req->getGroupCampId()){
                          $camp_id = $pilot_req->getGroupCampId();

                          #get Missions which has selected Camp
                          if(isset($camp_id)){

                            //---get
                            $passengers = array();
                            foreach ($missions as $miss){
                              $legs = MissionLegPeer::getbyMissId($miss->getId());
                              //echo '['.$miss->getMissionDate('m/d/Y').'] ['.$key.'<br/>';
                              if(isset($legs) && $legs[0]->getPilotId()==$pilot->getId()
                                      && $miss->getMissionDate('m/d/Y')==$key)
                                $passengers[$miss->getPassengerId()] = $miss;
                            }

                            //$camp_pilot_passengers = CampPilotPassengerPeer::getByCampPilot($camp_id, $pilot_req->getMemberId());
?>
                            <div id="<?php echo 'ps_'.$div_id2.'_'.$pilot_req->getMemberId()?>">
                                <table id="<?php echo 'passes'.$div_id2?>" class="pass">
                            <?php
                            //foreach ($camp_pilot_passengers as $cpp){
                            foreach ($passengers as $cpp){
                                $pass = $cpp->getPassenger();
                              if($pass)$person = $pass->getPerson();
?>
                                <tr>
                        <td class="aa">
                           <?php if(isset($person)):?>
                            <?php echo $person->getLastName().' '.$person->getFirstName()?>
                           <?php endif?>
                        </td>
                        <td class="aa">
                        <?php if(isset($person)):?>
                            <?php echo $person->getCity().' '.$person->getState().' '.$person->getAddress1()?>
                           <?php endif?>
                        </td>
                        <td class="aa">
                         <?php if(isset($pass)):?>
                            <?php echo $pass->getWeight()?> lbs
                           <?php endif?>
                        </td>
                        <td class="aa">
                         <?php if(isset($pass)):
                             ?>
                            <a href="#" class="action-remove" onclick="getID(<?php echo $div_id2?>, <?php echo $pilot_req->getMemberId()?>, <?php echo $pilot_req->getId()?>, <?php echo $var_date?>); removePassenger(<?php echo $pass->getId()?>)">
                                remove
                        </a>
                        <?php endif?>
                        </td>
                                </tr>

<?php                       }
                          }
                        }
                      }
?>
</table>

                            </div>
                                <a href="#" class="link-add" onclick="getID(<?php echo $div_id2?>, <?php echo $pilot_req->getMemberId()?>, <?php echo $pilot_req->getId()?>, <?php echo $var_date?>); $('#assing_pass').click(); ">
                                assign passengers
                                </a><br/><br/>
                            </td>
                        </tr>
                       <?php }?>
                    <?php }?>
                      </tbody>
                    </table>
                     <br/>
                     <br/>
                     <!--<a href="#" class="btn-action">
                     <span>Update</span>
                     <strong></strong>
                     </a>-->
                  </div>
              </div>


          <?php $div_id2++?>
          <?php  //$check_date2 = date ("m/d/y", strtotime ("+1 day", strtotime($check_date2)));?>
          <?php }//endwhile;?>
  </div>
   <?php slot('popup');
      $div_id2 = 0;?>
<div class="add-passenger" id="assign_passengers_popup" style="display: none; z-index: 1001; position: absolute; left: 200px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="assign_p_form">
            <form id="assing_form">
              <div class="passenger-form">
   <?php 
      foreach ($mission_dates as $key => $value){
?>
                  <div class="box2" id="pass_tobe_assign_<?php echo $div_id2?>" style="display:none;">
                  <table>
                    <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th></th>
                      <th>Location</th>
                      <th>Weights</th>
                      <th>Comments</th>
                      <th>Distance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $passengers = array();
                    $linked_passengers = array();
                    $cc = 0;
                    foreach ($missions as $miss){
                      $legs = MissionLegPeer::getbyMissIdNoPilotId($miss->getId());
                      if($legs && isset ($legs) && $miss->getMissionDate('m/d/Y')==$key){
                          $passengers[$cc] = $miss->getPassengerId();
                          $cc++;
                      }
                    }
                    if(isset($passengers)){?>
                    <?php for($u=0;$u<count($passengers);$u++){
                        //if passenger is linked and listed already, dont show
                        $print = true;
                        foreach ($linked_passengers as $key => $value){
                            if($passengers[$u]==$value) {
                                $print = false;
                                break;
                            }

                        }
                        if($print){
                        //$assigned_pass = CampPilotPassengerPeer::getByCamp($camp_id);

                        $pass = PassengerPeer::retrieveByPK($passengers[$u]);

                        $camp_passenger = CampPassengerPeer::retrieveByPK($camp->getId(), $passengers[$u]);
                        $passenger_link = null;
                        if($camp_passenger && $camp_passenger->getLink()!=null){
                            $passenger_link = PassengerPeer::retrieveByPK($camp_passenger->getLink());
                        }

                        $person = $pass->getPerson();?>
                       <tr id="<?php echo $person->getId();?>">
                        <td <?php if($passenger_link) echo 'rowspan=2 valign=middle'?>>
                       <input type="hidden" id="person_id" name="person_id" value="<?php echo $person->getId()?>"/>
                            <a href="javascript:submitAssignPass(<?php echo $passengers[$u]?>)" class="link-assign" id="<?php echo $passengers[$u]?>"></a></td>
                        <td>
                           <?php if(isset($person)):?>
                            <?php echo $person->getLastName().' '.$person->getFirstName()?>
                           <?php endif?>
                        </td>
                        <?php if($passenger_link){?>
                        <td rowspan="2">
                                    <?php echo image_tag('u31.png', 'width:10px; height:5px;')?>
                        </td>
                        <?php }else{?>
                        <td>
                        </td>
                        <?php }?>
                        <td>
                        <?php if(isset($person)):?>
                            <?php echo $person->getCity().' '.$person->getState().' '.$person->getAddress1()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($pass)):?>
                            <?php echo $pass->getWeight()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($camp_passenger)):?>
                            <?php echo $camp_passenger->getNote()?>
                           <?php endif?>
                        </td>
                        <td>
                      </tr>
<!-- if passenger is linked with another passenger, show linked pass -->
<?php
                       if($passenger_link){
                         $camp_passenger_link = CampPassengerPeer::retrieveByPK($camp->getId(), $passenger_link->getId());
                         $person = $passenger_link->getPerson();
                         $linked_passengers[$passenger_link->getId()] = $passenger_link->getId();
                         ?>

                       <tr id="<?php echo $person->getId();?>">
                        <td>
                           <?php if(isset($person)):?>
                            <?php echo $person->getLastName().' '.$person->getFirstName()?>
                           <?php endif?>
                        </td>
                        <td>
                        <?php if(isset($person)):?>
                            <?php echo $person->getCity().' '.$person->getState().' '.$person->getAddress1()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($passenger_link)):?>
                            <?php echo $passenger_link->getWeight()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($camp_passenger_link)):?>
                            <?php echo $camp_passenger_link->getNote()?>
                           <?php endif?>
                        </td>
                        <td>
                        </td>
                      </tr>
<!-- -->
                        <?php   };//end if?>
                        <?php   };//end if print?>
                         <?php   };//end for?>
                     <?php };?>
                    </tbody>
                  </table>
                  </div><!--box alt-->
<?php $div_id2++;
      }//end foreach?>
              </div><!--passenger form-->
            </form>
          </div><!--agency_form-->
      </div><!--bg-->
    </div><!--holder-->
 </div><!--addpassenger-popup-->
<?php end_slot()?>
  <input id="div_id" type="hidden"/>
  <input id="pilot_req_id" type="hidden"/>
  <input id="member_id" type="hidden"/>
  <input id="flight_date" type="hidden"/>
<?php if($div_id2>0):?><input id="div_ids" value="<?php echo $div_id2?>" type="hidden"/><?php endif?><!--  END MISSION_REQUESTS-->
</div>
  <script type="text/javascript">
  //<![CDATA[
  $(document).ready(function(){
    $('#info_0').css('display','block');
    $('#frame_0').css('display','block');
    $('#general_0').removeClass('inactive');
    $('#general_0').addClass('active');
  });

  function getInfo(id){
    if($('#info_'+id).css('display') == 'none' && $('#frame_'+id).css('display') == 'none'){

      $('#info_'+id).css('display','block');
      $('#frame_'+id).css('display','block');

      $('#general_'+id).removeClass('inactive');
      $('#general_'+id).addClass('active');

      var ids = $('#div_ids').val();

      for(i=0;i<ids;i++){
        if(i != id){
          if($('#info_'+i).css('display') == 'block' && $('#frame_'+i).css('display') == 'block'){
            $('#info_'+i).css('display','none');
            $('#frame_'+i).css('display','none');

            $('#general_'+i).removeClass('active').addClass('inactive');

          }
        }
      }
    }
  }

  function submitAssignPass(pass_id){
    var pass_id = pass_id;
    var div_id = $('#div_id').val();
    var member_id = $('#member_id').val();
    var pilot_req_id = $('#pilot_req_id').val();
    var flight_date = $('#flight_date').val();
    
    var targetDiv = $("#ps_"+div_id+"_"+member_id);
    //alert("#ps_"+div_id+"_"+member_id+targetDiv.val());
    
    //alert(flight_date);

    jQuery.ajax({
      type: "POST",
      url: '<?php echo url_for('camp/assignPassenger')?>',
      data: "pilot_req_id="+pilot_req_id+"&pass_id="+pass_id+"&camp_id="+<?php echo $camp->getId()?>+"&member_id="+member_id+"&flight_date="+flight_date,

      complete: function(data){
        $('#lightbox-overlay').css('opacity',0.0);
        $('#lightbox-overlay').css('z-index',0);
        $('#lightbox-overlay').css('position','');
        $('#assign_passengers_popup').css('display','none');

        //targetDiv.append('<tr>'+data.responseText+'</tr>');
        targetDiv.html(data.responseText);
        //targetDiv.html(data);

        // update passengers list who are not assigned yet to any camp.
        $('#pass_tobe_assign_'+div_id).load('<?php echo url_for('camp/passengersTobeAssign?camp_id='.$camp->getId().'&flight_date=')?>'+flight_date, function() {});

      }
    });


  }

  $('#assing_pass').click(function()
  {
    var div_id = $('#div_id').val();
    $('#pass_tobe_assign_'+div_id).css('display','block');

      var ids = $('#div_ids').val();

      for(i=0;i<ids;i++){
        if(i != div_id){
            $('#pass_tobe_assign_'+i).css('display','none');
        }
      }

    $('#lightbox-overlay').css('opacity',0.35);
    $('#lightbox-overlay').css('z-index',1000);
    $('#lightbox-overlay').css('position','absolute');

  });

  function getID(div_id, member_id, pilot_req_id, flight_date){
    $('#div_id').val(div_id);
    $('#pilot_req_id').val(pilot_req_id);
    $('#member_id').val(member_id);
    $('#flight_date').val(flight_date);
  }

  function removePassenger(pass_id){
    var div_id = $('#div_id').val();
    var member_id = $('#member_id').val();
    var pilot_req_id = $('#pilot_req_id').val();
    var flight_date = $('#flight_date').val();

    var targetDiv = $("#ps_"+div_id+"_"+member_id);
    //alert("#ps_"+div_id+"_"+member_id+targetDiv.val());
    //alert(flight_date);

    jQuery.ajax({
      type: "POST",
      url: '<?php echo url_for('camp/removePassenger')?>',
      data: "pilot_req_id="+pilot_req_id+"&pass_id="+pass_id+"&camp_id="+<?php echo $camp->getId()?>+"&member_id="+member_id+"&flight_date="+flight_date,

      complete: function(data){
        $('#lightbox-overlay').css('opacity',0.0);
        $('#lightbox-overlay').css('z-index',0);
        $('#lightbox-overlay').css('position','');
        $('#assign_passengers_popup').css('display','none');

        //targetDiv.append('<tr>'+data.responseText+'</tr>');
        targetDiv.html(data.responseText);
        //targetDiv.html(data);

        // update passengers list who are not assigned yet to any camp.
        $('#pass_tobe_assign_'+div_id).load('<?php echo url_for('camp/passengersTobeAssign?camp_id='.$camp->getId().'&flight_date=')?>'+flight_date, function() {});

      }
    });

  }


  //]]>
  </script>