<?php


/**
 * This class adds structure of 'rp_members_no_missions' table to 'propel' DatabaseMap object.
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
class RpMembersNoMissionsMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpMembersNoMissionsMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpMembersNoMissionsPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpMembersNoMissionsPeer::TABLE_NAME);
		$tMap->setPhpName('RpMembersNoMissions');
		$tMap->setClassname('RpMembersNoMissions');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('FIRSTNAME', 'Firstname', 'VARCHAR', true, 40);

		$tMap->addColumn('LASTNAME', 'Lastname', 'VARCHAR', true, 40);

		$tMap->addColumn('COUNTY', 'County', 'VARCHAR', false, 30);

		$tMap->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', false, 30);

		$tMap->addColumn('MEMBERAC', 'Memberac', 'VARCHAR', false, 3);

		$tMap->addColumn('JOINDATE', 'Joindate', 'VARCHAR', false, 10);

		$tMap->addColumn('ORIENTEDDATE', 'Orienteddate', 'VARCHAR', false, 10);

		$tMap->addColumn('JOINDATESORT', 'Joindatesort', 'DATE', true, null);

		$tMap->addColumn('WING_ID', 'WingId', 'INTEGER', false, 4);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 80);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpMembersNoMissionsMapBuilder
