<?php

/**
 * Mission form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionSmallForm extends MissionForm
{
  public function configure()
  {
    unset(
    $this['external_id'],
    $this['request_id'],
    $this['itinerary_id'],
    $this['other_requester_id'],
    $this['other_agency_id'],
    $this['mission_type_id'],
    $this['date_requested'],
    $this['passenger_id'],
    $this['requester_id'],
    $this['agency_id'],
    $this['camp_id'],
    $this['request_id'],
    $this['coordinator_id'],
    $this['flight_time'],
    $this['treatment'],
    $this['comment'],
    $this['appointment'],
    $this['mission_specific_comments'],
    $this['from'],
    $this['to']
    );

    // $sss = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    //$sss->setOption($name, $value)
    $this->widgetSchema['mission_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['appt_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));

    // $this->getWidget($name)->addOption($name);
    //
# Labels
    $this->widgetSchema->setLabels(array('appt_date' => 'Appointment Date:'));
    $this->widgetSchema->setLabels(array('mission_date' => 'Travel  Date:'));

    # Validation
    $this->validatorSchema['mission_date'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm travel date !'));
    $this->validatorSchema['appt_date'] = new sfValidatorString(array('required' => false));

    $this->setDefault('mission_date', date("m/d/y"));
    $this->setDefault('appt_date', date("m/d/y"));

    # Descriptive message

    $this->widgetSchema->setNameFormat('mission_small[%s]');

  }
}
