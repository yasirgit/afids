<?php
/**
 * renewal actions.
 * @package    angelflight
 * @subpackage renewal
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class renewalActions extends sfActions
{
  public function preExecute()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
  }

  /**
   * List of pending applications
   */
  public function executeIndex(sfWebRequest $request)
  {
    
    
    slot('nav_menu', array('members', 'pending-renewal'));
    $this->member_id = $request->getParameter('id');    
    $this->indexFilter($request);
    $this->pager = ApplicationTempPeer::getNonRenewalProcessedPager($this->max, $this->page, true);
    $this->application_temp_list = $this->pager->getResults();
  }

  protected function indexFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('application_temp', array(), 'person');

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    $this->page = $page = $request->getParameter('page', 1);
    $this->max  = $params['max'];

    $this->getUser()->setAttribute('application_temp', $params, 'person');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application_temp does not exist (%s).', $request->getParameter('id')));
    $application_temp->delete();

    $this->getUser()->setFlash('success', 'Membership application for '.$application_temp->getFirstName().$application_temp->getLastName().' is successfully removed!');

    $this->redirect('renewal/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form, $next_step)
  {
    $taintedValues = $request->getParameter($form->getName());
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    //die();
    if ($form->isValid())
    {
      //die("ok");
      /* @var $application_temp ApplicationTemp */
      $application_temp = $form->save();
      
      if (($application_temp->getIsComplete() == -4) && ($form instanceof ApplicationTempStep1Form)) {
        $application_temp->setIsComplete(-3); # step1 complete
        $this->fillStepsRemaining($application_temp);
        
      }elseif (($application_temp->getIsComplete() == -3) && ($form instanceof ApplicationTempStep2Form)) {
        $application_temp->setIsComplete(-2); # step2 complete
      }elseif (($application_temp->getIsComplete() == -2) && ($form instanceof ApplicationTempStep3Form)) {
        $application_temp->setIsComplete(-1); # step3 complete
      }elseif (($application_temp->getIsComplete() == 0) && ($form instanceof ApplicationTempStep5Form)) {                $application_temp->setIsComplete(1); # step5 complete

                //echo  $application_temp->getFirstName();
                //echo "ddd";
               //die();                
                $donation_amount = $request->getParameter('donation_amount');
                $member_due_amount = $request->getParameter('member_due_amount');
                $totalAmount = ($donation_amount + $member_due_amount);
                //$request->getParameter('total_amount');
                if($totalAmount>0) {

                    //echo $request->getParameter('total_amount');
                    //die();

                    //list($month, $year) = explode('/', $taintedValues['ccard_expire']);
                    $month=$request->getParameter('month');
                    $year=$request->getParameter('year');

                    $cardnumber = str_replace('-', '', $taintedValues['ccard_number']);
		    $ccardcode = $taintedValues['ccard_code'];
                    
		    $payment = new afids_paymentGateway;
                    

                    //echo "DOA :".$donation_amount."Due".$member_due_amount."Total :".$totalAmount;
                    //die();

		    $payment->gateway_name = "novapointe";
		    $payment->transaction_type = "sale";
		    $item_data = "&total=" .$totalAmount;
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
			$this->getUser()->setFlash('success', 'Successfully charged membership renewal fee using the credit card information.');
                       
                    if ($application_temp->getEmail()) {

                               $application_temp->setDuesAmountPaid($member_due_amount);
                               $application_temp->setDonationAmountPaid($donation_amount);

                                # send email
                                //Member Renewal Acknowledgement email
                               $this->getComponent('mail', 'memberRenewalReceived', array('email' => $application_temp->getEmail(),'donation_amount' =>$donation_amount,'due_amount' => $member_due_amount,'totalAmount' => $totalAmount, 'name' => $application_temp->getFirstName().' '.$application_temp->getLastName()));
                               //Member Renewal Notice email
                               $this->getComponent('mail', 'memberRenewalNotice', array('email' => $application_temp->getEmail(), 'first_name' => $application_temp->getFirstName(),'last_name'=>$application_temp->getLastName(),'address' => $application_temp->getAddress1() . ' ' . $application_temp->getAddress2(),'city'=>$application_temp->getCity(),'state'=>$application_temp->getState(),'zipcode'=>$application_temp->getZipcode()));
                        }
                    } else {
			$this->getUser()->setFlash('warning', 'Membership Fee Transaction failed. Please check your credit card information.');
			$this->getUser()->setFlash('pendingMemberTaintedvalue', $taintedValues);

                        //Member Renewal Failure email
                        if ($application_temp->getEmail()) {
                                # send email
                               $this->getComponent('mail', 'memberRenewalFailure', array('email' => $application_temp->getEmail(), 'name' => $application_temp->getFirstName().' '.$application_temp->getLastName()));
                        }
                        return $this->redirect('/renewal/step5?id=' . $application_temp->getId());
			// return sfView::SUCCESS;
		    }                    
                    if(preg_match("#(\d{2})#", $month, $match)) {
			$month = $match[1];
                    }
                    if(preg_match("#(\d{4})#", $year, $match)) {
			$year = $match[1];
                    }                   
                    if($month!='' && $year!='')
                    {
                        $month = $month;
			$year = $year;
			$day = "01";
                        
                        $application_temp->setCcardExpire("{$year}-{$month}-{$day}");
                    }
                    /*
                    if(preg_match("#(\d{2})/(\d{4})#", $application[ccard_expire], $match)) {
			$month = $match[1];
			$year = $match[2];
			$day = "01";
			$application_temp->setCcardExpire("{$year}-{$month}");
		    }*/
               } else {
                  $this->getUser()->setFlash('success', 'Successfully completed your renewal application.');
                  if ($application_temp->getEmail()) {
                       $member_due_amount=0;
                        # send email
                        //Member Renewal Acknowledgement email
                       $this->getComponent('mail', 'memberRenewalReceived', array('email' => $application_temp->getEmail(),'donation_amount' =>$donation_amount,'due_amount' => $member_due_amount,'totalAmount' => $totalAmount, 'name' => $application_temp->getFirstName().' '.$application_temp->getLastName()));
                       //Member Renewal Notice email
                       $this->getComponent('mail', 'memberRenewalNotice', array('email' => $application_temp->getEmail(), 'first_name' => $application_temp->getFirstName(),'last_name'=>$application_temp->getLastName(),'address' => $application_temp->getAddress1() . ' ' . $application_temp->getAddress2(),'city'=>$application_temp->getCity(),'state'=>$application_temp->getState(),'zipcode'=>$application_temp->getZipcode()));
                        
                    }
               }

      }      
      $application_temp->save();
      $this->redirect('renewal/'.$next_step.'?id='.$application_temp->getId());
    }
  }

  /**
   * First step of many step application.
   * When this form is submitted it creates the incomplete record in database.
   */
  public function executeStep1(sfWebRequest $request)
  {

      
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
    //echo $this->due_day;
    if($this->due_day>30)
    {
      $this->getUser()->setFlash("warning", 'Our records indicate that you are not due to renew your membership: <br /> Date you joined Angel Flight West: '.$this->member->getJoinDate('m/d/Y').' <br />Renewal Date : '.$this->member->getRenewalDate('m/d/Y').'<br />If you wish to change your personal data, please <a href=\'/account/edit/'.$this->member->getPersonId().'\'>click here</a><br />If you wish to renew a spouse membership, please log on as your spouse and click on the link to renew membership..');
      $this->redirect('account/index');
    }
    
    

    $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
    //print_r($application_temp);
    if ($application_temp){
      $this->form1 = new ApplicationTempStep1Form($application_temp);
    }else{
      $this->form1 = new ApplicationTempStep1Form();
      $this->fillStep1($this->form1);
    }

    $this->setTemplate('steps');
  }

  /**
   * Fills some predefined values from user account
   * @param ApplicationTempStep1Form $form
   */
  private function fillStep1(ApplicationTempStep1Form $form)
  {
    //echo $this->getUser()->getId();
    $person = PersonPeer::retrieveByPK($this->getUser()->getId());
    $form->setDefaults(array(
      'title' => $person->getTitle(),
      'first_name' => $person->getFirstName(),
      'last_name' => $person->getLastName(),
      'middle_name' => $person->getMiddleName(),
      'suffix' => $person->getSuffix(),
      'nickname' => $person->getNickname(),
      'address1' => $person->getAddress1(),
      'address2' => $person->getAddress2(),
      'city' => $person->getCity(),
      'state' => $person->getState(),
      'zipcode' => $person->getZipcode(),
      'country' => $person->getCountry(),
      'email' => $person->getEmail(),
      'secondary_email' => $person->getSecondaryEmail(),
      'day_phone' => $person->getDayPhone(),
      'day_comment' => $person->getDayComment(),
      'eve_phone' => $person->getEveningPhone(),
      'eve_comment' => $person->getEveningComment(),
      'mobile_phone' => $person->getMobilePhone(),
      'mobile_comment' => $person->getMobileComment(),
      'pager_phone' => $person->getPagerPhone(),
      'pager_comment' => $person->getPagerComment(),
      'fax_phone1' => $person->getFaxPhone1(),
      'fax_comment1' => $person->getFaxComment1(),
      'fax_phone2' => $person->getFaxPhone2(),
      'fax_comment2' => $person->getFaxComment2(),
      'other_phone' => $person->getOtherPhone(),
      'other_comment' => $person->getOtherComment(),
      'pager_email' => $person->getPagerEmail(),
      'gender' => $person->getGender(),
      'veteran' => $person->getVeteran(),
      'applicant_pilot' => ($this->getUser()->getPilotId() ? 1 : 0),
    ));
  }

  /**
   * Fills steps other than step1
   * @param ApplicationTemp $app
   */
  private function fillStepsRemaining(ApplicationTemp $app)
  {
    $app->setRenewal(1);
    $app->setPersonId($this->getUser()->getId());
    $app->setPremiumChoice(1);
    $app->setPremiumSize(0);

    $member = MemberPeer::retrieveByPK($this->getUser()->getMemberId());
    if ($member) {
      $app->setMemberId($member->getId());
      $v = explode(' ', $member->getSpouseName());
      $app->setSpouseFirstName((string)$v[0]);
      $app->setSpouseLastName((string)$v[1]);
      $app->setEmergencyContactName($member->getEmergencyContactName());
      $app->setEmergencyContactPhone($member->getEmergencyContactPhone());
      $app->setApplicantCopilot($member->getCoPilot());
      $app->setLanguagesSpoken($member->getLanguages());
      $app->setDateOfBirth($member->getDateOfBirth());
      $app->setDriversLicenseNumber($member->getDriversLicenseNumber());
      $app->setDriversLicenseState($member->getDriversLicenseState());
      $app->setWeight($member->getWeight());
      $app->setWingId($member->getWingId());
      $app->setMemberClassId($member->getMemberClassId());

      $pilot = PilotPeer::retrieveByPK($this->getUser()->getPilotId());
      if ($pilot) {
        $airport = $pilot->getAirport();
        $app->setHomeBase($airport->getIdent());
        $v = array();
        foreach ($airport->getFbos() as $fbo) $v[] = $fbo->getName();
        $app->setFboName(implode(', ', $v));
        $v = array();
        if ($pilot->getIfr()) $v[] = 'IFR';
        if ($pilot->getMultiEngine()) $v[] = 'multi';
        if ($pilot->getOtherRatings()) $v[] = 'other';
        if ($pilot->getSeInstructor()) $v[] = $pilot->getSeInstructor();
        if ($pilot->getSeInstructor()) $v[] = $pilot->getMeInstructor();
        if ($pilot->getLicenseType()) $v[] = $pilot->getLicenseType();
        $app->setRatings(implode(', ', $v));
        $app->setTotalHours($pilot->getTotalHours());
      }
      $availability = $member->getAvailability();
      if ($availability) {
        $app->setAvailabilityWeekdays($availability->getNoWeekday() ? 0 : 1);
        $app->setAvailabilityWeeknights($availability->getNoNight() ? 0 : 1);
        $app->setAvailabilityWeekends($availability->getNoWeekend() ? 0 : 1);
        $app->setAvailabilityLastMinute($availability->getLastMinute());
        $app->setAvailabilityCopilot($availability->getAsMissionMssistant());
      }

      $pilot_aircrafts = $member->getPilotAircrafts();
      
      /* @var $p_a PilotAircraft */
      if (isset($pilot_aircrafts[0])) {
        $p_a = $pilot_aircrafts[0];
        $app->setAircraftPrimaryId($p_a->getAircraftId());
        $app->setAircraftPrimaryOwn($p_a->getOwn());
        $app->setAircraftPrimarySeats($p_a->getSeats());
        $app->setAircraftPrimaryIce($p_a->getKnownIce());
        $app->setAircraftPrimaryNNumber($p_a->getNNumber());
      }
      if (isset($pilot_aircrafts[1])) {
        $p_a = $pilot_aircrafts[1];
        $app->setAircraftSecondaryId($p_a->getAircraftId());
        $app->setAircraftSecondaryOwn($p_a->getOwn());
        $app->setAircraftSecondarySeats($p_a->getSeats());
        $app->setAircraftSecondaryIce($p_a->getKnownIce());
        $app->setAircraftSecondaryNNumber($p_a->getNNumber());
      }
      if (isset($pilot_aircrafts[2])) {
        $p_a = $pilot_aircrafts[2];
        $app->setAircraftThirdId($p_a->getAircraftId());
        $app->setAircraftThirdOwn($p_a->getOwn());
        $app->setAircraftThirdSeats($p_a->getSeats());
        $app->setAircraftThirdIce($p_a->getKnownIce());
        $app->setAircraftThirdNNumber($p_a->getNNumber());
      }
      $application = $member->getLastApplication();
      if ($application) {
        $app->setPremiumChoice($application->getPremiumChoice());
        $app->setMissionOrientation($application->getMissionOrientation());
        $app->setMissionCoordination($application->getMissionCoordination());
        $app->setPilotRecruitment($application->getPilotRecruitment());
        $app->setFundRaising($application->getFundRaising());
        $app->setCelebrityContacts($application->getCelebrityContacts());
        $app->setGraphicArts($application->getGraphicArts());
        $app->setHospitalOutreach($application->getHospitalOutreach());
        $app->setEventPlanning($application->getEventPlanning());
        $app->setMediaRelations($application->getMediaRelations());
        $app->setTelephoneWork($application->getTelephoneWork());
        $app->setComputers($application->getComputers());
        $app->setClerical($application->getClerical());
        $app->setPrinting($application->getPrinting());
        $app->setWriting($application->getWriting());
        $app->setSpeakersBureau($application->getSpeakersBureau());
        $app->setWingTeam($application->getWingTeam());
        $app->setWebInternet($application->getWebInternet());
        $app->setFoundationContacts($application->getFoundationContacts());
        $app->setAviationContacts($application->getAviationContacts());
        $app->setMemberAopa($application->getMemberAopa());
        $app->setMemberKiwanis($application->getMemberKiwanis());
        $app->setMemberRotary($application->getMemberRotary());
        $app->setMemberLions($application->getMemberLions());
        $app->setMember99s($application->getMember99s());
        $app->setMemberWia($application->getMemberWia());
        $app->setCompanyName($application->getCompany());
        $app->setCompanyPosition($application->getCompanyPosition());
        $app->setCompanyMatchFunds($application->getCompanyMatchFunds());
        $app->setHeight($application->getHeight());
        $app->setPilotCertificate($application->getPilotCertificate());
        $app->setMedicalClass($application->getMedicalClass());
      }
    }
  }

  public function executeStep1Check(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
    if ($application_temp instanceof ApplicationTemp) {
      $this->form1 = new ApplicationTempStep1Form($application_temp);
    }else{
      $this->form1 = new ApplicationTempStep1Form();
    }

    $this->processForm($request, $this->form1, 'step2');
    
    $this->setTemplate('steps');
  }

  public function executeStep2(sfWebRequest $request)
  {
    $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($application_temp);

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $application_temp->getApplicantPilot()));
    
    $this->setTemplate('steps');
  }

  public function executeStep2Check(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));

    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $application_temp->getApplicantPilot()));

    $this->processForm($request, $this->form2, ($application_temp->getApplicantPilot()?'step3':'step4'));

    $this->form1 = new ApplicationTempStep1Form($application_temp);

    $this->setTemplate('steps');
  }

  public function executeStep3(sfWebRequest $request)
  {
    $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($application_temp);
    $this->forward404Unless($application_temp->getApplicantPilot());

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => 1));
    $this->form3 = new ApplicationTempStep3Form($application_temp);

    $this->setTemplate('steps');
  }

  public function executeStep3Check(sfWebRequest $request)
  {
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
  public function executeStep4(sfWebrequest $request)
  {
    $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($application_temp);

    $is_pilot = $application_temp->getApplicantPilot();

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
    if ($is_pilot) $this->form3 = new ApplicationTempStep3Form($application_temp);
    $this->form4_widget = $this->getAgreeWidget($this->form2);

    $this->setTemplate('steps');
  }
  public function executeStep4Check(sfWebRequest $request)
  {
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
      $application_temp->setIsComplete(0); # step4 complete
      $application_temp->save();      
      if ($application_temp->getEmail()) {
        # send email
        //$this->getComponent('mail', 'memberRenewalReceived', array('email' => $application_temp->getEmail(), 'name' => $application_temp->getFirstName().' '.$application_temp->getLastName()));
      }

      $this->redirect('renewal/step5?id='.$application_temp->getId());
    }else{
      $this->getUser()->setFlash('warning', 'Sorry, we are unable to process your membership renewal unless you agree!');
    }
    
    $is_pilot = $application_temp->getApplicantPilot();

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
    if ($is_pilot) $this->form3 = new ApplicationTempStep3Form($application_temp);
    $this->form4_widget = $this->getAgreeWidget($this->form2);
    $this->setTemplate('steps');
  }

  protected function getAgreeWidget($formatter_form)
  {
    $choices = array(1 => 'I agree', 0 => 'I do not agree');
    return new sfWidgetFormSelectRadio(array('choices' => $choices, 'formatter' => array($formatter_form, 'formatterRaw'))); # hopefully we can use other form's method to format
  }

  public function executeStep5(sfWebRequest $request)
  {
    $application_temp = ApplicationTempPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($application_temp);    
    $this->exp=$request->getParameter('exp');

    $is_pilot = $application_temp->getApplicantPilot();

    //Farazi Get Member Class information
    $member =  MemberPeer::retrieveByPK($application_temp->getMemberId());
    $this->memberclass = MemberClassPeer::retrieveByPK($member->getMemberClassId());

    $this->total_amount=$this->memberclass->getRenewalFee();
    $this->donation_amount=$request->getParameter('donation_amount');
    
    //print_r($memberclass);

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
    if ($is_pilot) $this->form3 = new ApplicationTempStep3Form($application_temp);
    $this->form4_widget = $this->getAgreeWidget($this->form2);
    $this->form5 = new ApplicationTempStep5Form($application_temp);

    $this->setTemplate('steps');
  }

  public function executeStep5Check(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));


    $this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));
    $is_pilot = $application_temp->getApplicantPilot();

    $month=$request->getParameter('month');
    $year=$request->getParameter('year');

    if($request->getParameter('total_amount')>0)
    {
        if($month =='' &&  $year =='')
        {
            $next_step='step5';
            $this->redirect('renewal/'.$next_step.'?id='.$request->getParameter('id').'&exp=1');
        }
    }

    //Farazi Get Member Class information
    $member =  MemberPeer::retrieveByPK($application_temp->getMemberId());
    $this->memberclass = MemberClassPeer::retrieveByPK($member->getMemberClassId());
    //print_r($memberclass);

    $this->total_amount=$request->getParameter('total_amount');
    $this->donation_amount=$request->getParameter('donation_amount');
    //echo $total;


    $this->form5 = new ApplicationTempStep5Form($application_temp);
    $this->processForm($request, $this->form5, 'stepsComplete');

    $this->form1 = new ApplicationTempStep1Form($application_temp);
    $this->form2 = new ApplicationTempStep2Form($application_temp, array('pilot' => $is_pilot));
    if ($is_pilot) $this->form3 = new ApplicationTempStep3Form($application_temp);
    $this->form4_widget = $this->getAgreeWidget($this->form2);
    
    $this->setTemplate('steps');
  }

  public function executeStepsComplete(sfWebRequest $request)
  {
    $this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')));

    switch ($application_temp->getIsComplete()) {
      case -4:
        $this->redirect('renewal/step1?id='.$application_temp->getId());
        break;
      case -3:
        $this->redirect('renewal/step2?id='.$application_temp->getId());
        break;
      case -2:
        $this->redirect('renewal/step3?id='.$application_temp->getId());
        break;
      case -1:
        $this->redirect('renewal/step4?id='.$application_temp->getId());
        break;
      case 0:
        $this->redirect('renewal/step5?id='.$application_temp->getId());
        break;
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    slot('nav_menu', array('members', 'pending-renewal'));

    $this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);
  }

  public function executeProcess(sfWebRequest $request)
  {
    slot('nav_menu', array('members', 'pending-renewal'));

    $this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);

    $this->processFilter($request);
    $this->pager = PersonPeer::getRenewalProcessPager(
            $this->max,
            $this->page,
            $this->application_temp->getFirstName(),
            $this->application_temp->getLastName(),
            $this->application_temp->getGender(),
            null,null,null,null,null,null,null,
            $this->application_temp->getZipcode()
    );
    $this->people = $this->pager->getResults();
  }

  protected function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('application_temp_process', array(), 'person');

    $this->max_array = array(5, 10, 20, 30);

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    $this->page = $page = $request->getParameter('page', 1);
    $this->max  = $params['max'];

    $this->getUser()->setAttribute('application_temp_process', $params, 'person');
  }

  public function executeProcessStep1(sfWebRequest $request)
  {
    slot('nav_menu', array('members', 'pending-renewal'));

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

  protected function processStep1Check(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->save();

      if ($this->person) $person_id = $this->person->getId(); else $person_id = null;
      
      $this->redirect('renewal/processStep2?id='.$this->application_temp->getId().($person_id ? '&person_id='.$person_id : ''));
    }
  }

  public function executeProcessStep2(sfWebRequest $request)
  {
    slot('nav_menu', array('members', 'pending-renewal'));

    $this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);

    // Farazi
    //Get Member Class Information
    $this->member = MemberPeer::retrieveByPK($this->application_temp->getMemberId());
    $this->memberclass = MemberClassPeer::retrieveByPK($this->member->getMemberClassId());
    //echo "<pre>";
    //print_r($this->memberclass);

    $this->person = PersonPeer::retrieveByPK($this->application_temp->getPersonId());

    $this->form2 = new ApplicationTempProcessStep2Form($this->application_temp);

    if ($request->isMethod('post')) {
      $this->processStep2Check($request, $this->form2);
    }

    $this->form1 = new ApplicationTempProcessStep1Form($this->application_temp);

    $this->setTemplate('processSteps');
  }

  protected function processStep2Check(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $form->save();

      if ($this->person) $person_id = $this->person->getId(); else $person_id = null;

      $this->redirect('renewal/processStep3?id='.$this->application_temp->getId().($person_id ? '&person_id='.$person_id : ''));
    }
  }

  public function executeProcessStep3(sfWebRequest $request)
  {
    slot('nav_menu', array('members', 'pending-renewal'));
    $this->application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->application_temp);

    $this->application_temp->getProcessedDate();

    //Farazi 
    //Get Member Class Information
    $this->member = MemberPeer::retrieveByPK($this->application_temp->getMemberId());
    $this->memberclass = MemberClassPeer::retrieveByPK($this->member->getMemberClassId());
    //echo "<pre>";
    //print_r($this->memberclass);

    $this->person = PersonPeer::retrieveByPK($this->application_temp->getPersonId());

    if ($request->isMethod('post')) {   
        $this->processStep3Check($request);
    }
    
    $this->form1 = new ApplicationTempProcessStep1Form($this->application_temp);
    $this->form2 = new ApplicationTempProcessStep2Form($this->application_temp);

    $this->setTemplate('processSteps');
  }

  protected function processStep3Check(sfWebRequest $request)
  {
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
    $member = MemberPeer::retrieveByPK($app->getMemberId());
    if (!($member instanceof Member)) $member = new Member();
    $member->setActive(1);
    $member->setCoPilot($app->getApplicantCopilot());
    $member->setContact('By Email');
    $member->setDateOfBirth($app->getDateOfBirth());
    $member->setDriversLicenseState($app->getDriversLicenseState());
    $member->setDriversLicenseNumber($app->getDriversLicenseNumber());
    $member->setEmergencyContactName($app->getEmergencyContactName());
    $member->setEmergencyContactPhone($app->getEmergencyContactPhone());
    $member->setFlightStatus($app->getApplicantPilot() ? 'Verify Orientation' : 'Non-pilot');

    //$member->setJoinDate(time());
    $member->setLanguages($app->getLanguagesSpoken());

    //Farazi
    //$member->setMasterMemberId($app->getMasterMemberId());
    // Get Last renewal date
    $this->member = MemberPeer::retrieveByPK($app->getMemberId());
    $lastRenewalDate=strtotime($this->member->getRenewalDate());
    
    $member->setMemberClassId($app->getMemberClassId());
    $member->setPersonId($person->getId());
    $member->setRenewedDate(time());

    ///Farazi Renewal Date From Memberclass
    if($app->getMemberClassId()){
        $memclass =  MemberClassPeer::retrieveByPK($app->getMemberClassId());
        $renewal_period=$memclass->getRenewalPeriod();
       
        $renewalTime=strtotime('+'.$renewal_period.' month',$lastRenewalDate);

        //echo $renewalTime;
        $member->setRenewalDate($renewalTime);
        //$member->setRenewalDate(strtotime('+'.$renewal_period.' month'));
    }
    // Farazi End
    //$member->setRenewalDate(strtotime('+1 year'));
    
    $member->setSpouseName($app->getSpouseFirstName().' '.$app->getSpouseLastName());

    $member->setWeight($app->getWeight());
    $member->setWingId($app->getWingId());
    $member->save();

    // Pilot
    if ($app->getApplicantPilot()){
      $pilot = $member->getPilot();
      if (!($pilot instanceof Pilot)) $pilot = new Pilot();
      if ($pilot->isNew()) {
        // remove aircrafts
        foreach ($member->getPilotAircrafts() as $p_a) PilotAircraftPeer::doDelete($p_a);
      }
      $pilot->setMemberId($member->getId());
      $airport = AirportPeer::getByIdent($app->getHomeBase());
      if (!($airport instanceof Airport)) $airport = $default_airport;
      $pilot->setPrimaryAirportId($airport->getId());
      $pilot->setTotalHours($app->getTotalHours());
      $pilot->setLicenseType('Private');
      foreach (sfConfig::get('app_pilot_license_types') as $key => $val) {
        if (stripos($app->getRatings(), $key) !== false) $pilot->setLicenseType($key);
      }
      $pilot->setIfr(stripos($app->getRatings(), 'ifr') !== false ? 1 : 0);
      $pilot->setMultiEngine(stripos($app->getRatings(), 'multi') !== false ? 1 : 0);
      $pilot->setSeInstructor('No'); // @see ApplicationForm
      foreach (sfConfig::get('app_pilot_se_instructor') as $key => $val) {
        if (stripos($app->getRatings(), $key) !== false) $pilot->setSeInstructor($key);
      }
      $pilot->setMeInstructor($pilot->getSeInstructor());
      $pilot->save();
      
      // Availability
      $availability = $member->getAvailability();
      if (!($availability instanceof Availability)) $availability = new Availability();
      $availability->setMemberId($member->getId());
      $availability->setNotAvailable(0);
      $availability->setNoWeekday($app->getAvailabilityWeekdays() == 0);
      $availability->setNoNight($app->getAvailabilityWeeknights() == 0);
      $availability->setLastMinute($app->getAvailabilityLastMinute());
      $availability->setAsMissionMssistant($app->getAvailabilityCopilot());
      $availability->setNoWeekend($app->getAvailabilityWeekends() == 0);
      $availability->save();

      //Farazi
      //Delete all aircrafts 
      $pilot_aircrafts = PilotAircraftPeer::getByMemberId($member->getId());
      foreach ($pilot_aircrafts as $pilot_aircraft) {
           $pilot_aircraft->delete();
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
      if (stripos($tmp_arr['ratings'], $key) !== false) $tmp_arr['license_type'] = $key;
    }
    $tmp_arr['ifr'] = (stripos($tmp_arr['ratings'], 'ifr') !== false ? 1 : 0);
    $tmp_arr['multi_engine'] = (stripos($tmp_arr['ratings'], 'multi') !== false ? 1 : 0);
    $tmp_arr['se_instructor'] = 'No'; // @see ApplicationForm
    foreach (sfConfig::get('app_pilot_se_instructor') as $key => $val) {
      if (stripos($tmp_arr['ratings'], $key) !== false) $tmp_arr['se_instructor'] = $key;
    }
    $tmp_arr['me_instructor'] = $tmp_arr['se_instructor'];
    $tmp_arr['other_ratings'] = $tmp_arr['ratings'];
    $tmp_arr['fbo'] = $tmp_arr['fbo_name'];
    $tmp_arr['member_meetings'] = 0;
    $tmp_arr['executive_board'] = 0;
    $tmp_arr['dues_amount_paid'] = ($tmp_arr['dues_amount_paid'] ? $tmp_arr['dues_amount_paid'] : 0);
    $tmp_arr['donation_amount_paid'] = ($tmp_arr['donation_amount_paid'] ? $tmp_arr['donation_amount_paid'] : 0);
    unset($tmp_arr['id']);
    
    $application = new Application();
    $application->fromArray($tmp_arr, BasePeer::TYPE_FIELDNAME);
    $application->save();

    $this->getUser()->setFlash('success', 'Membership renewal completed successfully.');    
    //$this->redirect('renewal/processComplete?id='.$member->getId());
    $this->redirect('renewal/processStep3?id='.$this->application_temp->getId());

    //$this->redirect('renewal/index?id='.$member->getId());
  }

  public function executeProcessComplete(sfWebRequest $request)
  {
    $this->member_id = $request->getParameter('id');
  }

  public function executeSendMail(sfWebRequest $request)
  {
   
    $this->forward404Unless($application_temp = ApplicationTempPeer::retrieveByPk($request->getParameter('id')), sprintf('Object application_temp does not exist (%s).', $request->getParameter('id')));
    $to   = $request->getParameter('to');
    $email   = $request->getParameter('email');
    $subject = $request->getParameter('subject');
    $text    = $request->getParameter('body');
    $this->getComponent('mail', 'missionReqReject', array(
      'text'    => $text,
      'email'   => $email,
      'subject' => $subject,
    ));
    $application_temp->delete();
    $this->getUser()->setFlash('success', 'Email have successfully queued!');
    $this->redirect($request->getReferer());
  }
}
