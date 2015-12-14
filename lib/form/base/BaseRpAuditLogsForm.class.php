<?php

/**
 * RpAuditLogs form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpAuditLogsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'DateTimeDisplay' => new sfWidgetFormInput(),
      'date_time'       => new sfWidgetFormDateTime(),
      'audit_identity'  => new sfWidgetFormInput(),
      'event'           => new sfWidgetFormInput(),
      'event_reason'    => new sfWidgetFormInput(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'DateTimeDisplay' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'date_time'       => new sfValidatorDateTime(array('required' => false)),
      'audit_identity'  => new sfValidatorString(array('max_length' => 82, 'required' => false)),
      'event'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'event_reason'    => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'id'              => new sfValidatorPropelChoice(array('model' => 'RpAuditLogs', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_audit_logs[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpAuditLogs';
  }


}
