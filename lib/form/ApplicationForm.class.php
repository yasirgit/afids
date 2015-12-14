<?php

/**
 * Application form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ApplicationForm extends BaseApplicationForm
{
  public function configure()
  {
    $yes_no = array(1 => 'Yes', 0 => 'No');
    $license_types = array_merge(array('' => '- none -'), sfConfig::get('app_pilot_license_types', array()));
    $se_types = array_merge(array('No' => 'No'), sfConfig::get('app_pilot_se_instructor', array()));
    $me_types = array_merge(array('No' => 'No'), sfConfig::get('app_pilot_me_instructor', array()));
    $medical_classes = array_merge(array(0 => 'Non-Pilot'), sfConfig::get('app_pilot_medical_classes', array()));
    $payment_types = sfConfig::get('app_payment_types', array());
    $premium_choices = array_merge(array('' => '- none -'), sfConfig::get('app_premium_choices', array()));
    $premium_sizes = sfConfig::get('app_premium_sizes', array());

    $referral_criteria = new Criteria();
    $referral_criteria->addAscendingOrderByColumn(RefSourcePeer::SOURCE_NAME);

    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'member_id'                    => new sfWidgetFormInputHidden(),
      'renewal'                      => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'date'                         => new widgetFormDateTimeCustom(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'vocation_class_id'            => new sfWidgetFormPropelChoice(array('model' => 'VocationClass', 'add_empty' => true)),
      'company'                      => new sfWidgetFormInput(array(), array('class' => 'text')),
      'company_position'             => new sfWidgetFormInput(array(), array('class' => 'text')),
      'company_match_funds'          => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'license_type'                 => new sfWidgetFormChoice(array('choices' => $license_types)),
      'pilot_certificate'            => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'ifr'                          => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'multi_engine'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'se_instructor'                => new sfWidgetFormChoice(array('choices' => $se_types), array('class' => 'raw')),
      'me_instructor'                => new sfWidgetFormChoice(array('choices' => $me_types), array('class' => 'raw')),
      'other_ratings'                => new sfWidgetFormInput(array(), array('class' => 'text')),
      'total_hours'                  => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'ifr_hours'                    => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'multi_hours'                  => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'other_hours'                  => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'home_base'                    => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'secondary_home_bases'         => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'fbo'                          => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'height'                       => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'weight'                       => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'date_of_birth'                => new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'medical_class'                => new sfWidgetFormChoice(array('choices' => $medical_classes)),
      'applicant_pilot'              => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'spouse_pilot'                 => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'spouse_first_name'            => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'spouse_last_name'             => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'languages_spoken'             => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'affirmation_agreed'           => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'mission_orientation'          => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'mission_coordination'         => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'pilot_recruitment'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'fund_raising'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'celebrity_contacts'           => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'hospital_outreach'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'member_meetings'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'media_relations'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'telephone_work'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'computers'                    => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'clerical'                     => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'publicity'                    => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'writing'                      => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'speakers_bureau'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'executive_board'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'wing_team'                    => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'graphic_arts'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'foundation_contacts'          => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'event_planning'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'web_internet'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'printing'                     => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'aviation_contacts'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'other_volunteer'              => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'member_aopa'                  => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'member_kiwanis'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'member_rotary'                => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'member_lions'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'dues_amount_paid'             => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'method_of_payment'            => new sfWidgetFormChoice(array('choices' => $payment_types)),
      'donation_amount_paid'         => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'ccard_approval_number'        => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'premium_choice'               => new sfWidgetFormChoice(array('choices' => $premium_choices)),
      'premium_size'                 => new sfWidgetFormChoice(array('choices' => $premium_sizes)),
      'referral_source'              => new sfWidgetFormPropelChoice(array('model' => 'RefSource', 'add_empty' => '- none -', 'criteria' => $referral_criteria)),
      't_shirt_size'                 => new sfWidgetFormInput(),
      'check_number'                 => new sfWidgetFormInput(),
      'title'                        => new sfWidgetFormInput(),
      'first_name'                   => new sfWidgetFormInput(),
      'last_name'                    => new sfWidgetFormInput(),
      'address1'                     => new sfWidgetFormInput(),
      'address2'                     => new sfWidgetFormInput(),
      'city'                         => new sfWidgetFormInput(),
      'state'                        => new sfWidgetFormInput(),
      'zipcode'                      => new sfWidgetFormInput(),
      'day_phone'                    => new sfWidgetFormInput(),
      'day_comment'                  => new sfWidgetFormInput(),
      'eve_phone'                    => new sfWidgetFormInput(),
      'eve_comment'                  => new sfWidgetFormInput(),
      'mobile_phone'                 => new sfWidgetFormInput(),
      'mobile_comment'               => new sfWidgetFormInput(),
      'pager_phone'                  => new sfWidgetFormInput(),
      'pager_comment'                => new sfWidgetFormInput(),
      'fax_phone1'                   => new sfWidgetFormInput(),
      'fax_comment1'                 => new sfWidgetFormInput(),
      'fax_phone2'                   => new sfWidgetFormInput(),
      'faxComment2'                  => new sfWidgetFormInput(),
      'other_phone'                  => new sfWidgetFormInput(),
      'other_comment'                => new sfWidgetFormInput(),
      'email'                        => new sfWidgetFormInput(),
      'aircraft_primary_id'          => new sfWidgetFormInput(),
      'aircraft_primary_own'         => new sfWidgetFormInput(),
      'aircraft_primary_ice'         => new sfWidgetFormInput(),
      'aircraft_primary_seats'       => new sfWidgetFormInput(),
      'aircraft_primary_nnumber'     => new sfWidgetFormInput(),
      'aircraft_secondary_id'        => new sfWidgetFormInput(),
      'aircraft_secondary_own'       => new sfWidgetFormInput(),
      'aircraft_secondary_ice'       => new sfWidgetFormInput(),
      'aircraft_secondary_seats'     => new sfWidgetFormInput(),
      'aircraft_secondary_nnumber'   => new sfWidgetFormInput(),
      'availability_weekdays'        => new sfWidgetFormInput(),
      'availability_weeknights'      => new sfWidgetFormInput(),
      'availability_weekends'        => new sfWidgetFormInput(),
      'availability_notice'          => new sfWidgetFormInput(),
      'availability_last_minute'     => new sfWidgetFormInput(),
      'availability_copilot'         => new sfWidgetFormInput(),
      'insurance_agreed'             => new sfWidgetFormInput(),
      'volunteer_interest'           => new sfWidgetFormInput(),
      'company_business_category_id' => new sfWidgetFormInput(),
      'ccard_error_code'             => new sfWidgetFormInput(),
      'ccard_avs_result'             => new sfWidgetFormInput(),
      'processed_date'               => new sfWidgetFormDateTime(),
      'novapointe_id'                => new sfWidgetFormInput(),
      'premium_ship_date'            => new sfWidgetFormDateTime(),
      'premium_ship_method'          => new sfWidgetFormInput(),
      'premium_ship_cost'            => new sfWidgetFormInput(),
      'premium_ship_tracking_number' => new sfWidgetFormInput(),
      'applicant_copilot'            => new sfWidgetFormInput(),
      'pager_email'                  => new sfWidgetFormInput(),
      'member99s'                    => new sfWidgetFormInput(),
      'member_wia'                   => new sfWidgetFormInput(),
      'mission_email_optin'          => new sfWidgetFormInput(),
      'hseats_interest'              => new sfWidgetFormInput(),
      'master_application_id'        => new sfWidgetFormInput(),
      'master_member_id'             => new sfWidgetFormInput(),
      'referral_source_other'        => new sfWidgetFormInput(),
      'secondary_email'              => new sfWidgetFormInput(),
      'payment_transaction_id'       => new sfWidgetFormInput(),
    ));

    $this->widgetSchema->setLabels(array(
      'date'                => 'Application Date',
      'vocation_class_id'   => 'Vocation Class Name',
      'company'             => 'Company Name',
      'company_position'    => 'Position',
      'company_match_funds' => 'Company Match Funds?',
      'ifr'                 => 'IFR',
      'multi_engine'        => 'Multi',
      'se_instructor'       => 'SE Instructor',
      'me_instructor'       => 'ME Instructor',
      'other_ratings'       => 'Other Ratings',
      'total_hours'         => 'Total',
      'ifr_hours'           => 'IFR',
      'multi_hours'         => 'Multi',
      'other_hours'         => 'Other',
      'home_base'           => 'Home Base',
      'secondary_home_bases'=> 'Secondary Home Base',
      'fbo'                 => 'FBO',
      'date_of_birth'       => 'Date of Birth',
      'medical_class'       => 'Medical Class',
      'applicant_pilot'     => 'Applicant Pilot?',
      'spouse_pilot'        => 'Is a Pilot?',
      'spouse_first_name'   => 'First Name',
      'spouse_last_name'    => 'Last Name',
      'languages_spoken'    => 'Languages Spoken',
      'affirmation_agreed'  => 'Affirmation Agreed',
      'mission_orientation' => 'Mission Orientation',
      'mission_coordination'=> 'Mission Coordination',
      'pilot_recruitment'   => 'Pilot Recruitment',
      'fund_raising'        => 'Fund Raising',
      'celebrity_contacts'  => 'Celebrity Contacts',
      'hospital_outreach'   => 'Outreach to Hospitals',
      'media_relations'     => 'Media Relations',
      'speakers_bureau'     => 'Speaker Bureau',
      'telephone_work'      => 'Telephone Work',
      'executive_board'     => 'Executive Board',
      'wing_team'           => 'Wing Team',
      'graphic_arts'        => 'Graphic Arts',
      'foundation_contacts' => 'Foundation Contacts',
      'event_planning'      => 'Event Planning',
      'web_internet'        => 'Web Internet',
      'aviation_contacts'   => 'Aviation Contacts',
      'other_volunteer'     => 'Other Volunteer',
      'member_aopa'         => 'Member AOPA',
      'member_kiwanis'      => 'Member Kiwanis',
      'member_rotary'       => 'Member Rotary',
      'member_lions'        => 'Member Lions',
      'dues_amount_paid'    => 'Dues Amount',
      'method_of_payment'   => 'Method of Payment',
      'ccard_approval_number'=> 'Approval',
      'premium_choice'      => 'Premium Choice',
      'premium_size'        => 'Premium Size',
      'referral_source'     => 'Referral Source',
    ));

    $this->validatorSchema['date'] = new validatorDateTimeCustom(array(), array('invalid'=>'Application date is invalid!'));

    $this->widgetSchema->setNameFormat('application[%s]');
  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }
}
