<?php
/**
 * ApplicationTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ApplicationTempStep5Form extends BaseApplicationTempForm
{
  protected $premium_choices = array();

  public function configure()
  {
    $gifts = array();
    $this->premium_choices = sfConfig::get('app_premium_choices', array('hat' => array('Hat - One Size', 1, 0)));
    foreach ($this->premium_choices as $key => $gift) {
      $gifts[$key] = $gift[0];
    }
    $yes_no = array(1 => 'Yes', 0 => 'No');

    //$total=$request->getParameter('total_amount');
    //print_r($total);
    //die();
    //farazi Condition of validation for admin and mormal member
    
    $configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
    $context = sfContext::getInstance();
    $user = $context->getUser();
    
    $totalAmount=$context->getRequest()->getParameter('total_amount'); 
    if($totalAmount>0) {
      //echo "1";
      $card = array(
          'ccard_number' => new sfValidatorString(array('max_length' => 20, 'required' => true),array('required'=>'Please confirm Credit Card Number')),
          'ccard_code'                   => new sfValidatorString(array('max_length' => 5, 'required' => true)),
          'ccard_expire'                 => new sfValidatorDate(array('date_output' =>'m/Y', 'date_format' => '#\d\d\/\d\d\d\d#', 'required' => false, 'with_time' => false), array('bad_format' => 'Format errro', 'required'=>'Please confirm Expiration Date', 'invalid'=> 'Date of birth is invalid !.')),
      );
    }else {
        //echo "1";
        $card = array(
          'ccard_number' => new sfValidatorString(array('max_length' => 20, 'required' => false),array('required'=>'Please confirm Credit Card Number')),
          'ccard_code'                   => new sfValidatorString(array('max_length' => 5, 'required' => false)),
          'ccard_expire'                 => new sfValidatorDate(array('date_output' =>'m/Y', 'date_format' => '#\d\d\/\d\d\d\d#', 'required' => false, 'with_time' => false), array('bad_format' => 'Format errro', 'required'=>'Please confirm Expiration Date', 'invalid'=> 'Date of birth is invalid !.')),
         );
    }

    /*
    
      //echo "1";
      $card = array(
          'ccard_number' => new sfValidatorString(array('max_length' => 20, 'required' => true),array('required'=>'Please confirm Credit Card Number')),
          'ccard_code'                   => new sfValidatorString(array('max_length' => 5, 'required' => true)),
          'ccard_expire'                 => new sfValidatorDate(array('date_output' =>'m/Y', 'date_format' => '#\d\d\/\d\d\d\d#', 'required' => true, 'with_time' => false), array('bad_format' => 'Format errro', 'required'=>'Please confirm Expiration Date', 'invalid'=> 'Date of birth is invalid !.')),
      );
    }else {
        //echo "1";
        $card = array(
          'ccard_number' => new sfValidatorString(array('max_length' => 20, 'required' => false),array('required'=>'Please confirm Credit Card Number')),
          'ccard_code'                   => new sfValidatorString(array('max_length' => 5, 'required' => false)),
          'ccard_expire'                 => new sfValidatorDate(array('date_output' =>'m/Y', 'date_format' => '#\d\d\/\d\d\d\d#', 'required' => false, 'with_time' => false), array('bad_format' => 'Format errro', 'required'=>'Please confirm Expiration Date', 'invalid'=> 'Date of birth is invalid !.')),
         );
    }*/
   
    $widgets = array(
      'id'                           => new sfWidgetFormInputHidden(),
      'premium_choice'               => new sfWidgetFormSelectRadio(array('choices' => $gifts)),
      'premium_size'                 => new sfWidgetFormInput(),
      'mission_orientation'          => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'mission_coordination'         => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'pilot_recruitment'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'fund_raising'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'celebrity_contacts'           => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'graphic_arts'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'hospital_outreach'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'event_planning'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'media_relations'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'telephone_work'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'computers'                    => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'clerical'                     => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'printing'                     => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'writing'                      => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'speakers_bureau'              => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'wing_team'                    => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'web_internet'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'foundation_contacts'          => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'aviation_contacts'            => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'will')),
      'member_aopa'                  => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'member_kiwanis'               => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'member_rotary'                => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'member_lions'                 => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'member_99s'                   => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'member_wia'                   => new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'class'=> 'wiss')),
      'company_name'                 => new sfWidgetFormInput(array(), array('class' => 'text')),
      'company_position'             => new sfWidgetFormInput(array(), array('class' => 'text')),
      'company_match_funds'          => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'referral_source'              => new sfWidgetFormPropelChoice(array('model' => 'RefSource', 'method' => 'getSourceName', 'add_empty' => 'Please Select', 'order_by' => array('SourceName', 'asc'))),
      'referral_source_other'        => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'referer_name'                 => new sfWidgetFormInput(array(), array('class' => 'text')),
      'mission_email_optin'          => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'hseats_interest'              => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'ccard_number'                 => new widgetFormInputPhone(array('mask' => '9999-9999-9999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold'), array('style' => 'width:200')),
      'ccard_code'                   => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'ccard_expire'                 => new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/yy', 'php' => 'm/Y'), 'button' => '/images/icons/calendar.gif'), array('class' => 'text narrow')),
      
      /*
      'application_date'             => new sfWidgetFormDateTime(),
      'renewal'                      => new sfWidgetFormInput(),
      'license_type'                 => new sfWidgetFormInput(),
      'other_hours'                  => new sfWidgetFormInput(),
      'affirmation_agreed'           => new sfWidgetFormInput(),
      'insurance_agreed'             => new sfWidgetFormInput(),
      'volunteer_interest'           => new sfWidgetFormInput(),
      'company_business_category_id' => new sfWidgetFormInput(),
      'dues_amount_paid'             => new sfWidgetFormInput(),
      'donation_amount_paid'         => new sfWidgetFormInput(),
      'method_of_payment_id'         => new sfWidgetFormInput(),
      'ccard_error_code'             => new sfWidgetFormInput(),
      'ccard_avs_result'             => new sfWidgetFormInput(),
      'processed_date'               => new sfWidgetFormDateTime(),
      'member_id'                    => new sfWidgetFormInput(),
      'publicity'                    => new sfWidgetFormInput(),
      'person_id'                    => new sfWidgetFormInput(),
      'novapointe_id'                => new sfWidgetFormInput(),
      'premium_ship_date'            => new sfWidgetFormDateTime(),
      'premium_ship_method'          => new sfWidgetFormInput(),
      'premium_ship_cost'            => new sfWidgetFormInput(),
      'premium_ship_tracking_number' => new sfWidgetFormInput(),
      'referral_session_id'          => new sfWidgetFormInput(),
      'aircraft_third_id'            => new sfWidgetFormInput(),
      'aircraft_third_own'           => new sfWidgetFormInput(),
      'aircraft_third_ice'           => new sfWidgetFormInput(),
      'aircraft_third_seats'         => new sfWidgetFormInput(),
      'aircraft_third_n_number'      => new sfWidgetFormInput(),
      'ip_address'                   => new sfWidgetFormInput(),
      'master_application_id'        => new sfWidgetFormInput(),
      'master_member_id'             => new sfWidgetFormInput(),
      'payment_transaction_id'       => new sfWidgetFormInput(),
*/
    );

    $labels = array(
      'premium_choice'        => 'Choose a Gift*',
      'mission_orientation'   => 'Mission Orientation',
      'mission_coordination'  => 'Mission Coordination',
      'pilot_recruitment'     => 'Pilot Recruitment',
      'fund_raising'          => 'Fund Raising',
      'celebrity_contacts'    => 'Celebrity Contacts',
      'graphic_arts'          => 'Graphic Arts',
      'hospital_outreach'     => 'Hospital Outreach',
      'event_planning'        => 'Event Planning',
      'media_relations'       => 'Media Relations',
      'telephone_work'        => 'Telephone Work',
      'computers'             => 'Computers',
      'clerical'              => 'Clerical',
      'printing'              => 'Printing',
      'writing'               => 'Writing (grants, newsletter, etc.)',
      'speakers_bureau'       => 'Speaker\'s Bureau',
      'wing_team'             => 'Wing Leadership',
      'web_internet'          => 'Web/Internet',
      'foundation_contacts'   => 'Foundation Contacts',
      'aviation_contacts'     => 'Aviation Business Contacts',
      'member_aopa'           => 'AOPA',
      'member_kiwanis'        => 'Kiwanis',
      'member_rotary'         => 'Rotary',
      'member_lions'          => 'Lions',
      'member_99s'            => '99\'s',
      'member_wia'            => 'Women in Aviation',
      'company_name'          => 'Your company or Employer Name',
      'company_position'      => 'Your position',
      'company_match_funds'   => 'Does your company provide matching grants?',
      'referral_source'       => 'How did you hear about Angel Flight West?',
      'referral_source_other' => 'Or, other',
      'referer_name'          => 'Referer Name',
      'mission_email_optin'   => 'Do you wish to receive emails listing available missions?',
      'hseats_interest'       => 'Are you interested in serving as a homeland security pilot?',
      'ccard_number'          => 'Credit Card Number',
      'ccard_code'            => 'Code',
      'ccard_expire'          => 'Expiration Date'
    );

    $helps = array(
      'referer_name'          => 'If you were referred to Angel Flight West by a person, please enter his or her name',
      'mission_email_optin'   => 'Periodic emails will be sent',
      'hseats_interest'       => 'You will serve as homeland security pilot',
    );
    //'premium_choice'               => new sfValidatorChoice(array('choices' => array_keys($gifts))),    
    $isRenewal = ApplicationTempPeer::getRenewalStatus($context->getRequest()->getParameter('id'));

    $validators = array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'ApplicationTemp', 'column' => 'id', 'required' => false)),
      'premium_choice'               => new sfValidatorChoice(array('required' => ($isRenewal ? false : true),'choices' => array_keys($gifts))),
      'premium_size'                 => new sfValidatorInteger(array('required' => false)),
      'mission_orientation'          => new sfValidatorInteger(array('required' => false)),
      'mission_coordination'         => new sfValidatorInteger(array('required' => false)),
      'pilot_recruitment'            => new sfValidatorInteger(array('required' => false)),
      'fund_raising'                 => new sfValidatorInteger(array('required' => false)),
      'celebrity_contacts'           => new sfValidatorInteger(array('required' => false)),
      'graphic_arts'                 => new sfValidatorInteger(array('required' => false)),
      'hospital_outreach'            => new sfValidatorInteger(array('required' => false)),
      'event_planning'               => new sfValidatorInteger(array('required' => false)),
      'media_relations'              => new sfValidatorInteger(array('required' => false)),
      'telephone_work'               => new sfValidatorInteger(array('required' => false)),
      'computers'                    => new sfValidatorInteger(array('required' => false)),
      'clerical'                     => new sfValidatorInteger(array('required' => false)),
      'printing'                     => new sfValidatorInteger(array('required' => false)),
      'writing'                      => new sfValidatorInteger(array('required' => false)),
      'speakers_bureau'              => new sfValidatorInteger(array('required' => false)),
      'wing_team'                    => new sfValidatorInteger(array('required' => false)),
      'web_internet'                 => new sfValidatorInteger(array('required' => false)),
      'foundation_contacts'          => new sfValidatorInteger(array('required' => false)),
      'aviation_contacts'            => new sfValidatorInteger(array('required' => false)),
      'member_aopa'                  => new sfValidatorInteger(array('required' => false)),
      'member_kiwanis'               => new sfValidatorInteger(array('required' => false)),
      'member_rotary'                => new sfValidatorInteger(array('required' => false)),
      'member_lions'                 => new sfValidatorInteger(array('required' => false)),
      'member_99s'                   => new sfValidatorInteger(array('required' => false)),
      'member_wia'                   => new sfValidatorInteger(array('required' => false)),
      'company_name'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'company_position'             => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'company_match_funds'          => new sfValidatorInteger(array('required' => false)),
      'referral_source'              => new sfValidatorPropelChoice(array('model' => 'RefSource', 'column' => 'id', 'required' => false)),
      'referral_source_other'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'referer_name'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mission_email_optin'          => new sfValidatorInteger(array('required' => false)),
      'hseats_interest'              => new sfValidatorInteger(array('required' => false)),
      /*
      'ccard_number'                 => new sfValidatorString(array('max_length' => 20, 'required' => true),array('required'=>'Please confirm Credit Card Number')),
      'ccard_code'                   => new sfValidatorString(array('max_length' => 5, 'required' => true)),
      'ccard_expire'                 => new sfValidatorDate(array('date_output' =>'m/Y', 'date_format' => '#\d\d\/\d\d\d\d#', 'required' => true, 'with_time' => false), array('bad_format' => 'Format errro', 'required'=>'Please confirm Expiration Date', 'invalid'=> 'Date of birth is invalid !.')),
       * 
       */
      

