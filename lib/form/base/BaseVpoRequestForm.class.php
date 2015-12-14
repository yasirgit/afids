<?php

/**
 * VpoRequest form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'hazardous_cargo_flag'         => new sfWidgetFormInput(),
      'request_date'                 => new sfWidgetFormDate(),
      'request_reason_desc'          => new sfWidgetFormInput(),
      'agency_name'                  => new sfWidgetFormInput(),
      'req_first_name'               => new sfWidgetFormInput(),
      'req_last_name'                => new sfWidgetFormInput(),
      'agency_division'              => new sfWidgetFormInput(),
      'req_address1'                 => new sfWidgetFormInput(),
      'req_address2'                 => new sfWidgetFormInput(),
      'req_city'                     => new sfWidgetFormInput(),
      'req_state'                    => new sfWidgetFormInput(),
      'req_country'                  => new sfWidgetFormInput(),
      'req_zipcode'                  => new sfWidgetFormInput(),
      'req_office_phone'             => new sfWidgetFormInput(),
      'req_office_comment'           => new sfWidgetFormInput(),
      'req_mobile_phone'             => new sfWidgetFormInput(),
      'req_mobile_comment'           => new sfWidgetFormInput(),
      'req_fax_phone'                => new sfWidgetFormInput(),
      'req_fax_comment'              => new sfWidgetFormInput(),
      'req_pager_phone'              => new sfWidgetFormInput(),
      'req_pager_comment'            => new sfWidgetFormInput(),
      'req_other_phone1'             => new sfWidgetFormInput(),
      'req_other_comment1'           => new sfWidgetFormInput(),
      'req_other_phone2'             => new sfWidgetFormInput(),
      'req_other_comment2'           => new sfWidgetFormInput(),
      'req_other_phone3'             => new sfWidgetFormInput(),
      'req_other_comment3'           => new sfWidgetFormInput(),
      'req_email'                    => new sfWidgetFormInput(),
      'req_alt_email'                => new sfWidgetFormInput(),
      'contact_notes'                => new sfWidgetFormInput(),
      'origin_city'                  => new sfWidgetFormInput(),
      'origin_state'                 => new sfWidgetFormInput(),
      'dest_city'                    => new sfWidgetFormInput(),
      'dest_state'                   => new sfWidgetFormInput(),
      'preferred_date'               => new sfWidgetFormDate(),
      'alternative_date'             => new sfWidgetFormDate(),
      'transport_type'               => new sfWidgetFormInput(),
      'request_posted_date'          => new sfWidgetFormDate(),
      'request_posted_to_afa_org_id' => new sfWidgetFormInput(),
      'reques_processed_date'        => new sfWidgetFormDate(),
      'request_disposition'          => new sfWidgetFormInput(),
      'caller_name'                  => new sfWidgetFormInput(),
      'caller_phone'                 => new sfWidgetFormInput(),
      'request_post_results'         => new sfWidgetFormInput(),
      'requester_vpo_user_id'        => new sfWidgetFormInput(),
      'source'                       => new sfWidgetFormInput(),
      'soap_post_from_afa_org_id'    => new sfWidgetFormInput(),
      'soap_post_request_id'         => new sfWidgetFormInput(),
      'request_processed_by'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'VpoRequest', 'column' => 'id', 'required' => false)),
      'hazardous_cargo_flag'         => new sfValidatorInteger(array('required' => false)),
      'request_date'                 => new sfValidatorDate(array('required' => false)),
      'request_reason_desc'          => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'agency_name'                  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'req_first_name'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_last_name'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'agency_division'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_address1'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_address2'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_city'                     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_state'                    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'req_country'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'req_zipcode'                  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'req_office_phone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_office_comment'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_mobile_phone'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_mobile_comment'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_fax_phone'                => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_fax_comment'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_pager_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_pager_comment'            => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_other_phone1'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_other_comment1'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_other_phone2'             => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'req_other_comment2'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_other_phone3'             => new sfValidatorInteger(array('required' => false)),
      'req_other_comment3'           => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'req_email'                    => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'req_alt_email'                => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'contact_notes'                => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'origin_city'                  => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'origin_state'                 => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'dest_city'                    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'dest_state'                   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'preferred_date'               => new sfValidatorDate(array('required' => false)),
      'alternative_date'             => new sfValidatorDate(array('required' => false)),
      'transport_type'               => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'request_posted_date'          => new sfValidatorDate(array('required' => false)),
      'request_posted_to_afa_org_id' => new sfValidatorInteger(array('required' => false)),
      'reques_processed_date'        => new sfValidatorDate(array('required' => false)),
      'request_disposition'          => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'caller_name'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'caller_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'request_post_results'         => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'requester_vpo_user_id'        => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'source'                       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'soap_post_from_afa_org_id'    => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'soap_post_request_id'         => new sfValidatorInteger(array('required' => false)),
      'request_processed_by'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequest';
  }


}
