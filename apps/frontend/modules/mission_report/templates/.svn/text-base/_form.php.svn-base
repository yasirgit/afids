<?php
use_helper('jQuery');
use_javascripts_for_form($form);
use_stylesheets_for_form($form);
$sf_response->addJavascript('jquery.prettyPhoto.js');
$sf_response->addStylesheet('prettyPhoto.css');
?>
<?php
    echo javascript_tag("
        Array.prototype.in_array = function(p_val) {
	for(var i = 0, l = this.length; i < l; i++) {
		if(this[i] == p_val) {
			return true;
		}
	}
	return false;
}
        function checkExt(formObj){
            var filename = formObj.value;            
            var fileext = filename.split('.').pop();

            // Check file extenstion
            var images_types = ['gif', 'png', 'jpg', 'jpeg', 'pjpeg'];
            if (!images_types.in_array(fileext.toLowerCase())){
                alert ('You can only upload gif, jpg, png, jpeg images.');
                formObj.value = '';
                formObj.focus();
                return false;
            }
            return true;
}
");
?>
<?php foreach ($form->getErrorSchema()->getErrors() as $key=> $e) {?>
  <?php //echo $key.': '.$e?>  
  <?php }?>
<div class="passenger-form">
  <?php //echo $form->renderGlobalErrors() ?>
  <form action="<?php echo url_for('mission_report/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().'&' : '?').'leg_id='.$form['leg_id']->getValue()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <?php echo $form->renderHiddenFields() ?>

    <div class="box full">
      <div class="wrap">
        <?php echo $form['mission_date']->renderLabel() ?>
        <?php echo $form['mission_date']?>
        <?php echo $form['mission_date']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['copilot_name']->renderLabel() ?>
        <?php echo $form['copilot_name']?>
        <?php echo $form['copilot_name']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['member_copilot']->renderLabel() ?>
        <?php echo $form['member_copilot']?> <label class="raw" for="<?php echo $form['member_copilot']->renderId()?>">Yes</label>
        <?php echo $form['member_copilot']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['pickup_airport_ident']->renderLabel() ?>
        <div class="wrap">
          If you picked up different passengers at multiple airports, enter each pickup airport separated by commas.
          <br clear="left"/>
          <?php echo $form['pickup_airport_ident']?>
          <?php echo $form['pickup_airport_ident']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['dropoff_airport_ident']->renderLabel() ?>
        <div class="wrap">
          If you dropped off different passengers at multiple airports, enter each dropoff airport separated by commas.
          <br clear="left"/>
          <?php echo $form['dropoff_airport_ident']?>
          <?php echo $form['dropoff_airport_ident']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['routing']->renderLabel() ?>
        <div class="wrap">
          If your flight involved stops other than the pickup/dropoff airports above, you may enter your full routing if you wish.
          <br clear="left"/>
          <?php echo $form['routing']?>
          <?php echo $form['routing']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['passenger_names']->renderLabel() ?>
        <div class="wrap">
          Enter the names of each of the passengers on this flight separated by commas.
          <br clear="left"/>
          <?php echo $form['passenger_names']?>
          <?php echo $form['passenger_names']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['commercial_ticket_cost']->renderLabel() ?>
        <div class="wrap">
          Sometimes, pilots may purchase a commercial ticket for a passenger rather than fly the flight. If this is the situation
          for this mission, please enter the cost of the ticket in this field, leave the hobbs time blank, and leave the aircraft selection blank.
          <br clear="left"/>
          <?php echo $form['commercial_ticket_cost']?>
          <?php echo $form['commercial_ticket_cost']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['airline_ref_number']->renderLabel() ?>
        <?php echo $form['airline_ref_number']?>
        <?php echo $form['airline_ref_number']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['hobbs_time']->renderLabel() ?>
        <div class="wrap">
          <b>Note</b>: Include all hours of a round-trip even if the passenger was not only on board for part of the flight.
          <br clear="left"/>
          <?php echo $form['hobbs_time']?>
          <br clear="left"/>
          <span>Hour </span> <span style="padding-left:60px;"> Minutes</span>
          <?php echo $form['hobbs_time']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['mileage']->renderLabel() ?>
        <div class="wrap">
          Please make an estimate of the total, round-trip nautical miles flown for this flight.
          <br clear="left"/>
          <?php echo $form['mileage']?>
          <?php echo $form['mileage']->renderError() ?>
        </div>
      </div>
      <div class="wrap">
        <?php echo $form['expense_report']->renderLabel() ?>
        <?php echo $form['expense_report']?>
        <?php echo $form['expense_report']->renderError() ?>
      </div>
      Select from the list below the airplane you used to fly this mission. If you used another airplane not listed,
      enter the make, model and Tail Number in the space below under 'Other'.
      <div class="wrap">
        <table>
          <thead>
            <tr>
              <th>Select</th>
              <th>Make / Model</th>
              <th>Tail Number</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $other = true;
            foreach ($pilot_aircrafts as $pilot_aircraft) {
              /* @var $aircraft Aircraft */
              $aircraft = $pilot_aircraft->getAircraft();
              if ($is_checked = ($form['aircraft_id']->getValue() == $aircraft->getId())) $other = false;
            ?>
            <tr>
              <td>
                <input type="radio" name="<?php echo $form->getName()?>[aircraft_id]" value="<?php echo $aircraft->getId()?>" id="aircraft_<?php echo $aircraft->getId()?>" <?php if ($is_checked) echo 'checked'?>/>
              </td>
              <td>
                <label class="raw" for="aircraft_<?php echo $aircraft->getId()?>">
                  <?php echo $aircraft->getMakeModel()?>
                </label>
              </td>
              <td>
                <label class="raw" for="aircraft_<?php echo $aircraft->getId()?>">
                  <?php echo $pilot_aircraft->getNNumber()?>
                </label>
              </td>
            </tr>
            <?php }?>
            <tr>
              <td>
                <?php echo $form['aircraft_id']->render(($other ? array('checked' => 'checked', 'value' => '') : array('value' => '')))?>
                <label class="raw" for="<?php echo $form['aircraft_id']->renderId()?>">
                  <?php echo $form['aircraft_id']->renderLabelName()?>
                </label>
              </td>
              <td>
                <?php echo $form['makemodel']?>
                <?php echo $form['makemodel']->renderError()?>
              </td>
              <td>
                <?php echo $form['n_number']?>
                <?php echo $form['n_number']->renderError()?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="wrap">
        <?php echo $form['mission_comments']->renderLabel() ?>
        <?php echo $form['mission_comments']?>
        <?php echo $form['mission_comments']->renderError() ?>
      </div>
      <?php for($i = 1; $i <=5; $i++) {?>
      <?php $v = $form['photo'.$i]->getValue();?>
      <?php $er = $form['photo'.$i]->renderError() ?>

      <div class="wrap upload_photo" style="<?php echo ($i==1 || $v || $er?'':'display:none;')?>">
        <?php echo $form['photo'.$i]->renderLabel() ?>
        <div class="wrap">
          <?php if($v && $form->getObject()->getId()) {?>
          <div class="wrap" id="mission_photo<?php echo $i?>">
            <?php echo link_to('click here to view', '/uploads/mission_report/'.$v, array('rel' => 'prettyPhoto[gallery1]'));?>
            <?php echo ' OR '.jq_link_to_remote('remove', array(
              'url' => 'mission_report/removePhoto?id='.$form->getObject()->getId().'&n='.$i,
              'success' => "jQuery('#mission_photo$i').hide();",
            ), array('class' => 'action-remove'))?>
          </div>
          <?php }?>
          <?php echo $form['photo'.$i];?>

           <?php if(isset($form_error_schema[$i])):?>           
           <?php endif;?>
           <ul class="help_list">
               <li>
                  <i><?php echo $form['photo'.$i]->renderHelp() ?></i>
               </li>
           </ul>           
          <?php echo $form['photo'.$i]->renderError() ?>
          <?php if ($i == 5) echo "<br clear='left'/>You can add up to 5 images!"?>
        </div>
      </div>
      <?php }?>
      <div class="wrap">
        <label></label>
        <?php echo jq_link_to_function('add another photo', "jQuery('.upload_photo').each(function(){ if (jQuery(this).is(':visible') == false) { jQuery(this).show(); return false;} });")?>
		<br /> 
      </div>
      
      <div class="form-submit">
        <a onclick="$('#report_form_submit').click();return false;" href="#" class="btn-action"><span>Submit »</span><strong> </strong></a>
        <a href="<?php echo url_for('mission_report/review/')?>" class="cancel">Cancel</a>
        <input type="submit" id="report_form_submit" class="hide"/>		
      </div>
    </div>
  </form>
</div>


<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function(){
  jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
});
</script>
