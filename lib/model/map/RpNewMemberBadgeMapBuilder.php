<?php


/**
 * This class adds structure of 'rp_new_member_badge' table to 'propel' DatabaseMap object.
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
class RpNewMemberBadgeMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpNewMemberBadgeMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpNewMemberBadgePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpNewMemberBadgePeer::TABLE_NAME);
		$tMap->setPhpName('RpNewMemberBadge');
		$tMap->setClassname('RpNewMemberBadge');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('APPLICATIONID', 'Applicationid', 'INTEGER', false, 11);

		$tMap->addColumn('PERSONID', 'Personid', 'INTEGER', true, 11);

		$tMap->addColumn('MEMBERID', 'Memberid', 'INTEGER', true, 4);

		$tMap->addColumn('EXTERNALID', 'Externalid', 'INTEGER', false, 4);

		$tMap->addColumn('FIRSTNAME', 'Firstname', 'VARCHAR', true, 40);

		$tMap->addColumn('LASTNAME', 'Lastname', 'VARCHAR', true, 40);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 80);

		$tMap->addColumn('ADDRESSONE', 'Addressone', 'VARCHAR', false, 40);

		$tMap->addColumn('ADDRESSTWO', 'Addresstwo', 'VARCHAR', false, 40);

		$tMap->addColumn('CITY', 'City', 'VARCHAR', false, 30);

		$tMap->addColumn('STATE', 'State', 'VARCHAR', false, 2);

		$tMap->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', false, 30);

		$tMap->addColumn('BADGEMADE', 'Badgemade', 'DATE', false, null);

		$tMap->addColumn('NOTEBOOKSENT', 'Notebooksent', 'DATE', false, null);

		$tMap->addColumn('ED_NEW_MEMBER_NOTIFY', 'EdNewMemberNotify', 'DATE', false, null);

		$tMap->addColumn('WN_NEW_MEMBERN_NTIFY', 'WnNewMembernNtify', 'DATE', false, null);

		$tMap->addColumn('JOINDATE', 'Joindate', 'DATE', true, null);

		$tMap->addColumn('FLIGHTSTATUS', 'Flightstatus', 'VARCHAR', true, 20);

		$tMap->addColumn('WING_ID', 'WingId', 'INTEGER', false, 4);

		$tMap->addColumn('JOINDATESORT', 'Joindatesort', 'DATE', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpNewMemberBadgeMapBuilder
