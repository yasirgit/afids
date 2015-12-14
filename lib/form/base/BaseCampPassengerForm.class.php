<?php

/**
 * CampPassenger form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampPassengerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'camp_id'           => new sfWidgetFormInputHidden(),
      'passenger_id'      => new sfWidgetFormInputHidden(),
      'airport_id'        => new sfWidgetFormInput(),
      'note'              => new sfWidgetFormInput(),
      'link'              => new sfWidgetFormInput(),
      'return_airport_id' => new sfWidgetFormInput(),
      'mission_id'        => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'camp_id'           => new sfValidatorPropelChoice(array('model' => 'Camp', 'column' => 'id', 'required' => false)),
      'passenger_id'      => new sfValidatorPropelChoice(array('model' => 'Passenger', 'column' => 'id', 'required' => false)),
      'airport_id'        => new sfValidatorInteger(),
      'note'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'link'              => new sfValidatorInteger(array('required' => false)),
      'return_airport_id' => new sfValidatorInteger(),
      'mission_id'        => new sfValidatorPropelChoice(array('model' => 'CampPassenger', 'column' => 'mission_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('camp_passenger[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampPassenger';
  }


}