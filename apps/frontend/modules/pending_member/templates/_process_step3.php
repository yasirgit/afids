<?php if ($person) $person_id = $person->getId(); else $person_id = null?>

<div class="step" style="display: block;">
<div class="passenger-form">
<h3>Submit Premium Shipment to Pacific West</h3>

The following order will be submitted to Pacific West for Fulfillment:

<form
	action="<?php echo url_for('pending_member/processStep3?id='.$application_temp->getId().($person_id ? '&person_id='.$person_id : '')) ?>"
	method="post"><input type="hidden" name="skip_order" value="0" />
<div class="box full">
<div class="wrap"><label>Name</label> <?php echo $application_temp->getFirstName().' '.$application_temp->getLastName()?>
</div>
<div class="wrap"><label>Address</label> <?php echo $application_temp->getAddress1()?><br />
<?php echo $application_temp->getAddress2()?></div>
<div class="wrap"><label>City/State/Zip</label> <?php echo $application_temp->getCity()?>,
<?php echo $application_temp->getState()?> <?php echo $application_temp->getZipcode()?>
</div>
<div class="wrap"><label>Phone</label> <?php echo $application_temp->getDayPhone()?>
</div>
<div class="wrap"><label>Premium choice</label> <?php
foreach (sfConfig::get('app_premium_choices', array()) as $key => $choice) {
	if ($choice[2] == $application_temp->getPremiumSize() && $choice[1] == $application_temp->getPremiumChoice()) {
		echo $choice[0];
		break;
	}
}
?></div>
<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step3_submit').click(); return false;"><span>Submit Order
»</span><strong> </strong></a> <a class="btn-action" href="#"
	onclick="$('#step3_redirect').val(1); $('#step3_submit').click(); return false;"><span>Skip
Order »</span><strong> </strong></a> <a class="cancel" href="#"
	onclick="$('.second').click();">&laquo; Back</a> <input type="submit"
	id="step3_submit" value="submit" class="hide" /> <input type="hidden"
	name="step3_redirect" id="step3_redirect" value="0" class="hide" /></div>
</div>
</form>
</div>
</div>
