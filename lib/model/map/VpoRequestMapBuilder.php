<?php


/**
 * This class adds structure of 'vpo_request' table to 'propel' DatabaseMap object.
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
class VpoRequestMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.VpoRequestMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(VpoRequestPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(VpoRequestPeer::TABLE_NAME);
		$tMap->setPhpName('VpoRequest');
		$tMap->setClassname('VpoRequest');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('HAZARDOUS_CARGO_FLAG', 'HazardousCargoFlag', 'TINYINT', false, 1);

		$tMap->addColumn('REQUEST_DATE', 'RequestDate', 'DATE', false, null);

		$tMap->addColumn('REQUEST_REASON_DESC', 'RequestReasonDesc', 'VARCHAR', false, 125);

		$tMap->addColumn('AGENCY_NAME', 'AgencyName', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_FIRST_NAME', 'ReqFirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_LAST_NAME', 'ReqLastName', 'VARCHAR', false, 40);

		$tMap->addColumn('AGENCY_DIVISION', 'AgencyDivision', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ADDRESS1', 'ReqAddress1', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ADDRESS2', 'ReqAddress2', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_CITY', 'ReqCity', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_STATE', 'ReqState', 'VARCHAR', false, 2);

		$tMap->addColumn('REQ_COUNTRY', 'ReqCountry', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_ZIPCODE', 'ReqZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('REQ_OFFICE_PHONE', 'ReqOfficePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_OFFICE_COMMENT', 'ReqOfficeComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_MOBILE_PHONE', 'ReqMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_MOBILE_COMMENT', 'ReqMobileComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_FAX_PHONE', 'ReqFaxPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_FAX_COMMENT', 'ReqFaxComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_PAGER_PHONE', 'ReqPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_PAGER_COMMENT', 'ReqPagerComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_OTHER_PHONE1', 'ReqOtherPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_OTHER_COMMENT1', 'ReqOtherComment1', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_OTHER_PHONE2', 'ReqOtherPhone2', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_OTHER_COMMENT2', 'ReqOtherComment2', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_OTHER_PHONE3', 'ReqOtherPhone3', 'INTEGER', false, 16);

		$tMap->addColumn('REQ_OTHER_COMMENT3', 'ReqOtherComment3', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_EMAIL', 'ReqEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_ALT_EMAIL', 'ReqAltEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('CONTACT_NOTES', 'ContactNotes', 'VARCHAR', false, 125);

		$tMap->addColumn('ORIGIN_CITY', 'OriginCity', 'VARCHAR', false, 30);

		$tMap->addColumn('ORIGIN_STATE', 'OriginState', 'VARCHAR', false, 2);

		$tMap->addColumn('DEST_CITY', 'DestCity', 'VARCHAR', false, 30);

		$tMap->addColumn('DEST_STATE', 'DestState', 'VARCHAR', false, 2);

		$tMap->addColumn('PREFERRED_DATE', 'PreferredDate', 'DATE', false, null);

		$tMap->addColumn('ALTERNATIVE_DATE', 'AlternativeDate', 'DATE', false, null);

		$tMap->addColumn('TRANSPORT_TYPE', 'TransportType', 'VARCHAR', false, 25);

		$tMap->addColumn('REQUEST_POSTED_DATE', 'RequestPostedDate', 'DATE', false, null);

		$tMap->addColumn('REQUEST_POSTED_TO_AFA_ORG_ID', 'RequestPostedToAfaOrgId', 'INTEGER', false, 4);

		$tMap->addColumn('REQUES_PROCESSED_DATE', 'RequesProcessedDate', 'DATE', false, null);

		$tMap->addColumn('REQUEST_DISPOSITION', 'RequestDisposition', 'VARCHAR', false, 25);

		$tMap->addColumn('CALLER_NAME', 'CallerName', 'VARCHAR', false, 40);

		$tMap->addColumn('CALLER_PHONE', 'CallerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQUEST_POST_RESULTS', 'RequestPostResults', 'VARCHAR', false, 500);

		$tMap->addColumn('REQUESTER_VPO_USER_ID', 'RequesterVpoUserId', 'VARCHAR', false, 25);

		$tMap->addColumn('SOURCE', 'Source', 'VARCHAR', false, 10);

		$tMap->addColumn('SOAP_POST_FROM_AFA_ORG_ID', 'SoapPostFromAfaOrgId', 'VARCHAR', false, 5);

		$tMap->addColumn('SOAP_POST_REQUEST_ID', 'SoapPostRequestId', 'INTEGER', false, 4);

		$tMap->addColumn('REQUEST_PROCESSED_BY', 'RequestProcessedBy', 'INTEGER', false, 4);

	} // doBuild()

} // VpoRequestMapBuilder
