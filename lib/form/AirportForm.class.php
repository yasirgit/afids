<?php

/**
 * Airport form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AirportForm extends BaseAirportForm
{
  public function configure()
  {
//    unset($this['id']);

    $wings = WingPeer::getForSelectParent();
    $states = sfConfig::get('app_states',array('AL'=>'Alabama', 'AK'=>'Alaska'));
    $disable = 'disabled';
    if($this->getObject()->isNew()){
      $disable = '';
    }

    # Fields
    $this->widgetSchema['ident'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new'));
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new'));
    $this->widgetSchema['city'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow airport-new', 'disabled' => $disable));
    $this->widgetSchema['latitude'] =new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['longitude'] =new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['runway_length'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['wing_id'] = new sfWidgetFormChoice(array('choices' => $wings),array('class'=>'text narrow airport-new', 'disabled' => $disable));
    $this->widgetSchema['gmt_offset'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['dst_offset'] = new sfWidgetFormInput(array(), array('class' => 'text airport-new', 'disabled' => $disable));
    $this->widgetSchema['zipcode'] = new widgetFormInputZipcode(array(), array('class' => 'text narrow airport-new', 'disabled' => $disable));
    $this->widgetSchema['closed'] =  new sfWidgetFormInputCheckbox(array(), array('value' => 1, 'disabled' => $disable));

    $this->widgetSchema->setLabels(array('ident' => 'Ident'));
    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('city' => 'City'));
    $this->widgetSchema->setLabels(array('state' => 'State'));
    $this->widgetSchema->setLabels(array('latitude' => 'Latitude'));
    $this->widgetSchema->setLabels(array('longitude' => 'Longitude'));
    $this->widgetSchema->setLabels(array('runway_length' => 'Runway length'));
    $this->widgetSchema->setLabels(array('wing_id' => 'Wing'));
    $this->widgetSchema->setLabels(array('gmt_offset' => 'GMT offset'));
    $this->widgetSchema->setLabels(array('dst_offset' => 'DST offset'));
    $this->widgetSchema->setLabels(array('zipcode' => 'Zipcode'));
    $this->widgetSchema->setLabels(array('closed' => 'Closed'));

    $this->validatorSchema['ident'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['city'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['latitude'] = new sfValidatorNumber(array('required' => false));
    $this->validatorSchema['longitude'] = new sfValidatorNumber(array('required' => false));
    $this->validatorSchema['runway_length'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Runway length must be in numner format !'));
    $this->validatorSchema['wing_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['gmt_offset'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'GMT offset must be in numner format !'));
    $this->validatorSchema['dst_offset'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'DST offset must be in numner format !'));
    $this->validatorSchema['zipcode'] = new validatorZipcode(array('required' => false),array('max_length' => 10, 'min_length' => 5));
    $this->validatorSchema['closed'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('airp[%s]');
  }
}
