<?php

/**
 * wingjob actions.
 *
 * @package    angelflight
 * @subpackage wingjob
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class wingjobActions extends sfActions
{

  public function executeNew(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
    $this->form = new WingJobForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($request->isMethod('post'));
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
    $this->form = new WingJobForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($wing_job = WingJobPeer::retrieveByPk($request->getParameter('id')), sprintf('Object wing_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new WingJobForm($wing_job);

    $this->wing_role_id = $request->getParameter("id");
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($wing_job = WingJobPeer::retrieveByPk($request->getParameter('id')), sprintf('Object wing_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new WingJobForm($wing_job);

    $this->processForm($request, $this->form, 'update');

    $this->wing_role_id = $request->getParameter("id");
    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $request->checkCSRFProtection();

    $this->forward404Unless($wing_job = WingJobPeer::retrieveByPk($request->getParameter('id')), sprintf('Object wing_job does not exist (%s).', $request->getParameter('id')));
    $wing_job->delete();
    $this->getUser()->setFlash("success", "Wing Role Deleted Successfully");
    $this->redirect("person/view?id=".$request->getParameter("person_id"));
  }

  protected function processForm(sfWebRequest $request, sfForm $form, $type = null)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->getObject()->setPersonId($request->getParameter('person_id'));
      $wing_job = $form->save();
      if(!$type)
         $this->getUser()->setFlash("success", "Wing Role Saved Successfully");
      else
         $this->getUser()->setFlash("success", "Wing Role Modified Successfully");
      $this->redirect("person/view?id=".$request->getParameter("person_id"));
    }
  }
}