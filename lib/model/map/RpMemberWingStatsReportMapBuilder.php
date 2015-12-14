<?php


/**
 * This class adds structure of 'rp_member_wing_stats_report' table to 'propel' DatabaseMap object.
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
class RpMemberWingStatsReportMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpMemberWingStatsReportMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpMemberWingStatsReportPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpMemberWingStatsReportPeer::TABLE_NAME);
		$tMap->setPhpName('RpMemberWingStatsReport');
		$tMap->setClassname('RpMemberWingStatsReport');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('MONTHNO', 'Monthno', 'INTEGER', false, 4);

		$tMap->addColumn('YEARNO', 'Yearno', 'INTEGER', false, 4);

		$tMap->addColumn('WINGID', 'Wingid', 'INTEGER', false, 4);

		$tMap->addColumn('WINGNAME', 'Wingname', 'VARCHAR', true, 30);

		$tMap->addColumn('FLIGHTSTATUS', 'Flightstatus', 'VARCHAR', false, 20);

		$tMap->addColumn('MEMBERCOUNT', 'Membercount', 'INTEGER', false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpMemberWingStatsReportMapBuilder
