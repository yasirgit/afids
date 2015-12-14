<?php

/**
 * WingJob form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseWingJobForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInput(),
      'short_name' => new sfWidgetFormInput(),
      'person_id'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'WingJob', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 30)),
      'short_name' => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'person_id'  => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('wing_job[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WingJob';
  }


}
