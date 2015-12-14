<?php
/**
 * mission actions.
 *
 * @package    angelflight
 * @subpackage mission
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class missionActions extends sfActions
{
  /**
   * Mission type
   * CODE:mission_type_index
   */
  public function executeIndexMisType(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->mis_types =  MissionTypePeer::doSelect(new Criteria());
  }
  /**
   * Mission filter results
   * CODE:mission_type_index
   */
  public function executeForm(sfWebRequest $request)
  {
    if($request->getParameter('member_id')){
      $member_id = $request->getParameter('member_id');
    }

    $orgin = $request->getParameter('f_orgin', '');
    $dest  = $request->getParameter('f_dest', '');

    $airport_id = $request->getParameter('primary_airportID', 0);

    $date_range1 = $request->getParameter('f_date_range1', '');
    $date_range2  = $request->getParameter('f_date_range2', '');

    $filled = $request->getParameter('f_filled', '');
    $open  = $request->getParameter('f_open', '');

    //needs by
    $pilot = $request->getParameter('f_pilot', '');
    $mission_assistant  = $request->getParameter('f_ma', '');
    $ifr_backup = $request->getParameter('f_ifr', '');

    if($request->getParameter('f_alltype')){
      $all_type = $request->getParameter('f_alltype','');
    }else{
      $all_type = '';
    }

    //days
    $day_1 = $request->getParameter('f_day_1','');
    $day_2 = $request->getParameter('f_day_2','');
    $day_3 = $request->getParameter('f_day_3','');
    $day_4 = $request->getParameter('f_day_4','');
    $day_5 = $request->getParameter('f_day_5','');
    $day_6 = $request->getParameter('f_day_6','');
    $day_7 = $request->getParameter('f_day_7','');


    $max_pass = $request->getParameter('f_maxpass',0);
    $max_wei = $request->getParameter('f_maxwei',0);
    $max_dist = $request->getParameter('f_maxdist',0);
    $max_eff = $request->getParameter('f_maxeff ',0); //only accept values 1-100

    $location_type = $request->getParameter('location_type','');


    $wing = '';
    $ident = '';
    $city = '';
    $state = '';
    $zip = '';

    if($location_type == 1){
      $wing = $request->getParameter('f_wing','');
    }elseif($location_type == 2){
      $ident = $request->getParameter('f_ident','');
    }elseif($location_type == 3){
      $city = $request->getParameter('f_city','');
      $state = $request->getParameter('f_state','');
      $zip = $request->getParameter('f_zipcode','');
    }

    if($request->getParameter('is_a_check')){
      $is_check = $request->getParameter('is_a_check','');
    }else{
      $is_check = '';
    }

    $unset_availability = $request->getParameter('unset_availability','');
    $set_availability = $request->getParameter('set_availability','');
    $availability = $request->getParameter('available','');
    $store = $request->getParameter('store','');

    $first_date = '';
    $last_date= '';
    $not_available= '';
    $no_weekday= '';
    $no_weekend= '';
    $as_ma= '';

    if($is_check == ''){
      if($request->getParameter('first_date'))$first_date = $request->getParameter('first_date','');
      if($request->getParameter('last_date'))$last_date = $request->getParameter('last_date','');
      if($request->getParameter('not_av'))$not_available = $request->getParameter('not_av','');
      if($request->getParameter('no_weekday'))$no_weekday = $request->getParameter('no_weekday','');
      if($request->getParameter('no_weekend'))$no_weekend= $request->getParameter('no_weekend','');
      if($request->getParameter('as_ma'))$as_ma = $request->getParameter('as_ma','');
    }

    $sort_by = $request->getParameter('sort_by');


    $this->mission_legs = MissionLegPeer::getByFilterCamp(
    $max = 10,
    $page = 1,
    $sort_by,
    $availability,
    $first_date,    //availability
    $last_date,     //availability
    $not_available, //availability
    $no_weekday,    //availability
    $no_weekend,    //availability
    $as_ma,         //availability
    $orgin,
    $dest,
    $airport_id,
    $date_range1,
    $date_range2,
    $filled,
    $open,
    $pilot,
    $mission_assistant,
    $ifr_backup,
    $wing,
    $ident,
    $city,
    $state,
    $zip,
    $day_1,
    $day_2,
    $day_3,
    $day_4,
    $day_5,
    $day_6,
    $day_7,
    $all_type,
    $max_pass,
    $max_wei,
    $max_dist,
    $max_eff
    );

    #get the Pilot's nearest Mission Legs with camps
    $this->missions = array();
    $this->camps = array();
    $count = 0;

    foreach ($this->mission_legs as $leg){
      if($leg->getToAirportId()){
        $this->destination_airport = $leg->getToAirportId();
      }
      $this->missions[$count] = MissionPeer::retrieveByPK($leg->getMissionId());
      $this->camps[$count] = CampPeer::retrieveByPK(MissionPeer::retrieveByPK($leg->getMissionId())->getCampId());
      $count++;
    }
  }

  /**
   * Mission type
   * CODE:mission_type_create
   */
  public function executeUpdateMisType(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if($request->getParameter('id')){
      $this->mtype = MissionTypePeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Mission Type';
      $success = 'Mission Type successfully edited!';
    }else{
      $this->mtype = new MissionType();
      $this->title = 'Add Mission Type';
      $success = 'Mission Type successfully created!';
    }
    $this->form =  new MissionTypeForm($this->mtype);
    $this->mtype= $this->mtype;

    if($request->isMethod('post')){
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('mtype'));

      if($this->form->isValid() && $this->form->getValue('name')){
        $this->mtype->setname($this->form->getValue('name'));
        $this->mtype->setStatCount($this->form->getValue('stat_count'));
        if($this->mtype->isNew()){
          $content = $this->getUser()->getName().' added new Mission type: '.$this->mtype->getName();
          ActivityPeer::log($content);
        }
        $this->mtype->save();

        $this->getUser()->setFlash('success',$success);

        $this->redirect('mission/indexMisType');
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : 'mtype/index';
    }
    $this->mtype = $this->mtype;
  }

  /**
   * Mission type
   * CODE:mission_type_delete
   */
  public function executeDeleteMisType(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $request->checkCSRFProtection();

    if($request->isMethod('post')){
      try{
      $mtype = MissionTypePeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($mtype);
      $mtype->delete();
      }catch(Exception $e){
         $this->getUser()->setFlash('warning', "There are related persons to this mission type. Please remove them first.");
      }
    }
    $this->redirect('mission/indexMisType');
  }

  /**
   * Mission
   * CODE:mission_index
   */
  public function executeIndex(sfWebRequest $request)
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
    $this->getUser()->addRecentItem('Missions', 'missions', 'mission/index');

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = MissionPeer::getPager(
        $this->max,
        $this->page,
        $this->miss_ext_id,
        $this->miss_type,
        $this->miss_date1,
        $this->miss_date2,
        $this->pass_fname,
        $this->pass_lname,
        $this->mreq_fname,
        $this->mreq_lname
        );
        $this->mission_list = $this->pager->getResults();
    }
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }
  
  /**
   * Searches for missions by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('mission', array(), 'person');

    if (!isset($params['miss_ext_id'])) $params['miss_ext_id'] = null;
    if (!isset($params['miss_type'])) $params['miss_type'] = null;
    if (!isset($params['miss_date1'])) $params['miss_date1'] = null;
    if (!isset($params['miss_date2'])) $params['miss_date2'] = null;
    if (!isset($params['pass_fname'])) $params['pass_fname'] = null;
    if (!isset($params['pass_lname'])) $params['pass_lname'] = null;
    if (!isset($params['mreq_fname'])) $params['mreq_fname'] = null;
    if (!isset($params['mreq_lname'])) $params['mreq_lname'] = null;

    $this->max_array = array(5, 10, 20, 30);

    $this->types = MissionTypePeer::getOnlyNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['miss_ext_id']      = $request->getParameter('miss_ext_id');
      $params['miss_type']       = (in_array($request->getParameter('miss_type'), array_keys($this->types)) ? $request->getParameter('miss_type') : '');
      $params['miss_date1']       = $request->getParameter('miss_date1');
      $params['miss_date2']       = $request->getParameter('miss_date2');
      $params['pass_fname']       = $request->getParameter('pass_fname');
      $params['pass_lname']       = $request->getParameter('pass_lname');
      $params['mreq_fname']       = $request->getParameter('mreq_fname');
      $params['mreq_lname']       = $request->getParameter('mreq_lname');
    }

    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->miss_ext_id    = $params['miss_ext_id'];
    $this->miss_type  = $params['miss_type'];
    $this->miss_date1 = $params['miss_date1'];
    $this->miss_date2 = $params['miss_date2'];
    $this->pass_fname = $params['pass_fname'];
    $this->pass_lname = $params['pass_lname'];
    $this->mreq_fname = $params['mreq_fname'];
    $this->mreq_lname = $params['mreq_lname'];

    $this->getUser()->setAttribute('mission', $params, 'person');
  }

  /**
   * Mission
   * CODE: mission_create, mission_leg_create
   */
  public function executeUpdate(sfWebRequest $request)
  { 
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('add_passengers')){
      $this->group_camp_id = $request->getParameter('add_passengers');
    }

    if($request->getParameter('id')){

    }else{
      if($request->isMethod('post')){
        $main_id= $request->getParameter('main_id');
        $row_id= $request->getParameter('row_id');
        $camp_id= $request->getParameter('camp_id');

        if(isset($row_id)){
          $fname  =$request->getParameter('pass_fname'.$row_id);
          $lname  =$request->getParameter('pass_lname'.$row_id);
          $location  =$request->getParameter('pass_loc'.$row_id);
          $note  =$request->getParameter('pass_note'.$row_id);
          $link  =$request->getParameter('pass_link'.$row_id);
        }else{
          $main_id = $request->getParameter('person_id');
          $fname  =$request->getParameter('pass_fname');
          $lname  =$request->getParameter('pass_lname');
          $location  =$request->getParameter('pass_loc');
          $note  =$request->getParameter('pass_note');
          $link  = $request->getParameter('link');
        }

        //echo var_dump($request->getParameter('link'));die();

        #create default Itinerary to passenger
        if(isset($main_id)){
          $is_passenger = PassengerPeer::getByPersonId($main_id);
          if(!$is_passenger->getRequesterId() && $camp_id){
            $this->getUser()->setFlash('success','Passenger has no Requester. Requester must be selected before create a Mission!');
            $this->redirect('@add_passengers?id='.$camp_id);
          }
          $itinerary = new Itinerary();
          if(isset($is_passenger) && $is_passenger instanceof Passenger){
            $itinerary->setDateRequested(date('y/m/d'));
            $itinerary->setApointTime('Morning');
            $itinerary->setPassengerId($is_passenger->getId());
            $miss_type =MissionTypePeer::getName('Camp');
            if(isset($miss_type) && $miss_type instanceof MissionType){
              $itinerary->setMissionTypeId($miss_type->getId());
            }
            if($is_passenger->getRequesterId()){
              $pass_req = $is_passenger->getRequester();
              if(isset($pass_req) && $pass_req){
                if(isset($pass_req) && $pass_req instanceof Requester ){
                  $itinerary->setRequesterId($pass_req->getId());
                }
              }
            }
            if(isset($camp_id)){
              $camp = CampPeer::retrieveByPK($camp_id);
              if(isset($camp) && $camp instanceof Camp ){
                if($camp->getAgencyId()){
                  $agency=$camp->getAgency();
                  if(isset($agency) && $agency instanceof Agency ){
                    $itinerary->setAgencyId($agency->getId());
                  }
                }
              }
            }

            $itinerary->setCampId($camp_id);

            $itinerary->save();
            if(isset($itinerary) && $itinerary instanceof Itinerary ){
              $this->redirect('@itinerary_detail?id='.$itinerary->getId().'&add_passengers='.$camp_id);
            }
          }
        }
      }
    }

    $this->itinerary = ItineraryPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->itinerary);

    $itinerary =& $this->itinerary;
    $this->errors = array();

    if($request->isMethod('post'))
    {
      # validation
      $mission_date = $request->getParameter('mission_date');
      if (empty($mission_date)) $this->errors[] = 'Mission date is required';

      $companions = (array)$request->getParameter('companions');
      if (count($companions)){
        $c = new Criteria();
        $c->add(CompanionPeer::ID, $companions, Criteria::IN);
        $c->add(CompanionPeer::PASSENGER_ID, $this->itinerary->getPassengerId());
        if (CompanionPeer::doCount($c) != count($companions)) {
          $this->errors[] = 'Some companions not found';
        }
      }

      #use it when add group mission
      $group_camp_id = $request->getParameter('add_passengers');

      switch ($request->getParameter('transportation')) {
        case 'air_mission':
          $origin_airports = (array)$request->getParameter('origin_idents');
          $dest_airports = (array)$request->getParameter('destination_idents');
          $idents = $dest_airports;
          $tmp_arr = array();
          foreach ($origin_airports as $i => $ident) {
            $idents[] = $ident;
            $v = $ident.' to '.$dest_airports[$i];
            if (in_array($v, $tmp_arr)) {
              $this->errors[] = 'Leg '.$v.' appeared more than one';
            }else{
              $tmp_arr[] = $v;
            }
            if ($dest_airports[$i] == $ident) $this->errors[] = 'Leg '.$ident.' to '.$dest_airports[$i].' is invalid';
          }
          $idents = array_unique($idents);
          $c = new Criteria();
          $c->add(AirportPeer::IDENT, $idents, Criteria::IN);
          if (count($idents) != AirportPeer::doCount($c)) {
            $this->errors[] = 'Some airport idents are invalid';
          }
          break;
        case 'ground_mission':
          $origin = $request->getParameter('ground_origin');
          $destination = $request->getParameter('ground_destination');
          if (empty($destination)) $this->errors[] = 'Please specify destination address';
          if (empty($origin)) {
            $this->errors[] = 'Please specify origin address';
          }elseif ($destination == $origin){
            $this->errors[] = 'Origin and Destination addresses conflict';
          }
          break;
        case 'commercial_mission':
          if ($v = $request->getParameter('airline_id')) {
            $custom = $request->getParameter('airline_custom');
            if ($v == 'other') {
              if (empty($custom)) $this->errors[] = 'Please type a new airline name!';
            }else{
              $airline = AirlinePeer::retrieveByPK($v = $request->getParameter('airline_id'));
              if (!($airline instanceof Airline)) $this->errors[] = 'Please select airline!';
            }
          }else{
            $this->errors[] = 'Please select airline!';
          }
          break;
        default:
          $this->errors[] = 'Please select Transportation Type';
      }

      if (count($this->errors)) {
        # error in form
        switch ($request->getParameter('transportation')) {
          case 'air_mission':
            $this->origin_idents = $origin_airports;
            $this->dest_idents = $dest_airports;
            break;
          case 'ground_mission':
            break;
          case 'commercial_mission':
            break;
        }
        $this->selected_companions = $companions;
      }else{
        # Create Mission
        $mission = new Mission();
        $mission->setItineraryId($itinerary->getId());
        $mission->setMissionTypeId($itinerary->getMissionTypeId());
        $mission->setDateRequested($itinerary->getDateRequested());
        $mission->setPassengerId($itinerary->getPassengerId());
        $mission->setRequesterId($itinerary->getRequesterId());
        $mission->setCampId($itinerary->getCampId());
        $mission->setMissionDate(strtotime($request->getParameter('mission_date')));
        $mission->setMissionSpecificComments($request->getParameter('comment'));
        $mission->save();

        # Create Companions
        foreach ($companions as $id) {
          $mission_companion = new MissionCompanion();
          $mission_companion->setMissionId($mission->getId());
          $mission_companion->setCompanionId($id);
          $mission_companion->save();
        }

        # Create Legs
        switch ($request->getParameter('transportation')) {
          case 'air_mission':
            for($i=0; $i<sizeof($origin_airports); $i++){
              $airport_o = AirportPeer::getByIdent($origin_airports[$i]);
              $airport_d = AirportPeer::getByIdent($dest_airports[$i]);

              $mission_leg = new MissionLeg();
              $mission_leg->setMissionId($mission->getId());
              $mission_leg->setLegNumber($i+1);
              $mission_leg->setFromAirportId($airport_o->getId());
              $mission_leg->setToAirportId($airport_d->getId());
              $mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
              $mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
              $mission_leg->setPassOnBoard(0);
              $mission_leg->setTransportation('air_mission');
              $mission_leg->save();
            }
            $this->getUser()->setFlash('success','Mission and Leg(s) has successfully created!');
            break;
          case 'ground_mission':
            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($mission->getId());
            $mission_leg->setLegNumber(1);
            $mission_leg->setPassOnBoard(0);
            $mission_leg->setTransportation('ground_mission');
            $mission_leg->setGroundOrigin($request->getParameter('ground_origin'));
            $mission_leg->setGroundDestination($request->getParameter('ground_destination'));
            $mission_leg->save();
            break;
          case 'commercial_mission':
            $flight_time = $request->getParameter('flight_time');
            if (empty($flight_time['hour']) || empty($flight_time['minute'])) $flight_time = null;
            $airline_id = $request->getParameter('airline_id');
            if ($airline_id == 'other') {
              $airline = new Airline();
              $airline->setName($request->getParameter('airline_custom'));
              $airline->save();
            }else{
              $airline = AirlinePeer::retrieveByPK($airline_id);
              $this->forward404Unless($airline);
            }
            $origins = $request->getParameter('origin');
            $destinations = $request->getParameter('destination');
            $flight_numbers = $request->getParameter('flight_number');
            $departures = $request->getParameter('departure');
            $arrivals = $request->getParameter('arrival');
            $mission->setFlightTime($flight_time['hour'].':'.$flight_time['minute'].' '.$flight_time['period']);
            $n_leg = 0;
            foreach ($origins as $i => $origin) {
              if (empty($origin) || empty($destinations[$i])) continue;
              $mission_leg = new MissionLeg();
              $mission_leg->setMissionId($mission->getId());
              $mission_leg->setLegNumber(++$n_leg);
              $mission_leg->setFlightTime($flight_time ? strtotime($flight_time['hour'].':'.$flight_time['minute'].' '.$flight_time['period']) : null);
              $mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
              $mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
              $mission_leg->setAirlineId($airline->getId());
              $mission_leg->setFundId($request->getParameter('fund_id'));
              $mission_leg->setConfirmCode($request->getParameter('confirm_code'));
              $mission_leg->setFlightCost($request->getParameter('flight_cost'));
              $mission_leg->setCommOrigin($origin);
              $mission_leg->setCommDest($destinations[$i]);
              $mission_leg->setFlightNumber($flight_numbers[$i]);
              $v = $departures[$i];
              if (empty($v['hour']) || empty($v['minute'])) $v = null;
              $mission_leg->setDeparture($v ? strtotime($v['hour'].':'.$v['minute'].' '.$v['period']) : null);
              $v = $arrivals[$i];
              if (empty($v['hour']) || empty($v['minute'])) $v = null;
              $mission_leg->setDeparture($v ? strtotime($v['hour'].':'.$v['minute'].' '.$v['period']) : null);
              $mission_leg->setTransportation('commercial_mission');
              $mission_leg->save();
            }
            break;
        }
        //        $this->redirect('@create_companion?id='.$mission_leg->getId());
        if(isset($group_camp_id)){
          $this->redirect('@mission_view?id='.$mission->getId().'&add_passengers='.$group_camp_id);
        }else{
          $this->redirect('@mission_view?id='.$mission->getId());
        }
      }
    }

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    $this->time_widget = new widgetFormTime();
    $this->mission = MissionPeer::getByItineraryId($this->itinerary ->getId());
    $this->airport_list = AirportPeer::getMappable();
    $this->ground_addresses = $this->getGroundAddresses();
    $this->airlines = AirlinePeer::doSelect(new Criteria());
    $this->funds = FundPeer::doSelect(new Criteria());
  }

  protected function getGroundAddresses()
  {
    return sfConfig::get('app_ground_address_type', array());
  }

  /**
   * Mission
   * CODE:mission_create
   */
  public function executeEdit(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

   

   if($request->getParameter('id')){
      $this->mission = MissionPeer::retrieveByPK($request->getParameter('id'));
   }

   //ziyed edited
   $itine = ItineraryPeer::retrieveByPk($this->mission->getItineraryId());
   $this->itine = $itine;
   $this->passenger = PassengerPeer::retrieveByPK($this->mission->getPassengerId());
   $this->passenger_a =( $this->passenger && $this->passenger->getPerson()) ? $this->passenger->getPerson()->getName() : '';

   $this->requester = RequesterPeer::retrieveByPK($this->mission->getRequesterId());
   $this->requester_a = ( $this->requester &&  $this->requester->getPerson() )? $this->requester->getPerson()->getName() : '';
   
   $this->agency  = AgencyPeer::retrieveByPK($this->mission->getAgencyId());
   $this->agencyName = $this->agency ? $this->agency->getName() : '';
   
   $this->camp = CampPeer::retrieveByPK($this->mission->getCampId());
   $this->campName = $this->camp ? $this->camp->getCampName() : '';
   //end of ziyed

    
    $this->form = new MissionForm($this->mission);
    $this->referer = $request->getReferer();

    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('mission_edit'));
      $this->referer = $request->getReferer();

      /*$errors = $this->form->getErrorSchema()->getErrors();
        if (count($errors) > 0)
        echo 'List of Errors:' . '<br>';
        {
        foreach ($errors as $name => $error)
        {
        echo $name . ': ' . $error . '<BR>';
        }
        }*/

      if($this->form->isValid()){
        $this->mission->setMissionTypeId($this->form->getValue('mission_type_id'));
        $this->mission->setMissionDate($this->form->getValue('mission_date'));
        $this->mission->setDateRequested($this->form->getValue('date_requested'));

        $pass = PassengerPeer::retrieveByPK($this->form->getValue('passenger_id'));

        if(isset($pass)){
          $this->mission->setPassengerId($pass->getId());
        }

        $req = RequesterPeer::retrieveByPK($this->form->getValue('requester_id'));

        if($req){
          $this->mission->setRequesterId($req->getId());
        }

        
        if($this->form->getValue('agency_id') == 0){
          $this->mission->setAgencyId(null);
        }else{
          $this->mission->setAgencyId($this->form->getValue('agency_id'));
        }

        if($this->form->getValue('camp_id') == 0){
          $this->mission->setCampId(null);
        }else{
          $this->mission->setCampId($this->form->getValue('camp_id'));
        }

        $coor = CoordinatorPeer::retrieveByPK($this->form->getValue('coordinator_id'));

        if(isset($coor)){
          $this->mission->setCoordinatorId($coor->getId());
        }

        $itId = ItineraryPeer::retrieveByPK($this->mission->getItineraryId());
        $mLeg = MissionLegPeer::getAllMissionLegByMissionId($request->getParameter('id'));
        $countLeg = MissionLegPeer::getMissionLegByMissionIdCount($request->getParameter('id'));

        $this->mission->setApptDate($this->form->getValue('appt_date'));
        $this->mission->setFlightTime($this->form->getValue('flight_time'));
        $this->mission->setTreatment($this->form->getValue('treatment'));
        $this->mission->setComment($this->form->getValue('comment'));
        $this->mission->setAppointment($this->form->getValue('appointment'));
        $this->mission->setMissionSpecificComments($this->form->getValue('mission_specific_comments'));

        if($this->form->getValue('cancel_mission') == 0){
            if(isset($countLeg)){
                foreach($mLeg as $ml){
                    $ml->setCancelMissionLeg(0);
                    $ml->save();
                }
            }
        }
        $this->mission->setCancelMission($this->form->getValue('cancel_mission'));

        $this->mission->save();

        $this->getUser()->setFlash('success','Mission has succesfully edited!');
        $this->redirect('@mission_view?id='.$this->mission->getId());
      }
    }
  }

  /**
   * Mission
   * CODE:mission_view
   */  
  public function executeView(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->backurl = $request->getReferer();
    if(strstr($this->backurl,'/update_medical_release')){
        $this->urltrue = 1;
    }
    
    if($request->getParameter('add_passengers')){
      $this->group_camp_id = $request->getParameter('add_passengers');
    }

    $this->mission = MissionPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission);

    $this->mission_legs = $this->mission->getMissionLegs();

    $p = $this->passenger = $this->mission->getPassenger();
    if ($p instanceof Passenger) {
      $this->person = $p->getPerson();
      # recent item
      $this->getUser()->addRecentItem('Mission for '.$this->person->getName(), 'mission', 'mission/view?id='.$this->mission->getId());
    }else{
      unset($this->passenger);
    }
    if($this->mission->getId()){
      $this->mission_for = MissionPeer::retrieveByPK($this->mission->getId());
      $this->can_use = 1;
    }else{
      $this->change_id = null;
    }


    $this->itinerary = $this->mission->getItinerary();

    $this->requester = $this->mission->getRequesterRelatedByRequesterId();

    $this->agency = $this->mission->getAgencyRelatedByAgencyId();

    // Pre-define addresses for ground missions
    $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '');
    $this->ground_addr_sel = $this->getGroundAddresses();
    if ($this->itinerary) {
      $this->ground_addresses['lodging'] = $this->ground_addresses['facility'] = $this->itinerary->getDestCity().', '.$this->itinerary->getDestState();
    }
    if ($this->passenger) {
      $this->ground_addresses['lodging'] = $this->passenger->getLodgingName().' '.$this->ground_addresses['lodging'];
      $this->ground_addresses['facility'] = $this->passenger->getFacilityName().' '.$this->ground_addresses['facility'];
      $this->ground_addresses['patient'] = $this->person->getAddress1().' '
      .$this->person->getAddress2().' '
      .$this->person->getCity().', '
      .$this->person->getState().' '
      .$this->person->getZipcode();
    }
  }

  /**
   * Manage companions view
   */
  public function executeCompanions(sfWebRequest $request)
  {
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->mission = MissionPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission);

    $this->passenger = $this->mission->getPassenger();
    if (!($this->passenger instanceof Passenger)) {
      $this->getUser()->setFlash('warning', 'This mission don\'t have passenger specified!');
      $this->redirect('mission/view?id='.$this->mission->getId());
    }

    $this->companions = $this->passenger->getCompanions();
    $this->mission_companions = array();
    foreach ($this->mission->getMissionCompanions() as $mis_comp) {
      $this->mission_companions[] = $mis_comp->getCompanionId();
    }
  }

  public function executeSaveCompanions(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->mission = MissionPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission);

    $this->passenger = $this->mission->getPassenger();
    if (!($this->passenger instanceof Passenger)) {
      $this->getUser()->setFlash('warning', 'This mission don\'t have passenger specified!');
      $this->redirect('mission/view?id='.$this->mission->getId());
    }

    $this->mission_companions = (array)$request->getParameter('companions');

    $c = new Criteria();
    $c->add(CompanionPeer::ID, $this->mission_companions, Criteria::IN);
    $c->add(CompanionPeer::PASSENGER_ID, $this->passenger->getId());
    if (CompanionPeer::doCount($c) != count($this->mission_companions)) {
      $this->getUser()->setFlash('warning', 'Some companions not found.');
      $this->setTemplate('companions');

      $this->companions = $this->passenger->getCompanions();

      return sfView::SUCCESS;
    }

    # passing this point makes all valid
    $c->clear();
    $c->add(MissionCompanionPeer::MISSION_ID, $this->mission->getId());
    MissionCompanionPeer::doDelete($c);
    foreach ($this->mission_companions as $id) {
      $mission_companion = new MissionCompanion();
      $mission_companion->setMissionId($this->mission->getId());
      $mission_companion->setCompanionId($id);
      $mission_companion->save();
    }
    $this->getUser()->setFlash('success', 'Companions successfully managed!');
    $this->redirect('mission/view?id='.$this->mission->getId());
  }

  /**
   * Display list of available missions for Staff members
   */
  public function executeStaffAvailable(sfWebRequest $request)
  {
    
	$this->getUser()->setFlash("warning", 'This link not available url '.$request->getUri());
	$this->redirect('dashboard/index');

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $person = PersonPeer::retrieveByPK($this->getUser()->getId());

    $this->date_range1 = '';
    $this->date_range2 = '';

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));

    $this->wings = WingPeer::getForSelectParentNew();

    $this->states = sfConfig::get('app_short_states');

    $this->has_filters = UserFilterPeer::getByPersonId($person->getId());
    if(isset($this->has_filters) && $this->has_filters instanceof UserFilter){
      $this->f_person_id = $this->has_filters->getId();
    }

    $this->mission_legs = MissionLegPeer::doSelect(new Criteria());

    #get Missions Pilot may interested
    $this->missions = MissionPeer::getByMayInterested();
    //$this->mission_types = MissionTypePeer::doSelect(new Criteria());
    
    $this->miss_pre = array();
    $this->miss_array = array();
    $this->miss_ids = array();
    $count_pre = 0;
    $count = 0;
    $check = 0;

    foreach ($this->mission_legs as $leg){
      $this->miss_ids[$leg->getMissionId()] = $leg->getMissionId();
    }
    foreach ($this->mission_legs as $leg){
      if($this->miss_ids[$leg->getMissionId()] == $leg->getMissionId()){
        $this->miss_array[$leg->getMissionId()] = $leg->getMissionId();
        $count++;
      }
    }
