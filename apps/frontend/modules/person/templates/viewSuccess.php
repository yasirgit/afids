<?php use_helper('jQuery');
use_stylesheets_for_form($form);
use_javascripts_for_form($form);
$sf_response->addJavascript('/sfFormExtraPlugin/js/double_list.js');
$sf_response->addJavascript('/js/jquery-ui.min.js');

$subscribed_list = $sf_data->getRaw('subscribed_list');

if($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)){
    $can_edit = $sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false);
}
elseif( $person->getId() == $sf_user->getId() ){
    $can_edit = $sf_user->hasCredential(array('Pilot'), false);
}

if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
  $assoc_roles = $sf_data->getRaw('assoc_roles');
}
/* @var $person Person */
/* @var $form PersonForm */
$linkdata1 = '';
$linkdata2 = '';
if($camp_id) {$linkdata1 = '?camp_id='.$camp_id;
              $linkdata2 = '&camp_id='.$camp_id;
}
?>

<h2>Person View</h2>
<div class="person-view"> 
  <h3><?php echo ($person->getTitle()?$person->getTitle().'.':'').' '.$person->getName()?></h3>
  <?php if ($can_edit) {?>  
        <a class="link-edit" href="<?php echo url_for('@person_edit?id='.$person->getId())?>">edit personal information</a>  
  <?php }?>
  <?php  if ($sf_user->hasCredential(array('Administrator'), false))  {
    //echo link_to('remove', '@person_delete?id='.$person->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$person->getName().' and related information?', 'class' => 'action-remove'));
  }?>
  <div class="person-info"> 
    <dl class="person-data">
      <dt>Gender:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#gender_change').click();return false;">
            <span class="passenger-form">
              <?php echo $form['gender']->render(array('id' => 'gender_edit', 'style' => 'display:none;', 'class' => 'revertable revertval'));?>
            </span>
          </form>
          <span id="gender" class="revertable revertval in-place"><?php echo $person->getGender() ? ucfirst($person->getGender()) : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('gender', 'gender_change', 'gender_edit', 'gender', gender_callback);", array('id' => 'gender_change', 'class' => 'hide'))?>
        <?php }else echo $person->getGender() ? ucfirst($person->getGender()) : '--'?>
      </dd>
       
      <dt>Address:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#address1_change').click();return false;">
            <span class="passenger-form">
              <?php echo $form['address1']->render(array('id' => 'address1_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
            </span>
          </form>
          <span id="address1" class="revertable revertval in-place"><?php echo $person->getAddress1() ? $person->getAddress1() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('address1', this.id, 'address1_edit', 'address1');", array('id' => 'address1_change', 'class' => 'hide'))?>
          <br clear="all"/>
          <form action="#" onsubmit="$('#address2_change').click();return false;">
            <span class="passenger-form">
              <?php echo $form['address2']->render(array('id' => 'address2_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
            </span>
          </form>
          <span id="address2" class="revertable revertval in-place"><?php echo $person->getAddress2() ? $person->getAddress2() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('address2', this.id, 'address2_edit', 'address2');", array('id' => 'address2_change', 'class' => 'hide'))?>
        <?php }else{
          echo $person->getAddress1()?$person->getAddress1():'--';
          echo $person->getAddress2()?$person->getAddress2():'--';
        }?>
      </dd>
       
      <dt>City:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#city_change').click();return false;">
            <span class="passenger-form">
              <input type="text" id="city_edit" style="display:none;" class="text narrow revertable revertval"/>
            </span>
          </form>
          <span id="city" class="revertable revertval in-place"><?php echo $person->getCity() ? $person->getCity() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('city', this.id, 'city_edit', 'city');", array('id' => 'city_change', 'class' => 'hide'))?>
        <?php }else echo $person->getCity()?$person->getCity():'--'?>
      </dd>
      
      <dt>County:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#county_change').click();return false;">
            <span class="passenger-form">
              <input type="text" id="county_edit" style="display:none;" class="text narrow revertable revertval"/>
            </span>
          </form>
          <span id="county" class="revertable revertval in-place"><?php echo $person->getCounty() ? $person->getCounty() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('county', 'county_change', 'county_edit', 'county');", array('id' => 'county_change', 'class' => 'hide'))?>
        <?php }else echo $person->getCounty()?$person->getCounty():'--'?>
      </dd>
       
      <dt>State:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#state_change').click();return false;">
            <span class="passenger-form">
              <input type="text" id="state_edit" style="display:none;" class="text narrow revertable revertval"/>
            </span>
          </form>
          <span id="state" class="revertable revertval in-place"><?php echo $person->getState() ? $person->getState() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('state', 'state_change', 'state_edit', 'state');", array('id' => 'state_change', 'class' => 'hide'))?>
        <?php }else echo $person->getState()?$person->getState():'--'?>
      </dd>
       
      <dt>Zip Code:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#zipcode_change').click();return false;">
            <span class="passenger-form">
              <?php echo $form['zipcode']->render(array('id' => 'zipcode_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
            </span>
          </form>
          <span id="zipcode" class="revertable revertval in-place"><?php echo $person->getZipcode() ? $person->getZipcode() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('zipcode', this.id, 'zipcode_edit', 'zipcode');", array('id' => 'zipcode_change', 'class' => 'hide'))?>
        <?php }else echo $person->getZipcode()?$person->getZipcode():'--'?>
      </dd>
       
      <dt>Country:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <form action="#" onsubmit="$('#country_change').click();return false;">
            <span class="passenger-form">
              <?php echo $form['country']->render(array('id' => 'country_edit', 'style' => 'display:none;', 'class' => 'revertable revertval'));?>
            </span>
          </form>
          <span id="country" class="revertable revertval in-place"><?php echo $person->getCountry() ? $person->getCountry() : '--' ;?></span>
          <?php echo jq_link_to_function('edit', "changeValue('country', this.id, 'country_edit', 'country');", array('id' => 'country_change', 'class' => 'hide'))?>
        <?php }else echo $person->getCountry()?$person->getCountry():'--'?>
      </dd>
       
      <dt>Block Mailings?:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <span id="block_mailings_yes" class="revertable in-place" <?php if ($person->getBlockMailings() != 1) echo 'style="display:none"'?> onclick="toggle(0, 'block_mailings_yes', 'block_mailings_no', 'block_mailings')">Yes</span>
          <span id="block_mailings_no" class="revertable in-place" <?php if ($person->getBlockMailings() == 1) echo 'style="display:none"'?> onclick="toggle(1, 'block_mailings_yes', 'block_mailings_no', 'block_mailings')">No</span>
        <?php }else echo $person->getBlockMailings() == 1 ? 'Yes' : 'No'?>
      </dd>
       
      <dt>Send Newsletter?:</dt>
      <dd>
        <?php if ($can_edit) {?>
          <span id="newsletter_yes" class="revertable in-place" onclick="toggle(0, 'newsletter_yes', 'newsletter_no', 'newsletter')" <?php if ($person->getNewsletter() != 1) echo 'style="display:none"'?>>Yes</span>
          <span id="newsletter_no" class="revertable in-place" onclick="toggle(1, 'newsletter_yes', 'newsletter_no', 'newsletter')" <?php if ($person->getNewsletter() == 1) echo 'style="display:none"'?>>No</span>
        <?php }else echo $person->getNewsletter() == 1 ? 'Yes' : 'No'?>
      </dd>
    </dl>
     
    <div class="person-contacts">
      <table>
        <thead>
          <tr>
            <td colspan="2">Phone Number(s)</td>
            <td>Comment</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="cell-1">Work:</td>
            <td class="cell-2">
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#day_phone_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['day_phone']->render(array('id' => 'day_phone_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="day_phone" class="revertable revertval in-place"><?php echo $person->getDayPhone() ? $person->getDayPhone() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('day_phone', this.id, 'day_phone_edit', 'day_phone');", array('id' => 'day_phone_change', 'class' => 'hide'))?>
              <?php }else echo $person->getDayPhone() ? $person->getDayPhone() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#day_comment_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['day_comment']->render(array('id' => 'day_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="day_comment" class="revertable revertval in-place"><?php echo $person->getDayComment() ? $person->getDayComment() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('day_comment', this.id, 'day_comment_edit', 'day_comment');", array('id' => 'day_comment_change', 'class' => 'hide'))?>
              <?php }else echo $person->getDayComment() ? $person->getDayComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Home:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#evening_phone_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['evening_phone']->render(array('id' => 'evening_phone_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="evening_phone" class="revertable revertval in-place"><?php echo $person->getEveningPhone() ? $person->getEveningPhone() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('evening_phone', this.id, 'evening_phone_edit', 'evening_phone');", array('id' => 'evening_phone_change', 'class' => 'hide'))?>
              <?php }else echo $person->getEveningPhone() ? $person->getEveningPhone() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#evening_comment_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['evening_comment']->render(array('id' => 'evening_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="evening_comment" class="revertable revertval in-place"><?php echo $person->getEveningComment() ? $person->getEveningComment() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('evening_comment', this.id, 'evening_comment_edit', 'evening_comment');", array('id' => 'evening_comment_change', 'class' => 'hide'))?>
              <?php }else echo $person->getEveningComment() ? $person->getEveningComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Cell:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#mobile_phone_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['mobile_phone']->render(array('id' => 'mobile_phone_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="mobile_phone" class="revertable revertval in-place"><?php echo $person->getMobilePhone() ? $person->getMobilePhone() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('mobile_phone', this.id, 'mobile_phone_edit', 'mobile_phone');", array('id' => 'mobile_phone_change', 'class' => 'hide'))?>
              <?php }else echo $person->getMobilePhone() ? $person->getMobilePhone() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#mobile_comment_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['mobile_comment']->render(array('id' => 'mobile_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="mobile_comment" class="revertable revertval in-place"><?php echo $person->getMobileComment() ? $person->getMobileComment() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('mobile_comment', this.id, 'mobile_comment_edit', 'mobile_comment');", array('id' => 'mobile_comment_change', 'class' => 'hide'))?>
              <?php }else echo $person->getMobileComment() ? $person->getMobileComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Pager:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#pager_phone_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['pager_phone']->render(array('id' => 'pager_phone_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="pager_phone" class="revertable revertval in-place"><?php echo $person->getPagerPhone() ? $person->getPagerPhone() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('pager_phone', this.id, 'pager_phone_edit', 'pager_phone');", array('id' => 'pager_phone_change', 'class' => 'hide'))?>
              <?php }else echo $person->getPagerPhone() ? $person->getPagerPhone() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#pager_comment_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['pager_comment']->render(array('id' => 'pager_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="pager_comment" class="revertable revertval in-place"><?php echo $person->getPagerComment() ? $person->getPagerComment() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('pager_comment', this.id, 'pager_comment_edit', 'pager_comment');", array('id' => 'pager_comment_change', 'class' => 'hide'))?>
              <?php }else echo $person->getPagerComment() ? $person->getPagerComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Other:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#other_phone_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['other_phone']->render(array('id' => 'other_phone_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="other_phone" class="revertable revertval in-place"><?php echo $person->getOtherPhone() ? $person->getOtherPhone() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('other_phone', this.id, 'other_phone_edit', 'other_phone');", array('id' => 'other_phone_change', 'class' => 'hide'))?>
              <?php }else echo $person->getOtherPhone() ? $person->getOtherPhone() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#other_comment_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['other_comment']->render(array('id' => 'other_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="other_comment" class="revertable revertval in-place"><?php echo $person->getOtherComment() ? $person->getOtherComment() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('other_comment', this.id, 'other_comment_edit', 'other_comment');", array('id' => 'other_comment_change', 'class' => 'hide'))?>
              <?php }else echo $person->getOtherComment() ? $person->getOtherComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Fax 1:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#fax_phone1_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['fax_phone1']->render(array('id' => 'fax_phone1_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="fax_phone1" class="revertable revertval in-place"><?php echo $person->getFaxPhone1() ? $person->getFaxPhone1() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('fax_phone1', this.id, 'fax_phone1_edit', 'fax_phone1');", array('id' => 'fax_phone1_change', 'class' => 'hide'))?>
              <?php }else echo $person->getFaxPhone1() ? $person->getFaxPhone1() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#fax_comment1_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['fax_comment1']->render(array('id' => 'fax_comment1_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="fax_comment1" class="revertable revertval in-place"><?php echo $person->getFaxComment1() ? $person->getFaxComment1() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('fax_comment1', this.id, 'fax_comment1_edit', 'fax_comment1');", array('id' => 'fax_comment1_change', 'class' => 'hide'))?>
              <?php }else echo $person->getFaxComment1() ? $person->getFaxComment1() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Auto:</td>
            <td>
              <?php if ($can_edit) {?>
                <span id="auto_fax_yes" class="revertable in-place" <?php if ($person->getAutoFax() != 1) echo 'style="display:none"'?> onclick="toggle(0, 'auto_fax_yes', 'auto_fax_no', 'auto_fax')">Yes</span>
                <span id="auto_fax_no" class="revertable in-place" <?php if ($person->getAutoFax() == 1) echo 'style="display:none"'?> onclick="toggle(1, 'auto_fax_yes', 'auto_fax_no', 'auto_fax')">No</span>
              <?php }else echo $person->getAutoFax() == 1 ? 'Yes' : 'No'?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td class="cell-1">Fax 2:</td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#fax_phone2_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['fax_phone2']->render(array('id' => 'fax_phone2_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval', 'ok_class' => 'hide'))?>
                  </span>
                </form>
                <span id="fax_phone2" class="revertable revertval in-place"><?php echo $person->getFaxPhone2() ? $person->getFaxPhone2() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('fax_phone2', this.id, 'fax_phone2_edit', 'fax_phone2');", array('id' => 'fax_phone2_change', 'class' => 'hide'))?>
              <?php }else echo $person->getFaxPhone2() ? $person->getFaxPhone2() : '--'?>
            </td>
            <td>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#fax_comment2_change').click();return false;">
                  <span class="passenger-form">
                    <?php echo $form['fax_comment2']->render(array('id' => 'fax_comment2_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                  </span>
                </form>
                <span id="fax_comment2" class="revertable revertval in-place"><?php echo $person->getFaxComment2() ? $person->getFaxComment2() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('fax_comment2', this.id, 'fax_comment2_edit', 'fax_comment2');", array('id' => 'fax_comment2_change', 'class' => 'hide'))?>
              <?php }else echo $person->getFaxComment2() ? $person->getFaxComment2() : '--'?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> 
  <div class="preferences"> 
    <div class="frame">
      <div class="bg">
        <div class="holder">
          <h4>Email Preferences</h4>
          <dl>
            <dt>Email Blocked:</dt>
            <dd>
              <?php if ($can_edit) {?>
                <span id="email_blocked_yes" class="revertable" <?php if ($person->getEmailBlocked() != 1) echo 'style="display:none"'?>>Yes <?php echo jq_link_to_function('un-block email', "toggle(0, 'email_blocked_yes', 'email_blocked_no', 'email_blocked')");?></span>
                <span id="email_blocked_no" class="revertable" <?php if ($person->getEmailBlocked() == 1) echo 'style="display:none"'?>>No <?php echo jq_link_to_function('block email', "toggle(1, 'email_blocked_yes', 'email_blocked_no', 'email_blocked')");?></span>
              <?php }else echo $person->getEmailBlocked() == 1 ? 'Yes' : 'No'?>
            </dd>

            <dt>Text Only Email:</dt> 
            <dd>
              <?php if ($can_edit) {?>
                <span id="email_text_yes" class="revertable" <?php if ($person->getEmailTextOnly() != 1) echo 'style="display:none"'?>>Yes <?php echo jq_link_to_function('set to any', "toggle(0, 'email_text_yes', 'email_text_no', 'email_text_only')");?></span>
                <span id="email_text_no" class="revertable" <?php if ($person->getEmailTextOnly() == 1) echo 'style="display:none"'?>>No <?php echo jq_link_to_function('set to text only', "toggle(1, 'email_text_yes', 'email_text_no', 'email_text_only')");?></span>
              <?php }else echo $person->getEmailTextOnly() == 1 ? 'Yes' : 'No'?>
            </dd>
            
            <dt>Email Address:</dt>
            <dd>
              <?php if ($can_edit) {?>
                <form action="#" onsubmit="$('#email_change').click();return false;">
                  <span class="passenger-form">
                    <input type="text" id="email_edit" style="display:none;" class="text narrow revertable revertval"/>
                  </span>
                </form>
                <span id="email" class="revertable revertval in-place"><?php echo $person->getEmail() ? $person->getEmail() : '--' ;?></span>
                <?php echo jq_link_to_function('change', "changeValue('email', 'email_change', 'email_edit', 'email');", array('id' => 'email_change', 'class' => 'hide'))?>
              <?php }else echo $person->getEmail() ? $person->getEmail() : '--'?>
            </dd> 
          </dl>
        </div>
        <div class="holder">
          <h4>Mailing List Management</h4>
          <dl class="alt">
            <?php /* @var $email_list EmailList */?>
            <?php foreach ($email_lists as $email_list) {?>
              <dt><?php echo $email_list->getDescription()?>:</dt>
              <dd><?php $id = $email_list->getId(); $has = in_array($id, $subscribed_list);?>
                <?php if ($can_edit && ($email_list->getIsPrivate() != 1)) {?>
                  <span class="revertable" id="list_<?php echo $id?>_yes" <?php if (!$has) echo 'style="display:none"'?>><?php echo jq_link_to_function('un-subscribe', "toggle(0, 'list_{$id}_yes', 'list_{$id}_no', 'email_list_{$id}')")?></span>
                  <span class="revertable" id="list_<?php echo $id?>_no" <?php if ($has) echo 'style="display:none"'?>><?php echo jq_link_to_function('subscribe', "toggle(1, 'list_{$id}_yes', 'list_{$id}_no', 'email_list_{$id}')")?></span>
                <?php }else echo $has ? 'subscribed' : 'not subscribed'?>
              </dd>
            <?php }?>
          </dl> 
        </div>
      </div>
    </div>
  </div> 
  <div class="wrap"> 
    <div class="person-ad-info">
      <table>
        <tr>
          <td class="cell-1">Active Military/Veteran:</td>
          <td class="cell-2">
            <?php if ($can_edit) {?>
              <span id="veteran_yes" class="revertable in-place" <?php if ($person->getVeteran() != 1) echo 'style="display:none"'?> onclick="toggle(0, 'veteran_yes', 'veteran_no', 'veteran')">Yes</span>
              <span id="veteran_no" class="revertable in-place" <?php if ($person->getVeteran() == 1) echo 'style="display:none"'?> onclick="toggle(1, 'veteran_yes', 'veteran_no', 'veteran')">No</span>
            <?php }else echo $person->getVeteran() == 1 ? 'Yes' : 'No'?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td class="cell-1">Deceased?:</td>
          <td>
            <?php if ($can_edit) {?>
              <span id="deceased_yes" class="revertable in-place" <?php if ($person->getDeceased() != 1) echo 'style="display:none"'?> onclick="toggle(0, 'deceased_yes', 'deceased_no', 'deceased')">Yes</span>
              <span id="deceased_no" class="revertable in-place" <?php if ($person->getDeceased() == 1) echo 'style="display:none"'?> onclick="toggle(1, 'deceased_yes', 'deceased_no', 'deceased')">No</span>
            <?php }else echo $person->getDeceased() == 1 ? 'Yes' : 'No'?>
          </td>
          <td>
            Date:
            <?php if ($can_edit) {?>
              <form action="#" onsubmit="$('#deceased_date_change').click();return false;">
                <span class="passenger-form">
                  <?php echo $form['deceased_date']->render(array('id' => 'deceased_date_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                </span>
              </form>
              <span id="deceased_date" class="revertable revertval in-place"><?php echo $person->getDeceasedDate('U') ? $person->getDeceasedDate('m/d/Y') : '--' ;?></span>
              <?php echo jq_link_to_function('change', "changeValue('deceased_date', this.id, 'deceased_date_edit', 'deceased_date');", array('id' => 'deceased_date_change', 'class' => 'hide'))?>
            <?php }else echo $person->getDeceasedDate('U') ? $person->getDeceasedDate('m/d/Y') : '--'?>
          </td>
        </tr>
        <tr>
          <td class="cell-1">Comment:</td>
          <td>
            <?php if ($can_edit) {?>
              <form action="#" onsubmit="$('#deceased_comment_change').click();return false;">
                <span class="passenger-form">
                  <?php echo $form['deceased_comment']->render(array('id' => 'deceased_comment_edit', 'style' => 'display:none;', 'class' => 'text narrow revertable revertval'))?>
                </span>
              </form>
              <span id="deceased_comment" class="revertable revertval in-place"><?php echo $person->getDeceasedComment() ? $person->getDeceasedComment() : '--' ;?></span>
              <?php echo jq_link_to_function('change', "changeValue('deceased_comment', this.id, 'deceased_comment_edit', 'deceased_comment');", array('id' => 'deceased_comment_change', 'class' => 'hide'))?>
            <?php }else echo $person->getDeceasedComment() ? $person->getDeceasedComment() : '--'?>
          </td>
          <td></td>
        </tr>
      </table>
    </div>
    
    <span id="indicator" style="display:none;">Please wait ...</span>
    <span id="notification" style="font-size: 15px; float: right; width: 356px; margin-top: 22px;"></span>
    
    <div class="data-changes" id="data_changes" style="display:none;">
      <div class="holder">
        <div class="bg">
          <p>Changes have been made to this record</p>
          <a href="#" onclick="applyChanges();return false;" class="btn-save-changes"><span>SAVE CHANGES</span></a>
          <a href="#" onclick="revertChanges();return false;" class="revert">Revert</a>
        </div>
      </div>
    </div>
  </div>

  <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator','Volunteer'), false)) :?>
    <h3>Change Password</h3>
        <div class="frame">
          <div class="bg">
            <div class="holder">
              <h4>Password
                <?php echo link_to('Change','/person/updatePassword?id='.$person->getId(), array('class' => 'link-edit'));?>
              </h4>
              Click change to change the password to person AFIDS account
            </div>
          </div>
        </div>
  <?php endif;?>
  
<?php if ($sf_user->hasCredential(array('Administrator'), false)):?>
  <?php if ($sf_user->hasCredential(array('Administrator'), false)) {?>
  <div class="security"> 
    <h3>Security Role</h3>
    <form action="#"> 
    <?php echo $sf_data->getRaw('widget')->render('roles', $assoc_roles); ?>
    </form>
  </div>
  <?php }?>
 <?php else:?>
    <div class="person-table-data">
    <h3>Security Role</h3>
    <table style="width: 100px">
    <?php foreach ($assoc_roles as $assoc_role){?>
    <tr class="alt">
      <td class="cell-1">
    <?php $ro = RolePeer::retrieveByPK($assoc_role);
    echo $ro->getTitle();echo "<br/>";
    ?>
      </td>
    </tr>
    <?php
    }
    ?>
    </table>
  </div>
 <?php endif;?>
    <?php  if (($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) ) { ?>
  <div class="person-table-data">
    <h3>Data</h3>
    <table>
      <tr class="alt">
        <td class="cell-1">Member</td>
        <?php $is_member = MemberPeer::getByPersonId($person->getId());?>
        <td width="100px">
          <?php if(!$is_member):?>
            <?php $link = 'add';?>
          <?php else:?>
            <?php $link = 'active';?>
          <?php endif;?>

          <?php if(!$is_member):?>
            <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
                <a href="<?php echo url_for('member/update?person_id='.$person->getId()) ?>" class="link-add">add</a>
            <?php } ?> 
         <?php else:?>
             <?php echo $is_member->getExternalId()?>
          <?php endif;?>
        </td>
        <td><?php if($link != 'add'):?>
                <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)) { ?>
                    <a href="<?php echo url_for('@member_view?id='.$is_member->getId())?>" class="link-view">view</a>
                <?php } ?>
           <?php endif?>
        </td>           
        <td><?php if($link != 'add'):?>
               <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
                 <a href="<?php echo url_for('@member_edit?id='.$is_member->getId())?>" class="link-edit">edit</a>
               <?php } ?>
         <?php endif?></td>
        <td>
        <?php if(isset($is_member)):?><?php if($sf_user->hasCredential(array('Administrator'), false)) echo link_to('remove', '@default?module=member&action=delete&id='.$is_member->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove ', 'class' => 'action-remove')); ?><?php endif?>
        </td>
      </tr>
      <tr>
        <td class="cell-1">Passenger</td>
        <td>
          <?php $passenger = PassengerPeer::getByPersonId($person->getId())?>
          <?php if(!$passenger):?>
            <?php $linkp = 'add';?>
          <?php else:?>
            <?php $linkp = 'active';?>
          <?php endif;?>
         
          <?php if(!$passenger):?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
              <a href="<?php echo url_for('@passenger_create?person_id='.$person->getId().$linkdata2)?>" class="link-add">add</a>
            <?php }?>             

          <?php else:?>
            --
          <?php endif;?>
        </td>
        
        <td><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) if($linkp != 'add'):?><a href="<?php echo url_for('@passenger_view?id='.$passenger->getId())?>" class="link-view">view</a><?php endif?></td>
        <td><?php if($sf_user->hasCredential(array('Administrator', 'Staff'), false)) if($linkp != 'add'):?><a href="<?php echo url_for('@passenger_edit?id='.$passenger->getId())?>" class="link-edit">edit</a><?php endif?></td>
        <td><?php if(isset($passenger)):?><?php if ($sf_user->hasCredential(array('Administrator'), false)) echo link_to('remove', '@default?module=passenger&action=delete&id='.$passenger->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.$person->getName().'?', 'class' => 'action-remove')); ?><?php endif?></td>
        
      </tr>
      <tr class="alt">
        <td class="cell-1">Requester</td>
        <td>
        <?php if(!$requester):?>
              <?php $linkr = 'add';?>
        <?php else:?>
              <?php $linkr = 'active';?>
        <?php endif;?>

        <?php if(!$requester):?>
          <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
            <a href="<?php echo url_for('requester/update?person_id='.$person->getId())?>" class="link-add">add</a>
          <?php } ?>
        <?php else:?>
          --
        <?php endif;?>
        </td>
        <td><?php if($linkr != 'add'):?>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
                <a href="#" class="link-view">view</a>
            <?php } ?>
        <?php endif?></td>
        <td><?php if($linkr != 'add'):?>
           <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)) { ?>
                <a href="<?php echo url_for('@requester_edit?id='.$requester->getId())?>" class="link-edit">edit</a>
           <?php } ?>
        <?php endif?></td>
        <td>
        <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
           <?php if ($requester) echo link_to('remove', '@default?module=requester&action=delete&id='.$requester->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove ', 'class' => 'action-remove')); ?>
        <?php endif;?>
        </td>
      </tr>
      <tr>
        <td class="cell-1">Contact</td>
        <?php $is_contact = ContactPeer::getByPersonId($person->getId())?>
        <?php if(isset($is_contact)):?>
        <?php else:?>
        <?php endif;?>
        <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) { ?>
          <td><?php if(!isset($is_contact)):?><a href="<?php echo url_for('@contact_create?person_id='.$person->getId())?>" class="link-add">add</a><?php endif?></td>
        <?php } ?>
        <td></td>
        <td><?php if(isset($is_contact)):?>
            <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)) { ?>
                <a href="<?php echo url_for('@contact_edit?id='.$is_contact->getId())?>" class="link-edit">edit</a>
            <?php } ?>
        <?php endif?></td>
        <td>
            <?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) { ?>
                <?php if (isset($is_contact)) echo link_to('remove', '@contact_delete?id='.$is_contact->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove '.'?', 'class' => 'action-remove')); ?>
            <?php } ?>            
        </td>
       </tr>
      <tr class="alt">
        <td class="cell-1">Board Member</td>
        <?php
        $is_b_member = BoardMemberPeer::getByPersonId($person->getId());
        ?>
        <?php if(!$is_b_member):?>
          <?php $linkb = 'add';?>
        <?php else:?>
          <?php $linkb = 'active';?>
        <?php endif;?>
        <td>
        <?php if(!$is_b_member):?>
            <?php  if($sf_user->hasCredential(array('Administrator'), false)) { ?>
              <a href="<?php echo url_for('member/boardMember?person_id='.$person->getId()) ?>" class="link-add">add</a>
            <?php } ?>
        <?php else:?>
              active
        <?php endif;?>
        </td>
        <td><?php if($linkb != 'add'):?>
             <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){ ?>
                 <a href="<?php echo url_for('@board_view?id='.$is_b_member->getId())?>" class="link-view">view</a>
             <?php } ?>
        <?php endif; ?></td>
        <td><?php if($linkb != 'add'):?>
           <?php   if($sf_user->hasCredential(array('Administrator'), false)) { ?>
                <a href="<?php echo url_for('@board_edit?id='.$is_b_member->getId())?>" class="link-edit">edit</a>
          <?php } ?>
        <?php endif; ?></td>
        <td>
        <?php if($is_b_member):?>
             <?php   if($sf_user->hasCredential(array('Administrator'), false)) { ?>
                <a href="<?php echo url_for('member/boardMember?person_id='.$person->getId()) ?>" class="link-add">add another</a>
             <?php } ?>
              
        <?php endif;?>
        </td>
      </tr>
      <tr>
        <td class="cell-1">Wing Leader</td>
        <?php
        $is_wing_leader = WingLeaderPeer::getByPersonId($person->getId());
        ?>
        <?php if(!$is_wing_leader):?>
          <?php $linkb = 'add';?>
        <?php else:?>
          <?php $linkb = 'active';?>
        <?php endif;?>
        <td>
        <?php if(!$is_wing_leader):?>
            <?php  if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
              <?php echo link_to("add", "wingleader/new?person_id=".$person->getId(), array("class" => "link-add"))?>
            <?php } ?>
        <?php else:?>
              active
        <?php endif;?>
        </td>
        <td><?php if($linkb != 'add'):?>
             <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){ ?>
                 <a href="#" class="link-view">view</a>
             <?php } ?>
        <?php endif; ?></td>
        <td><?php if($linkb != 'add'):?>
           <?php  if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
                <a href="/wingleader/edit?id=<?php echo $is_wing_leader->getId() ?>&person_id=<?php echo $person->getId() ?>" class="link-edit">edit</a>
          <?php } ?>
        <?php endif; ?></td>
        <td>
        <?php if($is_wing_leader):?>
              <a href="#" class="link-de-activate"><?php echo link_to('de-activate','wingleader/delete?id='.$is_wing_leader->getId().'&person_id='.$person->getId(),array('post' => true, 'confirm' => 'Are you sure want to de-activate')) ?></a>
        <?php endif;?>                
      </tr>
      <tr class="alt">
        <td class="cell-1">Wing Role</td>
       <?php
        $is_wing_role = WingJobPeer::getByPersonId($person->getId());        
        ?>
        <?php if(!$is_wing_role):?>
          <?php $linkb = 'add';?>
        <?php else:?>
          <?php $linkb = 'active';?>
        <?php endif;?>
        <td>
        <?php if(!$is_wing_role):?>
            <?php if ($sf_user->hasCredential(array('Administrator'), false)){ ?>
              <?php echo link_to("add", "wingjob/new?person_id=".$person->getId(), array("class" => "link-add"))?>
            <?php } ?>
        <?php else:?>
              active
        <?php endif;?>
        </td>
        <td><?php if($linkb != 'add'):?>
             <?php  if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) { ?>
                 <a href="#" class="link-view">view</a>
             <?php } ?>
        <?php endif; ?></td>
        <td><?php if($linkb != 'add'):?>
           <?php  if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
                <a href="/wingjob/edit/id/<?php echo $is_wing_role->getId() ?>/person_id/<?php echo $person->getId() ?>" class="link-edit">edit</a>
          <?php } ?>
        <?php endif; ?></td>
        <td>
        <?php if($is_wing_role):?>              
                  <a href="#" class="link-de-activate"><?php echo link_to('de-activate','wingjob/delete?id='.$is_wing_role->getId().'&person_id='.$person->getId(),array('post' => true, 'confirm' => 'Are you sure want to de-activate')) ?></a>
        <?php endif;?>  
      </tr>
    </table>
  </div>
  <?php } ?>
