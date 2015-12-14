<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpMissionsByMember filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpMissionsByMemberFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'external_id'          => new sfWidgetFormFilterInput(),
      'pilotName'            => new sfWidgetFormFilterInput(),
      'mission_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'legCount'             => new sfWidgetFormFilterInput(),
      'hobbsTime'            => new sfWidgetFormFilterInput(),
      'commercialTicketCost' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'external_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pilotName'            => new sfValidatorPass(array('required' => false)),
      'mission_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'legCount'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hobbsTime'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'commercialTicketCost' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('rp_missions_by_member_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpMissionsByMember';
  }

  public function getFields()
  {
    return array(
      'external_id'          => 'Number',
      'pilotName'            => 'Text',
      'mission_date'         => 'Date',
      'legCount'             => 'Number',
      'hobbsTime'            => 'Number',
      'commercialTicketCost' => 'Number',
      'id'                   => 'Number',
    );
  }
}
