<?php
/**
 * mail actions.
 *
 * @package    angelflight
 * @subpackage mail
 * @author     Ariunbayar, Javzaa
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
/* afids/apps/frontend/modules/mail/actions/components.class.php */

class mailComponents extends sfComponents
{
  public function executeSendPassword(sfWebRequest $request)
  {
    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
    
    /* @var Person */
    $person =& $this->person;
    $token =& $this->token;
    //Create the message
    $message = Swift_Message::newInstance()
      //Give the message a subject
      ->setSubject('Forgotten password request')
      //Set the To addresses with an associative array
      //->setTo(array($person->getEmail() => $person->getFirstName().' '.$person->getLastName()))
      ->setTo(array('masum@bglobalsourcing.com' => $person->getFirstName().' '.$person->getLastName()))
      //Give it a body
      ->setBody(
        '<p>Hi, '.$person->getFirstName().' ('.$person->getUsername().'),</p>'.
        "<p>We received a request to reset the password associated with this username. This could be because you forgot the password on your account.</p>".
        "<p>If you made this request and wish to reset your password, please follow the link below:<br/>
        <a href='
        ".
        url_for('secure/resetPassword?email='.$person->getEmail().'&token='.$token, true)."'>"
        .url_for('secure/resetPassword?email='.$person->getEmail().'&token='.$token, true).
        "</a></p>".
        "<p>If the link does not work, you may need to copy and paste the URL into your browser.</p>".
        "<p>This will reset your password. You can then login and change it to something you'll remember.</p>".
        '<p>If you did not make the request, please ignore this email. If you receive repeated notifications, please notify us at <a href="mailto:support@angelflightwest.org">support@angelflightwest.org</a>.</p>'.
        '<p>If you have any further problems, please send an email to <a href="mailto:support@angelflightwest.org">support@angelflightwest.org</a>.</p>'.
        "<br />".
        "<p>Thank you,</p>".
        "<p>The Angel Flight West Staff</p>"
      , 'text/html')
    ;
    $this->send($message);
    
    return sfView::NONE;
  }
  
  private function send(Swift_Message $message, $sender = array())
  {

    //Create the Transport
    /*$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
     ->setUsername('ari4test@gmail.com')
      ->setPassword('1172d5fd31634830ece0744e47')
    ;*/
    //$transport = Swift_SmtpTransport::newInstance('smtp.aonbd.net', 25);
    $transport = Swift_SmtpTransport::newInstance('localhost', 25);
    //Set the From address with an associative array
    if (empty($sender)) {$sender = array(sfConfig::get('app_mailer_mail', 'postmaster@angelflightwest.org') => sfConfig::get('app_mailer_name', 'Angel Flight West Postmaster'));}
    $message->setFrom($sender);
    
    //Create the Mailer using your created Transport
    $mailer = Swift_Mailer::newInstance($transport);
    
    $mailer->send($message);
  }

  public function executeMemberApplicationRecieved(sfWebRequest $request)
  {
    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

    /* @var Person */    
    $siteEmail=sfConfig::get('app_mail', array());
    $siteName=sfConfig::get('app_name', array());
    $siteUrl=sfConfig::get('app_siteurl', array());

    $email =& $this->email;
    $name = $this->name;
    
    //Create the message
    $message = Swift_Message::newInstance()
      //Give the message a subject
      ->setSubject('Membership Application Recieved')
      //Set the To addresses with an associative array
      //->setTo(array($email => $name))
      ->setTo(array('masum@bglobalsourcing.com' => $name))
      //Give it a body	

      ->setBody(
        '<p>Dear '.$name.',</p>'.
        "<p>Thank you very much for your application for membership in ".$siteName.". We look forward to welcoming you to the AngelFlight West Family!</p>".
        "<p>It will take our staff a few days to process your application, after which,  you will receive an email with your membership number, or ID number. Your ID number will give you access to our web site and the mission coordination system. If you are interested in flying as a Command Pilot, you will need to complete an orientation with one of our Mission Orientation Pilots (MOP). You can find a list of MOPs in the database once you have logged in using your ID Number, under the MOP Directory If you have difficulty, please feel free to contact the ".$siteName." office.</p>".
        "<p>It will take our staff a few days to process your application, after which, you will receive an email with your membership number, or ID number. Your ID number will give you access to our web site and the mission coordination system. If you are interested in flying as a Command Pilot, you will need to complete an orientation with one of our Mission Orientation Pilots (MOP). You can find a list of MOPs in the database once you have logged in using your ID Number, under the MOP Directory If you have difficulty, please feel free to contact the ".$siteName." office</p>".
        "<p>In the meantime, we would welcome your participation as a mission assistant, a mission coordinator, or in any one of a number of capacities on the ground Please feel free to check the Calendar of Events on our web site to see about upcoming meetings, fly-ins, or other events in your area.</p>".
        "<p>If you have any questions about membership, please contact Lauren James by email at ".$siteEmail.", or by phone at ".$siteName."</p>".
        "<p>Again, many thanks for your support of ".$siteName."</p>".
        "<p>Best regards</p>".
        "<p>The ".$siteName." Staff</p>"
       ,'text/html');           
    $this->send($message);

    return sfView::NONE;
  }
  
