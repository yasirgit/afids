<?php

class PassengerItiForm extends BasePassengerForm
{
  public function configure()
  {
    unset(  $this['id'],
            $this['person_id'],
            $this['passenger_type_id'],
            $this['parent'],$this['date_of_birth'],
            $this['weight'],$this['illness'],
            $this['passenger_illness_category_id'],
            $this['language_spoken'],
            $this['best_contact_method'],
            $this['financial'],
            $this['public_considerations'],
            $this['private_considerations'],
            $this['lodging_name'],
            $this['lodging_phone'],
            $this['lodging_phone_comment'],
            $this['facility_phone'],
            $this['facility_phone_comment'],
            $this['emergency_contact_name'],
            $this['emergency_contact_primary_phone'],
            $this['emergency_contact_primary_comment'],
            $this['emergency_contact_secondary_phone'],
            $this['emergency_contact_secondary_comment'],
            $this['requester_id'],
            $this['facility_name'],
            $this['camp_passenger_list'],
            $this['camp_pilot_passenger_list'],

            $this['ground_transportation_comment'],
            $this['travel_history_notes'],
            $this['releasing_physician'],
            $this['releasing_phone'],
            $this['releasing_fax1'],
            $this['releasing_fax1_comment'],
            $this['releasing_email'],
            $this['need_medical_release'],
            $this['medical_release_requested'],
            $this['medical_release_received'],
            $this['treating_physician'],

            $this['treating_phone'],
            $this['treating_fax1'],
            $this['treating_fax1_comment'],
            $this['treating_email']
            );

    $baggage_type = array('KG' => 'KG', 'LB'=>'LB');
    $this->widgetSchema['b_type'] = new sfWidgetFormSelect(array('choices'=>$baggage_type),array('class'=>'text', 'style'=>'width: 50px'));
    $this->widgetSchema['b_weight'] = new sfWidgetFormInput(array(), array('class' => 'text', 'style'=>'width: 30px'));
    $this->widgetSchema['b_desc'] = new sfWidgetFormInput(array(), array('class' => 'text', 'style'=>'width: 200px'));

    $this->widgetSchema->setLabels(array('b_weight' => 'Baggage Weight:'));
    $this->widgetSchema->setLabels(array('b_desc' => 'Baggage Description:'));

    $this->validatorSchema['b_weight'] = new sfValidatorNumber(array('required' => false), array('invalid'=> 'Baggage Weight is invalid !.'));
    $this->validatorSchema['b_desc'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('passIti[%s]');
    $this->disableCSRFProtection();
  }
}
?>