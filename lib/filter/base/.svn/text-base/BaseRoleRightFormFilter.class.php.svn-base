<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RoleRight filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRoleRightFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'role_id'  => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
      'right_id' => new sfWidgetFormPropelChoice(array('model' => 'Right', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'role_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Role', 'column' => 'id')),
      'right_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Right', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('role_right_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RoleRight';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'role_id'  => 'ForeignKey',
      'right_id' => 'ForeignKey',
    );
  }
}
