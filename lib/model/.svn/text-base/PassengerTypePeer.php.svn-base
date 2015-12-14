<?php

class PassengerTypePeer extends BasePassengerTypePeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);

    $types = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($types as $type)
    {
      $arr[$type->getId()] = $type->getName();
    }
    return $arr;
  }
}
