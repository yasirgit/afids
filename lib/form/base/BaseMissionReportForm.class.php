<?php

/**
 * MissionReport form base class.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseMissionReportForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'report_date'            => new sfWidgetFormDateTime(),
      'mission_date'           => new sfWidgetFormDateTime(),
      'copilot_name'           => new sfWidgetFormInput(),
      'member_copilot'         => new sfWidgetFormInput(),
      'aircraft_id'            => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => true)),
      'n_number'               => new sfWidgetFormInput(),
      'makemodel'              => new sfWidgetFormInput(),
      'hobbs_time'             => new sfWidgetFormTime(),
      'passenger_names'        => new sfWidgetFormInput(),
      'mission_comments'       => new sfWidgetFormTextarea(),
      'expense_report'         => new sfWidgetFormTextarea(),
      'approved'               => new sfWidgetFormInput(),
      'pickup_airport_ident'   => new sfWidgetFormInput(),
      'dropoff_airport_ident'  => new sfWidgetFormInput(),
      'routing'                => new sfWidgetFormInput(),
      'commercial_ticket_cost' => new sfWidgetFormInput(),
      'airline_ref_number'     => new sfWidgetFormInput(),
      'airline_owrt'           => new sfWidgetFormInput(),
      'mileage'                => new sfWidgetFormInput(),
      'photo1'                 => new sfWidgetFormInput(),
      'photo2'                 => new sfWidgetFormInput(),
      'photo3'                 => new sfWidgetFormInput(),
      'photo4'                 => new sfWidgetFormInput(),
      'photo5'                 => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'MissionReport', 'column' => 'id', 'required' => false)),
      'report_date'            => new sfValidatorDateTime(array('required' => false)),
      'mission_date'           => new sfValidatorDateTime(array('required' => false)),
      'copilot_name'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'member_copilot'         => new sfValidatorInteger(array('required' => false)),
      'aircraft_id'            => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'n_number'               => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'makemodel'              => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'hobbs_time'             => new sfValidatorTime(array('required' => false)),
      'passenger_names'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mission_comments'       => new sfValidatorString(array('required' => false)),
      'expense_report'         => new sfValidatorString(array('required' => false)),
      'approved'               => new sfValidatorInteger(array('required' => false)),
      'pickup_airport_ident'   => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'dropoff_airport_ident'  => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'routing'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'commercial_ticket_cost' => new sfValidatorInteger(array('required' => false)),
      'airline_ref_number'     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'airline_owrt'           => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'mileage'                => new sfValidatorInteger(array('required' => false)),
      'photo1'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo2'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo3'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo4'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo5'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mission_report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MissionReport';
  }


}
