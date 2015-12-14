<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * EmailList filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEmailListFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'          => new sfWidgetFormFilterInput(),
      'is_private'           => new sfWidgetFormFilterInput(),
      'wing_id'              => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'email_list_role_list' => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'description'          => new sfValidatorPass(array('required' => false)),
      'is_private'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wing_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Wing', 'column' => 'id')),
      'email_list_role_list' => new sfValidatorPropelChoice(array('model' => 'Role', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('email_list_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(EmailListRolePeer::LIST_ID, EmailListPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(EmailListRolePeer::ROLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(EmailListRolePeer::ROLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'EmailList';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'description'          => 'Text',
      'is_private'           => 'Number',
      'wing_id'              => 'ForeignKey',
      'email_list_role_list' => 'ManyKey',
    );
  }
}
