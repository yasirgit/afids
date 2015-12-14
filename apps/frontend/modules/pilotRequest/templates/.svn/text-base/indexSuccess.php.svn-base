<?php //use_javascript('ui/ui.core.min.js')?>
<?php //use_javascript('ui/ui.dialog.min.js')?>
<?php //use_javascript('ui/ui.draggable.min.js');?>

<?php
use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>

<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<div class="pilot-requests">
  <h2>Pilots Requests</h2>
  <div class="filtering">
    <form action="<?php echo url_for('@default_index?module=pilotRequest')?>" id="form_filter" method="post" >
      <input type="hidden" name="filter" value="1"/>
      <fieldset>
        <div class="holder">
           <label for="form-item-1">Request Date Range</label>
           <?php echo $date_widget->render('req_date1', $req_date1);?>
           <strong class="to">to</strong>
          <?php echo $date_widget->render('req_date2', $req_date2);?>
        </div>
         <div class="holder">
           <label for="form-item-2">Mission Date Range</label>
           <?php echo $date_widget->render('miss_date1', $miss_date1);?>
           <strong class="to">to</strong>
           <?php echo $date_widget->render('miss_date2', $miss_date2);?>
        </div>
        <div class="holder alt">
          <label>Show:</label>
          <ul class="display-choice">
            <li>
              <input type="checkbox" id="form-item-3" value="1" <?php if ($not_process) echo 'checked="checked"'?> name="not_process"/>
              <label for="form-item-3">Not Processed</label><b></b>
            </li>
            <li>
              <input type="checkbox" id="form-item-4" value="1" <?php if ($hold) echo 'checked="checked"'?> name="hold"/>
              <label for="form-item-4">On Hold</label>
            </li>
            <li>
              <input type="checkbox" id="form-item-5" value="1" <?php if ($process) echo 'checked="checked"'?> name="process"/>
              <label for="form-item-5">Processed</label>
            </li>
          </ul>
        </div>
        <input type="submit" value="Find"/>
        <?php echo link_to('reset', '@default_index?module=pilotRequest')?>
        <input class="hide" type="submit" value="submit"/>
      </fieldset>
    </form>
  </div>
  
