<?php

/**
 * RpChildrenPassengers form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpChildrenPassengersForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_date'       => new sfWidgetFormDateTime(),
      'displayDate'        => new sfWidgetFormInput(),
      'first_name'         => new sfWidgetFormInput(),
      'initial'            => new sfWidgetFormInput(),
      'last_name'          => new sfWidgetFormInput(),
      'passCity'           => new sfWidgetFormInput(),
      'passState'          => new sfWidgetFormInput(),
      'passCounty'         => new sfWidgetFormInput(),
      'originIdent'        => new sfWidgetFormInput(),
      'originName'         => new sfWidgetFormInput(),
      'originCity'         => new sfWidgetFormInput(),
      'originState'        => new sfWidgetFormInput(),
      'destIdent'          => new sfWidgetFormInput(),
      'destName'           => new sfWidgetFormInput(),
      'destCity'           => new sfWidgetFormInput(),
      'destState'          => new sfWidgetFormInput(),
      'agencyName'         => new sfWidgetFormInput(),
      'facility_name'      => new sfWidgetFormInput(),
      'illness'            => new sfWidgetFormInput(),
      'passAge'            => new sfWidgetFormInput(),
      'wing_id'            => new sfWidgetFormInput(),
      'passengerIllness'   => new sfWidgetFormInput(),
      'passengerIllnessID' => new sfWidgetFormInput(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'mission_date'       => new sfValidatorDateTime(array('required' => false)),
      'displayDate'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'first_name'         => new sfValidatorString(array('max_length' => 40)),
      'initial'            => new sfValidatorString(array('max_length' => 2)),
      'last_name'          => new sfValidatorString(array('max_length' => 40)),
      'passCity'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'passState'          => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'passCounty'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'originIdent'        => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'originName'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'originCity'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'originState'        => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'destIdent'          => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'destName'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'destCity'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'destState'          => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'agencyName'         => new sfValidatorString(array('max_length' => 80)),
      'facility_name'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'illness'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'passAge'            => new sfValidatorInteger(array('required' => false)),
      'wing_id'            => new sfValidatorInteger(array('required' => false)),
      'passengerIllness'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'passengerIllnessID' => new sfValidatorInteger(),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'RpChildrenPassengers', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_children_passengers[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpChildrenPassengers';
  }


}
