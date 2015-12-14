<?php

class ContactRequestPeer extends BaseContactRequestPeer
{
  /**
   * Searches contact requests
   * @param int $max Maximum contact per page
   * @param int $page
   * @return sfPropelPager
   */
  public static function getPager($max = 10, $page = 1, $grater_than_one = 0 )
  {
    $c = new Criteria();

    $c->add(self::PROCESSED, 0, Criteria::EQUAL);
    $c->addOr(self::PROCESSED, null, Criteria::ISNULL);
    if($grater_than_one) $c->add(ContactRequestPeer::REQUEST_DATE, 'ABS(DATEDIFF( NOW( \'Y-m-d\' ),'.ContactRequestPeer::REQUEST_DATE.') ) > 1', Criteria::CUSTOM);
    $c->addDescendingOrderByColumn(self::REQUEST_DATE);
    $pager = new sfPropelPager('ContactRequest', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
}
