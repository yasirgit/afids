<?php

class DonorPeer extends BaseDonorPeer
{
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->add(PersonPeer::LAST_NAME,null,Criteria::NOT_EQUAL);
    $c->addJoin(self::PERSON_ID, PersonPeer::ID);

    $donors = PersonPeer::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($donors as $donor)
    {
      $arr[$donor->getId()] = $donor->getLastName();
    }
    return $arr;
  }
  public static function getByPersonId($person_id){
    
    $c = new Criteria();
    
    $c->add(self::PERSON_ID,$person_id);
    
    return self::doSelectOne($c);
  }
}
