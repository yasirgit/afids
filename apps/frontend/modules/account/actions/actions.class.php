<?php

/**
 * account actions.
 *
 * @package    angelflight
 * @subpackage account
 * @author     Javzaa
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class accountActions extends sfActions {

    public function executeIndex(sfWebRequest $request)
    {
        $this->person = PersonPeer::retrieveByPK($this->getUser()->getId());
        if ($pilot_id = $this->getUser()->getPilotId()) {
            $this->pilot = PilotPeer::retrieveByPK($pilot_id);
        } else {
            $this->pilot = null;
        }
        if ($member_id = $this->getUser()->getMemberId()) {
            $this->member = MemberPeer::retrieveByPK($member_id);
            // Farazi Renewal date calculation
            $date_now = strtotime("NOW");
            $date_ren = strtotime($this->member->getRenewalDate());
            $sub = ($date_ren - $date_now);
            $preday = 0;
            if($sub >=86400){
               $pday = $sub / 86400;
               $preday = explode('.',$pday);
            }else {
               $pday = $sub / 86400;
               $preday = explode('.',$pday);
            }
            $this->due_day = $preday[0];
            //End Farazi Renewal date calculation


        } else {
            $this->member = null;
        }
        if (($this->member !== null) && ($this->pilot !== null)) {
            $this->availability = $this->member->getAvailability();
        }
        if (!($this->availability instanceof Availability)) {
            $this->availability = new Availability();
        }

        $this->email_lists = EmailListPeer::doSelect(new Criteria());
        $this->subscribed_list = EmailListPersonPeer::getEmailListIdsByPersonId($this->person->getId());
    }

    public function executeUpdate(sfWebRequest $request)
    {
        if ($request->getParameter('id')) {
            $this->account = PersonPeer::retrieveByPK($request->getParameter('id'));
            $this->title = 'Edit Personal Info';
        }

        $this->form = new PersonForm($this->account);
        $this->back = $request->getReferer();

        if ($request->isMethod('post')) {
            $this->referer = $request->getParameter('referer');

            $this->form->bind($request->getParameter('per'));

            if ($this->form->isValid()) {
                $this->account->setTitle($this->form->getValue('title'));
                $this->account->setFirstName($this->form->getValue('first_name'));
                $this->account->setLastName($this->form->getValue('last_name'));
                $this->account->setAddress1($this->form->getValue('address1'));
                $this->account->setAddress2($this->form->getValue('address2'));
                $this->account->setCity($this->form->getValue('city'));
                $this->account->setCounty($this->form->getValue('county'));
                $this->account->setState($this->form->getValue('state'));
                $this->account->setCountry($this->form->getValue('country'));
                $this->account->setZipcode($this->form->getValue('zipcode'));
                $this->account->setDayPhone($this->form->getValue('day_phone'));
                $this->account->setDayComment($this->form->getValue('day_comment'));
                $this->account->setEveningPhone($this->form->getValue('evening_phone'));
                $this->account->setEveningComment($this->form->getValue('evening_comment'));
                $this->account->setMobilePhone($this->form->getValue('mobile_phone'));
                $this->account->setMobileComment($this->form->getValue('mobile_comment'));
                $this->account->setPagerPhone($this->form->getValue('pager_phone'));
                $this->account->setPagerComment($this->form->getValue('pager_comment'));
                $this->account->setOtherPhone($this->form->getValue('other_phone'));
                $this->account->setOtherComment($this->form->getValue('other_comment'));
                $this->account->setFaxPhone1($this->form->getValue('fax_phone1'));
                $this->account->setFaxComment1($this->form->getValue('fax_comment1'));
                $this->account->setAutoFax($this->form->getValue('auto_fax'));
                $this->account->setFaxPhone2($this->form->getValue('fax_phone2'));
                $this->account->setFaxComment2($this->form->getValue('fax_comment2'));
                $this->account->setEmail($this->form->getValue('email'));
                $this->account->setEmailTextOnly($this->form->getValue('email_text_only'));
                $this->account->setEmailBlocked($this->form->getValue('email_blocked'));
                $this->account->setComment($this->form->getValue('comment'));
                $this->account->setBlockMailings($this->form->getValue('block_mailings'));
                $this->account->setNewsletter($this->form->getValue('newsletter'));
                $this->account->setGender($this->form->getValue('gender'));
                $this->account->setDeceased($this->form->getValue('deceased'));
                $this->account->setDeceasedComment($this->form->getValue('deceased_comment'));
                $this->account->setSecondaryEmail($this->form->getValue('secondary_email'));
                $this->account->setDeceasedDate($this->form->getValue('deceased_date'));
                $this->account->setMiddleName($this->form->getValue('middle_name'));
                $this->account->setSuffix($this->form->getValue('suffix'));
                $this->account->setNickname($this->form->getValue('nickname'));
                $this->account->setVeteran($this->form->getValue('veteran'));
                $this->account->setPagerEmail($this->form->getValue('pager_email'));
                $this->account->save();

                $this->getUser()->setFlash('success', 'Your personal information has been successfully changed!');

                $last = $request->getParameter('back');

                if (strstr($last, 'person/view')) {
                    $back_url = '@person_view?id=' . $request->getParameter('id');
                } else {
                    $back_url = 'account';
                }

                $this->redirect($back_url);
            }
        } else {
            # Set referer URL
            $this->referer = $request->getReferer() ? $request->getReferer() : '@account';
        }
        $this->account = $this->account;
    }

    public function executeUpdatePassword(sfWebRequest $request)
    {

        if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Member','Coordinator','Volunteer'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
        }


        $username = $this->getUser()->getUsername();
        $this->person = PersonPeer::getByUsername($username);

        if ($request->isMethod('post')) {
            if ($old_pass = $request->getParameter('old_pass')) {
                if ($this->person->isPassword($old_pass)) {
                    $required_len = sfConfig::get('app_password_minimum_length');
                    $new_pass = $request->getParameter('new_pass');
                    $confirm_pass = $request->getParameter('confirm_pass');
                    if (strlen($new_pass) >= $required_len && strlen($confirm_pass) >= $required_len) {
                        if ($new_pass == $confirm_pass) {
                            $this->person->setPassword($confirm_pass);
                            $this->person->save();

                            $this->getUser()->setFlash('success', 'Your password has been successfully changed!');

                            $this->redirect('account/index');
                        } else {
                            $this->error_msg = 'New passwords doesn\'t match!';
                        }
                    } else {
                        $this->error_msg = 'Your password must be at least ' . $required_len . ' characters!';
                    }
                } else {
                    $this->error_msg = 'Your old password is not right!';
                }
            } else {
                $this->error_msg = 'Please enter your old password!';
            }
        }
    }

    /**
     * TODO: Check related records.
     */
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
        $this->forward404Unless($person = PersonPeer::retrieveByPk($request->getParameter('id')), sprintf('Object person does not exist (%s).', $request->getParameter('id')));
        $person->delete();

        $this->redirect('account/index');
    }

    public function executeToggle(sfWebRequest $request)
    {
        $person = PersonPeer::retrieveByPK($this->getUser()->getId());
        $html = '';
        switch ($request->getParameter('name')) {
            case 'email_blocked':
                $person->setEmailBlocked($person->getEmailBlocked() == 1 ? 0 : 1);
                if ($person->getEmailBlocked() == 1) {
                    $html = 'Yesun-block email';
                } else {
                    $html = 'No block email';
                }
                break;
            case 'email_text_only':
                $person->setEmailTextOnly($person->getEmailTextOnly() == 1 ? 0 : 1);
                if ($person->getEmailTextOnly() == 1) {
                    $html = 'Yesset to any';
                } else {
                    $html = 'No set to text only';
                }
                break;
            case 'email':
                $validator = new sfValidatorEmail(array('required' => true), array('invalid' => 'Email address is invalid: %value%', 'required' => 'Email address is required'));
                try {
                    $email = $validator->clean($request->getParameter('email'));
                    $person->setEmail($email);
                    $html = $email;
                } catch (sfValidatorError $e) {
                    $html = '#' . $e->__toString();
                }
                break;
            case 'email_list':
                $email_list_person = new EmailListPerson();
                $email_list_person->setPersonId($person->getId());
                $email_list_person->setListId($request->getParameter('id'));
                $result = EmailListPersonPeer::doSelectOne($email_list_person->buildCriteria());
                if ($result instanceof EmailListPerson) {
                    $result->delete();
                } else {
                    $email_list_person->save();
                }
                if ($email_list_person->isNew()) {
                    $html = 'subscribe';
                } else {
                    $html = 'un-subscribe';
                }
                break;
        }
        $person->save();

        return $this->renderText($html);
    }

    public function executeEditPilot(sfWebRequest $request)
    {
        $member = MemberPeer::retrieveByPK($this->getUser()->getMemberId());
        $this->forward404Unless($member);
        $pilot = $member->getPilot();
        $this->forward404Unless($pilot);

        $this->flight_status = $member->getFlightStatus();
        $this->co_pilot = $member->getCoPilot();
        $this->license_type = $pilot->getLicenseType();
        $this->wing_id = $member->getWingId();
        $this->primary_airport_id = $pilot->getPrimaryAirportId();
        $this->secondary_airport_id = $pilot->getPrimaryAirportId(); // TODO change to secondary

        $this->flight_statuses = sfConfig::get('app_flight_statuses', array());
        $this->license_types = sfConfig::get('app_pilot_license_types', array());
        $this->wings = WingPeer::getNames();
    }

    public function executeUpdatePilot(sfWebRequest $request)
    {
        $member = MemberPeer::retrieveByPK($this->getUser()->getMemberId());
        $this->forward404Unless($member);
        $pilot = $member->getPilot();
        $this->forward404Unless($pilot);

        $member->setFlightStatus($request->getParameter('flight_status'));
        $member->setCoPilot($request->getParameter('co_pilot') ? 1 : 0);
        $pilot->setLicenseType($request->getParameter('license_type'));
        $member->setWingId($request->getParameter('wing_id'));
        $pilot->setPrimaryAirportId($request->getParameter('primary_airport_id'));
        // TODO add secondary airport
        $member->save();
        $pilot->save();

        $this->getUser()->setFlash('success', 'Your pilot information has been successfully updated!');
        $this->redirect('account/index');
    }

    public function executeAjaxAirport(sfWebRequest $request)
    {
        $airports = AirportPeer::getByWingId($request->getParameter('wing_id'));

        $html = '<select class="text narrow">';
        foreach ($airports as $airport) {
            $html .= '<option value="' . $airport->getId() . '">' . $airport->getIdent() . '</option>';
        }
        $html .= '</select>';

        return $this->renderText($html);
    }

    public function executeNewAircraft(sfWebRequest $request)
    {
        if( !$this->getUser()->hasCredential(array('Administrator'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
        }

        $memberId = $request->getParameter('id');
        $this->leg_id = $request->getParameter('leg');
         
        $this->form = new PilotAircraftForm();

        if($memberId && $this->leg_id){
            //set member_id  from mission leg for Add pilot aircraft
            $this->form->setDefault('member_id', $memberId);
        }else{
            $this->form->setDefault('member_id', $this->getUser()->getMemberId());
        }       
        if ($request->isMethod('post')) {

             $memberId = $request->getParameter('pilot_aircraft[member_id]');
             $this->leg_id = $request->getParameter('pilot_aircraft_leg_id');

             if($memberId && $this->leg_id){
                 //Add pilot aircraft from mission leg
                 $this->processAircraftForm($this->form, $request,$this->leg_id);
             }else{                 
                 $this->processAircraftForm($this->form, $request);
             }

        }
        
    }

    public function executeEditAircraft(sfWebRequest $request) {
        if( !$this->getUser()->hasCredential(array('Administrator'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
        }

        $pilot_aircraft = PilotAircraftPeer::retrieveByPK($request->getParameter('id'));
        $this->forward404Unless($pilot_aircraft);
        $this->forward404Unless($pilot_aircraft->getMemberId() == $this->getUser()->getMemberId());

        $this->form = new PilotAircraftForm($pilot_aircraft);
        if ($request->isMethod('post')) {
            $this->processAircraftForm($this->form, $request);
        }
    }

    public function executeAjaxDeleteAircraft(sfWebRequest $request)
    {
       if( !$this->getUser()->hasCredential(array('Administrator'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
            $this->redirect('dashboard/index');
        }

        $pilot_aircraft = PilotAircraftPeer::retrieveByPK($request->getParameter('id'));
        $this->forward404Unless($pilot_aircraft);
        $this->forward404Unless($pilot_aircraft->getMemberId() == $this->getUser()->getMemberId());

        $pilot_aircraft->delete();

        return sfView::NONE;
    }

    public function processAircraftForm(PilotAircraftForm $form, $request, $legid) {
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid()) {
            $form->save();            
            $this->getUser()->setFlash('success', 'Aircraft has been successfully saved!');
            if($legid)
            {             
               $this->redirect('@leg_edit?id='.$legid);
            }else{
               $this->redirect('account/index');                
            }
        }
    }

    public function executeSaveAvailability(sfWebRequest $request) {
        $member_id = $this->getUser()->getMemberId();
        if ($member_id) {
            $member = MemberPeer::retrieveByPK($member_id);
        } else {
            $this->forward404();
        }

        $availability = $member->getAvailability();
        if (!($availability instanceof Availability)) {
            $availability = new Availability();
            $availability->setMemberId($member_id);
        }

        $availability->setNotAvailable($request->getParameter('available') != 1);
        if ($availability->getNotAvailable()) {
            if ($request->getParameter('option') == 'dates') {
                $availability->setFirstDate($request->getParameter('start_date'));
                $availability->setLastDate($request->getParameter('end_date'));
            } else {
                $availability->setFirstDate(null);
                $availability->setLastDate(null);
            }
        }
        $availability->setNoWeekday($request->getParameter('weekdays') != 1);
        $availability->setNoNight($request->getParameter('nights') != 1);
        $availability->setNoWeekend($request->getParameter('weekends') != 1);
        $availability->setLastMinute($request->getParameter('last_minute'));
        $availability->setAsMissionMssistant($request->getParameter('assistant'));
        $availability->setAvailabilityComment($request->getParameter('comment'));
        $availability->save();

        return sfView::NONE;
    }

    public function executeNewPersonalFlight(sfWebRequest $request)
    {          
           if( !$this->getUser()->hasCredential(array('Administrator','Pilot','Staff'), false)){
               $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
               $this->redirect('dashboard/index');
            }

            $this->form = new PersonalFlightForm();
            if ($request->isMethod('post')) {
                             
               $this->processPersonalFlightForm($this->form, $request);
           }
    }

    public function executeEditPersonalFlight(sfWebRequest $request)
    {        
       if( !$this->getUser()->hasCredential(array('Administrator','Pilot','Staff'), false)){
               $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
               $this->redirect('dashboard/index');
       }

        $personal_flight = PersonalFlightPeer::retrieveByPK($request->getParameter('id'));
        $this->forward404Unless($personal_flight);
        $this->forward404Unless($personal_flight->getPilotId() == $this->getUser()->getPilotId());

        $this->form = new PersonalFlightForm($personal_flight);
        if ($request->isMethod('post')) {
            $this->processPersonalFlightForm($this->form, $request);
        }
    }

  public function executeAjaxDeletePersonalFlight(sfWebRequest $request)
  {
        if( !$this->getUser()->hasCredential(array('Administrator','Pilot','Staff'), false)){
               $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
               $this->redirect('dashboard/index');
        }

        $personal_flight = PersonalFlightPeer::retrieveByPK($request->getParameter('id'));
        $this->forward404Unless($personal_flight);
        $this->forward404Unless($personal_flight->getPilotId() == $this->getUser()->getPilotId());

        $personal_flight->delete();

        return sfView::NONE;
    }

  public function processPersonalFlightForm(PersonalFlightForm $form, $request)
  {
        $values = $request->getParameter($form->getName());
        $values['pilot_id'] = $this->getUser()->getPilotId();
        $form->bind($values);
        if ($form->isValid()) {
            $form->save();

            $this->getUser()->setFlash('success', 'Personal flight has been successfully saved!');
            $this->redirect('account/index');
        }
    }
}
