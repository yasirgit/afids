<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Availability filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAvailabilityFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'            => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'first_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'last_date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'not_available'        => new sfWidgetFormFilterInput(),
      'no_weekday'           => new sfWidgetFormFilterInput(),
      'no_night'             => new sfWidgetFormFilterInput(),
      'last_minute'          => new sfWidgetFormFilterInput(),
      'no_weekend'           => new sfWidgetFormFilterInput(),
      'as_mission_mssistant' => new sfWidgetFormFilterInput(),
      'availability_comment' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'first_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'last_date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'not_available'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'no_weekday'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'no_night'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_minute'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'no_weekend'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'as_mission_mssistant' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'availability_comment' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('availability_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Availability';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'member_id'            => 'ForeignKey',
      'first_date'           => 'Date',
      'last_date'            => 'Date',
      'not_available'        => 'Number',
      'no_weekday'           => 'Number',
      'no_night'             => 'Number',
      'last_minute'          => 'Number',
      'no_weekend'           => 'Number',
      'as_mission_mssistant' => 'Number',
      'availability_comment' => 'Text',
    );
  }
}
