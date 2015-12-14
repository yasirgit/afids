<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerForm5_4 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['releasing_physician'],$this['releasing_phone'],$this['releasing_fax1'],$this['releasing_fax1_comment'],$this['releasing_email'],$this['medical_release_requested'],$this['medical_release_received'],$this['treating_physician'],$this['treating_phone'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['public_considerations'],$this['private_considerations'],$this['lodging_name'],$this['lodging_phone'],$this['lodging_phone_comment'],$this['facility_phone'],$this['facility_phone_comment'],$this['emergency_contact_name'],$this['emergency_contact_primary_phone'],$this['emergency_contact_primary_comment'],$this['emergency_contact_secondary_phone'],$this['emergency_contact_secondary_comment'],$this['requester_id'],$this['facility_name'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $pass_types = PassengerTypePeer::getForSelectParent();
    $persons = PersonPeer::getNotInPassenger();

    # Fields
    $this->widgetSchema['ground_transportation_comment'] = new sfWidgetFormTextarea(array());
    $this->widgetSchema['travel_history_notes'] = new sfWidgetFormTextarea(array());
    $this->widgetSchema['need_medical_release'] = new sfWidgetFormChoice(array('choices' => array('1' => 'yes', '0' => 'no'), 'expanded' => false));
    $this->widgetSchema['treating_fax1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['treating_fax1_comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['treating_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    # Labels
    $this->widgetSchema->setLabels(array('ground_transportation_comment' => 'Ground Transportation'));
    $this->widgetSchema->setLabels(array('travel_history_notes' => 'Travel History Notes'));
    $this->widgetSchema->setLabels(array('need_medical_release' => 'Med Release Required'));
    $this->widgetSchema->setLabels(array('treating_fax1' => 'Fax Number'));
    $this->widgetSchema->setLabels(array('treating_fax1_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('treating_email' => 'Email'));
    # Validation

    $this->validatorSchema['ground_transportation_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['travel_history_notes'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['need_medical_release'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['treating_fax1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    # Descriptive message

    #help
    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('pass5_4[%s]');
  }
}
