<?php

class FboPeer extends BaseFboPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $fbo_name = null,
  $discount = null,
  $default = null,
  $ident = null,
  $name = null,
  $city = null,
  $state = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::AIRPORT_ID,AirportPeer::ID);

    if ($fbo_name) $c->add(self::NAME , '%'.$fbo_name.'%', Criteria::LIKE);
    if ($discount) $c->add(self::FUEL_DISCOUNT, '%'.$discount.'%', Criteria::LIKE);
    if ($default) $c->add(self::FUEL_DISCOUNT, '%'.$discount.'%', Criteria::LIKE);
    if ($ident) $c->add(AirportPeer::IDENT, $ident.'%', Criteria::LIKE);
    if ($name) $c->add(AirportPeer::NAME, $name.'%', Criteria::LIKE);
    if ($city) $c->add(AirportPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(AirportPeer::STATE, $state.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(self::NAME);

    $pager = new sfPropelPager('Fbo', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getByAirportId($airport_id){
    $c = new Criteria();

    $c->add(self::AIRPORT_ID ,$airport_id);
    $c->addAscendingOrderByColumn(self::NAME);

    return self::doSelectOne($c);
  }

  public static function getByAirportIdSelectAll($airport_id){
    $c = new Criteria();

    $c->add(self::AIRPORT_ID ,$airport_id);
    $c->addAscendingOrderByColumn(self::NAME);

    return self::doSelect($c);
  }

}
