<?php
/**
 * event actions.
 *
 * @package    angelflight
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class eventActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    #security
    #Public pages   

    $c = new Criteria();
    $c->addAscendingOrderByColumn(EventPeer::ID);
    $this->event_list = EventPeer::doSelect($c);

    # for navigation menu
    /*sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));*/

    # filter
    $this->processFilter($request);
    $this->pager = EventPeer::getPager(
      $this->max,
      $this->page,
      $this->event_name,
      $this->event_date,
      $this->event_time,
      $this->location
    );
    $this->events = $this->pager->getResults();
    $this->getUser()->addRecentItem('Events', 'events', 'events/index');
  }

  /**
   * Search companions by filterss
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('event', array(), 'event');

    if (!isset($params['event_name'])) $params['event_name'] = null;
    if (!isset($params['event_date'])) $params['event_date'] = null;
    if (!isset($params['event_time'])) $params['event_time'] = null;
    if (!isset($params['location'])) $params['location'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['event_name']      = $request->getParameter('event_name');
      $params['event_date']      = $request->getParameter('event_date');
      $params['event_time']      = $request->getParameter('event_time');
      $params['location']        = $request->getParameter('location');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->event_name     = $params['event_name'];
    $this->event_date     = $params['event_date'];
    $this->event_time     = $params['event_time'];
    $this->location       = $params['location'];

    $this->getUser()->setAttribute('event', $params);
  }

  public function executeNew(sfWebRequest $request)
  {
      
    $this->form = new EventForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    //$this->forward404Unless($request->isMethod('post'));
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->form = new EventForm();
    $success = 'Event information has been successfully created!';
    if($request->isMethod("post"))$this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    
    $this->forward404Unless($event = EventPeer::retrieveByPk($request->getParameter('id')), sprintf('Object event does not exist (%s).', $request->getParameter('id')));
    $this->form = new EventForm($event);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($event = EventPeer::retrieveByPk($request->getParameter('id')), sprintf('Object event does not exist (%s).', $request->getParameter('id')));
    $this->form = new EventForm($event);

    $success = 'Event information has been successfully changed!';
    $this->processForm($request, $this->form);
    $this->getUser()->setFlash("success", $success);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $request->checkCSRFProtection();

    $this->forward404Unless($event = EventPeer::retrieveByPk($request->getParameter('id')), sprintf('Object event does not exist (%s).', $request->getParameter('id')));
    $event_reservation = EventReservationPeer::retrieveByEventId($event->getId());
        if(is_array($event_reservation)){
           foreach ($event_reservation as $e_r){
              $e_r->delete();
           }
        }
    $event->delete();
    $success = 'Event information has been successfully deleted!';
    $this->getUser()->setFlash("success", $success);
    $this->redirect('event/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        
    if ($form->isValid())
    {
      $event = $form->save();
      $arr = $request->getParameter('event[wing_id]');
      $ew = EventWingsPeer::retrieveByEventId($request->getParameter('id'));
      if(is_array($ew)){
          foreach ($ew as $eav ) {
            $eav->delete();
          }
       }
      foreach ( $arr as $key => $val){
        $ev = new EventWings();
        if($request->getParameter('id') != ''){
            $ev->setEventId($request->getParameter('id'));
        }
        else {
            $ev->setEventId($form->getObject()->getId());
        }
        $ev->setWingId($val);
        $ev->save();
        unset($ev);
      }
      $this->redirect('/event');
    }
  }

  //ziyed start
  //Calendar
  public function executeCalendar(sfWebRequest $request)
  {
    $this->wings = WingPeer::getOnlyNames();  

    $this->processFilterNew($request);
    $this->pager = EventPeer::getCalendarPager(
      $this->max,
      $this->page,
      $this->wing_id
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

    //set wing id & wing name
    if (!isset($params['wing_id'])) $params['wing_id'] = 0;
    if (!isset($params['wingname'])) $params['wingname'] = 0;
    if ($request->hasParameter('filter')) {
        $name = $request->getParameter('wing_name');        
        if(empty($name)){           
            $params['wing_id'] = 0;
            $params['wingname'] = 0;
        }else{            
            $wing_obj = WingPeer::getByName($request->getParameter('wing_name'));
            $wing_id = $wing_obj->getId();
            $params['wing_id'] = $wing_id;
            $params['wingname'] = $name;
        }
    }

    //Reset all
    if($request->getParameter('reset')){
        $params['wing_id'] = 0;
    }

    //value set for pager
    $this->page           = $params['page'];
    $this->max            = $params['max'];
    $this->wing_id        = $params['wing_id'];
    $this->wingname       = $params['wingname'];

    $this->getUser()->setAttribute('event', $params);
  }



  public function  executeCalendarDetails(sfWebRequest $request)
  {
    $this->event = EventPeer::retrieveByPK($request->getParameter('id'));    
    
  }

  public function  executeEventSignup(sfWebRequest $request)
  {
    $this->event = EventPeer::retrieveByPK($request->getParameter('id'));

  }
  //ziyed end

}
