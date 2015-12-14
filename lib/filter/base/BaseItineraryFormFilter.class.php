<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Itinerary filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseItineraryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'date_requested'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'mission_request_id'   => new sfWidgetFormPropelChoice(array('model' => 'MissionRequest', 'add_empty' => true)),
      'mission_type_id'      => new sfWidgetFormFilterInput(),
      'apoint_time'          => new sfWidgetFormFilterInput(),
      'passenger_id'         => new sfWidgetFormFilterInput(),
      'requester_id'         => new sfWidgetFormFilterInput(),
      'facility'             => new sfWidgetFormFilterInput(),
      'lodging'              => new sfWidgetFormFilterInput(),
      'orgin_city'           => new sfWidgetFormFilterInput(),
      'orgin_state'          => new sfWidgetFormFilterInput(),
      'dest_city'            => new sfWidgetFormFilterInput(),
      'dest_state'           => new sfWidgetFormFilterInput(),
      'waiver_need'          => new sfWidgetFormFilterInput(),
      'need_medical_release' => new sfWidgetFormFilterInput(),
      'comment'              => new sfWidgetFormFilterInput(),
      'agency_id'            => new sfWidgetFormFilterInput(),
      'camp_id'              => new sfWidgetFormFilterInput(),
      'leg_id'               => new sfWidgetFormFilterInput(),
      'point_time'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'timetype'             => new sfWidgetFormFilterInput(),
      'cancel_itinerary'     => new sfWidgetFormFilterInput(),
      'copied_itinerary'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'date_requested'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mission_request_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionRequest', 'column' => 'id')),
      'mission_type_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'apoint_time'          => new sfValidatorPass(array('required' => false)),
      'passenger_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'requester_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'facility'             => new sfValidatorPass(array('required' => false)),
      'lodging'              => new sfValidatorPass(array('required' => false)),
      'orgin_city'           => new sfValidatorPass(array('required' => false)),
      'orgin_state'          => new sfValidatorPass(array('required' => false)),
      'dest_city'            => new sfValidatorPass(array('required' => false)),
      'dest_state'           => new sfValidatorPass(array('required' => false)),
      'waiver_need'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'need_medical_release' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'              => new sfValidatorPass(array('required' => false)),
      'agency_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'camp_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'leg_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'point_time'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'timetype'             => new sfValidatorPass(array('required' => false)),
      'cancel_itinerary'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'copied_itinerary'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('itinerary_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Itinerary';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'date_requested'       => 'Date',
      'mission_request_id'   => 'ForeignKey',
      'mission_type_id'      => 'Number',
      'apoint_time'          => 'Text',
      'passenger_id'         => 'Number',
      'requester_id'         => 'Number',
      'facility'             => 'Text',
      'lodging'              => 'Text',
      'orgin_city'           => 'Text',
      'orgin_state'          => 'Text',
      'dest_city'            => 'Text',
      'dest_state'           => 'Text',
      'waiver_need'          => 'Number',
      'need_medical_release' => 'Number',
      'comment'              => 'Text',
      'agency_id'            => 'Number',
      'camp_id'              => 'Number',
      'leg_id'               => 'Number',
      'point_time'           => 'Date',
      'timetype'             => 'Text',
      'cancel_itinerary'     => 'Number',
      'copied_itinerary'     => 'Text',
    );
  }
}
