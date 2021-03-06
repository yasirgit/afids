<?php

/**
 * Mission form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'external_id'               => new sfWidgetFormInput(),
      'request_id'                => new sfWidgetFormPropelChoice(array('model' => 'MissionRequest', 'add_empty' => true)),
      'itinerary_id'              => new sfWidgetFormPropelChoice(array('model' => 'Itinerary', 'add_empty' => true)),
      'mission_type_id'           => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => false)),
      'mission_date'              => new sfWidgetFormDateTime(),
      'date_requested'            => new sfWidgetFormDateTime(),
      'passenger_id'              => new sfWidgetFormPropelChoice(array('model' => 'Passenger', 'add_empty' => true)),
      'requester_id'              => new sfWidgetFormPropelChoice(array('model' => 'Requester', 'add_empty' => true)),
      'agency_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'other_requester_id'        => new sfWidgetFormPropelChoice(array('model' => 'Requester', 'add_empty' => true)),
      'other_agency_id'           => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'camp_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Camp', 'add_empty' => true)),
      'coordinator_id'            => new sfWidgetFormPropelChoice(array('model' => 'Coordinator', 'add_empty' => true)),
      'appt_date'                 => new sfWidgetFormDateTime(),
      'flight_time'               => new sfWidgetFormInput(),
      'treatment'                 => new sfWidgetFormInput(),
      'comment'                   => new sfWidgetFormInput(),
      'appointment'               => new sfWidgetFormInput(),
      'mission_specific_comments' => new sfWidgetFormInput(),
      'start'                     => new sfWidgetFormInput(),
      'apoint_time'               => new sfWidgetFormInput(),
      'mission_count'             => new sfWidgetFormInput(),
      'b_weight'                  => new sfWidgetFormInput(),
      'b_type'                    => new sfWidgetFormInput(),
      'b_desc'                    => new sfWidgetFormInput(),
      'cancel_mission'            => new sfWidgetFormInput(),
      'copied_mission'            => new sfWidgetFormInput(),
      'mission_companion_list'    => new sfWidgetFormPropelChoiceMany(array('model' => 'Companion')),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorPropelChoice(array('model' => 'Mission', 'column' => 'id', 'required' => false)),
      'external_id'               => new sfValidatorInteger(array('required' => false)),
      'request_id'                => new sfValidatorPropelChoice(array('model' => 'MissionRequest', 'column' => 'id', 'required' => false)),
      'itinerary_id'              => new sfValidatorPropelChoice(array('model' => 'Itinerary', 'column' => 'id', 'required' => false)),
      'mission_type_id'           => new sfValidatorPropelChoice(array('model' => 'MissionType', 'column' => 'id')),
      'mission_date'              => new sfValidatorDateTime(array('required' => false)),
      'date_requested'            => new sfValidatorDateTime(),
      'passenger_id'              => new sfValidatorPropelChoice(array('model' => 'Passenger', 'column' => 'id', 'required' => false)),
      'requester_id'              => new sfValidatorPropelChoice(array('model' => 'Requester', 'column' => 'id', 'required' => false)),
      'agency_id'                 => new sfValidatorPropelChoice(array('model' => 'Agency', 'column' => 'id', 'required' => false)),
      'other_requester_id'        => new sfValidatorPropelChoice(array('model' => 'Requester', 'column' => 'id', 'required' => false)),
      'other_agency_id'           => new sfValidatorPropelChoice(array('model' => 'Agency', 'column' => 'id', 'required' => false)),
      'camp_id'                   => new sfValidatorPropelChoice(array('model' => 'Camp', 'column' => 'id', 'required' => false)),
      'coordinator_id'            => new sfValidatorPropelChoice(array('model' => 'Coordinator', 'column' => 'id', 'required' => false)),
      'appt_date'                 => new sfValidatorDateTime(array('required' => false)),
      'flight_time'               => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'treatment'                 => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'comment'                   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'appointment'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'mission_specific_comments' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'start'                     => new sfValidatorInteger(),
      'apoint_time'               => new sfValidatorString(array('max_length' => 50)),
      'mission_count'             => new sfValidatorInteger(),
      'b_weight'                  => new sfValidatorInteger(),
      'b_type'                    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'b_desc'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cancel_mission'            => new sfValidatorInteger(array('required' => false)),
      'copied_mission'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'mission_companion_list'    => new sfValidatorPropelChoiceMany(array('model' => 'Companion', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Mission', 'column' => array('external_id')))
    );

    $this->widgetSchema->setNameFormat('mission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mission';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['mission_companion_list']))
    {
      $values = array();
      foreach ($this->object->getMissionCompanions() as $obj)
      {
        $values[] = $obj->getCompanionId();
      }

      $this->setDefault('mission_companion_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveMissionCompanionList($con);
  }

  public function saveMissionCompanionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['mission_companion_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(MissionCompanionPeer::MISSION_ID, $this->object->getPrimaryKey());
    MissionCompanionPeer::doDelete($c, $con);

    $values = $this->getValue('mission_companion_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new MissionCompanion();
        $obj->setMissionId($this->object->getPrimaryKey());
        $obj->setCompanionId($value);
        $obj->save();
      }
    }
  }

}
