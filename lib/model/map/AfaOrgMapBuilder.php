<?php


/**
 * This class adds structure of 'afa_org' table to 'propel' DatabaseMap object.
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
class AfaOrgMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AfaOrgMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(AfaOrgPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AfaOrgPeer::TABLE_NAME);
		$tMap->setPhpName('AfaOrg');
		$tMap->setClassname('AfaOrg');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 60);

		$tMap->addColumn('ORG_PHONE', 'OrgPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('HOME_PAGE_URL', 'HomePageUrl', 'VARCHAR', false, 80);

		$tMap->addColumn('ORG_FAX', 'OrgFax', 'VARCHAR', false, 16);

		$tMap->addColumn('REF_CONTACT_NAME', 'RefContactName', 'VARCHAR', false, 25);

		$tMap->addColumn('REF_CONTACT_EMAIL', 'RefContactEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('VPO_SOAP_SERVER_URL', 'VpoSoapServerUrl', 'VARCHAR', false, 125);

		$tMap->addColumn('VPO_REQUEST_POST_EMAIL', 'VpoRequestPostEmail', 'VARCHAR', false, 125);

		$tMap->addColumn('VPO_USER_ID', 'VpoUserId', 'VARCHAR', false, 25);

		$tMap->addColumn('VPO_USER_PASSWORD', 'VpoUserPassword', 'VARCHAR', false, 25);

		$tMap->addColumn('VPO_ORG_ID', 'VpoOrgId', 'VARCHAR', false, 5);

		$tMap->addColumn('AFIDS_REQUESTER_USER_NAME', 'AfidsRequesterUserName', 'VARCHAR', false, 25);

		$tMap->addColumn('AFIDS_REQUESTER_PASSWORD', 'AfidsRequesterPassword', 'VARCHAR', false, 25);

		$tMap->addColumn('AFIDS_SOAP_SERVER_URL', 'AfidsSoapServerUrl', 'VARCHAR', false, 125);

		$tMap->addColumn('AFIDS_REQUEST_POST_EMAIL', 'AfidsRequestPostEmail', 'VARCHAR', false, 125);

		$tMap->addColumn('PHONE_NUMBER1', 'PhoneNumber1', 'VARCHAR', false, 16);

		$tMap->addColumn('PHONE_NUMBER2', 'PhoneNumber2', 'VARCHAR', false, 16);

	} // doBuild()

} // AfaOrgMapBuilder
