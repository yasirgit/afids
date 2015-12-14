<?php

/**
 * passenger actions.
 *
 * @package    angelflight
 * @subpackage passenger
 * @author     Javzaa, Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class passengerActions extends sfActions
{
  /**
   * Change passenger to Mission Leg
   * CODE: passenger_create
   */
  public function executeChange(sfWebRequest $request)
  {

    
    if ($request->hasParameter('id'))
    {
      //$mission_leg = MissionLegPeer::retrieveByPK($request->getParameter('for'));
       $mission = MissionPeer::retrieveByPK($request->getParameter('for'));
      $this->forward404Unless($mission);

      $change_passenger = PassengerPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($change_passenger);

      /*if(isset($mission_leg))
      {
        if($mission_leg->getMissionId())
        {
          $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
        }
      }*/

      if(isset($mission))
      {
        $mission->setPassengerId($change_passenger->getId());
        $mission->save();
      }

      $this->getUser()->setFlash('success', 'Change passenger have successfully changed!');

      //Return Mission Leg
      //$this->redirect('@leg_edit?id='.$mission_leg->getId());
      // Return to Mission
      $this->redirect('mission/view?id='.$mission->getId());
    }else
    {
      $this->redirect('@default_index?module=passenger&mission_for='.$request->getParameter('for'));
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->hasParameter('mission_for'))
    {
      //$this->mission_for = MissionLegPeer::retrieveByPK($request->getParameter('mission_for'));
       $this->mission_for = MissionPeer::retrieveByPK($request->getParameter('mission_for'));
      $this->can_use = 1;
    }else
    {
      $this->change_id = null;
    }

    $exclude_ids = array();
    if ($this->mission_for) $exclude_ids[] = $this->mission_for->getId();

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', 'find_passenger'));

    # filter
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = PassengerPeer::getPager(
            $this->max,
            $this->page,
            $this->firstname,
            $this->lastname,
            $this->city,
            $this->state,
            $this->country,
            $this->county,
            $exclude_ids
        );
        $this->passengers = $this->pager->getResults();
    }

    # one result with member_id search will go to member view
    if (count($this->passengers) == 1)
    {
      if ($this->mission_for) $url_add = '&mission_for='.$this->mission_for->getId(); else $url_add = '';
      $this->redirect('@passenger_view?id='.$this->passengers[0]->getId().$url_add);
    }

    $this->getUser()->addRecentItem('Passenger', 'passenger', '/passenger/index?filter=1');
  }
  /**
   * passenger filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('passenger', array(), 'person');

    if (!isset($params['firstname'])) $params['firstname'] = null;
    if (!isset($params['lastname'])) $params['lastname'] = null;
    if (!isset($params['city'])) $params['city'] = null;
    if (!isset($params['state'])) $params['state'] = null;
    if (!isset($params['country'])) $params['country'] = null;
    if (!isset($params['county'])) $params['county'] = null;

    $this->max_array = array(5, 10, 20, 30);
    $this->countries = sfConfig::get('app_countries');

    if (in_array($request->getParameter('max'), $this->max_array))
    {
      $params['max'] = $request->getParameter('max');
    }else
    {
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter'))
    {
      $params['firstname']      = $request->getParameter('firstname');
      $params['lastname']       = $request->getParameter('lastname');
      $params['city']           = $request->getParameter('city');
      $params['state']          = $request->getParameter('state');
      $params['country']        = (in_array($request->getParameter('country'), array_keys($this->countries)) ? $request->getParameter('country') : '');
      $params['county']         = $request->getParameter('county');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->firstname      = $params['firstname'];
    $this->lastname       = $params['lastname'];
    $this->city           = $params['city'];
    $this->state          = $params['state'];
    $this->country        = $params['country'];
    $this->county         = $params['county'];

    $this->getUser()->setAttribute('passenger', $params, 'person');
  }
  /**
   * Find passenger
   * CODE: passenger_index
   */
  public function executeFind(sfWebRequest $request)
  {

    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    # filter Person Find
    $this->processFilter2($request);
    $this->pager = PersonPeer::getNotInPassengerPager(
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

    $this->camp_id = $request->getParameter('camp_id');

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

    if (in_array($request->getParameter('max'), $this->max_array))
    {
      $params['max'] = $request->getParameter('max');
    }else
    {
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter'))
    {
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

    $this->getUser()->setAttribute('passenger2', $params, 'person');
  }

  /**
   * CODE: passenger_create,person_view
   */
  public function executeStep1(sfWebRequest $request)
  {    

    $this->key = $request->getParameter('unique_key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }


    $cur_user = $this->getUser();
   

    if($cur_user->getAttribute('person'))
    {
      $this->person = $this->getUser()->getAttribute('person');
    }

    if($request->getParameter('person_id'))
    {
      $this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
    }

    if($request->getParameter('add_pass') && $request->getParameter('p_id'))
    {
      $passenger = new Passenger();
      $this->title = 'Last step : Add passenger';
      $success = 'Person and Passenger information succefully created!';

      $this->person = PersonPeer::retrieveByPK($request->getParameter('p_id'));
    }
    elseif($request->getParameter('add_pass_iti') && $request->getParameter('p_id'))
    {
      $return_path = $this->getUser()->getAttribute('return_path');

      if (!$return_path)
      {
        $this->getUser()->setAttribute('return_path', '@itinerary_create');
      }
      
      $passenger = new Passenger();
      $this->title = 'Last step : Add passenger';
      $success = 'Person and Passenger information succefully created!';

      $this->person = PersonPeer::retrieveByPK($request->getParameter('p_id'));
    }

    $passenger="";
    if($request->getParameter('id'))
    {
      $passenger =  PassengerPeer::retrieveByPK($request->getParameter('id'));
      $this->sub_title = 'Edit passenger';
      $success = 'Passenger information succefully edited!';

      $this->person = PersonPeer::retrieveByPK($passenger->getPersonId());

    }else
    {
      $passenger = new Passenger();
      $this->sub_title = 'Add passenger';
      $success = 'Passenger information has been successfully created!';
    }

    $this->passenger = $passenger;



    $this->form1 = new PassengerForm1($passenger);
    $this->back = $request->getReferer();
    $this->referer = $request->getReferer();
    $this->camp_id = $request->getParameter('camp_id');

    $count = 0;
    if(strstr($request->getReferer(),'/person/view'))
    {
      if($count ==0)
      {
        if($this->person)
        {
          $this->f_back = '@person_view?id='.$this->person->getId();
          $count++;
        }
      }
    }elseif(strstr($request->getReferer(),'/passenger/view'))
    {
      $this->f_back = '@passenger_view?id='.$passenger->getId();
    }

    if($request->isMethod('post'))
    {
      $this->form1->bind($request->getParameter('pass1'));

      if($this->form1->isValid())
      { 
        $passenger_session = $this->getUser()->getAttribute('passangers');
        //session
//        if (!$passenger_session)
//        {
//          $passenger_session = array($this->key => array());
//          $this->getUser()->setAttribute('passangers', $passenger_session);
//        }
//        else//if (!isset($passenger_session[$this->key]))
//        { //echo "asdfasdfasdf";die();
          $passenger_session[$this->key] = array('sub_title' => $this->sub_title ,'camp_id'=>$request->getParameter('camp_id'),'back'=>$request->getParameter('f_back'),'referer'=>$request->getParameter('referer'),'passenger'=>$passenger,'person'=>$this->person,'key'=>$this->key,'person_id'=>$this->person->getId(),'passenger_type_id'=>$request->getParameter('pass1[passenger_type_id]'),'parent'=>$request->getParameter('pass1[parent]'),'date_of_birth'=>$request->getParameter('pass1[date_of_birth]'),'illness'=>$request->getParameter('pass1[illness]'),'financial'=>$request->getParameter('pass1[financial]'),'weight'=>$request->getParameter('pass1[weight]'),'public_considerations'=>$request->getParameter('pass1[public_considerations]'),'private_considerations'=>$request->getParameter('pass1[private_considerations]'),'financial'=>$request->getParameter('pass1[financial]'),'passenger_illness_category_id'=>$request->getParameter('pass1[passenger_illness_category_id]'),'language_spoken'=>$request->getParameter('pass1[language_spoken]'),'best_contact_method'=>$request->getParameter('pass1[best_contact_method]'));
          $this->getUser()->setAttribute('passangers', $passenger_session[$this->key]);

          return $this->redirect('passenger/step2');
        //}
      }
    }else
    {
      
      $this->referer = $request->getReferer() ? $request->getReferer() : 'passenger/step1';
    }

    $this->form2 = new PassengerForm2();
    $this->form3 = new PassengerForm3();

    $this->passenger = $passenger;
  }

  /**
   * CODE: passenger_create,person_view
   */
  public function executeStep2(sfWebRequest $request)
  {
    $this->key = $request->getParameter('unique_key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }
   

    $this->setTemplate('step1');

    if(!$this->getUser()->getAttribute('passangers'))
    {
      return $this->forward('passenger', 'step1');
    }else
    {
      $passenger_session = $this->getUser()->getAttribute('passangers');
    }

    if($passenger_session['person'])
    {
      $this->person =$passenger_session['person'];
    }

    if(isset($passenger_session['passenger']))
    {
      $passenger = $passenger_session['passenger'];
    }else
    {
      $passenger =  new Passenger();
    }

    $this->form2 = new PassengerForm2($passenger);
    $this->sub_title = $passenger_session['sub_title'];


    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form2->bind($request->getParameter('pass2'));

      if($this->form2->isValid())
      {

        //step1
        $passenger_session['sub_title'] = $passenger_session['sub_title'];
        $passenger_session['back'] = $passenger_session['back'];
        $passenger_session['camp_id'] = $passenger_session['camp_id'];
        $passenger_session['referer'] = $passenger_session['referer'];
        $passenger_session['passenger'] = $passenger;
        $passenger_session['person_id'] = $passenger_session['person_id'];
        $passenger_session['passenger_type_id'] = $passenger_session['passenger_type_id'];
        $passenger_session['parent'] = $passenger_session['parent'];
        $passenger_session['date_of_birth'] = $passenger_session['date_of_birth'];
        $passenger_session['illness'] = $passenger_session['illness'];
        $passenger_session['financial'] = $passenger_session['financial'];
        $passenger_session['weight'] = $passenger_session['weight'];
        $passenger_session['public_considerations'] = $passenger_session['public_considerations'];
        $passenger_session['private_considerations'] = $passenger_session['private_considerations'];
        $passenger_session['financial'] = $passenger_session['financial'];
        $passenger_session['passenger_illness_category_id'] = $passenger_session['passenger_illness_category_id'];
        $passenger_session['language_spoken'] = $passenger_session['language_spoken'];
        $passenger_session['best_contact_method'] = $passenger_session['best_contact_method'];

        //step2
        $passenger_session['releasing_physician'] = $request->getParameter('pass2[releasing_physician]');
        $passenger_session['releasing_phone'] = $request->getParameter('pass2[releasing_phone]');
        $passenger_session['facility_name'] = $request->getParameter('pass2[facility_name]');
        $passenger_session['requester_id'] = $request->getParameter('pass2[requester_id]');
        $passenger_session['medical_release_requested'] = $request->getParameter('pass2[medical_release_requested]');
        $passenger_session['medical_release_received'] = $request->getParameter('pass2[medical_release_received]');
        $passenger_session['releasing_fax1'] = $request->getParameter('pass2[releasing_fax1]');
        $passenger_session['releasing_fax1_comment'] = $request->getParameter('pass2[releasing_fax1_comment]');
        $passenger_session['releasing_email'] = $request->getParameter('pass2[releasing_email]');
        $passenger_session['treating_physician'] = $request->getParameter('pass2[treating_physician]');
        $passenger_session['treating_phone'] = $request->getParameter('pass2[treating_phone]');
        $passenger_session['treating_fax1'] = $request->getParameter('pass2[treating_fax1]');
        $passenger_session['treating_fax1_comment'] = $request->getParameter('pass2[treating_fax1_comment]');
        $passenger_session['treating_email'] = $request->getParameter('pass2[treating_email]');
        $passenger_session['travel_history_notes'] = $request->getParameter('pass2[travel_history_notes]');
        $passenger_session['need_medical_release'] = $request->getParameter('pass2[need_medical_release]');
        $passenger_session['ground_transportation_comment'] = $request->getParameter('pass2[ground_transportation_comment]');

        $this->getUser()->setAttribute('passangers', $passenger_session);

        //echo var_dump($passenger_session['back']);die();
        return $this->redirect('passenger/step3');
      }
    }
    else
    {
      $this->referer = $request->getReferer() ? $request->getReferer() : 'passenger/step2';
    }

    $this->form1 = new PassengerForm1();

    $pass = $this->getUser()->getAttribute('passangers');

    $form1_data = array();

    foreach($this->form1 as $form_key => $form_data)
    {
      foreach($pass as $pass_key => $pass_data)
      {
        if($form_key == $pass_key)
        {
          $form1_data[$pass_key] = $pass_data;
        }
      }
    }

    $this->form1->bind($form1_data);

    $this->form3 =new PassengerForm3();

    $this->passenger = $passenger;
  }

  /**
   * CODE: passenger_create,person_view
   */
  public function executeStep3(sfWebRequest $request)
  {
    $this->key = $request->getParameter('unique_key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }

   
    $this->setTemplate('step1');

    if(!$this->getUser()->getAttribute('passangers'))
    {
      return $this->forward('passenger', 'step2');
    }else
    {
      $passenger_session = $this->getUser()->getAttribute('passangers');
    }

    if($passenger_session['person'])
    {
      $this->person =$passenger_session['person'];
    }

    if(isset($passenger_session['passenger']))
    {
      $passenger = $passenger_session['passenger'];
    }else
    {
      $passenger =  new Passenger();
    }

    $this->form3 = new PassengerForm3($passenger);
    $this->sub_title = $passenger_session['sub_title'];

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form3->bind($request->getParameter('pass3'));

      if($this->form3->isValid())
      {

        //step1
        $passenger_session['sub_title'] = $passenger_session['sub_title'];
        $passenger_session['back'] = $passenger_session['back'];
        $passenger_session['camp_id'] = $passenger_session['camp_id'];
        $passenger_session['referer'] = $passenger_session['referer'];
        $passenger_session['passenger'] = $passenger;
        $passenger_session['person_id'] = $passenger_session['person_id'];
        $passenger_session['passenger_type_id'] = $passenger_session['passenger_type_id'];
        $passenger_session['parent'] = $passenger_session['parent'];
        $passenger_session['date_of_birth'] = $passenger_session['date_of_birth'];
        $passenger_session['illness'] = $passenger_session['illness'];
        $passenger_session['financial'] = $passenger_session['financial'];
        $passenger_session['weight'] = $passenger_session['weight'];
        $passenger_session['public_considerations'] = $passenger_session['public_considerations'];
        $passenger_session['private_considerations'] = $passenger_session['private_considerations'];
        $passenger_session['financial'] = $passenger_session['financial'];
        $passenger_session['passenger_illness_category_id'] = $passenger_session['passenger_illness_category_id'];
        $passenger_session['language_spoken'] = $passenger_session['language_spoken'];
        $passenger_session['best_contact_method'] = $passenger_session['best_contact_method'];

        //step2
        $passenger_session['releasing_physician'] = $passenger_session['releasing_physician'];
        $passenger_session['releasing_phone'] = $passenger_session['releasing_phone'];
        $passenger_session['facility_name'] = $passenger_session['facility_name'] ;
        $passenger_session['requester_id'] =  $passenger_session['requester_id'];
        $passenger_session['medical_release_requested'] = $passenger_session['medical_release_requested'];
        $passenger_session['medical_release_received'] =   $passenger_session['medical_release_received'];
        $passenger_session['releasing_fax1'] = $passenger_session['releasing_fax1'];
        $passenger_session['releasing_fax1_comment'] =  $passenger_session['releasing_fax1_comment'];
        $passenger_session['releasing_email'] = $passenger_session['releasing_email'] ;
        $passenger_session['treating_physician'] =  $passenger_session['treating_physician'];
        $passenger_session['treating_phone]'] =  $passenger_session['treating_phone'];
        $passenger_session['treating_fax1'] =  $passenger_session['treating_fax1'];
        $passenger_session['treating_fax1_comment'] = $passenger_session['treating_fax1_comment'];
        $passenger_session['treating_email'] =  $passenger_session['treating_email'] ;
        $passenger_session['travel_history_notes'] =  $passenger_session['travel_history_notes'];
        $passenger_session['need_medical_release'] = $passenger_session['need_medical_release'];
        $passenger_session['ground_transportation_comment'] = $passenger_session['ground_transportation_comment'];

        //step3
        $passenger_session['lodging_name'] = $request->getParameter('pass3[lodging_name]');
        $passenger_session['lodging_phone'] = $request->getParameter('pass3[lodging_phone]');
        $passenger_session['lodging_phone_comment'] = $request->getParameter('pass3[lodging_phone_comment]');
        $passenger_session['facility_name'] = $request->getParameter('pass3[facility_name]');
        $passenger_session['facility_city'] = $request->getParameter('pass3[facility_city]');
        $passenger_session['facility_state'] = $request->getParameter('pass3[facility_state]');
        $passenger_session['facility_phone'] = $request->getParameter('pass3[facility_phone]');
        $passenger_session['facility_phone_comment'] = $request->getParameter('pass3[facility_phone_comment]');
        $passenger_session['requester_id'] = $request->getParameter('pass3[requester_id]');
        $passenger_session['emergency_contact_name'] = $request->getParameter('pass3[emergency_contact_name]');
        $passenger_session['emergency_contact_primary_phone'] = $request->getParameter('pass3[emergency_contact_primary_phone]');
        $passenger_session['emergency_contact_secondary_phone'] = $request->getParameter('pass3[emergency_contact_secondary_phone]');
        $passenger_session['emergency_contact_primary_comment'] = $request->getParameter('pass3[emergency_contact_primary_comment]');
        $passenger_session['emergency_contact_secondary_comment'] = $request->getParameter('pass3[emergency_contact_secondary_comment]');

        $this->getUser()->setAttribute('passangers', $passenger_session);
        return $this->redirect('passenger/save');
      }

    }else
    {
      $this->referer = $request->getReferer() ? $request->getReferer() : 'passenger/step3';
    }

    // set prevouis data to Step 1(form1)
    $this->form1 = new PassengerForm1();

    $pass = $this->getUser()->getAttribute('passangers');

    $form1_data = array();

    foreach($this->form1 as $form_key => $form_data)
    {
      foreach($pass as $pass_key => $pass_data)
      {
        if($form_key == $pass_key)
        {
          $form1_data[$pass_key] = $pass_data;
        }
      }
    }

    $this->form1->bind($form1_data);

    //set prevouis data to Step 2(form2)
    $this->form2 = new PassengerForm2();

    $form2_data = array();

    foreach($this->form2 as $form_key2 => $form_data2)
    {
      foreach($pass as $pass_key2 => $pass_data2)
      {
        if($form_key2 == $pass_key2)
        {
          $form2_data[$pass_key2] = $pass_data2;
        }
      }
    }

    $this->form2->bind($form2_data);
    $this->passenger = $passenger;
  }

  /**
   * CODE: passenger_create
   */
  public function executeSave(sfWebRequest $request)
  {
    

    $passenger_session = $this->getUser()->getAttribute('passangers');

    $camp_id = $passenger_session['camp_id'];
//    if (!$passenger_session)
//    {
//      return $this->forward('passanger', 'step3');
//    }

    //save
    if($passenger_session['sub_title'] === "Edit passenger")
    { //echo $passenger_session['sub_title'];die();
      $passenger = $passenger_session['passenger'];
      $success = 'Passenger information has been successfully edited!';
    }else
    {
      $passenger = new Passenger();
      $success = 'Passenger information has been successfully created!';
    }

    $passenger->setPersonId($passenger_session['person_id']);

    if($passenger_session['passenger_type_id'] == 0)
    {
      $passenger->setPassengerTypeId(null);
    }else
    {
      $passenger->setPassengerTypeId($passenger_session['passenger_type_id']);
    }

    $passenger->setParent($passenger_session['parent']);
    $passenger->setDateOfBirth($passenger_session['date_of_birth']);
    $passenger->setWeight($passenger_session['weight']);
    $passenger->setIllness($passenger_session['illness']);

    if($passenger_session['passenger_illness_category_id'] == 0)
    {
      $passenger->setPassengerIllnessCategoryId(null);
    }else
    {
      $passenger->setPassengerIllnessCategoryId($passenger_session['passenger_illness_category_id']);
    }

    $passenger->setLanguageSpoken($passenger_session['language_spoken']);
    $passenger->setBestContactMethod($passenger_session['best_contact_method']);
    $passenger->setFinancial($passenger_session['financial']);
    $passenger->setPublicConsiderations($passenger_session['public_considerations']);
    $passenger->setPrivateConsiderations($passenger_session['private_considerations']);
    $passenger->setGroundTransportationComment($passenger_session['ground_transportation_comment']);
    $passenger->setTravelHistoryNotes($passenger_session['travel_history_notes']);
    $passenger->setReleasingPhysician($passenger_session['releasing_physician']);
    $passenger->setReleasingPhone($passenger_session['releasing_phone']);
    $passenger->setReleasingFax1($passenger_session['releasing_fax1']);
    $passenger->setReleasingFax1Comment($passenger_session['releasing_fax1_comment']);
    $passenger->setReleasingEmail($passenger_session['releasing_email']);
    $passenger->setNeedMedicalRelease($passenger_session['need_medical_release']);
    $passenger->setMedicalReleaseRequested($passenger_session['medical_release_requested']);
    $passenger->setMedicalReleaseReceived($passenger_session['medical_release_received']);
    $passenger->setTreatingPhysician($passenger_session['treating_physician']);
    $passenger->setTreatingPhone($passenger_session['treating_phone']);
    //echo $passenger_session['treating_phone']; die();
    $passenger->setTreatingFax1($passenger_session['treating_fax1']);
    $passenger->setTreatingFax1Comment($passenger_session['treating_fax1_comment']);
    $passenger->setTreatingEmail($passenger_session['treating_email']);
    $passenger->setLanguageSpoken($passenger_session['language_spoken']);
    $passenger->setLodgingName($passenger_session['lodging_name']);
    $passenger->setLodgingPhone($passenger_session['lodging_phone']);
    $passenger->setLodgingPhoneComment($passenger_session['lodging_phone_comment']);
    $passenger->setFacilityName($passenger_session['facility_name']);
    $passenger->setFacilityCity($passenger_session['facility_city']);
    $passenger->setFacilityState($passenger_session['facility_state']);
    $passenger->setFacilityPhone($passenger_session['facility_phone']);
    $passenger->setFacilityPhoneComment($passenger_session['facility_phone_comment']);

    if($passenger_session['requester_id'] == 0)
    {
      $passenger->setRequesterId(null);
    }else
    {
      $passenger->setRequesterId($passenger_session['requester_id']);
    }

    $passenger->setEmergencyContactName($passenger_session['emergency_contact_name']);
    $passenger->setEmergencyContactPrimaryPhone($passenger_session['emergency_contact_primary_phone']);
    $passenger->setEmergencyContactPrimaryComment($passenger_session['emergency_contact_primary_comment']);
    $passenger->setEmergencyContactSecondaryPhone($passenger_session['emergency_contact_secondary_phone']);
    $passenger->setEmergencyContactSecondaryComment($passenger_session['emergency_contact_secondary_comment']);
    $newPass = false;
    if($passenger->isNew())
    {
      $person = PersonPeer::retrieveByPK($passenger_session['person_id']);
      $content = $this->getUser()->getName().' added new Passenger: '.$person->getFirstName();
      ActivityPeer::log($content);
      $newPass = true;
    }
    $passenger->save();

    //die("farazi");

    if($newPass){
      $passengerDest = new PassengerDest();
      $passengerDest->setPassengerId($passenger->getId());
      $passengerDest->setLodging($passenger_session['lodging_name']);
      $passengerDest->setFacility($passenger_session['facility_name']);
      $passengerDest->setFacilityCity($passenger_session['facility_city']);
      $passengerDest->setFacilityState($passenger_session['facility_state']);
      $passengerDest->setLodPhone($passenger_session['lodging_phone']);
      $passengerDest->setLodPhoneComment($passenger_session['lodging_phone_comment']);
      $passengerDest->setFacPhone($passenger_session['facility_phone']);
      $passengerDest->setFacilityPhoneComment($passenger_session['facility_phone_comment']);
      $passengerDest->save();
    }
    $return_path = $this->getUser()->getAttribute('return_path');
    
    if ($return_path)
    {
      $this->getUser()->setAttribute('return_path', null);
      $success = "Passenger information has been successfully created: Passenger lastname - ".$person->getLastName();
    }

    $this->getUser()->setFlash('success', $success);    
    
    if($this->getUser()->getAttribute('passangers'))
    {
      $pass = $this->getUser()->getAttribute('passangers');
      $back = $pass['back'];
      $last= $pass['referer'];
      
    }
        
    $back_url = 'passenger';

    //    if($last || $back){
    //      if(strstr($back,'@passenger_view')){
    //        if($passenger_session['person_id']){
    //          $back_url = '@passenger_view?id='.$passenger->getId();
    //        }
    //      }elseif(strstr($back,'@person_view')){
    //        $back_url = $back;
    //      }elseif(strstr($last,'/mission/view/')){
    //        $back_url = $last;
    //      }
    //    }

    if($last)
    {
      $back_url = $last;
    }

    if($back)
    {
      $back_url = $back;
    }

    if($camp_id){
      $campPassenger = new CampPassenger();
      $campPassenger->setCampId($camp_id);
      $campPassenger->setPassengerId($passenger->getId());
      $campPassenger->save();
      $this->redirect('/camp/view/id/'.$camp_id);
    }

    // redirecting blah
    
    if ($return_path)
    {
      $this->redirect($return_path);
    }

    //    echo var_dump($back_url);die();

    

    //removing used session like passenger data
    unset($passenger_session[$key]);
    $this->getUser()->setAttribute('passangers', $passenger_session);

    if(strstr($back_url,'/mission/view/')){
        $this->redirect($back_url);        
    }
    //echo $passenger->getId();
    //die("farazi");
    
    //$personId=$passenger_session['person_id'];
    //$urlGet="/person/view/".$personId;

    $passId=$passenger->getId();
    $urlGet="/passenger/view/".$passId;
    //die($urlGet);
    $this->redirect($urlGet);

  }

  //  Add Passenger Step 5
  public function executeStepped5(sfWebRequest $request)
  {

    $passenger = new Passenger();
    $this->title = 'Add passenger';
    $success = 'Passenger information has been successfully created!';

    $this->key = $request->getParameter('key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }

    $this->form = new PassengerForm5_1($passenger);
    $this->sub_title = 'Add Passenger';

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('pass5_1'));

      if($this->form->isValid())
      {
        $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');
        //session
        if (!$passenger_session_step5)
        {
          $passenger_session_step5 = array($this->key => array());
          $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5);
        }
        elseif (!isset($passenger_session_step5[$this->key]))
        {

          $passenger_session_step5[$this->key] = array('key'=>$this->key,'title'=>$request->getParameter('pass5_1[title]'),'firstname'=>$request->getParameter('pass5_1[first_name]'),'middlename'=>$request->getParameter('pass5_1[middle_name]'),'lastname'=>$request->getParameter('pass5_1[last_name]'),'suffix'=>$request->getParameter('pass5_1[suffix]'),'nickname'=>$request->getParameter('pass5_1[nickname]'),'gender'=>$request->getParameter('pass5_1[gender]'),'address1'=>$request->getParameter('pass5_1[address1]'),'address2'=>$request->getParameter('pass5_1[address2]'),'city'=>$request->getParameter('pass5_1[city]'),'county'=>$request->getParameter('pass5_1[county]'),'state'=>$request->getParameter('pass5_1[state]'),'zipcode'=>$request->getParameter('pass5_1[zipcode][zip]'),'country'=>$request->getParameter('pass5_1[country]'),'blockmailings'=>$request->getParameter('pass5_1[block_mailings]'),'newsletter'=>$request->getParameter('pass5_1[block_mailings]'),'email'=>$request->getParameter('pass5_1[email]'),'secemail'=>$request->getParameter('pass5_1[secondary_email]'),'emailblocked'=>$request->getParameter('pass5_1[email_blocked]'),'textonly'=>$request->getParameter('pass5_1[email_text_only]'),'comment'=>$request->getParameter('pass5_1[comment]'),'military'=>$request->getParameter('pass5_1[veteran]'),'deceased'=>$request->getParameter('pass5_1[deceased]'),'deceased_date'=>$request->getParameter('pass5_1[deceased_date]'),'deceased_comment'=>$request->getParameter('pass5_1[deceased_comment]'),'day_phone'=>$request->getParameter('pass5_1[day_phone]'),'day_comment'=>$request->getParameter('pass5_1[day_comment]'),'eve_phone'=>$request->getParameter('pass5_1[evening_phone]'),'eve_comment'=>$request->getParameter('pass5_1[evening_comment]'),'mobile_phone'=>$request->getParameter('pass5_1[mobile_phone]'),'mobile_comment'=>$request->getParameter('pass5_1[mobile_comment]'),'pager_phone'=>$request->getParameter('pass5_1[pager_phone]'),'pager_comment'=>$request->getParameter('pass5_1[pager_comment]'),'pager_email'=>$request->getParameter('pass5_1[pager_email]'),'other_comment'=>$request->getParameter('pass5_1[other_comment]'),'other_phone'=>$request->getParameter('pass5_1[other_phone]'),'fax_phone1'=>$request->getParameter('pass5_1[fax_phone1]'),'fax_comment1'=>$request->getParameter('pass5_1[fax_comment1]'),'auto_fax'=>$request->getParameter('pass5_1[auto_fax]'),'fax_phone2'=>$request->getParameter('pass5_1[fax_phone2]'),'fax_comment2'=>$request->getParameter('pass5_1[fax_comment2]'));
          $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5[$this->key]);
          return $this->redirect('passenger/step5_2');
        }
      }
    }else
    {
    }
    $this->passenger = $passenger;
  }

  public function executeStep5_2(sfWebRequest $request)
  {
    $this->setTemplate('stepped5');

    if(!$this->getUser()->getAttribute('passangers_step5'))
    {
      return $this->forward('passenger', 'stepped5');
    }else
    {
      $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');
    }

    $passenger = new Passenger();
    $this->form = new PassengerForm5_2($passenger);
    $this->sub_title = 'Add Passenger';

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('pass5_2'));

      if($this->form->isValid())
      {

        //step1 - Person data
        $passenger_session_step5['title'] = $passenger_session_step5['title'];
        $passenger_session_step5['firstname'] = $passenger_session_step5['firstname'];
        $passenger_session_step5['middlename'] = $passenger_session_step5['middlename'];
        $passenger_session_step5['lastname'] = $passenger_session_step5['lastname'];
        $passenger_session_step5['suffix'] = $passenger_session_step5['suffix'];
        $passenger_session_step5['nickname'] = $passenger_session_step5['nickname'];
        $passenger_session_step5['gender'] = $passenger_session_step5['gender'];
        $passenger_session_step5['address1'] = $passenger_session_step5['address1'];
        $passenger_session_step5['address2'] = $passenger_session_step5['address2'];
        $passenger_session_step5['city'] = $passenger_session_step5['city'];
        $passenger_session_step5['county'] = $passenger_session_step5['county'];
        $passenger_session_step5['state'] = $passenger_session_step5['state'];
        $passenger_session_step5['zipcode'] = $passenger_session_step5['zipcode'];
        $passenger_session_step5['country'] = $passenger_session_step5['country'];
        $passenger_session_step5['blockmailings'] = $passenger_session_step5['blockmailings'];
        $passenger_session_step5['newsletter'] = $passenger_session_step5['newsletter'];
        $passenger_session_step5['email'] = $passenger_session_step5['email'];
        $passenger_session_step5['secemail'] = $passenger_session_step5['secemail'];
        $passenger_session_step5['emailblocked'] = $passenger_session_step5['emailblocked'];
        $passenger_session_step5['textonly'] = $passenger_session_step5['textonly'];
        $passenger_session_step5['comment'] = $passenger_session_step5['comment'];
        $passenger_session_step5['military'] = $passenger_session_step5['military'];
        $passenger_session_step5['deceased'] = $passenger_session_step5['deceased'];
        $passenger_session_step5['deceased_date'] = $passenger_session_step5['deceased_date'];
        $passenger_session_step5['deceased_comment'] = $passenger_session_step5['deceased_comment'];
        $passenger_session_step5['day_phone'] = $passenger_session_step5['day_phone'];
        $passenger_session_step5['day_comment'] = $passenger_session_step5['day_comment'];
        $passenger_session_step5['eve_phone'] = $passenger_session_step5['eve_phone'];
        $passenger_session_step5['eve_comment'] = $passenger_session_step5['eve_comment'];
        $passenger_session_step5['mobile_phone'] = $passenger_session_step5['mobile_phone'];
        $passenger_session_step5['mobile_comment'] = $passenger_session_step5['mobile_comment'];
        $passenger_session_step5['pager_phone'] = $passenger_session_step5['pager_phone'];
        $passenger_session_step5['pager_comment'] = $passenger_session_step5['pager_comment'];
        $passenger_session_step5['pager_email'] = $passenger_session_step5['pager_email'];
        $passenger_session_step5['other_comment'] = $passenger_session_step5['other_comment'];
        $passenger_session_step5['other_phone'] = $passenger_session_step5['other_phone'];
        $passenger_session_step5['fax_phone1'] = $passenger_session_step5['fax_phone1'];
        $passenger_session_step5['fax_comment1'] = $passenger_session_step5['fax_comment1'];
        $passenger_session_step5['auto_fax'] = $passenger_session_step5['auto_fax'];
        $passenger_session_step5['fax_phone2'] = $passenger_session_step5['fax_phone2'];
        $passenger_session_step5['fax_comment2'] = $passenger_session_step5['fax_comment2'];


        //step2
        $passenger_session_step5['passenger_type_id'] = $request->getParameter('pass5_2[passenger_type_id]');
        $passenger_session_step5['parent'] = $request->getParameter('pass5_2[parent]');
        $passenger_session_step5['date_of_birth'] = $request->getParameter('pass5_2[date_of_birth]');
        $passenger_session_step5['illness'] = $request->getParameter('pass5_2[illness]');
        $passenger_session_step5['financial'] = $request->getParameter('pass5_2[financial]');
        $passenger_session_step5['weight'] = $request->getParameter('pass5_2[weight]');
        $passenger_session_step5['public_considerations'] = $request->getParameter('pass5_2[public_considerations]');
        $passenger_session_step5['private_considerations'] = $request->getParameter('pass5_2[private_considerations]');
        $passenger_session_step5['passenger_illness_category_id'] = $request->getParameter('pass5_2[passenger_illness_category_id]');
        $passenger_session_step5['language_spoken'] = $request->getParameter('pass5_2[language_spoken]');
        $passenger_session_step5['best_contact_method'] = $request->getParameter('pass5_2[best_contact_method]');

        $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5);

        return $this->redirect('passenger/step5_3');
      }
    }
  }

  public function executeStep5_3(sfWebRequest $request)
  {

    $this->setTemplate('stepped5');

    if(!$this->getUser()->getAttribute('passangers_step5'))
    {
      return $this->forward('passenger', 'step5_2');
    }else
    {
      $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');
    }

    $passenger = new Passenger();
    $this->form = new PassengerForm5_3($passenger);
    $this->sub_title = 'Add Passenger';

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('pass5_3'));

      if($this->form->isValid())
      {
        //step1 - Person data
        $passenger_session_step5['title'] = $passenger_session_step5['title'];
        $passenger_session_step5['firstname'] = $passenger_session_step5['firstname'];
        $passenger_session_step5['middlename'] = $passenger_session_step5['middlename'];
        $passenger_session_step5['lastname'] = $passenger_session_step5['lastname'];
        $passenger_session_step5['suffix'] = $passenger_session_step5['suffix'];
        $passenger_session_step5['nickname'] = $passenger_session_step5['nickname'];
        $passenger_session_step5['gender'] = $passenger_session_step5['gender'];
        $passenger_session_step5['address1'] = $passenger_session_step5['address1'];
        $passenger_session_step5['address2'] = $passenger_session_step5['address2'];
        $passenger_session_step5['city'] = $passenger_session_step5['city'];
        $passenger_session_step5['county'] = $passenger_session_step5['county'];
        $passenger_session_step5['state'] = $passenger_session_step5['state'];
        $passenger_session_step5['zipcode'] = $passenger_session_step5['zipcode'];
        $passenger_session_step5['country'] = $passenger_session_step5['country'];
        $passenger_session_step5['blockmailings'] = $passenger_session_step5['blockmailings'];
        $passenger_session_step5['newsletter'] = $passenger_session_step5['newsletter'];
        $passenger_session_step5['email'] = $passenger_session_step5['email'];
        $passenger_session_step5['secemail'] = $passenger_session_step5['secemail'];
        $passenger_session_step5['emailblocked'] = $passenger_session_step5['emailblocked'];
        $passenger_session_step5['textonly'] = $passenger_session_step5['textonly'];
        $passenger_session_step5['comment'] = $passenger_session_step5['comment'];
        $passenger_session_step5['military'] = $passenger_session_step5['military'];
        $passenger_session_step5['deceased'] = $passenger_session_step5['deceased'];
        $passenger_session_step5['deceased_date'] = $passenger_session_step5['deceased_date'];
        $passenger_session_step5['deceased_comment'] = $passenger_session_step5['deceased_comment'];
        $passenger_session_step5['day_phone'] = $passenger_session_step5['day_phone'];
        $passenger_session_step5['day_comment'] = $passenger_session_step5['day_comment'];
        $passenger_session_step5['eve_phone'] = $passenger_session_step5['eve_phone'];
        $passenger_session_step5['eve_comment'] = $passenger_session_step5['eve_comment'];
        $passenger_session_step5['mobile_phone'] = $passenger_session_step5['mobile_phone'];
        $passenger_session_step5['mobile_comment'] = $passenger_session_step5['mobile_comment'];
        $passenger_session_step5['pager_phone'] = $passenger_session_step5['pager_phone'];
        $passenger_session_step5['pager_comment'] = $passenger_session_step5['pager_comment'];
        $passenger_session_step5['pager_email'] = $passenger_session_step5['pager_email'];
        $passenger_session_step5['other_comment'] = $passenger_session_step5['other_comment'];
        $passenger_session_step5['other_phone'] = $passenger_session_step5['other_phone'];
        $passenger_session_step5['fax_phone1'] = $passenger_session_step5['fax_phone1'];
        $passenger_session_step5['fax_comment1'] = $passenger_session_step5['fax_comment1'];
        $passenger_session_step5['auto_fax'] = $passenger_session_step5['auto_fax'];
        $passenger_session_step5['fax_phone2'] = $passenger_session_step5['fax_phone2'];
        $passenger_session_step5['fax_comment2'] = $passenger_session_step5['fax_comment2'];


        //step2
        $passenger_session_step5['passenger_type_id'] = $passenger_session_step5['passenger_type_id'];
        $passenger_session_step5['parent'] = $passenger_session_step5['parent'];
        $passenger_session_step5['date_of_birth'] = $passenger_session_step5['date_of_birth'];
        $passenger_session_step5['illness'] = $passenger_session_step5['illness'];
        $passenger_session_step5['financial'] = $passenger_session_step5['financial'];
        $passenger_session_step5['weight'] = $passenger_session_step5['weight'];
        $passenger_session_step5['public_considerations'] = $passenger_session_step5['public_considerations'];
        $passenger_session_step5['private_considerations'] = $passenger_session_step5['private_considerations'];
        $passenger_session_step5['passenger_illness_category_id'] = $passenger_session_step5['passenger_illness_category_id'];
        $passenger_session_step5['language_spoken'] = $passenger_session_step5['language_spoken'];
        $passenger_session_step5['best_contact_method'] = $passenger_session_step5['best_contact_method'];

        //step3
        $passenger_session_step5['releasing_physician'] = $request->getParameter('pass5_3[releasing_physician]');
        $passenger_session_step5['releasing_phone'] = $request->getParameter('pass5_3[releasing_phone]');
        $passenger_session_step5['medical_release_requested'] = $request->getParameter('pass5_3[medical_release_requested]');
        $passenger_session_step5['medical_release_received'] = $request->getParameter('pass5_3[medical_release_received]');
        $passenger_session_step5['releasing_fax1'] = $request->getParameter('pass5_3[releasing_fax1]');
        $passenger_session_step5['releasing_fax1_comment'] = $request->getParameter('pass5_3[releasing_fax1_comment]');
        $passenger_session_step5['releasing_email'] = $request->getParameter('pass5_3[releasing_email]');
        $passenger_session_step5['treating_physician'] = $request->getParameter('pass5_3[treating_physician]');
        $passenger_session_step5['treating_phone'] = $request->getParameter('pass5_3[treating_phone]');

        $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5);

        return $this->redirect('passenger/step5_4');
      }
    }
  }

  public function executeStep5_4(sfWebRequest $request)
  {
    $this->setTemplate('stepped5');

    if(!$this->getUser()->getAttribute('passangers_step5'))
    {
      return $this->forward('passenger', 'step5_3');
    }else
    {
      $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');
    }

    $passenger = new Passenger();
    $this->form = new PassengerForm5_4($passenger);
    $this->sub_title = 'Add Passenger';

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('pass5_4'));

      if($this->form->isValid())
      {
        //step1 - Person data
        $passenger_session_step5['title'] = $passenger_session_step5['title'];
        $passenger_session_step5['firstname'] = $passenger_session_step5['firstname'];
        $passenger_session_step5['middlename'] = $passenger_session_step5['middlename'];
        $passenger_session_step5['lastname'] = $passenger_session_step5['lastname'];
        $passenger_session_step5['suffix'] = $passenger_session_step5['suffix'];
        $passenger_session_step5['nickname'] = $passenger_session_step5['nickname'];
        $passenger_session_step5['gender'] = $passenger_session_step5['gender'];
        $passenger_session_step5['address1'] = $passenger_session_step5['address1'];
        $passenger_session_step5['address2'] = $passenger_session_step5['address2'];
        $passenger_session_step5['city'] = $passenger_session_step5['city'];
        $passenger_session_step5['county'] = $passenger_session_step5['county'];
        $passenger_session_step5['state'] = $passenger_session_step5['state'];
        $passenger_session_step5['zipcode'] = $passenger_session_step5['zipcode'];
        $passenger_session_step5['country'] = $passenger_session_step5['country'];
        $passenger_session_step5['blockmailings'] = $passenger_session_step5['blockmailings'];
        $passenger_session_step5['newsletter'] = $passenger_session_step5['newsletter'];
        $passenger_session_step5['email'] = $passenger_session_step5['email'];
        $passenger_session_step5['secemail'] = $passenger_session_step5['secemail'];
        $passenger_session_step5['emailblocked'] = $passenger_session_step5['emailblocked'];
        $passenger_session_step5['textonly'] = $passenger_session_step5['textonly'];
        $passenger_session_step5['comment'] = $passenger_session_step5['comment'];
        $passenger_session_step5['military'] = $passenger_session_step5['military'];
        $passenger_session_step5['deceased'] = $passenger_session_step5['deceased'];
        $passenger_session_step5['deceased_date'] = $passenger_session_step5['deceased_date'];
        $passenger_session_step5['deceased_comment'] = $passenger_session_step5['deceased_comment'];
        $passenger_session_step5['day_phone'] = $passenger_session_step5['day_phone'];
        $passenger_session_step5['day_comment'] = $passenger_session_step5['day_comment'];
        $passenger_session_step5['eve_phone'] = $passenger_session_step5['eve_phone'];
        $passenger_session_step5['eve_comment'] = $passenger_session_step5['eve_comment'];
        $passenger_session_step5['mobile_phone'] = $passenger_session_step5['mobile_phone'];
        $passenger_session_step5['mobile_comment'] = $passenger_session_step5['mobile_comment'];
        $passenger_session_step5['pager_phone'] = $passenger_session_step5['pager_phone'];
        $passenger_session_step5['pager_comment'] = $passenger_session_step5['pager_comment'];
        $passenger_session_step5['pager_email'] = $passenger_session_step5['pager_email'];
        $passenger_session_step5['other_comment'] = $passenger_session_step5['other_comment'];
        $passenger_session_step5['other_phone'] = $passenger_session_step5['other_phone'];
        $passenger_session_step5['fax_phone1'] = $passenger_session_step5['fax_phone1'];
        $passenger_session_step5['fax_comment1'] = $passenger_session_step5['fax_comment1'];
        $passenger_session_step5['auto_fax'] = $passenger_session_step5['auto_fax'];
        $passenger_session_step5['fax_phone2'] = $passenger_session_step5['fax_phone2'];
        $passenger_session_step5['fax_comment2'] = $passenger_session_step5['fax_comment2'];


        //step2
        $passenger_session_step5['passenger_type_id'] = $passenger_session_step5['passenger_type_id'];
        $passenger_session_step5['parent'] = $passenger_session_step5['parent'];
        $passenger_session_step5['date_of_birth'] = $passenger_session_step5['date_of_birth'];
        $passenger_session_step5['illness'] = $passenger_session_step5['illness'];
        $passenger_session_step5['financial'] = $passenger_session_step5['financial'];
        $passenger_session_step5['weight'] = $passenger_session_step5['weight'];
        $passenger_session_step5['public_considerations'] = $passenger_session_step5['public_considerations'];
        $passenger_session_step5['private_considerations'] = $passenger_session_step5['private_considerations'];
        $passenger_session_step5['passenger_illness_category_id'] = $passenger_session_step5['passenger_illness_category_id'];
        $passenger_session_step5['language_spoken'] = $passenger_session_step5['language_spoken'];
        $passenger_session_step5['best_contact_method'] = $passenger_session_step5['best_contact_method'];

        //step3
        $passenger_session_step5['releasing_physician'] = $passenger_session_step5['releasing_physician'] ;
        $passenger_session_step5['releasing_phone'] =  $passenger_session_step5['releasing_phone'] ;
        $passenger_session_step5['medical_release_requested'] = $passenger_session_step5['medical_release_requested'];
        $passenger_session_step5['medical_release_received'] = $passenger_session_step5['medical_release_received'] ;
        $passenger_session_step5['releasing_fax1'] = $passenger_session_step5['releasing_fax1'];
        $passenger_session_step5['releasing_fax1_comment'] = $passenger_session_step5['releasing_fax1_comment'];
        $passenger_session_step5['releasing_email'] = $passenger_session_step5['releasing_email'] ;
        $passenger_session_step5['treating_physician'] = $passenger_session_step5['treating_physician'];
        $passenger_session_step5['treating_phone'] = $passenger_session_step5['treating_phone'];


        //step4
        $passenger_session_step5['treating_fax1'] = $request->getParameter('pass5_4[treating_fax1]');
        $passenger_session_step5['treating_fax1_comment'] = $request->getParameter('pass5_4[treating_fax1_comment]');
        $passenger_session_step5['treating_email'] = $request->getParameter('pass5_4[treating_email]');
        $passenger_session_step5['travel_history_notes'] = $request->getParameter('pass5_4[travel_history_notes]');
        $passenger_session_step5['need_medical_release'] = $request->getParameter('pass5_4[need_medical_release]');
        $passenger_session_step5['ground_transportation_comment'] = $request->getParameter('pass5_4[ground_transportation_comment]');

        $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5);


        return $this->redirect('passenger/step5_5');
      }
    }
  }

  public function executeStep5_5(sfWebRequest $request)
  {
    $this->setTemplate('stepped5');

    if(!$this->getUser()->getAttribute('passangers_step5'))
    {
      return $this->forward('passenger', 'step5_4');
    }else
    {
      $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');
    }

    $passenger = new Passenger();
    $this->form = new PassengerForm5_5($passenger);
    $this->sub_title = 'Add Passenger';

    if($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('pass5_5'));

      if($this->form->isValid())
      {
        //step1 - Person data
        $passenger_session_step5['title'] = $passenger_session_step5['title'];
        $passenger_session_step5['firstname'] = $passenger_session_step5['firstname'];
        $passenger_session_step5['middlename'] = $passenger_session_step5['middlename'];
        $passenger_session_step5['lastname'] = $passenger_session_step5['lastname'];
        $passenger_session_step5['suffix'] = $passenger_session_step5['suffix'];
        $passenger_session_step5['nickname'] = $passenger_session_step5['nickname'];
        $passenger_session_step5['gender'] = $passenger_session_step5['gender'];
        $passenger_session_step5['address1'] = $passenger_session_step5['address1'];
        $passenger_session_step5['address2'] = $passenger_session_step5['address2'];
        $passenger_session_step5['city'] = $passenger_session_step5['city'];
        $passenger_session_step5['county'] = $passenger_session_step5['county'];
        $passenger_session_step5['state'] = $passenger_session_step5['state'];
        $passenger_session_step5['zipcode'] = $passenger_session_step5['zipcode'];
        $passenger_session_step5['country'] = $passenger_session_step5['country'];
        $passenger_session_step5['blockmailings'] = $passenger_session_step5['blockmailings'];
        $passenger_session_step5['newsletter'] = $passenger_session_step5['newsletter'];
        $passenger_session_step5['email'] = $passenger_session_step5['email'];
        $passenger_session_step5['secemail'] = $passenger_session_step5['secemail'];
        $passenger_session_step5['emailblocked'] = $passenger_session_step5['emailblocked'];
        $passenger_session_step5['textonly'] = $passenger_session_step5['textonly'];
        $passenger_session_step5['comment'] = $passenger_session_step5['comment'];
        $passenger_session_step5['military'] = $passenger_session_step5['military'];
        $passenger_session_step5['deceased'] = $passenger_session_step5['deceased'];
        $passenger_session_step5['deceased_date'] = $passenger_session_step5['deceased_date'];
        $passenger_session_step5['deceased_comment'] = $passenger_session_step5['deceased_comment'];
        $passenger_session_step5['day_phone'] = $passenger_session_step5['day_phone'];
        $passenger_session_step5['day_comment'] = $passenger_session_step5['day_comment'];
        $passenger_session_step5['eve_phone'] = $passenger_session_step5['eve_phone'];
        $passenger_session_step5['eve_comment'] = $passenger_session_step5['eve_comment'];
        $passenger_session_step5['mobile_phone'] = $passenger_session_step5['mobile_phone'];
        $passenger_session_step5['mobile_comment'] = $passenger_session_step5['mobile_comment'];
        $passenger_session_step5['pager_phone'] = $passenger_session_step5['pager_phone'];
        $passenger_session_step5['pager_comment'] = $passenger_session_step5['pager_comment'];
        $passenger_session_step5['pager_email'] = $passenger_session_step5['pager_email'];
        $passenger_session_step5['other_comment'] = $passenger_session_step5['other_comment'];
        $passenger_session_step5['other_phone'] = $passenger_session_step5['other_phone'];
        $passenger_session_step5['fax_phone1'] = $passenger_session_step5['fax_phone1'];
        $passenger_session_step5['fax_comment1'] = $passenger_session_step5['fax_comment1'];
        $passenger_session_step5['auto_fax'] = $passenger_session_step5['auto_fax'];
        $passenger_session_step5['fax_phone2'] = $passenger_session_step5['fax_phone2'];
        $passenger_session_step5['fax_comment2'] = $passenger_session_step5['fax_comment2'];


        //step2
        $passenger_session_step5['passenger_type_id'] = $passenger_session_step5['passenger_type_id'];
        $passenger_session_step5['parent'] = $passenger_session_step5['parent'];
        $passenger_session_step5['date_of_birth'] = $passenger_session_step5['date_of_birth'];
        $passenger_session_step5['illness'] = $passenger_session_step5['illness'];
        $passenger_session_step5['financial'] = $passenger_session_step5['financial'];
        $passenger_session_step5['weight'] = $passenger_session_step5['weight'];
        $passenger_session_step5['public_considerations'] = $passenger_session_step5['public_considerations'];
        $passenger_session_step5['private_considerations'] = $passenger_session_step5['private_considerations'];
        $passenger_session_step5['passenger_illness_category_id'] = $passenger_session_step5['passenger_illness_category_id'];
        $passenger_session_step5['language_spoken'] = $passenger_session_step5['language_spoken'];
        $passenger_session_step5['best_contact_method'] = $passenger_session_step5['best_contact_method'];

        //step3
        $passenger_session_step5['releasing_physician'] = $passenger_session_step5['releasing_physician'] ;
        $passenger_session_step5['releasing_phone'] =  $passenger_session_step5['releasing_phone'] ;
        $passenger_session_step5['medical_release_requested'] = $passenger_session_step5['medical_release_requested'];
        $passenger_session_step5['medical_release_received'] = $passenger_session_step5['medical_release_received'] ;
        $passenger_session_step5['releasing_fax1'] = $passenger_session_step5['releasing_fax1'];
        $passenger_session_step5['releasing_fax1_comment'] = $passenger_session_step5['releasing_fax1_comment'];
        $passenger_session_step5['releasing_email'] = $passenger_session_step5['releasing_email'] ;
        $passenger_session_step5['treating_physician'] = $passenger_session_step5['treating_physician'];
        $passenger_session_step5['treating_phone'] = $passenger_session_step5['treating_phone'];


        //step4
        $passenger_session_step5['treating_fax1'] = $passenger_session_step5['treating_fax1'];
        $passenger_session_step5['treating_fax1_comment'] = $passenger_session_step5['treating_fax1_comment'];
        $passenger_session_step5['treating_email'] = $passenger_session_step5['treating_email'];
        $passenger_session_step5['travel_history_notes'] = $passenger_session_step5['travel_history_notes'];
        $passenger_session_step5['need_medical_release'] = $passenger_session_step5['need_medical_release'];
        $passenger_session_step5['ground_transportation_comment'] = $passenger_session_step5['ground_transportation_comment'];

        //step5
        $passenger_session_step5['lodging_name'] = $request->getParameter('pass5_5[lodging_name]');
        $passenger_session_step5['lodging_phone'] = $request->getParameter('pass5_5[lodging_phone]');
        $passenger_session_step5['lodging_phone_comment'] = $request->getParameter('pass5_5[lodging_phone_comment]');
        $passenger_session_step5['facility_name'] = $request->getParameter('pass5_5[facility_name]');
        $passenger_session_step5['facility_phone'] = $request->getParameter('pass5_5[facility_phone]');
        $passenger_session_step5['facility_phone_comment'] = $request->getParameter('pass5_5[facility_phone_comment]');
        $passenger_session_step5['requester_id'] = $request->getParameter('pass5_5[requester_id]');
        $passenger_session_step5['emergency_contact_name'] = $request->getParameter('pass5_5[emergency_contact_name]');
        $passenger_session_step5['emergency_contact_primary_phone'] = $request->getParameter('pass5_5[emergency_contact_primary_phone]');
        $passenger_session_step5['emergency_contact_secondary_phone'] = $request->getParameter('pass5_5[emergency_contact_secondary_phone]');
        $passenger_session_step5['emergency_contact_primary_comment'] = $request->getParameter('pass5_5[emergency_contact_primary_comment]');
        $passenger_session_step5['emergency_contact_secondary_comment'] = $request->getParameter('pass5_5[emergency_contact_secondary_comment]');

        $this->getUser()->setAttribute('passangers_step5', $passenger_session_step5);

        return $this->redirect('passenger/stepSave');
      }
    }
  }

  public function executeStepSave(sfWebRequest $request)
  {
    $passenger_session_step5 = $this->getUser()->getAttribute('passangers_step5');

    if (!$passenger_session_step5)
    {
      return $this->forward('passanger', 'step5_4');
    }

    //save Person data
    $person = new Person();

    $person->setTitle($passenger_session_step5['title']);
    $person->setFirstName($passenger_session_step5['firstname']);
    $person->setLastName($passenger_session_step5['lastname']);
    $person->setAddress1($passenger_session_step5['address1']);
    $person->setAddress2($passenger_session_step5['address2']);
    $person->setCity($passenger_session_step5['city']);
    $person->setCounty($passenger_session_step5['county']);
    $person->setState($passenger_session_step5['state']);
    $person->setCountry($passenger_session_step5['country']);
    $person->setZipcode($passenger_session_step5['zipcode']);
    $person->setDayPhone($passenger_session_step5['day_phone']);
    $person->setDayComment($passenger_session_step5['day_comment']);
    $person->setEveningPhone($passenger_session_step5['eve_phone']);
    $person->setEveningComment($passenger_session_step5['eve_comment']);
    $person->setMobilePhone($passenger_session_step5['mobile_phone']);
    $person->setMobileComment($passenger_session_step5['mobile_comment']);
    $person->setPagerPhone($passenger_session_step5['pager_phone']);
    $person->setPagerComment($passenger_session_step5['pager_comment']);
    $person->setOtherPhone($passenger_session_step5['other_comment']);
    $person->setOtherComment($passenger_session_step5['other_comment']);
    $person->setFaxPhone1($passenger_session_step5['fax_phone1']);
    $person->setFaxComment1($passenger_session_step5['fax_comment1']);
    $person->setAutoFax($passenger_session_step5['auto_fax']);
    $person->setFaxPhone2($passenger_session_step5['fax_phone2']);
    $person->setFaxComment2($passenger_session_step5['fax_comment2']);
    $person->setEmail($passenger_session_step5['email']);
    $person->setEmailTextOnly($passenger_session_step5['textonly']);
    $person->setEmailBlocked($passenger_session_step5['emailblocked']);
    $person->setComment($passenger_session_step5['comment']);
    $person->setBlockMailings($passenger_session_step5['blockmailings']);
    $person->setNewsletter($passenger_session_step5['newsletter']);
    $person->setGender($passenger_session_step5['gender']);
    $person->setDeceased($passenger_session_step5['deceased']);
    $person->setDeceasedComment($passenger_session_step5['deceased_comment']);
    $person->setSecondaryEmail($passenger_session_step5['secemail']);
    $person->setDeceasedDate($passenger_session_step5['deceased_date']);
    $person->setMiddleName($passenger_session_step5['middlename']);
    $person->setSuffix($passenger_session_step5['suffix']);
    $person->setNickname($passenger_session_step5['nickname']);
    $person->setVeteran($passenger_session_step5['military']);
    $person->save();


    //save Passenger data
    $passenger = new Passenger();

    $passenger->setPersonId($person->getId());

    if($passenger_session_step5['passenger_type_id'] == 0)
    {
      $passenger->setPassengerTypeId(null);
    }else
    {
      $passenger->setPassengerTypeId($passenger_session_step5['passenger_type_id']);
    }

    $passenger->setParent($passenger_session_step5['parent']);
    $passenger->setDateOfBirth($passenger_session_step5['date_of_birth']);
    $passenger->setWeight($passenger_session_step5['weight']);
    $passenger->setIllness($passenger_session_step5['illness']);
    $passenger->setPassengerIllnessCategoryId($passenger_session_step5['passenger_illness_category_id']);
    $passenger->setLanguageSpoken($passenger_session_step5['language_spoken']);
    $passenger->setBestContactMethod($passenger_session_step5['best_contact_method']);
    $passenger->setFinancial($passenger_session_step5['facility_name']);
    $passenger->setPublicConsiderations($passenger_session_step5['public_considerations']);
    $passenger->setPrivateConsiderations($passenger_session_step5['private_considerations']);
    $passenger->setGroundTransportationComment($passenger_session_step5['ground_transportation_comment']);
    $passenger->setTravelHistoryNotes($passenger_session_step5['travel_history_notes']);
    $passenger->setReleasingPhysician($passenger_session_step5['releasing_physician']);
    $passenger->setReleasingPhone($passenger_session_step5['releasing_phone']);
    $passenger->setReleasingFax1($passenger_session_step5['releasing_fax1']);
    $passenger->setReleasingFax1Comment($passenger_session_step5['releasing_fax1_comment']);
    $passenger->setReleasingEmail($passenger_session_step5['releasing_email']);
    $passenger->setNeedMedicalRelease($passenger_session_step5['need_medical_release']);
    $passenger->setMedicalReleaseRequested($passenger_session_step5['medical_release_requested']);
    $passenger->setMedicalReleaseReceived($passenger_session_step5['medical_release_received']);
    $passenger->setTreatingPhysician($passenger_session_step5['treating_physician']);
    $passenger->setTreatingPhone($passenger_session_step5['treating_phone']);
    $passenger->setTreatingFax1($passenger_session_step5['treating_fax1']);
    $passenger->setTreatingFax1Comment($passenger_session_step5['treating_fax1_comment']);
    $passenger->setTreatingEmail($passenger_session_step5['treating_email']);
    $passenger->setLanguageSpoken($passenger_session_step5['language_spoken']);
    $passenger->setLodgingPhone($passenger_session_step5['lodging_phone']);
    $passenger->setLodgingPhoneComment($passenger_session_step5['lodging_phone_comment']);
    $passenger->setFacilityName($passenger_session_step5['facility_name']);
    $passenger->setFacilityPhone($passenger_session_step5['facility_phone']);
    $passenger->setFacilityPhoneComment($passenger_session_step5['facility_phone_comment']);
    $passenger->setEmergencyContactName($passenger_session_step5['emergency_contact_name']);
    $passenger->setEmergencyContactPrimaryPhone($passenger_session_step5['emergency_contact_primary_phone']);
    $passenger->setEmergencyContactPrimaryComment($passenger_session_step5['emergency_contact_primary_comment']);
    $passenger->setEmergencyContactSecondaryPhone($passenger_session_step5['emergency_contact_secondary_phone']);
    $passenger->setEmergencyContactSecondaryComment($passenger_session_step5['emergency_contact_secondary_comment']);
    $passenger->save();

    $key  = $passenger_session_step5['key'];

    $this->getUser()->setFlash('success', 'Passenger information has been successfully created!');

    $this->redirect('@passenger');

    //removing used session like passenger data

    unset($passenger_session_step5p[$key]);

    $this->getUser()->setAttribute('passanger_step5', $passenger_session_step5);
  }

  /**
   * CODE: passenger_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
      if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    
    if($request->isMethod('delete'))
    {
      $request->checkCSRFProtection();

      $passenger = PassengerPeer::retrieveByPk($request->getParameter('id'));
      $this->forward404Unless($passenger, sprintf('Object passenger does not exist (%s).', $request->getParameter('id')));

      //FK Constraint check
      if($passenger->countCampPassengers()>0 or $passenger->countCompanions()>0 or $passenger->countMissions()>0)
      {
        $this->getUser()->setFlash('warning', 'Member information is used by other objects.In order to delete, please delete related information before!');
        return $this->redirect('passenger/index');
      }
      $passenger->delete();

      $this->getUser()->setFlash('success','Passenger info has successfully deleted!');

      if($request->getReferer())
      {
        $back = $request->getReferer();
      }else
      {
        $back = 'passenger/index';
      }
    }
    $this->redirect($back);
  }

  /**
   * Searches passenger index type
   * CODE: passenger_type_index
   */
  public function executeIndexType(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
   
    $this->types = PassengerTypePeer::doSelect(new Criteria());
  }

  /**
   * Add or edit passenger type
   * CODE: passenger_type_create
   */
  public function executeUpdateType(sfWebRequest $request)
  {

    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->getParameter('id'))
    {
      $type = PassengerTypePeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($type);

      $this->title = 'Edit passenger type';
      $success = 'Passenger type information has been successfully changed!';
    }
    else
    {
      $type = new PassengerType();
      $this->title = 'Add new passenger type';
      $success = 'Passenger type information has been successfully created!';
    }

    $this->form = new PassengerTypeForm($type);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('pType'));

      if ($this->form->isValid())
      {
        $type->setName($this->form->getValue('name'));
        if($type->isNew())
        {
          $content = $this->getUser()->getName().' added new Passenger type: '.$type->getName();
          ActivityPeer::log($content);
        }
        $type->save();

        $this->getUser()->setFlash('success', $success);

        $this->redirect('@ptype');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@ptype';
    }
    $this->type = $type;
  }

  /**
   * CODE: passenger_type_delete
   * TODO: Check related records
   */
  public function executeDeleteType(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if ($request->isMethod('post'))
    {
      try{
      $type = PassengerTypePeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($type);

      $type->delete();
      $this->getUser()->setFlash('success', 'Passenger type information has been successfully deleted!');
      }catch (Exception $e){
        $this->getUser()->setFlash('warning', "There are related persons to this passenger type. Please remove them first.");
      }
    }
    return $this->redirect('@ptype');
  }

  /**
   * CODE: passenger_illness_index
   */
  public function executeIndexIllness(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    $this->ills = PassengerIllnessCategoryPeer::doSelect(new Criteria());
  }
  /**
   * Add or edit Passenger illness
   * CODE: passenger_illness_create
   */
  public function executeUpdateIllness(sfWebRequest $request)
  {

    # security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if ($request->getParameter('id'))
    {
      $ill = PassengerIllnessCategoryPeer::retrieveByPK($request->getParameter('id'));
      $this->forward404Unless($ill);

      $this->title = 'Edit passenger illness category';
      $success = 'Passenger Illness Category  has been successfully changed!';
    }
    else
    {
      $ill  = new PassengerIllnessCategory();
      $this->title = 'Add new passenger illness category';
      $success = 'Passenger Illness Category  has been successfully created!';
    }

    $this->form = new PassengerIllnessCategoryForm($ill);

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('pill'));

      if ($this->form->isValid())
      {
        $ill->setCategoryDescription($this->form->getValue('category_description'));
        $ill->setSuperCategoryDescription($this->form->getValue('super_category_description'));
        $ill->save();

        $this->getUser()->setFlash('success', $success);

        $this->redirect('@pill');
      }
    }
    else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@pill';
    }

    $this->ill= $ill;
  }
  /**
   * Add or edit Passenger illness delete
   * CODE: passenger_illness_delete
   */
  public function executeDeleteIllness(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    if ($request->isMethod('post'))
    {
      try{
      $ill = PassengerIllnessCategoryPeer::retrieveByPK($request->getParameter('id'));

      $this->forward404Unless($ill);

      $ill->delete();
      $this->getUser()->setFlash('success', 'Passenger Illness Category information has been successfully deleted!');
      }catch (Exception $e){
         $this->getUser()->setFlash('warning', "There are related persons to this Passenger Illness Category. Please remove them first.");
      }
    }
    return $this->redirect('@pill');
  }

  /**
   * Passenger view
   * CODE: passenger_view
   */
  public function executeView(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $passenger = PassengerPeer::retrieveByPK($request->getParameter('id'));
    $this->redirectUnless($passenger, '@homepage');

    $this->passenger = $passenger;
    $this->person = $passenger->getPerson();
    $this->companions = $passenger->getCompanions();

    $this->back = $request->getReferer();
    if(strstr($this->back,'/mission/view')){
         $this->frommission = 1;
    }
    else $this->frommission = 0;

    # recent item
    $this->getUser()->addRecentItem($this->person->getName(), 'passenger', 'passenger/view?id='.$passenger->getId());

    if($request->getParameter('back'))
    {
      $this->back = $request->getParameter('back');
    }

    # handle the master member
    if ($request->hasParameter('mission_for') && hasCredential(array('Administrator','Staff'), false))
    {
      $this->mission_for = MissionLegPeer::retrieveByPK($request->getParameter('mission_for'));
    }else
    {
      $this->mission_for = null;
    }
  }

  /**
   * Passenger update ajax1(pop up)
   * CODE: passenger_create
   */
  public function executeUpdate1Ajax(sfWebRequest $request)
  {
    
    $this->setLayout(false);

    $passenger = new Passenger();

    $this->form1 = new PassengerPopUpForm1($passenger);

    $this->back = $request->getReferer();

    $this->key = $request->getParameter('key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }
    $this->person_a = trim($this->getRequestParameter('person_a', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a', '*'));

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form1->bind($request->getParameter('pass_popup1'));

      if ($this->form1->isValid() && $request->getParameter('personpass_id'))
      {
        //set form datas into session
        $p_type_id = ($request->getParameter('pass_popup1[passenger_type_id]') ? $request->getParameter('pass_popup1[passenger_type_id]') : null);
        $p_illness_cat = ($request->getParameter('pass_popup1[passenger_illness_category_id]') ? $request->getParameter('pass_popup1[passenger_illness_category_id]') : null);
        $passenger->setPersonId($request->getParameter('personpass_id'));
        $passenger->setPassengerTypeId($p_type_id);
        $passenger->setParent($request->getParameter('pass_popup1[parent]'));
        $passenger->setDateOfBirth($request->getParameter('pass_popup1[date_of_birth]'));
        $passenger->setIllness($request->getParameter('pass_popup1[illness]'));
        $passenger->setFinancial($request->getParameter('pass_popup1[financial]'));
        $passenger->setPassengerIllnessCategoryId($p_illness_cat);
        $passenger->setLanguageSpoken($request->getParameter('pass_popup1[language_spoken]'));
        $passenger->setBestContactMethod($request->getParameter('pass_popup1[best_contact_method]'));

        //$this->getUser()->setAttribute('pop_pass', $passenger);
        $this->getUser()->setAttribute('pop_pass', serialize($passenger));

        return $this->redirect('passenger/update2Ajax');
      }else
      {
        $this->person_need=1;
      }
    }else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/update1Ajax';
    }
  }
  /**
   * Passenger update ajax2(pop up)
   * CODE: passenger_create
   */
  public function executeUpdate2Ajax(sfWebRequest $request)
  {
    
    $this->setLayout(false);

    if(!$this->getUser()->getAttribute('pop_pass'))
    {
      return $this->forward('passenger', 'update1Ajax');
    }else
    {
      $pass_pop_session = unserialize($this->getUser()->getAttribute('pop_pass'));
    }
    //@include_once("/opt/httpd-builtin-5.0.0.1/afids/web/krumo/class.krumo.php");
    ///(print_r($pass_pop_session));
    if(isset($pass_pop_session))
    {
      $passenger = $pass_pop_session;
      //echo 'yes2';
    }else
    {
      $passenger =  new Passenger();
    }

    $this->form2 = new PassengerPopUpForm2($passenger);
    //$this->form2 = new PassengerPopUpForm2();
    $this->sub_title = 'Add New Passenger';

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form2->bind($request->getParameter('pass_popup2'));

      if($this->form2->isValid())
      {
        $passenger->setPublicConsiderations($request->getParameter('pass_popup2[public_considerations]'));
        $passenger->setPrivateConsiderations($request->getParameter('pass_popup2[private_considerations]'));
        $passenger->setGroundTransportationComment($request->getParameter('pass_popup2[ground_transportation_comment]'));
        $passenger->setTravelHistoryNotes($request->getParameter('pass_popup2[travel_history_notes]'));
        //$this->getUser()->setAttribute('pop_pass', $passenger);
        $this->getUser()->setAttribute('pop_pass', serialize($passenger));

        return $this->redirect('passenger/update3Ajax');
      }
    }else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/update1Ajax';
    }
  }
  /**
   * Passenger update ajax3(pop up)
   * CODE: passenger_create
   */
  public function executeUpdate3Ajax(sfWebRequest $request)
  {
    
    $this->setLayout(false);

    if(!$this->getUser()->getAttribute('pop_pass'))
    {
      return $this->forward('passenger', 'update1Ajax');
    }else
    {
      $pass_pop_session = unserialize($this->getUser()->getAttribute('pop_pass'));
    }
    //@include_once("/opt/httpd-builtin-5.0.0.1/afids/web/krumo/class.krumo.php");
    ///(print_r($pass_pop_session));
    if(isset($pass_pop_session))
    {
      $passenger = $pass_pop_session;
     // echo 'yes3';

    }else
    {
      $passenger =  new Passenger();
    }

    $this->form3 = new PassengerPopUpForm3($passenger);
    $this->sub_title = 'Add New Passenger';

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form3->bind($request->getParameter('pass_popup3'));

      if($this->form3->isValid())
      {
        $passenger->setReleasingPhysician($request->getParameter('pass_popup3[releasing_physician]'));
        $passenger->setReleasingPhone($request->getParameter('pass_popup3[releasing_phone]'));
        $passenger->setReleasingFax1($request->getParameter('pass_popup3[releasing_fax1]'));
        $passenger->setReleasingFax1Comment($request->getParameter('pass_popup3[releasing_fax1_comment]'));
        $passenger->setReleasingEmail($request->getParameter('pass_popup3[releasing_email]'));
        $passenger->setNeedMedicalRelease($request->getParameter('pass_popup3[need_medical_release]'));
        $passenger->setMedicalReleaseRequested($request->getParameter('pass_popup3[medical_release_requested]'));
        $passenger->setMedicalReleaseReceived($request->getParameter('pass_popup3[medical_release_received]'));
        //Treating
        $passenger->setTreatingPhysician($request->getParameter('pass_popup3[treating_physician]'));
        $passenger->setTreatingPhone($request->getParameter('pass_popup3[treating_phone]'));
        $passenger->setTreatingFax1($request->getParameter('pass_popup3[treating_fax1]'));
        $passenger->setTreatingFax1Comment($request->getParameter('pass_popup3[treating_fax1_comment]'));
        $passenger->setTreatingEmail($request->getParameter('pass_popup3[treating_email]'));

        //$this->getUser()->setAttribute('pop_pass', $passenger);
        $this->getUser()->setAttribute('pop_pass', serialize($passenger));

        return $this->redirect('passenger/update4Ajax');
      }else
      {
      }
    }else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/update2Ajax';
    }
  }
  /**
   * Passenger update ajax4(pop up)
   * CODE: passenger_create
   */
  public function executeUpdate4Ajax(sfWebRequest $request)
  {
   
    $this->setLayout(false);

    if(!$this->getUser()->getAttribute('pop_pass'))
    {
      return $this->forward('passenger', 'update1Ajax');
    }else
    {
      $pass_pop_session = unserialize($this->getUser()->getAttribute('pop_pass'));
    }
   // (print_r($pass_pop_session));
    if(isset($pass_pop_session))
    {
      $passenger = $pass_pop_session;
     // echo 'yes4';

    }else
    {
      $passenger =  new Passenger();
    }

    $this->form4 = new PassengerPopUpForm4($passenger);
    //$this->form4 = new PassengerPopUpForm4();
    $this->sub_title = 'Add New Passenger';

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form4->bind($request->getParameter('pass_popup4'));

      if($this->form4->isValid())
      {

        $passenger->setLodgingName($request->getParameter('pass_popup4[lodging_name]'));
        $passenger->setLodgingPhone($request->getParameter('pass_popup4[lodging_phone]'));
        $passenger->setLodgingPhoneComment($request->getParameter('pass_popup4[lodging_phone_comment]'));

        $passenger->setFacilityName($request->getParameter('pass_popup4[facility_name]'));
        $passenger->setFacilityPhone($request->getParameter('pass_popup4[facility_phone]'));
        $passenger->setFacilityPhoneComment($request->getParameter('pass_popup4[facility_phone_comment]'));

        $passenger->setFacilityCity($request->getParameter('pass_popup4[facility_city]'));
        $passenger->setFacilityState($request->getParameter('pass_popup4[facility_state]'));
        
        //$this->getUser()->setAttribute('pop_pass', $passenger);
        $this->getUser()->setAttribute('pop_pass', serialize($passenger));

        return $this->redirect('passenger/update5Ajax');

      }
    }else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/update3Ajax';
    }
  }

  /**
   * Passenger update ajax5(pop up)
   * CODE: passenger_create
   */
  public function executeUpdate5Ajax(sfWebRequest $request)
  {

    $this->setLayout(false);

    if(!$this->getUser()->getAttribute('pop_pass'))
    {
      return $this->forward('passenger', 'update1Ajax');
    }else
    {
      $pass_pop_session = unserialize($this->getUser()->getAttribute('pop_pass'));
    }

    if(isset($pass_pop_session))
    {
      $passenger = $pass_pop_session;

    }else
    {
      $passenger =  new Passenger();
    }
    //echo "<pre>";(print_r($pass_pop_session));
    $this->requester_p = trim($this->getRequestParameter('requester_p', '*')) == '' ? '*' : trim($this->getRequestParameter('requester_p', '*'));

    $this->form5 = new PassengerPopUpForm5($passenger);
    //$this->form5 = new PassengerPopUpForm5();
    $this->sub_title = 'Add New Passenger';

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form5->bind($request->getParameter('pass_popup5'));

      if($this->form5->isValid())
      {
        $passenger->setRequesterId($request->getParameter('person_id'));
        $passenger->setEmergencyContactName($request->getParameter('pass_popup5[emergency_contact_name]'));
        $passenger->setEmergencyContactPrimaryPhone($request->getParameter('pass_popup5[emergency_contact_primary_phone]'));
        $passenger->setEmergencyContactSecondaryPhone($request->getParameter('pass_popup5[emergency_contact_secondary_phone]'));
        $passenger->setEmergencyContactPrimaryComment($request->getParameter('pass_popup5[emergency_contact_primary_comment]'));
        $passenger->setEmergencyContactSecondaryComment($request->getParameter('pass_popup5[emergency_contact_secondary_comment]'));

        $this->getUser()->setAttribute('pop_pass', serialize($passenger));

        return $this->redirect('passenger/ajaxSave');
      }
    }else
    {
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/update4Ajax';
    }
  }
  /**
   * Passenger save ajax(pop up)
   * CODE: passenger_create
   */
  public function executeAjaxSave(sfWebRequest $request)
  {
   
    if(!$this->getUser()->getAttribute('pop_pass'))
    {
      return $this->forward('passenger', 'update1Ajax');
    }else
    {
      $pass_pop_session = unserialize($this->getUser()->getAttribute('pop_pass'));
    }
    $this->ajaxPassengerSave = "true";
    if(isset($pass_pop_session))
    {
      $this->passenger = $pass_pop_session;
    }else
    {
      $this->passenger =  new Passenger();
    }
   
    try
    {
      $this->passenger->save();      
    }
    catch(Exception $e)
    {
    }


    $this->passenger_id = $this->passenger->getId();
    $this->passenger_name = $this->passenger->getPerson()->getName();    
    $passenger = new Passenger();
    $this->form1 = new PassengerPopUpForm1($passenger);    
    $this->back = $request->getReferer();
    $this->key = $request->getParameter('key');
    if (!$this->key)
    {
      $this->key = rand(1000,9999);
    }
    $this->person_a = trim($this->getRequestParameter('person_a', '*')) == '' ? '*' : trim($this->getRequestParameter('person_a', '*'));

    $this->referer = $request->getReferer();
    $this->getUser()->setFlash("ajaxPassengerSave", "ajaxPassengerSave");
    return $this->renderPartial("passenger/update1Ajax");
  }
  /**
   * Passenger auto complete
   * CODE: passenger_create
   */
  public function executeAutoComplete()
  {
    $this->fname_keyword = '';
    $this->lname_keyword  = '';

    if($this->getRequestParameter('passenger_fname'))
    {
      $this->fname = 1;
      $this->fname_keyword = $this->getRequestParameter('passenger_fname');
    }elseif($this->getRequestParameter('passenger_lname'))
    {
      $this->lname = 1;
      $this->lname_keyword = $this->getRequestParameter('passenger_lname');
    }elseif($this->getRequestParameter('passenger_a'))
    {
      $this->pass = 1;
      $this->lname_keyword = $this->getRequestParameter('passenger_a');
    }
    $this->check = 1;
    $this->passengers = PassengerPeer::getByFirstLetter($this->fname_keyword, $this->lname_keyword);
  }

  public function executeAutoComplete1(sfWebRequest $request)
  {
    $this->name = $this->getRequestParameter('passenger_a');
    $this->passengers = PassengerPeer::getByName($this->name);
  }

 
  /**
   * Passenger's facility auto complete
   * CODE: passenger_create
   */
  public function executeAutoCompleteFacility()
  {
    if($this->getRequestParameter('facility'))
    {
      $this->keyword =$this->getRequestParameter('facility');

      $this->passengers = PassengerPeer::getByFirstLetterFacility($this->keyword);
    }
  }
  /**
   * Passenger's lodging auto complete
   * CODE: passenger_create
   */
  public function executeAutoCompleteLodging()
  {
    if($this->getRequestParameter('lodging'))
    {
      $this->keyword =$this->getRequestParameter('lodging');

      $this->passengers = PassengerPeer::getByFirstLetterLodging($this->keyword);
    }
  }
  public function executeGetPassengerLodgingAndFacility()
  {
    $id = $this->getRequestParameter('id');
    $passenger = PassengerPeer::retrieveByPK($id);
    $data = array('lodging' => '', 'facility' => '', 'lodging_phone'=>'', 'facility_phone'=>'', 'lodging_phone_comment'=>'', '	facility_phone_comment'=>'', '	facility_city'=>'', 'facility_state'=>'');

    if ($passenger)
    {
      $data['lodging'] = $passenger->getLodgingName();
      $data['facility'] = $passenger->getFacilityName();
      $data['lodging_phone'] = $passenger->getLodgingPhone();
      $data['facility_phone'] = $passenger->getFacilityPhone();
      $data['lodging_phone_comment'] = $passenger->getLodgingPhoneComment();
      $data['facility_phone_comment'] = $passenger->getFacilityPhoneComment();
      $data['facility_city'] = $passenger->getFacilityCity();
      $data['facility_state'] = $passenger->getFacilityState();
    }
    return $this->renderText(json_encode($data));
  }

  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "passenger";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"passenger");
  }

  public function executeAutoCompleteFirstNon()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    //$type = $this->getRequestParameter('type');
    $type = "NoPassenger";
    $this->persons = PersonPeer::getFirstNames($this->keyword, $type);
    //$this->setTemplate('AutoCompleteFirst');
  }

  public function executeAutoCompleteLastNon()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons =PersonPeer::getLastNames($this->keyword,"NoPassenger");
    //$this->setTemplate('AutoCompleteFirst');
  }

  public function executeGetFacilityContent()
  {
    $id = $this->getRequestParameter('id');
    $facility = $this->getRequestParameter('facility');
    $passengerdest = PassengerDestPeer::getFacilityByPassengerId($id , $facility);
    $data = array('facility_phone'=>'', '	facility_phone_comment'=>'', '	facility_city'=>'', 'facility_state'=>'');
    $this->setLayout(false);
    if ($passengerdest)
    {
      $data['facility_phone'] = $passengerdest->getFacPhone();
      $data['facility_phone_comment'] = $passengerdest->getFacilityPhoneComment();
      $data['facility_city'] = $passengerdest->getFacilityCity();
      $data['facility_state'] = $passengerdest->getFacilityState();
    }
    return $this->renderText(json_encode($data));
  }

  public function executeGetLodgingContent()
  {
    $id = $this->getRequestParameter('id');
    $lod = $this->getRequestParameter('lod');
    $passengerdest = PassengerDestPeer::getLodgingByPassengerId($id , $lod);
    $data = array('lod_phone'=>'', 'lod_phone_comment'=>'', 'lod_city'=>'', 'lod_state'=>'');
    $this->setLayout(false);
    if ($passengerdest)
    {
      $data['lod_phone'] = $passengerdest->getLodPhone();
      $data['lod_phone_comment'] = $passengerdest->getLodPhoneComment();
      $data['facility_city'] = $passengerdest->getFacilityCity();
      $data['facility_state'] = $passengerdest->getFacilityState();
    }
    return $this->renderText(json_encode($data));
  }
}

