<?php

class DiscussionPeer extends BaseDiscussionPeer
{
  public static function getByLegID($id){
    
    $c = new Criteria();
    $c->add(self::LEG_ID,$id);
    $c->addAscendingOrderByColumn(self::CREATED_AT);
    
    return self::doselect($c);
  }
}