  public function executeMemberApplicationProcessed(sfWebRequest $request)
  {
    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
    sfConfig::get("app_");
    /* @var Person */
    $siteEmail=sfConfig::get('app_mail', array());
    $siteName=sfConfig::get('app_name', array());
    $siteUrl=sfConfig::get('app_siteurl', array());
    
    $email =& $this->email;
    $name = $this->name;
    $member_id = $this->member_id;
    
    //Create the message
    $message = Swift_Message::newInstance()
      //Give the message a subject
      ->setSubject('Membership Application Recieved')
      //Set the To addresses with an associative array
      //->setTo(array($email => $name))
      ->setTo(array('masum@bglobalsourcing.com' => $name))
      //Give it a body      
      ->setBody(
        '<p>Dear '.$name.',</p>'.
        '<p>You recently applied for membership with '.$siteName.'.Your application has been processed, and you have been assigned a Member ID: '.$member_id.'</p>'.
        "<p>This number will give you access to our mission coordination system. To log on, go to ".$siteUrl." and log in as a member, using your Member ID, last name, and the zip code you provided us on your application. Once logged in, please use the change password option in the left navigation to assign yourself a private username and password. This will give you access to additional features in the system.</p>".
      	"<p>If you are interested in flying as a command pilot, you can search for mission orientation pilots in your area and contact one to schedule your mission orientation. You can also see what missions are available, and sign up for a mission either as a command pilot or as a mission assistant.You will also be receiving a membership badge and a package of information and materials. These same materials are also available on the web site at http://www.angelflightwest.org/members/forms.asp</p>".
        "<p>If you have any questions about membership, please contact Lauren James at ".$siteEmail.", or by phone at (310) 390-2958.</p>".
        "<p>Again, many thanks for your support of ".$siteName."</p>".
        "<p>Best regards</p>".
        "<p>The ".$siteName." Staff</p>"
       ,'text/html');           
    $this->send($message);

    return sfView::NONE;
 }
  
    public function executeMemberApplicationFailure(sfWebRequest $request)
    {
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
        /* @var Person */
        $siteEmail=sfConfig::get('app_mail', array());
        $siteName=sfConfig::get('app_name', array());
        $siteUrl=sfConfig::get('app_siteurl', array());
        
        $email =& $this->email;
        $name = $this->name;
        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Membership Application Failure')
          //Set the To addresses with an associative array
          //->setTo(array($email => $name))
          ->setTo(array('masum@bglobalsourcing.com' => $name))
          //Give it a body
          ->setBody(
            '<p>Dear '.$name.',</p>'.
            "<p>We noticed that you recently applied for membership with ".$siteName." on the web site but did not complete the process.</p>".
            "<p>We apologize if you had trouble completing the application, or perhaps you were not comfortable providing your credit card number through our secure server.Let us assure you, our web site uses the latest encryption technology and your credit card transaction will be safe.</p>".
            "<p>We would certainly encourage you to complete the application process and enjoy the benefits of membership with ".$siteName."</p>".
            "<p>We have attached a paper application form (in PDF format) which you can print and return to the ".$siteName." or office by mail with a check. Or, please contact the office by phone at Ex-1232-222-55 or by email at ex(member email) to have an application form sent to you by mail.</p>".
            "<p>Again, many thanks for your interest in ".$siteName."</p>".
            "<p>Best regards</p>".
            "<p>The ".$siteName." Staff</p>"
           ,'text/html');
        $this->send($message);
        return sfView::NONE;
      }
  
