<?php

/**
 * Aircraft form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class AircraftForm extends BaseAircraftForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['make'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['model'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['faa'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['engines'] =  new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['def_seats'] =  new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['speed'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['pressurized'] =  new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['cost'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['range'] =new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['ac_load'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema->setLabels(array('make' => 'Make'));
    $this->widgetSchema->setLabels(array('model' => 'Model'));
    $this->widgetSchema->setLabels(array('name' => 'Name'));
    $this->widgetSchema->setLabels(array('faa' => 'FAA'));
    $this->widgetSchema->setLabels(array('engines' => 'Engines'));
    $this->widgetSchema->setLabels(array('def_seats' => 'Def seats'));
    $this->widgetSchema->setLabels(array('speed' => 'Speed'));
    $this->widgetSchema->setLabels(array('pressurized' => 'Pressurized'));
    $this->widgetSchema->setLabels(array('cost' => 'cost'));
    $this->widgetSchema->setLabels(array('range' => 'Ranges'));
    $this->widgetSchema->setLabels(array('ac_load' => 'Ac load'));

    $this->validatorSchema['make'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['model'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['faa'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['engines'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['def_seats'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['speed'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Speed must be in number format !'));
    $this->validatorSchema['pressurized'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['cost'] = new sfValidatorInteger(array('required' => true),array('required'=>'Please confirm a cost !','invalid'=>'Cost must be in number format !'));
    $this->validatorSchema['range'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Range must be in number format !'));
    $this->validatorSchema['ac_load'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Ac load must be in number format !'));

    $this->widgetSchema->setNameFormat('craft[%s]');
  }
}
