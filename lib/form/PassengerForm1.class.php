<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerForm1 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],
            $this['requester_id'],
            $this['ground_transportation_comment'],$this['travel_history_notes'],$this['releasing_physician'],$this['releasing_phone'],$this['releasing_fax1'],$this['releasing_fax1_comment'],$this['releasing_email'],$this['need_medical_release'],$this['medical_release_requested'],$this['medical_release_received'],$this['treating_physician'],$this['treating_phone'],$this['treating_fax1'],$this['treating_fax1_comment'],$this['treating_email'],$this['lodging_name'],$this['lodging_phone'],$this['lodging_phone_comment'],$this['facility_phone'],$this['facility_phone_comment'],$this['emergency_contact_name'],$this['emergency_contact_primary_phone'],$this['emergency_contact_primary_comment'],$this['emergency_contact_secondary_phone'],$this['emergency_contact_secondary_comment'],$this['facility_name'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $pass_types = PassengerTypePeer::getForSelectParent();

    # Fields
    $this->widgetSchema['passenger_type_id'] = new sfWidgetFormChoice(array('choices' => $pass_types),array('class'=>'text'));
    $this->widgetSchema['parent'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['date_of_birth'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['weight'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['illness'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['passenger_illness_category_id'] = new sfWidgetFormPropelChoice(array('model' => 'PassengerIllnessCategory', 'add_empty' => '-- select --'),array('class'=>'text'));
    $this->widgetSchema['language_spoken'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['best_contact_method'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['financial'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['public_considerations'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['private_considerations'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
   
    # Labels
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

    # Validation
    $this->validatorSchema['passenger_type_id'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['parent'] = new sfValidatorString(array('required' => false), array('required' => 'Please confirm first name !.'));
    $this->validatorSchema['date_of_birth'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['weight'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Weight must be in number format !'));
    $this->validatorSchema['illness'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['passenger_illness_category_id'] = new sfValidatorPropelChoice(array('model' => 'PassengerIllnessCategory', 'column' => 'id', 'required' => false, 'empty_value' => null));
    $this->validatorSchema['language_spoken'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['best_contact_method'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['financial'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['public_considerations'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['private_considerations'] = new sfValidatorString(array('required' => false));

    # Descriptive message
    #help
    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('pass1[%s]');
    $this->disableCSRFProtection();
  }
}
