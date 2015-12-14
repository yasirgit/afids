<?php

/**
 * RpMemberWingStatsReport form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberWingStatsReportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monthNo'      => new sfWidgetFormInput(),
      'yearNo'       => new sfWidgetFormInput(),
      'wingID'       => new sfWidgetFormInput(),
      'wingName'     => new sfWidgetFormInput(),
      'flightStatus' => new sfWidgetFormInput(),
      'memberCount'  => new sfWidgetFormInput(),
      'id'           => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'monthNo'      => new sfValidatorInteger(array('required' => false)),
      'yearNo'       => new sfValidatorInteger(array('required' => false)),
      'wingID'       => new sfValidatorInteger(array('required' => false)),
      'wingName'     => new sfValidatorString(array('max_length' => 30)),
      'flightStatus' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'memberCount'  => new sfValidatorInteger(array('required' => false)),
      'id'           => new sfValidatorPropelChoice(array('model' => 'RpMemberWingStatsReport', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_member_wing_stats_report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberWingStatsReport';
  }


}
