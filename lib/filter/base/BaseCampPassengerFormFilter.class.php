<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * CampPassenger filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCampPassengerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'airport_id'        => new sfWidgetFormFilterInput(),
      'note'              => new sfWidgetFormFilterInput(),
      'link'              => new sfWidgetFormFilterInput(),
      'return_airport_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'airport_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'note'              => new sfValidatorPass(array('required' => false)),
      'link'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'return_airport_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('camp_passenger_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampPassenger';
  }

  public function getFields()
  {
    return array(
      'camp_id'           => 'ForeignKey',
      'passenger_id'      => 'ForeignKey',
      'airport_id'        => 'Number',
      'note'              => 'Text',
      'link'              => 'Number',
      'return_airport_id' => 'Number',
      'mission_id'        => 'Number',
    );
  }
}
