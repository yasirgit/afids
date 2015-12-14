<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerPopUpForm2 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['lodging_name'],$this['lodging_phone'],$this['lodging_phone_comment'],$this['facility_phone'],$this['facility_phone_comment'],$this['emergency_contact_name'],$this['emergency_contact_primary_phone'],$this['emergency_contact_primary_comment'],$this['emergency_contact_secondary_phone'],$this['emergency_contact_secondary_comment'],$this['requester_id'],$this['facility_name'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $pass_types = PassengerTypePeer::getForSelectParent();

    # Fields
    $this->widgetSchema['public_considerations'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['private_considerations'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['ground_transportation_comment'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['travel_history_notes'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));


    # Labels
    $this->widgetSchema->setLabels(array('ground_transportation_comment' => 'Ground Transportation'));
    $this->widgetSchema->setLabels(array('travel_history_notes' => 'Travel History Notes'));
    $this->widgetSchema->setLabels(array('public_considerations' => 'Public Considerations'));
    $this->widgetSchema->setLabels(array('private_considerations' => 'Private Considerations'));


    # Validation
    $this->validatorSchema['public_considerations'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['private_considerations'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['ground_transportation_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['travel_history_notes'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('pass_popup2[%s]');
  }
}
