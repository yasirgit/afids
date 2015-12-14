<?php

/**
 * member actions.
 *
 * @package    angelflight
 * @subpackage member
 * @author     Javzaa, Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class memberActions extends sfActions
{
  /**
   * Searches for members
   * It also handles followings:
   * * Master member of a member
   * CODE: member_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->addRecentItem('Member', 'member', 'member/index');
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    # handle the master member
    if ($request->hasParameter('master_for') && $this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)) {
      $this->master_for = MemberPeer::retrieveByPK($request->getParameter('master_for'));
    }else{
      $this->master_for = null;
    }
    
//    $this->member_id = $this->getRequestParameter('member_id');

    $exclude_ids = array();
    if ($this->master_for) $exclude_ids[] = $this->master_for->getId();

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = MemberPeer::getPager(
        $this->max,
        $this->page,
        $this->member_Ex_id,
        $this->firstname,
        $this->lastname,
        $this->city,
        $this->state,
        $this->country,
        $this->wing_name,
        $this->active,
        $this->flight_status,
        $exclude_ids
        );

        $this->members = $this->pager->getResults();
    }
    $this->is_active = $request->getParameter('actives');

    # one result with member_id search will go to member view
    if (count($this->members) == 1 && $this->member_id > 0) {
      if ($this->master_for) $url_add = '&master_for='.$this->master_for->getId(); else $url_add = '';
      $this->redirect('@member_view?id='.$this->members[0]->getId().$url_add);
    }
  }

  /**
   * Searches for members by filter
   */

  private function processFilter(sfWebRequest $request)
  {

    $params = $this->getUser()->getAttribute('member', array(), 'person');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;
    if (!isset($params['wing_name'])) $params['wing_name'] = null;
    if (!isset($params['active'])) $params['active'] = null;
    if (!isset($params['flight_status'])) $params['flight_status'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = PersonPeer::getCounties();
    $this->flight_statuses = sfConfig::get('app_flight_statuses');
    $this->wings = WingPeer::getNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']    = $request->getParameter('firstname');
      $params['lastname']     = $request->getParameter('lastname');
      $params['city']         = $request->getParameter('city');
      $params['state']        = $request->getParameter('state');
      $params['country']      = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
      $params['wing_name']    = (in_array($request->getParameter('wing_name'), array_keys($this->wings)) ? $request->getParameter('wing_name') : '');
      $params['active']       = $request->getParameter('active');
      $params['flight_status']= (in_array($request->getParameter('flight_status'), array_keys($this->flight_statuses)) ? $request->getParameter('flight_status') : '');
    }

    $this->page                = $page = $request->getParameter('page', 1);
    $this->max                 = $params['max'];
    $this->member_Ex_id        = $request->getParameter('member_Ex_id', null);
    $this->firstname           = $params['firstname'];
    $this->lastname            = $params['lastname'];
    $this->city                = $params['city'];
    $this->state               = $params['state'];
    $this->country             = $params['country'];
    $this->wing_name           = $params['wing_name'];
    $this->active              = $params['active'];
    $this->flight_status       = $params['flight_status'];
    
    $this->getUser()->setAttribute('member', $params, 'person');
  }

  /**
   * Searches for person to add member record to
   * CODE: person_index, member_create
   */
  public function executeFind(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    # filter Person Find
    $this->processFilter2($request);
    $this->pager = PersonPeer::getNotInMemberPager(
    $this->max,
    $this->page,
    $this->firstname,
    $this->lastname,
    $this->gender,
    $this->city,
    $this->state,
    $this->country,
    $this->county,
    $this->deceased,
    $this->deceased_until,
    $this->deceased_after
    );
    $this->persons = $this->pager->getResults();

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  /**
   * Searches for board members
   * CODE: member_index
   */
  private function processFilter2(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('person', array(), 'person');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['gender'])) $params['gender'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;
    if (!isset($params['county'])) $params['county'] = null;
    if (!isset($params['deceased'])) $params['deceased'] = null;
    if (!isset($params['deceased_until'])) $params['deceased_until'] = null;
    if (!isset($params['deceased_after'])) $params['deceased_after'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = sfConfig::get('app_countries');
    $this->genders = sfConfig::get('app_gender_types');

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['gender']         = (in_array($request->getParameter('gender'), array_keys($this->genders)) ? $request->getParameter('gender') : '');
      $params['city']           = $request->getParameter('city');
      $params['state']          = $request->getParameter('state');
      $params['country']        = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
      $params['county']         = $request->getParameter('county');
      $params['deceased']       = $request->getParameter('deceased');
      $params['deceased_until'] = $request->getParameter('deceased_until');
      $params['deceased_after'] = $request->getParameter('deceased_after');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->gender         = $params['gender'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->country        = $params['country'];
    $this->county         = $params['county'];
    $this->deceased       = $params['deceased'];
    $this->deceased_until = $params['deceased_until'];
    $this->deceased_after = $params['deceased_after'];

    $this->getUser()->setAttribute('person', $params, 'person');
  }

  /**
   * Member add or edit
   * CODE: member_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $new_pilot=false;
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    //FROM PERSON VIEW
    if ($request->getParameter('id')) {
      $member = MemberPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($member);

      $this->title = 'Edit member';
      $success = 'Member information has been successfully changed!';

      $this->person = $member->getPerson();
    }else{
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
      $this->forward404Unless($this->person);

      $member = new Member();
      $this->title = 'Add new member';
      $success = 'Member information has been successfully created!';
    }

    $this->form = new MemberForm($member);
    $this->back = $request->getReferer();
    $this->member = $member;

    if(strstr($request->getReferer(),'person/view')){
      $this->f_back = 1;
    }elseif(strstr($request->getReferer(),'/member/view/id')){
      $this->f_back = 3;
    }elseif(strstr($request->getReferer(),'/member')){
      $this->f_back = 2;
    }

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('mem'));

      if ($this->form->isValid() && $this->form->getValue('member_class_id') !=0 && $this->form->getValue('flight_status'))
      {
        if($request->getParameter('person_id')){
          $member->setPersonId($request->getParameter('person_id'));
        }
        $person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
        $member->setDateOfBirth($this->form->getValue('date_of_birth'));
        $member->setWeight($this->form->getValue('weight'));
        $member->setLanguages($this->form->getValue('languages'));

        if($this->form->getValue('wing_id') == 0){
          $member->setWingId(null);
        }else{
          $member->setWingId($this->form->getValue('wing_id'));
        }

        if($this->form->getValue('secondary_wing_id') == 0){
          $member->setSecondaryWingId(null);
        }else{
          $member->setSecondaryWingId($this->form->getValue('secondary_wing_id'));
        }
        // setting external_id
        $c = new Criteria();
        $c->add(MemberPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
        $c->addDescendingOrderByColumn(MemberPeer::ID);
        $external_member = MemberPeer::doSelectOne($c);
        $external_id = $external_member->getExternalId();
        $currentExternalId=( $external_id + 1);
        $member->setExternalId($currentExternalId);

        $member->setJoinDate($this->form->getValue('join_date'));
        $member->setMemberClassId($this->form->getValue('member_class_id'));
        $member->setSpouseName($this->form->getValue('spouse_name'));
        $member->setCoordinatorNotes($this->form->getValue('coordinator_notes'));

        $member->setFlightStatus($this->form->getValue('flight_status'));

        if($this->form->getValue('co_pilot') == null){
          $member->setCoPilot(0);
        }else{
          $member->setCoPilot($this->form->getValue('co_pilot'));
        }
        
        $new_member = $member->isNew();
        if($new_member){
          $content = $this->getUser()->getName().' added new Member: '.$person->getFirstName();
          ActivityPeer::log($content);
        }
        $member->save();
        //
        $wing_jobs = $request->getParameter('wing_job1[]');
        if($request->getParameter('wing_job1')) {
        	
        	$old_mem_wing_jobs = MemberWingJobPeer::getWingJob($member->getId());
        	foreach ($old_mem_wing_jobs as $old_mem_wing_job) {
        		$old_mem_wing_job->delete();
        	}
        	foreach ($wing_jobs as $wing_job) {
        		$member_wing_job = new MemberWingJob();
        		$member_wing_job->setMemberId($member->getId());
        		$member_wing_job->setWingJobId($wing_job);
        		$member_wing_job->save();
        	}
        }

        if (strtolower($member->getFlightStatus()) == 'command pilot') {
          // if command-pilot then make pilot
          $pilot = new Pilot();
          $pilot->setMemberId($member->getId());
          $pilot->setLicenseType('Default');
          $pilot->setIfr(0);
          $pilot->setMultiEngine(0);
          $pilot->save();
          $new_pilot = true;
        }else{
          $new_pilot = false;
        }
        
        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');

        $back_url = 'member/index';

        if(strstr($last,'member/edit')){
          $back_url = 'member/index';
        }elseif(strstr($last,'person/view')){
          if(isset($this->person)){
            $back_url = '@person_view?id='.$this->person->getId();
          }
        }elseif(strstr($last,'member/view')){
          $back_url = '@member_view?id='.$member->getId();
        }

        //with error validation back url

        if(strstr($request->getReferer(),'last/1')){
          $back_url = '@person_view?id='.$this->person->getId();
        }elseif(strstr($request->getReferer(),'last/2')){
          $back_url = 'member/index';
        }elseif(strstr($request->getReferer(),'last/3')){
          $back_url = '@member_view?id='.$member->getId();
        }

        // role for new member
        if ($new_member) {
          $role = '@Member';
          $member_role = RolePeer::getByTitle($role);
          if ($member_role) {
            $person_role = new PersonRole();
            $person_role->setPersonId($this->person->getId());
            $person_role->setRoleId($member_role->getId());
            $person_role->save();
          }else{
            $url = $this->generateUrl('default_index', array('module' => 'role'), true);
            $this->getUser()->setFlash('warning', '"'.$role.'" role not found! Please navigate '.$url.' and fix.');
          }
        }
        // role for new pilot
        if ($new_pilot) {
          $role = '@Pilot';
          $pilot_role = RolePeer::getByTitle($role);
          $is_true = PersonRolePeer::getIsTrue($this->person->getId(), $pilot_role->getId());
          if (!$is_true) {
            $person_role = new PersonRole();
            $person_role->setPersonId($this->person->getId());
            $person_role->setRoleId($pilot_role->getId());
            $person_role->save();
          }else{
            $url = $this->generateUrl('default_index', array('module' => 'role'), true);
            //$this->getUser()->setFlash('warning', '"'.$role.'" role not found! Please navigate '.$url.' and fix');
          }
        }
        $this->redirect($back_url);
      }else{
        $this->getUser()->setFlash('warning', 'Please confirm flight status and choose the member class!');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : 'member/index';
    }
    $this->member = $member;
  }

  /**
   * Accepts the member request
   * CODE: TODO
   */
  public function executeActive(sfWebRequest $request)
  {
    if ($request->isMethod('post')) {
      $member = MemberPeer::retrieveByPK($request->getParameter('id')) ;
      $this->forward404Unless($member);

      $member->setActive($member->getActive() ? 0 : 1);
      $member->save();

      $id = $this->getUser()->getAttribute('person_id');
    }

    return $this->redirect('@person_view?id='.$id['id']);
  }

  /**
   * Create/Edit board member
   * CODE: board_member_create
   */
  public function executeBoardMember(sfWebRequest $request)
  {
    
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }

    if($request->getParameter('id')){
      
      $b_member = BoardMemberPeer::retrieveByPK($request->getParameter('id'));
      $this->person = PersonPeer::retrieveByPK($b_member->getPersonId());
      $this->personID = $this->person->getId();
      $this->title = 'Edit board member';

      $query = "SELECT * FROM board_member ";
      $query .="WHERE person_id =".$this->personID." order by id desc";
      $con = Propel::getConnection();
      $stmt = $con->prepare($query);
      $stmt->execute();     
      
      while ($rs = $stmt->fetch() ) {
                $this->flag = $rs['startyear'];
                $this->setendyear = $rs['endyear'];
                $this->ID = $rs['id'];
                break;          
      }
          
      $success = 'Board Member information successfully edited!';
      $this->person = PersonPeer::retrieveByPK($b_member->getPersonId());
      
    }else{
        $b_member = new BoardMember();
        $this->title = 'Add new board member';
        $success = 'New Board Member information successfully created!';
        $this->title1 = 'Board member served history';
        $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
        $this->personID = $this->person->getId();
        $query = "SELECT * FROM board_member ";
        $query .="WHERE person_id =".$this->personID;

        $con = Propel::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();


        $this->value = array();
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ) ) {
            $this->value[] = $rs;
        }
    }

    $this->form = new BoardMemberForm($b_member);

    if($request->isMethod('post')){

      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('bmem'));

      if($this->form->isValid() && $this->form->getValue('startyear') && $this->form->getValue('endyear') && $request->getParameter('person_id')){

        if($request->getParameter('person_id')){
          $b_member->setPersonId($this->person->getId());
        }

        if($request->getParameter('id')){
            $b_member->setId($request->getParameter('id'));
        }
        $b_member->setStartyear($this->form->getValue('startyear'));
        $b_member->setEndyear($this->form->getValue('endyear'));
        $b_member->save();

        $this->getUser()->setFlash('success',$success);

        $this->redirect('@person_view?id='.$this->person->getId());

      }else{
        $this->getUser()->setFlash('warning','Please choise start year and end year!');
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : 'member/index';
    }
    $this->b_member = $b_member;
  }
  
  /**
   * Removes a board member record
   * CODE: board_member_delete
   */
  public function executeBoardDelete(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $b_member = BoardMemberPeer::retrieveByPK($request->getParameter('id'));

    if($b_member){
      if($b_member instanceof BoardMember){
        $person_id = $b_member->getPersonId();
      }
    }

    if(isset($person_id)){
      $this->person = PersonPeer::retrieveByPK($person_id);
    }

    if ($request->isMethod('post'))
    {
      $b_member = BoardMemberPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($b_member);

      $this->getUser()->setFlash('success', 'Board Member information has been successfully de-actived!');

      $b_member->delete();

    }

    return $this->redirect('@person_view?id='.$person_id);
  }

  /**
   * TODO: check related records
   * CODE: member_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete'))
    {
		$request->checkCSRFProtection();
		
		$member = MemberPeer::retrieveByPK($request->getParameter('id'));
		
		$this->forward404Unless($member);

		//FK Constraint check
		if(($member->countApplications() > 0 or $member->countAvailabilitys()>0 or
			$member->countMembersRelatedByMasterMemberId()>0 or $member->countMemberWingJobs() or 
			$member->countPilotAircrafts()>0 or $member->countCoordinators()>0) or 
			($member->countMissionLegsRelatedByBackupCopilotId()>0 or $member->countMissionLegsRelatedByCopilotId()>0 or 
			$member->countPilotDates()>0 or $member->countPilotRequests()>0 or $member->countPilots()>0)){
				
		  $this->getUser()->setFlash('warning', 'Member information is used by other objects. You can not delete it!');
		  return $this->redirect('member/index');
		}
		
      	$member->delete();	
      	$this->getUser()->setFlash('success', 'Member information has been successfully deleted!');
    }
    if($request->getReferer()){
      $back = $request->getReferer();
    }else{
      $back = 'member/index';
    }
    return $this->redirect($back);
  }
  
  /**
   * CODE: board member_view
   */

  public function executeBoardMemberView(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }

    if($request->getParameter('id')){
        $b_member = BoardMemberPeer::retrieveByPK($request->getParameter('id'));
        $this->title = 'View board member';

        $this->person = PersonPeer::retrieveByPK($b_member->getPersonId());

        $this->personID = $this->person->getId();

        $query = "SELECT * FROM board_member ";
        $query .="WHERE person_id =".$this->personID;
        
        $con = Propel::getConnection();
        $stmt = $con->prepare($query);
        $stmt->execute();
        
                
        $this->value = array();
        while ($rs = $stmt->fetch(PDO::FETCH_OBJ) ) {
            $this->value[] = $rs;
        }     
    }

  }

  /**
   * CODE: member_view
   */
  public function executeView(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $member = MemberPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($member);

    $this->member = $member;
    $this->person = $member->getPerson();
    $this->applications = $member->getApplications();

    if($member->getSecondaryWingId()){
      $this->secondWing = WingPeer::retrieveByPK($member->getSecondaryWingId());
    }

    # recent item
    $this->getUser()->addRecentItem('Member', 'member', 'member/view?id='.$member->getId());

    # handle the master member
    if ($request->hasParameter('master_for') && $this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)) {
      $this->master_for = MemberPeer::retrieveByPK($request->getParameter('master_for'));
    }else{
      $this->master_for = null;
    }
  }
  /**
   * Unlinks the master member relation
   * CODE: member_create
   */
  public function executeDeleteMaster(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $member = MemberPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($member);

    $member->setMasterMemberId(null);
    $member->save();

    $this->getUser()->setFlash('success', 'Master Membership information have successfully removed!');

    $this->redirect('@member_view?id='.$member->getId());
  }

  /**
   * Specifies the master member. It will show option to add or search a member
   * CODE: member_create
   */
  public function executeSpecifyMaster(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->hasParameter('master_id')) {
      $member = MemberPeer::retrieveByPK($request->getParameter('for'));
      $this->forward404Unless($member);
      $master_member = MemberPeer::retrieveByPK($request->getParameter('master_id'));
      $this->forward404Unless($master_member);

      $member->setMasterMemberId($master_member->getId());
      $member->save();

      $this->getUser()->setFlash('success', 'Master Membership have successfully updated!');

      $this->redirect('@member_view?id='.$member->getId());
    }else{
      $this->redirect('@default_index?module=member&master_for='.$request->getParameter('for'));
    }
  }

  /**
   * Specifies the member class. It will show option to add or search a member class
   * Search member class
   * CODE: member_class_index
   */
  public function executeIndexMclass(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->mclasses = MemberClassPeer::doSelect(new Criteria());
  }

  /**
   * Specifies the master member. It will show option to add or search a member
   * CODE: member_class_create
   */
  public function executeUpdateMclass(sfWebRequest $request){

   if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if($request->getParameter('id')){
      $mclass = MemberClassPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Member Class';
      $success = 'Member Class has successfully created!';

    }else{
      $mclass = new MemberClass();
      $this->title = 'Add Member Class';
      $success = 'Member Class has successfully changed!';
    }

    $this->back = $request->getReferer();
    $this->form = new MemberClassForm($mclass);
    $this->mclass = $mclass;

    if($request->isMethod('post')){
    
      $this->form->bind($request->getParameter('mclass'));
      $this->referer = $request->getReferer();
     
      if($this->form->isValid()){
       
        $mclass->setName($this->form->getValue('name'));
        $mclass->setInitialFee($this->form->getValue('initial_fee'));
        $mclass->setRenewalFee($this->form->getValue('renewal_fee'));
        $mclass->setSubInitialFee($this->form->getValue('sub_initial_fee'));
        $mclass->setSubRenewalFee($this->form->getValue('sub_renewal_fee'));
        $mclass->setRenewalPeriod($this->form->getValue('renewal_period'));

        if($this->form->getValue('fly_missions') == null){
          $mclass->setFlyMissions(0);
        }else{
          $mclass->setFlyMissions($this->form->getValue('fly_missions'));
        }

        if($this->form->getValue('newsletters') == null){
          $mclass->setNewsletters(0);
        }else{
          $mclass->setNewsletters($this->form->getValue('newsletters'));
        }

        if($this->form->getValue('sub_newsletters') == null){
          $mclass->setSubNewsletters(0);
        }else{
          $mclass->setSubNewsletters($this->form->getValue('sub_newsletters'));
        }
        if($mclass->isNew()){
          $content = $this->getUser()->getName().' added new Member Class: '.$mclass->getName();
          ActivityPeer::log($content);
        }
        $mclass->save();

        $this->getUser()->setFlash('success',$success);

        $this->redirect('mclass');
      }else{
        $this->error_msg = 'Please confirm required fields !';
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@mclass';
    }
    $this->mclass = $mclass;
  }

  /**
   * CODE: member_class_delete
   */
  public function executeDeleteMclass(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete'))
    {
      try{
      $request->checkCSRFProtection();

      $member_class = MemberClassPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($member_class);
      $member_class->delete();
      $this->getUser()->setFlash('success', 'Member Class information has been successfully deleted!');
      }catch (Exception $e){
        $this->getUser()->setFlash('warning', "There are related persons to this member class. Please remove them first.");
      }

    }
    return $this->redirect('mclass/index');
  }

  /**
   * Member Roster for pilot member
   */
  public function executeRoster(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->wing_jobs = WingJobPeer::doSelect(new Criteria());
    $this->wing_job2 =  $request->getParameter('wing_job1');
	
	
    
    $this->processRosterFilter($request);
    $this->pager = MemberPeer::getRosterPager(
      $this->max,
      $this->page,
      $this->pilot_status,
      $this->wing_id,
      $this->ifr,
      $this->multi,
      $this->instructor,
      $this->board_member,
      $this->coordinator,
      $this->orientation_pilot,
      $this->state,
      $this->home_base,
      $this->area_code,
      $this->email,
      $this->wing_job2
    );

    $this->members = $this->pager->getResults();
  }

  private function processRosterFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('member_roster', array(), 'person');

    if (!isset($params['pilot_status']))      $params['pilot_status'] = null;
    if (!isset($params['wing_id']))           $params['wing_id'] = 0;
    if (!isset($params['ifr']))               $params['ifr'] = null;
    if (!isset($params['multi']))             $params['multi'] = null;
    if (!isset($params['instructor']))        $params['instructor'] = null;
    if (!isset($params['board_member']))      $params['board_member'] = null;
    if (!isset($params['coordinator']))       $params['coordinator'] = null;
    if (!isset($params['orientation_pilot'])) $params['orientation_pilot'] = null;
    if (!isset($params['state']))             $params['state'] = null;
    if (!isset($params['home_base']))         $params['home_base'] = null;
    if (!isset($params['area_code']))         $params['area_code'] = null;
    if (!isset($params['email']))             $params['email'] = null;
    if (!isset($params['wing_job1']))         $params['wing_job1'] = null;

    $this->pilot_statuses = array_merge(array('' => 'All'), sfConfig::get('app_flight_statuses', array()));
    $this->wings = array_merge(array(0 => 'All'), WingPeer::getNames());

    if ($request->hasParameter('filter')) {
      $params['wing_id']          = (in_array($request->getParameter('wing_id'), array_keys($this->wings)) ? $request->getParameter('wing_id') : 0);
      $params['pilot_status']     = (in_array($request->getParameter('pilot_status'), array_keys($this->pilot_statuses)) ? $request->getParameter('pilot_status') : '');
      $params['ifr']              = $request->getParameter('ifr');
      $params['multi']            = $request->getParameter('multi');
      $params['instructor']       = $request->getParameter('instructor');
      $params['board_member']     = $request->getParameter('board_member');
      $params['coordinator']      = $request->getParameter('coordinator');
      $params['orientation_pilot']= $request->getParameter('orientation_pilot');
      $params['state']            = $request->getParameter('state');
      $params['home_base']        = $request->getParameter('home_base');
      $params['area_code']        = $request->getParameter('area_code');
      $params['email']            = $request->getParameter('email');
      $params['wing_job1']        = $request->getParameter('wing_job1');
    }

    $this->page                = $page = $request->getParameter('page', 1);
    $this->max                 = sfConfig::get('app_max_member_roster_per_pager');
    $this->pilot_status        = $params['pilot_status'];
    $this->wing_id             = $params['wing_id'];
    $this->ifr                 = $params['ifr'];
    $this->multi               = $params['multi'];
    $this->instructor          = $params['instructor'];
    $this->board_member        = $params['board_member'];
    $this->coordinator         = $params['coordinator'];
    $this->orientation_pilot   = $params['orientation_pilot'];
    $this->state               = $params['state'];
    $this->home_base           = $params['home_base'];
    $this->area_code           = $params['area_code'];
    $this->email               = $params['email'];
    $this->wing_job1           = $params['wing_job1'];
    
    $this->getUser()->setAttribute('member_roster', $params, 'person');
  }

  /*
   * Lists members who need badge and notebook
   */
  public function executeNeedsBN(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->page                = $page = $request->getParameter('page', 1);
    $this->max                 = sfConfig::get('app_max_member_needsbn_per_pager', 10);
    $this->pager = MemberPeer::getNeedsBNPager(
    $this->max,
    $this->page
    );
    $this->members = $this->pager->getResults();    
  }

  /**
   * Member update badge and notebook
   * CODE: member_update_bn
   */
  public function executeUpdateBN(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Member'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


      $member = MemberPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($member);

      if($request->getParameter('type', 0)=='b'){
          $member->setBadgeMade(date());
          $member->save();
      }else if($request->getParameter('type', 0)=='n'){
          $member->setNotebookSent(date());
          $member->save();
      }

      return $this->redirect('@member_needsbn');
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "member";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"member");
  }

  public function executeAutoCompleteFirstNotMember()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "notmember";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLastNotMember()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"notmember");
  }
}
