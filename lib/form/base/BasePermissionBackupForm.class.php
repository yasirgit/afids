<?php

/**
 * PermissionBackup form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePermissionBackupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'code'                        => new sfWidgetFormInput(),
      'title'                       => new sfWidgetFormInput(),
      'description'                 => new sfWidgetFormInput(),
      'role_permission_backup_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Role')),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorPropelChoice(array('model' => 'PermissionBackup', 'column' => 'id', 'required' => false)),
      'code'                        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'title'                       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'description'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'role_permission_backup_list' => new sfValidatorPropelChoiceMany(array('model' => 'Role', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'PermissionBackup', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('permission_backup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PermissionBackup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['role_permission_backup_list']))
    {
      $values = array();
      foreach ($this->object->getRolePermissionBackups() as $obj)
      {
        $values[] = $obj->getRoleId();
      }

      $this->setDefault('role_permission_backup_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveRolePermissionBackupList($con);
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
    $c->add(RolePermissionBackupPeer::PERMISSION_ID, $this->object->getPrimaryKey());
    RolePermissionBackupPeer::doDelete($c, $con);

    $values = $this->getValue('role_permission_backup_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RolePermissionBackup();
        $obj->setPermissionId($this->object->getPrimaryKey());
        $obj->setRoleId($value);
        $obj->save();
      }
    }
  }

}
