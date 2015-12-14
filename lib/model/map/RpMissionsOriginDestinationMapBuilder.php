<?php


/**
 * This class adds structure of 'rp_missions_origin_destination' table to 'propel' DatabaseMap object.
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
class RpMissionsOriginDestinationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpMissionsOriginDestinationMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpMissionsOriginDestinationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpMissionsOriginDestinationPeer::TABLE_NAME);
		$tMap->setPhpName('RpMissionsOriginDestination');
		$tMap->setClassname('RpMissionsOriginDestination');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('EXTERNALID', 'Externalid', 'INTEGER', false, 4);

		$tMap->addColumn('MISSION_DATE', 'MissionDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('MISSIONDATEDISPLAY', 'Missiondatedisplay', 'VARCHAR', false, 10);

		$tMap->addColumn('ORIGINID', 'Originid', 'VARCHAR', false, 4);

		$tMap->addColumn('ORIGINCITY', 'Origincity', 'VARCHAR', false, 30);

		$tMap->addColumn('DESTID', 'Destid', 'VARCHAR', false, 4);

		$tMap->addColumn('DESTCITY', 'Destcity', 'VARCHAR', false, 30);

		$tMap->addColumn('LEGCOUNT', 'Legcount', 'BIGINT', false, 21);

		$tMap->addColumn('WINGID', 'Wingid', 'BIGINT', false, 11);

		$tMap->addColumn('WINGNAME', 'Wingname', 'VARCHAR', false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpMissionsOriginDestinationMapBuilder
