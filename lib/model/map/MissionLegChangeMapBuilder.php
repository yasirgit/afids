<?php


/**
 * This class adds structure of 'mission_leg_change' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:28 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class MissionLegChangeMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MissionLegChangeMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MissionLegChangePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MissionLegChangePeer::TABLE_NAME);
		$tMap->setPhpName('MissionLegChange');
		$tMap->setClassname('MissionLegChange');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('LEG_ID', 'LegId', 'INTEGER', false, 4);

		$tMap->addColumn('CHANGE_DATE', 'ChangeDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('CANCELLED', 'Cancelled', 'VARCHAR', false, 25);

		$tMap->addForeignKey('PILOT_ID', 'PilotId', 'INTEGER', 'pilot', 'ID', false, 4);

		$tMap->addColumn('CANCELLED_TO', 'CancelledTo', 'VARCHAR', false, 25);

		$tMap->addColumn('PILOT_ID_NEW', 'PilotIdNew', 'INTEGER', false, 4);

		$tMap->addColumn('CHANGE_BY', 'ChangeBy', 'INTEGER', false, 4);

		$tMap->addColumn('EVENT_TYPE_ID', 'EventTypeId', 'INTEGER', false, 4);

		$tMap->addColumn('EVENT_DESC', 'EventDesc', 'VARCHAR', false, 175);

		$tMap->addColumn('PERSON_ID', 'PersonId', 'INTEGER', false, 4);

	} // doBuild()

} // MissionLegChangeMapBuilder
