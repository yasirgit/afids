<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * ContactRequest filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseContactRequestFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'       => new sfWidgetFormFilterInput(),
      'last_name'        => new sfWidgetFormFilterInput(),
      'title'            => new sfWidgetFormFilterInput(),
      'address1'         => new sfWidgetFormFilterInput(),
      'address2'         => new sfWidgetFormFilterInput(),
      'city'             => new sfWidgetFormFilterInput(),
      'state'            => new sfWidgetFormFilterInput(),
      'zipcode'          => new sfWidgetFormFilterInput(),
      'country'          => new sfWidgetFormFilterInput(),
      'day_phone'        => new sfWidgetFormFilterInput(),
      'day_comment'      => new sfWidgetFormFilterInput(),
      'eve_phone'        => new sfWidgetFormFilterInput(),
      'eve_comment'      => new sfWidgetFormFilterInput(),
      'fax_phone'        => new sfWidgetFormFilterInput(),
      'fax_comment'      => new sfWidgetFormFilterInput(),
      'mobile_phone'     => new sfWidgetFormFilterInput(),
      'mobile_comment'   => new sfWidgetFormFilterInput(),
      'pager_phone'      => new sfWidgetFormFilterInput(),
      'pager_comment'    => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'ref_source_id'    => new sfWidgetFormFilterInput(),
      'send_app_format'  => new sfWidgetFormFilterInput(),
      'comment'          => new sfWidgetFormFilterInput(),
      'contact_type_id'  => new sfWidgetFormFilterInput(),
      'person_id'        => new sfWidgetFormFilterInput(),
      'processed'        => new sfWidgetFormFilterInput(),
      'letter_to_send'   => new sfWidgetFormFilterInput(),
      'letter_sent_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'request_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'session_id'       => new sfWidgetFormFilterInput(),
      'ip_address'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'first_name'       => new sfValidatorPass(array('required' => false)),
      'last_name'        => new sfValidatorPass(array('required' => false)),
      'title'            => new sfValidatorPass(array('required' => false)),
      'address1'         => new sfValidatorPass(array('required' => false)),
      'address2'         => new sfValidatorPass(array('required' => false)),
      'city'             => new sfValidatorPass(array('required' => false)),
      'state'            => new sfValidatorPass(array('required' => false)),
      'zipcode'          => new sfValidatorPass(array('required' => false)),
      'country'          => new sfValidatorPass(array('required' => false)),
      'day_phone'        => new sfValidatorPass(array('required' => false)),
      'day_comment'      => new sfValidatorPass(array('required' => false)),
      'eve_phone'        => new sfValidatorPass(array('required' => false)),
      'eve_comment'      => new sfValidatorPass(array('required' => false)),
      'fax_phone'        => new sfValidatorPass(array('required' => false)),
      'fax_comment'      => new sfValidatorPass(array('required' => false)),
      'mobile_phone'     => new sfValidatorPass(array('required' => false)),
      'mobile_comment'   => new sfValidatorPass(array('required' => false)),
      'pager_phone'      => new sfValidatorPass(array('required' => false)),
      'pager_comment'    => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'ref_source_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'send_app_format'  => new sfValidatorPass(array('required' => false)),
      'comment'          => new sfValidatorPass(array('required' => false)),
      'contact_type_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'person_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'processed'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'letter_to_send'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'letter_sent_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'request_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'session_id'       => new sfValidatorPass(array('required' => false)),
      'ip_address'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('contact_request_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactRequest';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'first_name'       => 'Text',
      'last_name'        => 'Text',
      'title'            => 'Text',
      'address1'         => 'Text',
      'address2'         => 'Text',
      'city'             => 'Text',
      'state'            => 'Text',
      'zipcode'          => 'Text',
      'country'          => 'Text',
      'day_phone'        => 'Text',
      'day_comment'      => 'Text',
      'eve_phone'        => 'Text',
      'eve_comment'      => 'Text',
      'fax_phone'        => 'Text',
      'fax_comment'      => 'Text',
      'mobile_phone'     => 'Text',
      'mobile_comment'   => 'Text',
      'pager_phone'      => 'Text',
      'pager_comment'    => 'Text',
      'email'            => 'Text',
      'ref_source_id'    => 'Number',
      'send_app_format'  => 'Text',
      'comment'          => 'Text',
      'contact_type_id'  => 'Number',
      'person_id'        => 'Number',
      'processed'        => 'Number',
      'letter_to_send'   => 'Number',
      'letter_sent_date' => 'Date',
      'request_date'     => 'Date',
      'session_id'       => 'Text',
      'ip_address'       => 'Text',
    );
  }
}
