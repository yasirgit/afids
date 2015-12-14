<?php

/**
 * wing actions.
 *
 * @package    angelflight
 * @subpackage mission
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class wingActions extends sfActions
{
  /**
 * Wing list
 * CODE:wing_index
 */
  public function executeIndex(sfWebRequest $request)
  {
    #security   
    if(!$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
       }

    $this->wing_list =  WingPeer::doSelect(new Criteria());
  }

  /**
 * Wing add edit
 * CODE:wing_create
 */
  public function executeUpdate(sfWebRequest $request)
  {
    #security    
    if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }
    if($request->getParameter('id')){
      $this->wing = WingPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Wing';
      $success = 'Wing has successfully edited!';
    }else{
      $this->wing = new Wing();
      $this->title = 'Add Wing';
      $success = 'Wing has successfully created!';
    }
    $this->form =  new WingForm($this->wing);

    if($request->isMethod('post')){

      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('wing'));

      if($this->form->isValid() && $this->form->getValue('name')){

        $this->wing->setname($this->form->getValue('name'));
        $this->wing->setNewsletterAbbreviation($this->form->getValue('newsletter_abbreviation'));
        $this->wing->setDisplayName($this->form->getValue('display_name'));
        $this->wing->setState($this->form->getValue('state'));
        if($this->wing->isNew()){
          $content = $this->getUser()->getName().' added new Mission type: '.$this->wing->getName();
          ActivityPeer::log($content);
        }
        $this->wing->save();

        $this->getUser()->setFlash('success',$success);

        $this->redirect('wing/index');
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : 'wing/index';
    }
    $this->wing = $this->wing;
  }
  /**
 * Wing delete
 * CODE:wing_delete
 */
  public function executeDelete(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }

    $request->checkCSRFProtection();
    try{
      $wing = WingPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($wing);
      $wing->delete();
      $this->getUser()->setFlash('success',"Successfully deleted.");
    }catch(Exception $e){
      $this->getUser()->setFlash('warning', "There are related persons to this wing. Please remove them first.");
    }
    $this->redirect('wing/index');
  }
}
