<?php


/**
 * This class adds structure of 'mission_type_wing_stats' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:29 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class MissionTypeWingStatsMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MissionTypeWingStatsMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MissionTypeWingStatsPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MissionTypeWingStatsPeer::TABLE_NAME);
		$tMap->setPhpName('MissionTypeWingStats');
		$tMap->setClassname('MissionTypeWingStats');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('MONTH_NO', 'MonthNo', 'INTEGER', false, 4);

		$tMap->addColumn('YEAR_NO', 'YearNo', 'INTEGER', false, 4);

		$tMap->addForeignKey('WING_ID', 'WingId', 'INTEGER', 'wing', 'ID', false, 4);

		$tMap->addForeignKey('MISSION_TYPE_ID', 'MissionTypeId', 'INTEGER', 'mission_type', 'ID', false, 4);

		$tMap->addColumn('LEG_COUNT', 'LegCount', 'INTEGER', false, 4);

		$tMap->addColumn('TOTAL_HOURS', 'TotalHours', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_COST', 'AircraftCost', 'INTEGER', false, 4);

		$tMap->addColumn('COMMERCIAL_COST', 'CommercialCost', 'INTEGER', false, 4);

	} // doBuild()

} // MissionTypeWingStatsMapBuilder
