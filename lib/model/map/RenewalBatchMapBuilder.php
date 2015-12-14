<?php


/**
 * This class adds structure of 'renewal_batch' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:31 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RenewalBatchMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RenewalBatchMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RenewalBatchPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RenewalBatchPeer::TABLE_NAME);
		$tMap->setPhpName('RenewalBatch');
		$tMap->setClassname('RenewalBatch');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('RENEWAL_BATCH_DATE', 'RenewalBatchDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('FIRST_RENEWAL_ID', 'FirstRenewalId', 'INTEGER', false, 4);

		$tMap->addColumn('SECOND_RENEWAL_ID', 'SecondRenewalId', 'INTEGER', false, 4);

		$tMap->addColumn('THIRD_RENEWAL_ID', 'ThirdRenewalId', 'INTEGER', false, 4);

		$tMap->addColumn('FOURTH_RENEWAL_ID', 'FourthRenewalId', 'INTEGER', false, 4);

		$tMap->addColumn('MISSING_FORM_RENEWAL_ID', 'MissingFormRenewalId', 'INTEGER', false, 4);

	} // doBuild()

} // RenewalBatchMapBuilder