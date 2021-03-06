<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>
<?php if($sml == 1):?>
  <?php $link = '&sml=2&p_id='.$pilot1->getId();?>
  
  <h2> Pilot Information </h2>
  
	<table class="mission-request-table">
	<thead>
	  <tr>
	    <td>Name</td>
	    <td>Primary Airport Details</td>
	    <td>Pilot Details</td>
	  </tr>
	</thead>
	<tbody>
<?php if( $pilot1->getMemberId()):?>
  <?php 
  $mem_id = $pilot1->getMemberId();
  $member = MemberPeer::retrieveByPK($mem_id);
  $person = PersonPeer::retrieveByPK($member->getPersonId());
  ?>
  <?php endif;?>
  <?php 
  if($pilot1->getPrimaryAirportId()){
    $airport = AirportPeer::retrieveByPK($pilot1->getPrimaryAirportId());
  }
  ?>
  <tr>
    <td class="cell-1">
    <?php if(isset($person)):?>
      <?php echo $person->getFirstName() .' '.$person->getLastName(); ?>
    <?php endif;?>
    </td>
    <td class="cell-1">
    <?php if(isset($airport)):?>
      <div class="name-list">
        <dl>
          <?php if ($airport->getIdent()) {?>
          <dt>Ident:</dt>
          <dd><?php echo $airport->getIdent()?></dd>
          <?php }?>
          <?php if ($airport->getName()) {?>
          <dt>Name:</dt>
          <dd><?php echo $airport->getName()?></dd>
          <?php }?>
          <?php if ($airport->getCity().$airport->getZipcode()) {?>
          <dt>City/Zip code:</dt>
          <dd><?php echo $airport->getCity().' <i>'.$airport->getZipcode().'</i>'?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
    <?php endif;?>
    </td>
     <td class="cell-1">
      <div class="name-list">
        <dl>
          <?php if ($pilot1->getTotalHours()) {?>
          <dt>Totol Hours:</dt>
          <dd><?php echo $pilot1->getTotalHours()?></dd>
          <?php }?>
          <?php if ($pilot1->getLicenseType()) {?>
          <dt>License Type/ IFR Rated :</dt>
          <dd><?php echo $pilot1->getLicenseType().' '.$pilot1->getIfr()?></dd>
          <?php }?>
          <?php if ($pilot1->getMultiEngine().$pilot1->getSeInstructor()) {?>
          <dt>Multi Engine/Se instructor:</dt>
          <dd><?php echo $pilot1->getMultiEngine().' <i>'.$pilot1->getSeInstructor().'</i>'?></dd>
          <?php }?>
          <dt></dt>
        </dl>
      </div>
    </td>
  </tr>
</tbody>
</table>
  
<?php else:?>
  <?php $link = '';?>
<?php endif;?>


<h2>Mission Legs</h2>

  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=missionLeg')?>">
      <input type="hidden" name="filter" value="1"/>
      <?php if($sml == 1):?>
      <input type="hidden" name="sml" value="<?php echo $sml?>"/>
      <input type="hidden" name="p_id" value="<?php echo $pilot1->getId()?>"/>
      <?php endif;?>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
               <div>
                <label for="ff_miss_ext_id">Mission External ID</label>
                <input type="text" class="text" value="<?php echo $miss_ext_id?>" id="ff_miss_ext_id" name="miss_ext_id"/>
                <br clear="left"/>
                <label for="ff_mission_type">Mission Type</label>
                <?php echo select_tag('miss_type', options_for_select($types, $miss_type, array('include_custom' => '- any -')), array('id' => 'ff_mission_type','class'=>'text'))?>
              </div>
               <div>
                <label for="ff_miss_date1">Start Date</label>
                <?php echo $date_widget->render('miss_date1', $miss_date1);?>
                <br clear="left"/>
                <label for="ff_miss_date2">End Date</label>
                <?php echo $date_widget->render('miss_date2', $miss_date2);?>
              </div>
               <div>
                <label for="ff_pass_fname">Passenger First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $pass_fname?>" id="ff_pass_fname" name="pass_fname"/>-->
                <?php echo input_auto_complete_tag('pass_fname', $pass_fname == '*' ? '' : $pass_fname,
                                      'missionLeg/autoCompleteFirstP',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_pass_lname">Passenger Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $pass_lname?>" id="ff_pass_lname" name="pass_lname"/>-->
                <?php echo input_auto_complete_tag('pass_lname', $pass_lname == '*' ? '' : $pass_lname,
                                      'missionLeg/autoCompleteLastP',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

              </div>
               <div>
                <label for="ff_mreq_fname">Requester First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $mreq_fname?>" id="ff_mreq_fname" name="mreq_fname"/>-->
                <?php echo input_auto_complete_tag('mreq_fname', $mreq_fname == '*' ? '' : $mreq_fname,
                                      'missionLeg/autoCompleteFirstR',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator2',
                                      )
                                       ); ?>
                                        <span id="person_indicator2" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_mreq_lname">Requester Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $mreq_lname?>" id="ff_mreq_lname" name="mreq_lname"/>-->
                <?php echo input_auto_complete_tag('mreq_lname', $mreq_lname == '*' ? '' : $mreq_lname,
                                      'missionLeg/autoCompleteLastR',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator3',
                                      )
                                       ); ?>
                                        <span id="person_indicator3" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

              </div>
                 <div>
                <label for="ff_orgin_airport">Orgin Airport</label>
                <input type="text" class="text" value="<?php echo $orgin_airport?>" id="ff_orgin_airport" name="orgin_airport"/>
                <br clear="left"/>
                <label for="ff_orgin_city">Orgin City</label>
                <input type="text" class="text" value="<?php echo $orgin_city?>" id="ff_orgin_city" name="orgin_city"/>
                <br clear="left"/>
                <label for="ff_orgin_state">Orgin State</label>
                <input type="text" class="text" value="<?php echo $orgin_state?>" id="ff_orgin_state" name="orgin_state"/>
              </div>
              <div>
                <label for="ff_dest_airport">Dest Airport</label>
                <input type="text" class="text" value="<?php echo $dest_airport?>" id="ff_dest_airport" name="dest_airport"/>
                <br clear="left"/>
                <label for="ff_dest_city">Dest City</label>
                <input type="text" class="text" value="<?php echo $dest_city?>" id="ff_dest_city" name="dest_city"/>
                <br clear="left"/>
                <label for="ff_dest_state">Dest State</label>
                <input type="text" class="text" value="<?php echo $dest_state?>" id="ff_dest_state" name="dest_state"/>
              </div>
              <div>
                <label for="ff_pilot_fname">Pilot First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $pilot_fname?>" id="ff_pilot_fname" name="pilot_fname"/>-->
                <?php echo input_auto_complete_tag('pilot_fname', $pilot_fname == '*' ? '' : $pilot_fname,
                                      'missionLeg/autoCompleteFirstPi',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator4',
                                      )
                                       ); ?>
                                        <span id="person_indicator4" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_pilot_lname">Pilot Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $pilot_lname?>" id="ff_pilot_lname" name="pilot_lname"/>-->
                <?php echo input_auto_complete_tag('pilot_lname', $pilot_lname == '*' ? '' : $pilot_lname,
                                      'missionLeg/autoCompleteLastPi',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator5',
                                      )
                                       ); ?>
                                        <span id="person_indicator5" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=missionLeg&filter=1&sml=2'.$link)?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
  
