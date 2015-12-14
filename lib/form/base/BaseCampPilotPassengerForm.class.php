<?php

/**
 * CampPilotPassenger form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampPilotPassengerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'camp_id'      => new sfWidgetFormInputHidden(),
      'member_id'    => new sfWidgetFormInput(),
      'passenger_id' => new sfWidgetFormInput(),
      'flight_date'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'camp_id'      => new sfValidatorPropelChoice(array('model' => 'CampPilotPassenger', 'column' => 'camp_id', 'required' => false)),
      'member_id'    => new sfValidatorInteger(),
      'passenger_id' => new sfValidatorInteger(),
      'flight_date'  => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('camp_pilot_passenger[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampPilotPassenger';
  }


}
