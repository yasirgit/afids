<?php

/**
 * PilotDate form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasePilotDateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'member_id'        => new sfWidgetFormPropelChoice(array('model' => 'Member', 'add_empty' => false)),
      'date'             => new sfWidgetFormDateTime(),
      'available_seats'  => new sfWidgetFormInput(),
      'pilot_request_id' => new sfWidgetFormPropelChoice(array('model' => 'PilotRequest', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'PilotDate', 'column' => 'id', 'required' => false)),
      'member_id'        => new sfValidatorPropelChoice(array('model' => 'Member', 'column' => 'id')),
      'date'             => new sfValidatorDateTime(array('required' => false)),
      'available_seats'  => new sfValidatorInteger(array('required' => false)),
      'pilot_request_id' => new sfValidatorPropelChoice(array('model' => 'PilotRequest', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pilot_date[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PilotDate';
  }


}
