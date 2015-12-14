<?php

class AffiliationPeer extends BaseAffiliationPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::DESCRIPTION);

    $affs = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($affs as $aff)
    {
      $arr[$aff->getId()] = $aff->getDescription();
    }
    return $arr;
  }
}
