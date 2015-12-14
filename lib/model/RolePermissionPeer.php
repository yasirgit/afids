<?php

class RolePermissionPeer extends BaseRolePermissionPeer
{
  public static function getByRoleId($role_id)
  {
    $c = new Criteria();
    $c->add(self::ROLE_ID, $role_id);
    
    return self::doSelect($c);
  }
}
