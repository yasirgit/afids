<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerPopUpForm3 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['requester_id'],$this['id'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['public_considerations'],$this['private_considerations'],$this['ground_transportation_comment'],$this['travel_history_notes'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    # Fields
    $this->widgetSchema['releasing_physician'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['releasing_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['releasing_fax1'] =  new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['releasing_fax1_comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['releasing_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['need_medical_release'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['medical_release_requested'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['medical_release_received'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['treating_physician'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['treating_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['treating_fax1'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['treating_fax1_comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['treating_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    # Labels
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

    # Validation
    $this->validatorSchema['releasing_physician'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_fax1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_fax1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['releasing_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));
    $this->validatorSchema['need_medical_release'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['medical_release_requested'] =new sfValidatorDate(array('max' => time(),'required' => false));
    $this->validatorSchema['medical_release_received'] =new sfValidatorDate(array('max' => time(),'required' => false));
    $this->validatorSchema['treating_physician'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_fax1_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treating_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));

    $this->setDefault('need_medical_release', 1);
    $this->setDefault('medical_release_requested', date("m/d/y"));

    $this->widgetSchema->setNameFormat('pass_popup3[%s]');
  }
}
