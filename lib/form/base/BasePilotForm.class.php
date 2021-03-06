<?php

/**
 * Pilot form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'member_id'              => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'primary_airport_id'     => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'secondary_home_bases'   => new sfWidgetFormInput(),
      'total_hours'            => new sfWidgetFormInput(),
      'license_type'           => new sfWidgetFormInput(),
      'ifr'                    => new sfWidgetFormInput(),
      'multi_engine'           => new sfWidgetFormInput(),
      'se_instructor'          => new sfWidgetFormInput(),
      'me_instructor'          => new sfWidgetFormInput(),
      'other_ratings'          => new sfWidgetFormInput(),
      'insurance_received'     => new sfWidgetFormDateTime(),
      'oriented_member_id'     => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'oriented_date'          => new sfWidgetFormDateTime(),
      'mop_active_status'      => new sfWidgetFormInput(),
      'mop_oriented_member_id' => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'mop_oriented_date'      => new sfWidgetFormDateTime(),
      'mop_regions_served'     => new sfWidgetFormInput(),
      'mop_served_by'          => new sfWidgetFormInput(),
      'mop_qualifications'     => new sfWidgetFormInput(),
      'hseats'                 => new sfWidgetFormInput(),
      'transplant'             => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'member_id'              => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'primary_airport_id'     => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id', 'required' => false)),
      'secondary_home_bases'   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'total_hours'            => new sfValidatorInteger(array('required' => false)),
      'license_type'           => new sfValidatorString(array('max_length' => 10)),
      'ifr'                    => new sfValidatorInteger(),
      'multi_engine'           => new sfValidatorInteger(),
      'se_instructor'          => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'me_instructor'          => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'other_ratings'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'insurance_received'     => new sfValidatorDateTime(array('required' => false)),
      'oriented_member_id'     => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'oriented_date'          => new sfValidatorDateTime(array('required' => false)),
      'mop_active_status'      => new sfValidatorInteger(),
      'mop_oriented_member_id' => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'mop_oriented_date'      => new sfValidatorDateTime(array('required' => false)),
      'mop_regions_served'     => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'mop_served_by'          => new sfValidatorString(array('max_length' => 500)),
      'mop_qualifications'     => new sfValidatorString(array('max_length' => 125, 'required' => false)),
      'hseats'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'transplant'             => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pilot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pilot';
  }


}
