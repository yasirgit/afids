<?php
 /**
 * mission_report actions.
 *
 * @package    angelflight
 * @subpackage mission_report
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class mission_reportActions extends sfActions
{

  public $max_array = "";
  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  
  public function executeIndex(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $pilot_id = $this->getUser()->getPilotId();

    $c = new Criteria();
    $c->add(MissionLegPeer::TRANSPORTATION, 'air_mission');
    $c->add(MissionLegPeer::PILOT_ID, $pilot_id);
    $c->addJoin(MissionLegPeer::MISSION_ID, MissionPeer::ID, Criteria::RIGHT_JOIN);
    $c->add(MissionPeer::MISSION_DATE, date('Y-m-d H:i:s'), Criteria::LESS_THAN);
    $c->addJoin(MissionLegPeer::MISSION_REPORT_ID, MissionReportPeer::ID, Criteria::LEFT_JOIN);
    $c->add(MissionReportPeer::APPROVED, null, Criteria::ISNULL);
    $this->mission_legs = MissionLegPeer::doSelectJoinMission($c, null, Criteria::RIGHT_JOIN);
  }

  public function executeNew(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
    $this->forward404Unless($mission_leg);

    $mission = $mission_leg->getMission();
    $from_airport = $mission_leg->getAirportRelatedByFromAirportId();
    $to_airport = $mission_leg->getAirportRelatedByToAirportId();
    $passenger = $mission->getPassenger();

    $this->form = new MissionReportForm();
    $this->form->setDefault('mission_date', $mission->getMissionDate());
    $this->form->setDefault('pickup_airport_ident', $from_airport->getIdent());
    $this->form->setDefault('dropoff_airport_ident', $to_airport->getIdent());
    $this->form->setDefault('passenger_names', $passenger->getPerson()->getName());
    $this->form->setDefault('leg_id', $mission_leg->getId());

    $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($this->getUser()->getMemberId(), 'doSelectJoinAircraft');
  }

  public function executeCreate(sfWebRequest $request)
  {
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
    $this->forward404Unless($mission_leg);
    $this->form = new MissionReportForm();
    $this->processForm($request, $this->form, $mission_leg);
    $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($this->getUser()->getMemberId(), 'doSelectJoinAircraft');
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
    $this->forward404Unless($mission_leg);

    $this->form = new MissionReportForm($mission_leg->getMissionReport());
    $this->form->setDefault('leg_id', $mission_leg->getId());
    $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($this->getUser()->getMemberId(), 'doSelectJoinAircraft');
  }

  public function executeUpdate(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
	
    $mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('leg_id'));
    $this->forward404Unless($mission_leg);
    $this->form = new MissionReportForm($mission_leg->getMissionReport());   
    $this->processForm($request, $this->form, $mission_leg);
    $this->pilot_aircrafts = PilotAircraftPeer::getByMemberId($this->getUser()->getMemberId(), 'doSelectJoinAircraft');
    $this->setTemplate('edit');
  }
  private function processForm(sfWebRequest $request, MissionReportForm $form, MissionLeg $mission_leg)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));    
    
    if ($form->isValid()) {     
      $mission_report = $form->save();
      //if($request->getFiles())$form->getObject()->save();
      $mission_leg->setMissionReportId($mission_report->getId());
      $mission_leg->save();
      
      $this->getUser()->setFlash('success', 'Mission Report have successfully saved!');

      if ($this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false) == true) {
        return $this->redirect('mission_report/review');
      }      
      $this->redirect('mission_report/index');
    }
  }

  public function executeRemovePhoto(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $mission_report = MissionReportPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($mission_report);
    $this->forward404Unless($mission_report->getMissionLeg()->getPilotId() == $this->getUser()->getPilotId());
    $dir = sfConfig::get('sf_upload_dir');

    switch ($request->getParameter('n')) {
      case 1:
        @unlink($dir.'/mission_report/'.$mission_report->getPhoto1());
        $mission_report->setPhoto1(null);
        break;
      case 2:
        @unlink($dir.'/mission_report/'.$mission_report->getPhoto2());
        $mission_report->setPhoto2(null);
        break;
      case 3:
        @unlink($dir.'/mission_report/'.$mission_report->getPhoto3());
        $mission_report->setPhoto3(null);
        break;
      case 4:
        @unlink($dir.'/mission_report/'.$mission_report->getPhoto4());
        $mission_report->setPhoto4(null);
        break;
      case 5:
        @unlink($dir.'/mission_report/'.$mission_report->getPhoto5());
        $mission_report->setPhoto5(null);
        braeak;
    }
    $mission_report->save();

    return sfView::NONE;
  }

  public function executeReview(sfWebRequest $request) 
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->getUser()->addRecentItem('Mission Report', 'mission_report', 'mission_report/review');
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('reports', 'mission_report_review'));
    

    # filter
    $this->processFilter($request);    
    $this->miss = $request->hasParameter('missing');
    if($this->miss){
           $this->pagers = MissionLegPeer::getMigaPager($this->max,$this->page);
           $this->mission_legs = $this->pagers->getResults();
    }else{
        if($request->isMethod('post') || $request->getParameter('page')){
            $this->pager = MissionReportPeer::getPager(
            $this->max,
            $this->page,
            $this->from_date,
            $this->to_date,
            $this->pilot_name,
            $this->passenger_name,
            $this->not_approved,
            $this->approved,
            $this->missing
            );
            $this->reports = $this->pager->getResults();

            //$this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
        }
    }
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('mission_report', array(), 'person');

    if (!isset($params['from_date'])) $params['from_date'] = null;
    if (!isset($params['to_date'])) $params['to_date'] = null;
    if (!isset($params['pilot_name'])) $params['pilot_name'] = null;
    if (!isset($params['passenger_name'])) $params['passenger_name'] = null;
    if (!isset($params['not_approved'])) $params['not_approved'] = null;
    if (!isset($params['approved'])) $params['approved'] = null;
    if (!isset($params['missing'])) $params['missing'] = null;

    $this->max_array = array(5, 10, 20, 30);
    
    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_mission_report_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['from_date'] = $request->getParameter('from_date');
      $params['to_date'] = $request->getParameter('to_date');
      $params['pilot_name'] = $request->getParameter('pilot_name');
      $params['passenger_name'] = $request->getParameter('passenger_name');
      $params['not_approved'] = $request->getParameter('not_approved');
      $params['approved'] = $request->getParameter('approved');
      $params['missing'] = $request->getParameter('missing');
    }

    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->from_date = $params['from_date'];
    $this->to_date = $params['to_date'];
    $this->pilot_name = $params['pilot_name'];
    $this->passenger_name = $params['passenger_name'];
    $this->not_approved = $params['not_approved'];
    $this->approved = $params['approved'];
    $this->missing = $params['missing'];
    
    $this->getUser()->setAttribute('mission_report', $params, 'person');
  }
  
  // Ajax
  public function executeApprove(sfWebRequest $request)
  {
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $report = MissionReportPeer::retrieveByPK($this->getRequestParameter('report_id'));
    $this->forward404Unless($report);
    
    $report->setApproved(1);
    $report->save();
  	
  	return sfView::NONE;
  }
}
