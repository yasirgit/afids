<?php
use_helper('Javascript', 'Form', 'jQuery', 'Object', 'Global');
$dates = $sf_data->getRaw('dates');
?>
<div class="add-mission">
<h2>Request Group Mission</h2>
<br/>
        <table class="leg-info">
                <tbody>
                  <tr>
                    <td class="cell-1">
                      <dl class="mission-time">
                        <dt>Date:</dt>
                        <dd>
                          <strong>
                          <?php 
                          if(isset($mission_date) && isset($appt_date)){
                            echo date('m/d/y',strtotime($mission_date)).'('.date('l',strtotime($mission_date)).')'.'-'.date('m/d/y',strtotime($appt_date)).'('.date('l',strtotime($appt_date)).')';
                          }else{
                            echo '--';
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
                        Can leave anytime
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-2">
                      <dl class="destination-list">
                        <dt>From:</dt>
                        <dd>
                          <strong>
                          Varied
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
                          if($leg->getToAirportId()){
                            $airport_to = AirportPeer::retrieveByPK($leg->getToAirportId());
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
                            Varied
                        </dd>
                        <dt>Weight:</dt>
                        <dd>
                            Varied
                        </dd>
                      </dl>
                    </td>
                    <td class="cell-4">
                      <dl class="mission-ad-info">
                        <dt>Distance:</dt>
                        <dd>
                            Varied
                        </dd>
                      </dl>                    
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="leg-comment" id="<?php echo 'leg_com'.$mission->getId().$leg->getLegNumber()?>">
                <tbody>
                  <tr>
                    <td class="cell-1"> 
                    Comment:
                    </td>
                    <td>
                    <?php if($mission->getMissionSpecificComments()):?>
                    <span><?php echo $mission->getMissionSpecificComments()?></span>
                    <?php else:?>
                    <span>--</span>
                    <?php endif?>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="passenger-form">
              <form action="<?php echo url_for('@request_group_mission?id='.$camp_id)?>" id="form3" method="post">
                          <input type="hidden" id="camp_id" name="camp_id" value="<?php echo $camp_id?>"/>
                          <?php if(isset($type)):?><input type="hidden" id="type" name="type" value="<?php echo $type?>"/><?php endif;?>
                          <?php if(isset($pre_requests) && count($pre_requests)):?>
                          <h4>Your last requested date is : </h4>
                             <?php foreach ($pre_requests as $p_req):?>
                                      <?php echo ' ( '.date('m/d/y',strtotime($p_req->getDate())) .' ),'?>
                             <?php endforeach;?>
                           <?php endif;?>
                          <table class="d">
                           <tr>
                            <td><h4>This camp has several mission dates. Please choose the dates you are available to fly.</h4></td>
                           </tr> 
                           <tr> 
                             <?php /*
                             $start_date = date('m/d/y',strtotime($mission_date));
                             $start_date2 = date('m/d/y',strtotime($mission_date));
                             $check_date = $start_date;
                             $check_date2 = $start_date;
                             $end_date = date('m/d/y',strtotime($mission->getApptDate()));
                             $end_date2 = date('m/d/y',strtotime($mission->getApptDate()));
                             */
                             ?>
                                   <?php $count=0;?>
                                   <?php $count2=0;?>
                                   <?php $ar = array()?>
                                   <?php $ar2 = array()?>
                                   <?php foreach ($pre_requests as $p_req):?>
                                      <?php $ar[$count] = date('m/d/y',strtotime($p_req->getDate()))?>
                                      <?php $ar2[$count2] = date('m/d/y',strtotime($p_req->getDate()))?>
                                   <?php endforeach;?>
                              <td>
<?php /* javzaa's code
                              <div id="one_date">
                               <?php if($start_date == $end_date):?>
                                    <label>
                                    <input name="date" type="radio" value="<?php echo $start_date?>" id="date"/>
                                    <?php echo $start_date?></label>
                               <?php endif?>
                               <?php while ($check_date != date ("m/d/y", strtotime ("+1 day", strtotime($end_date))) && $count != 10) :?>
                                      <?php if(!in_array($check_date,$ar)):?>
                                        <label>
                                        <input name="date" type="radio" value="<?php echo $check_date?>" id="date"/>
                                        <?php echo $check_date?></label>
                                      <?php endif?>
                                       <?php  $check_date = date ("m/d/y", strtotime ("+1 day", strtotime($check_date)));?>
                                      <?php $count++?>
                                 <?php endwhile;?>
                               </div>
*/?>
                               <div id="many_date">
                               <?php

                               $count = 0;
                               /*this wile is where missiondates = mission_date to appt_date
                               while ($check_date2 != date ("m/d/y", strtotime ("+1 day", strtotime($end_date2))) && $count2 != 10) :?>
                                      <?php if(!in_array($check_date2,$ar2)):?>
                                        <label>
                                   <?php echo checkbox_tag('dates[]', $check_date2, in_array($check_date2, $dates))?>
                                        <?php //<input name="dates[]" type="checkbox" value="<?php echo $check_date2?>
                                        <?php echo $check_date2?></label>
                                      <?php endif?>
                                       <?php  $check_date2 = date ("m/d/y", strtotime ("+1 day", strtotime($check_date2)));?>
                                      <?php
                                      $count++;
                                      $count2++?>
                                 <?php endwhile;?>
                                *
                                * 
                                */
                               //echo sizeof($mission_dates);
                               $count = 0;
                               foreach ($mission_dates as $key => $miss_date){
                                      if(!in_array($miss_date,$ar2)):?>
                                        <label>
                                   <?php echo checkbox_tag('dates[]', $miss_date, in_array($miss_date, $dates))?>
                                        <?php //<input name="dates[]" type="checkbox" value="<?php echo $check_date2?>
                                        <?php echo $key?></label>
                                      <?php endif?>
                                 <?php 
                                 $count++;
                                 }//end foreach?>
                               </div>
                               </td>
                               </tr>
                           </table>
                             <?php if(isset($date_other_e)):?><label style="color:red;width:350px;heigth:20px">Please chooce at least one date you can available to fly!</label><?php endif?>
                                <br/>
                                <table>
                                    <tr>
                                        <td><p style="color:blue">Please assign me </p></td>
                                        <td>
                                            <select id="date_choice" name="date_choice" class="text narrowest">
                                            <?php for ($i=1;$i<=$count;$i++):?>
                                              <option value="<?php echo $i?>" <?php echo $date_choice==$i?'selected':''?>><?php echo $i?></option>
                                            <?php endfor;?>
                                             </select>
                                        </td>
                                        <td><p style="color:blue">of the above dates.</p></td>
                                    </tr>
                                </table>
                 <div class="wrap">
                  <label>Home Base:</label>
                  <input type="text" class="text narrowest" id="home_base" name="home_base" value="<?php echo $home_base?>"/>
                  <br/>
                  <br/>
                  <?php if(isset($home)):?><label style="color:red;width:350px;heigth:20px">Please confirm your home base Airport Ident!</label><?php endif?>
                 </div>
                 <div class="wrap">
                  <label>Number of Seats available:</label>
                  <input type="text" class="text narrowest" id="number_of_seats" name="number_of_seats" value="<?php echo $number_of_seats?>"/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <?php if(isset($number_of)):?><label style="color:red;width:350px;heigth:20px">Please confirm your number of available seats?</label><?php endif?>
                 </div>
                 <div class="wrap">
                 <table>
                 <tr>
                 <label>Total Weight you can carry:</label>
                 <td>
                  <input type="text" class="text narrowest" id="total_carry" name="total_carry" value="<?php echo $total_carry?>"/>.lbs
                  <br/>
                 <?php if(isset($carry)):?><label style="color:red;width:350px;heigth:20px">Please confirm your total weight can carry?</label><?php endif?>
                  </td>
                  <td>
                  <p style="font-style:italic">*Please take into consideration yourself and your Mission Assistant, a MA is required on camp flights due to the fact that they are unaccompanied minors.</p>
                  </td>
                  </tr>
                  </table>
                 </div>
                 <div class="wrap">
                  <label>Can you make multiple pick up/drop off stops?</label>
                  <select id="multi_pick" name="multi_pick" class="text narrow">
                    <option value="1">Yes</option>
                    <option value="0" <?php echo $multi_pick==0?'selected':''?>>No</option>
                  </select>
                 </div>
                 <div class="wrap">
                  <label>Request Mission As</label>
                   <select id="request_as" name="request_as" class="text">
                      <option <?php echo $request_as=='Command Pilot'?'selected':''?>>Command Pilot</option>
                      <option  <?php echo $request_as=='Mission Assistant'?'selected':''?>>Mission Assistant</option>
                      <option <?php echo $request_as=='Back Up Command Pilot'?'selected':''?>>Back Up Command Pilot</option>
                      <option <?php echo $request_as=='Back Up Mission Assistant'?'selected':''?>>Back Up Mission Assistant</option>
                      <option <?php echo $request_as=='Earth Angel'?'selected':''?>>Earth Angel</option>
                    </select>
                 </div>
                 <div id="for_command_pilot">
                 <div class="wrap">
                 <table>
                 <tr>
                 <td>
                      <?php if(count($pilot_aircrafts)): ?>
                         <label>Select Your Aircraft</label>
                         <select id="aircraft" name="aircraft" class="text">
                         <?php foreach ($pilot_aircrafts as $paircraft):?>
                          <?php if($paircraft->getAircraftId()):?>
                              <?php $paircraft = AircraftPeer::retrieveByPK($paircraft->getAircraftId())?>
                          <?php endif;?>
                          <?php 
                          if(isset($paircraft)){?>
                             <option value='<?php echo $paircraft->getId()?>' <?php echo $aircraft==$paircraft->getId()?'selected':''?>>;
                          <?php  echo $paircraft->getName() .' '.$paircraft->getMake() . '( '.$paircraft->getModel() . ')';
                          }
                          echo '</option>';
                          ?>
                         <?php endforeach;?>
                        </select>
                      <?php else:?>  
                        <label>Add Your Aircraft</label>
                        <?php if(isset($camp_id)):?><a href="<?php echo url_for('@paircraft_create?camp='.$camp_id)?>" class="link-add" id="add_aircraft">Add Aircraft</a><?php endif;?>
                      <?php endif;?>
                    </td>
                    <td>
                    <label>Number</label>
                    <input type="text" class="text narrow" id="tail" name="tail" value="<?php echo $tail?>"/>
                    </td>
                    </tr>
                  </table>
                 </div>
               <input type="hidden" id="other_pilot" name="other_pilot" value="<?php echo $other_pilot?>"/>
               <div class="wrap">
                 <table id="radio">
                    <tbody>
                      <tr>
                      <td>
                      <label style="margin-left: -3px;">IFR Backup Wanted?</label>
                      <label>
                      <input id="IFR" type="radio" value="1" name="IFR" <?php echo $IFR==1?'checked':''?>/>
                      Yes
                      </label>
                      <label>
                      <input id="IFR" type="radio" value="0" name="IFR" <?php echo $IFR==0?'checked':''?>/>
                      No
                      </label>
                      </td>
                      </tr>
                    </tbody>
                  </table>
               </div>
               <div class="wrap">
               <table id="radio">
                    <tbody>
                      <tr>
                      <label style="margin-left: -3px;">Mission Assistant Required</label>
                      <td>
                      <label>
                      <input id="acc_cre" type="radio" value="1" name="acc_cre"  <?php echo $acc_cre==1?'checked':''?>/>
                      Assign me a mission assistant, or
                      </label>
                      </td>
                      <td>
                      <label>
                      <input id="acc_cre" type="radio" value="0" name="acc_cre" <?php echo $acc_cre==0?'checked':''?>/>
                      I'll bring my own
                      </label>
                          <input type="text" id="pilot_ma" name="pilot_ma" style="display:none" class="text" value="<?php echo $pilot_ma?>"/>
                      </td>
                      <td>
                      <p style="font-style:italic">Mission assistants must be 18 years or older, but do not need to be Angel Flight members.
                      </td>
                      </tr>
                      </tbody>
                  </table>
               </div>
               </div>
<!--               END STAFF FOR PILOT-->
               <div class="wrap">
                <label>Comment</label>
                <textarea rows="5" cols="50" class="text" name="comment"><?php echo $comment?></textarea>
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
</div>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  $('#request_as').change(function() {
    if($('#request_as').val() != 'Command Pilot' && $('#request_as').val() != 'Back Up Command Pilot'){
      if($('#for_command_pilot').show()){
        $('#for_command_pilot').hide()
        $('#other_pilot').val(1);
      }
    }else{
      if($('#for_command_pilot').hide()){
        $('#for_command_pilot').show()
        $('#other_pilot').val(0);
      }
    }
  });
  if($('#other_state').val() == 1 && $('#request_as').val() != 'Command Pilot' && $('#request_as').val() != 'Back Up Command Pilot'){
    $('#for_command_pilot').hide()
    $('#request_as').val($('#type').val());
  }else{
    $('#for_command_pilot').show()
    $('#request_as').val($('#type').val());
  }
  /*
  if($('#date_choice').val() >1){
    if($('#many_date').css('display') == 'none'){
      $('#one_date').css('display','none');
      $('#many_date').css('display','block');
    }
  }*/
});

