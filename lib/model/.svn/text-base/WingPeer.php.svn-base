<?php

class WingPeer extends BaseWingPeer
{
  public static function getForSelectParentNew()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);
    $c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    return self::doSelect($c);
   
  }

  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);
    $c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    $wings = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($wings as $wing)
    {
      $arr[$wing->getId()] = $wing->getName();
    }
    return $arr;
  }

  public static function getNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);
    $c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    $wings = self::doSelect($c);
    $arr = array();

    foreach ($wings as $wing)
    {
      $arr[$wing->getName()] = $wing->getName();
    }
    return $arr;
  }
  
  public static function getOnlyNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::NAME);
    $c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    $wings = self::doSelect($c);
    $arr = array();

    foreach ($wings as $wing)
    {
      $arr[$wing->getName()] = $wing->getName();
    }
    return $arr;
  }
  public static function getResionServedNames($name)
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::NAME);
    $c->add(self::NAME, '%'.$name.'%', Criteria::LIKE);
    $wings = self::doSelect($c);
    $arr = array();
    foreach ($wings as $wing)
    {
      $arr[$wing->getName()] = $wing->getName();
    }
    return $arr;
  }

  public static function getByName($name)
  {
    $c = new Criteria();
    $c->add(self::NAME, $name);
    return self::doSelectOne($c);
  }

}
