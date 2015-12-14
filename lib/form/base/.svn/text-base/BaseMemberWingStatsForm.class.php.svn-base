<?php

/**
 * MemberWingStats form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberWingStatsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'month'         => new sfWidgetFormInput(),
      'year'          => new sfWidgetFormInput(),
      'wing_id'       => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'flight_status' => new sfWidgetFormInput(),
      'member_count'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'MemberWingStats', 'column' => 'id', 'required' => false)),
      'month'         => new sfValidatorInteger(array('required' => false)),
      'year'          => new sfValidatorInteger(array('required' => false)),
      'wing_id'       => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
      'flight_status' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'member_count'  => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_wing_stats[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberWingStats';
  }


}
