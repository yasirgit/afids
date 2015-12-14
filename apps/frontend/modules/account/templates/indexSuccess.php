<?php use_helper('Global', 'jQuery', 'Form');
/* @var $pilot Pilot */
/* @var $member Member */
/* @var $availability Availability */
/* @var $person Person */
$subscribed_list = $sf_data->getRaw('subscribed_list');
$member = $sf_data->getRaw('member');
$pilot = $sf_data->getRaw('pilot');
?>

<h2>Account Settings</h2>
<?php if ($availability->getNotAvailable() == 1) {?>
<font color="red">
  Your current status is set to unavailable.
  <?php echo link_to('Click here', 'availability/editOwn')?> to change this setting.
</font>
<?php }?>

<div class="preferences">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Your personal information
          <?php echo link_to('Edit', '@account_edit?id='.$person->getId(), array('class' => 'link-edit'));?>
        </h4>
        <div style="float:left; width: 130px;">
          <?php echo $person->getName()?>
          <?php echo $person->getAddress1().' '.$person->getAddress2()?><br/>
          <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
        </div>
        <div style="width: 140px; float:right;">
          <?php
          if ($person->getDayPhone()) echo 'Day: '.$person->getDayPhone().' '.$person->getDayComment().'<br/>';
          if ($person->getEveningPhone()) echo 'Evening: '.$person->getEveningPhone().' '.$person->getEveningComment().'<br/>';
          if ($person->getMobilePhone()) echo 'Mobile: '.$person->getMobilePhone().' '.$person->getMobileComment().'<br/>';
          if ($person->getPagerPhone()) echo 'Pager: '.$person->getPagerPhone().' '.$person->getPagerComment().'<br/>';
          ?>
        </div>
      </div>
      
      <div class="holder">
        <h4>Mailing List Management</h4>
        <dl>
          <?php /* @var $email_list EmailList */?>
          <?php foreach ($email_lists as $email_list) {?>
            <dt><?php echo $email_list->getDescription()?>:</dt>
            <dd>
              <?php if ($email_list->getIsPrivate() != 1) {?>
                <?php echo jq_link_to_remote(in_array($email_list->getId(), $subscribed_list) ? 'un-subscribe' : 'subscribe', array(
                  'url' => 'account/toggle?name=email_list&id='.$email_list->getId(),
                  'success' => "jQuery('#email_list_{$email_list->getId()}_toggle').html(data);"
                ), array('id' => 'email_list_'.$email_list->getId().'_toggle'));?>
              <?php }else echo in_array($email_list->getId(), $subscribed_list) ? 'subscribed' : 'not subscribed'?>
            </dd>
          <?php }?>
        </dl>
      </div>
    </div>
  </div>
</div>

