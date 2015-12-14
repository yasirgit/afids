<?php use_helper('jQuery'); ?>

<?php use_stylesheets_for_form($form1);?>
<?php use_javascripts_for_form($form1);?>

<?php use_stylesheets_for_form($form2);?>
<?php use_javascripts_for_form($form2);?>

<?php use_stylesheets_for_form($form3);?>
<?php use_javascripts_for_form($form3);?>

<?php use_stylesheets_for_form($form4);?>
<?php use_javascripts_for_form($form4);?>

<?php use_stylesheets_for_form($form5);?>
<?php use_javascripts_for_form($form5);?>

<h2>Mission Request</h2>
<!--Errors-->
<div
	class="steps-area"><?php
	if($sf_context->getActionName() == 'userStep1'){
		$class1= 'first-active';
		$class2= '';
		$class3= '';
		$class4= '';
		$class5= '';
	}elseif($sf_context->getActionName() == 'userStep2'){
		$class1= 'first-checked';
		$class2= 'active';
		$class3= '';
		$class4= '';
		$class5= '';
	}elseif($sf_context->getActionName() == 'userStep3'){
		$class1= 'first-checked';
		$class2= 'checked';
		$class3= 'active';
		$class4= '';
		$class5= '';
	}elseif($sf_context->getActionName() == 'userStep4'){
		$class1= 'first-checked';
		$class2= 'checked';
		$class3= 'checked';
		$class4= 'active';
		$class5= '';
	}elseif($sf_context->getActionName() == 'userStep5'){
		$class1= 'first-checked';
		$class2= 'checked';
		$class3= 'checked';
		$class4= 'checked';
		$class5= 'active';
	}
	?>
<div class="step-list">
<ul>
	<li class="<?php echo $class1?>" style="display: list-item;"><a
		href="#" class="first"><strong>Step 1</strong><span class="right-c"></span></a>
	</li>
	<li class="<?php echo $class2?>" style="display: list-item;" id="s2"><a
		href="#" class="second">Step 2</a></li>
	<li class="<?php echo $class3?>" style="display: list-item;" id="s3"><a
		href="#" class="third">Step 3</a></li>
	<li class="<?php echo $class4?>" style="display: list-item;" id="s4"><a
		href="#" class="forth">Step 4</a></li>
	<li class="<?php echo $class5?>" style="display: list-item;" id="s5"><a
		href="#" class="fifth" onclick="goToStep5()">Step 5</a></li>
</ul>
</div>
<!--            Step 1 end-->
<div class="step" style="display: none;" id="step1">
<div class="passenger-form">
<form id="form1" action="" method="post">
<h3>Step 1. Passenger Information</h3>
<input type="hidden" name="id"
	value="<?php echo $mission_request_temp->getId() ?>" /> <input
	type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>The mission request process is 4-5 steps in which you provide
