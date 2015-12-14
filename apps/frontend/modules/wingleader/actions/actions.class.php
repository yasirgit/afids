<?php

/**
 * wingleader actions.
 *
 * @package    angelflight
 * @subpackage wingleader
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class wingleaderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->wing_leader_list = WingLeaderPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
     $this->form = new WingLeaderForm();

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new WingLeaderForm();

    $this->processForm($request, $this->form);
    $this->getUser()->setFlash("success", "Wing Leader saved Successfully");
    $this->redirect("person/view?id=".$request->getParameter("person_id"));
  }

  public function executeEdit(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($wing_leader = WingLeaderPeer::retrieveByPk($request->getParameter('id')), sprintf('Object wing_leader does not exist (%s).', $request->getParameter('id')));
    $this->form = new WingLeaderForm($wing_leader);
    $this->wing_leader_id = $request->getParameter("id");
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {    
    $this->forward404Unless($wing_leader = WingLeaderPeer::retrieveByPk($request->getParameter('wing_leader_id')), sprintf('Object wing_leader does not exist (%s).', $request->getParameter('id')));

    $this->form = new WingLeaderForm($wing_leader);
    $this->form->getObject()->setId($request->getParameter("wing_leader_id"));
    $this->form->getObject()->setPersonId($request->getParameter("person_id"));
    $this->form->getObject()->setStartyear($request->getParameter("wingleader[startyear]"));
    $this->form->getObject()->save();
    $this->getUser()->setFlash("success", "Wing Leader Modified Successfully");
    $this->redirect("person/view?id=".$request->getParameter("person_id"));
  }

  public function executeDelete(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $request->checkCSRFProtection();

    $this->forward404Unless($wing_leader = WingLeaderPeer::retrieveByPk($request->getParameter('id')), sprintf('Object wing_leader does not exist (%s).', $request->getParameter('id')));
    $wing_leader->delete();
    $this->getUser()->setFlash("success", "Wing Leader Deleted Successfully");
    $this->redirect("person/view?id=".$request->getParameter("person_id"));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $form->getObject()->setPersonId($request->getParameter("person_id"));
    if ($form->isValid())
    {
      $wing_leader = $form->save();
      
    }
  }
}
