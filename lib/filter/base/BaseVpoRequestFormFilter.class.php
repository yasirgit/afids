<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * VpoRequest filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'hazardous_cargo_flag'         => new sfWidgetFormFilterInput(),
      'request_date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'request_reason_desc'          => new sfWidgetFormFilterInput(),
      'agency_name'                  => new sfWidgetFormFilterInput(),
      'req_first_name'               => new sfWidgetFormFilterInput(),
      'req_last_name'                => new sfWidgetFormFilterInput(),
      'agency_division'              => new sfWidgetFormFilterInput(),
      'req_address1'                 => new sfWidgetFormFilterInput(),
      'req_address2'                 => new sfWidgetFormFilterInput(),
      'req_city'                     => new sfWidgetFormFilterInput(),
      'req_state'                    => new sfWidgetFormFilterInput(),
      'req_country'                  => new sfWidgetFormFilterInput(),
      'req_zipcode'                  => new sfWidgetFormFilterInput(),
      'req_office_phone'             => new sfWidgetFormFilterInput(),
      'req_office_comment'           => new sfWidgetFormFilterInput(),
      'req_mobile_phone'             => new sfWidgetFormFilterInput(),
      'req_mobile_comment'           => new sfWidgetFormFilterInput(),
      'req_fax_phone'                => new sfWidgetFormFilterInput(),
      'req_fax_comment'              => new sfWidgetFormFilterInput(),
      'req_pager_phone'              => new sfWidgetFormFilterInput(),
      'req_pager_comment'            => new sfWidgetFormFilterInput(),
      'req_other_phone1'             => new sfWidgetFormFilterInput(),
      'req_other_comment1'           => new sfWidgetFormFilterInput(),
      'req_other_phone2'             => new sfWidgetFormFilterInput(),
      'req_other_comment2'           => new sfWidgetFormFilterInput(),
      'req_other_phone3'             => new sfWidgetFormFilterInput(),
      'req_other_comment3'           => new sfWidgetFormFilterInput(),
      'req_email'                    => new sfWidgetFormFilterInput(),
      'req_alt_email'                => new sfWidgetFormFilterInput(),
      'contact_notes'                => new sfWidgetFormFilterInput(),
      'origin_city'                  => new sfWidgetFormFilterInput(),
      'origin_state'                 => new sfWidgetFormFilterInput(),
      'dest_city'                    => new sfWidgetFormFilterInput(),
      'dest_state'                   => new sfWidgetFormFilterInput(),
      'preferred_date'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'alternative_date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'transport_type'               => new sfWidgetFormFilterInput(),
      'request_posted_date'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'request_posted_to_afa_org_id' => new sfWidgetFormFilterInput(),
      'reques_processed_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'request_disposition'          => new sfWidgetFormFilterInput(),
      'caller_name'                  => new sfWidgetFormFilterInput(),
      'caller_phone'                 => new sfWidgetFormFilterInput(),
      'request_post_results'         => new sfWidgetFormFilterInput(),
      'requester_vpo_user_id'        => new sfWidgetFormFilterInput(),
      'source'                       => new sfWidgetFormFilterInput(),
      'soap_post_from_afa_org_id'    => new sfWidgetFormFilterInput(),
      'soap_post_request_id'         => new sfWidgetFormFilterInput(),
      'request_processed_by'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'hazardous_cargo_flag'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'request_date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'request_reason_desc'          => new sfValidatorPass(array('required' => false)),
      'agency_name'                  => new sfValidatorPass(array('required' => false)),
      'req_first_name'               => new sfValidatorPass(array('required' => false)),
      'req_last_name'                => new sfValidatorPass(array('required' => false)),
      'agency_division'              => new sfValidatorPass(array('required' => false)),
      'req_address1'                 => new sfValidatorPass(array('required' => false)),
      'req_address2'                 => new sfValidatorPass(array('required' => false)),
      'req_city'                     => new sfValidatorPass(array('required' => false)),
      'req_state'                    => new sfValidatorPass(array('required' => false)),
      'req_country'                  => new sfValidatorPass(array('required' => false)),
      'req_zipcode'                  => new sfValidatorPass(array('required' => false)),
      'req_office_phone'             => new sfValidatorPass(array('required' => false)),
      'req_office_comment'           => new sfValidatorPass(array('required' => false)),
      'req_mobile_phone'             => new sfValidatorPass(array('required' => false)),
      'req_mobile_comment'           => new sfValidatorPass(array('required' => false)),
      'req_fax_phone'                => new sfValidatorPass(array('required' => false)),
      'req_fax_comment'              => new sfValidatorPass(array('required' => false)),
      'req_pager_phone'              => new sfValidatorPass(array('required' => false)),
      'req_pager_comment'            => new sfValidatorPass(array('required' => false)),
      'req_other_phone1'             => new sfValidatorPass(array('required' => false)),
      'req_other_comment1'           => new sfValidatorPass(array('required' => false)),
      'req_other_phone2'             => new sfValidatorPass(array('required' => false)),
      'req_other_comment2'           => new sfValidatorPass(array('required' => false)),
      'req_other_phone3'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'req_other_comment3'           => new sfValidatorPass(array('required' => false)),
      'req_email'                    => new sfValidatorPass(array('required' => false)),
      'req_alt_email'                => new sfValidatorPass(array('required' => false)),
      'contact_notes'                => new sfValidatorPass(array('required' => false)),
      'origin_city'                  => new sfValidatorPass(array('required' => false)),
      'origin_state'                 => new sfValidatorPass(array('required' => false)),
      'dest_city'                    => new sfValidatorPass(array('required' => false)),
      'dest_state'                   => new sfValidatorPass(array('required' => false)),
      'preferred_date'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'alternative_date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'transport_type'               => new sfValidatorPass(array('required' => false)),
      'request_posted_date'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'request_posted_to_afa_org_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reques_processed_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'request_disposition'          => new sfValidatorPass(array('required' => false)),
      'caller_name'                  => new sfValidatorPass(array('required' => false)),
      'caller_phone'                 => new sfValidatorPass(array('required' => false)),
      'request_post_results'         => new sfValidatorPass(array('required' => false)),
      'requester_vpo_user_id'        => new sfValidatorPass(array('required' => false)),
      'source'                       => new sfValidatorPass(array('required' => false)),
      'soap_post_from_afa_org_id'    => new sfValidatorPass(array('required' => false)),
      'soap_post_request_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'request_processed_by'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequest';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'hazardous_cargo_flag'         => 'Number',
      'request_date'                 => 'Date',
      'request_reason_desc'          => 'Text',
      'agency_name'                  => 'Text',
      'req_first_name'               => 'Text',
      'req_last_name'                => 'Text',
      'agency_division'              => 'Text',
      'req_address1'                 => 'Text',
      'req_address2'                 => 'Text',
      'req_city'                     => 'Text',
      'req_state'                    => 'Text',
      'req_country'                  => 'Text',
      'req_zipcode'                  => 'Text',
      'req_office_phone'             => 'Text',
      'req_office_comment'           => 'Text',
      'req_mobile_phone'             => 'Text',
      'req_mobile_comment'           => 'Text',
      'req_fax_phone'                => 'Text',
      'req_fax_comment'              => 'Text',
      'req_pager_phone'              => 'Text',
      'req_pager_comment'            => 'Text',
      'req_other_phone1'             => 'Text',
      'req_other_comment1'           => 'Text',
      'req_other_phone2'             => 'Text',
      'req_other_comment2'           => 'Text',
      'req_other_phone3'             => 'Number',
      'req_other_comment3'           => 'Text',
      'req_email'                    => 'Text',
      'req_alt_email'                => 'Text',
      'contact_notes'                => 'Text',
      'origin_city'                  => 'Text',
      'origin_state'                 => 'Text',
      'dest_city'                    => 'Text',
      'dest_state'                   => 'Text',
      'preferred_date'               => 'Date',
      'alternative_date'             => 'Date',
      'transport_type'               => 'Text',
      'request_posted_date'          => 'Date',
      'request_posted_to_afa_org_id' => 'Number',
      'reques_processed_date'        => 'Date',
      'request_disposition'          => 'Text',
      'caller_name'                  => 'Text',
      'caller_phone'                 => 'Text',
      'request_post_results'         => 'Text',
      'requester_vpo_user_id'        => 'Text',
      'source'                       => 'Text',
      'soap_post_from_afa_org_id'    => 'Text',
      'soap_post_request_id'         => 'Number',
      'request_processed_by'         => 'Number',
    );
  }
}
