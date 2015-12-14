<?php

/**
 * MissionRequestTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionRequestForm5 extends BaseMissionRequestForm
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
    $this['pass_email'],
    $this['financial'],
    $this['pass_weight'],
    $this['req_title'],
    $this['req_county'],
    $this['req_country'],
    $this['req_day_phone'],
    $this['orgin_ident'],
    $this['orgin_id'],
    $this['dest_ident'],
    $this['dest_id'],
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
    $this['lodging_phone_comment'],
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
    $relationships = sfConfig::get('app_relationship',array('relative'=>'Relative', 'friend'=>'Friend', 'caregiver'=>'Caregiver'));
    $ref_sources = RefSourcePeer::getForSelectParent();

    # Fields
    $this->widgetSchema['com1_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['com1_relationship'] =  new sfWidgetFormSelect(array('choices'=>$relationships));
    $this->widgetSchema['com1_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['com1_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['com1_phone'] =  new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['com1_comment'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['com2_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['com2_relationship'] =  new sfWidgetFormSelect(array('choices'=>$relationships));
    $this->widgetSchema['com2_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['com2_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['com2_phone'] =  new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['com2_comment'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['com3_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['com3_relationship'] =  new sfWidgetFormSelect(array('choices'=>$relationships));
    $this->widgetSchema['com3_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['com3_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['com3_phone'] =  new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['com3_comment'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['com4_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['com4_relationship'] =  new sfWidgetFormSelect(array('choices'=>$relationships));
    $this->widgetSchema['com4_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['com4_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['com4_phone'] =  new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['com4_comment'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    $this->widgetSchema['com5_name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['com5_relationship'] =  new sfWidgetFormSelect(array('choices'=>$relationships));
    $this->widgetSchema['com5_date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['com5_weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['com5_phone'] =  new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow'));
    $this->widgetSchema['com5_comment'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    # Labels
    $this->widgetSchema->setLabels(array('com1_name' => 'Name'));
    $this->widgetSchema->setLabels(array('com1_relationship' => 'Relationship'));
    $this->widgetSchema->setLabels(array('com1_date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('com1_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('com1_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('com1_comment' => 'Comment'));

    $this->widgetSchema->setLabels(array('com2_name' => 'Name'));
    $this->widgetSchema->setLabels(array('com2_relationship' => 'Relationship'));
    $this->widgetSchema->setLabels(array('com2_date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('com2_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('com2_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('com2_comment' => 'Comment'));


    $this->widgetSchema->setLabels(array('com3_name' => 'Name'));
    $this->widgetSchema->setLabels(array('com3_relationship' => 'Relationship'));
    $this->widgetSchema->setLabels(array('com3_date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('com3_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('com3_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('com3_comment' => 'Comment'));


    $this->widgetSchema->setLabels(array('com4_name' => 'Name'));
    $this->widgetSchema->setLabels(array('com4_relationship' => 'Relationship'));
    $this->widgetSchema->setLabels(array('com4_date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('com4_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('com4_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('com4_comment' => 'Comment'));


    $this->widgetSchema->setLabels(array('com5_name' => 'Name'));
    $this->widgetSchema->setLabels(array('com5_relationship' => 'Relationship'));
    $this->widgetSchema->setLabels(array('com5_date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('com5_weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('com5_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('com5_comment' => 'Comment'));


    # Validation
    $this->validatorSchema['com1_name'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com1_relationship'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com1_date_of_birth'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['com1_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['com1_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com1_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['com2_name'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com2_relationship'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com2_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['com2_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['com2_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com2_comment'] = new sfValidatorString(array('required' => false));


    $this->validatorSchema['com3_name'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com3_relationship'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com3_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['com3_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['com3_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com3_comment'] = new sfValidatorString(array('required' => false));


    $this->validatorSchema['com4_name'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com4_relationship'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com4_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['com4_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['com4_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com4_comment'] = new sfValidatorString(array('required' => false));

    $this->validatorSchema['com5_name'] =  new sfValidatorString(array('required' => false));
    $this->validatorSchema['com5_relationship'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com5_date_of_birth'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['com5_weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['com5_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['com5_comment'] = new sfValidatorString(array('required' => false));

    # Descriptive message
    $this->widgetSchema->setNameFormat('miss_req_temp5[%s]');
  }
}
