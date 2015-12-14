<?php

/**
 * PassengerDest form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerDestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'passenger_id'           => new sfWidgetFormInput(),
      'lodging'                => new sfWidgetFormInput(),
      'facility'               => new sfWidgetFormInput(),
      'facility_city'          => new sfWidgetFormInput(),
      'facility_state'         => new sfWidgetFormInput(),
      'lod_phone'              => new sfWidgetFormInput(),
      'lod_phone_comment'      => new sfWidgetFormInput(),
      'fac_phone'              => new sfWidgetFormInput(),
      'facility_phone_comment' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'PassengerDest', 'column' => 'id', 'required' => false)),
      'passenger_id'           => new sfValidatorInteger(),
      'lodging'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'facility'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'facility_city'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'facility_state'         => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'lod_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'lod_phone_comment'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fac_phone'              => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'facility_phone_comment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_dest[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerDest';
  }


}
