<?php

/**
 * email actions.
 *
 * @package    angelflight
 * @subpackage email
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class emailActions extends sfActions
{
  public function executeSendMission(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
          $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
          $this->redirect('dashboard/index');
    }
    
    $this->getUser()->setFlash('warning', 'Select missions to send and click Email Pilots button!');
    $this->redirect('@staff_available');
    
  }

  public function executeSendBulk(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
          $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
          $this->redirect('dashboard/index');
    }

    $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());    
    
    $this->errors = array();
    $this->recipients = '';
    $this->subject = '';
    $this->sender_email = '';
    $this->sender_name = '';
    $this->message = '';
  }

  public function executeEmailBulk(sfWebRequest $request)
  {
    $subject = $request->getParameter('subject');
    $to = $request->getParameter('recipients');
    $sender_email = $request->getParameter('sender_email');
    $sender_name = $request->getParameter('sender_name');
    $message = $request->getParameter('message');

    $errors = array();
    // validate recievers
    if (empty($to)) {
      $errors['email'][0] = 'please specify email address';
    }else{
      $recievers = explode(',', $to);
      $pat = '/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i';
      $full_pat = '/^([- a-z0-9]+)\<(([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,}))\>$/i';
      $emails = array();
      foreach ($recievers as $reciever) {
        $reciever = trim($reciever);
        if (empty($reciever)) continue;
        if (preg_match($full_pat, $reciever, $matches)) {
          $emails[$matches[2]] = $matches[1];
        }elseif (preg_match($pat, $reciever, $matches)) {
          $emails[$matches[0]] = '';
        }else{
          if (!isset($errors['email'])) $errors['email'] = array();
          $errors['email'][] = $reciever.' is unrecognizable email';
        }
      }
    }

    // validate subject
    if (empty($subject)) $errors['subject'] = 'subject required';

    // validate sender
    $v_email = new sfValidatorEmail(array(), array('invalid' => 'please specify email address'));
    try {
      $sender_email = $v_email->clean($sender_email);
    }catch(sfValidatorError $e){
      $errors['sender_email'] = $e->__toString();
    }

    // catch errors
    if ($errors) {
      $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());

      $this->errors = $errors;
      $this->recipients = $to;
      $this->subject = $subject;
      $this->sender_email = $sender_email;
      $this->sender_name = $sender_name;
      $this->message = $message;

      $this->setTemplate('sendBulk');
      return sfView::SUCCESS;
    }

    // attachments
    $files = array();
    foreach ($request->getFiles() as $file) {
      if ($file['error'] != 0) continue;
      $files[] = array('path' => $file['tmp_name'], 'name' => $file['name']);
    }

    $this->getComponent('mail', 'sendBulk', array(
      'subject' => $subject,
      'recievers' => $emails,
      'sender' => array($sender_email => $sender_name),
      'body' => $message,
      'files' => $files,
    ));

    $this->getUser()->setFlash('success', 'Bulk email have successfully queued!');
    $this->redirect($request->getReferer());
  }
  public function executeSendBulkQueue(sfWebRequest $request)
  {
    #security    
    if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
        $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
        $this->redirect('dashboard/index');
    }

    $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());
    $this->errors = array();
    $this->recipients = '';
    $this->subject = '';
    $this->sender_email = '';
    $this->sender_name = '';
    $this->message = '';
    //$this->send_date = date("F j, Y, g:i a");
  }

  public function executeEmailBulkQueue(sfWebRequest $request)
  {
    $subject = $request->getParameter('subject');
    $to = $request->getParameter('recipients');
    $sender_email = $request->getParameter('sender_email');
    $sender_name = $request->getParameter('sender_name');
    $message = $request->getParameter('message');
    $send_date = $request->getParameter('send_date');
    $priority = $request->getParameter('priority');
    
    $errors = array();
    // validate recievers
    if (empty($to)) {
      $errors['email'][0] = 'please specify email address';
    }else{
      $recievers = explode(',', $to);
      $pat = '/^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i';
      $full_pat = '/^([- a-z0-9]+)\<(([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,}))\>$/i';
      $emails = array();
      foreach ($recievers as $reciever) {
        $reciever = trim($reciever);
        if (empty($reciever)) continue;
        if (preg_match($full_pat, $reciever, $matches)) {
          $emails[$matches[2]] = $matches[1];
        }elseif (preg_match($pat, $reciever, $matches)) {
          $emails[$matches[0]] = '';
        }else{
          if (!isset($errors['email'])) $errors['email'] = array();
          $errors['email'][] = $reciever.' is unrecognizable email';
        }
      }
    }

    // validate subject
    if (empty($subject)) $errors['subject'] = 'subject required';
    // validate send_date
    if (empty($send_date)) $errors['send_date'] = 'Send date required';

    // validate sender
    $v_email = new sfValidatorEmail(array(), array('invalid' => 'please specify email address'));
    try {
      $sender_email = $v_email->clean($sender_email);
    }catch(sfValidatorError $e){
      $errors['sender_email'] = $e->__toString();
    }
	
   // attachments
    $upload_dir = sfConfig::get('sf_upload_dir').'/'.'bulk-email-attachments'.'/';
    $files = array();
    foreach ($request->getFiles() as $file) {
	      if ($file[0]['error'] != 0) continue;
	      
	      if(move_uploaded_file($file[0]["tmp_name"], $upload_dir . $file[0]["name"]))
	      {
	      	$files[] = array('path' => $upload_dir, 'name' => $file[0]['name']);
	      }
	      else
	      {
	      		//echo '<h1>Error while uploading '.$file[0]["tmp_name"].'/'.$file[0]["name"].' to '.$upload_dir . $file[0]["name"].'</h1>';
	      		$error['attachment'] = 'Error while uploading '.$file[0]["name"];  
	      }
    }
    // catch errors
    if ($errors) {
      $this->email_templates = EmailTemplatePeer::getByPersonId($this->getUser()->getId());

      $this->errors = $errors;
      $this->recipients = $to;
      $this->subject = $subject;
      $this->sender_email = $sender_email;
      $this->sender_name = $sender_name;
      $this->message = $message;
      $this->priority = $priority;
      $this->send_date = $send_date;
      if(!empty($error['attachment']))
      {	
      	$this->attachement_error = $error['attachment'];
      }
      $this->setTemplate('sendBulkQueue');
      return sfView::SUCCESS;
    }

   
    $email_letter = new EmailLetter();
    $email_letter->setSubject($subject);
    $email_letter->setSenderEmail($sender_email);
    $email_letter->setSenderName($sender_name);
    $email_letter->setBody($message);
    $email_letter->setAttachFilePath(serialize($files));
    $email_letter->setRecipients(implode(',', array_keys($emails)));
    $email_letter->save();

    $email_queue = new EmailQueue();
    $email_queue->setPersonId($this->getUser()->getId());
    $email_queue->setLetterId($email_letter->getId());
    $email_queue->setRequestDate(date('Y-m-d H:i:s', time()));
    $email_queue->setSendDate($send_date);
    $email_queue->setPriority($priority);
    $email_queue->setSendStatus('pending');
    
    $email_queue->save();
/*
    $this->getComponent('mail', 'sendBulkQueue', array(
      'subject' => $subject,
      'recievers' => $emails,
      'sender' => array($sender_email => $sender_name),
      'body' => $message,
      'files' => $files,
    ));
*/
    $this->getUser()->setFlash('success', 'Bulk email have successfully queued!');
    $this->redirect($request->getReferer());
  }

  /**
   * Mission
   * CODE:mission_index
   */
  public function executeEmailQueueList(sfWebRequest $request)
  {
    # recent item
    $this->getUser()->addRecentItem('Email', 'email', 'email/emailQueueList');

    # filter
    $this->processFilter($request);
    $this->pager = EmailQueuePeer::getPager(
    $this->max,
    $this->page,
    $this->subject,
    $this->priority,
    $this->request_date,
    $this->send_date
    );
    $this->queueEmails = $this->pager->getResults();

    $this->date_widget = new widgetFormDate(array('format_date' => array('js' => 'mm/dd/yy', 'php' => 'm/d/Y')), array('class' => 'text'));
  }

  /**
   * Searches for missions by filter
   */
  private function processFilter(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('emailQueueList', array(), 'person');

    if (!isset($params['subject'])) $params['subject'] = null;
    if (!isset($params['priority'])) $params['priority'] = null;
    if (!isset($params['request_date'])) $params['request_date'] = null;
    if (!isset($params['send_date'])) $params['send_date'] = null;
    
    $this->max_array = array(5, 10, 20, 30);

    $this->types = MissionTypePeer::getOnlyNames();

    if (in_array($request->getParameter('max'), $this->max_array)) {
      $params['max'] = $request->getParameter('max');
    }else{
      if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
    }

    if ($request->hasParameter('filter')) {
      $params['subject']      = $request->getParameter('subject');
      $params['priority']       = $request->getParameter('priority');
      $params['request_date']       = $request->getParameter('request_date');
      $params['send_date']       = $request->getParameter('send_date');
    }

    $this->page       = $page = $request->getParameter('page', 1);
    $this->max        = $params['max'];
    $this->subject    = $params['subject'];
    $this->request_date = $params['request_date'];
    $this->send_date = $params['send_date'];
    $this->priority = $params['priority'];

    $this->getUser()->setAttribute('emailQueueList', $params, 'person');
  }
  
  public function executeSendBulkQueueEmail(sfWebRequest $request)
  {
	$c = new Criteria();
  	$c->addJoin(EmailQueuePeer::LETTER_ID, EmailLetterPeer::ID, Criteria::LEFT_JOIN);
  	$c->addAnd(EmailQueuePeer::SEND_STATUS, 'SENT', Criteria::NOT_EQUAL);
  	$c->addDescendingOrderByColumn(EmailQueuePeer::PRIORITY);  	  	
    $this->email_letters = EmailLetterPeer::doSelect($c);
  	$this->email_queues = EmailQueuePeer::doSelect($c);
  	$todays_date = date("Y-m-d-H-i");
  	$today = strtotime($todays_date);
  	
  	$email = array();  	  	
  	foreach($this->email_letters as $key=>$item){
        $send_date = substr($this->email_queues[$key]->getSendDate(), 0, -3);// we wanna get only y-d-m-H-i from 2010-09-29 11:59:00
    	$send_date_sec = strtotime($send_date);
    	if($send_date_sec == $today){
    	//if($this->email_queues[$key]->getLetterId() == 11490){
    		$email['send_date'] = $send_date;
    		$email['subject'] = $item->getSubject();
    		$email['sender_name'] = $item->getSenderName();
    		$email['sender_email'] = $item->getSenderEmail();
    		$email['body'] = $item->getBody();
    		$email['attach_file_path'] = unserialize($item->getAttachFilePath());
    		$email['recipients'] = explode(',', $item->getRecipients());
    		$email['letter_id'] = $this->email_queues[$key]->getLetterId();
    		$this->sendBulkQueueEmail($email);
    	}
    }
	return sfView::NONE;
  }
	public function executeListEditBulkQueuedEmail(sfWebRequest $request){
                #Security
                if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
                      $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
                      $this->redirect('dashboard/index');
                }

		$c = new Criteria();
	  	$c->addJoin(EmailQueuePeer::LETTER_ID, EmailLetterPeer::ID, Criteria::LEFT_JOIN);
	  	$c->addAnd(EmailQueuePeer::SEND_STATUS, 'SENT', Criteria::NOT_EQUAL);
	  	
	  	$this->max_array = array(5, 10, 20, 30);
	  	$this->max = $this->getMaxBulkQueuedEmailValuePerPage($request, $this->max_array);
	    
	  	$this->page = $request->getParameter('page', 1);
	  	
	  	$c->setOffset(($this->page -1) * $this->max);
	  	$c->setLimit($this->max);	  	
	    
	  	$this->email_letters = EmailLetterPeer::doSelect($c);
	  	$this->email_queues = EmailQueuePeer::doSelect($c);	  	
		
	  	
	  	$this->pager = EmailQueuePeer::getPager($this->max, $this->page,$c);
	  	$this->queued_email_lists = array();
		foreach($this->email_letters as $key=>$item){	        
    		$this->queued_email_lists[$key]['send_date'] = $this->email_queues[$key]->getSendDate();
    		$this->queued_email_lists[$key]['subject'] = $item->getSubject();
    		$this->queued_email_lists[$key]['sender_name'] = $item->getSenderName();
    		$this->queued_email_lists[$key]['sender_email'] = $item->getSenderEmail();
    		$this->queued_email_lists[$key]['body'] = $item->getBody();
    		$this->queued_email_lists[$key]['attach_file_path'] = ($item->getAttachFilePath());
    		$this->queued_email_lists[$key]['recipients'] = explode(',',$item->getRecipients());
    		if(($key) >= ($this->max -1))break;
		}
	}
	
	public function getMaxBulkQueuedEmailValuePerPage($request, $max_array){
		    
		if(!$request->hasParameter('max')){
			if($this->getUser()->getAttribute('max')){
				$max = $this->getUser()->getAttribute('max');	
			}else{
				$max = sfConfig::get('app_max_bulk_queued_email_per_page', 10);
			}
		}elseif($request->hasParameter('max')){
			if (in_array($request->getParameter('max'), $max_array)) {
	      		$max = $request->getParameter('max');
	      		$this->getUser()->setAttribute('max', $max);
	    	}else{
	    		if (!isset($max)) 
	    		{
	    			$max = sfConfig::get('app_max_bulk_queued_email_per_page', 10);
	    			$this->getUser()->setAttribute('max', $max);	
	    		}	
	    	}	
		}
		return $max;
	}
	public function executeListEditBulkSentEmail(sfWebRequest $request){
                #Security
                if( !$this->getUser()->hasCredential(array('Administrator', 'Staff'), false)){
                       $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
                       $this->redirect('dashboard/index');
                }
		
		$this->max_array = array(5, 10, 20, 30);
	  	$this->max = $this->getMaxBulkQueuedEmailValuePerPage($request, $this->max_array);
	  	$this->page = $request->getParameter('page', 1);
	  	
		$c = new Criteria();
		$c->add(EmailQueuePeer::SEND_STATUS, 'SENT');
	  	$c->addJoin(EmailQueuePeer::LETTER_ID, EmailLetterPeer::ID, Criteria::LEFT_JOIN);
	  	
	  	$c->setOffset(($this->page -1) * $this->max);
	  	$c->setLimit($this->max);
	  	
	  	$this->email_letters = EmailLetterPeer::doSelect($c);
	  	$this->email_sents = EmailQueuePeer::doSelect($c);
	  	
		$this->pager = EmailQueuePeer::getPager($this->max, $this->page, $c);	  	
	  	$this->sent_email_lists = array();
		foreach($this->email_letters as $key=>$item){	        
    		$this->sent_email_lists[$key]['send_date'] = $this->email_sents[$key]->getSendDate();
    		$this->sent_email_lists[$key]['subject'] = $item->getSubject();
    		$this->sent_email_lists[$key]['sender_name'] = $item->getSenderName();
    		$this->sent_email_lists[$key]['sender_email'] = $item->getSenderEmail();
    		$this->sent_email_lists[$key]['body'] = $item->getBody();
    		$this->sent_email_lists[$key]['attach_file_path'] = ($item->getAttachFilePath());
    		$this->sent_email_lists[$key]['recipients'] = explode(',',$item->getRecipients());
			if(($key) >= ($this->max -1))break;
		}
	}
 	public function sendBulkQueueEmail($email = array())
    {	
  	   $files = array();
	    foreach ($email['attach_file_path'] as $file) {	    		      
	      $files[] = array('path' => $file['path'], 'name' => $file['name']);
	    }
	    
	  	$this->getComponent('mail', 'sendBulk', array(
	      'subject' => $email['subject'],
	      'recievers' => $email['recipients'],
	      'sender' => $email['sender_email'],
	      'body' => $email['body'],
	  	  'files' => $files
    	));
	    if(!empty($email['letter_id']))
	    {
	      $con = Propel::getConnection(EmailQueuePeer::DATABASE_NAME);
		  $sql = "UPDATE ".EmailQueuePeer::TABLE_NAME." SET ".EmailQueuePeer::SEND_STATUS." = 'SENT'"." WHERE ".EmailQueuePeer::LETTER_ID." = ".$email['letter_id'];
		  $stmt = $con->prepare($sql);
		  $stmt->execute();
	    }
  }
}
