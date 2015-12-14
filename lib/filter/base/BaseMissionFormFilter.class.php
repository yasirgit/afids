<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Mission filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'external_id'               => new sfWidgetFormFilterInput(),
      'request_id'                => new sfWidgetFormPropelChoice(array('model' => 'MissionRequest', 'add_empty' => true)),
      'itinerary_id'              => new sfWidgetFormPropelChoice(array('model' => 'Itinerary', 'add_empty' => true)),
      'mission_type_id'           => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => true)),
      'mission_date'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'date_requested'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'passenger_id'              => new sfWidgetFormPropelChoice(array('model' => 'Passenger', 'add_empty' => true)),
      'requester_id'              => new sfWidgetFormPropelChoice(array('model' => 'Requester', 'add_empty' => true)),
      'agency_id'                 => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'other_requester_id'        => new sfWidgetFormPropelChoice(array('model' => 'Requester', 'add_empty' => true)),
      'other_agency_id'           => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => true)),
      'camp_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Camp', 'add_empty' => true)),
      'coordinator_id'            => new sfWidgetFormPropelChoice(array('model' => 'Coordinator', 'add_empty' => true)),
      'appt_date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'flight_time'               => new sfWidgetFormFilterInput(),
      'treatment'                 => new sfWidgetFormFilterInput(),
      'comment'                   => new sfWidgetFormFilterInput(),
      'appointment'               => new sfWidgetFormFilterInput(),
      'mission_specific_comments' => new sfWidgetFormFilterInput(),
      'start'                     => new sfWidgetFormFilterInput(),
      'apoint_time'               => new sfWidgetFormFilterInput(),
      'mission_count'             => new sfWidgetFormFilterInput(),
      'b_weight'                  => new sfWidgetFormFilterInput(),
      'b_type'                    => new sfWidgetFormFilterInput(),
      'b_desc'                    => new sfWidgetFormFilterInput(),
      'cancel_mission'            => new sfWidgetFormFilterInput(),
      'copied_mission'            => new sfWidgetFormFilterInput(),
      'mission_companion_list'    => new sfWidgetFormPropelChoice(array('model' => 'Companion', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'external_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'request_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionRequest', 'column' => 'id')),
      'itinerary_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Itinerary', 'column' => 'id')),
      'mission_type_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionType', 'column' => 'id')),
      'mission_date'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_requested'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'passenger_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Passenger', 'column' => 'id')),
      'requester_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Requester', 'column' => 'id')),
      'agency_id'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Agency', 'column' => 'id')),
      'other_requester_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Requester', 'column' => 'id')),
      'other_agency_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Agency', 'column' => 'id')),
      'camp_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Camp', 'column' => 'id')),
      'coordinator_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Coordinator', 'column' => 'id')),
      'appt_date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'flight_time'               => new sfValidatorPass(array('required' => false)),
      'treatment'                 => new sfValidatorPass(array('required' => false)),
      'comment'                   => new sfValidatorPass(array('required' => false)),
      'appointment'               => new sfValidatorPass(array('required' => false)),
      'mission_specific_comments' => new sfValidatorPass(array('required' => false)),
      'start'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'apoint_time'               => new sfValidatorPass(array('required' => false)),
      'mission_count'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'b_weight'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'b_type'                    => new sfValidatorPass(array('required' => false)),
      'b_desc'                    => new sfValidatorPass(array('required' => false)),
      'cancel_mission'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'copied_mission'            => new sfValidatorPass(array('required' => false)),
      'mission_companion_list'    => new sfValidatorPropelChoice(array('model' => 'Companion', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addMissionCompanionListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(MissionCompanionPeer::MISSION_ID, MissionPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(MissionCompanionPeer::COMPANION_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(MissionCompanionPeer::COMPANION_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Mission';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'external_id'               => 'Number',
      'request_id'                => 'ForeignKey',
      'itinerary_id'              => 'ForeignKey',
      'mission_type_id'           => 'ForeignKey',
      'mission_date'              => 'Date',
      'date_requested'            => 'Date',
      'passenger_id'              => 'ForeignKey',
      'requester_id'              => 'ForeignKey',
      'agency_id'                 => 'ForeignKey',
      'other_requester_id'        => 'ForeignKey',
      'other_agency_id'           => 'ForeignKey',
      'camp_id'                   => 'ForeignKey',
      'coordinator_id'            => 'ForeignKey',
      'appt_date'                 => 'Date',
      'flight_time'               => 'Text',
      'treatment'                 => 'Text',
      'comment'                   => 'Text',
      'appointment'               => 'Text',
      'mission_specific_comments' => 'Text',
      'start'                     => 'Number',
      'apoint_time'               => 'Text',
      'mission_count'             => 'Number',
      'b_weight'                  => 'Number',
      'b_type'                    => 'Text',
      'b_desc'                    => 'Text',
      'cancel_mission'            => 'Number',
      'copied_mission'            => 'Text',
      'mission_companion_list'    => 'ManyKey',
    );
  }
}
