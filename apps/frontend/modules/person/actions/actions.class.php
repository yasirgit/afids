<?php

/**
 * person actions.
 *
 * @package    angelflight
 * @subpackage person
 * @author     Javzaa, Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class personActions extends sfActions
{
  /**
   * CODE: person_index
   */
  public function executeIndex(sfWebRequest $request)
  {
    # security  
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }


    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));
    //$is_last = $request->getParameter('findperson');

    $this->add_cont = $request->getParameter('add_cont');
    # filter
    
    $this->processFilter($request);
    if($request->isMethod('post') || $request->getParameter('page')){
        $this->pager = PersonPeer::getPager( 
          $this->max,
          $this->page,
          //$is_last,
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
    }    
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }
  
  private function processFilter(sfWebRequest $request)
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

  public function executeAjax($request)
  {
    $this->getResponse()->setContentType('application/json');

    $fnames = PersonPeer::retrieveFNames($request->getParameter('autocomplete_per[first_name]'));
    //$lnames = PersonPeer::retrieveLNames($request->getParameter('autocomplete_per[last_name]'));

    return $this->renderText(json_encode($fnames));
  }
  /**
   * CODE:person_autocomplete not yet Passenger
   */
  public function executeAutoCompleteFirst()
  {
    $this->keyword = $this->getRequestParameter('firstname');
    $this->persons = PersonPeer::getFirstNames($this->keyword);
    $this->setLayout(false);
  }

  public function executeAutoCompleteLast()
  {
    $this->keyword = $this->getRequestParameter('lastname');
    $this->persons = PersonPeer::getLastNames($this->keyword);
    $this->setLayout(false);
  }

  public function executeAutoNotPassenger()
  {
    $this->keyword = $this->getRequestParameter('person_a');
    $this->persons = PersonPeer::getByNotPassAuto($this->keyword);
  }

  /**
   * CODE:person_autocomplete not yet Requester
   */
  public function executeAutoNotRequester()
  {
    $this->keyword = $this->getRequestParameter('person_a_req');
    $this->persons = PersonPeer::getByNotReqAuto($this->keyword);
  }
  /**
   * CODE: send_email
   */  
  public function executeSendBulk(sfWebRequest $request)
  {
    $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());    
    
    $this->errors = array();
    $this->recipients = '';
    $this->subject = '';
    $this->sender_email = '';
    $this->sender_name = '';
    $this->message = '';
  }

  /**
   * CODE: person_create
   */
  public function executeUpdate(sfWebRequest $request)
  {
     #Security
     if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
            $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
            $this->redirect('dashboard/index');
     }

    if($request->getParameter('add_pass') == 'yes'){
      $this->person = new Person();
      $this->title = 'Step 1 : Add person';
      if($request->getParameter('camp_id')){
      $this->camp_id = $request->getParameter('camp_id');  
      }
      $this->stepped = 1;
    }

    if($request->getParameter('add_pass_iti') == 'yes'){
      $this->person = new Person();
      $this->title = 'Step 1 : Add person';
      $this->itine = 1;
    }

    if($request->getParameter('add_cont') == 'yes'){
      $this->person = new Person();
      $this->title = 'Step 1 : Add person';
      $this->contact = 1;
    }

    if($request->getParameter('id')){
      $this->person = PersonPeer::retrieveByPK($request->getParameter('id'));
      $this->title = 'Edit person';
    }else{
      $this->person = new Person();
      $this->title = 'Add person';
    }

    # Person Form
    $this->form = new PersonForm($this->person);
    $this->back = $request->getReferer();

    //session
    $this->key = $request->getParameter('key');
    if (!$this->key) {
      $this->key = rand(1000,9999);
    }

    if(strstr($request->getReferer(),'person/view')){
      if($this->person){
        //session
        $referer_session = $this->getUser()->getAttribute('ref');

        if (!$referer_session) {
          $referer_session = array($this->key => array());
          $this->getUser()->setAttribute('ref', $referer_session);
        }
        elseif (!isset($referer_session[$this->key]))
        {
          $a = '@person_view?id='.$this->person->getId();
          $referer_session[$this->key] = array('referer'=>$a);
          $this->getUser()->setAttribute('ref', $referer_session[$this->key]);

        }
      }
    }
    $this->referer = $request->getParameter('referer');

    if ($request->isMethod('post'))
    {
      $this->referer = $request->getParameter('referer');

      $this->form->bind($request->getParameter('per'));

      if ($this->form->isValid() && $this->form->getValue('first_name') && $this->form->getValue('last_name'))
      {
        $this->person->setTitle($this->form->getValue('title'));
        $this->person->setFirstName($this->form->getValue('first_name'));
        $this->person->setLastName($this->form->getValue('last_name'));
	$this->person->setAddress1($this->form->getValue('address1'));
        $this->person->setAddress2($this->form->getValue('address2'));
        $this->person->setCity($this->form->getValue('city'));
        $this->person->setCounty($this->form->getValue('county'));
        $this->person->setState($this->form->getValue('state'));
        $this->person->setCountry($this->form->getValue('country'));
        $this->person->setZipcode($this->form->getValue('zipcode'));
        $this->person->setDayPhone($this->form->getValue('day_phone'));
        $this->person->setDayComment($this->form->getValue('day_comment'));
        $this->person->setEveningPhone($this->form->getValue('evening_phone'));
        $this->person->setEveningComment($this->form->getValue('evening_comment'));
        $this->person->setMobilePhone($this->form->getValue('mobile_phone'));
        $this->person->setMobileComment($this->form->getValue('mobile_comment'));
        $this->person->setPagerPhone($this->form->getValue('paper_phone'));
        $this->person->setPagerComment($this->form->getValue('paper_comment'));
        $this->person->setOtherPhone($this->form->getValue('other_phone'));
        $this->person->setOtherComment($this->form->getValue('other_comment'));
        $this->person->setFaxPhone1($this->form->getValue('fax_phone1'));
        $this->person->setFaxComment1($this->form->getValue('fax_comment1'));
        $this->person->setAutoFax($this->form->getValue('auto_fax'));
        $this->person->setFaxPhone2($this->form->getValue('fax_phone2'));
        $this->person->setFaxComment2($this->form->getValue('fax_comment2'));
        $this->person->setEmail($this->form->getValue('email'));
        $this->person->setEmailTextOnly($this->form->getValue('email_text_only'));
        $this->person->setEmailBlocked($this->form->getValue('email_blocked'));
        $this->person->setComment($this->form->getValue('comment'));
//        $this->person->setBlockMailings($this->form->getValue('block_mailings')==0?null:$this->form->getValue('block_mailings'));
        $this->person->setBlockMailings($this->form->getValue('block_mailings'));
        
        $this->person->setNewsletter($this->form->getValue('newsletter'));
        $this->person->setGender($this->form->getValue('gender'));
        $this->person->setDeceased($this->form->getValue('deceased'));
        $this->person->setDeceasedComment($this->form->getValue('deceased_comment'));
        $this->person->setSecondaryEmail($this->form->getValue('secondary_email'));
        $this->person->setDeceasedDate($this->form->getValue('deceased_date'));
        $this->person->setMiddleName($this->form->getValue('middle_name'));
        $this->person->setSuffix($this->form->getValue('suffix'));
        $this->person->setNickname($this->form->getValue('nickname'));
        $this->person->setVeteran($this->form->getValue('veteran'));
        if($this->person->isNew()){
          $content = $this->getUser()->getName().' added new Person: '.$this->person->getFirstName();
          ActivityPeer::log($content);
        }
        $this->person->save();
		//////////////////////////////////////#bglobal omar
		if($this->person->getId())
		{			
			$c = new Criteria();
			$c->add(RoleNotificationPeer::MID, 5);	
			$c->add(RoleNotificationPeer::NOTIFICATION, 1);
			$c->addOr(RoleNotificationPeer::NOTIFICATION, 3);			
			$c->addJoin(RoleNotificationPeer::ROLE_ID,PersonRolePeer::ROLE_ID);			
			$c->addJoin(PersonRolePeer::PERSON_ID,PersonPeer::ID);			
			$personemail = PersonPeer::doSelect($c);
			$allemail=array();
			$pindex=0;
			foreach($personemail as $getEmail)
			{
				if(strlen($getEmail->getEmail())>0)
				$allemail[$pindex++]=$getEmail->getEmail();
				else if(strlen($getEmail->getSecondaryEmail())>0)
				$allemail[$pindex++]=$getEmail->getSecondaryEmail();
			}
			$allemail[$pindex]="farazi@bglobalsourcing.com";						
			/*
			echo "<pre>";			
			print_r($allemail);	
			echo "</pre>";
			*/						
			$email['subject']="New Person added";
			$link=$request->getHost()."/person/view/".$this->person->getId();
			$body="A new person added in ".$request->getHost()."\r\n"
			      .$this->person->getFirstName()." ".$this->person->getLastName()."\r\n Profile Link: ".$link;
			$email['body']=$body;									
			$email['sender_email']="admin@afw.com";
			
			$this->getComponent('mail', 'sendBulk', array(
			'subject' => $email['subject'],
			'recievers' => $allemail,
			'sender' => $email['sender_email'],
			'body' => $email['body'],			
			));
		}
		/////////////////////////////////////

        if($request->hasParameter('has')){
          $data = '';
          if($request->getParameter('camp_id')){
            $data = '&camp_id='.$request->getParameter('camp_id');
          }
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
          $this->redirect('@passenger_create?add_pass='.$request->getParameter('has').'&p_id='.$this->person->getId().$data);
        }
        if($request->hasParameter('iti')){
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add passenger!');
          $this->redirect('@passenger_create?add_pass_iti='.$request->getParameter('iti').'&p_id='.$this->person->getId());
        }

        if($request->hasParameter('contact')){
          
          $this->getUser()->setFlash('success', 'Step 1 : New Person information has been successfully created! Now you can add contact!');
          $this->redirect('@contact_create?person_id='.$this->person->getId());
        }
        $this->getUser()->setFlash('success', 'Person information has been successfully saved!');

        $last = $request->getParameter('back');


        $referer_session = $this->getUser()->getAttribute('ref');

        
        $back_url = '@person_view?id='.$this->person->getId();
        $this->redirect($back_url);
      }
    }else{
      # Set referer URL
      $this->referer = $request->getReferer() ? $request->getReferer() : '@person';
    }
  }

  /**
   * TODO Delete the Person Related Object's link
   * CODE:person_delete
   */
  public function executeDelete(sfWebRequest $request)
  {
    # security  
    if( !$this->getUser()->hasCredential(array('Administrator','Staff'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }

    $request->checkCSRFProtection();

    $person = PersonPeer::retrieveByPK($request->getParameter('id'));
    if (!($person instanceof Person)) {
      $this->getUser()->setFlash('warning', 'Requested person not found or could be already removed!');
      $this->redirect('@person');
    }

      //check for foreign key constraints
      
    //1.boardmember
    if($person->countBoardMembers()>0){
      $this->getUser()->setFlash('warning', 'Person is Board member.In order to delete,please delete related Board member information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }
    
    //2-requester
    if($person->countRequesters()>0){
      $this->getUser()->setFlash('warning', 'In order to delete, please delete related requester information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }
    
    //3.member
    
    if($person->countMembers()>0){
      $this->getUser()->setFlash('warning', 'Person is member.In order to delete, please delete related member information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }

    //4-afstaff
    if($person->countAfStaffs()>0){
      $this->getUser()->setFlash('warning', 'Person is Af staff.In order to delete, please delete related Af staff information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }

    //5-donor
    if($person->countDonors()>0){
      $this->getUser()->setFlash('warning', 'Person is donor.In order to delete,please delete related donor information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }

    //6-contact
    if($person->countContacts()>0){
      $this->getUser()->setFlash('warning', 'Person has contact information.In order to delete, please delete related contact information before!');
      $this->redirect('@person_view?id='.$person->getId());
    }

  //delete related person roles
    $values = array();
    foreach ($person->getPersonRoles() as $pr){
      $pr->delete();  
    }
        
    $person->delete();
    $this->getUser()->setFlash('success', 'Person information has been successfully deleted!');
     

    $this->redirect('@person');
  }

  /**
   * Displays a person information
   * CODE: person_view
   * @param sfWebRequest $request
   * @return unknown_type
   */
  public function executeView(sfWebRequest $request)
  {
    #security    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
        $this->redirect('dashboard/index');
    }
    
    $this->person = PersonPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->person);

    $this->requester = RequesterPeer::getByPersonId($this->person->getId());

    $this->camp_id = $request->getParameter('camp_id');

    if ($this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
      # get all roles
      $roles = RolePeer::getForSelect();

      # get assigned roles
      $person_roles = PersonRolePeer::getByPersonId($this->person->getId());
      $assoc_roles = array();
      foreach ($person_roles as $person_role) $assoc_roles[] = $person_role->getRoleId();
      $this->assoc_roles = $assoc_roles;

      # prepare widget
      $this->widget = new sfWidgetFormSelectDoubleList(array(
                      'choices' => $roles,
                      'label_unassociated'=> 'Full List',
                      'label_associated'  => 'Assigned Roles',
                      'associate'         => 'lt;',
                      'associate_class'   => 'btn-right',
                      'unassociate'       => 'gt;',
                      'unassociate_class' => 'btn-left',
                      'template'          => <<<EOF
<div class="%class%" style="padding-top: 0px;">
  <div class="holder">
    <h4>%label_unassociated%</h4>
    %unassociated%
  </div>
  <ul class="btn-switch">
    <li>%associate%</li>
    <li>%unassociate%</li>
  </ul>
  <div class="holder">
    <h4>%label_associated%</h4>
    %associated%
  </div>
    
  <br style="clear: both" />
  <script type="text/javascript">
    sfDoubleList.init(document.getElementById('%id%'), '%class_select%');
  </script>
</div>
EOF
      ));     
      $this->form = new PersonForm();
    }

    # email lists associated to the person
    $this->email_lists = EmailListPeer::doSelect(new Criteria());
    $this->subscribed_list = EmailListPersonPeer::getEmailListIdsByPersonId($this->person->getId());
  }

  /**
   * AJAX
   * Saves all changes made to a person
   * CODE: person_create
   * CODE: person_save_roles
   */
  public function executeSave(sfWebRequest $request)
  {
    # security    
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }

    # validate person
    $person = PersonPeer::retrieveByPK($request->getParameter('person_id'));

    if (!($person instanceof Person)) return $this->renderText('Data is invalid! Please refresh and try again!');

    $saved_values = array();
    $errors = array();
    $form = new PersonForm($person, null, false);

    # email list
    $params = $request->getGetParameters();
    $ids = array();
    foreach ($params as $name => $value) {
      if (substr($name, 0, 11) == 'email_list_') {
        $ids[] = (int)substr($name, 11);
      }
    }
    $validator = new sfValidatorPropelChoice(array('model' => 'EmailList', 'column' => 'id', 'required' => false, 'multiple' => true, 'empty_value' => array()));
    $err = false;
    try {
      $ids = $validator->clean($ids);
    }catch(sfValidatorError $e) {
      $errors[] = 'Couldn\'t save mailing list. Please refresh and try again';
      $err = true;
    }
    if (!$err) {
      $c = new Criteria();
      $c->add(EmailListPersonPeer::PERSON_ID, $person->getId());
      EmailListPersonPeer::doDelete($c);
      foreach ($ids as $id) {
        if ($request->getParameter('email_list_'.$id) == 1) {
          $email_list_person = new EmailListPerson();
          $email_list_person->setListId($id);
          $email_list_person->setPersonId($person->getId());
          $email_list_person->save();
          $saved_values['email_list_'.$id] = 1;
        }else{
          $saved_values['email_list_'.$id] = 0;
        }
      }
    }

    $request_params = array_intersect_key($request->getGetParameters(), $form->getWidgetSchema()->getFields());

    $params = array_merge($person->toArray(BasePeer::TYPE_FIELDNAME), $request->getGetParameters());
    $params = array_intersect_key($params, $form->getWidgetSchema()->getFields());
    $form->bind($params);
    if (!$form->isValid()) {
      foreach ($form->getErrorSchema()->getErrors() as $field => $e) {
        $errors[] = $e->__toString();
      }
    }else{
      $form->save();
      foreach ($request_params as $field => $v) {
        $saved_values[$field] = $form->getValue($field);
      }
    }

    /*

    # email blocked
    if ($request->hasParameter('email_blocked')) {
    $v = $form->getValidator('email_blocked');
    try {
    $email_blocked = $v->clean($request->getParameter('email_blocked'));
    $person->setEmailBlocked($email_blocked == 1 ? 1 : 0);
    $saved_values['email_blocked'] = $person->getEmailBlocked();
    }catch(sfValidatorError $e) {
    $errors[] = $e->__toString();
    }
    }

    # email text only
    if ($request->hasParameter('email_text_only')) {
    $email_text_only = $request->getParameter('email_text_only');
    $person->setEmailTextOnly($email_text_only == 1 ? 1 : 0);
    $saved_values['email_text_only'] = $person->getEmailTextOnly();
    }

    # email
    if ($request->hasParameter('email')) {
    $validator = new sfValidatorEmail(array('required' => true), array('invalid' => 'Email address is invalid: %value%', 'required' => 'Email address is invalid'));
    $err = false;
    try {
    $email = $validator->clean($request->getParameter('email'));
    }catch(sfValidatorError $e) {
    $errors[] = $e->__toString();
    $err = true;
    }
    if (!$err) {
    $person->setEmail($email);
    $saved_values['email'] = $email;
    }
    }

    # city
    $person->setCity($saved_values['city'] = $request->getParameter('city'));

    # county
    $person->setCounty($saved_values['county'] = $request->getParameter('county'));

    # state
    $person->setState($saved_values['state'] = $request->getParameter('state'));

    $person->save();

    */

    # roles
    if ($request->hasParameter('roles')) {
      if ($this->getUser()->hasCredential(array('Administrator'), false) == true) {
        $roles = $request->getParameter('roles');
        $validator = new sfValidatorPropelChoice(array('model' => 'Role', 'column' => 'id', 'required' => false, 'multiple' => true, 'empty_value' => array()));
        $err = false;
        try {
          $roles = $validator->clean($roles);
        }catch(sfValidatorError $e) {
          $errors[] = 'Couldn\'t save roles. Please refresh and try again';
          $err = true;
        }
        if (!$err) {
          $c = new Criteria();
          $c->add(PersonRolePeer::PERSON_ID, $person->getId());
          PersonRolePeer::doDelete($c);
          foreach ($roles as $role) {
            $person_role = new PersonRole();
            $person_role->setPersonId($person->getId());
//            if($s_role->getId()==$role){
//              $role=$a_role->getId();
//            }
            $person_role->setRoleId($role);
            $person_role->save();
          }
          $saved_values['roles'] = $roles;
        }
      }else{
        $errors[] = 'You don\'t have permission to edit person roles!';
      }
    }

    $this->errors = $errors;
    $this->saved_values = $saved_values;
  }

  public function executeMailingList(sfWebRequest $request)
  {
    # security
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
         $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
         $this->redirect('dashboard/index');
    }

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    $this->email_list = EmailListPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->email_list);

    # filter
    $c = new Criteria();
    $c->addJoin(EmailListPersonPeer::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    $c->add(EmailListPersonPeer::LIST_ID, $request->getParameter('id'));

    $this->page = $request->getParameter('page', 1);

    $this->max_array = array(5, 10, 20, 30);
    if (in_array($request->getParameter('max'), $this->max_array)) {
      $this->max = $request->getParameter('max');
    }else{
      $this->max = sfConfig::get('app_max_person_per_page', 10);
    }
    
    $this->pager = PersonPeer::getCriteriaPager($c, $this->max, $this->page);
    $this->persons = $this->pager->getResults();
  }

  public function executeSubscribe(sfWebRequest $request)
  {
    # security   
    if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }

    # for navigation menu
    sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
    slot('nav_menu', array('mission_coord', ''));

    $this->email_list = EmailListPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($this->email_list);

    # filter
    $this->processFilter($request);
    $this->pager = PersonPeer::getPager(
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
      $this->deceased_after,
      $this->email_list->getId()
    );
    $this->persons = $this->pager->getResults();
    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  public function executeUpdatePassword(sfWebRequest $request)
  {
    
   
    if ($this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {
      $username = $this->getUser()->getUsername();
      $this->person = PersonPeer::getByUsername($username);
      $this->chperson = PersonPeer::retrieveByPK($request->getParameter('id'));
      $this->personId = $request->getParameter('id');
      if ($request->isMethod('post')){
        if ($old_pass = $request->getParameter('old_pass')){
          if ($this->person->isPassword($old_pass)) {
            $required_len = sfConfig::get('app_password_minimum_length');
            $new_pass = $request->getParameter('new_pass');
            $confirm_pass = $request->getParameter('confirm_pass');
            if (strlen($new_pass) >= $required_len && strlen($confirm_pass) >= $required_len) {
              if ($new_pass == $confirm_pass){
                $this->chperson->setPassword($confirm_pass);
                $this->chperson->save();

                $this->getUser()->setFlash('success', 'Your password has been successfully changed!');

                $this->redirect('person/view?id='.$this->chperson->getId());
              }else{
                $this->error_msg = 'New passwords doesn\'t match!';
              }
            }else{
              $this->error_msg = 'Your password must be at least '.$required_len.' characters!';
            }
          }else{
            $this->error_msg = 'Your old password is not right!';
          }
        }else{
          $this->error_msg = 'Please enter your old password!';
        }
      }
     }else{
       $this->getUser()->setFlash('warning', 'alkdjfdksjfladjkf');
     }
    }
}

