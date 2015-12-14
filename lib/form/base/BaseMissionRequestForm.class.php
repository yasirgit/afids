<?php

/**
 * MissionRequest form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'requester_id'                  => new sfWidgetFormInput(),
      'requester_date'                => new sfWidgetFormDateTime(),
      'request_by'                    => new sfWidgetFormInput(),
      'on_behalf'                     => new sfWidgetFormInput(),
      'appt_date'                     => new sfWidgetFormDateTime(),
      'mission_date'                  => new sfWidgetFormDateTime(),
      'return_date'                   => new sfWidgetFormDateTime(),
      'baggage_weight'                => new sfWidgetFormInput(),
      'baggage_desc'                  => new sfWidgetFormInput(),
      'pass_title'                    => new sfWidgetFormInput(),
      'pass_first_name'               => new sfWidgetFormInput(),
      'pass_last_name'                => new sfWidgetFormInput(),
      'pass_address1'                 => new sfWidgetFormInput(),
      'pass_address2'                 => new sfWidgetFormInput(),
      'pass_city'                     => new sfWidgetFormInput(),
      'pass_county'                   => new sfWidgetFormInput(),
      'pass_state'                    => new sfWidgetFormInput(),
      'pass_country'                  => new sfWidgetFormInput(),
      'pass_zipcode'                  => new sfWidgetFormInput(),
      'pass_day_phone'                => new sfWidgetFormInput(),
      'pass_day_comment'              => new sfWidgetFormInput(),
      'pass_eve_phone'                => new sfWidgetFormInput(),
      'pass_eve_comment'              => new sfWidgetFormInput(),
      'pass_mobile_phone'             => new sfWidgetFormInput(),
      'pass_mobile_comment'           => new sfWidgetFormInput(),
      'pass_pager_phone'              => new sfWidgetFormInput(),
      'pass_pager_comment'            => new sfWidgetFormInput(),
      'pass_other_phone'              => new sfWidgetFormInput(),
      'pass_other_comment'            => new sfWidgetFormInput(),
      'pass_email'                    => new sfWidgetFormInput(),
      'pass_date_of_birth'            => new sfWidgetFormDateTime(),
      'illness'                       => new sfWidgetFormInput(),
      'financial'                     => new sfWidgetFormInput(),
      'pass_weight'                   => new sfWidgetFormInput(),
      'releasing_physician'           => new sfWidgetFormInput(),
      'release_phone'                 => new sfWidgetFormInput(),
      'release_phone_comment'         => new sfWidgetFormInput(),
      'release_fax'                   => new sfWidgetFormInput(),
      'release_fax_comment'           => new sfWidgetFormInput(),
      'release_email'                 => new sfWidgetFormInput(),
      'treating_physician'            => new sfWidgetFormInput(),
      'treating_phone'                => new sfWidgetFormInput(),
      'treating_phone_comment'        => new sfWidgetFormInput(),
      'treating_fax'                  => new sfWidgetFormInput(),
      'treating_fax_comment'          => new sfWidgetFormInput(),
      'req_title'                     => new sfWidgetFormInput(),
      'req_first_name'                => new sfWidgetFormInput(),
      'req_last_name'                 => new sfWidgetFormInput(),
      'agency_name'                   => new sfWidgetFormInput(),
      'req_address1'                  => new sfWidgetFormInput(),
      'req_address2'                  => new sfWidgetFormInput(),
      'req_city'                      => new sfWidgetFormInput(),
      'req_county'                    => new sfWidgetFormInput(),
      'req_state'                     => new sfWidgetFormInput(),
      'req_country'                   => new sfWidgetFormInput(),
      'req_zipcode'                   => new sfWidgetFormInput(),
      'req_day_phone'                 => new sfWidgetFormInput(),
      'req_day_comment'               => new sfWidgetFormInput(),
      'req_eve_phone'                 => new sfWidgetFormInput(),
      'req_eve_comment'               => new sfWidgetFormInput(),
      'req_mobile_phone'              => new sfWidgetFormInput(),
      'req_mobile_comment'            => new sfWidgetFormInput(),
      'req_pager_phone'               => new sfWidgetFormInput(),
      'req_pager_comment'             => new sfWidgetFormInput(),
      'req_other_phone'               => new sfWidgetFormInput(),
      'req_other_comment'             => new sfWidgetFormInput(),
      'req_email'                     => new sfWidgetFormInput(),
      'req_secondary_email'           => new sfWidgetFormInput(),
      'req_pager_email'               => new sfWidgetFormInput(),
      'req_position'                  => new sfWidgetFormInput(),
      'req_discharge'                 => new sfWidgetFormInput(),
      'orgin_ident'                   => new sfWidgetFormInput(),
      'orgin_id'                      => new sfWidgetFormInput(),
      'orgin_city'                    => new sfWidgetFormInput(),
      'orgin_state'                   => new sfWidgetFormInput(),
      'orgin_zipcode'                 => new sfWidgetFormInput(),
      'dest_ident'                    => new sfWidgetFormInput(),
      'dest_id'                       => new sfWidgetFormInput(),
      'dest_city'                     => new sfWidgetFormInput(),
      'dest_state'                    => new sfWidgetFormInput(),
      'dest_zipcode'                  => new sfWidgetFormInput(),
      'com1_name'                     => new sfWidgetFormInput(),
      'com1_relationship'             => new sfWidgetFormInput(),
      'com1_date_of_birth'            => new sfWidgetFormDateTime(),
      'com1_weigth'                   => new sfWidgetFormInput(),
      'com1_phone'                    => new sfWidgetFormInput(),
      'com1_comment'                  => new sfWidgetFormInput(),
      'com2_name'                     => new sfWidgetFormInput(),
      'com2_relationship'             => new sfWidgetFormInput(),
      'com2_date_of_birth'            => new sfWidgetFormDateTime(),
      'com2_weigth'                   => new sfWidgetFormInput(),
      'com2_phone'                    => new sfWidgetFormInput(),
      'com2_comment'                  => new sfWidgetFormInput(),
      'com3_name'                     => new sfWidgetFormInput(),
      'com3_relationship'             => new sfWidgetFormInput(),
      'com3_date_of_birth'            => new sfWidgetFormDateTime(),
      'com3_weigth'                   => new sfWidgetFormInput(),
      'com3_phone'                    => new sfWidgetFormInput(),
      'com3_comment'                  => new sfWidgetFormInput(),
      'com4_name'                     => new sfWidgetFormInput(),
      'com4_relationship'             => new sfWidgetFormInput(),
      'com4_date_of_birth'            => new sfWidgetFormDateTime(),
      'com4_weigth'                   => new sfWidgetFormInput(),
      'com4_phone'                    => new sfWidgetFormInput(),
      'com4_comment'                  => new sfWidgetFormInput(),
      'com5_name'                     => new sfWidgetFormInput(),
      'com5_relationship'             => new sfWidgetFormInput(),
      'com5_date_of_birth'            => new sfWidgetFormDateTime(),
      'com5_weigth'                   => new sfWidgetFormInput(),
      'com5_phone'                    => new sfWidgetFormInput(),
      'com5_comment'                  => new sfWidgetFormInput(),
      'lodging_name'                  => new sfWidgetFormInput(),
      'lodging_phone'                 => new sfWidgetFormInput(),
      'lodging_phone_comment'         => new sfWidgetFormInput(),
      'facility_name'                 => new sfWidgetFormInput(),
      'facility_phone'                => new sfWidgetFormInput(),
      'facility_phone_comment'        => new sfWidgetFormInput(),
      'req_language'                  => new sfWidgetFormInput(),
      'best_contact'                  => new sfWidgetFormInput(),
      'emergency_name'                => new sfWidgetFormInput(),
      'emergency_phone1'              => new sfWidgetFormInput(),
      'emergency_phone1_comment'      => new sfWidgetFormInput(),
      'emergency_phone2'              => new sfWidgetFormInput(),
      'emergency_phone2_comment'      => new sfWidgetFormInput(),
      'comment'                       => new sfWidgetFormInput(),
      'processed_date'                => new sfWidgetFormDateTime(),
      'session_id'                    => new sfWidgetFormInput(),
      'ip_address'                    => new sfWidgetFormInput(),
      'pass_fax_phone1'               => new sfWidgetFormInput(),
      'pass_fax_comment1'             => new sfWidgetFormInput(),
      'guar_first_name'               => new sfWidgetFormInput(),
      'guar_last_name'                => new sfWidgetFormInput(),
      'guar_address1'                 => new sfWidgetFormInput(),
      'guar_address2'                 => new sfWidgetFormInput(),
      'guar_city'                     => new sfWidgetFormInput(),
      'guar_state'                    => new sfWidgetFormInput(),
      'guar_zipcode'                  => new sfWidgetFormInput(),
      'guar_day_phone'                => new sfWidgetFormInput(),
      'guar_day_comment'              => new sfWidgetFormInput(),
      'guar_eve_phone'                => new sfWidgetFormInput(),
      'guar_eve_comment'              => new sfWidgetFormInput(),
      'guar_fax_phone'                => new sfWidgetFormInput(),
      'guar_fax_comment'              => new sfWidgetFormInput(),
      'guar_mobile_phone'             => new sfWidgetFormInput(),
      'guar_mobile_comment'           => new sfWidgetFormInput(),
      'guar_other_phone'              => new sfWidgetFormInput(),
      'guar_other_comment'            => new sfWidgetFormInput(),
      'guar_pager_phone'              => new sfWidgetFormInput(),
      'guar_pager_comment'            => new sfWidgetFormInput(),
      'guar_guar_email'               => new sfWidgetFormInput(),
      'req_fax_phone1'                => new sfWidgetFormInput(),
      'req_fax_comment1'              => new sfWidgetFormInput(),
      'pass_english'                  => new sfWidgetFormInput(),
      'pass_language'                 => new sfWidgetFormInput(),
      'treating_email'                => new sfWidgetFormInput(),
      'pass_height'                   => new sfWidgetFormInput(),
      'pass_oxygen'                   => new sfWidgetFormInput(),
      'pass_medical'                  => new sfWidgetFormInput(),
      'referral_source_id'            => new sfWidgetFormInput(),
      'follow_up_contact_name'        => new sfWidgetFormInput(),
      'follow_up_contact_phone'       => new sfWidgetFormInput(),
      'follow_up_email'               => new sfWidgetFormInput(),
      'miss_req_orginator_afa_org_id' => new sfWidgetFormInput(),
      'afa_org_id'                    => new sfWidgetFormInput(),
      'afa_org_mission_id'            => new sfWidgetFormInput(),
      'mission_request_type_id'       => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => true)),
      'last_page_processed'           => new sfWidgetFormInput(),
      'pass_gender'                   => new sfWidgetFormInput(),
      'pass_type'                     => new sfWidgetFormInput(),
      'pass_private_cons'             => new sfWidgetFormInput(),
      'pass_public_cons'              => new sfWidgetFormInput(),
      'appt_time'                     => new sfWidgetFormTime(),
      'flight_time'                   => new sfWidgetFormTime(),
      'waiver_required'               => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'MissionRequest', 'column' => 'id', 'required' => false)),
      'requester_id'                  => new sfValidatorInteger(),
      'requester_date'                => new sfValidatorDateTime(array('required' => false)),
      'request_by'                    => new sfValidatorInteger(),
      'on_behalf'                     => new sfValidatorString(array('max_length' => 20)),
      'appt_date'                     => new sfValidatorDateTime(),
      'mission_date'                  => new sfValidatorDateTime(array('required' => false)),
      'return_date'                   => new sfValidatorDateTime(array('required' => false)),
      'baggage_weight'                => new sfValidatorInteger(array('required' => false)),
      'baggage_desc'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pass_title'                    => new sfValidatorString(array('max_length' => 7)),
      'pass_first_name'               => new sfValidatorString(array('max_length' => 30)),
      'pass_last_name'                => new sfValidatorString(array('max_length' => 30)),
      'pass_address1'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pass_address2'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pass_city'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_county'                   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_state'                    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_country'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_zipcode'                  => new sfValidatorString(array('max_length' => 10)),
      'pass_day_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_day_comment'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_eve_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_eve_comment'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_mobile_phone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_mobile_comment'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_pager_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_pager_comment'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_other_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_other_comment'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_email'                    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_date_of_birth'            => new sfValidatorDateTime(),
      'illness'                       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'financial'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pass_weight'                   => new sfValidatorInteger(array('required' => false)),
      'releasing_physician'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'release_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'release_phone_comment'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'release_fax'                   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'release_fax_comment'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'release_email'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'treating_physician'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'treating_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'treating_phone_comment'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'treating_fax'                  => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'treating_fax_comment'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_title'                     => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'req_first_name'                => new sfValidatorString(array('max_length' => 30)),
      'req_last_name'                 => new sfValidatorString(array('max_length' => 30)),
      'agency_name'                   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_address1'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_address2'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_city'                      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_county'                    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_state'                     => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'req_country'                   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_zipcode'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'req_day_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_day_comment'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_eve_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_eve_comment'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_mobile_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_mobile_comment'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_pager_phone'               => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_pager_comment'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_other_phone'               => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_other_comment'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_email'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_secondary_email'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'req_pager_email'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'req_position'                  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'req_discharge'                 => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'orgin_ident'                   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'orgin_id'                      => new sfValidatorInteger(array('required' => false)),
      'orgin_city'                    => new sfValidatorString(array('max_length' => 30)),
      'orgin_state'                   => new sfValidatorString(array('max_length' => 2)),
      'orgin_zipcode'                 => new sfValidatorString(array('max_length' => 10)),
      'dest_ident'                    => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'dest_id'                       => new sfValidatorInteger(array('required' => false)),
      'dest_city'                     => new sfValidatorString(array('max_length' => 30)),
      'dest_state'                    => new sfValidatorString(array('max_length' => 2)),
      'dest_zipcode'                  => new sfValidatorString(array('max_length' => 10)),
      'com1_name'                     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'com1_relationship'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com1_date_of_birth'            => new sfValidatorDateTime(array('required' => false)),
      'com1_weigth'                   => new sfValidatorInteger(array('required' => false)),
      'com1_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'com1_comment'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com2_name'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com2_relationship'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com2_date_of_birth'            => new sfValidatorDateTime(array('required' => false)),
      'com2_weigth'                   => new sfValidatorInteger(array('required' => false)),
      'com2_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'com2_comment'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com3_name'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com3_relationship'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com3_date_of_birth'            => new sfValidatorDateTime(array('required' => false)),
      'com3_weigth'                   => new sfValidatorInteger(array('required' => false)),
      'com3_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'com3_comment'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com4_name'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com4_relationship'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com4_date_of_birth'            => new sfValidatorDateTime(array('required' => false)),
      'com4_weigth'                   => new sfValidatorInteger(array('required' => false)),
      'com4_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'com4_comment'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com5_name'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com5_relationship'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'com5_date_of_birth'            => new sfValidatorDateTime(array('required' => false)),
      'com5_weigth'                   => new sfValidatorInteger(array('required' => false)),
      'com5_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'com5_comment'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'lodging_name'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'lodging_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'lodging_phone_comment'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'facility_name'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'facility_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'facility_phone_comment'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_language'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'best_contact'                  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'emergency_name'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'emergency_phone1'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'emergency_phone1_comment'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'emergency_phone2'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'emergency_phone2_comment'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comment'                       => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'processed_date'                => new sfValidatorDateTime(array('required' => false)),
      'session_id'                    => new sfValidatorInteger(array('required' => false)),
      'ip_address'                    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pass_fax_phone1'               => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pass_fax_comment1'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_first_name'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_last_name'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_address1'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_address2'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_city'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_state'                    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'guar_zipcode'                  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'guar_day_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_day_comment'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_eve_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_eve_comment'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_fax_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_fax_comment'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_mobile_phone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_mobile_comment'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_other_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_other_comment'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_pager_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'guar_pager_comment'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'guar_guar_email'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_fax_phone1'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_fax_comment1'              => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_english'                  => new sfValidatorInteger(array('required' => false)),
      'pass_language'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'treating_email'                => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'pass_height'                   => new sfValidatorInteger(array('required' => false)),
      'pass_oxygen'                   => new sfValidatorInteger(array('required' => false)),
      'pass_medical'                  => new sfValidatorInteger(array('required' => false)),
      'referral_source_id'            => new sfValidatorInteger(array('required' => false)),
      'follow_up_contact_name'        => new sfValidatorString(array('max_length' => 30)),
      'follow_up_contact_phone'       => new sfValidatorString(array('max_length' => 16)),
      'follow_up_email'               => new sfValidatorString(array('max_length' => 30)),
      'miss_req_orginator_afa_org_id' => new sfValidatorInteger(array('required' => false)),
      'afa_org_id'                    => new sfValidatorInteger(array('required' => false)),
      'afa_org_mission_id'            => new sfValidatorInteger(array('required' => false)),
      'mission_request_type_id'       => new sfValidatorPropelChoice(array('model' => 'MissionType', 'column' => 'id', 'required' => false)),
      'last_page_processed'           => new sfValidatorInteger(array('required' => false)),
      'pass_gender'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'pass_type'                     => new sfValidatorInteger(array('required' => false)),
      'pass_private_cons'             => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'pass_public_cons'              => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'appt_time'                     => new sfValidatorTime(array('required' => false)),
      'flight_time'                   => new sfValidatorTime(array('required' => false)),
      'waiver_required'               => new sfValidatorString(array('max_length' => 5, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionRequest';
  }


}
