<?php 
use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Javascript', 'Form') ?>

<h2>Mission</h2>

  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=mission')?>">
      <input type="hidden" name="filter" value="1"/>
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
                <?php
                echo input_auto_complete_tag('pass_fname', $pass_fname == '*' ? '' : $pass_fname,
                  'mission/autoCompleteFirst',
                  array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                  array(
                  'use_style'    => true,
                  'indicator'    =>'person_indicator',
                  )
                  );
                ?>
                <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
                <br clear="left"/>
                <label for="ff_pass_lname">Passenger Last Name</label>
                <!--<input type="text" class="text" value="<?php //echo $pass_lname?>" id="ff_pass_lname" name="pass_lname"/>-->
                <?php
                echo input_auto_complete_tag('pass_lname', $pass_lname == '*' ? '' : $pass_lname,
                  'mission/autoCompleteLast',
                  array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                  array(
                  'use_style'    => true,
                  'indicator'    =>'person_indicator1',
                  )
                  );
                ?>
               <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              </div>
               <div>
                <label for="ff_mreq_fname">Requester First Name</label>
                <!--<input type="text" class="text" value="<?php //echo $mreq_fname?>" id="ff_mreq_fname" name="mreq_fname"/>-->
                <?php echo input_auto_complete_tag('mreq_fname', $mreq_fname == '*' ? '' : $mreq_fname,
                                      'mission/autoCompleteFirstR',
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
                                      'mission/autoCompleteLastR',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator3',
                                      )
                                       ); ?>
                                        <span id="person_indicator3" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=mission&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </form>
  </div>
   
<?php if (isset($pager) && $pager->getNbResults()) { ?>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=mission&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=mission')?>">
      <?php echo link_to('Previous', '@default_index?module=mission&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=mission&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=mission&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
  

<table class="mission-request-table">
<thead>
  <tr>
    <td>Appt Date</td>
    <td>Mission Type</td>
    <td>Requester</td>
    <td>Passenger</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
<?php foreach ($mission_list as $miss):?>
  <tr>
        <td class="cell-1">
        <?php if($miss->getApptDate()):?><?php echo $miss->getApptDate('m/d/y')?><?php endif;?>
        </td>
        <td class="cell-2">
        <?php if($miss->getMissionTypeId()):?>
            <?php 
            $type = MissionTypePeer::retrieveByPK($miss->getMissionTypeId());
            if($type){
              echo $type->getName();
            }
            ?>
        <?php endif;?>
        </td>
        <td class="cell-1">
        <?php if($miss->getRequesterId()):?>
        <?php $requester = RequesterPeer::retrieveByPK($miss->getRequesterId())?>
        <?php if($requester):?>
           <?php 
           $person = PersonPeer::retrieveByPK($requester->getPersonId());
           if($person){
             echo ($person->getTitle()? $person->getTitle().' . ':"").$person->getFirstName().' '.$person->getLastName();
           }
           ?>
        <?php endif;?>
        <?php endif;?>
        </td>
        <td class="cell-2">
        <?php if($miss->getPassengerId()):?>
        <?php $passenger = PassengerPeer::retrieveByPK($miss->getPassengerId())?>
        <?php if($passenger):?>
           <?php 
           $person = PersonPeer::retrieveByPK($passenger->getPersonId());
           if($person){
             echo ($person->getTitle()? $person->getTitle().' . ':"").$person->getFirstName().' '.$person->getLastName();
           }
           ?>
        <?php endif;?>
        <?php endif;?>
        </td>
        <td class="cell-1">
        <!--/ CHECK SECURITY-->
        <ul class="action-list">
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@mission_view?id='.$miss->getId())?>" class="link-view">view</a><?php endif?></li>
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@mission_edit?id='.$miss->getId())?>" class="action-edit">edit</a><?php endif?></li>
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@mission_copy?id='.$miss->getId().'&type=copy')?>" class="action-copy">copy</a><?php endif?></li>
          <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@mission_copy?id='.$miss->getId().'&type=reverse')?>" class="action-copy">reverse</a><?php endif?></li>
          <li>
            <?php if($miss->getCancelMission() == 1): ?>
                <a href="javascript:void(0)" missionid="<?php echo $miss->getId();?>" class="action-remove action-cancel">Cancel</a>
            <?php elseif($miss->getCancelMission() == 0): ?>
                <?php echo '<font color="red">cancelled</font>';?>
            <?php endif;?>
          </li>
        </ul>
        </td>
  </tr>
</tbody>
<?php endforeach;?>
</table>
<div class="pager">
  Mission per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=mission&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=mission')?>">
      <?php echo link_to('Previous', '@default_index?module=mission&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=mission&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=mission&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>
<?php }?>
<div id="action-cancel" style="display:none">
    Are you sure want to cancel?
</div>
<script type="text/javascript">
jQuery('.action-cancel').click(function(){
   var missionid = jQuery(this).attr("missionid");
   jQuery('#action-cancel').dialog({
       buttons: {
           "Close": function() {
             jQuery(this).dialog("close");
           },
           "Ok" : function(){

              window.location.href =  "<?php echo url_for('mission/cancelMission?id=')?>" + missionid;
           }
       },
       title: "Cancel Mission",
       width: 350,
       hide: "slide",
       modal: true,
       show: 'slide'
  });
  jQuery('#action-cancel').dialog("open");
});
</script>