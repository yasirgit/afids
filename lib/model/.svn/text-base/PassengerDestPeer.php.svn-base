<?php

class PassengerDestPeer extends BasePassengerDestPeer
{
  public static function getFacility($name,$passenger_id)
  {
    $c = new Criteria();
    $c->addJoin(self::PASSENGER_ID, PassengerPeer::ID, Criteria::INNER_JOIN);
    $c->add(self::PASSENGER_ID, $passenger_id);
    $name = mysql_escape_string($name);
    $c->clearSelectColumns();
    $c->addSelectColumn(self::FACILITY);
    $c->add(self::FACILITY, '%'.$name.'%', Criteria::LIKE);
    $c->setDistinct();
    $c->setLimit(10);

    return self::doSelectStmt($c);
  }

  public static function getLodging($name,$passenger_id)
  {
    $c = new Criteria();
    $c->addJoin(self::PASSENGER_ID, PassengerPeer::ID, Criteria::INNER_JOIN);
    $c->add(self::PASSENGER_ID, $passenger_id);
    $name = mysql_escape_string($name);
    $c->clearSelectColumns();
    $c->addSelectColumn(self::LODGING);
    $c->add(self::LODGING, '%'.$name.'%', Criteria::LIKE);
    $c->setDistinct();
    $c->setLimit(10);

    return self::doSelectStmt($c);
  }

  public static function getFacilityByPassengerId($passenger_id, $facility){
    $c = new Criteria();
    $c->add(self::PASSENGER_ID, $passenger_id);

    $c->add(self::FACILITY, '%'.$facility.'%', Criteria::LIKE);
    
    return self::doSelectOne($c);
  }

  public static function getLodgingByPassengerId($passenger_id, $lodging){
    $c = new Criteria();
    $c->add(self::PASSENGER_ID, $passenger_id);
    $c->add(self::LODGING, '%'.$lodging.'%', Criteria::LIKE);

    return self::doSelectOne($c);
  }
}
