<?php

class TeamNotePeer extends BaseTeamNotePeer
{
  /**
   * Get TeamNote objects by given role ids.
   * @param array|int $role_ids Accepts non-array
   * @return array Array of TeamNote objects
   */
  public static function getByRoleIds($role_ids)
  {
    if (!is_array($role_ids)) $role_ids = array($role_ids);

    $c = new Criteria();
    $c->add(self::ROLE_ID, $role_ids, Criteria::IN);
    $c->addDescendingOrderByColumn(self::ROLE_ID);

    return self::doSelectJoinRole($c);
  }

  public static function getTeamNote(){
    $c = new Criteria();
    //$c->add(self::ROLE_ID, $id);
    return self::doSelectJoinRole($c);
  }
}
