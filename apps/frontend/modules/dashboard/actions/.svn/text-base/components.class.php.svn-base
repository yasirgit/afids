<?php

/**
 * dashboard components.
 *
 * @package    angelflight
 * @subpackage dashboard
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class dashboardComponents extends sfComponents
{
  public function executeCurrentMissions(sfWebRequest $request)
  {
    $this->airport_list = AirportPeer::getMappable();
    $this->legs = MissionLegPeer::getMappable();
  }

  public function executeTeamNotepad(sfWebRequest $request)
  {
    $this->person_role = PersonRolePeer::getByPersonIdOne($this->getUser()->getId());
    $s_role = RolePeer::getByTitle('Staff');
    $a_role = RolePeer::getByTitle('Administrator');
    $role_ids = array();
//    foreach ($person_roles as $person_role){
//      $roleId = $person_role->getRoleId();
//      $s_role_id = $s_role->getId();
//      if($roleId==$s_role_id){
//        $role_ids[] = $a_role->getId();
//      }else{
//        $role_ids[] = $roleId;
//      }
//    }
    $team_notes = "";
    if($this->person_role){
      $team_notes = TeamNotePeer::getTeamNote();
    }

    $this->team_notes = $team_notes;
    $this->allowed_tags = $this->getAllowedTags();
  }

  public function executePersonalNotepad(sfWebRequest $request)
  {
    $note = PersonalNotePeer::retrieveByPK($this->getUser()->getId());
    if (!($note instanceof PersonalNote)) {
      $note = new PersonalNote();
      $note->setPersonId($this->getUser()->getId());
      $note->save();
    }

    $this->note = $note;
    $this->allowed_tags = $this->getAllowedTags();
  }

  protected function getAllowedTags()
  {
    return sfConfig::get('app_allowed_note_tags', '');
  }

  public function executeRequests(sfWebRequest $request)
  {
    # arrived requests
    $this->mission_requests = MissionRequestPeer::getRsNonProcessed($count);
    $this->mission_requests_count = $count;

    # available missions
    $this->available_mission_legs = MissionLegPeer::getRsAvailable($count);
    $this->available_mission_legs_count = $count;
    
    # coordinated missions
    $this->coordinated_mission_legs = MissionLegPeer::getRsCoordinated($count);
    $this->coordinated_mission_legs_count = $count;

    # pilot requests
    
    # filter
    $this->processFilter($request);
    $this->pager = PilotRequestPeer::getPager(
    $this->max,
    $this->page,
    $this->req_date1,
    $this->req_date2,
    $this->miss_date1,
    $this->miss_date2,
    $this->not_process,
    $this->hold,
    $this->process
    );
    $this->pilot_reqs = $this->pager->getResults();
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    
    
    # member requests
    $c = new Criteria();
    $c->add(ApplicationTempPeer::RENEWAL, null, Criteria::ISNULL);
    $c->add(ApplicationTempPeer::MEMBER_ID, null, Criteria::ISNULL);
    $c->add(ApplicationTempPeer::PROCESSED_DATE, null, Criteria::ISNULL);
    $c->setLimit(50);
    $this->member_requests = ApplicationTempPeer::doSelect($c);

    $this->transportations = array(
      'air_mission' => 'Air Mission',
      'ground_mission' => 'Ground Mission',
      'commercial_mission' => 'Commercial Mission',
    );
    if($request->hasParameter('return')){
      $this->pilot_request_one = true;
    }

  }
  private function processFilter(sfWebRequest $request) {
		$params = $this->getUser()->getAttribute('pilotRequest', array(), 'person');
		if (!isset($params['req_date1'])) $params['req_date1'] = null;
		if (!isset($params['req_date2'])) $params['req_date2'] = null;
		if (!isset($params['miss_date1'])) $params['miss_date1'] = null;
		if (!isset($params['miss_date2'])) $params['miss_date2'] = null;
		if (!isset($params['not_process'])) $params['not_process'] = null;
		if (!isset($params['hold'])) $params['hold'] = null;
		if (!isset($params['process'])) $params['process'] = null;

		$this->max_array = array(5, 10, 20, 30);

		if (in_array($request->getParameter('max'), $this->max_array)) {
			$params['max'] = $request->getParameter('max');
		}else {
			if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
		}

		if ($request->hasParameter('filter')) {
			$params['req_date1']      = $request->getParameter('req_date1');
			$params['req_date2']       = $request->getParameter('req_date2');
			$params['miss_date1']       = $request->getParameter('miss_date1');
			$params['miss_date2']       = $request->getParameter('miss_date2');
			$params['not_process']       = $request->getParameter('not_process');
			$params['hold']       = $request->getParameter('hold');
			$params['process']       = $request->getParameter('process');
		}
        if($request->hasParameter('reset') && $request->getParameter('reset') == '1'){
            $params['req_date1']      = NULL;
			$params['req_date2']       = NULL;
			$params['miss_date1']       = NULL;
			$params['miss_date2']       = NULL;
			$params['not_process']       = NULL;
			$params['hold']       = NULL;
			$params['process']       = NULL;
        }
		$this->page       = $page = $request->getParameter('page', 1);
		$this->max        = $params['max'];
		$this->req_date1    = $params['req_date1'];
		$this->req_date2  = $params['req_date2'];
		$this->miss_date1 = $params['miss_date1'];
		$this->miss_date2 = $params['miss_date2'];
		$this->not_process = $params['not_process'];
		$this->hold = $params['hold'];
		$this->process = $params['process'];

		$this->getUser()->setAttribute('pilotRequest', $params, 'person');
    }

  public function executePriorityList()
  {
    $this->pilot_request_count = PilotRequestPeer::countIn2Days();
    $this->no_pilot_count = MissionPeer::countNoPilotIn2Days();
    $this->cancelled_legs = MissionLegPeer::countCancelled();


    $pilot = PilotPeer::retrieveByPK($this->getUser()->getPilotId());
   
    if (!($pilot instanceof Pilot)) return sfView::NONE;
    
    if ($pilot->getPrimaryAirportId()) {
      $this->near_mission = MissionLegPeer::getPilotNear($pilot->getPrimaryAirportId());
    }else{
      $this->near_mission = array();
    }
    
    $pilot_id = $this->getUser()->getPilotId();
    $this->p_id = $pilot_id;
    if($pilot_id){
    $pilot = PilotPeer::retrieveByPK($pilot_id);
    $p_firstname = $pilot->getMember()->getPerson()->getFirstName();
    $p_lastname = $pilot->getMember()->getPerson()->getLastName();
    $c = new Criteria();
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    $c->add(MissionLegPeer::PILOT_ID, $pilot_id);
    $c->addJoin(MissionLegPeer::MISSION_ID, MissionPeer::ID, Criteria::RIGHT_JOIN);
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);
    $c->addJoin(MissionLegPeer::MISSION_REPORT_ID, MissionReportPeer::ID, Criteria::LEFT_JOIN);
    $c->add(MissionReportPeer::APPROVED, null, Criteria::ISNULL);
    $mission_legs = MissionLegPeer::doSelectJoinMission($c, null, Criteria::RIGHT_JOIN);
    $this->miss = count($mission_legs);

    $pind = MissionLegPeer::getPendingMissions($pilot_id);
    $this->pinding = $pind;
    //Update Farazi
    $member_id = $this->getUser()->getMemberId();
    $member = MemberPeer::retrieveByPK($member_id);
    $date_now = strtotime("NOW");   
    $date_ren = strtotime($member->getRenewalDate());
    $sub = ($date_ren - $date_now);
    $preday = 0;    
    if($sub >=86400){
       $pday = $sub / 86400;
       $preday = explode('.',$pday);
    }else {
       $pday = $sub / 86400;
       $preday = explode('.',$pday);
    }
        $this->due_day = $preday[0];
    }    
    // Show mission request list for adin user
    if($this->getUser()->hasCredential(array('Administrator'), false)){

        // Get number of un processed mission requests
        $this->un_proc_miss_req = MissionRequestPeer::getNumberOfNonProcessedMissionRequest();

        // Get number of un processed member applications
        $this->un_proc_mem_apps = ApplicationTempPeer::getNonProcessedMemberApplications();

        // Get number of un processed pilot requests
        $this->un_proc_pilot_reqs = PilotRequestPeer::getPager()->getNbResults ();

        // Get uncoordinate mission legs
        $this->un_coor_mission_legs = MissionLegPeer::getPager(
                                                              10,/* $max*/1 /* page */,null,null,null,
                                                              null, null, null, null, null, null, null,
                                                              null, null, null, null, null, null, null,  true/*$notcoordinated*/
                                                              )->getNbResults ();
    }

    // ziyed : count unprocessed contact request
     $c = new Criteria();
     $c->add(ContactRequestPeer::PROCESSED,NULL, Criteria::ISNULL);
     $this->un_proce_contact_req = ContactRequestPeer::doCount($c);
    //end

     //Farazi : new contact requests
     $c = new Criteria();
     $c->add(ContactRequestPeer::PROCESSED,NULL, Criteria::ISNULL);
     $this->new_contact_requeststs = ContactRequestPeer::doSelect($c);
    //end
    
     // ziyed : count unprocessed contact request
     $c = new Criteria();
     $c->add(ContactRequestPeer::PROCESSED,NULL, Criteria::ISNULL);     
     $c->add(ContactRequestPeer::REQUEST_DATE, 'ABS(DATEDIFF( NOW( \'Y-m-d\' ),'.ContactRequestPeer::REQUEST_DATE.') ) > 1', Criteria::CUSTOM);
     $this->graterThanOneDay = ContactRequestPeer::doCount($c);
     //end


     //Farazi
     //Removed Pilots
     if($this->getUser()->hasCredential(array('Pilot'), false)){
        $pilot = PilotPeer::retrieveByPK($this->getUser()->getPilotId());
        $this->removed_pilot = PilotRequestPeer::getRemovedPilot($pilot->getMemberId());
     }
     //Revival Pilots
     if($this->getUser()->hasCredential(array('Pilot'), false)){
        $pilot = PilotPeer::retrieveByPK($this->getUser()->getPilotId());
        $this->revival_pilot = PilotRequestPeer::getRevivalPilot($pilot->getMemberId());

     }
     //New Pilot added to the mission leg
     if($this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->pilots_added = PilotRequestPeer::getPilotsAdded();
     }
     //Mission report due
     $c = new Criteria();
     $pilotId = $this->getUser()->getPilotId();
     $c->add(MissionLegPeer::PILOT_ID,$pilotId, Criteria::EQUAL);
     $c->add(MissionLegPeer::MISSION_REPORT_ID,NULL, Criteria::ISNULL);
     $c->add(MissionLegPeer::CANCEL_MISSION_LEG,1, Criteria::NOT_EQUAL);
     $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::LEFT_JOIN);
     $c->add(MissionPeer::MISSION_DATE, 'NOW( \'Y-m-d\' )', Criteria::LESS_THAN);
     //echo $c->toString();
     $this->mission_report_dues = MissionLegPeer::doCount($c);
     //End Farazi


  }
  
  public function executeRecentItems()
  {
    $this->recent_items = $this->getUser()->getRecentItems();
  }

  public function executeAvailableMissions(sfWebRequest $request)
  {
    $pilot = PilotPeer::retrieveByPK($this->getUser()->getPilotId());
    if (!($pilot instanceof Pilot)) return sfView::NONE;

    if ($pilot->getPrimaryAirportId()) {
      $this->mission_legs = MissionLegPeer::getPilotNear($pilot->getPrimaryAirportId());
    }else{
      $this->mission_legs = array();
    }
    $this->home_airport = $pilot->getAirport();

    $ids = array();
    foreach ($this->mission_legs as $leg) $ids[] = $leg->getId();
    $c = new Criteria();
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    $c->add(MissionLegPeer::ID, $ids, Criteria::NOT_IN);
    $c->add(MissionLegPeer::CANCELLED, null, Criteria::ISNULL);
    $c1 = $c->getNewCriterion(MissionLegPeer::PILOT_ID, null, Criteria::ISNULL);
    $c2 = $c->getNewCriterion(MissionLegPeer::COPILOT_ID, null, Criteria::ISNULL);
    $c->add($c1->addOr($c2));
    $c->setLimit(50);
    $this->interest_legs = MissionLegPeer::doSelectJoinMission($c);

    $c->clear();
    $c->addJoin(MissionLegPeer::ID, PilotRequestPeer::LEG_ID, Criteria::LEFT_JOIN);
    $c->add(PilotRequestPeer::ACCEPTED, 1, Criteria::NOT_EQUAL);
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    //$c->addAscendingOrderByColumn();
    $c->setLimit(50);
    $this->pending_legs = MissionLegPeer::doSelectJoinMission($c);

    //ziyed

    // validity
		$person = PersonPeer::retrieveByPK($this->getUser()->getId());
                //$this->forward404Unless($person);
		$member = $person->getMember();
		//$this->forward404Unless($member);
		if ($member) $pilot = $member->getPilot(); else $pilot = null;

		// filter related
		$this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));

		if ($pilot) $this->personal_flights = $pilot->getPersonalFlights(); else $this->personal_flights = array();
		$this->wings = WingPeer::doSelect(new Criteria());
		$this->idents = AirportPeer::doSelect(new Criteria());
		$this->states = sfConfig::get('app_short_states');
		$this->mission_types = MissionTypePeer::doSelect(new Criteria());

		$this->member = $member;
		$this->pilot = $pilot;
		if ($pilot){
                   $this->airport = $pilot->getAirport();
                }
                else {
                   $this->airport = null;
                }
                
                
               if($request)
                   
                   $this->processFilterForm($request);
                
		if($request->getParameter('needs') == 1){
			$this->needs_pilot = 1;
		}

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
		false,
		$this->ignore_availability
		);               
		$this->miss_array = $this->pager->getResults();
                $this->total_mission_available = $this->pager->getNbResults();
		$this->missions = MissionPeer::getByMayInterested($this->airport, $this->min_efficiency);
                $ident = $request->getParameter('airport_ident');
                if(!empty($ident)){
                    $this->airport_ident = $request->getParameter('airport_ident');
                }else {
                   $this->airport_ident = "";
                }
                //end ziyed

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
				$params['airport_ident'] = $this->has_filters->getIdent();
				$params['city'] = $this->has_filters->getCity();
				$params['zipcode'] = $this->has_filters->getZipcode();
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
			}
		}
		else {
			$params = $this->getUser()->getAttribute('staff_available', array(), 'person');
                }
		//mission types selected by default
		$arr = array();
		if (sizeof($this->mission_types) > 0) {
			foreach ($this->mission_types as $ru) {
				$arr[] = $ru->getId();
			}
		}

		if (!isset($params['sort_by'])){
                    $params['sort_by'] = 1;
                }
		if (!isset($params['date_range1'])){
                    $params['date_range1'] = null;
                }
		if (!isset($params['date_range2'])){
                    $params['date_range2'] = null;
                }
		if (!isset($params['weekdays'])){
                    $params['weekdays'] = array(1, 1, 1, 1, 1, 1, 1);
                }
		if (!isset($params['wing_id'])){
                    $params['wing_id'] = null;
                }
		if (!isset($params['airport_ident'])){
                    $params['airport_ident'] = null;
                }
		if (!isset($params['city'])){
                    $params['city'] = null;
                }
		if (!isset($params['state'])){
                    $params['state'] = null;
                }
		if (!isset($params['zipcode'])){
                    $params['zipcode'] = null;
                }
		if (!isset($params['origin'])){
                    $params['origin'] = 1;
                }
		if (!isset($params['dest'])){
                    $params['dest'] = 1;
                }
		if (!isset($params['needs_pilot'])){
                    $params['needs_pilot'] = null;
                }
		if (!isset($params['co_pilot'])){
                    $params['co_pilot'] = null;
                }
		if (!isset($params['ifr'])){
                    $params['ifr'] = null;
                }
		if (!isset($params['selected_types'])){
                    $params['selected_types'] = $arr;
                }
		if (!isset($params['filled'])){
                    $params['filled'] = null;
                }
		if (!isset($params['open'])){
                    $params['open'] = null;
                }
		if (!isset($params['max_pass'])){
                    $params['max_pass'] = null;
                }
		if (!isset($params['max_weight'])){
                    $params['max_weight'] = null;
                }
		if (!isset($params['max_distance'])){
                    $params['max_distance'] = null;
                }
		if (!isset($params['min_efficiency'])){
                    $params['min_efficiency'] = 85;
                }
		if (!isset($params['ignore_availability'])){
                    $params['ignore_availability'] = null;
                }

		if (!isset($params['member_id'])){
                    $params['member_id'] = null;
                }

		if ($this->hasRequestParameter('sort_by')){
                    $params['sort_by'] = $this->getRequestParameter('sort_by');
                }

		if ($request->getParameter('filter') && $request->getParameter('filter') == 1) {
			$params['date_range1'] = $request->getParameter('date_range1');
			$params['date_range2'] = $request->getParameter('date_range2');
			$params['weekdays'] = $request->getParameter('weekdays', array(1, 1, 1, 1, 1, 1, 1));
			$params['wing_id'] = $request->getParameter('wing_id');
			$params['airport_ident'] = $request->getParameter('airport_ident');
			$params['city'] = $request->getParameter('city');
			$params['state'] = $request->getParameter('state');
			$params['zipcode'] = $request->getParameter('zipcode');
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
		$this->ident = $params['airport_ident'];
		$this->city = $params['city'];
		$this->state = $params['state'];
		$this->zip = $params['zipcode'];
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
		$this->min_efficiency = $params['min_efficiency'] ; // Default efficiency 
		$this->ignore_availability = $params['ignore_availability'];

                $this->member_id = $params['member_id'];

		$this->getUser()->setAttribute('staff_available', $params, 'person');
		$this->error_min_eff = false;
		if(isset ($this->min_efficiency) && $this->min_efficiency!=null && !($this->min_efficiency >= 1 && $this->min_efficiency <=100)){
                    $this->error_min_eff = true;
                }

	}
  #bGlobal omar
  public function executeInstrumentNotication(sfWebRequest $request)
  {    
	$c = new Criteria();
	$c->add(PersonRolePeer::PERSON_ID,$this->getUser()->getId());		
	$c->addJoin(PersonRolePeer::ROLE_ID,RoleNotificationPeer::ROLE_ID);				
	$personNotification = RoleNotificationPeer::doSelect($c);
	$this->mid = 0;
	foreach($personNotification as $key=>$value)
	{
		$this->mid=$value->getMid();
        
		$this->notification = $value->getNotification();
		//5. person add
		if($this->mid == 5 && ($this->notification == 2 || $this->notification == 3))
		{
			$c = new Criteria();
			$c->addDescendingOrderByColumn(PersonPeer::ID);
			$c->setLimit(5);
			$this->newperson = PersonPeer::doSelect($c);
		}
	}
	 $this->host = $request->getHost();

     $this->memberId = $this->getUser()->getMemberId();
     //$query = "SELECT COUNT(pilot_request.accepted) FROM pilot_request ";
     //$query .="WHERE pilot_request.accepted = 1 AND pilot_request.processed = 1 AND pilot_request.member_id = ".$this->memberId;

     //$con = Propel::getConnection();
     //$stmt = $con->prepare($query);
     //$stmt->execute();

     /*if($rs = $stmt->fetch(PDO::FETCH_NUM)) {
       $count = (int)$rs[0];
     }else{
       $count = 0;
     }*/
     
     $c = new Criteria();
     $c->add(PilotRequestPeer::ACCEPTED, 1);
     $c->add(PilotRequestPeer::PROCESSED, 1);
     $c->add(PilotRequestPeer::MEMBER_ID, $this->memberId);     
     $this->totalAccepted = PilotRequestPeer::doCount($c);


    /* $this->memberId = $this->getUser()->getMemberId();
     $query = "SELECT COUNT(pilot_request.accepted) FROM pilot_request ";
     $query .="WHERE pilot_request.accepted = 0 AND pilot_request.member_id = $this->memberId";
     $con = Propel::getConnection();
     $stmt = $con->prepare($query);
     $stmt->execute();

     if($rs = $stmt->fetch(PDO::FETCH_NUM)) {
       $count = (int)$rs[0];
     }else{
       $count = 0;
     }*/
     $c = new Criteria();
     $c->add(PilotRequestPeer::ACCEPTED, 0);
     $c->add(PilotRequestPeer::MEMBER_ID, $this->memberId);
     $this->totaldeclined = PilotRequestPeer::doCount($c);
     
     

     
     $c = new Criteria();
     $c->add(MissionLegPeer::PILOT_ID, $this->getUser()->getPilotId());
     $c->add(MissionLegPeer::CANCEL_MISSION_LEG, 0);
     $this->totalMissionCancellation = MissionLegPeer::doCount($c);


     //total signup events count
     $pilot_id = $this->getUser()->getPilotId();
     if($pilot_id){
        $pilot = PilotPeer::retrieveByPK($pilot_id);
        $member_id = $pilot->getMemberId();

        $date = date('Y-m-d');
        $c = new Criteria();
        $c->add(EventReservationPeer::MEMBER_ID,$member_id,  Criteria::EQUAL);
        $c->addJoin(EventPeer::ID, EventReservationPeer::EVENT_ID);
        $c->add(EventPeer::EVENT_DATE, $date , Criteria::GREATER_EQUAL);
        $this->totalSignupEvents  = EventReservationPeer::doCount($c);
     }
     
     //
  }
}
