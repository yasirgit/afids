<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerPopUpForm5 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['requester_id'],$this['id'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['public_considerations'],$this['private_considerations'],$this['ground_transportation_comment'],$this['travel_history_notes'],$this['releasing_physician'],$this['releasing_phone'],$this['releasing_fax1'],$this['releasing_fax1_comment'],$this['releasing_email'],$this['need_medical_release'],$this['medical_release_requested'],$this['medical_release_received'],$this['treating_physician'],$this['treating_phone'],$this['treating_fax1'],$this['treating_fax1_comment'],$this['treating_email']
    ,$this['lodging_name'],
    $this['lodging_phone'],
    $this['lodging_phone_comment'],
    $this['facility_name'],
    $this['facility_phone'],
    $this['facility_phone_comment'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']
    );

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    # Fields
    $this->widgetSchema['emergency_contact_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['emergency_contact_primary_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['emergency_contact_primary_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));
    $this->widgetSchema['emergency_contact_secondary_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['emergency_contact_secondary_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));

    # Labels
    $this->widgetSchema->setLabels(array('emergency_contact_name' => 'Emergency Contact Name'));
    $this->widgetSchema->setLabels(array('emergency_contact_primary_phone' => 'Primary Phone'));
    $this->widgetSchema->setLabels(array('emergency_contact_primary_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('emergency_contact_secondary_phone' => 'Secondary Phone'));
    $this->widgetSchema->setLabels(array('emergency_contact_secondary_comment' => 'Comment'));

    # Validation
    $this->validatorSchema['emergency_contact_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_primary_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_primary_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_secondary_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['emergency_contact_secondary_comment'] = new sfValidatorString(array('required' => false));


    $this->widgetSchema->setNameFormat('pass_popup5[%s]');
  }
}
