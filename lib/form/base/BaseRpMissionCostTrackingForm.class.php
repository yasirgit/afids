<?php

/**
 * RpMissionCostTracking form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionCostTrackingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_date'           => new sfWidgetFormDateTime(),
      'missionDateDisplay'     => new sfWidgetFormInput(),
      'external_id'            => new sfWidgetFormInput(),
      'pilot_id'               => new sfWidgetFormInput(),
      'pilotName'              => new sfWidgetFormInput(),
      'id'                     => new sfWidgetFormInputHidden(),
      'commercial_ticket_cost' => new sfWidgetFormInput(),
      'yearNo'                 => new sfWidgetFormInput(),
      'approved'               => new sfWidgetFormInput(),
      'passengerName'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'mission_date'           => new sfValidatorDateTime(array('required' => false)),
      'missionDateDisplay'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'external_id'            => new sfValidatorInteger(array('required' => false)),
      'pilot_id'               => new sfValidatorInteger(array('required' => false)),
      'pilotName'              => new sfValidatorString(array('max_length' => 81)),
      'id'                     => new sfValidatorPropelChoice(array('model' => 'RpMissionCostTracking', 'column' => 'id', 'required' => false)),
      'commercial_ticket_cost' => new sfValidatorInteger(array('required' => false)),
      'yearNo'                 => new sfValidatorInteger(array('required' => false)),
      'approved'               => new sfValidatorInteger(array('required' => false)),
      'passengerName'          => new sfValidatorString(array('max_length' => 81)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_cost_tracking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionCostTracking';
  }


}
