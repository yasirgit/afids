<?php

class Itinerary extends BaseItinerary
{
  protected $aPassenger;
  protected $aRequester;

  public function getPassenger()
  {
    if (!($this->aPassenger instanceof Passenger)) {
      $this->aPassenger = PassengerPeer::retrieveByPK($this->getPassengerId());
    }

    return $this->aPassenger;
  }

  /**
   *
   * @return Requester
   */
  public function getRequester()
  {
    if (!($this->aRequester instanceof Requester)) {
      $this->aRequester = RequesterPeer::retrieveByPK($this->getRequesterId());
    }

    return $this->aRequester;
  }

  public function getWaiverNeed()
  {
    return parent::getWaiverNeed() ? true : false;
  }

  public function getNeedMedicalRelease()
  {
    return parent::getNeedMedicalRelease() ? true : false;
  }
}
