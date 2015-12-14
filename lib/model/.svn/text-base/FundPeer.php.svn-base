<?php

class FundPeer extends BaseFundPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $funds = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($funds as $fund)
    {
      $arr[$fund->getId()] = $fund->getFundDesc();
    }
    return $arr;
  }
}
