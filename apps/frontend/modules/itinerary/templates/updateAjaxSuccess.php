<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form'); ?>
<?php use_helper('jQuery'); ?>

<div id="requester_form">
  <?php
  echo jq_form_remote_tag(array(
  'update'  => 'requester_form',
  'url'     => 'itinerary/updateAjax',
  'loading'  => "jQuery('#loading-lightbox-overlay-image').center();Element.show('loading-lightbox-overlay');",
  'complete' => "Element.hide('loading-lightbox-overlay');",
  'method'  => 'post',
  ), array(
  'id'    => 'form_requester',
  'style' => 'display:block;'
  ));
  ?>
  <h3>Add New Requester</h3>
  <div class="passenger-form">
    <input type="hidden" id="req_id" name="req_id" value="<?php echo $requester->getId();?>"/>   
    <div class="box">
     <div class="wrap">
          <label>Person</label>
          <?php echo input_auto_complete_tag('person_a_req', $person_a_req == '*' ? '' : $person_a_req,
          'person/autoNotRequester',
          array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'left:-195px;top:-165px;width:200px'),
          array('use_style' => true, 'indicator' =>'req_person_indicator', 'after_update_element' => 'setSelectionId')
           ); ?>
          <a onclick="jQuery('#add_new_person_passenger').click();jQuery('#action_from_passenger_or_requester').val('from_requester');return false;" href="#" id="add_per_pass_req" name="add_per_pass_req">Add new person</a>
          <?php echo input_hidden_tag('person_id')?>
          <span id="req_person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
             <?php if(isset($person_needr)):?>
          <label style="color:red;">Required!</label>
          <?php endif;?>
      </div>
      <div class="wrap">
          <label>Agency</label>
           <?php echo input_auto_complete_tag('agency', $agency == '*' ? '' : $agency,
           'agency/autoComplete',
           array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'left:-195px;top:-165px;width:200px'),
           array(
           'use_style'    => true,
           'indicator'    =>'agency_indicator',
           'after_update_element' => 'setSelectionId'
           )
           ); ?>
          <a onclick="jQuery('#add_new_requester_agency').click();return false;" href="#" id="add_req_agency" name="add_req_agency">Add new agency</a>
          <?php echo input_hidden_tag('agency_id')?>
            <span id="agency_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
          <?php echo $form['_csrf_token'] ?>
             <?php if(isset($agency_need)):?>
                <label style="color:red;">Required!</label>
            <?php endif;?>
      </div>
      <div class="wrap">
        <?php echo $form['title']->renderLabel();?>
        <?php echo $form['title']->renderError(); ?>
        <?php echo $form['title']->render(); ?>
      </div>     
      <div class="wrap">
        <?php echo $form['how_find_af']->renderLabel();?>
        <?php echo $form['how_find_af']->renderError(); ?>
        <?php echo $form['how_find_af']->render(); ?>
      </div>
      <div class="form-submit">
            <a href="#" onclick="jQuery('#requester_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
            <input type="submit" class="hide" id="requester_form_submit"/>
            <a class="cancel" href="#" onclick="jQuery('#lightbox-overlay').click();">Cancel</a>
      </div>
    </div><!--box-->
  </div><!--box alt-->
</form>
</div><!--requester_form form-->

<?php if (!$form->getErrorSchema()->getErrors() && isset($isSuccess)): ?>
<script type="text/javascript">
  var $_name = <?php echo $form->getObject()->getPersonId();?>;
  if(window.jQuery('#new_req')){
    window.jQuery('#new_req').val('');
  }
  if(window.jQuery('#new_req')){
    window.jQuery('#new_req').val($_name);
  }
  // window.location.reload();
  window.jQuery('#lightbox-overlay').trigger('click');
  jQuery("#form_requester input[type='text']").val('');
  jQuery("#form_requester textarea").val('');
  window.jQuery('#requester_a').val('<?php echo $man->getName().', '.$man->getState().', '.$man->getZipcode();?>');
  window.jQuery('#requester_id').val('<?php echo $requester_id;?>');
</script>
<?php endif; ?>
<?php //echo $form->getObject()->getPerson();?>