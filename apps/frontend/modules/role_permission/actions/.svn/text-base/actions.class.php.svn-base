<?php

/**
 * role_permission actions.
 *
 * @package    angelflight
 * @subpackage role_permission
 * @author     Ariunbayar
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class role_permissionActions extends sfActions
{
  /**
   * CODE: role_permission
   */
  public function preExecute()
  {
    
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(RolePeer::TITLE);
    $this->role_list = RolePeer::doSelect($c);
    $this->getUser()->addRecentItem('Role', 'role', 'role_permission/index');
    //search for role - from sidebar
    $this->search = null;
    $c = new Criteria();
    $search = $request->getParameter('search_by');
    if(isset($search)){
        $c->add(RolePeer::TITLE, '%'.$search.'%', Criteria::LIKE);
    }

    $objects = RolePeer::doSelect($c);
    if($objects){
        $this->search = $objects[0];
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->role = RolePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->role);
    
    # get all rights
    $permissions = PermissionPeer::getForSelect();
    
    # get assigned rights
    $rp_list = RolePermissionPeer::getByRoleId($this->role->getId());
    $assoc_perms = array();
    foreach ($rp_list as $rp) $assoc_perms[] = $rp->getPermissionId();
    $this->assoc_perms = $assoc_perms;
    
    # prepare widget
    $this->widget = new sfWidgetFormSelectDoubleList(array(
      'choices' => $permissions,
      'label_unassociated'=> 'Full List',
      'label_associated'  => 'Rights Assigned to Role',
      'class'             => 'security',
      'associate'         => 'lt;',
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
  }
  
  public function executeSave(sfWebRequest $request)
  {
    $role = RolePeer::retrieveByPK($request->getParameter('id'));
    $this->forward404Unless($role);
    
    $perms = $request->getParameter('permissions');
    if (!is_array($perms)) $perms = array();
    
    # remove rights
    $c = new Criteria();
    $c->add(RolePermissionPeer::ROLE_ID, $role->getId());
    RolePermissionPeer::doDelete($c);
    
    # save new rights
    foreach ($perms as $perm) {
      $role_permission = new RolePermission();
      $role_permission->setPermissionId($perm);
      $role_permission->setRoleId($role->getId());
      $role_permission->save();
    }
    
    return $this->renderText('Rights for \''.$role->getTitle().'\' have successfully saved!');
  }
  #bglobal-omar
  function executeNotification(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(RolePeer::TITLE);
    $this->role_list = RolePeer::doSelect($c);
	/////////////////////////////////////////
	$c = new Criteria();
	$c->addAscendingOrderByColumn(RoleNotificationPeer::MID);
	$this->notification_list = RoleNotificationPeer::doSelectJoinAll($c);
	//////////////////////////////////////////
  }
}
