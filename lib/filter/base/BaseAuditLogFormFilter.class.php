<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * AuditLog filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAuditLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'date_time'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'person_id'    => new sfWidgetFormFilterInput(),
      'event'        => new sfWidgetFormFilterInput(),
      'event_reason' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'date_time'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'person_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event'        => new sfValidatorPass(array('required' => false)),
      'event_reason' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('audit_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AuditLog';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'date_time'    => 'Date',
      'person_id'    => 'Number',
      'event'        => 'Text',
      'event_reason' => 'Text',
    );
  }
}
