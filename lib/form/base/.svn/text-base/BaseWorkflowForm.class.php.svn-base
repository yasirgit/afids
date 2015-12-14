<?php

/**
 * Workflow form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWorkflowForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'description'       => new sfWidgetFormInput(),
      'stored_proc_name'  => new sfWidgetFormInput(),
      'redirect_if_true'  => new sfWidgetFormInput(),
      'redirect_if_false' => new sfWidgetFormInput(),
      'message_if_true'   => new sfWidgetFormInput(),
      'message_if_false'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Workflow', 'column' => 'id', 'required' => false)),
      'description'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'stored_proc_name'  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'redirect_if_true'  => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'redirect_if_false' => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'message_if_true'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'message_if_false'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('workflow[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Workflow';
  }


}
