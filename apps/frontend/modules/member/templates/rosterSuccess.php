<?php use_helper('Form') ?>

<h2>Member Roster</h2>

<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('member/roster')?>">
    <input type="hidden" name="filter" value="1"/>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="characteristic_clean">
          <div class="holder">
            <div>
              <label for="ff_pilot_status">Pilot Status</label>
              <?php echo select_tag('pilot_status', options_for_select($pilot_statuses, $pilot_status))?>
            </div>
            <div>
              <label for="ff_wing_id">Wing</label>
              <?php echo select_tag('wing_id', options_for_select($wings, $wing_id))?>
            </div>
            <div>
              <label for="ff_state">State</label>
              <input type="text" value="<?php echo $state?>" id="ff_state" name="state" class="text"/>
            </div>
            <div>
              <label for="ff_home_base">Home Base</label>
              <input type="text" value="<?php echo $home_base?>" id="ff_home_base" name="home_base" class="text"/>
            </div>
            <div>
              <label for="ff_area_code">Area Code</label>
              <input type="text" value="<?php echo $area_code?>" id="ff_area_code" name="area_code" class="text"/>
            </div>
            <div>
              <label for="ff_email">Email Address</label>
              <input type="text" value="<?php echo $email?>" id="ff_email" name="email" class="text"/>
            </div>
          </div>
        </div>
        <div class="ad-mission-filter">
          <div class="holder">
            <strong>Pilot Qualifications</strong>
            <ul>
              <li>
                <input type="checkbox" id="ff_ifr" value="1" name="ifr" <?php echo $ifr ? 'checked="checked"' : ''?>/>
                <label for="ff_ifr">IFR Rated</label>
              </li>
              <li>
                <input type="checkbox" id="ff_multi" value="1" name="multi" <?php echo $multi ? 'checked="checked"' : ''?>/>
                <label for="ff_multi">Multi-Engine</label>
              </li>
              <li>
                <input type="checkbox" id="ff_instructor" value="1" name="instructor" <?php echo $instructor ? 'checked="checked"' : ''?>/>
                <label for="ff_instructor">Instructor</label>
              </li>
            </ul>
          </div>
        </div>
        <div class="ad-mission-filter">
          <div class="holder">
            <strong>Positions</strong>
            <ul>
              <li>
                <input type="checkbox" id="ff_board_member" value="1" name="board_member" <?php echo $board_member ? 'checked="checked"' : ''?>/>
                <label for="ff_board_member">Board Member</label>
              </li>
              <li>
                <input type="checkbox" id="ff_coordinator" value="1" name="coordinator" <?php echo $coordinator ? 'checked="checked"' : ''?>/>
                <label for="ff_coordinator">Coordinator</label>
              </li>
              <li>
                <input type="checkbox" id="ff_orientation_pilot" value="1" name="orientation_pilot" <?php echo $orientation_pilot ? 'checked="checked"' : ''?>/>
                <label for="ff_orientation_pilot">Orientation Pilot</label>
              </li>
              <?php foreach ($wing_jobs as $wing_job):?>
                <li>
                  <input
                  <?php if (in_array($wing_job->getShortName(), $sf_data->getRaw('wing_job1'))):?>
                    checked="checked"
                  <?php endif;?>
                  id="<?php echo $wing_job->getShortName()?>" type="checkbox" name="wing_job1[]" value="<?php echo $wing_job->getShortName()?>" />
                  <label for="<?php echo $wing_job->getShortName()?>"><?php echo $wing_job->getName()?></label>
                </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <input type="submit" value="Get List"/>
        <?php echo link_to('reset', 'member/roster?filter=1')?>
      </div>
    </div>
  </form>
</div>

<div class="pager">
  <div>
    <form action="<?php echo url_for('member/roster')?>">
      <?php echo link_to('Previous', 'member/roster?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'member/roster?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'member/roster?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Name</td>
      <td>Contact</td>
      <td>Pilot</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($members as $member) {
    /* @var $member Member */
    $person = $member->getPerson();
    $pilot = $member->getPilot();
    ?>
    <tr>
      <td>
        <?php echo $member->getId()?><br/>
        <strong><?php echo $person->getName()?></strong><br/>
        <?php echo $person->getAddress1().' '.$person->getAddress2()?><br/>
        <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?><br/>
        DOB:<?php echo $member->getDateOfBirth('m/d/Y')?><br/>
        <?php if ($pilot) echo '# Missions: '.$pilot->countMissionLegsRelatedByPilotId()?>
      </td>
      <td>
        <?php
        if ($person->getDayPhone()) echo 'Day: '.$person->getDayPhone().' '.$person->getDayComment().'<br/>';
        if ($person->getEveningPhone()) echo 'Eve: '.$person->getEveningPhone().' '.$person->getEveningComment().'<br/>';
        if ($person->getMobilePhone()) echo 'Mobile: '.$person->getMobilePhone().' '.$person->getMobileComment().'<br/>';
        if ($person->getFaxPhone1()) echo 'Fax1: '.$person->getFaxPhone1().' '.$person->getFaxComment1().'<br/>';
        if ($person->getPagerPhone()) echo 'Pager: '.$person->getPagerPhone().' '.$person->getPagerComment().'<br/>';
        if ($person->getEmail()) echo 'Email: '.mail_to($person->getEmail());
        ?>
      </td>
      <td>
        <?php echo $member->getFlightStatus()?><br/>
        <?php if ($pilot) echo 'License: '.$pilot->getLicenseType().'<br/>' ?>
        <?php if ($pilot) echo 'IFR: '.($pilot->getIfr() ? 'Yes' : 'No').'<br/>'?>
        <?php if ($pilot) echo 'Multi: '.($pilot->getMultiEngine() ? 'Yes' : 'No').'<br/>'?>
        <?php if ($pilot) echo 'SEI: '.$pilot->getSeInstructor().'<br/>'?>
        <?php if ($pilot) echo 'MEI: '.$pilot->getMeInstructor().'<br/>'?>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>

<div class="pager">
  <div>
    <form action="<?php echo url_for('member/roster')?>">
      <?php echo link_to('Previous', 'member/roster?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'member/roster?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'member/roster?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>