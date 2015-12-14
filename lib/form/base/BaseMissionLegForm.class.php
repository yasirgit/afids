<?php

/**
 * MissionLeg form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionLegForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'mission_id'           => new sfWidgetFormPropelChoice(array('model' => 'Mission', 'add_empty' => false)),
      'leg_number'           => new sfWidgetFormInput(),
      'from_airport_id'      => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'to_airport_id'        => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => true)),
      'reverse_from'         => new sfWidgetFormInput(),
      'pass_on_board'        => new sfWidgetFormInput(),
      'baggage_weight'       => new sfWidgetFormInput(),
      'baggage_desc'         => new sfWidgetFormInput(),
      'coordinator_id'       => new sfWidgetFormPropelChoice(array('model' => 'Coordinator', 'add_empty' => true)),
      'public_c_note'        => new sfWidgetFormInput(),
      'private_c_note'       => new sfWidgetFormInput(),
      'copilot_wanted'       => new sfWidgetFormInput(),
      'pilot_id'             => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'copilot_id'           => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'miss_assis_id'        => new sfWidgetFormInput(),
      'backup_pilot_id'      => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'backup_copilot_id'    => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'backup_miss_assis_id' => new sfWidgetFormInput(),
      'cancelled'            => new sfWidgetFormInput(),
      'cancel_comment'       => new sfWidgetFormInput(),
      'waiver_received'      => new sfWidgetFormDateTime(),
      'web_coordinated'      => new sfWidgetFormInput(),
      'mission_report_id'    => new sfWidgetFormPropelChoice(array('model' => 'MissionReport', 'add_empty' => true)),
      'pilot_aircraft_id'    => new sfWidgetFormPropelChoice(array('model' => 'PilotAircraft', 'add_empty' => true)),
      'fbo_id'               => new sfWidgetFormPropelChoice(array('model' => 'Fbo', 'add_empty' => true)),
      'fbo_address_new'      => new sfWidgetFormInput(),
      'fbo_dest_id'          => new sfWidgetFormInput(),
      'share_afa_org_id'     => new sfWidgetFormInput(),
      'transportation'       => new sfWidgetFormInput(),
      'ground_origin'        => new sfWidgetFormInput(),
      'ground_destination'   => new sfWidgetFormInput(),
      'flight_time'          => new sfWidgetFormTime(),
      'airline_id'           => new sfWidgetFormInput(),
      'fund_id'              => new sfWidgetFormInput(),
      'confirm_code'         => new sfWidgetFormInput(),
      'flight_cost'          => new sfWidgetFormInput(),
      'comm_origin'          => new sfWidgetFormInput(),
      'comm_dest'            => new sfWidgetFormInput(),
      'flight_number'        => new sfWidgetFormInput(),
      'departure'            => new sfWidgetFormTime(),
      'arrival'              => new sfWidgetFormTime(),
      'prefix'               => new sfWidgetFormInput(),
      'cancel_mission_leg'   => new sfWidgetFormInput(),
      'copied_mission_leg'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'MissionLeg', 'column' => 'id', 'required' => false)),
      'mission_id'           => new sfValidatorPropelChoice(array('model' => 'Mission', 'column' => 'id')),
      'leg_number'           => new sfValidatorInteger(),
      'from_airport_id'      => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id', 'required' => false)),
      'to_airport_id'        => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id', 'required' => false)),
      'reverse_from'         => new sfValidatorInteger(array('required' => false)),
      'pass_on_board'        => new sfValidatorInteger(),
      'baggage_weight'       => new sfValidatorInteger(array('required' => false)),
      'baggage_desc'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'coordinator_id'       => new sfValidatorPropelChoice(array('model' => 'Coordinator', 'column' => 'id', 'required' => false)),
      'public_c_note'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'private_c_note'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'copilot_wanted'       => new sfValidatorInteger(array('required' => false)),
      'pilot_id'             => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'copilot_id'           => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id', 'required' => false)),
      'miss_assis_id'        => new sfValidatorInteger(array('required' => false)),
      'backup_pilot_id'      => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'backup_copilot_id'    => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id', 'required' => false)),
      'backup_miss_assis_id' => new sfValidatorInteger(array('required' => false)),
      'cancelled'            => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'cancel_comment'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'waiver_received'      => new sfValidatorDateTime(array('required' => false)),
      'web_coordinated'      => new sfValidatorInteger(),
      'mission_report_id'    => new sfValidatorPropelChoice(array('model' => 'MissionReport', 'column' => 'id', 'required' => false)),
      'pilot_aircraft_id'    => new sfValidatorPropelChoice(array('model' => 'PilotAircraft', 'column' => 'id', 'required' => false)),
      'fbo_id'               => new sfValidatorPropelChoice(array('model' => 'Fbo', 'column' => 'id', 'required' => false)),
      'fbo_address_new'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'fbo_dest_id'          => new sfValidatorInteger(array('required' => false)),
      'share_afa_org_id'     => new sfValidatorInteger(array('required' => false)),
      'transportation'       => new sfValidatorString(array('max_length' => 20)),
      'ground_origin'        => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ground_destination'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'flight_time'          => new sfValidatorTime(array('required' => false)),
      'airline_id'           => new sfValidatorInteger(array('required' => false)),
      'fund_id'              => new sfValidatorInteger(array('required' => false)),
      'confirm_code'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'flight_cost'          => new sfValidatorInteger(array('required' => false)),
      'comm_origin'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'comm_dest'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'flight_number'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'departure'            => new sfValidatorTime(array('required' => false)),
      'arrival'              => new sfValidatorTime(array('required' => false)),
      'prefix'               => new sfValidatorString(array('max_length' => 10)),
      'cancel_mission_leg'   => new sfValidatorInteger(),
      'copied_mission_leg'   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'MissionLeg', 'column' => array('mission_id', 'leg_number')))
    );

    $this->widgetSchema->setNameFormat('mission_leg[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionLeg';
  }


}
