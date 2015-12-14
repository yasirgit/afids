<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm1 extends BaseMissionRequestForm
{
  public function configure()
  {
    unset(
    $this['id'],
    $this['requester_id'],
    $this['requester_date'],
    $this['appt_date'],
    $this['return_date'],
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
    $this['pass_email'],
    $this['illness'],
    $this['financial'],
    $this['pass_weight'],
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
    $this['req_title'],
    $this['req_first_name'],
    $this['req_last_name'],
    $this['agency_name'],
    $this['req_address1'],
    $this['req_address2'],
    $this['req_city'],
    $this['req_county'],
    $this['req_state'],
    $this['req_country'],
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
    $this['orgin_ident'],
    $this['orgin_id'],
    $this['dest_ident'],
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
    $this['lodging_name'],
    $this['lodging_phone'],
    $this['facility_name'],
    $this['facility_phone'],
    $this['facility_phone_comment'],
    $this['req_language'],
    $this['best_contact'],
    $this['emergency_name'],
    $this['emergency_phone1'],
    $this['emergency_phone1_comment'],
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
    $this['req_fax_comment1'],
    $this['pass_english'],
    $this['pass_language'],
    $this['treating_email'],
    $this['pass_height'],
    $this['pass_oxygen'],
    $this['pass_medical'],
    $this['referral_source_id'],
    $this['afa_org_id'],
    $this['afa_org_mission_id'],
    $this['mission_request_type_id'],
    $this['last_page_processed'],
    $this['lodging_phone_comment'],
    $this['miss_req_orginator_afa_org_id'],
    $this['_csrf_token'],
    $this['req_secondary_email'],
    $this['req_pager_email'],
    $this['req_position'],
    $this['req_discharge'],
    $this['appt_time'],
    $this['flight_time'],
    $this['mission_date'],
    $this['waiver_required'],
    $this['on_behalf']
    );

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $behalf_person = sfConfig::get('app_behalf_person', array('1'=>'A social worker', '2'=>'Physician or physician\'s office staff', '3'=>'Other health care professional', '4'=>'Friend or relative'));
    $states = sfConfig::get('app_states',array('AL'=>'Alabama', 'AK'=>'Alaska'));
    $person_titles = array_merge(array('' => 'Please select'), sfConfig::get('app_person_titles', array('Mr'=>'Mr', 'Ms' => 'Ms')));

    # Fields
    $this->widgetSchema['pass_title'] = new sfWidgetFormSelect(array('choices' => $person_titles),array('class'=>'text narrow'));
    $this->widgetSchema['pass_first_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pass_last_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['request_by'] = new sfWidgetFormSelect(array('choices'=>$behalf_person),array('class'=>'text'));

    $this->widgetSchema['follow_up_contact_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['follow_up_contact_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['follow_up_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['pass_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pass_date_of_birth'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

    //travel from
    $this->widgetSchema['orgin_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['orgin_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));
    $this->widgetSchema['orgin_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));

    //travel to
    $this->widgetSchema['dest_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['dest_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));
    $this->widgetSchema['dest_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));

    # Labels
    $this->widgetSchema->setLabels(array('pass_title' => 'Title*'));
    $this->widgetSchema->setLabels(array('pass_first_name' => 'First Name*'));
    $this->widgetSchema->setLabels(array('pass_last_name' => 'Last Name*'));
    $this->widgetSchema->setLabels(array('request_by' => 'Request by'));

    $this->widgetSchema->setLabels(array('follow_up_contact_name' => 'Follow Up Contact Name*'));
    $this->widgetSchema->setLabels(array('follow_up_contact_phone' => 'Follow Up Contact Phone*'));
    $this->widgetSchema->setLabels(array('follow_up_email' => 'Follow Up Contact Email*'));

    $this->widgetSchema->setLabels(array('pass_zipcode' => 'Passenger Home Zipcode'));
    $this->widgetSchema->setLabels(array('pass_date_of_birth' => 'Date of birth*'));

    $this->widgetSchema->setLabels(array('orgin_city' => 'City*'));
    $this->widgetSchema->setLabels(array('orgin_state' => 'State*'));
    $this->widgetSchema->setLabels(array('orgin_zipcode' => 'ZipCode*'));

    $this->widgetSchema->setLabels(array('dest_city' => 'City*'));
    $this->widgetSchema->setLabels(array('dest_state' => 'State*'));
    $this->widgetSchema->setLabels(array('dest_zipcode' => 'ZipCode*'));

    # Validation
    $this->validatorSchema['pass_title'] = new sfValidatorChoice(array('choices' => array_keys($person_titles)), array('required'=>'Please confirm title !'));
    $this->validatorSchema['pass_first_name'] = new sfValidatorString(array('required' =>true),array('required'=>'Please confirm firstname !'));
    $this->validatorSchema['pass_last_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm lastname !'));
    $this->validatorSchema['request_by'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm requester\'s name !'));

    $this->validatorSchema['follow_up_contact_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm follow up contact name !'));
    $this->validatorSchema['follow_up_contact_phone'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm follow up contact phone !'));
    $this->validatorSchema['follow_up_email'] = new sfValidatorEmail(array('required'=>true),array('invalid'=>'Invalid secondary email !','required' => 'Please confirm follow up contact email !'));

    $this->validatorSchema['pass_zipcode'] = new validatorZipcode(array('required' => false, 'max_length' => 10, 'min_length' => 5),array('required'=>'Please confirm zipcode !'));
    $this->validatorSchema['pass_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => true),array('invalid'=> 'Date of birth is invalid !.','required'=>'Please confirm date of birth !'));

    $this->validatorSchema['orgin_city'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm origin city !'));
    $this->validatorSchema['orgin_state'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm origin state !'));
    $this->validatorSchema['orgin_zipcode'] = new validatorZipcode(array('required' => true, 'max_length' => 10, 'min_length' => 5),array('required'=>'Please confirm origin zipcode !'));

    $this->validatorSchema['dest_city'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm destination city !'));
    $this->validatorSchema['dest_state'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm destination state !'));
    $this->validatorSchema['dest_zipcode'] = new validatorZipcode(array('required' => true, 'max_length' => 10, 'min_length' => 5),array('required'=>'Please confirm destination zipcode !'));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp1[%s]');
  }
}
