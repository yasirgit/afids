<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MemberWingStats filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMemberWingStatsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'month'         => new sfWidgetFormFilterInput(),
      'year'          => new sfWidgetFormFilterInput(),
      'wing_id'       => new sfWidgetFormPropelChoice(array('model' => 'Wing', 'add_empty' => true)),
      'flight_status' => new sfWidgetFormFilterInput(),
      'member_count'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'month'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'year'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wing_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Wing', 'column' => 'id')),
      'flight_status' => new sfValidatorPass(array('required' => false)),
      'member_count'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('member_wing_stats_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberWingStats';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'month'         => 'Number',
      'year'          => 'Number',
      'wing_id'       => 'ForeignKey',
      'flight_status' => 'Text',
      'member_count'  => 'Number',
    );
  }
}
