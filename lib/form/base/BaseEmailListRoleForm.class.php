<?php

/**
 * EmailListRole form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailListRoleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'list_id' => new sfWidgetFormInputHidden(),
      'role_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'list_id' => new sfValidatorPropelChoice(array('model' => 'EmailList', 'column' => 'id', 'required' => false)),
      'role_id' => new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_list_role[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailListRole';
  }


}
