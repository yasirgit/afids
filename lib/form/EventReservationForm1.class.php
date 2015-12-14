<?php

/**
 * Event Reservation form1.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EventReservationForm1 extends BaseEventReservationForm
{
  public function configure()
  {

    unset($this['id'],$this['state'],$this['event_id'],$this['member_id'],$this['reservation_date'],$this['guest_names'],$this['amt_paid'],$this['method_of_payment'],$this['payment_date'],$this['auth_number'],$this['status'],$this['comments'],$this['collect_secure_info'],$this['addl_info_fields'],$this['novapointe_trans_id']);

    # Fields    
    $this->widgetSchema['first_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['last_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    //$this->widgetSchema['state'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['zipcode'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['phone'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['adult_guests'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['child_guests'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    # Labels
    $this->widgetSchema->setLabels(array('first_name' => 'First Name'));
    $this->widgetSchema->setLabels(array('last_name' => 'Last Name'));
    $this->widgetSchema->setLabels(array('address' => 'Address'));
    $this->widgetSchema->setLabels(array('city' => 'City'));
    //$this->widgetSchema->setLabels(array('state' => 'State'));
    $this->widgetSchema->setLabels(array('zipcode' => 'ZipCode'));
    $this->widgetSchema->setLabels(array('phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('email' => 'Email'));
    $this->widgetSchema->setLabels(array('adult_guests' => 'Adult Guests'));
    $this->widgetSchema->setLabels(array('child_guests' => 'Child Guests'));
    

    # Validation
    $this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm first name !.'));
    $this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm last name !.'));
    $this->validatorSchema['address'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm address !.'));
    $this->validatorSchema['city'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm city !.'));
   // $this->validatorSchema['state'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm state !.'));
    $this->validatorSchema['zipcode'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm ZipCode !.'));
    $this->validatorSchema['phone'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm phone number !.'));
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true), array('required' => 'Please confirm your email !.'));
    $this->validatorSchema['adult_guests'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['child_guests'] = new sfValidatorInteger(array('required' => false));
    
    
    $this->widgetSchema->setNameFormat('event_reservation1[%s]');
    //$this->disableCSRFProtection();
    
  }
  
}

?>
