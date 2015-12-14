<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Role filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                       => new sfWidgetFormFilterInput(),
      'description'                 => new sfWidgetFormFilterInput(),
      'role_permission_backup_list' => new sfWidgetFormPropelChoice(array('model' => 'PermissionBackup', 'add_empty' => true)),
      'email_list_role_list'        => new sfWidgetFormPropelChoice(array('model' => 'EmailList', 'add_empty' => true)),
      'person_role_list'            => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'                       => new sfValidatorPass(array('required' => false)),
      'description'                 => new sfValidatorPass(array('required' => false)),
      'role_permission_backup_list' => new sfValidatorPropelChoice(array('model' => 'PermissionBackup', 'required' => false)),
      'email_list_role_list'        => new sfValidatorPropelChoice(array('model' => 'EmailList', 'required' => false)),
      'person_role_list'            => new sfValidatorPropelChoice(array('model' => 'Person', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('role_filters[%s]');

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

    $criteria->addJoin(RolePermissionBackupPeer::ROLE_ID, RolePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RolePermissionBackupPeer::PERMISSION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RolePermissionBackupPeer::PERMISSION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addEmailListRoleListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(EmailListRolePeer::ROLE_ID, RolePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmailListRolePeer::LIST_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmailListRolePeer::LIST_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addPersonRoleListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(PersonRolePeer::ROLE_ID, RolePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(PersonRolePeer::PERSON_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(PersonRolePeer::PERSON_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Role';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'title'                       => 'Text',
      'description'                 => 'Text',
      'role_permission_backup_list' => 'ManyKey',
      'email_list_role_list'        => 'ManyKey',
      'person_role_list'            => 'ManyKey',
    );
  }
}
