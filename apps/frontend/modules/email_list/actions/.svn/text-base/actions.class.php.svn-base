<?php

/**
 * email_list actions.
 *
 * @package    angelflight
 * @subpackage email_list
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class email_listActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    #security
    if( !$this->getUser()->hasCredential(array('Administrator', 'Staff','Member'), false)){
          $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getUri());
          $this->redirect('dashboard/index');
    }
    $this->email_lists = EmailListPeer::doSelect(new Criteria());
    $this->role_widget = new sfWidgetFormPropelChoiceMany(array('model' => 'Role', 'method' => 'getTitle'));
  }

  public function executeAjaxSavePrivate(sfWebRequest $request)
  {
    $email_list = EmailListPeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($email_list);
    $email_list->setIsPrivate($request->getParameter('value'));
    $email_list->save();

    return $this->renderText($email_list->getId());
  }
  
  public function executeAjaxSubscribe(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $list_id = $request->getParameter('list_id');
    $email_list_person = new EmailListPerson();
    $email_list_person->setPersonId($id);
    $email_list_person->setListId($list_id);
    if (EmailListPersonPeer::doCount($email_list_person->buildCriteria())) {
      // what is this going to do?
    }else{
      $email_list_person->save();
    }
    
    return $this->renderText($id);
  }

  public function executeAjaxSaveRoles(sfWebRequest $request)
  {
    $email_list = EmailListPeer::retrieveByPK($request->getParameter('email_list_id'));
    $this->forward404Unless($email_list);

    $roles = $request->getParameter('roles');

    $c = new Criteria();
    $c->add(EmailListRolePeer::LIST_ID, $email_list->getId());
    EmailListRolePeer::doDelete($c);

    foreach ($roles as $id) {
      $email_list_role = new EmailListRole();
      $email_list_role->setRoleId($id);
      $email_list_role->setListId($email_list->getId());
      $email_list_role->save();
    }

    $this->email_list = $email_list;
  }
}