	public function executeMemberApplicationNotice(sfWebRequest $request)
	{
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));	
	    /* @var Person */
            
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());

            $email =$siteEmail;
            $name = $siteName;
            
	    $first_name = $this->first_name;
            $last_name = $this->last_name;
            //$name=$first_name.''.$last_name;
            $address = $this->address;
            $city = $this->city;
            $state = $this->state;
            $zipcode = $this->zipcode;
	            
	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Membership Application Notice')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body  
	      ->setBody(
	        '<p><strong>A new member application has been received from:</strong></p>'.
	        '<p>Frist Name :'.$first_name.'</p>'.
	        '<p>Last Name  :'.$last_name.'</p>'.
	        '<p>Address    :'.$address.'</p>'.
	        '<p>City       :'.$city.'</p>'.
	        '<p>State      :'.$state.'</p>'.
	        '<p>Zip Code   :'.$zipcode.'</p>'.
	        "<p>Process this application from the Reports Menu.</p>"
	       ,'text/html');           
	    $this->send($message);	
	    return sfView::NONE;
	 }
  
	 public function executeMemberRenewalReceived(sfWebRequest $request)
	  {
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
	
	    /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());

            

	    $email =& $this->email;
	    $name = $this->name;

            $donation_amount = $this->donation_amount;
            $due_amount = $this->due_amount;
            $totalAmount = $this->totalAmount;
            
	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Membership Renewal Application Received')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body 
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>Thank you very much for renewing your membership in ".$siteName.".We look forward to your continued participation with this great organization.</p>".
	        "<p>The following is a summary of your charges:</p>".
	        "<p>Dues amount : ".$due_amount."</p>".
	        "<p>Donation amount : ".$donation_amount."</p>".
	        "<p>Total charge : ".$totalAmount."</p>".
	        "<p>If you made a donation of $150 or more, you will be receiving your premium shortly.If you have any questions about membership, please contact Lauren James by email at laurenj@angelflightwest.org, or by phone at (310) 390-2958.</p>".
	        "<p>Again, many thanks for your support of ".$siteName." .</p>".
	        "<p>Best regards</p>".
	        "<p>The ".$siteName." Staff</p>"
	       ,'text/html');          
	    $this->send($message);
	    return sfView::NONE;
	}

        public function executeMemberRenewalFailure(sfWebRequest $request)
	  {
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
	
	    /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());

	    $email =& $this->email;
	    $name = $this->name;
	            
	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Membership Renewal Application Failure')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body      
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>We noticed that you recently attempted to renew your membership with ".$siteName." .on the web site but did not complete the process.</p>".
	        "<p>I apologize if you had trouble completing the application, or perhaps you were not comfortable providing your credit card number through our secure server.</p>".
	        "<p>If you had a problem with the renewal process, please contact the webmaster by email at 'Ex-Master Email' so that we can correct the problem. Thank you for renewing online... it saves the organization a great deal in mailing costs and staff time.</p>".
	        "<p>We have attached a paper application form (in PDF format) which you can print and return to the ".$siteName." or office by mail with a check. Or, please contact the office by phone at (310) 390-2958 or by email at memberinfo@angelflightwest.org to have an application form sent to you by mail.</p>".
	        "<p>Again, many thanks for your support of ".$siteName.".</p>".
	        "<p>Best regards</p>".
	        "<p>The ".$siteName." Staff</p>"
	       ,'text/html');          
	      $this->send($message);
	      return sfView::NONE;
	}
	
	public function executeMemberRenewalNotice(sfWebRequest $request)
	{
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));    
	    /* @var Person */
            sfConfig::get('app_flight_statuses', array());

            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());

            $email =$siteEmail;
            $name = $siteName;
           
            
	    $first_name = $this->first_name;
            $last_name = $this->last_name;
            $address = $this->address;
            $city = $this->city;
            $state = $this->state;
            $zipcode = $this->zipcode;
	                
	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Membership Renewal Application Notice')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p><strong>A member renewal application has been received from:</strong></h1>'.
	        '<p>Frist Name :'.$first_name.'</p>'.
	        '<p>Last Name  :'.$last_name.'</p>'.
	        '<p>Address    :'.$address.'</p>'.
	        '<p>City       :'.$city.'</p>'.
	        '<p>State      :'.$state.'</p>'.
	        '<p>Zip Code   :'.$zipcode.'</p>'.
	        "<p>Process this application from the Reports Menu.</p>"
	       ,'text/html');           
	      $this->send($message);
	      return sfView::NONE;
  }

  public function executePilotRequestAccepted(sfWebRequest $request)
  {
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
        /* @var Person */
        $siteEmail=sfConfig::get('app_mail', array());
        $siteName=sfConfig::get('app_name', array());
        $siteUrl=sfConfig::get('app_siteurl', array());

        $email =& $this->email;
        $name = $this->name;
        $externalID =  $this->externalID;
        $leg_number = $this->leg_number;
        $pilot_type = $this->pilot_type;
        
        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Pilot Request Accepted')
          //Set the To addresses with an associative array
          //->setTo(array($email => $name))
          ->setTo(array('farazi@bglobalsourcing.com' => $name))
          //Give it a body
           ->setBody(
            '<p>Dear '.$name.',</p>'.
            "<p>Based on your recent request, ".$siteName." has assigned as a ".$pilot_type." Mission number ".$externalID." - ".$leg_number." to you.</p>".
            "<p>You will shortly receive a mission itinerary by email with complete details about the mission. You can also review the mission data online by logging on to AFIDS at <a harf='".$siteUrl."'>".$siteUrl."</a> and clicking on the Mission Summary link</p>".
            "<p>Please remember to contact the passenger as soon as possible after you get the mission information form. This helps alleviate their anxiety about whether or not they will be able to make their treatment, and gives them ample time to make all the necessary arrangements. And please contact the office if you have any questions about the mission.</p>".
            "<p>Again, many thanks for your support of ".$siteName.".</p>".
            "<p>Best regards</p>".
            "<p>The ".$siteName." Staff</p>"
           ,'text/html');
          $this->send($message);
          return sfView::NONE;
   }

   public function executePilotRequestNotAccepted(sfWebRequest $request)
   {
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

        /* @var Person */
        $siteEmail=sfConfig::get('app_mail', array());
        $siteName=sfConfig::get('app_name', array());
        $siteUrl=sfConfig::get('app_siteurl', array());

        $email =& $this->email;
        $name = $this->name;
        $externalID =  $this->externalID;
        $leg_number = $this->leg_number;
        $missionDate = $this->missionDate;
        
        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Pilot Request Not Accepted')
          //Set the To addresses with an associative array
          //->setTo(array($email => $name))
          ->setTo(array('farazi@bglobalsourcing.com' => $name))
          //Give it a body
           ->setBody(
            '<p>Dear '.$name.',</p>'.
            "<p>Thank you for your recent request for ".$siteName." Mission ".$externalID." - ".$leg_number." on ".$missionDate."</p>".
            "<p>We were not able to assign this mission to you, in most cases, because another member made a request first. Please visit AFIDS often; we have many more missions that need pilots!</p>".
            "<p>Again, many thanks for your support of ".$siteName.".</p>".
            "<p>Best regards</p>".
            "<p>The ".$siteName." Staff</p>"
           ,'text/html');
          $this->send($message);
          return sfView::NONE;
  }

  public function executeRemoveLegPilotAck(sfWebRequest $request)
   {
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
        
        /* @var Person */
        $siteEmail=sfConfig::get('app_mail', array());
        $siteName=sfConfig::get('app_name', array());
        $siteUrl=sfConfig::get('app_siteurl', array());

        $email =& $this->email;
        $name = $this->name;
        $missionleginfo =  $this->missionleginfo;
        $missionDate = $this->missiondate;

        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Pilot removed acknowledgement')
          //Set the To addresses with an associative array
          ->setTo(array('farazi@bglobalsourcing.com' => $name))
          //Give it a body
           ->setBody(
            '<p>Dear '.$name.',</p>'.
            "<p>You have been removed from Mission ".$missionleginfo." on ".$missionDate."</p>".
            "<p>If you believe that you have received this message in error, please contact the office immediately.</p>".
            "<p>Again, many thanks for your support of ".$siteName.".</p>".
            "<p>Best regards</p>".
            "<p>The ".$siteName." Staff</p>"
           ,'text/html');
          $this->send($message);
          return sfView::NONE;
    }

    
    public function executeRevivalPilotRequestAck(sfWebRequest $request)
   {
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
        
        /* @var Person */
        $siteEmail=sfConfig::get('app_mail', array());
        $siteName=sfConfig::get('app_name', array());
        $siteUrl=sfConfig::get('app_siteurl', array());

        $email =& $this->email;
        $name = $this->name;
        $missionleginfo =  $this->missionleginfo;
        $missionDate = $this->missiondate;

        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Pilot revival acknowledgement')
          //Set the To addresses with an associative array
          ->setTo(array('farazi@bglobalsourcing.com' => $name))
          //Give it a body
           ->setBody(           
            "<p>Previously you entered a request for Mission  ".$missionleginfo." on ".$missionDate."</p>".
            "<p>Subsequently, the pilot assigned to that mission has had to remove him or herself from the mission, and it is once again available</p>".
            "<p>If you are still available on this date and interested in flying this mission, please make another pilot request from the missions available list, or contact the office.</p>".
            "<p>Again, many thanks for your support of ".$siteName.".</p>".
            "<p>Best regards</p>".
            "<p>The ".$siteName." Staff</p>"
           ,'text/html');
          $this->send($message);
          return sfView::NONE;
    }

  public function executeMissionInfoToRecipients(sfWebRequest $request)
  {
      
    $file_path1=sfConfig::get('sf_upload_dir').'/bulk-email-attachments/waiver_normal.pdf';
    $file_path2=sfConfig::get('sf_upload_dir').'/bulk-email-attachments/waiver_normal_spanish.pdf';
    $file_path3=sfConfig::get('sf_upload_dir').'/bulk-email-attachments/waiver_organ_english.pdf';
    
    $message = Swift_Message::newInstance()
      ->setSubject('Angel Flight West Mission Information Form')
      //->setTo($this->recievers)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody($this->body, 'text/html');

     if ($this->files == 1) {
        if($this->type_name == 'Organ'){
            $message->attach(Swift_Attachment::fromPath($file_path3));
        }else {
            $message->attach(Swift_Attachment::fromPath($file_path1));
            $message->attach(Swift_Attachment::fromPath($file_path2));
        }
        
      }
     $this->send($message, $this->sender);
     return sfView::NONE;
  }

  public function executeMissionToPilot(sfWebRequest $request)
  {
    //echo print_r($this->recievers); die;
    $message = Swift_Message::newInstance()
      ->setSubject($this->subject)
      //->setTo($this->recievers)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody($this->body, 'text/html')
    ;
    if ($this->files) {
      foreach ($this->files as $file) {
        $message->attach(Swift_Attachment::fromPath($file['path'])->setFilename($file['name']));
      }
    }
    $this->send($message, $this->sender);

    return sfView::NONE;
  }
    
  public function executeSendBulk(sfWebRequest $request)
  {
    $message = Swift_Message::newInstance()
      ->setSubject($this->subject)
      //->setTo($this->recievers)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody($this->body, 'text/html')
    ;
    if ($this->files) {
      foreach ($this->files as $file) {
        $message->attach(Swift_Attachment::fromPath($file['path'])->setFilename($file['name']));
      }
    }
    $this->send($message, $this->sender);

    return sfView::NONE;
  }
  
  public function executeMissionReqReject(sfWebRequest $request)
  {
    $email   = $this->email;
    $text    = $this->text;
    $subject = $this->subject;
    
    //Create the message
    //Email for incomplete renewal application
    $message = Swift_Message::newInstance()
      ->setSubject($subject)
      //->setTo($email)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody(
        "<p>".$text."</p>"
      , 'text/html')
    ;
    $this->send($message);
    return sfView::NONE;
  }

   public function executeMissionReqReceived(sfWebRequest $request)
	  {
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

	    /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());
            $orgphone=sfConfig::get('app_organization_phone', array());



	    $email =& $this->email;
	    $name = $this->name;

            $donation_amount = $this->donation_amount;
            $due_amount = $this->due_amount;
            $totalAmount = $this->totalAmount;

	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Mission request received')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>Thank you very much for your application for membership in ".$siteName.".We look forward to welcoming you to the ".$siteName." Family.</p>".
	        "<p>It will take our staff a few days to process your application, after which, you will receive an email with your membership number. That number will give you access to our web site and mission coordination system. If you are interested in flying as a pilot in command, you can search for mission orientation pilots in your area and contact one to schedule your mission orientation flight</p>".
	        "<p>In the meantime, we would welcome your participation as a mission assistant, a mission coordinator, or in any one of a number of capacities on the ground. Please feel free to check the Calendar of Events on our web site to see about upcoming meetings, fly-ins, or other events in your area.</p>".
	        "<p>If you have any questions about membership, please contact Erin Olson by email at erino@angelflight.org, or by phone at : ".$orgphone."</p>".
	        "<p>Again, many thanks for your support of ".$siteName." .</p>".
	        "<p>Best regards</p>".
	        "<p>The ".$siteName." Staff</p>"
	       ,'text/html');
	    $this->send($message);
	    return sfView::NONE;
	}

        public function executeMissionCoordinatedAdded(sfWebRequest $request)
	{
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
	    /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());
            $webmasteremail=sfConfig::get('app_webmaster_email', array());

	    $email =& $this->email;
	    $name = $this->name;
            $leg_id = $this->leg_id;

	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Mission coordinator added')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('farazi@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>You has been added to mission ".$leg_id.".</p>".
	        "<p>Again, many thanks for your support of ".$siteName.".</p>".
	        "<p>Best regards</p>".
	        "<p>The ".$siteName." Staff</p>"
	       ,'text/html');
	      $this->send($message);
	      return sfView::NONE;
	}

       public function executeMissionPilotAdded(sfWebRequest $request)
	{
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
            
            $changedBy = $this->getUser()->getName();

            /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());
            $webmasteremail=sfConfig::get('app_webmaster_email', array());

	    $email =& $this->email;
	    $name = $this->name;
            $leg_id = $this->leg_id;
            $pilot_name = $this->pilot_name;
           
	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Mission pilot added')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('farazi@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>A pilot was added to Mission ".$leg_id.".</p>".
	        "<p>Pilot Name : ".$pilot_name.".</p>".
	        "<p>Changed by : ".$changedBy." Staff</p>"
	       ,'text/html');
	      $this->send($message);
              return sfView::NONE;
	}
        
       public function executeMissionReqFailure(sfWebRequest $request)
	  {
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

	    /* @var Person */
            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());
            $webmasteremail=sfConfig::get('app_webmaster_email', array());

	    $email =& $this->email;
	    $name = $this->name;

	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Mission request failure')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p>Dear '.$name.',</p>'.
	        "<p>We noticed that you recently attempted to your mission request with ".$siteName." .on the web site but did not complete the process.</p>".
	        "<p>I apologize if you had trouble completing the mission request, or perhaps you were not comfortable providing your credit card number through our secure server.</p>".
	        "<p>If you had a problem with the renewal process, please contact the webmaster by email at ".$webmasteremail." so that we can correct the problem. Thank you for mission requesting online... it saves the organization a great deal in mailing costs and staff time.</p>".	        
	        "<p>Again, many thanks for your support of ".$siteName.".</p>".
	        "<p>Best regards</p>".
	        "<p>The ".$siteName." Staff</p>"
	       ,'text/html');
	      $this->send($message);
	      return sfView::NONE;
	}

	public function executeMissionReqNotice(sfWebRequest $request)
	{
	    $this->getContext()->getConfiguration()->loadHelpers(array('Url'));
	    /*@var Person*/
            sfConfig::get('app_flight_statuses', array());

            $siteEmail=sfConfig::get('app_mail', array());
            $siteName=sfConfig::get('app_name', array());
            $siteUrl=sfConfig::get('app_siteurl', array());

            $email =$siteEmail;
            $name = $siteName;

	    $first_name = $this->first_name;
            $last_name = $this->last_name;
            $address = $this->address;
            $city = $this->city;
            $state = $this->state;
            $zipcode = $this->zipcode;

	    //Create the message
	    $message = Swift_Message::newInstance()
	      //Give the message a subject
	      ->setSubject('Mission request Notice')
	      //Set the To addresses with an associative array
	      //->setTo(array($email => $name))
	      ->setTo(array('masum@bglobalsourcing.com' => $name))
	      //Give it a body
	       ->setBody(
	        '<p><strong>A mission request has been received from : </strong></h1>'.
	        '<p>Frist Name :'.$first_name.'</p>'.
	        '<p>Last Name  :'.$last_name.'</p>'.
	        '<p>Address    :'.$address.'</p>'.
	        '<p>City       :'.$city.'</p>'.
	        '<p>State      :'.$state.'</p>'.
	        '<p>Zip Code   :'.$zipcode.'</p>'.
	        "<p>Process this mission request from the Reports Menu.</p>"
	       ,'text/html');
	      $this->send($message);
	      return sfView::NONE;
  }

  public function executeMissionReqCreate(sfWebRequest $request)
  {
    $email   = $this->email;
    $subject = $this->subject;
    $text    = $this->text;      
    //Create the message
      $message = Swift_Message::newInstance()
      ->setSubject($subject)
      //->setTo($email)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody(
        "<p>".$text."</p>", 'text/html');
    $this->send($message);
    return sfView::NONE;
  }
  
  public function executeItinerary_Mission_MissionLegCancel(sfWebRequest $request)
  {
    $email   = $this->email;
    $subject = $this->subject;
    $text    = $this->text;
    //Create the message
      $message = Swift_Message::newInstance()
      ->setSubject($subject)
      //->setTo($email)
      ->setTo('masum@bglobalsourcing.com')
      ->setBody(
        "<p>".$text."</p>", 'text/html');
    $this->send($message);
    return sfView::NONE;
  }

   public function executeEventReservationSuccessMail(sfWebRequest $request)
   {
        $email = $this->email;
        $name = $this->first_name;
        $eventName = $this->event_name;
        $eventDate = $this->date;
        $eventTime = $this->time;
        $eventLocation = $this->location;
        $primary_guest = 1;
        $Adult_guest = $this->Adult_guest;
        $child_guest = $this->child_guest;
        $total_amount = $this->total_amount;       

        
        //Create the message
        $message = Swift_Message::newInstance()
          //Give the message a subject
          ->setSubject('Angel Flight West Event Reservation Confirmation')
          //Set the To addresses with an associative array
          //->setTo($email)
          ->setTo('masum@bglobalsourcing.com')
          //Give it a body
          ->setBody(
            '<p>Dear '.$name.',</p>'.
            "<br/>".
            "<p>We have received your reservation for the event below. This email serves as a confirmation of your reservation. </p>".
            "<p>We look forward to seeing you!</p>".
            "<br/>".
            "<p>Event: ".$eventName."</p>".
            "<p>Date: ".date('m-d-Y',strtotime($eventDate))."</p>".
            "<p>Time: ".$eventTime."</p>".
            "<p>Location: ".$eventLocation."</p>".
            "<p>Primary Guest: ".$primary_guest."</p>".
            "<p># Additional Adult Guests: ".$Adult_guest."</p>".
            "<p># Additional Child Guests: ".$child_guest."</p>".
            "<p>Amt. Paid: $".$total_amount."</p>" ,'text/html');
        $this->send($message);
        return sfView::NONE;
      }
}
