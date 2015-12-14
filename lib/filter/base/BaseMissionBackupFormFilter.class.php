<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionBackup filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionBackupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'external_id'               => new sfWidgetFormFilterInput(),
      'request_id'                => new sfWidgetFormFilterInput(),
      'itinerary_id'              => new sfWidgetFormFilterInput(),
      'mission_type_id'           => new sfWidgetFormFilterInput(),
      'mission_date'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'date_requested'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'passenger_id'              => new sfWidgetFormFilterInput(),
      'requester_id'              => new sfWidgetFormFilterInput(),
      'agency_id'                 => new sfWidgetFormFilterInput(),
      'other_requester_id'        => new sfWidgetFormFilterInput(),
      'other_agency_id'           => new sfWidgetFormFilterInput(),
      'camp_id'                   => new sfWidgetFormFilterInput(),
      'coordinator_id'            => new sfWidgetFormFilterInput(),
      'appt_date'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'flight_time'               => new sfWidgetFormFilterInput(),
      'treatment'                 => new sfWidgetFormFilterInput(),
      'comment'                   => new sfWidgetFormFilterInput(),
      'appointment'               => new sfWidgetFormFilterInput(),
      'mission_specific_comments' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'external_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'request_id'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'itinerary_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_type_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_date'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_requested'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'passenger_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requester_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'agency_id'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'other_requester_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'other_agency_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'camp_id'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'coordinator_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'appt_date'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'flight_time'               => new sfValidatorPass(array('required' => false)),
      'treatment'                 => new sfValidatorPass(array('required' => false)),
      'comment'                   => new sfValidatorPass(array('required' => false)),
      'appointment'               => new sfValidatorPass(array('required' => false)),
      'mission_specific_comments' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_backup_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionBackup';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'external_id'               => 'Number',
      'request_id'                => 'Number',
      'itinerary_id'              => 'Number',
      'mission_type_id'           => 'Number',
      'mission_date'              => 'Date',
      'date_requested'            => 'Date',
      'passenger_id'              => 'Number',
      'requester_id'              => 'Number',
      'agency_id'                 => 'Number',
      'other_requester_id'        => 'Number',
      'other_agency_id'           => 'Number',
      'camp_id'                   => 'Number',
      'coordinator_id'            => 'Number',
      'appt_date'                 => 'Date',
      'flight_time'               => 'Text',
      'treatment'                 => 'Text',
      'comment'                   => 'Text',
      'appointment'               => 'Text',
      'mission_specific_comments' => 'Text',
    );
  }
}
