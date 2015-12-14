<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionsOriginDestination filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionsOriginDestinationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'externalID'         => new sfWidgetFormFilterInput(),
      'mission_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'missionDateDisplay' => new sfWidgetFormFilterInput(),
      'originID'           => new sfWidgetFormFilterInput(),
      'originCity'         => new sfWidgetFormFilterInput(),
      'destID'             => new sfWidgetFormFilterInput(),
      'destCity'           => new sfWidgetFormFilterInput(),
      'legCount'           => new sfWidgetFormFilterInput(),
      'wingID'             => new sfWidgetFormFilterInput(),
      'wingName'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'externalID'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mission_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'missionDateDisplay' => new sfValidatorPass(array('required' => false)),
      'originID'           => new sfValidatorPass(array('required' => false)),
      'originCity'         => new sfValidatorPass(array('required' => false)),
      'destID'             => new sfValidatorPass(array('required' => false)),
      'destCity'           => new sfValidatorPass(array('required' => false)),
      'legCount'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingID'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingName'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rp_missions_origin_destination_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionsOriginDestination';
  }

  public function getFields()
  {
    return array(
      'externalID'         => 'Number',
      'mission_date'       => 'Date',
      'missionDateDisplay' => 'Text',
      'originID'           => 'Text',
      'originCity'         => 'Text',
      'destID'             => 'Text',
      'destCity'           => 'Text',
      'legCount'           => 'Number',
      'wingID'             => 'Number',
      'wingName'           => 'Text',
      'id'                 => 'Number',
    );
  }
}
