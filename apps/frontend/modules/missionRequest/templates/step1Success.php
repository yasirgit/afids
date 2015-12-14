<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {

  <?php
  $has = 0;
  if(strstr($sf_context->getActionName(),'step3')){
    $has = 1;
  }
  ?>
  var is_step3 = <?php echo $has?>;
  if(is_step3 == 1){
    if($('#s1').attr('class') == 'first-active'){
      $('#s1').addClass('first-checked')
    }
    if($('#s2').attr('class') == ''){
      $('#s2').addClass('checked')
    }
    if($('#s3').attr('class') == ''){
      $('#s3').addClass('last-active')
    }
    if($('#step1').show()){
      $('#step1').hide()
      $('#step3').show()
    }
  }
});


//  ]]>
</script>

  <?php use_helper('jQuery'); ?>

  <?php use_stylesheets_for_form($form1);?>
  <?php use_javascripts_for_form($form1);?>
  <?php use_stylesheets_for_form($form2);?>
  <?php use_javascripts_for_form($form2);?>
  <?php use_stylesheets_for_form($form3);?>
  <?php use_javascripts_for_form($form3);?>

<h2><?php echo $title?></h2>
<!--Errors-->
  <?php if (isset($error_msg)){?>
<span style="color: red;"><?php echo $error_msg?></span>
  <?php }?>

  <?php
  $form2_errors = $form2->getErrorSchema()->getErrors();
  /*if (count($errors) > 0)
  {
  	foreach ($errors as $name => $error)
  	{
  		echo $name .'3:'.$error ;
  	}
  }*/
  ?>
<div class="steps-area"><?php
if($sf_context->getActionName() == 'step1'){
	$class1= 'first-active';
	$class2= '';
	$class3= '';
}elseif($sf_context->getActionName() == 'step2'){
	$class1= 'first-checked';
	$class2= 'active';
	$class3= '';
}elseif($sf_context->getActionName() == 'step3'){
	$class1= 'first-checked';
	$class2= 'checked';
	$class3= 'last-active';
}
?>
<div class="step-list">
<ul>
	<li class="<?php echo $class1?>" style="display: list-item;" id="s1"><a
		href="#" class="first" ><strong>Step 1</strong><span
		class="right-c"></span></a></li>
	<li class="<?php echo $class2?>" style="display: list-item;" id="s2"><a
		href="#" class="second" >Step 2</a></li>
	<li class="<?php echo $class3?>" style="display: list-item;" id="s3"><a
		href="#" class="fifth" id="fifth_click">Step 3</a>
	</li>
</ul>
</div>

