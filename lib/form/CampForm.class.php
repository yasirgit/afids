<?php
/**
 * Camp form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Javzaa
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CampForm extends BaseCampForm
{
  public function configure()
  {
    unset($this['id'],$this['agency_id'],$this['fbo_id'],$this['camp_phone'],$this['camp_phone_comment'],$this['lodging_name'],$this['lodging_phone'],$this['lodging_phone_comment'],$this['flight_information']);

    # Fields
    //    $this->widgetSchema['agency_id'] = new sfWidgetFormPropelChoice(array('model' => 'Agency', 'add_empty' => '-- select --', 'method' => 'getName'),array('class'=>'text'));
    //    $this->widgetSchema['airport_id'] = new sfWidgetFormPropelChoice(array('model' => 'Airport', 'add_empty' => '-- select --', 'method' => 'getIdent'),array('class'=>'text narrow'));

    $this->widgetSchema['session'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['camp_name'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    $this->widgetSchema['departure_date'] =  new widgetFormDateTimeCustom(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['arrival_date'] =  new widgetFormDateTimeCustom(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['comment'] = new sfWidgetFormTextarea(array(), array('class'=>'text'));
    $this->widgetSchema['arrival_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['departure_comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));

    //    $this->widgetSchema->setLabels(array('agency_id' => 'Agency'));
    //    $this->widgetSchema->setLabels(array('airport_id' => 'Airport identifier'));
    $this->widgetSchema->setLabels(array('camp_name' => 'Camp Name'));
    $this->widgetSchema->setLabels(array('arrival_date' => 'Arrival Date'));
    $this->widgetSchema->setLabels(array('departure_date' => 'Departure Date'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('session' => 'Session'));

    $this->validatorSchema['session'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['camp_name'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['arrival_date'] = new validatorDateTimeCustom(array('required' => false),array('invalid'=>'Arrival Date is invalid !.'));
    $this->validatorSchema['departure_date'] = new validatorDateTimeCustom(array('required' => false),array('invalid'=>'Departure Date is invalid !.'));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['arrival_comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['departure_comment'] = new sfValidatorString(array('required' => false));

    $this->widgetSchema->setNameFormat('camp[%s]');
  }
}