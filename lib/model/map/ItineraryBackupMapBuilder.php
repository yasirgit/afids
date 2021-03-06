<?php


/**
 * This class adds structure of 'itinerary_backup' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:26 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ItineraryBackupMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ItineraryBackupMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(ItineraryBackupPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ItineraryBackupPeer::TABLE_NAME);
		$tMap->setPhpName('ItineraryBackup');
		$tMap->setClassname('ItineraryBackup');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('DATE_REQUESTED', 'DateRequested', 'TIMESTAMP', true, null);

		$tMap->addColumn('MISSION_REQUEST_ID', 'MissionRequestId', 'INTEGER', false, 11);

		$tMap->addColumn('MISSION_TYPE_ID', 'MissionTypeId', 'INTEGER', false, 11);

		$tMap->addColumn('APOINT_TIME', 'ApointTime', 'VARCHAR', true, 50);

		$tMap->addColumn('PASSENGER_ID', 'PassengerId', 'INTEGER', true, 11);

		$tMap->addColumn('REQUESTER_ID', 'RequesterId', 'INTEGER', false, 11);

		$tMap->addColumn('FACILITY', 'Facility', 'VARCHAR', false, 50);

		$tMap->addColumn('LODGING', 'Lodging', 'VARCHAR', false, 50);

		$tMap->addColumn('ORGIN_CITY', 'OrginCity', 'VARCHAR', false, 50);

		$tMap->addColumn('ORGIN_STATE', 'OrginState', 'VARCHAR', false, 2);

		$tMap->addColumn('DEST_CITY', 'DestCity', 'VARCHAR', false, 50);

		$tMap->addColumn('DEST_STATE', 'DestState', 'VARCHAR', false, 2);

		$tMap->addColumn('WAIVER_NEED', 'WaiverNeed', 'TINYINT', false, 4);

		$tMap->addColumn('NEED_MEDICAL_RELEASE', 'NeedMedicalRelease', 'TINYINT', false, 4);

		$tMap->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 255);

		$tMap->addColumn('AGENCY_ID', 'AgencyId', 'INTEGER', true, 11);

		$tMap->addColumn('CAMP_ID', 'CampId', 'INTEGER', false, 11);

		$tMap->addColumn('LEG_ID', 'LegId', 'INTEGER', false, 11);

		$tMap->addColumn('POINT_TIME', 'PointTime', 'TIME', false, null);

	} // doBuild()

} // ItineraryBackupMapBuilder
