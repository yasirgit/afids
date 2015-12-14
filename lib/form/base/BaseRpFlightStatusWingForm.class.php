<?php

/**
 * RpFlightStatusWing form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpFlightStatusWingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'wingID'            => new sfWidgetFormInput(),
      'wingName'          => new sfWidgetFormInput(),
      'commandPilot'      => new sfWidgetFormInput(),
      'nonPilot'          => new sfWidgetFormInput(),
      'verifyOrientation' => new sfWidgetFormInput(),
      'groundAngel'       => new sfWidgetFormInput(),
      'missionAssistant'  => new sfWidgetFormInput(),
      'totalCount'        => new sfWidgetFormInput(),
      'id'                => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'wingID'            => new sfValidatorInteger(),
      'wingName'          => new sfValidatorString(array('max_length' => 30)),
      'commandPilot'      => new sfValidatorInteger(array('required' => false)),
      'nonPilot'          => new sfValidatorInteger(array('required' => false)),
      'verifyOrientation' => new sfValidatorInteger(array('required' => false)),
      'groundAngel'       => new sfValidatorInteger(array('required' => false)),
      'missionAssistant'  => new sfValidatorInteger(array('required' => false)),
      'totalCount'        => new sfValidatorInteger(array('required' => false)),
      'id'                => new sfValidatorPropelChoice(array('model' => 'RpFlightStatusWing', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_flight_status_wing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpFlightStatusWing';
  }


}
