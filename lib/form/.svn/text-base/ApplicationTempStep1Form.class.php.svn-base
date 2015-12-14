<?php

/**
 * ApplicationTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ApplicationTempStep1Form extends BaseApplicationTempForm
{
  public function configure()
  {
    $person_titles = sfConfig::get('app_person_titles', array('Mr'=>'Mr', 'Ms' => 'Ms'));
    $states = sfConfig::get('app_states', array());
    $countries = sfConfig::get('app_countries', array());
    $yes_no = array(1 => 'Yes', 0 => 'No');
    $genders = sfConfig::get('app_gender_types', array('male' => 'Male', 'female' => 'Female'));
    if (array_key_exists('unknown', $genders)) unset($genders['unknown']);

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');
    $zipcode_widget = array('mask' => '99999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');


    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'title'                        => new sfWidgetFormSelect(array('choices' => $person_titles)),
      'first_name'                   => new sfWidgetFormInput(array(), array('class' => 'text')),
      'middle_name'                  => new sfWidgetFormInput(array(), array('class' => 'text')),
      'last_name'                    => new sfWidgetFormInput(array(), array('class' => 'text')),
      'suffix'                       => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'nickname'                     => new sfWidgetFormInput(array(), array('class' => 'text')),
      'address1'                     => new sfWidgetFormInput(array(), array('class' => 'text')),
      'address2'                     => new sfWidgetFormInput(array(), array('class' => 'text alter')),
      'city'                         => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'state'                        => new sfWidgetFormSelect(array('choices' => array_merge(array('' => 'Please Select'), $states))),
      'zipcode'                      => new widgetFormInputPhone($zipcode_widget, array('class' => 'text narrow')),
      'country'                      => new sfWidgetFormSelect(array('choices' => $countries)),
      'email'                        => new sfWidgetFormInput(array(), array('class' => 'text')),
      'secondary_email'              => new sfWidgetFormInput(array(), array('class' => 'text')),
      'day_phone'                    => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'day_comment'                  => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'eve_phone'                    => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'eve_comment'                  => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'mobile_phone'                 => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'mobile_comment'               => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'pager_phone'                  => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'pager_comment'                => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'fax_phone1'                   => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'fax_comment1'                 => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'fax_phone2'                   => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'fax_comment2'                 => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'other_phone'                  => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'other_comment'                => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'pager_email'                  => new sfWidgetFormInput(array(), array('class' => 'text')),
      'gender'                       => new sfWidgetFormSelectRadio(array('choices' => $genders, 'formatter' => array($this, 'formatterRaw'))),
      'veteran'                      => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'applicant_pilot'              => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
    ));

    $this->widgetSchema->setLabels(array(
      'title'           => 'Title',
      'first_name'      => 'First Name*',
      'middle_name'     => 'Middle Name/Initial',
      'last_name'       => 'Last Name*',
      'suffix'          => 'Suffix',
      'nickname'        => 'Nickname',
      'address1'        => 'Address*',
      'address2'        => 'Address',
      'city'            => 'City',
      'state'           => 'State',
      'zipcode'         => 'Zipcode',
      'country'         => 'Country',
      'email'           => 'Email Address',
      'secondary_email' => 'Secondary Email',
      'day_phone'       => 'Work Phone*',
      'eve_phone'       => 'Home Phone',
      'mobile_phone'    => 'Cell Phone',
      'pager_phone'     => 'Pager',
      'fax_phone1'      => 'Fax',
      'fax_phone2'      => 'Alt. Fax',
      'other_phone'     => 'Other',
      'pager_email'     => 'Pager Email',
      'gender'          => 'Gender*',
      'veteran'         => 'Active Military or Veteran?',
      'applicant_pilot' => 'Are you a pilot?*',
    ));

    $this->widgetSchema->setHelps(array(
      'applicant_pilot' => 'Note: Please answer yes whether or not you are active. Student pilots should answer no.',
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'ApplicationTemp', 'column' => 'id', 'required' => false)),
      'title'                        => new sfValidatorChoice(array('choices' => array_keys($person_titles))),
      'first_name'                   => new sfValidatorString(array('max_length' => 40)),
      'middle_name'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'last_name'                    => new sfValidatorString(array('max_length' => 40)),
      'suffix'                       => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'nickname'                     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address1'                     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address2'                     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                         => new sfValidatorPropelChoice(array('model' => 'Zipcode', 'column' => 'city'),array('required' => false, 'invalid' => 'We haven\'t found the city you specified in our database')),
      'state'                        => new sfValidatorChoice(array('choices' => array_keys($states), 'required' => false)),
      'zipcode'                      => new sfValidatorPropelChoice(array('model' => 'Zipcode', 'column' => 'zipcode'),array('required' => false, 'invalid' => 'We haven\'t found the zipcode you specified in our database' )),
      'country'                      => new sfValidatorChoice(array('choices' => array_keys($countries))),
      'email'                        => new sfValidatorEmail(array('max_length' => 80, 'required' => false)),
      'secondary_email'              => new sfValidatorEmail(array('max_length' => 80, 'required' => false)),
      'day_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'day_comment'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'eve_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'eve_comment'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mobile_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'mobile_comment'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pager_phone'                  => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pager_comment'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone1'                   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment1'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone2'                   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment2'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'other_phone'                  => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'other_comment'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pager_email'                  => new sfValidatorEmail(array('max_length' => 80, 'required' => false)),
      'gender'                       => new sfValidatorChoice(array('choices' => array_keys($genders))),
      'veteran'                      => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'applicant_pilot'              => new sfValidatorChoice(array('choices' => array_keys($yes_no))),
    ));
    
    $this->widgetSchema->setNameFormat('application[%s]');

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorCallback(array('callback' => array($this, 'checkDuplicateEmail'))),
        new sfValidatorCallback(array('callback' => array($this, 'checkCityStateOrZip'))),
        new sfValidatorCallback(array('callback' => array($this, 'checkAddress'))),
        new sfValidatorCallback(array('callback' => array($this, 'checkPhone')))
      ))
    );
  }

  public function checkPhone($validator, $values)
  {
    if (
      empty($values['day_phone']) &&
      empty($values['eve_phone']) &&
      empty($values['mobile_phone']) &&
      empty($values['pager_phone']) &&
      empty($values['fax_phone1']) &&
      empty($values['fax_phone2']) &&
      empty($values['other_phone'])
    ){
      $error = new sfValidatorError($this->validatorSchema['day_phone'], 'Please provide us with least one phone');
      throw new sfValidatorErrorSchema($validator, array('day_phone' => $error));
    }

    return $values;
  }

  public function checkCityStateOrZip($validator, $values)
  {
    if (empty($values['city']) && empty($values['zipcode']) && empty($values['state']))
    {
      $error = new sfValidatorError($this->validatorSchema['city'], 'Please fill at least one');
      throw new sfValidatorErrorSchema($validator, array('city' => $error));
    }

    return $values;
  }

  public function checkAddress($validator, $values)
  {
    if (empty($values['address1'])) {
      if (empty($values['address2'])) {
        $error = new sfValidatorError($this->validatorSchema['address1'], 'Required.');
        throw new sfValidatorErrorSchema($validator, array('address1' => $error));
      }
    }

    return $values;
  }

  public function checkDuplicateEmail($validator, $values)
  {
    if ((!empty($values['email']) && !empty($values['secondary_email'])) && ($values['email'] == $values['secondary_email'])) {
      $error = new sfValidatorError($this->validatorSchema['secondary_email'], $values['secondary_email'].' already typed in "Email Address"');
      throw new sfValidatorErrorSchema($validator, array('secondary_email' => $error));
    }

    return $values;
  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }

  protected function doSave($con = null)
  {
    $this->values['ip_address'] = $_SERVER["REMOTE_ADDR"];
    parent::doSave();
  }
}
