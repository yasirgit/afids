<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PermissionBackup filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePermissionBackupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'                        => new sfWidgetFormFilterInput(),
      'title'                       => new sfWidgetFormFilterInput(),
      'description'                 => new sfWidgetFormFilterInput(),
      'role_permission_backup_list' => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'code'                        => new sfValidatorPass(array('required' => false)),
      'title'                       => new sfValidatorPass(array('required' => false)),
      'description'                 => new sfValidatorPass(array('required' => false)),
      'role_permission_backup_list' => new sfValidatorPropelChoice(array('model' => 'Role', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('permission_backup_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addRolePermissionBackupListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(RolePermissionBackupPeer::PERMISSION_ID, PermissionBackupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RolePermissionBackupPeer::ROLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RolePermissionBackupPeer::ROLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'PermissionBackup';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'code'                        => 'Text',
      'title'                       => 'Text',
      'description'                 => 'Text',
      'role_permission_backup_list' => 'ManyKey',
    );
  }
}
