<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm6 extends BaseMissionRequestForm
{
  public function configure()
  {
    unset(
    $this['id'],
    $this['requester_id'],
    $this['requester_date'],
    $this['baggage_weight'],
    $this['baggage_desc'],
    $this['pass_county'],
    $this['req_title'],
    $this['req_county'],
    $this['req_country'],
    $this['req_day_phone'],
    $this['orgin_ident'],
    $this['orgin_id'],
    $this['dest_ident'],
    $this['dest_id'],
    $this['req_language'],
    $this['comment'],
    $this['processed_date'],
    $this['session_id'],
    $this['ip_address'],
    $this['pass_fax_phone1'],
    $this['pass_fax_comment1'],
    $this['guar_first_name'],
    $this['guar_last_name'],
    $this['guar_address1'],
    $this['guar_address2'],
    $this['guar_city'],
    $this['guar_state'],
    $this['guar_zipcode'],
    $this['guar_day_phone'],
    $this['guar_day_comment'],
    $this['guar_eve_phone'],
    $this['guar_eve_comment'],
    $this['guar_fax_phone'],
    $this['guar_fax_comment'],
    $this['guar_mobile_phone'],
    $this['guar_mobile_comment'],
    $this['guar_other_phone'],
    $this['guar_other_comment'],
    $this['guar_pager_phone'],
    $this['guar_pager_comment'],
    $this['guar_guar_email'],
    $this['req_fax_phone1'],
    $this['req_fax_comment1'],
    $this['afa_org_id'],
    $this['afa_org_mission_id'],
    $this['mission_request_type_id'],
    $this['last_page_processed'],
    $this['on_behalf'],
    $this['request_by'],
    $this['follow_up_contact_name'],
    $this['follow_up_contact_phone'],
    $this['follow_up_email'],
    $this['orgin_city'],
    $this['orgin_state'],
    $this['orgin_zipcode'],
    $this['dest_city'],
    $this['dest_state'],
    $this['dest_zipcode'],
    $this['req_first_name'],
    $this['req_last_name'],
    $this['agency_name'],
    $this['req_address1'],
    $this['req_address2'],
    $this['req_city'],
    $this['req_state'],
    $this['req_zipcode'],
    $this['req_day_comment'],
    $this['req_eve_phone'],
    $this['req_eve_comment'],
    $this['req_mobile_phone'],
    $this['req_mobile_comment'],
    $this['req_pager_phone'],
    $this['req_pager_comment'],
    $this['req_other_phone'],
    $this['req_other_comment'],
    $this['req_email'],
    $this['appt_date'],
    $this['return_date'],
    $this['pass_english'],
    $this['pass_oxygen'],
    $this['referral_source_id'],
    $this['miss_req_orginator_afa_org_id'],
    $this['_csrf_token'],
    $this['com1_name'],
    $this['com1_relationship'],
    $this['com1_date_of_birth'],
    $this['com1_weigth'],
    $this['com1_phone'],
    $this['com1_comment'],
    $this['com2_name'],
    $this['com2_relationship'],
    $this['com2_date_of_birth'],
    $this['com2_weigth'],
    $this['com2_phone'],
    $this['com2_comment'],
    $this['com3_name'],
    $this['com3_relationship'],
    $this['com3_date_of_birth'],
    $this['com3_weigth'],
    $this['com3_phone'],
    $this['com3_comment'],
    $this['com4_name'],
    $this['com4_relationship'],
    $this['com4_date_of_birth'],
    $this['com4_weigth'],
    $this['com4_phone'],
    $this['com4_comment'],
    $this['com5_name'],
    $this['com5_relationship'],
    $this['com5_date_of_birth'],
    $this['com5_weigth'],
    $this['com5_phone'],
    $this['com5_comment'],
    $this['req_secondary_email'],
    $this['req_pager_email'],
    $this['req_position'],
    $this['req_discharge'],
    $this['appt_time'],
    $this['flight_time'],
    $this['mission_date'],
    $this['waiver_required']
    );

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $states = sfConfig::get('app_states',array('AL'=>'Alabama', 'AK'=>'Alaska'));
    $gender_types = sfConfig::get('app_gender_types',array('male'=>'Male', 'female'=>'Female','unknown'=>'Unknown'));
    $passenger_types = PassengerTypePeer::getForSelectParent();
    $countries = sfConfig::get('app_countries', array('United States' => 'United States'));

    # Fields
    $this->widgetSchema['pass_title'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['pass_first_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_last_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_gender'] = new sfWidgetFormSelect(array('choices'=>$gender_types),array('class'=>'text narrow'));
    $this->widgetSchema['pass_type'] = new sfWidgetFormSelect(array('choices'=>$passenger_types),array('class'=>'text narrow'));

    $this->widgetSchema['pass_address1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_address2'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));
    $this->widgetSchema['pass_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));

    $this->widgetSchema['pass_country'] = new sfWidgetFormSelect(array('choices'=>$countries),array('class'=>'text narrow'));

    $this->widgetSchema['pass_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_day_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['pass_day_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pass_eve_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['pass_eve_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pass_mobile_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['pass_mobile_comment'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['pass_pager_phone'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pass_pager_comment'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['pass_other_phone'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pass_other_comment'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));

    $this->widgetSchema['best_contact'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['illness'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['financial'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));

    $this->widgetSchema['pass_private_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text')); //not have
    $this->widgetSchema['pass_public_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));

    $this->widgetSchema['pass_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['pass_height'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));

    $this->widgetSchema['pass_medical'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['pass_language'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

    $this->widgetSchema['releasing_physician'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['release_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['release_phone_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['release_fax'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['release_fax_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['release_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['treating_physician'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['treating_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['treating_phone_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['treating_fax'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['treating_fax_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['treating_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['facility_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['facility_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['facility_phone_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['lodging_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['lodging_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['lodging_phone_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['emergency_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['emergency_phone1'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['emergency_phone1_comment'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['emergency_phone2'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['emergency_phone2_comment'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    # Labels
    $this->widgetSchema->setLabels(array('pass_title' => 'Title'));
    $this->widgetSchema->setLabels(array('pass_first_name' => 'First Name'));
    $this->widgetSchema->setLabels(array('pass_last_name' => 'Last Name'));

    $this->widgetSchema->setLabels(array('pass_address1' => 'Address1'));
    $this->widgetSchema->setLabels(array('pass_address2' => 'Address2'));

    $this->widgetSchema->setLabels(array('pass_gender' => 'Gender'));
    $this->widgetSchema->setLabels(array('pass_type' => 'Passenger Type'));

    $this->widgetSchema->setLabels(array('pass_city' => 'City'));
    $this->widgetSchema->setLabels(array('pass_state' => 'State'));
    $this->widgetSchema->setLabels(array('pass_zipcode' => 'ZipCode'));
    $this->widgetSchema->setLabels(array('pass_country' => 'Country'));

    $this->widgetSchema->setLabels(array('pass_email' => 'Email'));

    $this->widgetSchema->setLabels(array('pass_day_phone' => 'Work'));
    $this->widgetSchema->setLabels(array('pass_day_comment' => ' '));
    $this->widgetSchema->setLabels(array('pass_eve_phone' => 'Home'));
    $this->widgetSchema->setLabels(array('pass_eve_comment' => ' '));
    $this->widgetSchema->setLabels(array('pass_mobile_phone' => 'Mobile'));
    $this->widgetSchema->setLabels(array('pass_mobile_comment' => ' '));
    $this->widgetSchema->setLabels(array('pass_pager_phone' => 'Pager'));
    $this->widgetSchema->setLabels(array('pass_pager_comment' => ' '));
    $this->widgetSchema->setLabels(array('pass_other_phone' => 'Other'));
    $this->widgetSchema->setLabels(array('pass_other_comment' => ' '));

    $this->widgetSchema->setLabels(array('best_contact' => 'Best Contact Method'));
    $this->widgetSchema->setLabels(array('illness' => 'Illness'));
    $this->widgetSchema->setLabels(array('financial' => 'Financial Condition'));

    $this->widgetSchema->setLabels(array('pass_private_cons' => 'Private Considerations'));
    $this->widgetSchema->setLabels(array('pass_public_cons' => 'Public Considerations'));
    $this->widgetSchema->setLabels(array('pass_medical' => 'Passenger Requires Medical Release?'));
    $this->widgetSchema->setLabels(array('pass_language' => 'Primary Language'));
    $this->widgetSchema->setLabels(array('pass_date_of_birth' => 'Date of Birth'));

    $this->widgetSchema->setLabels(array('releasing_physician' => 'Releasing Physican'));
    $this->widgetSchema->setLabels(array('release_phone' => 'Releasing Phone'));
    $this->widgetSchema->setLabels(array('release_phone_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('release_fax' => 'Releasing Fax'));
    $this->widgetSchema->setLabels(array('release_fax_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('release_email' => 'Email'));

    $this->widgetSchema->setLabels(array('treating_physician' => 'Name'));
    $this->widgetSchema->setLabels(array('treating_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('treating_phone_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('treating_fax' => 'Fax'));
    $this->widgetSchema->setLabels(array('treating_fax_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('treating_email' => 'Email'));

    $this->widgetSchema->setLabels(array('facility_name' => 'Name'));
    $this->widgetSchema->setLabels(array('facility_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('facility_phone_comment' => 'Comment'));

    $this->widgetSchema->setLabels(array('lodging_name' => 'Lodging Name'));
    $this->widgetSchema->setLabels(array('lodging_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('lodging_phone_comment' => 'Comment'));

    $this->widgetSchema->setLabels(array('emergency_name' => 'Emergency Name'));
    $this->widgetSchema->setLabels(array('emergency_phone1' => 'Primary Phone'));
    $this->widgetSchema->setLabels(array('emergency_phone1_comment' => 'Comment'));

    $this->widgetSchema->setLabels(array('emergency_phone2' => 'Secondary Phone'));
    $this->widgetSchema->setLabels(array('emergency_phone2_comment' => 'Comment'));

    $this->widgetSchema->setLabels(array('pass_weight' => 'Weigth'));
    $this->widgetSchema->setLabels(array('pass_height' => 'Heigth'));

    # Validation
    $this->validatorSchema['pass_title'] = new sfValidatorString(array('required' =>true),array('required'=>'Please confirm title !'));
    $this->validatorSchema['pass_first_name'] = new sfValidatorString(array('required' =>true),array('required'=>'Please confirm firstname !'));
    $this->validatorSchema['pass_last_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm lastname !'));

    $this->validatorSchema['pass_gender'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_type'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['pass_address1'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm address !'));
    $this->validatorSchema['pass_address2'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['pass_city'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm city!'));
    $this->validatorSchema['pass_state'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm state!'));
    $this->validatorSchema['pass_zipcode'] = new validatorZipcode(array('required' => true),array('max_length' => 10, 'min_length' => 5,'required'=>'Please confirm zipcode!'));
    $this->validatorSchema['pass_country'] = new validatorZipcode(array('required' => true),array('max_length' => 10, 'min_length' => 5,'required'=>'Please confirm country!'));

    $this->validatorSchema['pass_day_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_day_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_eve_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_eve_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_mobile_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_mobile_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_pager_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_pager_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_other_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_other_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid secondary email !'));

    $this->validatorSchema['best_contact'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['illness'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['financial'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['pass_private_cons'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_public_cons'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_medical'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_language'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));

    $this->validatorSchema['releasing_physician'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['release_phone_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['release_fax'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['release_fax_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['release_email'] =  new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid release email !'));

    $this->validatorSchema['treating_physician'] = new validatorZipcode(array('required' => false),array('max_length' => 10, 'min_length' => 5));
    $this->validatorSchema['treating_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_phone_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_email'] =  new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid treating email !'));

    $this->validatorSchema['facility_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_phone_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['lodging_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['lodging_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['lodging_phone_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['emergency_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_phone1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_phone1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_phone2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_phone2_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['pass_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['pass_height'] = new sfValidatorInteger(array('required' => false));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp6[%s]');
  }
}
