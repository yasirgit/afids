<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm4 extends BaseMissionRequestForm
{
  public function configure()
  {
    unset(
    $this['id'],
    $this['requester_id'],
    $this['requester_date'],
    $this['baggage_weight'],
    $this['baggage_desc'],
    $this['pass_address1'],
    $this['pass_address2'],
    $this['pass_city'],
    $this['pass_county'],
    $this['pass_state'],
    $this['pass_country'],
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
    $this['pass_email'],
    $this['pass_weight'],
    $this['req_title'],
    $this['req_county'],
    $this['req_country'],
    $this['orgin_ident'],
    $this['orgin_id'],
    $this['dest_id'],
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
    $this['req_language'],
    $this['best_contact'],
    $this['emergency_phone2'],
    $this['emergency_phone2_comment'],
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
    $this['pass_height'],
    $this['afa_org_id'],
    $this['afa_org_mission_id'],
    $this['mission_request_type_id'],
    $this['last_page_processed'],
    $this['pass_title'],
    $this['pass_first_name'],
    $this['pass_last_name'],
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
    $this['dest_zipcode'],
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
    $this['miss_req_orginator_afa_org_id'],
    $this['_csrf_token'],
    $this['req_secondary_email'],
    $this['req_pager_email'],
    $this['req_position'],
    $this['req_discharge'],
    $this['appt_time'],
    $this['flight_time'],
    $this['waiver_required']
    );

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $medicals =sfConfig::get('app_medicals', array('0'=>'Medical', '1'=>'Compassionate'));

    $ref_sources = RefSourcePeer::getForSelectParent();
    # Fields
    $this->widgetSchema['appt_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['mission_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['return_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

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

    $this->widgetSchema['pass_english'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['pass_language'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['pass_oxygen'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema['illness'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['financial'] =new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['pass_medical'] = new sfWidgetFormSelect(array('choices'=>$medicals),array('class'=>'text'));

    $this->widgetSchema['referral_source_id'] = new sfWidgetFormSelect(array('choices'=>$ref_sources),array('class'=>'text'));

    # Labels
    $this->widgetSchema->setLabels(array('appt_date' => 'Appointment Date*'));
    $this->widgetSchema->setLabels(array('mission_date' => 'Mission Date*'));
    $this->widgetSchema->setLabels(array('return_date' => 'Return Date'));
    $this->widgetSchema->setLabels(array('releasing_physician' => 'Name'));
    $this->widgetSchema->setLabels(array('release_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('release_phone_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('release_fax' => 'Fax'));
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
    $this->widgetSchema->setLabels(array('pass_english' => 'Speak English ?'));
    $this->widgetSchema->setLabels(array('pass_language' => 'Language'));
    $this->widgetSchema->setLabels(array('pass_oxygen' => 'Do the passenger or any of the companions require oxygen on board? '));
    $this->widgetSchema->setLabels(array('pass_medical' => 'Is the flight for medical treatment or a compassionate reason? '));
    $this->widgetSchema->setLabels(array('illness' => 'Illness'));
    $this->widgetSchema->setLabels(array('financial' => 'Financial'));
    $this->widgetSchema->setLabels(array('referral_source_id' => 'How did you hear about Angel Flight?'));

    # Validation
    $this->validatorSchema['appt_date'] = new sfValidatorDate(array('required' => true),array('invalid'=> 'Appointment date is invalid !.','required'=>'Please confirm appointment date !'));
    $this->validatorSchema['mission_date'] = new sfValidatorDate(array('required' => true),array('invalid'=> 'Mission date is invalid !.','required'=>'Please confirm mission date !'));
    $this->validatorSchema['return_date'] = new sfValidatorDate(array('required' => false),array('invalid'=> 'Return date is invalid !.'));
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
    $this->validatorSchema['pass_english'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_language'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_oxygen'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pass_medical'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['illness'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['financial'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['referral_source_id'] = new sfValidatorString(array('required' => false));
    # Descriptive message

    $this->widgetSchema->setHelp('illness','Please describe the passenger\'s illness or compassionate reason for the flight (in layman\'s terms). Include any medical equipment needed on this flight. The weight of all medical treatment must be included in the 50 pound luggage limit per flight.');
    $this->widgetSchema->setHelp('financial','Please describe briefly the passenger\'s financial situation that warrants a charitable flight:');


    $this->widgetSchema->setNameFormat('miss_req_temp4[%s]');
  }
}
