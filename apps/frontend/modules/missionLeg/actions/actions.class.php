<?php
/**
 * missionLeg actions.
 *
 * @package    angelflight
 * @subpackage missionLeg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class missionLegActions extends sfActions {

   /**
    * Mission Leg
    * CODE:mission_leg_index
    */
   public function executeIndex(sfWebRequest $request)
   {
      #security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $this->sml = $request->getParameter('sml');
      if ($this->sml == 1) {
         $this->pilot1 = PilotPeer::retrieveByPK($request->getParameter('p_id'));
         //$this->pilotname = PersonPeer::retrieveByPK($this->pilot1->getId());
         $mem_idm = $this->pilot1->getMemberId();
         $memberm = MemberPeer::retrieveByPK($mem_idm);
         $this->pilotname = PersonPeer::retrieveByPK($memberm->getPersonId());
         $this->forward404Unless($this->pilot1);
      }

      # for navigation menu
      sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
      slot('nav_menu', array('mission_coord', 'find-camp'));

      # recent item
      $this->getUser()->addRecentItem('Mission Legs', 'mission_legs', 'missionLeg/index');

      # filter
      $this->processFilter($request);
      if ($this->sml == 1) {
         $this->pilot_fname = $this->pilotname->getFirstName();
         $this->pilot_lname = $this->pilotname->getLastName();
      } else {

      }
      if($request->hasParameter ( 'noncoordinatedlegs'))
      {
        $this->pager = MissionLegPeer::getPager(
                 $this->max,
                 $this->page,
                 $this->miss_ext_id,
                 $this->miss_type,
                 $this->miss_date1,
                 $this->miss_date2,
                 $this->pass_fname,
                 $this->pass_lname,
                 $this->mreq_fname,
                 $this->mreq_lname,
                 $this->orgin_airport,
                 $this->orgin_city,
                 $this->orgin_state,
                 $this->dest_airport,
                 $this->dest_city,
                 $this->dest_state,
                 $this->pilot_fname,
                 $this->pilot_lname,
                null,/* Cancelled leg*/
                $notcoordinated = true
         );
        $this->mission_leg_list = $this->pager->getResults();
      }elseif ($request->isMethod('post') || $request->getParameter('page') || $request->hasParameter('max')) {        
         $this->pager = MissionLegPeer::getPager(
                 $this->max,
                 $this->page,
                 $this->miss_ext_id,
                 $this->miss_type,
                 $this->miss_date1,
                 $this->miss_date2,
                 $this->pass_fname,
                 $this->pass_lname,
                 $this->mreq_fname,
                 $this->mreq_lname,
                 $this->orgin_airport,
                 $this->orgin_city,
                 $this->orgin_state,
                 $this->dest_airport,
                 $this->dest_city,
                 $this->dest_state,
                 $this->pilot_fname,
                 $this->pilot_lname                 
         );
         $this->mission_leg_list = $this->pager->getResults();
      }
      $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
   }

   /**
    * Searches for mission legs by filter
    */
   private function processFilter(sfWebRequest $request) {
      $params = $this->getUser()->getAttribute('missionLeg', array(), 'missionLeg');

      if (!isset($params['miss_ext_id']))
         $params['miss_ext_id'] = null;
      if (!isset($params['miss_type']))
         $params['miss_type'] = null;
      if (!isset($params['miss_date1']))
         $params['miss_date1'] = null;
      if (!isset($params['miss_date2']))
         $params['miss_date2'] = null;
      if (!isset($params['pass_fname']))
         $params['pass_fname'] = null;
      if (!isset($params['pass_lname']))
         $params['pass_lname'] = null;
      if (!isset($params['mreq_fname']))
         $params['mreq_fname'] = null;
      if (!isset($params['mreq_lname']))
         $params['mreq_lname'] = null;
      if (!isset($params['orgin_airport']))
         $params['orgin_airport'] = null;
      if (!isset($params['orgin_city']))
         $params['orgin_city'] = null;
      if (!isset($params['orgin_state']))
         $params['orgin_state'] = null;
      if (!isset($params['dest_airport']))
         $params['dest_airport'] = null;
      if (!isset($params['dest_city']))
         $params['dest_city'] = null;
      if (!isset($params['dest_state']))
         $params['dest_state'] = null;
      if (!isset($params['pilot_fname']))
         $params['pilot_fname'] = null;
      if (!isset($params['pilot_lname']))
         $params['pilot_lname'] = null;

      $this->max_array = array(5, 10, 20, 30);

      $this->types = MissionTypePeer::getOnlyNames();

      if (in_array($request->getParameter('max'), $this->max_array)) {
         $params['max'] = $request->getParameter('max');
      } else {
         if (!isset($params['max']))
            $params['max'] = sfConfig::get('app_max_person_per_page', 10);
      }

      if ($request->hasParameter('filter')) {
         $params['miss_ext_id'] = $request->getParameter('miss_ext_id');
         $params['miss_type'] = (in_array($request->getParameter('miss_type'), array_keys($this->types)) ? $request->getParameter('miss_type') : '');
         $params['miss_date1'] = $request->getParameter('miss_date1');
         $params['miss_date2'] = $request->getParameter('miss_date2');
         $params['pass_fname'] = $request->getParameter('pass_fname');
         $params['pass_lname'] = $request->getParameter('pass_lname');
         $params['mreq_fname'] = $request->getParameter('mreq_fname');
         $params['mreq_lname'] = $request->getParameter('mreq_lname');
         $params['orgin_airport'] = $request->getParameter('orgin_airport');
         $params['orgin_city'] = $request->getParameter('orgin_city');
         $params['orgin_state'] = $request->getParameter('orgin_state');
         $params['dest_airport'] = $request->getParameter('dest_airport');
         $params['dest_city'] = $request->getParameter('dest_city');
         $params['dest_state'] = $request->getParameter('dest_state');
         $params['pilot_fname'] = $request->getParameter('pilot_fname');
         $params['pilot_lname'] = $request->getParameter('pilot_lname');
      }

      $this->page = $page = $request->getParameter('page', 1);
      $this->max = $params['max'];
      $this->miss_ext_id = $params['miss_ext_id'];
      $this->miss_type = $params['miss_type'];
      $this->miss_date1 = $params['miss_date1'];
      $this->miss_date2 = $params['miss_date2'];
      $this->pass_fname = $params['pass_fname'];
      $this->pass_lname = $params['pass_lname'];
      $this->mreq_fname = $params['mreq_fname'];
      $this->mreq_lname = $params['mreq_lname'];
      $this->orgin_airport = $params['orgin_airport'];
      $this->orgin_city = $params['orgin_city'];
      $this->orgin_state = $params['orgin_state'];
      $this->dest_airport = $params['dest_airport'];
      $this->dest_city = $params['dest_city'];
      $this->dest_state = $params['dest_state'];
      $this->pilot_fname = $params['pilot_fname'];
      $this->pilot_lname = $params['pilot_lname'];

      $this->getUser()->setAttribute('missionLeg', $params, 'missionLeg');
   }

   /**
    * Mission Leg
    * CODE:mission_leg_view
    */
   public function executeView(sfWebRequest $request)
   {
      #security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
     }

      if ($request->getParameter('id')) {

         $this->leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
         if (isset($this->leg)) {
            $this->mission = MissionPeer::retrieveByPK($this->leg->getMissionId());

            $this->requester = RequesterPeer::retrieveByPK($this->mission->getRequesterId());
            $this->req_person = $this->requester->getPerson();
            $this->agency = $this->requester->getAgency();

            // Camp information
            if($this->mission->getCampId()) {
              $this->camp = CampPeer::retrieveByPK($this->mission->getCampId());
            }
            //Coordinator
            if($this->leg->getCoordinatorId()){
                $this->coordinator = CoordinatorPeer::retrieveByPK($this->leg->getCoordinatorId());

                if($this->coordinator->getMemberId())
                {
                    $this->coordiPerson = PersonPeer::retrieveByPK($this->coordinator->getMember()->getPersonId());
                }
            }
            //print_r($this->coordiPerson);

            if (isset($this->mission)) {
               $this->itinerary = ItineraryPeer::retrieveByPK($this->mission->getItineraryId());
               $pass = PassengerPeer::retrieveByPK($this->mission->getPassengerId());
               //Companions information

               $this->companions = CompanionPeer::getByPassId($this->mission->getPassengerId());

               if (isset($pass) && $pass instanceof Passenger) {
                  $this->pass=$pass;
                  //print_r($this->pass);
                  //die();
                  $this->person = PersonPeer::retrieveByPK($pass->getPersonId());
                  $this->itinerary = $this->mission->getItinerary();

                  // Pre-define addresses for ground missions
                  $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '', 'airport' => '');
                  $this->ground_addr_sel = sfConfig::get('app_ground_address_type', array());
                  if ($this->itinerary) {
                     //$this->ground_addresses['lodging'] = $this->ground_addresses['facility'] = $this->itinerary->getDestCity().', '.$this->itinerary->getDestState();
                  }
               } else {
                  unset($this->passenger);
               }
            }
         }
         if (isset($this->leg) && $this->leg instanceof MissionLeg) {
            if ($this->leg->getPilotId()) {
               $this->pilot = PilotPeer::retrieveByPK($this->leg->getPilotId());
               $this->pilot_member = MemberPeer::retrieveByPK($this->pilot->getMemberId());
               $this->copilot = PilotPeer::retrieveByPK($this->leg->getCoPilotId());
               $this->mission_assistant = PilotPeer::getByMemberId($this->leg->getMissAssisId());

               $this->back_up_mission_assistant = PilotPeer::retrieveByPK($this->leg->getBackupMissAssisId());
            }
         }

         if($this->getUser()->hasAttribute('pilotAddToLegview')){
             $this->getUser()->setFlash("success", 'Pilot is added to this mission leg successfully !');
             $this->getUser()->getAttributeHolder()->remove('pilotAddToLegview');
         }
         
      }
   }
   
   public function executeAutoCompleteCoordinatorSearch(sfWebRequest $request) {
      $this->coordinator_name = $this->getRequestParameter('coordinator_name');
      $this->coordinators = PilotPeer::getByCoordinatorName($this->coordinator_name);
      $this->setLayout(false);
   }
   public function executeAutoCompletePilotSearch(sfWebRequest $request) {
      $this->pilot_name = $this->getRequestParameter('pilot_name');
      $this->pilots = PilotPeer::getByPilotName($this->pilot_name);
      $this->setLayout(false);
   }

   public function executeAutoCompleteBackupPilotSearch(sfWebRequest $request) {
      $this->backup_pilot_name = $this->getRequestParameter('backup_pilot_name');
      $this->pilots = PilotPeer::getByBackupPilotName($this->backup_pilot_name);
      $this->setLayout(false);
   }

   public function executeAutoCompleteBackupCopilotSearch(sfWebRequest $request) {
      $this->backup_copilot_name = $this->getRequestParameter('backup_copilot_name');
      $this->pilots = PilotPeer::getByBackupCopilotName($this->backup_copilot_name);
      $this->setLayout(false);
   }

   public function executeAutoCompleteCopilotSearch(sfWebRequest $request) {
      $this->copilot_name = $this->getRequestParameter('copilot_name');
      $this->pilots = PilotPeer::getByCopilotName($this->copilot_name);
      $this->setLayout(false);
   }

   public function executeAutoCompleteMissionAssistants(sfWebRequest $request) {
      $this->name = $this->getRequestParameter('mission_assistants_name');
      $this->pilots = PilotPeer::getByMissionAssistantsName($this->name);
      $this->setLayout(false);
   }

   public function executeAutoCompleteBackupMissionAssistants(sfWebRequest $request) {
      $this->name = $this->getRequestParameter('backup_mission_assistants_name');
      $this->pilots = PilotPeer::getByBackupMissionAssistantsName($this->name);
      $this->setLayout(false);
   }

   public function executeAutoCompletePilotAircraft(sfWebRequest $request) {
      $this->name = $this->getRequestParameter('pilot_aircraft');
      $this->aircraft = PilotPeer::getByPilotAircraftName($this->name);
      $this->setLayout(false);
   }

   /**
    * Mission Leg Edit
    * CODE: mission_leg_create
    */
   public function executeUpdate(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $this->errors = array(); // for validation
      $this->orig_set = '';
      $this->dest_set = '';
      if ($request->getParameter('id')) {
         $this->title = 'Edit Mission Leg';

         $this->leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));

         if ($this->leg->getFromAirportId()) {
            $this->fromAirport = $this->leg->getAirportRelatedByFromAirportId();
         }
         if ($this->leg->getToAirportId()) {
            $this->toAirport = $this->leg->getAirportRelatedBytoAirportId();
         }
         if ($this->leg->getCoordinatorId()) {
            $this->coordinator = CoordinatorPeer::retrieveByPK($this->leg->getCoordinatorId());
         }
         //print_r($this->coordinator);
         if ($this->leg->getFboId()) {
            $this->fbo = FboPeer::retrieveByPK($this->leg->getFboId());
            $this->fbo_address = $this->leg->getFboId();
         }
         if ($this->leg->getBackupPilotId()) {
            $this->backup_pilot = PilotPeer::retrieveByPK($this->leg->getBackupPilotId());
            if (isset($this->backup_pilot) && $this->backup_pilot instanceof Pilot) {
               $this->bp_person = $this->backup_pilot->getMember()->getPerson();
            }
         }

         if ($this->leg->getBackupCopilotId()) {
            $this->backup_co_pilot = PilotPeer::retrieveByPK($this->leg->getBackupCopilotId());
            if (isset($this->backup_co_pilot) && $this->backup_co_pilot instanceof Pilot) {
               $this->bp_co_person = $this->backup_co_pilot->getMember()->getPerson();
            }
         }
         if ($this->leg->getWaiverReceived()) {
            $this->waiver_rec = $this->leg->getWaiverReceived();
         } else {
            $this->waiver_rec = '';
         }

         if($this->leg->getFboAddressNew()){
            $this->new_fbo_address = $this->leg->getFboAddressNew();
         } else {
             $this->new_fbo_address = '';
         }

         $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
         $this->forward404Unless($this->leg);

         $this->mission = $this->leg->getMission();

         $this->passenger = $this->mission->getPassenger();

         $this->person = $this->passenger->getPerson();

         $this->member = MemberPeer::getByPersonId($this->person->getId());

         /*echo "<pre>";
         print_r($this->member );
         */
         /*
           if(isset($this->member) && $this->member instanceof Member){
           $this->pilot = PilotPeer::getByMemberId($this->member->getId());
           }
           /*
           if(isset($this->leg) && $this->leg instanceof MissionLeg){
           $this->pilot = PilotPeer::retrieveByPK($this->leg->getPilotId());
           }
          *
          */

         if (isset($this->leg) && $this->leg instanceof MissionLeg) {
            if ($this->leg->getPilotId()) {
               $this->pilot = PilotPeer::retrieveByPK($this->leg->getPilotId());
               $this->pilot_member = MemberPeer::retrieveByPK($this->pilot->getMemberId());
               $this->copilot = PilotPeer::retrieveByPK($this->leg->getCoPilotId());              
               //echo "<pre>";
               //print_r($this->mission_assistant);
               $this->back_up_mission_assistant = PilotPeer::retrieveByPK($this->leg->getBackupMissAssisId());
            }
            if($this->leg->getMissAssisId()){
               $this->mission_assistant = PilotPeer::getByMemberId($this->leg->getMissAssisId());
            }
         }
         //echo "<pre>";
         //print_r($this->pilot_member);
         $is_pilot_requested = PilotRequestPeer::getByLegId($this->leg->getId());
         if (isset($is_pilot_requested) && $is_pilot_requested instanceof PilotRequest) {
            $this->p_req = $is_pilot_requested;
         }

         /*
           echo "<pre>";
           print_r($this->person->getId());
           die();
          */

         $this->forward404Unless($this->mission);
         $mission_id = $this->mission->getId();
      } else {
         $this->title = 'Add Mission Leg';
         $this->leg = new MissionLeg();
         $mission_id = $request->hasParameter('mis') ? $request->getParameter('mis') : $request->getParameter('mission_id');
         $this->mission = MissionPeer::retrieveByPK($mission_id);
         $this->forward404Unless($this->mission);
      }

      if ($request->isMethod('post')) {
         if ($request->getParameter('transportation') == 'air_mission') {
            # AIR MISSION
            if ($request->getParameter('orgin_airport')) {
               $o_airport = AirportPeer::getByIdent($request->getParameter('orgin_airport'));
               if (!($o_airport instanceof Airport))
                  $this->errors[] = 'Origin airport not found in database';
            }else {
               $this->errors[] = 'Please specify origin airport';
            }

            if ($request->getParameter('dest_airport')) {
               $d_airport = AirportPeer::getByIdent($request->getParameter('dest_airport'));
               if (!($d_airport instanceof Airport))
                  $this->errors[] = 'Destination airport not found in database';
            }else {
               $this->errors[] = 'Please specify destination airport';
            }

            if (count($this->errors) == 0) {
               $mission_leg = $this->leg;
               $mission_leg->setMissionId($mission_id);
               $mission_leg->setCancelled($request->getParameter('cancelled'));
               if ($mission_leg->isNew())

               $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($mission_id) + 1);
               $mission_leg->setFromAirportId($o_airport->getId());
               $mission_leg->setToAirportId($d_airport->getId());
               $o_air = AirportPeer::retrieveByPK($o_airport->getId());
               $d_air = AirportPeer::retrieveByPK($d_airport->getId());

               $distances = MissionLegPeer::getDistance($o_air->getIdent(), $d_air->getIdent());

               //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
               //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
               $mission_leg->setPassOnBoard(0);
               $mission_leg->setTransportation('air_mission');
               
               $mission_leg->save();
               $id = $mission_leg->getId();
               $leg = MissionLegPeer::retrieveByPK($id);
               $leg->setReverseFrom($id);
               $leg->save();
            }
         }elseif ($request->getParameter('transportation') == 'ground_mission') {
            # GROUND MISSION
            $origin = $request->getParameter('ground_origin');
            $destination = $request->getParameter('ground_destination');
            $orgintset = $request->getParameter('orig_set');
            $desttset = $request->getParameter('dest_set');
            $fbo_address = $request->getParameter('fbo_address');            
            $this->orig_set = $orgintset;
            $this->dest_set = $desttset;
            $this->fbo_address = $fbo_address;
            if (empty($destination) && empty($desttset))
               $this->errors[] = 'Please specify destination address';
            if (empty($origin) && empty($orgintset)) {
               $this->errors[] = 'Please specify origin address';
            } elseif ($destination == $origin && $destination != '') {
               $this->errors[] = 'Origin and Destination addresses conflict';
            }
            if (empty($fbo_address)) {
               $this->errors[] = 'Please specify FBO name';
            }
            if (count($this->errors) == 0) {
               $mission_leg = $this->leg;
               $mission_leg->setMissionId($mission_id);
               if ($mission_leg->isNew())
                  $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($mission_id) + 1);
               $mission_leg->setPassOnBoard(0);
               $mission_leg->setTransportation('ground_mission');
               //get addresses by type

               $p = $this->passenger = $this->mission->getPassenger();
               if ($p instanceof Passenger) {
                  $this->person = $p->getPerson();
               }

               $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '');
               $orgintsetsave = $request->getParameter('ground_origin');
               if (empty($orgintsetsave)) {
                  $orgintsetsave = $request->getParameter('orig_set');
               }
               $desttsetsave = $request->getParameter('ground_destination');
               if (empty($desttsetsave)) {
                  $desttsetsave = $request->getParameter('dest_set');
               }
               $mission_leg->setGroundOrigin($orgintsetsave);
               $mission_leg->setGroundDestination($desttsetsave);
               $mission_leg->setFboId($fbo_address);
               //ziyed
                $fbo_address_new = $request->getParameter('fbo_address_new');
                $mission_leg->setFboAddressNew($fbo_address_new);
               //end ziyed
               $mission_leg->save();
               $id = $mission_leg->getId();
               $leg = MissionLegPeer::retrieveByPK($id);
               $leg->setReverseFrom($id);
               $leg->save();
            }
         } elseif ($request->getParameter('transportation') == 'commercial_mission') {
            # COMMERCIAL MISSION
            $airline_id = $request->getParameter('airline_id');
            if ($airline_id) {
               $custom = $request->getParameter('airline_custom');
               if ($airline_id == 'other') {
                  if (empty($custom))
                     $this->errors[] = 'Please type a new airline name!';
               }else {
                  $airline = AirlinePeer::retrieveByPK($airline_id = $request->getParameter('airline_id'));
                  if (!($airline instanceof Airline))
                     $this->errors[] = 'Please select airline!';
               }
            }else {
               $this->errors[] = 'Please select airline!';
            }
            $origin = $request->getParameter('origin');
            $destination = $request->getParameter('destination');
            if (empty($origin))
               $this->errors[] = 'Please specify origin';
            if (empty($destination))
               $this->errors[] = 'Please specify destination';

            if (count($this->errors) == 0) {
               $flight_time = $request->getParameter('flight_time');
               if (empty($flight_time['hour']) || empty($flight_time['minute']))
                  $flight_time = null;
               $airline_id = $request->getParameter('airline_id');
               if ($airline_id == 'other') {
                  $airline = new Airline();
                  $airline->setName($request->getParameter('airline_custom'));
                  $airline->save();
               } else {
                  $airline = AirlinePeer::retrieveByPK($airline_id);
                  $this->forward404Unless($airline);
               }
               $flight_number = $request->getParameter('flight_number');
               $departure = $request->getParameter('departure');
               $arrival = $request->getParameter('arrival');

               $mission_leg = $this->leg;
               $mission_leg->setMissionId($this->mission->getId());
               if ($mission_leg->isNew())
                  $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($mission_id) + 1);
               $mission_leg->setFlightTime($flight_time ? strtotime($flight_time['hour'] . ':' . $flight_time['minute'] . ' ' . $flight_time['period']) : null);
               //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
               //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
               $mission_leg->setAirlineId($airline->getId());
               $mission_leg->setFundId($request->getParameter('fund_id'));
               $mission_leg->setConfirmCode($request->getParameter('confirm_code'));
               $mission_leg->setFlightCost($request->getParameter('flight_cost'));
               $mission_leg->setCommOrigin($origin);
               $mission_leg->setCommDest($destination);
               $mission_leg->setFlightNumber($flight_number);
               $v = $departure;               
               if (empty($v[0]['hour']) || empty($v[0]['minute']))
                  $v = null;
               $mission_leg->setDeparture($v ? strtotime($v[0]['hour'] . ':' . $v[0]['minute'] . ' ' . $v[0]['period']) : null);
               $v = $arrival;
               if (empty($v[0]['hour']) || empty($v[0]['minute']))
                  $v = null;
               $mission_leg->setArrival($v ? strtotime($v[0]['hour'] . ':' . $v[0]['minute'] . ' ' . $v[0]['period']) : null);
               $mission_leg->setTransportation('commercial_mission');
               $mission_leg->save();
            }
         }else {
            $this->forward404();
         }

         if (count($this->errors) == 0) {
            $this->getUser()->setFlash('success', 'New Mission leg has successfully created!');

            if ($request->getParameter('add_another')) {
               $this->redirect('@leg_create?mis=' . $this->mission->getId());
            } else {
               $this->redirect('@mission_view?id=' . $this->mission->getId());
            }
         }
      }

      $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
      //echo '<pre>';print_r($this->date_widget);
      $this->time_widget = new widgetFormTime();
      $this->airport_list = AirportPeer::getMappable();
      $this->airlines = AirlinePeer::doSelect(new Criteria());
      $this->funds = FundPeer::doSelect(new Criteria());

      $p = $this->passenger = $this->mission->getPassenger();
      if ($p instanceof Passenger) {
         $this->person = $p->getPerson();
      } else {
         unset($this->passenger);
      }

      $this->itinerary = $this->mission->getItinerary();
      //echo '<pre>';print_r($this->itinerary);
      // Pre-define addresses for ground missions
      $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '', 'airport' => '');
      $this->ground_addr_sel = sfConfig::get('app_ground_address_type', array());
      if ($this->itinerary) {
         $this->ground_addresses['lodging'] = $this->ground_addresses['facility'] = $this->itinerary->getDestCity() . ', ' . $this->itinerary->getDestState();
      }
      if ($this->passenger) {
         $this->ground_addresses['lodging'] = $this->passenger->getLodgingName() . ' ' . $this->ground_addresses['lodging'];
         $this->ground_addresses['facility'] = $this->passenger->getFacilityName() . ' ' . $this->ground_addresses['facility'];
         $this->ground_addresses['patient'] = $this->person->getAddress1() . ' '
             . $this->person->getAddress2() . ' '
             . $this->person->getCity() . ', '
             . $this->person->getState() . ' '
             . $this->person->getZipcode();
      }
   }

   /**
    * Mission Leg
    * CODE:mission_leg_delete
    */
   public function executeDelete(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      if ($request->getParameter('id')) {

         $suc = '';
         $suc2 = '';
         $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));

         if (isset($mission_leg)) {
            $has_pilot_req = PilotRequestPeer::getByLegId($mission_leg->getId());
            if (isset($has_pilot_req) && $has_pilot_req instanceof PilotRequest) {

               //try{
               $has_pilot_req->delete();
               $suc = ' And Pilot request #' . $has_pilot_req->getId() . ' has deleted!';
               //}catch (Exception $e){echo "exception-1";}
            }
            $has_discussions = DiscussionPeer::getByLegID($mission_leg->getId());
            if (isset($has_discussions)) {
               foreach ($has_discussions as $dis) {
                  //try{
                  $dis->delete();
                  //}catch (Exception $e){echo "exception-2";}
               }
               $suc2 = ' And Leg\'s Discussion(s) has deleted!';
            }
         }
         if (isset($mission_leg) && $mission_leg instanceof MissionLeg) {
            try {
               $miss_id = $mission_leg->getMissionId();
               $miss_leg_d = $mission_leg->getLegNumber();
               $mission_leg->delete();
               $mission_legs = MissionLegPeer::getbyMissId($miss_id);
               if ($mission_legs) {
                  foreach ($mission_legs as $mleg) {
                     if ($mleg->getLegNumber() > $miss_leg_d) {
                        $mleg->setLegNumber($mleg->getLegNumber() - 1);
                        $mleg->save();
                     }
                  }
               }
            } catch (Exception $e) {
               $this->getUser()->setFlash('warning', "There are related persons to this mission leg. Please remove them first.");
            }
            $this->getUser()->setFlash('success', 'Missin Leg # ' . $mission_leg->getId() . ' has successfully deleted!' . $suc . $suc2);
            //}catch (Exception $e){ echo "exception-3";}
            if ($request->getReferer()) {
               $this->redirect($request->getReferer());
            } else {
               $this->redirect('leg');
            }
         }
      }
   }
   
   //Farazi Leg Pilot Removed Function
   public function executePilotDelete(sfWebRequest $request)
   {
     
     #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      if ($request->getParameter('id')) {
         $suc = '';
         
         $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
        
         if($mission_leg->getPilotId()) {

             $pilot = PilotPeer::retrieveByPK($mission_leg->getPilotId());
             $pilotmember = MemberPeer::retrieveByPK($pilot->getMemberId());

             $pilotPerson=PersonPeer::retrieveByPK($pilotmember->getPersonId());
             //print_r($pilotPerson);
             //die();
             $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
             $missionDate=$mission->getMissionDate();

             $externalID=$mission->getExternalId();
             $legNumber=$mission_leg->getLegNumber();
             $missionLegInfo=$externalID."-".$legNumber;

             // Farazi  18.05.2011
             // Get all pilot request without removed pilot
             $reqPilot =  PilotPeer::retrieveByPK($mission_leg->getPilotId());

             //Get pilot request who was not accepted
             $pilotRequesters = PilotRequestPeer::getNotAcceptedPilots($request->getParameter('id'),$reqPilot->getMemberId());
             if($pilotRequesters){
               $final_emails = array();
                foreach($pilotRequesters as $pilotrequester){
                   // Reopen
                   $pilotrequester->setPilotStatus(1); // 2 Means Pilot Delete 1 Pilot Reopen 3 Decline
                   $pilotrequester->save();

                   $member=MemberPeer::retrieveByPK($pilotrequester->getMemberId());
                   $req_person_email=$member->getPerson()->getEmail();
                   if($req_person_email){
                       $final_emails[] = $req_person_email;
                   }
               }
               if(count($final_emails)){
                //$this->getComponent('mail', 'revivalPilotRequestAck', array('email' => $final_emails,'missionleginfo' => $missionLegInfo,'missiondate' => $missionDate));
               }
             }
             
             

             if (isset($mission_leg)) {
                  
                $mission_leg->setPilotId(NULL);

                if($mission_leg->save())
                {
                   //print_r($pilotPerson->getEmail());
                   //die();
                   if($pilot->getMemberId()) {
                     $pilotReq = PilotRequestPeer::getPilotByRequestersLegIdMemberId($request->getParameter('id'),$pilot->getMemberId());
                     //print_r($pilotRequester);
                     //die();
                    
                     $pilotReq->setAccepted(0);
                     $pilotReq->setProcessed(0);
                     $pilotReq->setPilotStatus(2); // 2 Means Pilot Delete 1 Pilot Reopen 3 Decline
                     $pilotReq->save();
                    
                     // Pilot removed acknowledgement email
                     if($pilotPerson->getEmail()){
                        $this->getComponent('mail', 'removeLegPilotAck', array('email' => $pilotPerson->getEmail(),'missionleginfo' => $missionLegInfo,'missiondate' => $missionDate,'name' => $pilotPerson->getFirstName().' '.$pilotPerson->getLastName()));
                     }
                     $this->getUser()->setFlash('success', 'Pilot has been removed successfully.');
                     return $this->redirect('@leg_edit?id=' . $request->getParameter('id'));
                  }
                }
             }
          }

      }
     

   }

   /**
    * cancel Mission
    */
   public function executeCancelMissionLeg(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      //$request->checkCSRFProtection();
      $this->forward404Unless($mission_leg = MissionLegPeer::retrieveByPk($request->getParameter('id')), sprintf('Object itinerary does not exist (%s).', $request->getParameter('id')));

      $mission_leg = MissionLegPeer::retrieveByPk($request->getParameter('id'));

      if (isset($mission_leg)) {
         $mission_leg->setCancelMissionLeg(0);
         $mission_leg->save();
         $emails_array  = retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToMissionLeg($mission_leg);
         if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $emails_array)){
            $receivers[] = $emails_array;
          }
         //mail
          $text = 'Mission Leg '.$mission_leg->getMissionId().' - '.$mission_leg->getLegNumber().' has been cancelled. Regards, Angel Flight West';
          $this->getComponent('mail', 'itinerary_Mission_MissionLegCancel', array(
              'email' => array_unique($receivers),
              'subject' => 'Angel Flight West Mission Leg cancel information',
              'text' => $text
           ));
      }
      $this->getUser()->setFlash('success', 'The mission leg '.$mission_leg->getMissionId().' - '.$mission_leg->getLegNumber().' has been cancelled successfully.');
      $this->redirect('missionLeg/index');
   }
   

   public function executeSaveComment(sfWebRequest $request) {

      if ($this->getRequest()->getMethod() == sfRequest::POST) {
         $this->mission = MissionPeer::retrieveByPk($this->getRequestParameter('id'));

         if (isset($this->mission) && $this->mission instanceof Mission) {
            if (trim($this->getRequestParameter('value'))) {
               $this->mission->setMissionSpecificComments($this->getRequestParameter('value'));
               $this->mission->save();

               /*$str = <<<XYZ
        <script type="text/javascript">
          window.location.reload();
        </script>
XYZ;*/
              // return $this->renderText($str);
			   return $this->renderText($this->getRequestParameter('value'));
            }
         }
      }
   }

   public function executeEditInPlace(sfWebRequest $request) {

      if ($this->getRequest()->getMethod() == sfRequest::POST) {
         $this->mission = MissionPeer::retrieveByPk($this->getRequestParameter('id'));

         if (isset($this->mission) && $this->mission instanceof Mission) {
            if (trim($this->getRequestParameter('value'))) {
               $this->mission->setMissionSpecificComments($this->getRequestParameter('value'));
               $this->mission->save();

               $str = <<<XYZ
        <script type="text/javascript">
          window.location.reload();
        </script>
XYZ;
               return $this->renderText($str);
            }
         }
      }
   }

   public function executeSave(sfWebRequest $request) {
      if ($request->isMethod('post')) {
         $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
         if (isset($mission_leg) && $mission_leg instanceof MissionLeg) {

            $leg_number = $request->getParameter('leg_number');
            $waiver_rec = $request->getParameter('waiver_rec');
            $coor_web_off = $request->getParameter('coor_web_off');
            $cancel_reason = $request->getParameter('cancel_reason');
            $cancel_comment = $request->getParameter('cancel_comment');
            $co_pilot_wanted = $request->getParameter('cop_wanted');
            $private_coor = $request->getParameter('private_coor_note');
            $public_coor = $request->getParameter('public_coor_note');

            if ($request->getParameter('leg_id')) {
               $leg_id = $request->getParameter('leg_id');

               $is_leg = MissionLegPeer::getByIdNumber($mission_leg->getMissionId(), $leg_number);

               if (isset($is_leg) && $is_leg instanceof MissionLeg) {
                  if ($mission_leg->getLegNumber() != $leg_number) {
                     $this->getUser()->setFlash('success', 'Leg number ' . $leg_number . ' has already used in Leg #' . $request->getParameter('leg_id') . '!');
                     $this->redirect('@leg_edit?id=' . $leg_id);
                  }
               }
            } else {
               $this->redirect($request->getReferer());
            }

            $mission_leg->setLegNumber($leg_number);
            $mission_leg->setWaiverReceived($waiver_rec);

            if ($coor_web_off == 'on') {
               $mission_leg->setWebCoordinated(1);
            } else {
               $mission_leg->setWebCoordinated(0);
            }
            $mission_leg->setCancelled($cancel_reason);
            $mission_leg->setCancelComment($cancel_comment);

            if ($co_pilot_wanted == 'on') {
               $mission_leg->setCopilotWanted(1);
            } else {
               $mission_leg->setCopilotWanted(0);
            }

            if($request->getParameter('coordinator_name') && $request->getParameter('coordinator_id')){

                $coordinator = new Coordinator();
                $coordinator->setMemberId($request->getParameter('coordinator_id'));
                if($coordinator->save())
                {
                     /*$coordinatorPerson=$coordinator->getMember()->getPerson();
                     $eoordiEmail=$coordinatorPerson->getEmail();
                     $legNo=$mission_leg->getLegNumber();
                     $missionExter=$mission_leg->getMission()->getExternalId();
                     $legId=$missionExter."-".$legNo;
                     //echo $legId;
                     if($eoordiEmail){                       
                       $this->getComponent('mail', 'missionCoordinatedAdded', array('email' => $eoordiEmail, 'leg_id' => $legId, 'name' => $coordinatorPerson->getFirstName().' '.$coordinatorPerson->getLastName()));
                     }*/
                }
                
                $codinatorId=$coordinator->getId();                
                $mission_leg->setCoordinatorId($codinatorId);
            }            
            // die();
            // New add 28-02-2011
            
            $pilot_id = $request->getParameter('pilot_id');
            $copilot_id = $request->getParameter('copilot_id');
            $backup_pilot_id = $request->getParameter('backup_pilot_id');
            $backup_copilot_id = $request->getParameter('backup_copilot_id');
            $miss_assis_id = $request->getParameter('miss_assis_id');
            $backup_miss_assis_id = $request->getParameter('backup_miss_assis_id');
            $pilot_aircraft_id = $request->getParameter('pilot_aircraft_id');

            /// Manual add pilot
            if ($request->getParameter('pilot_name') && $pilot_id) {

                $pilotInfo =  PilotPeer::retrieveByPK($pilot_id);
                $memberId = $pilotInfo->getMemberId();
                
                $pilotRequester = PilotRequestPeer::getPilotByRequestersLegIdMemberId($request->getParameter('id'),$memberId);
                
                if(!$pilotRequester){                    
                    // Manual Add pilot request                    
                    $pilot_request = new PilotRequest();
                    $pilot_request->setMemberId($memberId);
                    $pilot_request->setLegId($request->getParameter('id'));
                    $pilot_request->setMissionAssistantWanted(0);
                    $pilot_request->setIfrBackupWanted(0);

                    $pilot_request->setAccepted(1);
                    $pilot_request->setProcessed(1);
                    $pilot_request->setPilotStatus(0);
                    $pilot_request->setOnHold(0);
                    $pilot_request->setComment('Manual Assinged');
                    $pilot_request->setCreatedAt(date('Y-m-d H:i:s'));
                    $pilotReqSave=$pilot_request->save();
                } else {
                    //if pilot exist pilot request will be update
                    $pilotRequester->setAccepted(1);
                    $pilotRequester->setProcessed(1);
                    $pilotRequester->setPilotStatus(0);
                    $pilotRequester->setCreatedAt(date('Y-m-d H:i:s'));
                    $pilotReqSave=$pilotRequester->save();
                }
                
                // Without Accepted pilot all pilot requesters will be decline
                $notAcceptedPilots = PilotRequestPeer::getByRequestersLegIdMemberId($request->getParameter('id'),$memberId);
                if($notAcceptedPilots){
                    foreach($notAcceptedPilots as $pilotrequester){
                        $pilotrequester->setAccepted(0);
                        $pilotrequester->setProcessed(0);
                        $pilotrequester->setPilotStatus(3); // 2 Pilot Delete 1 Pilot Reopen 3 Pilot Decline
                        $pilotrequester->save();

                         // Member information
                         $member = MemberPeer::retrieveByPK($pilotrequester->getMemberId());                         
                         // Person information
                         $person = PersonPeer::retrieveByPK($member->getPersonId());
                         $frist_name= $person->getFirstName();
                         $last_name= $person->getLastName();
                         $name=$frist_name.' '.$last_name;
                         $email= $person->getEmail();
                         // Leg information
                         $legNo=$mission_leg->getLegNumber();
                         $missionExter=$mission_leg->getMission()->getExternalId();
                         $missionDate=$mission_leg->getMission()->getMissionDate();
                         //Send email who will not accepted 
                         if($email) {
                            $this->getComponent('mail', 'pilotRequestNotAccepted', array('email' => $email, 'name' =>$name, 'externalID' =>$missionExter, 'leg_number' =>$legNo, 'missionDate' =>$missionDate));
                        }
                    }
                    
                }
                // added pilot and send email to mission coordinator 
                if($pilotReqSave)
                {
                     $mission_leg->setPilotId($request->getParameter('pilot_id'));

                     $member = MemberPeer::retrieveByPK($memberId);
                     $pilotPerson = PersonPeer::retrieveByPK($member->getPersonId());

                     $pilot_name=$pilotPerson->getTitle()." ".$pilotPerson->getFirstName()." ".$pilotPerson->getLastName();

                     $coordinator = CoordinatorPeer::retrieveByPK($mission_leg->getCoordinatorId());
                     if($coordinator && $coordinator->getMemberId()){
                         $coordinatorPerson= $coordinator->getMember()->getPerson();
                         $coordinatorEmail=$coordinatorPerson->getEmail();
                         
                         $legNo=$mission_leg->getLegNumber();
                         $missionExter=$mission_leg->getMission()->getExternalId();
                         $legId=$missionExter."-".$legNo;
                         //echo $legId;
                         if($coordinatorEmail){                          
                           $this->getComponent('mail', 'missionPilotAdded', array('email' => $coordinatorEmail, 'leg_id' => $legId, 'pilot_name' =>$pilot_name, 'name' => $coordinatorPerson->getTitle().' '.$coordinatorPerson->getFirstName().' '.$coordinatorPerson->getLastName()));
                         }
                     }
                }
                $mission_leg->setPilotId($request->getParameter('pilot_id'));
            }
            if ($copilot_id) {
               $mission_leg->setCopilotId($request->getParameter('copilot_id'));
            }
            if ($backup_pilot_id) {
               $mission_leg->setBackupPilotId($request->getParameter('backup_pilot_id'));
            }
            if ($backup_copilot_id) {
               $mission_leg->setBackupCopilotId($request->getParameter('backup_copilot_id'));
            }
            if ($miss_assis_id) {
               $mission_leg->setMissAssisId($request->getParameter('miss_assis_id'));
            }
            if ($backup_miss_assis_id) {
               $mission_leg->setBackupMissAssisId($request->getParameter('backup_miss_assis_id'));
            }
            if ($pilot_aircraft_id) {
               $mission_leg->setPilotAircraftId($request->getParameter('pilot_aircraft_id'));
            }
            // End

            $mission_leg->setPrivateCNote($private_coor);
            $mission_leg->setPublicCNote($public_coor);
            $mission_leg->setCancelMissionLeg(1);
            $mission_leg->save();

            $this->getUser()->setFlash('success', 'Mission Leg #' . $request->getParameter('leg_id') . ' has edited !');

            if ($request->getParameter('leg_id')) {
               $back = '@leg_view?id=' . $request->getParameter('leg_id');
            } else {
               $back = $request->getReferer();
            }
            $this->redirect($back);
         }
      }
   }

   // AJAX FUNCTION
   public function executeSetSml(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $pilot = PilotPeer::retrieveByPK($request->getParameter('p_id'));
      $this->forward404Unless($pilot);
      $leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
      $this->forward404Unless($leg);

      $leg->setPilotId($pilot->getId());
      $leg->save();
      return sfView::NONE;
   }

   public function executeEmail(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $leg_id = $request->getParameter('leg_id');
      $this->forward404Unless($leg_id, 'Leg is not selected');

      $this->forward('mission', 'email');
   }

   public function executeSendLegEmail(sfWebRequest $request)
   {
      //Send Mission Leg email 
      //Author : Farazi
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $leg_id = $request->getParameter('leg_id');
      
      $this->cover_note = $request->getParameter('message');
      $this->passwelcome_leg_all_otherfax = $request->getParameter('passwelcome_leg_all_otherfax');
      $this->passwelcome_leg_all_otheremail = $request->getParameter('passwelcome_leg_all_otheremail');
      $this->passupdate_leg_all_otherfax = $request->getParameter('passupdate_leg_all_otherfax');
      $this->passupdate_leg_all_otheremail = $request->getParameter('passupdate_leg_all_otheremail');
      $this->req_leg_all_otherfax = $request->getParameter('req_leg_all_otherfax');
      $this->req_leg_all_otheremail = $request->getParameter('req_leg_all_otheremail');
     
    
      $missionLeg=MissionLegPeer::retrieveByPK($leg_id);
      $this->mission_leg = $missionLeg;

      //Get Mission of this leg
      $mission=MissionPeer::retrieveByPK($missionLeg->getMissionId());
      
      $this->person = $mission->getPassenger()->getPerson();
      
      $requester = RequesterPeer::retrieveByPK($mission->getRequesterId());
      $this->requesterPerson = PersonPeer::retrieveByPK($requester->getPersonId());
      //Get all leg by mission ID
      
      $this->allMissionLegs = MissionLegPeer::getAllMissionLegByMissionId($missionLeg->getMissionId());
      
      if($request->isMethod('post')){

         $leg_id = $request->getParameter('leg_id');
         $missionLeg=MissionLegPeer::retrieveByPK($leg_id);
         $mission=MissionPeer::retrieveByPK($missionLeg->getMissionId());
         
         $miss_passenger=$mission->getPassenger();
         if($miss_passenger->getPassengerType()->getName())
         {
           $type_name=$miss_passenger->getPassengerType()->getName();
         }

         $allMissionLegs=MissionLegPeer::getAllMissionLegByMissionId($missionLeg->getMissionId());

            $emails  = $request->getParameter('emails');
            $emails_array = $emails;
            $final_emails = array();
            foreach($emails as $key => $email){
              if($email == 1){
                $key = str_replace('ch_', '', $key);
                if(array_key_exists($key, $emails_array)){
                  if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $emails_array[$key])){
                    $final_emails[] = $emails_array[$key];
                  }
                }
              }
                 
        }
        
        if(!count($final_emails)){
             $this->getUser()->setFlash('error', 'No recipients selected. Please select at least one recipient!');
             $this->redirect($request->getReferer());
        }
        
        $cover_note=$request->getParameter('message');
       /*
       if($leg_id) {
          $this->message .= '<hr/>'.$this->getComponent('missionLeg', 'includedMissionsLegTemplate', array('mission_leg' => $missionLeg,'mission_legs' => $allMissionLegs, 'cover_note'=>$cover_note));
       }*/

       if($leg_id) {
          $this->message .= '<hr/>'.$this->getComponent('missionLeg', 'includedMissionsItineraryTemplate', array('mission_leg' => $missionLeg,'mission_legs' => $allMissionLegs, 'cover_note'=>$cover_note));
       } 

       /*
       echo "<pre>";
       print_r($this->message);
       die();
       */
       
       //attachec  waiver file
       if($request->getParameter('waiver')==1)
       {
          $files= 1;
       }
       
       $this->getComponent('mail', 'missionInfoToRecipients', array(
          'recievers' => $final_emails,          
          'body' => $this->message,
          'files' => isset($files) ? $files : 0,
          'type_name' => $type_name,
        ));
       
       $this->getUser()->setFlash('success', 'Mission form email has send successfully!');
       $this->redirect($request->getReferer());

      }
   }

   public function executePrintMissionLeg(sfWebRequest $request)
   {
      #Security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      if ($request->getParameter('id')) {

         $this->leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
         if (isset($this->leg)) {
            $this->mission = MissionPeer::retrieveByPK($this->leg->getMissionId());           
            $this->requester = RequesterPeer::retrieveByPK($this->mission->getRequesterId());
            $this->req_person = $this->requester->getPerson();
            $this->agency = $this->requester->getAgency();

            // Camp information
            if($this->mission->getCampId()) {
              $this->camp = CampPeer::retrieveByPK($this->mission->getCampId());
            }
            //Coordinator
            if($this->mission->getCoordinatorId()){
                $this->coordinator = CoordinatorPeer::retrieveByPK($this->mission->getCoordinatorId());
                $this->coordiPerson = PersonPeer::retrieveByPK($this->coordinator->getMember()->getPersonId());
            }

            if (isset($this->mission)) {
               $this->itinerary = ItineraryPeer::retrieveByPK($this->mission->getItineraryId());
               $pass = PassengerPeer::retrieveByPK($this->mission->getPassengerId());
               //Companions information
               
               $this->companions = CompanionPeer::getByPassId($this->mission->getPassengerId());
              
               if (isset($pass) && $pass instanceof Passenger) {
                  $this->pass=$pass;                  
                  //print_r($this->pass);
                  //die();
                  $this->person = PersonPeer::retrieveByPK($pass->getPersonId());
                  $this->itinerary = $this->mission->getItinerary();
                
                  // Pre-define addresses for ground missions
                  $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '', 'airport' => '');
                  $this->ground_addr_sel = sfConfig::get('app_ground_address_type', array());
                  if ($this->itinerary) {
                     //$this->ground_addresses['lodging'] = $this->ground_addresses['facility'] = $this->itinerary->getDestCity().', '.$this->itinerary->getDestState();
                  }
               } else {
                  unset($this->passenger);
               }
            }
         }

         if (isset($this->leg) && $this->leg instanceof MissionLeg) {
            if ($this->leg->getPilotId()) {
               $this->pilot = PilotPeer::retrieveByPK($this->leg->getPilotId());
               $this->pilot_member = MemberPeer::retrieveByPK($this->pilot->getMemberId());
               $this->copilot = PilotPeer::retrieveByPK($this->leg->getCoPilotId());
               $this->mission_assistant = PilotPeer::getByMemberId($this->leg->getMissAssisId());

               $this->back_up_mission_assistant = PilotPeer::retrieveByPK($this->leg->getBackupMissAssisId());
            }
         }
         
         if($this->getUser()->hasAttribute('pilotAddToLegview')){
             $this->getUser()->setFlash("success", 'Pilot is added to this mission leg successfully !');
             $this->getUser()->getAttributeHolder()->remove('pilotAddToLegview');
         }
      }     

   }
   
   /// End Send leg email
   public function executeAutoCompleteFirstP() {
      $this->keyword = $this->getRequestParameter('pass_fname');
      $this->persons = PersonPeer::getFirstNames($this->keyword, 'missionLegP');
   }

   public function executeAutoCompleteLastP() {
      $this->keyword = $this->getRequestParameter('pass_lname');
      $this->persons = PersonPeer::getLastNames($this->keyword, 'missionLegP');
   }

   public function executeAutoCompleteFirstR() {
      $this->keyword = $this->getRequestParameter('mreq_fname');
      $this->persons = PersonPeer::getFirstNames($this->keyword, 'missionLegR');
   }

   public function executeAutoCompleteLastR() {
      $this->keyword = $this->getRequestParameter('mreq_lname');
      $this->persons = PersonPeer::getLastNames($this->keyword, 'missionLegR');
   }

   public function executeAutoCompleteFirstPi() {
      $this->keyword = $this->getRequestParameter('pilot_fname');
      $this->persons = PersonPeer::getFirstNames($this->keyword, 'missionLegPi');
   }

   public function executeAutoCompleteLastPi() {
      $this->keyword = $this->getRequestParameter('pilot_lname');
      $this->persons = PersonPeer::getLastNames($this->keyword, 'missionLegPi');
   }

   public function executeIndexCancelled(sfWebRequest $request)
   {
      #security
      if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
     }

      # for navigation menu
      sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
      slot('nav_menu', array('mission_coord', 'find-camp'));

      # recent item
      $this->getUser()->addRecentItem('Mission Legs', 'mission_legs', 'missionLeg/index');
      $cancel = 1;
      # filter
      $this->processFilter($request);

      $this->pager = MissionLegPeer::getPager(
              $this->max,
              $this->page,
              $this->miss_ext_id,
              $this->miss_type,
              $this->miss_date1,
              $this->miss_date2,
              $this->pass_fname,
              $this->pass_lname,
              $this->mreq_fname,
              $this->mreq_lname,
              $this->orgin_airport,
              $this->orgin_city,
              $this->orgin_state,
              $this->dest_airport,
              $this->dest_city,
              $this->dest_state,
              $this->pilot_fname,
              $this->pilot_lname,
              $cancel
      );
      $this->mission_leg_list = $this->pager->getResults();
      $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
   }

}
