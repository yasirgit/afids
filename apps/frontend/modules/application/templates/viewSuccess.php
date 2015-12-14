<?php
/* @var $person Person */
/* @var $member Member */
/* @var $app Application */
?>

<h2>Member Application View</h2>
<div class="person-view">
  <h3>Member
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
    <a class="action-view" href="<?php echo url_for('@member_view?id='.$member->getId())?>">View</a>
  <?php }?>
  </h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Name:</dt>
      <dd><?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?></dd>

      <dt>Location:</dt>
      <dd>
        <?php if ($person->getCity().$person->getState()){?>
          <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?>
        <?php }else echo "--";?>
      </dd>

      <dt>Country:</dt>
      <dd><?php echo $person->getCountry()?$person->getCountry():'--'?></dd>

      <dt>Wing:</dt>
      <dd><?php if ($member->getWing()) echo $member->getWing()->getName(); else echo '--'?></dd>
    </dl>
  </div>

  <h3>Application</h3>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) echo link_to('edit', '@default?module=application&action=edit&id='.$app->getId(), array('class' => 'action-edit'))?>
  <?php if ($sf_user->hasCredential(array('Administrator'), false)) echo link_to('remove', '@default?module=application&action=delete&id='.$app->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Are you sure to remove this application?'))?>
  <div class="person-info">
    <dl class="person-data">
      <dt>Renewal:</dt>
      <dd><?php echo $app->getRenewal() ? 'Yes' : 'No' ?></dd>

      <dt>Application Date:</dt>
      <dd><?php echo $app->getDate('U') ? $app->getDate('m/d/Y g:i A') : '--' ?></dd>

      <dt>Vocation Class Name:</dt>
      <dd><?php if ($app->getVocationClass()) echo $app->getVocationClass(); else echo '--'?></dd>

      <dt>Company Name:</dt>
      <dd><?php echo $app->getCompany() ? $app->getCompany() : '--'?></dd>

      <dt>Position:</dt>
      <dd><?php echo $app->getCompanyPosition() ? $app->getCompanyPosition() : '--'?></dd>

      <dt>Company Match Funds?</dt>
      <dd><?php echo $app->getCompanyMatchFunds() ? 'Yes' : 'No'?></dd>
    </dl>
  </div>

  <h3>Pilot Information</h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Applicant Pilot?</dt>
      <dd><?php echo $app->getApplicantPilot() ? 'Yes' : 'No'?></dd>

      <dt>Languages Spoken:</dt>
      <dd><?php echo $app->getLanguagesSpoken() ? $app->getLanguagesSpoken() : '--'?></dd>

      <dt>IFR:</dt>
      <dd><?php echo $app->getIfr() ? 'Yes' : 'No'?></dd>

      <dt>Single-engine Instructor:</dt>
      <dd><?php echo $app->getSeInstructor() ? 'Yes' : 'No'?></dd>

      <dt>Other Ratings:</dt>
      <dd><?php echo $app->getOtherRatings() ? $app->getOtherRatings() : '--'?></dd>

      <dt>IFR Hours:</dt>
      <dd><?php echo number_format((int)$app->getIfrHours())?></dd>

      <dt>Other Hours:</dt>
      <dd><?php echo number_format((int)$app->getTotalHours())?></dd>

      <dt>Medical Class:</dt>
      <dd><?php if (isset($medical_classes[$app->getMedicalClass()])) echo $medical_classes[$app->getMedicalClass()]; else echo '--'?></dd>

      <dt>FBO:</dt>
      <dd><?php echo $app->getFbo() ? $app->getFbo() : '--'?></dd>


      <dt>Height:</dt>
      <dd><?php echo $app->getHeight() ? $app->getHeight() : '--'?></dd>

      <dt>Affirmation Agreed:</dt>
      <dd><?php echo $app->getAffirmationAgreed() ? 'Yes' : 'No'?></dd>
    </dl>
    
    <dl class="person-data">
      <dt>Spouse / Emergency Contact:</dt>
      <dd>
        <?php $v = $app->getSpouseFirstName().' '.$app->getSpouseLastName()?>
        <?php echo $v ? $v : '--'?>
        (<?php echo $app->getSpousePilot() ? 'pilot' : 'non-pilot'?>)
      </dd>

      <dt>License Type:</dt>
      <dd><?php echo $app->getLicenseType() ? $app->getLicenseType() : '--'?></dd>

      <dt>Multi-engine:</dt>
      <dd><?php echo $app->getMultiEngine() ? 'Yes' : 'No'?></dd>

      <dt>Multi-engine Instructor:</dt>
      <dd><?php echo $app->getMeInstructor() ? 'Yes' : 'No'?></dd>

      <dt>Total Flights Hours:</dt>
      <dd><?php echo number_format((int)$app->getTotalHours())?></dd>

      <dt>Multi Hours:</dt>
      <dd><?php echo number_format((int)$app->getMultiHours())?></dd>

      <dt>Pilot Certificate:</dt>
      <dd><?php echo $app->getPilotCertificate() ? $app->getPilotCertificate() : '--'?></dd>

      <dt>Home Base:</dt>
      <dd><?php echo $app->getHomeBase() ? $app->getHomeBase() : '--'?></dd>

      <dt>Secondary home Base:</dt>
      <dd><?php echo $app->getSecondaryHomeBases() ? $app->getSecondaryHomeBases() : '--'?></dd>

      <dt>Date of Birth:</dt>
      <dd><?php echo $app->getDateOfBirth('m/d/Y')?></dd>

      <dt>Weight:</dt>
      <dd><?php echo $app->getWeight() ? $app->getWeight() : '--'?></dd>
    </dl>

  </div>

  <h3>Volunteer Opportunities</h3>
  <div class="person-info">
    <dl class="person-data" style="width: 180px;">
      <dt>Mission Orientation</dt>
      <dd><?php echo $app->getMissionOrientation() ? 'Yes' : 'No'?></dd>

      <dt>Mission Coordination</dt>
      <dd><?php echo $app->getMissionCoordination() ? 'Yes' : 'No'?></dd>

      <dt>Pilot Recruitment</dt>
      <dd><?php echo $app->getPilotRecruitment() ? 'Yes' : 'No'?></dd>

      <dt>Fundraising</dt>
      <dd><?php echo $app->getFundRaising() ? 'Yes' : 'No'?></dd>

      <dt>Celebrity Contacts</dt>
      <dd><?php echo $app->getCelebrityContacts() ? 'Yes' : 'No'?></dd>

      <dt>Outreach to Hospitals</dt>
      <dd><?php echo $app->getHospitalOutreach() ? 'Yes' : 'No'?></dd>
      
      <dt>Event Planning</dt>
      <dd><?php echo $app->getEventPlanning() ? 'Yes' : 'No'?></dd>

      <dt>Aviation Contacts</dt>
      <dd><?php echo $app->getAviationContacts() ? 'Yes' : 'No'?></dd>

      <dt>Other Volunteer</dt>
      <dd><?php echo $app->getOtherVolunteer() ? $app->getOtherVolunteer() : '--'?></dd>
      <dd></dd>
    </dl>
    <dl class="person-data" style="width: 180px;">
      <dt>Member Meetings</dt>
      <dd><?php echo $app->getMemberMeetings() ? 'Yes' : 'No'?></dd>

      <dt>Media Relations</dt>
      <dd><?php echo $app->getMediaRelations() ? 'Yes' : 'No'?></dd>

      <dt>Telephone Work</dt>
      <dd><?php echo $app->getTelephoneWork() ? 'Yes' : 'No'?></dd>

      <dt>Computers</dt>
      <dd><?php echo $app->getComputers() ? 'Yes' : 'No'?></dd>

      <dt>Clerical</dt>
      <dd><?php echo $app->getClerical() ? 'Yes' : 'No'?></dd>

      <dt>General Publicity</dt>
      <dd><?php echo $app->getPublicity() ? 'Yes' : 'No'?></dd>

      <dt>Web / Internet</dt>
      <dd><?php echo $app->getWebInternet() ? 'Yes' : 'No'?></dd>
    </dl>
    <dl class="person-data" style="width: 180px;">
      <dt>Writing</dt>
      <dd><?php echo $app->getWriting() ? 'Yes' : 'No'?></dd>

      <dt>Speaker Bureau</dt>
      <dd><?php echo $app->getSpeakersBureau() ? 'Yes' : 'No'?></dd>

      <dt>Executive Board</dt>
      <dd><?php echo $app->getExecutiveBoard() ? 'Yes' : 'No'?></dd>

      <dt>Wing Team</dt>
      <dd><?php echo $app->getWingTeam() ? 'Yes' : 'No'?></dd>

      <dt>Graphic Arts</dt>
      <dd><?php echo $app->getGraphicArts() ? 'Yes' : 'No'?></dd>

      <dt>Foundation Contacts</dt>
      <dd><?php echo $app->getFoundationContacts() ? 'Yes' : 'No'?></dd>

      <dt>Printing</dt>
      <dd><?php echo $app->getPrinting() ? 'Yes' : 'No'?></dd>
    </dl>
  </div>

  <h3>Memberships</h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Member AOPA:</dt>
      <dd><?php echo $app->getMemberAopa() ? 'Yes' : 'No'?></dd>

      <dt>Member Rotary:</dt>
      <dd><?php echo $app->getMemberRotary() ? 'Yes' : 'No'?></dd>
    </dl>

    <dl class="person-data">
      <dt>Member Kiwanis:</dt>
      <dd><?php echo $app->getMemberRotary() ? 'Yes' : 'No'?></dd>

      <dt>Member Lions:</dt>
      <dd><?php echo $app->getMemberLions() ? 'Yes' : 'No'?></dd>
    </dl>
  </div>

  <?php /*
  <h3>Aircraft</h3>
  <div class="person-table-data">
    <table>
      <tbody>
        <tr class="alt">
          <td class="cell-1">Primary </td>
          <td class="cell-1">Make / Model</td>
          <td class="cell-1">Own / Rent</td>
          <td class="cell-1">Icing</td>
          <td class="cell-1">Seats</td>
          <td class="cell-1">NNumber</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  */?>

  <h3>Payment Information</h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Dues Amount:</dt>
      <dd><?php echo number_format($app->getDuesAmountPaid(), 2)?></dd>

      <dt>Method of Payment:</dt>
      <dd><?php echo $app->getMethodOfPayment()?></dd>

      <dt>Premium Choice:</dt>
      <dd><?php if (isset($premium_choices[$app->getPremiumChoice()])) echo $premium_choices[$app->getPremiumChoice()]; else echo '--'?></dd>
      
      <dt>Novapointe ID:</dt>
      <dd><?php echo $app->getNovapointeId()?></dd>

      <dt>Premium Ship Method:</dt>
      <dd><?php echo $app->getPremiumShipMethod() ? $app->getPremiumShipMethod() : '--'?></dd>

      <dt>Referral Source:</dt>
      <dd><?php if ($app->getRefSource()) echo $app->getRefSource(); else echo '--'?></dd>
    </dl>

    <dl class="person-data">
      <dt>Donation Amount:</dt>
      <dd><?php echo number_format($app->getDonationAmountPaid(), 2)?></dd>

      <dt>Approval:</dt>
      <dd><?php echo $app->getCcardApprovalNumber() ? $app->getCcardApprovalNumber() : '--'?></dd>

      <dt>Premium Size:</dt>
      <dd><?php if (isset($premium_sizes[$app->getPremiumSize()])) echo $premium_sizes[$app->getPremiumSize()]; else echo '--'?></dd>

      <dt>Premium Ship:</dt>
      <dd><?php echo $app->getPremiumShipCost() ? $app->getPremiumShipCost() : '--'?></dd>

      <dt>Tracking #:</dt>
      <dd><?php echo $app->getPremiumShipTrackingNumber() ? $app->getPremiumShipTrackingNumber() : '--'?></dd>
    </dl>
  </div>
</div>


