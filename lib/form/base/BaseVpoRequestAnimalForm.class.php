<?php

/**
 * VpoRequestAnimal form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseVpoRequestAnimalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'request_id'        => new sfWidgetFormPropelChoice(array('model' => 'VpoRequest', 'add_empty' => true)),
      'animal_name'       => new sfWidgetFormInput(),
      'animal_type'       => new sfWidgetFormInput(),
      'weight'            => new sfWidgetFormInput(),
      'harness'           => new sfWidgetFormInput(),
      'kennel_height'     => new sfWidgetFormInput(),
      'kennel_width'      => new sfWidgetFormInput(),
      'kennel_length'     => new sfWidgetFormInput(),
      'handler_traveling' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'VpoRequestAnimal', 'column' => 'id', 'required' => false)),
      'request_id'        => new sfValidatorPropelChoice(array('model' => 'VpoRequest', 'column' => 'id', 'required' => false)),
      'animal_name'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'animal_type'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'weight'            => new sfValidatorInteger(array('required' => false)),
      'harness'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'kennel_height'     => new sfValidatorInteger(array('required' => false)),
      'kennel_width'      => new sfValidatorInteger(array('required' => false)),
      'kennel_length'     => new sfValidatorInteger(array('required' => false)),
      'handler_traveling' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vpo_request_animal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VpoRequestAnimal';
  }


}
