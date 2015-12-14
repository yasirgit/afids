<?php

/**
 * dashboard actions.
 *
 * @package    angelflight
 * @subpackage dashboard
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  { 
    
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('instrument', ''));

    #security
   /* if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }*/
    
    if( $request->getParameter('type')){
        $this->flag = 1;
    }

    if( $request->hasParameter('return')){
        $this->pilot_request = 1;
    }
    
    if( $request->hasParameter('avail')){
        $this->window_loc = 'avail';       
    } 

    if($request->hasParameter('window_loc_visual')){
        $this->window_loc_visual = 'window_loc_visual';
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

  public function executeReloadTeamNote()
  {

    $this->person_role = PersonRolePeer::getByPersonIdOne($this->getUser()->getId());
    $s_role = RolePeer::getByTitle('Staff');
    $a_role = RolePeer::getByTitle('Admin');
    $role_ids = array();
    $team_notes = array();
    if($this->person_role){
      $team_notes = TeamNotePeer::getTeamNote();
    }
    $content = "";
    $allowed_tags = sfConfig::get('app_allowed_note_tags', '');

    foreach ($team_notes as $team_note){
      $content .= strip_tags($team_note->getNote(), $allowed_tags);
    }
    return $this->renderText($content);
  }


  public function executeSavePersonalNote(sfWebRequest $request)
  {
    $note = $request->getParameter('note');

    $personal_note = PersonalNotePeer::retrieveByPK($this->getUser()->getId());
    if (!($personal_note instanceof PersonalNote)) {
      $personal_note = new PersonalNote();
      $personal_note->setPersonId($this->getUser()->getId());
    }
    $personal_note->setNote(strip_tags($note, sfConfig::get('app_allowed_note_tags')));
    $personal_note->save();

    return sfView::NONE;
  }

  public function executeSaveTeamNote(sfWebRequest $request)
  {
    $note = $request->getParameter('note');
    $a_role = RolePeer::getByTitle('Admin');
    $id = $a_role->getId();
    # validate
    //$c = new Criteria();
    //$c->add(PersonRolePeer::PERSON_ID, $this->getUser()->getId());
    //$c->add(PersonRolePeer::ROLE_ID, $id);
    //if (PersonRolePeer::doCount($c) == 0) $this->forward404();
    # save

    $team_note = TeamNotePeer::retrieveByPK($id);
    if(!$team_note) {
      $team_note = new TeamNote();
    }
    $team_note->setRoleId($id);
    $team_note->setNote(strip_tags($note, sfConfig::get('app_allowed_note_tags')));
    $team_note->save();
    return sfView::NONE;
  }

  public function executeCalculateDistance(sfWebRequest $request)
  {
    $origin_ = $request->getParameter('origin');
    $destination_ = $request->getParameter('destination');
    $origin = array();
    $destination = array();

    if(empty($origin_)){
        $origin[0] = '*';
    }
    else{
        if (strstr($origin_, ',')) $origin = explode(',', $origin_);
        else $origin[0] = $origin_;
    }
    if(empty($destination_)){
        $destination[0] = '*';
    }
    else{
        if (strstr($destination_, ',')) $destination = explode(',', $destination_);
        else $destination[0] = $destination_;
    }      
    
    // find airports
    # origin
//    $c = new Criteria();
//    if (is_array($origin)) {
//      if (count($origin) != 3) return $this->renderText('please format: city, state, zipcode');
//      $c->add(AirportPeer::CITY, trim($origin[0]));
//      $c->add(AirportPeer::STATE, trim($origin[1]));
//      $c->add(AirportPeer::ZIPCODE, trim($origin[2]));
//    }else{
//      if (empty($origin)) return $this->renderText('please enter origin');
//      $c->add(AirportPeer::IDENT, $origin);
//    }
//    $origin_airport = AirportPeer::doSelectOne($c);
//    if (!($origin_airport instanceof Airport)) return $this->renderText('origin airport not found');
//
//    # destination
//    $c = new Criteria();
//    if (is_array($destination)) {
//      if (count($destination) != 3) return $this->renderText('please format: city, state, zipcode');
//      $c->add(AirportPeer::CITY, trim($destination[0]));
//      $c->add(AirportPeer::STATE, trim($destination[1]));
//      $c->add(AirportPeer::ZIPCODE, trim($destination[2]));
//    }else{
//      if (empty($destination)) return $this->renderText('please enter destination');
//      $c->add(AirportPeer::IDENT, $destination);
//    }
//    $destination_airport = AirportPeer::doSelectOne($c);
//    if (!($destination_airport instanceof Airport)) return $this->renderText('origin airport not found');

    /* Edited By Masum , LAST EDITED BY ZIYED*/
    $flag = 0;
    $c = new Criteria();
    if (is_array($origin)) {
       switch(count($origin)){
          case 3:
             $city_name  = trim($origin[0]);
             $state_name = trim($origin[1]);
             $zip_code   = trim($origin[2]);
             $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$city_name."' AND zipcode.state ='".$state_name."' AND zipcode.zipcode ='".$zip_code."' limit 1";
             $ident = 0;             
             break;
          case 2:
             $city_name = trim($origin[0]);
             $state_name = trim($origin[1]);             
             $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$city_name."' AND zipcode.state ='".$state_name."' limit 1";
             $ident = 0;
             break;
          case 1:             
              //trace city
              $cityname = trim($origin[0]);
              $query = "select * from afids.zipcode where zipcode.city ='".$cityname."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if( !empty($row) ) $city = 1;
              else $city = 0;
              
              //trace state
              $statename = trim($origin[0]);
              $query = "select * from afids.zipcode where zipcode.state ='".$statename."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $state = 1;
              else $state = 0;
              
              //trace zip
              $zipcode   = trim($origin[0]);
              $query = "select * from afids.zipcode where zipcode.zipcode ='".$zipcode."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $zip = 1;
              else $zip = 0;
              
              //trace airport
              $airportident = trim($origin[0]);
              $query = "select * from afids.airport where airport.ident ='".$airportident."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $ident = 1;
              else $ident = 0;

              if($city == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$cityname."' limit 1 ";
              } else if($state == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.state ='".$statename."' limit 1";
              } else if($zip == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.zipcode ='".$zipcode."' limit 1";
              } else if($ident == 1 ){
                $sql = "SELECT * FROM afids.airport WHERE airport.ident ='".$airportident."'";
              } else { $flag = 1; }              
              break;
          default:
             return $this->renderText('please format: city, state, zipcode');
             break;
       }      
      //$origin_airport = AirportPeer::doSelectOne($c);
    }else{
      if (empty($origin)) return $this->renderText('please enter origin');
      $flag = 1; 
    }
      
        if( $ident == 1 ){
          $conn = Propel::getConnection();
          $statement = $conn->prepare($sql);
          $statement->execute();
          $row = $statement->fetch();
          if(empty($row)) return $this->renderText('origin airport not found');
          $origin_airport = new Airport();
          $origin_airport->setCity($row['city']);
          $origin_airport->setIdent($row['ident']);
          $origin_airport->setState($row['state']);
          $origin_airport->setLatitude($row['latitude']);
          $origin_airport->setLongitude($row['longitude']);
        }else if( $flag != 1 ){
          $conn = Propel::getConnection();
          $statement = $conn->prepare($sql);
          $statement->execute();          
          $row = $statement->fetch();
          if(empty($row)) return $this->renderText('origin airport not found');
          $origin_airport = new Zipcode();
          $origin_airport->setCity($row['city']);          
          $origin_airport->setState($row['state']);
          $origin_airport->setLatitude($row['latitude']);
          $origin_airport->setLongitude($row['longitude']);
      }
      else{
          return $this->renderText('origin airport not found');
      }
    
    
    //if (!($origin_airport instanceof Airport)) return $this->renderText('origin airport not found');

    $flag = 0;
    # destination
    $c = new Criteria();
    if (is_array($destination)) {
       switch(count($destination)){
          case 3:
             $city_name_  = trim($destination[0]);
             $state_name_ = trim($destination[1]);
             $zip_code_   = trim($destination[2]);
             $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$city_name_."' AND zipcode.state ='".$state_name_."' AND zipcode.zipcode ='".$zip_code_."' limit 1";
             $identt = 0;
             break;
          case 2:
             $city_name_  = trim($destination[0]);
             $state_name_ = trim($destination[1]);
             $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$city_name_."' AND zipcode.state ='".$state_name_."' limit 1";
             $identt = 0;
             break;
          case 1:
             //trace city
              $dest_city = trim($destination[0]);
              $query = "select * from afids.zipcode where zipcode.city ='".$dest_city."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $city = 1;
              else $city = 0;

              //trace state
              $dest_state = trim($destination[0]);
              $query = "select * from afids.zipcode where zipcode.state ='".$dest_state."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $state = 1;
              else $state = 0;

              //trace zip
              $dest_zip = trim($destination[0]);
              $query = "select * from afids.zipcode where zipcode.zipcode ='".$dest_zip."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $zip = 1;
              else $zip = 0;

              //trace airport
              $dest_airport = trim($destination[0]);
              $query = "select * from afids.airport where airport.ident ='".$dest_airport."'";
              $conn = Propel::getConnection();
              $statement = $conn->prepare($query);
              $statement->execute();
              $row = $statement->fetch();
              if(!empty($row)) $identt = 1;
              else $identt = 0;

              if($city == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.city ='".$dest_city."' limit 1";
              } else if($state == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.state ='".$dest_state."' limit 1";
              } else if($zip == 1 ){
                $sql = "SELECT * FROM afids.zipcode WHERE zipcode.zipcode ='".$dest_zip."' limit 1";
              } else if($identt == 1 ){
                $sql = "SELECT * FROM afids.airport WHERE airport.ident ='".$dest_airport."'";
              } else { $flag = 1; }            
              break;
          default:
             return $this->renderText('please format: city, state, zipcode');
             break;
       }      
    }else{
      if (empty($destination)) return $this->renderText('please enter destination');
      $flag = 1 ;
    }

    if( $identt == 1 ){
      $conn = Propel::getConnection();
      $statement = $conn->prepare($sql);
      $statement->execute();
      $row = $statement->fetch();
      if(empty($row)) return $this->renderText('destination airport not found');
      $destination_airport = new Airport();
      $destination_airport->setCity($row['city']);
      $destination_airport->setIdent($row['ident']);
      $destination_airport->setState($row['state']);
      $destination_airport->setLatitude($row['latitude']);
      $destination_airport->setLongitude($row['longitude']);
    }else if( $flag != 1 ){
      $conn = Propel::getConnection();
      $statement = $conn->prepare($sql);
      $statement->execute();
      $row = $statement->fetch();
      if(empty($row)) return $this->renderText('destination airport not found');
      $destination_airport = new Zipcode();
      $destination_airport->setCity($row['city']);      
      $destination_airport->setState($row['state']);
      $destination_airport->setLatitude($row['latitude']);
      $destination_airport->setLongitude($row['longitude']);
    }
    else{
          return $this->renderText('destination airport not found');
    }
    //if (!($destination_airport instanceof Airport)) return $this->renderText('destination airport not found');
    /* End Edited By Masum , LAST EDITED BY ZIYED*/
    
    $distance = round(
      acos(
        sin(deg2rad($origin_airport->getLatitude()))
        *
        sin(deg2rad($destination_airport->getLatitude()))
        +
        cos(deg2rad($origin_airport->getLatitude()))
        *
        cos(deg2rad($destination_airport->getLatitude()))
        *
        cos(deg2rad($origin_airport->getLongitude()) - deg2rad($destination_airport->getLongitude()))
     ) * (180*60) / pi()
    );
    
    if($ident == 1){
        $html = 'Origin: '.$origin_airport->getIdent().' ('.$origin_airport->getCity().', '.$origin_airport->getState().')';
    }else{
        $html = 'Origin: ('.$origin_airport->getCity().', '.$origin_airport->getState().')';
    }
    $html .= '<br/>';
    if($identt == 1){
        $html .= 'Destination: '.$destination_airport->getIdent().' ('.$destination_airport->getCity().', '.$destination_airport->getState().')';
    }else{
        $html .= 'Destination: ('.$destination_airport->getCity().', '.$destination_airport->getState().')';
    }
    $html .= '<br/>';
    $html .= 'Distance: '.$distance.' nautical miles';
    return $this->renderText($html);
  }
  public function executePilotRequestAcceptedView(sfWebRequest $request)
  {
       #security
       if( !$this->getUser()->hasCredential(array('Administrator','Pilot','Staff','Coordinator','Volunteer'), false)){
         $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
         $this->redirect('dashboard/index');
        }
        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
        $this->forward404Unless($person);
        $member = $person->getMember();       
        if ($member) $pilot = $member->getPilot(); else $pilot = null;
       
        $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));

        if ($pilot) $this->personal_flights = $pilot->getPersonalFlights(); else $this->personal_flights = array();
        $this->wings = WingPeer::doSelect(new Criteria());
        $this->idents = AirportPeer::doSelect(new Criteria());
        $this->states = sfConfig::get('app_short_states');
        $this->mission_types = MissionTypePeer::doSelect(new Criteria());

        $this->member = $member;
        $this->pilot = $pilot;
        if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;


        if($request->getParameter('needs')==1){
                $this->needs_pilot = 1;
        }

        $c = new Criteria();
        $c->add(PilotRequestPeer::ACCEPTED, 1);
        $c->add(PilotRequestPeer::MEMBER_ID,$member->getId());
        $c->addJoin(PilotRequestPeer::LEG_ID,MissionLegPeer::ID);
        $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID);
        
        //$this->result = MissionPeer::doSelect($c);
        $this->page = $request->getParameter("page", 1);
        $this->max = $request->getParameter("max", 10);
        
        $this->pager = new sfPropelPager('MissionLeg', $this->max);
        $this->pager->setCriteria($c);        
        $this->pager->setPage($this->page);
        $this->pager->init();        
        
        $this->miss_legs = $this->pager->getResults();
        $this->url ='pilotRequestAcceptedView';
      
  }
  private function processFilterForm(sfWebRequest $request)
  {
		//if user requests first time, then check if user has saved filters

		if (!$request->getParameter('filter')){
			$this->has_filters = UserFilterPeer::getByPersonId($this->getUser()->getId());
			//here set all values
			if($this->has_filters) {

				$params['origin'] =  $this->has_filters->getOrgin();
				$params['dest']  =  $this->has_filters->getDest();

				$params['date_range1'] = $this->has_filters->getDateRange1();
				$params['date_range2']  = $this->has_filters->getDateRange2();

				$params['filled'] = $this->has_filters->getFilled();
				$params['open']  = $this->has_filters->getOpen();

				//needs by
				$params['needs_pilot'] = $this->has_filters->getIsPilot();
				$params['co_pilot']  = $this->has_filters->getIsMa();
				$params['ifr'] = $this->has_filters->getIfrBackup();

				$params['ignore_availability'] = $this->has_filters->getAvailability();

				//days
				$weekdays = array();
				$weekdays[0] = $this->has_filters->getDay1();
				$weekdays[1] = $this->has_filters->getDay2();
				$weekdays[2] = $this->has_filters->getDay3();
				$weekdays[3] = $this->has_filters->getDay4();
				$weekdays[4] = $this->has_filters->getDay5();
				$weekdays[5] = $this->has_filters->getDay6();
				$weekdays[6] = $this->has_filters->getDay7();

				$params['weekdays'] = $weekdays;

				$params['max_pass'] = $this->has_filters->getMaxPassenger();
				$params['max_weight'] = $this->has_filters->getMaxWeight();
				$params['max_distance'] = $this->has_filters->getMaxDistance();
				$params['min_efficiency'] = $this->has_filters->getMaxEffciency();

				$params['wing_id'] = $this->has_filters->getWing();
				$params['ident'] = $this->has_filters->getIdent();
				$params['city'] = $this->has_filters->getCity();
				$params['zip'] = $this->has_filters->getZipcode();
				$params['state'] = $this->has_filters->getState();

				$arr = array();
				//if saved filters, get selected mission types
				if($this->has_filters) {
					$s = $this->has_filters->getUserFilterMissionTypess();
					if (sizeof($s) > 0) {
						foreach ($s as $ru) {
							if($this->has_filters) {
								$arr[] = $ru->getMissionTypeId();
							}else {
								$arr[] = $ru->getId();
							}
						}
					}
					$params['selected_types'] = $arr;

				}
			}//end if has_filter
		}//end if !filter
		else{
			$params = $this->getUser()->getAttribute('staff_available', array(), 'person');
		}
		//mission types selected by default
		$arr = array();
		if (sizeof($this->mission_types) > 0) {
			foreach ($this->mission_types as $ru) {
				$arr[] = $ru->getId();
			}
		}

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
		if (!isset($params['selected_types'])) $params['selected_types'] = $arr;
		if (!isset($params['filled'])) $params['filled'] = null;
		if (!isset($params['open'])) $params['open'] = null;
		if (!isset($params['max_pass'])) $params['max_pass'] = null;
		if (!isset($params['max_weight'])) $params['max_weight'] = null;
		if (!isset($params['max_distance'])) $params['max_distance'] = null;
		if (!isset($params['min_efficiency'])) $params['min_efficiency'] = null;
		if (!isset($params['ignore_availability'])) $params['ignore_availability'] = null;

		if (!isset($params['member_id'])) $params['member_id'] = null;

		if ($this->hasRequestParameter('sort_by')) $params['sort_by'] = $this->getRequestParameter('sort_by');
		if ($request->getParameter('filter') && $request->getParameter('filter')==1) {
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
			$params['selected_types'] = $request->getParameter('selected_types[]', $arr);
			$params['filled'] = $request->getParameter('filled');
			$params['open'] = $request->getParameter('open');
			$params['max_pass'] = $request->getParameter('max_pass');
			$params['max_weight'] = $request->getParameter('max_weight');
			$params['max_distance'] = $request->getParameter('max_distance');
			$params['min_efficiency'] = $request->getParameter('min_efficiency');
			$params['ignore_availability'] = $request->getParameter('ignore_availability');


			$params['member_id'] = $request->getParameter('member_id');
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

		$this->getUser()->setAttribute('staff_available', $params, 'person');
		$this->error_min_eff = false;
		if(isset ($this->min_efficiency) && $this->min_efficiency!=null && !($this->min_efficiency >= 1 && $this->min_efficiency <=100))
		$this->error_min_eff = true;
  }
  public function executePilotRequestDeclinedView(sfWebRequest $request)
  {
      $this->yes='Declined';
       #security
       if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
         $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
         $this->redirect('dashboard/index');
        }
        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
        $this->forward404Unless($person);
        $this->member = $person->getMember();
        if ($this->member) $pilot = $this->member->getPilot(); else $pilot = null;
        $this->pilot = $pilot;
        if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;        
        $c = new Criteria();
        $c->add(PilotRequestPeer::ACCEPTED, 0);
        $c->add(PilotRequestPeer::MEMBER_ID,$this->member->getId());
        $c->addJoin(PilotRequestPeer::LEG_ID,MissionLegPeer::ID);
        $c->addJoin(MissionLegPeer::MISSION_ID,MissionPeer::ID);
        
        $this->page = $request->getParameter("page", 1);
        $this->max = $request->getParameter("max", 10);

        $this->pager = new sfPropelPager('MissionLeg', $this->max);
        $this->pager->setCriteria($c);
        $this->pager->setPage($this->page);
        $this->pager->init();

        $this->miss_legs = $this->pager->getResults();
        $this->url ='pilotRequestDeclinedView';
  }
  public function executePilotMissionLegCancellationView(sfWebRequest $request)
  {
       
       #security
       if( !$this->getUser()->hasCredential(array('Administrator','Pilot','Staff','Coordinator','Volunteer'), false)){
         $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
         $this->redirect('dashboard/index');
        }
        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
        $this->forward404Unless($person);
        $this->member = $person->getMember();
        if ($this->member) $pilot = $this->member->getPilot(); else $pilot = null;
        $this->pilot = $pilot;
        if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;
        
        $c = new Criteria();
        $c->add(MissionLegPeer::PILOT_ID, $this->getUser()->getPilotId());
        $c->add(MissionLegPeer::CANCEL_MISSION_LEG, 0);

        $this->page = $request->getParameter("page", 1);
        $this->max = $request->getParameter("max", 10);

        $this->pager = new sfPropelPager('MissionLeg', $this->max);
        $this->pager->setCriteria($c);
        $this->pager->setPage($this->page);
        $this->pager->init();

        $this->miss_legs = $this->pager->getResults();
        $this->url ='pilotMissionLegCancellationView';
  }

  public function executePilotSignupEventDetail(sfWebRequest $request)
  {
      $pilot_id = $this->getUser()->getPilotId();
      $pilot = PilotPeer::retrieveByPK($pilot_id);
      $member_id = $pilot->getMemberId();

      $this->processFilterNew($request);
      $this->pager = EventPeer::getsignupPager(
        $this->max,
        $this->page,
        $member_id
      );
      $this->events = $this->pager->getResults();
      $this->total = $this->pager->getNbResults();    
     
  }
  private function processFilterNew(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('event');
    //set max
    if (!isset($params['max'])) $params['max'] =  10;
    $this->max_array = array(5, 10, 20, 30);
    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }
    //set page
    if (!isset($params['page'])) $params['page'] = 1;
    if($request->getParameter('page')){
        $params['page'] = $request->getParameter('page');
    }
    //value set for pager
    $this->page           = $params['page'];
    $this->max            = $params['max']; 
    $this->getUser()->setAttribute('event', $params);
  }
  public function executeSignupSingleEventDetail(sfWebRequest $request)
  {
    $this->event = EventPeer::retrieveByPK($request->getParameter('id'));

  }

}
