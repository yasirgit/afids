<?php

class MissionRequest extends BaseMissionRequest
{
  public function getItinerary()
  {
    $c = new Criteria();
    $c->add(ItineraryPeer::MISSION_REQUEST_ID, $this->getId());
    return ItineraryPeer::doSelectOne($c);
  }
}
