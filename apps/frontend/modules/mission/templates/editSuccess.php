<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>
<?php use_helper('jQuery') ?>
<?php if(isset($mission)):?>
<h2>Edit Mission <?php echo '# '.$mission->getId()?></h2>
<?php
$itId = ItineraryPeer::retrieveByPK($mission->getItineraryId());
$cur_date = date("m/d/Y h:i:s a", time());
$miss_date = date('m/d/Y h:i:s a', strtotime($mission->getMissionDate()));
?>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  jQuery(function() {
    jQuery("#mission_edit_mission_date").datepicker();
    jQuery("#mission_edit_date_requested").datepicker();
    jQuery("#mission_edit_appt_date").datepicker();
  });
});
jQuery('#mission_edit_date_requested').change(function()
{
  if(jQuery('#mission_edit_date_requested').val() > jQuery('#mission_edit_mission_date').val()){
    jQuery('#mission_edit_date_requested').val('');
    alert('Date Requested is higher than Mission Date !');
  }
});

function setSelectionPassengerIdNew(text, li)
{
    var id = li.id.split('_');
    jQuery('#mission_edit_passenger_id').val(id[1]);
}

function setSelectionRequesterIdNew(text, li)
{
    var id = li.id.split('_');
    jQuery('#mission_edit_requester_id').val(id[1]);
}

function setSelectionAgencyIdNew(text, li)
{
    
    var id = li.id.split('_');
    jQuery('#agency_id').val(id[1]);
}

function setSelectionCampIdNew(text, li)
{
    var id = li.id.split('_');
    jQuery('#camp_id').val(id[1]);
}
// ]]>
</script>

