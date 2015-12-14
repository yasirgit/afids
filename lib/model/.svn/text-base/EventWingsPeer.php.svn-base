<?php
class EventWingsPeer extends BaseEventWingsPeer
{
    public static function retrieveByEventId($eventid){
        $c = new Criteria();
        $c->add(self::EVENT_ID, $eventid);
        return self::doSelect($c);
    }
}
