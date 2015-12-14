<?php

/**
 * MissionLegChange form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionLegChangeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'leg_id'        => new sfWidgetFormInput(),
      'change_date'   => new sfWidgetFormDateTime(),
      'cancelled'     => new sfWidgetFormInput(),
      'pilot_id'      => new sfWidgetFormPropelChoice(array('model' => 'Pilot', 'add_empty' => true)),
      'cancelled_to'  => new sfWidgetFormInput(),
      'pilot_id_new'  => new sfWidgetFormInput(),
      'change_by'     => new sfWidgetFormInput(),
      'event_type_id' => new sfWidgetFormInput(),
      'event_desc'    => new sfWidgetFormInput(),
      'person_id'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'MissionLegChange', 'column' => 'id', 'required' => false)),
      'leg_id'        => new sfValidatorInteger(array('required' => false)),
      'change_date'   => new sfValidatorDateTime(array('required' => false)),
      'cancelled'     => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'pilot_id'      => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id', 'required' => false)),
      'cancelled_to'  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'pilot_id_new'  => new sfValidatorInteger(array('required' => false)),
      'change_by'     => new sfValidatorInteger(array('required' => false)),
      'event_type_id' => new sfValidatorInteger(array('required' => false)),
      'event_desc'    => new sfValidatorString(array('max_length' => 175, 'required' => false)),
      'person_id'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_leg_change[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionLegChange';
  }


}
