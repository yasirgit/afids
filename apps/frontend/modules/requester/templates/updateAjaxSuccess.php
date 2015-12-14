<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>
<?php use_helper('Javascript', 'Form'); ?>
<?php use_helper('jQuery'); ?>

<div id="requester_form">
  <?php
  echo jq_form_remote_tag(array(
  'update'  => 'requester_form',
  'url'     => 'requester/updateAjax',
  'method'  => 'post',
  ), array(
  'id'    => 'form_requester',
  'style' => 'display:block;'
  ));
  ?>
  <h3>Add New Requester</h3>
  <div class="passenger-form">
    <input type="hidden" id="req_id" name="req_id" value="<?php echo $requester->getId();?>"/>
    <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
    <li><?php echo $name.': '.$error; ?></li>
    <?php endforeach; ?>
    <div class="box">
      <div class="wrap">
        <label>Person</label>
        <?php echo input_auto_complete_tag('person_a_req', $person_a_req == '*' ? '' : $person_a_req,
        'person/autoNotRequester',
        array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
        array(
        'use_style'    => true,
        'indicator'    =>'req_person_indicator',
        'after_update_element' => 'setSelectionId'
        )); ?>
        <?php echo input_hidden_tag('person_id');?>
        <span id="req_person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif');?></span>
        <?php if(isset($person_needr)):?>
        <label style="color:red;">Required!</label>
        <?php endif;?>
      </div>
      <div class="wrap">
        <label>Agency</label>
        <?php echo input_auto_complete_tag('agency', $agency == '*' ? '' : $agency,
        'agency/autoComplete',
        array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
        array(
        'use_style'    => true,
        'indicator'    =>'agency_indicator',
        'after_update_element' => 'setSelectionId'
        )
        ); ?>
        <?php echo input_hidden_tag('agency_id');?>
        <span id="agency_indicator" style="display:none"><?php echo image_tag('/images/loading.gif');?></span>
        <?php //echo $form['_csrf_token']; ?>
        <?php if(isset($agency_need)):?>
        <label style="color:red;">Required!</label>
        <?php endif;?>
        <?php echo $form['_csrf_token']; ?>
      </div>
      <div class="wrap">
        <?php echo $form['title']->renderLabel();?>
        <?php echo $form['title']->renderError(); ?>
        <?php echo $form['title']->render(); ?>
      </div>
      <!-- div class="wrap">
        <?php //echo $form['discharge']->renderLabel();?>
        <?php //echo $form['discharge']->renderError(); ?>
        <?php //echo $form['discharge']->render(); ?>
      </div -->
      <div class="wrap">
        <?php echo $form['how_find_af']->renderLabel();?>
        <?php echo $form['how_find_af']->renderError(); ?>
        <?php echo $form['how_find_af']->render(); ?>
      </div>
      <div class="form-submit">
        <a href="#" onclick="jQuery('#agency_form_submit').click(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
        <input type="submit" class="hide" id="agency_form_submit"/>
        <a href="<?php echo url_for('itinerary/create'); ?>" id="requester_form_close" class="cancel">Cancel</a>
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
  window.jQuery('#requester_a').val('<?php echo $man->getName().', '.$man->getState().', '.$man->getZipcode();?>');
  window.jQuery('#requester_id').val('<?php echo $requester_id;?>');
</script>
<?php endif; ?>
<?php //echo $form->getObject()->getPerson();?>