//      if($pilot->getPrimaryAirportId() == null && isset($pilot)){
//        $this->getUser()->setFlash('success','Pilot has not confirm Primary Airport!!');
//        $this->redirect('@pilot_view?id='.$pilot->getId());
//      }
//      $this->getUser()->setFlash('success','You are not Pilot yet!');
//      $this->redirect($request->getReferer());
  }

  public function executeReverse(sfWebRequest $request){
    #TODO
    #security

    if($request->getParameter('id')){
      $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
      $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());

      if(isset($mission) && $mission->getItineraryId()){
        $iti = $mission->getItinerary();
      }

      if($mission_leg->getTransportation() == 'air_mission')
      {
        if($mission_leg->getReverseFrom() == $mission_leg->getId()){ //Non reversed leg
          $orgin = $mission_leg->getFromAirportId();
          $dest = $mission_leg->getToAirportId();
          $miss_id =$mission_leg->getMissionId();
          $leg_id =$mission_leg->getId();
          $mission_leg->setReverseFrom($mission_leg->getId());
          $mission_leg->save();

          $mission_leg = new MissionLeg();
          $mission_leg->setMissionId($miss_id);
          $mission_leg->setReverseFrom($leg_id);
          $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($miss_id)+1);
          $mission_leg->setFromAirportId($dest);
          $mission_leg->setToAirportId($orgin);
          $mission_leg->setTransportation('air_mission');
          $mission_leg->save();
          $this->getUser()->setFlash('success','Mission #'.$mission->getId().'\'s legs have reversed.');
          $this->redirect('@itinerary_detail?id='.$iti->getId());
        }
      }elseif($mission_leg->getTransportation() == 'ground_mission'){
        if($mission_leg->getGroundOrigin() && $mission_leg->getGroundDestination()){
          //Reversed by type which saved : like patient..lodging..
          if($mission_leg->getGroundOrigin() == 'patient' && $mission_leg->getGroundDestination() == 'lodging'){
            $parent = $mission_leg->getGroundOrigin();
            $lodging = $mission_leg->getGroundDestination();
            $miss_id =$mission_leg->getMissionId();
            $leg_id = $mission_leg->getId();

            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($miss_id);
            $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($miss_id)+1);
            $mission_leg->setGroundOrigin($lodging);
            $mission_leg->setGroundDestination($parent);
            $mission_leg->setTransportation('ground_mission');
            $mission_leg->setReverseFrom($leg_id);
            $mission_leg->save();
          }
          if($mission_leg->getGroundOrigin() == 'lodging' && $mission_leg->getGroundDestination() == 'facility'){
            $facility =$mission_leg->getGroundDestination();
            $lodging =$mission_leg->getGroundOrigin();
            $miss_id =$mission_leg->getMissionId();
            $leg_id = $mission_leg->getId();

            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($miss_id);
            $mission_leg->setLegNumber(MissionLegPeer::getMaxLegNumber($miss_id)+1);
            $mission_leg->setGroundDestination($lodging);
            $mission_leg->setGroundOrigin($facility);
            $mission_leg->setTransportation('ground_mission');
            $mission_leg->setReverseFrom($leg_id);
            $mission_leg->save();
          }
          $this->getUser()->setFlash('success','Missoin #'.$mission->getId().'\'s legs have reversed.');
          $this->redirect('@itinerary_detail?id='.$iti->getId());
        }
      }
      if($mission_leg->getMissionId()){
        $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
      }
    }
  }

  public function executeEmail(sfWebRequest $request)
  {
    if($request->getParameter('leg_id')){
        $this->mission_legs = MissionLegPeer::getByMissionLegIds(array($request->getParameter('leg_id')));
    }else{
        $mission_ids = explode(",", $request->getParameter('total_checks', ''));
        $this->mission_legs = MissionLegPeer::getByMissionIds($mission_ids);
    }
    
    $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());

    $this->errors = array();
    $this->recipients = '';
    $this->subject = '';
    $this->sender_email = '';
    $this->sender_name = '';
    $this->message = '';
  }

  /**
   * Mission Available with camps Pilot view
   * CODE:mission_available_camp
   */  
  public function executeAvailableCamp(sfWebRequest $request){
    #security    
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

      // validity
      $person = PersonPeer::retrieveByPK($this->getUser()->getId());
      $this->forward404Unless($person);
      $member = $person->getMember();
      
//      $this->forward404Unless($member);
      if ($member) $pilot = $member->getPilot(); else $pilot = null;
//      $this->forward404Unless($pilot);

      
      if ($pilot && $pilot->getPrimaryAirportId() === null) {
        $this->getUser()->setFlash('warning', 'Please confirm Primary Airport!');
        $this->redirect('account/index');
      }

      // filter related
      $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));

      if ($pilot) $this->personal_flights = $pilot->getPersonalFlights(); else $this->personal_flights = array();
      $this->wings = WingPeer::doSelect(new Criteria());
      $this->idents = AirportPeer::doSelect(new Criteria());
      $this->states = sfConfig::get('app_short_states');
      $this->mission_types = MissionTypePeer::doSelect(new Criteria());

      if ($member) $this->av = $member->getAvailability(); else $this->av = null;
      $this->member = $member;
      $this->pilot = $pilot;
      if ($pilot) $this->primary_airport_id = $pilot->getPrimaryAirportId(); else $this->primary_airport_id = null;
      if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;

      $this->processFilterForm($request);
      $this->pager = MissionPeer::getPilotAvailablePager(
        $this->max,
        $this->airport,
        $this->page,
        $this->sort_by,
        $this->date_range1,
        $this->date_range2,
        $this->weekdays,
        $this->wing_id,
        $this->ident,
        $this->city,
        $this->state,
        $this->zip,
        $this->origin,
        $this->dest,
        $this->needs_pilot,
        $this->co_pilot,
        $this->ifr,
        $this->selected_types,
        $this->filled,
        $this->open,
        $this->max_pass,
        $this->max_weight,
        $this->max_distance,
        $this->min_efficiency,
        true,
        $this->ignore_availability
      );
      $this->miss_array = $this->pager->getResults();

      $this->missions = MissionPeer::getByMayInterested();
  
