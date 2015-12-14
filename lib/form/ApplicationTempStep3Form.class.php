<?php

/**
 * ApplicationTemp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Ariunbayar
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ApplicationTempStep3Form extends BaseApplicationTempForm
{
  public function configure()
  {
    $own_rent = array(1 => 'Own', 0 => 'Rent');
    $yes_no = array(1 => 'Yes', 0 => 'No');

    $widgets = array(
      'id'                           => new sfWidgetFormInputHidden(),
      'aircraft_primary_id'          => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => 'Please Select', 'method' => 'getMakeModel', 'order_by' => array('Make', 'asc')), array('style'=>'width:200px')),
      'aircraft_primary_own'         => new sfWidgetFormSelectRadio(array('choices' => $own_rent, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_primary_seats'       => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'aircraft_primary_ice'         => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_primary_n_number'    => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'aircraft_secondary_id'        => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => 'Please Select', 'method' => 'getMakeModel', 'order_by' => array('Make', 'asc')), array('style'=>'width:200px')),
      'aircraft_secondary_own'       => new sfWidgetFormSelectRadio(array('choices' => $own_rent, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_secondary_seats'     => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'aircraft_secondary_ice'       => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_secondary_n_number'  => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'aircraft_third_id'        => new sfWidgetFormPropelChoice(array('model' => 'Aircraft', 'add_empty' => 'Please Select', 'method' => 'getMakeModel', 'order_by' => array('Make', 'asc')), array('style'=>'width:200px')),
      'aircraft_third_own'       => new sfWidgetFormSelectRadio(array('choices' => $own_rent, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_third_seats'     => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'aircraft_third_ice'       => new sfWidgetFormSelectRadio(array('choices' => $yes_no, 'formatter' => array($this, 'formatterRaw'))),
      'aircraft_third_n_number'  => new sfWidgetFormInput(array(), array('class' => 'text narrowest')),
      'availability_weekdays'        => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'availability_weeknights'      => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'availability_weekends'        => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'availability_notice'          => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'availability_last_minute'     => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
      'availability_copilot'         => new sfWidgetFormInputCheckbox(array(), array('value' => 1)),
    );

    $labels = array(
      'availability_weekdays'        => 'I am available on Weekdays',
      'availability_weeknights'      => 'I am available Weeknights',
      'availability_weekends'        => 'I am available on Weekends',
      'availability_notice'          => 'I am available only with advanced notice',
      'availability_last_minute'     => 'I am available for last-minute flights',
      'availability_copilot'         => 'I am available as a co-pilot',
    );

    $helps = array(
    );

    $validators = array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'ApplicationTemp', 'column' => 'id', 'required' => false)),
      'aircraft_primary_id'          => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'aircraft_primary_own'         => new sfValidatorChoice(array('choices' => array_keys($own_rent), 'required' => false)),
      'aircraft_primary_ice'         => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'aircraft_primary_seats'       => new sfValidatorInteger(array('required' => false)),
      'aircraft_primary_n_number'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'aircraft_secondary_id'        => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'aircraft_secondary_own'       => new sfValidatorChoice(array('choices' => array_keys($own_rent), 'required' => false)),
      'aircraft_secondary_ice'       => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'aircraft_secondary_seats'     => new sfValidatorInteger(array('required' => false)),
      'aircraft_secondary_n_number'  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'aircraft_third_id'        => new sfValidatorPropelChoice(array('model' => 'Aircraft', 'column' => 'id', 'required' => false)),
      'aircraft_third_own'       => new sfValidatorChoice(array('choices' => array_keys($own_rent), 'required' => false)),
      'aircraft_third_ice'       => new sfValidatorChoice(array('choices' => array_keys($yes_no), 'required' => false)),
      'aircraft_third_seats'     => new sfValidatorInteger(array('required' => false)),
      'aircraft_third_n_number'  => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'availability_weekdays'        => new sfValidatorInteger(array('required' => false)),
      'availability_weeknights'      => new sfValidatorInteger(array('required' => false)),
      'availability_weekends'        => new sfValidatorInteger(array('required' => false)),
      'availability_notice'          => new sfValidatorInteger(array('required' => false)),
      'availability_last_minute'     => new sfValidatorInteger(array('required' => false)),
      'availability_copilot'         => new sfValidatorInteger(array('required' => false)),
    );

    $this->setWidgets($widgets);
    $this->widgetSchema->setLabels($labels);
    $this->widgetSchema->setHelps($helps);
    $this->setValidators($validators);
    $this->widgetSchema->setNameFormat('application[%s]');
    $this->widgetSchema->getFormFormatter()->setHelpFormat('%help%');
  }

//  public function checkCityStateOrZip($validator, $values)
//  {
//    if (empty($values['city']) && empty($values['zipcode']) && empty($values['state']))
//    {
//      $error = new sfValidatorError($this->validatorSchema['city'], 'Please fill at least one');
//      throw new sfValidatorErrorSchema($validator, array('city' => $error));
//    }
//
//    return $values;
//  }

  public function formatterRaw($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input){
      $rows[] = $input['input'].strtr($input['label'], array('<label' => '<label class="raw"'));
    }

    return implode($this->getOption('separator'), $rows);
  }
}
