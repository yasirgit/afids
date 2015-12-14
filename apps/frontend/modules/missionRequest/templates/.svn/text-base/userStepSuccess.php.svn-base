<h2>Mission Request</h2>

<div class="passenger-form">
<form id="form" action="<?php echo url_for('missionRequest/userStep')?>"
	method="post"><?php if($not_agreed == 'yes'):?>
<h4>Step1.Mission Guidelines</h4>
<input type="hidden" name="referer" value="<?php echo $referer ?>" /> <input
	type="hidden" id="back" name="back" value="<?php echo $back?>" /> <?php if(isset($f_back)): ?><input
	type="hidden" name="f_back" value="<?php echo $f_back ?>" /><?php endif;?>
<fieldset>
<div class="box">
<div class="person-view">Thank you for your interest in Angel Flight
West. We look forward to assisting you with your travel needs. Please
make your request for transportation using this convenient online
request form, but before you begin, please review the acceptance
criteria below and make sure that you meet all the stated requirements.

<h4>Acceptance Criteria for Angel Flight West</h4>

Qualifying for an Angel Flight West Mission As our mission statement
says, Angel Flight West arranges free air transportation on private
aircraft in response to health care and other compelling human needs.
Our volunteer members are private pilots who use their own aircraft. All
Angel Flights are free of charge; there is never a fee of any kind,
either to the patient or the health care provider, for an Angel Flight.
The costs are paid by the volunteer pilots. If you need transportation
to medical treatment, or feel that you have a compelling human need
which can be met through transportation in a private airplane, we
encourage you to contact Angel Flight, either by email or by phone at
(888) 4-AN-ANGEL, or 888-426-2643. However, we do have certain
requirements and pre-requisites. Please read these over before
contacting the office! Thanks, this will help prevent our volunteers
from having to field unnecessary calls. <br />
<br />
<b># Distance.</b> Angel Flight provides transportation in the Western
States and Hawaii only: Alaska, Arizona, California, Colorado, Hawaii,
Idaho, Montana, Nevada, New Mexico, Oregon, Utah, Washington, and
Wyoming. For longer flights or flights originating in other regions, go
to the Angel Flight America National Patient Travel Center Web Site. <br />
<br />
<b># Advance Notice.</b> Under most circumstances, you must schedule a
flight at least five working days in advance. In some cases we can
accommodate shorter lead-times (for example, transplant situations), but
we cannot guarantee finding a pilot under those circumstances. <br />
<br />
<b># Financial Need.</b> We will provide transportation to meet a
variety of needs, but there must ordinarily be a financial need on the
part of the recipient. Remember that our pilots are volunteers, and they
are making a substantial financial contribution (sometimes as much as
$1,000 for one flight) in addition to their time, so please be aware
that the flight should be a charitable cause. There may also be some
reason why private aircraft is the only option over commercial
transportation, for example, if an individual lives in a rural area
without easy access to commercial transportation, or if a person is
highly susceptible to infection and cannot be exposed to crowds. <br />
<br />
<b># Medical Condition.</b> Passengers must be medically stable,
ambulatory, and be able to sit up in an airplane seat for the duration
of the flight. Our pilots are not medically trained. Angel Flight is not
an air ambulance service. <br />
<br />
<b># Medical Release from Physician.</b> Passengers will be required to
provide a medical release signed by a physician indicating that the
passenger is satisfactory medical condition to take the flight. <br />
<br />
If you meet the criteria above, and you feel you have a compelling need
which could be met through air transportation, please indicate as such
below and click Continue to proceed.</div>
<div class="wrap" align="left">
<table>
	<tr>
		<td bgcolor="white"><font color=red>* </font>I meet all the criteria
		specified above, and wish to continue with the mission request.</td>
	</tr>
	<tr>
		<td bgcolor="white"><label> <input name="acc_cre" type="radio"
			value="1" id="acc_cre" /> Yes</label> <label> <input name="acc_cre"
			type="radio" value="0" id="rej_cre" /> No</label></td>
	</tr>
</table>
</div>
<div class="form-submit"><a href="#"
	onclick="$('#form').submit();return false;" class="btn-action"><span>Save
and Continue >></span><strong>&nbsp;</strong></a> <a
	href="<?php echo url_for('missionRequest/index') ?>" class="cancel">Cancel</a>
</div>
</div>
</fieldset>
<?php elseif($not_agreed == 'no'):?>
<h4>Mission Request</h4>
If you do not meet our criteria, there are other resources for
compassionate medical transportation. You can contact the National
Patient Air Transport Helpline at www.npath.org or by phone at
1-800-296-1217. If you wish to speak with one of our mission
coordinators, please call toll-free 1-888-4-AN-ANGEL or send email to
info@angelflight.org. <?php endif;?></form>
</div>
