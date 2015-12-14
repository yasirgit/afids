<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm7 extends BaseMissionRequestForm
{
  public function configure()
  {
    unset(
    $this['id'],
    $this['requester_id'],
    $this['requester_date'],
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
    $this['last_page_processed'],
    $this['on_behalf'],
    $this['request_by'],
    $this['follow_up_contact_name'],
    $this['follow_up_contact_phone'],
    $this['follow_up_email'],
    $this['orgin_zipcode'],
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
    $this['pass_title'],//form6
    $this['pass_first_name'],
    $this['pass_last_name'],
    $this['pass_gender'],
    $this['pass_type'],
    $this['pass_address1'],
    $this['pass_address2'],
    $this['pass_city'],
    $this['pass_state'],
    $this['pass_zipcode'],
    $this['pass_country'],
    $this['pass_email'],
    $this['pass_day_phone'],
    $this['pass_day_comment'],
    $this['pass_eve_phone'],
    $this['pass_eve_comment'],
    $this['pass_mobile_phone'],
    $this['pass_mobile_comment'],
    $this['pass_pager_phone'],
    $this['pass_pager_comment'],
    $this['pass_other_phone'],
    $this['pass_other_comment'],
    $this['best_contact'],
    $this['illness'],
    $this['financial'],
    $this['pass_private_cons'],
    $this['pass_public_cons'],
    $this['pass_weight'],
    $this['pass_height'],
    $this['pass_medical'],
    $this['pass_date_of_birth'],
    $this['releasing_physician'],
    $this['release_phone'],
    $this['release_phone_comment'],
    $this['treating_fax'],
    $this['release_fax_comment'],
    $this['release_email'],
    $this['treating_physician'],
    $this['treating_phone'],
    $this['treating_phone_comment'],
    $this['treating_fax'],
    $this['treating_email'],
    $this['facility_name'],
    $this['facility_phone'],
    $this['facility_phone_comment'],
    $this['lodging_name'],
    $this['lodging_phone'],
    $this['lodging_phone_comment'],
    $this['emergency_name'],
    $this['emergency_phone1'],
    $this['emergency_phone1_comment'],
    $this['emergency_phone2'],
    $this['emergency_phone2_comment']
    );

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $states = sfConfig::get('app_states',array('AL'=>'Alabama', 'AK'=>'Alaska'));
    $gender_types = sfConfig::get('app_gender_types',array('male'=>'Male', 'female'=>'Female','unknown'=>'Unknown'));
    $passenger_types = PassengerTypePeer::getForSelectParent();
    $countries = sfConfig::get('app_countries', array('United States' => 'United States'));
    $mission_types = MissionTypePeer::getNames();

    # Fields
    $this->widgetSchema['appt_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['appt_time'] =  new widgetFormDateTimeCustom(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['mission_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['flight_time'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

    $this->widgetSchema['mission_request_type_id'] =  new sfWidgetFormSelect(array('choices'=>$mission_types),array('class'=>'text narrow'));

    $this->widgetSchema['waiver_required'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['baggage_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['baggage_desc'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['comment'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));

    $this->widgetSchema['orgin_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['orgin_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));

    $this->widgetSchema['dest_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['dest_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));

    # Labels
    $this->widgetSchema->setLabels(array('appt_date' => 'Appointment Date'));
    $this->widgetSchema->setLabels(array('appt_time' => 'Appointment Time'));
    $this->widgetSchema->setLabels(array('mission_date' => 'Mission Date'));
    $this->widgetSchema->setLabels(array('flight_time' => 'Flight Time'));

    $this->widgetSchema->setLabels(array('mission_request_type_id' => 'Mission Type'));
    $this->widgetSchema->setLabels(array('waiver_required' => 'Waiver Required?'));
    $this->widgetSchema->setLabels(array('baggage_weight' => 'Baggage weight'));
    $this->widgetSchema->setLabels(array('baggage_desc' => 'Description'));

    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('orgin_city' => 'Orgin City'));
    $this->widgetSchema->setLabels(array('orgin_state' => 'Orgin State'));
    $this->widgetSchema->setLabels(array('dest_city' => 'Dest City'));
    $this->widgetSchema->setLabels(array('dest_state' => 'Dest State'));

    # Validation
    $this->validatorSchema['appt_date'] = new sfValidatorDate(array('required' => true),array('invalid'=> 'Appt Date is invalid !.','required'=>'Please confirm appointment date !'));
    $this->validatorSchema['appt_time'] =new sfValidatorDate(array('required' => false),array('invalid'=> 'Appt Time is invalid !.','required'=>'Please confirm appointment time !'));
    $this->validatorSchema['mission_date'] = new sfValidatorDate(array('required' => true),array('invalid'=> 'Mission Date is invalid !.','required'=>'Please confirm mission date !'));
    $this->validatorSchema['mission_request_type_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['waiver_required'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['flight_time'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['baggage_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['baggage_desc'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false),array('required'=>'Please confirm city!'));
    $this->validatorSchema['orgin_city'] = new sfValidatorString(array('required' => false),array('required'=>'Please confirm state!'));
    $this->validatorSchema['orgin_state'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['dest_city'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['dest_state'] = new sfValidatorString(array('required' => false));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp7[%s]');
  }
}
