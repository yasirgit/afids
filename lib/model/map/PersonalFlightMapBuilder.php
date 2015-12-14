<?php


/**
 * This class adds structure of 'personal_flight' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:30 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PersonalFlightMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PersonalFlightMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(PersonalFlightPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PersonalFlightPeer::TABLE_NAME);
		$tMap->setPhpName('PersonalFlight');
		$tMap->setClassname('PersonalFlight');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addForeignKey('PILOT_ID', 'PilotId', 'INTEGER', 'pilot', 'ID', true, 11);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 255);

		$tMap->addColumn('DEPARTURE_DATE', 'DepartureDate', 'DATE', false, null);

		$tMap->addColumn('RETURN_DATE', 'ReturnDate', 'DATE', false, null);

		$tMap->addColumn('ORIGIN_CITY', 'OriginCity', 'VARCHAR', false, 255);

		$tMap->addColumn('ORIGIN_ZIPCODE', 'OriginZipcode', 'VARCHAR', false, 12);

		$tMap->addColumn('DESTINATION_CITY', 'DestinationCity', 'VARCHAR', false, 255);

		$tMap->addColumn('DESTINATION_ZIPCODE', 'DestinationZipcode', 'VARCHAR', false, 12);

	} // doBuild()

} // PersonalFlightMapBuilder