/*sfWidgetFormDate
      'application_date'             => new sfValidatorDateTime(array('required' => false)),
      'renewal'                      => new sfValidatorInteger(array('required' => false)),
      'license_type'                 => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'other_hours'                  => new sfValidatorInteger(array('required' => false)),
      'affirmation_agreed'           => new sfValidatorInteger(array('required' => false)),
      'insurance_agreed'             => new sfValidatorInteger(array('required' => false)),
      'volunteer_interest'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company_business_category_id' => new sfValidatorInteger(array('required' => false)),
      'dues_amount_paid'             => new sfValidatorInteger(array('required' => false)),
      'donation_amount_paid'         => new sfValidatorInteger(array('required' => false)),
      'method_of_payment_id'         => new sfValidatorInteger(array('required' => false)),
      'ccard_approval_number'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'ccard_error_code'             => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ccard_avs_result'             => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'processed_date'               => new sfValidatorDateTime(array('required' => false)),
      'member_id'                    => new sfValidatorInteger(array('required' => false)),
      'publicity'                    => new sfValidatorInteger(array('required' => false)),
      'person_id'                    => new sfValidatorInteger(array('required' => false)),
      'novapointe_id'                => new sfValidatorInteger(array('required' => false)),
      'premium_ship_date'            => new sfValidatorDateTime(array('required' => false)),
      'premium_ship_method'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'premium_ship_cost'            => new sfValidatorInteger(array('required' => false)),
      'premium_ship_tracking_number' => new sfValidatorString(array('max_length' => 35, 'required' => false)),
      'referral_session_id'          => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_id'            => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_own'           => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_ice'           => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_seats'         => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_n_number'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ip_address'                   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'master_application_id'        => new sfValidatorInteger(array('required' => false)),
      'master_member_id'             => new sfValidatorInteger(array('required' => false)),
      'payment_transaction_id'       => new sfValidatorInteger(array('required' => false)),
*/
    );

    $validators=array_merge((array)$validators, (array)$card);
    /*
    echo "<pre>";
    print_r($validators);
    echo "</pre>";
    die();
    */
    $this->setWidgets($widgets);
    $this->widgetSchema->setLabels($labels);
    $this->widgetSchema->setHelps($helps);
    $this->setValidators($validators);
    $this->widgetSchema->setNameFormat('application[%s]');
    $this->widgetSchema->getFormFormatter()->setHelpFormat('%help%');
  }

