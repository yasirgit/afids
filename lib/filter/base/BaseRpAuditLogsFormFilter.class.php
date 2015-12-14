<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpAuditLogs filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpAuditLogsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'DateTimeDisplay' => new sfWidgetFormFilterInput(),
      'date_time'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'audit_identity'  => new sfWidgetFormFilterInput(),
      'event'           => new sfWidgetFormFilterInput(),
      'event_reason'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'DateTimeDisplay' => new sfValidatorPass(array('required' => false)),
      'date_time'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'audit_identity'  => new sfValidatorPass(array('required' => false)),
      'event'           => new sfValidatorPass(array('required' => false)),
      'event_reason'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_audit_logs_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpAuditLogs';
  }

  public function getFields()
  {
    return array(
      'DateTimeDisplay' => 'Text',
      'date_time'       => 'Date',
      'audit_identity'  => 'Text',
      'event'           => 'Text',
      'event_reason'    => 'Text',
      'id'              => 'Number',
    );
  }
}
