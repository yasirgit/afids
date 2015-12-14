<?php

/**
 * MemberWingJob form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberWingJobForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'member_id'   => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'wing_job_id' => new sfWidgetFormPropelChoice(array('model' => 'WingJob', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'MemberWingJob', 'column' => 'id', 'required' => false)),
      'member_id'   => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'wing_job_id' => new sfValidatorPropelChoice(array('model' => 'WingJob', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'MemberWingJob', 'column' => array('member_id', 'wing_job_id')))
    );

    $this->widgetSchema->setNameFormat('member_wing_job[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberWingJob';
  }


}
