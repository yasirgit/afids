<?php

/**
 * PersonalFlight form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonalFlightForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'pilot_id'            => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => false)),
      'name'                => new sfWidgetFormInput(),
      'departure_date'      => new sfWidgetFormDate(),
      'return_date'         => new sfWidgetFormDate(),
      'origin_city'         => new sfWidgetFormInput(),
      'origin_zipcode'      => new sfWidgetFormInput(),
      'destination_city'    => new sfWidgetFormInput(),
      'destination_zipcode' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'PersonalFlight', 'column' => 'id', 'required' => false)),
      'pilot_id'            => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id')),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'departure_date'      => new sfValidatorDate(array('required' => false)),
      'return_date'         => new sfValidatorDate(array('required' => false)),
      'origin_city'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'origin_zipcode'      => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'destination_city'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'destination_zipcode' => new sfValidatorString(array('max_length' => 12, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personal_flight[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonalFlight';
  }


}
