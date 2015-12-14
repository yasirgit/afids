<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionTypeWingStats filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionTypeWingStatsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'month_no'        => new sfWidgetFormFilterInput(),
      'year_no'         => new sfWidgetFormFilterInput(),
      'wing_id'         => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'mission_type_id' => new sfWidgetFormPropelChoice(array('model' => 'MissionType', 'add_empty' => true)),
      'leg_count'       => new sfWidgetFormFilterInput(),
      'total_hours'     => new sfWidgetFormFilterInput(),
      'aircraft_cost'   => new sfWidgetFormFilterInput(),
      'commercial_cost' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'month_no'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year_no'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wing_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Wing', 'column' => 'id')),
      'mission_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'MissionType', 'column' => 'id')),
      'leg_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_hours'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aircraft_cost'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'commercial_cost' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mission_type_wing_stats_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionTypeWingStats';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'month_no'        => 'Number',
      'year_no'         => 'Number',
      'wing_id'         => 'ForeignKey',
      'mission_type_id' => 'ForeignKey',
      'leg_count'       => 'Number',
      'total_hours'     => 'Number',
      'aircraft_cost'   => 'Number',
      'commercial_cost' => 'Number',
    );
  }
}
