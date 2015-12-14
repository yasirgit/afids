<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MemberWingJob filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberWingJobFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'   => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'wing_job_id' => new sfWidgetFormPropelChoice(array('model' => 'WingJob', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'member_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'wing_job_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WingJob', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('member_wing_job_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberWingJob';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'member_id'   => 'ForeignKey',
      'wing_job_id' => 'ForeignKey',
    );
  }
}
