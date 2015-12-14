<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMonthlyMissions filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMonthlyMissionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'missionDateDisplay'   => new sfWidgetFormFilterInput(),
      'mission_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'first_name'           => new sfWidgetFormFilterInput(),
      'pilotLastName'        => new sfWidgetFormFilterInput(),
      'pilotName'            => new sfWidgetFormFilterInput(),
      'legCount'             => new sfWidgetFormFilterInput(),
      'hours'                => new sfWidgetFormFilterInput(),
      'legCost'              => new sfWidgetFormFilterInput(),
      'pilotCost'            => new sfWidgetFormFilterInput(),
      'commercialTicketCost' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'missionDateDisplay'   => new sfValidatorPass(array('required' => false)),
      'mission_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'first_name'           => new sfValidatorPass(array('required' => false)),
      'pilotLastName'        => new sfValidatorPass(array('required' => false)),
      'pilotName'            => new sfValidatorPass(array('required' => false)),
      'legCount'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hours'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'legCost'              => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'pilotCost'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'commercialTicketCost' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_monthly_missions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMonthlyMissions';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'missionDateDisplay'   => 'Text',
      'mission_date'         => 'Date',
      'first_name'           => 'Text',
      'pilotLastName'        => 'Text',
      'pilotName'            => 'Text',
      'legCount'             => 'Number',
      'hours'                => 'Number',
      'legCost'              => 'Number',
      'pilotCost'            => 'Number',
      'commercialTicketCost' => 'Number',
    );
  }
}
