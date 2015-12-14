<?php

class CampPassenger extends BaseCampPassenger
{
  /**
   * @return Mission false if not found
   */
  public function getMission(PropelPDO $con = null)
  {
    $c = new Criteria();
    $c->addJoin(MissionPeer::ITINERARY_ID, ItineraryPeer::ID, Criteria::LEFT_JOIN);
    $c->addJoin(MissionPeer::ID, MissionLegPeer::MISSION_ID, Criteria::LEFT_JOIN);
    $c->add(MissionLegPeer::ID, null, Criteria::ISNOTNULL);
    $c->add(ItineraryPeer::CAMP_ID, $this->getCampId());
    $c->add(ItineraryPeer::PASSENGER_ID, $this->getPassengerId());

    $mission = MissionPeer::doSelectOne($c);
    return ($mission ? $mission : false);
  }
  
}
