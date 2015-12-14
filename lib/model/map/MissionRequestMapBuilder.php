<?php


/**
 * This class adds structure of 'mission_request' table to 'propel' DatabaseMap object.
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
class MissionRequestMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MissionRequestMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MissionRequestPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MissionRequestPeer::TABLE_NAME);
		$tMap->setPhpName('MissionRequest');
		$tMap->setClassname('MissionRequest');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('REQUESTER_ID', 'RequesterId', 'INTEGER', true, 11);

		$tMap->addColumn('REQUESTER_DATE', 'RequesterDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('REQUEST_BY', 'RequestBy', 'INTEGER', true, 11);

		$tMap->addColumn('ON_BEHALF', 'OnBehalf', 'VARCHAR', true, 20);

		$tMap->addColumn('APPT_DATE', 'ApptDate', 'TIMESTAMP', true, null);

		$tMap->addColumn('MISSION_DATE', 'MissionDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('RETURN_DATE', 'ReturnDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('BAGGAGE_WEIGHT', 'BaggageWeight', 'INTEGER', false, 11);

		$tMap->addColumn('BAGGAGE_DESC', 'BaggageDesc', 'VARCHAR', false, 50);

		$tMap->addColumn('PASS_TITLE', 'PassTitle', 'VARCHAR', true, 7);

		$tMap->addColumn('PASS_FIRST_NAME', 'PassFirstName', 'VARCHAR', true, 30);

		$tMap->addColumn('PASS_LAST_NAME', 'PassLastName', 'VARCHAR', true, 30);

		$tMap->addColumn('PASS_ADDRESS1', 'PassAddress1', 'VARCHAR', false, 50);

		$tMap->addColumn('PASS_ADDRESS2', 'PassAddress2', 'VARCHAR', false, 50);

		$tMap->addColumn('PASS_CITY', 'PassCity', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_COUNTY', 'PassCounty', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_STATE', 'PassState', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_COUNTRY', 'PassCountry', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_ZIPCODE', 'PassZipcode', 'VARCHAR', true, 10);

		$tMap->addColumn('PASS_DAY_PHONE', 'PassDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_DAY_COMMENT', 'PassDayComment', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_EVE_PHONE', 'PassEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_EVE_COMMENT', 'PassEveComment', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_MOBILE_PHONE', 'PassMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_MOBILE_COMMENT', 'PassMobileComment', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_PAGER_PHONE', 'PassPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_PAGER_COMMENT', 'PassPagerComment', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_OTHER_PHONE', 'PassOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_OTHER_COMMENT', 'PassOtherComment', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_EMAIL', 'PassEmail', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_DATE_OF_BIRTH', 'PassDateOfBirth', 'TIMESTAMP', true, null);

		$tMap->addColumn('ILLNESS', 'Illness', 'VARCHAR', false, 60);

		$tMap->addColumn('FINANCIAL', 'Financial', 'VARCHAR', false, 100);

		$tMap->addColumn('PASS_WEIGHT', 'PassWeight', 'INTEGER', false, 11);

		$tMap->addColumn('RELEASING_PHYSICIAN', 'ReleasingPhysician', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASE_PHONE', 'ReleasePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('RELEASE_PHONE_COMMENT', 'ReleasePhoneComment', 'VARCHAR', false, 30);

		$tMap->addColumn('RELEASE_FAX', 'ReleaseFax', 'VARCHAR', false, 16);

		$tMap->addColumn('RELEASE_FAX_COMMENT', 'ReleaseFaxComment', 'VARCHAR', false, 30);

		$tMap->addColumn('RELEASE_EMAIL', 'ReleaseEmail', 'VARCHAR', false, 30);

		$tMap->addColumn('TREATING_PHYSICIAN', 'TreatingPhysician', 'VARCHAR', false, 30);

		$tMap->addColumn('TREATING_PHONE', 'TreatingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('TREATING_PHONE_COMMENT', 'TreatingPhoneComment', 'VARCHAR', false, 30);

		$tMap->addColumn('TREATING_FAX', 'TreatingFax', 'VARCHAR', false, 16);

		$tMap->addColumn('TREATING_FAX_COMMENT', 'TreatingFaxComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_TITLE', 'ReqTitle', 'VARCHAR', false, 7);

		$tMap->addColumn('REQ_FIRST_NAME', 'ReqFirstName', 'VARCHAR', true, 30);

		$tMap->addColumn('REQ_LAST_NAME', 'ReqLastName', 'VARCHAR', true, 30);

		$tMap->addColumn('AGENCY_NAME', 'AgencyName', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ADDRESS1', 'ReqAddress1', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_ADDRESS2', 'ReqAddress2', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_CITY', 'ReqCity', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_COUNTY', 'ReqCounty', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_STATE', 'ReqState', 'VARCHAR', false, 2);

		$tMap->addColumn('REQ_COUNTRY', 'ReqCountry', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ZIPCODE', 'ReqZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('REQ_DAY_PHONE', 'ReqDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_DAY_COMMENT', 'ReqDayComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_EVE_PHONE', 'ReqEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_EVE_COMMENT', 'ReqEveComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_MOBILE_PHONE', 'ReqMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_MOBILE_COMMENT', 'ReqMobileComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_PAGER_PHONE', 'ReqPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_PAGER_COMMENT', 'ReqPagerComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_OTHER_PHONE', 'ReqOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_OTHER_COMMENT', 'ReqOtherComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_EMAIL', 'ReqEmail', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_SECONDARY_EMAIL', 'ReqSecondaryEmail', 'VARCHAR', false, 50);

		$tMap->addColumn('REQ_PAGER_EMAIL', 'ReqPagerEmail', 'VARCHAR', false, 50);

		$tMap->addColumn('REQ_POSITION', 'ReqPosition', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_DISCHARGE', 'ReqDischarge', 'VARCHAR', false, 2);

		$tMap->addColumn('ORGIN_IDENT', 'OrginIdent', 'VARCHAR', false, 40);

		$tMap->addColumn('ORGIN_ID', 'OrginId', 'INTEGER', false, 11);

		$tMap->addColumn('ORGIN_CITY', 'OrginCity', 'VARCHAR', true, 30);

		$tMap->addColumn('ORGIN_STATE', 'OrginState', 'VARCHAR', true, 2);

		$tMap->addColumn('ORGIN_ZIPCODE', 'OrginZipcode', 'VARCHAR', true, 10);

		$tMap->addColumn('DEST_IDENT', 'DestIdent', 'VARCHAR', false, 4);

		$tMap->addColumn('DEST_ID', 'DestId', 'INTEGER', false, 11);

		$tMap->addColumn('DEST_CITY', 'DestCity', 'VARCHAR', true, 30);

		$tMap->addColumn('DEST_STATE', 'DestState', 'VARCHAR', true, 2);

		$tMap->addColumn('DEST_ZIPCODE', 'DestZipcode', 'VARCHAR', true, 10);

		$tMap->addColumn('COM1_NAME', 'Com1Name', 'VARCHAR', false, 50);

		$tMap->addColumn('COM1_RELATIONSHIP', 'Com1Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM1_DATE_OF_BIRTH', 'Com1DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM1_WEIGTH', 'Com1Weigth', 'INTEGER', false, 11);

		$tMap->addColumn('COM1_PHONE', 'Com1Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM1_COMMENT', 'Com1Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('COM2_NAME', 'Com2Name', 'VARCHAR', false, 30);

		$tMap->addColumn('COM2_RELATIONSHIP', 'Com2Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM2_DATE_OF_BIRTH', 'Com2DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM2_WEIGTH', 'Com2Weigth', 'INTEGER', false, 11);

		$tMap->addColumn('COM2_PHONE', 'Com2Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM2_COMMENT', 'Com2Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('COM3_NAME', 'Com3Name', 'VARCHAR', false, 30);

		$tMap->addColumn('COM3_RELATIONSHIP', 'Com3Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM3_DATE_OF_BIRTH', 'Com3DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM3_WEIGTH', 'Com3Weigth', 'INTEGER', false, 11);

		$tMap->addColumn('COM3_PHONE', 'Com3Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM3_COMMENT', 'Com3Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('COM4_NAME', 'Com4Name', 'VARCHAR', false, 30);

		$tMap->addColumn('COM4_RELATIONSHIP', 'Com4Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM4_DATE_OF_BIRTH', 'Com4DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM4_WEIGTH', 'Com4Weigth', 'INTEGER', false, 11);

		$tMap->addColumn('COM4_PHONE', 'Com4Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM4_COMMENT', 'Com4Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('COM5_NAME', 'Com5Name', 'VARCHAR', false, 30);

		$tMap->addColumn('COM5_RELATIONSHIP', 'Com5Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM5_DATE_OF_BIRTH', 'Com5DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM5_WEIGTH', 'Com5Weigth', 'INTEGER', false, 11);

		$tMap->addColumn('COM5_PHONE', 'Com5Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM5_COMMENT', 'Com5Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('LODGING_NAME', 'LodgingName', 'VARCHAR', false, 30);

		$tMap->addColumn('LODGING_PHONE', 'LodgingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('LODGING_PHONE_COMMENT', 'LodgingPhoneComment', 'VARCHAR', false, 30);

		$tMap->addColumn('FACILITY_NAME', 'FacilityName', 'VARCHAR', false, 30);

		$tMap->addColumn('FACILITY_PHONE', 'FacilityPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FACILITY_PHONE_COMMENT', 'FacilityPhoneComment', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_LANGUAGE', 'ReqLanguage', 'VARCHAR', false, 30);

		$tMap->addColumn('BEST_CONTACT', 'BestContact', 'VARCHAR', false, 80);

		$tMap->addColumn('EMERGENCY_NAME', 'EmergencyName', 'VARCHAR', false, 30);

		$tMap->addColumn('EMERGENCY_PHONE1', 'EmergencyPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_PHONE1_COMMENT', 'EmergencyPhone1Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('EMERGENCY_PHONE2', 'EmergencyPhone2', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_PHONE2_COMMENT', 'EmergencyPhone2Comment', 'VARCHAR', false, 30);

		$tMap->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 80);

		$tMap->addColumn('PROCESSED_DATE', 'ProcessedDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('SESSION_ID', 'SessionId', 'INTEGER', false, 11);

		$tMap->addColumn('IP_ADDRESS', 'IpAddress', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_FAX_PHONE1', 'PassFaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_FAX_COMMENT1', 'PassFaxComment1', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_FIRST_NAME', 'GuarFirstName', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_LAST_NAME', 'GuarLastName', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_ADDRESS1', 'GuarAddress1', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_ADDRESS2', 'GuarAddress2', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_CITY', 'GuarCity', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_STATE', 'GuarState', 'VARCHAR', false, 2);

		$tMap->addColumn('GUAR_ZIPCODE', 'GuarZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('GUAR_DAY_PHONE', 'GuarDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_DAY_COMMENT', 'GuarDayComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_EVE_PHONE', 'GuarEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_EVE_COMMENT', 'GuarEveComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_FAX_PHONE', 'GuarFaxPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_FAX_COMMENT', 'GuarFaxComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_MOBILE_PHONE', 'GuarMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_MOBILE_COMMENT', 'GuarMobileComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_OTHER_PHONE', 'GuarOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_OTHER_COMMENT', 'GuarOtherComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_PAGER_PHONE', 'GuarPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_PAGER_COMMENT', 'GuarPagerComment', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_GUAR_EMAIL', 'GuarGuarEmail', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_FAX_PHONE1', 'ReqFaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_FAX_COMMENT1', 'ReqFaxComment1', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_ENGLISH', 'PassEnglish', 'TINYINT', false, 1);

		$tMap->addColumn('PASS_LANGUAGE', 'PassLanguage', 'VARCHAR', false, 50);

		$tMap->addColumn('TREATING_EMAIL', 'TreatingEmail', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_HEIGHT', 'PassHeight', 'INTEGER', false, 11);

		$tMap->addColumn('PASS_OXYGEN', 'PassOxygen', 'TINYINT', false, 1);

		$tMap->addColumn('PASS_MEDICAL', 'PassMedical', 'TINYINT', false, 1);

		$tMap->addColumn('REFERRAL_SOURCE_ID', 'ReferralSourceId', 'INTEGER', false, 11);

		$tMap->addColumn('FOLLOW_UP_CONTACT_NAME', 'FollowUpContactName', 'VARCHAR', true, 30);

		$tMap->addColumn('FOLLOW_UP_CONTACT_PHONE', 'FollowUpContactPhone', 'VARCHAR', true, 16);

		$tMap->addColumn('FOLLOW_UP_EMAIL', 'FollowUpEmail', 'VARCHAR', true, 30);

		$tMap->addColumn('MISS_REQ_ORGINATOR_AFA_ORG_ID', 'MissReqOrginatorAfaOrgId', 'INTEGER', false, 11);

		$tMap->addColumn('AFA_ORG_ID', 'AfaOrgId', 'INTEGER', false, 11);

		$tMap->addColumn('AFA_ORG_MISSION_ID', 'AfaOrgMissionId', 'INTEGER', false, 11);

		$tMap->addForeignKey('MISSION_REQUEST_TYPE_ID', 'MissionRequestTypeId', 'INTEGER', 'mission_type', 'ID', false, 11);

		$tMap->addColumn('LAST_PAGE_PROCESSED', 'LastPageProcessed', 'INTEGER', false, 11);

		$tMap->addColumn('PASS_GENDER', 'PassGender', 'VARCHAR', false, 10);

		$tMap->addColumn('PASS_TYPE', 'PassType', 'INTEGER', false, 11);

		$tMap->addColumn('PASS_PRIVATE_CONS', 'PassPrivateCons', 'VARCHAR', false, 150);

		$tMap->addColumn('PASS_PUBLIC_CONS', 'PassPublicCons', 'VARCHAR', false, 150);

		$tMap->addColumn('APPT_TIME', 'ApptTime', 'TIME', false, null);

		$tMap->addColumn('FLIGHT_TIME', 'FlightTime', 'TIME', false, null);

		$tMap->addColumn('WAIVER_REQUIRED', 'WaiverRequired', 'VARCHAR', false, 5);

	} // doBuild()

} // MissionRequestMapBuilder
