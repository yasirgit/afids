<?php

class ContactTypePeer extends BaseContactTypePeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);
    $c->addAscendingOrderByColumn(self::CONTACT_TYPE_DESC);

    $types = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($types as $type)
    {
      $arr[$type->getId()] = $type->getContactTypeDesc();
    }
    return $arr; 
  }

}
