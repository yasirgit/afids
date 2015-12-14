<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * MissionReport filter form base class.
 *
 * @package    angelflight
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionReportFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'report_date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'mission_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'copilot_name'           => new sfWidgetFormFilterInput(),
      'member_copilot'         => new sfWidgetFormFilterInput(),
      'aircraft_id'            => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => true)),
      'n_number'               => new sfWidgetFormFilterInput(),
      'makemodel'              => new sfWidgetFormFilterInput(),
      'hobbs_time'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'passenger_names'        => new sfWidgetFormFilterInput(),
      'mission_comments'       => new sfWidgetFormFilterInput(),
      'expense_report'         => new sfWidgetFormFilterInput(),
      'approved'               => new sfWidgetFormFilterInput(),
      'pickup_airport_ident'   => new sfWidgetFormFilterInput(),
      'dropoff_airport_ident'  => new sfWidgetFormFilterInput(),
      'routing'                => new sfWidgetFormFilterInput(),
      'commercial_ticket_cost' => new sfWidgetFormFilterInput(),
      'airline_ref_number'     => new sfWidgetFormFilterInput(),
      'airline_owrt'           => new sfWidgetFormFilterInput(),
      'mileage'                => new sfWidgetFormFilterInput(),
      'photo1'                 => new sfWidgetFormFilterInput(),
      'photo2'                 => new sfWidgetFormFilterInput(),
      'photo3'                 => new sfWidgetFormFilterInput(),
      'photo4'                 => new sfWidgetFormFilterInput(),
      'photo5'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'report_date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mission_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'copilot_name'           => new sfValidatorPass(array('required' => false)),
      'member_copilot'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'aircraft_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Aircraft', 'column' => 'id')),
      'n_number'               => new sfValidatorPass(array('required' => false)),
      'makemodel'              => new sfValidatorPass(array('required' => false)),
      'hobbs_time'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'passenger_names'        => new sfValidatorPass(array('required' => false)),
      'mission_comments'       => new sfValidatorPass(array('required' => false)),
      'expense_report'         => new sfValidatorPass(array('required' => false)),
      'approved'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pickup_airport_ident'   => new sfValidatorPass(array('required' => false)),
      'dropoff_airport_ident'  => new sfValidatorPass(array('required' => false)),
      'routing'                => new sfValidatorPass(array('required' => false)),
      'commercial_ticket_cost' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'airline_ref_number'     => new sfValidatorPass(array('required' => false)),
      'airline_owrt'           => new sfValidatorPass(array('required' => false)),
      'mileage'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'photo1'                 => new sfValidatorPass(array('required' => false)),
      'photo2'                 => new sfValidatorPass(array('required' => false)),
      'photo3'                 => new sfValidatorPass(array('required' => false)),
      'photo4'                 => new sfValidatorPass(array('required' => false)),
      'photo5'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionReport';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'report_date'            => 'Date',
      'mission_date'           => 'Date',
      'copilot_name'           => 'Text',
      'member_copilot'         => 'Number',
      'aircraft_id'            => 'ForeignKey',
      'n_number'               => 'Text',
      'makemodel'              => 'Text',
      'hobbs_time'             => 'Date',
      'passenger_names'        => 'Text',
      'mission_comments'       => 'Text',
      'expense_report'         => 'Text',
      'approved'               => 'Number',
      'pickup_airport_ident'   => 'Text',
      'dropoff_airport_ident'  => 'Text',
      'routing'                => 'Text',
      'commercial_ticket_cost' => 'Number',
      'airline_ref_number'     => 'Text',
      'airline_owrt'           => 'Text',
      'mileage'                => 'Number',
      'photo1'                 => 'Text',
      'photo2'                 => 'Text',
      'photo3'                 => 'Text',
      'photo4'                 => 'Text',
      'photo5'                 => 'Text',
    );
  }
}
