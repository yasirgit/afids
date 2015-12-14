<?php

class PilotDatePeer extends BasePilotDatePeer
{
  public static function getByMemberId($member_id){
    $c = new Criteria();
    
    $c->add(self::MEMBER_ID,$member_id,Criteria::LIKE);
    
    return self::doselect($c);
  }

    public static function getByDateIdCampId($check_date, $camp_id){
        $c = new Criteria();
        $c->addJoin(self::PILOT_REQUEST_ID,PilotRequestPeer::ID);
        $c->add(PilotRequestPeer::GROUP_CAMP_ID, $camp_id);
        $c->add(PilotRequestPeer::PROCESSED, 1);
        $c->add(self::DATE, date('Y-m-d',strtotime($check_date)).'%', Criteria::LIKE);

        return self::doselect($c);
    }

}
