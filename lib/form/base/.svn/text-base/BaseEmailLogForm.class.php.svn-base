<?php

/**
 * EmailLog form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'send_date'       => new sfWidgetFormDateTime(),
      'sender_name'     => new sfWidgetFormInput(),
      'sender_email'    => new sfWidgetFormInput(),
      'recipient_count' => new sfWidgetFormInput(),
      'letter_id'       => new sfWidgetFormPropelChoice(array('model' => 'EmailLetter', 'add_empty' => true)),
      'error_count'     => new sfWidgetFormInput(),
      'batch_id'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'EmailLog', 'column' => 'id', 'required' => false)),
      'send_date'       => new sfValidatorDateTime(array('required' => false)),
      'sender_name'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'sender_email'    => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'recipient_count' => new sfValidatorInteger(array('required' => false)),
      'letter_id'       => new sfValidatorPropelChoice(array('model' => 'EmailLetter', 'column' => 'id', 'required' => false)),
      'error_count'     => new sfValidatorInteger(array('required' => false)),
      'batch_id'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailLog';
  }


}
