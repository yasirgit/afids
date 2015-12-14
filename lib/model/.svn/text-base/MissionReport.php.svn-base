<?php

class MissionReport extends BaseMissionReport
{
  /**
	 * @var        MissionLeg
	 */
	protected $collMissionLeg;

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
    if ($this->isNew()) $this->setReportDate(time());

    return parent::save($con);
  }

  /**
	 * Gets MissionLeg object which contain a foreign key that references this object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     MissionLeg
	 * @throws     PropelException
	 */
  public function getMissionLeg($criteria = null, PropelPDO $con = null)
  {
    if ($criteria === null) {
			$criteria = new Criteria(MissionReportPeer::DATABASE_NAME);
		}elseif ($criteria instanceof Criteria) {
			$criteria = clone $criteria;
		}

		if ($this->collMissionLeg === null) {
			if (!($this->isNew())) {
				$criteria->add(MissionLegPeer::MISSION_REPORT_ID, $this->id);
				MissionLegPeer::addSelectColumns($criteria);
				$this->collMissionLeg = MissionLegPeer::doSelectOne($criteria, $con);
			}
		}
    
		return $this->collMissionLegs;
  }
}
