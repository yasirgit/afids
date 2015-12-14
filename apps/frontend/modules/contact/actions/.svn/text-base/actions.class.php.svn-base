<?php

/**
 * contact actions.
 *
 * @package    angelflight
 * @subpackage contact
 * @author     Ganbolor G
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class contactActions extends sfActions
{
  /**
   * Searches for contacts
   * CODE:contact_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = ContactPeer::getPager(
          $this->max,
          $this->page,
          $this->firstname,
          $this->lastname,
          $this->city,
          $this->state,
          $this->ref_source,
          $this->contact_type,
          $this->added_date1,
          $this->added_date2
        );
        $this->contact_list = $this->pager->getResults();
    }
    $this->ref_sources = RefSourcePeer::doSelect(new Criteria());
    $this->contact_types = ContactTypePeer::doSelect(new Criteria());
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('contact', array(), 'contact');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['ref_source'])) $params['ref_source'] = null;
    if (!isset($params['contact_type'])) $params['contact_type'] = null;
    if (!isset($params['added_date1'])) $params['added_date1'] = null;
    if (!isset($params['added_date2'])) $params['added_date2'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['city']           = $request->getParameter('city');
      $params['state']          = $request->getParameter('state');
      $params['ref_source'] = $request->getParameter('ref_source');
      $params['contact_type'] = $request->getParameter('contact_type');
      $params['added_date1'] = $request->getParameter('added_date1');
      $params['added_date2'] = $request->getParameter('added_date2');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->ref_source     = $params['ref_source'];
    $this->contact_type   = $params['contact_type'];
    $this->added_date1     = $params['added_date1'];
    $this->added_date2   = $params['added_date2'];

    $this->getUser()->setAttribute('contact', $params, 'contact');
  }

  /**
   * Searches for contact types
   * CODE:contact_type_index
   */
  public function executeIndexType(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->contact_type = ContactTypePeer::doSelect(new Criteria());
  }

  /**
   * Add or edit contact
   * CODE:contact_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }

    if($request->getParameter('id')){
      $contact = ContactPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Contact';
      $success = 'Contact Information has successfully updated!';

      $this->person = PersonPeer::retrieveByPK($contact->getPersonId());
    }else{
      $contact = New Contact();
      $this->title = 'Add Contact';
      $success = 'Contact Information has successfully created!';
    }
    $this->contact = $contact;
    $this->back = $request->getReferer();
    $this->form = new ContactForm($contact);

    if($request->isMethod('post')){
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('contact'));

      if($this->form->isValid() && $request->getParameter('person_id')){

        if($request->getParameter('person_id')){
          $contact->setPersonId($request->getParameter('person_id'));
        }

        if($this->form->getValue('ref_source_id') == 0){
          $contact->setRefSourceId(null);
        }else{
          $contact->setRefSourceId($this->form->getValue('ref_source_id'));
        }

        $contact->setSendAppFormat($this->form->getValue('send_app_format'));
        $contact->setComment($this->form->getValue('comment'));
        $contact->setLetterSent($this->form->getValue('letter_sent'));

        if($this->form->getValue('contact_type_id') == 0){
          $contact->setContactTypeId(null);
        }else{
          $contact->setContactTypeId($this->form->getValue('contact_type_id'));
        }

        if($this->form->isNew()){
          $contact->setDateAdded(date('Y-m-d'));
        }
        $contact->setDateUpdated(date('Y-m-d'));

        if($this->form->getValue('company_name') == 0){
          $contact->setCompanyName(null);
        }else{
          $contact->setCompanyName($this->form->getValue('company_name'));
        }

        $contact->save();

        $this->getUser()->setFlash('success',$success);

        $last = $request->getParameter('back');

        if(strstr($last,'person/view')){
          $back_url ='@person_view?id='.$request->getParameter('person_id');
        }else{
          $back_url = 'contact';
        }

        $this->redirect($back_url);
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@contact';
    }
    $this->contact = $contact;
  }

  /**
   * Add or edit contact type
   * CODE:contact_type_create
   */
  public function executeUpdateType(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('id')){
      $contact_type = ContactTypePeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Contact Type';
      $success = 'Contact Type Information has successfully created!';
    }else{
      $contact_type = New ContactType();
      $this->title = 'Edit Contact Type';
      $success = 'Contact Type Information has successfully created!';
    }

    $this->form = new ContactTypeForm($contact_type);

    if($request->isMethod('post')){
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('con_type'));

      if($this->form->isValid()){

        $contact_type->setContactTypeDesc($this->form->getValue('contact_type_desc'));
        $contact_type->save();

        $this->getUser()->setFlash('success',$success);
        $this->redirect('ctype');

      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@ctype';
    }
    $this->contact_type = $contact_type;
  }
  /**
   * TODO: Check related records.
   * CODE:contact_delete
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
      $contact = ContactPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($contact);

      $this->getUser()->setFlash('success', 'Contact information has been successfully deleted!');

      $contact->delete();
    }
    if($request->getReferer()){
      $back = $request->getReferer();
    }else{
      $back = 'contact';
    }
    return $this->redirect($back);
  }

  /**
   * TODO: Check related records.
   * CODE:contact_type_delete
   */
  public function executeTypeDelete(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->getUser()->setFlash('success','...');
    $this->redirect('contact');
    if ($request->isMethod('post'))
    {
      $contact = ContactPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($contact);

      $this->getUser()->setFlash('success', 'Contact information has been successfully deleted!');

      $contact->delete();
    }
    return $this->redirect('@contact');
  }

  public function executeAdd(sfWebRequest $request){
      $this->getUser()->setFlash('warning', 'Please select a person matches your contact, if no matches found, create a new person!');
      return $this->redirect('person/index?add_cont=1&filter=1');
  }

  public function executeView(sfWebRequest $request){

      $this->contact = ContactPeer::retrieveByPK($request->getParameter('id', 0));
      if(!isset($this->contact)){
          $this->getUser()->setFlash('error', 'Contact information not found!');
          return $this->redirect('contact/index');
      }
      
  }

  public function executeListRequest(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    # filter
    $params = $this->getUser()->getAttribute('contact_request', array(), 'contact_request');

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];

    $this->getUser()->setAttribute('contact_request', $params, 'contact_request');

    if($request->getParameter('graterOneDay') == 'ok')
        $this->grater_than_one = 1;
    else
        $this->grater_than_one = 0;

    $this->pager = ContactRequestPeer::getPager(
      $this->max,
      $this->page,
      $this->grater_than_one
    );
    $this->request_list = $this->pager->getResults();
    $this->total = count($this->request_list);
    if($this->total == 0){
        $this->getUser()->setFlash('warning', 'Sorry, There are currently no outstanding contact requests!');
    }
  }

  /**
   * TODO: Check related records.
   * CODE:contact_delete
   */
  public function executeDeleteRequest(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $req = ContactRequestPeer::retrieveByPK($request->getParameter('id'));

    $this->forward404Unless($request);

    $this->getUser()->setFlash('success', 'Contact request information has been successfully deleted!');

    $req->setProcessed(1);
    $req->save();

    return $this->redirect('contact/listRequest');
  }

  public function executeProcessRequest(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->application_temp = ContactRequestPeer::retrieveByPK($request->getParameter('id'));
    if(!isset($this->application_temp)) return $this->redirect('contact/listRequest');

    $this->processRequestFilter($request);
    $this->pager = PersonPeer::getRenewalProcessPager(
            $this->max,
            $this->page,
            $this->application_temp->getFirstName(),
            $this->application_temp->getLastName(),
            null,
            null,null,null,null,null,null,null,
            $this->application_temp->getZipcode()
    );
    $this->people = $this->pager->getResults();

    if(!$this->people) return $this->redirect('contact/processStep1?id='.$this->application_temp->getId());
    
  }

  protected function processRequestFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('request_temp_process', array(), 'person');

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    $this->page = $page = $request->getParameter('page', 1);
    $this->max  = $params['max'];

    $this->getUser()->setAttribute('request_temp_process', $params, 'person');
  }

  public function executeProcessStep1(sfWebRequest $request)
  {

    $this->application_temp = ContactRequestPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);

    $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    if ($this->person) {
      $this->application_temp->setPersonId($this->person->getId());
    }

    $this->form1 = new ContactRequestProcessStep1Form($this->application_temp);

    if ($request->isMethod('post')) {

        $this->processStep1Check($request, $this->form1);
    }

    $this->setTemplate('processSteps');
  }

  protected function processStep1Check(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $form->save();

      if ($this->person) $person_id = $this->person->getId(); else $person_id = null;

      $this->redirect('contact/processStep2?id='.$this->application_temp->getId().($person_id ? '&person_id='.$person_id : ''));
    }
  }

  public function executeProcessStep2(sfWebRequest $request)
  {
    $this->application_temp = ContactRequestPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);

    $this->person = PersonPeer::retrieveByPK($this->application_temp->getPersonId());

    $this->form2 = new ContactRequestProcessStep2Form($this->application_temp);

    if ($request->isMethod('post')) {
      $this->processStep2Check($request, $this->form2 );
    }

    $this->form1 = new ContactRequestProcessStep1Form($this->application_temp);

    $this->setTemplate('processSteps');
  }

  protected function processStep2Check(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->save();
    }
    
    $app = $this->application_temp;
    $person = $this->person;
    if (!($person instanceof Person)) {
      $person = new Person();
    }
    /* @var $app ContactRequest */
    /* @var $person Person */

    // Person
    $tmp_arr = $app->toArray(BasePeer::TYPE_FIELDNAME);
    $tmp_arr['evening_phone'] = $tmp_arr['eve_phone'];
    $tmp_arr['evening_comment'] = $tmp_arr['eve_comment'];
    $tmp_arr['fax_phone1'] = $tmp_arr['fax_phone'];
    $tmp_arr['fax_comment1'] = $tmp_arr['fax_comment'];
    unset($tmp_arr['id']);
    $person->fromArray($tmp_arr, BasePeer::TYPE_FIELDNAME);
    $person->save();

    // Contact
    $tmp_arr = $app->toArray(BasePeer::TYPE_FIELDNAME);
    $tmp_arr['letter_sent'] = $tmp_arr['letter_sent_date'];

    unset($tmp_arr['id']);

    $contact = new Contact();
    $contact->fromArray($tmp_arr, BasePeer::TYPE_FIELDNAME);
    $contact->setPersonId($person->getId());
    $contact->save();

    // ContactRequest
    $app->setPersonId($person->getId());
    $app->setProcessed(1);
    $app->save();

    $this->redirect('contact/processComplete?id='.$contact->getId());
  }

  public function executeProcessComplete(sfWebRequest $request)
  {
    $this->contact_id = $request->getParameter('id');
  }

  public function executeViewRequest(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->contact_request = ContactRequestPeer::retrieveByPk($request->getParameter('id'));
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "contact";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"contact");
  }
}
