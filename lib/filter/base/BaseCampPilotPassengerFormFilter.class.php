<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CampPilotPassenger filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampPilotPassengerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'    => new sfWidgetFormFilterInput(),
      'passenger_id' => new sfWidgetFormFilterInput(),
      'flight_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'member_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passenger_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'flight_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('camp_pilot_passenger_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampPilotPassenger';
  }

  public function getFields()
  {
    return array(
      'camp_id'      => 'Number',
      'member_id'    => 'Number',
      'passenger_id' => 'Number',
      'flight_date'  => 'Date',
    );
  }
}
