<?php

class AvailabilityPeer extends BaseAvailabilityPeer
{
  public static function getByMemberId($member_id){
    $c= new Criteria();
    
    $c->add(self::MEMBER_ID,$member_id,Criteria::LIKE);
    
    return self::doSelectOne($c);
  }
}
