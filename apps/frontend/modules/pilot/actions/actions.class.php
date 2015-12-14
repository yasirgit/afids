<?php
/**
 * pilot actions.
 *
 * @package    angelflight
 * @subpackage pilot
 * @author     Javzaa, Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pilotActions extends sfActions
{
  /**
   * Searches for pilot
   * CODE: pilot_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->addRecentItem('Pilot', 'pilot', 'pilot/index');
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = PilotPeer::getPager(
        $this->max,
        $this->page,
        $this->firstname,
        $this->lastname,
        $this->city,
        $this->state,
        $this->wing_name,
        $this->flight_status,
        $this->available,
        $this->identifier,
        $this->ifr_rated,
        $this->n_number,
        $this->make,
        $this->model,
        $this->hseat_status,
        $this->transplant
        );
        $this->pilots = $this->pager->getResults();
    }
  }

  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('pilot', array(), 'pilot');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['wing_name'])) $params['wing_name'] = null;
    if (!isset($params['flight_status'])) $params['flight_status'] = null;
    if (!isset($params['available'])) $params['available'] = null;
    if (!isset($params['identifier'])) $params['identifier'] = null;
    if (!isset($params['ifr_rated'])) $params['ifr_rated'] = null;
    if (!isset($params['n_number'])) $params['n_number'] = null;
    if (!isset($params['make'])) $params['make'] = null;
    if (!isset($params['model'])) $params['model'] = null;
    if (!isset($params['hseat_status'])) $params['hseat_status'] = null;
    if (!isset($params['transplant'])) $params['transplant'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->wings = WingPeer::getOnlyNames();
    $this->makes = AircraftPeer::getOnlyMakes();
    $this->models = AircraftPeer::getOnlyModels($request->getParameter('make'));
    $this->flight_statuses = sfConfig::get('app_flight_statuses');
    $this->countries = sfConfig::get('app_countries');

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['city']           = $request->getParameter('city');
      $params['state']           = $request->getParameter('state');
      $params['wing_name']           = $request->getParameter('wing_name');
      $params['flight_status']           = $request->getParameter('flight_status');
      $params['available']          = $request->getParameter('available');
      $params['identifier']         = $request->getParameter('identifier');
      $params['ifr_rated']       = $request->getParameter('ifr_rated');
      $params['n_number'] = $request->getParameter('n_number');
      $params['make'] = $request->getParameter('make');
      $params['model'] = $request->getParameter('model');
      $params['hseat_status'] = $request->getParameter('hseat_status');
      $params['transplant'] = $request->getParameter('transplant');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->wing_name      = $params['wing_name'];
    $this->flight_status  = $params['flight_status'];
    $this->available      = $params['available'];
    $this->identifier     = $params['identifier'];
    $this->ifr_rated      = $params['ifr_rated'];
    $this->n_number       = $params['n_number'];
    $this->make           = $params['make'];
    $this->model          = $params['model'];
    $this->hseat_status   = $params['hseat_status'];
    $this->transplant     = $params['transplant'];

    $this->getUser()->setAttribute('pilot', $params, 'pilot');
  }

  /**
   * Add/edit a pilot
   * CODE: pilot_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('member_id')){
      $this->member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
      $pilot = New Pilot();
      $this->title = 'Add Pilot';
    }

    if($request->getParameter('id')){
      $pilot =  PilotPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($pilot);

      ///ziyed////

      $this->url = $request->getReferer();
      if(strstr($this->url,'/pilot/mopAdd')){
        $this->title = 'Add mop pilot';
        $success = 'MOP information has been successfully added!';
      }else{
        $this->title = 'Edit pilot';
        $success = 'Pilot information has been successfully changed!';
        $this->current_region = $pilot->getMopRegionsServed();
        $this->mopservedby = $pilot->getMopServedBy();
      }
      
      ////end//////

      $this->member = MemberPeer::retrieveByPK($pilot->getMemberId());

      if($pilot->getPrimaryAirportId()){
        $this->airport_id = $pilot->getPrimaryAirportId();
      }
      $this->airports = AirportPeer::doSelect(new Criteria());
    }else{
      $pilot = New Pilot();
      $this->title = 'Add Pilot';
      $success = 'Pilot information has been successfully created!';
    }

    $this->airport = trim($this->getRequestParameter('airport', '*')) == '' ? '*' : trim($this->getRequestParameter('airport', '*'));

    if($request->getParameter('leg')){
      $this->leg_id = $request->getParameter('leg');
    }
    if($request->getParameter('back')){
      $this->backup = $request->getParameter('back');
    }
    if($request->getParameter('co')){
      $this->backup_co = $request->getParameter('co');
    }
    if($request->getParameter('member')){
      $this->member = MemberPeer::retrieveByPK($request->getParameter('member'));
    }

    $this->form = new PilotForm($pilot);
    $this->pilot = $pilot;
    $this->back =  $request->getReferer();
   
    ///////////////////Update ///////////
    if ($request->isMethod('post'))
    {        
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('pilo'));
      if ($this->form->isValid() && $this->form->getValue('license_type'))
      {
        if($request->getParameter('member_id')){
          $pilot->setMemberId($request->getParameter('member_id'));
        }

        //TODO:Set Member Flight status to command pilot

        $set_member = MemberPeer::retrieveByPK($request->getParameter('member_id'));

        if($set_member){
          $set_member->setFlightStatus('Command pilot');
          $set_member->save();
        }

        if($request->getParameter('airport') != null){
          $airport = AirportPeer::getByIdent($request->getParameter('airport'));
          if(isset($airport) && $airport instanceof Airport){
            $pilot->setPrimaryAirportId($airport->getId());
          }
        }else{
          $pilot->setPrimaryAirportId(null);
          $member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
          $member->setFlightStatus('Non-pilot');
          $member->save();
        }

        $pilot->setSecondaryHomeBases($this->form->getValue('secondary_home_bases'));
        $pilot->setTotalHours($this->form->getValue('total_hours'));
        $pilot->setLicenseType($this->form->getValue('license_type'));

        if($this->form->getValue('ifr') == null){
          $pilot->setIfr(0);
        }else{
          $pilot->setIfr($this->form->getValue('ifr'));
        }

        if($this->form->getValue('multi_engine') == null){
          $pilot->setMultiEngine(0);
        }else{
          $pilot->setMultiEngine($this->form->getValue('multi_engine'));
        }

        $pilot->setSeInstructor($this->form->getValue('se_instructor'));
        $pilot->setMeInstructor($this->form->getValue('me_instructor'));
        $pilot->setOtherRatings($this->form->getValue('other_ratings'));
        $pilot->setInsuranceReceived($this->form->getValue('insurance_received'));
        //ziyed task
        $pilot->setOrientedDate($this->form->getValue('oriented_date'));
        $pilot->setMopOrientedDate($this->form->getValue('mop_oriented_date'));
        if($request->getParameter('pilot_name')){
            $pilot->setMopServedBy($request->getParameter('pilot_name'));
        }else{
            $pilot->setMopServedBy(NULL);
        }

       // $pilot->setMopRegionsServed($request->getParameter('mop_regions_served'));

        if($request->getParameter('mop_regions_served')){
          $pilot->setMopRegionsServed($request->getParameter('mop_regions_served'));

        }else{
            $a = null;
            $pilot->setMopRegionsServed($a);
        }
        //$pilot->setOrientedMemberId($this->form->getValue('oriented_member_id'));
        //$pilot->setOrientedMemberId($this->form->getValue('mop_oriented_member_id'));        
        //$pilot->setMopQualifications($this->form->getValue('mop_qualifications'));

        $pilot->setHseats($this->form->getValue('hseats'));
        if($this->form->getValue('transplant') == 1 ){
          $pilot->setTransplant(1);
        }else{
          $pilot->setTransplant(0);
        }

        $pilot->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');

        $back_url = 'pilot';

        if(strstr($last,'member/view')){
          $back_url = '@member_view?id='.$request->getParameter('member_id');
        }elseif(strstr($last,'pilot/view')){
          $back_url = '@pilot_view?id='.$pilot->getId();
        }elseif(strstr($last,'pilot/edit')){
          $back_url = '@pilot_view?id='.$pilot->getId();
        }elseif(strstr($last,'pilot/mopAdd')){
            $back_url = '/pilot/mopAdd';
        }

        if($request->getParameter('leg_id')){
          $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
        }

        if($request->getParameter('leg_id')){
          if($request->getParameter('leg_id') && !$request->getParameter('backup')){
            $set_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
            if(isset($set_leg) && $set_leg instanceof MissionLeg){
              $set_leg->setPilotId($pilot->getId());
              $set_leg->save();
              $this->getUser()->setFlash('success','Mission Leg #'.$set_leg->getId() .' \s Pilot has been set!');
            }
            $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
          }
        }

        if($request->getParameter('leg_id')){
          if($request->getParameter('leg_id') && $request->getParameter('backup')){
            $set_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
            if(isset($set_leg) && $set_leg instanceof MissionLeg){
              $set_leg->setBackupPilotId($pilot->getId());
              $set_leg->save();
              $this->getUser()->setFlash('success','Mission Leg #'.$set_leg->getId() .' \s Backup Pilot has been set!');
            }
            $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
          }
        }

        if($request->getParameter('leg_id')){
          if($request->getParameter('leg_id') && $request->getParameter('backup_co')){
            $set_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
            if(isset($set_leg) && $set_leg instanceof MissionLeg){
              $set_leg->setBackupCopilotId($request->getParameter('member_id'));
              $set_leg->save();
              $this->getUser()->setFlash('success','Mission Leg #'.$set_leg->getId() .' \s Backup Co-Pilot has been set!');
            }
            $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
          }
        }
        return $this->redirect($back_url);
      }else{
        if(!$request->getParameter('id')){
          $info = 'Please confirm License type and choose Member !';
        }else{
          $info = 'Please confirm License type !';
        }
        $this->getUser()->setFlash('success', $info);
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@pilot';
    }
    $this->pilot = $pilot;
  }

  /**
   * Removes a pilot
   * CODE: pilot_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete'))
    {
      $request->checkCSRFProtection();
      $pilot = PilotPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($pilot);

      //check for foreign key constraint
      if($pilot->countMissionLegsRelatedByPilotId()>0){
    	  $this->getUser()->setFlash('warning', 'Object pilot is used by other objects.You cannot delete it!');
		    $this->redirect('pilot/index');
      }

      $pilot->delete();
      $this->getUser()->setFlash('success', 'Pilot information has been successfully deleted!');
    }
    
    $this->redirect('pilot/index');

    /*
    if($request->getReferer()){
      $back =$request->getReferer();
    }else{
      $back = '@pilot';
    }
    return $this->redirect($back);
    */
  }
  /**
   * CODE: pilot_view
   */
  public function executeView(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $pilot = PilotPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($pilot);


    $this->form = new PilotForm();

    $this->pilot = $pilot;
    $this->member = $pilot->getMember();

    # recent item
    $this->getUser()->addRecentItem('Pilot '.$this->member->getPerson()->getName(), 'pilot', 'pilot/view?id='.$pilot->getId());
  }

  /**
   * Add Pilot Aircraft
   * CODE: pilot_aircraft_create
   */
  public function executeAircraft(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('req')){
      $this->req_id = $request->getParameter('req');
    }
    if($request->getParameter('camp')){
      $this->camp_id = $request->getParameter('camp');
    }
    if($request->getParameter('leg')){
      $this->leg_id = $request->getParameter('leg');
    }
    if($request->getParameter('account')){
      $this->account = $request->getParameter('account');
    }

    $this->member = MemberPeer::getByPersonId($this->getUser()->getId());

    if($request->getParameter('member')){
      $this->member = MemberPeer::retrieveByPK($request->getParameter('member'));
    }

    if($this->member){
      $pilot = PilotPeer::getByMemberId($this->member->getId());
    }else{
      $this->getUser()->setFlash('success','You are not a member yet!');
      $this->redirect($request->getReferer());
    }

    if($request->getParameter('id')){
      $this->aircraft = PilotAircraftPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Pilot Aircraft';
    }else{
      $this->aircraft = new PilotAircraft();
      $this->title = 'Add New Pilot Aircraft';
    }

    $this->referer = $request->getReferer();
    $this->form = new PilotAircraftForm($this->aircraft);

    if($request->isMethod('post')){
      $this->referer = $request->getReferer();
      //echo $request->getParameter('a_id'); die;

      $taintedValues              = $request->getParameter('pilot_aircraft');
      $taintedValues['member_id'] = $request->getParameter('member_id');

      $this->form->bind($taintedValues);
      //$back = "";

      if($this->form->isValid() && $request->getParameter('pilot_aircraft[aircraft_id]') != 0){
        //        $member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
        //echo $this->form->getValue('aircraft_id'); die;
        $this->aircraft->setMemberId($request->getParameter('member_id'));
        $this->aircraft->setAircraftId($this->form->getValue('aircraft_id'));
        //$this->aircraft->setAircraftId(2);
        $this->aircraft->setNNumber($this->form->getValue('n_number'));

        if($this->form->getValue('own') == null){
          $this->aircraft->setOwn(0);
        }else{
          $this->aircraft->setOwn($this->form->getValue('own'));
        }

        if($this->form->getValue('seats') == null){
          $this->aircraft->setSeats(0);
        }else{
          $this->aircraft->setSeats($this->form->getValue('seats'));
        }

        if($this->form->getValue('known_ice')==null){
          $this->aircraft->setKnownIce(0);
        }else{
          $this->aircraft->setKnownIce($this->form->getValue('known_ice'));
        }
        $this->aircraft->save();
    
        if($request->getParameter('req_id')){
          $back = '@pilot_request?id='.$request->getParameter('req_id');
        }
        if($request->getParameter('camp_id')){
          $back = '@request_group_mission?id='.$request->getParameter('camp_id');
        }

        if($request->getParameter('referer')){
          $back = $request->getParameter('referer');
        }else{
          $back = $request->getReferer();
        }
        $this->getUser()->setFlash('success','Aircraft has successfully created!');

        if($request->getParameter('leg_id') && $request->getParameter('member_id')){

          $back = '@leg_edit?id='.$request->getParameter('leg_id');

        }else{
          $this->has_error = 1;
        }

        if($request->getParameter('account')){
          $back = 'account_pilot';
        }
        
        $this->redirect($back);
      }
    }
  }

  /**
   * Delete Pilot Aircraft
   * CODE: pilot_aircraft_delete
   */
  public function executeDeleteAir(sfWebRequest $request)
  {
   if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('id')){
      $pilot_aircraft = PilotAircraftPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($pilot_aircraft);
    }

    if($request->isMethod('post')){
      if(isset($pilot_aircraft) && $pilot_aircraft instanceof  PilotAirCraft ){
        $pilot_aircraft->delete();
        $this->redirect($request->getReferer());
      }
    }
  }
  /**
   * Edit Pilot's aircraft(s) from
   * CODE: pilot_aircraft_create
   */
  public function executeEditGroupAircraft(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('actions')){
      $this->ids = $request->getParameter('actions');
    }

    if($request->isMethod('post')){
      $pilot_a_ids =  $request->getParameter('all_pilot_ids');
      $air_ids =  $request->getParameter('all_air_ids');

      if(count($air_ids)){
        foreach ($air_ids as $id){
          if($id){
            $aircraft = AircraftPeer::retrieveByPK($id);
            if($request->getParameter('make'.$id)){
              $aircraft->setMake($request->getParameter('make'.$id));
            }
            if($request->getParameter('model'.$id)){
              $aircraft->setModel($request->getParameter('model'.$id));
            }
            if($request->getParameter('tail'.$id)){
              $aircraft->setTail($request->getParameter('tail'.$id));
            }
            $aircraft->save();
          }
        }
      }

      if(count($pilot_a_ids)){
        foreach ($pilot_a_ids as $id){
          $pilot_aircraft = PilotAircraftPeer::retrieveByPK($id);
          if(isset($pilot_aircraft) && $pilot_aircraft instanceof PilotAircraft ){
            if($request->getParameter('own'.$id)){
              if($request->getParameter('own'.$id) == 'on'){
                $pilot_aircraft->setOwn(1);
              }else{
                $pilot_aircraft->setOwn(0);
              }
            }

            if($request->getParameter('is_primary')){
              $p_aircraft =  PilotAircraftPeer::retrieveByPK($request->getParameter('is_primary'));
              $already_has_primary = PilotAircraftPeer::getHasPrimary();

              if(isset($p_aircraft) && $p_aircraft instanceof PilotAircraft){

                if(count($already_has_primary)){
                  foreach ($already_has_primary as $air){
                    if($air->getPrimary() != null){
                      $id_is = $air;
                    }
                  }
                  if($id_is->getId() != $p_aircraft->getId()){
                    $p_aircraft->setPrimary(1);
                    $id_is->setPrimary(0);
                    $p_aircraft->save();
                    $id_is->save();
                  }
                }else{
                  $p_aircraft->setPrimary(1);
                  $p_aircraft->save();
                }
              }
            }

            if($request->getParameter('n_number'.$id)){
              $pilot_aircraft->setNNumber($request->getParameter('n_number'.$id));
            }
            if($request->getParameter('seats'.$id)){
              $pilot_aircraft->setSeats($request->getParameter('seats'.$id));
            }
            if($request->getParameter('known'.$id)){
              if($request->getParameter('own'.$id) == 'on'){
                $pilot_aircraft->setKnownIce(1);
              }else{
                $pilot_aircraft->setKnownIce(0);
              }
            }
            $pilot_aircraft->save();
          }
        }
        $this->redirect('account_pilot');
      }

    }
  }
  /**
   * Remove Pilot's aircraft(s) from
   * CODE: pilot_aircraft_delete
   */
  public function executeRemoveGroupAircraft(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('actions')){
      $ids = $request->getParameter('actions');
    }
    foreach ($ids as $id){
      $aircraft = PilotAircraftPeer::retrieveByPK($id);
      if(isset($aircraft) && $aircraft instanceof PilotAircraft){
        $aircraft->delete();
      }
    }
    $this->getUser()->setFlash('success','Selected Pilot\'s are deleted!');
    $this->redirect('account_pilot');

  }

  public function executeMopDirectory(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    if($this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->Ispilot = 0;
    }
    else $this->Ispilot = 1;

    $max = sfConfig::get('app_max_mop_per_page', 10);
    $page = (int)$request->getParameter('page');

    $params = $this->getUser()->getAttribute('mop', array(), 'person');
    
    if ($request->hasParameter('wing_id')) $params['wing_id'] = (int)$request->getParameter('wing_id');
    if (!isset($params['wing_id'])) $params['wing_id'] = 1;
    $this->getUser()->setAttribute('mop', $params, 'person');    
    $this->wing_id = $params['wing_id'];
        
    if ($this->wing_id) {
      $this->pager = PilotPeer::getMopPager($this->wing_id, $max, $page ,0,$this->Ispilot);
      $this->pilots = $this->pager->getResults();
    }
    $this->wings = WingPeer::doSelect(new Criteria());
    
  }

  public function executeAjaxFilterEmail(sfWebRequest $request)
  {
    $this->flight_statuses = sfConfig::get('app_flight_statuses', array());
    $this->email_lists = EmailListPeer::doSelect(new Criteria());
    $this->wings = WingPeer::doSelect(new Criteria());
    $this->states = sfConfig::get('app_states');
  }

  public function executeWingslist(sfWebRequest $request)
  {
    $this->flight_statuses = sfConfig::get('app_flight_statuses', array());
    $this->email_lists = EmailListPeer::doSelect(new Criteria());
    $this->wings = WingPeer::doSelect(new Criteria());
    $this->states = sfConfig::get('app_states');
  }

  public function executeAjaxFilterEmailCount(sfWebRequest $request)
  {
    // filter and count
    $con = Propel::getConnection();
    $stmt = $this->ajaxFilterQuery($request, $con, 'COUNT(DISTINCT(pilot.id)) as count');
    $rs = $stmt->fetch(PDO::FETCH_OBJ);
    $count = $rs->count;

    return $this->renderText('Matching Pilots '.$count);
  }
  
  public function executeAjaxFilterEmailMatches(sfWebRequest $request)
  {
    // filter and count
    $con = Propel::getConnection();
    $stmt = $this->ajaxFilterQuery($request, $con, 'person.email');

    $emails = array();
    while($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
      if ($rs->email) $emails[] = $rs->email;
    }

    return $this->renderText(implode(', ', $emails));
  }

  /**
   * Selects from database by given select fields
   * Criteria will be matched from $request
   * @param sfWebRequest $request
   * @param PDO $pdo
   * @param string $select
   * @return PDOStatement
   */
  private function ajaxFilterQuery(sfWebRequest $request, PDO $pdo, $select)
  {
       
    $where = 'member.active = 1';
    $from = 'pilot';
    $join = '';
    $join .= " LEFT JOIN airport hb ON pilot.primary_airport_id=hb.id";
    $join .= " LEFT JOIN member ON pilot.member_id = member.id";
    $join .= " LEFT JOIN availability ON member.id = availability.member_id";
    $join .= " LEFT JOIN person ON member.person_id = person.id";
    $params = array();

    # efficiency
    $efficiency = $request->getParameter('efficiency');
    $leg_ids = $request->getParameter('leg_ids');
    if ((!empty($efficiency)) && $efficiency <= 100 && $efficiency >= 1) {
      $efficiency = (int)$efficiency;
      for ($i = 0; $i < count($leg_ids); $i++) {
        $leg_ids[$i] = (int)$leg_ids[$i];
      }
      $leg_ids = implode(',', $leg_ids);
      $where .= ' AND
      CEILING(
        ROUND(
          ACOS(
            SIN(RADIANS(fa_latitude))
            *
            SIN(RADIANS(ta_latitude))
            +
            COS(RADIANS(fa_latitude))
            *
            COS(RADIANS(ta_latitude))
            *
            COS(RADIANS(fa_longitude)-RADIANS(ta_longitude))
          ) * ((180*60)/PI())
        )
        /
        (
          ROUND(
            ACOS(
              SIN(RADIANS(fa_latitude))
              *
              SIN(RADIANS(ta_latitude))
              +
              COS(RADIANS(fa_latitude))
              *
              COS(RADIANS(ta_latitude))
              *
              COS(RADIANS(fa_longitude)-RADIANS(ta_longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS(hb.latitude))
              *
              SIN(RADIANS(ta_latitude))
              +
              COS(RADIANS(hb.latitude))
              *
              COS(RADIANS(ta_latitude))
              *
              COS(RADIANS(hb.longitude)-RADIANS(ta_longitude))
            ) * ((180*60)/PI())
          )
          +
          ROUND(
            ACOS(
              SIN(RADIANS(hb.latitude))
              *
              SIN(RADIANS(fa_latitude))
              +
              COS(RADIANS(hb.latitude))
              *
              COS(RADIANS(fa_latitude))
              *
              COS(RADIANS(hb.longitude)-RADIANS(fa_longitude))
            ) * ((180*60)/PI())
          )
        ) * 200
      ) > '.$efficiency;
      $tmp = 'SELECT fa.latitude as fa_latitude, fa.longitude as fa_longitude, ta.latitude as ta_latitude, ta.longitude as ta_longitude';
      $tmp .= ' FROM mission_leg LEFT JOIN airport fa ON mission_leg.from_airport_id=fa.id LEFT JOIN airport ta ON mission_leg.to_airport_id=ta.id';
      $tmp .= ' WHERE mission_leg.id IN ('.$leg_ids.') AND mission_leg.transportation = \'air_mission\'';
      $from = ' ('.$tmp.') as leg, '.$from;
    }

    # wing id
    $wing_ids = $request->getParameter('wing_ids');
    if (!empty($wing_ids)) {
      for ($i = 0; $i < count($wing_ids); $i++) {
        $wing_ids[$i] = (int)$wing_ids[$i];
      }
      $wing_ids = implode(',', $wing_ids);
      $where .= " AND member.wing_id IN ($wing_ids)";
    }

    # list id
    $list_id = $request->getParameter('email_list_id');
    if (!empty($list_id)) {
      $list_id = (int)$list_id;
      $join .= " LEFT JOIN email_list_person ON member.person_id=email_list_person.person_id";
      $where .= " AND email_list_person.list_id=$list_id";
    }    

    $flight_status = $request->getParameter('flight_status');
    if (!empty($flight_status)) {
      $params[':flight_status'] = $flight_status;
      $where .= " AND member.flight_status=:flight_status";
    }

    $weekday = $request->getParameter('weekday');
    if (!empty($weekday))  $where .= " AND availability.no_weekday<>1";

    $night = $request->getParameter('night');
    if (!empty($night)) $where .= " AND availability.no_night<>1";

    $last_minute = $request->getParameter('last_minute');
    if (!empty($last_minute)) $where .= " AND availability.last_minute=1";

    $weekend = $request->getParameter('weekend');
    if (!empty($weekend)) $where .= " AND availability.no_weekend<>1";

    $assistant = $request->getParameter('assistant');
    if (!empty($assistant)) $where .= " AND availability.as_mission_mssistant=1";

    $transplant = $request->getParameter('transplant');
    if (!empty($transplant)) $where .= " AND pilot.transplant=1";

    $state = $request->getParameter('state');
    if (!empty($state)) {
      $params[':state'] = $state;
      $where .= " AND person.state=:state";
    }

    // Farazi
    $zipcode = $request->getParameter('zipcode');
    if (!empty($zipcode)) {
      $params[':zipcode'] = $zipcode;
      $where .= " AND person.zipcode=:zipcode";
    }

    /*
    $active = $request->getParameter('active');
    if (!empty($active)) {
      $active = (int)$active;
      $params[':active'] = $active;
      $where .= " AND member.active=:active";
    }*/
    // Farazi End
    
    $home_base = $request->getParameter('home_base');
    if (!empty($home_base)) {
      $arrays = explode(",", $home_base);      
      if(count($arrays) > 0)
      {
	$home_base = "'" . implode("','", $arrays) . "'";		
      	$where .= " AND hb.ident IN (".$home_base.")";
      }else 
      {
        $params[':home_base'] = $home_base;
        $where .= " AND hb.ident=:home_base";
      }
    }

    $area_code = $request->getParameter('area_code');
    if (!empty($area_code)) {
      $arrays = explode(",", $area_code);
      if(count($arrays) > 0)
      {
      	$area_code = "'" . implode("','", $arrays) . "'";
        $where .= " AND SUBSTR(person.day_phone, 2, 3) IN (".$area_code.")";
      }else 
      {
          $params[':area_code'] = $area_code;
          $where .= " AND SUBSTR(person.day_phone, 2, 3)=:area_code";
      }
    }

    $county = $request->getParameter('county');
    if (!empty($county)) {
      $arrays = explode(",", $county);
      if(count($arrays) > 0)
      {
    		$county = "'" . implode("','", $arrays) . "'";
    		$where .= " AND person.county IN (0, ". $county .")";
    	}else 
    	{
	      $params[':county'] = $county;
	      $where .= " AND person.county=:county";
    	}
    }
    
    $stmt = $pdo->prepare("SELECT $select FROM $from $join WHERE $where");     
    $stmt->execute($params);
    return $stmt;
  }

  public function executeFindModel(sfWebRequest $request)
  {
   //...

    $name = $request->getParameter('name');
    $this->models = AircraftPeer::getOnlyModels($name);
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "pilot";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"pilot");
  }
  public function executeAutoCompleteRegion()
  {
    $this->region_name = $this->getRequestParameter('mop_regions_served');
    $this->wing_names = WingPeer::getResionServedNames($this->region_name);
  }

  public function executeMopAdd(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $max = sfConfig::get('app_max_mop_per_page', 10);
    $page = (int)$request->getParameter('page');
    $flag = 1;
    $this->wing_id = 1;
    $this->pager = PilotPeer::getMopPager($this->wing_id, $max, $page , $flag , 0);
    $this->pilots = $this->pager->getResults();     
      
  }

  public function executeMopDelete(sfWebRequest $request)
  {
      if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
      }

      $idnew = $request->getParameter('id');
      if($idnew){
        $pilot = PilotPeer::retrieveByPK($idnew);        
        $pilot->setOrientedDate(NULL);
        $pilot->save();        
        $this->getUser()->setFlash('success','Selected MOP removed successfully from list!');
        $this->redirect('pilot/mopDirectory');      
      }
      else{
          $this->getUser()->setFlash('warning','Please select a pilot to remove from MOP list!');
          $this->redirect('pilot/mopDirectory');
      }    
  }
  public function executeActive(sfWebRequest $request)
  {
    $pilot =  PilotPeer::retrieveByPK( $request->getParameter('id'));
    $pilot->setMopActiveStatus(1);
    $pilot->save();
    
    return sfView::NONE;
    
  }
  public function executeDeactive(sfWebRequest $request)
  {
    $pilot =  PilotPeer::retrieveByPK( $request->getParameter('id'));
    $pilot->setMopActiveStatus(0);
    $pilot->save();    
    
    return sfView::NONE;
  }

}

