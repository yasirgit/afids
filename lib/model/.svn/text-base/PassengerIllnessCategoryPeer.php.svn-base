<?php

class PassengerIllnessCategoryPeer extends BasePassengerIllnessCategoryPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::CATEGORY_DESCRIPTION);

    $illness = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($illness as $ill)
    {
      $arr[$ill->getId()] = $ill->getCategoryDescription();
    }
    return $arr;
  }
}
