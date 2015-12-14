<?php use_helper('jQuery', 'DateForm')?>

<div class="step" style="display: block;">
<div class="passenger-form">
<form action="<?php echo url_for('pending_member/step5Check?id='.$form->getObject()->getId()) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields() ?>
<div class="box full">
<div class="wrap"><label><?php echo $form['premium_choice']->renderLabelName() ?></label>
<?php echo $form['premium_choice'] ?> <?php echo $form['premium_choice']->renderError() ?>
</div>
<div class="wrap"><label>Volunteer Opportunities</label>
<div class="wrap">Many Angel Flight West members lend valuable
assistance beyond providing flying skills. Please indicate any areas in
which you may be willing to assist us:<br />
<br />
<div class="wrap">Select: <?php echo jq_link_to_function('All', "$('.will').attr('checked', 'checked');")?>
, <?php echo jq_link_to_function('None', "$('.will').attr('checked', false);")?>
</div>
<br />
<?php echo $form['mission_orientation']?> <?php echo $form['mission_orientation']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['mission_orientation']->renderError()?> <br clear="all" />
<?php echo $form['mission_coordination']?> <?php echo $form['mission_coordination']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['mission_coordination']->renderError()?> <br
	clear="all" />
<?php echo $form['pilot_recruitment']?> <?php echo $form['pilot_recruitment']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['pilot_recruitment']->renderError()?> <br clear="all" />
<?php echo $form['fund_raising']?> <?php echo $form['fund_raising']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['fund_raising']->renderError()?> <br clear="all" />
<?php echo $form['celebrity_contacts']?> <?php echo $form['celebrity_contacts']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['celebrity_contacts']->renderError()?> <br clear="all" />
<?php echo $form['graphic_arts']?> <?php echo $form['graphic_arts']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['graphic_arts']->renderError()?> <br clear="all" />
<?php echo $form['hospital_outreach']?> <?php echo $form['hospital_outreach']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['hospital_outreach']->renderError()?> <br clear="all" />
<?php echo $form['event_planning']?> <?php echo $form['event_planning']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['event_planning']->renderError()?> <br clear="all" />
<?php echo $form['media_relations']?> <?php echo $form['media_relations']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['media_relations']->renderError()?> <br clear="all" />
<?php echo $form['telephone_work']?> <?php echo $form['telephone_work']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['telephone_work']->renderError()?> <br clear="all" />
<?php echo $form['computers']?> <?php echo $form['computers']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['computers']->renderError()?> <br clear="all" />
<?php echo $form['clerical']?> <?php echo $form['clerical']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['clerical']->renderError()?> <br clear="all" />
<?php echo $form['printing']?> <?php echo $form['printing']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['printing']->renderError()?> <br clear="all" />
<?php echo $form['writing']?> <?php echo $form['writing']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['writing']->renderError()?> <br clear="all" />
<?php echo $form['speakers_bureau']?> <?php echo $form['speakers_bureau']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['speakers_bureau']->renderError()?> <br clear="all" />
<?php echo $form['wing_team']?> <?php echo $form['wing_team']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['wing_team']->renderError()?> <br clear="all" />
<?php echo $form['web_internet']?> <?php echo $form['web_internet']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['web_internet']->renderError()?> <br clear="all" />
<?php echo $form['foundation_contacts']?> <?php echo $form['foundation_contacts']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['foundation_contacts']->renderError()?> <br clear="all" />
<?php echo $form['aviation_contacts']?> <?php echo $form['aviation_contacts']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['aviation_contacts']->renderError()?></div>
</div>
<div class="wrap"><label>I am a member of</label>
<div class="wrap">
<div class="wrap">Select: <?php echo jq_link_to_function('All', "$('.wiss').attr('checked', 'checked');")?>
, <?php echo jq_link_to_function('None', "$('.wiss').attr('checked', false);")?>
</div>
<br />

