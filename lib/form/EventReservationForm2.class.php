<?php

/**
 * Event Reservation form2.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class EventReservationForm2 extends BaseEventReservationForm
{
  public function configure()
  {
      unset($this['id'],$this['event_id'],$this['member_id'],$this['reservation_date'],$this['guest_names'],$this['amt_paid'],$this['method_of_payment'],$this['payment_date'],$this['auth_number'],$this['status'],$this['comments'],$this['collect_secure_info'],$this['addl_info_fields'],$this['novapointe_trans_id']);

       # Fields
       $this->widgetSchema['guest_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));

      # Labels
      $this->widgetSchema->setLabels(array('guest_name' => 'Guest Name'));

      # Validation
      $this->validatorSchema['guest_name'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm guest name !.'));

      $this->widgetSchema->setNameFormat('event_reservation2[%s]');

  }
}


?>
