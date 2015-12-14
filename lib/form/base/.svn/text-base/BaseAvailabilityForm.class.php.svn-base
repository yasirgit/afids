<?php

/**
 * Availability form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAvailabilityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'member_id'            => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'first_date'           => new sfWidgetFormDate(),
      'last_date'            => new sfWidgetFormDate(),
      'not_available'        => new sfWidgetFormInput(),
      'no_weekday'           => new sfWidgetFormInput(),
      'no_night'             => new sfWidgetFormInput(),
      'last_minute'          => new sfWidgetFormInput(),
      'no_weekend'           => new sfWidgetFormInput(),
      'as_mission_mssistant' => new sfWidgetFormInput(),
      'availability_comment' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Availability', 'column' => 'id', 'required' => false)),
      'member_id'            => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'first_date'           => new sfValidatorDate(array('required' => false)),
      'last_date'            => new sfValidatorDate(array('required' => false)),
      'not_available'        => new sfValidatorInteger(array('required' => false)),
      'no_weekday'           => new sfValidatorInteger(array('required' => false)),
      'no_night'             => new sfValidatorInteger(array('required' => false)),
      'last_minute'          => new sfValidatorInteger(array('required' => false)),
      'no_weekend'           => new sfValidatorInteger(array('required' => false)),
      'as_mission_mssistant' => new sfValidatorInteger(array('required' => false)),
      'availability_comment' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Availability', 'column' => array('member_id')))
    );

    $this->widgetSchema->setNameFormat('availability[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Availability';
  }


}
