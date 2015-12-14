<?php if ($person) $person_id = $person->getId(); else $person_id = null?>

<div class="step" style="display: block;">
<div class="passenger-form">
<form
	action="<?php echo url_for('pending_member/processStep2?id='.$form->getObject()->getId().($person_id ? '&person_id='.$person_id : '')) ?>"
	method="post"><?php echo $form->renderHiddenFields()?>
<div class="box full">
<div class="wrap"><label>Pilot Info</label> Applicant is <?php if ($form->getObject()->getApplicantPilot()) {
	echo 'pilot with '.$form->getObject()->getTotalHours().' hours';
}else{
	echo 'non-pilot';
}?></div>
<div class="wrap"><?php echo $form['spouse_first_name']->renderLabel() ?>
<?php echo $form['spouse_first_name'] ?> <?php echo $form['spouse_first_name']->renderError() ?>
<?php echo $form['spouse_last_name'] ?> <?php echo $form['spouse_last_name']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['languages_spoken']->renderLabel() ?>
<?php echo $form['languages_spoken'] ?> <?php echo $form['languages_spoken']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['emergency_contact_name']->renderLabel() ?>
<?php echo $form['emergency_contact_name'] ?> <?php echo $form['emergency_contact_name']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['emergency_contact_phone']->renderLabel() ?>
<?php echo $form['emergency_contact_phone'] ?> <?php echo $form['emergency_contact_phone']->renderError() ?>
</div>
<div class="wrap"><label
	for="<?php echo $form['drivers_license_state']->renderId()?>">Drivers
License</label>
<div class="wrap"><?php echo $form['drivers_license_state']->renderHelp() ?>
<br clear="all" />
<?php echo $form['drivers_license_state']->renderLabel() ?> <?php echo $form['drivers_license_state'] ?>
<?php echo $form['drivers_license_state']->renderError() ?> <br
	clear="all" />
<?php echo $form['drivers_license_number']->renderLabel() ?> <?php echo $form['drivers_license_number'] ?>
<?php echo $form['drivers_license_number']->renderError() ?></div>
</div>
<div class="wrap"><?php echo $form['date_of_birth']->renderLabel() ?> <?php echo $form['date_of_birth'] ?>
<?php echo $form['date_of_birth']->renderHelp() ?> <?php echo $form['date_of_birth']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['height']->renderLabel() ?> <?php echo $form['height'] ?>
inches <?php echo $form['height']->renderError() ?></div>
<div class="wrap"><?php echo $form['weight']->renderLabel() ?> <?php echo $form['weight'] ?>
pounds <?php echo $form['weight']->renderError() ?></div>
<div class="wrap"><?php echo $form['member_class_id']->renderLabel() ?>
<?php echo $form['member_class_id'] ?> <?php echo $form['member_class_id']->renderError() ?>
</div>
<div class="wrap"><?php echo $form['wing_id']->renderLabel() ?> <?php echo $form['wing_id'] ?>
<?php echo $form['wing_id']->renderError() ?></div>

<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step2_submit').click(); return false;"><span>Save and
Continue »</span><strong> </strong></a> <a class="cancel" href="#"
	onclick="$('.first').click();">&laquo; Back</a> <input type="submit"
	id="step2_submit" value="submit" class="hide" /></div>
</div>
</form>
</div>
</div>
