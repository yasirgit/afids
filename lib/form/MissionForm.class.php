<?php
/**
 * Mission form.
 *
 * @package    angelflight
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class MissionForm extends BaseMissionForm
{
  public function configure()
  {
    unset(
    $this['external_id'],
    $this['request_id'],
    $this['itinerary_id'],
    $this['other_requester_id'],
    $this['other_agency_id']
    );

    $miss_types = MissionTypePeer::getNames();
    //$passes = PassengerPeer::getForSelectParent();
    //$reqs = RequesterPeer::getForSelectParent();
    //$agencies = AgencyPeer::getForSelectParent();
    //$camps = CampPeer::getForSelectParent();
    $coors = CoordinatorPeer::getForSelectParent();//return person_id
    
    # Fields
    $this->widgetSchema['mission_type_id'] = new sfWidgetFormSelect(array('choices'=>$miss_types));
    $this->widgetSchema['mission_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['date_requested'] = new sfWidgetFormInput(array(), array('class' => 'text','class'=>'text narrow'));
    //$this->widgetSchema['passenger_id'] = new sfWidgetFormSelect(array('choices'=>$passes));
   // $this->widgetSchema['requester_id'] = new sfWidgetFormSelect(array('choices'=>$reqs));
   // $this->widgetSchema['agency_id'] = new sfWidgetFormSelect(array('choices'=>$agencies));
   // $this->widgetSchema['camp_id'] = new sfWidgetFormSelect(array('choices'=>$camps));
    $this->widgetSchema['coordinator_id'] = new sfWidgetFormSelect(array('choices'=>$coors));
    $this->widgetSchema['appt_date'] = new widgetFormDate(array('change_year' => true, 'change_month' => true, 'format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text narrow'));
    $this->widgetSchema['flight_time'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['treatment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['comment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['appointment'] = new sfWidgetFormInput(array(), array('class' => 'text narrow'));
    $this->widgetSchema['mission_specific_comments'] = new sfWidgetFormTextarea(array(), array('class' => 'text'));
    $this->widgetSchema['cancel_mission'] = new sfWidgetFormChoice(array('choices'  => array("cancel", "activate"),'expanded' => true));

    # Labels
    $this->widgetSchema->setLabels(array('mission_type_id' => 'Mission type'));
    $this->widgetSchema->setLabels(array('mission_date' => 'Mission Date'));
    $this->widgetSchema->setLabels(array('date_requested' => 'Date Requested'));
    //$this->widgetSchema->setLabels(array('passenger_id' => 'Passenger'));
    //$this->widgetSchema->setLabels(array('requester_id' => 'Requester'));
   // $this->widgetSchema->setLabels(array('agency_id' => 'Agency'));
    //$this->widgetSchema->setLabels(array('camp_id' => 'Camp'));
    $this->widgetSchema->setLabels(array('coordinator_id' => 'Coordinator'));
    $this->widgetSchema->setLabels(array('appt_date' => 'Appointment Date'));
    $this->widgetSchema->setLabels(array('flight_time' => 'Flight Time'));
    $this->widgetSchema->setLabels(array('treatment' => 'Treatment'));
    $this->widgetSchema->setLabels(array('comment' => 'Comment'));
    $this->widgetSchema->setLabels(array('appointment' => 'Appointment'));
    $this->widgetSchema->setLabels(array('mission_specific_comments' => 'Specific Comment'));
    $this->widgetSchema->setLabels(array('cancel_mission' => 'Cancel Mission'));
   

    # Validation
    $this->validatorSchema['mission_type_id'] = new sfValidatorString(array('required' => true),array('required'=>'Please choice Mission Type !'));
    $this->validatorSchema['mission_date'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['date_requested'] = new sfValidatorString(array('required' => true), array('required' => 'Please confirm date requested !'));
    //$this->validatorSchema['passenger_id'] = new sfValidatorInteger(array('required' => false));
    //$this->validatorSchema['requester_id'] = new sfValidatorInteger(array('required' => false));
   // $this->validatorSchema['agency_id'] = new sfValidatorInteger(array('required' => false));
    //$this->validatorSchema['camp_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['coordinator_id'] = new sfValidatorInteger(array('required' => false));
    $this->validatorSchema['appt_date'] = new sfValidatorDate(array('required' => false),array('invalid'=> 'Date of birth is invalid !.'));
    $this->validatorSchema['flight_time'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['treatment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['comment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['appointment'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['mission_specific_comments'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['cancel_mission'] = new sfValidatorInteger(array('required' => false));
  
    # Descriptive message

    $this->widgetSchema->setNameFormat('mission_edit[%s]');
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
