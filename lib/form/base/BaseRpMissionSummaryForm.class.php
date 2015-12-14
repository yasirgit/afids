<?php

/**
 * RpMissionSummary form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionSummaryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'passName'           => new sfWidgetFormInput(),
      'passLastName'       => new sfWidgetFormInput(),
      'weight'             => new sfWidgetFormInput(),
      'passDayPhone'       => new sfWidgetFormInput(),
      'passDayPhoneSearch' => new sfWidgetFormInput(),
      'passEvePhone'       => new sfWidgetFormInput(),
      'passMobilePhone'    => new sfWidgetFormInput(),
      'passPagerPhone'     => new sfWidgetFormInput(),
      'passOtherPhone'     => new sfWidgetFormInput(),
      'passFaxPhone'       => new sfWidgetFormInput(),
      'passDayComment'     => new sfWidgetFormInput(),
      'passEveComment'     => new sfWidgetFormInput(),
      'passMobileComment'  => new sfWidgetFormInput(),
      'passPagerComment'   => new sfWidgetFormInput(),
      'passOtherComment'   => new sfWidgetFormInput(),
      'passFaxComment'     => new sfWidgetFormInput(),
      'reqName'            => new sfWidgetFormInput(),
      'reqLastName'        => new sfWidgetFormInput(),
      'reqDayPhone'        => new sfWidgetFormInput(),
      'reqEvePhone'        => new sfWidgetFormInput(),
      'reqMobilePhone'     => new sfWidgetFormInput(),
      'reqPagerPhone'      => new sfWidgetFormInput(),
      'reqOtherPhone'      => new sfWidgetFormInput(),
      'reqFaxPhone'        => new sfWidgetFormInput(),
      'reqDayComment'      => new sfWidgetFormInput(),
      'reqEveComment'      => new sfWidgetFormInput(),
      'reqMobileComment'   => new sfWidgetFormInput(),
      'reqPagerComment'    => new sfWidgetFormInput(),
      'reqOtherComment'    => new sfWidgetFormInput(),
      'reqFaxComment'      => new sfWidgetFormInput(),
      'pilotName'          => new sfWidgetFormInput(),
      'pilotLastName'      => new sfWidgetFormInput(),
      'pilotDayPhone'      => new sfWidgetFormInput(),
      'pilotEvePhone'      => new sfWidgetFormInput(),
      'pilotMobilePhone'   => new sfWidgetFormInput(),
      'pilotPagerPhone'    => new sfWidgetFormInput(),
      'pilotOtherPhone'    => new sfWidgetFormInput(),
      'pilotFaxPhone'      => new sfWidgetFormInput(),
      'homeBase'           => new sfWidgetFormInput(),
      'pilotDayComment'    => new sfWidgetFormInput(),
      'pilotEveComment'    => new sfWidgetFormInput(),
      'pilotMobileComment' => new sfWidgetFormInput(),
      'pilotPagerComment'  => new sfWidgetFormInput(),
      'pilotOtherComment'  => new sfWidgetFormInput(),
      'pilotFaxComment'    => new sfWidgetFormInput(),
      'toAirportName'      => new sfWidgetFormInput(),
      'toAirportIdent'     => new sfWidgetFormInput(),
      'fromAirportName'    => new sfWidgetFormInput(),
      'fromAirportIdent'   => new sfWidgetFormInput(),
      'mission_date'       => new sfWidgetFormDateTime(),
      'mission_type_id'    => new sfWidgetFormInput(),
      'missionDisplayDate' => new sfWidgetFormInput(),
      'missionType'        => new sfWidgetFormInput(),
      'missionID'          => new sfWidgetFormInput(),
      'wing_id'            => new sfWidgetFormInput(),
      'cancelled'          => new sfWidgetFormInput(),
      'countyName'         => new sfWidgetFormInput(),
      'id'                 => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'passName'           => new sfValidatorString(array('max_length' => 81)),
      'passLastName'       => new sfValidatorString(array('max_length' => 40)),
      'weight'             => new sfValidatorInteger(array('required' => false)),
      'passDayPhone'       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passDayPhoneSearch' => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passEvePhone'       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passMobilePhone'    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passPagerPhone'     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passOtherPhone'     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passFaxPhone'       => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'passDayComment'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passEveComment'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passMobileComment'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passPagerComment'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passOtherComment'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'passFaxComment'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqName'            => new sfValidatorString(array('max_length' => 81)),
      'reqLastName'        => new sfValidatorString(array('max_length' => 40)),
      'reqDayPhone'        => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqEvePhone'        => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqMobilePhone'     => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqPagerPhone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqOtherPhone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqFaxPhone'        => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'reqDayComment'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqEveComment'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqMobileComment'   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqPagerComment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqOtherComment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'reqFaxComment'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotName'          => new sfValidatorString(array('max_length' => 81, 'required' => false)),
      'pilotLastName'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotDayPhone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pilotEvePhone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pilotMobilePhone'   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pilotPagerPhone'    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pilotOtherPhone'    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pilotFaxPhone'      => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'homeBase'           => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'pilotDayComment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotEveComment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotMobileComment' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotPagerComment'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotOtherComment'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pilotFaxComment'    => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'toAirportName'      => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'toAirportIdent'     => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'fromAirportName'    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fromAirportIdent'   => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'mission_date'       => new sfValidatorDateTime(array('required' => false)),
      'mission_type_id'    => new sfValidatorInteger(),
      'missionDisplayDate' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'missionType'        => new sfValidatorString(array('max_length' => 40)),
      'missionID'          => new sfValidatorInteger(array('required' => false)),
      'wing_id'            => new sfValidatorInteger(array('required' => false)),
      'cancelled'          => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'countyName'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'id'                 => new sfValidatorPropelChoice(array('model' => 'RpMissionSummary', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_summary[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionSummary';
  }


}