<?php if (isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Mission Leg per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=missionLeg&max='.$v.($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=missionLeg'.$link)?>">
      <?php echo link_to('Previous', '@default_index?module=missionLeg&page='.$pager->getPreviousPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <?php if($sf_request->hasParameter ( 'noncoordinatedlegs')):?>
          <input type="hidden" name="noncoordinatedlegs" value="true" />
      <?php endif;?>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=missionLeg&page='.$pager->getLastPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link)?></strong>
      <?php echo link_to('Next', '@default_index?module=missionLeg&page='.$pager->getNextPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Mission External Id,Leg</td>
      <td>Type Date</td>
      <td>Passenger</td>
      <td>Requester</td>
      <td>Orgin</td>
      <td>Destination</td>
      <td>Pilot</td>
      <td>Mission Assistant</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mission_leg_list as $mission_leg): ?>
    <?php 
    if($mission_leg->getCancelled() !== null){
      $display='gray';
    }else{
      $display='';
    }
    ?>
      <?php $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId()); ?>
    <tr style="color:<?php echo $display?>">
      <td class="cell-2"><a href="<?php echo url_for('@mission_view?id='.$mission_leg->getMissionId())?>"><?php echo $mission->getExternalId() ?></a> - <?php echo $mission_leg->getLegNumber()?></td>
      <td class="cell-1">
      <?php if(isset($mission)):?>
          <?php if($mission->getMissionTypeId()): ?>
              <?php $miss_type =MissionTypePeer::retrieveByPK($mission->getMissionTypeId())?>
              <?php if(isset($miss_type)):?>
                  <?php echo $miss_type->getName();?>
                  <?php echo $mission->getMissionDate();?>
              <?php endif?>
          <?php endif?>
      <?php endif?>
      </td>
      <td class="cell-2">
      <?php if(isset($mission)): ?>
          <?php $pass = PassengerPeer::retrieveByPK($mission->getPassengerId());?>
          <?php if(isset($pass)):?><?php $per = PersonPeer::retrieveByPK($pass->getPersonId());?>
                <?php if($per):?>
                    <?php echo ($per->getTitle()? $per->getTitle().' . ':"").$per->getFirstName() .' '.$per->getLastName()?>
                <?php endif;?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-1">
      <?php if(isset($mission)): ?>
          <?php $req = RequesterPeer::retrieveByPK($mission->getRequesterId());?>
          <?php if(isset($req)):?><?php $rper = PersonPeer::retrieveByPK($req->getPersonId());?>
                <?php if($rper):?>
                    <?php echo ($rper->getTitle()? $rper->getTitle().' . ':"").$rper->getFirstName() .' '.$rper->getLastName()?>
                <?php endif;?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-2">
      <?php if($mission_leg->getFromAirportId()): ?>
          <?php $o_airport = AirportPeer::retrieveByPK($mission_leg->getFromAirportId())?>
          <?php if($o_airport || $o_airport->getCity() || $mission_leg->getState()):?>
              <?php echo $o_airport->getIdent() .' ( '.$o_airport->getCity().', '.$o_airport->getState().' )'?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-1">
      <?php if($mission_leg->getToAirportId()): ?>
          <?php $d_airport = AirportPeer::retrieveByPK($mission_leg->getToAirportId())?>
          <?php if($d_airport || $d_airport->getCity() || $d_airport->getState()):?>
              <?php echo $d_airport->getIdent() .' ( '.$d_airport->getCity().', '.$d_airport->getState().' )'?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-2">
      <?php if($mission_leg->getPilotId()):?>
          <?php $pilot = PilotPeer::retrieveByPK($mission_leg->getPilotId())?>
          <?php if(isset($pilot)):?>
              <?php $member = MemberPeer::retrieveByPK($pilot->getMemberId())?>
              <?php if(isset($member)): ?>
                  <?php $person = PersonPeer::retrieveByPK($member->getPersonId())?>
                  <?php if(isset($person)):?>
                       <?php echo $person->getTitle().' . '.$person->getFirstName() .' '.$person->getLastName()?>
                  <?php endif;?>
              <?php endif;?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-1">
      <?php if($mission_leg->getMissAssisId()):?>
          <?php $cpilot = PilotPeer::getByMemberId($mission_leg->getMissAssisId())?>
          <?php if(isset($cpilot)):?>
              <?php $cmember = MemberPeer::retrieveByPK($cpilot->getMemberId())?>
              <?php if(isset($cmember)): ?>
                  <?php $cperson = PersonPeer::retrieveByPK($cmember->getPersonId())?>
                  <?php if(isset($cperson)):?>
                       <?php echo $cperson->getTitle().' . '.$cperson->getFirstName() .' '.$cperson->getLastName()?>
                  <?php endif;?>
              <?php endif;?>
          <?php endif;?>
      <?php endif;?>
      </td>
      <td class="cell-2">
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@leg_edit?id='.$mission_leg->getId())?>" class="action-edit">edit</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@leg_view?id='.$mission_leg->getId())?>" class="action-view">view</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator'), false)):?><a href="<?php echo url_for('@leg_delete?id='.$mission_leg->getId())?>" class="action-remove">remove</a><?php endif?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false) && $sml==1) {?>
            <span id="mreport_indicator_<?php echo $mission_leg->getId()?>" style="display:none;">Loading..,</span> <br />
            <a id="success_hide_<?php echo $mission_leg->getId()?>" href="#" onclick="smlJs(<?php echo $mission_leg->getId()?>, <?php echo $pilot1->getId()?>); return false;">missions assigned to this pilot</a>
            <span id="success_show_<?php echo $mission_leg->getId()?>" style="display:none;color:green;">Processed</span>
            <script type="text/javascript">
            function smlJs(value, value1)
            {
              jQuery.ajax({
                url: "/missionLeg/setSml",
                data: 'leg_id=' + value + '&p_id=' + value1,
                beforeSend: function (){
                  jQuery("#mreport_indicator_" + value).show();
                },
                success: function(html){
                  jQuery("#mreport_indicator_" + value).hide();
                  jQuery("#success_hide_" + value).hide();
                  jQuery("#success_show_" + value).show();
                }
              });
            }
            </script>
          <?php } ?>
        <?php if($mission_leg->getCancelMissionLeg() == 1): ?>
            <a href="javascript:void(0)" missionlegid="<?php echo $mission_leg->getId();?>" class="action-remove action-cancel">Cancel</a>
        <?php elseif($mission_leg->getCancelMissionLeg() == 0): ?>
            <?php echo '<font color="red">cancelled</font>';?>
        <?php endif;?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="pager">
  Mission Leg per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=missionLeg&max='.$v.($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=missionLeg'.$link)?>">
      <?php echo link_to('Previous', '@default_index?module=missionLeg&page='.$pager->getPreviousPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link, array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <?php if($sf_request->hasParameter ( 'noncoordinatedlegs')):?>
          <input type="hidden" name="noncoordinatedlegs" value="true" />
      <?php endif;?>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=missionLeg&page='.$pager->getLastPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link)?></strong>
      <?php echo link_to('Next', '@default_index?module=missionLeg&page='.$pager->getNextPage().($sf_request->hasParameter ( 'noncoordinatedlegs') ? '&noncoordinatedlegs=true':'').$link, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<?php }else{?>
  <h4>No results matching your criteria</h4>
<?php }?>
<div id="action-cancel" style="display:none">
    Are you sure want to cancel?
</div>
<script type="text/javascript">
jQuery('.action-cancel').click(function(){
   var missionlegid = jQuery(this).attr("missionlegid");
   jQuery('#action-cancel').dialog({
       buttons: {
           "Close": function() {
             jQuery(this).dialog("close");
           },
           "Ok" : function(){
              window.location.href =  "<?php echo url_for('missionLeg/cancelMissionLeg?id=')?>" + missionlegid;
           }
       },
       title: "Cancel Mission Leg",
       width: 350,
       hide: "slide",
       modal: true,
       show: 'slide'
  });
  jQuery('#action-cancel').dialog("open");
});
</script>