/*

        if(isset($pilot) && $pilot->getPrimaryAirportId() != null && $pilot instanceof Pilot){

          #get the Pilot's nearest Mission Legs with camps
          $this->mission_legs = MissionLegPeer::getPilotNearWithCamp($pilot->getPrimaryAirportId());

          echo var_dump($this->mission_legs);die();
          
          $this->missions = array();
          $this->camps = array();
          $count=0;

          foreach ($this->mission_legs as $leg){
            if($leg->getToAirportId()){
              $this->destination_airport = $leg->getToAirportId();
            }
            $this->missions[$count] = MissionPeer::retrieveByPK($leg->getMissionId());
            $this->camps[$count] = CampPeer::retrieveByPK(MissionPeer::retrieveByPK($leg->getMissionId())->getCampId());
            $count++;
          }

          #get Missions Pilot may interested
          $this->imissions = MissionPeer::getByMayInterested();

          $this->miss_pre = array();
          $this->miss_array = array();
          $this->miss_ids = array();
          $count_pre = 0;
          $count = 0;
          $check = 0;

          foreach ($this->mission_legs as $leg){
            $this->miss_ids[$leg->getMissionId()] = $leg->getMissionId();
          }

          foreach ($this->mission_legs as $leg){
            if($this->miss_ids[$leg->getMissionId()] == $leg->getMissionId()){
              $this->miss_array[$leg->getMissionId()] = $leg->getMissionId();
              $count++;
            }
          }
        }else{
          if($pilot->getPrimaryAirportId() == null && isset($pilot)){
            $this->getUser()->setFlash('success','Pilot has not confirm Primary Airport!!');
            $this->redirect('@pilot_view?id='.$pilot->getId());
          }
          $this->getUser()->setFlash('success','You are not Pilot yet!');
          $this->redirect($request->getReferer());
        }
      }else{
        $this->mission_legs = MissionLegPeer::doSelect(new Criteria());

        $this->missions = MissionPeer::getByMayInterested();

        $this->miss_pre = array();
        $this->miss_array = array();
        $this->miss_ids = array();
        $count_pre = 0;
        $count = 0;
        $check = 0;

        foreach ($this->mission_legs as $leg){
          $this->miss_ids[$leg->getMissionId()] = $leg->getMissionId();
        }

        foreach ($this->mission_legs as $leg){
          if($this->miss_ids[$leg->getMissionId()] == $leg->getMissionId()){
            $this->miss_array[$leg->getMissionId()] = $leg->getMissionId();
            $count++;
          }
        }
      }
    }*/
  }

  /**
   * Request a group Missions 
   * CODE:mission_request_group_create
   */ 
  public function executeRequestGroupMission(sfWebRequest $request){
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $camp = CampPeer::retrieveByPK($request->getParameter('id'));
    if(isset($camp) && $camp instanceof Camp){
      $this->camp_id = $camp->getId();
      $missions = MissionPeer::getByCampId($camp->getId());
    }
    $this->dates = array();
    $this->home_base = null;
    $this->number_of_seats = null;
    $this->total_carry = null;
    $this->multi_pick = null;
    $this->date_choice = null;
    $this->comment = null;
    $this->request_as = null;
    $this->acc_cre = null;
    $this->pilot_ma = null;
    $this->IFR = null;
    $this->aircraft = null;
    $this->tail = null;
    $this->other_pilot = null;


    $miss_dates = array();
    //$appt_dates = array();
    //$count = 0;
    //$count2 = 0;

    foreach ($missions as $mission){
      if($mission->getMissionDate()){
        $miss_dates[$mission->getMissionDate('m/d/Y')] = $mission->getMissionDate();
        //$count++;
        //it may change
        $this->mission_date = $mission->getMissionDate();
        $this->appt_date = $mission->getApptDate();
        //
      }
      /*
      if($mission->getApptDate()){
        $appt_dates[$count2] = $mission->getApptDate();
        $count2++;
      }*/
      $miss_id = $mission->getId();
    }
    
    $this->mission_dates = array();
    $this->mission_dates = $miss_dates;
    
    if(isset($miss_id)){
      $legs = MissionLegPeer::getbyMissId($miss_id);
      $this->mission = MissionPeer::retrieveByPK($miss_id);
      foreach ($legs as $leg){
        if($leg->getToAirportId()){
          $this->leg = $leg;
          $airport = AirportPeer::retrieveByPK($leg->getToAirportId());
          if(isset($airport) && $airport instanceof Airport){
            $this->destination_airport=$airport;
          }
        }
      }
    }

    /*
    if(isset($miss_dates[$count-1])){
      $this->mission_date = $miss_dates[$count-1];
    }
    if(isset($appt_dates[$count2-1])){
      $this->appt_date = $appt_dates[$count2-1];
    }
    */
    //$this->mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
    $member = MemberPeer::getByPersonId($this->getUser()->getId());

    if(isset($member)){
      $this->pilot = PilotPeer::getByMemberId($member->getId());
      $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($member->getId());

      $this->pre_requests = PilotRequestPeer::getByMemnerIdLegIdCamp($member->getId(),$this->leg->getId());
    }


    if($request->isMethod('post')){
      if($request->getParameter('id')){

          //set post variables
          $this->dates = $request->getParameter('dates[]', array());
          $this->home_base = $request->getParameter('home_base');
          $this->number_of_seats = $request->getParameter('number_of_seats');
          $this->total_carry = $request->getParameter('total_carry');
          $this->multi_pick = $request->getParameter('multi_pick');
          $this->date_choice = $request->getParameter('date_choice');
          $this->comment = $request->getParameter('comment');
          $this->request_as = $request->getParameter('request_as');
          $this->acc_cre = $request->getParameter('acc_cre');
          $this->pilot_ma = $request->getParameter('pilot_ma');
          $this->IFR = $request->getParameter('IFR');
          $this->aircraft = $request->getParameter('aircraft');
          $this->tail = $request->getParameter('tail');
          $this->other_pilot = $request->getParameter('other_pilot');

          if(count($this->dates) > 0 && $request->getParameter('home_base') && $request->getParameter('number_of_seats') && $request->getParameter('total_carry') ){
            //check if this pilot requested this camp already?
            $c =
            $has_requested = PilotRequestPeer::getByMemberIdCampId($member->getId(),$request->getParameter('camp_id'));
            if(!$has_requested){
              $pilot_request = new PilotRequest();

              if($member)$pilot_request->setMemberId($member->getId());
              $pilot_request->setGroupCampId($request->getParameter('camp_id'));

              if($request->getParameter('home_base')){
                $airport_hb = AirportPeer::getByIdent($request->getParameter('home_base'));
                if(isset($airport_hb) && $airport_hb instanceof Airport){
                  $pilot_request->setHomeBase($airport_hb->getIdent());
                }else{
                  $this->getUser()->setFlash('warning','Home Base is not found!');
                  $this->redirect($request->getReferer());
                }
              }
              if($request->getParameter('number_of_seats')){
                if(is_integer((int)$request->getParameter('number_of_seats'))){
                  $pilot_request->setNumberSeats((int)$request->getParameter('number_of_seats'));
                }else{
                  $this->getUser()->setFlash('warning','Number of seats is in wrong format!');
                  $this->redirect($request->getReferer());
                }
              }
              if($request->getParameter('total_carry')){
                if(is_int((int)$request->getParameter('total_carry'))){
                  $pilot_request->setTotalWeight((int)$request->getParameter('total_carry'));
                }else{
                  $this->getUser()->setFlash('success','Total of carry value is in wrong format!');
                  $this->redirect($request->getReferer());
                }
              }
              $pilot_request->setMultiplePick($request->getParameter('multi_pick'));
              $pilot_request->save();

              if(count($this->dates)>0){
                  #check is has Pilot Date
                  //$has_pilot_date = PilotDatePeer::getByMemberId($member->getId());
                  for ($y=0;$y<count($this->dates);$y++){
                    $pilot_date = new PilotDate;
                    $pilot_date->setMemberId($member->getId());
                    $pilot_date->setDate($this->dates[$y]);
                    $pilot_date->setPilotRequestId($pilot_request->getId());
                    $pilot_date->save();
                  }
              }
              if(count($this->dates)==0){
                $pilot_request->setDate($this->dates[0]);
              }

              $pilot_request->setNumberDateAssign($request->getParameter('date_choice', 1));
              $pilot_request->setPilotType($request->getParameter('request_as'));
              $pilot_request->setComment($request->getParameter('comment'));
               
              $pilot_request->setAircraftId($request->getParameter('aircraft'));
              $pilot_request->setTail($request->getParameter('tail'));

              //check pilot_type
              if($request->getParameter('other_pilot') == 1){
                ////mission assistant,earth angel
                  $pilot_request->setMissionAssistantWanted(0);
                  $pilot_request->setIfrBackupWanted(0);

                  $pilot_request->setAccepted(0);
                  $pilot_request->setProcessed(0);
                  $pilot_request->setOnHold(0);
              }else{
                ////command pilot
                  $pilot_request->setProcessed(1);

                  if($request->getParameter('acc_cre') == 1){
                    $pilot_request->setMissionAssistantWanted(0);
                    #set pilot as mission assistant
                    if($member->getPerson()){
                      $pilot_request->setMissionAssistantName($member->getPerson()->getLastName().' '.$member->getPerson()->getFirstName());
                    }
                  }else{
                    $pilot_request->setMissionAssistantWanted(0);
                    #set pilot's mission assistant as mission assistant
                    if($request->getParameter('pilot_ma')){
                      $pilot_request->setMissionAssistantName($request->getParameter('pilot_ma'));
                    }
                  }
                  if($request->getParameter('IFR') == 0){
                    $pilot_request->setIfrBackupWanted(0);
                  }else{
                    $pilot_request->setIfrBackupWanted(1);
                  }

              }

              $pilot_request->setCreatedAt(date('m/d/y'));
              $pilot_request->save();

              $this->getUser()->setFlash('success','Your request has been saved on Camp ID#'.$request->getParameter('camp_id'));
              //            $this->redirect('@pilot_thanks?id='.$request->getParameter('id'));
            }else{
              $this->getUser()->setFlash('success','You have already requested this Camp Mission!');
              //            $this->redirect('@pilot_thanks?id='.$request->getParameter('id'));
            }
          }else{
            if(count($this->dates) < 1 ){
              $this->date_other_e =1;
              $this->type = $request->getParameter('request_as');
            }
            if(!$request->getParameter('home_base')){
              $this->home = 1;
            }
            if(!$request->getParameter('number_of_seats')){
              $this->number_of= 1;
            }
            if(!$request->getParameter('total_carry')){
              $this->carry= 1;
            }
          }
      }
    }
  }

  /**
   * Update Mission's Medical Release
   * CODE:update_medical_release
   */ 
  public function executeUpdateMedicalRelease(sfWebRequest $request){
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find-camp'));

    
    
    # filter
    $this->processMedicalFilter($request); //storing in session
    
    $this->pager = MissionPeer::getMedicalPager(
    $this->max,
    $this->page,
    $this->miss_date1,
    $this->miss_date2,
    //$this->wing_name,
    $this->passenger,
    $this->out_off_date,
    $this->current,
    $this->campers
    );

    $this->missions = $this->pager->getResults();

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    //$this->miss_date1 = '';
    //$this->miss_date2 = '';
    //    $this->med_date1 = '';
    //    $this->med_date2 = '';
    
    
  }
  private function processMedicalFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('mission', array(), 'person');    

    if (!isset($params['miss_date1'])) $params['miss_date1'] = null;
    if (!isset($params['miss_date2'])) $params['miss_date2'] = null;
    //if (!isset($params['wing_name'])) $params['wing_name'] = null;
    if (!isset($params['passenger'])) $params['passenger'] = null;
    if (!isset($params['out_off_date'])) $params['out_off_date'] = null;
    if (!isset($params['current'])) $params['current'] = null;
    if (!isset($params['campers'])) $params['campers'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->wings = WingPeer::getNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter'))
    {
      $params['miss_date1']    = null;
      $params['miss_date2']    = null;
      //$params['wing_name']     = null;
      $params['passenger']     = null;
      $params['out_off_date']  = null;
      $params['current']       = null;
      $params['campers']       = null;
    }else{
      if($request->getParameter('miss_date1')) $params['miss_date1']    = $request->getParameter('miss_date1');
      if($request->getParameter('miss_date2')) $params['miss_date2']    = $request->getParameter('miss_date2');
      //if($request->getParameter('wing_name')) $params['wing_name']     = (in_array($request->getParameter('wing_name'), array_keys($this->wings)) ? $request->getParameter('wing_name') : '');
      //$params['passenger']     = $request->getParameter('passenger') ? $request->getParameter('passenger') : $params['passenger'];
      if($request->getParameter('passenger')) $params['passenger'] = $request->getParameter('passenger');
      if($request->getParameter('out_off_date')) $params['out_off_date']  = $request->getParameter('out_off_date');
      if($request->getParameter('current')) $params['current']       = $request->getParameter('current');
      if($request->getParameter('campers')) $params['campers']       = $request->getParameter('campers');
    }
    if(!$request->getParameter('passenger') && !$request->getParameter('miss_date1') && !$request->getParameter('miss_date2') && !$request->getParameter('out_off_date') && !$request->getParameter('current') && !$request->getParameter('campers')){
      $params['miss_date1']    = null;
      $params['miss_date2']    = null;
      //$params['wing_name']     = null;
      $params['passenger']     = null;
      $params['out_off_date']  = null;
      $params['current']       = null;
      $params['campers']       = null;
    }

    $this->page                = $page = $request->getParameter('page', 1);
    $this->max                 = $params['max'];
    $this->miss_date1          = $params['miss_date1'];
    $this->miss_date2          = $params['miss_date2'];
    //$this->wing_name           = $params['wing_name'];
    $this->passenger           = $params['passenger'];
    $this->out_off_date        = $params['out_off_date'];
    $this->current             = $params['current'];
    $this->campers             = $params['campers'];

    
    
    $this->getUser()->setAttribute('mission', $params, 'person');
  }

  /**
 * Save Filter missions by filter
 * CODE:
 */
  public function executeFilter(sfWebRequest $request){
    #TODO
    #security

    $miss_date1   = $request->getParameter('miss_date1', '');
    $miss_date2   = $request->getParameter('miss_date2', '');
    $wing         = $request->getParameter('wing_name', '');
    $passenger    = $request->getParameter('passenger', '');
    $out_off_date = $request->getParameter('out_off_date', '');
    $current      = $request->getParameter('current', '');
    $campers      = $request->getParameter('campers', '');


    $this->processMedicalFilter($request); //storing in session

    $this->pager = MissionPeer::getMedicalPager(
        $request->getParameter('max'),
        $request->getParameter('page'),
        $miss_date1,
        $miss_date2,
        $wing_name,
        $passenger,
        $out_off_date,
        $current,
        $campers);
    $this->missions = $this->pager->getResults();
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    $this->med_date1 = '';
    $this->med_date2 = '';
  }

  /**
 * Save Edit Mission's Need Release or not
 * CODE:
 */
  public function executeEditNeedMedicalRelease(sfWebRequest $request){

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->passenger = PassengerPeer::retrieveByPk($this->getRequestParameter('id'));

      if(isset($this->passenger) && $this->passenger instanceof Passenger ){
        if (trim($this->getRequestParameter('value')))
        {
          if(strtolower($this->getRequestParameter('value')) == 'yes'){
            $this->passenger->setNeedMedicalRelease(1);
          }elseif(strtolower($this->getRequestParameter('value')) == 'no'){
            $this->passenger->setNeedMedicalRelease(0);
            $this->passenger->setMedicalReleaseReceived(null);
          }else{
            $str = <<<XYZ
        <script type="text/javascript">
        alert('Please type no to set it unactive!');
        window.location.reload();
        </script>
XYZ;
            return $this->renderText($str);
}
$this->passenger->save();

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

  /**
   * Save Edit Mission's Medical Release Date
        * CODE:
        */
  public function executeEditMedicalDate(sfWebRequest $request){

    if($request->isMethod('post')){
      $miss_id = $request->getParameter('miss_id', '');
      $pass_id = $request->getParameter('passenger_id'.$miss_id, '');
      $medical_date =$request->getParameter('medicalDate'.$miss_id, '');

      if(isset($medical_date) && isset($pass_id)){

        $passenger = PassengerPeer::retrieveByPK($pass_id);
        if(isset($passenger) && $passenger instanceof Passenger){
          $passenger->setMedicalReleaseReceived($medical_date);
          if($medical_date){
            $passenger->setNeedMedicalRelease(1);
          }else{
            $passenger->setNeedMedicalRelease(0);
          }
          $passenger->save();
          $this->date = $passenger->getMedicalReleaseReceived();

        }
      }
    }
  }

  /**
   * AJAX
   * Saves all changes made to a person
   * CODE: person_create
   * CODE: person_save_roles
   */
  public function executeSave(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    //echo var_dump($request->getParameter('passenger_id'));die();

    # validate person
    $person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    if (!($person instanceof Person)) return $this->renderText('Data is invalid! Please refresh and try again!');

    $saved_values = array();
    $errors = array();
    $form = new PersonForm($person, null, false);

    # email list
    $params = $request->getGetParameters();
    $ids = array();
    foreach ($params as $name => $value) {
      if (substr($name, 0, 11) == 'email_list_') {
        $ids[] = (int)substr($name, 11);
      }
    }
    $validator = new sfValidatorPropelChoice(array('model' => 'EmailList', 'column' => 'id', 'required' => false, 'multiple' => true, 'empty_value' => array()));
    $err = false;
    try {
      $ids = $validator->clean($ids);
    }catch(sfValidatorError $e) {
      $errors[] = 'Couldn\'t save mailing list. Please refresh and try again';
      $err = true;
    }
    if (!$err) {
      $c = new Criteria();
      $c->add(EmailListPersonPeer::PERSON_ID, $person->getId());
      EmailListPersonPeer::doDelete($c);
      foreach ($ids as $id) {
        if ($request->getParameter('email_list_'.$id) == 1) {
          $email_list_person = new EmailListPerson();
          $email_list_person->setListId($id);
          $email_list_person->setPersonId($person->getId());
          $email_list_person->save();
          $saved_values['email_list_'.$id] = 1;
        }else{
          $saved_values['email_list_'.$id] = 0;
        }
      }
    }

    $request_params = array_intersect_key($request->getGetParameters(), $form->getWidgetSchema()->getFields());

    $params = array_merge($person->toArray(BasePeer::TYPE_FIELDNAME), $request->getGetParameters());
    $params = array_intersect_key($params, $form->getWidgetSchema()->getFields());
    $form->bind($params);
    if (!$form->isValid()) {
      foreach ($form->getErrorSchema()->getErrors() as $field => $e) {
        $errors[] = $e->__toString();
      }
    }else{
      $form->save();
      foreach ($request_params as $field => $v) {
        $saved_values[$field] = $form->getValue($field);
      }
    }

    # roles
    if ($request->hasParameter('roles')) {
      if ($this->getUser()->hasCredential(array('Administrator'), false) == true) {
        $roles = $request->getParameter('roles');
        $validator = new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id', 'required' => false, 'multiple' => true, 'empty_value' => array()));
        $err = false;
        try {
          $roles = $validator->clean($roles);
        }catch(sfValidatorError $e) {
          $errors[] = 'Couldn\'t save roles. Please refresh and try again';
          $err = true;
        }
        if (!$err) {
          $c = new Criteria();
          $c->add(PersonRolePeer::PERSON_ID, $person->getId());
          PersonRolePeer::doDelete($c);
          foreach ($roles as $role) {
            $person_role = new PersonRole();
            $person_role->setPersonId($person->getId());
            $person_role->setRoleId($role);
            $person_role->save();
          }
          $saved_values['roles'] = $roles;
        }
      }else{
        $errors[] = 'You don\'t have permission to edit person roles!';
      }
    }
    $this->errors = $errors;
    $this->saved_values = $saved_values;
  }

  /**
   * cancel Mission
   */

  public function executeCancelMission(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    //$request->checkCSRFProtection();
    $this->forward404Unless($mission = MissionPeer::retrieveByPk($request->getParameter('id')), sprintf('Object itinerary does not exist (%s).', $request->getParameter('id')));

    $mission = MissionPeer::retrieveByPk($request->getParameter('id'));
    $mLeg = MissionLegPeer::getAllMissionLegByMissionId($request->getParameter('id'));
    //$countLeg = MissionLegPeer::getMissionLegByMissionIdCount($request->getParameter('id'));

    if(isset($mission)){
    //if(isset($countLeg)){
        foreach($mLeg as $ml){
            $ml->setCancelMissionLeg(0);
            $ml->save();
        }
    //}
    $mission->setCancelMission(0);
    $mission->save();
    //mail

    $receivers = retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToMission($mission);
    $mission_legs = $mission->getMissionLegs();

    foreach($mission_legs as $mission_leg){
        $receivers = array_merge($receivers,retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToMissionLeg($mission_leg));
    }

    //print_r($receivers);    exit ();

   $text = 'Mission '.$mission->getId().' has been cancelled. Regards, Angel Flight West';
//       unset($receivers);
//       $receivers[] = 'masum@bglobalsourcing.com';
//       $receivers[] = 'yasir@bglobalsourcing.com';

   $this->getComponent('mail', 'itinerary_Mission_MissionLegCancel', array(
       'email' => array_unique($receivers),
       'subject' => 'Angel Flight West Mission cancel information',
       'text' => $text
    ));
    }
    $this->getUser()->setFlash('success', 'The mission '.$mission->getId().' has been cancelled successfully.');
    $this->redirect('mission/index');
  }

  /**
   * Show Future and past missions for the pilot
   */
  public function executeSummary(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $pilot_id = (int)$this->getUser()->getPilotId();
    if ($pilot_id == 0){
      $this->getUser()->setFlash('warning', 'You seems not a pilot. Make sure you have a pilot record created!');
      $this->redirect($request->getReferer());
    }
    $this->past = false;
    if ( $request->getParameter('past') == 1 ) $this->past = true;
    $page = (int)$request->getParameter('page');
    $max = sfConfig::get('app_max_mission_summary_per_page', 10);

    $this->pager = MissionLegPeer::getSummaryPagerPending( $pilot_id, $max, $page, $this->past );
    $this->mission_legs = $this->pager->getResults();	
	//$this->count = $this->pager->getNbResults();
			
  }

  public function executeYearReport(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));

    $start_date = (string)$request->getParameter('start_date');
    $end_date = (string)$request->getParameter('end_date');

    if (strlen($start_date) == 0 || strlen($end_date) == 0) {
      $start_date = (date('Y')-1).'-01-01';
      $end_date = (date('Y')-1).'-12-31';
    }
    $start_date = date('Y-m-d H:i:s', strtotime($start_date.' 00:00:01'));
    $end_date = date('Y-m-d H:i:s', strtotime($end_date.' 23:59:59'));

    $c = new Criteria();
    $c->addJoin(MissionReportPeer::ID, MissionLegPeer::MISSION_REPORT_ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionLegPeer::PILOT_ID, PilotPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(PilotPeer::MEMBER_ID, MemberPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(MemberPeer::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    
    $c->add(MissionReportPeer::MISSION_DATE, $start_date, Criteria::GREATER_EQUAL);
    $c->add(MissionReportPeer::MISSION_DATE, $end_date, Criteria::LESS_EQUAL);

    $con = Propel::getConnection();
    $query =
    'SELECT '
      .MissionReportPeer::ID.' as mission_report_id,'
      .' COUNT('.MissionLegPeer::ID.') as leg_count,'
      .MissionReportPeer::MISSION_DATE.' as mission_date,'
      .MissionReportPeer::HOBBS_TIME.' as hobbs_time,'
      .MissionReportPeer::COMMERCIAL_TICKET_COST.' as commercial_ticket_cost,'
      .MemberPeer::EXTERNAL_ID.' as external_id,'
      .PersonPeer::FIRST_NAME.' as first_name,'
      .PersonPeer::LAST_NAME.' as last_name,'
      .PersonPeer::ADDRESS1.' as address1,'
      .PersonPeer::ADDRESS2.' as address2,'
      .PersonPeer::CITY.' as city,'
      .PersonPeer::STATE.' as state,'
      .PersonPeer::ZIPCODE.' as zipcode '
    .'FROM '.MissionReportPeer::TABLE_NAME.' '
      .'LEFT JOIN '.MissionLegPeer::TABLE_NAME.' on ('.MissionReportPeer::ID.' = '.MissionLegPeer::MISSION_REPORT_ID.') '
      .'LEFT JOIN '.PilotPeer::TABLE_NAME.' on ('.MissionLegPeer::PILOT_ID.' = '.PilotPeer::ID.') '
      .'LEFT JOIN '.MemberPeer::TABLE_NAME.' on ('.PilotPeer::MEMBER_ID.' = '.MemberPeer::ID.') '
      .'LEFT JOIN '.PersonPeer::TABLE_NAME.' on ('.MemberPeer::PERSON_ID.' = '.PersonPeer::ID.') '
    .'WHERE '
      .PersonPeer::ID.' = '.(int)($this->getUser()->getId()).' '
      .'AND '.MissionLegPeer::CANCELLED.' IS NULL '
      .'AND '.MissionReportPeer::APPROVED.' = 1 '
      .'AND '.MissionReportPeer::MISSION_DATE.' > \''.$start_date.'\' '
      .'AND '.MissionReportPeer::MISSION_DATE.' < \''.$end_date.'\' '
    .'GROUP BY '
      .MissionReportPeer::ID.','
      .MemberPeer::EXTERNAL_ID.','
      .PersonPeer::ID
    ;
    
    $stmt = $con->prepare($query);
    $stmt->execute();
    $this->objs = array();
    while ($rs = $stmt->fetch(PDO::FETCH_OBJ) ) {
      $this->objs[] = $rs;
    }
  }

  public function executeVisual(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $member_id = $this->getUser()->getMemberId();
    $member = MemberPeer::retrieveByPK($member_id);
    $pilot = $member->getPilot();
    if($request->getParameter('first')==1){
     if($pilot){
        $first_airport = AirportPeer::retrieveByPK($pilot->getPrimaryAirportId());
        $this->orgin_airport = $first_airport->getIdent();
     }
     $this->types = MissionTypePeer::getOnlyNames();
     $this->dest_airport = null;
     $this->miss_type = null;
     $this->miss_date1 = null;
     $this->miss_date2 = null;
    }else{
      $this->processFilterVisual($request);
    }
    $this->airport_list = AirportPeer::getMappable();
    $this->legs = MissionLegPeer::getMappable(
     $this->orgin_airport,
     $this->dest_airport,
     $this->miss_type,
     $this->miss_date1,
     $this->miss_date2
    );
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }
  
  public function executePending(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->processPendingFilter($request);
    $this->pager = MissionLegPeer::getPendingPager(
      $this->max,
      $this->page,
      $this->wing_id,
      $this->ident
    );
    $this->mission_legs = $this->pager->getResults();
  }

  private function processPendingFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('missions_pending', array(), 'person');

    if (!isset($params['wing_id'])) $params['wing_id'] = null;
    if (!isset($params['ident'])) $params['ident'] = null;
    
    $this->max_array = array(5, 10, 20, 30);
    $this->wings = WingPeer::getNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = 10;
    }

    if ($request->hasParameter('filter')) {
      $params['ident'] = $request->getParameter('ident');
      $params['wing_id']   = (in_array($request->getParameter('wing_id'), array_keys($this->wings)) ? $request->getParameter('wing_id') : '');
    }

    $this->page    = $page = $request->getParameter('page', 1);
    $this->max     = $params['max'];
    $this->wing_id = $params['wing_id'];
    $this->ident   = $params['ident'];

    $this->getUser()->setAttribute('missions_pending', $params, 'person');
  }

  public function executeSendEmail(sfWebRequest $request)
  {
    $subject = $request->getParameter('subject');
    $to = $request->getParameter('recipients');
    $sender_email = $request->getParameter('sender_email');
    $sender_name = $request->getParameter('sender_name');
    $message = $request->getParameter('message');
    $leg_ids = $request->getParameter('leg_ids');

    $errors = array();
    // validate recievers
    if (empty($to)) {
      $errors['email'][0] = 'please specify email address';
      $this->getUser()->setFlash('error', 'Please specify email address!');
      $this->redirect($request->getReferer());
    }else{
      $recievers = explode(',', $to);
      $pat = '/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i';
      $full_pat = '/^([- a-z0-9]+)\<(([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,}))\>$/i';
      $emails = array();
      foreach ($recievers as $reciever) {
        $reciever = trim($reciever);
        //if (empty($reciever)) { continue; }
        if (preg_match($full_pat, $reciever, $matches)) {
          $emails[$matches[2]] = $matches[1];
        }elseif (preg_match($pat, $reciever, $matches)) {
          $emails[$matches[0]] = '';
        }else{
          if (!isset($errors['email'])) $errors['email'] = array();
          $errors['email'][] = $reciever.' is unrecognizable email';
        }
      }
      if(count($emails)<1){
        $errors['email'][0] = 'Please check email address';
      $this->getUser()->setFlash('error', 'Please check email address!');
      $this->redirect($request->getReferer());
      }
    }

//    function checkEmail($email) {
//  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])
//  ↪*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",
//               $email)){
//    list($username,$domain)=split('@',$email);
//      if(!checkdnsrr($domain,'MX')) {
//        return false;
//      }
//    return true;
//    }
//    return false;
//  }

    // validate subject
    if (empty($subject)) $errors['subject'] = 'subject required';

    // validate sender
    $v_email = new sfValidatorEmail(array(), array('invalid' => 'please specify email address'));
    try {
      if($sender_email){
      $sender_email = $v_email->clean($sender_email);
      }else{
        $sender_email = sfConfig::get('app_mailer_mail', 'AngelFlight@yahoo.com');
      }
      if(!$sender_name){$sender_name=sfConfig::get('app_mailer_name', 'AngelFlight Test');}
    }catch(sfValidatorError $e){
      $errors['sender_email'] = $e->__toString();
      $this->getUser()->setFlash('error', 'Please check sender email address!');
      $this->redirect($request->getReferer());
    }

    // catch errors
    if ($errors) {
      $this->mission_legs = MissionLegPeer::getByMissionLegIds($leg_ids);
      $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());

      

    }

    // attachments
    $files = array();
    foreach ($request->getFiles() as $file) {
      if ($file['error'] != 0) continue;
      $files[] = array('path' => $file['tmp_name'], 'name' => $file['name']);
    }

    // add leg information
    if ($leg_ids) {
      $mission_legs = MissionLegPeer::getByMissionLegIds($leg_ids);
      $message .= '<hr/>'.$this->getComponent('mission', 'includedMissionsTemplate', array('mission_legs' => $mission_legs));
    }

    # TODO queue emails instead of directly sending
    $this->getComponent('mail', 'missionToPilot', array(
      'subject' => $subject,
      'recievers' => $emails,
      'sender' => array($sender_email => $sender_name),
      'body' => $message,
      'files' => $files,
    ));
    
    $this->getUser()->setFlash('success', 'Bulk email have successfully queued!');
    $this->redirect($request->getReferer());
  }

  /**
 * Missing waivers
 * CODE:missing_waivers
 * TODO:
*/

  public function executeMissingWaivers(sfWebRequest $request)
  {
    #security
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    # filter
    $this->processMissingWaiversFilter($request);
    $this->pager = MissionLegPeer::getMissingWaiversPager(
    $this->max,
    $this->page,
    $this->mission_date1,
    $this->mission_date2,
    $this->pass_name,
    $this->pilot_name,
    $this->wing
    );
    
    $this->leg_list = $this->pager->getResults();

    $this->wings = WingPeer::doSelect(new Criteria());
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    
  }

  /**
   * Searches for mission legs that missing waivers by filter
   */
  private function processMissingWaiversFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('missing_waivers', array(), 'missing_waivers');

    if (!isset($params['mission_date1'])) $params['mission_date1'] = null;
    if (!isset($params['mission_date2'])) $params['mission_date2'] = null;
    if (!isset($params['pass_name'])) $params['pass_name'] = null;
    if (!isset($params['pilot_name'])) $params['pilot_name'] = null;
    if (!isset($params['wing'])) $params['wing'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['mission_date1']  = $request->getParameter('mission_date1');
      $params['mission_date2']  = $request->getParameter('mission_date2');
      $params['pass_name']       = $request->getParameter('pass_name');
      $params['pilot_name']      = $request->getParameter('pilot_name');
      $params['wing']      = $request->getParameter('wing');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->mission_date1  = $params['mission_date1'];
    $this->mission_date2  = $params['mission_date2'];
    $this->pass_name       = $params['pass_name'];
    $this->pilot_name      = $params['pilot_name'];
    $this->wing      = $params['wing'];

    $this->getUser()->setAttribute('missing_waivers', $params, 'missing_waivers');
  }

  public function executeUpdateMissingWaivers(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    for($i=0; $i<30 ; $i++){
        if($request->getParameter($i)!=null){
            $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'.$i));
            if($mission_leg!=null){
                $mission_leg->setWaiverReceived($request->getParameter($i));
                $mission_leg->save();
            }
        }
    }

    return $this->redirect('@missing_waivers');
  }

  private function processFilterForm(sfWebRequest $request)
  {
//    if(!$request->getParameter('filter') && !$request->getParameter('page_sort')) {
//        //if saved filters
//        $this->has_filters = UserFilterPeer::getByPersonId($this->getUser()->getId());
//        $arr = array();
//        //if saved filters, get selected mission types
//        $s = $this->mission_types;
//        if($this->has_filters) {
//            $s = $this->has_filters->getUserFilterMissionTypess();
//        }
//        if (sizeof($s) > 0) {
//            foreach ($s as $ru) {
//                if($this->has_filters) {
//                    $arr[] = $ru->getMissionTypeId();
//                }else {
//                    $arr[] = $ru->getId();
//                }
//            }
//        }
//        $params['selected_types'] = $arr;
//
//        //here set all values
//        if($this->has_filters) {
//
//            $params['orgin'] =  $this->has_filters->getOrgin();
//            $params['dest']  =  $this->has_filters->getDest();
//
//            $params['date_range1'] = $this->has_filters->getDateRange1();
//            $params['date_range2']  = $this->has_filters->getDateRange2();
//
//            $params['filled'] = $this->has_filters->getFilled();
//            $params['open']  = $this->has_filters->getOpen();
//
//            //needs by
//            $params['pilot'] = $this->has_filters->getIsPilot();
//            $params['mission_assistant']  = $this->has_filters->getIsMa();
//            $params['ifr_backup'] = $this->has_filters->getIfrBackup();
//
//            $params['selected_types'] = array();
//
//            $params['all_type'] = $this->has_filters->getAlltype();
//
//            //TODO: review when saving filter action is functioned
//            $params['is_check'] = $this->has_filters->getAvailability();
//
//            if($params['is_check'] == 1) {
//                $this->av = AvailabilityPeer::getByMemberId($member->getId());
//            }
//            //days
//            $params['day_1'] = $this->has_filters->getDay1();
//            $params['day_2'] = $this->has_filters->getDay2();
//            $params['day_3'] = $this->has_filters->getDay3();
//            $params['day_4'] = $this->has_filters->getDay4();
//            $params['day_5'] = $this->has_filters->getDay5();
//            $params['day_6'] = $this->has_filters->getDay6();
//            $params['day_7'] = $this->has_filters->getDay7();
//
//            $params['max_pass'] = $this->has_filters->getMaxPassenger();
//            $params['max_wei'] = $this->has_filters->getMaxWeight();
//            $params['max_dist'] = $this->has_filters->getMaxDistance();
//            $params['max_eff'] = $this->has_filters->getMaxEffciency();
//
//            $params['wing'] = $this->has_filters->getWing();
//            $params['ident'] = $this->has_filters->getIdent();
//            $params['city'] = $this->has_filters->getCity();
//            $params['state'] = $this->has_filters->getZipcode();
//            $params['zip'] = $this->has_filters->getState();
//
//        }
//    }else{
//    }
    $params = $this->getUser()->getAttribute('staff_available', array(), 'person');

    if (!isset($params['sort_by'])) $params['sort_by'] = 1;
    if (!isset($params['date_range1'])) $params['date_range1'] = null;
    if (!isset($params['date_range2'])) $params['date_range2'] = null;
    if (!isset($params['weekdays'])) $params['weekdays'] = array(1, 1, 1, 1, 1, 1, 1);
    if (!isset($params['wing_id'])) $params['wing_id'] = null;
    if (!isset($params['ident'])) $params['ident'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['zip'])) $params['zip'] = null;
    if (!isset($params['origin'])) $params['origin'] = 1;
    if (!isset($params['dest'])) $params['dest'] = 1;
    if (!isset($params['needs_pilot'])) $params['needs_pilot'] = null;
    if (!isset($params['co_pilot'])) $params['co_pilot'] = null;
    if (!isset($params['ifr'])) $params['ifr'] = null;
    if (!isset($params['selected_types'])) $params['selected_types'] = array();
    if (!isset($params['filled'])) $params['filled'] = null;
    if (!isset($params['open'])) $params['open'] = null;
    if (!isset($params['max_pass'])) $params['max_pass'] = null;
    if (!isset($params['max_weight'])) $params['max_weight'] = null;
    if (!isset($params['max_distance'])) $params['max_distance'] = null;
    if (!isset($params['min_efficiency'])) $params['min_efficiency'] = null;
    if (!isset($params['ignore_availability'])) $params['ignore_availability'] = null;


    if (!isset($params['member_id'])) $params['member_id'] = null;
    if (!isset($params['match_p_f'])) $params['match_p_f'] = null;
    if (!isset($params['is_check'])) $params['is_check'] = null;
    if (!isset($params['first_date'])) $params['first_date'] = null;
    if (!isset($params['last_date'])) $params['last_date'] = null;
    if (!isset($params['not_available'])) $params['not_available'] = null;
    if (!isset($params['no_weekday'])) $params['no_weekday'] = null;
    if (!isset($params['no_weekend'])) $params['no_weekend'] = null;
    if (!isset($params['as_ma'])) $params['as_ma'] = null;
    if (!isset($params['airport_id'])) $params['airport_id'] = null;
    if (!isset($params['all_type'])) $params['all_type'] = null;
    if (!isset($params['home_base'])) $params['home_base'] = null;

    if ($this->hasRequestParameter('sort_by')) $params['sort_by'] = $this->getRequestParameter('sort_by');
    if ($request->getParameter('filter')) {
      $params['date_range1'] = $request->getParameter('date_range1');
      $params['date_range2'] = $request->getParameter('date_range2');
      $params['weekdays'] = $request->getParameter('weekdays', array(1, 1, 1, 1, 1, 1, 1));
      $params['wing_id'] = $request->getParameter('wing_id');
      $params['ident'] = $request->getParameter('ident');
      $params['city'] = $request->getParameter('city');
      $params['state'] = $request->getParameter('state');
      $params['zip'] = $request->getParameter('zipcode');
      $params['origin'] = $request->getParameter('origin');
      $params['dest'] = $request->getParameter('dest');
      $params['needs_pilot'] = $request->getParameter('needs_pilot');
      $params['co_pilot'] = $request->getParameter('co_pilot');
      $params['ifr'] = $request->getParameter('ifr');
      $params['selected_types'] = $request->getParameter('selected_types');
      $params['filled'] = $request->getParameter('filled');
      $params['open'] = $request->getParameter('open');
      $params['max_pass'] = $request->getParameter('max_pass');
      $params['max_weight'] = $request->getParameter('max_weight');
      $params['max_distance'] = $request->getParameter('max_distance');
      $params['min_efficiency'] = $request->getParameter('min_efficiency');
      $params['ignore_availability'] = $request->getParameter('ignore_availability');


      $params['member_id'] = $request->getParameter('member_id');

      $params['match_p_f'] = $request->getParameter('match_p_f','');
      $params['is_check'] = $request->getParameter('is_a_check','');

      $params['first_date'] = '';
      $params['last_date']= '';
      $params['not_available']= '';
      $params['no_weekday']= '';
      $params['no_weekend']= '';
      $params['as_ma']= '';

      if($params['is_check'] == 1) {
          if($request->getParameter('first_date'))$params['first_date'] = $request->getParameter('first_date','');
          if($request->getParameter('last_date'))$params['last_date'] = $request->getParameter('last_date','');
          if($request->getParameter('not_av'))$params['not_available'] = $request->getParameter('not_av','');
          if($request->getParameter('no_weekday'))$params['no_weekday'] = $request->getParameter('no_weekday','');
          if($request->getParameter('no_weekend'))$params['no_weekend']= $request->getParameter('no_weekend','');
          if($request->getParameter('as_ma'))$params['as_ma'] = $request->getParameter('as_ma','');
      }

      $params['airport_id'] = $request->getParameter('primary_airportID', 0);


      $params['home_base'] = $request->getParameter('home_base');
      //$home_base = $this->getUser()->getHBAirportId();;
    }

    $this->page = $request->getParameter('page', 1);
    $this->max = sfConfig::get('app_max_mission_available_per_pager', 10);
    $this->sort_by = $params['sort_by'];
    $this->date_range1 = $params['date_range1'];
    $this->date_range2 = $params['date_range2'];
    $this->weekdays = $params['weekdays'];
    $this->wing_id = $params['wing_id'];
    $this->ident = $params['ident'];
    $this->city = $params['city'];
    $this->state = $params['state'];
    $this->zip = $params['zip'];
    $this->origin = $params['origin'];
    $this->dest = $params['dest'];
    $this->needs_pilot = $params['needs_pilot'];
    $this->co_pilot = $params['co_pilot'];
    $this->ifr = $params['ifr'];
    $this->selected_types = $params['selected_types'];
    $this->filled = $params['filled'];
    $this->open = $params['open'];
    $this->max_pass = $params['max_pass'];
    $this->max_weight = $params['max_weight'];
    $this->max_distance = $params['max_distance'];
    $this->min_efficiency = $params['min_efficiency'];
    $this->ignore_availability = $params['ignore_availability'];

    $this->member_id      = $params['member_id'];
    $this->match_p_f = $params['match_p_f'];
    $this->is_check         = $params['is_check'];
    $this->first_date           = $params['first_date'];
    $this->last_date          = $params['last_date'];
    $this->not_available        = $params['not_available'];
    $this->no_weekday         = $params['no_weekday'];
    $this->no_weekend       = $params['no_weekend'];
    $this->as_ma = $params['as_ma'];
    $this->airport_id       = $params['airport_id'];
    $this->all_type = $params['all_type'];

    $this->home_base       = $params['home_base'];

    $this->getUser()->setAttribute('staff_available', $params, 'person');
    $this->error_min_eff = false;
    if(isset ($this->min_efficiency) && $this->min_efficiency!=null && !($this->min_efficiency >= 1 && $this->min_efficiency <=100))
            $this->error_min_eff = true;
  }

  public function executeCopy(sfWebRequest $request)
  {
    $type = $request->getParameter('type');
    $miss_id = $request->getParameter('id');
    $mission_old = MissionPeer::retrieveByPK($miss_id);
    $mission = new Mission();
    $mission_old->copyInto($mission);
    $msId = 'copy of '.$miss_id;
    $mission->setExternalId(MissionPeer::getLatestExternalId());
    $mission->setCopiedMission($msId);
    $mission->setMissionDate(date('Y-m-d H:i:m'));
    $mission->save();
    $mission_legs = MissionLegPeer::getbyMissIdDown($mission_old->getId());
    if($type === "copy"){ 
      foreach ($mission_legs as $mission_leg){
        $mi_leg = new MissionLeg();
        $mission_leg->copyInto($mi_leg);
        $mlgId = 'copy of '.$mission_leg->getId();
        $mi_leg->setMissionId($mission->getId());
        $mi_leg->setCopiedMissionLeg($mlgId);
        $mi_leg->save();
      }
      $this->getUser()->setFlash('success',"The mission have been copied successfully.");
      $this->redirect('mission/index');
    }else{
      foreach ($mission_legs as $mission_leg){
        $mi_leg = new MissionLeg();
        $mission_leg->copyInto($mi_leg);
        $mi_leg->setMissionId($mission->getId());
        $from = $mi_leg->getFromAirportId();
        $to   = $mi_leg->getToAirportId();
        $mi_leg->setFromAirportId($to);
        $mi_leg->setToAirportId($from);
        $mi_leg->save();
      }
      $this->getUser()->setFlash('success',"The mission have been reversed successfully.");
      $this->redirect('mission/index');
    }

  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('pass_fname');
    $this->persons = PersonPeer::getFirstNames($this->keyword,'mission');
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('pass_lname');
    $this->persons =PersonPeer::getLastNames($this->keyword,'mission');
  }

  public function executeAutoCompleteFirstR()
  {
    $this->keyword = $this->getRequestParameter('mreq_fname');
    $this->persons = PersonPeer::getFirstNames($this->keyword,'missionr');
  }

  public function executeAutoCompleteLastR()
  {
    $this->keyword = $this->getRequestParameter('mreq_lname');
    $this->persons =PersonPeer::getLastNames($this->keyword,'missionr');
  }

  public function executePendingPilot(sfWebRequest $request)
  {
    $pilot_id = $request->getParameter('pilot_id');
    $this->processPendingFilter($request);
    $this->pager = MissionLegPeer::getPendingPagerPilot(
      $this->max,
      $this->page,
      $pilot_id,
      $this->wing_id,
      $this->ident
    );
    $this->mission_legs = $this->pager->getResults();
    $this->setTemplate('pending');
  }

  private function processFilterVisual(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('missionvisual', array(), 'person');

    if (!isset($params['miss_type'])) $params['miss_type'] = null;
    if (!isset($params['miss_date1'])) $params['miss_date1'] = null;
    if (!isset($params['miss_date2'])) $params['miss_date2'] = null;
    if (!isset($params['orgin_airport'])) $params['orgin_airport'] = null;
    if (!isset($params['dest_airport'])) $params['dest_airport'] = null;


    $this->types = MissionTypePeer::getOnlyNames();


    if ($request->hasParameter('filter')) {
      $params['miss_type']       = (in_array($request->getParameter('miss_type'), array_keys($this->types)) ? $request->getParameter('miss_type') : '');
      $params['miss_date1']       = $request->getParameter('miss_date1');
      $params['miss_date2']       = $request->getParameter('miss_date2');
      $params['orgin_airport']       = $request->getParameter('orgin_airport');
      $params['dest_airport']       = $request->getParameter('dest_airport');
    }

    
    $this->miss_type  = $params['miss_type'];
    $this->miss_date1 = $params['miss_date1'];
    $this->miss_date2 = $params['miss_date2'];
    $this->orgin_airport = $params['orgin_airport'];
    $this->dest_airport = $params['dest_airport'];

    $this->getUser()->setAttribute('missionvisual', $params, 'person');
  }
}