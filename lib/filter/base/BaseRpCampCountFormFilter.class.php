<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RpCampCount filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRpCampCountFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'campID'         => new sfWidgetFormFilterInput(),
      'campName'       => new sfWidgetFormFilterInput(),
      'agencyName'     => new sfWidgetFormFilterInput(),
      'airportState'   => new sfWidgetFormFilterInput(),
      'legCount'       => new sfWidgetFormFilterInput(),
      'cancelledCount' => new sfWidgetFormFilterInput(),
      'approvedCount'  => new sfWidgetFormFilterInput(),
      'missionDate'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'campID'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'campName'       => new sfValidatorPass(array('required' => false)),
      'agencyName'     => new sfValidatorPass(array('required' => false)),
      'airportState'   => new sfValidatorPass(array('required' => false)),
      'legCount'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cancelledCount' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'approvedCount'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'missionDate'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rp_camp_count_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RpCampCount';
  }

  public function getFields()
  {
    return array(
      'campID'         => 'Number',
      'campName'       => 'Text',
      'agencyName'     => 'Text',
      'airportState'   => 'Text',
      'legCount'       => 'Number',
      'cancelledCount' => 'Number',
      'approvedCount'  => 'Number',
      'missionDate'    => 'Date',
      'id'             => 'Number',
    );
  }
}
