<?php

/**
 * PassengerType form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PassengerTypeForm extends BasePassengerTypeForm
{
  public function configure()
  {
    unset($this['id']);

    # Fields
    $this->widgetSchema['name'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    $this->widgetSchema->setLabels(array('name' => 'Name'));
   
    $this->validatorSchema['name'] = new sfValidatorString(array('required' => true),array('required'=>'Name is required !'));
   
    $this->widgetSchema->setNameFormat('pType[%s]');
  }
}
