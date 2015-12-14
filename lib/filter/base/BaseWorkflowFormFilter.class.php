<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Workflow filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWorkflowFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description'       => new sfWidgetFormFilterInput(),
      'stored_proc_name'  => new sfWidgetFormFilterInput(),
      'redirect_if_true'  => new sfWidgetFormFilterInput(),
      'redirect_if_false' => new sfWidgetFormFilterInput(),
      'message_if_true'   => new sfWidgetFormFilterInput(),
      'message_if_false'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description'       => new sfValidatorPass(array('required' => false)),
      'stored_proc_name'  => new sfValidatorPass(array('required' => false)),
      'redirect_if_true'  => new sfValidatorPass(array('required' => false)),
      'redirect_if_false' => new sfValidatorPass(array('required' => false)),
      'message_if_true'   => new sfValidatorPass(array('required' => false)),
      'message_if_false'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('workflow_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Workflow';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'description'       => 'Text',
      'stored_proc_name'  => 'Text',
      'redirect_if_true'  => 'Text',
      'redirect_if_false' => 'Text',
      'message_if_true'   => 'Text',
      'message_if_false'  => 'Text',
    );
  }
}
