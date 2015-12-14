<?php
/**
 * contact_request actions.
 *
 * @package    angelflight
 * @subpackage contact_request
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class contact_requestActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->contact_request_list = ContactRequestPeer::doSelect(new Criteria());
      $this->form = new ContactRequestForm();
  }

  public function executePilot(sfWebRequest $request)
  {
    $this->form = new ContactRequestForm();
  }

  public function executeThankyou()
  {
      
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ContactRequestForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('thankyou');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($contact_request = ContactRequestPeer::retrieveByPk($request->getParameter('id')), sprintf('Object contact_request does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactRequestForm($contact_request);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($contact_request = ContactRequestPeer::retrieveByPk($request->getParameter('id')), sprintf('Object contact_request does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContactRequestForm($contact_request);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($contact_request = ContactRequestPeer::retrieveByPk($request->getParameter('id')), sprintf('Object contact_request does not exist (%s).', $request->getParameter('id')));
    $contact_request->delete();

    $this->redirect('contact_request/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      $contact_req = new ContactRequest();
      $contact_req->setRequestDate(date('Y-m-d'));
      $contact_req->setTitle($request->getParameter('contact_request[title]'));
      $contact_req->setFirstName($request->getParameter('contact_request[first_name]'));
      $contact_req->setLastName($request->getParameter('contact_request[last_name]'));
      $contact_req->setAddress1($request->getParameter('contact_request[address1]'));
      $contact_req->setAddress2($request->getParameter('contact_request[address2]'));
      $contact_req->setCity($request->getParameter('contact_request[city]'));
      $contact_req->setState($request->getParameter('contact_request[state]'));
      $contact_req->setZipcode($request->getParameter('contact_request[zipcode]'));
      $contact_req->setCountry($request->getParameter('contact_request[country]'));
      $contact_req->setDayPhone($request->getParameter('contact_request[day_phone]'));
      $contact_req->setEvePhone($request->getParameter('contact_request[eve_phone]'));
      $contact_req->setFaxPhone($request->getParameter('contact_request[fax_phone]'));
      $contact_req->setMobilePhone($request->getParameter('contact_request[mobile_phone]'));
      $contact_req->setEmail($request->getParameter('contact_request[email]'));      
      $contact_req->setRefSourceId($request->getParameter('contact_request[ref_source_id]'));      
      $contact_req->setSendAppFormat($request->getParameter('contact_request[send_app_format]'));
      $contact_req->setComment($request->getParameter('contact_request[comment]'));

      //Set Session Id
      $sessionId = session_id();      
      $contact_req->setSessionId($sessionId);
      //end set session id

      $contact_req->setIpAddress($request->getRemoteAddress());
      $contact_req->save();      
      $this->redirect('contact_request/thankyou');
    }
  }
}
