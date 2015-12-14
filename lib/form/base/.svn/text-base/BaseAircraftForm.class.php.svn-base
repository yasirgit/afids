<?php

/**
 * Aircraft form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAircraftForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'make'        => new sfWidgetFormInput(),
      'model'       => new sfWidgetFormInput(),
      'name'        => new sfWidgetFormInput(),
      'tail'        => new sfWidgetFormInput(),
      'faa'         => new sfWidgetFormInput(),
      'engines'     => new sfWidgetFormInput(),
      'def_seats'   => new sfWidgetFormInput(),
      'speed'       => new sfWidgetFormInput(),
      'pressurized' => new sfWidgetFormInput(),
      'cost'        => new sfWidgetFormInput(),
      'range'       => new sfWidgetFormInput(),
      'ac_load'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'make'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'model'       => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'tail'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'faa'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'engines'     => new sfValidatorInteger(array('required' => false)),
      'def_seats'   => new sfValidatorInteger(array('required' => false)),
      'speed'       => new sfValidatorInteger(array('required' => false)),
      'pressurized' => new sfValidatorInteger(),
      'cost'        => new sfValidatorInteger(),
      'range'       => new sfValidatorInteger(array('required' => false)),
      'ac_load'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('aircraft[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Aircraft';
  }


}
