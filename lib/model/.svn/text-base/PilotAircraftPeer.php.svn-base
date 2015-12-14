<?php

class PilotAircraftPeer extends BasePilotAircraftPeer
{
  public static function getByMemberId($mem_id, $peer = 'doSelect')
  {
    $c = new Criteria();

    $c->add(self::MEMBER_ID,$mem_id);
    $c->addAscendingOrderByColumn(self::N_NUMBER);

    return self::$peer($c);
  }
  public static function getByAircraftId($aircraft_id){
    $c = new Criteria();

    $c->add(self::AIRCRAFT_ID,$aircraft_id);
    $c->addAscendingOrderByColumn(self::N_NUMBER);

    return self::doSelectOne($c);

  }
  //Farazi Get Air Craft By member Id
  public static function getByAircraftIdMemberId($aircraft_id, $member_id = null){
    $c = new Criteria();
    $c->add(self::AIRCRAFT_ID,$aircraft_id);
    $c->add(self::MEMBER_ID,$member_id);
    $c->addAscendingOrderByColumn(self::N_NUMBER);
    return self::doSelectOne($c);
  }

  public static function getHasPrimary(){
    $c = new Criteria();

    $c->add(self::PRIMARY,null,Criteria::ISNOTNULL);

    return self::doSelect($c);
  }

  public static function getPrimary($member_id){
    $c = new Criteria();

    $c->add(self::PRIMARY,0,Criteria::NOT_LIKE);
    $c->add(self::MEMBER_ID,$member_id);

    return self::doSelectOne($c);
  }
}
