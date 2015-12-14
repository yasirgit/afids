<?php

/**
 * EventWings form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEventWingsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'event_id' => new sfWidgetFormInputHidden(),
      'wing_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'event_id' => new sfValidatorPropelChoice(array('model' => 'Event', 'column' => 'id', 'required' => false)),
      'wing_id'  => new sfValidatorPropelChoice(array('model' => 'Wing', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event_wings[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventWings';
  }


}
