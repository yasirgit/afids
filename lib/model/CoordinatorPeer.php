<?php

class CoordinatorPeer extends BaseCoordinatorPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $firstname = null,
  $lastname = null,
  $city = null,
  $state = null,
  $country = null,
  $coor_of_week = null
  )
  {
    $c = new Criteria();

    $c->addJoin(self::MEMBER_ID, MemberPeer::ID);
    $c->addJoin(PersonPeer::ID, MemberPeer::PERSON_ID);

    if ($firstname) $c->add(PersonPeer::FIRST_NAME, $firstname.'%', Criteria::LIKE);
    if ($lastname) $c->add(PersonPeer::LAST_NAME, $lastname.'%', Criteria::LIKE);
    if ($city) $c->add(PersonPeer::CITY, $city.'%', Criteria::LIKE);
    if ($state) $c->add(PersonPeer::STATE, $state.'%', Criteria::LIKE);
    if ($country) $c->add(PersonPeer::COUNTRY, $country.'%', Criteria::LIKE);
    if ($coor_of_week) $c->add(self::COOR_OF_THE_WEEK, $coor_of_week.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(PersonPeer::FIRST_NAME);

    $pager = new sfPropelPager('Coordinator', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getByMemberId($m_id){

    $c = new Criteria();

    $c->add(self::MEMBER_ID ,$m_id);

    return self::doSelectOne($c);
  }

  public static function getForSelectParent()
  {
    $c= new Criteria();

    $c->addJoin(self::MEMBER_ID, MemberPeer::ID);
    $c->addJoin(MemberPeer::PERSON_ID, PersonPeer::ID);
    $c->add(PersonPeer::ID, null, Criteria::ISNOTNULL);
    
    $coors = self::doSelectJoinMember($c);

    $arr = array();
    $arr[0] = '-- select --';

    foreach ($coors as $coor)
    {
      $arr[$coor->getId()] = $coor->getMember()->getPerson()->getName();
    }
    return $arr;
  }

}
