<?php

/**
 * EmailQueue form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailQueueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'person_id'    => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'letter_id'    => new sfWidgetFormPropelChoice(array('model' => 'EmailLetter', 'add_empty' => false)),
      'request_date' => new sfWidgetFormDateTime(),
      'send_date'    => new sfWidgetFormDateTime(),
      'priority'     => new sfWidgetFormInput(),
      'send_status'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'EmailQueue', 'column' => 'id', 'required' => false)),
      'person_id'    => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'letter_id'    => new sfValidatorPropelChoice(array('model' => 'EmailLetter', 'column' => 'id')),
      'request_date' => new sfValidatorDateTime(array('required' => false)),
      'send_date'    => new sfValidatorDateTime(array('required' => false)),
      'priority'     => new sfValidatorInteger(array('required' => false)),
      'send_status'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_queue[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailQueue';
  }


}