<div class="passenger-form">
<form action="<?php echo url_for('mission/edit?id='.$mission->getId()) ?>" method="post" id="mission_form">
  <input type="hidden" name="mission_edit[id]" value="<?php echo $mission->getId(); ?>" />
  <input type="hidden" name="mission_edit[start]" value="<?php echo $mission->getStart(); ?>" />
  <input type="hidden" name="mission_edit[mission_count]" value="<?php echo $mission->getMissionCount(); ?>" />
  <input type="hidden" name="mission_edit[b_weight]" value="<?php echo $mission->getBWeight(); ?>" />
  <input type="hidden" name="mission_edit[apoint_time]" value="<?php if($mission->getApointTime()){ echo $mission->getApointTime();} else{ echo '01:00PM';} ?>" />
  
  <div class="box full">
    <div class="wrap">
      <?php echo $form['mission_type_id']->renderLabel(); ?>
      <?php echo $form['mission_type_id']->render(); ?>
      <?php echo $form['mission_type_id']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['mission_date']->renderLabel(); ?>
      <?php echo $form['mission_date']->render(); ?>
      <?php echo $form['mission_date']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['date_requested']->renderLabel(); ?>
      <?php echo $form['date_requested']->render(); ?>
      <?php echo $form['date_requested']->renderError(); ?>
    </div>    
    <div class="wrap">
         <label>Passenger</label>
          <?php
          echo input_auto_complete_tag(
            'passenger_a',
            $passenger_a == '*' ? '' : $passenger_a,
            'passenger/autoComplete1',
            array('autocomplete' => 'off', 'class'=>'text','style'=>'width:150px; left:13px'),
            array(
              'use_style'    => true,
              'indicator'    =>'airport_indicator',
              'after_update_element' => 'setSelectionPassengerIdNew'
            ));
          ?>         
          <?php echo input_hidden_tag('mission_edit[passenger_id]',isset($passenger) ? $passenger->getId() : '' )?>
          <span id="airport_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>          
    </div>
     <div class="wrap">
      <label>Requester </label>
      <?php echo input_auto_complete_tag(
        'requester_a',
        $requester_a == '*' ? '' : $requester_a,
        'requester/autoComplete1',
        array('autocomplete' => 'off', 'class'=>'text','style'=>'width:150px; left:13px'),
        array(
          'use_style'    => true,
          'indicator'    =>'req_indicator',
          'after_update_element' => 'setSelectionRequesterIdNew'
        )
      ); ?>
     
      <?php echo input_hidden_tag('mission_edit[requester_id]',isset($requester) ? $requester->getId() :'')?>
      <span id="req_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>     
    </div>
     <div class="wrap">
          <label>Agency</label>
           <?php echo input_auto_complete_tag('agency', $agencyName == '*' ? '' : $agencyName,
           'agency/autoComplete',
           array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'width:150px; left:13px'),
           array(
           'use_style'    => true,
           'indicator'    =>'agency_indicator',
           'after_update_element' => 'setSelectionAgencyIdNew'
           )
           );
           
          
           ?>
          <input type="hidden" id="agency_id" name="mission_edit[agency_id]" value="<?php if($agency){ echo $agency->getId();}?>">
          <?php //echo input_hidden_tag('mission_edit[agency_id]')?>
          <span id="agency_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>          
      </div>
    <div class="wrap">
          <label>Camp</label>
           <?php echo input_auto_complete_tag('camp', (isset($campName)  ? $campName : ''),
           'camp/autoComplete_1',
           array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'width:150px; left:13px'),
           array(
           'use_style'    => true,
           'indicator'    =>'agency_indicator1',
           'after_update_element' => 'setSelectionCampIdNew'
           )
           ); ?>
          <input type="hidden" id="camp_id" name="mission_edit[camp_id]" value="<?php if($camp){ echo $camp->getId();}?>">
          <span id="agency_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
      </div>
    <div class="wrap">
      <?php echo $form['coordinator_id']->renderLabel(); ?>
      <?php echo $form['coordinator_id']->render(); ?>
      <?php echo $form['coordinator_id']->renderError(); ?>
    </div>
     <div class="wrap">
      <?php echo $form['appt_date']->renderLabel(); ?>
      <?php echo $form['appt_date']->render(); ?>
      <?php echo $form['appt_date']->renderError(); ?>
    </div>
     <div class="wrap">
      <?php echo $form['flight_time']->renderLabel(); ?>
      <?php echo $form['flight_time']->render(); ?>
      <?php echo $form['flight_time']->renderError(); ?>
    </div>
     <div class="wrap">
      <?php echo $form['treatment']->renderLabel(); ?>
      <?php echo $form['treatment']->render(); ?>
      <?php echo $form['treatment']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['comment']->renderLabel(); ?>
      <?php echo $form['comment']->render(); ?>
      <?php echo $form['comment']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['appointment']->renderLabel(); ?>
      <?php echo $form['appointment']->render(); ?>
      <?php echo $form['appointment']->renderError(); ?>
    </div>
    <div class="wrap">
      <?php echo $form['mission_specific_comments']->renderLabel(); ?>
      <?php echo $form['mission_specific_comments']->render(); ?>
      <?php echo $form['mission_specific_comments']->renderError(); ?>
    </div>
    <?php if($itId->getCancelItinerary() == 1):?>
    <div class="wrap">
      <?php echo $form['cancel_mission']->renderLabel(); ?>
      <?php if($miss_date > $cur_date):?>
      <?php echo $form['cancel_mission']->render(); ?>
      <?php echo $form['cancel_mission']->renderError(); ?>
      <?php endif;?>
      <?php if($cur_date > $miss_date):?>
        <ul class="radio_list">
            <li>
                <input type="radio" checked="checked" disabled id="mission_edit_cancel_mission_0" value="0" name="mission_edit[cancel_mission]">&nbsp;
                <label for="mission_edit_cancel_mission_0">cancel</label>
            </li>
            <li>
                <input type="radio" disabled id="mission_edit_cancel_mission_1" value="1" name="mission_edit[cancel_mission]">&nbsp;
                <label for="mission_edit_cancel_mission_1">activate</label>
            </li>
        </ul>
      <?php endif;?>
    </div>
    <?php endif; ?>
    <?php echo $form['_csrf_token'] ?>
    <div class="form-submit">
      <a href="javascript:void(0)" onclick="jQuery('#mission_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
      <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
    </div>
  </div>
</form>
</div>
<?php endif;?>
