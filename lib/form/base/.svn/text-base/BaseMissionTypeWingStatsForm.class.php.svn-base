<?php

/**
 * MissionTypeWingStats form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionTypeWingStatsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'month_no'        => new sfWidgetFormInput(),
      'year_no'         => new sfWidgetFormInput(),
      'wing_id'         => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'mission_type_id' => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => true)),
      'leg_count'       => new sfWidgetFormInput(),
      'total_hours'     => new sfWidgetFormInput(),
      'aircraft_cost'   => new sfWidgetFormInput(),
      'commercial_cost' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'MissionTypeWingStats', 'column' => 'id', 'required' => false)),
      'month_no'        => new sfValidatorInteger(array('required' => false)),
      'year_no'         => new sfValidatorInteger(array('required' => false)),
      'wing_id'         => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
      'mission_type_id' => new sfValidatorPropelChoice(array('model' => 'MissionType', 'column' => 'id', 'required' => false)),
      'leg_count'       => new sfValidatorInteger(array('required' => false)),
      'total_hours'     => new sfValidatorInteger(array('required' => false)),
      'aircraft_cost'   => new sfValidatorInteger(array('required' => false)),
      'commercial_cost' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_type_wing_stats[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionTypeWingStats';
  }


}
