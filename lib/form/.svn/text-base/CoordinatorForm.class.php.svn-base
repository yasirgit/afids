<?php

/**
 * Coordinator form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CoordinatorForm extends BaseCoordinatorForm
{
  public function configure()
  {
    unset($this['id'],$this['lead_id'],$this['member_id']);

    //fields
    $this->widgetSchema['coor_of_the_week'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['coor_week_date'] = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['initial_contact'] = new sfWidgetFormInput(array(), array('class' => 'text'));

    //labels
    $this->widgetSchema->setLabel(array('coor_of_the_week'=>'Coordination of the week'));
    $this->widgetSchema->setLabel(array('coor_week_date'=>'Coordination week date'));
    $this->widgetSchema->setLabel(array('initial_contact'=>'Initial contact'));

    //validations
    $this->validatorSchema['coor_of_the_week'] = new sfValidatorInteger(array('required'=>false));
    $this->validatorSchema['coor_week_date'] =  new sfValidatorDate(array('max' => time(),'required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['initial_contact'] = new sfValidatorString(array('required'=>false));

    $this->widgetSchema->setNameFormat('coor[%s]');

  }
}
