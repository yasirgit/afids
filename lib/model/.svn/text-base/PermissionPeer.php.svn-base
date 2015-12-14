<?php

class PermissionPeer extends BasePermissionPeer
{
  public static function getPager($max = 50, $page = 1)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::TITLE);
    
    $pager = new sfPropelPager('Permission', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getForSelect()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::TITLE);
    $permission_list = self::doSelect($c);
    
    $permissions = array();
    foreach ($permission_list as $permission)
    {
      $permissions[$permission->getId()] = $permission->choiceText();
    }
    
    return $permissions;
  }
}
