<?php

class MissionLeg extends BaseMissionLeg
{
  protected $aAirline;
  protected $aFund;

  /**
   * @return Airline
   */
  public function getAirline()
  {
    if (isset($this->aAirline)) return $this->aAirline;

    return $this->aAirline = AirlinePeer::retrieveByPK($this->getAirlineId());
  }

  public function getFund()
  {
    if (isset($this->aFund)) return $this->aFund;

    return $this->aFund = FundPeer::retrieveByPK($this->getFundId());
  }

  /**
   * Defines whether this leg have command pilot request
   * @return boolean
   */
  public function getPilotAssigned()
  {
    $c = new Criteria();
    $c->add(PilotRequestPeer::LEG_ID, $this->getId());
    $c->add(PilotRequestPeer::PILOT_TYPE, 'Command Pilot');
    return PilotRequestPeer::doCount($c) > 0;
  }

  /**
   * @return Pilot
   */
  public function getCoPilot()
  {
    if (0 == (int)$this->getCopilotId()) return null;
    $c = new Criteria();
    $c->add(PilotPeer::ID, $this->getCopilotId());
    return PilotPeer::doSelectOne($c);
  }
}
