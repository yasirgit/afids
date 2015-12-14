<?php /* @var $application_temp ApplicationTemp */?>
<h2>MEMBERSHIP APPLICATION</h2>

<div class="person-view">
<h3>Section 1, Pilots and Non-pilots</h3>
<table class="form-table">
	<tr>
		<th>Name</th>
		<td><?php echo $application_temp->getFirstName().' '.$application_temp->getLastName()?></td>
		<th>Application Date</th>
		<td><?php echo $application_temp->getApplicationDate('n/j/Y g:i a')?></td>
	</tr>
	<tr>
		<th>Member ID</th>
		<td colspan="3"><?php echo $application_temp->getMemberId() ? $application_temp->getMemberId() : '--'?></td>
	</tr>
	<tr>
		<th>Address</th>
		<td><?php if ($application_temp->getAddress1().$application_temp->getAddress2()) {?>
		<?php echo $application_temp->getAddress1().'<br/>'.$application_temp->getAddress2()?>
		<?php }else echo '--'?></td>
		<th>Phone(s)</th>
		<td><?php if ($v = $application_temp->getDayPhone()) echo 'Day: '.$v?><br />
		<?php if ($v = $application_temp->getEvePhone()) echo 'Evening: '.$v?><br />
		<?php if ($v = $application_temp->getMobilePhone()) echo 'Mobile: '.$v?><br />
		<?php if ($v = $application_temp->getPagerPhone()) echo 'Pager: '.$v?><br />
		<?php if ($v = $application_temp->getOtherPhone()) echo 'Other: '.$v?><br />
		</td>
	</tr>
	<tr>
		<th>Email</th>
		<td colspan="3"><?php echo $application_temp->getEmail() ? $application_temp->getEmail() : '--'?></td>
	</tr>
	<tr>
		<th>Company Name</th>
		<td><?php echo $application_temp->getCompanyName() ? $application_temp->getCompanyName() : '--'?></td>
		<th>Company Match Funds?</th>
		<td><?php echo $application_temp->getCompanyMatchFunds() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>Spouse Name</th>
		<td colspan="3"><?php if ($application_temp->getSpouseFirstName().$application_temp->getSpouseLastName()) { ?>
		<?php echo $application_temp->getSpouseFirstName().' '.$application_temp->getSpouseLastName()?>
		<?php }else echo '--'?></td>
	</tr>
	<tr>
		<th>Other Languages</th>
		<td colspan="3"><?php echo $application_temp->getLanguagesSpoken() ? $application_temp->getLanguagesSpoken() : '--'?></td>
	</tr>
	<tr>
		<th>Applicant Pilot</th>
		<td><?php echo $application_temp->getApplicantPilot() ? 'Yes' : 'No'?></td>
		<th>Spouse Pilot</th>
		<td><?php echo $application_temp->getSpousePilot() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>Referral</th>
		<td colspan="3"><?php $ref = $application_temp->getReferralSource()?>
		<?php if (isset($ref)) $v = $ref->getName().'<br/>'; else $v = ''?> <?php $v .= $application_temp->getReferralSourceOther()?>
		<?php echo $v ? $v : '--'?></td>
	</tr>
	<tr>
		<th>If a non-pilot, would you like to fly as a mission assistant</th>
		<td colspan="3"><?php echo $application_temp->getApplicantCopilot() ? 'Yes' : 'No'?></td>
	</tr>
</table>

<h3>Section 2, Pilots Only</h3>
<table class="form-table">
	<tr>
		<th>Home Base</th>
		<td><?php echo $application_temp->getHomeBase()?></td>
		<th>FBO(s)</th>
		<td><?php echo $application_temp->getFboName()?></td>
	</tr>
	<tr>
		<th>Height</th>
		<td><?php echo $application_temp->getHeight()?></td>
		<th>Weight</th>
		<td><?php echo $application_temp->getWeight()?></td>
	</tr>
	<tr>
		<th>Insurance Agreed</th>
		<td colspan="3"><?php echo $application_temp->getInsuranceAgreed() ? 'Agreed' : 'Not agreed'?></td>
	</tr>
	<tr>
		<th>Pilot Certificate</th>
		<td><?php echo $application_temp->getPilotCertificate()?></td>
		<th>Total Hours</th>
		<td><?php echo $application_temp->getTotalHours()?></td>
	</tr>
	<tr>
		<th>Date of Birth</th>
		<td><?php echo $application_temp->getDateOfBirth('n/j/Y')?></td>
		<th>Other Hours</th>
		<td><?php echo $application_temp->getOtherHours()?> <b>IFR:</b> <?php echo $application_temp->getIfrHours()?>
		<b>Multi:</b> <?php echo $application_temp->getMultiHours()?></td>
	</tr>
	<tr>
		<th>Ratings</th>
		<td colspan="3"><?php echo $application_temp->getRatings()?></td>
	</tr>
</table>

<fieldset style="border-style: ridge;"><legend><b>Aircraft</b></legend>

