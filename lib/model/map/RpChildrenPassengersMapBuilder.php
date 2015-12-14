<?php


/**
 * This class adds structure of 'rp_children_passengers' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:32 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RpChildrenPassengersMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpChildrenPassengersMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpChildrenPassengersPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpChildrenPassengersPeer::TABLE_NAME);
		$tMap->setPhpName('RpChildrenPassengers');
		$tMap->setClassname('RpChildrenPassengers');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('MISSION_DATE', 'MissionDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('DISPLAYDATE', 'Displaydate', 'VARCHAR', false, 10);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 40);

		$tMap->addColumn('INITIAL', 'Initial', 'VARCHAR', true, 2);

		$tMap->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 40);

		$tMap->addColumn('PASSCITY', 'Passcity', 'VARCHAR', false, 30);

		$tMap->addColumn('PASSSTATE', 'Passstate', 'VARCHAR', false, 2);

		$tMap->addColumn('PASSCOUNTY', 'Passcounty', 'VARCHAR', false, 30);

		$tMap->addColumn('ORIGINIDENT', 'Originident', 'VARCHAR', false, 4);

		$tMap->addColumn('ORIGINNAME', 'Originname', 'VARCHAR', false, 30);

		$tMap->addColumn('ORIGINCITY', 'Origincity', 'VARCHAR', false, 30);

		$tMap->addColumn('ORIGINSTATE', 'Originstate', 'VARCHAR', false, 2);

		$tMap->addColumn('DESTIDENT', 'Destident', 'VARCHAR', false, 4);

		$tMap->addColumn('DESTNAME', 'Destname', 'VARCHAR', false, 30);

		$tMap->addColumn('DESTCITY', 'Destcity', 'VARCHAR', false, 30);

		$tMap->addColumn('DESTSTATE', 'Deststate', 'VARCHAR', false, 2);

		$tMap->addColumn('AGENCYNAME', 'Agencyname', 'VARCHAR', true, 80);

		$tMap->addColumn('FACILITY_NAME', 'FacilityName', 'VARCHAR', false, 40);

		$tMap->addColumn('ILLNESS', 'Illness', 'VARCHAR', false, 60);

		$tMap->addColumn('PASSAGE', 'Passage', 'BIGINT', false, 11);

		$tMap->addColumn('WING_ID', 'WingId', 'INTEGER', false, 4);

		$tMap->addColumn('PASSENGERILLNESS', 'Passengerillness', 'VARCHAR', false, 30);

		$tMap->addColumn('PASSENGERILLNESSID', 'Passengerillnessid', 'INTEGER', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpChildrenPassengersMapBuilder