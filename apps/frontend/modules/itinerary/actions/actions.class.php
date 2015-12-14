<?php
/**
 * itinerary actions.
 *
 * @package    angelflight
 * @subpackage itinerary
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class itineraryActions extends sfActions
{
  /**
   * Searches for Itinerary
   * CODE: itinerary_find
   */
  public function executeFind(sfWebRequest $request)
  { 
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
  }

  /**
   * Searches for Itinerary
   * CODE: itinerary_index
   */
  public function executeIndex(sfWebRequest $request)
  { 
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $id = $request->getParameter('id');
    if ($id)
    {
      $itinerary =  ItineraryPeer::retrieveByPK($id);
      if($itinerary)
      {
        if($itinerary->getCancelItinerary() == 1){
            $this->redirect('@itinerary_detail?id='.$itinerary->getId());
        }
        else{
            $this->getUser()->setFlash('success', 'The itinerary is cancelled so mission could not be created under this itinerary');
            $this->redirect('itinerary');
        }
      }
      else
      {
        $this->getUser()->setFlash('warning', 'Itinerary #'.$id.' not found!');
      }
    }

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = ItineraryPeer::getPager(
                $this->max,
                $this->page,
                $this->date_req,
                $this->pass_name,
                $this->req_name,
                $this->pass_lname,
                $this->req_lname
        );        
        $this->itinerary_list = $this->pager->getResults();
    }
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  /**
   * Searches for itinerary by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('itinerary', array(), 'person');

    if (!isset($params['date_req'])) $params['date_req'] = null;
    if (!isset($params['pass_name'])) $params['pass_name'] = null;
    if (!isset($params['req_name'])) $params['req_name'] = null;
    if (!isset($params['pass_lname'])) $params['pass_lname'] = null;
    if (!isset($params['req_lname'])) $params['req_lname'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array))
    {
      $params['max'] = $request->getParameter('max');
    }else
    {
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter'))
    {
      $params['date_req'] = $request->getParameter('date_req');
      $params['pass_name']= $request->getParameter('pass_name');
      $params['req_name'] = $request->getParameter('req_name');
      $params['pass_lname']= $request->getParameter('pass_lname');
      $params['req_lname'] = $request->getParameter('req_lname');
    }

    $this->page     = $page = $request->getParameter('page', 1);
    $this->max      = $params['max'];
    $this->date_req = $params['date_req'];
    $this->pass_name = $params['pass_name'];
    $this->req_name = $params['req_name'];
    $this->pass_lname = $params['pass_lname'];
    $this->req_lname = $params['req_lname'];

    $this->getUser()->setAttribute('itinerary', $params, 'person');
  }

  public function executeCancel(sfWebRequest $request)
  {
      if($request->hasParameter('id'))
     { 
        $this->itinerary = ItineraryPeer::retrieveByPK($request->getParameter('id'));
     }
     else
     {
        $this->forward404 ();
     }
  }

  public function executeCopyForm(sfWebRequest $request)
  {
      $this->missions = MissionPeer::getAllMissionByItineraryId($request->getParameter('id'));
  }

  public function executeCopy(sfWebRequest $request)
  {
    $type = $request->getParameter('type');
    $itin_id = $request->getParameter('id');
    $itinerary_old = ItineraryPeer::retrieveByPK($itin_id);
    $itinerary = new Itinerary();
    $itinerary_old->copyInto($itinerary);
    $itId = 'copy of '.$itin_id;
    $itinerary->setCopiedItinerary($itId);
    $itinerary->setComment('');
    $itinerary->save();
    $mission = MissionPeer::getByItiId($itinerary_old->getId());
    if($type === "copy"){
        $mission_date = $request->getParameter('mission_date');
        $date_requested = $request->getParameter('date_requested');
        $appt_date = $request->getParameter('appt_date');
        $flight_time = $request->getParameter('flight_time');
        $mission_specific_comments = $request->getParameter('mission_specific_comments');
        $i = 0;
        foreach ($mission as $mission_list){
            $mi = new Mission();
            $mission_list->copyInto($mi);
            $mi->setItineraryId($itinerary->getId());
            $mi->setExternalId(MissionPeer::getLatestExternalId());
            $mi->setMissionDate($mission_date[$i]);
            $mi->setDateRequested($date_requested[$i]);
            $mi->setApptDate($appt_date[$i]);
            $mi->setFlightTime($flight_time[$i]);
            $mi->setMissionSpecificComments($mission_specific_comments[$i]);
            $mId = 'copy of '.$mission_list->getId();
            $mi->setCopiedMission($mId);
            $mi->save();
            $mission_legs = MissionLegPeer::getbyMissId($mission_list->getId());
                foreach($mission_legs as $mission_leg){
                    $mi_leg = new MissionLeg();
                    $mission_leg->copyInto($mi_leg);
                    $mi_leg->setMissionId($mi->getId());
                    $mlId = 'copy of '.$mission_leg->getId();
                    $mi_leg->setCopiedMissionLeg($mlId);
                    $mi_leg->save();
                }
           $i++;
          }
          if($itinerary_old->getPassengerId()){
              $pass = PassengerPeer::retrieveByPK($itinerary_old->getPassengerId());
              $pass->setLodgingName($request->getParameter('lodging_name'));
              $pass->setLodgingPhone($request->getParameter('lodging_phone'));
              $pass->setLodgingPhoneComment($request->getParameter('lodging_phone_comment'));
              $pass->setReleasingPhysician($request->getParameter('releasing_physician'));
              $pass->setReleasingPhone($request->getParameter('releasing_phone'));
              $pass->setFacilityName($request->getParameter('facility_name'));
              $pass->setFacilityPhone($request->getParameter('facility_phone'));
              $pass->setFacilityPhoneComment($request->getParameter('facility_phone_comment'));
              $pass->save();
          }

          $this->getUser()->setFlash('success',"The itinerary has been copied successfully.");
          $this->redirect('itinerary/index');
    }
  }

  /**
   * Add or edit Itinerary
   * CODE: itinerary_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->current_facility = "";
    $this->current_lodging = "";
    $this->current_facility_city = "";
    $this->current_facility_state = "";
    $this->current_facility_phone = "";
    $this->current_facility_phone_comment = "";
    $this->current_lodging_city = "";
    $this->current_lodging_state = "";
    $this->current_lodging_phone = "";
    $this->current_lodging_phone_comment = "";
    $this->mis2bn = false;

    $this->passenger_a = trim($this->getRequestParameter('passenger_a', '*')) == '' ? '*' : trim($this->getRequestParameter('passenger_a', '*'));
    $this->facility = trim($this->getRequestParameter('facility', '*')) == '' ? '*' : trim($this->getRequestParameter('facility', '*'));
    $this->lodging = trim($this->getRequestParameter('lodging', '*')) == '' ? '*' : trim($this->getRequestParameter('lodging', '*'));
    $this->requester_p = trim($this->getRequestParameter('requester_p', '*')) == '' ? '*' : trim($this->getRequestParameter('requester_p', '*'));
    $this->person_a = trim($this->getRequestParameter('person_a', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a', '*'));
    $this->person_a_req = trim($this->getRequestParameter('person_a_req', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a_req', '*'));
    $this->agency = trim($this->getRequestParameter('agency', '*')) == '' ? '*' : trim($this->getRequestParameter('agency', '*'));

    $this->hour = $request->getParameter('hour');
    $this->minut = $request->getParameter('minut');

    $this->b_weight = "";
    $this->b_type = "";
    $this->b_desc = "";

    if($request->getParameter('id'))
    {
        $itine = ItineraryPeer::retrieveByPk($request->getParameter('id'));
        $mis  = MissionPeer::getMissionByItineraryId($request->getParameter('id'), 1);
        $mis2 = MissionPeer::getMissionByItineraryId($request->getParameter('id'), 2);
           
        if(isset($mis)){
            $this->b_weight = $mis->getBWeight();
        }
        if(isset($mis)){
            $this->b_type = $mis->getBType();
        }
        if(isset($mis)){
            $this->b_desc = $mis->getBDesc();
        }
      
      if($mis2)
      {
        $this->mis2bn = true;
      }else{
        $mis2 = new Mission();
      }
      //$pp = $itine->getPassenger();
      if(isset($itine)){
        $this->passenger_name = $itine->getPassenger()->getPerson()->getName();
        $this->current_pass_id = $itine->getPassengerId();
        $this->current_facility = $itine->getPassenger()->getFacilityName();
        $this->current_lodging = $itine->getPassenger()->getLodgingName();


        $this->companions = $itine->getPassenger()->getCompanions();
        $this->selected_companions = array();

        foreach ($mis->getMissionCompanions() as $mis_comp) {
          $this->selected_companions[] = $mis_comp->getCompanionId();
        }
        //print_r($this->selected_companions);
         
      }
      $this->title = 'Edit Itinerary';
      $success = 'Itinerary has been succesfuly edited!';
      $editpassengerfac = PassengerDestPeer::getFacilityByPassengerId($this->current_pass_id, $this->current_facility);
      $editpassengerlod = PassengerDestPeer::getLodgingByPassengerId($this->current_pass_id, $this->current_lodging);

      if($editpassengerfac)
      {
        $this->current_facility_city = $editpassengerfac->getFacilityCity();
        $this->current_facility_state = $editpassengerfac->getFacilityState();
        $this->current_facility_phone = $editpassengerfac->getFacPhone();
        $this->current_facility_phone_comment = $editpassengerfac->getFacilityPhoneComment();
      }
      if($editpassengerlod)
      {
        $this->current_lodging_city = $editpassengerlod->getFacilityCity();
        $this->current_lodging_state = $editpassengerlod->getFacilityState();
        $this->current_lodging_phone = $editpassengerlod->getLodPhone();
        $this->current_lodging_phone_comment = $editpassengerlod->getLodPhoneComment();
      }
      if(isset($itine)){
        $point_time = $itine->getPointTime();
          if($point_time)
          {
            $split_time = split(':', $point_time);
            $this->hour = $split_time[0];
            $this->minut = $split_time[1];
          }
      }
    }
    else
    { 
      $itine =  new Itinerary();
      $mis = new Mission();
      $mis2 = new Mission();
      //$passIti = new Passenger();
      //$itine->setWaiverNeed(1);
      //$itine->setNeedMedicalRelease(1);
      $this->title = 'Add Itinerary';
      $success = 'Itinerary has been succesfully created!';
    }
    
    $this->requester_a = "";
    $this->itine = $itine;
    if ($request->hasParameter('requester_a'))
    {
      $this->requester_a = trim($this->getRequestParameter('requester_a', '*')) == '' ? '*' : trim($this->getRequestParameter('requester_a', '*'));
    }
    else
    {
      if(isset($itine)){
          $requester = $itine->getRequester();
          if ($requester)
          {
            $this->requester_a = $requester->getPerson()->getName();
            if ($requester->getAgency()->getName()) $this->requester_a .= ', '.$requester->getAgency()->getName();
            if ($requester->getTitle()) $this->requester_a .= ', '.$requester->getTitle();
          }
      }
    }
    
    $this->form = new ItineraryForm($itine);
    $this->missionform1 = new MissionSmallForm($mis);
    $this->missionform2 = new MissionSmallForm($mis2);
    //$this->formI = new PassengerItiForm($passIti);

    $facandlod = new PassengerDest();
    $this->form6 = new PassengerDestForm($facandlod);

    $passenger = new Passenger();
    $this->passenger = $passenger;

    //passengers,requester uses when edit
    $c = new Criteria();
    $c->setLimit(50);
    $this->all_passengers = PassengerPeer::doSelect($c);
    $this->all_requesters = RequesterPeer::doSelect($c);

    //Passenger Form1
    $this->form1 = new PassengerPopUpForm1($passenger);
    $this->sub_title = 'Add New Passenger';

    //Passenger Form 2
    $this->form2 = new PassengerPopUpForm2();

    //Passenger Form 3
    $this->form3 = new PassengerPopUpForm3();

    //Passenger Form 4
    $this->form4 = new PassengerPopUpForm4();

    //Passenger Form 5
    $this->form5 = new PassengerPopUpForm5();

    //Requester PopUp Form  - Not Requester Passenger
    $this->persons = PersonPeer::getNotInRequester();

    $requester = new Requester();
    $this->form_req = new RequesterForm($requester);
    $companion = new Companion();
    $this->form_com = new CompanionForm($companion);
    $this->req_referer = $request->getReferer();

    $this->states = sfConfig::get('app_states');

    $this->errors = array();
	
    if($request->isMethod('post'))
    {   

      $this->form->bind($request->getParameter('itine'));
      $this->referer = $request->getReferer();
      $k = $this->form->isValid();


      if($k && $request->getParameter('passenger_id') && $request->getParameter('requester_id'))
      { 
        $itine->setPassengerId($request->getParameter('passenger_id'));
        $itine->setRequesterId($request->getParameter('requester_id'));

        $itine->setDateRequested($this->form->getValue('date_requested'));
        $itine->setMissionTypeId($this->form->getValue('mission_type_id'));
        $itine->setApointTime($this->form->getValue('apoint_time'));
        
        if($request->getParameter('facility'))
        {
          $itine->setFacility($request->getParameter('facility'));
        }
        if($request->getParameter('lodging'))
        {
          $itine->setLodging($request->getParameter('lodging'));
        }
        if($request->getParameter('hour') && $request->getParameter('minut') && $request->getParameter('hour') != '---' && $request->getParameter('minut') != '---')
        {
          $itine->setPointTime($request->getParameter('hour').':'.$request->getParameter('minut').':00');
          $itine->setTimetype($this->form->getValue('timetype'));
        }

        $passengerItine = PassengerPeer::retrieveByPK($request->getParameter('passenger_id'));
        if($passengerItine instanceof Passenger){
            $personpasItine = $passengerItine->getPerson();
            $origin_city = $personpasItine->getCity();
            $origin_state = $personpasItine->getState();
            $dest_city = $passengerItine->getFacilityCity();
            $dest_state = $passengerItine->getFacilityState();
            //$passengerItine->setBWeight($request->getParameter('b_weight'));
            //$passengerItine->setBType($request->getParameter('b_type'));
            //$passengerItine->setBDesc($request->getParameter('b_desc'));
            $passengerItine->save();
            //check
        }

        $itine->setOrginCity($origin_city?$origin_city:"");
        $itine->setOrginState($origin_state?$origin_state:"");
        $itine->setDestCity($dest_city?$dest_city:"");
        $itine->setDestState($dest_state?$dest_state:"");
        //$itine->setBWeight($this->form->getValue('b_weight'));
        //$itine->setBType($this->form->getValue('b_type'));
        //$itine->setBDesc($this->form->getValue('b_desc'));
        //$itine->setWaiverNeed($this->form->getValue('waiver_need'));
        //$itine->setNeedMedicalRelease($this->form->getValue('need_medical_release'));
        $itine->setComment($this->form->getValue('comment'));

        $newIti = false;
        if($itine->isNew())
        {
           
          $newIti = true;
          $itine->setCancelItinerary(1);
        }
        
        $itine->save();
        
        $companions = (array)$request->getParameter('companions');
        if (count($companions))
        {
          $c = new Criteria();
          $c->add(CompanionPeer::ID, $companions, Criteria::IN);
          $c->add(CompanionPeer::PASSENGER_ID, $request->getParameter('passenger_id'));
          if (CompanionPeer::doCount($c) != count($companions))
          {
            $this->errors[] = 'Some companions not found';
          }
        }
        
        $mis->setItineraryId($itine->getId());
        $mis->setMissionTypeId($this->form->getValue('mission_type_id'));
        $mis->setDateRequested($this->form->getValue('date_requested'));
        $mis->setPassengerId($request->getParameter('passenger_id'));
        $mis->setRequesterId($request->getParameter('requester_id'));
        $mis->setMissionDate($request->getParameter('mis1'));
        $mis->setBWeight($request->getParameter('b_weight'));
        $mis->setBType($request->getParameter('b_type'));
        $mis->setBDesc($request->getParameter('b_desc'));


        /*if($itine->isNew()){
            echo $countMission; exit;
            if(isset($countMission)){
                    foreach($misall as $misc){
                        $mLeg = MissionLegPeer::getAllMissionLegByMissionId($misc->getId());
                        $countLeg = MissionLegPeer::getMissionLegByMissionIdCount($misc->getId());
                        if(isset($countLeg)){
                            foreach($mLeg as $ml){
                                $ml->setCancelMissionLeg(1);
                                $ml->save();
                            }
                        }
                        $misc->setCancelMission(1);
                        $misc->save();
                    }
            }
        }*/
        

        if($request->getParameter('missionSelect') == 1)
        {
          $mis->setApptDate($request->getParameter('appdate1'));
          $mis->setApointTime($this->form->getValue('apoint_time'));
          $mis->setStart(1);
        }
        else
        {
          $mis->setStart(2);
        }

        if($itine->getCancelItinerary() == 1){
            $mis->setCancelMission(1);
        }

        if(!$request->getParameter('id'))
        {
            //Mission 1 externa ID
            $c = new Criteria();
            $c->add(MissionPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
            $c->addDescendingOrderByColumn(MissionPeer::EXTERNAL_ID);
            $external_mission = MissionPeer::doSelectOne($c);
            $external_id = $external_mission->getExternalId();
            
            $currentExternalId=($external_id+1);
            $mis->setExternalId($currentExternalId);
            // die();
        }

        
       
        $mis->setMissionCount(1);
        $mis->save();        

        if($request->getParameter('yes_no') == 1)
        { 
          //Mission 2 externa ID
          if(!$request->getParameter('id'))
          {
              $c = new Criteria();
              $c->add(MissionPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
              $c->addDescendingOrderByColumn(MissionPeer::EXTERNAL_ID);
              $external_mission = MissionPeer::doSelectOne($c);
              $external_id = $external_mission->getExternalId();
              $currentExternalId=($external_id+1);
              $mis2->setExternalId($currentExternalId);
             // die();
          }

          $mis2->setItineraryId($itine->getId());

          $mis2->setMissionTypeId($this->form->getValue('mission_type_id'));
          $mis2->setDateRequested($this->form->getValue('date_requested'));
          $mis2->setPassengerId($request->getParameter('passenger_id'));
          $mis2->setRequesterId($request->getParameter('requester_id'));
          $mis2->setMissionDate($request->getParameter('mis2'));
          $mis2->setBWeight($request->getParameter('b_weight'));
          $mis2->setBType($request->getParameter('b_type'));
          $mis2->setBDesc($request->getParameter('b_desc'));
          $mis2->setCancelMission(1);
          
          if($request->getParameter('missionSelect') == 1)
          {
            $mis2->setStart(2);
          }
          else
          {
            $mis2->setStart(1);
          }
          $mis2->setMissionCount(2);

          if($itine->getCancelItinerary() == 1){
            $mis2->setCancelMission(1);
          }
          $mis2->save();
        }

        if (count($this->errors))
        {
          # error in form
          switch ($request->getParameter('transportation'))
          {
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
        }
        else
        {
          $c->clear();
          $c->add(MissionCompanionPeer::MISSION_ID, $mis->getId());
          MissionCompanionPeer::doDelete($c);
          
          foreach ($companions as $id)
          {
            $mission_companion = new MissionCompanion();
            $mission_companion->setMissionId($mis->getId());
            $mission_companion->setCompanionId($id);
            $mission_companion->save();
          }
        }
        //die();
        $this->selected_companions = $companions;

        //print_r($this->selected_companions);
        //die();


        //$team_note = TeamNotePeer::retrieveByPK($id);
        //if(!$team_note) {
        //$team_note = new TeamNote();
        //}
        //$team_note->setRoleId($id);
        //$team_note->setNote(strip_tags($note, sfConfig::get('app_allowed_note_tags')));
        //$team_note->save();

        $this->getUser()->setFlash('success', $success);
        //$request->getParameter('back')
        $this->redirect('/itinerary/detail/'.$itine->getId());
        
      }
      else
      {
        if(!$request->getParameter('passenger_id'))
        {
          $this->need_pass=1;
        }
        if(!$request->getParameter('requester_id'))
        {
          $this->need_requester_id = 1;
        }
        //if(!$request->getParameter('facility')){
        //$this->need_facility= 1;
        //}
        //if(!$request->getParameter('lodging')){
        //$this->need_lodging = 1;
        //}

        $this->referer = $request->getParameter('back');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@itinerary';
    }
    
    // Block from Add person
    
  if($request->getParameter('add_pass') == 'yes'){
      $this->person = new Person();
      $this->person_title = 'Step 1 : Add person';
      if($request->getParameter('camp_id')){
      $this->camp_id = $request->getParameter('camp_id');  
      }
      $this->stepped = 1;
    }

    if($request->getParameter('add_pass_iti') == 'yes'){
      $this->person = new Person();
      $this->person_title = 'Step 1 : Add person';
      $this->person_itine = 1;
    }

    if($request->getParameter('add_cont') == 'yes'){
      $this->person = new Person();
      $this->person_title = 'Step 1 : Add person';
      $this->contact = 1;
    }

    if($request->getParameter('id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('id'));
      $this->person_title = 'Edit person';
    }else{
      $this->person = new Person();
      $this->person_title = 'Add person';
    }

    $companion = new Companion();
    $this->form_a = new CompanionForm($companion);

    # Person Form
    $this->person_form = new PersonForm($this->person);
    $this->back = $request->getReferer();

    //session
    $this->key = $request->getParameter('key');
    if (!$this->key) {
      $this->key = rand(1000,9999);
    }
    # Agency Form
    $agency = new Agency();
    $this->agency_title = 'Add Agency';
    $this->agency_form = new AgencyForm($agency);
    
    if(strstr($request->getReferer(),'person/view')){
      if($this->person){
        //session
        $referer_session = $this->getUser()->getAttribute('ref');

        if (!$referer_session) {
          $referer_session = array($this->key => array());
          $this->getUser()->setAttribute('ref', $referer_session);
        }
        elseif (!isset($referer_session[$this->key]))
        {
          $a = '@person_view?id='.$this->person->getId();
          $referer_session[$this->key] = array('referer'=>$a);
          $this->getUser()->setAttribute('ref', $referer_session[$this->key]);

        }
      }
    }
    $this->person_referer = $request->getParameter('referer');

    if ($request->isMethod('post'))
    {
      $this->person_referer = $request->getParameter('referer');

      $this->person_form->bind($request->getParameter('per'));

      if ($this->person_form->isValid() && $this->person_form->getValue('first_name') && $this->person_form->getValue('last_name'))
      {
        $this->person->setTitle($this->person_form->getValue('title'));
        $this->person->setFirstName($this->person_form->getValue('first_name'));
        $this->person->setLastName($this->person_form->getValue('last_name'));
        $this->person->setAddress1($this->person_form->getValue('address1'));
        $this->person->setAddress2($this->person_form->getValue('address2'));
        $this->person->setCity($this->person_form->getValue('city'));
        $this->person->setCounty($this->person_form->getValue('county'));
        $this->person->setState($this->person_form->getValue('state'));
        $this->person->setCountry($this->person_form->getValue('country'));
        $this->person->setZipcode($this->person_form->getValue('zipcode'));
        $this->person->setDayPhone($this->person_form->getValue('day_phone'));
        $this->person->setDayComment($this->person_form->getValue('day_comment'));
        $this->person->setEveningPhone($this->person_form->getValue('evening_phone'));
        $this->person->setEveningComment($this->person_form->getValue('evening_comment'));
        $this->person->setMobilePhone($this->person_form->getValue('mobile_phone'));
        $this->person->setMobileComment($this->person_form->getValue('mobile_comment'));
        $this->person->setPagerPhone($this->person_form->getValue('paper_phone'));
        $this->person->setPagerComment($this->person_form->getValue('paper_comment'));
        $this->person->setOtherPhone($this->person_form->getValue('other_phone'));
        $this->person->setOtherComment($this->person_form->getValue('other_comment'));
        $this->person->setFaxPhone1($this->person_form->getValue('fax_phone1'));
        $this->person->setFaxComment1($this->person_form->getValue('fax_comment1'));
        $this->person->setAutoFax($this->person_form->getValue('auto_fax'));
        $this->person->setFaxPhone2($this->person_form->getValue('fax_phone2'));
        $this->person->setFaxComment2($this->person_form->getValue('fax_comment2'));
        $this->person->setEmail($this->person_form->getValue('email'));
        $this->person->setEmailTextOnly($this->person_form->getValue('email_text_only'));
        $this->person->setEmailBlocked($this->person_form->getValue('email_blocked'));
        $this->person->setComment($this->person_form->getValue('comment'));
        //$this->person->setBlockMailings($this->person_form->getValue('block_mailings')==0?null:$this->person_form->getValue('block_mailings'));
        $this->person->setBlockMailings($this->person_form->getValue('block_mailings'));
        $this->person->setNewsletter($this->person_form->getValue('newsletter'));
        $this->person->setGender($this->person_form->getValue('gender'));
        $this->person->setDeceased($this->person_form->getValue('deceased'));
        $this->person->setDeceasedComment($this->person_form->getValue('deceased_comment'));
        $this->person->setSecondaryEmail($this->person_form->getValue('secondary_email'));
        $this->person->setDeceasedDate($this->person_form->getValue('deceased_date'));
        $this->person->setMiddleName($this->person_form->getValue('middle_name'));
        $this->person->setSuffix($this->person_form->getValue('suffix'));
        $this->person->setNickname($this->person_form->getValue('nickname'));
        $this->person->setVeteran($this->person_form->getValue('veteran'));
        if($this->person->isNew()){
          $content = $this->getUser()->getName().' added new Person: '.$this->person->getFirstName();
          ActivityPeer::log($content);
        }
        $this->person->save();
		if($this->person->getId())
		{			
			$c = new Criteria();
			$c->add(RoleNotificationPeer::MID, 5);	
			$c->add(RoleNotificationPeer::NOTIFICATION, 1);
			$c->addOr(RoleNotificationPeer::NOTIFICATION, 3);			
			$c->addJoin(RoleNotificationPeer::ROLE_ID,PersonRolePeer::ROLE_ID);			
			$c->addJoin(PersonRolePeer::PERSON_ID,PersonPeer::ID);			
			$personemail = PersonPeer::doSelect($c);
			$allemail=array();
			$pindex=0;
			foreach($personemail as $getEmail)
			{
                            if(strlen($getEmail->getEmail())>0)
                            $allemail[$pindex++]=$getEmail->getEmail();
                            else if(strlen($getEmail->getSecondaryEmail())>0)
                            $allemail[$pindex++]=$getEmail->getSecondaryEmail();
			}
			//$allemail[$pindex]="engfaruque@gmail.com";						
						
			$email['subject']="New Person added";
			$link=$request->getHost()."/person/view/".$this->person->getId();
			$body="A new person added in ".$request->getHost()."\r\n"
			      .$this->person->getFirstName()." ".$this->person->getLastName()."\r\n Profile Link: ".$link;
			$email['body']=$body;									
			$email['sender_email']="admin@afw.com";
			
			$this->getComponent('mail', 'sendBulk', array(
			'subject' => $email['subject'],
			'recievers' => $allemail,
			'sender' => $email['sender_email'],
			'body' => $email['body'],			
			));			
		}

        if($request->hasParameter('has')){
          $data = '';
          if($request->getParameter('camp_id')){
            $data = '&camp_id='.$request->getParameter('camp_id');
          }
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
          $this->redirect('@passenger_create?add_pass='.$request->getParameter('has').'&p_id='.$this->person->getId().$data);
        }
        if($request->hasParameter('iti')){
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
          $this->redirect('@passenger_create?add_pass_iti='.$request->getParameter('iti').'&p_id='.$this->person->getId());
        }

        if($request->hasParameter('contact')){
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add contact!');
          $this->redirect('@contact_create?person_id='.$this->person->getId());
        }
        
        $this->getUser()->setFlash('success', 'Person information has been successfully saved!');

        $last = $request->getParameter('back');

        $referer_session = $this->getUser()->getAttribute('ref');

        $back_url = '@person_view?id='.$this->person->getId();
        $this->redirect($back_url);
      }
    }else{
      # Set referer URL
      $this->person_referer = $request->getReferer() ? $request->getReferer() : '@person';
    }
  }

  public function executeAjaxAddPersonAndPassenger(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

	   
	   //$this->setLayout(false);
	   
	   if($request->getParameter('add_pass') == 'yes'){
	      $this->person = new Person();
	      $this->person_title = 'Step 1 : Add person';
	      if($request->getParameter('camp_id')){
	      $this->camp_id = $request->getParameter('camp_id');  
	      }
	      $this->stepped = 1;
	    }
	
	    if($request->getParameter('add_pass_iti') == 'yes'){
	      $this->person = new Person();
	      $this->person_title = 'Step 1 : Add person';
	      $this->person_itine = 1;
	    }
	
	    if($request->getParameter('add_cont') == 'yes'){
	      $this->person = new Person();
	      $this->person_title = 'Step 1 : Add person';
	      $this->contact = 1;
	    }
	
	    if($request->getParameter('id')){
	      $this->person = PersonPeer::retrieveByPK($request->getParameter('id'));
	      $this->person_title = 'Edit person';
	    }else{
	      $this->person = new Person();
	      $this->person_title = 'Add person';
	    }
	
	    # Person Form
	    $this->person_form = new PersonForm($this->person);
            $this->back = $request->getReferer();	
	    //session
	    $this->key = $request->getParameter('key');
	    if (!$this->key) {
	      $this->key = rand(1000,9999);
	    }
	
	    if(strstr($request->getReferer(),'person/view')){
	      if($this->person){
	        //session
	        $referer_session = $this->getUser()->getAttribute('ref');	
	        if (!$referer_session) {
	          $referer_session = array($this->key => array());
	          $this->getUser()->setAttribute('ref', $referer_session);
	        }
	        elseif (!isset($referer_session[$this->key]))
	        {
	          $a = '@person_view?id='.$this->person->getId();
	          $referer_session[$this->key] = array('referer'=>$a);
	          $this->getUser()->setAttribute('ref', $referer_session[$this->key]);
	
	        }
	      }
	    }
	    $this->person_referer = $request->getParameter('referer');

	    if ($request->isMethod('post'))
	    {
          if($request->hasParameter('action_from_passenger_or_requester')) {
               $this->action_from = $request->getParameter('action_from_passenger_or_requester');
          }
	      $this->person_referer = $request->getParameter('referer');	
	      $this->person_form->bind($request->getParameter('per'));              
              
	      if ($this->person_form->isValid() && ($request->getParameter('per[first_name]') != "") && ($request->getParameter('per[last_name]') != ""))
	      {
	        $this->person->setTitle($this->person_form->getValue('title'));
	        $this->person->setFirstName($this->person_form->getValue('first_name'));
	        $this->person->setLastName($this->person_form->getValue('last_name'));
	        $this->person->setAddress1($this->person_form->getValue('address1'));
	        $this->person->setAddress2($this->person_form->getValue('address2'));
	        $this->person->setCity($this->person_form->getValue('city'));
	        $this->person->setCounty($this->person_form->getValue('county'));
	        $this->person->setState($this->person_form->getValue('state'));
	        $this->person->setCountry($this->person_form->getValue('country'));
	        $this->person->setZipcode($this->person_form->getValue('zipcode'));
	        $this->person->setDayPhone($this->person_form->getValue('day_phone'));
	        $this->person->setDayComment($this->person_form->getValue('day_comment'));
	        $this->person->setEveningPhone($this->person_form->getValue('evening_phone'));
	        $this->person->setEveningComment($this->person_form->getValue('evening_comment'));
	        $this->person->setMobilePhone($this->person_form->getValue('mobile_phone'));
	        $this->person->setMobileComment($this->person_form->getValue('mobile_comment'));
	        $this->person->setPagerPhone($this->person_form->getValue('paper_phone'));
	        $this->person->setPagerComment($this->person_form->getValue('paper_comment'));
	        $this->person->setOtherPhone($this->person_form->getValue('other_phone'));
	        $this->person->setOtherComment($this->person_form->getValue('other_comment'));
	        $this->person->setFaxPhone1($this->person_form->getValue('fax_phone1'));
	        $this->person->setFaxComment1($this->person_form->getValue('fax_comment1'));
	        $this->person->setAutoFax($this->person_form->getValue('auto_fax'));
	        $this->person->setFaxPhone2($this->person_form->getValue('fax_phone2'));
	        $this->person->setFaxComment2($this->person_form->getValue('fax_comment2'));
	        $this->person->setEmail($this->person_form->getValue('email'));
	        $this->person->setEmailTextOnly($this->person_form->getValue('email_text_only'));
	        $this->person->setEmailBlocked($this->person_form->getValue('email_blocked'));
	        $this->person->setComment($this->person_form->getValue('comment'));
                //$this->person->setBlockMailings($this->person_form->getValue('block_mailings')==0?null:$this->person_form->getValue('block_mailings'));
	        $this->person->setBlockMailings($this->person_form->getValue('block_mailings'));
	        $this->person->setNewsletter($this->person_form->getValue('newsletter'));
	        $this->person->setGender($this->person_form->getValue('gender'));
	        $this->person->setDeceased($this->person_form->getValue('deceased'));
	        $this->person->setDeceasedComment($this->person_form->getValue('deceased_comment'));
	        $this->person->setSecondaryEmail($this->person_form->getValue('secondary_email'));
	        $this->person->setDeceasedDate($this->person_form->getValue('deceased_date'));
	        $this->person->setMiddleName($this->person_form->getValue('middle_name'));
	        $this->person->setSuffix($this->person_form->getValue('suffix'));
	        $this->person->setNickname($this->person_form->getValue('nickname'));
	        $this->person->setVeteran($this->person_form->getValue('veteran'));

                if($this->person->isNew()){
	          $content = $this->getUser()->getName().' added new Person: '.$this->person->getFirstName();
	          ActivityPeer::log($content);
	        }
	        $this->person->save();
                //////////////////////////////////////#bglobal omar
               
                if($this->person->getId())
                {
                    $passenger = new Passenger($this->person->getId());

                    $passenger->setPersonId($this->person->getId());
                    $passenger->save();
                        $c = new Criteria();
                        $c->add(RoleNotificationPeer::MID, 5);
                        $c->add(RoleNotificationPeer::NOTIFICATION, 1);
                        $c->addOr(RoleNotificationPeer::NOTIFICATION, 3);
                        $c->addJoin(RoleNotificationPeer::ROLE_ID,PersonRolePeer::ROLE_ID);
                        $c->addJoin(PersonRolePeer::PERSON_ID,PersonPeer::ID);
                        $personemail = PersonPeer::doSelect($c);
                        $allemail=array();
                        $pindex=0;
                        foreach($personemail as $getEmail)
                        {
                                if(strlen($getEmail->getEmail())>0)
                                $allemail[$pindex++]=$getEmail->getEmail();
                                else if(strlen($getEmail->getSecondaryEmail())>0)
                                $allemail[$pindex++]=$getEmail->getSecondaryEmail();
                        }
                        //$allemail[$pindex]="engfaruque@gmail.com";
                        /*
                        $email['subject']="New Person added";
                        $link=$request->getHost()."/person/view/".$this->person->getId();
                        $body="A new person added in ".$request->getHost()."\r\n"
                              .$this->person->getFirstName()." ".$this->person->getLastName()."\r\n Profile Link: ".$link;
                        $email['body']=$body;
                        $email['sender_email']="admin@afw.com";                        

                        $this->getComponent('mail', 'sendBulk', array(
                        'subject' => $email['subject'],
                        'recievers' => $allemail,
                        'sender' => $email['sender_email'],
                        'body' => $email['body'],
                        ));*/
                }
                /////////////////////////////////////
               
	        if($request->hasParameter('has')){
	          $data = '';
	          if($request->getParameter('camp_id')){
	            $data = '&camp_id='.$request->getParameter('camp_id');
	          }
	          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
	          $this->redirect('@passenger_create?add_pass='.$request->getParameter('has').'&p_id='.$this->person->getId().$data);
	        }
	        if($request->hasParameter('iti')){
	          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
	          $this->redirect('@passenger_create?add_pass_iti='.$request->getParameter('iti').'&p_id='.$this->person->getId());
	        }
	
	        if($request->hasParameter('contact')){	          
	          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add contact!');
	          $this->redirect('@contact_create?person_id='.$this->person->getId());
	        }
	        $this->getUser()->setFlash('success', 'Person information has been successfully saved!');	
	        $last = $request->getParameter('back');	
	        $referer_session = $this->getUser()->getAttribute('ref');
                
	        
	       //$back_url = '@person_view?id='.$this->person->getId();
	       //$this->redirect($back_url);
               //$this->person_a = $this->person_form->getValue('first_name').' '. $this->person_form->getValue('last_name');
	       //return $this->renderText('Person information has been successfully saved!');
	       //return $this->renderText($this->person_form->getValue('first_name').' '. $this->person_form->getValue('last_name'));
	       $this->personpass_id = $this->person->getId();           
           $this->_passenger = PassengerPeer::getByPersonId($this->personpass_id);
           $this->personpass_last_name = $this->person->getLastName();
                //echo $this->person->getId();
               //$this->person_a = $this->person_form->getValue('first_name').' '. $this->person_form->getValue('last_name');
	      }else {
                if($request->getParameter("per[title]") == ""){
                    $this->titleError = "true";
                }
                if($request->getParameter("per[first_name]") == ""){
                    $this->first_name_error = "true";
                }
                if($request->getParameter("per[last_name]") == ""){
                    $this->last_name_error = "true";
                }
              }
             $this->person_form__= $request->getRequestParameters();             
             $this->setTemplate("ajaxAddPersonAndPassenger");
	    }else{
	      # Set referer URL
	      $this->person_referer = $request->getReferer() ? $request->getReferer() : '@person';
	    }
	    
  }
  protected function getGroundAddresses()
  {
    return sfConfig::get('app_ground_address_type', array());
  }
  /**
   * Show Itinerary details
   * CODE: itinerary_view
  */
  
  public function executeDetail(sfWebRequest $request)
  { 
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
   
    $this->orginset='';
    $this->destset='';
    $this->orgintset='';
    $this->desttset='';
    
    if($request->getParameter('add_passengers'))
    {
      $this->group_camp_id = $request->getParameter('add_passengers');
    }
    $this->mission;
    $this->mission2;
    $mission;
    $mission2;
    $this->ground_addr_sel = sfConfig::get('app_ground_address_type', array());
    $this->errors = array();
    $this->errors2 = array();

    if($request->getParameter('id'))
    {
      $this->itinerary = ItineraryPeer::retrieveByPK($request->getParameter('id'));
      $this->back = $request->getReferer();
      //echo $this->itinerary->getId();
      if(strstr($this->back,'/mission/view')){
          $this->frommission = 1;
      }
      else $this->frommission = 0;

      $this->mis  = MissionPeer::getMissionByItineraryId($this->itinerary->getId(), 1);
      $mission = $this->mis;

      /*echo "<pre>";
      print_r($this->mis);
      echo "</pre>";
      die("ok");
      */
      
      $this->mission = $mission;
      //print_r($mission);      exit ();

      ///Show leges
      if(isset($mission)) $this->mis_legs = MissionLegPeer::getbyMissId($mission->getId());
 
      //echo "<pre>";
      //print_r($this->mis_legs);
      //echo $this->itinerary->getId();
      $this->mis2 = MissionPeer::getMissionByItineraryId($this->itinerary->getId(), 2);
      /*
      echo "<pre>";
      print_r($this->mis2);
      echo "</pre>";
      die("ok");
      */
      
      
      $mission2 = $this->mis2;
      

      $this->mission2 = $mission2;
      $this->ground_addresses = array('patient' => '', 'facility' => '', 'lodging' => '', 'airport' => '');
      $pass;
      $this->personnew;
      if ($this->itinerary)
      {
        $this->ground_addresses['lodging'] = $this->ground_addresses['facility'] = $this->itinerary->getDestCity().', '.$this->itinerary->getDestState();
        $pass = PassengerPeer::retrieveByPK($this->itinerary->getPassengerId());
        $this->personnew = PersonPeer::retrieveByPK($pass->getPersonId());
      }

      if ($pass)
      {
        $this->ground_addresses['lodging'] = $pass->getLodgingName().' '.$this->ground_addresses['lodging'];
        $this->ground_addresses['facility'] = $pass->getFacilityName().' '.$this->ground_addresses['facility'];
        $this->ground_addresses['patient'] = $this->personnew->getAddress1().' '
                .$this->personnew->getAddress2().' '
                .$this->personnew->getCity().', '
                .$this->personnew->getState().' '
                .$this->personnew->getZipcode();
        $this->ground_addresses['airport'] = $this->personnew->getAddress1().' '
                .$this->personnew->getAddress2().' '
                .$this->personnew->getCity().', '
                .$this->personnew->getState().' '
                .$this->personnew->getZipcode();
      }
    }
    
    if($request->isMethod('post'))
    {
      if($request->getParameter('com'))
      {
        if($request->getParameter('com')==1)
        {
          $mission->setComment($request->getParameter('mis_comment'));
          $mission->save();
        }
        elseif($request->getParameter('com')==2)
        {
          $mission2->setComment($request->getParameter('mist_comment'));
          $mission2->save();
        }
        $this->getUser()->setFlash('success', 'Comment successfully saved.');
      }
      else
      {
        if($request->getParameter('misstsave')==1)
        {
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':               
              $origin_airports = (array)$request->getParameter('origint_idents');
              $dest_airports = (array)$request->getParameter('destinationt_idents');
              $idents = $dest_airports;
              $tmp_arr = array();
              foreach ($origin_airports as $i => $ident)
              {
                $idents[] = $ident;
                $v = $ident.' to '.$dest_airports[$i];
                if (in_array($v, $tmp_arr))
                {
                  $this->errors2[] = 'Leg '.$v.' appeared more than one';
                }else
                {
                  $tmp_arr[] = $v;
                }
                if ($dest_airports[$i] == $ident) $this->errors2[] = 'Leg '.$ident.' to '.$dest_airports[$i].' is invalid';
              }
              $idents = array_unique($idents);
              $c = new Criteria();
              $c->add(AirportPeer::IDENT, $idents, Criteria::IN);
              if (count($idents) != AirportPeer::doCount($c))
              {
                $this->errors2[] = 'Some airport idents are invalid';
              }
              break;
            case 'ground_mission':
              $origin = $request->getParameter('groundt_origin');
              $destination = $request->getParameter('groundt_destination');
              $orgintset = $request->getParameter('orgintset');
              $desttset = $request->getParameter('desttset');
              $this->desttset = $desttset;
              $this->orgintset = $orgintset;
              if (empty($destination) && empty($desttset)) $this->errors2[] = 'Please specify destination address';
              if (empty($origin) && empty($orgintset))
              {
                $this->errors2[] = 'Please specify origin address';
              }elseif ($destination == $origin && $destination!='')
              {
                $this->errors2[] = 'Origin and Destination addresses conflict';
              }
              break;
            case 'commercial_mission':
              $mission_date = $request->getParameter('mission_date');
              if (empty($mission_date)) $this->errors2[] = 'Mission date is required';
              if ($v = $request->getParameter('airline_id'))
              {
                $custom = $request->getParameter('airline_custom');
                if ($v == 'other')
                {
                  if (empty($custom)) $this->errors2[] = 'Please type a new airline name!';
                }else
                {
                  $airline = AirlinePeer::retrieveByPK($v = $request->getParameter('airline_id'));
                  if (!($airline instanceof Airline)) $this->errors2[] = 'Please select airline!';
                }
              }
              else
              {
                $this->errors2[] = 'Please select airline!';
              }
              break;
            default:
              $this->errors2[] = 'Please select Transportation Type';
          }

        if (count($this->errors2))
        {
          # error in form
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':
              $this->origin_idents = $origin_airports;
              $this->dest_idents = $dest_airports;
              break;
            case 'ground_mission':
              break;
            case 'commercial_mission':
              break;
          }

          $this->erer = 2;

        }
        else
        {
          $missioncount = MissionLegPeer::getMaxLegNumber($mission2->getId());
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':
              $aircount = MissionLegPeer::getCountbyMissIdAndType($mission2->getId(), 'air_mission');
              for($i=0; $i<sizeof($origin_airports); $i++)
              {
                $airport_o = AirportPeer::getByIdent($origin_airports[$i]);
                $airport_d = AirportPeer::getByIdent($dest_airports[$i]);
                $missioncount++;
                $aircount++;
                $mission_leg = new MissionLeg();
                $mission_leg->setMissionId($mission2->getId());
                $mission_leg->setLegNumber($missioncount);
                $mission_leg->setFromAirportId($airport_o->getId());
                $mission_leg->setToAirportId($airport_d->getId());
                $mission_leg->setPrefix('air'.$aircount);
                //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
                //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
                $mission_leg->setPassOnBoard(0);
                $mission_leg->setTransportation('air_mission');
                $mission_leg->setCancelMissionLeg(1);
                $mission_leg->save();
              }
              $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
              return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              break;
            case 'ground_mission':
              $groundcount = MissionLegPeer::getCountbyMissIdAndType($mission2->getId(), 'ground_mission');
              $mission_leg = new MissionLeg();
              $orgintsetsave = $request->getParameter('groundt_origin');
              if(empty ($orgintsetsave)){$orgintsetsave=$request->getParameter('orgintset');
              }
              $desttsetsave = $request->getParameter('groundt_destination');
              if(empty ($desttsetsave)){$desttsetsave=$request->getParameter('desttset');
              }
              $groundcount++;
              $sas = $missioncount+1;
              $mission_leg->setMissionId($mission2->getId());
              $mission_leg->setLegNumber($sas);
              $mission_leg->setPassOnBoard(0);
              $mission_leg->setTransportation('ground_mission');
              $mission_leg->setGroundOrigin($orgintsetsave);
              $mission_leg->setGroundDestination($desttsetsave);
              $mission_leg->setPrefix('g'.$groundcount);
              $mission_leg->setCancelMissionLeg(1);
              $mission_leg->save();
              $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
              return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              break;
            case 'commercial_mission':
              $comcount = MissionLegPeer::getCountbyMissIdAndType($mission2->getId(), 'commercial_mission');
              $flight_time = $request->getParameter('flight_time');
              if (empty($flight_time['hour']) || empty($flight_time['minute'])) $flight_time = null;
              $airline_id = $request->getParameter('airline_id');
              if ($airline_id == 'other')
              {
                $airline = new Airline();
                $airline->setName($request->getParameter('airline_custom'));
                $airline->save();
              }
              else
              {
                $airline = AirlinePeer::retrieveByPK($airline_id);
                $this->forward404Unless($airline);
              }
              $origins = $request->getParameter('origin');
              $destinations = $request->getParameter('destination');
              $flight_numbers = $request->getParameter('flight_number');
              $departures = $request->getParameter('departure');              
              $arrivals = $request->getParameter('arrival');
              $mission->setFlightTime($flight_time['hour'].':'.$flight_time['minute'].' '.$flight_time['period']);
              $missioncount++;
              $n_leg = $missioncount;
              foreach ($origins as $i => $origin)
              {
                if (empty($origin) || empty($destinations[$i])) continue;
                $mission_leg = new MissionLeg();
                $comcount++;
                $mission_leg->setMissionId($mission2->getId());
                $mission_leg->setLegNumber($n_leg++);
                $mission_leg->setFlightTime($flight_time ? strtotime($flight_time['hour'].':'.$flight_time['minute'].' '.$flight_time['period']) : null);
                //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
                //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
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
                $mission_leg->setPrefix('com'.$comcount);
                $mission_leg->setCancelMissionLeg(1);
                $mission_leg->save();
                $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
                return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              }
              break;
          }
        }
        }else
        {
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':
              $origin_airports = (array)$request->getParameter('origin_idents');
              $dest_airports = (array)$request->getParameter('destination_idents');
              $idents = $dest_airports;
              $tmp_arr = array();
              foreach ($origin_airports as $i => $ident)
              {
                $idents[] = $ident;
                $v = $ident.' to '.$dest_airports[$i];
                if (in_array($v, $tmp_arr))
                {
                  $this->errors[] = 'Leg '.$v.' appeared more than one';
                }else
                {
                  $tmp_arr[] = $v;
                }
                if ($dest_airports[$i] == $ident) $this->errors[] = 'Leg '.$ident.' to '.$dest_airports[$i].' is invalid';
              }
              $idents = array_unique($idents);
              $c = new Criteria();
              $c->add(AirportPeer::IDENT, $idents, Criteria::IN);
              if (count($idents) != AirportPeer::doCount($c))
              {
                $this->errors[] = 'Some airport idents are invalid';
              }
              break;
            case 'ground_mission':
              $origin = $request->getParameter('ground_origin');
              $destination = $request->getParameter('ground_destination');
              //echo $destination; die();
              $orginset = $request->getParameter('orginset');
              $destset = $request->getParameter('destset');
              $this->destset = $destset;
              $this->orginset = $orginset;
              if (empty($destination) && empty($destset)) $this->errors[] = 'Please specify destination address';
              if (empty($origin) && empty($orginset))
              {
                $this->errors[] = 'Please specify origin address';
              }elseif ($destination == $origin && $destination!='')
              {
                $this->errors[] = 'Origin and Destination addresses conflict';
              }
              break;
            case 'commercial_mission':
              $mission_date = $request->getParameter('mission_date');
              if (empty($mission_date)) $this->errors[] = 'Mission date is required';
              if ($v = $request->getParameter('airline_id'))
              {
                $custom = $request->getParameter('airline_custom');
                if ($v == 'other')
                {
                  if (empty($custom)) $this->errors[] = 'Please type a new airline name!';
                }else
                {
                  $airline = AirlinePeer::retrieveByPK($v = $request->getParameter('airline_id'));
                  if (!($airline instanceof Airline)) $this->errors[] = 'Please select airline!';
                }
              }else
              {
                $this->errors[] = 'Please select airline!';
              }
              break;
            default:
              $this->errors[] = 'Please select Transportation Type';
          }
        

        if (count($this->errors))
        {
          # error in form
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':
              $this->origin_idents = $origin_airports;
              $this->dest_idents = $dest_airports;
              break;
            case 'ground_mission':
              break;
            case 'commercial_mission':
              break;
          }

        }else
        {
          $missioncount = MissionLegPeer::getMaxLegNumber($mission->getId());
          switch ($request->getParameter('transportation'))
          {
            case 'air_mission':             
              $aircount = MissionLegPeer::getCountbyMissIdAndType($mission->getId(), 'air_mission');
              for($i=0; $i<sizeof($origin_airports); $i++)
              {
                $airport_o = AirportPeer::getByIdent($origin_airports[$i]);
                $airport_d = AirportPeer::getByIdent($dest_airports[$i]);
                $missioncount++;
                $aircount++;
                $mission_leg = new MissionLeg();
                $mission_leg->setMissionId($mission->getId());
                $mission_leg->setLegNumber($missioncount);
                $mission_leg->setFromAirportId($airport_o->getId());
                $mission_leg->setToAirportId($airport_d->getId());
                $mission_leg->setPrefix('air'.$aircount);
                //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
                //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
                $mission_leg->setPassOnBoard(0);
                $mission_leg->setTransportation('air_mission');
                $mission_leg->setCancelMissionLeg(1);
                $mission_leg->save();
              }
              $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
              return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              break;
            case 'ground_mission':
              $groundcount = MissionLegPeer::getCountbyMissIdAndType($mission->getId(), 'ground_mission');
              $mission_leg = new MissionLeg();
              $orginsetsave = $request->getParameter('ground_origin');
              if(empty ($orginsetsave)){$orginsetsave=$request->getParameter('orginset');
              }
              $destsetsave = $request->getParameter('ground_destination');
              if(empty ($destsetsave)){$destsetsave=$request->getParameter('destset');
              }
              $groundcount++;
              $missioncount++;
              $sa = $missioncount;
              $mission_leg->setMissionId($mission->getId());
              $mission_leg->setLegNumber($sa);
              $mission_leg->setPassOnBoard(0);
              $mission_leg->setTransportation('ground_mission');
              $mission_leg->setGroundOrigin($orginsetsave);
              $mission_leg->setGroundDestination($destsetsave);
              $mission_leg->setPrefix('g'.$groundcount);
              $mission_leg->setCancelMissionLeg(1);
              $mission_leg->save();
              $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
              return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              break;
            case 'commercial_mission':
              $comcount = MissionLegPeer::getCountbyMissIdAndType($mission->getId(), 'commercial_mission');
              $flight_time = $request->getParameter('flight_time');
              if (empty($flight_time['hour']) || empty($flight_time['minute'])) $flight_time = null;
              $airline_id = $request->getParameter('airline_id');
              if ($airline_id == 'other')
              {
                $airline = new Airline();
                $airline->setName($request->getParameter('airline_custom'));
                $airline->save();
              }else
              {
                $airline = AirlinePeer::retrieveByPK($airline_id);
                $this->forward404Unless($airline);
              }
              $origins = $request->getParameter('origin');
              $destinations = $request->getParameter('destination');
              $flight_numbers = $request->getParameter('flight_number');
              $departures = $request->getParameter('departure');
              $arrivals = $request->getParameter('arrival');
              $mission->setFlightTime($flight_time['hour'].':'.$flight_time['minute'].' '.$flight_time['period']);
              $missioncount++;
              $n_leg = $missioncount;
              foreach ($origins as $i => $origin)
              {
                if (empty($origin) || empty($destinations[$i])) continue;
                $mission_leg = new MissionLeg();
                $comcount++;
                $mission_leg->setMissionId($mission->getId());
                $mission_leg->setLegNumber($n_leg++);
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
                $mission_leg->setPrefix('com'.$comcount);
                $mission_leg->setCancelMissionLeg(1);
                $mission_leg->save();
                $this->getUser()->setFlash('success','Mission and Leg #'.$mission_leg->getMissionId().'-'.$mission_leg->getLegNumber().' has successfully created!');
                return $this->redirect('/itinerary/detail/' . $this->itinerary->getId());
              }
              break;
          }
        }
        }
      }
    }

    if($request->getParameter('id'))
    {
     //$this->itinerary = ItineraryPeer::retrieveByPK($request->getParameter('id'));
     //$this->mis  = MissionPeer::getMissionByItineraryId($this->itinerary->getId(), 'Home');
     //$mission = $this->mis;
     if(isset($mission)){
        $this->mis_comment = $mission->getComment();
     }
     //$this->mis_legs = MissionLegPeer::getbyMissId($mission->getId());

     if($mission2)
      {
        $this->mis2_legs = MissionLegPeer::getbyMissId($mission2->getId());
        $this->mist_comment = $mission2->getComment();
      }
    
      
      $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
      $this->time_widget = new widgetFormTime();
      $this->airport_list = AirportPeer::getMappable();
      $this->ground_addresses = $this->getGroundAddresses();
      $this->airlines = AirlinePeer::doSelect(new Criteria());
      $this->funds = FundPeer::doSelect(new Criteria());
      $this->miss_ids = array();
      $c = 0;
      $count = 0;
      $count2 = 0;
      if(isset($this->itinerary))
      {
        $this->missions = MissionPeer::getByItiId($this->itinerary->getId());
        if(isset($this->missions))
        {
          foreach ($this->missions as $mi)
          {
            $this->miss_ids[$c] = $mi->getId();
            $legs = MissionLegPeer::getbyMissId($mi->getId());
          }
        }
      }
      $this->title = '#'.$this->itinerary->getId().' Itinerary Details';
    }
  }

  /**
   * Delete Itinerary
   * CODE: itinerary_delete
   */

  public function executeDelete(sfWebRequest $request)
  {
    #TODO security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $request->checkCSRFProtection();

    $this->forward404Unless($itinerary = ItineraryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object itinerary does not exist (%s).', $request->getParameter('id')));

    //check for foreign key constraint
    if($itinerary->countMissions() > 0)
    {
      $this->getUser()->setFlash('warning', 'Object itinerary is used by other objects. You cannot delete it!');
      $this->redirect('itinerary/index');
    }

    $itinerary->delete();

    $this->getUser()->setFlash('success', 'Itinerary informatiion has been deleted successfully.');
    $this->redirect('itinerary/index');

  }

  /**
   * cancel Itinerary
   * CODE: itinerary_delete
   */

  public function executeCancelItinerary(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->forward404Unless($itinerary = ItineraryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object itinerary does not exist (%s).', $request->getParameter('id')));
    $itinerary = ItineraryPeer::retrieveByPk($request->getParameter('id'));
    
    if($this->getRequest()->isXmlHttpRequest())
    {
        $itId = $request->getParameter('id');
        $final_mails = $this->filterAllMailsFromSubmittedData($request);
        
        $itinerary->setCancelItinerary(0);
        $text = 'Itinerary '.$itId.' has been cancelled. Regards, Angel Flight West';
        $itinerary->save();
        $this->getComponent('mail', 'itinerary_Mission_MissionLegCancel', array(
           'email' => $final_mails,
           'subject' => 'Angel Flight West Itinerary cancel information',
           'text' => $text
        ));

        $this->getUser()->setFlash('success', 'The itinerary '.$itinerary->getId().' has been cancelled successfully.');
        //$this->redirect('itinerary/index');
        return $this->renderText('success');
    }

    //$request->checkCSRFProtection();
    /*$itinerary = ItineraryPeer::retrieveByPk($request->getParameter('id'));
    $misall = MissionPeer::getAllMissionByItineraryId($request->getParameter('id'));
    $countMission = MissionPeer::getMissionByItineraryIdCount($request->getParameter('id'));

    if(isset($itinerary)){
      //Fetch email addresses for staffs related to missions of that itinerary
      $receivers = array();
      $receivers = retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToItinerary($itinerary);
      
        if(isset($countMission)){
            foreach($misall as $misc){
                $mLegs = MissionLegPeer::getAllMissionLegByMissionId($misc->getId());
                //$countLeg = MissionLegPeer::getMissionLegByMissionIdCount($misc->getId());
                if(count($mLegs)){
                    foreach($mLegs as $ml){
                        $ml->setCancelMissionLeg(0);
                        $ml->save();
                        
                        // Fetch email addresses for staffs related to mission legs of that mission
                        $receivers = array_merge($receivers,retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToMissionLeg($ml));
                    }
                }
                $misc->setCancelMission(0);
                $misc->save();               

                // Fetch email addresses for staffs related to missions of that itinerary
                $receivers = array_merge($receivers, retrieveEmailAddressesRelatedToItinerary::getEmailAddressesOfPersonsRelatedToMission($misc));
            }
        }*/
        /*$itinerary->setCancelItinerary(0);
        $text = 'Itinerary '.$itinerary->getId().' has been cancelled. Regards, Angel Flight West';
        $itinerary->save();
        $this->getComponent('mail', 'itinerary_Mission_MissionLegCancel', array(
           'email' => array_unique($receivers),
           'subject' => 'Angel Flight West Itinerary cancel information',
           'text' => $text
        ));*/
        //echo count($receivers); echo '<pre>';print_r(array_unique($receivers));exit;
    /*}*/
  }

  public function executeAutoCompletePassenger()
  {
    $this->keyword = $this->getRequestParameter('pass_name');
    $this->persons = PersonPeer::getFirstNames($this->keyword, 'itiPass');
    $this->setLayout(false);
  }

  public function executeAutoCompleteRequester()
  {
    $this->keyword = $this->getRequestParameter('req_name');
    $this->persons =PersonPeer::getFirstNames($this->keyword, 'itiReq');
    $this->setLayout(false);
  }
  public function executeAutoCompletePassengerLast()
  {
    $this->keyword = $this->getRequestParameter('pass_lname');
    $this->persons = PersonPeer::getLastNames($this->keyword, 'itiPass');
    $this->setLayout(false);
  }

  public function executeAutoCompleteRequesterLast()
  {
    $this->keyword = $this->getRequestParameter('req_lname');
    $this->persons =PersonPeer::getLastNames($this->keyword, 'itiReq');
    $this->setLayout(false);
  }

  public function executeAutoCompleteFacility()
  {
    $this->keyword = $this->getRequestParameter('facility');
    $this->persons =PassengerDestPeer::getFacility($this->keyword, $this->getRequestParameter('passId'));
    $this->setLayout(false);
  }

  public function executeAutoCompleteLodging()
  {
    $this->keyword = $this->getRequestParameter('lodging');
    $this->persons =PassengerDestPeer::getLodging($this->keyword, $this->getRequestParameter('passId'));
    $this->setLayout(false);
  }

  public function executeUpdateFacLodAjax(sfWebRequest $request)
  {
    $passenger_id = $request->getParameter('faclodpassid');
    $this->passid = $passenger_id;
    //echo $passenger_id; die();
    $this->passenger = PassengerPeer::retrieveByPK($passenger_id);
    $passenger = $this->passenger;
    $this->setLayout(false);
    $facandlod = new PassengerDest();
    $this->form6 = new PassengerDestForm($facandlod);
    $this->back = $request->getReferer();

    if ($request->isMethod('post'))
    {

      $this->referer = $request->getReferer();
      $this->form6->bind($request->getParameter('passDest'));
      $this->form6->isValid();
    //foreach ($this->form6->getGlobalErrors() as $name => $error){
    //echo $name.': '.$error.'<br/>';
    //}
    //var_dump($this->form6->getErrorSchema()->getErrors());
    //die();
      if ($this->form6->isValid() && $passenger_id)
      {
        $passenger->setFacilityName($this->form6->getValue('facility'));
        $passenger->setLodgingName($this->form6->getValue('lodging'));
        $passenger->setFacilityPhone($this->form6->getValue('fac_phone'));
        $passenger->setFacilityPhoneComment($this->form6->getValue('facility_phone_comment'));
        $passenger->setLodgingPhone($this->form6->getValue('lod_phone'));
        $passenger->setLodgingPhoneComment($this->form6->getValue('lod_phone_comment'));
        $passenger->setFacilityCity($this->form6->getValue('facility_city'));
        $passenger->setFacilityState($this->form6->getValue('facility_state'));
        $passenger->save();

        $this->form6->getObject()->setPassengerId($passenger_id);
        $this->form6->save();
        /*
        $facandlod->setPassengerId($passenger_id);
        $facandlod->setLodging($this->form6->getValue('lodging_name'));
        //echo $this->form6->getValue('lodging_phone'); die();
        $facandlod->setLodgingPhone($this->form6->getValue('lodging_phone'));
        $facandlod->setLodgingPhoneComment($this->form6->getValue('lodging_phone_comment'));
        $facandlod->setFacility($this->form6->getValue('facility_name'));
        $facandlod->setFacilityPhone($this->form6->getValue('facility_phone'));
        $facandlod->setFacilityPhoneComment($this->form6->getValue('facility_phone_comment'));
        $facandlod->setFacilityCity($this->form6->getValue('facility_city'));
        $facandlod->setFacilityState($this->form6->getValue('facility_state'));
        $facandlod->save();
        */

        $content = array('lodging' => '', 'facility' => '', 'lodging_phone'=>'', 'facility_phone'=>'', 'lodging_phone_comment'=>'', '	facility_phone_comment'=>'', '	facility_city'=>'', 'facility_state'=>'');

        if ($passenger)
        {
          $content['lodging'] = $passenger->getLodgingName();
          $content['facility'] = $passenger->getFacilityName();
          $content['lodging_phone'] = $passenger->getLodgingPhone();
          $content['facility_phone'] = $passenger->getFacilityPhone();
          $content['lodging_phone_comment'] = $passenger->getLodgingPhoneComment();
          $content['facility_phone_comment'] = $passenger->getFacilityPhoneComment();
          $content['facility_city'] = $passenger->getFacilityCity();
          $content['facility_state'] = $passenger->getFacilityState();
        }
        $data = array('html' => false, 'content' => $content);
        return $this->renderText(json_encode($data));
      }
    }
    $data = array('html' => true);
    $data['content'] = $this->renderPartial('updateFacLodAjaxSuccess',
            array(
            'passid' => $passenger_id,
            'passenger' => $this->passenger,
            'form6' => $this->form6,
            'back' => $this->back,
    ));
    return $this->renderText(json_encode($data));
  }
  public function executeAjaxAddNewRequesterAgency(sfWebRequest $request){
       $agency = new Agency();
       $this->agency_title = 'Add Agency';
       $this->agency_form = new AgencyForm($agency);
       if ($request->isMethod('post')) {
         $this->processForm($request, $this->agency_form);
       }
       
  }
  protected function processForm(sfWebRequest $request, AgencyForm $form)
  {

    $form->bind($request->getParameter('agency'));

    if ($form->isValid())
    { 
      $agency =  new Agency();
      $agency->setName($form->getValue('name'));
      $agency->setAddress1($form->getValue('address1'));
      $agency->setAddress2($form->getValue('address2'));
      $agency->setCity($form->getValue('city'));
      $agency->setCounty($form->getValue('county'));
      $agency->setState($form->getValue('state'));
      $agency->setCountry($form->getValue('country'));
      $agency->setZipcode($form->getValue('zipcode'));
      $agency->setPhone($form->getValue('phone'));
      $agency->setComment($form->getValue('comment'));
      $agency->setFaxPhone($form->getValue('fax_phone'));
      $agency->setFaxComment($form->getValue('fax_comment'));
      $agency->setEmail($form->getValue('email'));
      
      if ($agency->isNew()) {
        $content = $this->getUser()->getName().' added new Agency: '.$agency->getName();
        ActivityPeer::log($content);
      }
     
      $agency->save();
      //exit;
      $this->new_requester_agency_id = $agency->getId();
      $this->new_requester_agency_name = $form->getValue('name');
    }
  }
  public function executeReverse(sfWebRequest $request)
  {

    $mis1 = MissionPeer::retrieveByPK($request->getParameter('miss_id'));
    $itine_id = $mis1->getItineraryId();
    $mis2 = MissionPeer::retrieveByPK($request->getParameter('mis2_id'));
    $mis1_legs = MissionLegPeer::getbyDesOrderMissId($request->getParameter('miss_id'));
    $legnumber = 1;
    $comcount = 1;
    $aircount = 1;
    $groundcount = 1;
    foreach($mis1_legs as $mleg){
      $type = $mleg->getTransportation();
      switch($type){
         case 'air_mission':
            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($mis2->getId());
            $mission_leg->setLegNumber($legnumber);
            $mission_leg->setFromAirportId($mleg->getToAirportId());
            $mission_leg->setToAirportId($mleg->getFromAirportId());
            $mission_leg->setPassOnBoard(0);
            $mission_leg->setTransportation('air_mission');
            $mission_leg->setPrefix('air'.$aircount);
            $mission_leg->setCancelMissionLeg(1);
            $mission_leg->save();
            $aircount++;
           break;
         case 'ground_mission':
            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($mis2->getId());
            $mission_leg->setLegNumber($legnumber);
            $mission_leg->setPassOnBoard(0);
            $mission_leg->setTransportation('ground_mission');
            $mission_leg->setGroundOrigin($mleg->getGroundDestination());
            $mission_leg->setGroundDestination($mleg->getGroundOrigin());
            $mission_leg->setPrefix('g'.$groundcount);
            $mission_leg->setCancelMissionLeg(1);
            $mission_leg->save();
            $groundcount++;
           break;
         case 'commercial_mission':
            $mission_leg = new MissionLeg();
            $mission_leg->setMissionId($mis2->getId());
            $mission_leg->setLegNumber($legnumber);
            $mission_leg->setFlightTime($mleg->getFlightTime());
            //$mission_leg->setBaggageDesc($request->getParameter('baggage_desc'));
            //$mission_leg->setBaggageWeight($request->getParameter('baggage_weight'));
            $mission_leg->setAirlineId($mleg->getAirlineId());
            $mission_leg->setFundId($mleg->getFundId());
            $mission_leg->setConfirmCode($mleg->getConfirmCode());
            $mission_leg->setFlightCost($mleg->getFlightCost());
            $mission_leg->setCommOrigin($mleg->getCommDest());
            $mission_leg->setCommDest($mleg->getCommOrigin());
            $mission_leg->setFlightNumber($mleg->getFlightNumber());
            $mission_leg->setDeparture($mleg->getDeparture());
            $mission_leg->setTransportation('commercial_mission');
            $mission_leg->setPrefix('com'.$comcount);
            $mission_leg->setCancelMissionLeg(1);
            $mission_leg->save();
            $comcount++;
           break;
      }
      $legnumber++;
    }
    $this->getUser()->setFlash('success', 'Successfully reverse.');

    $this->redirect('itinerary/detail?id='.$itine_id);
  }

  /**
  * 
  *  ziyed
  */
  public function executeUpdateAjax(sfWebRequest $request)
  {
   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $requester = new Requester();
    $this->requester = $requester;

    $this->form = new RequesterForm($requester);

    $this->back = $request->getReferer();

    $this->person_a_req = trim($this->getRequestParameter('person_a_req', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a_req', '*'));
    $this->agency = trim($this->getRequestParameter('agency', '*')) == '' ? '*' : trim($this->getRequestParameter('agency', '*'));

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('reqs'));

      if ($this->form->isValid() && $request->getParameter('person_id') && $request->getParameter('agency_id'))
      {
        $requester->setPersonId($request->getParameter('person_id'));
        $requester->setAgencyId($request->getParameter('agency_id'));
        $requester->setTitle($this->form->getValue('title'));
        $requester->setHowFindAf($this->form->getValue('how_find_af'));
        $requester->save();

        $person = $requester->getPerson();
        if(isset($person)){
          $name = $person->getId();
        }
        $this->man = $person;
        $this->requester_id = $requester->getId();
        $this->isSuccess = true;
        return sfView::SUCCESS;

      }else{
        if(!$request->getParameter('person_a_req') && !$request->getParameter('agency')){
          $this->person_needr = 1;
          $this->agency_need = 1;
        }elseif(!$request->getParameter('person_a_req')){
          $this->person_needr = 1;
        }elseif(!$request->getParameter('agency')){
          $this->agency_need = 1;
        }
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@requester';
    }
    $this->requester = $requester;  

  }
  public function executeUpdateAjaxCompanion(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    # id parameter is companion id which then edits
    if($request->hasParameter('id')) {
      $cmp = CompanionPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($cmp);
    }else{
      #new companion adding to existing passenger
      $cmpnnPid = $request->getParameter('campnn[passenger_id]');
      $cmp = new Companion();
      if(isset($cmpnnPid)){
            $cmp->setPassengerId($cmpnnPid);
      }
      else{
            $cmp->setPassengerId($request->getParameter('passenger_id'));
      }
    }
    
    $this->itId = $request->getParameter('itId');
    #referer
    if ($request->hasParameter('referer')) {
      $this->referer = $request->getParameter('referer');
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : $this->generateUrl('companion', array(), true);
    }

    $form = new CompanionForm($cmp);

    if($request->getParameter('back')){
       $this->back = $request->getParameter('back');
    }
    # validate and save
    if ($request->isMethod('post'))
    {
      $form->bind($request->getParameter($form->getName()));
      if ($form->isValid())
      {
        $is_new = $form->isNew();
        if($is_new){
          $person = new Person();
          $names = explode(" ", $form->getValue('name'));
          $person->setFirstName($names[0]);
          if(isset($names[1]))
              $person->setLastName($names[1]);
          else $person->setLastName(NULL);
          $person->setDayPhone($form->getValue('companion_phone'));
          $person->setDayComment($form->getValue('companion_phone_comment'));
          $person->save();
          $comp = $form->getObject();
          $comp->setName($form->getValue('name'));
          $comp->setRelationship($form->getValue('relationship'));
          $comp->setDateOfBirth($form->getValue('date_of_birth'));
          $comp->setWeight($form->getValue('weight'));
          $comp->setCompanionPhone($form->getValue('companion_phone'));
          $comp->setCompanionPhoneComment($form->getValue('companion_phone_comment'));
          $comp->setPersonId($person->getId());
          $comp->save();
        }else{
          $form->save();
        }
        
        $this->getUser()->setFlash('success', 'Companion has successfully '.($is_new ?'created':'saved').'!');
        $this->companion_saved = $form->getValue('name');
        $this->companion_id = $comp->getId();
        $this->relationship = $form->getValue('relationship');        
      }
    }

    $passenger = $cmp->getPassenger();
    $this->forward404Unless($passenger);
    $this->passenger = $passenger;

    $this->form_a = $form;
    $this->cmp = $cmp;
  }
  private function filterAllMailsFromSubmittedData(sfWebRequest $request)
  {
        $params = array();
        if($request->getParameter('passenger_mail')) $params = $request->getParameter('passenger_mail');
        if($request->getParameter('requester_mail')) $params = $request->getParameter('requester_mail');
        if($request->getParameter('agency_mail')) $params = $request->getParameter('agency_mail');
        
        if($request->getParameter('coordinator_mail')) $coordinator_mail = $request->getParameter('coordinator_mail');
        if(is_array($coordinator_mail)){
           $params = array_merge($params, $coordinator_mail);
        }

        if($request->getParameter('other_requester_mail')) $other_requester_mail = $request->getParameter('other_requester_mail');
        if(is_array($other_requester_mail)){
           $params = array_merge($params, $other_requester_mail);
        }

        if($request->getParameter('pilot_mail')) $pilot_mail = $request->getParameter('pilot_mail');
        if(is_array($pilot_mail)){
           $params = array_merge($params, $pilot_mail);
        }

        if($request->getParameter('copilot_mail')) $copilot_mail = $request->getParameter('copilot_mail');
        if(is_array($copilot_mail)){
           $params = array_merge($params, $copilot_mail);
        }

        if($request->getParameter('miss_assis_mail')) $miss_assis_mail = $request->getParameter('miss_assis_mail');
        if(is_array($miss_assis_mail)){
           $params = array_merge($params, $miss_assis_mail);
        }

        if($request->getParameter('backup_pilot_mail')) $backup_pilot_mail = $request->getParameter('backup_pilot_mail');
        if(is_array($backup_pilot_mail)){
           $params = array_merge($params, $backup_pilot_mail);
        }

        if($request->getParameter('backup_copilot_mail')) $backup_copilot_mail = $request->getParameter('backup_copilot_mail');
        if(is_array($backup_copilot_mail)){
           $params = array_merge($params, $backup_copilot_mail);
        }

        if($request->getParameter('backup_miss_assis_mail')) $backup_miss_assis_mail = $request->getParameter('backup_miss_assis_mail');
        if(is_array($backup_miss_assis_mail)){
           $params = array_merge($params, $backup_miss_assis_mail);
        }

        if($request->getParameter('pilot_aircraft_mail')) $pilot_aircraft_mail = $request->getParameter('pilot_aircraft_mail');
        if(is_array($pilot_aircraft_mail)){
           $params = array_merge($params, $pilot_aircraft_mail);
        }

        if($request->getParameter('ref_contact_mail')) $ref_contact_mail = $request->getParameter('ref_contact_mail');
        if(is_array($ref_contact_mail)){
           $params = array_merge($params, $ref_contact_mail);
        }

        if(is_array($params)) $unique_array = array_unique($params);
        $receivers = array();
        foreach($unique_array as $u)
            {
                if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $u)){
                    $receivers[] = $u;
                }
            }
        
        return $receivers;
  }
}