<?php

/**
 * RoleRight form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleRightForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'role_id'  => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => false)),
      'right_id' => new sfWidgetFormPropelChoice(array('model' => 'Right', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'RoleRight', 'column' => 'id', 'required' => false)),
      'role_id'  => new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id')),
      'right_id' => new sfValidatorPropelChoice(array('model' => 'Right', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('role_right[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoleRight';
  }


}
