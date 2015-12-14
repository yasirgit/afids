<?php

/**
 * PassengerDest form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerDestForm extends BasePassengerDestForm
{
  public function configure()
  {
    unset($this['id'], $this['passenger_id']);

    
    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    $this->widgetSchema['lodging'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['lod_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['lod_phone_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));
    $this->widgetSchema['facility'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['fac_phone'] = new widgetFormInputPhone($phone_options,array('class'=>'text narrow'));
    $this->widgetSchema['facility_phone_comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text class'));
    $this->widgetSchema['facility_city'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['facility_state'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema->setLabels(array('lodging' => 'Name'));
    $this->widgetSchema->setLabels(array('lod_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('lod_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('facility' => 'Name'));
    $this->widgetSchema->setLabels(array('fac_phone' => 'Phone'));
    $this->widgetSchema->setLabels(array('facility_phone_comment' => 'Phone Comment'));
    $this->widgetSchema->setLabels(array('facility_city' => 'Destination City'));
    $this->widgetSchema->setLabels(array('facility_state' => 'Destination State'));

    $this->validatorSchema['lodging'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['lod_phone'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['facility'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['fac_phone'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['facility_city'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['facility_state'] = new sfValidatorString(array('required' => true));
    $this->widgetSchema->setNameFormat('passDest[%s]');

    // $this->disableCSRFProtection();

  }
}
