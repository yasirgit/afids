<?php

class CampPilotPassengerPeer extends BaseCampPilotPassengerPeer
{
    public static function getByCampPilot($camp_id, $member_id){
        $c = new Criteria();
        $c->add(self::CAMP_ID, $camp_id);
        $c->add(self::MEMBER_ID, $member_id);
        $c->addAscendingOrderByColumn(self::PASSENGER_ID);
        return self::doselect($c);
    }

    public static function getByCamp($camp_id){
        $c = new Criteria();
        $c->add(self::CAMP_ID, $camp_id);
        $c->addAscendingOrderByColumn(self::PASSENGER_ID);
        return self::doselect($c);
    }
}
