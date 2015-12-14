<?php

class Member extends BaseMember
{
    public function  __toString() {
	
    }
  /**
   * @return Pilot
   */
  public function getPilot()
  {
    $c = new Criteria();
    $c->add(PilotPeer::MEMBER_ID, $this->getId());
    return PilotPeer::doSelectOne($c);
  }
  
  /**
   * @return Availability
   */
  public function getAvailability()
  {
    $c = new Criteria();
    $c->add(AvailabilityPeer::MEMBER_ID, $this->getId());
    return AvailabilityPeer::doSelectOne($c);
  }

  /**
   * @return Application
   */
  public function getLastApplication()
  {
    $c = new Criteria();
    $c->add(ApplicationPeer::PROCESSED_DATE, null, Criteria::ISNOTNULL);
    $c->add(ApplicationPeer::MEMBER_ID, $this->getId());
    $c->addDescendingOrderByColumn(ApplicationPeer::DATE);
    return ApplicationPeer::doSelectOne($c);
  }
}
