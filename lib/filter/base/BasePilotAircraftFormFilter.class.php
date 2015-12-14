<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * PilotAircraft filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotAircraftFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'   => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => true)),
      'aircraft_id' => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => true)),
      'n_number'    => new sfWidgetFormFilterInput(),
      'own'         => new sfWidgetFormFilterInput(),
      'primary'     => new sfWidgetFormFilterInput(),
      'seats'       => new sfWidgetFormFilterInput(),
      'known_ice'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'member_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Member', 'column' => 'id')),
      'aircraft_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Aircraft', 'column' => 'id')),
      'n_number'    => new sfValidatorPass(array('required' => false)),
      'own'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'primary'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'seats'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'known_ice'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pilot_aircraft_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotAircraft';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'member_id'   => 'ForeignKey',
      'aircraft_id' => 'ForeignKey',
      'n_number'    => 'Text',
      'own'         => 'Number',
      'primary'     => 'Number',
      'seats'       => 'Number',
      'known_ice'   => 'Number',
    );
  }
}
