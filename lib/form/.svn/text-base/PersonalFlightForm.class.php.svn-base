<?php

/**
 * PersonalFlight form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PersonalFlightForm extends BasePersonalFlightForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'pilot_id'       => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInput(array(), array('class' => 'text narrow' , 'maxlength' => 30 )),
      'departure_date' => new widgetFormDate(array('change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'return_date'    => new widgetFormDate(array('change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow')),
      'origin_city'    => new sfWidgetFormInput(array(), array('class' => 'text narrow', 'maxlength' => 30 )),
      'origin_zipcode' => new widgetFormInputZipcode(array(), array('class' => 'text narrow')),
      'destination_city' => new sfWidgetFormInput(array(), array('class' => 'text narrow', 'maxlength' => 30 )),
      'destination_zipcode' => new widgetFormInputZipcode(array(), array('class' => 'text narrow')),
    ));

    $this->widgetSchema->setLabels(array(
      'name' => 'Flight name*',
      'departure_date' => 'Departure date*',
      'return_date' => 'Return date*'
    ));
    //print_r($_POST);
   if($_POST && isset($_POST['personal_flight']['departure_date'])){
        $return_date = $_POST['personal_flight']['departure_date'];
    }else {
        $return_date = 0;
    }
   $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'PersonalFlight', 'column' => 'id', 'required' => false)),
      'pilot_id'       => new sfValidatorPropelChoice(array('model' => 'Pilot', 'column' => 'id')),
      'name'           => new sfValidatorString(array('max_length' => 30 )),
      'departure_date' => new sfValidatorDate(array('required' => true, 'min' => strtotime(date('Y-m-d'))),array('min'=>'The date must not be before current date.')),
      'return_date'    => new sfValidatorDate(array('required' => true, 'min' => strtotime($return_date)),array('min'=>'The date must not be before departure date.')),
      'origin_city'    => new sfValidatorString(array('max_length' => 30 , 'required' => false)),
      'origin_zipcode' => new validatorZipcode(array('required' => false, 'max_length' => 10, 'min_length' => 5)),
      'destination_city' => new sfValidatorString(array('max_length' => 30 , 'required' => false)),
      'destination_zipcode' => new validatorZipcode(array('required' => false, 'max_length' => 10, 'min_length' => 5)),
    ));
   
   $this->widgetSchema->setNameFormat('personal_flight[%s]');
  }
}
