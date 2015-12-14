<?php /* @var $coor Coordinator*/
/* @var $application Application */
$can_edit = $sf_user->hasCredential(array('Administrator','Staff'), false) ;?>

<h2>Coordinator View</h2>

<?php if ($coor_for) include_partial('coordinator/lead_for', array('coor_for' => $coor_for, 'cancel_route' => '@coordinator_view?id='.$coor->getId()))?>

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
    </dl>
    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Lead Coordinator</h4>
              <?php $lead_coordinator = $coor->getCoordinatorRelatedByLeadId(); ?>
              <?php if($lead_coordinator):?>
                <?php $member = MemberPeer::retrieveByPK($lead_coordinator->getMemberId()) ?>
                <?php if(isset($member)):?><?php $person = PersonPeer::retrieveByPK($member->getPersonId())?><?php endif?>
                <?php if(isset($person)):?>
                  <?php echo $person->getTitle() .' '.$person->getFirstName() .' '.$person->getLastName()?><br/>
                <?php endif; ?>
              <?php endif;?>

              <?php if(!isset($lead_coordinator)):?>
                <?php if ($can_edit) echo link_to('specify', '@default?module=coordinator&action=changeLead&for='.$coor->getId(), array('class' => 'link-add'));?>
              <?php else:?>
                <?php if ($can_edit) echo link_to('change', '@default?module=coordinator&action=changeLead&for='.$coor->getId(), array('class' => 'action-edit'));?>
                <?php if ($can_edit) echo link_to('unlink', '@default?module=coordinator&action=unlinkLead&id='.$coor->getId(), array('class' => 'action-remove', 'confirm' => 'Are you sure to unlink from this Coordinator?'));?><br/>
              <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <h3>Coordinator Information</h3>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><a href="<?php echo url_for('@coordinator_edit?id='.$coor->getId())?>" class="link-edit" >edit coordinator info</a><?php endif;?>
  <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?><?php  echo link_to('remove', '@person_delete?id='.$person->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$person->getName().' and related information?', 'class' => 'action-remove'));?><?php endif;?>
  
  <?php if (isset($coor_for)) {
    $member = $coor_for->getMember();
    $person = $member->getPerson();
    echo link_to('Make this record a Lead Coordinator for "'.$person->getName().'"', '@default?module=coordinator&action=changeLead&for='.$coor_for->getId().'&lead_id='.$coor->getId(), array('class' => 'link-edit'));
  }?>
  <div class="person-info">
    <dl class="person-data">
      <dt>Coor of the week:</dt>
      <dd><?php echo $coor->getCoorOfTheWeek() ? 'Yes' : 'No'?></dd>

      <dt>Coor week date:</dt>
      <dd><?php echo $coor->getCoorWeekDate('m/d/Y') ? $coor->getCoorWeekDate('m/d/Y') : '--'?></dd>

      <dt>Initial contact:</dt>
      <dd><?php echo $coor->getInitialContact() ? $coor->getInitialContact() : '--'?></dd>
    </dl>
  </div>
</div>
