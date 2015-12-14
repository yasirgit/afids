<?php

/**
 * Fbo form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseFboForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'airport_id'      => new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => false)),
      'name'            => new sfWidgetFormInput(),
      'voice_phone'     => new sfWidgetFormInput(),
      'fax_phone'       => new sfWidgetFormInput(),
      'discount_amount' => new sfWidgetFormInput(),
      'fuel_discount'   => new sfWidgetFormInput(),
      'default_fbo'     => new sfWidgetFormInput(),
      'address'         => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Fbo', 'column' => 'id', 'required' => false)),
      'airport_id'      => new sfValidatorPropelChoice(array('model' => 'Airport', 'column' => 'id')),
      'name'            => new sfValidatorString(array('max_length' => 40)),
      'voice_phone'     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_phone'       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'discount_amount' => new sfValidatorInteger(),
      'fuel_discount'   => new sfValidatorNumber(),
      'default_fbo'     => new sfValidatorInteger(array('required' => false)),
      'address'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fbo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fbo';
  }


}
