<?php

class UserFilterPeer extends BaseUserFilterPeer
{
  public static function getByPersonId($perosn_id){
    $c = new Criteria();

    $c->add(self::PERSON_ID,$perosn_id,Criteria::LIKE);
    
    return self::doSelectOne($c);
  }
}
