<?php

/**
 * RoleNotification form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleNotificationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'mid'          => new sfWidgetFormInput(),
      'role_id'      => new sfWidgetFormInput(),
      'notification' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'RoleNotification', 'column' => 'id', 'required' => false)),
      'mid'          => new sfValidatorString(array('max_length' => 255)),
      'role_id'      => new sfValidatorInteger(),
      'notification' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('role_notification[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoleNotification';
  }


}
