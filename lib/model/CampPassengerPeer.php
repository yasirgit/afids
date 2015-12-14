<?php

class CampPassengerPeer extends BaseCampPassengerPeer
{
  public static function getByCampId($camp_id)
  {
    $c = new Criteria();
    $c->add(self::CAMP_ID, $camp_id);
    return self::doSelectJoinPassenger($c);
  }  
}
