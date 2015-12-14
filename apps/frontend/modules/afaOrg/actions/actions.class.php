<?php

/**
 * afaOrg actions.
 *
 * @package    angelflight
 * @subpackage afaOrg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class afaOrgActions extends sfActions
{
  /**
   * Searches for afa orgs
   * It also handles followings:
   * CODE: afaorg_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->getUser()->addRecentItem('AFA Org', 'afa_org', 'afaOrg/index');
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('reference', 'find_afaorg'));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = AfaOrgPeer::getPager(
          $this->max,
          $this->page,
          $this->name,
          $this->phone,
          $this->fax
        );
        $this->afaorgs = $this->pager->getResults();
    }
  }

  /**
   * Searches for afa orgs
   * It also handles followings:
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('afaorg', array(), 'afaorg');

    if (!isset($params['name'])) $params['name'] = null;
    if (!isset($params['phone'])) $params['phone'] = null;
    if (!isset($params['fax'])) $params['fax'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['name']   = $request->getParameter('name');
      $params['phone']  = $request->getParameter('phone');
      $params['fax']    = $request->getParameter('fax');
    }

    $this->page              = $page = $request->getParameter('page', 1);
    $this->max               = $params['max'];
    $this->name              = $params['name'];
    $this->phone             = $params['phone'];
    $this->fax               = $params['fax'];

    $this->getUser()->setAttribute('afaorg', $params, 'afaorg');
  }

  /**
   * Add or edit afaorgs
   * It also handles followings:
   * CODE: afaorg_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('reference', ''));

    if($request->getParameter('id')){

      $afa =  AfaOrgPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($afa);

      $this->title = 'Edit Linking Organization';
      $success = 'Linking Organization information has been successfully changed!';

    }else{

      $afa = New AfaOrg();
      $this->title = 'Add Linking Organization';
      $success = 'Linking Organization information has been successfully created!';

    }

    $this->form = new AfaOrgForm($afa);

    if ($request->isMethod('post'))
    {

      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('afa'));

      if ($this->form->isValid())
      {

        $afa->setName($this->form->getValue('name'));
        $afa->setOrgPhone($this->form->getValue('org_phone'));
        $afa->setHomePageUrl($this->form->getValue('home_page_url'));
        $afa->setOrgFax($this->form->getValue('org_fax'));
        $afa->setRefContactName($this->form->getValue('ref_contact_name'));
        $afa->setRefContactEmail($this->form->getValue('ref_contact_email'));
        $afa->setVpoSoapServerUrl($this->form->getValue('vpo_soap_server_url'));
        $afa->setVpoRequestPostEmail($this->form->getValue('vpo_request_post_email'));
        $afa->setVpoUserId($this->form->getValue('vpo_user_id'));
        $afa->setVpoUserPassword($this->form->getValue('vpo_user_password'));
        $afa->setVpoOrgId($this->form->getValue('vpo_org_id'));
        $afa->setAfidsRequesterUserName($this->form->getValue('afids_requester_user_name'));
        $afa->setAfidsRequesterPassword($this->form->getValue('afids_requester_password'));
        $afa->setAfidsSoapServerUrl($this->form->getValue('afids_soap_server_url'));
        $afa->setAfidsRequestPostEmail($this->form->getValue('afids_request_post_email'));
        $afa->setPhoneNumber1($this->form->getValue('phone_number1'));
        $afa->setPhoneNumber2($this->form->getValue('phone_number2'));
        

        if ($afa->isNew()) {
          $content = $this->getUser()->getName().' added Linking Organization: '.$afa->getName();
          ActivityPeer::log($content);
        }

        $afa->save();

        $this->getUser()->setFlash('success', $success);

        return $this->redirect('@afaOrg');
      }

    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@afaorg';
    }
    $this->afa = $afa;
  }

  /**
   * TODO: Check related records.
   * CODE: afaorg_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('delete'))
    {
      $request->checkCSRFProtection();
      $afa = AfaOrgPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($afa);

      $this->getUser()->setFlash('success', 'Linking Organization information has been successfully deleted!');

      $afa->delete();
    }

    return $this->redirect('@afaOrg');
  }
}
