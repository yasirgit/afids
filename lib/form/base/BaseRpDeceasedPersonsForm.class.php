<?php

/**
 * RpDeceasedPersons form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpDeceasedPersonsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'personName'      => new sfWidgetFormInput(),
      'memberID'        => new sfWidgetFormInput(),
      'dateOfBirth'     => new sfWidgetFormInput(),
      'deceased_date'   => new sfWidgetFormDate(),
      'deceasedComment' => new sfWidgetFormInput(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'personName'      => new sfValidatorString(array('max_length' => 82)),
      'memberID'        => new sfValidatorInteger(array('required' => false)),
      'dateOfBirth'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'deceased_date'   => new sfValidatorDate(array('required' => false)),
      'deceasedComment' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'              => new sfValidatorPropelChoice(array('model' => 'RpDeceasedPersons', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_deceased_persons[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpDeceasedPersons';
  }


}
