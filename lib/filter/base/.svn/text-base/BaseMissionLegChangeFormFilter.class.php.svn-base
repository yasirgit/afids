<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionLegChange filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionLegChangeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'leg_id'        => new sfWidgetFormFilterInput(),
      'change_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'cancelled'     => new sfWidgetFormFilterInput(),
      'pilot_id'      => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'cancelled_to'  => new sfWidgetFormFilterInput(),
      'pilot_id_new'  => new sfWidgetFormFilterInput(),
      'change_by'     => new sfWidgetFormFilterInput(),
      'event_type_id' => new sfWidgetFormFilterInput(),
      'event_desc'    => new sfWidgetFormFilterInput(),
      'person_id'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'leg_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'change_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cancelled'     => new sfValidatorPass(array('required' => false)),
      'pilot_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pilot', 'column' => 'id')),
      'cancelled_to'  => new sfValidatorPass(array('required' => false)),
      'pilot_id_new'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'change_by'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_type_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'event_desc'    => new sfValidatorPass(array('required' => false)),
      'person_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mission_leg_change_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionLegChange';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'leg_id'        => 'Number',
      'change_date'   => 'Date',
      'cancelled'     => 'Text',
      'pilot_id'      => 'ForeignKey',
      'cancelled_to'  => 'Text',
      'pilot_id_new'  => 'Number',
      'change_by'     => 'Number',
      'event_type_id' => 'Number',
      'event_desc'    => 'Text',
      'person_id'     => 'Number',
    );
  }
}
