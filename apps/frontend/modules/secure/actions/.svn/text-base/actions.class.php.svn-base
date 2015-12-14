<?php

/**
 * test actions.
 *
 * @package    angelflight
 * @subpackage secure
 * @author     Ariunbayar, Javzaa
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class secureActions extends sfActions
{
  /**
  * Shows login form
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request)
  {
    $form = new sfForm();
    $this->csrf_tag = $form['_csrf_token'];
    
    if ($request->hasParameter('referer'))
      $this->referer = $request->getParameter('referer');
    else
      $this->referer = $request->getUri();
    
    if ($this->getUser()->isAuthenticated()) {
      if($this->referer=="http://69.50.211.150/secure/login"){
            $this->redirect('/dashboard/index');
      }else{
            $this->redirect($this->referer);
            //
      }   
      
    }
  }

  /**
   * Validates sign in process and redirects
   * @param sfWebRequest $request
   */
  public function executeSignIn(sfWebRequest $request)
  {
    $username = $request->getParameter('username', '');
    $password = $request->getParameter('password', '');
    if (strlen($username) > 0 && strlen($password) > 0) {
      //$request->checkCSRFProtection();
      $person = PersonPeer::getByUsername($username);
      if ($person instanceof Person) {
        if ($person->isPassword($password) && $person->getUsername() == $username) {
          $this->signIn($person, $request);
          $referer = $request->getParameter('referer');
          if (empty($referer)){
            //$this->redirect('@homepage');
            $this->redirect('/dashboard/index');
          }
          else {
            $this->redirect($referer);
          }
        }
      }
      $this->error_msg = 'Your username and password are incorrect!';
    }else{
      $this->error_msg = 'Please enter your username and password!';
    }

    $this->executeLogin($request);

    $this->username = $username;
    $this->setTemplate('login');
  }

  /**
   * Signs the user in
   * @param Person $person
   * @param sfWebRequest $request
   */
  private function signIn(Person $person, sfWebRequest $request)
  {
    $cur_user = $this->getUser();
    $cur_user->setAttribute('id', $person->getId(), 'person');
    $cur_user->setAttribute('username', $person->getUsername(), 'person');
    $cur_user->setAttribute('firstname', $person->getFirstName(), 'person');
    $cur_user->setAttribute('lastname', $person->getLastName(), 'person');       

    # set member and pilot ids
    $members = $person->getMembers();
    if (isset($members[0])) {
      $cur_user->setAttribute('member_id', $members[0]->getId(), 'person');
      $pilot = $members[0]->getPilot();
      if ($pilot) $cur_user->setAttribute('pilot_id', $pilot->getId(), 'person');
    }

    /* Custom Code - Ziyed and Aftab */
    $cur_user_roles = array();
    $query = "select role_id from afids.person_role where person_role.person_id ='".$person->getId()."'";
    $conn = Propel::getConnection();
    $statement = $conn->prepare($query);
    $statement->execute();
    while ($row = $statement->fetch()) {
        $cur_user_roles[] = $row['role_id'];
    }
    ///////Ziyed do credential//////
        $warnings = array();
        if (array_intersect($cur_user_roles, array(1, 2, 26))) {
                $cur_user->addCredential('Administrator');
        } elseif ( array_intersect($cur_user_roles, array(3, 4, 28)) ){
                $cur_user->addCredential('Staff');
        } elseif( array_intersect($cur_user_roles, array(7, 24, 25, 29)) ){
                $cur_user->addCredential('Coordinator');
        } else if(  array_intersect($cur_user_roles, array(31,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23)) ){
                if (isset($members[0]) && ($members[0] instanceof Member)) {
                    $cur_user->addCredential('Member');
                }else{
                    $warnings[] = 'You are a member but you don\'t have proper database record';
                }
        } elseif( array_intersect($cur_user_roles, array(30)) ){
                $cur_user->addCredential('Volunteer');
        } elseif(array_intersect($cur_user_roles, array(5,6,27))){
                if (isset($pilot) && ($pilot instanceof Pilot)) {
                     $cur_user->addCredential('Pilot');
                }else{
                    $warnings[] = 'You are a pilot but you don\'t have proper database record';
                }
        } else{
            $warnings[] = 'you don\'t have proper database record';
            if (count($warnings)) $this->getUser()->setFlash('warning', implode(". ", $warnings));
            $this->redirect('/');
        }     
      

    //////Ziyed end
    
  
    $cur_user->setAuthenticated(true);


    /* End of Custom Code - Ziyed and Aftab */

    # add credentials
    /*
    $warnings = array();
    $person_roles = $person->getPersonRolesJoinRole();
    foreach ($person_roles as $person_role) {
      $credential = $person_role->getRole()->getTitle();
      //if ($credential == '@Pilot'){
      if ($credential == 'Pilot'){
        // @Pilot role can be assigned only if current user has Pilot record set
        if (isset($pilot) && ($pilot instanceof Pilot)) {
          $cur_user->addCredential($credential);
        }else{
          $warnings[] = 'You are a pilot but you don\'t have proper database record';
        }
      }elseif ($credential == 'Member'){
        // @Member role can be assigned only if current user has Member record set
        if (isset($members[0]) && ($members[0] instanceof Member)) {
          $cur_user->addCredential($credential);
        }else{
          $warnings[] = 'You are a member but you don\'t have proper database record';
        }
      }else{
        $cur_user->addCredential($credential);
      }
    }*/

    if (count($warnings)) $this->getUser()->setFlash('warning', implode(". ", $warnings));
  }

  public function executeSignOut(sfWebRequest $request)
  {
    $cur_user = $this->getUser();
    $cur_user->getAttributeHolder()->removeNamespace('person');
    $cur_user->setAuthenticated(false);
    $cur_user->clearCredentials();

    $this->redirect('@homepage');
  }

  public function executeForgotPassword(sfWebRequest $request)
  {
    $form = new sfForm();
    $this->csrf_tag = $form['_csrf_token'];
  }

  /**
   * Sends new password to the requester
   * Can retrieve via Username or MemberId
   * @param sfWebRequest $request
   */
  public function executeSendPassword(sfWebRequest $request)
  {
    if ($request->isMethod('post')) {
      $request->checkCSRFProtection();

      $username = $request->getParameter('username');
      $member_id = $request->getParameter('member_id');

      if (strlen($username) > 0 || strlen($member_id) > 0) {
        $person = null;
        if ($member_id) {
          $member = MemberPeer::retrieveByPK($member_id);
          if ($member instanceof Member) {
            $person = $member->getPerson();
          }
        }elseif ($username) {
          $person = PersonPeer::getByUsername($username);
        }

        if ($person instanceof Person) {
          # create token for password request
          $pr = new PasswordRequest();
          $pr->setPerson($person);
          $pr->setEmail($person->getEmail());
          $pr->save();

          if ($person->getEmail()) {
            # send email via component
            $this->getComponent('mail', 'sendPassword', array('person' => $person, 'token' => $pr->getToken()));
            $this->getUser()->setFlash('success', 'Your password request has been successfully sent to your email!');
          }else{
            $this->getUser()->setFlash('success', 'This user doesn\'t have proper email address!');
          }

          # redirect to login
          $this->redirect('secure/login');
        }

        $this->error_msg = 'Sorry! We haven\'t found any matching record!';
      }else{
        $this->error_msg = 'Please type your username OR member id!';
      }
    }

    $this->executeForgotPassword($request);
    $this->setTemplate('forgotPassword');
  }

  /**
   * Shows password reset form where the token matches
   * @param sfWebRequest $request
   */
  public function executeResetPassword(sfWebRequest $request)
  {
    $password_request = PasswordRequestPeer::getByToken($request->getParameter('token'));
    if (
    $password_request
    && ($password_request->getEmail() == $request->getParameter('email'))
    && ($password_request->getCreatedAt('U') > (time() - (int)sfConfig::get('app_password_request_lifetime'))) # must at least be in given duration
    ) {

      # token is valid
      if ($request->isMethod('post')) {
        # validate
        $password_len = strlen($request->getParameter('password'));
        $required_len = sfConfig::get('app_password_minimum_length');
        if ($password_len > 0) {
          if ($password_len >= $required_len) {
            if ($request->getParameter('password') == $request->getParameter('confirm')) {
              $person = $password_request->getPerson();
              $person->setPassword($request->getParameter('password'));
              $person->save();
              $password_request->delete();

              # all success
              $this->getUser()->setFlash('success', 'Your password has been successfully changed! Please use following form to login.');
              $this->redirect('secure/login');
            }else{
              $this->error_msg = 'Passwords don\'t match!';
            }
          }else{
            $this->error_msg = 'Password must be at least '.$required_len.' characters';
          }
        }else{
          $this->error_msg = 'Please type your password';
        }
      }
      $form = new sfForm();
      $this->csrf_tag = $form['_csrf_token'];
      $this->password_request = $password_request;

    }else{
      $this->getUser()->setFlash('warning', 'We didn\'t find any matching password request. Or your password request has been expired!');
      $this->redirect('@homepage');
    }
  }

  public function executeRetrievePassword(sfWebRequest $request)
  {
    $form = new sfForm();
    $this->csrf_tag = $form['_csrf_token'];
  }

  /**
   * Check and go to Create Password
   * Can retrieve via Member_id or LastName, Zipcode
   * @param sfWebRequest $request
   */
  public function executeCheckIdentity(sfWebRequest $request)
  {
    if ($request->isMethod('post')) {

      $request->checkCSRFProtection();

      $member_Extar_id= $request->getParameter('member_id2');
      $lastname = $request->getParameter('lastname');
      $zipcode  = $request->getParameter('zipcode');

      $member = MemberPeer::getByExternalId($member_Extar_id);

      if ($member){
        $person = $member->getPerson();

        if ($person instanceof Person) {
          if (strtolower($person->getLastName()) == strtolower($lastname) && $person->getZipcode() == $zipcode) {
            $this->forward('secure', 'createPassword');
          }else{
            $this->error_msg = 'Member External ID, Last Name or Zipcode doesn\'t match.';
          }
        }
      }else{
        $this->error_msg = 'Sorry! We haven\'t found matching record.';
      }
    }
    $this->executeRetrievePassword($request);
    $this->setTemplate('retrievePassword');
  }

  public function executeCreatePassword(sfWebRequest $request)
  {
    $form = new sfForm();
    $this->csrf_tag = $form['_csrf_token'];
  }

  public function executeNewPassword(sfWebRequest $request)
  {
    if ($request->isMethod('post')) {
      $request->checkCSRFProtection();

      $member_Extar_id = $request->getParameter('member_id2');
      $username        = $request->getParameter('usernamee');
      $password        = $request->getParameter('passwordd');
      $confirm         = $request->getParameter('corfirm_passwordd');
      $lastname        = $request->getParameter('lastname');
      $zipcode         = $request->getParameter('zipcode');

      $password_len = strlen($password);
      $required_len = sfConfig::get('app_password_minimum_length');

      # validate form
      if (strlen($username) > 0 && $password_len > 0 && strlen($confirm) > 0) {
        if ($password_len < $required_len) {
          $this->error_msg = 'Password must be at least '.$required_len.' characters';
        } else {
          if ($password == $confirm) {
            $member = MemberPeer::getByExternalId($member_Extar_id);
            if ($member){
              $person = $member->getPerson();

              if ($person instanceof Person) {
                if($person->getUsername() == null && $person->getUsername() == null){
                  $person->setUsername($username);
                  if($password == $confirm){
                    $person->setPassword($password);
                  }
                  $person->save();
                 
                  $this->signIn($person, $request);
                  $this->getUser()->setFlash('success', 'Your password has been successfully created!');                  
                  $this->redirect('/dashboard/index');
                }elseif($person->getLastName() == $lastname && $person->getZipcode() == $zipcode) {
                  if ($person->getUsername() == $username) {
                    # set new password
                    $person->setPassword($password);
                    $person->save();
                    $this->signIn($person, $request);
                    $this->getUser()->setFlash('success', 'Your password has been successfully changed!');
                    $this->redirect('@homepage');
                  }
                  else{
                    $this->error_msg = 'You typed incorrect username!';
                  }
                }elseif($person->getUsername() != null && $person->getUsername() != null){
                  $this->signIn($person, $request);
                  $this->getUser()->setFlash('success', 'Person has already username and password! Please use following form to login.If you forget password can renew it!');
                  $this->redirect('@login');
                }else{
                  # invalid hidden field info
                  $this->redirect('secure/retrievePassword');
                }
              }
              else{
                # invalid hidden field info
                $this->redirect('secure/retrievePassword');
              }
            }
            else{
              # invalid hidden field info
              $this->redirect('secure/retrievePassword');
            }
          }else{
            $this->error_msg = 'Passwords don\'t match!';
          }
        }
      }else{
        $this->error_msg = 'Please fill all fields!';
      }
    }
    $this->executeCreatePassword($request);
    $this->setTemplate('createPassword');
  }

  public function executeSecure(sfWebRequest $request)
  {
    // shows permission denied page
  }

  public function executeError404(sfWebRequest $request)
  {
    // shows not found error page
      
  }
}