<!--  END filtering-->
<div class="pager">
  Pilot Request per page:
  <?php foreach($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=pilotRequest&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=pilotRequest')?>">
      <?php echo link_to('Previous', '@default_index?module=pilotRequest&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=pilotRequest&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=pilotRequest&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<!--  END PAGER-->
<div id="body_part">
  <div class="pilot-request-table">
  <?php if(isset($pilot_reqs)):?>
      <table>
        <thead>
          <tr>
            <td class="cell-1">
              <a href="#">Request</a>
            </td>
            <td class="cell-2">
              <a href="#">ID</a>
            </td>
            <td class="cell-3">
              <a href="#">Date</a>
            </td>
            <td class="cell-4">
              <a href="#">Member</a>
            </td>
            <td class="cell-5">
              <a href="#">Type</a>
            </td>
            <td class="cell-6">
              <a href="#">Coordinator</a>
            </td>
            <td>
              <a href="#">Status</a>
            </td>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($pilot_reqs as $req):?>
          <tr>
            <td class="cell-1">
              <strong class="date">
                  <?php 
                  if($req->getDate()){
                    echo $req->getDate('m/d/Y');
                  }
                  ?>                  
              </strong>
             <!-- <em class="time">12:55:44 PM</em>-->
            </td>
            <td class="cell-2 mission-dtls">

                <dl style="overflow: visible; ">
                  <dt style="float: none;">I:&nbsp;&nbsp;
                  <?php
                  $miss_date = $external_id = $mission_leg = $mission = $mission_trans = $o_airport = $d_airport = $person = $mission_type = null;
                  if ( $req->getLegId () ) {
                    $mission_leg = MissionLegPeer::retrieveByPK ( $req->getLegId () );
                    if ( isset ( $mission_leg ) ) {
                      if ( $mission_leg->getMissionId () ) {
                        $mission = MissionPeer::retrieveByPK ( $mission_leg->getMissionId () );
//                                    echo $mission->getId () . ' - ' . $mission_leg->getLegNumber ();
                        echo $mission->getItineraryId();
                        $external_id =  $mission->getExternalId () . ' - ' . $mission_leg->getLegNumber ();
                        $miss_date = $mission->getMissionDate ( 'm/d/Y' );
                        switch ($mission_leg->getTransportation()) {
                              case 'air_mission':  $mission_trans = 'Air Mission'; break;
                              case 'ground_mission': $mission_trans =  'Ground Mission'; break;
                              case 'commercial_mission': $mission_trans = 'Commercial Mission'; break;
                        }
                        if(isset($mission_leg) && $mission_trans == "Air Mission"){
                          if($mission_leg->getFromAirportId()){
                            $o_airport = AirportPeer::retrieveByPK($mission_leg->getFromAirportId());
                          }
                          if($mission_leg->getToAirportId()){
                            $d_airport = AirportPeer::retrieveByPK($mission_leg->getToAirportId());
                          }
                        }
                        if ($mission->getMissionType()) $mission_type = $mission->getMissionType()->getName();
                        if($mission->getPassengerId()) {
                            $person = PassengerPeer::retrieveByPK($mission->getPassengerId());
                            $person = $person->getPerson();
                        }
                      }
                    }
                  }else echo ' ---';
          ?>
                  <?php //echo $req->getId () ?>
                </dt>
                <dt>M: </dt>
                <dd style="padding-left: 15px;overflow: visible; position: absolute;width: auto;">
                    <?php if($external_id) : ?>
                      <a href="javascript:void(0)"><?php echo "&nbsp;".$external_id; ?></a>
                      <div class="dtl-pop-up" style="left:65px;top:0px;">
                        <div style="overflow: visible;" class="t"></div>
                        <div class="c" style="padding-top:10px;padding-bottom:10px;color:#000;text-align:left;overflow: visible;">
                            <div>Itinerary Id: <?php echo $mission->getItineraryId();?></div>
                            <div>Mission Id: <?php echo $mission->getExternalId() . ' '. $mission_leg->getLegNumber()?></div>
                            <?php if($mission_type):?>
                                <div>Mission Type: <?php echo $mission_type?></div>
                             <?php endif;?>
                            <?php if($mission_trans):?>
                                <div>Transportation: <?php echo $mission_trans?></div>
                             <?php endif;?>
                            <?php if($person):?>
                                <div>Passenger : <?php if($person->getTitle()){ echo $person->getTitle().'. ';} echo $person->getName()?></div>
                            <?php endif;?>
                            <?php if($o_airport):?>
                                <div>Origin Airport: </div>
                                <div> Ident: <?php echo $o_airport->getIdent()?></div>
                                <div> Name: <?php echo $o_airport->getName()?></div>
                                <div> State: <?php echo $o_airport->getState()?></div>
                             <?php endif;?>
                             <?php if($d_airport):?>
                                <div> Destination Airport: </div>
                                <div> Ident: <?php echo $d_airport->getIdent()?></div>
                                <div> Name: <?php echo $d_airport->getName()?></div>
                                <div> State: <?php echo $d_airport->getState()?></div>
                            <?php endif;?>
                        </div>
                        <div class="b" style="overflow: visible;"></div>
                      </div>
                    <?php else: echo '---'; endif;?>
                </dd>
              </dl>
            </td>
            <td class="cell-3">
                  <?php 
                    echo $miss_date;
                  ?>
            </td>
            <td class="cell-4 mission-dtls">
                  <dl style="overflow: visible; ">
                      <dt style="float: none;"></dt>
                      <dd style="overflow: visible; position: absolute;width: auto;">
                 <?php
                if($req->getMemberId()){
                  $member = MemberPeer::retrieveByPK($req->getMemberId());
                  if(isset($member)){
                    $person = $member->getPerson();
                     $p_name = $person->getTitle().', '.$person->getLastName().' '.$person->getFirstName();
                    if(isset($person)){  ?>
                       <a href="javascript:void(0)"><?php echo $p_name?></a>
                            <div class="dtl-pop-up" style="left:<?php echo (75 + strlen(trim($p_name)));?>px;top:5px;">
                                <div style="overflow: visible;" class="t"></div>
                                <div class="c" style="padding-top:10px;padding-bottom:10px;color:#000;text-align:left;overflow: visible;">
                                    <div class="person-info">
                                        <ul style="list-style-type: none">

                                                <li>Name: <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?></li>
                                                <li>Location:
                                                    <?php if ($person->getCity().$person->getState()){?>
                                                      <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?>
                                                    <?php }else echo "--";?>
                                                </li>
                                                <li>
                                                     Country: <?php echo $person->getCountry()?$person->getCountry():'--'?>
                                                </li>
                                            <?php $airport = $pilot = null;?>
                                            <?php $pilot = $member->getPilot();?>
                                            <?php if($pilot && $pilot->getPrimaryAirportId()):?>
                                                    <?php $airport = AirportPeer::retrieveByPK($pilot->getPrimaryAirportId())?>
                                            <?php endif;?>
                                            <?php if($airport):?>
                                             <li>Airport</li>
                                               <li>Identifier: <?php echo $airport->getIdent()?></li>
                                               <li>Name: <?php echo $airport->getName()?></li>
                                            <?php endif;?>
                                            <?php if($pilot):?>
                                                <li>Pilot Information</li>
                                                <li>License Type: <?php echo $pilot->getLicenseType() ? $pilot->getLicenseType() : '--' ;?></li>
                                                <li>IFR Rated: <?php echo ($pilot->getIfr()?'Yes':'No')?></li>
                                                <li>Total Flight Hours: <?php echo $pilot->getTotalHours()?$pilot->getTotalHours():'--'?></li>
                                                <li>Date Oriented: <?php echo $pilot->getOrientedDate()?$pilot->getOrientedDate():'--'?></li>
                                                <li>Single-engine Instructor: <?php echo $pilot->getSeInstructor()? $pilot->getSeInstructor():'No'?></li>
                                                <li>Multi-engine Instructor: <?php echo $pilot->getMeInstructor()? $pilot->getMeInstructor() :'No'?></li>
                                                <li>Insurance Expiration: <?php echo $pilot->getInsuranceReceived()?$pilot->getInsuranceReceived():'--'?></li>
                                                <li>HSEATS Status: <?php echo $pilot->getHseats()?$pilot->getHseats():'--'?></li>
                                                <li>Transplant Pilot: <?php echo $pilot->getTransplant()?'Yes':'No'?></li>
                                                <li>Date Oriented as MOP: <?php echo $pilot->getMopOrientedDate()?$pilot->getMopOrientedDate():'--'?></li>
                                                <li>MOP served by: <?php echo $pilot->getMopServedBy() ? $pilot->getMopServedBy() :'--'?></li>
                                                <li>Regions Served: <?php echo $pilot->getMopRegionsServed()?$pilot->getMopRegionsServed():'--'?></li>
                                            <?php endif;?>
                                        </ul>
                                </div>
                                </div>
                            <div class="b" style="overflow: visible;"></div>
                          </div>
                        <?php
                        if ( $member->getFlightStatus () ) {
                          echo '<br />' .$member->getFlightStatus ();
                      }
                    }
                  }
                }
                ?>
                    </dd>
               </dl>
            </td>
            <td class="cell-5">
              <?php 
              if(isset($member)){
                if($member->getFlightStatus()){
                  echo $member->getFlightStatus();
                }
              }
              ?>
              <em class="type-note">
              <?php if($req->getMissionAssistantWanted() == 1){
                echo 'Mission Assistant wanted!.';
              }
              ?>
              </em>
            </td>
            <td class="cell-6">
            <?php 
            if(isset($member)){
              $coordinator = CoordinatorPeer::getByMemberId($member->getId());
              if(isset($coordinator)){
                echo $coordinator->getInitialContact();
              }
            }
            ?>
            </td>
            <td>
              <div class="status">
              <?php 
              $newtimestamp = strtotime("-1 days",strtotime($req->getDate()));
              ?>
                <strong>
                <?php 
                if(date('m/d/y',$newtimestamp) <= $req->getDate()){
                  echo 'New';
                }
                ?>
                </strong>
                <em class="time">
                </em>
                  <ul class="status-list">
                    <li>
                    <?php if($req->getAccepted()==0):?>
                      <a href="" onclick="onAccept(<?php echo $req->getId().','.$req->getMemberId()?>); return false;">ACCEPT</a>
                    <?php else:?>
                      <a href="" onclick="onDecline(<?php echo $req->getId().','.$req->getMemberId()?>); return false;">DECLINE</a>
                    <?php endif?>                    
                    </li>
                    <li>
                    <?php if($req->getOnHold() == 0):?>
                         <a href="<?php echo url_for('@pilot_req_hold?id='.$req->getId())?>" class="status-hold">PLACE ON HOLD</a>
                    <?php else:?>                 
                         <a href="<?php echo url_for('@pilot_req_hold?id='.$req->getId())?>" class="status-hold">SET NOT HOLD</a>
                    <?php endif?>                    
                    </li>
                  </ul>
              </div>
            </td>
          </tr>
          <tr class="comment">
            <td class="col-1">Comment:</td>
            <td colspan="6">
            <?php if($req->getComment()):?>
              <div id="<?php echo 'edit_comment'.$req->getId()?>">--<?php echo $req->getComment();?>--</div>
            <?php else:?>
              <div id="<?php echo 'edit_comment'.$req->getId()?>">--Click here leave comment--</div>
            <?php endif?>               
              <?php echo input_in_place_editor_tag('edit_comment'.$req->getId(), 'pilotRequest/saveComment?id='.$req->getId(),array('save_text'=>'Save')) ?>
            </td>
          </tr>
         <?php endforeach;?>
        </tbody>
      </table>
    <?php endif;?>
  </div>
  </div>
  </div>
  
<!--  END pilot-request-table-->
 <div class="pager">
  <?php foreach ($max_array as $i => $v){
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=pilotRequest&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=pilotRequest')?>">
      <?php echo link_to('Previous', '@default_index?module=pilotRequest&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=pilotRequest&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=pilotRequest&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

  <?php 
  echo jq_form_remote_tag(array(
  'update'  => 'result',
  'url'     => 'missionRequest/ajax',
  'method'  => 'post',
  ), array(
  'id'    => 'form',
  'style' => 'display:block;'
  ));
  ?> 
    <input type="hidden" value="" id="start_date" name="start_date"/>
    <input type="hidden" value="" id="end_date" name="end_date"/>
    <input type="submit" class="hide" id="form_submit"/>
<div id="result">
</div>
    
    <div id="on_accept_container1" class="on-accept-dialog">
       Do you wish to add this pilot to the mission leg?
      <br />
    </div>

    <div id="on_accept_container2" class="on-accept-dialog">
       Do you wish to process all outstanding pilot requests?
      <br />
    </div>

    <div id="on_decline_container1" class="on-decline-dialog">
       Are you sure?
      <br />
    </div>

    <div id="on_decline_container2" class="on-decline-dialog">
       Do you wish to decline all outstanding pilot requests?
      <br />
    </div>
    
<input type="hidden" value="0" id="leg_id" name="leg_id"/>
<input type="hidden" value="0" id="mem_id" name="mem_id"/>
<!--END PILOT REQ-->
<script type="text/javascript">
//<![CDATA[

<?php
$dates = array();

if(isset($pilot_reqs)){
  foreach ($pilot_reqs as $req){
    $dates[$req->getDate()] = "{$req->getId()} : '{$req->getDate()}'";
  }
}
?>
var len = <?php echo sizeof($dates) ?>;
var dates = {<?php echo join(',', $dates)?>};

var date1 = jQuery('#req_date1').val();
var date2 = jQuery('#req_date2').val();
/*
jQuery('#req_date2').change(function(){
  if(jQuery('#req_date1').val() && jQuery('#req_date2').val()){
    var from = jQuery('#req_date1').val();
    var to = jQuery('#req_date2').val();
    jQuery('#start_date').val(from);
    jQuery('#end_date').val(to);
//    jQuery('#form_submit').click();
  }
});

jQuery('#boo').click(function(){
  alert(jQuery('#resutl').html());
});

function filterForm()
{
  jQuery('#body_part').css('opacity', 0.6);
  jQuery.ajax({
    url : '/pilotRequest/filter',
    type: 'POST',
    data: jQuery("#form_filter").serialize(),
    success: function(data){
      jQuery('#body_part').css('opacity', 1).html(data);
    }
  });
}
function timeout_init() {
  timeout = setTimeout('filterForm()', 3000);
}
jQuery('#form_filter input:text').bind('click', function(){
  filterForm();
  timeout_init();
});
jQuery('#form_filter input:checkbox').bind('click', function(){
  filterForm();
});
*/

function onAccept(leg_id,mem_id)
{
  jQuery('#leg_id').val(leg_id);
  jQuery('#mem_id').val(mem_id);
  jQuery('#on_accept_container1').dialog('open');
  return false;
}

function onDecline(leg_id,mem_id)
{
  jQuery('#leg_id').val(leg_id);
  jQuery('#mem_id').val(mem_id);
  jQuery('#on_decline_container1').dialog('open');
  return false;
}
jQuery('#on_accept_container1').dialog({
    autoOpen: false,
    modal: true,
    width: 200,
    buttons: {
        "Ok": function() {
            jQuery(this).dialog("close");
            jQuery('#on_accept_container2').dialog('open');
        },
        "Cancel": function() {
            jQuery(this).dialog("close");
        }
    }
});
jQuery('#on_accept_container2').dialog({
    autoOpen: false,
    width: 300,
    modal: true,
    buttons: {
        "Ok": function() {
            acceptAll( jQuery('#leg_id').val() , jQuery('#mem_id').val() );
            jQuery(this).dialog("close");
        },
        "Cancel": function() {
            acceptAllCancel(jQuery('#leg_id').val());
            jQuery(this).dialog("close");
        }
    }
});

function acceptAll(_id,memberid){
    jQuery.ajax({
        url: "/pilotRequest/acceptAll",
        data : { id: _id, member: memberid}
    });
    jQuery.ajax({
        url: "/pilotRequest/accept",
        data : { id: _id},
        success: function(leg_id){
            window.location = "/leg_view/"+leg_id;
    }});
};

function acceptAllCancel(_id){
    jQuery.ajax({
        url: "/pilotRequest/accept",
        data : { id: _id},
        success: function(leg_id){
            window.location = "/leg_view/" + leg_id;
        }});
};

jQuery('#on_decline_container1').dialog({
  autoOpen: false,
  width: 200,
  buttons: {
      "Ok": function() {
        jQuery.ajax({
            url: "/pilotRequest/accept",
            data : { id: jQuery('#leg_id').val()}
            });
        jQuery(this).dialog("close");
        jQuery('#on_decline_container2').dialog('open');
      },
      "Cancel": function() {
        jQuery(this).dialog("close");
      }
    }
});

jQuery('#on_decline_container2').dialog({
  autoOpen: false,
  width: 300,
  buttons: {
      "Ok": function() {
        jQuery.ajax({
            url: "/pilotRequest/declineAll",
            data : { id: jQuery('#leg_id').val(), member: jQuery('#mem_id').val()},
            success: function(){
              window.location = "/pilotRequest/index";
            }});
        jQuery(this).dialog("close");
      },
      "Cancel": function() {
        jQuery.ajax({
            success: function(){
              window.location = "/pilotRequest/index";
            }});
        jQuery(this).dialog("close");
      }
    }
});

jQuery('#req_date1').datepicker();
jQuery('#req_date2').datepicker();
jQuery('#miss_date1').datepicker();
jQuery('#miss_date2').datepicker();
//]]>
</script>
