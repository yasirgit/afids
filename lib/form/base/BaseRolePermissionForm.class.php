<?php

/**
 * RolePermission form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRolePermissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'role_id'       => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'role_id'       => new sfValidatorPropelChoice(array('model' => 'RolePermission', 'column' => 'role_id', 'required' => false)),
      'permission_id' => new sfValidatorPropelChoice(array('model' => 'RolePermission', 'column' => 'permission_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('role_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RolePermission';
  }


}
