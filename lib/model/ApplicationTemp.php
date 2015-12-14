<?php

class ApplicationTemp extends BaseApplicationTemp
{
  protected $aAircraftPrimary;
  protected $aAircraftSecondary;
  protected $aAircraftThird;

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
  public function save(PropelPDO $con = null)
  {
    if ($this->isNew()) $this->setApplicationDate(time());

    return parent::save($con);
  }

  /**
	 * Get the associated Aircraft object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Aircraft The associated Aircraft object.
	 * @throws     PropelException
	 */
	public function getAircraftPrimary(PropelPDO $con = null)
	{
		if ($this->aAircraftPrimary === null && ($this->aircraft_primary_id !== null)) {
			$c = new Criteria(AircraftPeer::DATABASE_NAME);
			$c->add(AircraftPeer::ID, $this->aircraft_primary_id);
			$this->aAircraftPrimary = AircraftPeer::doSelectOne($c, $con);
		}
		return $this->aAircraftPrimary;
	}

  /**
	 * Get the associated Aircraft object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Aircraft The associated Aircraft object.
	 * @throws     PropelException
	 */
	public function getAircraftSecondary(PropelPDO $con = null)
	{
		if ($this->aAircraftSecondary === null && ($this->aircraft_secondary_id !== null)) {
			$c = new Criteria(AircraftPeer::DATABASE_NAME);
			$c->add(AircraftPeer::ID, $this->aircraft_secondary_id);
			$this->aAircraftSecondary = AircraftPeer::doSelectOne($c, $con);
		}
		return $this->aAircraftSecondary;
	}
  
  /**
	 * Get the associated Aircraft object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Aircraft The associated Aircraft object.
	 * @throws     PropelException
	 */
	public function getAircraftThird(PropelPDO $con = null)
	{
		if ($this->aAircraftThird === null && ($this->aircraft_third_id !== null)) {
			$c = new Criteria(AircraftPeer::DATABASE_NAME);
			$c->add(AircraftPeer::ID, $this->aircraft_third_id);
			$this->aAircraftThird = AircraftPeer::doSelectOne($c, $con);
		}
		return $this->aAircraftThird;
	}
}
