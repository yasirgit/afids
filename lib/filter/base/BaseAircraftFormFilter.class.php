<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Aircraft filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAircraftFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'make'        => new sfWidgetFormFilterInput(),
      'model'       => new sfWidgetFormFilterInput(),
      'name'        => new sfWidgetFormFilterInput(),
      'tail'        => new sfWidgetFormFilterInput(),
      'faa'         => new sfWidgetFormFilterInput(),
      'engines'     => new sfWidgetFormFilterInput(),
      'def_seats'   => new sfWidgetFormFilterInput(),
      'speed'       => new sfWidgetFormFilterInput(),
      'pressurized' => new sfWidgetFormFilterInput(),
      'cost'        => new sfWidgetFormFilterInput(),
      'range'       => new sfWidgetFormFilterInput(),
      'ac_load'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'make'        => new sfValidatorPass(array('required' => false)),
      'model'       => new sfValidatorPass(array('required' => false)),
      'name'        => new sfValidatorPass(array('required' => false)),
      'tail'        => new sfValidatorPass(array('required' => false)),
      'faa'         => new sfValidatorPass(array('required' => false)),
      'engines'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'def_seats'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'speed'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pressurized' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cost'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'range'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ac_load'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('aircraft_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Aircraft';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'make'        => 'Text',
      'model'       => 'Text',
      'name'        => 'Text',
      'tail'        => 'Text',
      'faa'         => 'Text',
      'engines'     => 'Number',
      'def_seats'   => 'Number',
      'speed'       => 'Number',
      'pressurized' => 'Number',
      'cost'        => 'Number',
      'range'       => 'Number',
      'ac_load'     => 'Number',
    );
  }
}
