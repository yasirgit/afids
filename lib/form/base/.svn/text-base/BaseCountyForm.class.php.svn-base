<?php

/**
 * County form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCountyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fips_code' => new sfWidgetFormInputHidden(),
      'name'      => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'fips_code' => new sfValidatorPropelChoice(array('model' => 'County', 'column' => 'fips_code', 'required' => false)),
      'name'      => new sfValidatorString(array('max_length' => 25, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('county[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'County';
  }


}