<div class="preferences" <?php if (!($member instanceof Member)) echo 'style="width:340px;"'?>>
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Password
          <?php echo link_to('Edit','@password_edit?id='.$person->getId(), array('class' => 'link-edit'));?>
        </h4>
        Click edit to change the password to your AFIDS account
      </div>
      <?php if ($member instanceof Member){?>
      <div class="holder">
        <h4>Membership Status <?php if($due_day<=30) echo link_to('renew today', 'renewal/step1');?></h4>
        <dl class="alt">
          <dt>Membership Type</dt>
          <dd><?php echo $member->getMemberClass()->getName()?></dd>
          <dt>Renewed 	</dt>
          <dd><?php echo $member->getRenewedDate('m/d/Y')?></dd>
          <dt>Expires</dt>
          <dd><?php echo $member->getRenewalDate('m/d/Y')?></dd>
        </dl>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="preferences" <?php if (!($pilot instanceof Pilot)) echo 'style="width:340px;"'?>>
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Email Preferences</h4>
        <dl>
          <dt>Email Blocked:</dt>
          <dd>
            <span id="email_blocked"><?php echo $person->getEmailBlocked() == 1 ? 'Yes' : 'No'?></span>
            <?php echo jq_link_to_remote($person->getEmailBlocked() == 1 ? 'un-block email' : 'block email', array(
              'url' => 'account/toggle?name=email_blocked',
              'success' => "jQuery('#email_blocked_toggle').html(data.substr(3)); jQuery('#email_blocked').html(data.substr(0, 3))"
            ), array('id' => 'email_blocked_toggle'));?>
          </dd>

          <dt style="padding-left: 0px;">Text Only Email:</dt>
          <dd>
            <span id="email_text_only"><?php echo $person->getEmailTextOnly() == 1 ? 'Yes' : 'No'?></span>
            <?php echo jq_link_to_remote($person->getEmailTextOnly() == 1 ? 'set to any' : 'set to text only', array(
              'url' => 'account/toggle?name=email_text_only',
              'success' => "jQuery('#email_text_only_toggle').html(data.substr(3)); jQuery('#email_text_only').html(data.substr(0, 3))"
            ), array('id' => 'email_text_only_toggle'));?>
          </dd>

          <dt>Email Address:</dt>
          <dd>
            <font color="red" id="email_error"></font>
            <span id="email"><?php echo $person->getEmail() ? $person->getEmail() : '' ;?></span>
            <?php echo jq_form_remote_tag(array(
              'url' => 'account/toggle?name=email',
              'before' => "jQuery('#email_error').hide()",
              'success' => "if (data[0] == '#') jQuery('#email_error').show().html(data.substr(1)); else { jQuery('#email').html(data); jQuery('#email, #email_change, #email_form').toggle(); }",
            ), array('id' => 'email_form', 'style' => 'display:none;'))?>
              <input size="28" type="text" name="email" id="email_edit"/>
              <a href="#" onclick="jQuery('#email_form_submit').click();return false;">save</a>
              <input type="submit" class="hide" id="email_form_submit"/>
            </form>
            <?php echo jq_link_to_function('change', "jQuery('#email_edit').val(jQuery('#email').html()); jQuery('#email_change').hide(); jQuery('#email_form').toggle(); jQuery('#email').toggle();", array('id' => 'email_change'))?>
          </dd>
        </dl>
      </div>

      <?php if ($pilot instanceof Pilot) {
        $home_airport = $pilot->getAirport();
        //wing = $member->getWing();
      ?>
      <div class="holder">
        <h4>Pilot Information <?php echo link_to('edit', 'account/editPilot', array('class' => 'link-edit'))?></h4>
        <dl>
          <dt>Flights Status</dt>
          <dd><?php echo $member->getFlightStatus()?></dd>

          <dt>Co-Pilot</dt>
          <dd><?php echo $member->getCoPilot() ? 'Yes' : 'No'?></dd>

          <dt>License Type</dt>
          <dd><?php echo $pilot->getLicenseType()?></dd>

          <dt>Home Airport</dt>
          <dd><?php if ($home_airport) echo $home_airport->getIdent()?></dd>

          <?php if ($wing) {?>
          <dt>Wing</dt>
          <dd><?php $v = get_state($wing->getState()); echo ($v?$v.', ':'').$wing->getName()?></dd>
          <?php }?>
        </dl>
      </div>
      <?php }?>
    </div>
  </div>
</div>

<?php if ($pilot instanceof Pilot) {?>
<div class="preferences">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Aircraft 
          <?php if ($sf_user->hasCredential(array('Administrator'), false)){ ?>
              <?php echo link_to('add', 'account/newAircraft', array('class' => 'link-add'))?>
          <?php } ?></h4>
        <?php $pilot_aircrafts = $member->getPilotAircrafts()?>
        <table>
          <tr>
            <th>Tail #</th>
            <th>Make</th>
            <th>Model</th>
            <th>Primary</th>
            <th>Own?</th>
            <th></th>
          </tr>
          <?php foreach ($pilot_aircrafts as $pilot_aircraft) {?>
          <tr id="pilot_aircraft_<?php echo $pilot_aircraft->getId()?>">
            <td><?php echo $pilot_aircraft->getNNumber()?></td>
            <td><?php echo $pilot_aircraft->getAircraft()->getMake()?></td>
            <td><?php echo $pilot_aircraft->getAircraft()->getModel()?></td>
            <td><?php echo radiobutton_tag('primary_aircraft', 1)?></td>
            <td><?php echo $pilot_aircraft->getOwn() ? 'Yes' : 'No'?></td>
            <td>
            <?php if ($sf_user->hasCredential(array('Administrator'), false)){ ?>
              <?php echo link_to('edit', 'account/editAircraft?id='.$pilot_aircraft->getId())?>
              <?php echo jq_link_to_remote('remove', array(
                'url' => 'account/ajaxDeleteAircraft?id='.$pilot_aircraft->getId(),
                'success' => "$('#pilot_aircraft_{$pilot_aircraft->getId()}').remove();",
              ), array('confirm' => 'Are you sure?'))?>
            <?php } ?>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
      <div class="holder">
        <h4>Availability <?php echo jq_link_to_function('save your changes', 'saveAvailability()', array('style' => 'display:none;', 'class' => 'link-edit', 'id' => 'save_availability'))?></h4>
        <form id="available_form" action="<?php echo url_for('account/saveAvailability')?>">
          <table>
            <tr>
              <td>
                <label for="available">Available</label>
                <input type="radio" id="available" value="1" name="available" <?php if ($availability->getNotAvailable() != 1) echo 'checked="checked"'?>/>
                <label for="not_available">Not Available</label>
                <input type="radio" id="not_available" value="0" name="available" <?php if ($availability->getNotAvailable()) echo 'checked="checked"'?>/>
              </td>
            </tr>
            <tr id="available_options" <?php if ($availability->getNotAvailable()) echo 'style="display:none"'?>>
              <td>
                <label for="weekdays">Weekdays</label>
                <input type="checkbox" name="weekdays" id="weekdays" value="1" <?php if ($availability->getNoWeekday() != 1) echo 'checked="checked"'?>/>
                <label for="nights">Nights</label>
                <input type="checkbox" name="nights" id="nights" value="1" <?php if ($availability->getNoNight() != 1) echo 'checked="checked"'?>/>
                <label for="weekends">Weekends</label>
                <input type="checkbox" name="weekends" id="weekends" value="1" <?php if ($availability->getNoWeekend() != 1) echo 'checked="checked"'?>/>
                <br/>
                <label for="last_minute">For Last Minute flights</label>
                <input type="checkbox" name="last_minute" id="last_minute" value="1" <?php if ($availability->getLastMinute()) echo 'checked="checked"'?>/>
                <label for="assistant">As Mission Assistant</label>
                <input type="checkbox" name="assistant" id="assistant" value="1" <?php if ($availability->getAsMissionMssistant()) echo 'checked="checked"'?>/>
              </td>
            </tr>
            <tr id="unavailable_options" <?php if ($availability->getNotAvailable() != 1) echo 'style="display:none;"'?>>
              <td>
                <?php $v = ($availability->getFirstDate() === null) && ($availability->getLastDate() === null) ? '' : 'dates'?>
                <?php echo select_tag('option', options_for_select(array('' => 'Indefinitely', 'dates' => 'Specific Dates'), $v), array('id' => 'unavailable_option'))?>
                <div class="passenger-form" style="padding:0;" id="date_range">
                  <label for="start_date">Start Date</label>
                  <input type="text" name="start_date" id="start_date" class="text narrow" value="<?php echo $availability->getFirstDate('m/d/Y')?>"/>
                  <br/>
                  <label for="end_date">End Date</label>
                  <input type="text" name="end_date" id="end_date" class="text narrow" value="<?php echo $availability->getLastDate('m/d/Y')?>"/>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="availability_comment">Comment</label>
                <textarea name="comment" id="availability_comment" cols="35" rows="3"><?php echo $availability->getAvailabilityComment()?></textarea>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="preferences" style="width:340px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>My Personal Flights 
           <?php if ($sf_user->hasCredential(array('Administrator','Pilot'), false)){ ?>
                        <?php echo link_to('add', 'account/newPersonalFlight', array('class' => 'link-add'))?>
          <?php } ?></h4>
        <?php $personal_flights = $pilot->getPersonalFlights()?>
        <table>
          <tr>
            <th>Depart</th>
            <th>Return</th>
            <th>Name</th>
          </tr>
          <?php foreach ($personal_flights as $personal_flight) {?>
          <tr id="personal_flight_<?php echo $personal_flight->getId()?>">
            <td><?php echo $personal_flight->getDepartureDate('m/d/Y')?></td>
            <td><?php echo $personal_flight->getReturnDate('m/d/Y')?></td>
            <td><?php echo (strlen($personal_flight->getName())>10)? substr($personal_flight->getName(), 0, 10).'...' : $personal_flight->getName()?></td>
            <td>
              <?php echo link_to('edit', 'account/editPersonalFlight?id='.$personal_flight->getId())?>
              <?php echo jq_link_to_remote('remove', array(
                'url' => 'account/ajaxDeletePersonalFlight?id='.$personal_flight->getId(),
                'success' => "$('#personal_flight_{$personal_flight->getId()}').remove();",
              ), array('confirm' => 'Are you sure?'))?>
            </td>
          </tr>
          <?php }?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php // js and css for datePicker
$sf_response->addStylesheet('jquery-ui.custom.css');
$sf_response->addJavascript('jquery-ui.custom.min.js');
?>
<script type="text/javascript">
//<![CDATA[
  function initAvailability()
  {
    $('#available, #not_available').change(function () {
      $('#available_options, #unavailable_options').hide();
      if ($('#available').is(':checked')) $('#available_options').show();
      if ($('#not_available').is(':checked')) $('#unavailable_options').show();
    });

    $('#unavailable_option').change(function () {
      if ($(this).val() == 'dates') $('#date_range').show(); else $('#date_range').hide();
    }).change();

    $("#start_date, #end_date").datepicker({ dateFormat: 'mm/dd/yy', changeMonth: true });

    $('#available, #not_available, #weekdays, #nights, #weekends, #last_minute, #assistant, #availability_comment, #unavailable_option, #start_date, #end_date').change(function () {
      $('#save_availability').show();
    });
  }

  function saveAvailability()
  {
    $.ajax({
      type:'POST',
      dataType:'html',
      data: $('#available_form').serialize(),
      url: $('#available_form').attr('action'),
      success: function (html) { $('#save_availability').hide(); }
    });
  }
  
  $(function () {
    initAvailability();
  });
//]]>
</script>
<?php }?>