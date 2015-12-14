<?php

/**
 * EmailListPerson form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailListPersonForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'list_id'   => new sfWidgetFormPropelChoice(array('model' => 'EmailList', 'add_empty' => false)),
      'person_id' => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'EmailListPerson', 'column' => 'id', 'required' => false)),
      'list_id'   => new sfValidatorPropelChoice(array('model' => 'EmailList', 'column' => 'id')),
      'person_id' => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('email_list_person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailListPerson';
  }


}
