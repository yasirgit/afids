<?php

class RolePeer extends BaseRolePeer
{
  public static function getPager($max = 50, $page = 1)
  {
    $c = new Criteria();
    
    $c->addAscendingOrderByColumn(self::TITLE);
    
    $pager = new sfPropelPager('Role', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  /**
   * Returns all roles as an associated array
   * role_id => role_title
   * @return array
   */
  public static function getForSelect()
  {
    $role_list = self::doSelect(new Criteria());
    
    $roles = array();
    foreach ($role_list as $role){
      $roles[$role->getId()] = $role->getTitle();
    }
    
    return $roles;
  }

  /**
   * Finds Role by its title value
   * @return Role
   */
  public static function getByTitle($title)
  {
    $c = new Criteria();
    $c->add(self::TITLE, $title);
    return self::doSelectOne($c);
  }
}
