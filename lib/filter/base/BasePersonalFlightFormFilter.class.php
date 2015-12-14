<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PersonalFlight filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePersonalFlightFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pilot_id'            => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'name'                => new sfWidgetFormFilterInput(),
      'departure_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'return_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'origin_city'         => new sfWidgetFormFilterInput(),
      'origin_zipcode'      => new sfWidgetFormFilterInput(),
      'destination_city'    => new sfWidgetFormFilterInput(),
      'destination_zipcode' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'pilot_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pilot', 'column' => 'id')),
      'name'                => new sfValidatorPass(array('required' => false)),
      'departure_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'return_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'origin_city'         => new sfValidatorPass(array('required' => false)),
      'origin_zipcode'      => new sfValidatorPass(array('required' => false)),
      'destination_city'    => new sfValidatorPass(array('required' => false)),
      'destination_zipcode' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personal_flight_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PersonalFlight';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'pilot_id'            => 'ForeignKey',
      'name'                => 'Text',
      'departure_date'      => 'Date',
      'return_date'         => 'Date',
      'origin_city'         => 'Text',
      'origin_zipcode'      => 'Text',
      'destination_city'    => 'Text',
      'destination_zipcode' => 'Text',
    );
  }
}