if($('#request_as').val() != 'Command Pilot' && $('#request_id').val() != 'Back Up Command Pilot'){
  $('#other_pilot').val(1);
}else{
  $('#other_pilot').val(0);
}

if($('#type').val()){
  $('#request_as').val($('#type').val());
}

$("#radio input[name=acc_cre]").change(function(){
  var the_value = $('input[name=acc_cre]').attr('checked');
  if(the_value){
    if($('#pilot_ma').css('display') == 'block'){
      $('#pilot_ma').css('display','none');
    }
  }else{
    if($('#pilot_ma').css('display') == 'none'){
      $('#pilot_ma').css('display','block');
    }
  }
});
/*
$('#date_choice').change(function()
{
  if($('#date_choice').val() > 1){
    if($('#many_date').css('display') == 'none'){
      $('#one_date').css('display','none');
      $('#many_date').css('display','block');
    }
  }else if($('#date_choice').val() == 1){
    $('#one_date').css('display','block');
    $('#many_date').css('display','none');
  }
  var last;
  var all = $("#form3 input:checkbox").length;
  var numSelected = $("#form3 input:checkbox:checked").length;

  if($('#date_choice').val()<numSelected){
    $("#form3 input:checkbox").each(function(){
      $(this).removeAttr("checked");
    });
    alert('Selected dates are great than you choised to set!');
  }
});

$('#form3 input:checkbox').click(function() {
  var last;
  var all = $("#form3 input:checkbox").length;
  var numSelected = $("#form3 input:checkbox:checked").length;

  if($('#date_choice').val()<numSelected){
    $(this).removeAttr("checked");
    alert('Selected dates are great than you choised to set!');
  }
});*/
//]]>
</script>