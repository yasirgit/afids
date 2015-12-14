<?php

/**
 * Fbo form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FboForm extends BaseFboForm
{
  public function configure()
  {
    $yes_no = array(1 => 'Yes', 0 => 'No');
    unset($this['id'],$this['airport_id']);

    $airports = AirportPeer::getForSelectParent();

    $phone_options = array('mask' => '(999) 999-9999', 'ok_class' => 'field_ok', 'holder_class' => 'field_hold');

    # Fields
    //    $this->widgetSchema['airport_id'] = new sfWidgetFormChoice(array('choices' => $airports));
    $this->widgetSchema['name'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['address'] =  new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['voice_phone'] =new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['fax_phone'] =  new widgetFormInputPhone($phone_options, array('class' => 'text narrow'));
    $this->widgetSchema['fuel_discount'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['discount_amount'] = new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw')));
    //    $this->widgetSchema->setLabels(array('airport_id' => 'Airport'));
    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('address' => 'Address'));
    $this->widgetSchema->setLabels(array('voice_phone' => 'Voice Phone'));
    $this->widgetSchema->setLabels(array('fax_phone' => 'Fax Phone'));
    $this->widgetSchema->setLabels(array('fuel_discount' => 'Discount Amount'));
    $this->widgetSchema->setLabels(array('discount_amount' => 'Fuel Discount'));

    //    $this->validatorSchema['airport_id'] = new sfValidatorInteger(array('required' => true),array('invalid'=>'Co donor id must be in number format !'));
    
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm a name !'));
    $this->validatorSchema['address'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['voice_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['fax_phone'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['discount_amount'] = new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false));
    $this->validatorSchema['fuel_discount'] = new sfValidatorNumber(array('required' => false),array('invalid'=>'Please Insert Numbers only'));
	
    $this->widgetSchema->setNameFormat('fbo[%s]');

  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }

}
