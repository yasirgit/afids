<?php

/**
 * vocation actions.
 *
 * @package    angelflight
 * @subpackage vocation
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class vocationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

      if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
       }

      $this->vocation_class_list = VocationClassPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {

      if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
       }

      $this->form = new VocationClassForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }
    
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new VocationClassForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($vocation_class = VocationClassPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vocation_class does not exist (%s).', $request->getParameter('id')));
    $this->form = new VocationClassForm($vocation_class);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($vocation_class = VocationClassPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vocation_class does not exist (%s).', $request->getParameter('id')));
    $this->form = new VocationClassForm($vocation_class);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    if(!$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }
    
    $request->checkCSRFProtection();

    try{
    $this->forward404Unless($vocation_class = VocationClassPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vocation_class does not exist (%s).', $request->getParameter('id')));
    $vocation_class->delete();
    }catch(Exception $e){
      $this->getUser()->setFlash('warning', "There are related persons to this vocation. Please remove them first.");
    }
    $this->redirect('vocation/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vocation_class = $form->save();

      $this->redirect('vocation/edit?id='.$vocation_class->getId());
    }
  }
}