//  public function checkCityStateOrZip($validator, $values)
//  {
//    if (empty($values['city']) && empty($values['zipcode']) && empty($values['state']))
//    {
//      $error = new sfValidatorError($this->validatorSchema['city'], 'Please fill at least one');
//      throw new sfValidatorErrorSchema($validator, array('city' => $error));
//    }
//
//    return $values;
//  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }


  /**
   * Updates the default values of the form with the current values of the current object.
   */
  protected function updateDefaultsFromObject()
  {
    $arr = array();
    foreach ($this->premium_choices as $key => $choice) {
      if ($choice[2] == $this->object->getPremiumSize() && $choice[1] == $this->object->getPremiumChoice()) {
        $arr['premium_choice'] = $key;
        break;
      }
    }

    // update defaults for the main object
    if ($this->isNew)
    {
      $this->setDefaults(array_merge($this->object->toArray(BasePeer::TYPE_FIELDNAME), $arr, $this->getDefaults()));
    }
    else
    {
      $this->setDefaults(array_merge($this->getDefaults(), $this->object->toArray(BasePeer::TYPE_FIELDNAME), $arr));
    }
  }

  /**
   * Updates and saves the current object.
   *
   * @param PropelPDO $con An optional PropelPDO object
   */
  protected function doSave($con = null)
  {
    foreach ($this->premium_choices as $key => $choice) {
      if ($key == $this->values['premium_choice']) {
        $this->values['premium_size'] = $choice[2];
        $this->values['premium_choice'] = $choice[1];
        break;
      }
    }

    parent::doSave();
  }
}
