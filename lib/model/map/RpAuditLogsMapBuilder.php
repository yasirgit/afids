<?php


/**
 * This class adds structure of 'rp_audit_logs' table to 'propel' DatabaseMap object.
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
class RpAuditLogsMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpAuditLogsMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpAuditLogsPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpAuditLogsPeer::TABLE_NAME);
		$tMap->setPhpName('RpAuditLogs');
		$tMap->setClassname('RpAuditLogs');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('DATETIMEDISPLAY', 'Datetimedisplay', 'VARCHAR', false, 10);

		$tMap->addColumn('DATE_TIME', 'DateTime', 'TIMESTAMP', false, null);

		$tMap->addColumn('AUDIT_IDENTITY', 'AuditIdentity', 'VARCHAR', false, 82);

		$tMap->addColumn('EVENT', 'Event', 'VARCHAR', false, 15);

		$tMap->addColumn('EVENT_REASON', 'EventReason', 'VARCHAR', false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpAuditLogsMapBuilder