<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpOutreachReport filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpOutreachReportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'externalID'    => new sfWidgetFormFilterInput(),
      'legNumber'     => new sfWidgetFormFilterInput(),
      'mission_date'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'displayDate'   => new sfWidgetFormFilterInput(),
      'cancelled'     => new sfWidgetFormFilterInput(),
      'pilotName'     => new sfWidgetFormFilterInput(),
      'pilotLastName' => new sfWidgetFormFilterInput(),
      'agencyName'    => new sfWidgetFormFilterInput(),
      'passName'      => new sfWidgetFormFilterInput(),
      'passLastName'  => new sfWidgetFormFilterInput(),
      'passAge'       => new sfWidgetFormFilterInput(),
      'illness'       => new sfWidgetFormFilterInput(),
      'facilityName'  => new sfWidgetFormFilterInput(),
      'lodgingName'   => new sfWidgetFormFilterInput(),
      'agencyCity'    => new sfWidgetFormFilterInput(),
      'agencyState'   => new sfWidgetFormFilterInput(),
      'pass_state'    => new sfWidgetFormFilterInput(),
      'agencyID'      => new sfWidgetFormFilterInput(),
      'passengerID'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'externalID'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'legNumber'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_date'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'displayDate'   => new sfValidatorPass(array('required' => false)),
      'cancelled'     => new sfValidatorPass(array('required' => false)),
      'pilotName'     => new sfValidatorPass(array('required' => false)),
      'pilotLastName' => new sfValidatorPass(array('required' => false)),
      'agencyName'    => new sfValidatorPass(array('required' => false)),
      'passName'      => new sfValidatorPass(array('required' => false)),
      'passLastName'  => new sfValidatorPass(array('required' => false)),
      'passAge'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'illness'       => new sfValidatorPass(array('required' => false)),
      'facilityName'  => new sfValidatorPass(array('required' => false)),
      'lodgingName'   => new sfValidatorPass(array('required' => false)),
      'agencyCity'    => new sfValidatorPass(array('required' => false)),
      'agencyState'   => new sfValidatorPass(array('required' => false)),
      'pass_state'    => new sfValidatorPass(array('required' => false)),
      'agencyID'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'passengerID'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_outreach_report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpOutreachReport';
  }

  public function getFields()
  {
    return array(
      'externalID'    => 'Number',
      'legNumber'     => 'Number',
      'mission_date'  => 'Date',
      'displayDate'   => 'Text',
      'cancelled'     => 'Text',
      'pilotName'     => 'Text',
      'pilotLastName' => 'Text',
      'agencyName'    => 'Text',
      'passName'      => 'Text',
      'passLastName'  => 'Text',
      'passAge'       => 'Number',
      'illness'       => 'Text',
      'facilityName'  => 'Text',
      'lodgingName'   => 'Text',
      'agencyCity'    => 'Text',
      'agencyState'   => 'Text',
      'pass_state'    => 'Text',
      'agencyID'      => 'Number',
      'passengerID'   => 'Number',
      'id'            => 'Number',
    );
  }
}
