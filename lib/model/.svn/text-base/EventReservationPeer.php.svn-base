<?php
class EventReservationPeer extends BaseEventReservationPeer
{
        /**
    * Retrieve a single object by event id.
    *
    * @param      int $pk the primary key.
    * @param      PropelPDO $con the connection to use
    * @return     EventReservation
    */
    public static function retrieveByEventId($pk)
    {
    $criteria = new Criteria();
    $criteria->add(EventReservationPeer::EVENT_ID, $pk);
    $v = EventReservationPeer::doSelect($criteria);
    return $v;
    }
}
