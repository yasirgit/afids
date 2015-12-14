<?php
/**
 * pilotRequest actions.
 *
 * @package    angelflight
 * @subpackage pilotRequest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pilotRequestActions extends sfActions {
    public function executeForm(sfWebRequest $request) {               
                $this->processFilterForm($request);
		//check if personal flight is checked
		//if checked then fetch missions matches
		//if no then normal filter
		$this->pager = null;
		if($this->match_p_f!=null and $this->match_p_f!='') {
			$this->pager = MissionLegPeer::getByFilterPF($this->match_p_f, sfConfig::get('app_max_missiion_available_per_page', 10));
		}
		else {
			//if not available then return null
			if($this->not_available == 1) {
				$this->getUser()->setFlash('warning','You have checked "Not Available" in Availablity form!');
			}
                        else
                        {
                            $this->pager = MissionLegPeer::getByFilter(
                            $this->max = 10,
                            $this->page = 1,
                            $this->sort_by,
                            $this->availability,
                            $this->first_date,    //availability
                            $this->last_date,     //availability
                            $this->types,
                            $this->no_weekday,    //availability
                            $this->no_weekend,    //availability
                            $this->as_ma,         //availability
                            $this->orgin,
                            $this->dest,
                            $this->airport_id,
                            $this->date_range1,
                            $this->date_range2,
                            $this->filled,
                            $this->open,
                            $this->pilot,
                            $this->mission_assistant,
                            $this->ifr_backup,
                            $this->wing,
                            $this->ident,
                            $this->city,
                            $this->state,
                            $this->zip,
                            $this->day_1,
                            $this->day_2,
                            $this->day_3,
                            $this->day_4,
                            $this->day_5,
                            $this->day_6,
                            $this->day_7,
                            $this->all_type,
                            $this->max_pass,
                            $this->max_wei,
                            $this->max_dist,
                            $this->max_eff,
                            $this->home_base
                            );

			}
		}
		if($this->pager!=null)
		$this->mission_legs = $this->pager->getResults();
		else
		$this->mission_legs = null;

		$this->missions = MissionPeer::getByMayInterested();

		$this->miss_pre = array();
		$this->miss_array = array();
		$this->miss_ids = array();

		foreach ($this->mission_legs as $leg) {
			$this->miss_ids[$leg->getMissionId()] = $leg->getMissionId();
		}

		foreach ($this->mission_legs as $leg) {
			if($this->miss_ids[$leg->getMissionId()] == $leg->getMissionId()) {
				$this->miss_array[$leg->getMissionId()] = $leg->getMissionId();
			}
		}
	}
	/**
	 * Pilot Request =  Mission Available for Pilot
	 */
	public function executeUpdate(sfWebRequest $request)
        {
		#security
                 if(!$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                 }


		if($request->getParameter('id')) {

			$this->mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
			$this->forward404Unless($this->mission_leg);
			$member = MemberPeer::retrieveByPK($this->getUser()->getMemberId());
			if (!($member instanceof Member)) {
				$this->getUser()->setFlash('warning','Sorry! Your permission could have been assigned. But you don\'t have member record!');
				$this->redirect($request->getReferer());
			}
			if ($member) $pilot = $member->getPilot(); else $pilot = null;
			$this->pilot = $pilot;
			if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;

                    // Select Mission Assistant from pilot request
                    $c = new Criteria();
                    $c->add(PilotRequestPeer::LEG_ID, $request->getParameter('id'));
                    $c->add(PilotRequestPeer::PILOT_TYPE, "Mission Assistant");
                    $this->mission_assistants = PilotRequestPeer::doSelect($c); //TODO optimize
                    //print_r($this->mission_assistants);
                    if(isset($member)) {
                     $this->pilot = PilotPeer::getByMemberId($member->getId());
                     $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($member->getId());
		    }
                        $this->pre_requests = PilotRequestPeer::getByMemnerIdLegId($member->getId(), $this->mission_leg->getId());
                    }else {
                        $this->getUser()->setFlash('success','No Mission Leg have been selected!');
                    }
                    
                    //Pilot Request
                    if($request->isMethod('post')) {
			if($request->getParameter('other_pilot') == 1) {
				if($request->getParameter('date') != null) {

                                        //die("OK");
					$pilot_request = new PilotRequest();
					$pilot_request->setMemberId($member->getId());
					$pilot_request->setLegId($request->getParameter('id'));
					$pilot_request->setDate($request->getParameter('date'));
					$pilot_request->setPilotType($request->getParameter('pilot_type'));
					$pilot_request->setMissionAssistantWanted(0);
					$pilot_request->setIfrBackupWanted(0);
                                        
					$pilot_request->setAccepted(0);
					$pilot_request->setProcessed(0);
					$pilot_request->setOnHold(0);
					$pilot_request->setComment($request->getParameter('comment'));

					$pilot_request->setAircraftId($request->getParameter('aircraft'));
					$pilot_request->setTail($request->getParameter('tail'));
                                        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
					$pilot_request->setCreatedAt(date('m/d/y'));
					$pilot_request->save();                    

                                      
                                        $mail_text = "Dear ".trim($person->getName()).", you have requested a mission from Angel Flight West. Your request has been sent successfully";
                                        $this->getComponent(
                                            'mail', 'missionReqCreate',
                                            array(
                                                'email' => $person->getEmail(),
                                                'name' => $person->getName(),
                                                'subject' => 'Request Mission',
                                                'text' => $mail_text
                                            )
                                        );
                                        
					$this->getUser()->setFlash('success','Your request has been saved on Mission Leg #'.$this->mission_leg->getId());
					$this->redirect('@pilot_thanks?id='.$request->getParameter('id'));
				}else {
                                    if($request->getParameter('date')==null) {
                                            $this->date_e =1;
                                            $this->date_other_e =1;
                                            $this->type = $request->getParameter('pilot_type');
                                    }
				}
			}else {
				if($request->getParameter('date') != null) {
                                       

                                        //die('OK');
                                        $pilot_request = new PilotRequest();
					if(isset($member)) {
						$pilot_request->setMemberId($member->getId());
					}

					$pilot_request->setLegId($request->getParameter('id'));
					$pilot_request->setDate($request->getParameter('date'));
					$pilot_request->setPilotType($request->getParameter('pilot_type'));
					$pilot_request->setComment($request->getParameter('comment'));
					$pilot_request->setProcessed(1);

					$pilot_request->setAircraftId($request->getParameter('aircraft'));
					$pilot_request->setTail($request->getParameter('tail'));

                                        if($request->getParameter('acc_cre') == 'yes') {
                                            $pilot_request->setMissionAssistantWanted(1);
                                            $pilot_request->setMissAssisId($request->getParameter('ma_ids'));
                                        }else{
                                            $pilot_request->setMissionAssistantWanted(0);
                                        }

                                        if($request->getParameter('IFR') == 0) {
						$pilot_request->setIfrBackupWanted(0);
					}else {
						$pilot_request->setIfrBackupWanted(1);
					}

					$pilot_request->setCreatedAt(date('m/d/y'));
                                        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
                                        $pilot_request->save();

                                        
                                        $mail_text = "Dear ".trim($person->getName()).", you have requested a mission from Angel Flight West. Your request has been sent successfully";
                                        $this->getComponent(
                                            'mail', 'missionReqCreate',
                                            array(
                                                'email' => $person->getEmail(),
                                                'name' => $person->getName(),
                                                'subject' => 'Request Mission',
                                                'text' => $mail_text
                                            )
                                        );

					$this->getUser()->setFlash('success','Your request has been saved on Mission Leg #'.$this->mission_leg->getId());
					$this->redirect('@pilot_thanks?id='.$request->getParameter('id'));
				}else {
					if($request->getParameter('date')==null) {
						$this->date_e =1;
						$this->type = $request->getParameter('pilot_type');
					}
				}
			}
		}
	}

	/**
	 * Available missions for a pilot
	 * CODE: mission_view
	 * CODE: mission_available
	 */
	public function executeRequestLegs(sfWebRequest $request)
	{ 
		#security
       if(!$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
           $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
           $this->redirect('dashboard/index');
       }

		// validity
		$person = PersonPeer::retrieveByPK($this->getUser()->getId());
                $this->forward404Unless($person);
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
               // $this->pager = MissionPeer::getMissionsAvailable();
		$this->miss_array = $this->pager->getResults();
                //echo "<pre>";
                //print_r($this->miss_array);exit;        
		$this->missions = MissionPeer::getByMayInterested($this->airport, $this->min_efficiency);
                $ident = $request->getParameter('airport_ident');
                if(!empty($ident)){
                    $this->airport_ident = $request->getParameter('airport_ident');
                }else {
                   $this->airport_ident = "";
                }
	}

	/**
	 * Pilot request
	 * CODE:mission_view
	 * CODE: mission_available_list
	 */
	public function executeIndex(sfWebRequest $request)
        {

         #security
         if(!$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
         }
        
        # for navigation menu
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        slot('nav_menu', array('mission_coord', 'find-camp'));

        # filter
        $this->processFilter($request);
        if($request->hasParameter('return') && $request->getParameter('return') == 'dashboard'){
           $request->setParameter('max', $this->max);
           $request->setParameter('page', $this->page);
           $request->setParameter('req_date1' , $this->req_date1);
           $request->setParameter('req_date2' , $this->req_date2);
           $request->setParameter('miss_date1' , $this->miss_date1);
           $request->setParameter('miss_date2' , $this->miss_date2);
           $request->setParameter('hold' , $this->hold);
           $request->setParameter('process' , $this->process);


            //$this->redirect('/dashboard/index#pilot_requests_table_one');
        }
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
       //echo "<pre>";
       //print_r($this->pilot_reqs);
                
		$this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
		/*
		 $this->req_date1 = '';
		 $this->req_date2 = '';
		 $this->miss_date1 = '';
		 $this->miss_date2 = '';*/
		$this->getUser()->addRecentItem('Pilot request', 'pilotRequest', 'pilotRequest/index');        
	}
	/**
	 * Searches for pilot requests by filter
	 */
	private function processFilter(sfWebRequest $request) {
		
		if($request->hasParameter ( 'page'))
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
	/**
	 * Pilot Request Thanks =  Other Mission legs for Pilot
	 * CODE:
	 */
	public function executePilotThanks(sfWebRequest $request) {
		if($request->getParameter('id')) {
			$this->cur_leg = MissionLegPeer::retrieveByPK($request->getParameter('id'));
			$mission = MissionPeer::retrieveByPK($this->cur_leg->getMissionId());
			$this->other_legs =MissionLegPeer::getbyMissId($mission->getId());
			$member = MemberPeer::retrieveByPK($this->getUser()->getMemberId());
			if ($member) $pilot = $member->getPilot(); else $pilot = null;
			$this->pilot = $pilot;
			if ($pilot) $this->airport = $pilot->getAirport(); else $this->airport = null;
		}
	}
	/**
	 * Save Mission Leg's Comment
	 * CODE:
	 */
	public function executeSaveComment() {
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->pilot_req = PilotRequestPeer::retrieveByPk($this->getRequestParameter('id'));

			if(isset($this->pilot_req) && $this->pilot_req instanceof PilotRequest ) {
				if (trim($this->getRequestParameter('value'))) {
					$this->pilot_req->setComment($this->getRequestParameter('value'));
					$this->pilot_req->save();

					/*$str = <<<XYZ
        <script type="text/javascript">
        window.location.reload();
        </script>
XYZ;*/
					return $this->renderText($this->getRequestParameter('value'));
				}
			}
		}
	}
	/**
	 * Save Mission's Comment
	 * CODE:
	 */
	public function executeSaveCommentMission() {
		if ($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->mission = MissionPeer::retrieveByPk($this->getRequestParameter('id'));

			if(isset($this->mission) && $this->mission instanceof Mission ) {
				if (trim($this->getRequestParameter('value'))) {
					//if camp mission comment then set comment to all missions
					// 2010.05.04
					if ($this->mission->getCampId()!=null){
						foreach (MissionPeer::getByCampId($this->mission->getCampId()) as $miss){
							$miss->setMissionSpecificComments($this->getRequestParameter('value'));
							$miss->save();
						}
					}
					$this->mission->setMissionSpecificComments($this->getRequestParameter('value'));
					$this->mission->save();

					/*$str = <<<XYZ
        <script type="text/javascript">
        window.location.reload();
        </script>
XYZ;*/
					return $this->renderText($this->getRequestParameter('value'));
				}
			}
		}
	}

	/**
	 * Save Add Leg's discussion
	 * CODE:
	 */
	public function executeAddDiscussion(sfWebRequest $request) {
		if($request->isMethod('post')) {
			$com_dis = $request->getParameter('comment_dis');
			$leg_id = $request->getParameter('dis_leg_id');
			if($com_dis != null && strlen($request->getParameter('comment_dis')) <= 300){
				if($leg_id) {
					$discussion = new Discussion();
					$discussion->setLegId($leg_id);
					$discussion->setUserId($this->getUser()->getId());
					$discussion->setComment($request->getParameter('comment_dis'));
					$discussion->setIsSplit($request->getParameter('is_split'));
					$discussion->save();
					$this->redirect('@request_legs?display='.$leg_id.'#dis_form'.$leg_id);
                                        
				}else {
					$this->getUser()->setFlash('form_'.$leg_id.'_error','Please fill comment to discussion!');
					$this->redirect('@request_legs?display='.$leg_id.'#dis_form'.$leg_id);
				}
			}else{
				$this->getUser()->setFlash('error','Please fill comment to discussion'.(strlen($request->getParameter('comment_dis')) > 300) ? ' with maximum of 300 characters!':'!');
				$this->redirect('@request_legs?display='.$leg_id);
			}
		}
	}
	/**
	 * Save Accept Pilot Request
	 * CODE:pilot_request_on_accept
	 */
	public function executeAccept(sfWebRequest $request)
        {
		#security
		
                if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }


		$this->setTemplate(false);
		if($request->getParameter('id'))
		{

                    $req = PilotRequestPeer::retrieveByPK($request->getParameter('id'));
                    if(isset($req) && $req instanceof PilotRequest ){
                        if($req->getAccepted() == 1) {
                                $req->setAccepted(0);
                                $req->setProcessed(1);
                                $req->setOnHold(0);
                                
                        }else {
                                $req->setAccepted(1);
                                $req->setProcessed(1);

                                $member_id = $req->getMemberId();
                                $leg_id = $req->getLegId();                                

                                $mission_leg = MissionLegPeer::retrieveByPK($leg_id);                                
                                $leg_number = $mission_leg->getLegNumber();
                                $mission_id = $mission_leg->getMissionId();
                                
                                /// Send Command Pilot Email
                                if($member_id){
                                    $member = MemberPeer::retrieveByPK($member_id);
                                    $person_id=$member->getPersonId();
                                    
                                    $externalID=$member->getExternalId();                                    
                                    $person = PersonPeer::retrieveByPK($person_id);                                    
                                    $frist_name= $person->getFirstName();
                                    $last_name= $person->getLastName();
                                    $name=$frist_name.' '.$last_name;
                                    $email= $person->getEmail();                                
                                  
                                    if ($person->getEmail()) {
                                      $pilot_type = "Command Pilot";
                                      # send email requested pilot
                                      $this->getComponent('mail', 'pilotRequestAccepted', array('email' => $email, 'name' =>$name, 'externalID' =>$externalID, 'pilot_type' =>$pilot_type, 'leg_number' =>$leg_number));

                                    }                                  
                                   
                                }
                                $req->save();                                
                                /// Accepted and Send Mission Assistand Email if pilot want mission assitand
                                $miss_assis_id = $req->getMissAssisId();
                                if($miss_assis_id)
                                {
                                    $member = MemberPeer::retrieveByPK($req->getMissAssisId());
                                    $externalID=$member->getExternalId();
                                    $person = PersonPeer::retrieveByPK($member->getPersonId());
                                    $frist_name= $person->getFirstName();
                                    $last_name= $person->getLastName();
                                    $name=$frist_name.' '.$last_name;
                                    $email = $person->getEmail();

                                    // Accept Mission Assistant 
                                    $pilot_request = PilotRequestPeer::getPilotRequestByMemberId($req->getMissAssisId(), $leg_id);
                                    if($pilot_request instanceof PilotRequest)
                                    {                                        
                                        $pilot_request->setAccepted(1);
                                        $pilot_request->setProcessed(1);
                                        $pilot_request->save();                                        
                                    }else {
                                        return $this->renderText("not saved");
                                    }
                                    
                                    //return $this->renderText('Pilot Request: '.$pilot_request->getId());                                   
                                    if ($person->getEmail()) {
                                            $pilot_type = "Mission Assistant";
                                            # send email requested pilot
                                            $this->getComponent('mail', 'pilotRequestAccepted', array('email' => $email, 'name' =>$name, 'externalID' =>$externalID, 'pilot_type' =>$pilot_type, 'leg_number' =>$leg_number));
                                    }
                                    
                                }

                                $pilot = PilotPeer::getByMemberId($member_id);
                                $pilot_id = $pilot->getId();

                                $mission_leg->setPilotId($pilot_id);
                                $mission_leg->setMissAssisId($req->getMissAssisId());
                                $mission_leg->save();                                
                                
                                $c = new Criteria();
                                $c->add(PilotRequestPeer::ID, NULL, Criteria::ISNOTNULL);
                                if($req->getMissionAssistantWanted() == 1 && $req->getMissAssisId())
                                {
                                    $getMemberId=$req->getMissAssisId();
                                    $c->add(PilotRequestPeer::MEMBER_ID, $getMemberId, Criteria::NOT_EQUAL);
                                }                             

                                $c->add(PilotRequestPeer::ACCEPTED, 0);
                                $c->add(PilotRequestPeer::LEG_ID,$leg_id);                                
                                $reqs = PilotRequestPeer::doSelect($c);

                                foreach ($reqs as $reqpilot){
                                   if($reqpilot instanceof PilotRequest){

                                     // Member information
                                     $member = MemberPeer::retrieveByPK($reqpilot->getMemberId());
                                     $externalID=$member->getExternalId();

                                     // Person information
                                     $person = PersonPeer::retrieveByPK($member->getPersonId());
                                     $frist_name= $person->getFirstName();
                                     $last_name= $person->getLastName();
                                     $name=$frist_name.' '.$last_name;
                                     $email= $person->getEmail();                                     

                                     $reqpilot->setAccepted(0);
                                     $reqpilot->setProcessed(1);
                                     $reqpilot->setOnHold(0);
                                     $reqpilot->save();

                                     // Mission Leg information
                                     $mission_leg = MissionLegPeer::retrieveByPK($leg_id);
                                     $leg_number = $mission_leg->getLegNumber();                                    

                                     // Missio information
                                     $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
                                     $missionDate=$mission->getMissionDate();

                                     if($person->getEmail()) {
                                        $this->getComponent('mail', 'pilotRequestNotAccepted', array('email' => $email, 'name' =>$name, 'externalID' =>$externalID, 'leg_number' =>$leg_number, 'missionDate' =>$missionDate));
                                     }
                                   }
                               }
                               $this->getUser()->setAttribute('pilotAddToLegview', 1);
                               return $this->renderText($leg_id);
                        }
                        
                    }
                    return sfView::NONE;
		}
	}

	public function executeAcceptAll(sfWebRequest $request)
        {
		#security
		
                 if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }
		$this->setTemplate(false);
		if($request->getParameter('id'))
		{
                    $reqs = PilotRequestPeer::getMemberIdForSelect($request->getParameter('id'),$request->getParameter('member'));
                    foreach ($reqs as $req){
                        if(isset($req) && $req instanceof PilotRequest ){
                                $req->setAccepted(1);
                                $req->setProcessed(1);
                                $req->setOnHold(0);
                                $req->save();
                        }
                    }
                    return sfView::NONE;
		}
	}

	public function executeDeclineAll(sfWebRequest $request) {
		#security
		
                 if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }

		$this->setTemplate(false);
		if($request->getParameter('id'))
		{
			$reqs = PilotRequestPeer::getMemberIdForSelect($request->getParameter('id'),$request->getParameter('member'));
			foreach ($reqs as $req){
				if(isset($req) && $req instanceof PilotRequest ){
					$req->setAccepted(0);
					$req->setProcessed(1);
					$req->setOnHold(0);
					$req->save();
				}
			}           
			return sfView::NONE;
		}
	}
	/**
	 * Save Process Pilot Request
	 * CODE:pilot_request_on_process
	 */
	public function executeProcess(sfWebRequest $request) {
		#security		
            
                if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }
		$this->setTemplate(false);
		if($request->getParameter('id')) {
			$req = PilotRequestPeer::retrieveByPK($request->getParameter('id'));
			if(isset($req) && $req instanceof PilotRequest ) {
				if($req->getProcessed() == 1) {
					$req->setProcessed(0);
				}else {
					$req->setProcessed(1);
				}
				$req->save();

				$this->redirect($request->getReferer());
			}
		}
	}
	/**
	 * Save On hold Pilot Request
	 * CODE:pilot_request_on_hold
	 */
	public function executeHold(sfWebRequest $request) {
		#security
		 if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }

		$this->setTemplate(false);

		if($request->getParameter('id')) {
			$req = PilotRequestPeer::retrieveByPK($request->getParameter('id'));

			if(isset($req) && $req instanceof PilotRequest ) {
				if($req->getOnHold() == 1) {
					$req->setOnHold(0);
				}else {
					$req->setOnHold(1);
				}
				$req->save();
                                if($request->hasParameter('returnto')){                                   
                                    $this->redirect('/dashboard/index?return=1');
                                }
				$this->redirect($request->getReferer());
			}
		}
	}
	/**
	 * Save Filter pilot requests by filter
	 * CODE:
	 */
	public function executeFilter(sfWebRequest $request) {
		#TODO
		#security
                 if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }

		$req_date1 = $request->getParameter('req_date1', '');
		$req_date2 = $request->getParameter('req_date2', '');
		$miss_date1 = $request->getParameter('miss_date1', '');
		$miss_date2 = $request->getParameter('miss_date2', '');

		$not_process = $request->getParameter('not_process', '');
		$hold = $request->getParameter('hold', '');
		$process = $request->getParameter('process', '');

		$this->pilot_requests = PilotRequestPeer::getByFilters(
		$req_date1,
		$req_date2,
		$miss_date1,
		$miss_date2,
		$not_process,
		$hold,
		$process
		);
	}

	public function executeResetFilterForm(sfWebRequest $request) {
		$is_filter_saved = UserFilterPeer::getByPersonId($this->getUser()->getId());
		if(isset($is_filter_saved)) {
			$is_filter_saved->delete();
			$this->getUser()->setFlash('success','Your current filters has cleared!');
		}
		//reset parameter
		$this->getUser()->setAttribute('staff_available', array(),'person');
		$this->redirect($request->getReferer());
	}
	//TODO
	public function executeSaveFilterForm(sfWebRequest $request) {

		//get all filters
		$f_date_range1 = $request->getParameter('date_range1');
		$f_date_range2 = $request->getParameter('date_range2');

		$weekdays = $request->getParameter('weekdays', array());

		$f_wing= $request->getParameter('wing_id');
		$f_ident= $request->getParameter('ident');
		$f_city= $request->getParameter('city');
		$f_zipcode= $request->getParameter('zipcode');
		$f_state= $request->getParameter('state');
		$f_location_type= $request->getParameter('location_type');

		$f_origin= $request->getParameter('origin');
		$f_dest= $request->getParameter('dest');

		$needs_pilot= $request->getParameter('needs_pilot');
		$co_pilot= $request->getParameter('co_pilot');
		$ifr= $request->getParameter('ifr');

		//mission types selected by default
		$arr = array();
		if (sizeof($this->mission_types) > 0) {
			foreach ($this->mission_types as $ru) {
				$arr[] = $ru->getId();
			}
		}

		$selected_types = $request->getParameter('selected_types[]', $arr);


		$f_filled= $request->getParameter('filled');
		$f_open= $request->getParameter('open');

		$f_maxpass= $request->getParameter('max_pass');
		$f_maxwei= $request->getParameter('max_weight');
		$f_maxdist= $request->getParameter('max_distance');
		$f_mineff= $request->getParameter('min_efficiency');

		$ignore_availability = $request->getParameter('ignore_availability');
		$member_id = $request->getParameter('member_id');

		#save filter
		$is_filter_saved  = UserFilterPeer::getByPersonId($this->getUser()->getId());
		if(!$is_filter_saved || !($is_filter_saved instanceof UserFilter)) {
			$is_filter_saved = new UserFilter();
		}

		$is_filter_saved->setPersonId($this->getUser()->getId());
		$is_filter_saved->setDateRange1($f_date_range1);
		$is_filter_saved->setDateRange2($f_date_range2);
		$is_filter_saved->setDay1($weekdays[0]?1:0);
		$is_filter_saved->setDay2($weekdays[1]?1:0);
		$is_filter_saved->setDay3($weekdays[2]?1:0);
		$is_filter_saved->setDay4($weekdays[3]?1:0);
		$is_filter_saved->setDay5($weekdays[4]?1:0);
		$is_filter_saved->setDay6($weekdays[5]?1:0);
		$is_filter_saved->setDay7($weekdays[6]?1:0);
		$is_filter_saved->setWing($f_wing);
		$is_filter_saved->setIdent($f_ident);
		$is_filter_saved->setCity($f_city);
		$is_filter_saved->setZipcode($f_zipcode);
		$is_filter_saved->setState($f_state);


		$is_filter_saved->setOrgin($f_origin);
		$is_filter_saved->setDest($f_dest);
		$is_filter_saved->setIsPilot($needs_pilot);
		$is_filter_saved->setIsMa($co_pilot);
		$is_filter_saved->setIfrBackup($ifr);
		$is_filter_saved->setFilled($f_filled);
		$is_filter_saved->setOpen($f_open);


		$is_filter_saved->setMaxPassenger($f_maxpass);
		$is_filter_saved->setMaxWeight($f_maxwei);
		$is_filter_saved->setMaxDistance($f_maxdist);
		$is_filter_saved->setMaxEffciency($f_mineff);

		$is_filter_saved->setAvailability($ignore_availability);

		$is_filter_saved->save();

		//now save selected mission types
		//before delete all previous mission types saved
		$c = new Criteria();
		$c->add(UserFilterMissionTypesPeer::USER_FILTER_ID , $is_filter_saved->getId());
		foreach (UserFilterMissionTypesPeer::doSelect($c) as $rUs){
			$rUs->delete();
		}
		//now add
		foreach ($selected_types as $key=>$value){
			$rUs = new UserFilterMissionTypes();
			$rUs->setUserFilterId($is_filter_saved->getId());
			$rUs->setMissionTypeId($value);
			$is_filter_saved->addUserFilterMissionTypes($rUs);
		}
		$is_filter_saved->save();

		$this->getUser()->setFlash('success','Your current filters has saved!');

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
		$this->min_efficiency = $params['min_efficiency']; // Default efficiency 
		$this->ignore_availability = $params['ignore_availability'];

                $this->member_id = $params['member_id'];

		$this->getUser()->setAttribute('staff_available', $params, 'person');
		$this->error_min_eff = false;
		if(isset ($this->min_efficiency) && $this->min_efficiency!=null && !($this->min_efficiency >= 1 && $this->min_efficiency <=100)){
                    $this->error_min_eff = true;
                }
		
	}
    public function executeAutoGetIdents(sfWebRequest $request){
        $this->keyword = $request->getParameter('airport_ident');
        $this->idents = AirportPeer::getAutoIdents($this->keyword);
    }

    public function executeAjaxGetPilotRequests(sfWebRequest $request){
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

      
      
      //return $this->renderText($request->getParameter('req_date1').'  '.$request->getParameter('req_date2'));
        # filter
        $this->processPilotRequestFilter($request);
        $this->pager = PilotRequestPeer::getPager(
        $this->max,
        $this->page,
        $this->req_date1 ,
        $this->req_date2 ,
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
    }
    private function processPilotRequestFilter(sfWebRequest $request) {
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

}
