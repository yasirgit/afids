<?php

/**
 * PilotAircraft form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotAircraftForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'member_id'   => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'aircraft_id' => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => false)),
      'n_number'    => new sfWidgetFormInput(),
      'own'         => new sfWidgetFormInput(),
      'primary'     => new sfWidgetFormInput(),
      'seats'       => new sfWidgetFormInput(),
      'known_ice'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'PilotAircraft', 'column' => 'id', 'required' => false)),
      'member_id'   => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'aircraft_id' => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id')),
      'n_number'    => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'own'         => new sfValidatorInteger(array('required' => false)),
      'primary'     => new sfValidatorInteger(array('required' => false)),
      'seats'       => new sfValidatorInteger(array('required' => false)),
      'known_ice'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pilot_aircraft[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotAircraft';
  }


}
