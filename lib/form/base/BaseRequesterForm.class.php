<?php

/**
 * Requester form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRequesterForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'person_id'   => new sfWidgetFormPropelChoice(array('model' => 'Person', 'add_empty' => false)),
      'agency_id'   => new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => false)),
      'title'       => new sfWidgetFormInput(),
      'how_find_af' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Requester', 'column' => 'id', 'required' => false)),
      'person_id'   => new sfValidatorPropelChoice(array('model' => 'Person', 'column' => 'id')),
      'agency_id'   => new sfValidatorPropelChoice(array('model' => 'Agency', 'column' => 'id')),
      'title'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'how_find_af' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requester[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requester';
  }


}
