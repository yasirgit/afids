<?php

/**
 * Role form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'title'                       => new sfWidgetFormInput(),
      'description'                 => new sfWidgetFormInput(),
      'role_permission_backup_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'PermissionBackup')),
      'email_list_role_list'        => new sfWidgetFormPropelChoiceMany(array('model' => 'EmailList')),
      'person_role_list'            => new sfWidgetFormPropelChoiceMany(array('model' => 'Person')),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id', 'required' => false)),
      'title'                       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'description'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'role_permission_backup_list' => new sfValidatorPropelChoiceMany(array('model' => 'PermissionBackup', 'required' => false)),
      'email_list_role_list'        => new sfValidatorPropelChoiceMany(array('model' => 'EmailList', 'required' => false)),
      'person_role_list'            => new sfValidatorPropelChoiceMany(array('model' => 'Person', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Role', 'column' => array('title')))
    );

    $this->widgetSchema->setNameFormat('role[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Role';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['role_permission_backup_list']))
    {
      $values = array();
      foreach ($this->object->getRolePermissionBackups() as $obj)
      {
        $values[] = $obj->getPermissionId();
      }

      $this->setDefault('role_permission_backup_list', $values);
    }

    if (isset($this->widgetSchema['email_list_role_list']))
    {
      $values = array();
      foreach ($this->object->getEmailListRoles() as $obj)
      {
        $values[] = $obj->getListId();
      }

      $this->setDefault('email_list_role_list', $values);
    }

    if (isset($this->widgetSchema['person_role_list']))
    {
      $values = array();
      foreach ($this->object->getPersonRoles() as $obj)
      {
        $values[] = $obj->getPersonId();
      }

      $this->setDefault('person_role_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveRolePermissionBackupList($con);
    $this->saveEmailListRoleList($con);
    $this->savePersonRoleList($con);
  }

  public function saveRolePermissionBackupList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['role_permission_backup_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(RolePermissionBackupPeer::ROLE_ID, $this->object->getPrimaryKey());
    RolePermissionBackupPeer::doDelete($c, $con);

    $values = $this->getValue('role_permission_backup_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RolePermissionBackup();
        $obj->setRoleId($this->object->getPrimaryKey());
        $obj->setPermissionId($value);
        $obj->save();
      }
    }
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
    $c->add(EmailListRolePeer::ROLE_ID, $this->object->getPrimaryKey());
    EmailListRolePeer::doDelete($c, $con);

    $values = $this->getValue('email_list_role_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new EmailListRole();
        $obj->setRoleId($this->object->getPrimaryKey());
        $obj->setListId($value);
        $obj->save();
      }
    }
  }

  public function savePersonRoleList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['person_role_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(PersonRolePeer::ROLE_ID, $this->object->getPrimaryKey());
    PersonRolePeer::doDelete($c, $con);

    $values = $this->getValue('person_role_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new PersonRole();
        $obj->setRoleId($this->object->getPrimaryKey());
        $obj->setPersonId($value);
        $obj->save();
      }
    }
  }

}
