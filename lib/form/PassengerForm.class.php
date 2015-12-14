<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerForm extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $pass_types = PassengerTypePeer::getForSelectParent();
    $persons = PersonPeer::getNotInPassenger();

    # Fields
    $this->widgetSchema['person_id'] = new sfWidgetFormChoice(array('choices' => $persons));
    $this->widgetSchema['passenger_type_id'] = new sfWidgetFormChoice(array('choices' => $pass_types));
    $this->widgetSchema['parent'] = new sfWidgetFormInput();
    $this->widgetSchema['date_of_birth'] =new sfWidgetFormInput();
    $this->widgetSchema['weight'] = new sfWidgetFormInput();
    $this->widgetSchema['illness'] = new sfWidgetFormInput();
    $this->widgetSchema['passenger_illness_category_id'] = new sfWidgetFormChoice(array('choices' => array('Command pilot' => 'Command pilot', 'Orientation Complete' => 'Orientation Complete','Verify Orientation'=>'Verify Orientation','Non-pilot'=>'Non-pilot','Ground Angel'=>'Ground Angel','Mission Assistant'=>'Mission Assistant'), 'expanded' => false));
    $this->widgetSchema['language_spoken'] = new sfWidgetFormInput();
    $this->widgetSchema['best_contact_method'] = new sfWidgetFormInput();
    $this->widgetSchema['financial'] = new sfWidgetFormTextarea(array(), array('size'=>80));
    $this->widgetSchema['public_considerations'] = new sfWidgetFormTextarea(array(), array('size'=>80));
    $this->widgetSchema['private_considerations'] = new sfWidgetFormTextarea(array(), array('size'=>80));
    $this->widgetSchema['ground_transportation_comment'] = new sfWidgetFormTextarea(array(), array('size'=>80));
    $this->widgetSchema['travel_history_notes'] = new sfWidgetFormTextarea(array(), array('size'=>80));
    $this->widgetSchema['releasing_physician'] = new sfWidgetFormInput();
    $this->widgetSchema['releasing_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['releasing_fax1'] = new sfWidgetFormInput();
    $this->widgetSchema['releasing_fax1_comment'] = new sfWidgetFormInput();
    $this->widgetSchema['releasing_email'] = new sfWidgetFormInput();
    $this->widgetSchema['need_medical_release'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['medical_release_requested'] = new sfWidgetFormInput();
    $this->widgetSchema['medical_release_received'] = new sfWidgetFormInput();
    $this->widgetSchema['treating_physician'] = new sfWidgetFormInput();
    $this->widgetSchema['treating_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['treating_fax1'] = new sfWidgetFormInput();
    $this->widgetSchema['treating_fax1_comment'] = new sfWidgetFormInput();
    $this->widgetSchema['treating_email'] = new sfWidgetFormInput();
    $this->widgetSchema['lodging_name'] = new sfWidgetFormInput();
    $this->widgetSchema['lodging_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['lodging_phone_comment'] = new sfWidgetFormInput();
    $this->widgetSchema['facility_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['facility_city'] = new sfWidgetFormInput();
    $this->widgetSchema['facility_state'] = new sfWidgetFormInput();
    $this->widgetSchema['facility_phone_comment'] = new sfWidgetFormInput();
    $this->widgetSchema['emergency_contact_name'] = new sfWidgetFormInput();
    $this->widgetSchema['emergency_contact_primary_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['emergency_contact_primary_comment'] = new sfWidgetFormInput();
    $this->widgetSchema['emergency_contact_secondary_phone'] = new sfWidgetFormInput();
    $this->widgetSchema['emergency_contact_secondary_comment'] = new sfWidgetFormInput(); 
   
    # Labels
    $this->widgetSchema->setLabels(array('person_id' => 'Person'));
    $this->widgetSchema->setLabels(array('passenger_type_id' => 'Passenger Type'));
    $this->widgetSchema->setLabels(array('parent' => 'Parent Name'));
    $this->widgetSchema->setLabels(array('date_of_birth' => 'Date of birth'));
    $this->widgetSchema->setLabels(array('weight' => 'Weight'));
    $this->widgetSchema->setLabels(array('illness' => 'Passenger Illness'));
    $this->widgetSchema->setLabels(array('passenger_illness_category_id' => 'Illness Category'));
    $this->widgetSchema->setLabels(array('language_spoken' => 'Language Spoken'));
    $this->widgetSchema->setLabels(array('best_contact_method' => 'Best Contacted By'));
    $this->widgetSchema->setLabels(array('financial' => 'Financial Information'));
    $this->widgetSchema->setLabels(array('public_considerations' => 'Public Considerations'));
    $this->widgetSchema->setLabels(array('private_considerations' => 'Private Considerations'));
    $this->widgetSchema->setLabels(array('ground_transportation_comment' => 'Ground Transportation'));
    $this->widgetSchema->setLabels(array('travel_history_notes' => 'Travel History Notes'));
    $this->widgetSchema->setLabels(array('releasing_physician' => 'Name'));
    $this->widgetSchema->setLabels(array('releasing_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('releasing_fax1' => 'Fax Number'));
    $this->widgetSchema->setLabels(array('releasing_fax1_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('releasing_email' => 'Email'));
    $this->widgetSchema->setLabels(array('need_medical_release' => 'Med Release Required'));
    $this->widgetSchema->setLabels(array('medical_release_requested' => 'Medical Release Requested'));
    $this->widgetSchema->setLabels(array('medical_release_received' => 'Medical Release Received'));
    $this->widgetSchema->setLabels(array('treating_physician' => 'Name'));
    $this->widgetSchema->setLabels(array('treating_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('treating_fax1' => 'Fax Number'));
    $this->widgetSchema->setLabels(array('treating_fax1_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('treating_email' => 'Email'));
    $this->widgetSchema->setLabels(array('lodging_name' => 'Name'));
    $this->widgetSchema->setLabels(array('lodging_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('lodging_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('facility_name' => 'Name'));
    $this->widgetSchema->setLabels(array('facility_city' => 'Destination City'));
    $this->widgetSchema->setLabels(array('facility_state' => 'Destination State'));
    $this->widgetSchema->setLabels(array('facility_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('facility_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('emergency_contact_name' => 'Emergency Contact Name'));
    $this->widgetSchema->setLabels(array('emergency_contact_primary_phone' => 'Primary Phone'));
    $this->widgetSchema->setLabels(array('emergency_contact_primary_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('emergency_contact_secondary_phone' => 'Secondary Phone'));
    $this->widgetSchema->setLabels(array('emergency_contact_secondary_comment' => 'Comment'));

    # Validation
    $this->validatorSchema['person_id'] = new sfValidatorInteger(array('required' => true));
    $this->validatorSchema['passenger_type_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['parent'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm first name !.'));
    $this->validatorSchema['date_of_birth'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['weight'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['illness'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['passenger_illness_category_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['language_spoken'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['best_contact_method'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['financial'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['public_considerations'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['private_considerations'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['ground_transportation_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['travel_history_notes'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_physician'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_fax1'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['releasing_fax1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['need_medical_release'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['medical_release_requested'] =new sfValidatorDate(array('max' => time(),'required' => false));
    $this->validatorSchema['medical_release_received'] =new sfValidatorDate(array('max' => time(),'required' => false));
    $this->validatorSchema['treating_physician'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['lodging_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['lodging_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_city'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_state'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_phone'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['facility_phone_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_primary_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_primary_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_secondary_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_secondary_comment'] = new sfValidatorString(array('required' => false));
    # Descriptive message

    #help
    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('pass[%s]');
  }
}