<table>
	<tr>
		<th>Make/Model</th>
		<th>Own</th>
		<th>Seats</th>
		<th>Icing</th>
		<th>Tail #</th>
	</tr>
	<tr>
		<td><?php if ($v = $application_temp->getAircraftPrimary()) echo $v->getMakeModel()?></td>
		<td><?php echo $application_temp->getAircraftPrimaryOwn() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftPrimarySeats()?></td>
		<td><?php echo $application_temp->getAircraftPrimaryIce() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftPrimaryNNumber()?></td>
	</tr>
	<tr>
		<td><?php if ($v = $application_temp->getAircraftSecondary()) echo $v->getMakeModel()?></td>
		<td><?php echo $application_temp->getAircraftSecondaryOwn() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftSecondarySeats()?></td>
		<td><?php echo $application_temp->getAircraftSecondaryIce() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftSecondaryNNumber()?></td>
	</tr>
	<tr>
		<td><?php if ($v = $application_temp->getAircraftThird()) echo $v->getMakeModel()?></td>
		<td><?php echo $application_temp->getAircraftThirdOwn() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftThirdSeats()?></td>
		<td><?php echo $application_temp->getAircraftThirdIce() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAircraftThirdNNumber()?></td>
	</tr>
</table>
</fieldset>

<fieldset style="border-style: ridge;"><legend><b>Availability</b></legend>

<table>
	<tr>
		<th>Weekdays</th>
		<th>Weeknights</th>
		<th>Weekends</th>
		<th>With Notice</th>
		<th>Last Minute</th>
		<th>Co-pilot</th>
	</tr>
	<tr>
		<td><?php echo $application_temp->getAvailabilityWeekdays() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAvailabilityWeeknights() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAvailabilityWeekends() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAvailabilityNotice() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAvailabilityLastMinute() ? 'Yes' : 'No'?></td>
		<td><?php echo $application_temp->getAvailabilityCopilot() ? 'Yes' : 'No'?></td>
	</tr>
</table>
</fieldset>

<h3>Section 3, Other Information</h3>
<fieldset style="border-style: ridge;"><legend><b>Interests</b></legend>

<table>
	<tr>
		<td>Mission orientation: <?php echo $application_temp->getMissionOrientation() ? 'Yes' : 'No'?><br />
		Mission coordination: <?php echo $application_temp->getMissionCoordination() ? 'Yes' : 'No'?><br />
		Pilot recruitment: <?php echo $application_temp->getPilotRecruitment() ? 'Yes' : 'No'?><br />
		Fund raising: <?php echo $application_temp->getFundRaising() ? 'Yes' : 'No'?><br />
		Celebrities: <?php echo $application_temp->getCelebrityContacts() ? 'Yes' : 'No'?><br />
		Hospital outreach: <?php echo $application_temp->getHospitalOutreach() ? 'Yes' : 'No'?><br />
		Media relations: <?php echo $application_temp->getMediaRelations() ? 'Yes' : 'No'?><br />
		</td>
		<td>Telephone: <?php echo $application_temp->getTelephoneWork() ? 'Yes' : 'No'?><br />
		Computers: <?php echo $application_temp->getComputers() ? 'Yes' : 'No'?><br />
		Clerical: <?php echo $application_temp->getClerical() ? 'Yes' : 'No'?><br />
		Publicity: <?php echo $application_temp->getPublicity() ? 'Yes' : 'No'?><br />
		Writing: <?php echo $application_temp->getWriting() ? 'Yes' : 'No'?><br />
		Speakers bureau: <?php echo $application_temp->getSpeakersBureau() ? 'Yes' : 'No'?><br />
		Wing Team: <?php echo $application_temp->getWingTeam() ? 'Yes' : 'No'?><br />
		</td>
		<td>Graphic arts: <?php echo $application_temp->getGraphicArts() ? 'Yes' : 'No'?><br />
		Event planning: <?php echo $application_temp->getEventPlanning() ? 'Yes' : 'No'?><br />
		Web/Internet: <?php echo $application_temp->getWebInternet() ? 'Yes' : 'No'?><br />
		Foundations: <?php echo $application_temp->getFoundationContacts() ? 'Yes' : 'No'?><br />
		Aviation Contacts: <?php echo $application_temp->getAviationContacts() ? 'Yes' : 'No'?><br />
		Printing: <?php echo $application_temp->getPrinting() ? 'Yes' : 'No'?><br />
		</td>
	</tr>
</table>
</fieldset>

<table class="form-table">
	<tr>
		<th>Member AOPA</th>
		<td><?php echo $application_temp->getMemberAopa() ? 'Yes' : 'No'?></td>
		<th>Member Rotary</th>
		<td><?php echo $application_temp->getMemberRotary() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>Member Kiwanis</th>
		<td><?php echo $application_temp->getMemberKiwanis() ? 'Yes' : 'No'?></td>
		<th>Member Lions</th>
		<td><?php echo $application_temp->getMemberLions() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>Member 99s</th>
		<td><?php echo $application_temp->getMember99s() ? 'Yes' : 'No'?></td>
		<th>Member WIA</th>
		<td><?php echo $application_temp->getMemberWia() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>HSEATS Interest</th>
		<td colspan="3"><?php echo $application_temp->getHseatsInterest() ? 'Yes' : 'No'?></td>
	</tr>
	<tr>
		<th>Premium Choice</th>
		<td colspan="3"><?php
		foreach (sfConfig::get('app_premium_choices', array()) as $key => $choice) {
			if ($choice[2] == $application_temp->getPremiumSize() && $choice[1] == $application_temp->getPremiumChoice()) {
				echo $choice[0];
				break;
			}
		}
		?></td>
	</tr>
</table>
</div>
