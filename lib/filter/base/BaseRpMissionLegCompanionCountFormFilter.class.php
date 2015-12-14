<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionLegCompanionCount filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionLegCompanionCountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_id'           => new sfWidgetFormFilterInput(),
      'CompanionCount'       => new sfWidgetFormFilterInput(),
      'CompanionTotalWeight' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mission_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'CompanionCount'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'CompanionTotalWeight' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_leg_companion_count_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionLegCompanionCount';
  }

  public function getFields()
  {
    return array(
      'mission_id'           => 'Number',
      'CompanionCount'       => 'Number',
      'CompanionTotalWeight' => 'Number',
      'id'                   => 'Number',
    );
  }
}
