<?php

/**
 * availability actions.
 *
 * @package    angelflight
 * @subpackage availability
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class availabilityActions extends sfActions
{
  public function preExecute()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('members', ''));
  }

  /**
   * CODE: availability_view
   */
  public function executeView(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $this->availability = AvailabilityPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->availability);

    $this->member = $this->availability->getMember();
    $this->person = $this->member->getPerson();
  }

  /**
   * CODE: availability_create
   */
  public function executeNew(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }

    $member = MemberPeer::retrieveByPK($request->getParameter('member_id'));
    $this->forward404Unless($member);

    # if member already has the record redirect to edit
    $availability = $member->getAvailability();
    if ($availability instanceof Availability){
      $this->redirect('@default?module=availability&action=edit&id='.$availability->getId());
    }

    $this->form = new AvailabilityForm();
    $this->form->setDefault('member_id', $member->getId());

    $this->member = $member;
    $this->person = $member->getPerson();
  }

  /**
   * CODE: availability_create
   */
  public function executeCreate(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $this->forwardUnless($request->isMethod('post'), 'availability', 'new');

    $this->form = new AvailabilityForm();

    $this->processForm($request, $this->form);

    # if member already has the record redirect to edit
    $availability = $this->member->getAvailability();
    if ($availability instanceof Availability){
      $this->redirect('@default?module=availability&action=edit&id='.$availability->getId());
    }

    $this->setTemplate('new');
  }

  /**
   * CODE: availability_create
   */
  public function executeEdit(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $this->forward404Unless($availability = AvailabilityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object availability does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($member = $availability->getMember());

    $this->form = new AvailabilityForm($availability);
    $this->member = $member;
    $this->person = $member->getPerson();
  }

  public function executeEditOwn(sfWebRequest $request)
  {
    $this->forward404Unless($availability = AvailabilityPeer::getByMemberId($this->getUser()->getMemberId()));

    $this->form = new AvailabilityForm($availability);
  }

  /**
   * CODE: availability_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($availability = AvailabilityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object availability does not exist (%s).', $request->getParameter('id')));
    $this->form = new AvailabilityForm($availability);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  public function executeUpdateOwn(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($availability = AvailabilityPeer::getByMemberId($this->getUser()->getMemberId()));
    $this->form = new AvailabilityForm($availability);

    $this->processOwnForm($request, $this->form);

    $this->setTemplate('editOwn');
  }

  /**
   * CODE: availability_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }


    $request->checkCSRFProtection();

    $this->forward404Unless($availability = AvailabilityPeer::retrieveByPk($request->getParameter('id')), sprintf('Object availability does not exist (%s).', $request->getParameter('id')));
    $availability->delete();

    $this->getUser()->setFlash('success', 'You have successfully removed availability record!');

    $this->redirect('@member_view?id='.$availability->getMemberId());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $availability = $form->save();

      $this->getUser()->setFlash('success', 'You have successfully saved availability record!');

      $this->redirect('@default?module=availability&action=view&id='.$availability->getId());
    }

    $member = MemberPeer::retrieveByPK($form['member_id']->getValue());
    $this->forward404Unless($member);

    $this->member = $member;
    $this->person = $member->getPerson();
  }
  
  protected function processOwnForm(sfWebRequest $request, sfForm $form)
  {
    $values = $request->getParameter($form->getName());
    $values['member_id'] = $this->getUser()->getMemberId();
    $form->bind($values, $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $availability = $form->save();

      $this->getUser()->setFlash('success', 'Availability settings have successfully saved!');
      $this->redirect('account/index');
    }
  }


  public function executeAjaxFormAccout(sfWebRequest $request){
    if($request->isMethod('post')){

      #available part
      $member_id = $request->getParameter('member_id');
      $availablity = $request->getParameter('availablity');
      $weekdays = $request->getParameter('weekdays');
      $nights = $request->getParameter('nights');
      $weekdends = $request->getParameter('weekdends');
      $last_flights = $request->getParameter('last_flights');
      $as_ma = $request->getParameter('as_ma');

      #not available part
      $is_date = $request->getParameter('not_av_date');
      $start_date = $request->getParameter('start_date');
      $end_date = $request->getParameter('end_date');

      #comment
      $comment = $request->getParameter('comment');

      if(isset($member_id))
      {
        $member_availablity = AvailabilityPeer::getByMemberId($member_id);
        if(isset($member_availablity) && $member_availablity instanceof Availability ){
          if(isset($availablity)){
            $member_availablity->setNotAvailable($availablity);
          }
          if($weekdays == 'on'){
            $member_availablity->setNoWeekDay(1);
          }else{
            $member_availablity->setNoWeekDay(0);
          }
          if($nights == 'on'){
            $member_availablity->setNoNight(1);
          }else{
            $member_availablity->setNoNight(0);
          }
          if($weekdends == 'on'){
            $member_availablity->setNoWeekend(1);
          }else{
            $member_availablity->setNoWeekend(0);
          }
          if($last_flights == 'on'){
            $member_availablity->setLastMinute(1);
          }else{
            $member_availablity->setLastMinute(0);
          }
          if($as_ma == 'on'){
            $member_availablity->setAsMissionMssistant(1);
          }else{
            $member_availablity->setAsMissionMssistant(0);
          }

          if($availablity == 0 && $is_date == 'specific_dates'){
            if($start_date && $end_date){
              $member_availablity->setFirstDate(date('Y-m-d',strtotime($start_date)));
              $member_availablity->setFirstDate(date('Y-m-d',strtotime($end_date)));
              $member_availablity->save();
            }
          }
          if(isset($comment)){
            $member_availablity->setAvailabilityComment($comment);
          }
          $member_availablity->save();
          $str = <<<XYZ
          <script type="text/javascript">
          window.location.reload();
          </script>
XYZ;
          return $this->renderText($str);

}else{
  $this->getUser()->setFlash('success','Member has no availability at the moment!');
  $str = <<<XYZ
                <script type="text/javascript">
                window.location.reload();
                </script>
XYZ;
  return $this->renderText($str);
}
      }
    }
  }
}
