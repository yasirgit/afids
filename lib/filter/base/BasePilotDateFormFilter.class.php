<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PilotDate filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotDateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'        => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'available_seats'  => new sfWidgetFormFilterInput(),
      'pilot_request_id' => new sfWidgetFormPropelChoice(array('model' => 'PilotRequest', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'member_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'available_seats'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pilot_request_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PilotRequest', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pilot_date_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotDate';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'member_id'        => 'ForeignKey',
      'date'             => 'Date',
      'available_seats'  => 'Number',
      'pilot_request_id' => 'ForeignKey',
    );
  }
}
