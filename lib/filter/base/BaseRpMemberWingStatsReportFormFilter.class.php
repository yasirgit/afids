<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMemberWingStatsReport filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMemberWingStatsReportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monthNo'      => new sfWidgetFormFilterInput(),
      'yearNo'       => new sfWidgetFormFilterInput(),
      'wingID'       => new sfWidgetFormFilterInput(),
      'wingName'     => new sfWidgetFormFilterInput(),
      'flightStatus' => new sfWidgetFormFilterInput(),
      'memberCount'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'monthNo'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'yearNo'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingID'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingName'     => new sfValidatorPass(array('required' => false)),
      'flightStatus' => new sfValidatorPass(array('required' => false)),
      'memberCount'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_member_wing_stats_report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMemberWingStatsReport';
  }

  public function getFields()
  {
    return array(
      'monthNo'      => 'Number',
      'yearNo'       => 'Number',
      'wingID'       => 'Number',
      'wingName'     => 'Text',
      'flightStatus' => 'Text',
      'memberCount'  => 'Number',
      'id'           => 'Number',
    );
  }
}
