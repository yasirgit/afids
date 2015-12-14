<?php
/* @var $passenger Passenger */
/* @var $companion Companion */
/* @var $sf_user MyUser */
$can_edit_comp = $sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false);
$can_delete_comp = $sf_user->hasCredential(array('Administrator','Staff'), false);
?>

<?php if($frommission){ ?>
  <a href="<?php echo $back ?>" > << Back to mission view </a>
<?php } else{  ?>
  <a href="<?php echo $back ?>" > << Back to previous link  </a>
<?php }  ?>
  
<h2>Passenger View</h2>

<div class="person-view"> 
  <h3>Person
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
    <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
  <?php }?>
  </h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Name:</dt>
      <dd><?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?></dd>
      
      <dt>Location:</dt>
      <dd>
        <?php if ($person->getCity().$person->getState()) { ?>
          <?php echo ($person->getCity() ? $person->getCity().', ':'').$person->getState()?>
        <?php } else echo "--";?>
      </dd>

      <dt>Country:</dt>
      <dd><?php echo $person->getCountry() ? $person->getCountry() : '--'?></dd>
    </dl>
  </div>

  <h3>Passenger</h3>
  <?php
  if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
    echo link_to('edit passenger information', '@passenger_edit?id='.$passenger->getId(), array('class' => 'link-edit'));
  }
  ?>
 
 <?php
   if ($mission_for) {
    //echo link_to('Make this passenger a Selecting Passenger for Mission "'.$mission_for->getId().'"', '@default?module=passenger&action=change&for='.$mission_for->getId().'&id='.$passenger->getId(), array('class' => 'link-edit'));
  }
  ?>
  <div class="person-info">
    <dl class="person-data">
      <dt>Passenger Type:</dt>
      <dd><?php if ($passenger_type = $passenger->getPassengerType()) echo $passenger_type; else echo '--'?></dd>

      <dt>Parent Name:</dt>
      <dd><?php echo $passenger->getParent()?$passenger->getParent():'--'?></dd>

      <dt>Date of Birth:</dt>
      <dd><?php echo $passenger->getDateOfBirth('m/d/Y')?$passenger->getDateOfBirth('m/d/Y'):'--'?></dd>
      
      <dt>Weight:</dt>
      <dd><?php echo $passenger->getWeight()?$passenger->getWeight():'--'?></dd>

      <dt>Passenger Illness:</dt>
      <dd><?php echo $passenger->getIllness()?$passenger->getIllness():'--'?></dd>

      <dt>Illness Category:</dt>
      <dd><?php if ($pa_ill_cat = $passenger->getPassengerIllnessCategory()) echo $pa_ill_cat; else echo '--'?></dd>

      <dt>Language Spoken:</dt>
      <dd><?php echo $passenger->getLanguageSpoken()?$passenger->getLanguageSpoken():'--'?></dd>
    </dl>
    <dl class="person-data">
      <dt>Best Contacted By:</dt>
      <dd><?php echo $passenger->getBestContactMethod()?$passenger->getBestContactMethod():'--';?></dd>

      <dt>Financial Information:</dt>
      <dd><?php echo $passenger->getFinancial()?$passenger->getFinancial():'--'?></dd>

      <dt>Public Considerations:</dt>
      <dd><?php echo $passenger->getPublicConsiderations()?$passenger->getPublicConsiderations():'--'?></dd>

      <dt>Private Considerations:</dt>
      <dd><?php echo $passenger->getPrivateConsiderations()?$passenger->getPrivateConsiderations():'--'?></dd>

      <dt>Ground Transportation:</dt>
      <dd><?php echo $passenger->getGroundTransportationComment()?$passenger->getGroundTransportationComment():'--'?></dd>

      <dt>Travel History Notes:</dt>
      <dd><?php echo $passenger->getTravelHistoryNotes()?$passenger->getTravelHistoryNotes():'--'?></dd>
    </dl>
  </div>

  <div class="preferences">
    <div class="frame">
      <div class="bg">
        <div class="holder">
          <h4>Releasing Physician</h4>
          <dl>
            <dt>Name:</dt>
            <dd><?php echo $passenger->getReleasingPhysician()?$passenger->getReleasingPhysician():'--'?></dd>

            <dt>Phone:</dt>
            <dd><?php echo $passenger->getReleasingPhone()?$passenger->getReleasingPhone():'--'?></dd>

            <dt>Fax:</dt>
            <dd>
              <?php if ($passenger->getReleasingFax1().$passenger->getReleasingFax1Comment()) {?>
                <?php echo $passenger->getReleasingFax1()?>
                <?php echo $passenger->getReleasingFax1Comment()?>
              <?php }else echo '--'?>
            </dd>

            <dt>Email:</dt>
            <dd><?php echo $passenger->getReleasingEmail()?$passenger->getReleasingEmail():'--'?></dd>

            <dt>Medical Release Required:</dt>
            <dd><?php echo $passenger->getNeedMedicalRelease()?'Yes':'No'?></dd>
            
            <dt>Medical Release Requested:</dt>
            <dd><?php echo $passenger->getMedicalReleaseRequested('U')?$passenger->getMedicalReleaseRequested('m/d/Y'):'--'?></dd>
            
            <dt>Medical Release Received:</dt>
            <dd><?php echo $passenger->getMedicalReleaseReceived('U')?$passenger->getMedicalReleaseReceived('m/d/Y'):'--'?></dd>
          </dl>
        </div>
        
        <div class="holder">
          <h4>Treating Physician</h4>
          <dl class="alt">
            <dt>Name:</dt>
            <dd><?php echo $passenger->getTreatingPhysician()?$passenger->getTreatingPhysician():'--'?></dd>

            <dt>Phone:</dt>
            <dd><?php echo $passenger->getTreatingPhone()?$passenger->getTreatingPhone():'--'?></dd>

            <dt>Fax:</dt>
            <dd>
              <?php if ($passenger->getTreatingFax1().$passenger->getTreatingFax1Comment()) {?>
                <?php echo $passenger->getTreatingFax1()?>
                <?php echo $passenger->getTreatingFax1Comment()?>
              <?php }else echo '--'?>
            </dd>

            <dt>Email:</dt>
            <dd><?php echo $passenger->getTreatingEmail()?$passenger->getTreatingEmail():'--'?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
  
  <div class="preferences">
    <div class="frame">
      <div class="bg">
        <div class="holder">
          <h4>Destination Lodging</h4>
          <dl>
            <dt>Name:</dt>
            <dd><?php echo $passenger->getLodgingName()?$passenger->getLodgingName():'--'?></dd>

            <dt>Phone:</dt>
            <dd><?php echo $passenger->getLodgingPhone()?$passenger->getLodgingPhone():'--'?></dd>

            <dt>Phone Comment:</dt>
            <dd><?php echo $passenger->getLodgingPhoneComment()?$passenger->getLodgingPhoneComment():'--'?></dd>
          </dl>
        </div>

        <div class="holder">
          <h4>Destination Facility</h4>
          <dl class="alt">
            <dt>Name:</dt>
            <dd><?php echo $passenger->getFacilityName()?$passenger->getFacilityName():'--'?></dd>

            <dt>Phone:</dt>
            <dd><?php echo $passenger->getFacilityPhone()?$passenger->getFacilityPhone():'--'?></dd>

            <dt>Phone Comment:</dt>
            <dd><?php echo $passenger->getFacilityPhoneComment()?$passenger->getFacilityPhoneComment():'--'?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <h3>Companions</h3>
  <div class="person-table-data">
    <table style="width:700px;">
    <tbody>
      <tr class="alt">
        <td><b>Name</b></td>
        <td><b>Relationship</b></td>
        <td><b>Date of Birth</b></td>
        <td><b>Weight</b></td>
        <td><b>Phone</b></td>
        <td></td>
        <td></td>
      </tr>
      <?php $i=1; foreach ($companions as $i => $companion) {?>
      <tr <?php if ($i%2) echo 'class="alt"'?>>
        <td class="cell-1"><?php echo $companion->getName()?></td>
        <td><?php echo $companion->getRelationship()?></td>
        <td><?php echo $companion->getDateOfBirth('m/d/Y')?></td>
        <td><?php echo $companion->getWeight()?></td>
        <td><?php echo $companion->getCompanionPhone().' '.$companion->getCompanionPhoneComment()?></td>
        <td><?php if ($can_edit_comp) echo link_to('edit', '@companion_edit?id='.$companion->getId(), array('class' => 'link-edit'))?></td>
        <td><?php if ($can_delete_comp) echo link_to('remove', '@companion_delete?id='.$companion->getId(), array('class' => 'action-remove', 'post' => true, 'confirm' => 'Are you sure to remove companion \''.$companion->getName().'\''))?></td>
      </tr>
      <?php }?>
      <?php if ($can_edit_comp) {?>
      <tr <?php if ($i%2==0) echo 'class="alt"'?>>
        <td colspan="2">
        <?php if(isset($back)):?>
             <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){?>
             <?php echo link_to('add companion', '@companion_create?passenger_id='.$passenger->getId().'&back='.$back, array('class' => 'link-add'));?>
             <?php } ?>
        <?php else:?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)){?>
            <?php echo link_to('add companion', '@companion_create?passenger_id='.$passenger->getId(), array('class' => 'link-add'));?>
            <?php } ?>

        <?php endif;?>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <?php }?>
    </tbody>
    </table>
  </div>

  <h3>Emergency Contact Information</h3>
  <div class="person-info">
    <div class="person-data">
      <dl>
        <dt>Emergency Contact Name:</dt>
        <dd><?php echo $passenger->getEmergencyContactName()?$passenger->getEmergencyContactName():'--'?></dd>

        <dt>Primary Phone:</dt>
        <dd>
          <?php if ($passenger->getEmergencyContactPrimaryPhone().$passenger->getEmergencyContactPrimaryComment()) {?>
            <?php echo $passenger->getEmergencyContactPrimaryPhone()?>
            <?php echo $passenger->getEmergencyContactPrimaryComment()?>
          <?php }else echo '--'?>
        </dd>

        <dt>Secondary Phone:</dt>
        <dd>
          <?php if ($passenger->getEmergencyContactSecondaryPhone().$passenger->getEmergencyContactSecondaryComment()) {?>
            <?php echo $passenger->getEmergencyContactSecondaryPhone()?>
            <?php echo $passenger->getEmergencyContactSecondaryComment()?>
          <?php }else echo '--'?>
        </dd>
      </dl>
    </div>
  </div>
</div>