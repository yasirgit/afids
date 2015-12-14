<?php

/**
 * role_notification actions.
 *
 * @package    angelflight
 * @subpackage role_notification
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class role_notificationActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $test = RoleNotificationPeer::doSelect(new Criteria());
		
  }
  function executeDelrole(sfWebRequest $request)
  {
     if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }
    $c = new Criteria();
    $c->add(RoleNotificationPeer::ID, $request->getParameter('rnid'));
    RoleNotificationPeer::doDelete($c);	
    return $this->renderText($request->getParameter('rnid'));
  }
  
  public function getNotification($isEmail,$isNotification)
  {		
		if($isEmail=="true"&&$isNotification=="true")
		return "3";
		else if(($isEmail=="false")&&($isNotification=="true"))
		return "2";
		else if(($isEmail=="true")&&($isNotification=="false"))
		return "1";	
		else
		return "0";
  }
  
  function executeEditrole(sfWebRequest $request)
  {
       if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
        }
	$isEmail=$request->getParameter('isemail');
	$isInstrument=$request->getParameter('isinstrument');
	$roleId=$request->getParameter('roleid');	
	$notification=$this->getNotification($isEmail,$isInstrument);
	
	$c = new Criteria();	
	$c->add(RoleNotificationPeer::ID,$roleId);	
	$c->add(RoleNotificationPeer::NOTIFICATION,$notification);	
	$isUpdate=RoleNotificationPeer::doUpdate($c);
				
	
	return $this->renderText($isUpdate);	
	
  }  
  function executeAddrole(sfWebRequest $request)
  {	
	/*$c = new Criteria();
    $c->add(RoleNotificationPeer::ID, $request->getParameter('rnid'));
    RoleNotificationPeer::doDelete($c);	
	*/
       if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
        }
	$isEmail=$request->getParameter('isemail');
	$isInstrument=$request->getParameter('isinstrument');
	$roleId=$request->getParameter('roleid');
	$misType=$request->getParameter('mistype');
	$divname=$request->getParameter('divname');
		
	$c = new Criteria();
	$c->add(RoleNotificationPeer::ROLE_ID, $roleId);	
	$c->add(RoleNotificationPeer::MID, $misType);
	$role = RoleNotificationPeer::doSelect($c);
	$last_id="";
	if(count($role)==0)
	{
	  $rolenotification = new RoleNotification();
      $rolenotification->setMid($misType);
      $rolenotification->setRoleId($roleId);
      $rolenotification->setNotification($this->getNotification($isEmail,$isInstrument));
      $rolenotification->save();
	  $last_id = $rolenotification->getId();	 		
	}	
	
	if(strlen($last_id)>0)
	{
		$c = new Criteria();
		$c->add(RoleNotificationPeer::ID, $last_id);	
		$notification = RoleNotificationPeer::doSelectJoinAll($c);	
		foreach($notification as $nod)
		{
		/////////////////////////
			if($nod->getNotification()=="3")
			{
				$email="checked";
				$instnel="checked";
			}
			else if($nod->getNotification()=="2")
			{
				$email="";
				$instnel="checked";
			}
			else if($nod->getNotification()=="1")
			{
				$email="checked";
				$instnel="";
			}
			else
			{
				$email="";
				$instnel="";
			}
			
		/////////////////////////
		
		$str = '<div id="rolid'.$last_id.'">'
				.'<table><tr><td width="'.'200'.'">'
			   .$nod->getRole()->getTitle()
			   .'&nbsp;<span onclick="delRole('.$nod->getId().')" style="cursor:pointer;color:red;"><b>X</b></span>
							&nbsp;&nbsp;&nbsp;<span>'
				.'</td><td>'		
				.'<input name="isEmail" id="isEmail" value="1" type="checkbox" '.$email.' /> Email<input name="isInstrumental" id="isInstrumental" value="1" type="checkbox" '.$instnel.' /> Instrument Panel'
				.'<a href="#" class="link-edit" onclick="editrole('.$nod->getId().','.'"$divname"'.'); return false;" />Edit</a>'
				.'</td><tr></table>'
				.'</div>' 
				.'<div id="'.$divname.'">'				
			   .'</div>';	
		}
	return $this->renderText($str);	
	}		   	
	else
	return $this->renderText("1");	//1 for unsuccess
	
  }
}
