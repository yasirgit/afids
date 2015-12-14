<?php
/**
 * camp actions.
 *
 * @package    angelflight
 * @subpackage camp
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class campActions extends sfActions
{
  /**
   * Searches for camps
   * CODE:camp_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find-camp'));

    # recent item
    $this->getUser()->addRecentItem('Camps', 'camps', 'camp/index');

    # filter
    $this->processFilter($request);

    if($request->isMethod('post') || $request->getParameter('page') || $request->hasParameter('showlist')){
        $this->pager = CampPeer::getPager(
        $this->max,
        $this->page,
        $this->camp_name,
        $this->agency_name,
        $this->agency_city,
        $this->agency_state,
        $this->agency_country,
        $this->airport_ident,
        $this->airport_city,
        $this->airport_state
        );
        $this->camps = $this->pager->getResults();
    }
  }

  /**
   * Searches for camps by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('camp', array(), 'person');

    if(!isset($params['camp_name'])) $params['camp_name'] = null;
    if(!isset($params['agency_name'])) $params['agency_name'] = null;
    if(!isset($params['agency_city'])) $params['agency_city'] = null;
    if(!isset($params['agency_state'])) $params['agency_state'] = null;
    if(!isset($params['agency_country'])) $params['agency_country'] = null;
    if(!isset($params['airport_ident'])) $params['airport_ident'] = null;
    if(!isset($params['airport_city'])) $params['airport_city'] = null;
    if(!isset($params['airport_state'])) $params['airport_state'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = AgencyPeer::getCounties();

    if(in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if(!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if($request->hasParameter('filter')) {
      $params['camp_name']      = $request->getParameter('camp_name');
      $params['agency_name']       = $request->getParameter('agency_name');
      $params['agency_city']       = $request->getParameter('agency_city');
      $params['agency_state']       = $request->getParameter('agency_state');
      $params['agency_country']       = $request->getParameter('agency_country');
      $params['airport_ident']       = $request->getParameter('airport_ident');
      $params['airport_city']       = $request->getParameter('airport_city');
      $params['airport_state']       = $request->getParameter('airport_state');
    }

    $this->page                = $page = $request->getParameter('page', 1);
    $this->max                 = $params['max'];
    $this->camp_name           = $params['camp_name'];
    $this->agency_name         = $params['agency_name'];
    $this->agency_city         = $params['agency_city'];
    $this->agency_state        = $params['agency_state'];
    $this->agency_country      = $params['agency_country'];
    $this->airport_ident       = $params['airport_ident'];
    $this->airport_city        = $params['airport_city'];
    $this->airport_state       = $params['airport_state'];

    $this->getUser()->setAttribute('camp', $params, 'person');
  }

  /**
   * Searches for camps
   * CODE:camp_create
   */
  public function executeUpdate(sfWebRequest $request)
  { 
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    
    $this->agencies = AgencyPeer::getForSelectParent();
        
    $this->agency = trim($this->getRequestParameter('agency', '*')) == '' ? '*' : trim($this->getRequestParameter('agency', '*'));
    $this->airport = trim($this->getRequestParameter('airport', '*')) == '' ? '*' : trim($this->getRequestParameter('airport', '*'));
            
    $this->airports = AirportPeer::doSelect(new Criteria());
    
    if($request->getParameter('id'))
    {
      $camp = CampPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($camp);

      if(isset($camp)){
        if($camp->getAgencyId()){
          $agency = AgencyPeer::retrieveByPK($camp->getAgencyId());
          if(isset($agency)){
            $this->agency_id = $agency->getId();
          }
        }
        if($camp->getAirportId()){
          $airport =AirportPeer::retrieveByPK($camp->getAirportId());
          if(isset($airport)){
            $this->airport_id = $airport->getId();
          }
        }
      }
      
      $this->title = 'Edit camp';
      $success = 'Camp information has been successfully changed!';
      slot('nav_menu', array('mission_coord', ''));
    }
    else
    { 
      $camp = new Camp();
      if($request->getParameter('agency_id')){
        $this->agency_id = $request->getParameter('agency_id');
      }
      $this->title = 'Add new camp';
      $success = 'Camp information has been successfully created!';
      slot('nav_menu', array('mission_coord', 'add-camp'));
    }
    
    //Agency PopUp Form
    $agency = new Agency();
    $this->form_a = new AgencyForm($agency);
    $this->a_referer = $request->getReferer();
    

    //Aiport PopUp Form
    $airport = new Airport();
    $this->form_airport = new AirportForm($airport);
    $this->airport_referer = $request->getReferer();

    $this->form = new CampForm($camp);
    
    if($request->isMethod('post'))
    {   
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('camp'));

      $ma= '';

      foreach($this->form as $pass_key => $pass_data) {
        $ma .= $pass_data.'|';
      }

      if($this->form->isValid() && $request->getParameter('agency') != null)
      { 
        if($request->getParameter('agency')){
          $agency = AgencyPeer::getByName($request->getParameter('agency'));
        }

        if(isset($agency) && $agency instanceof Agency){
          $camp->setAgencyId($agency->getId());
        }

        //$aId = $camp->getAirportId();
        //$aInd = $request->getParameter('airport');
        $airport = AirportPeer::getByIdent($request->getParameter('airport'));

        /*if(!empty($aId)){
          if(!empty($aInd)){
              $camp->setAirportId($airport->getId());
          }
          else{
              $camp->setAirportId($aId);
          }
        }else{
          if($airport) $camp->setAirportId($airport->getId());
        }*/

        /*if($request->getParameter('airport')){
          $camp->setAirportId(null);
        }else{
          $airport = AirportPeer::getByIdent($request->getParameter('airport'));
          if(isset($airport) instanceof Airport){
            $camp->setAirportId($airport->getId());
          }
        }*/

        //$camp->setAirport($request->getParameter('airport_name'));
        $camp->setAirport($airport);
        $camp->setSession($this->form->getValue('session'));
        $camp->setCampName($this->form->getValue('camp_name'));
        $camp->setArrivalDate($this->form->getValue('arrival_date'));
        $camp->setDepartureDate($this->form->getValue('departure_date'));
        $camp->setArrivalComment($this->form->getValue('arrival_comment'));
        $camp->setDepartureComment($this->form->getValue('departure_comment'));
        $camp->setComment($this->form->getValue('comment'));

        if($camp->isNew()) {
          $content = $this->getUser()->getName().' added new Camp: '.$camp->getCampName();
          ActivityPeer::log($content);
        }

        $camp->save();

        $this->getUser()->setFlash('success', $success);

        if($this->form->isNew()){
            $this->redirect('camp/view?id='.$camp->getId());
        }else{
            $this->redirect('camp/index?showlist=true');
        }

        //add passengers to camp then create new mission, legs
        //missions assocated with camps that will be a group mission

      }else{
        if($request->getParameter('agency_id') == null){
          $this->getUser()->setFlash('warning', 'Please choose Agency!');
        }
      }
    }
    else
    { 
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@camp';
      //echo $this->referer;      exit ();
    }
    
    $this->camp = $camp;
  }

  /**
   * TODO: Check related records.
   * CODE:camp_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete'))
    {
      $request->checkCSRFProtection();

      $camp = CampPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($camp);

      $this->getUser()->setFlash('success', 'Camp information has been successfully deleted!');

      $camp->delete();

    }
    return $this->redirect('@camp');
  }

  /**
   * TODO: Add passengers to camp.
   */

  public function executeAddPassengers(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('id')){
      $camp = CampPeer::retrieveByPK($request->getParameter('id'));
      if(isset($camp) && $camp instanceof Camp){

        $this->campid = $camp->getId();

        $this->passenger_fname = trim($this->getRequestParameter('passenger_fname', '*')) == '' ? '*' : trim($this->getRequestParameter('passenger_fname', '*'));
        $this->passenger_lname = trim($this->getRequestParameter('passenger_lname', '*')) == '' ? '*' : trim($this->getRequestParameter('passenger_lname', '*'));

        $this->persons =  PersonPeer::doSelect(new Criteria());
      }
    }
  }

  /**
   * TODO: Camp Pilot match.
   * CODE:camp_pilot_match
   */
  public function executeMatch(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('id')){
      $this->camp = CampPeer::retrieveByPK($request->getParameter('id'));
      if(isset($this->camp) && $this->camp instanceof Camp){
        #passengers to fly
        $this->camp_request = PilotRequestPeer::getByCampId($this->camp->getId());
        /*
        if(isset($this->camp_request) && $this->camp_request instanceof PilotRequest ){
          if($this->camp_request->getMemberId()){
            $this->pilot_dates = PilotDatePeer::getByMemberId($this->camp_request->getMemberId());
            $this->pilot_date_arr = array();
            $c = 0;
            if(isset($this->pilot_dates)){
              foreach ($this->pilot_dates as $req){
                if($req->getDate() != null){
                  $this->pilot_date_arr[$c] = $req->getDate();
                  $c++;
                }
              }
            }
          }
         *
         */
        }
      }else{
        $this->forward404Unless($this->camp);
      }
    }

  /**
   * TODO: Add row to Add Passenger to camp details.
   * CODE:camp_add_passengers
   */
  public function executeAddPassengerAjax(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->setLayout(false);

    $this->passenger_fname = trim($this->getRequestParameter('passenger_fname', '*')) == '' ? '*' : trim($this->getRequestParameter('passenger_fname', '*'));
    $this->passenger_lname = trim($this->getRequestParameter('passenger_lname', '*')) == '' ? '*' : trim($this->getRequestParameter('passenger_lname', '*'));

    $this->campid = $request->getParameter('id');

    $this->persons =  PersonPeer::doSelect(new Criteria());
  }

  public function executeView(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $camp_id = $request->getParameter('id');
    $this->camp = CampPeer::retrieveByPK($camp_id);
    $this->forward404Unless($this->camp);
    //$c = new Criteria();
   // $c->add(CampPassengerPeer::CAMP_ID, $this->camp->getId());
    //$c->addJoin(CampPassengerPeer::CAMP_ID, $this->camp->getId());
    //$sql = "SELECT * FROM camp_passenger INNER JOIN camp ON camp.airport_id = camp_passenger.airport_id AND camp.id = ".$camp_id;

    $c = new Criteria();
   // $c->addJoin(CampPassengerPeer::AIRPORT_ID, CampPeer::AIRPORT_ID, Criteria::INNER_JOIN);
    $c->add(CampPassengerPeer::CAMP_ID, $camp_id);
    //$c->add(CampPassengerPeer::RETURN_AIRPORT_ID, 0, Criteria::EQUAL);
    $c->add(CampPassengerPeer::RETURN_AIRPORT_ID, Criteria::ISNULL);
    $this->camp_passengers = CampPassengerPeer::doSelect($c);
    
    $c = new Criteria();
    $c->add(CampPassengerPeer::CAMP_ID, $camp_id);
    //$c->add(CampPassengerPeer::AIRPORT_ID, 0, Criteria::EQUAL);
    $c->add(CampPassengerPeer::AIRPORT_ID, Criteria::ISNULL);
    $this->camp_passengers_return = CampPassengerPeer::doSelect($c);
  }

  public function executeAjaxFilterAirportByName(sfWebRequest $request)
  {
    $airportname = trim($request->getParameter('airportname'));

    if (empty($airportname)) return sfView::NONE;

    $c = new Criteria();
    $c->add(AirportPeer::NAME, "$airportname%", Criteria::LIKE);
    $c->setLimit(10);
    $this->airports = AirportPeer::doSelect($c);
  }
  public function executeAjaxFilterPassenger(sfWebRequest $request)
  {
    if($request->hasParameter ( 'firstname'))
        $fname = trim($request->getParameter('firstname'));
    elseif($request->hasParameter ( 'lastname'))
      $lname = trim($request->getParameter('lastname'));

    $c = new Criteria();
    $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    if (isset($fname)) $c->add(PersonPeer::FIRST_NAME, "$fname%", Criteria::LIKE);
    if (isset($lname)) $c->add(PersonPeer::LAST_NAME, "$lname%", Criteria::LIKE);
    $c->setLimit(10);
    $this->passengers = PassengerPeer::doSelectJoinPerson($c);
  }

  public function executeAjaxAddPassenger(sfWebRequest $request)
  {
      // see if there is airport exist with this name
    $airport_name = $request->getParameter('airportname');
    $airport = AirportPeer::getBySpecificAirportName($airport_name);

    // If there is no airport then insert it into airport table
    if(!$airport){//@TODO SET DEFAULT AIRPORT VALUE E
        $airport = new Airport();
        $airport->setName($airport_name);
        $airport->save();
    }    
    $camp_passenger = new CampPassenger();
    $camp_passenger->setCampId($request->getParameter('camp'));
    $camp_passenger->setPassengerId($request->getParameter('passenger'));
    $camp_passenger->setAirportId($airport->getId());
    
    if (CampPassengerPeer::doCount($camp_passenger->buildCriteria())) {
      return $this->renderText('Passenger has already been added!');
    }
    
    $camp_passenger->setNote($request->getParameter('note'));

    if ($camp_passenger->save()){
       return $this->renderText($airport->getId());
    }

    return $this->renderText('wrong');
  }

  public function executeAjaxRemovePassenger(sfWebRequest $request)
  {
    $camp_id = $request->getParameter('camp');
    $camp_passenger = CampPassengerPeer::retrieveByPK($camp_id, $request->getParameter('passenger'), $request->getParameter('airport_id'));
    $this->forward404Unless($camp_passenger);

    /*$v = $camp_passenger->getLink();
    if ($v) {
      $link = CampPassengerPeer::retrieveByPK($camp_id, $v);
      if ($link) {
        $link->setLink(null);
        $link->save();
      }
    }*/

    $camp_passenger->delete();

    return $this->renderText($camp_passenger->getPassengerId());
  }

  public function executeAjaxLinkPassengers(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(CampPassengerPeer::CAMP_ID, $request->getParameter('camp'));
    $camp_passengers = CampPassengerPeer::doSelect($c);

    $links = $request->getParameter('links');
    foreach ($camp_passengers as $camp_passenger) {
      if (in_array($camp_passenger->getPassengerId(), $links)) {
        $camp_passenger->setLink($links[$camp_passenger->getPassengerId()]);
      }else{
        $camp_passenger->setLink(null);
      }
      $camp_passenger->save();
    }

    return $this->renderText('0');
  }

  public function executeAddLeg(sfWebRequest $request)
  {
    $camp = CampPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($camp);

    if ($camp)

    $mission_type = MissionTypePeer::getByName('normal');
    if (!($mission_type instanceof MissionType)) {
      $mission_type = MissionTypePeer::doSelectOne(new Criteria());
      $this->forward404Unless($mission_type);
    }

    $itinerary = new Itinerary();
    $itinerary->setCampId($camp->getId());
    $itinerary->setPassengerId($request->getParameter('passenger_id'));
    $existing = ItineraryPeer::doSelectOne($itinerary->buildCriteria());
    if ($existing) {
      $itinerary = $existing;
    }else{
      $itinerary->setDateRequested(time());
      $itinerary->setApointTime('unspecified');
      $itinerary->setMissionTypeId($mission_type->getId());
      $itinerary->setAgencyId($camp->getAgencyId());
      $itinerary->save();
    }

    $this->redirect('mission/update?id='.$itinerary->getId());
  }
  public function executeAutoAddMissionsOnCamp(sfWebRequest $request)
  {
      // see if there is airport exist with this name
    $airport_name = $request->getParameter('airportname');
    $airport = AirportPeer::getBySpecificAirportName($airport_name);    
    
    // If there is no airport then insert it into airport table
    if(!$airport){ // @TODO Set default airport fields values
        $airport = new Airport();
        $airport->setName($airport_name);
        $airport->save();
    }
    $pass_id = $request->getParameter('passenger');
    $camp_id = $request->getParameter('camp_id');
    
    $camp_passenger = new CampPassenger();
    $camp_passenger->setCampId($camp_id);
    $camp_passenger->setPassengerId($pass_id);

    if (CampPassengerPeer::doCount($camp_passenger->buildCriteria())) {
      $passenger = PassengerPeer::retrieveByPK($pass_id);
      $this->getUser()->setFlash('warning', 'Passenger "'.$passenger->getPerson()->getName().'" has already been added!');
      return $this->redirect('camp/view?id='.$request->getParameter('camp_id'));
    }

    $camp = CampPeer::retrieveByPK($camp_id);
    $this->forward404Unless($camp);
    
    $note = $request->getParameter('note');
    //$camp_passenger->setAirportId($camp->getAirportId ()); // Camp Location Id
    $camp_passenger->setNote($note);
    
    //if ($camp_passenger->save()){
       //return $this->renderText($airport->getId());
    //}



    
    $mission_type = MissionTypePeer::getByName('normal');
    if (!($mission_type instanceof MissionType)) {
      $mission_type = MissionTypePeer::doSelectOne(new Criteria());
      $this->forward404Unless($mission_type);
    }
    
    $airport = AirportPeer::getBySpecificAirportName($airport_name);
    $camp_location = $camp->getAirport();
    $itinerary = new Itinerary();
    $itinerary->setCampId($camp->getId());
    $itinerary->setPassengerId($pass_id);
    $itinerary->setDateRequested(time());
    $itinerary->setApointTime('unspecified');
    $itinerary->setMissionTypeId($mission_type->getId());
    $itinerary->setAgencyId($camp->getAgencyId());
    $itinerary->setCancelItinerary(1);
    $itinerary->save();
    // Mission 1
    $mission1 = new Mission();
    $mission1->setItineraryId($itinerary->getId ());
    $mission1->setCampId($camp->getId ());
    $mission1->setCancelMission(1);
    $mission1->setPassengerId($pass_id);
    $mission1->setMissionCount(1);
    $mission1->setDateRequested(time());
    $mission1->setExternalId($this->getLatestExternalId ());
    $mission1->setMissionTypeId($mission_type->getId());
    $mission1->save();

    $camp_passenger->setReturnAirportId(NULL); // this indicates that return airport id would be camp airport id
    $camp_passenger->setAirportId($airport->getId());
    $camp_passenger->setMissionId($mission1->getId());
    $camp_passenger->save();
    
    $mission1_leg1 = new MissionLeg();
    $mission1_leg1->setFromAirportId($airport->getId ());
    $mission1_leg1->setLegNumber(1);
    $mission1_leg1->setMissionId($mission1->getId ());
    if($camp_location) $mission1_leg1->setToAirportId($camp_location->getId ());
    else $mission1_leg1->setToAirportId(NULL);
    $mission1_leg1->setCancelMissionLeg(1);
    $mission1_leg1->save();

    
    // Mission 2
    $mission2 = new Mission();
    $mission2->setItineraryId($itinerary->getId ());
    $mission2->setCampId($camp->getId ());
    $mission2->setCancelMission(1);
    $mission2->setPassengerId($pass_id);
    $mission2->setMissionCount(2); // From treatment to hme
    $mission2->setDateRequested(time());
    $mission2->setExternalId($this->getLatestExternalId ());
    $mission2->setMissionTypeId($mission_type->getId());
    $mission2->save();

    $camp_passenger2 = new CampPassenger();
    $camp_passenger2->setCampId($camp_id);
    $camp_passenger2->setPassengerId($pass_id);
    $camp_passenger2->setMissionId($mission2->getId());
    $camp_passenger2->setAirportId(NULL); // this indicates that return airport id would be camp airport id
    $camp_passenger2->setReturnAirportId($airport->getId ());
    $camp_passenger2->setNote($note);
    $camp_passenger2->save();

    $mission2_leg2 = new MissionLeg();
    if($camp_location) $mission2_leg2->setFromAirportId($camp_location->getId ());
    else $mission2_leg2->setFromAirportId(NULL);
    $mission2_leg2->setLegNumber(1);
    $mission2_leg2->setMissionId($mission2->getId ());
    $mission2_leg2->setToAirportId($airport->getId ());
    $mission2_leg2->setCancelMissionLeg(1);
    $mission2_leg2->save();
    return $this->redirect('camp/view?id='.$camp->getId ());

  }
  public function executeAutoRemoveMissionsOnCamp(sfWebRequest $request){
    $passenger_id = $request->getParameter('passenger');
    $airport_id = $request->getParameter('airport_id');
    $camp_id = $request->getParameter('camp');
    $mission_id = $request->getParameter('mission_id');
    $camp = CampPeer::retrieveByPK($camp_id);
    $camp_airport_id = $camp->getAirportId();// To airport id for first mission
    $from = $request->getParameter('from'); // indicates what should be removed, home to treatement or treatement to home mission?
    
    $c = new Criteria();
    $c->add(MissionPeer::PASSENGER_ID, $passenger_id);
    $c->add(MissionPeer::CAMP_ID, $camp_id);
    $c->add(MissionPeer::ID, $mission_id);
    $mission = MissionPeer::doSelectOne($c); 

    $itinerary_id = $mission->getItineraryId();
    $mission->setCancelMission(0); // Make it hide from public
    $mission->save();
    $itinerary = ItineraryPeer::retrieveByPK($itinerary_id);
    $itinerary->setCancelItinerary(0);
    $itinerary->save();


    /*foreach($missions as $mission){
      $mission_ids[] = $mission->getId();
      $itinerary_id = $mission->getItineraryId();
      $mission->setCancelMission(0); // Make it hide from public
      $mission->save();
    }*/
    //$this->_setAutoLegCancelled($camp_airport_id, $airport_id, $mission_ids[0], 'come');
    //$this->_setAutoLegCancelled($camp_airport_id, $airport_id, $mission_ids[1], 'return');
    $this->_setAutoLegCancelled($camp_airport_id, $airport_id, $mission->getId (), $from);

    $c->clear();    
    $c->add(CampPassengerPeer::CAMP_ID, $camp_id);
    $c->add(CampPassengerPeer::PASSENGER_ID, $passenger_id);
     if($from == 'source'){
        $c->add(CampPassengerPeer::AIRPORT_ID, $airport_id);
     }else {
         $c->add(CampPassengerPeer::RETURN_AIRPORT_ID, $airport_id);
     }     
    CampPassengerPeer::doDelete($c);

    return $this->redirect('camp/view?id='.$camp_id);
  }
  private function _setAutoLegCancelled($camp_airport_id, $airport_id, $mission_id, $type = 'source'){
      $c = new Criteria();
      if($type == 'source'){
        $c->add(MissionLegPeer::FROM_AIRPORT_ID, $airport_id);
        $c->add(MissionLegPeer::TO_AIRPORT_ID, $camp_airport_id);
      }else {
        $c->add(MissionLegPeer::FROM_AIRPORT_ID, $camp_airport_id);
        $c->add(MissionLegPeer::TO_AIRPORT_ID, $airport_id);
      }
      $c->add(MissionLegPeer::MISSION_ID, $mission_id);
      $c->add(MissionLegPeer::LEG_NUMBER, 1);
      $leg = MissionLegPeer::doSelectOne($c);
      if($leg){
        //print_r($leg);exit;
        $leg->setCancelMissionLeg(0);
        $leg->save();
      }else {
        //echo 'nai';exit;
      }
  }
  public function getLatestExternalId(){
    // External Id Block
    $c = new Criteria();
    $c->add(MissionPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $external_mission = MissionPeer::doSelectOne($c);
    unset($c);
    return ($external_mission->getExternalId() + 1);
  }
  public function executeSaveSourceLocation(  sfWebRequest $request){
    $pass_id = $this->getRequestParameter('passengerid');
    $new_airportname = $this->getRequestParameter('airportname');        
    $new_airport = AirportPeer::getBySpecificAirportName($new_airportname);
    $camp_id = $this->getRequestParameter('camp_id');
    $mission_id = $this->getRequestParameter('mission_id');
    $camp = CampPeer::retrieveByPK($camp_id);
    $from_airport_id = $camp->getAirportId();
   
    $conn = Propel::getConnection();
    if($from_airport_id){      
      $sql = 'UPDATE mission_leg set from_airport_id = '.$new_airport->getId().' WHERE mission_id = '.$mission_id.' AND to_airport_id = '.$from_airport_id;
      $statement = $conn->prepare($sql);
      $statement->execute();
    }
    // Set source airport ID
    $sql = 'UPDATE camp_passenger set airport_id = '.$new_airport->getId().' WHERE camp_id = '.$camp_id.' AND passenger_id = '.$pass_id.' AND mission_id='.$mission_id;

    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $this->airportname = $new_airportname;    

  }
  public function executeSaveReturnSourceLocation(  sfWebRequest $request){
    $pass_id = $this->getRequestParameter('passengerid');
    $new_airportname = $this->getRequestParameter('airportname');
    $new_airport = AirportPeer::getBySpecificAirportName($new_airportname);
    $camp_id = $this->getRequestParameter('camp_id');
    $camp = CampPeer::retrieveByPK($camp_id);
    $mission_id = $this->getRequestParameter('mission_id');
    
    $conn = Propel::getConnection();
    $sql = 'UPDATE mission_leg set to_airport_id = '.$new_airport->getId().' WHERE mission_id = '.$mission_id.' AND from_airport_id = '.$camp->getAirportId ();
    $statement = $conn->prepare($sql);
    $statement->execute();

    $sql = 'UPDATE camp_passenger set return_airport_id = '.$new_airport->getId().' WHERE camp_id = '.$camp_id.' AND passenger_id = '.$pass_id.' AND mission_id = '.$mission_id;
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    
    $this->airportname = $new_airportname;
    $this->setTemplate('saveSourceLocation');
  }
  public function executeAssignPassenger(sfWebRequest $request)
  {
    

    /*$camp_passenger = new CampPilotPassenger();
    $camp_passenger->setCampId($request->getParameter('camp_id'));
    $camp_passenger->setMemberId($request->getParameter('member_id'));
    $camp_passenger->setPassengerId($request->getParameter('pass_id'));
     *
     */

    $this->setLayout(false);
    $this->pilot_req_id = $request->getParameter('pilot_req_id');
    $this->flight_date = $request->getParameter('flight_date');

    $this->message = '';
 
    if(!$request->getParameter('camp_id') || !$request->getParameter('member_id') ||
            !$request->getParameter('pass_id') || !$request->getParameter('pilot_req_id')){
      //$this->getUser()->setFlash('error', 'Incomplete data!');
        $this->message = 'Incomplete data!';
    }else{
        $pilot = PilotPeer::getByMemberId($request->getParameter('member_id'));
        if(!$pilot){
                  $this->message = 'Pilot not found!';
                  ////$this->getUser()->setFlash('error', 'Pilot not found!');
                  return;
        }
        $pilot_request = PilotRequestPeer::retrieveByPK($request->getParameter('pilot_req_id'));
        if(!$pilot_request){
                  $this->message = 'Pilot request not found!';
                  return;
        }

        //check if passenger is linked
        $camp_passenger = CampPassengerPeer::retrieveByPK( $request->getParameter('camp_id'),
                $request->getParameter('pass_id'));
        $pass = PassengerPeer::retrieveByPK($request->getParameter('pass_id'));
        $mission = MissionPeer::getByCampPass($request->getParameter('camp_id'),
                $request->getParameter('pass_id'));

        if(!$camp_passenger || !$pass || !$mission){
                  $this->message = 'Passenger or mission info not found!';
                  return;
        }
        
        $total_weight = $pass->getWeight();
        $num_of_pass = 1;
        $pass_linked = null;
        if($camp_passenger->getLink()!=null){
            $mission_linked = MissionPeer::getByCampPass($request->getParameter('camp_id'),
                $camp_passenger->getLink());
            $pass_linked = PassengerPeer::retrieveByPK($camp_passenger->getLink());
            //now check if mission dates are same
            if($mission_linked && $pass_linked){
                if( $mission_linked->getMissionDate('m/d/Y')!=$mission->getMissionDate('m/d/Y')){
                    $this->message = 'Linked passengers mission dates are should be same!';
                    return;
                }else {
                    $total_weight += $pass_linked->getWeight();
                    $num_of_pass += 1;
                }
            }
        }

        /*
        //check pilots assigned number of day
        //TODO
        $pilot_assigned_dates = MissionPeer::getCampPilotDates($request->getParameter('camp_id'), $pilot->getId());
        if(sizeof($pilot_assigned_dates) == $pilot_request->getNumberDateAssign()){
            foreach ($pilot_assigned_dates as $key => $value){
                //if($value==)
            }
        }
        */
        //TODO:check pilots max weight

        //TODO:check pilots number of seats

        //set pilot to passenger's leg
        $camp_mission_legs = MissionLegPeer::getByCampIdPassengerId($request->getParameter('camp_id'),
                $request->getParameter('pass_id'));
        if($camp_mission_legs){
            foreach ($camp_mission_legs as $leg){
                $leg->setPilotId($pilot->getId());
                $leg->save();
            }
        }
        
        //set pilot to linked passenger's leg if exists a link
        if($pass_linked){
            $camp_mission_legs = MissionLegPeer::getByCampIdPassengerId($request->getParameter('camp_id'),
                    $pass_linked->getId());
            if($camp_mission_legs){
                foreach ($camp_mission_legs as $leg){
                    $leg->setPilotId($pilot->getId());
                    $leg->save();
                }
            }
        }
    }
  }

  public function executeRemovePassenger(sfWebRequest $request)
  {
    if($request->getParameter('camp_id') && $request->getParameter('member_id') &&
            $request->getParameter('pass_id')){

        $camp_mission_legs = MissionLegPeer::getByCampIdPassengerId($request->getParameter('camp_id'),
                $request->getParameter('pass_id'));
        if($camp_mission_legs){
            foreach ($camp_mission_legs as $leg){
                $leg->setPilotId(null);
                $leg->save();
            }
        }

        //if passenger linked then remove also
        $camp_passenger = CampPassengerPeer::retrieveByPK( $request->getParameter('camp_id'),
                $request->getParameter('pass_id'));

        if($camp_passenger->getLink()!=null){
            $camp_mission_legs = MissionLegPeer::getByCampIdPassengerId($request->getParameter('camp_id'),
                    $camp_passenger->getLink());
            if($camp_mission_legs){
                foreach ($camp_mission_legs as $leg){
                    $leg->setPilotId(null);
                    $leg->save();
                }
            }
        }

        
    }
    
    $this->setLayout(false);
    $this->flight_date = $request->getParameter('flight_date');
    $this->pilot_req_id = $request->getParameter('pilot_req_id');
    $this->getUser()->setFlash('error', 'Oops! Please try again.');
    $this->setTemplate('assignPassenger');
  }

  public function executePassengersTobeAssign(sfWebRequest $request){
      $this->camp_id = $request->getParameter('camp_id');
      $this->flight_date = $request->getParameter('flight_date');
  }

   public function executeAutoComplete_1(sfWebRequest $request)
  {
    $this->name = $this->getRequestParameter('camp');
    $this->camps = CampPeer::getByName($this->name);
  }

}
