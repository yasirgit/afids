<?php

/**
 * Availability form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AvailabilityForm extends BaseAvailabilityForm
{
  public function configure()
  {
    $this->widgetSchema['member_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['not_available'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['first_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['last_date'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['availability_comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['no_weekday'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['no_night'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['no_weekend'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['last_minute'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['as_mission_mssistant'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema->setLabels(array(
      'first_date'           => 'Start Date',
      'last_date'            => 'End Date',
      'not_available'        => 'General Availability',
      'no_weekday'           => 'Weekdays',
      'no_night'             => 'Nights',
      'last_minute'          => 'For Last Minute Flights',
      'no_weekend'           => 'Weekends',
      'as_mission_mssistant' => 'As Mission Assistant',
      'availability_comment' => 'Comment',
    ));

    $this->validatorSchema['not_available'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['no_weekday'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['no_night'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['last_minute'] = new sfValidatorInteger(array('required' => false));
  }
}
