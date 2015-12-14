<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm3 extends BaseMissionRequestForm
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
    $this['req_county'],
    $this['req_country'],
    $this['req_day_phone'],
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
    $this['lodging_phone_comment'],
    $this['miss_req_orginator_afa_org_id'],
    $this['_csrf_token'],
    $this['req_position'],
    $this['req_discharge'],
    $this['appt_time'],
    $this['flight_time'],
    $this['mission_date'],
    $this['waiver_required']
    );


    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $states = sfConfig::get('app_states',array('AL'=>'Alabama', 'AK'=>'Alaska'));

    # Fields
    $this->widgetSchema['req_first_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_last_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['agency_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_address1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_address2'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema['req_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text'));
    $this->widgetSchema['req_zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));

    $this->widgetSchema['req_day_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['req_day_comment'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['req_eve_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['req_eve_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['req_mobile_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['req_mobile_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['req_pager_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['req_pager_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['req_other_phone'] = new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['req_other_comment'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['req_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_secondary_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_pager_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['req_position'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    # Labels
    $this->widgetSchema->setLabels(array('req_first_name' => 'First Name*'));
    $this->widgetSchema->setLabels(array('req_last_name' => 'Last Name*'));
    $this->widgetSchema->setLabels(array('agency_name' => 'Agency Name*'));
    $this->widgetSchema->setLabels(array('req_address1' => 'Address1'));
    $this->widgetSchema->setLabels(array('req_address2' => 'Address2'));
    $this->widgetSchema->setLabels(array('req_city' => 'City*'));
    $this->widgetSchema->setLabels(array('req_state' => 'State*'));
    $this->widgetSchema->setLabels(array('req_zipcode' => 'ZipCode*'));
    $this->widgetSchema->setLabels(array('req_day_phone' => 'Work'));
    $this->widgetSchema->setLabels(array('req_day_comment' => ' '));
    $this->widgetSchema->setLabels(array('req_eve_phone' => 'Home'));
    $this->widgetSchema->setLabels(array('req_eve_comment' => ' '));
    $this->widgetSchema->setLabels(array('req_mobile_phone' => 'Mobile'));
    $this->widgetSchema->setLabels(array('req_mobile_comment' => ' '));
    $this->widgetSchema->setLabels(array('req_pager_phone' => 'Pager'));
    $this->widgetSchema->setLabels(array('req_pager_comment' => ' '));
    $this->widgetSchema->setLabels(array('req_other_phone' => 'Other'));
    $this->widgetSchema->setLabels(array('req_other_comment' => ' '));
    $this->widgetSchema->setLabels(array('req_email' => 'Email'));
    $this->widgetSchema->setLabels(array('req_secondary_email' => 'Seconadary Email'));
    $this->widgetSchema->setLabels(array('req_pager_email' => 'Pager Email'));
    $this->widgetSchema->setLabels(array('req_position' => 'Requesrter Position'));

    # Validation
    $this->validatorSchema['req_first_name'] = new sfValidatorString(array('required' =>true),array('required'=>'Please confirm firstname !'));
    $this->validatorSchema['req_last_name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm lastname !'));
    $this->validatorSchema['agency_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_address1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_address2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_city'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm city !'));
    $this->validatorSchema['req_state'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm state !'));
    $this->validatorSchema['req_zipcode'] = new validatorZipcode(array('required' => true),array('max_length' => 10, 'min_length' => 5,'required'=>'Please confirm zipcode !'));

    $this->validatorSchema['req_day_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_day_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_eve_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_eve_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_mobile_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_mobile_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_pager_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_pager_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_other_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['req_other_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['req_position'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['req_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid secondary email !'));
    $this->validatorSchema['req_secondary_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid secondary email !'));
    $this->validatorSchema['req_pager_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid secondary email !'));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp3[%s]');
  }
}
