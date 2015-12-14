<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * WorkflowRole filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWorkflowRoleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'role_id'      => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => true)),
      'work_flow_id' => new sfWidgetFormPropelChoice(array('model' => 'Workflow', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'role_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Role', 'column' => 'id')),
      'work_flow_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Workflow', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('workflow_role_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WorkflowRole';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'role_id'      => 'ForeignKey',
      'work_flow_id' => 'ForeignKey',
    );
  }
}
