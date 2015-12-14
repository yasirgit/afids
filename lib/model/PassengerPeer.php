<?php

class PassengerPeer extends BasePassengerPeer
{
  public static function getForSelectParent()
  {
    $c= new Criteria();
    $passengers = PassengerPeer::doSelectJoinPerson($c);
    $arr = array();
    $arr[0] = '-- select --';
    foreach ($passengers as $passenger){
      $arr[$passenger->getId()] = $passenger->getPerson()->getName();
    }
    return $arr;
  }

  public static function getByPersonId($person_id){

    $c = new Criteria();

    $c->add(self::PERSON_ID,$person_id);
    $c->addDescendingOrderByColumn(self::PARENT);

    return self::doSelectOne($c);
  }
  
  public static function getByFirstLetterFacility($keyword)
  {
    $c = new Criteria();

    if($keyword)$c->add(self::FACILITY_NAME, $keyword.'%', Criteria::LIKE);
    $c->setLimit(25);
    return self::doSelect($c);
  }
  public static function getByFirstLetterLodging($keyword)
  {
    $c = new Criteria();

    if($keyword)$c->add(self::LODGING_NAME, $keyword.'%', Criteria::LIKE);
    $c->setLimit(25);
    return self::doSelect($c);
  }
  /**
   * Searches passengers by some criteria
   * @param int $max Maximum people per page
   * @param int $page
   * @return sfPropelPager
   */
  public static function getPager(
  $max = 10,
  $page = 1,
  $firstname = null,
  $lastname = null,
  $city = null,
  $state = null,
  $country = null,
  $county = null,
  $exclude_ids = array()
  )
  {
    $c = new Criteria();

    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);

    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname)  $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($city) $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(PersonPeer::COUNTRY, $country.'%', Criteria::LIKE);
    if ($county) $c->add(PersonPeer::COUNTY, $county.'%', Criteria::LIKE);

    if (!empty($exclude_ids)) $c->add(self::ID, $exclude_ids, Criteria::NOT_IN);

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Passenger', $max);
    $pager->setPeerMethod('doSelectJoinPerson');
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getFLName(

  $firtsname=null,
  $lastname=null
  ){
    $c = new Criteria();

    $c->addJoin(self::PERSON_ID,PersonPeer::ID,Criteria::LEFT_JOIN);
    if($firtsname)$c->add(PersonPeer::FIRST_NAME ,$firtsname.'%',Criteria::LIKE);
    if($lastname)$c->add(PersonPeer::LAST_NAME ,$lastname.'%',Criteria::LIKE);

    return self::doSelect($c);
  }

  public static function getByFirstLetter($fname,$lname)
  {
    $c = new Criteria();
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);

    if($fname)$c->add(PersonPeer::FIRST_NAME, $fname.'%', Criteria::LIKE);
    if($lname)$c->add(PersonPeer::LAST_NAME, $lname.'%', Criteria::LIKE);

    return self::doSelect($c);
  }
  public static function getByFLSTATEZIP($lname,$fname,$state,$zip)
  {
    $c = new Criteria();
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);

    $c->add(PersonPeer::LAST_NAME, $lname.'%', Criteria::LIKE);
    $c->add(PersonPeer::FIRST_NAME, $fname.'%', Criteria::LIKE);
    $c->add(PersonPeer::STATE , $state.'%', Criteria::LIKE);
    $c->add(PersonPeer::ZIPCODE ,$zip.'%', Criteria::LIKE);

    return self::doSelectOne($c);
  }

  /**
   * Very useful for autocompletes
   * 
   */
  public static function getByName($name)
  {
    $c = new Criteria();
    $con = Propel::getConnection(self::DATABASE_NAME);
    $name = $con->quote("%$name%");
    $c->addJoin(self::PERSON_ID, PersonPeer::ID, Criteria::LEFT_JOIN);
    $c->add(PersonPeer::FIRST_NAME, "CONCAT(person.first_name, ' ', person.last_name) LIKE $name", Criteria::CUSTOM);
    //$c->add(PersonPeer::LAST_NAME, $name.'%' , Criteria::LIKE);
    $c->setDistinct();
    $c->setLimit(30);
    return self::doSelectJoinPerson($c);
  }

  
}
