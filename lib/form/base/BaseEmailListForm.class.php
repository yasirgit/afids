<?php

/**
 * EmailList form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailListForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'description'          => new sfWidgetFormInput(),
      'is_private'           => new sfWidgetFormInput(),
      'wing_id'              => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'email_list_role_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Role')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'EmailList', 'column' => 'id', 'required' => false)),
      'description'          => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'is_private'           => new sfValidatorInteger(array('required' => false)),
      'wing_id'              => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
      'email_list_role_list' => new sfValidatorPropelChoiceMany(array('model' => 'Role', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_list[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EmailList';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['email_list_role_list']))
    {
      $values = array();
      foreach ($this->object->getEmailListRoles() as $obj)
      {
        $values[] = $obj->getRoleId();
      }

      $this->setDefault('email_list_role_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEmailListRoleList($con);
  }

  public function saveEmailListRoleList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['email_list_role_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(EmailListRolePeer::LIST_ID, $this->object->getPrimaryKey());
    EmailListRolePeer::doDelete($c, $con);

    $values = $this->getValue('email_list_role_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmailListRole();
        $obj->setListId($this->object->getPrimaryKey());
        $obj->setRoleId($value);
        $obj->save();
      }
    }
  }

}
