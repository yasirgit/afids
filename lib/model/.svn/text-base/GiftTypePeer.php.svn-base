<?php

class GiftTypePeer extends BaseGiftTypePeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $types = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($types as $type)
    {
      $arr[$type->getId()] = $type->getGiftTypeDesc();
    }
    return $arr;
  }
}
