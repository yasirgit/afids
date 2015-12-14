<?php

/**
 * coordinator actions.
 *
 * @package    angelflight
 * @subpackage coordinator
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class coordinatorActions extends sfActions
{
  /**
   * Searches for coordinators
   * CODE: coordinator_index, coordinator_create
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->addRecentItem('Coordinator', 'Coordinator', 'coordinator/index');
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    if ($request->hasParameter('coor_for') && $this->getUser()->hasCredential(array('Administrator','Staff'), false)) {
      $this->coor_for = CoordinatorPeer::retrieveByPK($request->getParameter('coor_for'));
    }else{
      $this->coor_for = null;
    }
    $exclude_ids = array();
    if ($this->master_for) $exclude_ids[] = $this->master_for->getId();

    # filter
    $this->processFilter($request);
    $this->pager = CoordinatorPeer::getPager(
    $this->max,
    $this->page,
    $this->firstname,
    $this->lastname,
    $this->city,
    $this->state,
    $this->country,
    $this->coor_of_week,
    $exclude_ids
    );
    $this->coordinators = $this->pager->getResults();

    # one result with coordinator_id search will go to coordinator view
    if (count($this->coordinators) == 1) {
      if ($this->coor_for) $url_add = '&coor_for='.$this->coor_for->getId(); else $url_add = '';
      $this->redirect('@coordinator_view?id='.$this->coordinators[0]->getId().$url_add);
    }
  }
  /**
   * Searches for coordinators by filters
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('coordinator', array(), 'coordinator');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;
    if (!isset($params['coor_of_week'])) $params['coor_of_week'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = sfConfig::get('app_countries');

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['city']       = $request->getParameter('city');
      $params['state']       = $request->getParameter('state');
      $params['country']        = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
      $params['coor_of_week']       = $request->getParameter('coor_of_week');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->city       = $params['city'];
    $this->state       = $params['state'];
    $this->country       = $params['country'];
    $this->coor_of_week       = $params['coor_of_week'];

    $this->getUser()->setAttribute('coordinator', $params, 'coordinator');
  }

  /**
   *  Add or edit coordinator
   * CODE: coordinator_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('member_id')){
      $this->member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
    }

    if($request->getParameter('id')){
      $this->coor = CoordinatorPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Coordinator';
      $success = 'Coordinator information has been successfully edited!';

      $this->member = MemberPeer::retrieveByPK($this->coor->getMemberId());
    }else{
      $this->coor = new Coordinator();
      $this->title = 'Add Coordinator';
      $success = 'Coordinator information has been successfully created!';
    }

    if($request->getParameter('leg')){
      $this->leg_id = $request->getParameter('leg');
    }
    if($request->getParameter('member')){
      $this->member = MemberPeer::retrieveByPK($request->getParameter('member'));
    }

    $this->form = new CoordinatorForm($this->coor);
    $this->back = $request->getReferer();

    if($request->isMethod('post')){

      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('coor'));

      if($this->form->isValid()){

        $this->coor->setMemberId($request->getParameter('member_id'));

        if($this->form->getValue('coor_of_the_week') == null){
          $this->coor->setCoorOfTheWeek(0);
        }else{
          $this->coor->setCoorOfTheWeek($this->form->getValue('coor_of_the_week'));
        }

        $this->coor->setCoorWeekDate($this->form->getValue('coor_week_date'));
        $this->coor->setInitialContact($this->form->getValue('initial_contact'));
        $is_new = $this->coor->isNew();
        $this->coor->save();
        if ($is_new) {
          sfContext::getInstance()->getConfiguration()->loadHelpers(array('Tag', 'Url'));
          $content = $this->getUser()->getName().' updated '.link_to($this->member->getPerson()->getName(), 'coordinator/view?id='.$this->coor->getId()).' as coordinator';
          ActivityPeer::log($content);
        }

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');
        $back_url = 'coordinator';

        if(strstr($last,'member/view')){
          $member  = MemberPeer::retrieveByPK($request->getParameter('member_id'));
          $member_id = $member->getId();
          $back_url = '@member_view?id='.$member_id;
        }elseif(strstr($last,'coordinator/view')){
          $back_url = '@coordinator_view?id='.$this->coor->getId();
        }
        $leg_id =$request->getParameter('leg_id');

        if(isset($leg_id)){
          $set_leg = MissionLegPeer::retrieveByPK($leg_id);
          if(isset($set_leg) && $set_leg instanceof MissionLeg){
            $set_leg->setCoordinatorId($this->coor->getId());
            $set_leg->save();
          }else{
            $this->forward404Unless($set_leg);
          }
          $back_url = '@leg_edit?id='.$request->getParameter('leg_id');
        }
        return $this->redirect($back_url);
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@companion';
    }
  }
  
  /**
   * TODO: Check related records.
   * CODE:coordinator_delete
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
      $coor = CoordinatorPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($coor);

      $this->getUser()->setFlash('success', 'Coordinator information has been successfully deleted!');

      $coor->delete();
    }
    if(strstr($request->getReferer(),'member/view')){
      $back  = '@member_view?id='.$coor->getMemberId();
    }else{
      $back = '@coordinator';
    }
    return $this->redirect($back);
  }

  /**
   * Coordinator view.
   * CODE: coordinator_view
   */
  public function executeView(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $coor = CoordinatorPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($coor);

    $this->coor = $coor;
    $this->member = $coor->getMember();
    $this->person = $this->member->getPerson();

    # handle the lead coordinator
    if ($request->hasParameter('coor_for') && $this->getUser()->hasCredential(array('Administrator','Staff'), false)) {
      $this->coor_for = CoordinatorPeer::retrieveByPK($request->getParameter('coor_for'));
    }else{
      $this->coor_for = null;
    }
  }

  /**
   * Change Lead Coordinator.
   * CODE:coordinator_create
   */
  public function executeChangeLead(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->hasParameter('lead_id')) {
      $coor = CoordinatorPeer::retrieveByPK($request->getParameter('for'));//coordinator wish to change lead
      $this->forward404Unless($coor);

      $lead_coor= CoordinatorPeer::retrieveByPK($request->getParameter('lead_id')); //changing coordinator
      $this->forward404Unless($lead_coor);

      $coor->setLeadId($lead_coor->getId());
      $coor->save();

      $this->getUser()->setFlash('success', 'Lead Coordinator have successfully updated!');

      $this->redirect('@coordinator_view?id='.$coor->getId());
    }else{
      $this->redirect('@default_index?module=coordinator&coor_for='.$request->getParameter('for'));
    }
  }

  /**
   * Unlink Lead Coordinator.
   * CODE: coordinator_create
   */
  public function executeUnlinkLead(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $coor = CoordinatorPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($coor);

    $coor->setLeadId(null);
    $coor->save();

    $this->getUser()->setFlash('success', 'Lead Coordinator information have successfully removed!');

    $this->redirect('@coordinator_view?id='.$coor->getId());
  }


}
