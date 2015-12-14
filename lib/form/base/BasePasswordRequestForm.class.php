<?php

/**
 * PasswordRequest form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePasswordRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'person_id'  => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'email'      => new sfWidgetFormInput(),
      'token'      => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PasswordRequest', 'column' => 'id', 'required' => false)),
      'person_id'  => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'email'      => new sfValidatorString(array('max_length' => 80)),
      'token'      => new sfValidatorString(array('max_length' => 32)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PasswordRequest', 'column' => array('token')))
    );

    $this->widgetSchema->setNameFormat('password_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PasswordRequest';
  }


}
