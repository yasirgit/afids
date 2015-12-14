<?php

class myUser extends sfBasicSecurityUser
{
  private $rights;

  public function getId()
  {
    return $this->getAttribute('id', 0, 'person');
  }

  public function getPilotId()
  {
    return $this->getAttribute('pilot_id', 0, 'person');
  }

  public function getMemberId()
  {
    return $this->getAttribute('member_id', 0, 'person');
  }
  
  public function getUsername()
  {
    return $this->getAttribute('username', '', 'person');
  }

  public function getLastname()
  {
    return $this->getAttribute('lastname', '', 'person');
  }

  public function getFirstname()
  {
    return $this->getAttribute('firstname', '', 'person');
  }

  /**
   * Returns fullname of user
   * @return string
   */
  public function getName()
  {
    return $this->getFirstname().' '.$this->getLastname();
  }
  
  public function isFirstRequest($boolean = null)
  {
    if (is_null($boolean))
    {
      return $this->getAttribute('first_request', true);
    }
    else
    {
      $this->setAttribute('first_request', $boolean);
    }
  }

  /**
   * Adds history to the session. Limits to 5
   * It makes sure new item is not in the list
   * @param string $text
   * @param string $item
   * @param string $uri Will be used for url_for or link_to functions
   */
  public function addRecentItem($text, $item, $uri)
  {
    $recent_items_new=array();
    $recent_items = $this->getAttribute('recent_items', array(), 'person');
    foreach ($recent_items as $recent_item){
      if ($uri == $recent_item[2]){
        unset ($recent_item);
      }else{
        $recent_items_new[] = $recent_item;
      }
    }
    $recent_items=$recent_items_new;
    if (count($recent_items) >= 5) array_shift($recent_items);
    $recent_items[] = array($text, $item, $uri);
    $this->setAttribute('recent_items', $recent_items, 'person');
  }

  public function getRecentItems()
  {
    return $this->getAttribute('recent_items', array(), 'person');
  }
  
  /**
   * Checks if the user has given rights
   * If admin it always returns true
   * @param array $rights Array of right codes
   * @param bool $and Set this to false for at least one role matches 
   * @return bool
   */
  public function hasRights($rights, $and = true)
  {
    if (!is_array($rights)) $rights = array($rights);
    $rights = array_unique($rights);

    if (in_array('@admin', array_map('strtolower', $this->listCredentials()))) return true;
    
    $n = array_intersect($rights, $this->getRightInstance());
    if ($and === true) return count($n) == count($rights);
    
    return $n > 0;
  }
  
  private function getRightInstance()
  {
    if (!is_array($this->rights)) {
      $credentials = $this->listCredentials();
      
      $c = new Criteria();
      $c->addJoin(RolePeer::ID, RolePermissionPeer::ROLE_ID, Criteria::LEFT_JOIN);
      $c->addJoin(RolePermissionPeer::PERMISSION_ID, PermissionPeer::ID, Criteria::LEFT_JOIN);
      $c->add(RolePeer::TITLE, $credentials, Criteria::IN);
      $c->addGroupByColumn(PermissionPeer::ID);
      $permissions = PermissionPeer::doSelect($c);
      $this->rights = array();
      foreach ($permissions as $permission) {
        $this->rights[] = $permission->getCode(); 
      }
    }
    
    return $this->rights;
  }
  
}
