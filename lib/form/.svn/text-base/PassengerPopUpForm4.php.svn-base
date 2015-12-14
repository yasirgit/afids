<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerPopUpForm4 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['public_considerations'],$this['private_considerations'],$this['ground_transportation_comment'],$this['travel_history_notes'],$this['releasing_physician'],$this['releasing_phone'],$this['releasing_fax1'],$this['releasing_fax1_comment'],$this['releasing_email'],$this['need_medical_release'],$this['medical_release_requested'],$this['medical_release_received'],$this['treating_physician'],$this['treating_phone'],$this['treating_fax1'],$this['treating_fax1_comment'],$this['treating_email']
    ,$this['emergency_contact_name'],
    $this['emergency_contact_primary_phone'],
    $this['emergency_contact_primary_comment'],
    $this['emergency_contact_secondary_phone'],
    $this['emergency_contact_secondary_comment'],
    $this['requester_id'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']
    );

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    # Fields
    $this->widgetSchema['lodging_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['lodging_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['lodging_phone_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));
    $this->widgetSchema['facility_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['facility_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['facility_phone_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));

    # Labels
    $this->widgetSchema->setLabels(array('lodging_name' => 'Name'));
    $this->widgetSchema->setLabels(array('lodging_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('lodging_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('facility_name' => 'Name'));
    $this->widgetSchema->setLabels(array('facility_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('facility_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('facility_city' => 'Destination City'));
    $this->widgetSchema->setLabels(array('facility_state' => 'Destination State'));

    # Validation
    $this->validatorSchema['lodging_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['lodging_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['facility_phone_comment'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('pass_popup4[%s]');
  }
}
