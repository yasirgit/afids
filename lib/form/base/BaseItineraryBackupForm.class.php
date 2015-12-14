<?php

/**
 * ItineraryBackup form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseItineraryBackupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'date_requested'       => new sfWidgetFormDateTime(),
      'mission_request_id'   => new sfWidgetFormInput(),
      'mission_type_id'      => new sfWidgetFormInput(),
      'apoint_time'          => new sfWidgetFormInput(),
      'passenger_id'         => new sfWidgetFormInput(),
      'requester_id'         => new sfWidgetFormInput(),
      'facility'             => new sfWidgetFormInput(),
      'lodging'              => new sfWidgetFormInput(),
      'orgin_city'           => new sfWidgetFormInput(),
      'orgin_state'          => new sfWidgetFormInput(),
      'dest_city'            => new sfWidgetFormInput(),
      'dest_state'           => new sfWidgetFormInput(),
      'waiver_need'          => new sfWidgetFormInput(),
      'need_medical_release' => new sfWidgetFormInput(),
      'comment'              => new sfWidgetFormInput(),
      'agency_id'            => new sfWidgetFormInput(),
      'camp_id'              => new sfWidgetFormInput(),
      'leg_id'               => new sfWidgetFormInput(),
      'point_time'           => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'ItineraryBackup', 'column' => 'id', 'required' => false)),
      'date_requested'       => new sfValidatorDateTime(),
      'mission_request_id'   => new sfValidatorInteger(array('required' => false)),
      'mission_type_id'      => new sfValidatorInteger(array('required' => false)),
      'apoint_time'          => new sfValidatorString(array('max_length' => 50)),
      'passenger_id'         => new sfValidatorInteger(),
      'requester_id'         => new sfValidatorInteger(array('required' => false)),
      'facility'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'lodging'              => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'orgin_city'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'orgin_state'          => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'dest_city'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'dest_state'           => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'waiver_need'          => new sfValidatorInteger(array('required' => false)),
      'need_medical_release' => new sfValidatorInteger(array('required' => false)),
      'comment'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'agency_id'            => new sfValidatorInteger(),
      'camp_id'              => new sfValidatorInteger(array('required' => false)),
      'leg_id'               => new sfValidatorInteger(array('required' => false)),
      'point_time'           => new sfValidatorTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('itinerary_backup[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ItineraryBackup';
  }


}
