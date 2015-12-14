<?php

/**
 * requester actions.
 *
 * @package    angelflight
 * @subpackage requester
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class requesterActions extends sfActions
{
  /**
   * Change requester to Mission Leg
   * CODE:requester_create
   */
  public function executeChange(sfWebRequest $request){

    #Security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->hasParameter('use_id')) {
      //$mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('for'));
      $mission = MissionPeer::retrieveByPK($request->getParameter('for'));
      $this->forward404Unless($mission);

      $change_requester= RequesterPeer::retrieveByPK($request->getParameter('use_id'));
      $this->forward404Unless($change_requester);

      /*if(isset($mission_leg)){
        if($mission_leg->getMissionId()){
          $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
        }
      }*/

      if(isset($mission)){
        $mission->setRequesterId($change_requester->getId());
        $mission->save();
      }

      $this->getUser()->setFlash('success', 'Change Requester have successfully changed!');

      //Return Mission Leg
      //$this->redirect('@leg_edit?id='.$mission_leg->getId());
      // Return to Mission
      $this->redirect('mission/view?id='.$mission->getId());
    }else{
      $this->redirect('@default_index?module=requester&mission_for='.$request->getParameter('for'));
    }
  }

  /**
   * Searches for requesters
   * CODE: requester_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }    

    if($request->hasParameter('mission_for')){
      //$mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('mission_for'));
      $this->mission_for = MissionPeer::retrieveByPK($request->getParameter('mission_for'));
      $this->can_use = 1;
    }else{
      $this->change_id = null;
    }

    $exclude_ids = array();
    if ($this->mission_for) $exclude_ids[] = $this->mission_for->getId();

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = RequesterPeer::getPager(
        $this->max,
        $this->page,
        $this->firstname,
        $this->lastname,
        $this->city,
        $this->state,
        $this->agency_name,
        $exclude_ids
        );
        $this->requesters = $this->pager->getResults();
    }
    # one result with member_id search will go to member view
    if (count($this->requesters) == 1) {
      if ($this->mission_for) $url_add = '&mission_for='.$this->mission_for->getId(); else $url_add = '';
      if ($request->getParameter('mission_for'))$this->redirect('@leg_edit?id='.$request->getParameter('mission_for').$url_add);
    }
    $this->getUser()->addRecentItem('Requesters', 'requesters', 'requester/index');
  }

  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('requester', array(), 'requester');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['agency_name'])) $params['agency_name'] = null;
    
    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['city']       = $request->getParameter('city');
      $params['state']       = $request->getParameter('state');
      $params['agency_name']       = $request->getParameter('agency_name');
      
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->agency_name    = $params['agency_name'];
   

    $this->getUser()->setAttribute('requester', $params, 'requester');
  }
  /**
   * Searches for requesters
   * CODE: person_index
   */
  public function executeFind(sfWebRequest $request){

    # security  
    if(!$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    } 

    # filter Person Find
    $this->processFilter2($request);
    $this->pager = PersonPeer::getNotInRequesterPager(
    $this->max,
    $this->page,
    $this->firstname,
    $this->lastname,
    $this->gender,
    $this->city,
    $this->state,
    $this->country,
    $this->county,
    $this->deceased,
    $this->deceased_until,
    $this->deceased_after
    );
    $this->persons = $this->pager->getResults();

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  private function processFilter2(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('person', array(), 'person');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['gender'])) $params['gender'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;
    if (!isset($params['county'])) $params['county'] = null;
    if (!isset($params['deceased'])) $params['deceased'] = null;
    if (!isset($params['deceased_until'])) $params['deceased_until'] = null;
    if (!isset($params['deceased_after'])) $params['deceased_after'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = sfConfig::get('app_countries');
    $this->genders = sfConfig::get('app_gender_types');

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['gender']         = (in_array($request->getParameter('gender'), array_keys($this->genders)) ? $request->getParameter('gender') : '');
      $params['city']           = $request->getParameter('city');
      $params['state']          = $request->getParameter('state');
      $params['country']        = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
      $params['county']         = $request->getParameter('county');
      $params['deceased']       = $request->getParameter('deceased');
      $params['deceased_until'] = $request->getParameter('deceased_until');
      $params['deceased_after'] = $request->getParameter('deceased_after');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->gender         = $params['gender'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->country        = $params['country'];
    $this->county         = $params['county'];
    $this->deceased       = $params['deceased'];
    $this->deceased_until = $params['deceased_until'];
    $this->deceased_after = $params['deceased_after'];

    $this->getUser()->setAttribute('person', $params, 'person');
  }

  /**
   * Add or edit requester 
   * CODE: requester_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
    # security   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('person_id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }

    if($request->getParameter('id')){
      $requester = RequesterPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($requester);

      if(isset($requester)){
        if($requester->getAgencyId()){
          $agency = AgencyPeer::retrieveByPK($requester->getAgencyId());
          if(isset($agency)){
            $this->agency_id = $agency->getId();
          }
        }
      }

      $this->title = 'Edit requester';
      $success = 'Requester information has been successfully edited!';

      $this->person = PersonPeer::retrieveByPK($requester->getPersonId());

    }else{
      $requester = new Requester();
      if ($request->getParameter('agency_id')){
        $this->agency_id = $request->getParameter('agency_id');
      }
      $this->title = 'Add requester';
      $success = 'Requester information has been successfully created!';
    }

    $this->agency = trim($this->getRequestParameter('agency', '*')) == '' ? '*' : trim($this->getRequestParameter('agency', '*'));

    #Agency PopUp Form
    $agency = new Agency();
    $this->form_a = new AgencyForm($agency);
    $this->a_referer = $request->getReferer();

    # requester Form
    $this->form = new RequesterForm($requester);
    $this->back = $request->getReferer();
    $this->requester = $requester;

    if(strstr($request->getReferer(),'person/view')){
      $this->f_back = 1;
    }

    if($request->hasParameter('last')){
      if($request->getParameter('f_back')){
        $this->f_back = 1;
      }
    }

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();

      $this->form->bind($request->getParameter('reqs'));

      if ($this->form->isValid()  && $request->getParameter('agency'))
      {
        if($request->getParameter('agency')){
          $agency = AgencyPeer::getByName($request->getParameter('agency'));
        }

        if($request->getParameter('person_id')){
          $person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
          $requester->setPersonId($person->getId());
        }

        if(isset($agency) && $agency instanceof Agency ){
          $requester->setAgencyId($agency->getId());
        }
        
        $requester->setTitle($this->form->getValue('title'));        
        $requester->setHowFindAf($this->form->getValue('how_find_af'));

        $requester->save();

        $this->getUser()->setFlash('success', $success);

        $last = $request->getParameter('back');

        $back_url = $last;

        if(strstr($last,'/requester')){
          $back_url = 'requester';
        }elseif(strstr($last,'/person/view')){
          $back_url = '@person_view?id='.$person->getId();
        }

        if($request->getParameter('last') == 1){
          $back_url = '@person_view?id='.$person->getId();
        }
        $this->redirect($back_url);

      }else{
        $this->getUser()->setFlash('success', 'Please select an Agency!');
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@requester';
    }
    $this->requester = $requester;
  }
  /**
   * TODO: Check related records.
   * CODE: requester_delete
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
		
		$requester = RequesterPeer::retrieveByPK($request->getParameter('id'));
		
		$this->forward404Unless($requester);
		
		//FK Constraint check
		//1.passenger
		if($requester->countPassengers()>0){
		  $this->getUser()->setFlash('warning', 'Requester has passengers.In order to delete, please delete related passenger information before!');
		  return $this->redirect('@requester');
		}
		
		//2-mission
		if($requester->countMissionsRelatedByRequesterId()>0 or $requester->countMissionsRelatedByOtherRequesterId()>0){
		  $this->getUser()->setFlash('warning', 'Requester has missions as requester or as other requester. In order to delete, please delete related mission information before!');
		  $this->redirect('@requester');
		}
				
		$requester->delete();
		$this->getUser()->setFlash('success', 'Requester information has been successfully deleted!');
    
    }
    if($request->getReferer()){
      $back =$request->getReferer();
    }else{
      $back ='@requester';
    }
    return $this->redirect($back);
  }


  /**
   * Get requester by ajax in popup
   * CODE: requester_create
   */
  public function executeUpdateAjax(sfWebRequest $request)
  {
    #security   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

   // $this->setLayout(false);

    $requester = new Requester();
    $this->requester = $requester;

    $this->form = new RequesterForm($requester);

    $this->back = $request->getReferer();

    $this->person_a_req = trim($this->getRequestParameter('person_a_req', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a_req', '*'));
    $this->agency = trim($this->getRequestParameter('agency', '*')) == '' ? '*' : trim($this->getRequestParameter('agency', '*'));

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form->bind($request->getParameter('reqs'));

      if ($this->form->isValid() && $request->getParameter('person_id') && $request->getParameter('agency_id'))
      {
        $requester->setPersonId($request->getParameter('person_id'));
        $requester->setAgencyId($request->getParameter('agency_id'));
        $requester->setTitle($this->form->getValue('title'));        
        $requester->setHowFindAf($this->form->getValue('how_find_af'));
        $requester->save();

        $person = $requester->getPerson();
        if(isset($person)){
          $name = $person->getId();
        }
        $this->man = $person;
        $this->requester_id = $requester->getId();
        $this->isSuccess = true;
        return sfView::SUCCESS;
        
      }else{
        if(!$request->getParameter('person_a_req') && !$request->getParameter('agency')){
          $this->person_needr = 1;
          $this->agency_need = 1;
        }elseif(!$request->getParameter('person_a_req')){
          $this->person_needr = 1;
        }elseif(!$request->getParameter('agency')){
          $this->agency_need = 1;
        }
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@requester';
    }
    $this->requester = $requester;
    //return $this->renderPartial("requester/updateAjax");
//    return $this->renderText(
//         get_partial('updateAjax',
//             array('requester' => $this->requester,
//                   'referer' => $this->referer,
//                   'agency_need' => $this->agency_need,
//                   'person_needr' => $this->person_needr,
//                   'requester_id' => $this->requester_id,
//                   'man' => $this->man,
//                   'form' => $this->form,
//                   'person_a_req' => $this->person_a_req,
//                   'agency' => $this->agency
//
//        )));
    
  }

  public function executeAutoComplete()
  {
    if($this->getRequestParameter('requester_a')){
      $this->key = $this->getRequestParameter('requester_a');
    }elseif($this->getRequestParameter('requester_p')){
      $this->key= $this->getRequestParameter('requester_p');
    }
    $this->keyword = $this->key;
    $this->requesters = RequesterPeer::getByFirstLetter($this->keyword);
  }

  public function executeAutoComplete1()
  {
    $this->name = $this->getRequestParameter('requester_a');
    $this->requesters = RequesterPeer::getByKeyword($this->name);
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "requester";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"requester");
  }

  public function executeAutoCompleteFirstNon()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "NoRequester";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
    //$this->setTemplate('AutoCompleteFirst');
  }

  public function executeAutoCompleteLastNon()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"NoRequester");
    //$this->setTemplate('AutoCompleteFirst');
  }
}