</div>

<?php if ($can_edit) {?>

<?php
$original_values = array(
  "'gender':'".$person->getGender()."'",
  "'address1':'".$person->getAddress1()."'",
  "'address2':'".$person->getAddress2()."'",
  "'city':'".$person->getCity()."'",
  "'county':'".$person->getCounty()."'",
  "'state':'".$person->getState()."'",
  "'zipcode':'".$person->getZipcode()."'",
  "'country':'".$person->getCountry()."'",
  "'block_mailings':".($person->getBlockMailings() ? 1 : 0),
  "'newsletter':".($person->getNewsletter() ? 1 : 0),
  "'veteran':".($person->getVeteran() ? 1 : 0),
  "'deceased':".($person->getDeceased() ? 1 : 0),
  "'deceased_comment':'".$person->getDeceasedComment()."'",
  "'deceased_date':'".$person->getDeceasedDate()."'",
  "'day_phone':'".$person->getDayPhone()."'",
  "'day_comment':'".$person->getDayComment()."'",
  "'evening_phone':'".$person->getEveningPhone()."'",
  "'evening_comment':'".$person->getEveningComment()."'",
  "'mobile_phone':'".$person->getMobilePhone()."'",
  "'mobile_comment':'".$person->getMobileComment()."'",
  "'pager_phone':'".$person->getPagerPhone()."'",
  "'pager_comment':'".$person->getPagerComment()."'",
  "'other_phone':'".$person->getOtherPhone()."'",
  "'other_comment':'".$person->getOtherComment()."'",
  "'fax_phone1':'".$person->getFaxPhone1()."'",
  "'fax_comment1':'".$person->getFaxComment1()."'",
  "'fax_phone2':'".$person->getFaxPhone2()."'",
  "'fax_comment2':'".$person->getFaxComment2()."'",
  "'auto_fax':".($person->getAutoFax() ? 1 : 0),
  
  "'email_blocked':".($person->getEmailBlocked() ? 1 : 0),
  "'email_text_only':".($person->getEmailTextOnly() ? 1 : 0),
  "'email':'".$person->getEmail()."'",
);
if ($sf_user->hasCredential(array('Administrator'), false)) $original_values[] = "'roles':[".implode(',', $assoc_roles)."]";
foreach ($email_lists as $email_list) $original_values[] = "'email_list_".$email_list->getId()."':".(in_array($email_list->getId(), $subscribed_list)?1:0);
?>

<?php jq_javascript_tag()?>
var changes = {};
var original = {<?php echo implode(', ', $original_values)?>};
var revert = {};
var revert_val = {};

function toggle(v, yes_el, no_el, name)
{
  if (v) {
    $('#' + yes_el).show(); $('#' + no_el).hide();
  }else{
    $('#' + yes_el).hide(); $('#' + no_el).show();
  }
  if (original[name] == v) removeChanges(name); else changesMade(name, v);
}

function gender_callback(str)
{
  str += '';
  var f = str.charAt(0).toUpperCase();
  return f + str.substr(1);
}

function changeValue(update, save_change, edit, name, save_callback)
{
  var $save_change = $('#' + save_change);
  var $edit = $('#' + edit);
  var $update = $('#' + update);
  var text = $save_change.html();
  var old_text = $save_change.data('text');
  
  if (typeof(old_text) == 'undefined') old_text = text;
  
  if (text == old_text) {
    $save_change.data('text', $save_change.html());
    $save_change.html('save');
    $update.hide();
    var v = $update.html();
    $edit.show().val(v=='--'?'':v).focus();
  }else{
    var v = $edit.val();
    $save_change.data('text', old_text);
    $save_change.html(old_text).addClass('hide');
    $edit.hide();
    if (typeof(save_callback) == 'function') {
      v = save_callback(v);
      $update.show().html(v==''?'--':v);
    }else{
      $update.show().html(v==''?'--':v);
    }
    if (original[name] == v) removeChanges(name); else changesMade(name, v);
  }
}

function roleChanged()
{
  var roles = [];
  $('#roles option').each(function (i, el) { roles.push(el.value); });
  changesMade('roles', roles);
}

function revertChanges()
{
  // revert visibility
  for(var id in revert) {
    if (revert[id]) $('#' + id).show(); else $('#' + id).hide(); 
  }
  
  // revert value/content
  for(var id in revert_val) {
    var $el = $('#' + id);
    if ($el.is('input')) $el.val(revert_val[id]); else $el.html(revert_val[id]);
  }
  
  <?php if ($sf_user->hasCredential(array('Administrator'), false)){?>
  // roles
  $('#roles option').each(function (i, el) { el.selected = true; });
  $('.btn-left').click();
  $('#unassociated_roles option').each(function (i, el) { el.selected = ($.inArray(parseInt(el.value), original['roles'])!=-1); });
  $('.btn-right').click();
  <?php }?>

  // cleanup
  for (var i in changes) delete changes[i];
  $('#data_changes').hide();
}

function changesMade(name, value)
{
  changes[name] = value;
  $('#data_changes').show();
}

function removeChanges(name)
{
  if (typeof(changes[name]) != 'undefined') delete changes[name];
  for (var i in changes) return;
  $('#data_changes').hide();
}

function serializeForParam(obj, prefix, level)
{
  var str = '', i = 0;
  if (typeof(level) === 'undefined') level = 0;
  if (typeof(prefix) === 'undefined') prefix = '';
  for(var v in obj)
  {
    if (typeof(obj[v]) === 'object') {
      if (i !== 0) str += '&';
      str += serializeForParam(obj[v], prefix + (level?'[':'') + v + (level?']':''), level + 1);
      i++;
    }else if (typeof(obj[v]) === 'number' || typeof(obj[v]) === 'string' || typeof(obj[v]) === 'boolean') {
      if (i !== 0) str += '&';
      str += prefix + (level?'[':'') + v + (level?']':'') + '=' + obj[v];
      i++;
    }
  }
  return str;
}

function applyChanges()
{
  var params = changes;
  params['person_id'] = <?php echo $person->getId()?>;
  $.ajax({
    url: '<?php echo url_for('@default?module=person&action=save')?>',
    dataType: 'html',
    data: serializeForParam(params),
    success: function (html) {
      $('#notification').html(html).effect('highlight', '', 3000);
      $('#data_changes').hide();
      if (typeof(changes['person_id']) != 'undefined') delete changes['person_id'];
    }
  });
}

function checkUnsaved()
{
  for (var i in changes) return "You have unsaved changes on this page!\n Okay will LOSE CHANGES";
}

$(function () {
  $('.btn-right, .btn-left').click(roleChanged);
  
  $('.revertable').each(function (i, el) { if (el.id) revert[el.id] = $(el).is(':visible'); });
  $('.revertval').each(function (i, el) { if (el.id) { if ($(el).is('input')) revert_val[el.id] = $(el).val(); else revert_val[el.id] = $(el).html(); }});

  $('.in-place')
    .bind('mouseenter', function () { $(this).addClass('hover-edit'); })
    .bind('mouseleave', function () { $(this).removeClass('hover-edit'); });
  $('.in-place').bind('click', function () { $('#'+this.id+'_change').removeClass('hide').click(); });

  window.onbeforeunload = checkUnsaved;
});
<?php jq_end_javascript_tag()?> 

<?php } # end of person_save_roles?>