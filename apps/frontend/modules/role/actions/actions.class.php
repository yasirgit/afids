<?php

/**
 * role actions.
 *
 * @package    angelflight
 * @subpackage role
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class roleActions extends sfActions
{
  /**
   * CODE: role_permission
   */
  public function preExecute()
  {
    
  }

  /**
   * Displays list of roles
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->executeList($request);
  }

  /**
   * Removes a role by id
   */
  public function executeDelete(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }
    $request->checkCSRFProtection();

    $this->forward404Unless($role = RolePeer::retrieveByPk($request->getParameter('id')), sprintf('Object role does not exist (%s).', $request->getParameter('id')));

    $fixed_roles = sfConfig::get('app_default_roles', array());
    $fixed_roles = array();
    $fixed_roles = array_map('strtolower', $fixed_roles);
    if (in_array(strtolower($role->getTitle()), $fixed_roles)) {
      $this->getUser()->setFlash('warning', 'Role "'.$role->getTitle().'" is fixed role.Unable to delete!');
    }else{
      $role->delete();
      $this->getUser()->setFlash('success', 'Role "'.$role->getTitle().'" have successfully deleted!');
    }

    $this->redirect('role/index');
  }

  /**
   * Saves new or update role. Echoes error/success message
   */
  public function executeSave(sfWebRequest $request)
  {
    if( !$this->getUser()->hasCredential(array('Administrator'), false)){
             $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
             $this->redirect('dashboard/index');
    }
    $id = $request->getParameter('id');
    if ($id) {
      $role = RolePeer::retrieveByPK($id);
      if (!($role instanceof Role)) return $this->renderText('<span style="color:red;">Role not found or is removed!</span>');
      $form = new RoleForm($role);
    } else {
      $form = new RoleForm();
    }
      
    unset($form['_csrf_token']);
    
    $form->bind($request->getPostParameters());
    if ($form->isValid()) {
      $form->save();
      return $this->renderText('Role has been successfully saved!');
    }else{
      # FIXME display other field errors
      echo 'e1'; # has error
      echo '<span style="color:red;">'.$form['title']->getError()->getMessage().'</span>';
    }
    return sfView::NONE;
  }
  
  /**
   * AJAX, Lists paginated roles
   */
  public function executeList(sfWebRequest $request)
  {
    $this->fixDefaultRoles();

    $params = $this->getUser()->getAttribute('role', array(), 'person');
    
    $max_array = array(5, 10, 30, 50, 70, 100);
    
    if (in_array($request->getParameter('max'), $max_array)) {
      $max = $request->getParameter('max');
    }else{
      if (isset($params['max'])) {
        $max = $params['max'];
      }else{
        $max = sfConfig::get('app_max_role_per_page', 50);
      }
    }
    
    $this->page = $page = $request->getParameter('page', 1);
    $this->max_array = $max_array;
    $this->max = $params['max'] = $max;
    $this->pager = RolePeer::getPager($max, $page);
    $this->role_list = $this->pager->getResults();
    
    $this->getUser()->setAttribute('role', $params, 'person');
  }

  /**
   * Fixes default roles for the Application
   * If must have roles don't exist it tries to create them
   */
  protected function fixDefaultRoles()
  {
    $role_names = sfConfig::get('app_default_roles', array());

    $c = new Criteria();
    $c->add(RolePeer::TITLE, $role_names, Criteria::IN);
    $roles = RolePeer::doSelect($c);

    $lower_names = array_map('strtolower', $role_names);
    foreach ($roles as $role) {
      $key = array_search(strtolower($role->getTitle()), $lower_names);
      if ($key !== false) unset($role_names[$key]);
    }
    unset($roles);

    if (count($role_names)) {
      foreach ($role_names as $name) {
        $role = new Role();
        $role->setTitle($name);
        $role->save();
      }

      $this->getUser()->setFlash('warning', 'Roles have recovered: '.implode(', ', $role_names));
    }
  }
}
