<?php

/**
 * RpMissionsOriginDestination form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionsOriginDestinationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'externalID'         => new sfWidgetFormInput(),
      'mission_date'       => new sfWidgetFormDateTime(),
      'missionDateDisplay' => new sfWidgetFormInput(),
      'originID'           => new sfWidgetFormInput(),
      'originCity'         => new sfWidgetFormInput(),
      'destID'             => new sfWidgetFormInput(),
      'destCity'           => new sfWidgetFormInput(),
      'legCount'           => new sfWidgetFormInput(),
      'wingID'             => new sfWidgetFormInput(),
      'wingName'           => new sfWidgetFormInput(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'externalID'         => new sfValidatorInteger(array('required' => false)),
      'mission_date'       => new sfValidatorDateTime(array('required' => false)),
      'missionDateDisplay' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'originID'           => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'originCity'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'destID'             => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'destCity'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'legCount'           => new sfValidatorInteger(array('required' => false)),
      'wingID'             => new sfValidatorInteger(array('required' => false)),
      'wingName'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'RpMissionsOriginDestination', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_missions_origin_destination[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionsOriginDestination';
  }


}
