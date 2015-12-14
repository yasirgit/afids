<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('pending_member/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id=' . $form->getObject()->getId() : '')) ?>"
    method="post"
    <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?> <input type="hidden"
               name="sf_method" value="put" /> <?php endif; ?>
        <table>
            <tfoot>
                <tr>
                    <td colspan="2"><?php echo $form->renderHiddenFields() ?> &nbsp;<a
                            href="<?php echo url_for('pending_member/index') ?>">Cancel</a> <?php if (!$form->getObject()->isNew()): ?>
                            &nbsp;<?php echo link_to('Delete', 'pending_member/delete?id=' . $form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?> <input type="submit" value="Save" /></td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
                    <tr>
                        <th><?php echo $form['application_date']->renderLabel() ?></th>
                        <td><?php echo $form['application_date']->renderError() ?> <?php echo $form['application_date'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['renewal']->renderLabel() ?></th>
                        <td><?php echo $form['renewal']->renderError() ?> <?php echo $form['renewal'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['title']->renderLabel() ?></th>
                        <td><?php echo $form['title']->renderError() ?> <?php echo $form['title'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['first_name']->renderLabel() ?></th>
                        <td><?php echo $form['first_name']->renderError() ?> <?php echo $form['first_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['last_name']->renderLabel() ?></th>
                        <td><?php echo $form['last_name']->renderError() ?> <?php echo $form['last_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['address1']->renderLabel() ?></th>
                        <td><?php echo $form['address1']->renderError() ?> <?php echo $form['address1'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['address2']->renderLabel() ?></th>
                        <td><?php echo $form['address2']->renderError() ?> <?php echo $form['address2'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['city']->renderLabel() ?></th>
                        <td><?php echo $form['city']->renderError() ?> <?php echo $form['city'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['state']->renderLabel() ?></th>
                        <td><?php echo $form['state']->renderError() ?> <?php echo $form['state'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['zipcode']->renderLabel() ?></th>
                        <td><?php echo $form['zipcode']->renderError() ?> <?php echo $form['zipcode'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['day_phone']->renderLabel() ?></th>
                        <td><?php echo $form['day_phone']->renderError() ?> <?php echo $form['day_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['day_comment']->renderLabel() ?></th>
                        <td><?php echo $form['day_comment']->renderError() ?> <?php echo $form['day_comment'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['eve_phone']->renderLabel() ?></th>
                        <td><?php echo $form['eve_phone']->renderError() ?> <?php echo $form['eve_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['eve_comment']->renderLabel() ?></th>
                        <td><?php echo $form['eve_comment']->renderError() ?> <?php echo $form['eve_comment'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['mobile_phone']->renderLabel() ?></th>
                        <td><?php echo $form['mobile_phone']->renderError() ?> <?php echo $form['mobile_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['mobile_comment']->renderLabel() ?></th>
                        <td><?php echo $form['mobile_comment']->renderError() ?> <?php echo $form['mobile_comment'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['pager_phone']->renderLabel() ?></th>
                        <td><?php echo $form['pager_phone']->renderError() ?> <?php echo $form['pager_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['pager_comment']->renderLabel() ?></th>
                        <td><?php echo $form['pager_comment']->renderError() ?> <?php echo $form['pager_comment'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['fax_phone1']->renderLabel() ?></th>
                        <td><?php echo $form['fax_phone1']->renderError() ?> <?php echo $form['fax_phone1'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['fax_comment1']->renderLabel() ?></th>
                        <td><?php echo $form['fax_comment1']->renderError() ?> <?php echo $form['fax_comment1'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['fax_phone2']->renderLabel() ?></th>
                        <td><?php echo $form['fax_phone2']->renderError() ?> <?php echo $form['fax_phone2'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['fax_comment2']->renderLabel() ?></th>
                        <td><?php echo $form['fax_comment2']->renderError() ?> <?php echo $form['fax_comment2'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['other_phone']->renderLabel() ?></th>
                        <td><?php echo $form['other_phone']->renderError() ?> <?php echo $form['other_phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['other_comment']->renderLabel() ?></th>
                        <td><?php echo $form['other_comment']->renderError() ?> <?php echo $form['other_comment'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['email']->renderLabel() ?></th>
                        <td><?php echo $form['email']->renderError() ?> <?php echo $form['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['spouse_first_name']->renderLabel() ?></th>
                        <td><?php echo $form['spouse_first_name']->renderError() ?> <?php echo $form['spouse_first_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['spouse_last_name']->renderLabel() ?></th>
                        <td><?php echo $form['spouse_last_name']->renderError() ?> <?php echo $form['spouse_last_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['applicant_pilot']->renderLabel() ?></th>
                        <td><?php echo $form['applicant_pilot']->renderError() ?> <?php echo $form['applicant_pilot'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['spouse_pilot']->renderLabel() ?></th>
                        <td><?php echo $form['spouse_pilot']->renderError() ?> <?php echo $form['spouse_pilot'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['applicant_copilot']->renderLabel() ?></th>
                        <td><?php echo $form['applicant_copilot']->renderError() ?> <?php echo $form['applicant_copilot'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['languages_spoken']->renderLabel() ?></th>
                        <td><?php echo $form['languages_spoken']->renderError() ?> <?php echo $form['languages_spoken'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['home_base']->renderLabel() ?></th>
                        <td><?php echo $form['home_base']->renderError() ?> <?php echo $form['home_base'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['fbo_name']->renderLabel() ?></th>
                        <td><?php echo $form['fbo_name']->renderError() ?> <?php echo $form['fbo_name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_primary_id']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_primary_id']->renderError() ?> <?php echo $form['aircraft_primary_id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_primary_own']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_primary_own']->renderError() ?> <?php echo $form['aircraft_primary_own'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_primary_ice']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_primary_ice']->renderError() ?> <?php echo $form['aircraft_primary_ice'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_primary_seats']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_primary_seats']->renderError() ?> <?php echo $form['aircraft_primary_seats'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_primary_n_number']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_primary_n_number']->renderError() ?> <?php echo $form['aircraft_primary_n_number'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_secondary_id']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_secondary_id']->renderError() ?> <?php echo $form['aircraft_secondary_id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_secondary_own']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_secondary_own']->renderError() ?> <?php echo $form['aircraft_secondary_own'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_secondary_ice']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_secondary_ice']->renderError() ?> <?php echo $form['aircraft_secondary_ice'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_secondary_seats']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_secondary_seats']->renderError() ?> <?php echo $form['aircraft_secondary_seats'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['aircraft_secondary_n_number']->renderLabel() ?></th>
                        <td><?php echo $form['aircraft_secondary_n_number']->renderError() ?>
                    <?php echo $form['aircraft_secondary_n_number'] ?></td>
            </tr>
            <tr>
                <th><?php echo $form['pilot_certificate']->renderLabel() ?></th>
                <td><?php echo $form['pilot_certificate']->renderError() ?> <?php echo $form['pilot_certificate'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ratings']->renderLabel() ?></th>
                <td><?php echo $form['ratings']->renderError() ?> <?php echo $form['ratings'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['medical_class']->renderLabel() ?></th>
                <td><?php echo $form['medical_class']->renderError() ?> <?php echo $form['medical_class'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['license_type']->renderLabel() ?></th>
                <td><?php echo $form['license_type']->renderError() ?> <?php echo $form['license_type'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['total_hours']->renderLabel() ?></th>
                <td><?php echo $form['total_hours']->renderError() ?> <?php echo $form['total_hours'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ifr_hours']->renderLabel() ?></th>
                <td><?php echo $form['ifr_hours']->renderError() ?> <?php echo $form['ifr_hours'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['multi_hours']->renderLabel() ?></th>
                <td><?php echo $form['multi_hours']->renderError() ?> <?php echo $form['multi_hours'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['other_hours']->renderLabel() ?></th>
                <td><?php echo $form['other_hours']->renderError() ?> <?php echo $form['other_hours'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date_of_birth']->renderLabel() ?></th>
                <td><?php echo $form['date_of_birth']->renderError() ?> <?php echo $form['date_of_birth'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['height']->renderLabel() ?></th>
                <td><?php echo $form['height']->renderError() ?> <?php echo $form['height'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['weight']->renderLabel() ?></th>
                <td><?php echo $form['weight']->renderError() ?> <?php echo $form['weight'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_weekdays']->renderLabel() ?></th>
                <td><?php echo $form['availability_weekdays']->renderError() ?> <?php echo $form['availability_weekdays'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_weeknights']->renderLabel() ?></th>
                <td><?php echo $form['availability_weeknights']->renderError() ?> <?php echo $form['availability_weeknights'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_weekends']->renderLabel() ?></th>
                <td><?php echo $form['availability_weekends']->renderError() ?> <?php echo $form['availability_weekends'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_notice']->renderLabel() ?></th>
                <td><?php echo $form['availability_notice']->renderError() ?> <?php echo $form['availability_notice'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_last_minute']->renderLabel() ?></th>
                <td><?php echo $form['availability_last_minute']->renderError() ?> <?php echo $form['availability_last_minute'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['availability_copilot']->renderLabel() ?></th>
                <td><?php echo $form['availability_copilot']->renderError() ?> <?php echo $form['availability_copilot'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['affirmation_agreed']->renderLabel() ?></th>
                <td><?php echo $form['affirmation_agreed']->renderError() ?> <?php echo $form['affirmation_agreed'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['insurance_agreed']->renderLabel() ?></th>
                <td><?php echo $form['insurance_agreed']->renderError() ?> <?php echo $form['insurance_agreed'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['volunteer_interest']->renderLabel() ?></th>
                <td><?php echo $form['volunteer_interest']->renderError() ?> <?php echo $form['volunteer_interest'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['company_name']->renderLabel() ?></th>
                <td><?php echo $form['company_name']->renderError() ?> <?php echo $form['company_name'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['company_position']->renderLabel() ?></th>
                <td><?php echo $form['company_position']->renderError() ?> <?php echo $form['company_position'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['company_match_funds']->renderLabel() ?></th>
                <td><?php echo $form['company_match_funds']->renderError() ?> <?php echo $form['company_match_funds'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['company_business_category_id']->renderLabel() ?></th>
                <td><?php echo $form['company_business_category_id']->renderError() ?>
                    <?php echo $form['company_business_category_id'] ?></td>
            </tr>
            <tr>
                <th><?php echo $form['referral_source']->renderLabel() ?></th>
                <td><?php echo $form['referral_source']->renderError() ?> <?php echo $form['referral_source'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_choice']->renderLabel() ?></th>
                <td><?php echo $form['premium_choice']->renderError() ?> <?php echo $form['premium_choice'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_size']->renderLabel() ?></th>
                <td><?php echo $form['premium_size']->renderError() ?> <?php echo $form['premium_size'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['dues_amount_paid']->renderLabel() ?></th>
                <td><?php echo $form['dues_amount_paid']->renderError() ?> <?php echo $form['dues_amount_paid'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['donation_amount_paid']->renderLabel() ?></th>
                <td><?php echo $form['donation_amount_paid']->renderError() ?> <?php echo $form['donation_amount_paid'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['method_of_payment_id']->renderLabel() ?></th>
                <td><?php echo $form['method_of_payment_id']->renderError() ?> <?php echo $form['method_of_payment_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ccard_approval_number']->renderLabel() ?></th>
                <td><?php echo $form['ccard_approval_number']->renderError() ?> <?php echo $form['ccard_approval_number'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ccard_error_code']->renderLabel() ?></th>
                <td><?php echo $form['ccard_error_code']->renderError() ?> <?php echo $form['ccard_error_code'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ccard_avs_result']->renderLabel() ?></th>
                <td><?php echo $form['ccard_avs_result']->renderError() ?> <?php echo $form['ccard_avs_result'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['processed_date']->renderLabel() ?></th>
                <td><?php echo $form['processed_date']->renderError() ?> <?php echo $form['processed_date'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_id']->renderLabel() ?></th>
                <td><?php echo $form['member_id']->renderError() ?> <?php echo $form['member_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['mission_orientation']->renderLabel() ?></th>
                <td><?php echo $form['mission_orientation']->renderError() ?> <?php echo $form['mission_orientation'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['mission_coordination']->renderLabel() ?></th>
                <td><?php echo $form['mission_coordination']->renderError() ?> <?php echo $form['mission_coordination'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['pilot_recruitment']->renderLabel() ?></th>
                <td><?php echo $form['pilot_recruitment']->renderError() ?> <?php echo $form['pilot_recruitment'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['fund_raising']->renderLabel() ?></th>
                <td><?php echo $form['fund_raising']->renderError() ?> <?php echo $form['fund_raising'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['celebrity_contacts']->renderLabel() ?></th>
                <td><?php echo $form['celebrity_contacts']->renderError() ?> <?php echo $form['celebrity_contacts'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['hospital_outreach']->renderLabel() ?></th>
                <td><?php echo $form['hospital_outreach']->renderError() ?> <?php echo $form['hospital_outreach'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['media_relations']->renderLabel() ?></th>
                <td><?php echo $form['media_relations']->renderError() ?> <?php echo $form['media_relations'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['telephone_work']->renderLabel() ?></th>
                <td><?php echo $form['telephone_work']->renderError() ?> <?php echo $form['telephone_work'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['computers']->renderLabel() ?></th>
                <td><?php echo $form['computers']->renderError() ?> <?php echo $form['computers'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['clerical']->renderLabel() ?></th>
                <td><?php echo $form['clerical']->renderError() ?> <?php echo $form['clerical'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['publicity']->renderLabel() ?></th>
                <td><?php echo $form['publicity']->renderError() ?> <?php echo $form['publicity'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['writing']->renderLabel() ?></th>
                <td><?php echo $form['writing']->renderError() ?> <?php echo $form['writing'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['speakers_bureau']->renderLabel() ?></th>
                <td><?php echo $form['speakers_bureau']->renderError() ?> <?php echo $form['speakers_bureau'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['wing_team']->renderLabel() ?></th>
                <td><?php echo $form['wing_team']->renderError() ?> <?php echo $form['wing_team'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['graphic_arts']->renderLabel() ?></th>
                <td><?php echo $form['graphic_arts']->renderError() ?> <?php echo $form['graphic_arts'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['event_planning']->renderLabel() ?></th>
                <td><?php echo $form['event_planning']->renderError() ?> <?php echo $form['event_planning'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['web_internet']->renderLabel() ?></th>
                <td><?php echo $form['web_internet']->renderError() ?> <?php echo $form['web_internet'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['foundation_contacts']->renderLabel() ?></th>
                <td><?php echo $form['foundation_contacts']->renderError() ?> <?php echo $form['foundation_contacts'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aviation_contacts']->renderLabel() ?></th>
                <td><?php echo $form['aviation_contacts']->renderError() ?> <?php echo $form['aviation_contacts'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['printing']->renderLabel() ?></th>
                <td><?php echo $form['printing']->renderError() ?> <?php echo $form['printing'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_aopa']->renderLabel() ?></th>
                <td><?php echo $form['member_aopa']->renderError() ?> <?php echo $form['member_aopa'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_kiwanis']->renderLabel() ?></th>
                <td><?php echo $form['member_kiwanis']->renderError() ?> <?php echo $form['member_kiwanis'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_rotary']->renderLabel() ?></th>
                <td><?php echo $form['member_rotary']->renderError() ?> <?php echo $form['member_rotary'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_lions']->renderLabel() ?></th>
                <td><?php echo $form['member_lions']->renderError() ?> <?php echo $form['member_lions'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['person_id']->renderLabel() ?></th>
                <td><?php echo $form['person_id']->renderError() ?> <?php echo $form['person_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['novapointe_id']->renderLabel() ?></th>
                <td><?php echo $form['novapointe_id']->renderError() ?> <?php echo $form['novapointe_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_ship_date']->renderLabel() ?></th>
                <td><?php echo $form['premium_ship_date']->renderError() ?> <?php echo $form['premium_ship_date'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_ship_method']->renderLabel() ?></th>
                <td><?php echo $form['premium_ship_method']->renderError() ?> <?php echo $form['premium_ship_method'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_ship_cost']->renderLabel() ?></th>
                <td><?php echo $form['premium_ship_cost']->renderError() ?> <?php echo $form['premium_ship_cost'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['premium_ship_tracking_number']->renderLabel() ?></th>
                <td><?php echo $form['premium_ship_tracking_number']->renderError() ?>
                    <?php echo $form['premium_ship_tracking_number'] ?></td>
            </tr>
            <tr>
                <th><?php echo $form['referer_name']->renderLabel() ?></th>
                <td><?php echo $form['referer_name']->renderError() ?> <?php echo $form['referer_name'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['referral_session_id']->renderLabel() ?></th>
                <td><?php echo $form['referral_session_id']->renderError() ?> <?php echo $form['referral_session_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aircraft_third_id']->renderLabel() ?></th>
                <td><?php echo $form['aircraft_third_id']->renderError() ?> <?php echo $form['aircraft_third_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aircraft_third_own']->renderLabel() ?></th>
                <td><?php echo $form['aircraft_third_own']->renderError() ?> <?php echo $form['aircraft_third_own'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aircraft_third_ice']->renderLabel() ?></th>
                <td><?php echo $form['aircraft_third_ice']->renderError() ?> <?php echo $form['aircraft_third_ice'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aircraft_third_seats']->renderLabel() ?></th>
                <td><?php echo $form['aircraft_third_seats']->renderError() ?> <?php echo $form['aircraft_third_seats'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['aircraft_third_n_number']->renderLabel() ?></th>
                <td><?php echo $form['aircraft_third_n_number']->renderError() ?> <?php echo $form['aircraft_third_n_number'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['ip_address']->renderLabel() ?></th>
                <td><?php echo $form['ip_address']->renderError() ?> <?php echo $form['ip_address'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['pager_email']->renderLabel() ?></th>
                <td><?php echo $form['pager_email']->renderError() ?> <?php echo $form['pager_email'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_99s']->renderLabel() ?></th>
                <td><?php echo $form['member_99s']->renderError() ?> <?php echo $form['member_99s'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['member_wia']->renderLabel() ?></th>
                <td><?php echo $form['member_wia']->renderError() ?> <?php echo $form['member_wia'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['mission_email_optin']->renderLabel() ?></th>
                <td><?php echo $form['mission_email_optin']->renderError() ?> <?php echo $form['mission_email_optin'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['hseats_interest']->renderLabel() ?></th>
                <td><?php echo $form['hseats_interest']->renderError() ?> <?php echo $form['hseats_interest'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['master_application_id']->renderLabel() ?></th>
                <td><?php echo $form['master_application_id']->renderError() ?> <?php echo $form['master_application_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['master_member_id']->renderLabel() ?></th>
                <td><?php echo $form['master_member_id']->renderError() ?> <?php echo $form['master_member_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['referral_source_other']->renderLabel() ?></th>
                <td><?php echo $form['referral_source_other']->renderError() ?> <?php echo $form['referral_source_other'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['secondary_email']->renderLabel() ?></th>
                <td><?php echo $form['secondary_email']->renderError() ?> <?php echo $form['secondary_email'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['payment_transaction_id']->renderLabel() ?></th>
                <td><?php echo $form['payment_transaction_id']->renderError() ?> <?php echo $form['payment_transaction_id'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['middle_name']->renderLabel() ?></th>
                <td><?php echo $form['middle_name']->renderError() ?> <?php echo $form['middle_name'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['suffix']->renderLabel() ?></th>
                <td><?php echo $form['suffix']->renderError() ?> <?php echo $form['suffix'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['nickname']->renderLabel() ?></th>
                <td><?php echo $form['nickname']->renderError() ?> <?php echo $form['nickname'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['veteran']->renderLabel() ?></th>
                <td><?php echo $form['veteran']->renderError() ?> <?php echo $form['veteran'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['gender']->renderLabel() ?></th>
                <td><?php echo $form['gender']->renderError() ?> <?php echo $form['gender'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['emergency_contact_name']->renderLabel() ?></th>
                <td><?php echo $form['emergency_contact_name']->renderError() ?> <?php echo $form['emergency_contact_name'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['emergency_contact_phone']->renderLabel() ?></th>
                <td><?php echo $form['emergency_contact_phone']->renderError() ?> <?php echo $form['emergency_contact_phone'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['country']->renderLabel() ?></th>
                <td><?php echo $form['country']->renderError() ?> <?php echo $form['country'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['drivers_license_state']->renderLabel() ?></th>
                <td><?php echo $form['drivers_license_state']->renderError() ?> <?php echo $form['drivers_license_state'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['drivers_license_number']->renderLabel() ?></th>
                <td><?php echo $form['drivers_license_number']->renderError() ?> <?php echo $form['drivers_license_number'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
