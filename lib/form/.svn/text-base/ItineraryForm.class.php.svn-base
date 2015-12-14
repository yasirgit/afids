<?php

/**
 * Itinerary form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ItineraryForm extends BaseItineraryForm
{
  public function configure()
  {
    unset(
      $this['facility'],
      $this['lodging'],
      $this['dest_city'],
      $this['dest_state'],
      $this['orgin_city'],
      $this['orgin_state'],
      $this['passenger_id'],
      $this['requester_id'],
      $this['id'],
      $this['agency_id'],
      $this['camp_id'],
      $this['leg_id'],
      $this['_csrf_token'],
      $this['mission_request_id'],
      $this['waiver_need'],
      $this['need_medical_release']
    );

    $mission_types= MissionTypePeer::getNames();
    //    $passengers= PassengerPeer::getForSelectParent();
    //    $requesters= RequesterPeer::getForSelectParent();
    $appoints = array_merge(array(''=>'Unspecified'), sfConfig::get('app_appoints', array('morning'=>'Morning','noon'=>'Noon','afternoon'=>'Afternoon','evening'=>'Evening','exact_time'=>'Exact Time')));
    $states = sfConfig::get('app_states', array('AL'=>'Alabama', 'AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware'));
    $timetypes = array('am'=>'am', 'pm'=>'pm');

    $this->widgetSchema['date_requested'] =  new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['mission_type_id'] = new sfWidgetFormSelect(array('choices'=>$mission_types),array('class'=>'text narrow'));
    $this->widgetSchema['apoint_time'] = new sfWidgetFormSelect(array('choices'=>$appoints),array('class'=>'text', 'style'=>'width: 90px;', 'onchange'=>'selectTimes()'));
    $this->widgetSchema['timetype'] = new sfWidgetFormSelect(array('choices'=>$timetypes),array('class'=>'text', 'style'=>'width: 50px;'));
    //    $this->widgetSchema['passenger_id'] = new sfWidgetFormSelect(array('choices'=>$passengers),array('class'=>'text narrow'));
    //    $this->widgetSchema['requester_id'] = new sfWidgetFormSelect(array('choices'=>$requesters),array('class'=>'text narrow'));
    //    $this->widgetSchema['facility'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    //    $this->widgetSchema['lodging'] = new sfWidgetFormInput(array(), array('class' => 'text'));
    //    $this->widgetSchema['orgin_city'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    //    $this->widgetSchema['orgin_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));
    //    $this->widgetSchema['dest_city'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    //    $this->widgetSchema['dest_state'] = new sfWidgetFormSelect(array('choices'=>$states),array('class'=>'text narrow'));
    //echo (bool) $this->getObject()->getWaiverNeed();
    //die() ;

    //$this->widgetSchema['waiver_need'] = new sfWidgetFormInputCheckbox(array(), array('value' => 1));
    //$this->widgetSchema['need_medical_release'] =new sfWidgetFormInputCheckbox(array(), array('value' => 1));

    $this->widgetSchema['comment'] = new sfWidgetFormTextarea(array(),array('class'=>'text'));
    $this->widgetSchema['cancel_itinerary'] = new sfWidgetFormChoice(array('choices'  => array("Yes", "No"),'expanded' => true));

    $this->widgetSchema->setLabels(array('date_requested' => 'Date Requested:'));
    $this->widgetSchema->setLabels(array('mission_type_id' => 'Mission Type:'));
    $this->widgetSchema->setLabels(array('apoint_time' => 'Appointment Time:'));
    //    $this->widgetSchema->setLabels(array('passenger_id' => 'Passenger'));
    //    $this->widgetSchema->setLabels(array('requester_id' => 'Requester'));
    //    $this->widgetSchema->setLabels(array('facility' => 'Facility'));
    //    $this->widgetSchema->setLabels(array('lodging' => 'Lodging'));
    //    $this->widgetSchema->setLabels(array('orgin_city' => 'Orgin City'));
    //    $this->widgetSchema->setLabels(array('orgin_state' => 'Orgin State'));
    //    $this->widgetSchema->setLabels(array('dest_city' => 'Dest City'));
    //    $this->widgetSchema->setLabels(array('dest_state' => 'Dest State'));
    //$this->widgetSchema->setLabels(array('waiver_need' => 'Waiver required from pilot?'));
    //$this->widgetSchema->setLabels(array('need_medical_release' => 'Medical release needed?'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('cancel_itinerary' => 'Cancel Itinerary'));

    $this->validatorSchema['date_requested'] = new sfValidatorDate(array('required' => true),array('invalid'=> 'Requested Date is invalid !.','required'=>'Please confirm date requested !'));
    $this->validatorSchema['mission_type_id'] = new sfValidatorString(array('required' => true),array('required'=>'Please choose Mission Type !'));
    $this->validatorSchema['apoint_time'] = new sfValidatorString(array('required' => false),array('required'=>'Please choose appoint time !'));
    $this->validatorSchema['cancel_itinerary'] = new sfValidatorInteger(array('required' => false));
    //    $this->validatorSchema['passenger_id'] = new sfValidatorString(array('required' => true),array('required'=>'Please choice Passenger !'));
    //    $this->validatorSchema['requester_id'] = new sfValidatorString(array('required' => true),array('required'=>'Please choice Requester !'));
    //    $this->validatorSchema['facility'] = new sfValidatorString(array('required' => false));
    //    $this->validatorSchema['lodging'] = new sfValidatorString(array('required' => false));
    //    $this->validatorSchema['orgin_city'] = new sfValidatorString(array('required' => false));
    //    $this->validatorSchema['orgin_state'] = new sfValidatorString(array('required' => false));
    //    $this->validatorSchema['dest_city'] = new sfValidatorString(array('required' => false));
    //    $this->validatorSchema['dest_state'] = new sfValidatorString(array('required' => false));
    //$this->validatorSchema['waiver_need'] = new sfValidatorString(array('required' => false));
    //$this->validatorSchema['need_medical_release'] = new sfValidatorString(array('required' => false));
    
    $this->setDefault('date_requested', date("m/d/y"));

    $this->widgetSchema->setNameFormat('itine[%s]');
  }
}
