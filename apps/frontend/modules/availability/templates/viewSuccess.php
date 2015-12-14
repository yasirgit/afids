<?php /* @var $member Member */?>
<?php /* @var $person Person */?>
<?php /* @var $availability Availability */?>

<h2>Availability for <?php echo $person->getName()?></h2>

<div class="person-view">
  <h3>Member Information
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

      <dt>Wing</dt>
      <dd><?php if ($member->getWing()) echo $member->getWing()->getName(); else echo '--'?></dd>
    </dl>
  </div>

  <h3>Availability</h3>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('edit', '@default?module=availability&action=edit&id='.$availability->getId(), array('class' => 'action-view'));?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('remove', '@default?module=availability&action=delete&id='.$availability->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Remove availability record for this member?'));?>
  <br/>
  If you are permanently or indefinitely <u>NOT</u> available for flights,
  check "Not Available".
  <div class="person-info">
    <dl class="person-data">
      <dt>General Availability:</dt>
      <dd><?php echo $availability->getNotAvailable() ? 'Not available' : 'Available'?></dd>
    </dl>
  </div>
  If you are generally available for flights, but will be unavailable for
  a specified period, for example, due to travel or aircraft maintenance,
  please enter a start and end date for that period below. If you will be
  unavailable indefinitely starting at a particular date, you may leave the
  end date blank. You may also add a brief comment if you believe it would
  be helpful for the coordinators.
  <div class="person-info">
    <dl class="person-data">
      <dt>Start Date:</dt>
      <dd><?php echo $availability->getFirstDate('m/d/Y') ? $availability->getFirstDate('m/d/Y') : '--'?></dd>

      <dt>End Date:</dt>
      <dd><?php echo $availability->getLastDate('m/d/Y') ? $availability->getLastDate('m/d/Y') : '--'?></dd>

      <dt>Comment:</dt>
      <dd><?php echo $availability->getAvailabilityComment() ? $availability->getAvailabilityComment() : '--'?></dd>
    </dl>
  </div>
  Please specify your general availability during the periods indicated
  below. Check the box if you are <u>NOT</u> available during these periods.
  <div class="person-info">
    <dl class="person-data">
      <dt>Weekdays:</dt>
      <dd><?php echo $availability->getNoWeekday() ? 'Not available' : 'Available'?></dd>

      <dt>Nights:</dt>
      <dd><?php echo $availability->getNoNight() ? 'Not available' : 'Available'?></dd>

      <dt>Weekends:</dt>
      <dd><?php echo $availability->getNoWeekend() ? 'Not available' : 'Available'?></dd>
    </dl>
  </div>
  Please specify your general availability for last minute flights. You will
  always be given notice where possible, and of course, will never be
  obligated to take a last minute flight.
  <div class="person-info">
    <dl class="person-data">
      <dt>For Last Minute flights:</dt>
      <dd><?php echo $availability->getLastMinute() ? 'Available' : 'Not available'?></dd>
    </dl>
  </div>
  If you wish to fly as a mission assistant, please indicate below.
  <div class="person-info">
    <dl class="person-data">
      <dt>As Mission Assistant:</dt>
      <dd><?php echo $availability->getAsMissionMssistant() ? 'Available' : 'Not available'?></dd>
    </dl>
  </div>
</div>
