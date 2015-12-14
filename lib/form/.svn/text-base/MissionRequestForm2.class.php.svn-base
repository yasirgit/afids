<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm2 extends BaseMissionRequestForm
{
  public function configure()
  {
    unset(
    $this['id'],
    $this['pass_title'],
    $this['on_behalf'],
    $this['request_by'],
    $this['follow_up_contact_name'],
    $this['follow_up_contact_phone'],
    $this['follow_up_email'],
    $this['pass_zipcode'],
    $this['pass_date_of_birth'],
    $this['orgin_city'],
    $this['orgin_state'],
    $this['orgin_zipcode'],
    $this['dest_city'],
    $this['dest_state'],
    $this['dest_zipcode'],//form1
    $this['req_first_name'],
    $this['req_last_name'],
    $this['agency_name'],
    $this['req_address1'],
    $this['req_address2'],
    $this['req_city'],
    $this['req_state'],
    $this['req_zipcode'],
    $this['req_day_phone'],
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
    $this['releasing_physician'],
    $this['release_phone'],
    $this['release_phone_comment'],
    $this['release_fax'],
    $this['release_fax_comment'],
    $this['release_email'],
    $this['treating_physician'],
    $this['treating_phone'],
    $this['treating_phone_comment'],
    $this['treating_fax'],
    $this['treating_fax_comment'],
    $this['treating_email'],
    $this['facility_name'],
    $this['facility_phone'],
    $this['facility_phone_comment'],
    $this['lodging_name'],
    $this['lodging_phone'],
    $this['lodging_phone_comment'],//000
    $this['emergency_name'],
    $this['emergency_phone1'],
    $this['emergency_phone1_comment'],
    $this['pass_english'],
    $this['pass_language'],
    $this['pass_oxygen'],
    $this['illness'],
    $this['financial'],
    $this['pass_medical'],
    $this['referral_source_id'],
    $this['com1_name'],
    $this['com1_relationship'],
    $this['com1_date_of_birth'],
    $this['com1_weight'],
    $this['com1_phone'],
    $this['com1_comment'],
    $this['com2_name'],
    $this['com2_relationship'],
    $this['com2_date_of_birth'],
    $this['com2_weight'],
    $this['com2_phone'],
    $this['com2_comment'],
    $this['com3_name'],
    $this['com3_relationship'],
    $this['com3_date_of_birth'],
    $this['com3_weight'],
    $this['com3_phone'],
    $this['com3_comment'],
    $this['com4_name'],
    $this['com4_relationship'],
    $this['com4_date_of_birth'],
    $this['com4_weight'],
    $this['com4_phone'],
    $this['com5_comment'],
    $this['com5_name'],
    $this['com5_relationship'],
    $this['com5_date_of_birth'],
    $this['com5_weight'],
    $this['com5_phone'],
    $this['com5_comment'],
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
    $this['afa_org_id'],
    $this['afa_org_mission_id'],
    $this['mission_request_type_id'],
    $this['last_page_processed'],
    $this['emergency_phone2'],
    $this['emergency_phone2_comment'],
    $this['comment'],
    $this['processed_date'],
    $this['session_id'],
    $this['ip_address'],
    $this['pass_fax_phone1'],
    $this['pass_fax_comment1'],
    $this['req_language'],
    $this['best_contact'],
    $this['dest_id'],
    $this['dest_ident'],
    $this['orgin_ident'],
    $this['orgin_id'],
    $this['req_title'],
    $this['requester_id'],
    $this['requester_date'],
    $this['baggage_weight'],
    $this['baggage_desc'],
    $this['req_county'],
    $this['req_country'],
    $this['req_fax_phone1'],
    $this['req_fax_comment1'],
    $this['miss_req_orginator_afa_org_id'],
    $this['_csrf_token'],
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
    $illness_cats = PassengerIllnessCategoryPeer::getForSelectParent();

    # Fields
    $this->widgetSchema['pass_title'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['pass_first_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_last_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_gender'] = new sfWidgetFormSelect(array('choices'=>$gender_types));
    $this->widgetSchema['pass_type'] = new sfWidgetFormSelect(array('choices'=>$passenger_types));

    $this->widgetSchema['pass_address1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_address2'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text'));
    $this->widgetSchema['pass_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));

    $this->widgetSchema['pass_country'] = new sfWidgetFormSelect(array('choices'=>$countries));

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

    $this->widgetSchema['pass_best_contact'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['illness'] = new sfWidgetFormSelect(array('choices'=>$illness_cats));
    $this->widgetSchema['financial'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_private_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_public_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_public_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_public_cons'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['pass_height'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));

    # Labels
    $this->widgetSchema->setLabels(array('pass_first_name' => 'First Name*'));
    $this->widgetSchema->setLabels(array('pass_last_name' => 'Last Name*'));
    $this->widgetSchema->setLabels(array('pass_address1' => 'Address1'));
    $this->widgetSchema->setLabels(array('pass_address2' => 'Address2'));
    $this->widgetSchema->setLabels(array('pass_city' => 'City*'));
    $this->widgetSchema->setLabels(array('pass_state' => 'State*'));
    $this->widgetSchema->setLabels(array('pass_zipcode' => 'ZipCode*'));
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

    $this->widgetSchema->setLabels(array('pass_email' => 'Email'));
    $this->widgetSchema->setLabels(array('pass_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('pass_height' => 'Height'));

    # Validation
    $this->validatorSchema['pass_first_name'] = new sfValidatorString(array('required' =>true),array('required'=>'Please confirm firstname !'));
    $this->validatorSchema['pass_last_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm lastname !'));
    $this->validatorSchema['pass_address1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_address2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_city'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm city!'));
    $this->validatorSchema['pass_state'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm state!'));
    $this->validatorSchema['pass_zipcode'] = new validatorZipcode(array('required' => true),array('max_length' => 10, 'min_length' => 5,'required'=>'Please confirm zipcode!'));

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

    $this->validatorSchema['pass_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['pass_height'] = new sfValidatorInteger(array('required' => false));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp2[%s]');
  }
}
