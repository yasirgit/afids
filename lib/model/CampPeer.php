<?php

class CampPeer extends BaseCampPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $camp_name = null,
  $agency_name = null,
  $agency_city = null,
  $agency_state = null,
  $agency_country = null,
  $airport_ident = null,
  $airport_city = null,
  $airport_state = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::AGENCY_ID, AgencyPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::AIRPORT_ID , AirportPeer::ID,Criteria::LEFT_JOIN);

    if ($camp_name) $c->add(self::CAMP_NAME, $camp_name.'%', Criteria::LIKE);
    if ($agency_name) $c->add(AgencyPeer::NAME, $agency_name.'%', Criteria::LIKE);
    if ($agency_city) $c->add(AgencyPeer::CITY , $agency_city.'%', Criteria::LIKE);
    if ($agency_state) $c->add(AgencyPeer::STATE  , $agency_state.'%', Criteria::LIKE);

    if ($airport_ident) $c->add(AirportPeer::IDENT , $airport_ident.'%', Criteria::LIKE);
    if ($airport_city) $c->add(AirportPeer::CITY , $airport_city.'%', Criteria::LIKE);
    if ($airport_state) $c->add(AirportPeer::STATE , $airport_state.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(self::CAMP_NAME);

    $pager = new sfPropelPager('Camp', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByAirportId($airport_id){
    $c = new Criteria();

    $c->add(self::AIRPORT_ID ,$airport_id);
    $c->addAscendingOrderByColumn(self::CAMP_NAME);

    return self::doSelectOne($c);
  }

  public static function getByName($name)
  {
    $c = new Criteria();

    $c->add(self::CAMP_NAME, $name.'%', Criteria::LIKE);

    $c->setLimit(10);

    return self::doSelect($c);
  }

  public static function getForSelectParent()
  {
    $c= new Criteria();

    $c->add(self::CAMP_NAME,null,Criteria::NOT_EQUAL);

    $camps = self::doSelect($c);

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($camps as $camp)
    {
      if($camp->getCampName() != null){
        $arr[$camp->getId()] = $camp->getCampName();
      }
    }
    return $arr;
  }
}
