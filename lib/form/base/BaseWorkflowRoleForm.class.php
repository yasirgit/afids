<?php

/**
 * WorkflowRole form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWorkflowRoleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'role_id'      => new sfWidgetFormPropelChoice(array('model' => 'Role', 'add_empty' => false)),
      'work_flow_id' => new sfWidgetFormPropelChoice(array('model' => 'Workflow', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'WorkflowRole', 'column' => 'id', 'required' => false)),
      'role_id'      => new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id')),
      'work_flow_id' => new sfValidatorPropelChoice(array('model' => 'Workflow', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('workflow_role[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WorkflowRole';
  }


}
