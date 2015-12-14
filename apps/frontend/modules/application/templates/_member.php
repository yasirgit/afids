<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Member
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) {?>
          <a class="action-view" href="<?php echo url_for('@member_view?id='.$member->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?><br/>
        <dl>
          <dt>Wing</dt>
          <dd><?php if ($member->getWing()) echo $member->getWing()->getName(); else echo '--'?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>