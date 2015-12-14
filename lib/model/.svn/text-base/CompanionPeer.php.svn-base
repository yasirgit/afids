<?php

class CompanionPeer extends BaseCompanionPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $firstname = null,
  $lastname = null,
  $name = null,
  $relationship = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::PASSENGER_ID, PassengerPeer::ID);
    $c->addJoin(PersonPeer::ID, PassengerPeer::PERSON_ID);

    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($name) $c->add(self::NAME, $name.'%', Criteria::LIKE);
    if ($relationship) $c->add(self::RELATIONSHIP, $relationship.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Companion', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByPassId($pass_id){
    $c = new Criteria();

    $c->add(self::PASSENGER_ID,$pass_id);

    return self::doSelect($c);

  }
  public static function getPassWeight($pass_id){
    $c = new Criteria();

    $c->add(self::PASSENGER_ID,$pass_id,Criteria::LIKE);

    $companions = self::doSelect($c);
    $weight = 0;

    foreach ($companions as $companion)
    {
      $weight = $weight + $companion->getWeight();
    }
    return $weight;
  }
  
  public static function getPassCount($pass_id){
    $c = new Criteria();

    $c->add(self::PASSENGER_ID,$pass_id,Criteria::LIKE);

    return self::doCount($c);
  }
}