<?php echo $form['member_aopa']?> <?php echo $form['member_aopa']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_aopa']->renderError()?> <br clear="all" />
<?php echo $form['member_kiwanis']?> <?php echo $form['member_kiwanis']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_kiwanis']->renderError()?> <br clear="all" />
<?php echo $form['member_rotary']?> <?php echo $form['member_rotary']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_rotary']->renderError()?> <br clear="all" />
<?php echo $form['member_lions']?> <?php echo $form['member_lions']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_lions']->renderError()?> <br clear="all" />
<?php echo $form['member_99s']?> <?php echo $form['member_99s']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_99s']->renderError()?> <br clear="all" />
<?php echo $form['member_wia']?> <?php echo $form['member_wia']->renderLabel(null, array('class' => 'raw'))?>
<?php echo $form['member_wia']->renderError()?></div>
</div>
<div class="wrap"><?php echo $form['company_name']->renderLabel()?> <?php echo $form['company_name']?>
<?php echo $form['company_name']->renderError()?></div>
<div class="wrap"><?php echo $form['company_position']->renderLabel()?>
<?php echo $form['company_position']?> <?php echo $form['company_position']->renderError()?>
</div>
<div class="wrap"><?php echo $form['company_match_funds']->renderLabel()?>
<?php echo $form['company_match_funds']?> <?php echo $form['company_match_funds']->renderError()?>
</div>
<div class="wrap"><?php echo $form['referral_source']->renderLabel()?>
<div class="wrap"><?php echo $form['referral_source']?> <?php echo $form['referral_source']->renderError()?>
<br clear="all" />
<?php echo $form['referral_source_other']->renderLabel()?> <?php echo $form['referral_source_other']?>
<?php echo $form['referral_source_other']->renderError()?></div>
</div>
<div class="wrap"><?php echo $form['referer_name']->renderLabel()?>
<div class="wrap"><?php echo $form['referer_name']->renderHelp()?> <?php echo $form['referer_name']?>
<?php echo $form['referer_name']->renderError()?></div>
</div>
<div class="wrap"><label
	for="<?php echo $form['hseats_interest']->renderId() ?>"> <?php echo $form['hseats_interest']->renderLabelName()?>
(<a href="#"
	onclick="$('#hseats_interest_help').dialog('open'); return false;">Help</a>)
</label>
<div id="hseats_interest_help" title="Help"><?php echo $form['hseats_interest']->renderHelp()?>
</div>
<?php echo jq_javascript_tag("$(function(){ $('#hseats_interest_help').dialog({ autoOpen: false }); });")?>
<?php echo $form['hseats_interest']?> <?php echo $form['hseats_interest']->renderError()?>
</div>
<div class="wrap"><label
	for="<?php echo $form['mission_email_optin']->renderId() ?>"> <?php echo $form['mission_email_optin']->renderLabelName()?>
(<a href="#"
	onclick="$('#mission_email_optin_help').dialog('open'); return false;">Help</a>)
</label>
<div id="mission_email_optin_help" title="Help"><?php echo $form['mission_email_optin']->renderHelp()?>
</div>
<?php echo jq_javascript_tag("$(function(){ $('#mission_email_optin_help').dialog({ autoOpen: false }); });")?>
<?php echo $form['mission_email_optin']?> <?php echo $form['mission_email_optin']->renderError()?>
</div>
<div class="wrap">
        <?php echo $form['ccard_number']->renderLabel()?>
                <?php echo $form['ccard_number']?>
	<?php echo $form['ccard_number']->renderError()?>
</div>
<div class="wrap">
    <label for="<?php echo $form['ccard_expire']->renderId()?>"> <?php echo $form['ccard_expire']->renderLabelName()?></label>
            <?php echo $form['ccard_expire']?> <?php echo $form['ccard_expire']->renderError()?>
<?php //echo $form['ccard_expire']
//          $array = explode("/", $form->getObject()->getCcardExpire());
//          $s_y = $sf_params->get("s_y") ? $sf_params->get("s_y") : (isset($array[1]) ? $array[1] : "");
//          $s_m = $sf_params->get("s_m") ? $sf_params->get("s_m") : (isset($array[0]) ? $array[0] : "");
?> <?php //echo select_month_tag_miga('s_m', $s_m, array(), array("style"=>"width:40px;")) ?>
<?php //echo select_year_tag_miga('s_y', $s_y, array(), array("style"=>"width:55px;")) ?>
</div>
<div class="wrap">
    <label for="<?php echo $form['ccard_expire']->renderId()?>"> <?php echo $form['ccard_code']->renderLabelName()?></label>
            <?php echo $form['ccard_code']?>
  <?php echo $form['ccard_code']->renderError()?>
</div>
<div class="form-submit"><a class="btn-action" href="#"
	onclick="$('#step5_submit').click(); return false;"><span>Save and
Continue »</span><strong> </strong></a>
   <a class="cancel" href="<?php echo "/pending_member/step4/id/".$sf_request->getParameter("id")?>">&laquo; Back</a> <input type="submit"
	id="step5_submit" value="submit" class="hide" /></div>
</div>
</form>
</div>
</div>