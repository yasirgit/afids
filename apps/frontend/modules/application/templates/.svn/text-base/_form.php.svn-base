<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php include_partial('member', array('member' => $member, 'person' => $person))?>

<div class="passenger-form">
  <form action="<?php echo url_for('application/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form->renderGlobalErrors() ?>
    <?php echo $form->renderHiddenFields() ?>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div class="box full">
      <div class="wrap">
        <?php echo $form['renewal']->renderLabel() ?>
        <?php echo $form['renewal'] ?>
        <label for="<?php echo $form['renewal']->renderId()?>" class="raw">Renewing my membership with this application</label>
        <?php echo $form['renewal']->renderError() ?>
      </div>
      <div class="wrap">
        <label><?php echo $form['date']->renderLabelName() ?></label>
        <?php echo $form['date'] ?>
        <?php echo $form['date']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['vocation_class_id']->renderLabel() ?>
        <?php echo $form['vocation_class_id'] ?>
        <?php echo $form['vocation_class_id']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['company']->renderLabel() ?>
        <?php echo $form['company'] ?>
        <?php echo $form['company']->renderError() ?>
      </div>
      <div class="wrap">
        <?php echo $form['company_position']->renderLabel() ?>
        <?php echo $form['company_position'] ?>
        <?php echo $form['company_position']->renderError() ?>
      </div>
      <div class="wrap">
        <label><?php echo $form['company_match_funds']->renderLabelName() ?></label>
        <?php echo $form['company_match_funds'] ?>
        <?php echo $form['company_match_funds']->renderError() ?>
      </div>
    </div>

    <table style="float:left;" class="box full">
      <tr>
        <td colspan="2" class="title">Pilot Information</td>
      </tr>
      <tr>
        <td>
          <?php echo $form['license_type']->renderLabel() ?>
        </td>
        <td>
          <?php echo $form['license_type'] ?>
          <?php echo $form['license_type']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['pilot_certificate']->renderLabel() ?></td>
        <td>
          <?php echo $form['pilot_certificate'] ?>
          <?php echo $form['pilot_certificate']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><label>Ratings:</label></td>
        <td>
          <?php echo $form['ifr']->renderLabel() ?>
          <?php echo $form['ifr'] ?>
          <label class="raw" for="<?php echo $form['ifr']->renderId()?>">Yes</label>
          <?php echo $form['ifr']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['multi_engine']->renderLabel() ?>
          <?php echo $form['multi_engine'] ?>
          <label class="raw" for="<?php echo $form['multi_engine']->renderId()?>">Yes</label>
          <?php echo $form['multi_engine']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['se_instructor']->renderLabel() ?>
          <?php echo $form['se_instructor'] ?>
          <?php echo $form['se_instructor']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['me_instructor']->renderLabel() ?>
          <?php echo $form['me_instructor'] ?>
          <?php echo $form['me_instructor']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['other_ratings']->renderLabel()?></td>
        <td>
          <?php echo $form['other_ratings'] ?>
          <?php echo $form['other_ratings']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><label>Hours:</label></td>
        <td>
          <?php echo $form['total_hours']->renderLabel() ?>
          <?php echo $form['total_hours']; ?>
          <?php echo $form['total_hours']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['ifr_hours']->renderLabel() ?>
          <?php echo $form['ifr_hours']; ?>
          <?php echo $form['ifr_hours']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['multi_hours']->renderLabel() ?>
          <?php echo $form['multi_hours']; ?>
          <?php echo $form['multi_hours']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['other_hours']->renderLabel() ?>
          <?php echo $form['other_hours']; ?>
          <?php echo $form['other_hours']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['home_base']->renderLabel()?></td>
        <td>
          <?php echo $form['home_base']?>
          <?php echo $form['home_base']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['secondary_home_bases']->renderLabel()?></td>
        <td>
          <?php echo $form['secondary_home_bases']?>
          <?php echo $form['secondary_home_bases']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['fbo']->renderLabel()?></td>
        <td>
          <?php echo $form['fbo']?>
          <?php echo $form['fbo']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['height']->renderLabel()?></td>
        <td>
          <?php echo $form['height']?>
          <?php echo $form['height']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['weight']->renderLabel()?></td>
        <td>
          <?php echo $form['weight']?>
          <?php echo $form['weight']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['date_of_birth']->renderLabel()?></td>
        <td>
          <?php echo $form['date_of_birth']?>
          <?php echo $form['date_of_birth']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['medical_class']->renderLabel()?></td>
        <td>
          <?php echo $form['medical_class']?>
          <?php echo $form['medical_class']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><label><?php echo $form['applicant_pilot']->renderLabelName() ?></label></td>
        <td>
          <?php echo $form['applicant_pilot'] ?>
          <?php echo $form['applicant_pilot']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><label>Spouse / Emergency Contact</label></td>
        <td>
          <label><?php echo $form['spouse_pilot']->renderLabelName() ?></label>
          <?php echo $form['spouse_pilot'] ?>
          <?php echo $form['spouse_pilot']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['spouse_first_name']->renderLabel() ?>
          <?php echo $form['spouse_first_name'] ?>
          <?php echo $form['spouse_first_name']->renderError() ?>
          <br clear="all"/>
          <?php echo $form['spouse_last_name']->renderLabel() ?>
          <?php echo $form['spouse_last_name'] ?>
          <?php echo $form['spouse_last_name']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['languages_spoken']->renderLabel() ?></td>
        <td>
          <?php echo $form['languages_spoken'] ?>
          <?php echo $form['languages_spoken']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['affirmation_agreed']->renderLabel() ?></td>
        <td>
          <?php echo $form['affirmation_agreed'] ?>
          <label class="raw" for="<?php echo $form['affirmation_agreed']->renderId()?>">Yes</label>
          <?php echo $form['affirmation_agreed']->renderError() ?>
        </td>
      </tr>
    </table>

    <table style="float:left;" class="box full">
      <tr>
        <td colspan="2" class="title">Volunteer Opportunities</td>
      </tr>
      <tr>
        <td colspan="2">
          <?php echo $form['mission_orientation']?>
          <?php echo $form['mission_orientation']->renderLabel()?>
          <?php echo $form['mission_orientation']->renderError()?>

          <?php echo $form['member_meetings']?>
          <?php echo $form['member_meetings']->renderLabel()?>
          <?php echo $form['member_meetings']->renderError()?>

          <?php echo $form['writing']?>
          <?php echo $form['writing']->renderLabel()?>
          <?php echo $form['writing']->renderError()?>
          <br clear="all"/>
          <?php echo $form['mission_coordination']?>
          <?php echo $form['mission_coordination']->renderLabel()?>
          <?php echo $form['mission_coordination']->renderError()?>

          <?php echo $form['media_relations']?>
          <?php echo $form['media_relations']->renderLabel()?>
          <?php echo $form['media_relations']->renderError()?>

          <?php echo $form['speakers_bureau']?>
          <?php echo $form['speakers_bureau']->renderLabel()?>
          <?php echo $form['speakers_bureau']->renderError()?>
          <br clear="all"/>
          <?php echo $form['pilot_recruitment']?>
          <?php echo $form['pilot_recruitment']->renderLabel()?>
          <?php echo $form['pilot_recruitment']->renderError()?>
          
          <?php echo $form['telephone_work']?>
          <?php echo $form['telephone_work']->renderLabel()?>
          <?php echo $form['telephone_work']->renderError()?>
          
          <?php echo $form['executive_board']?>
          <?php echo $form['executive_board']->renderLabel()?>
          <?php echo $form['executive_board']->renderError()?>
          <br clear="all"/>
          <?php echo $form['fund_raising']?>
          <?php echo $form['fund_raising']->renderLabel()?>
          <?php echo $form['fund_raising']->renderError()?>

          <?php echo $form['computers']?>
          <?php echo $form['computers']->renderLabel()?>
          <?php echo $form['computers']->renderError()?>
          
          <?php echo $form['wing_team']?>
          <?php echo $form['wing_team']->renderLabel()?>
          <?php echo $form['wing_team']->renderError()?>
          <br clear="all"/>
          <?php echo $form['celebrity_contacts']?>
          <?php echo $form['celebrity_contacts']->renderLabel()?>
          <?php echo $form['celebrity_contacts']->renderError()?>

          <?php echo $form['clerical']?>
          <?php echo $form['clerical']->renderLabel()?>
          <?php echo $form['clerical']->renderError()?>

          <?php echo $form['graphic_arts']?>
          <?php echo $form['graphic_arts']->renderLabel()?>
          <?php echo $form['graphic_arts']->renderError()?>
          <br clear="all"/>
          <?php echo $form['hospital_outreach']?>
          <?php echo $form['hospital_outreach']->renderLabel()?>
          <?php echo $form['hospital_outreach']->renderError()?>

          <?php echo $form['publicity']?>
          <?php echo $form['publicity']->renderLabel()?>
          <?php echo $form['publicity']->renderError()?>

          <?php echo $form['foundation_contacts']?>
          <?php echo $form['foundation_contacts']->renderLabel()?>
          <?php echo $form['foundation_contacts']->renderError()?>
          <br clear="all"/>
          <?php echo $form['event_planning']?>
          <?php echo $form['event_planning']->renderLabel()?>
          <?php echo $form['event_planning']->renderError()?>

          <?php echo $form['web_internet']?>
          <?php echo $form['web_internet']->renderLabel()?>
          <?php echo $form['web_internet']->renderError()?>

          <?php echo $form['printing']?>
          <?php echo $form['printing']->renderLabel()?>
          <?php echo $form['printing']->renderError()?>
          <br clear="all"/>
          <?php echo $form['aviation_contacts']?>
          <?php echo $form['aviation_contacts']->renderLabel()?>
          <?php echo $form['aviation_contacts']->renderError()?>
        </td>
      </tr>
      <tr>
        <td width="1%"><?php echo $form['other_volunteer']->renderLabel() ?></td>
        <td>
          <?php echo $form['other_volunteer'] ?>
          <?php echo $form['other_volunteer']->renderError() ?>
        </td>
      </tr>
    </table>

    <table style="float:left;" class="box full">
      <tr>
        <td colspan="2" class="title">Memberships</td>
      </tr>
      <tr>
        <td width="1%"><?php echo $form['member_aopa']->renderLabel()?></td>
        <td>
          <?php echo $form['member_aopa']?>
          <label class="raw" for="<?php echo $form['member_aopa']->renderId()?>">Yes</label>
          <?php echo $form['member_aopa']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['member_kiwanis']->renderLabel()?></td>
        <td>
          <?php echo $form['member_kiwanis']?>
          <label class="raw" for="<?php echo $form['member_kiwanis']->renderId()?>">Yes</label>
          <?php echo $form['member_kiwanis']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['member_rotary']->renderLabel()?></td>
        <td>
          <?php echo $form['member_rotary']?>
          <label class="raw" for="<?php echo $form['member_rotary']->renderId()?>">Yes</label>
          <?php echo $form['member_rotary']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['member_lions']->renderLabel()?></td>
        <td>
          <?php echo $form['member_lions']?>
          <label class="raw" for="<?php echo $form['member_lions']->renderId()?>">Yes</label>
          <?php echo $form['member_lions']->renderError()?>
        </td>
      </tr>
    </table>
    
    <table style="float:left;" class="box full">
      <tr>
        <td colspan="2" class="title">Payment</td>
      </tr>
      <tr>
        <td width="1%"><?php echo $form['dues_amount_paid']->renderLabel()?></td>
        <td>
          <?php echo $form['dues_amount_paid']?>
          <?php echo $form['dues_amount_paid']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['donation_amount_paid']->renderLabel()?></td>
        <td>
          <?php echo $form['donation_amount_paid']?>
          <?php echo $form['donation_amount_paid']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['method_of_payment']->renderLabel()?></td>
        <td>
          <?php echo $form['method_of_payment']?>
          <?php echo $form['method_of_payment']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['ccard_approval_number']->renderLabel()?></td>
        <td>
          <?php echo $form['ccard_approval_number']?>
          <?php echo $form['ccard_approval_number']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['premium_choice']->renderLabel()?></td>
        <td>
          <?php echo $form['premium_choice']?>
          <?php echo $form['premium_choice']->renderError()?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['premium_size']->renderLabel() ?></td>
        <td>
          <?php echo $form['premium_size'] ?>
          <?php echo $form['premium_size']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['referral_source']->renderLabel() ?></td>
        <td>
          <?php echo $form['referral_source'] ?>
          <?php echo $form['referral_source']->renderError() ?>
        </td>
      </tr>
    </table>

    <div class="box full">
      <div class="form-submit">
        <a onclick="$('#app_form_submit').click();return false;" href="#" class="btn-action"><span>Save »</span><strong> </strong></a>
        <a href="<?php echo url_for('@member_view?id='.$member->getId())?>" class="cancel">Cancel</a>
        <input type="submit" id="app_form_submit" class="hide"/>
      </div>
    </div>
  </form>
</div>