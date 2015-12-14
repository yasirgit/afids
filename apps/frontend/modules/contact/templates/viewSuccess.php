<h2>Contact Information</h2>

<div class="passenger-form">
<div class="person-view"> 
<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
            $person = $contact->getPerson();
            ?>
          <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
      </div>
    </div>
  </div>
</div>
  <div class="person-info">
    <dl class="person-data">

        <dt class="dt1">Ref Source:</dt>
      <dd><?php echo $contact->getRefSource() ?></dd>
      <dt class="dt1">Send Application Format:</dt>
              <dd><?php echo $contact->getSendAppFormat(); ?></dd>
      <dt class="dt1">Comment:</dt>
              <dd><?php echo $contact->getComment(); ?></dd>
      <dt class="dt1">Letter Sent:</dt>
              <dd><?php echo $contact->getLetterSent(); ?></dd>
      <dt class="dt1">Contact Type:</dt>
              <dd><?php echo $contact->getContactType(); ?></dd>
      <dt class="dt1">Company Name:</dt>
              <dd><?php echo $contact->getCompanyName(); ?></dd><br/>
              <dd>
                  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) {?>
                    <a href="<?php echo url_for('@contact_edit?id='.$contact->getId()) ?>" class="action-edit">Edit</a>
                  <?php } ?>
              </dd>
      </dl>
  </div>
  </div>
</div>