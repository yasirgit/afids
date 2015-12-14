<?php

/**
 * Agency form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AgencyForm extends BaseAgencyForm
{
  public function configure()
  {
    unset($this['id']);

    $pass_types = PassengerTypePeer::getForSelectParent();
    $countries = sfConfig::get('app_countries', array('United States' => 'United States'));

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    # Fields
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address1'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address2'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['county'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['state'] =  new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['country'] = new sfWidgetFormSelect(array('choices'=>$countries),array('class'=>'text narrow'));
    $this->widgetSchema['zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow'));
    $this->widgetSchema['phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));
    $this->widgetSchema['fax_phone'] = new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['fax_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));
    $this->widgetSchema['email'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    # Labels
    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('address1' => 'Address '));
    $this->widgetSchema->setLabels(array('address2' => 'Address'));
    $this->widgetSchema->setLabels(array('city' => 'City'));
    $this->widgetSchema->setLabels(array('county' => 'County'));
    $this->widgetSchema->setLabels(array('state' => 'State'));
    $this->widgetSchema->setLabels(array('country' => 'Country'));
    $this->widgetSchema->setLabels(array('zipcode' => 'Zipcode'));
    $this->widgetSchema->setLabels(array('phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('fax_phone' => 'Fax Phone'));
    $this->widgetSchema->setLabels(array('fax_comment' => 'Fax Comment'));
    $this->widgetSchema->setLabels(array('email' => 'Email'));

    # Validation
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),(array('required'=>'Please confirm name !')));
    $this->validatorSchema['address1'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['address2'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['city'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['county'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['country'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['zipcode'] = new validatorZipcode(array('required' => false),array('max_length' => 10, 'min_length' => 5));
    $this->validatorSchema['phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>false),array('invalid'=>'Invalid email !'));

    # Descriptive message

    #help
    $this->widgetSchema->setHelp('weight','lbs.');

    $this->widgetSchema->setNameFormat('agency[%s]');
  }
}
