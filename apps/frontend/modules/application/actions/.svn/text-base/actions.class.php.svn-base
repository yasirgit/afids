<?php

/**
 * application actions.
 *
 * @package    angelflight
 * @subpackage application
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class applicationActions extends sfActions
{
  public function preExecute()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('members', ''));
  }

  /**
   * CODE: application_create
   */
  public function executeNew(sfWebRequest $request)
  {
     if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->form = new ApplicationForm();
    $this->form->setDefault('member_id', $request->getParameter('member_id'));

    $this->member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
    $this->forward404Unless($this->member);
    $this->person = $this->member->getPerson();
  }

  /**
   * CODE: application_create
   */
  public function executeCreate(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ApplicationForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  /**
   * CODE: application_create
   */
  public function executeEdit(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->forward404Unless($application = ApplicationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application does not exist (%s).', $request->getParameter('id')));
    $this->form = new ApplicationForm($application);

    $this->member = $application->getMember();
    $this->person = $this->member->getPerson();
  }

  /**
   * CODE: application_create
   */
  public function executeUpdate(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($application = ApplicationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application does not exist (%s).', $request->getParameter('id')));
    $this->form = new ApplicationForm($application);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  /**
   * CODE: application_delete
   */
  public function executeDelete(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete')) {
      $request->checkCSRFProtection();
      $this->forward404Unless($application = ApplicationPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application does not exist (%s).', $request->getParameter('id')));
      $application->delete();

      $this->getUser()->setFlash('success', 'You have successfully removed an application!');

      $this->redirect('@member_view?id='.$application->getMemberId());
    }

    $this->redirect('@homepage');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()){
      $application = $form->save();

      $this->getUser()->setFlash('success', 'Application have successfully saved!');

      $this->redirect('@default?module=application&action=view&id='.$application->getId());
    }

    $this->member = MemberPeer::retrieveByPK($form['member_id']->getValue());
    $this->forward404Unless($this->member);
    $this->person = $this->member->getPerson();
  }

  /**
   * CODE: application_view
   */
  public function executeView(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->app = ApplicationPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->app);

    $this->member = $this->app->getMember();
    $this->person = $this->member->getPerson();

    $this->medical_classes = array_merge(array(0 => 'Non-Pilot'), sfConfig::get('app_pilot_medical_classes', array()));
    $this->premium_choices = sfConfig::get('app_premium_choices', array());
    $this->premium_sizes = sfConfig::get('app_premium_sizes', array());
  }
}
