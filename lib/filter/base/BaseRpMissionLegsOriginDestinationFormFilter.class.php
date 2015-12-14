<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionLegsOriginDestination filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionLegsOriginDestinationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'missionNo'          => new sfWidgetFormFilterInput(),
      'externalID'         => new sfWidgetFormFilterInput(),
      'legNumber'          => new sfWidgetFormFilterInput(),
      'missionDisplayDate' => new sfWidgetFormFilterInput(),
      'origin'             => new sfWidgetFormFilterInput(),
      'destination'        => new sfWidgetFormFilterInput(),
      'wingName'           => new sfWidgetFormFilterInput(),
      'mission_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'legID'              => new sfWidgetFormFilterInput(),
      'isAfaLeg'           => new sfWidgetFormFilterInput(),
      'isFlown'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'missionNo'          => new sfValidatorPass(array('required' => false)),
      'externalID'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'legNumber'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missionDisplayDate' => new sfValidatorPass(array('required' => false)),
      'origin'             => new sfValidatorPass(array('required' => false)),
      'destination'        => new sfValidatorPass(array('required' => false)),
      'wingName'           => new sfValidatorPass(array('required' => false)),
      'mission_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'legID'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isAfaLeg'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isFlown'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_mission_legs_origin_destination_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionLegsOriginDestination';
  }

  public function getFields()
  {
    return array(
      'missionNo'          => 'Text',
      'externalID'         => 'Number',
      'legNumber'          => 'Number',
      'missionDisplayDate' => 'Text',
      'origin'             => 'Text',
      'destination'        => 'Text',
      'wingName'           => 'Text',
      'mission_date'       => 'Date',
      'legID'              => 'Number',
      'isAfaLeg'           => 'Number',
      'isFlown'            => 'Number',
      'id'                 => 'Number',
    );
  }
}
