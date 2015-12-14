<?php

/**
 * pending_member actions.
 *
 * @package    angelflight
 * @subpackage pending_member
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pending_memberActions extends sfActions {

    public function preExecute() {
	if (!$this->getUser()->getId()) {
	    $request = sfContext::getInstance()->getRequest();
	    $this->setPublicFormSecurityToken($request);
	}
	sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
	slot('nav_menu', array('members', 'add-application'));
    }

    /**
     * List of pending applications
     */
    public function executeIndex(sfWebRequest $request)
    {	

	slot('nav_menu', array('members', 'pending-application'));

	$this->indexFilter($request);
	$this->pager = ApplicationTempPeer::getNonProcessedPager($this->max, $this->page);
	$this->application_temp_list = $this->pager->getResults();
    }

    protected function indexFilter(sfWebRequest $request) {
	$params = $this->getUser()->getAttribute('application_temp', array(), 'person');

	$this->max_array = array(5, 10, 20, 30);

	if (in_array($request->getParameter('max'), $this->max_array)) {
	    $params['max'] = $request->getParameter('max');
	} else {
	    if (!isset($params['max']))
		$params['max'] = sfConfig::get('app_max_person_per_page', 10);
	}

	$this->page = $page = $request->getParameter('page', 1);
	$this->max = $params['max'];

	$this->getUser()->setAttribute('application_temp', $params, 'person');
    }

    public function executeDelete(sfWebRequest $request) {
	$request->checkCSRFProtection();

	$this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application_temp does not exist (%s).', $request->getParameter('id')));
	$application_temp->delete();

	$this->getUser()->setFlash('success', 'Membership application for ' . $application_temp->getFirstName() . $application_temp->getLastName() . ' is successfully removed!');

	$this->redirect('pending_member/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form, $next_step) {
	$taintedValues = $request->getParameter($form->getName());
	$form->bind($taintedValues, $request->getFiles($form->getName()));

	if ($form->isValid()) {
	    $application_temp = $form->getObject();

	    if (($application_temp->getIsComplete() == -4) && ($form instanceof ApplicationTempStep1Form)) {
		$application_temp->setIsComplete(-3); # step1 complete
	    } elseif (($application_temp->getIsComplete() == -3) && ($form instanceof ApplicationTempStep2Form)) {
		$application_temp->setIsComplete(-2); # step2 complete
	    } elseif (($application_temp->getIsComplete() == -2) && ($form instanceof ApplicationTempStep3Form)) {
		$application_temp->setIsComplete(-1); # step3 complete
	    } elseif (($application_temp->getIsComplete() == 0) && ($form instanceof ApplicationTempStep5Form)) {
		$application_temp->setIsComplete(1); # step5 complete		

                //echo print_r($taintedValues); die();
		//payment
		//$lib_folder = sfConfig::get('sf_lib_dir').DIRECTORY_SEPARATOR.
		//;
		if (!$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)) {

                    list($month, $year) = explode('/', $taintedValues['ccard_expire']);
		    $cardnumber = str_replace('-', '', $taintedValues['ccard_number']);
		    $ccardcode = $taintedValues['ccard_code'];

		    $payment = new afids_paymentGateway;

		    $payment->gateway_name = "novapointe";
		    $payment->transaction_type = "sale";
		    $item_data = "&total=" . sfConfig::get('app_membership_fee', 25);
		    $item_data.= "&tax=" . sfConfig::get('app_membership_tax', 0);
		    $item_data.= "&bill_first_name=" . $application_temp->getFirstName();
		    $item_data.= "&bill_last_name=" . $application_temp->getLastName();
		    $item_data.= "&bill_address1=" . $application_temp->getAddress1();
		    $item_data.= "&bill_address2=" . $application_temp->getAddress2();
		    $item_data.= "&bill_city=" . $application_temp->getCity();
		    $item_data.= "&bill_state=" . $application_temp->getState();
		    $item_data.= "&bill_zip=" . $application_temp->getZipcode();
		    $item_data.= "&bill_country=" . $application_temp->getCountry();
		    $item_data.= "&bill_phone=" . $application_temp->getDayPhone();
		    $item_data.= "&ccard=" . $cardnumber;
		    $item_data.= "&expmonth=" . $month;
		    $item_data.= "&expyear=" . $year;
		    $item_data.= "&cvv2=" . $ccardcode;

		    $payment->item_data = $item_data;
		    $payment->shipping_code = "USPS";

		    $data = json_decode($payment->submitPayment());

		    if ($data->http_result == 'success' && $data->transaction_result == 'success') {
			$this->getUser()->setFlash('success', 'Successfully charged membership fee using the credit card information.');
                        /*
                        if ($application_temp->getEmail()) {
                          # send email for success payment 
                          $this->getComponent('mail', 'memberApplicationRecieved', array('email' => $application_temp->getEmail(), 'name' => $application_temp->getFirstName() . ' ' . $application_temp->getLastName()));
                          $this->getComponent('mail', 'memberApplicationNotice', array('email' => $application_temp->getEmail(), 'first_name' => $application_temp->getFirstName(),'last_name'=>$application_temp->getLastName(),'address' => $application_temp->getAddress1() . ' ' . $application_temp->getAddress2(),'city'=>$application_temp->getCity(),'state'=>$application_temp->getState(),'zipcode'=>$application_temp->getZipcode()));
                        }*/

                    } else {
			$this->getUser()->setFlash('warning', 'Membership Fee Transaction failed. Please check your credit card information.');
			$this->getUser()->setFlash('pendingMemberTaintedvalue', $taintedValues);

                        /*
                        if ($application_temp->getEmail()) {
                          # send email failure to payment
                          $this->getComponent('mail', 'memberApplicationFailure', array('email' => $application_temp->getEmail(), 'name' => $application_temp->getFirstName() . ' ' . $application_temp->getLastName()));

                        }*/

			return $this->redirect('/pending_member/step5?id=' . $application_temp->getId());
			// return sfView::SUCCESS;
		    }

		    if (preg_match("#(\d{2})/(\d{4})#", $taintedValues['ccard_expire'], $match)) {
			$month = $match[1];
			$year = $match[2];
			$day = "01";
			$application_temp->setCcardExpire("{$year}-{$month}-{$day}");
		    }
		}               
		
	    }            
            $form->save();
            $application_temp->setRenewal(0);
	    $application_temp->save();
	    $this->redirect('pending_member/' . $next_step . '?id=' . $application_temp->getId());
	}
    }

    /**
     * First step of many step application.
     * When this form is submitted it creates the incomplete record in database.
     */
    public function executeStep1(sfWebRequest $request) {	
       
        $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	if ($application_temp) {
	    $this->form1 = new ApplicationTempStep1Form($application_temp);
	} else {
	    $this->form1 = new ApplicationTempStep1Form();
	}


	$this->setTemplate('steps');
    }

    public function executeStep1Check(sfWebRequest $request) {

	$this->forward404Unless($request->isMethod('post'));
	$application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	if ($application_temp instanceof ApplicationTemp) {
	    $this->form1 = new ApplicationTempStep1Form($application_temp);
	} else {
	    $this->form1 = new ApplicationTempStep1Form();
	}

	$this->processForm($request, $this->form1, 'step2');

	$this->setTemplate('steps');
    }

    public function executeStep2(sfWebRequest $request) {

	$application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	$this->forward404Unless($application_temp);

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $application_temp->getApplicantPilot()));

	$this->setTemplate('steps');
    }

    public function executeStep2Check(sfWebRequest $request) {

	$this->forward404Unless($request->isMethod('post'));
	$this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));

	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $application_temp->getApplicantPilot()));

	$this->processForm($request, $this->form2, ($application_temp->getApplicantPilot() ? 'step3' : 'step4'));

	$this->form1 = new ApplicationTempStep1Form($application_temp);

	$this->setTemplate('steps');
    }

    public function executeStep3(sfWebRequest $request) {

	$application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	$this->forward404Unless($application_temp);
	$this->forward404Unless($application_temp->getApplicantPilot());

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => 1));
	$this->form3 = new ApplicationTempStep3Form($application_temp);

	$this->setTemplate('steps');
    }

    public function executeStep3Check(sfWebRequest $request) {

	$this->forward404Unless($request->isMethod('post'));
	$this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));
	$this->forward404Unless($application_temp->getApplicantPilot());

	$this->form3 = new ApplicationTempStep3Form($application_temp);

	$this->processForm($request, $this->form3, 'step4');

	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => 1));
	$this->form1 = new ApplicationTempStep1Form($application_temp);

	$this->setTemplate('steps');
    }

    /**
     * This step asks whether applicant agrees on affirmation
     */
    public function executeStep4(sfWebrequest $request) {

	$application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	$this->forward404Unless($application_temp);

	$is_pilot = $application_temp->getApplicantPilot();

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
	if ($is_pilot)
	    $this->form3 = new ApplicationTempStep3Form($application_temp);
	$this->form4_widget = $this->getAgreeWidget($this->form2);

	$this->setTemplate('steps');
    }

    public function executeStep4Check(sfWebRequest $request) {

	$application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	$this->forward404Unless($application_temp);

	$agreed = $request->getParameter('affirmation_agreed');
	if ($agreed) {
	    $application_temp->setAffirmationAgreed($agreed);
	    if (
		    $application_temp->getIsComplete() == -1
		    ||
		    $application_temp->getApplicantPilot() != 1 && $application_temp->getIsComplete() == -2
	    )
	    $application_temp->setIsComplete(0);# step4 complete
	    $application_temp->save();
	    /*
            if ($application_temp->getEmail()) {
		# send email
		//$this->getComponent('mail', 'memberApplicationRecieved', array('email' => $application_temp->getEmail(), 'name' => $application_temp->getFirstName() . ' ' . $application_temp->getLastName()));
	    }*/

	    $this->redirect('pending_member/step5?id=' . $application_temp->getId());
	}

	$is_pilot = $application_temp->getApplicantPilot();

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
	if ($is_pilot)
	    $this->form3 = new ApplicationTempStep3Form($application_temp);
	$this->form4_widget = $this->getAgreeWidget($this->form2);

	$this->setTemplate('steps');
    }

    protected function getAgreeWidget($formatter_form) {
	$choices = array(1 => 'I agree', 0 => 'I do not agree');
	return new sfWidgetFormSelectRadio(array('choices' => $choices, 'formatter' => array($formatter_form, 'formatterRaw'))); # hopefully we can use other form's method to format
    }

    public function executeStep5(sfWebRequest $request) {

	$application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
	$this->forward404Unless($application_temp);

	$is_pilot = $application_temp->getApplicantPilot();

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
	if ($is_pilot)
	    $this->form3 = new ApplicationTempStep3Form($application_temp);
	$this->form4_widget = $this->getAgreeWidget($this->form2);
	$this->form5 = new ApplicationTempStep5Form($application_temp);

	if ($this->getUser()->hasFlash('pendingMemberTaintedvalue')) {
	    $this->form5->bind($this->getUser()->getFlash('pendingMemberTaintedvalue'));
	}

	$this->setTemplate('steps');
    }

    public function executeStep5Check(sfWebRequest $request) {
     
	$this->forward404Unless($request->isMethod('post'));
	$this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));

	$is_pilot = $application_temp->getApplicantPilot();

	$this->form5 = new ApplicationTempStep5Form($application_temp);
	$this->processForm($request, $this->form5, 'stepsComplete');

	$this->form1 = new ApplicationTempStep1Form($application_temp);
	$this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
	if ($is_pilot)
	    $this->form3 = new ApplicationTempStep3Form($application_temp);
	$this->form4_widget = $this->getAgreeWidget($this->form2);

	$this->setTemplate('steps');
    }

    public function executeStepsComplete(sfWebRequest $request) {

	$this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));

	switch ($application_temp->getIsComplete()) {
	    case -4:
		$this->redirect('pending_member/step1?id=' . $application_temp->getId());
		break;
	    case -3:
		$this->redirect('pending_member/step2?id=' . $application_temp->getId());
		break;
	    case -2:
		$this->redirect('pending_member/step3?id=' . $application_temp->getId());
		break;
	    case -1:
		$this->redirect('pending_member/step4?id=' . $application_temp->getId());
		break;
	    case 0:
		$this->redirect('pending_member/step5?id=' . $application_temp->getId());
		break;
	}
    }

    public function executeShow(sfWebRequest $request) {
	slot('nav_menu', array('members', 'pending-application'));

	$this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->application_temp);
    }

    public function executeProcess(sfWebRequest $request) {
	slot('nav_menu', array('members', 'pending-application'));

	$this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->application_temp);

	$this->processFilter($request);
	$this->pager = PersonPeer::getNotInMemberPager(
			$this->max,
			$this->page,
			$this->application_temp->getFirstName(),
			$this->application_temp->getLastName(),
			$this->application_temp->getGender(),
			null, null, null, null, null, null, null,
			$this->application_temp->getZipcode()
	);
	$this->people = $this->pager->getResults();
    }

    protected function processFilter(sfWebRequest $request) {
	$params = $this->getUser()->getAttribute('application_temp_process', array(), 'person');

	$this->max_array = array(5, 10, 20, 30);

	if (in_array($request->getParameter('max'), $this->max_array)) {
	    $params['max'] = $request->getParameter('max');
	} else {
	    if (!isset($params['max']))
		$params['max'] = sfConfig::get('app_max_person_per_page', 10);
	}

	$this->page = $page = $request->getParameter('page', 1);
	$this->max = $params['max'];

	$this->getUser()->setAttribute('application_temp_process', $params, 'person');
    }

    protected function processFilterSearch(sfWebRequest $request) {
	$params = $this->getUser()->getAttribute('application_temp_process', array(), 'person');

	if (!isset($params['deceased_until']))
	    $params['deceased_until'] = null;
	if (!isset($params['name']))
	    $params['name'] = null;
	if (!isset($params['email']))
	    $params['email'] = null;

	$this->max_array = array(5, 10, 20, 30);

	if (in_array($request->getParameter('max'), $this->max_array)) {
	    $params['max'] = $request->getParameter('max');
	} else {
	    if (!isset($params['max']))
		$params['max'] = sfConfig::get('app_max_person_per_page', 10);
	}

	$this->page = $page = $request->getParameter('page', 1);
	$this->max = $params['max'];

	if ($request->hasParameter('filter')) {
	    $params['deceased_until'] = $request->getParameter('deceased_until');
	    $params['name'] = $request->getParameter('name');
	    $params['email'] = $request->getParameter('email');
	}
	$this->deceased_until = $params['deceased_until'];
	$this->name = $params['name'];
	$this->email = $params['email'];

	$this->getUser()->setAttribute('application_temp_process', $params, 'person');
    }

    public function executeProcessStep1(sfWebRequest $request) {
	slot('nav_menu', array('members', 'pending-application'));

        $this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->application_temp);

	$this->person = PersonPeer::retrieveByPK($request->getParameter('person_id'));
	if ($this->person) {
	    $this->application_temp->setPersonId($this->person->getId());
	}

	$this->form1 = new ApplicationTempProcessStep1Form($this->application_temp);

	if ($request->isMethod('post')) {
	    $this->processStep1Check($request, $this->form1);
	}

	$this->setTemplate('processSteps');
    }

    protected function processStep1Check(sfWebRequest $request, sfForm $form) {
	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	if ($form->isValid()) {
	    $form->save();

	    if ($this->person)
		$person_id = $this->person->getId(); else
		$person_id = null;

	    $this->redirect('pending_member/processStep2?id=' . $this->application_temp->getId() . ($person_id ? '&person_id=' . $person_id : ''));
	}
    }

    public function executeProcessStep2(sfWebRequest $request) {
	slot('nav_menu', array('members', 'pending-application'));

	$this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->application_temp);

	$this->person = PersonPeer::retrieveByPK($this->application_temp->getPersonId());

	$this->form2 = new ApplicationTempProcessStep2Form($this->application_temp);

	if ($request->isMethod('post')) {
	    $this->processStep2Check($request, $this->form2);
	}

	$this->form1 = new ApplicationTempProcessStep1Form($this->application_temp);

	$this->setTemplate('processSteps');
    }

    protected function processStep2Check(sfWebRequest $request, sfForm $form) {
	$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	if ($form->isValid()) {
	    $form->save();

	    if ($this->person)
		$person_id = $this->person->getId(); else
		$person_id = null;

	    $this->redirect('pending_member/processStep3?id=' . $this->application_temp->getId() . ($person_id ? '&person_id=' . $person_id : ''));
	}
    }

    public function executeProcessStep3(sfWebRequest $request) {
	//echo $request->getParameter('step3_redirect');die();
	slot('nav_menu', array('members', 'pending-application'));
        
	$this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->application_temp);

	$this->person = PersonPeer::retrieveByPK($this->application_temp->getPersonId());
        
	if ($request->isMethod('post')) {
	    $this->processStep3Check($request);
	}

	$this->form1 = new ApplicationTempProcessStep1Form($this->application_temp);
	$this->form2 = new ApplicationTempProcessStep2Form($this->application_temp);

	$this->setTemplate('processSteps');
    }

    protected function processStep3Check(sfWebRequest $request) {
	$default_airport = AirportPeer::getByIdent(sfConfig::get('app_default_airport_ident'));
	$this->forward404Unless($default_airport);

	$app = $this->application_temp;
	$person = $this->person;
	if (!($person instanceof Person)) {
	    $person = new Person();
	}
	/* @var $app ApplicationTemp */
	/* @var $person Person */

	// Person
	$tmp_arr = $app->toArray(BasePeer::TYPE_FIELDNAME);
	$tmp_arr['evening_phone'] = $tmp_arr['eve_phone'];
	$tmp_arr['evening_comment'] = $tmp_arr['eve_comment'];
	unset($tmp_arr['id']);
	$person->fromArray($tmp_arr, BasePeer::TYPE_FIELDNAME);
	$person->save();

	// Member
	$member = MemberPeer::getByPersonId($person->getId());
	if (!($member instanceof Member)) {
	    $member = new Member();
	}

        // Generate external id using last member is and external id
        $c = new Criteria();
        $c->add(MemberPeer::EXTERNAL_ID, NULL, Criteria::ISNOTNULL);
        $c->addDescendingOrderByColumn(MemberPeer::ID);
        $external_member = MemberPeer::doSelectOne($c);
        $external_id = $external_member->getExternalId();
        $currentExternalId=($external_id+1);
        //print_r($external_id);
        //print_r($currentExternalId);

	$member->setActive(1);
	$member->setCoPilot($app->getApplicantCopilot());
	$member->setContact('By Email');
	$member->setDateOfBirth($app->getDateOfBirth());
	$member->setDriversLicenseState($app->getDriversLicenseState());
	$member->setDriversLicenseNumber($app->getDriversLicenseNumber());
	$member->setEmergencyContactName($app->getEmergencyContactName());
	$member->setEmergencyContactPhone($app->getEmergencyContactPhone());
	$member->setFlightStatus($app->getApplicantPilot() ? 'Verify Orientation' : 'Non-pilot');
	$member->setJoinDate(time());
	$member->setLanguages($app->getLanguagesSpoken());
	//$member->setMasterMemberId($app->getMasterMemberId());
	$member->setMemberClassId($app->getMemberClassId());
	$member->setPersonId($person->getId());
	$member->setRenewedDate(time());
	$member->setRenewalDate(strtotime('+1 year'));
	$member->setSpouseName($app->getSpouseFirstName() . ' ' . $app->getSpouseLastName());

        //external_id generate
        $member->setExternalId($currentExternalId);
        $member->setWingId($app->getWingId());
        $member->save();

       

	// Pilot
	if ($app->getApplicantPilot()) {
	    $pilot = new Pilot();
	    $pilot->setMemberId($member->getId());
	    $airport = AirportPeer::getByIdent($app->getHomeBase());
	    if (!($airport instanceof Airport))
		$airport = $default_airport;
	    $pilot->setPrimaryAirportId($airport->getId());
	    $pilot->setTotalHours($app->getTotalHours());
	    $pilot->setLicenseType('Private');
	    foreach (sfConfig::get('app_pilot_license_types') as $key => $val) {
		if (stripos($app->getRatings(), $key) !== false)
		    $pilot->setLicenseType($key);
	    }
	    $pilot->setIfr(stripos($app->getRatings(), 'ifr') !== false ? 1 : 0);
	    $pilot->setMultiEngine(stripos($app->getRatings(), 'multi') !== false ? 1 : 0);
	    $pilot->setSeInstructor('No'); // @see ApplicationForm
	    foreach (sfConfig::get('app_pilot_se_instructor') as $key => $val) {
		if (stripos($app->getRatings(), $key) !== false)
		    $pilot->setSeInstructor($key);
	    }
	    $pilot->setMeInstructor($pilot->getSeInstructor());
	    $pilot->save();

	    // Availability
	    $availability = new Availability();
	    $availability->setMemberId($member->getId());
	    $availability->setNotAvailable(0);
	    $availability->setNoWeekday($app->getAvailabilityWeekdays() == 0);
	    $availability->setNoNight($app->getAvailabilityWeeknights() == 0);
	    $availability->setLastMinute($app->getAvailabilityLastMinute());
	    $availability->setAsMissionMssistant($app->getAvailabilityCopilot());
	    $availability->setNoWeekend($app->getAvailabilityWeekends() == 0);
	    try {
		$availability->save();
	    } catch (Exception $e) {
		
	    }
	    // Primary aircraft
	    if ($app->getAircraftPrimaryId() && ($aircraft = AircraftPeer::retrieveByPK($app->getAircraftPrimaryId()))) {
		$pilot_aircraft = new PilotAircraft();
		$pilot_aircraft->setMemberId($member->getId());
		$pilot_aircraft->setAircraftId($aircraft->getId());
		$pilot_aircraft->setNNumber($app->getAircraftPrimaryNNumber());
		$pilot_aircraft->setOwn($app->getAircraftPrimaryOwn());
		$pilot_aircraft->setSeats($app->getAircraftPrimarySeats());
		$pilot_aircraft->setKnownIce($app->getAircraftPrimaryIce());
		$pilot_aircraft->save();
	    }

	    // Secondary aircraft
	    if ($app->getAircraftSecondaryId() && ($aircraft = AircraftPeer::retrieveByPK($app->getAircraftSecondaryId()))) {
		$pilot_aircraft = new PilotAircraft();
		$pilot_aircraft->setMemberId($member->getId());
		$pilot_aircraft->setAircraftId($aircraft->getId());
		$pilot_aircraft->setNNumber($app->getAircraftSecondaryNNumber());
		$pilot_aircraft->setOwn($app->getAircraftSecondaryOwn());
		$pilot_aircraft->setSeats($app->getAircraftSecondarySeats());
		$pilot_aircraft->setKnownIce($app->getAircraftSecondaryIce());
		$pilot_aircraft->save();
	    }

	    // Third aircraft
	    if ($app->getAircraftThirdId() && ($aircraft = AircraftPeer::retrieveByPK($app->getAircraftThirdId()))) {
		$pilot_aircraft = new PilotAircraft();
		$pilot_aircraft->setMemberId($member->getId());
		$pilot_aircraft->setAircraftId($aircraft->getId());
		$pilot_aircraft->setNNumber($app->getAircraftThirdNNumber());
		$pilot_aircraft->setOwn($app->getAircraftThirdOwn());
		$pilot_aircraft->setSeats($app->getAircraftThirdSeats());
		$pilot_aircraft->setKnownIce($app->getAircraftThirdIce());
		$pilot_aircraft->save();
	    }
	}

	// Application_temp
	$app->setPersonId($person->getId());
	$app->setMemberId($member->getId());
	$app->setProcessedDate(time());
	$app->save();

	// Application
	$tmp_arr = $app->toArray(BasePeer::TYPE_FIELDNAME);
	$tmp_arr['date'] = $tmp_arr['application_date'];
	$tmp_arr['company'] = $tmp_arr['company_name'];
	foreach (sfConfig::get('app_pilot_license_types') as $key => $val) {
	    if (stripos($tmp_arr['ratings'], $key) !== false)
		$tmp_arr['license_type'] = $key;
	}
	$tmp_arr['ifr'] = (stripos($tmp_arr['ratings'], 'ifr') !== false ? 1 : 0);
	$tmp_arr['multi_engine'] = (stripos($tmp_arr['ratings'], 'multi') !== false ? 1 : 0);
	$tmp_arr['se_instructor'] = 'No'; // @see ApplicationForm
	foreach (sfConfig::get('app_pilot_se_instructor') as $key => $val) {
	    if (stripos($tmp_arr['ratings'], $key) !== false)
		$tmp_arr['se_instructor'] = $key;
	}
	$tmp_arr['me_instructor'] = $tmp_arr['se_instructor'];
	$tmp_arr['other_ratings'] = $tmp_arr['ratings'];
	$tmp_arr['fbo'] = $tmp_arr['fbo_name'];
	$tmp_arr['member_meetings'] = 0;
	$tmp_arr['executive_board'] = 0;
	$tmp_arr['dues_amount_paid'] = ($tmp_arr['dues_amount_paid'] ? $tmp_arr['dues_amount_paid'] : 0);
	unset($tmp_arr['id']);

	$application = new Application();
	$application->fromArray($tmp_arr, BasePeer::TYPE_FIELDNAME);
	$application->save();
	$where = $request->getParameter('step3_redirect');
	
         //Ziyed  save default role for new member
        
         $appTemp = $this->application_temp;        
         
         if($appTemp->getPersonId()){
             $person_role = new PersonRole();             
             $person_role->setPersonId($appTemp->getPersonId());

             if( $appTemp->getApplicantPilot()== 1 ){
                $person_role->setRoleId(27);
             }else{
                $person_role->setRoleId(31);
             }
             $person_role->save();
         }
                  
        //Ziyed end save

        
        
        
	if ($where == 1) {
	    $this->redirect('@member_view?id=' . $member->getId());
	} else {
            /*
            if ($application->getEmail()) {
                # send email failure to payment
                $this->getComponent('mail', 'memberApplicationProcessed', array('email' => $application->getEmail(),'member_id'=>$member->getId(), 'name' => $application->getFirstName() . ' ' . $application->getLastName()));

            }*/
            $this->redirect('pending_member/processComplete?id=' . $member->getId());
	}
    }

    public function executeProcessComplete(sfWebRequest $request) {
	$this->memberID = $request->getParameter('id');
        $member = MemberPeer::retrieveByPK($this->memberID);
        $this->member_id =$member->getExternalId();
        
    }

    public function executeSearch(sfWebRequest $request) {
	
	#security
	if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
        }
	slot('nav_menu', array('members', 'pending-search'));

	$this->processFilterSearch($request);
	$this->pager = ApplicationTempPeer::getNonProcessedSearchPager($this->max, $this->page, $this->deceased_until, $this->name, $this->email);
	$this->application_temp_list = $this->pager->getResults();
	$this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
    }
    
    public function setPublicFormSecurityToken(sfWebRequest $request) {
	$f = new sfForm();
	$this->csrf_tag = $f->getCSRFToken();

	if ($request->hasParameter('referer'))
	    $this->referer = $request->getParameter('referer');
	else
	    $this->referer = $request->getUri();
    }

}
