<?php

/**
 * permission actions.
 *
 * @package    angelflight
 * @subpackage permission
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class permissionActions extends sfActions
{
  /**
   * CODE: role_permission
   */
  public function preExecute()
  { 
    
  }

  /**
   * Displays paginated rights
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->executeList($request);
  }

  /**
   * Removes a right and redirects to index
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($permission = PermissionPeer::retrieveByPk($request->getParameter('id')), sprintf('Object permission does not exist (%s).', $request->getParameter('id')));
    $permission->delete();

    $this->redirect('permission/index');
  }

  /**
   * Saves new or update role. Echoes error/success message
   */
  public function executeSave(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    if ($id) {
      $role = PermissionPeer::retrieveByPK($id);
      if (!($role instanceof Permission)) return $this->renderText('<span style="color:red;">Right not found or is removed!</span>');
      $form = new PermissionForm($role);
    } else {
      $form = new PermissionForm();
    }
    
    unset($form['_csrf_token']);
    
    $form->bind($request->getPostParameters());
    if ($form->isValid()) {
      $form->save();
      return $this->renderText('Right has been successfully saved!');
    }else{
      echo 'e1'; # has error
      echo '<span style="color:red;">';
      $i = 0;
      if ($form['title']->hasError()) { echo $form['title']->getError()->getMessage(); $i++;}
      if ($form['code']->hasError()) { if ($i) echo '<br/>'; echo $form['code']->getError()->getMessage(); }
      echo '</span>';
    }
    return sfView::NONE;
  }
  
  /**
   * AJAX, Lists paginated rights
   */
  public function executeList(sfWebRequest $request)
  {
    $params = $this->getUser()->getAttribute('permission', array(), 'person');
    
    $max_array = array(5, 10, 30, 50, 70, 100);
    
    if (in_array($request->getParameter('max'), $max_array)) {
      $max = $request->getParameter('max');
    }else{
      if (isset($params['max'])) {
        $max = $params['max'];
      }else{
        $max = sfConfig::get('app_max_permission_per_page', 50);
      }
    }
    
    $this->page = $page = $request->getParameter('page', 1);
    $this->max_array = array_combine($max_array, $max_array);
    $this->max = $params['max'] = $max;
    $this->pager = PermissionPeer::getPager($max, $page);
    $this->permission_list = $this->pager->getResults();
    
    $this->getUser()->setAttribute('permission', $params, 'person');
  }
}
