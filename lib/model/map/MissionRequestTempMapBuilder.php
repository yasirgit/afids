<?php


/**
 * This class adds structure of 'mission_request_temp' table to 'propel' DatabaseMap object.
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
class MissionRequestTempMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MissionRequestTempMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(MissionRequestTempPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(MissionRequestTempPeer::TABLE_NAME);
		$tMap->setPhpName('MissionRequestTemp');
		$tMap->setClassname('MissionRequestTemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('REQUEST_DATE', 'RequestDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('REQUEST_BY', 'RequestBy', 'INTEGER', false, 11);

		$tMap->addColumn('REQUEST_ON_BEHALF', 'RequestOnBehalf', 'INTEGER', false, 11);

		$tMap->addColumn('APPT_DATE', 'ApptDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('RETURN_DATE', 'ReturnDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('BAGGAGE_WEIGHT', 'BaggageWeight', 'INTEGER', false, 11);

		$tMap->addColumn('BAGGAGE_DESC', 'BaggageDesc', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_TITLE', 'PassTitle', 'VARCHAR', false, 7);

		$tMap->addColumn('PASS_FIRST_NAME', 'PassFirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_LAST_NAME', 'PassLastName', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_ADDRESS1', 'PassAddress1', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_ADDRESS2', 'PassAddress2', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_CITY', 'PassCity', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_COUNTY', 'PassCounty', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_STATE', 'PassState', 'CHAR', false, 2);

		$tMap->addColumn('PASS_COUNTRY', 'PassCountry', 'VARCHAR', false, 30);

		$tMap->addColumn('PASS_ZIPCODE', 'PassZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('PASS_DAY_PHONE', 'PassDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_DAY_COMMENT', 'PassDayComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_EVE_PHONE', 'PassEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_EVE_COMMENT', 'PassEveComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_MOBILE_PHONE', 'PassMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_MOBILE_COMMENT', 'PassMobileComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_PAGER_PHONE', 'PassPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_PAGER_COMMENT', 'PassPagerComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_OTHER_PHONE', 'PassOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_OTHER_COMMENT', 'PassOtherComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_EMAIL', 'PassEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('PASS_DATE_OF_BIRTH', 'PassDateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('ILLNESS', 'Illness', 'VARCHAR', false, 60);

		$tMap->addColumn('FINANCIAL', 'Financial', 'VARCHAR', false, 100);

		$tMap->addColumn('PASS_WEIGHT', 'PassWeight', 'SMALLINT', false, 6);

		$tMap->addColumn('RELEASING_PHYSICIAN', 'ReleasingPhysician', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASE_PHONE', 'ReleasePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('RELEASE_PHONE_COMMENT', 'ReleasePhoneComment', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASE_FAX', 'ReleaseFax', 'VARCHAR', false, 16);

		$tMap->addColumn('RELEASE_FAX_COMMENT', 'ReleaseFaxComment', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASE_EMAIL', 'ReleaseEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('TREATING_PHYSICIAN', 'TreatingPhysician', 'VARCHAR', false, 40);

		$tMap->addColumn('TREATING_PHONE', 'TreatingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('TREATING_PHONE_COMMENT', 'TreatingPhoneComment', 'VARCHAR', false, 40);

		$tMap->addColumn('TREATING_FAX', 'TreatingFax', 'VARCHAR', false, 16);

		$tMap->addColumn('TREATING_FAX_COMMENT', 'TreatingFaxComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_TITLE', 'ReqTitle', 'VARCHAR', false, 7);

		$tMap->addColumn('REQ_FIRST_NAME', 'ReqFirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_LAST_NAME', 'ReqLastName', 'VARCHAR', false, 40);

		$tMap->addColumn('AGENCY_NAME', 'AgencyName', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ADDRESS1', 'ReqAddress1', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_ADDRESS2', 'ReqAddress2', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_CITY', 'ReqCity', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_COUNTY', 'ReqCounty', 'VARCHAR', false, 30);

		$tMap->addColumn('REQ_STATE', 'ReqState', 'CHAR', false, 2);

		$tMap->addColumn('REQ_COUNTRY', 'ReqCountry', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_ZIPCODE', 'ReqZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('REQ_DAY_PHONE', 'ReqDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_DAY_COMMENT', 'ReqDayComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_EVE_PHONE', 'ReqEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_EVE_COMMENT', 'ReqEveComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_MOBILE_PHONE', 'ReqMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_MOBILE_COMMENT', 'ReqMobileComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_PAGER_PHONE', 'ReqPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_PAGER_COMMENT', 'ReqPagerComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_OTHER_PHONE', 'ReqOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_OTHER_COMMENT', 'ReqOtherComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_EMAIL', 'ReqEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('ORIGIN_IDENT', 'OriginIdent', 'VARCHAR', false, 4);

		$tMap->addColumn('ORIGIN_ID', 'OriginId', 'INTEGER', false, 11);

		$tMap->addColumn('ORIGIN_CITY', 'OriginCity', 'VARCHAR', false, 30);

		$tMap->addColumn('ORIGIN_STATE', 'OriginState', 'CHAR', false, 2);

		$tMap->addColumn('ORIGIN_ZIPCODE', 'OriginZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('DEST_IDENT', 'DestIdent', 'VARCHAR', false, 4);

		$tMap->addColumn('DEST_ID', 'DestId', 'INTEGER', false, 11);

		$tMap->addColumn('DEST_CITY', 'DestCity', 'VARCHAR', false, 30);

		$tMap->addColumn('DEST_STATE', 'DestState', 'CHAR', false, 2);

		$tMap->addColumn('DEST_ZIPCODE', 'DestZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('COM1_NAME', 'Com1Name', 'VARCHAR', false, 50);

		$tMap->addColumn('COM1_RELATIONSHIP', 'Com1Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM1_DATE_OF_BIRTH', 'Com1DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM1_WEIGHT', 'Com1Weight', 'SMALLINT', false, 6);

		$tMap->addColumn('COM1_PHONE', 'Com1Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM1_COMMENT', 'Com1Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('COM2_NAME', 'Com2Name', 'VARCHAR', false, 50);

		$tMap->addColumn('COM2_RELATIONSHIP', 'Com2Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM2_DATE_OF_BIRTH', 'Com2DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM2_WEIGHT', 'Com2Weight', 'SMALLINT', false, 6);

		$tMap->addColumn('COM2_PHONE', 'Com2Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM2_COMMENT', 'Com2Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('COM3_NAME', 'Com3Name', 'VARCHAR', false, 50);

		$tMap->addColumn('COM3_RELATIONSHIP', 'Com3Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM3_DATE_OF_BIRTH', 'Com3DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM3_WEIGHT', 'Com3Weight', 'SMALLINT', false, 6);

		$tMap->addColumn('COM3_PHONE', 'Com3Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM3_COMMENT', 'Com3Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('COM4_NAME', 'Com4Name', 'VARCHAR', false, 50);

		$tMap->addColumn('COM4_RELATIONSHIP', 'Com4Relationship', 'VARCHAR', false, 30);

		$tMap->addColumn('COM4_DATE_OF_BIRTH', 'Com4DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('COM4_WEIGHT', 'Com4Weight', 'SMALLINT', false, 6);

		$tMap->addColumn('COM4_PHONE', 'Com4Phone', 'VARCHAR', false, 16);

		$tMap->addColumn('COM4_COMMENT', 'Com4Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('LODGING_NAME', 'LodgingName', 'VARCHAR', false, 60);

		$tMap->addColumn('LODGING_PHONE', 'LodgingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FACILITY_NAME', 'FacilityName', 'VARCHAR', false, 60);

		$tMap->addColumn('FACILITY_PHONE', 'FacilityPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FACILITY_PHONE_COMMENT', 'FacilityPhoneComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_LANGUAGE_SPOKEN', 'ReqLanguageSpoken', 'VARCHAR', false, 30);

		$tMap->addColumn('BEST_CONTACT', 'BestContact', 'VARCHAR', false, 80);

		$tMap->addColumn('EMERGENCY_NAME', 'EmergencyName', 'VARCHAR', false, 40);

		$tMap->addColumn('EMERGENCY_PHONE1', 'EmergencyPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_PHONE2', 'EmergencyPhone2', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_PHONE1_COMMENT', 'EmergencyPhone1Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('EMERGENCY_PHONE2_COMMENT', 'EmergencyPhone2Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('COMMENT', 'Comment', 'VARCHAR', false, 125);

		$tMap->addColumn('PROCESSED_DATE', 'ProcessedDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('SESSION_ID', 'SessionId', 'INTEGER', false, 11);

		$tMap->addColumn('IP_ADDRESS', 'IpAddress', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_FAX_PHONE1', 'PassFaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('PASS_FAX_COMMENT1', 'PassFaxComment1', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_FIRST_NAME', 'GuarFirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_LAST_NAME', 'GuarLastName', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_ADDRESS1', 'GuarAddress1', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_ADDRESS2', 'GuarAddress2', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_CITY', 'GuarCity', 'VARCHAR', false, 30);

		$tMap->addColumn('GUAR_STATE', 'GuarState', 'CHAR', false, 2);

		$tMap->addColumn('GUAR_ZIPCODE', 'GuarZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('GUAR_DAY_PHONE', 'GuarDayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_DAY_COMMENT', 'GuarDayComment', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_EVE_PHONE', 'GuarEvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_EVE_COMMENT', 'GuarEveComment', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_FAX_PHONE1', 'GuarFaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_FAX_COMMENT1', 'GuarFaxComment1', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_MOBILE_PHONE', 'GuarMobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_MOBILE_COMMENT', 'GuarMobileComment', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_PAGER_PHONE', 'GuarPagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_PAGER_COMMENT', 'GuarPagerComment', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_OTHER_PHONE', 'GuarOtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('GUAR_OTHER_COMMENT', 'GuarOtherComment', 'VARCHAR', false, 40);

		$tMap->addColumn('GUAR_GUAR_EMAIL', 'GuarGuarEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_FAX_PHONE1', 'ReqFaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('REQ_FAX_COMMENT1', 'ReqFaxComment1', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_ENGLISH', 'PassEnglish', 'TINYINT', false, 4);

		$tMap->addColumn('PASS_LANGUAGE', 'PassLanguage', 'VARCHAR', false, 20);

		$tMap->addColumn('APPT_TIME', 'ApptTime', 'VARCHAR', false, 20);

		$tMap->addColumn('REQUESTER_ID', 'RequesterId', 'INTEGER', false, 11);

		$tMap->addColumn('PASSENGER_ID', 'PassengerId', 'INTEGER', false, 11);

		$tMap->addColumn('MISSION_ID', 'MissionId', 'INTEGER', false, 11);

		$tMap->addColumn('TREATING_EMAIL', 'TreatingEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('PASS_HEIGHT', 'PassHeight', 'INTEGER', false, 11);

		$tMap->addColumn('RETURN_TIME', 'ReturnTime', 'VARCHAR', false, 20);

		$tMap->addColumn('PASS_OXYGEN', 'PassOxygen', 'TINYINT', false, 4);

		$tMap->addColumn('PASS_MEDICAL', 'PassMedical', 'TINYINT', false, 4);

		$tMap->addColumn('REFERRAL_SOURCE_ID', 'ReferralSourceId', 'INTEGER', false, 11);

		$tMap->addColumn('FOLLOW_UP_CONTACT_NAME', 'FollowUpContactName', 'VARCHAR', false, 40);

		$tMap->addColumn('FOLLOW_UP_CONTACT_PHONE', 'FollowUpContactPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FOLLOW_UP_EMAIL', 'FollowUpEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('MISS_REQ_ORIGINATOR_AFA_ORG_ID', 'MissReqOriginatorAfaOrgId', 'INTEGER', false, 11);

		$tMap->addColumn('AFA_ORG_ID', 'AfaOrgId', 'INTEGER', false, 11);

		$tMap->addColumn('AFA_ORG_MISSION_ID', 'AfaOrgMissionId', 'INTEGER', false, 11);

		$tMap->addColumn('MISSION_REQUEST_TYPE', 'MissionRequestType', 'INTEGER', false, 11);

		$tMap->addColumn('LAST_PAGE_PROCESSED', 'LastPageProcessed', 'INTEGER', false, 11);

		$tMap->addColumn('GUARDIAN_MIDDLE_NAME', 'GuardianMiddleName', 'VARCHAR', false, 40);

		$tMap->addColumn('GUARDIAN_NICKNAME', 'GuardianNickname', 'VARCHAR', false, 40);

		$tMap->addColumn('GUARDIAN_PAGER_EMAIL', 'GuardianPagerEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('GUARDIAN_SECONDARY_EMAIL', 'GuardianSecondaryEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('GUARDIAN_SUFFIX', 'GuardianSuffix', 'VARCHAR', false, 25);

		$tMap->addColumn('GUARDIAN_TITLE', 'GuardianTitle', 'VARCHAR', false, 7);

		$tMap->addColumn('GUARDIAN_VETERAN', 'GuardianVeteran', 'TINYINT', false, 4);

		$tMap->addColumn('PASS_GENDER', 'PassGender', 'VARCHAR', false, 7);

		$tMap->addColumn('PASS_MIDDLE_NAME', 'PassMiddleName', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_NICKNAME', 'PassNickname', 'VARCHAR', false, 40);

		$tMap->addColumn('PASS_PAGER_EMAIL', 'PassPagerEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('PASS_SECONDARY_EMAIL', 'PassSecondaryEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('PASS_SUFFIX', 'PassSuffix', 'VARCHAR', false, 25);

		$tMap->addColumn('PASS_VETERAN', 'PassVeteran', 'TINYINT', false, 4);

		$tMap->addColumn('REQ_MIDDLE_NAME', 'ReqMiddleName', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_NICKNAME', 'ReqNickname', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_PAGER_EMAIL', 'ReqPagerEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_SECONDARY_EMAIL', 'ReqSecondaryEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('REQ_SUFFIX', 'ReqSuffix', 'VARCHAR', false, 25);

		$tMap->addColumn('REQ_VETERAN', 'ReqVeteran', 'TINYINT', false, 4);

		$tMap->addColumn('LODGING_PHONE_COMMENT', 'LodgingPhoneComment', 'VARCHAR', false, 40);

		$tMap->addColumn('REQ_GENDER', 'ReqGender', 'VARCHAR', false, 7);

		$tMap->addColumn('GUARDIAN_GENDER', 'GuardianGender', 'VARCHAR', false, 7);

		$tMap->addColumn('AGENCY_POSITION', 'AgencyPosition', 'VARCHAR', false, 40);

	} // doBuild()

} // MissionRequestTempMapBuilder
