<?php

/**
 * PassengerIllnessCategory form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePassengerIllnessCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'category_description'       => new sfWidgetFormInput(),
      'super_category_description' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'PassengerIllnessCategory', 'column' => 'id', 'required' => false)),
      'category_description'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'super_category_description' => new sfValidatorString(array('max_length' => 30, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('passenger_illness_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PassengerIllnessCategory';
  }


}
