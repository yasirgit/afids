<?php

/**
 * PersonalNote form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonalNoteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'person_id' => new sfWidgetFormInputHidden(),
      'note'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'person_id' => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id', 'required' => false)),
      'note'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personal_note[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonalNote';
  }


}
