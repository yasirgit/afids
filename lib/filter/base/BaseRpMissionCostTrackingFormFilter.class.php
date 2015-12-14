<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionCostTracking filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionCostTrackingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'missionDateDisplay'     => new sfWidgetFormFilterInput(),
      'external_id'            => new sfWidgetFormFilterInput(),
      'pilot_id'               => new sfWidgetFormFilterInput(),
      'pilotName'              => new sfWidgetFormFilterInput(),
      'commercial_ticket_cost' => new sfWidgetFormFilterInput(),
      'yearNo'                 => new sfWidgetFormFilterInput(),
      'approved'               => new sfWidgetFormFilterInput(),
      'passengerName'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mission_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'missionDateDisplay'     => new sfValidatorPass(array('required' => false)),
      'external_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pilot_id'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pilotName'              => new sfValidatorPass(array('required' => false)),
      'commercial_ticket_cost' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'yearNo'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'approved'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passengerName'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_cost_tracking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionCostTracking';
  }

  public function getFields()
  {
    return array(
      'mission_date'           => 'Date',
      'missionDateDisplay'     => 'Text',
      'external_id'            => 'Number',
      'pilot_id'               => 'Number',
      'pilotName'              => 'Text',
      'id'                     => 'Number',
      'commercial_ticket_cost' => 'Number',
      'yearNo'                 => 'Number',
      'approved'               => 'Number',
      'passengerName'          => 'Text',
    );
  }
}
