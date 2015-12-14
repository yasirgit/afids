<?php

/**
 * PilotAircraft form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PilotAircraftForm extends BasePilotAircraftForm
{
  public function configure()
  {
    $aircrafts = AircraftPeer::getForSelectParent();
    $this->widgetSchema['member_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['aircraft_id'] = new sfWidgetFormChoice(array('choices' => $aircrafts), array('class'=>'text narrow'));
    $this->widgetSchema['n_number'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['own'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['seats'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['known_ice'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema->setLabels(array('aircraft_id' => 'Aircraft'));
    $this->widgetSchema->setLabels(array('n_number' => 'Tail Number'));
    $this->widgetSchema->setLabels(array('own' => 'Own'));
    $this->widgetSchema->setLabels(array('seats' => 'Seats'));
    $this->widgetSchema->setLabels(array('known_ice' => 'Known Ice'));

    unset($aircrafts[0]);
    $this->validatorSchema['aircraft_id'] = new sfValidatorChoice(array('choices' => array_keys($aircrafts)));
    $this->validatorSchema['own'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['known_ice'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['n_number'] = new sfValidatorString(array('required' => false), array('required'=>'required!!!'));
    $this->validatorSchema['seats'] = new sfValidatorInteger(array('required' => false), array('required'=>"required!!!", 'invalid'=>'not number'));
    $this->widgetSchema->setNameFormat('pilot_aircraft[%s]');
    
  }
}
