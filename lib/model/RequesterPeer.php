<?php

class RequesterPeer extends BaseRequesterPeer
{
  public static function getForSelectParent()
  {
    $c= new Criteria();

    $requesters = self::doSelectJoinPerson($c);

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($requesters as $requester){
      $arr[$requester->getId()] = $requester->getPerson()->getName();
    }

    return $arr;
  }

  public static function getByPersonId($person_id){

    $c = new Criteria();

    $c->add(self::PERSON_ID,$person_id);
    $c->addDescendingOrderByColumn(self::TITLE);

    return self::doSelectOne($c);

  }

  public static function getPager(
  $max = 10,
  $page = 1,
  $firstname = null,
  $lastname = null,
  $city = null,
  $state = null,
  $agency_name = null  
  )
  {
    $c = new Criteria();

    $c->addJoin(PersonPeer::ID, self::PERSON_ID);
    $c->addJoin(self::AGENCY_ID, AgencyPeer::ID);

    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($city) $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
    if ($agency_name) $c->add(AgencyPeer::NAME, $agency_name.'%', Criteria::LIKE);    

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Requester', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getByFirstLetter($name)
  {
    $c = new Criteria();
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);

    $c->add(PersonPeer::LAST_NAME, $name.'%', Criteria::LIKE);

    $c->setLimit(25);
    return self::doSelect($c);
  }
  
  public static function getByFLSTATEZIP($lname,$fname,$state,$zip)
  {
    $c = new Criteria();
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);

    $c->add(PersonPeer::LAST_NAME, $lname.'%', Criteria::LIKE);
    $c->add(PersonPeer::FIRST_NAME,$fname.'%', Criteria::LIKE);
    $c->add(PersonPeer::STATE , $state.'%', Criteria::LIKE);
    $c->add(PersonPeer::ZIPCODE ,$zip.'%', Criteria::LIKE);

    return self::doSelectOne($c);
  }

  /**
   * Useful for autocompletes
   * @param string $keyword
   */
  public static function getByKeyword($keyword)
  {
    $con = Propel::getConnection(self::DATABASE_NAME);
    $c = new Criteria();
    $c->addJoin(self::AGENCY_ID, AgencyPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    $quoted = $con->quote("%$keyword%");
    $c1 = $c->getNewCriterion(PersonPeer::FIRST_NAME, "CONCAT(person.first_name, ' ', person.last_name) LIKE $quoted", Criteria::CUSTOM);
    $c2 = $c->getNewCriterion(self::TITLE, "%$keyword%", Criteria::LIKE);
    $c3 = $c->getNewCriterion(AgencyPeer::NAME, "%$keyword%", Criteria::LIKE);
    $c->add($c1->addOr($c2)->addOr($c3));
    $c->setLimit(25);
    return self::doSelectJoinAll($c);
  }

  public static function getByAgency($agency_id){
    $c = new Criteria();
    $c->add(self::AGENCY_ID, $agency_id);
    return self::doSelect($c);
  }
}
