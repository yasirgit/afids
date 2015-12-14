<?php

/**
 * Passenger form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerForm5_1 extends BasePassengerForm
{
  public function configure()
  {
    unset($this['id'],$this['person_id'],$this['passenger_type_id'],$this['parent'],$this['date_of_birth'],$this['weight'],$this['illness'],$this['passenger_illness_category_id'],$this['language_spoken'],$this['best_contact_method'],$this['financial'],$this['public_considerations'],$this['private_considerations'],$this['ground_transportation_comment'],$this['travel_history_notes'],$this['releasing_physician'],$this['releasing_phone'],$this['releasing_fax1'],$this['releasing_fax1_comment'],$this['releasing_email'],$this['need_medical_release'],$this['medical_release_requested'],$this['medical_release_received'],$this['treating_physician'],$this['treating_phone'],$this['treating_fax1'],$this['treating_fax1_comment'],$this['treating_email'],$this['lodging_name'],$this['lodging_phone'],$this['lodging_phone_comment'],$this['facility_name'],$this['facility_phone'],$this['facility_phone_comment'],$this['requester_id'],$this['emergency_contact_name'],$this['emergency_contact_primary_phone'],$this['emergency_contact_primary_comment'],$this['emergency_contact_secondary_phone'],$this['emergency_contact_secondary_comment'], $this['camp_passenger_list'], $this['camp_pilot_passenger_list']);

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

     # Fields
    $this->widgetSchema['title'] = new sfWidgetFormInput(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['first_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['last_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address2'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['county'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['state'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['country'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrowest'));
    $this->widgetSchema['day_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['day_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['evening_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['evening_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['mobile_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['mobile_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['pager_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['pager_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['other_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['other_comment'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['fax_phone1'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['fax_comment1'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['auto_fax'] =new sfWidgetFormInputCheckbox();
    $this->widgetSchema['fax_phone2'] = new widgetFormInputPhone($phone_options,array('class' => 'text narrow'));
    $this->widgetSchema['fax_comment2'] =new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['email_text_only'] =new sfWidgetFormInputCheckbox();
    $this->widgetSchema['email_blocked'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['comment'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pager_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['block_mailings'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['newsletter'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['gender'] = new sfWidgetFormSelect(array('choices'=>array('male'=>'Male', 'female'=>'Female','Unknown'=>'unknown')));
    $this->widgetSchema['deceased'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['deceased_comment'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['secondary_email'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['deceased_date'] = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['middle_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['suffix'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['nickname'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['veteran'] = new sfWidgetFormInputCheckbox();

    # Labels
    $this->widgetSchema->setLabels(array('title' => 'Title'));
    $this->widgetSchema->setLabels(array('first_name' => 'First Name'));
    $this->widgetSchema->setLabels(array('last_name' => 'Last Name'));
    $this->widgetSchema->setLabels(array('address1' => 'Address'));
    $this->widgetSchema->setLabels(array('address2' => ''));
    $this->widgetSchema->setLabels(array('city' => 'City'));
    $this->widgetSchema->setLabels(array('county' => 'County'));
    $this->widgetSchema->setLabels(array('state' => 'State'));
    $this->widgetSchema->setLabels(array('country' => 'Country'));
    $this->widgetSchema->setLabels(array('zipcode' => 'ZipCode'));
    $this->widgetSchema->setLabels(array('day_phone' => 'Work Phone'));
    $this->widgetSchema->setLabels(array('day_comment' => 'Work Phone Comment'));
    $this->widgetSchema->setLabels(array('evening_phone' => 'Home Phone'));
    $this->widgetSchema->setLabels(array('evening_comment' => 'Home Phone Comment'));
    $this->widgetSchema->setLabels(array('mobile_phone' => 'Cell Phone'));
    $this->widgetSchema->setLabels(array('mobile_comment' => 'Cell Phone Comment'));
    $this->widgetSchema->setLabels(array('pager_phone' => 'Pager Phone'));
    $this->widgetSchema->setLabels(array('pager_comment' => 'Pager Phone Comment'));
    $this->widgetSchema->setLabels(array('other_phone' => 'Other Phone'));
    $this->widgetSchema->setLabels(array('other_comment' => 'Other Phone Comment'));
    $this->widgetSchema->setLabels(array('fax_phone1' => 'Fax Phone 1'));
    $this->widgetSchema->setLabels(array('fax_comment1' => 'Fax Phone Comment 1'));
    $this->widgetSchema->setLabels(array('auto_fax' => 'Fax 1 Automatic'));
    $this->widgetSchema->setLabels(array('fax_phone2' => 'Fax Phone 2'));
    $this->widgetSchema->setLabels(array('fax_comment2' => 'Fax Phone Comment 2'));
    $this->widgetSchema->setLabels(array('email' => 'Email'));
    $this->widgetSchema->setLabels(array('email_text_only' => 'Emails Text Only ?'));
    $this->widgetSchema->setLabels(array('email_blocked' => 'Block Emails?'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('pager_email' => 'Pager Email'));
    $this->widgetSchema->setLabels(array('block_mailings' => 'Block Mailings?'));
    $this->widgetSchema->setLabels(array('newsletter' => 'Newsletter'));
    $this->widgetSchema->setLabels(array('gender' => 'Gender'));
    $this->widgetSchema->setLabels(array('deceased' => 'Deceased ?'));
    $this->widgetSchema->setLabels(array('deceased_comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('secondary_email' => 'Secondary Email'));
    $this->widgetSchema->setLabels(array('deceased_date' => 'Deceased Date'));
    $this->widgetSchema->setLabels(array('middle_name' => 'Middle Name'));
    $this->widgetSchema->setLabels(array('suffix' => 'Suffix'));
    $this->widgetSchema->setLabels(array('nickname' => 'NickName'));
    $this->widgetSchema->setLabels(array('veteran' => 'Active Military/Veteran?'));

    # Validation
    $this->validatorSchema['title'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm first name !.'));
    $this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm last name !'));
    $this->validatorSchema['address1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['address2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['city'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['county'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['country'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['zipcode'] = new validatorZipcode(array('required' => false),array('max_length' => 10, 'min_length' => 5));
    $this->validatorSchema['day_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['day_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['evening_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['evening_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['mobile_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['mobile_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pager_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pager_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['other_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['other_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_phone1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_comment1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['auto_fax'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_phone2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_comment2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email address !'));
    $this->validatorSchema['email_text_only'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['email_blocked'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['pager_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email address !'));
    $this->validatorSchema['block_mailings'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['newsletter'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['gender'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['deceased'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['deceased_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['secondary_email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid secondary email !'));
    $this->validatorSchema['deceased_date'] = new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['middle_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['suffix'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['nickname'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['veteran'] = new sfValidatorString(array('required' => false));
    # Descriptive message

    $this->widgetSchema->setNameFormat('pass5_1[%s]');
  }
}
