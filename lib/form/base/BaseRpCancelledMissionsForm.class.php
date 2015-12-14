<?php

/**
 * RpCancelledMissions form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpCancelledMissionsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'year'        => new sfWidgetFormInput(),
      'month'       => new sfWidgetFormInput(),
      'cancelled'   => new sfWidgetFormInput(),
      'mission_leg' => new sfWidgetFormInput(),
      'coordinated' => new sfWidgetFormInput(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'year'        => new sfValidatorInteger(array('required' => false)),
      'month'       => new sfValidatorInteger(array('required' => false)),
      'cancelled'   => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'mission_leg' => new sfValidatorInteger(),
      'coordinated' => new sfValidatorInteger(),
      'id'          => new sfValidatorPropelChoice(array('model' => 'RpCancelledMissions', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_cancelled_missions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpCancelledMissions';
  }


}