us with the information we need to match you or the passenger with a
volunteer pilot. Please provide as much information as you can. This
information will be used by the Mission Coordination staff to validate
your request and coordinate your transportation. All the data you
provide will be kept in confidence and will be used only for this
purpose.
<div class="box">
<div class="wrap"><?php echo $form1['pass_title']->renderLabel(); ?> <?php echo $form1['pass_title']->render(); ?>
<?php echo $form1['pass_title']->renderError(); ?> <?php echo $form1['_csrf_token'] ?>
</div>
<div class="wrap"><?php echo $form1['pass_first_name']->renderLabel(); ?>
<?php echo $form1['pass_first_name']->render(); ?> <?php echo $form1['pass_first_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['pass_last_name']->renderLabel(); ?>
<?php echo $form1['pass_last_name']->render(); ?> <?php echo $form1['pass_last_name']->renderError(); ?>
</div>
<div class="wrap">
<table id="radio">
	<tr>
		<td><?php if(isset($on_behalf)):?>
		<h4 style="color: red;">Please choice onbehalf of!</h4>
		<?php else:?>
		<h4 style="color: blue">Are you requesting this flight ?*</h4>
		<?php endif;?></td>
	</tr>
	<tr>
		<td><label style="margin-left: -3px">On behalf of</label> <label> <input
			name="on_behalf" type="radio" value="Yourself" id="on_behalf" />
		Yourself <label> <input name="on_behalf" type="radio" value="Else"
			id="on_behalf" /> Else</label></td>
	</tr>
	<tr>
	</tr>
</table>
</div>
<div class="wrap" id="request_by"><?php echo $form1['request_by']->renderLabel(); ?>
<?php echo $form1['request_by']->render(); ?> <?php echo $form1['request_by']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['follow_up_contact_name']->renderLabel(); ?>
<?php echo $form1['follow_up_contact_name']->render(); ?> <?php echo $form1['follow_up_contact_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['follow_up_contact_phone']->renderLabel(); ?>
<?php echo $form1['follow_up_contact_phone']->render(); ?> <?php echo $form1['follow_up_contact_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['follow_up_email']->renderLabel(); ?>
<?php echo $form1['follow_up_email']->render(); ?> <?php echo $form1['follow_up_email']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form1['pass_zipcode']->renderLabel(); ?> <?php echo $form1['pass_zipcode']->render(); ?>
<?php echo $form1['pass_zipcode']->renderError(); ?></div>
</div>
<div class="box alt">
<div class="wrap"><?php echo $form1['pass_date_of_birth']->renderLabel(); ?>
<?php echo $form1['pass_date_of_birth']->render(); ?> <?php echo $form1['pass_date_of_birth']->renderError(); ?>
</div>
<h4 style="color: blue">Where is the passenger traveling from?</h4>
<div class="wrap"><?php echo $form1['orgin_city']->renderLabel(); ?> <?php echo $form1['orgin_city']->render(); ?>
<?php echo $form1['orgin_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['orgin_state']->renderLabel(); ?> <?php echo $form1['orgin_state']->render(); ?>
<?php echo $form1['orgin_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['orgin_zipcode']->renderLabel(); ?>
<?php echo $form1['orgin_zipcode']->render(); ?> <?php echo $form1['orgin_zipcode']->renderError(); ?>
</div>
<h4 style="color: blue">Where is the passenger traveling to?</h4>
<div class="wrap"><?php echo $form1['dest_city']->renderLabel(); ?> <?php echo $form1['dest_city']->render(); ?>
<?php echo $form1['dest_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['dest_state']->renderLabel(); ?> <?php echo $form1['dest_state']->render(); ?>
<?php echo $form1['dest_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form1['dest_zipcode']->renderLabel(); ?> <?php echo $form1['dest_zipcode']->render(); ?>
<?php echo $form1['dest_zipcode']->renderError(); ?></div>
<div class="form-submit2"><br />
<br />
<br />
<br />
<a href="<?php echo url_for($referer) ?>" class="cancel" style="margin-left:10px;">Cancel</a> <a
	href="#" onclick="$('#form1').submit();return false;"
	class="btn-action"><span>Save and Continue >></span><strong>&nbsp;</strong></a>
</div>
</div>
<!--                           End box--></fieldset>
<br />
</form>
</div>
</div>
<!--           Step 2 end-->
<div class="step" style="display: none;" id="step2">
<div class="passenger-form">
<form id="form2" action="" method="post">
<h3>Step 2.Passenger Information</h3>
<input type="hidden" name="id"
	value="<?php echo $mission_request_temp->getId() ?>" /> <input
	type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>Please provide the following information about the passenger.
It is not necessary to provide all the passenger information at this
time.
<div class="box">
<div class="wrap"><?php echo $form2['pass_first_name']->renderLabel(); ?>
<?php echo $form2['pass_first_name']->render(); ?> <?php echo $form2['pass_first_name']->renderError(); ?>
<?php echo $form2['_csrf_token'] ?></div>
<div class="wrap"><?php echo $form2['pass_last_name']->renderLabel(); ?>
<?php echo $form2['pass_last_name']->render(); ?> <?php echo $form2['pass_last_name']->renderError(); ?>
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
<div class="wrap"><?php echo $form2['pass_email']->renderLabel(); ?> <?php echo $form2['pass_email']->render(); ?>
<?php echo $form2['pass_email']->renderError(); ?></div>
<div class="wrap"><?php echo $form2['pass_weight']->renderLabel().$form2['pass_height']->renderLabel();?>
<?php echo $form2['pass_weight']->render(); ?> <?php echo $form2['pass_weight']->renderError(); ?>
<?php echo $form2['pass_height']->render(); ?> <?php echo $form2['pass_height']->renderError(); ?>
</div>
</div>
<!--                                 end box     -->
<div class="box alt">
<div class="passenger-form-heading"><strong>Phone Number</strong> <strong>Comment</strong>
</div>
<div class="wrap"><?php echo $form2['pass_day_phone']->renderLabel(); ?>
<?php echo $form2['pass_day_phone']->render(); ?> <?php echo $form2['pass_day_phone']->renderError(); ?>
<?php echo $form2['pass_day_comment']->render(); ?> <?php echo $form2['pass_day_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form2['pass_eve_phone']->renderLabel(); ?>
<?php echo $form2['pass_eve_phone']->render(); ?> <?php echo $form2['pass_eve_phone']->renderError(); ?>
<?php echo $form2['pass_eve_comment']->render(); ?> <?php echo $form2['pass_eve_comment']->renderError(); ?>
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
<!--                                 end box alt     -->
<div class="form-submit"><a href="#"
	onclick="$('#form2').submit();return false;" class="btn-action"><span>Save
and Continue >></span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
</div>
</fieldset>
</form>
</div>
</div>
<!--           Step3 End-->
<div class="step" style="display: none;" id="step3">
<div class="passenger-form">
<form id="form3" action="" method="post">
<h3>Step 3: Requester Information</h3>
<input type="hidden" name="id"
	value="<?php echo $mission_request_temp->getId() ?>" /> <input
	type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="wrap"><?php echo $form3['req_first_name']->renderLabel(); ?>
<?php echo $form3['req_first_name']->render(); ?> <?php echo $form3['req_first_name']->renderError(); ?>
<?php echo $form3['_csrf_token'] ?></div>
<div class="wrap"><?php echo $form3['req_last_name']->renderLabel(); ?>
<?php echo $form3['req_last_name']->render(); ?> <?php echo $form3['req_last_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['agency_name']->renderLabel(); ?> <?php echo $form3['agency_name']->render(); ?>
<?php echo $form3['agency_name']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_address1']->renderLabel(); ?> <?php echo $form3['req_address1']->render(); ?>
<?php echo $form3['req_address1']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_address2']->renderLabel(); ?> <?php echo $form3['req_address2']->render(); ?>
<?php echo $form3['req_address2']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_city']->renderLabel(); ?> <?php echo $form3['req_city']->render(); ?>
<?php echo $form3['req_city']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_state']->renderLabel(); ?> <?php echo $form3['req_state']->render(); ?>
<?php echo $form3['req_state']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_zipcode']->renderLabel(); ?> <?php echo $form3['req_zipcode']->render(); ?>
<?php echo $form3['req_zipcode']->renderError(); ?></div>
<div class="wrap"><?php echo $form3['req_email']->renderLabel(); ?> <?php echo $form3['req_email']->render(); ?>
<?php echo $form3['req_email']->renderError(); ?></div>
</div>
<div class="box alt">
<div class="passenger-form-heading"><strong>Phone Number</strong> <strong>Comment</strong>
</div>
<div class="wrap"><?php echo $form3['req_day_phone']->renderLabel(); ?>
<?php echo $form3['req_day_phone']->render(); ?> <?php echo $form3['req_day_phone']->renderError(); ?>
<?php echo $form3['req_day_comment']->render(); ?> <?php echo $form3['req_day_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['req_eve_phone']->renderLabel(); ?>
<?php echo $form3['req_eve_phone']->render(); ?> <?php echo $form3['req_eve_phone']->renderError(); ?>
<?php echo $form3['req_eve_comment']->render(); ?> <?php echo $form3['req_eve_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['req_mobile_phone']->renderLabel(); ?>
<?php echo $form3['req_mobile_phone']->render(); ?> <?php echo $form3['req_mobile_phone']->renderError(); ?>
<?php echo $form3['req_mobile_comment']->render(); ?> <?php echo $form3['req_mobile_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['req_pager_phone']->renderLabel(); ?>
<?php echo $form3['req_pager_phone']->render(); ?> <?php echo $form3['req_pager_phone']->renderError(); ?>
<?php echo $form3['req_pager_comment']->render(); ?> <?php echo $form3['req_pager_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form3['req_other_phone']->renderLabel(); ?>
<?php echo $form3['req_other_phone']->render(); ?> <?php echo $form3['req_other_phone']->renderError(); ?>
<?php echo $form3['req_other_comment']->render(); ?> <?php echo $form3['req_other_comment']->renderError(); ?>
</div>
<!--                                 end box alt     -->
<div class="form-submit"><a href="#"
	onclick="$('#form3').submit();return false;" class="btn-action"><span>Save
and Continue >></span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
</div>
</fieldset>
</form>
</div>
</div>
<!--                Step4 end-->
<div class="step" style="display: none;" id="step4">
<div class="passenger-form">
<form id="form4" action="" method="post">
<h3>Step 4: Appointment Information</h3>
<input type="hidden" name="id"
	value="<?php echo $mission_request_temp->getId() ?>" /> <input
	type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="wrap"><?php echo $form4['appt_date']->renderLabel(); ?> <?php echo $form4['appt_date']->render(); ?>
<?php echo $form4['appt_date']->renderError(); ?> <?php echo $form4['_csrf_token'] ?>
</div>
<div class="wrap"><?php echo $form4['mission_date']->renderLabel(); ?> <?php echo $form4['mission_date']->render(); ?>
<?php echo $form4['mission_date']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['return_date']->renderLabel(); ?> <?php echo $form4['return_date']->render(); ?>
<?php echo $form4['return_date']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['pass_english']->renderLabel(); ?> <?php echo $form4['pass_english']->render(); ?>
<?php echo $form4['pass_english']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['pass_language']->renderLabel(); ?>
<?php echo $form4['pass_language']->render(); ?> <?php echo $form4['pass_language']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['pass_oxygen']->renderLabel(); ?> <?php echo $form4['pass_oxygen']->render(); ?>
<?php echo $form4['pass_oxygen']->renderError(); ?></div>
<div class="innerbox">
<h3 align="center" style="margin-top: 5px">Releasing Physician</h3>
<div class="wrap"><?php echo $form4['releasing_physician']->renderLabel(); ?>
<?php echo $form4['releasing_physician']->render(); ?> <?php echo $form4['releasing_physician']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['release_phone']->renderLabel(); ?>
<?php echo $form4['release_phone']->render(); ?> <?php echo $form4['release_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['release_phone_comment']->renderLabel(); ?>
<?php echo $form4['release_phone_comment']->render(); ?> <?php echo $form4['release_phone_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['release_fax']->renderLabel(); ?> <?php echo $form4['release_fax']->render(); ?>
<?php echo $form4['release_fax']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['release_fax_comment']->renderLabel(); ?>
<?php echo $form4['release_fax_comment']->render(); ?> <?php echo $form4['release_fax_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['release_email']->renderLabel(); ?>
<?php echo $form4['release_email']->render(); ?> <?php echo $form4['release_email']->renderError(); ?>
</div>
</div>
<div class="innerbox">
<h3 align="center">Treating Physician</h3>
<div class="wrap"><?php echo $form4['treating_physician']->renderLabel(); ?>
<?php echo $form4['treating_physician']->render(); ?> <?php echo $form4['treating_physician']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['treating_phone']->renderLabel(); ?>
<?php echo $form4['treating_phone']->render(); ?> <?php echo $form4['treating_phone']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['treating_phone_comment']->renderLabel(); ?>
<?php echo $form4['treating_phone_comment']->render(); ?> <?php echo $form4['treating_phone_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['treating_fax']->renderLabel(); ?> <?php echo $form4['treating_fax']->render(); ?>
<?php echo $form4['treating_fax']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['treating_fax_comment']->renderLabel(); ?>
<?php echo $form4['treating_fax_comment']->render(); ?> <?php echo $form4['treating_fax_comment']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['treating_email']->renderLabel(); ?>
<?php echo $form4['treating_email']->render(); ?> <?php echo $form4['treating_email']->renderError(); ?>
</div>
</div>
</div>
<div class="box alt">
<div class="innerbox">
<h3 align="center">Treatment Facility</h3>
<div class="wrap"><?php echo $form4['facility_name']->renderLabel(); ?>
<?php echo $form4['facility_name']->render(); ?> <?php echo $form4['facility_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['facility_phone']->renderLabel(); ?>
<?php echo $form4['facility_phone']->render(); ?> <?php echo $form4['facility_phone']->renderError(); ?>
<?php echo $form4['facility_phone_comment']->render(); ?> <?php echo $form4['facility_phone_comment']->renderError(); ?>
</div>
</div>
<br />
<div class="innerbox">
<h3 align="center">Passenger's Lodging</h3>
<div class="wrap"><?php echo $form4['lodging_name']->renderLabel(); ?> <?php echo $form4['lodging_name']->render(); ?>
<?php echo $form4['lodging_name']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['lodging_phone']->renderLabel(); ?>
<?php echo $form4['lodging_phone']->render(); ?> <?php echo $form4['lodging_phone']->renderError(); ?>
<?php echo $form4['lodging_phone_comment']->render(); ?> <?php echo $form4['lodging_phone_comment']->renderError(); ?>
</div>
</div>
<div class="innerbox">
<h3 align="center">Emergency Contact</h3>
<div class="wrap"><?php echo $form4['emergency_name']->renderLabel(); ?>
<?php echo $form4['emergency_name']->render(); ?> <?php echo $form4['emergency_name']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['emergency_phone1']->renderLabel(); ?>
<?php echo $form4['emergency_phone1']->render(); ?> <?php echo $form4['emergency_phone1']->renderError(); ?>
</div>
<div class="wrap"><?php echo $form4['emergency_phone1_comment']->renderLabel(); ?>
<?php echo $form4['emergency_phone1_comment']->render(); ?> <?php echo $form4['emergency_phone1_comment']->renderError(); ?>
</div>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="wrap"><?php echo $form4['illness']->renderLabel(); ?> <?php echo $form4['illness']->render(); ?>
<?php echo $form4['illness']->renderError(); ?> <?php echo $form4['illness']->renderHelp(); ?>
</div>
<div class="wrap"><?php echo $form4['financial']->renderLabel(); ?> <?php echo $form4['financial']->render(); ?>
<?php echo $form4['financial']->renderError(); ?> <?php echo $form4['financial']->renderHelp(); ?>
</div>
<div class="wrap"><?php echo $form4['pass_medical']->renderLabel(); ?> <?php echo $form4['pass_medical']->render(); ?>
<?php echo $form4['pass_medical']->renderError(); ?></div>
<div class="wrap"><?php echo $form4['referral_source_id']->renderLabel(); ?>
<?php echo $form4['referral_source_id']->render(); ?> <?php echo $form4['referral_source_id']->renderError(); ?>
</div>
<div class="form-submit"><a href="#"
	onclick="$('#form4').submit();return false;" class="btn-action"><span>Save
and Continue >></span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
</div>
</fieldset>
</form>
</div>
</div>
<!--             Step 5 end-->
<div class="step" style="display: none;" id="step5">
<div class="passenger-form">
<form id="form5" action="" method="post">
<h3>Step 5: Companion Information</h3>
<input type="hidden" name="id"
	value="<?php echo $mission_request_temp->getId() ?>" /> <input
	type="hidden" name="back" value="<?php echo $back ?>" /> <input
	type="hidden" name="referer" value="<?php echo $referer ?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<table>
	<tr>
		<th>Companion Name</th>
		<th>Relationship</th>
		<th>Date of Birth</th>
		<th>Weight</th>
		<th>Phone</th>
		<th>Comment</th>
	</tr>
	<tr>
		<td>
		<div class="wrap"><?php echo $form5['com1_name']->render(); ?> <?php echo $form5['com1_name']->renderError(); ?>
		<?php echo $form5['_csrf_token'] ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com1_relationship']->render(); ?>
		<?php echo $form5['com1_relationship']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com1_date_of_birth']->render(); ?>
		<?php echo $form5['com1_date_of_birth']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com1_weight']->render(); ?> <?php echo $form5['com1_weight']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com1_phone']->render(); ?> <?php echo $form5['com1_phone']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com1_comment']->render(); ?> <?php echo $form5['com1_comment']->renderError(); ?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="wrap"><?php echo $form5['com2_name']->render(); ?> <?php echo $form5['com2_name']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com2_relationship']->render(); ?>
		<?php echo $form5['com2_relationship']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com2_date_of_birth']->render(); ?>
		<?php echo $form5['com2_date_of_birth']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com2_weight']->render(); ?> <?php echo $form5['com2_weight']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com2_phone']->render(); ?> <?php echo $form5['com2_phone']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com2_comment']->render(); ?> <?php echo $form5['com2_comment']->renderError(); ?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="wrap"><?php echo $form5['com3_name']->render(); ?> <?php echo $form5['com3_name']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com3_relationship']->render(); ?>
		<?php echo $form5['com3_relationship']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com3_date_of_birth']->render(); ?>
		<?php echo $form5['com3_date_of_birth']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com3_weight']->render(); ?> <?php echo $form5['com3_weight']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com3_phone']->render(); ?> <?php echo $form5['com3_phone']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com3_comment']->render(); ?> <?php echo $form5['com3_comment']->renderError(); ?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="wrap"><?php echo $form5['com4_name']->render(); ?> <?php echo $form5['com4_name']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com4_relationship']->render(); ?>
		<?php echo $form5['com4_relationship']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com4_date_of_birth']->render(); ?>
		<?php echo $form5['com4_date_of_birth']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com4_weight']->render(); ?> <?php echo $form5['com4_weight']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com4_phone']->render(); ?> <?php echo $form5['com4_phone']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com4_comment']->render(); ?> <?php echo $form5['com4_comment']->renderError(); ?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<div class="wrap"><?php echo $form5['com5_name']->render(); ?> <?php echo $form5['com5_name']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com5_relationship']->render(); ?>
		<?php echo $form5['com5_relationship']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com5_date_of_birth']->render(); ?>
		<?php echo $form5['com5_date_of_birth']->renderError(); ?></div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com5_weight']->render(); ?> <?php echo $form5['com5_weight']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com5_phone']->render(); ?> <?php echo $form5['com5_phone']->renderError(); ?>
		</div>
		</td>
		<td>
		<div class="wrap"><?php echo $form5['com5_comment']->render(); ?> <?php echo $form5['com5_comment']->renderError(); ?>
		</div>
		</td>
	</tr>
</table>

<div class="form-submit"><a href="#" onclick="$('#form5').submit();return false;" class="btn-action">
	<span>Save and Done</span><strong>&nbsp;</strong></a> <a href="<?php echo url_for($referer) ?>"  class="cancel"> Cancel</a></div>
</div>
</fieldset>
</form>
</div>
</div>
<!--             Step6 End--></div>
<script type="text/javascript">
  //<![CDATA[
  /*jQuery(document).ready(function(){
  jQuery('#miss_req_temp4_app_date').bind("change", function(){
    var app_date = jQuery('#miss_req_temp4_appt_date').val();
    app_date = app_date.split("/");
    app_date = new Date( app_date[2], app_date[0], app_date[1]);
    if(isDateLowerThanToday(app_date.getTime())){
	jQuery('#miss_req_temp4_appt_date').val(" ");
	alert("Appointment date must not be smaller than today");
	return false;
    }
  });
  $('#miss_req_temp4_mission_date').change(function(){
    var mission_date = $('#miss_req_temp4_mission_date').val();
    mission_date = mission_date.split("/");
    mission_date = new Date( mission_date[2], mission_date[0], mission_date[1]);
    if(isDateLowerThanToday(mission_date.getTime())){
	$('#miss_req_temp4_mission_date').val(" ");
	alert("Mission date must not be smaller than today");
	return false;
    }
  });
  $('#miss_req_temp4_return_date').change(function(){
    var return_date = $('#miss_req_temp4_return_date').val();
    return_date = return_date.split("/");
    return_date = new Date( return_date[2], return_date[0], return_date[1]);
    if(isDateLowerThanToday(return_date.getTime())){
	$('#miss_req_temp4_return_date').val(" ");
	alert("Return date must not be smaller than today");
	return false;
    }
  });
  });*/
  $('#miss_req_temp4_return_date').change(function(){

    var app_date = $('#miss_req_temp4_appt_date').val();
    app_date = app_date.split("/");

    var return_date = $('#miss_req_temp4_return_date').val();
    return_date = return_date.split("/");

    var mission_date = $('#miss_req_temp4_mission_date').val();
    mission_date = mission_date.split("/");

    app_date = new Date( app_date[2], app_date[0], app_date[1]);
    return_date = new Date( return_date[2], return_date[0], return_date[1]);
    mission_date = new Date( mission_date[2], mission_date[0], mission_date[1]);
    
    if( return_date.getTime() < app_date.getTime()){
      $('#miss_req_temp4_return_date').val(' ');
      alert('Mission Return date can not be lower than Appointment Date! ');
      return false;
    }
    if( mission_date.getTime() > return_date.getTime() ){
      $('#miss_req_temp4_return_date').val(' ');
      alert('Mission date can not be greater than Mission Return Date! ');
    }
  });
  $('#miss_req_temp4_mission_date').change(function(){

       var _app_date = $('#miss_req_temp4_appt_date').val();
       _app_date = _app_date.split("/");

       var _mission_date = $('#miss_req_temp4_mission_date').val();
       _mission_date = _mission_date.split("/");

       _app_date = new Date(_app_date[2], _app_date[0], _app_date[1]);
       _mission_date = new Date(_mission_date[2], _mission_date[0], _mission_date[1]);

    if( _app_date.getTime() < _mission_date.getTime() ){
      $('#miss_req_temp4_mission_date').val(' ');
      alert('Mission Date can not be higher than Appointment Date! ');
    }
  });


  $(document).ready(function() {
    var action = '<?php echo $sf_context->getActionName()?>';

    if(action == 'userStep1'){
      if($('#step1').hide()){
        $('#step1').show();
      }
    }
    if(action == 'userStep2'){
      if($('#step2').hide()){
        $('#step2').show();
      }
    }
    if(action == 'userStep3'){
      if($('#step3').hide()){
        $('#step3').show();
      }
    }
    if(action == 'userStep4'){
      if($('#step4').hide()){
        $('#step4').show();
      }
    }
    if(action == 'userStep5'){
      if($('#step5').hide()){
        $('#step5').show();
      }
    }

    $('.first').click(function() { return false; });
    $('.second').click(function() { return false; });
    $('.third').click(function() { return false; });
    $('.forth').click(function() { return false; });
    $('.fifth').click(function() { return false; });

    $(function() {
      $("#pass1_date_of_birth").datepicker();
    });

    //Change state
    $("#acc_cre").change(function() {
      $("#accept").css("display","block");
    });

    $("#rej_cre").change(function() {
      $("#accept").css("display","none");
    });

    //when refresh
    if(($('#acc_cre').is(":checked"))){
      if($('#acc_cre').val() == 1){
        $("#accept").css("display","block");
      }
    }
    if(($('#rej_cre').is(":checked"))){
      if($('#rej_cre').val() == 0){
        $("#accept").css("display","none");
      }
    }
  });

  $("#radio input:radio").change(function(){
    var the_value = jQuery('#radio input:radio:checked').val();
    if(the_value == 'Else'){
      if($('#request_by').hide()){
        $('#request_by').show();
      }
    }else{
      if($('#request_by').show()){
        $('#request_by').hide();
      }
    }
  });
  function isDateLowerThanToday(date){
      var today = new Date();
      today = today.getTime();
      if(date < today) return true;
      return false;
  }
  //  ]]>
  </script>
