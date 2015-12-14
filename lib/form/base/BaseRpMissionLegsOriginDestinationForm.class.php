<?php

/**
 * RpMissionLegsOriginDestination form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionLegsOriginDestinationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'missionNo'          => new sfWidgetFormInput(),
      'externalID'         => new sfWidgetFormInput(),
      'legNumber'          => new sfWidgetFormInput(),
      'missionDisplayDate' => new sfWidgetFormInput(),
      'origin'             => new sfWidgetFormInput(),
      'destination'        => new sfWidgetFormInput(),
      'wingName'           => new sfWidgetFormInput(),
      'mission_date'       => new sfWidgetFormDateTime(),
      'legID'              => new sfWidgetFormInput(),
      'isAfaLeg'           => new sfWidgetFormInput(),
      'isFlown'            => new sfWidgetFormInput(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'missionNo'          => new sfValidatorString(array('max_length' => 23, 'required' => false)),
      'externalID'         => new sfValidatorInteger(array('required' => false)),
      'legNumber'          => new sfValidatorInteger(),
      'missionDisplayDate' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'origin'             => new sfValidatorString(array('max_length' => 41, 'required' => false)),
      'destination'        => new sfValidatorString(array('max_length' => 41, 'required' => false)),
      'wingName'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'mission_date'       => new sfValidatorDateTime(array('required' => false)),
      'legID'              => new sfValidatorInteger(array('required' => false)),
      'isAfaLeg'           => new sfValidatorInteger(array('required' => false)),
      'isFlown'            => new sfValidatorInteger(array('required' => false)),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'RpMissionLegsOriginDestination', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_legs_origin_destination[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionLegsOriginDestination';
  }


}
