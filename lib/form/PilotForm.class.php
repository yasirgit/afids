<?php

/**
 * Pilot form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PilotForm extends BasePilotForm
{
  public function configure()
  {
    unset($this['id'],$this['secondary_home_bases'],$this['member_id'],$this['oriented_member_id'],$this['oriented_date'],$this['mop_oriented_member_id'],$this['mop_oriented_date'],$this['mop_regions_served'],$this['mop_qualifications']);

    $airports = AirportPeer::getForSelectParent();

    # Fields
    //    $this->widgetSchema['primary_airport_id'] = new sfWidgetFormChoice(array('choices' => $airports),array('class'=>'text'));
    $this->widgetSchema['secondary_home_bases'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['total_hours'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['license_type'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['ifr'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['multi_engine'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    $this->widgetSchema['se_instructor'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['me_instructor'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['other_ratings'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['insurance_received'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    //    $this->widgetSchema['oriented_member_id'] = new sfWidgetFormInput();
    $this->widgetSchema['oriented_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    //    $this->widgetSchema['mop_oriented_member_id'] = new sfWidgetFormInput();
    $this->widgetSchema['mop_oriented_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    //$this->widgetSchema['mop_regions_served'] = new sfWidgetFormInput();
    //    $this->widgetSchema['mop_qualifications'] = new sfWidgetFormInput();
    $this->widgetSchema['hseats'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['transplant'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    //    $this->widgetSchema->setLabels(array('primary_airport_id' => 'Primary Airport Ident'));
    $this->widgetSchema->setLabels(array('secondary_home_bases' => 'Secondary Home Bases'));
    $this->widgetSchema->setLabels(array('total_hours' => 'Total Hours'));
    $this->widgetSchema->setLabels(array('license_type' => 'License Type'));
    $this->widgetSchema->setLabels(array('ifr' => 'Ifr'));
    $this->widgetSchema->setLabels(array('multi_engine' => 'Multi Engine'));
    $this->widgetSchema->setLabels(array('se_instructor' => 'Se Instructor'));
    $this->widgetSchema->setLabels(array('me_instructor' => 'Me Instructor'));
    $this->widgetSchema->setLabels(array('other_ratings' => 'Other Ratings'));
    $this->widgetSchema->setLabels(array('insurance_received' => 'Insurance Received'));
    //    $this->widgetSchema->setLabels(array('oriented_member_id' => 'Oriented Member Id'));
    $this->widgetSchema->setLabels(array('oriented_date' => 'Oriented Date'));
    //    $this->widgetSchema->setLabels(array('mop_oriented_member_id' => 'Mop Oriented Member Id'));
    $this->widgetSchema->setLabels(array('mop_oriented_date' => 'Mop Oriented Date'));
    //$this->widgetSchema->setLabels(array('mop_regions_served' => 'Regions Served'));
    //    $this->widgetSchema->setLabels(array('mop_qualifications' => 'Mop Qualifications'));
    $this->widgetSchema->setLabels(array('hseats' => 'Seats'));
    $this->widgetSchema->setLabels(array('transplant' => 'Transplant'));

    //    $this->validatorSchema['primary_airport_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['secondary_home_bases'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['total_hours'] = new sfValidatorInteger(array('required' => false),array('invalid'=>'Total hours must be in number format !'));
    $this->validatorSchema['license_type'] = new sfValidatorString(array('required' => true),array('required'=>'Please confirm licence type'));
    $this->validatorSchema['ifr'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['multi_engine'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['se_instructor'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['me_instructor'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['other_ratings'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['insurance_received'] = new sfValidatorDate(array('required' => false),array('invalid'=>'Insurance received date invalid !.'));
    //    $this->validatorSchema['oriented_member_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['oriented_date'] = new sfValidatorDate(array('required' => false),array('invalid'=>'Oriented date invalid !.'));
    //    $this->validatorSchema['mop_oriented_member_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['mop_oriented_date'] = new sfValidatorDate(array('required' => false),array('invalid'=>'MOP Oriented date invalid !.'));
    //$this->validatorSchema['mop_regions_served'] = new sfValidatorString(array('required' => true));
    //    $this->validatorSchema['mop_qualifications'] = new sfValidatorString(array('required' => true));
    $this->validatorSchema['hseats'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['transplant'] = new sfValidatorInteger(array('required' => false));

    $this->widgetSchema->setNameFormat('pilo[%s]');
  }
}
