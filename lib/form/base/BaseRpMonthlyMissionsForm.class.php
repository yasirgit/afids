<?php

/**
 * RpMonthlyMissions form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMonthlyMissionsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'missionDateDisplay'   => new sfWidgetFormInput(),
      'mission_date'         => new sfWidgetFormDateTime(),
      'first_name'           => new sfWidgetFormInput(),
      'pilotLastName'        => new sfWidgetFormInput(),
      'pilotName'            => new sfWidgetFormInput(),
      'legCount'             => new sfWidgetFormInput(),
      'hours'                => new sfWidgetFormInput(),
      'legCost'              => new sfWidgetFormInput(),
      'pilotCost'            => new sfWidgetFormInput(),
      'commercialTicketCost' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'RpMonthlyMissions', 'column' => 'id', 'required' => false)),
      'missionDateDisplay'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'mission_date'         => new sfValidatorDateTime(array('required' => false)),
      'first_name'           => new sfValidatorString(array('max_length' => 40)),
      'pilotLastName'        => new sfValidatorString(array('max_length' => 40)),
      'pilotName'            => new sfValidatorString(array('max_length' => 81)),
      'legCount'             => new sfValidatorInteger(),
      'hours'                => new sfValidatorNumber(array('required' => false)),
      'legCost'              => new sfValidatorNumber(array('required' => false)),
      'pilotCost'            => new sfValidatorNumber(array('required' => false)),
      'commercialTicketCost' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_monthly_missions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMonthlyMissions';
  }


}
