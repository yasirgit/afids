<?php

/**
 * RpMissionsByMember form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionsByMemberForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'external_id'          => new sfWidgetFormInput(),
      'pilotName'            => new sfWidgetFormInput(),
      'mission_date'         => new sfWidgetFormDateTime(),
      'legCount'             => new sfWidgetFormInput(),
      'hobbsTime'            => new sfWidgetFormInput(),
      'commercialTicketCost' => new sfWidgetFormInput(),
      'id'                   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'external_id'          => new sfValidatorInteger(array('required' => false)),
      'pilotName'            => new sfValidatorString(array('max_length' => 82, 'required' => false)),
      'mission_date'         => new sfValidatorDateTime(array('required' => false)),
      'legCount'             => new sfValidatorInteger(array('required' => false)),
      'hobbsTime'            => new sfValidatorNumber(array('required' => false)),
      'commercialTicketCost' => new sfValidatorNumber(array('required' => false)),
      'id'                   => new sfValidatorPropelChoice(array('model' => 'RpMissionsByMember', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_missions_by_member[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionsByMember';
  }


}
