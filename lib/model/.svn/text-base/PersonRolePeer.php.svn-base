<?php

class PersonRolePeer extends BasePersonRolePeer
{
  public static function getByPersonId($person_id)
  { $c = new Criteria();
    $c->add(self::PERSON_ID, $person_id);
    return self::doSelect($c);
  }

  public static function getByPersonIdOne($person_id){
    $c = new Criteria();
    $c->add(self::PERSON_ID, $person_id);
    $c->addDescendingOrderByColumn(self::ROLE_ID);
    return self::doSelectOne($c);
  }

  public static function getIsTrue($person_id, $role_id){
    $c = new Criteria();
    $c->add(self::PERSON_ID, $person_id);
    $c->add(self::ROLE_ID, $role_id);
    return self::doSelectOne($c);
  }
}
