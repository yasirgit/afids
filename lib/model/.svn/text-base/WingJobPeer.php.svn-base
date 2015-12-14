<?php

class WingJobPeer extends BaseWingJobPeer
{
   public static function getByPersonId($person_id){

    $c = new Criteria();

    $c->add(self::PERSON_ID,$person_id);
    $c->addAscendingOrderByColumn(self::ID);

    return self::doSelectOne($c);
  }
}
