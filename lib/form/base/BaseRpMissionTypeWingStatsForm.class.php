<?php

/**
 * RpMissionTypeWingStats form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionTypeWingStatsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monthNo'        => new sfWidgetFormInput(),
      'yearNo'         => new sfWidgetFormInput(),
      'missionTypeID'  => new sfWidgetFormInput(),
      'wingID'         => new sfWidgetFormInput(),
      'legCount'       => new sfWidgetFormInput(),
      'totalHours'     => new sfWidgetFormInput(),
      'aircraftCost'   => new sfWidgetFormInput(),
      'commercialCost' => new sfWidgetFormInput(),
      'id'             => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'monthNo'        => new sfValidatorInteger(array('required' => false)),
      'yearNo'         => new sfValidatorInteger(array('required' => false)),
      'missionTypeID'  => new sfValidatorInteger(array('required' => false)),
      'wingID'         => new sfValidatorInteger(array('required' => false)),
      'legCount'       => new sfValidatorInteger(array('required' => false)),
      'totalHours'     => new sfValidatorInteger(array('required' => false)),
      'aircraftCost'   => new sfValidatorInteger(array('required' => false)),
      'commercialCost' => new sfValidatorInteger(array('required' => false)),
      'id'             => new sfValidatorPropelChoice(array('model' => 'RpMissionTypeWingStats', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_type_wing_stats[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionTypeWingStats';
  }


}
