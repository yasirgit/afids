<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionTypeWingStats filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionTypeWingStatsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monthNo'        => new sfWidgetFormFilterInput(),
      'yearNo'         => new sfWidgetFormFilterInput(),
      'missionTypeID'  => new sfWidgetFormFilterInput(),
      'wingID'         => new sfWidgetFormFilterInput(),
      'legCount'       => new sfWidgetFormFilterInput(),
      'totalHours'     => new sfWidgetFormFilterInput(),
      'aircraftCost'   => new sfWidgetFormFilterInput(),
      'commercialCost' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'monthNo'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'yearNo'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missionTypeID'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingID'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'legCount'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalHours'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aircraftCost'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'commercialCost' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_type_wing_stats_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionTypeWingStats';
  }

  public function getFields()
  {
    return array(
      'monthNo'        => 'Number',
      'yearNo'         => 'Number',
      'missionTypeID'  => 'Number',
      'wingID'         => 'Number',
      'legCount'       => 'Number',
      'totalHours'     => 'Number',
      'aircraftCost'   => 'Number',
      'commercialCost' => 'Number',
      'id'             => 'Number',
    );
  }
}
