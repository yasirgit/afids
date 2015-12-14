<?php


/**
 * This class adds structure of 'user_filter_mission_types' table to 'propel' DatabaseMap object.
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
class UserFilterMissionTypesMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UserFilterMissionTypesMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(UserFilterMissionTypesPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(UserFilterMissionTypesPeer::TABLE_NAME);
		$tMap->setPhpName('UserFilterMissionTypes');
		$tMap->setClassname('UserFilterMissionTypes');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_FILTER_ID', 'UserFilterId', 'INTEGER' , 'user_filter', 'ID', true, 11);

		$tMap->addForeignPrimaryKey('MISSION_TYPE_ID', 'MissionTypeId', 'INTEGER' , 'mission_type', 'ID', true, 11);

	} // doBuild()

} // UserFilterMissionTypesMapBuilder
