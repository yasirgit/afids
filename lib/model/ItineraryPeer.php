<?php

class ItineraryPeer extends BaseItineraryPeer
{
  public static function getByMissReqId($request_id){
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::MISSION_REQUEST_ID);

    $c->add(self::MISSION_REQUEST_ID,$request_id);

    self::doSelectOne($c);
  }

  public static function getByOwnIDName($id=null,$name=null){

    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::PASSENGER_ID);
    $c->addJoin(self::PASSENGER_ID,PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(PassengerPeer::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);

    if($id !=null ||  $name !=null){
      $criterion = $c->getNewCriterion(self::ID, $id, Criteria::LIKE);
      $criterion->addOr($c->getNewCriterion(PersonPeer::LAST_NAME, $name, Criteria::LIKE));
      $c->add($criterion);
    }
    return self::doSelectOne($c);
  }

  public static function getPager(
  $max = 10,
  $page = 1,
  $date_req = null,
  $pass_name = null,
  $req_name = null,
  $pass_lname = null,
  $req_lname = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::PASSENGER_ID, PassengerPeer::ID,Criteria::LEFT_JOIN);
    $c->addJoin(self::REQUESTER_ID, RequesterPeer::ID,Criteria::LEFT_JOIN);

    $c->addJoin(PassengerPeer::PERSON_ID, PersonPeer::alias('c1', PersonPeer::ID), Criteria::LEFT_JOIN);
    $c->addJoin(RequesterPeer::PERSON_ID, PersonPeer::alias('c2', PersonPeer::ID), Criteria::LEFT_JOIN);

    $c->addAlias('c1', PersonPeer::TABLE_NAME);
    $c->addAlias('c2', PersonPeer::TABLE_NAME);

    if ($date_req) $c->add(self::DATE_REQUESTED, '%'.date('Y-m-d', strtotime($date_req)).'%', Criteria::LIKE);

    if($pass_name)$c->add(PersonPeer::alias("c1", PersonPeer::FIRST_NAME), $pass_name.'%', Criteria::LIKE);
    if($req_name)$c->add(PersonPeer::alias("c2", PersonPeer::FIRST_NAME), $req_name.'%', Criteria::LIKE);
    if($pass_lname)$c->add(PersonPeer::alias("c1", PersonPeer::LAST_NAME), $pass_lname.'%', Criteria::LIKE);
    if($req_lname)$c->add(PersonPeer::alias("c2", PersonPeer::LAST_NAME), $req_lname.'%', Criteria::LIKE);

    
    $c->addAscendingOrderByColumn(self::DATE_REQUESTED);

    $pager = new sfPropelPager('Itinerary', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    
    return $pager;
  }
}
