<?php


/**
 * This class adds structure of 'camp_passenger' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:25 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CampPassengerMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CampPassengerMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CampPassengerPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CampPassengerPeer::TABLE_NAME);
		$tMap->setPhpName('CampPassenger');
		$tMap->setClassname('CampPassenger');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('CAMP_ID', 'CampId', 'INTEGER' , 'camp', 'ID', true, 11);

		$tMap->addForeignPrimaryKey('PASSENGER_ID', 'PassengerId', 'INTEGER' , 'passenger', 'ID', true, 11);

		$tMap->addColumn('AIRPORT_ID', 'AirportId', 'INTEGER', true, 11);

		$tMap->addColumn('NOTE', 'Note', 'VARCHAR', false, 255);

		$tMap->addColumn('LINK', 'Link', 'INTEGER', false, 11);

		$tMap->addColumn('RETURN_AIRPORT_ID', 'ReturnAirportId', 'INTEGER', true, 12);

		$tMap->addPrimaryKey('MISSION_ID', 'MissionId', 'INTEGER', true, 11);

	} // doBuild()

} // CampPassengerMapBuilder
