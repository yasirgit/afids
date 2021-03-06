<?php


/**
 * This class adds structure of 'rp_outreach_report' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:33 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RpOutreachReportMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpOutreachReportMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpOutreachReportPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpOutreachReportPeer::TABLE_NAME);
		$tMap->setPhpName('RpOutreachReport');
		$tMap->setClassname('RpOutreachReport');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('EXTERNALID', 'Externalid', 'INTEGER', false, 4);

		$tMap->addColumn('LEGNUMBER', 'Legnumber', 'INTEGER', true, 2);

		$tMap->addColumn('MISSION_DATE', 'MissionDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('DISPLAYDATE', 'Displaydate', 'VARCHAR', false, 10);

		$tMap->addColumn('CANCELLED', 'Cancelled', 'VARCHAR', false, 25);

		$tMap->addColumn('PILOTNAME', 'Pilotname', 'VARCHAR', true, 81);

		$tMap->addColumn('PILOTLASTNAME', 'Pilotlastname', 'VARCHAR', true, 40);

		$tMap->addColumn('AGENCYNAME', 'Agencyname', 'VARCHAR', true, 80);

		$tMap->addColumn('PASSNAME', 'Passname', 'VARCHAR', true, 43);

		$tMap->addColumn('PASSLASTNAME', 'Passlastname', 'VARCHAR', true, 40);

		$tMap->addColumn('PASSAGE', 'Passage', 'DECIMAL', false, 10);

		$tMap->addColumn('ILLNESS', 'Illness', 'VARCHAR', false, 60);

		$tMap->addColumn('FACILITYNAME', 'Facilityname', 'VARCHAR', false, 40);

		$tMap->addColumn('LODGINGNAME', 'Lodgingname', 'VARCHAR', false, 40);

		$tMap->addColumn('AGENCYCITY', 'Agencycity', 'VARCHAR', false, 30);

		$tMap->addColumn('AGENCYSTATE', 'Agencystate', 'VARCHAR', false, 2);

		$tMap->addColumn('PASS_STATE', 'PassState', 'VARCHAR', false, 2);

		$tMap->addColumn('AGENCYID', 'Agencyid', 'INTEGER', true, 11);

		$tMap->addColumn('PASSENGERID', 'Passengerid', 'INTEGER', true, 11);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpOutreachReportMapBuilder
