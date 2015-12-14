<?php

/**
 * MissionBackup form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionBackupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'external_id'               => new sfWidgetFormInput(),
      'request_id'                => new sfWidgetFormInput(),
      'itinerary_id'              => new sfWidgetFormInput(),
      'mission_type_id'           => new sfWidgetFormInput(),
      'mission_date'              => new sfWidgetFormDateTime(),
      'date_requested'            => new sfWidgetFormDateTime(),
      'passenger_id'              => new sfWidgetFormInput(),
      'requester_id'              => new sfWidgetFormInput(),
      'agency_id'                 => new sfWidgetFormInput(),
      'other_requester_id'        => new sfWidgetFormInput(),
      'other_agency_id'           => new sfWidgetFormInput(),
      'camp_id'                   => new sfWidgetFormInput(),
      'coordinator_id'            => new sfWidgetFormInput(),
      'appt_date'                 => new sfWidgetFormDateTime(),
      'flight_time'               => new sfWidgetFormInput(),
      'treatment'                 => new sfWidgetFormInput(),
      'comment'                   => new sfWidgetFormInput(),
      'appointment'               => new sfWidgetFormInput(),
      'mission_specific_comments' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'MissionBackup', 'column' => 'id', 'required' => false)),
      'external_id'               => new sfValidatorInteger(array('required' => false)),
      'request_id'                => new sfValidatorInteger(array('required' => false)),
      'itinerary_id'              => new sfValidatorInteger(array('required' => false)),
      'mission_type_id'           => new sfValidatorInteger(),
      'mission_date'              => new sfValidatorDateTime(array('required' => false)),
      'date_requested'            => new sfValidatorDateTime(),
      'passenger_id'              => new sfValidatorInteger(array('required' => false)),
      'requester_id'              => new sfValidatorInteger(array('required' => false)),
      'agency_id'                 => new sfValidatorInteger(array('required' => false)),
      'other_requester_id'        => new sfValidatorInteger(array('required' => false)),
      'other_agency_id'           => new sfValidatorInteger(array('required' => false)),
      'camp_id'                   => new sfValidatorInteger(array('required' => false)),
      'coordinator_id'            => new sfValidatorInteger(array('required' => false)),
      'appt_date'                 => new sfValidatorDateTime(array('required' => false)),
      'flight_time'               => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'treatment'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comment'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'appointment'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mission_specific_comments' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'MissionBackup', 'column' => array('external_id')))
    );

    $this->widgetSchema->setNameFormat('mission_backup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionBackup';
  }


}
