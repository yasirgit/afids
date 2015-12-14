<?php
/**
 * missionRequest actions.
 *
 * @package    angelflight
 * @subpackage missionRequest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class missionRequestActions extends sfActions
{
  /**
 * missionRequests
 * CODE:miss_req_index
 * TODO:Mission Request Filter , Find
*/

  public function executeIndex(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    # handle the master member

    # filter
    $this->processFilter($request);
    $this->pager = MissionRequestPeer::getPager(
    $this->max,
    $this->page,
    $this->request_date1,
    $this->request_date2,
    $this->mission_date1,
    $this->mission_date2,
    $this->standart,
    $this->referrals
    );
    $this->mission_reqs = $this->pager->getResults();
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    $this->getUser()->addRecentItem('Mission request', 'missionRequest', 'missionRequest/index');
  }

  /**
   * Searches for mission request by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('mission_request', array(), 'person');

    if (!isset($params['request_date1'])) $params['request_date1'] = null;
    if (!isset($params['request_date2'])) $params['request_date2'] = null;
    if (!isset($params['mission_date1'])) $params['mission_date1'] = null;
    if (!isset($params['mission_date2'])) $params['mission_date2'] = null;
    if (!isset($params['standart'])) $params['standart'] = null;
    if (!isset($params['referrals'])) $params['referrals'] = null;

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['request_date1']  = $request->getParameter('request_date1');
      $params['request_date2']  = $request->getParameter('request_date2');
      $params['mission_date1']  = $request->getParameter('mission_date1');
      $params['mission_date2']  = $request->getParameter('mission_date2');
      $params['standart']       = $request->getParameter('standart');
      $params['referrals']      = $request->getParameter('referrals');
    }

    $this->page           = $page = $request->getParameter('page', 1);
    $this->max            = $params['max'];
    $this->request_date1  = $params['request_date1'];
    $this->request_date2  = $params['request_date2'];
    $this->mission_date1  = $params['mission_date1'];
    $this->mission_date2  = $params['mission_date2'];
    $this->standart       = $params['standart'];
    $this->referrals      = $params['referrals'];

    $this->getUser()->setAttribute('mission_request', $params, 'person');
  }

  /**
   * missionRequests Form Step1 use when Mission Request Process action
   * CODE:mission_request_create
   */
  public function executeStep1(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    if($request->getParameter('id')){
      $miss_req =  MissionRequestPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit Mission Request';
      $success = 'Mission Request information successfully edited!';
    }
	$miss_req = isset($miss_req)?$miss_req:(new MissionRequest());
    $this->form1 = new MissionRequestForm3($miss_req);

    $form1_data = array();

    $this->miss_req = $miss_req;

    $this->key = $request->getParameter('key');
    if (!$this->key) {
      $this->key = rand(1000,9999);
    }

    $this->title = 'Mission Request Process';

    $this->sub_title = 'Verify Requester Information';

    $this->back = $request->getReferer();
    $this->referer = $request->getReferer();

    $this->pass_firstname = '';
    $this->pass_lastname = '';
    if($request->isMethod('post'))
    {
      //      $this->form1->bind($form1_data);
      $this->form1->bind($request->getParameter('miss_req_temp3'));

      if($this->form1->isValid() && $request->getParameter('miss_req_temp3[agency_name]')){

        $miss_req_session = $this->getUser()->getAttribute('miss_req');
        //session
        //        if (!$miss_req_session) {
        //          $miss_req_session = array($this->key => array());
        //          $this->getUser()->setAttribute('miss_req', $miss_req_session);
        //        }
        //        elseif (!isset($miss_req_session[$this->key]))
        //        {
        $mission_req = MissionRequestPeer::retrieveByPK($request->getParameter('id'));

        //set to MissionRequest object
        $miss_req->setReqFirstName($request->getParameter('miss_req_temp3[req_first_name]'));
        $miss_req->setReqLastName($request->getParameter('miss_req_temp3[req_last_name]'));
        $miss_req->setReqAddress1($request->getParameter('miss_req_temp3[req_address1]'));
        $miss_req->setReqAddress2($request->getParameter('miss_req_temp3[req_address2]'));
        $miss_req->setReqCity($request->getParameter('miss_req_temp3[req_city]'));
        $miss_req->setReqCounty($request->getParameter('miss_req_temp3[req_county]'));
        $miss_req->setReqState($request->getParameter('miss_req_temp3[req_state]'));
        $miss_req->setReqCountry($request->getParameter('miss_req_temp3[req_country]'));
        $miss_req->setReqZipcode($request->getParameter('miss_req_temp3[req_zipcode]'));
        $miss_req->setReqEmail($request->getParameter('miss_req_temp3[req_email]'));
        $miss_req->setReqSecondaryEmail($request->getParameter('miss_req_temp3[req_secondary_email]'));
        $miss_req->setReqPagerEmail($request->getParameter('miss_req_temp3[req_pager_email]'));
        $miss_req->setReqDayPhone($request->getParameter('miss_req_temp3[req_day_phone]'));
        $miss_req->setReqDayComment($request->getParameter('miss_req_temp3[req_day_comment]'));
        $miss_req->setReqEvePhone($request->getParameter('miss_req_temp3[req_eve_phone]'));
        $miss_req->setReqEveComment($request->getParameter('miss_req_temp3[req_eve_comment]'));
        $miss_req->setReqMobilePhone($request->getParameter('miss_req_temp3[req_mobile_phone]'));
        $miss_req->setReqMobileComment($request->getParameter('miss_req_temp3[req_mobile_comment]'));
        $miss_req->setReqPagerPhone($request->getParameter('miss_req_temp3[req_pager_phone]'));
        $miss_req->setReqPagerComment($request->getParameter('miss_req_temp3[req_pager_comment]'));
        $miss_req->setReqOtherPhone($request->getParameter('miss_req_temp3[req_other_phone]'));
        $miss_req->setReqOtherComment($request->getParameter('miss_req_temp3[req_other_comment]'));
        $miss_req->setAgencyName($request->getParameter('miss_req_temp3[agency_name]'));
        $miss_req->setReqPosition($request->getParameter('miss_req_temp3[req_position]'));
       // $miss_req->setReqDischarge($request->getParameter('miss_req_temp3[req_discharge]'));

        $this->getUser()->setAttribute('miss_req', $miss_req);

        return $this->redirect('missionRequest/step2');
      }else{
        if($request->getParameter('miss_req_temp3[agency_name]') == null){
          $this->agency_error = 1;
        }
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : 'missionRequest/step1';
    }
    $this->form2 = new MissionRequestForm6();
    $this->form3 = new MissionRequestForm7();

    $this->miss_req = $miss_req;

  }

  /**
   * missionRequests step2
   * CODE: mission_request_create
   */
  public function executeStep2(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->setTemplate('step1');

    if(!$this->getUser()->getAttribute('miss_req')){
      return $this->forward('missionRequest', 'step1');
    }else{
      $miss_req_session = $this->getUser()->getAttribute('miss_req');
    }
    if(isset($miss_req_session)){
      $miss_req = $miss_req_session;
    }else{
      $miss_req = new MissionRequest();
    }

    //find Passenger
    $this->pass_firstname = $miss_req->getPassFirstName();
    $this->pass_lastname = $miss_req->getPassLastName();


    $this->form2 = new MissionRequestForm6($miss_req);
    $this->title = 'Mission Request Process';
    $this->sub_title = 'Find Matching Passenger';

    //passengers
    $this->pass_illness_cats = PassengerIllnessCategoryPeer::getForSelectParent();
    $this->pass_types = PassengerTypePeer::getForSelectParent();


    $this->old_passengers = PassengerPeer::getFLName($this->pass_firstname,$this->pass_lastname);

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form2->bind($request->getParameter('miss_req_temp6'));

      if($this->form2->isValid() && $request->getParameter('miss_req_temp6[pass_type]') != 0){
        $miss_req->passenger_id = $request->getParameter('passenger_id');

        //set datas to MissionRequest
        $miss_req->setPassTitle($request->getParameter('miss_req_temp6[pass_title]'));

        $miss_req->setPassGender($request->getParameter('miss_req_temp6[pass_gender]'));
        $miss_req->setPassType($request->getParameter('miss_req_temp6[pass_type]'));

        $miss_req->setPassAddress1($request->getParameter('miss_req_temp6[pass_address1]'));
        $miss_req->setPassAddress2($request->getParameter('miss_req_temp6[pass_address2]'));

        $miss_req->setPassCity($request->getParameter('miss_req_temp6[pass_city]'));
        $miss_req->setPassState($request->getParameter('miss_req_temp6[pass_state]'));
        $miss_req->setPassZipcode($request->getParameter('miss_req_temp6[pass_zipcode]'));

        $miss_req->setPassCountry($request->getParameter('miss_req_temp6[pass_country]'));

        $miss_req->setPassEmail($request->getParameter('miss_req_temp6[pass_email]'));

        $miss_req->setPassDayPhone($request->getParameter('miss_req_temp6[pass_day_phone]'));
        $miss_req->setPassDayComment($request->getParameter('miss_req_temp6[pass_day_comment]'));
        $miss_req->setPassEvePhone($request->getParameter('miss_req_temp6[pass_eve_phone]'));
        $miss_req->setPassEveComment($request->getParameter('miss_req_temp6[pass_eve_comment]'));
        $miss_req->setPassMobilePhone($request->getParameter('miss_req_temp6[pass_mobile_phone]'));
        $miss_req->setPassMobileComment($request->getParameter('miss_req_temp6[pass_mobile_comment]'));
        $miss_req->setPassPagerPhone($request->getParameter('miss_req_temp6[pass_pager_phone]'));
        $miss_req->setPassPagerComment($request->getParameter('miss_req_temp6[pass_pager_comment]'));
        $miss_req->setPassOtherPhone($request->getParameter('miss_req_temp6[pass_other_phone]'));
        $miss_req->setPassOtherComment($request->getParameter('miss_req_temp6[pass_other_comment]'));

        $miss_req->setBestContact($request->getParameter('miss_req_temp6[best_contact]'));
        $miss_req->setIllness($request->getParameter('miss_req_temp6[illness]'));
        $miss_req->setFinancial($request->getParameter('miss_req_temp6[financial]'));

        $miss_req->setPassPrivateCons($request->getParameter('miss_req_temp6[pass_private_cons]'));
        $miss_req->setPassPublicCons($request->getParameter('miss_req_temp6[pass_public_cons]'));

        $miss_req->setPassWeight($request->getParameter('miss_req_temp6[pass_weight]'));
        $miss_req->setPassHeight($request->getParameter('miss_req_temp6[pass_height]'));

        $miss_req->setPassMedical($request->getParameter('miss_req_temp6[pass_medical]'));
        $miss_req->setPassLanguage($request->getParameter('miss_req_temp6[pass_language]'));
        $miss_req->setPassDateOfBirth($request->getParameter('miss_req_temp6[pass_date_of_birth]'));

        $miss_req->setReleasingPhysician($request->getParameter('miss_req_temp6[releasing_physician]'));
        $miss_req->setReleasePhone($request->getParameter('miss_req_temp6[release_phone]'));
        $miss_req->setReleasePhoneComment($request->getParameter('miss_req_temp6[release_phone_comment]'));
        $miss_req->setReleaseFax($request->getParameter('miss_req_temp6[release_fax]'));
        $miss_req->setReleaseFaxComment($request->getParameter('miss_req_temp6[release_fax_comment]'));
        $miss_req->setReleaseEmail($request->getParameter('miss_req_temp6[release_email]'));

        $miss_req->setTreatingPhysician($request->getParameter('miss_req_temp6[treating_physician]'));
        $miss_req->setTreatingPhone($request->getParameter('miss_req_temp6[treating_phone]'));
        $miss_req->setTreatingPhoneComment($request->getParameter('miss_req_temp6[treating_phone_comment]'));
        $miss_req->setTreatingFax($request->getParameter('miss_req_temp6[treating_fax]'));
        $miss_req->setTreatingFaxComment($request->getParameter('miss_req_temp6[treating_fax_comment]'));
        $miss_req->setTreatingEmail($request->getParameter('miss_req_temp6[treating_email]'));

        $miss_req->setFacilityName($request->getParameter('miss_req_temp6[facility_name]'));
        $miss_req->setFacilityPhone($request->getParameter('miss_req_temp6[facility_phone]'));
        $miss_req->setFacilityPhoneComment($request->getParameter('miss_req_temp6[facility_phone_comment]'));

        $miss_req->setLodgingName($request->getParameter('miss_req_temp6[lodging_name]'));
        $miss_req->setLodgingPhone($request->getParameter('miss_req_temp6[lodging_phone]'));
        $miss_req->setLodgingPhoneComment($request->getParameter('miss_req_temp6[lodging_phone_comment]'));

        $miss_req->setEmergencyName($request->getParameter('miss_req_temp6[emergency_name]'));
        $miss_req->setEmergencyPhone1($request->getParameter('miss_req_temp6[emergency_phone1]'));
        $miss_req->setEmergencyPhone1Comment($request->getParameter('miss_req_temp6[emergency_phone1_comment]'));

        $miss_req->setEmergencyPhone2($request->getParameter('miss_req_temp6[emergency_phone2]'));
        $miss_req->setEmergencyPhone2Comment($request->getParameter('miss_req_temp6[emergency_phone2_comment]'));
        $this->getUser()->setAttribute('miss_req', $miss_req);
        return $this->redirect('missionRequest/step3');
      }else{
        if($request->getParameter('miss_req_temp6[pass_type]') == 0){
          $this->type_error = 1;
        }
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@missionRequest/step2';
    }
    $this->form1 = new MissionRequestForm3($miss_req);
    $this->form3 = new MissionRequestForm7();
    $this->miss_req = $miss_req;
  }

  /**
   * missionRequests
   * CODE:mission_request_create
   */
  public function executeStep3(sfWebRequest $request)
  {
    # security
   if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $this->setTemplate('step1');

    if(!$this->getUser()->getAttribute('miss_req')){
      return $this->forward('missionRequest', 'step2');
    }else{
      $miss_req_session = $this->getUser()->getAttribute('miss_req');
    }

    if(isset($miss_req_session)){
      $miss_req = $miss_req_session;
    }else{
      $miss_req =  new MissionRequest();
    }

    $this->form3 = new MissionRequestForm7($miss_req);

    $this->back = $request->getReferer();
    $this->title = 'Mission Request Process';

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form3->bind($request->getParameter('miss_req_temp7'));

      if($this->form3->isValid()){
        //        $ma = date("M-d-y H:i:s",strtotime($request->getParameter('miss_req_temp7[appt_time]'),time()));
        $miss_req->setApptDate($request->getParameter('miss_req_temp7[appt_date]'));
        $miss_req->setApptTime($request->getParameter('miss_req_temp7[appt_time]'));
        $miss_req->setMissionDate($request->getParameter('miss_req_temp7[mission_date]'));
        $miss_req->setFlightTime($request->getParameter('miss_req_temp7[flight_time]'));
        $miss_req->setMissionRequestTypeId($request->getParameter('miss_req_temp7[mission_request_type_id]'));
        $miss_req->setWaiverRequired($request->getParameter('miss_req_temp7[waiver_required]'));
        $miss_req->setBaggageWeight($request->getParameter('miss_req_temp7[baggage_weight]'));
        $miss_req->setBaggageDesc($request->getParameter('miss_req_temp7[baggage_desc]'));
        $miss_req->setComment($request->getParameter('miss_req_temp7[comment]'));
        $miss_req->setOrginCity($request->getParameter('miss_req_temp7[orgin_city]'));
        $miss_req->setOrginState($request->getParameter('miss_req_temp7[orgin_state]'));
        $miss_req->setDestCity($request->getParameter('miss_req_temp7[dest_city]'));
        $miss_req->setDestState($request->getParameter('miss_req_temp7[dest_state]'));

        $this->getUser()->setAttribute('miss_req', $miss_req);

        return $this->redirect('missionRequest/save');
      }

    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@missionRequest/step3';
    }
    // set prevouis data to Step 1(form1)
    $this->form1 = new MissionRequestForm3($miss_req);

    $this->form2 = new  MissionRequestForm6($miss_req);

    $this->miss_req = $miss_req;
  }

  /**
   * missionRequests save all data into corresponding tables
   * CODE:mission_request_create
   */
  public function executeSave(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Coordinator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $miss_req_session = $this->getUser()->getAttribute('miss_req');

    if (!$miss_req_session){
      return $this->forward('passenger', 'step3');
    }

    //set Requester Person
    $req_person = new Person();
    $req_person->setFirstName($miss_req_session->getReqFirstname());
    $req_person->setLastName($miss_req_session->getReqLastname());
    $req_person->setAddress1($miss_req_session->getReqAddress1());
    $req_person->setAddress2($miss_req_session->getReqAddress2());
    $req_person->setCity($miss_req_session->getReqCity());
    $req_person->setCounty($miss_req_session->getReqCounty());
    $req_person->setState($miss_req_session->getReqState());
    $req_person->setCountry($miss_req_session->getReqCountry());

    $req_person->setZipcode($miss_req_session->getReqZipcode());
    $req_person->setEmail($miss_req_session->getReqEmail());
    $req_person->setSecondaryEmail($miss_req_session->getReqSecondaryEmail());
    $req_person->setPagerEmail($miss_req_session->getReqPagerEmail());

    $req_person->setDayPhone($miss_req_session->getReqDayPhone());
    $req_person->setDayComment($miss_req_session->getReqDayComment());
    $req_person->setEveningPhone($miss_req_session->getReqEvePhone());
    $req_person->setEveningComment($miss_req_session->getReqEveComment());
    $req_person->setMobilePhone($miss_req_session->getReqMobilePhone());
    $req_person->setMobileComment($miss_req_session->getReqMobileComment());
    $req_person->setPagerPhone($miss_req_session->getReqPagerPhone());
    $req_person->setPagerComment($miss_req_session->getReqPagerComment());
    $req_person->setOtherPhone($miss_req_session->getReqOtherPhone());
    $req_person->setOtherComment($miss_req_session->getReqOtherComment());
    $req_person->save();
    //end of Requester Person

    // set Requester Agency
    $agency = AgencyPeer::getByNamePhone(trim($miss_req_session->getAgencyName()));

    if($agency){
      # nothing
    }else{
      $agency = new Agency();
      $agency->setName(trim($miss_req_session->getAgencyName()));
      $agency->save();
    }

    //set Requester
    $requester = new Requester();
    $requester->setPersonId($req_person->getId());
    $requester->setAgencyId($agency->getId());
    //$requester->setDischarge($miss_req_session->getReqDischarge());
    $requester->save();

    if (isset($miss_req_session->passenger_id)) {
      $passenger = PassengerPeer::retrieveByPK($miss_req_session->passenger_id);
      if (!($passenger instanceof Passenger)) $passenger = new Passenger();
    }else{
      $passenger = new Passenger();
    }

    if ($passenger->isNew()) {
      $person = new Person();
    }else{
      $person = $passenger->getPerson();
    }

    //set Person to Passenger
    $person->setTitle($miss_req_session->getPassTitle());
    $person->setFirstName($miss_req_session->getPassFirstName());
    $person->setLastName($miss_req_session->getPassLastName());

    $person->setGender($miss_req_session->getPassGender());

    $person->setAddress1($miss_req_session->getPassAddress1());
    $person->setAddress2($miss_req_session->getPassAddress2());

    $person->setCity($miss_req_session->getPassCity());
    $person->setState($miss_req_session->getPassState());
    $person->setZipcode($miss_req_session->getPassZipcode());

    $person->setCountry($miss_req_session->getPassCountry());

    $person->setEmail($miss_req_session->getPassEmail());

    $person->setDayPhone($miss_req_session->getPassDayPhone());
    $person->setDayComment($miss_req_session->getPassDayComment());
    $person->setEveningPhone($miss_req_session->getPassEvePhone());
    $person->setEveningComment($miss_req_session->getPassEveComment());
    $person->setMobilePhone($miss_req_session->getPassMobilePhone());
    $person->setMobileComment($miss_req_session->getPassMobileComment());
    $person->setPagerPhone($miss_req_session->getPassPagerPhone());
    $person->setPagerComment($miss_req_session->getPassPagerComment());
    $person->setOtherPhone($miss_req_session->getPassOtherPhone());
    $person->setOtherComment($miss_req_session->getPassOtherComment());

    $person->save();

    //set Passenger
    $passenger->setPersonId($person->getId());
    $passenger->setPassengerTypeId($miss_req_session->getPassType());
    $passenger->setDateOfBirth($miss_req_session->getPassDateOfBirth());
    $passenger->setIllness($miss_req_session->getIllness());
    $passenger->setFinancial($miss_req_session->getFinancial());
    $passenger->setPublicConsiderations($miss_req_session->getPassPublicCons());
    $passenger->setPrivateConsiderations($miss_req_session->getPassPrivateCons());

    $passenger->setReleasingPhysician($miss_req_session->getReleasingPhysician());
    $passenger->setReleasingPhone($miss_req_session->getReleasePhone());
    $passenger->setReleasingFax1($miss_req_session->getReleaseFax());
    $passenger->setReleasingFax1Comment($miss_req_session->getReleaseFaxComment());

    $passenger->setLodgingName($miss_req_session->getLodgingName());
    $passenger->setLodgingPhone($miss_req_session->getLodgingPhone());
    $passenger->setLodgingPhoneComment($miss_req_session->getLodgingPhoneComment());

    $passenger->setFacilityName($miss_req_session->getFacilityName());
    $passenger->setFacilityPhone($miss_req_session->getFacilityPhone());
    $passenger->setFacilityPhoneComment($miss_req_session->getFacilityPhoneComment());

    $passenger->setReleasingEmail($miss_req_session->getReleaseEmail());
    $passenger->setTreatingPhysician($miss_req_session->getTreatingPhysician());
    $passenger->setTreatingPhone($miss_req_session->getTreatingPhone());
    $passenger->setTreatingFax1($miss_req_session->getTreatingFax());
    $passenger->setTreatingFax1Comment($miss_req_session->getTreatingFaxComment());
    $passenger->setTreatingEmail($miss_req_session->getTreatingEmail());

    $passenger->setLanguageSpoken($miss_req_session->getPassLanguage());
    $passenger->setBestContactMethod($miss_req_session->getBestContact());

    $passenger->setEmergencyContactName($miss_req_session->getEmergencyName());
    $passenger->setEmergencyContactPrimaryPhone($miss_req_session->getEmergencyPhone1());
    $passenger->setEmergencyContactPrimaryComment($miss_req_session->getEmergencyPhone1Comment());
    $passenger->setEmergencyContactSecondaryPhone($miss_req_session->getEmergencyPhone2());
    $passenger->setEmergencyContactSecondaryComment($miss_req_session->getEmergencyPhone2Comment());
    $passenger->setNeedMedicalRelease($miss_req_session->getPassMedical());
    $passenger->save();

    //set Companions

    if($passenger && $miss_req_session->getCom1Name()){
          $person = new Person();
          $names[] = split(" ", $miss_req_session->getCom1Name());
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($miss_req_session->getCom1Phone());
          $person->setDayComment($miss_req_session->getCom1Comment());
          $person->save();

      $companion = new Companion();
      $companion->setPassengerId($passenger->getId());
      $companion->setName($miss_req_session->getCom1Name());
      $companion->setRelationship($miss_req_session->getCom1Relationship());
      $companion->setDateOfBirth($miss_req_session->getCom1DateOfBirth());
      $companion->setWeight($miss_req_session->getCom1Weigth());
      $companion->setCompanionPhone($miss_req_session->getCom1Phone());
      $companion->setCompanionPhoneComment($miss_req_session->getCom1Comment());
      $companion->setPersonId($person->getId());
      $companion->save();
    }
    if($passenger && $miss_req_session->getCom2Name()){
          $person = new Person();
          $names[] = split(" ", $miss_req_session->getCom2Name());
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($miss_req_session->getCom2Phone());
          $person->setDayComment($miss_req_session->getCom2Comment());
          $person->save();
      $companion = new Companion();
      $companion->setPassengerId($passenger->getId());
      $companion->setName($miss_req_session->getCom2Name());
      $companion->setRelationship($miss_req_session->getCom2Relationship());
      $companion->setDateOfBirth($miss_req_session->getCom2DateOfBirth());
      $companion->setWeight($miss_req_session->getCom2Weigth());
      $companion->setCompanionPhone($miss_req_session->getCom2Phone());
      $companion->setCompanionPhoneComment($miss_req_session->getCom2Comment());
      $companion->setPersonId($person->getId());
      $companion->save();
    }
    if($passenger && $miss_req_session->getCom3Name()){
          $person = new Person();
          $names[] = split(" ", $miss_req_session->getCom3Name());
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($miss_req_session->getCom3Phone());
          $person->setDayComment($miss_req_session->getCom3Comment());
          $person->save();

      $companion = new Companion();
      $companion->setPassengerId($passenger->getId());
      $companion->setName($miss_req_session->getCom3Name());
      $companion->setRelationship($miss_req_session->getCom3Relationship());
      $companion->setDateOfBirth($miss_req_session->getCom3DateOfBirth());
      $companion->setWeight($miss_req_session->getCom3Weigth());
      $companion->setCompanionPhone($miss_req_session->getCom3Phone());
      $companion->setCompanionPhoneComment($miss_req_session->getCom3Comment());
      $companion->setPersonId($person->getId());
      $companion->save();
    }
    if($passenger && $miss_req_session->getCom4Name()){
          $person = new Person();
          $names[] = split(" ", $miss_req_session->getCom4Name());
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($miss_req_session->getCom4Phone());
          $person->setDayComment($miss_req_session->getCom4Comment());
          $person->save();
      $companion = new Companion();
      $companion->setPassengerId($passenger->getId());
      $companion->setName($miss_req_session->getCom4Name());
      $companion->setRelationship($miss_req_session->getCom4Relationship());
      $companion->setDateOfBirth($miss_req_session->getCom4DateOfBirth());
      $companion->setWeight($miss_req_session->getCom4Weigth());
      $companion->setCompanionPhone($miss_req_session->getCom4Phone());
      $companion->setCompanionPhoneComment($miss_req_session->getCom4Comment());
      $companion->setPersonId($person->getId());
      $companion->save();
    }
    if($passenger && $miss_req_session->getCom5Name()){
          $person = new Person();
          $names[] = split(" ", $miss_req_session->getCom5Name());
          //echo var_dump($names); die();
          $person->setFirstName($names[0][0]);
          $person->setLastName($names[0][1]);
          $person->setDayPhone($miss_req_session->getCom5Phone());
          $person->setDayComment($miss_req_session->getCom5Comment());
          $person->save();
      $companion = new Companion();
      $companion->setPassengerId($passenger->getId());
      $companion->setName($miss_req_session->getCom5Name());
      $companion->setRelationship($miss_req_session->getCom5Relationship());
      $companion->setDateOfBirth($miss_req_session->getCom5DateOfBirth());
      $companion->setWeight($miss_req_session->getCom5Weigth());
      $companion->setCompanionPhone($miss_req_session->getCom5Phone());
      $companion->setCompanionPhoneComment($miss_req_session->getCom5Comment());
      $companion->setPersonId($person->getId());
      $companion->save();
    }

    //set Itinerary
    $itinerary = ItineraryPeer::getByMissReqId($miss_req_session->getId());


    if(!$itinerary){
      $new_itinerary = new Itinerary();
      $new_itinerary->setDateRequested(date('m/d/Y'));
      $new_itinerary->setMissionRequestId($miss_req_session->getId());
      $new_itinerary->setMissionTypeId($miss_req_session->getMissionRequestTypeId());
      $new_itinerary->setApointTime($miss_req_session->getApptDate());
      $new_itinerary->setPassengerId($passenger->getId());
      $new_itinerary->setRequesterId($requester->getId());
      $new_itinerary->setFacility($miss_req_session->getFacilityName());
      $new_itinerary->setLodging($miss_req_session->getLodgingName());
      $new_itinerary->setOrginCity($miss_req_session->getOrginCity());
      $new_itinerary->setOrginState($miss_req_session->getOrginState());
      $new_itinerary->setDestCity($miss_req_session->getDestCity());
      $new_itinerary->setDestState($miss_req_session->getDestState());
      $new_itinerary->setWaiverNeed(0);
      $new_itinerary->setNeedMedicalRelease($miss_req_session->getPassMedical());
      $new_itinerary->setComment($miss_req_session->getComment());
      $new_itinerary->setAgencyId($agency->getId());
      $new_itinerary->save();
    }

    //set default Mission to Mission table
    //get Passenger
    //$passenger = PassengerPeer::getByPersonId($person->getId());
    $misson = new Mission();
    $misson->setRequestId($miss_req_session->getId());
    $misson->setItineraryId($new_itinerary->getId());
    $misson->setMissionTypeId($miss_req_session->getMissionRequestTypeId());
    $misson->setDateRequested($miss_req_session->getRequesterDate());

    if($passenger){
      $misson->setPassengerId($passenger->getId());
    }
    if($requester){
      $misson->setRequesterId($requester->getId());
    }
    if($agency){
      $misson->setAgencyId($agency->getId());
    }

    
    // Farazi Mission 1 externa ID
    $c = new Criteria();
    $c->add(MissionPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
    $c->addDescendingOrderByColumn(MissionPeer::ID);
    $external_mission = MissionPeer::doSelectOne($c);
    $external_id = $external_mission->getExternalId();
    $currentExternalId=($external_id+1);
    $misson->setExternalId($currentExternalId); 


    $misson->setApptDate($miss_req_session->getApptDate());
    $misson->setFlightTime($miss_req_session->getFlightTime());
    $misson->setMissionDate($miss_req_session->getMissionDate());
    $misson->setMissionCount(1);
    $misson->save();

    $missLeg = new MissionLeg();

    $missLeg->setMissionId($misson->getId());
    $missLeg->setLegNumber(1);
    if($miss_req_session->getOrginState() && $miss_req_session->getOrginZipcode()){
      //echo $miss_req_session->getOrginState().'-'.$miss_req_session->getOrginZipcode();die();
      $fromairport = AirportPeer::getAirportByStateAndZipcode($miss_req_session->getOrginState(), $miss_req_session->getOrginZipcode());
      if($fromairport){
        $missLeg->setFromAirportId($fromairport->getId());
      }
    }
    if($miss_req_session->getDestState() && $miss_req_session->getDestZipcode()){
      //echo $miss_req_session->getDestState().'--'.$miss_req_session->getDestZipcode();die();
      $toairport = AirportPeer::getAirportByStateAndZipcode($miss_req_session->getDestState(), $miss_req_session->getDestZipcode());
      if($toairport){
        $missLeg->setToAirportId($toairport->getId());
      }
    }
    //echo "oder";die();
    $missLeg->setPassOnBoard(0);
    $missLeg->setWebCoordinated(0);
    $missLeg->setTransportation('air_mission');
    $missLeg->save();
    //end set Mission

    $this->getUser()->setFlash('success','New mission has successfully created!');
    $miss_req_session->setProcessedDate(time());
    $miss_req_session->save();
    $this->getUser()->setAttribute('miss_req', null);

    //$this->redirect('miss_req');
    //$this->getUser()->setFlash('success',$success);
    //$request->getParameter('back')
    
    $this->redirect('/itinerary/detail/'.$new_itinerary->getId());
  }

  /**
   * missionRequests
   * CODE:mission_request_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $request->checkCSRFProtection();
    $this->forward404Unless($mission_request = MissionRequestPeer::retrieveByPk($request->getParameter('id')), sprintf('Object mission_request does not exist (%s).', $request->getParameter('id')));
    $mission_request->delete();
    $this->redirect('missionRequest/index');
  }

  /**
   * missionRequests Mission Guide
   */
  public function executeUserStep(sfWebRequest $request)
  {

    if(!$request->getParameter('not')){
      $this->not_agreed = 'yes';
    }else{
      $this->not_agreed = 'no';
    }
    $this->getUser()->addRecentItem('Add mission request', 'UserStep', 'missionRequest/UserStep');
    if($request->isMethod('post')){
      if($request->getParameter('acc_cre') == 1){
        $this->redirect('missionRequest/userStep1');
      }else{
        $this->not_agreed = 1;
        $this->redirect('missionRequest/userStep?not='.$this->not_agreed);
      }
    }
    
  }

  /**
   * missionRequests 5 stepped from users - Passenger,requester, appointment,companians
   */
  public function executeUserStep1(sfWebRequest $request)
  {
    if($request->getParameter('id')){
      $this->mission_request_temp = MissionRequestPeer::retrieveByPK($request->getParameter('id'));
    }else{
      $this->mission_request_temp = new MissionRequest();
    }

    $this->key = $request->getParameter('key');
    if (!$this->key) {
      $this->key = rand(1000,9999);
    }

    $this->form1 = new MissionRequestForm1($this->mission_request_temp);

    $this->back = $request->getReferer();
    $this->referer = $request->getReferer();

    $mission_temp  = $this->mission_request_temp;

    $this->not_agreed = 1;
    if($request->isMethod('post'))
    {
      $this->form1->bind($request->getParameter('miss_req_temp1'));

      if ($this->form1->isValid() && $request->getParameter('on_behalf') != null){
        /* @var $mission_temp MissionRequest */
        if ($mission_temp->isNew()) $mission_temp->setIpAddress($_SERVER["REMOTE_ADDR"]);
        //        $temp_session = $this->getUser()->getAttribute('miss_temp');
        //session
        //        if (!$temp_session) {
        //          $temp_session = array($this->key => array());
        //          $this->getUser()->setAttribute('miss_temp', $temp_session);
        //        }
        //        elseif (!isset($temp_session[$this->key]))
        //        {
        $mission_temp->setPassTitle($request->getParameter('miss_req_temp1[pass_title]'));
        $mission_temp->setPassFirstName($request->getParameter('miss_req_temp1[pass_first_name]'));
        $mission_temp->setPassLastName($request->getParameter('miss_req_temp1[pass_last_name]'));
        $mission_temp->setOnBehalf($request->getParameter('on_behalf'));
        $mission_temp->setRequestBy($request->getParameter('miss_req_temp1[request_by]'));
        $mission_temp->setFollowUpContactName($request->getParameter('miss_req_temp1[follow_up_contact_name]'));
        $mission_temp->setFollowUpContactPhone($request->getParameter('miss_req_temp1[follow_up_contact_phone]'));
        $mission_temp->setFollowUpEmail($request->getParameter('miss_req_temp1[follow_up_email]'));
        $mission_temp->setPassZipcode($request->getParameter('miss_req_temp1[pass_zipcode]'));
        $mission_temp->setPassDateOfBirth($request->getParameter('miss_req_temp1[pass_date_of_birth]'));
        $mission_temp->setOrginCity($request->getParameter('miss_req_temp1[orgin_city]'));
        $mission_temp->setOrginState($request->getParameter('miss_req_temp1[orgin_state]'));
        $mission_temp->setOrginZipcode($request->getParameter('miss_req_temp1[orgin_zipcode]'));
        $mission_temp->setDestCity($request->getParameter('miss_req_temp1[dest_city]'));
        $mission_temp->setDestState($request->getParameter('miss_req_temp1[dest_state]'));
        $mission_temp->setDestZipcode($request->getParameter('miss_req_temp1[dest_zipcode]'));

        if($this->form1->isNew()){
          $mission_temp->setRequesterDate(date("Y/m/d"));
        }

        $this->getUser()->setAttribute('miss_temp', $mission_temp);

        return $this->redirect('missionRequest/userStep2');
        //        }
      }else{
        $this->on_behalf = 1;
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@missionRequest/userStep1';
    }
    // set other form2
    $this->form2 = new MissionRequestForm2();
    // set other form3
    $this->form3 = new MissionRequestForm3();

    // set other form4
    $this->form4 = new MissionRequestForm4();
    // set other form5
    $this->form5 = new MissionRequestForm5();

    $this->mission_request_temp = $this->mission_request_temp;
  }

  /**
   * missionRequests UserStep2 - MissionReququestForm2
   */
  public function executeUserStep2(sfWebRequest $request)
  {
    $this->setTemplate('userStep1');

    if(!$this->getUser()->getAttribute('miss_temp')){
      return $this->forward('missionRequest', 'userStep1');
    }else{
      $temp_session = $this->getUser()->getAttribute('miss_temp');
    }

    if(isset($temp_session)){
      $mission_temp = $temp_session;
    }else{
      $mission_temp =  new MissionRequest();
    }

    $this->form2 = new MissionRequestForm2($mission_temp);
    $this->mission_request_temp = $mission_temp;
    $this->back = $request->getReferer();

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form2->bind($request->getParameter('miss_req_temp2'));

      if($this->form2->isValid()){

        //step2
        $mission_temp->setPassFirstName($request->getParameter('miss_req_temp2[pass_first_name]'));
        $mission_temp->setPassLastName($request->getParameter('miss_req_temp2[pass_last_name]'));
        $mission_temp->setPassAddress1($request->getParameter('miss_req_temp2[pass_address1]'));
        $mission_temp->setPassAddress2($request->getParameter('miss_req_temp2[pass_address2]'));
        $mission_temp->setPassCity($request->getParameter('miss_req_temp2[pass_city]'));
        $mission_temp->setPassState($request->getParameter('miss_req_temp2[pass_state]'));
        $mission_temp->setPassZipcode($request->getParameter('miss_req_temp2[pass_zipcode]'));
        $mission_temp->setPassEmail($request->getParameter('miss_req_temp2[pass_email]'));
        $mission_temp->setPassWeight($request->getParameter('miss_req_temp2[pass_weight]'));
        $mission_temp->setPassHeight($request->getParameter('miss_req_temp2[pass_height]'));
        $mission_temp->setPassDayPhone($request->getParameter('miss_req_temp2[pass_day_phone]'));
        $mission_temp->setPassDayComment($request->getParameter('miss_req_temp2[pass_day_comment]'));
        $mission_temp->setPassEvePhone($request->getParameter('miss_req_temp2[pass_eve_phone]'));
        $mission_temp->setPassEveComment($request->getParameter('miss_req_temp2[pass_eve_comment]'));
        $mission_temp->setPassMobilePhone($request->getParameter('miss_req_temp2[pass_mobile_phone]'));
        $mission_temp->setPassMobileComment($request->getParameter('miss_req_temp2[pass_mobile_comment]'));
        $mission_temp->setPassPagerPhone($request->getParameter('miss_req_temp2[pass_pager_phone]'));
        $mission_temp->setPassPagerComment($request->getParameter('miss_req_temp2[pass_pager_comment]'));
        $mission_temp->setPassOtherPhone($request->getParameter('miss_req_temp2[pass_other_phone]'));
        $mission_temp->setPassOtherComment($request->getParameter('miss_req_temp2[pass_other_comment]'));

        $this->getUser()->setAttribute('miss_temp', $mission_temp);

        return $this->redirect('missionRequest/userStep3');

      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@missionRequest/userStep2';
    }

    // set other form1
    $this->form1 = new MissionRequestForm1($this->getUser()->getAttribute('miss_temp'));

    // set other form3
    $this->form3 = new MissionRequestForm3();

    // set other form4
    $this->form4 = new MissionRequestForm4();
    // set other form5
    $this->form5 = new MissionRequestForm5();

    $this->mission_request_temp = $mission_temp;
  }

  /**
   * missionRequests UserStep3 - MissionReququestForm3
   */
  public function executeUserStep3(sfWebRequest $request)
  {
    $this->setTemplate('userStep1');

    if(!$this->getUser()->getAttribute('miss_temp')){
      return $this->forward('missionRequest', 'userStep2');
    }else{
      $temp_session = $this->getUser()->getAttribute('miss_temp');
    }

    if(isset($temp_session)){
      $mission_temp = $temp_session;
    }else{
      $mission_temp =  new MissionRequest();
    }

    $this->form3 = new MissionRequestForm3($mission_temp);
    $this->mission_request_temp = $mission_temp;
    $this->back = $request->getReferer();

    if($request->isMethod('post'))
    {

      $this->referer = $request->getReferer();
      $this->form3->bind($request->getParameter('miss_req_temp3'));

      if($this->form3->isValid()){

        //step3

        $mission_temp->setReqFirstName($request->getParameter('miss_req_temp3[req_first_name]'));
        $mission_temp->setReqlastName($request->getParameter('miss_req_temp3[req_last_name]'));
        $mission_temp->setAgencyName($request->getParameter('miss_req_temp3[agency_name]'));
        $mission_temp->setReqAddress1($request->getParameter('miss_req_temp3[req_address1]'));
        $mission_temp->setReqAddress2($request->getParameter('miss_req_temp3[req_address2]'));
        $mission_temp->setReqCity($request->getParameter('miss_req_temp3[req_city]'));
        $mission_temp->setReqState($request->getParameter('miss_req_temp3[req_state]'));
        $mission_temp->setReqZipCode($request->getParameter('miss_req_temp3[req_zipcode]'));
        $mission_temp->setReqEmail($request->getParameter('miss_req_temp3[req_email]'));
        $mission_temp->setReqDayPhone($request->getParameter('miss_req_temp3[req_day_phone]'));
        $mission_temp->setReqDayComment($request->getParameter('miss_req_temp3[req_day_comment]'));
        $mission_temp->setReqEvePhone($request->getParameter('miss_req_temp3[req_eve_phone]'));
        $mission_temp->setReqEveComment($request->getParameter('miss_req_temp3[req_eve_comment]'));
        $mission_temp->setReqMobilePhone($request->getParameter('miss_req_temp3[req_mobile_phone]'));
        $mission_temp->setReqMobileComment($request->getParameter('miss_req_temp3[req_mobile_comment]'));
        $mission_temp->setReqPagerPhone($request->getParameter('miss_req_temp3[req_pager_phone]'));
        $mission_temp->setReqPagerComment($request->getParameter('miss_req_temp3[req_pager_comment]'));
        $mission_temp->setReqOtherPhone($request->getParameter('miss_req_temp3[req_other_phone]'));
        $mission_temp->setReqOtherComment($request->getParameter('miss_req_temp3[req_other_comment]'));

        $this->getUser()->setAttribute('miss_temp', $mission_temp);

        return $this->redirect('missionRequest/userStep4');
      }else{
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/userStep3';
    }
    // set other form1
    $this->form1 = new MissionRequestForm1($this->getUser()->getAttribute('miss_temp'));

    // set other form2
    $this->form2 = new MissionRequestForm2($this->getUser()->getAttribute('miss_temp'));

    // set other form4
    $this->form4 = new MissionRequestForm4();
    // set other form5
    $this->form5 = new MissionRequestForm5();

    $this->mission_request_temp = $mission_temp;
  }

//  public function validateUserStep4($request){
//      return false;
//  }
  /**
   * missionRequests UserStep4 - MissionReququestForm4
   * @TODO : Need to do php validation on
   *	     Appointment date
   *	     Mission Date
   *	     Return Date
   */
  public function executeUserStep4(sfWebRequest $request)
  {
    $this->setTemplate('userStep1');

    if(!$this->getUser()->getAttribute('miss_temp')){
      return $this->forward('missionRequest', 'userStep3');
    }else{
      $temp_session = $this->getUser()->getAttribute('miss_temp');
    }

    if(isset($temp_session)){
      $mission_temp = $temp_session;
    }else{
      $mission_temp =  new MissionRequest();
    }

    $this->form4 = new MissionRequestForm4($mission_temp);
    $this->mission_request_temp = $mission_temp;
    $this->back = $request->getReferer();

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form4->bind($request->getParameter('miss_req_temp4'));

      if($this->form4->isValid()){

        $mission_temp->fromArray($request->getParameter('miss_req_temp4'));
        //step4

        $mission_temp->setApptDate($request->getParameter('miss_req_temp4[appt_date]'));
        $mission_temp->setMissionDate($request->getParameter('miss_req_temp4[mission_date]'));
        $mission_temp->setReturnDate($request->getParameter('miss_req_temp4[return_date]'));
        $mission_temp->setPassEnglish($request->getParameter('miss_req_temp4[pass_english]'));
        $mission_temp->setPassLanguage($request->getParameter('miss_req_temp4[pass_language]'));
        $mission_temp->setReleasingPhysician($request->getParameter('miss_req_temp4[releasing_physician]'));
        $mission_temp->setReleasePhone($request->getParameter('miss_req_temp4[release_phone]'));
        $mission_temp->setReleasePhoneComment($request->getParameter('miss_req_temp4[release_phone_comment]'));
        $mission_temp->setReleaseFax($request->getParameter('miss_req_temp4[release_fax]'));
        $mission_temp->setReleaseFaxComment($request->getParameter('miss_req_temp4[release_fax_comment]'));
        $mission_temp->setReleaseEmail($request->getParameter('miss_req_temp4[release_email]'));
        $mission_temp->setTreatingPhysician($request->getParameter('miss_req_temp4[treating_physician]'));
        $mission_temp->setTreatingPhone($request->getParameter('miss_req_temp4[treating_phone]'));
        $mission_temp->setTreatingPhoneComment($request->getParameter('miss_req_temp4[treating_phone_comment]'));
        $mission_temp->setTreatingFax($request->getParameter('miss_req_temp4[treating_fax]'));
        $mission_temp->setTreatingFaxComment($request->getParameter('miss_req_temp4[treating_fax_comment]'));
        $mission_temp->setTreatingEmail($request->getParameter('miss_req_temp4[treating_email]'));
        $mission_temp->setFacilityName($request->getParameter('miss_req_temp4[facility_name]'));
        $mission_temp->setFacilityPhone($request->getParameter('miss_req_temp4[facility_phone]'));
        $mission_temp->setFacilityPhoneComment($request->getParameter('miss_req_temp4[facility_phone_comment]'));
        $mission_temp->setLodgingName($request->getParameter('miss_req_temp4[lodging_name]'));
        $mission_temp->setLodgingPhone($request->getParameter('miss_req_temp4[lodging_phone]'));
        $mission_temp->setLodgingPhoneComment($request->getParameter('miss_req_temp4[lodging_phone_comment]'));
        $mission_temp->setEmergencyName($request->getParameter('miss_req_temp4[emergency_name]'));
        $mission_temp->setEmergencyPhone1($request->getParameter('miss_req_temp4[emergency_phone1]'));
        $mission_temp->setEmergencyPhone1Comment($request->getParameter('miss_req_temp4[emergency_phone1_comment]'));
        $mission_temp->setIllness($request->getParameter('miss_req_temp4[illness]'));
        $mission_temp->setFinancial($request->getParameter('miss_req_temp4[financial]'));
        $mission_temp->setPassMedical($request->getParameter('miss_req_temp4[pass_medical]'));
        $mission_temp->setReferralSourceId($request->getParameter('miss_req_temp4[referral_source_id]'));

        $this->getUser()->setAttribute('miss_temp', $mission_temp);

        return $this->redirect('missionRequest/userStep5');
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/userStep4';
    }
    // set other form1
    $this->form1 = new MissionRequestForm1($this->getUser()->getAttribute('miss_temp'));

    // set other form2
    $this->form2 = new MissionRequestForm2($this->getUser()->getAttribute('miss_temp'));

    // set other form3
    $this->form3 = new MissionRequestForm3($this->getUser()->getAttribute('miss_temp'));

    // set other form5
    $this->form5 = new MissionRequestForm5();

    $this->mission_request_temp = $mission_temp;
  }
//     public function  handleErrorUserStep4() {
//	$this->getUser()->setFlash('warning', 'Date problem');
//	$this->setTemplate("userStep1");
//	return sfView::NONE;
//    }
  /**
 * missionRequests UserStep5 - MissionReququestForm5
 */
  public function executeUserStep5(sfWebRequest $request){
    $this->setTemplate('userStep1');

    if(!$this->getUser()->getAttribute('miss_temp')){
      return $this->forward('missionRequest', 'userStep4');
    }else{
      $temp_session = $this->getUser()->getAttribute('miss_temp');
    }

    if(isset($temp_session)){
      $mission_temp = $temp_session;
    }else{
      $mission_temp =  new MissionRequest();
    }

    $this->form5 = new MissionRequestForm5($mission_temp);
    $this->mission_request_temp = $mission_temp;
    $this->back = $request->getReferer();

    if($request->isMethod('post'))
    {
      $this->referer = $request->getReferer();
      $this->form5->bind($request->getParameter('miss_req_temp5'));

      if($this->form5->isValid()){
        //step5
        $mission_temp->setCom1Name($request->getParameter('miss_req_temp5[com1_name]'));
        $mission_temp->setCom1Relationship($request->getParameter('miss_req_temp5[com1_relationship]'));
        $mission_temp->setCom1DateOfBirth($request->getParameter('miss_req_temp5[com1_date_of_birth]'));
        $mission_temp->setCom1Weigth($request->getParameter('miss_req_temp5[com1_weight]'));
        $mission_temp->setCom1Phone($request->getParameter('miss_req_temp5[com1_phone]'));
        $mission_temp->setCom1Comment($request->getParameter('miss_req_temp5[com1_comment]'));

        $mission_temp->setCom2Name($request->getParameter('miss_req_temp5[com2_name]'));
        $mission_temp->setCom2Relationship($request->getParameter('miss_req_temp5[com2_relationship]'));
        $mission_temp->setCom2DateOfBirth($request->getParameter('miss_req_temp5[com2_date_of_birth]'));
        $mission_temp->setCom2Weigth($request->getParameter('miss_req_temp5[com2_weight]'));
        $mission_temp->setCom2Phone($request->getParameter('miss_req_temp5[com2_phone]'));
        $mission_temp->setCom2Comment($request->getParameter('miss_req_temp5[com2_comment]'));

        $mission_temp->setCom3Name($request->getParameter('miss_req_temp5[com3_name]'));
        $mission_temp->setCom3Relationship($request->getParameter('miss_req_temp5[com3_relationship]'));
        $mission_temp->setCom3DateOfBirth($request->getParameter('miss_req_temp5[com3_date_of_birth]'));
        $mission_temp->setCom3Weigth($request->getParameter('miss_req_temp5[com3_weight]'));
        $mission_temp->setCom3Phone($request->getParameter('miss_req_temp5[com3_phone]'));
        $mission_temp->setCom3Comment($request->getParameter('miss_req_temp5[com3_comment]'));

        $mission_temp->setCom4Name($request->getParameter('miss_req_temp5[com4_name]'));
        $mission_temp->setCom4Relationship($request->getParameter('miss_req_temp5[com4_relationship]'));
        $mission_temp->setCom4DateOfBirth($request->getParameter('miss_req_temp5[com4_date_of_birth]'));
        $mission_temp->setCom4Weigth($request->getParameter('miss_req_temp5[com4_weight]'));
        $mission_temp->setCom4Phone($request->getParameter('miss_req_temp5[com4_phone]'));
        $mission_temp->setCom4Comment($request->getParameter('miss_req_temp5[com4_comment]'));

        $mission_temp->setCom5Name($request->getParameter('miss_req_temp5[com5_name]'));
        $mission_temp->setCom5Relationship($request->getParameter('miss_req_temp5[com5_relationship]'));
        $mission_temp->setCom1DateOfBirth($request->getParameter('miss_req_temp5[com5_date_of_birth]'));
        $mission_temp->setCom5Weigth($request->getParameter('miss_req_temp5[com5_weight]'));
        $mission_temp->setCom5Phone($request->getParameter('miss_req_temp5[com5_phone]'));
        $mission_temp->setCom5Comment($request->getParameter('miss_req_temp5[com5_comment]'));

        $this->getUser()->setAttribute('miss_temp', $mission_temp);

        return $this->redirect('missionRequest/userSave');
      }
    }else{
      $this->referer = $request->getReferer() ? $request->getReferer() : '@passenger/userStep4';
    }
    // set other form1
    $this->form1 = new MissionRequestForm1($this->getUser()->getAttribute('miss_temp'));

    // set other form2
    $this->form2 = new MissionRequestForm2($this->getUser()->getAttribute('miss_temp'));

    // set other form3
    $this->form3 = new MissionRequestForm3($this->getUser()->getAttribute('miss_temp'));

    // set other form4
    $this->form4 = new MissionRequestForm4($this->getUser()->getAttribute('miss_temp'));

    $this->mission_request_temp = $mission_temp;
  }
  /**
 * missionRequests save - Save mission request which user typed
 */
  public function executeUserSave(sfWebRequest $request){

    if($this->getUser()->getAttribute('miss_temp')){
      $miss_temp = $this->getUser()->getAttribute('miss_temp');
      if($miss_temp->save()){        
        $this->getUser()->setFlash('success','Mission request has been successfully added.');
        // Farazi Mission Request Email
        $this->getComponent('mail', 'missionReqReceived', array('email' => $miss_temp->getPassEmail(), 'name' => $miss_temp->getPassFirstName().' '.$miss_temp->getPassLastName()));
        $this->getComponent('mail', 'missionReqNotice', array('email' => $miss_temp->getPassEmail(), 'first_name' => $miss_temp->getPassFirstName(),'last_name'=>$miss_temp->getPassLastName(),'address' => $miss_temp->getPassAddress1() . ' ' . $miss_temp->getPassAddress2(),'city'=>$miss_temp->getPassCity(),'state'=>$miss_temp->getPassState(),'zipcode'=>$miss_temp->getPassZipcode()));
      } else {
        $this->getComponent('mail', 'missionReqFailure', array('email' => $miss_temp->getPassEmail(), 'name' => $miss_temp->getPassFirstName().' '.$miss_temp->getPassLastName()));
      }

      if(!$this->getUser()->getId()){
          $this->redirect('/');
      }
      $this->redirect('miss_req');
    }else{
      $this->getUser()->setFlash('success','Unsuccessful attempt! Please try again.');
      $this->redirect('missionRequest/userStep1');
    }
  }

  /**
   * missionRequests view - Mission Request Temp View
   */
  public function executeUserView(sfWebRequest $request)
  {
    $this->miss_req = MissionRequestPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->miss_req->getId());
    $this->title = 'Mission Request View';

    # recent item
    $this->getUser()->addRecentItem('Miss. Req. for '.$this->miss_req->getPassFirstName().' '.$this->miss_req->getPassLastName(), 'mission_request', 'missionRequest/userView?id='.$this->miss_req->getId());
  }

  public function executeAjax(sfWebRequest $request){
    $this->setLayout(false);

    if($request->getParameter('start_date') && $request->getParameter('end_date')){
      $pliot_reqs = PilotRequestPeer::getDateRanges($request->getParameter('start_date'),$request->getParameter('end_date'));

      $ids = array();
      $count = 0;

      foreach ($pliot_reqs as $pliot_req){
        $ids[$count] = '|' + $pliot_req->getId();
      }

      return $this->renderText($ids);
    }
  }
  /**
 * Save Filter mission requests by filter
 * CODE:
 */
  public function executeFilter(sfWebRequest $request){
    #TODO
    #security

    $req_date1 = $request->getParameter('request_date1', '');
    $req_date2 = $request->getParameter('request_date2', '');
    $miss_date1 = $request->getParameter('mission_date1', '');
    $miss_date2 = $request->getParameter('mission_date2', '');

    $standart = $request->getParameter('standart', '');
    $referrals = $request->getParameter('referrals', '');

    $this->mission_reqs =MissionRequestPeer::getByFilters(
    $req_date1,
    $req_date2,
    $miss_date1,
    $miss_date2,
    $standart,
    $referrals
    );
  }
  
  public function executeReject(sfWebRequest $request){ 
  	$this->mission_req = MissionRequestPeer::retrieveByPK($request->getParameter('id'));
        $this->forward404Unless($this->mission_req);
  	
        $email   = $request->getParameter('hemail');
        $subject = $request->getParameter('subject');
        $text    = $request->getParameter('body');
  	
        /*if($request->getParameter('send_mail')) {
                $this->getComponent('mail', 'missionReqReject', array(
                  'text'    => $text,
                  'email'   => $email,
                  'subject' => $subject,
                ));

                $this->mission_req->delete();
                return $this->setTemplate('close');
        }*/
        
        $mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());
        $message = Swift_Message::newInstance($subject)->setFrom('AngelFlight@yahoo.com')->setTo($email)->setBody($text);
            
        if($request->getParameter('send_mail')){ 
            if($mailer->send($message))
            {
                $this->getUser()->setFlash('success','Your request has been rejected successfully.');
            }
            else
            {
                $this->getUser()->setFlash('success','Your request has not been rejected.');
            }
            
            $this->mission_req->delete();
            return $this->setTemplate('close');
        }

  	$this->setLayout(false);
  }
  
  public function executeRefer(sfWebRequest $request){
    $this->mission_req = MissionRequestPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->mission_req);
    
    $email   = $request->getParameter('email');
    $subject = $request->getParameter('subject');
    $text    = $request->getParameter('body');
    
    if($request->getParameter('send_mail')) {
      $this->getComponent('mail', 'missionReqReject', array(
        'text'    => $text,
        'email'   => $email,
        'subject' => $subject,
      ));
      
      return $this->setTemplate('close');
    }
    $this->setLayout(false);
  }
}
