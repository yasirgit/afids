<?php


/**
 * This class adds structure of 'agency' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:24 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AgencyMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AgencyMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AgencyPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AgencyPeer::TABLE_NAME);
		$tMap->setPhpName('Agency');
		$tMap->setClassname('Agency');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 80);

		$tMap->addColumn('ADDRESS1', 'Address1', 'VARCHAR', false, 40);

		$tMap->addColumn('ADDRESS2', 'Address2', 'VARCHAR', false, 40);

		$tMap->addColumn('CITY', 'City', 'VARCHAR', false, 30);

		$tMap->addColumn('COUNTY', 'County', 'VARCHAR', false, 30);

		$tMap->addColumn('STATE', 'State', 'VARCHAR', false, 2);

		$tMap->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 30);

		$tMap->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('PHONE', 'Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('FAX_PHONE', 'FaxPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FAX_COMMENT', 'FaxComment', 'VARCHAR', false, 40);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 80);

	} // doBuild()

} // AgencyMapBuilder
