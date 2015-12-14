<?php

class AfaOrgPeer extends BaseAfaOrgPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $name = null,
  $phone = null,
  $fax = null
  )
  {
    $c = new Criteria();

    if ($name) $c->add(self::NAME , '%'.$name.'%', Criteria::LIKE);
    if ($phone) $c->add(self::ORG_PHONE , '%'.$phone.'%', Criteria::LIKE);
    if ($fax) $c->add(self::ORG_FAX , '%'.$fax.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(self::NAME);

    $pager = new sfPropelPager('AfaOrg', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
}
