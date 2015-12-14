<?php

/**
 * TeamNote form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTeamNoteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'role_id' => new sfWidgetFormInputHidden(),
      'note'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'role_id' => new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id', 'required' => false)),
      'note'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_note[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamNote';
  }


}
