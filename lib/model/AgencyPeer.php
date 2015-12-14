<?php

class AgencyPeer extends BaseAgencyPeer
{
  public static function getForSelectParent()
  { 
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::NAME);
    
    $agencies = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($agencies as $agency)
    {
      $arr[$agency->getId()] = $agency->getName();
    }
    return $arr;
  }

  public static function getNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::NAME);

    $agencies = self::doSelect($c);
    $arr = array();

    foreach ($agencies as $agency)
    {
      $arr[$agency->getId()] = $agency->getName();
    }
    return $arr;
  }

  public static function getCounties(){

    $c =  new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::NAME);

    $agencies = self::doSelect($c);

    $arr = array();

    foreach ($agencies as $agency){
      $arr[$agency->getCountry()] = $agency->getCountry();
    }
    return $arr;

  }

  public static function getPager(
  $max = 10,
  $page = 1,
  $name = null,
  $city = null,
  $state = null,
  $country = null
  )
  {
    $c = new Criteria();

    if ($name) $c->add(self::NAME, $name.'%', Criteria::LIKE);
    if ($city) $c->add(self::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(self::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(self::COUNTRY, $country.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(self::NAME);

    $pager = new sfPropelPager('Agency', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  public static function getByNamePhone($name=null,$phone=null){
    $c =  new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::NAME);

    $c->add(self::NAME,$name);
    if ($phone) $c->add(self::PHONE,$phone);

    return self::doSelectOne($c);

  }

  public static function getByFirstLetter($name)
  {
    $c = new Criteria();

    $c->add(self::NAME, $name.'%', Criteria::LIKE);

    $c->setLimit(10);

    return self::doSelect($c);
  }
  public static function getByName($name)
  {
    $c = new Criteria();

    $c->add(self::NAME, $name.'%', Criteria::LIKE);

    return self::doSelectOne($c);
  }
}
