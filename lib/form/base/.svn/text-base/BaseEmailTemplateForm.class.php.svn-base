<?php

/**
 * EmailTemplate form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailTemplateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInput(),
      'subject'      => new sfWidgetFormInput(),
      'sender_name'  => new sfWidgetFormInput(),
      'sender_email' => new sfWidgetFormInput(),
      'body'         => new sfWidgetFormTextarea(),
      'person_id'    => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'EmailTemplate', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'subject'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sender_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sender_email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body'         => new sfValidatorString(array('required' => false)),
      'person_id'    => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('email_template[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailTemplate';
  }


}
