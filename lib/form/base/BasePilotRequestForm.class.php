<?php

/**
 * PilotRequest form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotRequestForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'member_id'                => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'group_camp_id'            => new sfWidgetFormPropelChoice(array('model' => 'Camp', 'add_empty' => true)),
      'home_base'                => new sfWidgetFormInput(),
      'number_seats'             => new sfWidgetFormInput(),
      'total_weight'             => new sfWidgetFormInput(),
      'multiple_pick'            => new sfWidgetFormInput(),
      'leg_id'                   => new sfWidgetFormPropelChoice(array('model' => 'MissionLeg', 'add_empty' => true)),
      'date'                     => new sfWidgetFormInput(),
      'pilot_type'               => new sfWidgetFormInput(),
      'comment'                  => new sfWidgetFormInput(),
      'accepted'                 => new sfWidgetFormInput(),
      'processed'                => new sfWidgetFormInput(),
      'pilot_status'             => new sfWidgetFormInput(),
      'on_hold'                  => new sfWidgetFormInput(),
      'mission_assistant_wanted' => new sfWidgetFormInput(),
      'miss_assis_id'            => new sfWidgetFormInput(),
      'mission_assistant_name'   => new sfWidgetFormInput(),
      'ifr_backup_wanted'        => new sfWidgetFormInput(),
      'created_at'               => new sfWidgetFormDateTime(),
      'number_date_assign'       => new sfWidgetFormInput(),
      'aircraft_id'              => new sfWidgetFormInput(),
      'tail'                     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'PilotRequest', 'column' => 'id', 'required' => false)),
      'member_id'                => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'group_camp_id'            => new sfValidatorPropelChoice(array('model' => 'Camp', 'column' => 'id', 'required' => false)),
      'home_base'                => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'number_seats'             => new sfValidatorInteger(array('required' => false)),
      'total_weight'             => new sfValidatorInteger(array('required' => false)),
      'multiple_pick'            => new sfValidatorInteger(array('required' => false)),
      'leg_id'                   => new sfValidatorPropelChoice(array('model' => 'MissionLeg', 'column' => 'id', 'required' => false)),
      'date'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pilot_type'               => new sfValidatorString(array('max_length' => 17, 'required' => false)),
      'comment'                  => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'accepted'                 => new sfValidatorInteger(),
      'processed'                => new sfValidatorInteger(),
      'pilot_status'             => new sfValidatorInteger(array('required' => false)),
      'on_hold'                  => new sfValidatorInteger(),
      'mission_assistant_wanted' => new sfValidatorInteger(array('required' => false)),
      'miss_assis_id'            => new sfValidatorInteger(),
      'mission_assistant_name'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'ifr_backup_wanted'        => new sfValidatorInteger(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(array('required' => false)),
      'number_date_assign'       => new sfValidatorInteger(array('required' => false)),
      'aircraft_id'              => new sfValidatorInteger(array('required' => false)),
      'tail'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pilot_request[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotRequest';
  }


}
