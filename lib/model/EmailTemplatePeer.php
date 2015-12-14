<?php

class EmailTemplatePeer extends BaseEmailTemplatePeer
{
  public static function getByPersonId($person_id)
  {
    $c = new Criteria();
    $c->add(self::PERSON_ID, $person_id);
    $c->addAscendingOrderByColumn(self::NAME);
    return self::doSelect($c);
  }
}
