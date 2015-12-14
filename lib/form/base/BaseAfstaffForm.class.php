<?php

/**
 * Afstaff form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseAfstaffForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'person_id' => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'position'  => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Afstaff', 'column' => 'id', 'required' => false)),
      'person_id' => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'position'  => new sfValidatorString(array('max_length' => 60, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Afstaff', 'column' => array('person_id')))
    );

    $this->widgetSchema->setNameFormat('afstaff[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Afstaff';
  }


}
