<?php
/**
 * companion actions.
 *
 * @package    angelflight
 * @subpackage companion
 * @author     Javzaa, Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class companionActions extends sfActions
{
  /**
   * Search companions
   * CODE: companion_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->companion_list = CompanionPeer::doSelect(new Criteria());

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = CompanionPeer::getPager(
          $this->max,
          $this->page,
          $this->firstname,
          $this->lastname,
          $this->name,
          $this->relationship
        );
        $this->companions = $this->pager->getResults();
    }
    $this->getUser()->addRecentItem('Companions', 'companions', 'companions/index');
  }

  /**
   * Search companions by filterss
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('companion', array(), 'companion');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['name'])) $params['name'] = null;
    if (!isset($params['relationship'])) $params['relationship'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['name']       = $request->getParameter('name');
      $params['relationship']       = $request->getParameter('relationship');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->name           = $params['name'];
    $this->relationship   = $params['relationship'];

    $this->getUser()->setAttribute('companion', $params, 'person');
  }

  /**
   * Creates and Saves a companion
   * CODE: companion_create
   */
  public function executeUpdate(sfWebRequest $request)
  { 
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    # id parameter is companion id which then edits
    if($request->hasParameter('id')) {
      $cmp = CompanionPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($cmp);
    }else{  
      #new companion adding to existing passenger
      $cmpnnPid = $request->getParameter('campnn[passenger_id]');
      $cmp = new Companion();
      if(isset($cmpnnPid)){
            $cmp->setPassengerId($cmpnnPid);
      }
      else{
            $cmp->setPassengerId($request->getParameter('passenger_id'));
      }
    }
    $itId = $request->getParameter('itId');
    #referer
    if ($request->hasParameter('referer')) {
      $this->referer = $request->getParameter('referer');
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : $this->generateUrl('companion', array(), true);
    }

    $form = new CompanionForm($cmp);

    if($request->getParameter('back')){
       $this->back = $request->getParameter('back');
    }
    # validate and save
    if ($request->isMethod('post'))
    { 
      $form->bind($request->getParameter($form->getName()));
      if ($form->isValid())
      { 
        $is_new = $form->isNew();
        if($is_new){
          $person = new Person();
          $names[] = split(" ", $form->getValue('name'));
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($form->getValue('companion_phone'));
          $person->setDayComment($form->getValue('companion_phone_comment'));
          $person->save();
          $comp = $form->getObject();
          $comp->setName($form->getValue('name'));
          $comp->setRelationship($form->getValue('relationship'));
          $comp->setDateOfBirth($form->getValue('date_of_birth'));
          $comp->setWeight($form->getValue('weight'));
          $comp->setCompanionPhone($form->getValue('companion_phone'));
          $comp->setCompanionPhoneComment($form->getValue('companion_phone_comment'));
          $comp->setPersonId($person->getId());
          $comp->save();
        }else{
          $form->save();
        }
        
        $this->getUser()->setFlash('success', 'Companion has successfully '.($is_new ?'created':'saved').'!');

        if($request->getParameter('back')){
          $this->redirect('companion/update?id='.$request->getParameter('back'));
        }

        if(isset($itId)){
            $this->redirect('itinerary_edit/'.$itId);
        }
        else {
            $this->redirect($this->referer);
        }
      }
    }

    $passenger = $cmp->getPassenger();
    $this->forward404Unless($passenger);
    $this->passenger = $passenger;

    $this->form = $form;
    $this->cmp = $cmp;
  }

  /**
   * Removes a companion and redirects to referer
   * CODE: companion_delete
   */
  public function executeDelete(sfWebRequest $request)
  {

    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    //if ($request->isMethod('delete')){
      $request->checkCSRFProtection();
      $cmp = CompanionPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($cmp);

      $cmp->delete();
      $this->getUser()->setFlash('success', 'Companion information has been successfully deleted!');
    //}
    return $this->redirect($request->getReferer() ? $request->getReferer() : '@companion');
  }

  public function executeAjaxNew(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $companion = new Companion();
    $companion->setPassengerId($request->getParameter('passenger_id'));

    $this->form = new CompanionForm($companion);

    $this->el_id = $request->getParameter('el_id');
  }

  public function executeAjaxCreate(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->form = new CompanionForm();
    
    $this->form->bind($request->getParameter($this->form->getName()));
    if ($this->form->isValid()) {

      //----------------------------------------------
       $person = new Person();
          $names[] = split(" ", $this->form->getValue('name'));
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($this->form->getValue('companion_phone'));
          $person->setDayComment($this->form->getValue('companion_phone_comment'));
          $person->save();
          $comp = $this->form->getObject();
          $comp->setPassengerId($this->form->getValue('passenger_id'));
          $comp->setName($this->form->getValue('name'));
          $comp->setRelationship($this->form->getValue('relationship'));
          $comp->setDateOfBirth($this->form->getValue('date_of_birth'));
          $comp->setWeight($this->form->getValue('weight'));
          $comp->setCompanionPhone($this->form->getValue('companion_phone'));
          $comp->setCompanionPhoneComment($this->form->getValue('companion_phone_comment'));
          $comp->setPersonId($person->getId());
          $comp->save();
      //----------------------------------------------


      //$companion = $this->form->save();
      $id = $comp->getId();
      $name = addslashes($comp->getName());
      $rel = addslashes($comp->getRelationship());
      return $this->renderText("<script type=\"text/javascript\">appendCompanion($id,'$name','$rel')</script>");
    }else{
      $this->setTemplate('ajaxNew');
      $this->el_id = $request->getParameter('el_id');
    }
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    $this->persons = PersonPeer::getFirstNames($this->keyword,"companion");
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"companion");
  }

  public function executePassengercompanions(sfWebRequest $request){
    $id = $request->getParameter('id');
    $this->passenger = PassengerPeer::retrieveByPK($id);
  }
}
