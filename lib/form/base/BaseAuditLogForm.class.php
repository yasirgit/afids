<?php

/**
 * AuditLog form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAuditLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'date_time'    => new sfWidgetFormDateTime(),
      'person_id'    => new sfWidgetFormInput(),
      'event'        => new sfWidgetFormInput(),
      'event_reason' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'AuditLog', 'column' => 'id', 'required' => false)),
      'date_time'    => new sfValidatorDateTime(array('required' => false)),
      'person_id'    => new sfValidatorInteger(array('required' => false)),
      'event'        => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'event_reason' => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('audit_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AuditLog';
  }


}
