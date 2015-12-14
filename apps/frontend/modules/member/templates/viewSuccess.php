<?php /* @var $member Member*/
/* @var $application Application */
$can_edit = $sf_user->hasCredential(array('Administrator','Staff'), false);
?>

<h2>Member View</h2>

<?php if ($master_for) include_partial('member/master_for', array('master_for' => $master_for, 'cancel_route' => '@member_view?id='.$member->getId()))?>

<div class="person-view">
  <h3>Person
  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
  <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
  <?php } ?>
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
      <dd><?php echo $person->getCountry()?$person->getCountry():'--';?></dd>
    </dl>
  </div>
  <h3>Membership Information</h3>
  <?php  $cur_user_member_id = $sf_user->getMemberId();?>
  <?php if ( $can_edit || $member->getId() == $cur_user_member_id ) {
    echo link_to('edit member information', '@member_edit?id='.$member->getId(), array('class' => 'link-edit'));
  }?>
  
  <?php if ($master_for) {
    echo link_to('Make this record a Master Member for "'.$master_for->getPerson()->getName().'"', '@default?module=member&action=specifyMaster&for='.$master_for->getId().'&master_id='.$member->getId(), array('class' => 'link-edit'));
  }?>
  <div class="person-info">
    <dl class="person-data">
      <dt>Member External ID:</dt>
      <dd><?php if($member->getExternalId())echo $member->getExternalId();else echo '--'; ?></dd>

      <dt>Active:</dt>
      <dd><?php echo $member->getActive()?'Yes':'No'?></dd>
      
      <dt>Wing:</dt>
      <dd><?php if ($member->getWing()) echo $member->getWing()->getName(); else echo '--'?></dd>

      <?php if ($member->getSecondaryWingId()): ?>
      <dt>Secondary Wing:</dt>
      <dd><?php echo $secondWing->getName(); ?></dd>
      <?php endif;?>

      <dt>Join Date:</dt>
      <dd><?php echo $member->getJoinDate('m/d/Y')?></dd>

      <!--///////// ziyed ///////////-->

      <dt>Renewed Date:</dt>
      <dd><?php echo $member->getRenewedDate('m/d/Y') ? $member->getRenewedDate('m/d/Y') : '--' ?></dd>

      <dt>Renewal Date:</dt>
      <dd><?php echo $member->getRenewalDate('m/d/Y') ? $member->getRenewalDate('m/d/Y') : '--' ?></dd>

      <dt>Renewal Notice Date 1:</dt>
      <dd><?php echo $member->getRenewalNotice1('m/d/Y') ? $member->getRenewalNotice1('m/d/Y') : '--' ?></dd>

      <dt>Renewal Notice Date 2:</dt>
      <dd><?php echo $member->getRenewalNotice2('m/d/Y') ? $member->getRenewalNotice2('m/d/Y') : '--'?></dd>

      <dt>Renewal Notice Date 3:</dt>
      <dd><?php echo $member->getRenewalNotice3('m/d/Y') ? $member->getRenewalNotice3('m/d/Y') : '--' ?></dd>

      <dt>Renewal Notice Date 4:</dt>
      <dd><?php echo $member->getRenewalNotice4('m/d/Y') ? $member->getRenewalNotice4('m/d/Y') : '--' ?></dd>

      <!--///////// end ///////////-->

      <dt>Class:</dt>
      <dd><?php if ($member->getMemberClass()) echo $member->getMemberClass()->getName(); else echo '--';?></dd>
    </dl>

    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Master Membership</h4>
            <?php $master_member = $member->getMemberRelatedByMasterMemberId(); ?>
            <?php if ($master_member) {
              $master_person = $master_member->getPerson();
              # no need to check view permission. Cause it is displaying a member
              echo link_to('view', '@member_view?id='.$master_member->getId(), array('class' => 'action-view'));?>
              <?php if ($can_edit) echo link_to('change', '@default?module=member&action=specifyMaster&for='.$member->getId(), array('class' => 'action-edit'));?>
              <?php if ($can_edit) echo link_to('unlink', '@default?module=member&action=deleteMaster&id='.$member->getId(), array('class' => 'action-remove', 'confirm' => 'Are you sure to unlink from this Master Member?'));?><br/>
              <?php echo ($master_person->getTitle()?$master_person->getTitle().'. ':'').$master_person->getName()?><br/>
              <?php echo ($master_person->getCity()?$master_person->getCity().', ':'').$master_person->getState()?><br/>
              <?php echo $master_person->getCountry()?>
            <?php }else{?>
              <?php if ($can_edit) echo link_to('specify', '@default?module=member&action=specifyMaster&for='.$member->getId(), array('class' => 'link-add'));?>
            <?php }?>
            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h3>Personal Information</h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Date of Birth:</dt>
      <dd><?php echo $member->getDateOfBirth('m/d/Y') ? $member->getDateOfBirth('m/d/Y') : '--'?></dd>

      <dt>Weight:</dt>
      <dd><?php echo $member->getWeight() ? $member->getWeight() : '--'?></dd>

      <dt>Spouse / Emergency Contact Name:</dt>
      <dd><?php echo $member->getSpouseName() ? $member->getSpouseName() : '--'?></dd>

      <dt>Languages:</dt>
      <dd><?php echo $member->getLanguages() ? $member->getLanguages() : '--'?></dd>

      <dt>Automatic Contact:</dt>
      <dd><?php echo $member->getContact() ? $member->getContact() : '--'?></dd>

      <dt>Coordinator's Notes:</dt>
      <dd><?php echo $member->getCoordinatorNotes() ? $member->getCoordinatorNotes() : '--'?></dd>
    </dl>
  </div>

  <h3>Pilot Information</h3>
  <div class="person-info">
    <dl class="person-data">
      <dt>Flight Status:</dt>
      <dd><?php echo $member->getFlightStatus() ? $member->getFlightStatus() : '--'?></dd>

      <dt>Co-pilot:</dt>
      <dd><?php echo $member->getCoPilot() ? 'Yes' : 'No'?></dd>
    </dl>

    <div class="preferences" style="width:325px; float:left;">
      <div class="frame">
        <div class="bg">
          <div class="holder">
            <h4>Pilot</h4>
            <?php $pilot = $member->getPilot()?>
            <?php if ($pilot) {?>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('view', '@pilot_view?id='.$pilot->getId(), array('class' => 'action-view'))?>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('edit', '@pilot_edit?id='.$pilot->getId(), array('class' => 'action-edit'))?>
              
              <dl>
                <dt>License Type:</dt>
                <dd><?php echo $pilot->getLicenseType()?></dd>

                <dt>IFR Rated</dt>
                <dd><?php echo $pilot->getIfr() ? 'Yes' : 'No'?></dd>

                <dt>Airport</dt>
                <dd>
                  <?php $airport = $pilot->getAirport()?>
                  <?php if ($airport) echo $airport->getIdent(); else echo '--'?>
                </dd>
              </dl>
            <?php }else{?>
              <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('add pilot', '@pilot_create?member_id='.$member->getId(), array('class' => 'link-add'))?>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <h3>Availability</h3>
  <div class="person-info">
    <dl class="person-data">
      <?php $availability = $member->getAvailability();?>
      <?php if ($availability) {?>
        <dt></dt>
        <dd>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('view', '@default?module=availability&action=view&id='.$availability->getId(), array('class' => 'action-view'));?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('edit', '@default?module=availability&action=edit&id='.$availability->getId(), array('class' => 'action-edit'));?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) //echo link_to('remove', '@default?module=availability&action=delete&id='.$availability->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Remove availability record for this member?'));?>
        </dd>
        
        <dt>First Date:</dt>
        <dd><?php echo $availability->getFirstDate('m/d/Y') ? $availability->getFirstDate('m/d/Y') : '--'?></dd>

        <dt>Last Date:</dt>
        <dd><?php echo $availability->getLastDate('m/d/Y') ? $availability->getLastDate('m/d/Y') : '--'?></dd>
        
        <dt><?php echo $availability->getNotAvailable() ? 'Not available' : 'Available';?></dt>
        <dd></dd>
      <?php }else{?>
        <dt></dt>
        <dd><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) echo link_to('add', '@default?module=availability&action=new&member_id='.$member->getId(), array('class' => 'link-add'));?></dd>
      <?php }?>
    </dl>
  </div>
 
  <h3>Coordinator</h3>
  <div class="person-info">
    <dl class="person-data">
      <?php $is_coor = CoordinatorPeer::getByMemberId($member->getId());?>
      <?php if (isset($is_coor)):?>
        <dt></dt>
        <dd>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@coordinator_view?id='.$is_coor->getId())?>" class="link-view">view</a><?php endif;?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) :?><a href="<?php echo url_for('@coordinator_edit?id='.$is_coor->getId())?>" class="link-edit">edit coordinator info</a><?php endif;?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) :?><?php echo link_to('remove', '@coordinator_delete?id='.$is_coor->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove and related information?', 'class' => 'action-remove'));?><?php endif;?>
        </dd>
        
        <dt>Coordinator of the Week:</dt>
        <dd><?php echo $is_coor->getCoorOfTheWeek() ? 'Yes' : 'No'?></dd>

        <dt>Coordinator week date:</dt>
        <dd><?php echo $is_coor->getCoorWeekDate('m/d/Y') ? $is_coor->getCoorWeekDate('m/d/Y') : '--'?></dd>
        
        <dt>Initial contact:</dt>
        <dd><?php echo $is_coor->getInitialContact() ? $is_coor->getInitialContact() : '--'?></dd>
      <?php else:?>
        <dt></dt>
        <dd><?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) :?><a href="<?php echo url_for('coordinator/update?member_id='.$member->getId()) ?>" class="link-add">add</a><?php endif;?></dd>
      <?php endif; ?>
    </dl>
  </div>
  
  <div class="person-table-data">
    <h3>Applications</h3>
    <table>
      <tr class="alt">
        <td class="cell-1" style="width: 140px;">Date</td>
        <td class="cell-1">Renewal</td>
        <td class="cell-1"></td>
        <td class="cell-1"></td>
        <td class="cell-1"></td>
      </tr>
      <?php $i = 1;?>
      <?php foreach ($applications as $i => $application) {?>
      <tr <?php if ($i%2) echo 'class="alt"'?>>
        <td><?php echo $application->getDate('m/d/Y g:i A') ? $application->getDate('m/d/Y g:i A') : '--'?></td>
        <td><?php echo $application->getRenewal() ? 'Yes' : 'No'?></td>
        <td><?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) echo link_to('view', '@default?module=application&action=view&id='.$application->getId(), array('class' => 'action-view'))?></td>
        <td><?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) echo link_to('edit', '@default?module=application&action=edit&id='.$application->getId(), array('class' => 'action-edit'))?></td>
        <td><?php if ($sf_user->hasCredential(array('Administrator'), false)) echo link_to('remove', '@default?module=application&action=delete&id='.$application->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Are you sure to remove this application?'))?></td>
      </tr>
      <?php }?>
      <tr <?php if ($i%2 == 0) echo 'class="alt"'?>>
        <td colspan="5"><?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) echo link_to('add', '@default?module=application&action=new&member_id='.$member->getId(), array('class' => 'link-add'))?></td>
      </tr>
    </table>
  </div>
</div>
<script type="text/javascript">
</script>