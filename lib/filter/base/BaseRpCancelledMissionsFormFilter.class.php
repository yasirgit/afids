<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpCancelledMissions filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpCancelledMissionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'year'        => new sfWidgetFormFilterInput(),
      'month'       => new sfWidgetFormFilterInput(),
      'cancelled'   => new sfWidgetFormFilterInput(),
      'mission_leg' => new sfWidgetFormFilterInput(),
      'coordinated' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'year'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'month'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cancelled'   => new sfValidatorPass(array('required' => false)),
      'mission_leg' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'coordinated' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_cancelled_missions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpCancelledMissions';
  }

  public function getFields()
  {
    return array(
      'year'        => 'Number',
      'month'       => 'Number',
      'cancelled'   => 'Text',
      'mission_leg' => 'Number',
      'coordinated' => 'Number',
      'id'          => 'Number',
    );
  }
}
