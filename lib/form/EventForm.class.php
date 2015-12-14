<?php

/**
 * Event form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EventForm extends BaseEventForm
{
  public function configure()
  {
     // unset($this["_csrf_token"]);
      $wings = WingPeer::getNames();     
      
      $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'event_name'            => new sfWidgetFormInput(),
      'event_date'            => new sfWidgetFormInput(),
      'event_time'            => new sfWidgetFormInput(),
      'location'              => new sfWidgetFormInput(),
      'short_desc'            => new sfWidgetFormInput(),
      'long_desc'             => new sfWidgetFormTextarea(),
      'wing_id'               => new sfWidgetFormChoice(array(
                                                  'choices'  => $wings, 'multiple' =>true, 'expanded' => true)),
      'contact_info'          => new sfWidgetFormInput(),
      'email_sent_date'       => new sfWidgetFormInput(),
      'online_reservation'    => new sfWidgetFormChoice(array(
                                                  'choices'  => array("No", "Yes"),'expanded' => true)),
      'adult_cost'            => new sfWidgetFormInput(),
      'child_cost'            => new sfWidgetFormInput(),
      'adult_door_cost'       => new sfWidgetFormInput(),
      'child_door_cost'       => new sfWidgetFormInput(),
      'signup_deadline'       => new sfWidgetFormInput(),
      'onsite_signup_ok'      => new sfWidgetFormChoice(array(
                                                  'choices'  => array("No", "Yes"),'expanded' => true)),
      'max_persons'           => new sfWidgetFormInput(),
      'collect_secure_info'   => new sfWidgetFormChoice(array(
                                                  'choices'  => array("No", "Yes"),'expanded' => true)),
      'addl_info_fields'      => new sfWidgetFormInput(),
      'addl_info_fields_help' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Event', 'column' => 'id', 'required' => false)),
      'event_name'            => new sfValidatorString(array('max_length' => 60)),
      'event_date'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'event_time'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'location'              => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'short_desc'            => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'long_desc'             => new sfValidatorString(array('required' => false)),
      'wing_id'               => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'contact_info'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email_sent_date'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'online_reservation'    => new sfValidatorInteger(array('required' => false)),
      'adult_cost'            => new sfValidatorInteger(array('required' => false)),
      'child_cost'            => new sfValidatorInteger(array('required' => false)),
      'adult_door_cost'       => new sfValidatorInteger(array('required' => false)),
      'child_door_cost'       => new sfValidatorInteger(array('required' => false)),
      'signup_deadline'       => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'onsite_signup_ok'      => new sfValidatorInteger(array('required' => false)),
      'max_persons'           => new sfValidatorInteger(array('required' => false)),
      'collect_secure_info'   => new sfValidatorInteger(array('required' => false)),
      'addl_info_fields'      => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'addl_info_fields_help' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
