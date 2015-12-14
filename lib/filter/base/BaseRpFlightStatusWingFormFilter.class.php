<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpFlightStatusWing filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpFlightStatusWingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'wingID'            => new sfWidgetFormFilterInput(),
      'wingName'          => new sfWidgetFormFilterInput(),
      'commandPilot'      => new sfWidgetFormFilterInput(),
      'nonPilot'          => new sfWidgetFormFilterInput(),
      'verifyOrientation' => new sfWidgetFormFilterInput(),
      'groundAngel'       => new sfWidgetFormFilterInput(),
      'missionAssistant'  => new sfWidgetFormFilterInput(),
      'totalCount'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'wingID'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'wingName'          => new sfValidatorPass(array('required' => false)),
      'commandPilot'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nonPilot'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'verifyOrientation' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'groundAngel'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missionAssistant'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'totalCount'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_flight_status_wing_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpFlightStatusWing';
  }

  public function getFields()
  {
    return array(
      'wingID'            => 'Number',
      'wingName'          => 'Text',
      'commandPilot'      => 'Number',
      'nonPilot'          => 'Number',
      'verifyOrientation' => 'Number',
      'groundAngel'       => 'Number',
      'missionAssistant'  => 'Number',
      'totalCount'        => 'Number',
      'id'                => 'Number',
    );
  }
}
