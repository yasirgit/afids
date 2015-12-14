<?php

/**
 * RpOutreachReport form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpOutreachReportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'externalID'    => new sfWidgetFormInput(),
      'legNumber'     => new sfWidgetFormInput(),
      'mission_date'  => new sfWidgetFormDateTime(),
      'displayDate'   => new sfWidgetFormInput(),
      'cancelled'     => new sfWidgetFormInput(),
      'pilotName'     => new sfWidgetFormInput(),
      'pilotLastName' => new sfWidgetFormInput(),
      'agencyName'    => new sfWidgetFormInput(),
      'passName'      => new sfWidgetFormInput(),
      'passLastName'  => new sfWidgetFormInput(),
      'passAge'       => new sfWidgetFormInput(),
      'illness'       => new sfWidgetFormInput(),
      'facilityName'  => new sfWidgetFormInput(),
      'lodgingName'   => new sfWidgetFormInput(),
      'agencyCity'    => new sfWidgetFormInput(),
      'agencyState'   => new sfWidgetFormInput(),
      'pass_state'    => new sfWidgetFormInput(),
      'agencyID'      => new sfWidgetFormInput(),
      'passengerID'   => new sfWidgetFormInput(),
      'id'            => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'externalID'    => new sfValidatorInteger(array('required' => false)),
      'legNumber'     => new sfValidatorInteger(),
      'mission_date'  => new sfValidatorDateTime(array('required' => false)),
      'displayDate'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'cancelled'     => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'pilotName'     => new sfValidatorString(array('max_length' => 81)),
      'pilotLastName' => new sfValidatorString(array('max_length' => 40)),
      'agencyName'    => new sfValidatorString(array('max_length' => 80)),
      'passName'      => new sfValidatorString(array('max_length' => 43)),
      'passLastName'  => new sfValidatorString(array('max_length' => 40)),
      'passAge'       => new sfValidatorNumber(array('required' => false)),
      'illness'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'facilityName'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'lodgingName'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'agencyCity'    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'agencyState'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'pass_state'    => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'agencyID'      => new sfValidatorInteger(),
      'passengerID'   => new sfValidatorInteger(),
      'id'            => new sfValidatorPropelChoice(array('model' => 'RpOutreachReport', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_outreach_report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpOutreachReport';
  }


}
