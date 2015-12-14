<?php

/**
 * Contact Request form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ganbolor G
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ContactRequestProcessStep1Form extends BaseContactRequestForm
{
  public function configure()
  {
    $person_titles = sfConfig::get('app_person_titles', array('Mr'=>'Mr', 'Ms' => 'Ms'));
    $states = sfConfig::get('app_states', array());
    $countries = sfConfig::get('app_countries', array());
    $yes_no = array(1 => 'Yes', 0 => 'No');

    $phone_widget_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'title'                        => new sfWidgetFormSelect(array('choices' => $person_titles)),
      'first_name'                   => new sfWidgetFormInput(array(), array('class' => 'text')),
      'last_name'                    => new sfWidgetFormInput(array(), array('class' => 'text')),
      'address1'                     => new sfWidgetFormInput(array(), array('class' => 'text')),
      'address2'                     => new sfWidgetFormInput(array(), array('class' => 'text alter')),
      'city'                         => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'state'                        => new sfWidgetFormSelect(array('choices' => array_merge(array('' => 'Please Select'), $states))),
      'zipcode'                      => new widgetFormInputZipcode(array(), array('class' => 'text narrow')),
      'country'                      => new sfWidgetFormSelect(array('choices' => $countries)),
      'email'                        => new sfWidgetFormInput(array(), array('class' => 'text')),
      'day_phone'                    => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'day_comment'                  => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'eve_phone'                    => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'eve_comment'                  => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'mobile_phone'                 => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'mobile_comment'               => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'pager_phone'                  => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'pager_comment'                => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
      'fax_phone'                   => new widgetFormInputPhone($phone_widget_options, array('class' => 'text narrow')),
      'fax_comment'                 => new sfWidgetFormInput(array(), array('class' => 'text narrow')),
    ));

    $this->widgetSchema->setLabels(array(
      'title'           => 'Title*',
      'first_name'      => 'First Name*',
      'last_name'       => 'Last Name*',
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
      'fax_phone'      => 'Fax'
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'ContactRequest', 'column' => 'id', 'required' => false)),
      'title'                        => new sfValidatorChoice(array('choices' => array_keys($person_titles))),
      'first_name'                   => new sfValidatorString(array('max_length' => 40)),
      'last_name'                    => new sfValidatorString(array('max_length' => 40)),
      'address1'                     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'address2'                     => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'                         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'state'                        => new sfValidatorChoice(array('choices' => array_keys($states), 'required' => false)),
      'zipcode'                      => new validatorZipcode(array('required' => false, 'max_length' => 10, 'min_length' => 5)),
      'country'                      => new sfValidatorChoice(array('choices' => array_keys($countries))),
      'email'                        => new sfValidatorEmail(array('max_length' => 80, 'required' => false)),
      'day_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'day_comment'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'eve_phone'                    => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'eve_comment'                  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'mobile_phone'                 => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'mobile_comment'               => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'pager_phone'                  => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'pager_comment'                => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fax_phone'                   => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'fax_comment'                 => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));
    
    $this->widgetSchema->setNameFormat('contact_request[%s]');

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
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
      empty($values['fax_phone']) 
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
