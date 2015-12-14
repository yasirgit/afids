<?php

class MissionTypePeer extends BaseMissionTypePeer
{
  public static function getNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $m_types = self::doSelect($c);
    $arr = array();

    foreach ($m_types as $type)
    {
      $arr[$type->getId()] = $type->getName();
    }
    return $arr;
  }

  public static function getOnlyNames()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $m_types = self::doSelect($c);
    $arr = array();

    foreach ($m_types as $type)
    {
      $arr[$type->getName()] = $type->getName();
    }
    return $arr;
  }
  public static function getName($name)
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::ID);

    $c->add(self::NAME,$name.'%',Criteria::LIKE);
    
    return self::doSelectOne($c);
  }

  public static function getByName($name)
  {
    $c = new Criteria();
    $c->add(self::NAME, "%$name%", Criteria::LIKE);
    return self::doSelectOne($c);
  }
}
