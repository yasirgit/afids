<?php

class RefSourcePeer extends BaseRefSourcePeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::SOURCE_NAME);

    $sources = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($sources as $source)
    {
      $arr[$source->getId()] = $source->getSourceName();
    }
    return $arr;
  }
}
