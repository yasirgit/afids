<?php
class EventPeer extends BaseEventPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $event_name = null,
  $event_date = null,
  $event_time = null,
  $location = null
  )
  {
    $c = new Criteria();

    if ($event_name) $c->add(self::EVENT_NAME, $event_name.'%', Criteria::LIKE);
    if ($event_date) $c->add(self::EVENT_DATE, $event_date.'%', Criteria::LIKE);
    if ($event_time) $c->add(self::EVENT_TIME, $event_time.'%', Criteria::LIKE);
    if ($location) $c->add(self::LOCATION, $location.'%', Criteria::LIKE);

    $c->addDescendingOrderByColumn(self::EVENT_DATE);

    $pager = new sfPropelPager('Event', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

  public static function getCalendarPager( $max = 10, $page = 1, $wing = 0 )
  {
    $c = new Criteria();    
    if ($wing) {
        $c->addJoin(self::ID, EventWingsPeer::EVENT_ID);
        $c->add(EventWingsPeer::WING_ID, $wing ,Criteria::EQUAL);
    }
    $c->addDescendingOrderByColumn(self::EVENT_DATE);
    $pager = new sfPropelPager('Event', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getsignupPager( $max = 10, $page = 1, $member_id )
  {
    $date = date('Y-m-d');
    $c = new Criteria();
    $c->add(EventReservationPeer::MEMBER_ID,$member_id,  Criteria::EQUAL);
    $c->addJoin(EventPeer::ID, EventReservationPeer::EVENT_ID);
    $c->add(EventPeer::EVENT_DATE, $date , Criteria::GREATER_EQUAL);    
    $c->addAscendingOrderByColumn(self::EVENT_DATE);
    $pager = new sfPropelPager('Event', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }

}
