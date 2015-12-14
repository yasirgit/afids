<?php

/**
 * RpMissionLegCompanionCount form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionLegCompanionCountForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'mission_id'           => new sfWidgetFormInput(),
      'CompanionCount'       => new sfWidgetFormInput(),
      'CompanionTotalWeight' => new sfWidgetFormInput(),
      'id'                   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'mission_id'           => new sfValidatorInteger(),
      'CompanionCount'       => new sfValidatorInteger(),
      'CompanionTotalWeight' => new sfValidatorNumber(array('required' => false)),
      'id'                   => new sfValidatorPropelChoice(array('model' => 'RpMissionLegCompanionCount', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_leg_companion_count[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionLegCompanionCount';
  }


}