<div class="steps-holder">
<div class="step" style="display: none;" id="step1">
<div class="passenger-form">
<form id="form1" action="" method="post">
<h3>Verify Requester Information</h3>
<input type="hidden" name="id" value="<?php echo $miss_req->getId() ?>" />
<input type="hidden" name="referer" value="<?php echo $referer ?>" /> 
<?php if(isset($back)):?><input type="hidden" id="back" name="back" value="<?php echo $back?>" /> <?php endif;?> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="wrap"><?php echo $form1['req_first_name']->renderLabel(); ?>
<?php echo $form1['req_first_name']->render(); ?> <?php echo $form1['req_first_name']->renderError(); ?>
<?php echo $form1['_csrf_token'] ?></div>
<div class="wrap"><?php echo $form1['req_last_name']->renderLabel(); ?>
<?php echo $form1['req_last_name']->render(); ?> <?php echo $form1['req_last_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_address1']->renderLabel(); ?> <?php echo $form1['req_address1']->render(); ?>
<?php echo $form1['req_address1']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_address2']->renderLabel(); ?> <?php echo $form1['req_address2']->render(); ?>
<?php echo $form1['req_address2']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_city']->renderLabel(); ?> <?php echo $form1['req_city']->render(); ?>
<?php echo $form1['req_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_state']->renderLabel(); ?> <?php echo $form1['req_state']->render(); ?>
<?php echo $form1['req_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_zipcode']->renderLabel(); ?> <?php echo $form1['req_zipcode']->render(); ?>
<?php echo $form1['req_zipcode']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_email']->renderLabel(); ?> <?php echo $form1['req_email']->render(); ?>
<?php echo $form1['req_email']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['req_secondary_email']->renderLabel(); ?>
<?php echo $form1['req_secondary_email']->render(); ?> <?php echo $form1['req_secondary_email']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_pager_email']->renderLabel(); ?>
<?php echo $form1['req_pager_email']->render(); ?> <?php echo $form1['req_pager_email']->renderError(); ?>
</div>
</div>
<div class="box alt">
<div class="passenger-form-heading"><strong>Phone Number</strong> <strong>Comment</strong>
</div>
<div class="wrap"><?php echo $form1['req_day_phone']->renderLabel(); ?>
<?php echo $form1['req_day_phone']->render(); ?> <?php echo $form1['req_day_phone']->renderError(); ?>
<?php echo $form1['req_day_comment']->render(); ?> <?php echo $form1['req_day_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_eve_phone']->renderLabel(); ?>
<?php echo $form1['req_eve_phone']->render(); ?> <?php echo $form1['req_eve_phone']->renderError(); ?>
<?php echo $form1['req_eve_comment']->render(); ?> <?php echo $form1['req_eve_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_mobile_phone']->renderLabel(); ?>
<?php echo $form1['req_mobile_phone']->render(); ?> <?php echo $form1['req_mobile_phone']->renderError(); ?>
<?php echo $form1['req_mobile_comment']->render(); ?> <?php echo $form1['req_mobile_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_pager_phone']->renderLabel(); ?>
<?php echo $form1['req_pager_phone']->render(); ?> <?php echo $form1['req_pager_phone']->renderError(); ?>
<?php echo $form1['req_pager_comment']->render(); ?> <?php echo $form1['req_pager_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['req_other_phone']->renderLabel(); ?>
<?php echo $form1['req_other_phone']->render(); ?> <?php echo $form1['req_other_phone']->renderError(); ?>
<?php echo $form1['req_other_comment']->render(); ?> <?php echo $form1['req_other_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['agency_name']->renderLabel(); ?> <?php echo $form1['agency_name']->render(); ?>
<?php echo $form1['agency_name']->renderError(); ?></div>
<?php if(isset($agency_error)):?><label style="color: red;">Please
confirm Agency Name!</label><?php endif;?>
<div class="form-submit"><a href="#"
	onclick="$('#form1').submit();return false;" class="btn-action"><span>Save
and Continue >></span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for('missionRequest/index') ?>" class="cancel">Cancel</a>
</div>
</div>
</fieldset>
</form>
</div>
</div>
<div class="step" style="display: none" id="step2"><?php if($pass_firstname && $pass_lastname):?>
<div id="info" <?php if(count($form2_errors) > 0):?> style="display: none"<?php endif;?> >
<p>Please be sure to carefully match this passenger against passengers
in our database to prevent duplicate entries. If you find a match, click
on the "Use This Passenger" link, otherwise, click on the link to "Add
New Passenger."</p>
<br />
<?php echo 'You are matching the passenger as entered in the request: '?>
<p style="color: red"><?php echo $pass_firstname.' '.$pass_lastname?></p>
<a href="#" id="use_current"
	onclick="getCurrent(<?php echo $miss_req->getId()?>); return false;">Use
This Passenger</a> <br />
<br />
<br />
If there are no matches, click here to <a href="#" id="add_new_pass">Add
a New Passenger.</a> <br />
<br />
<?php $count =0;?> <?php if(isset($old_passengers)):?> <?php foreach ($old_passengers as $pass):?>
<?php $count++?> <?php endforeach;?> <?php endif;?> <?php if(isset($old_passengers) && $count>0):?>
Existing Passengers <br />
<br />
<?php foreach ($old_passengers as $pass):?> <?php $person = PersonPeer::retrieveByPK($pass->getPersonId())?>
<?php if($person):?><a href="" id="use_old"
	onclick="getPass(<?php echo $person->getId()?>); return false"><?php echo $person->getTitle().' . '.$person->getFirstName().' '.$person->getLastName()?></a><br />
<?php endif;?> <?php endforeach;?> <?php endif;?></div>
<?php endif;?>
   <div id="add_new_passenger"<?php if(count($form2_errors) == 0):?> style="display: none"<?php endif;?>>
<div class="passenger-form">
<form id="form2" action="" method="post">
<h3>Find Matching Passenger</h3>
<br />
<input type="hidden" name="id" value="<?php echo $miss_req->getId() ?>" />
<input type="hidden" name="back"
	value="<?php if (isset($back))echo $back?>" /> <input type="hidden"
	name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="wrap"><?php echo $form2['pass_title']->renderLabel(); ?> <?php echo $form2['pass_title']->render(); ?>
<?php echo $form2['pass_title']->renderError(); ?> <?php echo $form2['_csrf_token'] ?>
</div>
<div class="wrap"><?php echo $form2['pass_first_name']->renderLabel(); ?>
<?php echo $form2['pass_first_name']->render(); ?> <?php echo $form2['pass_first_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_last_name']->renderLabel(); ?>
<?php echo $form2['pass_last_name']->render(); ?> <?php echo $form2['pass_last_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_gender']->renderLabel(); ?> <?php echo $form2['pass_gender']->render(); ?>
<?php echo $form2['pass_gender']->renderError(); ?></div>
<div class="wrap">
<?php echo $form2['pass_type']->renderLabel(); ?>
<?php echo $form2['pass_type']->render(); ?>
<?php echo $form2['pass_type']->renderError(); ?>
<?php if(isset($type_error)):?>
   <label style="color: red; width: 250px">Please choose Passenger Type!</label>
<?php endif;?>
</div>
<div class="wrap"><?php echo $form2['pass_address1']->renderLabel(); ?>
<?php echo $form2['pass_address1']->render(); ?> <?php echo $form2['pass_address1']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_address2']->renderLabel(); ?>
<?php echo $form2['pass_address2']->render(); ?> <?php echo $form2['pass_address2']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_city']->renderLabel(); ?> <?php echo $form2['pass_city']->render(); ?>
<?php echo $form2['pass_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_state']->renderLabel(); ?> <?php echo $form2['pass_state']->render(); ?>
<?php echo $form2['pass_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_zipcode']->renderLabel(); ?> <?php echo $form2['pass_zipcode']->render(); ?>
<?php echo $form2['pass_zipcode']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_country']->renderLabel(); ?> <?php echo $form2['pass_country']->render(); ?>
<?php echo $form2['pass_country']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_email']->renderLabel(); ?> <?php echo $form2['pass_email']->render(); ?>
<?php echo $form2['pass_email']->renderError(); ?></div>
<div class="wrap"><label>Best Contact Method</label> <input type="text"
	id="best_contact" name="best_contact" class="text" /></div>
<div class="wrap"><?php echo $form2['illness']->renderLabel(); ?> <?php echo $form2['illness']->render(); ?>
<?php echo $form2['illness']->renderError(); ?></div>
<div class="wrap"><label>Illness Category</label> <select
	id="illness_cat" name="illness_cat" class="text narrow">
	<?php foreach ($pass_illness_cats as $cat):?>
	<option><?php echo $cat?></option>
	<?php endforeach;?>
</select></div>
<div class="wrap"><?php echo $form2['financial']->renderLabel(); ?> <?php echo $form2['financial']->render(); ?>
	<?php echo $form2['financial']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_private_cons']->renderLabel(); ?>
<?php echo $form2['pass_private_cons']->render(); ?> <?php echo $form2['pass_private_cons']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_public_cons']->renderLabel(); ?>
<?php echo $form2['pass_public_cons']->render(); ?> <?php echo $form2['pass_public_cons']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_weight']->renderLabel().$form2['pass_height']->renderLabel();?>
<?php echo $form2['pass_weight']->render(); ?> <?php echo $form2['pass_weight']->renderError(); ?>
<?php echo $form2['pass_height']->render(); ?> <?php echo $form2['pass_height']->renderError(); ?>
</div>
<div class="wrap"><label>Passenger Medical Release?</label> <label> <input
	name="medical" type="radio" value="1" id="medical" /> Yes</label> <label>
<input name="medical" type="radio" value="0" id="medical" /> No</label>
</div>
<div class="wrap"><?php echo $form2['pass_language']->renderLabel(); ?>
<?php echo $form2['pass_language']->render(); ?> <?php echo $form2['pass_language']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_date_of_birth']->renderLabel(); ?>
<?php echo $form2['pass_date_of_birth']->render(); ?> <?php echo $form2['pass_date_of_birth']->renderError(); ?>
</div>
<br />
<br />
</div>
<div class="box alt">
<div class="passenger-form-heading"><strong>Phone Number</strong> <strong>Comment</strong>
</div>
<div class="wrap"><?php echo $form2['pass_day_phone']->renderLabel(); ?>
<?php echo $form2['pass_day_phone']->render(); ?> <?php echo $form2['pass_day_phone']->renderError(); ?>
<?php echo $form2['pass_day_comment']->render(); ?> <?php echo $form2['pass_day_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_eve_phone']->renderLabel(); ?>
<?php echo $form2['pass_eve_phone']->render(); ?> <?php echo $form2['pass_eve_phone']->renderError(); ?>
<?php echo $form2['pass_eve_comment']->renderLabel(); ?> <?php echo $form2['pass_eve_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_mobile_phone']->renderLabel(); ?>
<?php echo $form2['pass_mobile_phone']->render(); ?> <?php echo $form2['pass_mobile_phone']->renderError(); ?>
<?php echo $form2['pass_mobile_comment']->render(); ?> <?php echo $form2['pass_mobile_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_pager_phone']->renderLabel(); ?>
<?php echo $form2['pass_pager_phone']->render(); ?> <?php echo $form2['pass_pager_phone']->renderError(); ?>
<?php echo $form2['pass_pager_comment']->render(); ?> <?php echo $form2['pass_pager_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_other_phone']->renderLabel(); ?>
<?php echo $form2['pass_other_phone']->render(); ?> <?php echo $form2['pass_other_phone']->renderError(); ?>
<?php echo $form2['pass_other_comment']->render(); ?> <?php echo $form2['pass_other_comment']->renderError(); ?>
</div>
<br />
<div class="innerbox" style="margin-top: 3px">
<h3 align="center">Treating Physician</h3>
<div class="wrap"><?php echo $form2['treating_physician']->renderLabel(); ?>
<?php echo $form2['treating_physician']->render(); ?> <?php echo $form2['treating_physician']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['treating_phone']->renderLabel(); ?>
<?php echo $form2['treating_phone']->render(); ?> <?php echo $form2['treating_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['treating_phone_comment']->renderLabel(); ?>
<?php echo $form2['treating_phone_comment']->render(); ?> <?php echo $form2['treating_phone_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['treating_fax']->renderLabel(); ?> <?php echo $form2['treating_fax']->render(); ?>
<?php echo $form2['treating_fax']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['treating_fax_comment']->renderLabel(); ?>
<?php echo $form2['treating_fax_comment']->render(); ?> <?php echo $form2['treating_fax_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['treating_email']->renderLabel(); ?>
<?php echo $form2['treating_email']->render(); ?> <?php echo $form2['treating_email']->renderError(); ?>
</div>
</div>
<br />
<br />
<div class="innerbox" style="margin-top: 3px">
<h3 align="center">Destination Facility</h3>
<div class="wrap"><?php echo $form2['facility_name']->renderLabel(); ?>
<?php echo $form2['facility_name']->render(); ?> <?php echo $form2['facility_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['facility_phone']->renderLabel(); ?>
<?php echo $form2['facility_phone']->render(); ?> <?php echo $form2['facility_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['facility_phone_comment']->renderLabel(); ?>
<?php echo $form2['facility_phone_comment']->render(); ?> <?php echo $form2['facility_phone_comment']->renderError(); ?>
</div>
</div>
<div class="innerbox" style="margin-top: 3px">
<h3 align="center">Releasing Physician</h3>
<div class="wrap"><label>Name</label> <input type="text"
	id="release_physician" class="text narrow" /></div>
<div class="wrap"><?php echo $form2['release_phone']->renderLabel(); ?>
<?php echo $form2['release_phone']->render(); ?> <?php echo $form2['release_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['release_phone_comment']->renderLabel(); ?>
<?php echo $form2['release_phone_comment']->render(); ?> <?php echo $form2['release_phone_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['release_fax']->renderLabel(); ?> <?php echo $form2['release_fax']->render(); ?>
<?php echo $form2['release_fax']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['release_fax_comment']->renderLabel(); ?>
<?php echo $form2['release_fax_comment']->render(); ?> <?php echo $form2['release_fax_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['release_email']->renderLabel(); ?>
<?php echo $form2['release_email']->render(); ?> <?php echo $form2['release_email']->renderError(); ?>
</div>
</div>
<div class="innerbox" style="margin-top: 3px">
<h3 align="center">Lodging</h3>
<div class="wrap"><?php echo $form2['lodging_name']->renderLabel(); ?> <?php echo $form2['lodging_name']->render(); ?>
<?php echo $form2['lodging_name']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['lodging_phone']->renderLabel(); ?>
<?php echo $form2['lodging_phone']->render(); ?> <?php echo $form2['lodging_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['lodging_phone_comment']->renderLabel(); ?>
<?php echo $form2['lodging_phone_comment']->render(); ?> <?php echo $form2['lodging_phone_comment']->renderError(); ?>
</div>
</div>
</div>
<div class="box full">
<div class="wrap"><?php echo $form2['emergency_name']->renderLabel(); ?>
<?php echo $form2['emergency_name']->render(); ?> <?php echo $form2['emergency_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['emergency_phone1']->renderLabel(); ?>
<?php echo $form2['emergency_phone1']->render(); ?> <?php echo $form2['emergency_phone1']->renderError(); ?>
<?php echo $form2['emergency_phone1_comment']->render(); ?> <?php echo $form2['emergency_phone1_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['emergency_phone2']->renderLabel(); ?>
<?php echo $form2['emergency_phone2']->render(); ?> <?php echo $form2['emergency_phone2']->renderError(); ?>
<?php echo $form2['emergency_phone2_comment']->render(); ?> <?php echo $form2['emergency_phone2_comment']->renderError(); ?>
</div>
<div class="form-submit2"><br />
<br />
<br />
<br />
<a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a> <a
	href="#" onclick="$('#form2').submit();return false;"
	class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
</div>
</div>
</fieldset>
<br />
</form>
</div>
</div>
</div>

<div class="step" style="display: none;" id="step3">
<div class="passenger-form">
<form id="form3" action="" method="post">
<h3>Mission Data</h3>
<input type="hidden" name="id" value="<?php echo $miss_req->getId() ?>" />
<input type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="wrap"><?php echo $form3['appt_date']->renderLabel(); ?> <?php echo $form3['appt_date']->render(); ?>
<?php echo $form3['appt_date']->renderError(); ?> <?php echo $form3['_csrf_token'] ?>
</div>
<div class="wrap"><?php //echo $form3['appt_time']->renderLabel(); ?> <?php //echo $form3['appt_time']->render(); ?>
<?php //echo $form3['appt_time']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['mission_date']->renderLabel(); ?> <?php echo $form3['mission_date']->render(); ?>
<?php echo $form3['mission_date']->renderError(); ?></div>
<div class="wrap"><?php //echo $form3['flight_time']->renderLabel(); ?>
<?php //echo $form3['flight_time']->render(); ?> <?php //echo $form3['flight_time']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['mission_request_type_id']->renderLabel(); ?>
<?php echo $form3['mission_request_type_id']->render(); ?> <?php echo $form3['mission_request_type_id']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['waiver_required']->renderLabel(); ?>
<?php echo $form3['waiver_required']->render(); ?> <?php echo $form3['waiver_required']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['baggage_weight']->renderLabel(); ?>
<?php echo $form3['baggage_weight']->render(); ?> <?php echo $form3['baggage_weight']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['baggage_desc']->renderLabel(); ?> <?php echo $form3['baggage_desc']->render(); ?>
<?php echo $form3['baggage_desc']->renderError(); ?></div>
</div>
<div class="box alt">
<div class="wrap"><?php echo $form3['comment']->renderLabel(); ?> <?php echo $form3['comment']->render(); ?>
<?php echo $form3['comment']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['orgin_city']->renderLabel(); ?> <?php echo $form3['orgin_city']->render(); ?>
<?php echo $form3['orgin_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['orgin_state']->renderLabel(); ?> <?php echo $form3['orgin_state']->render(); ?>
<?php echo $form3['orgin_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['dest_city']->renderLabel(); ?> <?php echo $form3['dest_city']->render(); ?>
<?php echo $form3['dest_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['dest_state']->renderLabel(); ?> <?php echo $form3['dest_state']->render(); ?>
<?php echo $form3['dest_state']->renderError(); ?></div>
<div class="form-submit"><a href="#"
	onclick="$('#form3').submit();return false;" class="btn-action"><span>Save
and Add </span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
</div>
</fieldset>
</form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  //<![CDATA[
  <?php
  $p_title = array();
  $p_fname = array();
  $p_lname = array();
  $p_gender = array();
  $p_type = array();
  $p_address1 = array();
  $p_address2 = array();
  $p_city = array();
  $p_state = array();
  $p_zipcode = array();
  $p_coutry = array();
  $p_email = array();
  $p_best_contact = array();
  $p_illness = array();
  $p_illness_cat = array();
  $p_financial = array();
  $p_private_cons = array();
  $p_public_cons = array();
  $p_weight = array();
  $p_height = array();
  $p_medical = array();
  $p_language = array();
  $p_date_of = array();
  $p_ename = array();
  $p_ephone1 = array();
  $p_epcomment1 = array();
  $p_ephone2 = array();
  $p_epcomment2 = array();
  $p_day_phone = array();
  $p_day_comment= array();
  $p_eve_phone = array();
  $p_eve_comment= array();
  $p_mobile_phone = array();
  $p_mobile_comment= array();
  $p_pager_phone = array();
  $p_pager_comment= array();
  $p_other_phone = array();
  $p_other_comment= array();
  $p_treat_name= array();
  $p_treat_phone= array();
  $p_treat_comment= array();
  $p_treat_fax= array();
  $p_treat_fax_comment= array();
  $p_treat_email = array();
  $p_release_name= array();
  $p_release_phone= array();
  $p_release_comment= array();
  $p_release_fax= array();
  $p_release_fax_comment= array();
  $p_release_email = array();
  $p_lodging_name = array();
  $p_lodging_phone = array();
  $p_lodging_comment = array();
  $p_facility_name = array();
  $p_facility_phone = array();
  $p_facility_comment = array();

  if(isset($old_passengers)){
    foreach ($old_passengers as $passenger){

      $person = PersonPeer::retrieveByPK($passenger->getPersonId());
      $p_title[] = "{$person->getId()} : '". addslashes($person->getTitle()). "'";
      $p_fname[] = "{$person->getId()} : '". addslashes($person->getFirstname()). "'";
      $p_lname[] = "{$person->getId()} : '". addslashes($person->getLastname()). "'";
      $p_gender[] = "{$person->getId()} : '". addslashes($person->getGender()). "'";
      $p_type[] = "{$person->getId()} : '". addslashes($passenger->getPassengerTypeId()). "'";
      $p_address1[] = "{$person->getId()} : '". addslashes($person->getAddress1()). "'";
      $p_address2[] = "{$person->getId()} : '". addslashes($person->getAddress2()). "'";
      $p_city[] = "{$person->getId()} : '". addslashes($person->getCity()). "'";
      $p_state[] = "{$person->getId()} : '". addslashes($person->getState()). "'";
      $p_zipcode[] = "{$person->getId()} : '". addslashes($person->getZipcode()). "'";
      $p_coutry[] = "{$person->getId()} : '". addslashes($person->getCountry()). "'";
      $p_email[] = "{$person->getId()} : '". addslashes($person->getEmail()). "'";
      $p_best_contact[] = "{$person->getId()} : '". addslashes($passenger->getBestContactMethod()). "'";
      $p_illness[] = "{$person->getId()} : '". addslashes($passenger->getIllness()). "'";
      $p_illness_cat[] = "{$person->getId()} : '". addslashes($passenger->getPassengerIllnessCategoryId()). "'";
      $p_financial[] = "{$person->getId()} : '". addslashes($passenger->getFinancial()). "'";
      $p_private_cons[] = "{$person->getId()} : '". addslashes($passenger->getPrivateConsiderations()). "'";
      $p_public_cons[] = "{$person->getId()} : '". addslashes($passenger->getPublicConsiderations()). "'";
      $p_weight[] = "{$person->getId()} : '". addslashes($passenger->getWeight()). "'";
      $p_height[] = "{$person->getId()} : '". addslashes($passenger->getWeight()). "'";
      $p_medical[] = "{$person->getId()} : '". addslashes($passenger->getNeedMedicalRelease()). "'";
      $p_date_of[] = "{$person->getId()} : '". addslashes($passenger->getDateOfBirth()). "'";
      $p_language[] = "{$person->getId()} : '". addslashes($passenger->getLanguageSpoken()). "'";
      $p_ename[] = "{$person->getId()} : '". addslashes($passenger->getEmergencyContactName()). "'";
      $p_ephone1[] = "{$person->getId()} : '". addslashes($passenger->getEmergencyContactPrimaryPhone()). "'";
      $p_epcomment1[] = "{$person->getId()} : '". addslashes($passenger->getEmergencyContactPrimaryComment()). "'";
      $p_ephone2[] = "{$person->getId()} : '". addslashes($passenger->getEmergencyContactSecondaryPhone()). "'";
      $p_epcomment2[] = "{$person->getId()} : '". addslashes($passenger->getEmergencyContactSecondaryComment()). "'";
      $p_day_phone[] = "{$person->getId()} : '". addslashes($person->getDayPhone()). "'";
      $p_day_comment[] = "{$person->getId()} : '". addslashes($person->getDayComment()). "'";
      $p_eve_phone[] = "{$person->getId()} : '". addslashes($person->getEveningPhone()). "'";
      $p_eve_comment[] = "{$person->getId()} : '". addslashes($person->getEveningComment()). "'";
      $p_mobile_phone[] = "{$person->getId()} : '". addslashes($person->getMobilePhone()). "'";
      $p_mobile_comment[] = "{$person->getId()} : '". addslashes($person->getMobileComment()). "'";
      $p_pager_phone[] = "{$person->getId()} : '". addslashes($person->getPagerPhone()). "'";
      $p_pager_comment[] = "{$person->getId()} : '". addslashes($person->getPagerComment()). "'";
      $p_other_phone[] = "{$person->getId()} : '". addslashes($person->getOtherPhone()). "'";
      $p_other_comment[] = "{$person->getId()} : '". addslashes($person->getOtherComment()). "'";
      $p_treat_name[] = "{$person->getId()} : '". addslashes($passenger->getTreatingPhysician()). "'";
      $p_treat_phone[] = "{$person->getId()} : '". addslashes($passenger->getTreatingPhone()). "'";
      $p_treat_fax[] = "{$person->getId()} : '". addslashes($passenger->getTreatingFax1()). "'";
      $p_treat_fax_comment[] = "{$person->getId()} : '". addslashes($passenger->getTreatingFax1Comment()). "'";
      $p_treat_email[] = "{$person->getId()} : '". addslashes($passenger->getTreatingEmail()). "'";
      $p_release_name[] = "{$person->getId()} : '". addslashes($passenger->getReleasingPhysician()). "'";
      $p_release_phone[] = "{$person->getId()} : '". addslashes($passenger->getReleasingPhone()). "'";
      $p_release_fax[] = "{$person->getId()} : '". addslashes($passenger->getReleasingFax1()). "'";
      $p_release_fax_comment[] = "{$person->getId()} : '". addslashes($passenger->getReleasingFax1Comment()). "'";
      $p_release_email[] = "{$person->getId()} : '". addslashes($passenger->getReleasingEmail()). "'";
      $p_lodging_name[] = "{$person->getId()} : '". addslashes($passenger->getLodgingName()). "'";
      $p_lodging_phone[] = "{$person->getId()} : '". addslashes($passenger->getLodgingPhone()). "'";
      $p_lodging_comment[] = "{$person->getId()} : '". addslashes($passenger->getLodgingPhoneComment()). "'";
      $p_facility_name[] = "{$person->getId()} : '". addslashes($passenger->getFacilityName()). "'";
      $p_facility_phone[] = "{$person->getId()} : '". addslashes($passenger->getFacilityPhone()). "'";
      $p_facility_comment[] = "{$person->getId()} : '". addslashes($passenger->getFacilityPhoneComment()). "'";
    }
  }
  ?>
  var titles = {<?php echo join(',', $p_title) ?> };
  var fnames = {<?php echo join(',', $p_fname) ?> };
  var lnames = {<?php echo join(',', $p_lname) ?> };
  var genders = {<?php echo join(',', $p_gender)?> };
  var types = {<?php echo join(',', $p_type)?>};
  var address1 = {<?php echo join(',', $p_address1)?>};
  var address2 = {<?php echo join(',', $p_address2)?>};
  var cities = {<?php echo join(',', $p_city)?>};
  var states = {<?php echo join(',', $p_state)?>};
  var zipcodes = {<?php echo join(',', $p_zipcode)?>};
  var coutries = {<?php echo join(',', $p_coutry)?>};
  var emails = {<?php echo join(',', $p_email)?>};
  var bests = {<?php echo join(',', $p_best_contact)?>};
  var ills = {<?php echo join(',', $p_illness)?>};
  var ill_cats = {<?php echo join(',', $p_illness_cat)?>};
  var financial = {<?php echo join(',', $p_financial)?>};
  var pri_cons = {<?php echo join(',', $p_private_cons)?>};
  var pub_cons = {<?php echo join(',', $p_public_cons)?>};
  var weight = {<?php echo join(',', $p_weight)?>};
  var height = {<?php echo join(',', $p_height)?>};
  var medical = {<?php echo join(',', $p_height)?>};
  var date_of = {<?php echo join(',', $p_date_of)?>};
  var languange = {<?php echo join(',', $p_language)?>};
  var enames = {<?php echo join(',', $p_ename)?>};
  var ephone1 = {<?php echo join(',', $p_ephone1)?>};
  var ecomment1 = {<?php echo join(',', $p_epcomment1)?>};
  var ephone2 = {<?php echo join(',', $p_ephone2)?>};
  var ecomment2 = {<?php echo join(',', $p_epcomment2)?>};
  var day_phone = {<?php echo join(',', $p_day_phone)?>};
  var day_comment = {<?php echo join(',', $p_day_comment)?>};
  var eve_phone = {<?php echo join(',', $p_eve_phone)?>};
  var eve_comment = {<?php echo join(',', $p_eve_comment)?>};
  var mobi_phone = {<?php echo join(',', $p_mobile_phone)?>};
  var mobi_comment = {<?php echo join(',', $p_mobile_comment)?>};
  var pager_phone = {<?php echo join(',', $p_pager_phone)?>};
  var pager_comment = {<?php echo join(',', $p_pager_comment)?>};
  var other_phone = {<?php echo join(',', $p_other_phone)?>};
  var other_comment = {<?php echo join(',', $p_other_comment)?>};
  var treating_name = {<?php echo join(',', $p_treat_name)?>};
  var treating_phone = {<?php echo join(',', $p_treat_phone)?>};
  var treating_comment = {<?php echo join(',', $p_treat_comment)?>};
  var treating_fax = {<?php echo join(',', $p_treat_fax)?>};
  var treating_fax_comment = {<?php echo join(',', $p_treat_fax_comment)?>};
  var treating_email= {<?php echo join(',', $p_treat_email)?>};
  var releasing_name = {<?php echo join(',', $p_release_name)?>};
  var releasing_phone = {<?php echo join(',', $p_release_phone)?>};
  var releasing_comment = {<?php echo join(',', $p_release_comment)?>};
  var releasing_fax = {<?php echo join(',', $p_release_fax)?>};
  var releasing_fax_comment = {<?php echo join(',', $p_release_fax_comment)?>};
  var releasing_email= {<?php echo join(',', $p_release_email)?>};
  var lodging_name= {<?php echo join(',', $p_lodging_name)?>};
  var lodging_phone= {<?php echo join(',', $p_lodging_phone)?>};
  var lodging_comment= {<?php echo join(',', $p_lodging_comment)?>};
  var facility_name= {<?php echo join(',', $p_facility_name)?>};
  var facility_phone= {<?php echo join(',', $p_facility_phone)?>};
  var facility_comment= {<?php echo join(',', $p_facility_comment)?>};

  $(document).ready(function() {
    $('.first').click(function() { return false; });
    $('.second').click(function() { return false; });
    $('.fifth').click(function() { return false; });

    if($('#add_new_passenger').hide()){
      $('#add_new_passenger').show();
    }

    $(function() {
      $("#pass1_date_of_birth").datepicker();
    });
  });

  function getPass(id){
    $('#add_new_passenger').show();

    $('#miss_req_temp6_pass_title').val('');
    $('#miss_req_temp6_pass_title').val(titles[id]);

    $('#miss_req_temp6_pass_first_name').val('');
    $('#miss_req_temp6_pass_first_name').val(fnames[id]);

    $('#miss_req_temp6_pass_last_name').val('');
    $('#miss_req_temp6_pass_last_name').val(lnames[id]);

    $('#miss_req_temp6_pass_gender').val('');
    $('#miss_req_temp6_pass_gender').val(genders[id]);

    $('#miss_req_temp6_pass_type').val('');
    $('#miss_req_temp6_pass_type').val(types[id]);

    $('#miss_req_temp6_pass_address1').val('');
    $('#miss_req_temp6_pass_address1').val(address1[id]);

    $('#miss_req_temp6_pass_address2').val('');
    $('#miss_req_temp6_pass_address2').val(address2[id]);

    $('#miss_req_temp6_pass_city').val('');
    $('#miss_req_temp6_pass_city').val(cities[id]);

    $('#miss_req_temp6_pass_state').val('');
    $('#miss_req_temp6_pass_state').val(states[id]);

    $('#miss_req_temp6_pass_zipcode').val('');
    $('#miss_req_temp6_pass_zipcode').val(zipcodes[id]);

    $('#miss_req_temp6_pass_country').val('');
    $('#miss_req_temp6_pass_country').val(coutries[id]);

    $('#miss_req_temp6_pass_email').val('');
    $('#miss_req_temp6_pass_email').val(emails[id]);

    $('#best_contact').val('');
    $('#best_contact').val(bests[id]);

    $('#miss_req_temp6_illness').val('');
    $('#miss_req_temp6_illness').val(ills[id]);

    $('#illness_cat').val('');
    $('#illness_cat').val(ill_cats[id]);

    $('#miss_req_temp6_financial').val('');
    $('#miss_req_temp6_financial').val(financial[id]);

    $('#miss_req_temp6_pass_private_cons').val('');
    $('#miss_req_temp6_pass_private_cons').val(pri_cons[id]);

    $('#miss_req_temp6_pass_public_cons').val('');
    $('#miss_req_temp6_pass_public_cons').val(pub_cons[id]);

    $('#miss_req_temp6_pass_weight').val('');
    $('#miss_req_temp6_pass_weight').val(weight[id]);

    $('#miss_req_temp6_pass_height').val('');
    $('#miss_req_temp6_pass_height').val(height[id]);

    $('#medical').val('');
    $('#medical').val(medical[id]);

    $('#miss_req_temp6_pass_language').val('');
    $('#miss_req_temp6_pass_language').val(languange[id]);

    $('#miss_req_temp6_pass_date_of_birth').val('');
    $('#miss_req_temp6_pass_date_of_birth').val(date_of[id]);

    $('#miss_req_temp6_emergency_name').val('');
    $('#miss_req_temp6_emergency_name').val(enames[id]);

    $('#miss_req_temp6_emergency_phone1').val('');
    $('#miss_req_temp6_emergency_phone1').val(ephone1[id]);

    $('#miss_req_temp6_emergency_phone1_comment').val('');
    $('#miss_req_temp6_emergency_phone1_comment').val(ecomment1[id]);

    $('#miss_req_temp6_emergency_phone2').val('');
    $('#miss_req_temp6_emergency_phone2').val(ephone2[id]);

    $('#miss_req_temp6_emergency_phone2_comment').val('');
    $('#miss_req_temp6_emergency_phone2_comment').val(ecomment2[id]);

    $('#miss_req_temp6_pass_day_phone').val('');
    $('#miss_req_temp6_pass_day_phone').val(day_phone[id]);

    $('#miss_req_temp6_pass_day_comment').val('');
    $('#miss_req_temp6_pass_day_comment').val(day_comment[id]);

    $('#miss_req_temp6_pass_eve_phone').val('');
    $('#miss_req_temp6_pass_eve_phone').val(eve_phone[id]);

    $('#miss_req_temp6_pass_eve_comment').val('');
    $('#miss_req_temp6_pass_eve_comment').val(eve_comment[id]);

    $('#miss_req_temp6_pass_mobile_phone').val('');
    $('#miss_req_temp6_pass_mobile_phone').val(mobi_phone[id]);

    $('#miss_req_temp6_pass_mobile_comment').val('');
    $('#miss_req_temp6_pass_mobile_comment').val(mobi_comment[id]);

    $('#miss_req_temp6_pass_pager_phone').val('');
    $('#miss_req_temp6_pass_pager_phone').val(pager_phone[id]);

    $('#miss_req_temp6_pass_pager_comment').val('');
    $('#miss_req_temp6_pass_pager_comment').val(pager_comment[id]);

    $('#miss_req_temp6_pass_other_phone').val('');
    $('#miss_req_temp6_pass_other_phone').val(other_phone[id]);

    $('#miss_req_temp6_pass_other_comment').val('');
    $('#miss_req_temp6_pass_other_comment').val(other_comment[id]);

    $('#miss_req_temp6_treating_physician').val('');
    $('#miss_req_temp6_treating_physician').val(treating_name[id]);

    $('#miss_req_temp6_treating_phone').val('');
    $('#miss_req_temp6_treating_phone').val(treating_phone[id]);

    $('#miss_req_temp6_treating_phone_comment').val('');
    $('#miss_req_temp6_treating_phone_comment').val(treating_comment[id]);

    $('#miss_req_temp6_treating_fax').val('');
    $('#miss_req_temp6_treating_fax').val(treating_fax[id]);

    $('#miss_req_temp6_treating_fax_comment').val('');
    $('#miss_req_temp6_treating_fax_comment').val(treating_fax_comment [id]);

    $('#miss_req_temp6_treating_email').val('');
    $('#miss_req_temp6_treating_email').val(treating_email[id]);

    $('#miss_req_temp6_facility_name').val('');
    $('#miss_req_temp6_facility_name').val(facility_name[id]);

    $('#miss_req_temp6_facility_phone').val('');
    $('#miss_req_temp6_facility_phone').val(facility_phone[id]);

    $('#miss_req_temp6_facility_phone_comment').val('');
    $('#miss_req_temp6_facility_phone_comment').val(facility_comment[id]);

    $('#release_physician').val('');
    $('#release_physician').val(releasing_name[id]);

    $('#miss_req_temp6_release_phone').val('');
    $('#miss_req_temp6_release_phone').val(releasing_phone[id]);

    $('#miss_req_temp6_release_phone_comment').val('');
    $('#miss_req_temp6_release_phone_comment').val(releasing_comment[id]);

    $('#miss_req_temp6_release_fax').val('');
    $('#miss_req_temp6_release_fax').val(releasing_fax[id]);

    $('#miss_req_temp6_release_fax_comment').val('');
    $('#miss_req_temp6_release_fax_comment').val(releasing_fax_comment[id]);

    $('#miss_req_temp6_release_email').val('');
    $('#miss_req_temp6_release_email').val(releasing_email[id]);

    $('#miss_req_temp6_lodging_name').val('');
    $('#miss_req_temp6_lodging_name').val(lodging_name[id]);

    $('#miss_req_temp6_lodging_phone').val('');
    $('#miss_req_temp6_lodging_phone').val(lodging_phone[id]);

    $('#miss_req_temp6_lodging_phone_comment').val('');
    $('#miss_req_temp6_lodging_phone_comment').val(lodging_comment[id]);

  }
  //Get matching Passenger Infos to fields

  $('#add_new_pass').click(function(){
    $('#add_new_passenger').show();
    $('#info').hide();
    $('#miss_req_temp6_pass_title').val('');
    $('#miss_req_temp6_pass_first_name').val('');
    $('#miss_req_temp6_pass_last_name').val('');
    $('#miss_req_temp6_pass_gender').val('');
    $('#miss_req_temp6_pass_type').val('');
    $('#miss_req_temp6_pass_address1').val('');
    $('#miss_req_temp6_pass_address2').val('');
    $('#miss_req_temp6_pass_city').val('');
    $('#miss_req_temp6_pass_state').val('');
    $('#miss_req_temp6_pass_zipcode').val('');
    $('#miss_req_temp6_pass_country').val('');
    $('#miss_req_temp6_pass_email').val('');
    $('#best_contact').val('');
    $('#miss_req_temp6_illness').val('');
    $('#illness_cat').val('');
    $('#miss_req_temp6_financial').val('');
    $('#miss_req_temp6_pass_private_cons').val('');
    $('#miss_req_temp6_pass_public_cons').val('');
    $('#miss_req_temp6_pass_weight').val('');
    $('#miss_req_temp6_pass_height').val('');
    $('#medical').val('');
    $('#miss_req_temp6_pass_language').val('');
    $('#miss_req_temp6_pass_date_of_birth').val('');
    $('#miss_req_temp6_emergency_name').val('');
    $('#miss_req_temp6_emergency_phone1').val('');
    $('#miss_req_temp6_emergency_phone1_comment').val('');
    $('#miss_req_temp6_emergency_phone2').val('');
    $('#miss_req_temp6_emergency_phone2_comment').val('');
    $('#miss_req_temp6_pass_day_phone').val('');
    $('#miss_req_temp6_pass_day_comment').val('');
    $('#miss_req_temp6_pass_eve_phone').val('');
    $('#miss_req_temp6_pass_eve_comment').val('');
    $('#miss_req_temp6_pass_mobile_phone').val('');
    $('#miss_req_temp6_pass_mobile_comment').val('');
    $('#miss_req_temp6_pass_pager_phone').val('');
    $('#miss_req_temp6_pass_pager_comment').val('');
    $('#miss_req_temp6_pass_other_phone').val('');
    $('#miss_req_temp6_pass_other_comment').val('');
    $('#miss_req_temp6_treating_physician').val('');
    $('#miss_req_temp6_treating_phone').val('');
    $('#miss_req_temp6_treating_phone_comment').val('');
    $('#miss_req_temp6_treating_fax').val('');
    $('#miss_req_temp6_treating_fax_comment').val('');
    $('#miss_req_temp6_treating_email').val('');
    $('#miss_req_temp6_facility_name').val('');
    $('#miss_req_temp6_facility_phone').val('');
    $('#miss_req_temp6_facility_phone_comment').val('');
    $('#release_physician').val('');
    $('#miss_req_temp6_release_phone').val('');
    $('#miss_req_temp6_release_phone_comment').val('');
    $('#miss_req_temp6_release_fax').val('');
    $('#miss_req_temp6_release_fax_comment').val('');
    $('#miss_req_temp6_release_email').val('');
    $('#miss_req_temp6_lodging_name').val('');
    $('#miss_req_temp6_lodging_phone').val('');
    $('#miss_req_temp6_lodging_phone_comment').val('');
  });

  $('#use_current').click(function (){
    $('#add_new_passenger').show();
  });

  function getCurrent(id){
    <?php
    $titles = array();
    $firstname = array();
    $lastname = array();
    $gender = array();
    $type = array();
    $address1 = array();
    $address2 = array();
    $city = array();
    $state = array();
    $zipcode = array();
    $coutry = array();
    $email = array();
    $best_contact = array();
    $illness = array();
    $illness_cat = array();
    $financial = array();
    $private_cons = array();
    $public_cons = array();
    $weight = array();
    $height = array();
    $medical = array();
    $language = array();
    $date_of = array();
    $ename = array();
    $ephone1 = array();
    $epcomment1 = array();
    $ephone2 = array();
    $epcomment2 = array();
    $day_phone = array();
    $day_comment= array();
    $eve_phone = array();
    $eve_comment= array();
    $mobile_phone = array();
    $mobile_comment= array();
    $pager_phone = array();
    $pager_comment= array();
    $other_phone = array();
    $other_comment= array();
    $treat_name= array();
    $treat_phone= array();
    $treat_comment= array();
    $treat_fax= array();
    $treat_fax_comment= array();
    $treat_email = array();
    $release_name= array();
    $release_phone= array();
    $release_comment= array();
    $release_fax= array();
    $release_fax_comment= array();
    $release_email = array();
    $lodging_name = array();
    $lodging_phone = array();
    $lodging_comment = array();
    $facility_name = array();
    $facility_phone = array();
    $facility_comment = array();

    $titles[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassTitle()). "'";
    $firstname[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassFirstname()). "'";
    $lastname[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassLastname()). "'";
    $gender[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassGender()). "'";
    $type[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassType()). "'";
    $address1[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassAddress1()). "'";
    $address2[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassAddress2()). "'";
    $city[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassCity()). "'";
    $state[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassState()). "'";
    $zipcode[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassZipcode()). "'";
    $coutry[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassCountry()). "'";
    $email[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassEmail()). "'";
    $best_contact[] = "{$miss_req->getId()} : '". addslashes($miss_req->getBestContact()). "'";
    $illness[] = "{$miss_req->getId()} : '". addslashes($miss_req->getIllness()). "'";
    $financial[] = "{$miss_req->getId()} : '". addslashes($miss_req->getFinancial()). "'";
    $private_cons[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassPrivateCons()). "'";
    $public_cons[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassPublicCons()). "'";
    $weight[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassWeight()). "'";
    $height[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassHeight()). "'";
    $medical[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassMedical()). "'";
    $date_of[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassDateOfBirth()). "'";
    $language[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassLanguage()). "'";
    $ename[] = "{$miss_req->getId()} : '". addslashes($miss_req->getEmergencyName()). "'";
    $ephone1[] = "{$miss_req->getId()} : '". addslashes($miss_req->getEmergencyPhone1()). "'";
    $epcomment1[] = "{$miss_req->getId()} : '". addslashes($miss_req->getEmergencyPhone1Comment()). "'";
    $ephone2[] = "{$miss_req->getId()} : '". addslashes($miss_req->getEmergencyPhone2()). "'";
    $epcomment2[] = "{$miss_req->getId()} : '". addslashes($miss_req->getEmergencyPhone2Comment()). "'";
    $day_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassDayPhone()). "'";
    $day_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassDayComment()). "'";
    $eve_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassEvePhone()). "'";
    $eve_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassEveComment()). "'";
    $mobile_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassMobilePhone()). "'";
    $mobile_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassMobileComment()). "'";
    $pager_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassPagerPhone()). "'";
    $pager_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassPagerComment()). "'";
    $other_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassOtherPhone()). "'";
    $other_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getPassOtherComment()). "'";
    $treat_name[] = "{$miss_req->getId()} : '". addslashes($miss_req->getTreatingPhysician()). "'";
    $treat_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getTreatingPhone()). "'";
    $treat_fax[] = "{$miss_req->getId()} : '". addslashes($miss_req->getTreatingFax()). "'";
    $treat_fax_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getTreatingFaxComment()). "'";
    $treat_email[] = "{$miss_req->getId()} : '". addslashes($miss_req->getTreatingEmail()). "'";
    $release_name[] = "{$miss_req->getId()} : '". addslashes($miss_req->getReleasingPhysician()). "'";
    $release_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getReleasePhone()). "'";
    $release_fax[] = "{$miss_req->getId()} : '". addslashes($miss_req->getReleaseFax()). "'";
    $release_fax_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getReleaseFaxComment()). "'";
    $release_email[] = "{$miss_req->getId()} : '". addslashes($miss_req->getReleaseEmail()). "'";
    $lodging_name[] = "{$miss_req->getId()} : '". addslashes($miss_req->getLodgingName()). "'";
    $lodging_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getLodgingPhone()). "'";
    $lodging_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getLodgingPhoneComment()). "'";
    $facility_name[] = "{$miss_req->getId()} : '". addslashes($miss_req->getFacilityName()). "'";
    $facility_phone[] = "{$miss_req->getId()} : '". addslashes($miss_req->getFacilityPhone()). "'";
    $facility_comment[] = "{$miss_req->getId()} : '". addslashes($miss_req->getFacilityPhoneComment()). "'";

    ?>
    var ctitles = {<?php echo join(',', $titles)?>};
    var cfnames = {<?php echo join(',', $firstname)?>};
    var clnames = {<?php echo join(',', $lastname)?>};
    var cgenders = {<?php echo join(',', $gender)?>};
    var ctypes = {<?php echo join(',', $type)?>};
    var caddress1 = {<?php echo join(',', $address1)?>};
    var caddress2 = {<?php echo join(',', $address2)?>};
    var ccities = {<?php echo join(',', $city)?>};
    var cstates = {<?php echo join(',', $state)?>};
    var czipcodes = {<?php echo join(',', $zipcode)?>};
    var ccoutries = {<?php echo join(',', $coutry)?>};
    var cemails = {<?php echo join(',', $email)?>};
    var cbests = {<?php echo join(',', $best_contact)?>};
    var cills = {<?php echo join(',', $illness)?>};
    var cill_cats = {<?php echo join(',', $illness_cat)?>};
    var cfinancial = {<?php echo join(',', $financial)?>};
    var cpri_cons = {<?php echo join(',', $private_cons)?>};
    var cpub_cons = {<?php echo join(',', $public_cons)?>};
    var cweight = {<?php echo join(',', $weight)?>};
    var cheight = {<?php echo join(',', $height)?>};
    var cmedical = {<?php echo join(',', $height)?>};
    var cdate_of = {<?php echo join(',', $date_of)?>};
    var clanguange = {<?php echo join(',', $language)?>};
    var cenames = {<?php echo join(',', $ename)?>};
    var cephone1 = {<?php echo join(',', $ephone1)?>};
    var cecomment1 = {<?php echo join(',', $epcomment1)?>};
    var cephone2 = {<?php echo join(',', $ephone2)?>};
    var cecomment2 = {<?php echo join(',', $epcomment2)?>};
    var cday_phone = {<?php echo join(',', $day_phone)?>};
    var cday_comment = {<?php echo join(',', $day_comment)?>};
    var ceve_phone = {<?php echo join(',', $eve_phone)?>};
    var ceve_comment = {<?php echo join(',', $eve_comment)?>};
    var cmobi_phone = {<?php echo join(',', $mobile_phone)?>};
    var cmobi_comment = {<?php echo join(',', $mobile_comment)?>};
    var cpager_phone = {<?php echo join(',', $pager_phone)?>};
    var cpager_comment = {<?php echo join(',', $pager_comment)?>};
    var cother_comment = {<?php echo join(',', $other_comment)?>};
    var cother_phone = {<?php echo join(',', $other_phone)?>};
    var ctreating_name = {<?php echo join(',', $treat_name)?>};
    var ctreating_phone = {<?php echo join(',', $treat_phone)?>};
    var ctreating_comment = {<?php echo join(',', $treat_comment)?>};
    var ctreating_fax = {<?php echo join(',', $treat_fax)?>};
    var ctreating_fax_comment = {<?php echo join(',', $treat_fax_comment)?>};
    var ctreating_email= {<?php echo join(',', $treat_email)?>};
    var creleasing_name = {<?php echo join(',', $release_name)?>};
    var creleasing_phone = {<?php echo join(',', $release_phone)?>};
    var creleasing_comment = {<?php echo join(',', $release_comment)?>};
    var creleasing_fax = {<?php echo join(',', $release_fax)?>};
    var creleasing_fax_comment = {<?php echo join(',', $release_fax_comment)?>};
    var creleasing_email= {<?php echo join(',', $release_email)?>};
    var clodging_name= {<?php echo join(',', $lodging_name)?>};
    var clodging_phone= {<?php echo join(',', $lodging_phone)?>};
    var clodging_comment= {<?php echo join(',', $lodging_comment)?>};
    var cfacility_name= {<?php echo join(',', $facility_name)?>};
    var cfacility_phone= {<?php echo join(',', $facility_phone)?>};
    var cfacility_comment= {<?php echo join(',', $facility_comment)?>};

    $('#miss_req_temp6_pass_title').val('');
    $('#miss_req_temp6_pass_title').val(ctitles[id]);

    $('#miss_req_temp6_pass_first_name').val('');
    $('#miss_req_temp6_pass_first_name').val(cfnames[id]);

    $('#miss_req_temp6_pass_last_name').val('');
    $('#miss_req_temp6_pass_last_name').val(clnames[id]);

    $('#miss_req_temp6_pass_gender').val('');
    $('#miss_req_temp6_pass_gender').val(cgenders[id]);

    $('#miss_req_temp6_pass_type').val('');
    $('#miss_req_temp6_pass_type').val(ctypes[id]);

    $('#miss_req_temp6_pass_address1').val('');
    $('#miss_req_temp6_pass_address1').val(caddress1[id]);

    $('#miss_req_temp6_pass_address2').val('');
    $('#miss_req_temp6_pass_address2').val(caddress2[id]);

    $('#miss_req_temp6_pass_city').val('');
    $('#miss_req_temp6_pass_city').val(ccities[id]);

    $('#miss_req_temp6_pass_state').val('');
    $('#miss_req_temp6_pass_state').val(cstates[id]);

    $('#miss_req_temp6_pass_zipcode').val('');
    $('#miss_req_temp6_pass_zipcode').val(czipcodes[id]);

    $('#miss_req_temp6_pass_country').val('');
    $('#miss_req_temp6_pass_country').val(ccoutries[id]);

    $('#miss_req_temp6_pass_email').val('');
    $('#miss_req_temp6_pass_email').val(cemails[id]);

    $('#best_contact').val('');
    $('#best_contact').val(cbests[id]);

    $('#miss_req_temp6_illness').val('');
    $('#miss_req_temp6_illness').val(cills[id]);

    $('#illness_cat').val('');
    $('#illness_cat').val(cill_cats[id]);

    $('#miss_req_temp6_financial').val('');
    $('#miss_req_temp6_financial').val(cfinancial[id]);

    $('#miss_req_temp6_pass_private_cons').val('');
    $('#miss_req_temp6_pass_private_cons').val(cpri_cons[id]);

    $('#miss_req_temp6_pass_public_cons').val('');
    $('#miss_req_temp6_pass_public_cons').val(cpub_cons[id]);

    $('#miss_req_temp6_pass_weight').val('');
    $('#miss_req_temp6_pass_weight').val(cweight[id]);

    $('#miss_req_temp6_pass_height').val('');
    $('#miss_req_temp6_pass_height').val(cheight[id]);

    $('#medical').val('');
    $('#medical').val(cmedical[id]);

    $('#miss_req_temp6_pass_language').val('');
    $('#miss_req_temp6_pass_language').val(clanguange[id]);

    $('#miss_req_temp6_pass_date_of_birth').val('');
    $('#miss_req_temp6_pass_date_of_birth').val(cdate_of[id]);

    $('#miss_req_temp6_emergency_name').val('');
    $('#miss_req_temp6_emergency_name').val(cenames[id]);

    $('#miss_req_temp6_emergency_phone1').val('');
    $('#miss_req_temp6_emergency_phone1').val(cephone1[id]);

    $('#miss_req_temp6_emergency_phone1_comment').val('');
    $('#miss_req_temp6_emergency_phone1_comment').val(cecomment1[id]);

    $('#miss_req_temp6_emergency_phone2').val('');
    $('#miss_req_temp6_emergency_phone2').val(cephone2[id]);

    $('#miss_req_temp6_emergency_phone2_comment').val('');
    $('#miss_req_temp6_emergency_phone2_comment').val(cecomment2[id]);

    $('#miss_req_temp6_pass_day_phone').val('');
    $('#miss_req_temp6_pass_day_phone').val(cday_phone[id]);

    $('#miss_req_temp6_pass_day_comment').val('');
    $('#miss_req_temp6_pass_day_comment').val(cday_comment[id]);

    $('#miss_req_temp6_pass_eve_phone').val('');
    $('#miss_req_temp6_pass_eve_phone').val(ceve_phone[id]);

    $('#miss_req_temp6_pass_eve_comment').val('');
    $('#miss_req_temp6_pass_eve_comment').val(ceve_comment[id]);

    $('#miss_req_temp6_pass_mobile_phone').val('');
    $('#miss_req_temp6_pass_mobile_phone').val(cmobi_phone[id]);

    $('#miss_req_temp6_pass_mobile_comment').val('');
    $('#miss_req_temp6_pass_mobile_comment').val(cmobi_comment[id]);

    $('#miss_req_temp6_pass_pager_phone').val('');
    $('#miss_req_temp6_pass_pager_phone').val(cpager_phone[id]);

    $('#miss_req_temp6_pass_pager_comment').val('');
    $('#miss_req_temp6_pass_pager_comment').val(cpager_comment[id]);

    $('#miss_req_temp6_pass_other_phone').val('');
    $('#miss_req_temp6_pass_other_phone').val(cother_phone[id]);

    $('#miss_req_temp6_pass_other_comment').val('');
    $('#miss_req_temp6_pass_other_comment').val(cother_comment[id]);

    $('#miss_req_temp6_treating_physician').val('');
    $('#miss_req_temp6_treating_physician').val(ctreating_name[id]);

    $('#miss_req_temp6_treating_phone').val('');
    $('#miss_req_temp6_treating_phone').val(ctreating_phone[id]);

    $('#miss_req_temp6_treating_phone_comment').val('');
    $('#miss_req_temp6_treating_phone_comment').val(ctreating_comment[id]);

    $('#miss_req_temp6_treating_fax').val('');
    $('#miss_req_temp6_treating_fax').val(ctreating_fax[id]);

    $('#miss_req_temp6_treating_fax_comment').val('');
    $('#miss_req_temp6_treating_fax_comment').val(ctreating_fax_comment [id]);

    $('#miss_req_temp6_treating_email').val('');
    $('#miss_req_temp6_treating_email').val(ctreating_email[id]);

    $('#miss_req_temp6_facility_name').val('');
    $('#miss_req_temp6_facility_name').val(cfacility_name[id]);

    $('#miss_req_temp6_facility_phone').val('');
    $('#miss_req_temp6_facility_phone').val(cfacility_phone[id]);

    $('#miss_req_temp6_facility_phone_comment').val('');
    $('#miss_req_temp6_facility_phone_comment').val(cfacility_comment[id]);

    $('#release_physician').val('');
    $('#release_physician').val(creleasing_name[id]);

    $('#miss_req_temp6_release_phone').val('');
    $('#miss_req_temp6_release_phone').val(creleasing_phone[id]);

    $('#miss_req_temp6_release_phone_comment').val('');
    $('#miss_req_temp6_release_phone_comment').val(creleasing_comment[id]);

    $('#miss_req_temp6_release_fax').val('');
    $('#miss_req_temp6_release_fax').val(creleasing_fax[id]);

    $('#miss_req_temp6_release_fax_comment').val('');
    $('#miss_req_temp6_release_fax_comment').val(creleasing_fax_comment[id]);

    $('#miss_req_temp6_release_email').val('');
    $('#miss_req_temp6_release_email').val(creleasing_email[id]);

    $('#miss_req_temp6_lodging_name').val('');
    $('#miss_req_temp6_lodging_name').val(clodging_name[id]);

    $('#miss_req_temp6_lodging_phone').val('');
    $('#miss_req_temp6_lodging_phone').val(clodging_phone[id]);

    $('#miss_req_temp6_lodging_phone_comment').val('');
    $('#miss_req_temp6_lodging_phone_comment').val(clodging_comment[id]);
  }

  $('#miss_req_temp7_mission_date').change(function()
  {
    
       var _app_date = $('#miss_req_temp7_appt_date').val();
       _app_date = _app_date.split("/");

       var _mission_date = $('#miss_req_temp7_mission_date').val();
       _mission_date = _mission_date.split("/");

       _app_date = new Date(_app_date[2], _app_date[0], _app_date[1]);
       _mission_date = new Date(_mission_date[2], _mission_date[0], _mission_date[1]);
 
    if( _app_date.getTime() < _mission_date.getTime() ){
      $('#miss_req_temp7_mission_date').val(' ');
      alert('Mission Date can not be higher than Appointment Date! ');
    }
  });
  //  ]]>
</script>
