<?php

class EmailListPersonPeer extends BaseEmailListPersonPeer
{
  /**
   * @param $person_id
   * @return array
   */
  public static function getEmailListIdsByPersonId($person_id)
  {
    $c = new Criteria();
    $c->add(self::PERSON_ID, $person_id);
    $c->addSelectColumn(self::LIST_ID); # 0
    $stmt = self::doSelectStmt($c);
    
    $ids = array();
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
      $ids[] = $row[0];
    }
    
    return $ids;
  }
}
