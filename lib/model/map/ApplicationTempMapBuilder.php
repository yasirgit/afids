<?php


/**
 * This class adds structure of 'application_temp' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:25 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ApplicationTempMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ApplicationTempMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ApplicationTempPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ApplicationTempPeer::TABLE_NAME);
		$tMap->setPhpName('ApplicationTemp');
		$tMap->setClassname('ApplicationTemp');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('APPLICATION_DATE', 'ApplicationDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('RENEWAL', 'Renewal', 'TINYINT', false, 1);

		$tMap->addColumn('TITLE', 'Title', 'VARCHAR', false, 12);

		$tMap->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 40);

		$tMap->addColumn('ADDRESS1', 'Address1', 'VARCHAR', false, 40);

		$tMap->addColumn('ADDRESS2', 'Address2', 'VARCHAR', false, 40);

		$tMap->addColumn('CITY', 'City', 'VARCHAR', false, 30);

		$tMap->addColumn('STATE', 'State', 'VARCHAR', false, 2);

		$tMap->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('DAY_PHONE', 'DayPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('DAY_COMMENT', 'DayComment', 'VARCHAR', false, 40);

		$tMap->addColumn('EVE_PHONE', 'EvePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('EVE_COMMENT', 'EveComment', 'VARCHAR', false, 40);

		$tMap->addColumn('MOBILE_PHONE', 'MobilePhone', 'VARCHAR', false, 16);

		$tMap->addColumn('MOBILE_COMMENT', 'MobileComment', 'VARCHAR', false, 40);

		$tMap->addColumn('PAGER_PHONE', 'PagerPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('PAGER_COMMENT', 'PagerComment', 'VARCHAR', false, 40);

		$tMap->addColumn('FAX_PHONE1', 'FaxPhone1', 'VARCHAR', false, 16);

		$tMap->addColumn('FAX_COMMENT1', 'FaxComment1', 'VARCHAR', false, 40);

		$tMap->addColumn('FAX_PHONE2', 'FaxPhone2', 'VARCHAR', false, 16);

		$tMap->addColumn('FAX_COMMENT2', 'FaxComment2', 'VARCHAR', false, 40);

		$tMap->addColumn('OTHER_PHONE', 'OtherPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('OTHER_COMMENT', 'OtherComment', 'VARCHAR', false, 40);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 80);

		$tMap->addColumn('SPOUSE_FIRST_NAME', 'SpouseFirstName', 'VARCHAR', false, 40);

		$tMap->addColumn('SPOUSE_LAST_NAME', 'SpouseLastName', 'VARCHAR', false, 40);

		$tMap->addColumn('APPLICANT_PILOT', 'ApplicantPilot', 'TINYINT', false, 1);

		$tMap->addColumn('SPOUSE_PILOT', 'SpousePilot', 'TINYINT', false, 1);

		$tMap->addColumn('APPLICANT_COPILOT', 'ApplicantCopilot', 'TINYINT', false, 1);

		$tMap->addColumn('LANGUAGES_SPOKEN', 'LanguagesSpoken', 'VARCHAR', false, 125);

		$tMap->addColumn('HOME_BASE', 'HomeBase', 'VARCHAR', false, 20);

		$tMap->addColumn('FBO_NAME', 'FboName', 'VARCHAR', false, 80);

		$tMap->addColumn('AIRCRAFT_PRIMARY_ID', 'AircraftPrimaryId', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_PRIMARY_OWN', 'AircraftPrimaryOwn', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_PRIMARY_ICE', 'AircraftPrimaryIce', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_PRIMARY_SEATS', 'AircraftPrimarySeats', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_PRIMARY_N_NUMBER', 'AircraftPrimaryNNumber', 'VARCHAR', false, 10);

		$tMap->addColumn('AIRCRAFT_SECONDARY_ID', 'AircraftSecondaryId', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_SECONDARY_OWN', 'AircraftSecondaryOwn', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_SECONDARY_ICE', 'AircraftSecondaryIce', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_SECONDARY_SEATS', 'AircraftSecondarySeats', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_SECONDARY_N_NUMBER', 'AircraftSecondaryNNumber', 'VARCHAR', false, 10);

		$tMap->addColumn('PILOT_CERTIFICATE', 'PilotCertificate', 'VARCHAR', false, 40);

		$tMap->addColumn('RATINGS', 'Ratings', 'VARCHAR', false, 80);

		$tMap->addColumn('MEDICAL_CLASS', 'MedicalClass', 'INTEGER', false, 4);

		$tMap->addColumn('LICENSE_TYPE', 'LicenseType', 'VARCHAR', false, 10);

		$tMap->addColumn('TOTAL_HOURS', 'TotalHours', 'INTEGER', false, 4);

		$tMap->addColumn('IFR_HOURS', 'IfrHours', 'INTEGER', false, 4);

		$tMap->addColumn('MULTI_HOURS', 'MultiHours', 'INTEGER', false, 4);

		$tMap->addColumn('OTHER_HOURS', 'OtherHours', 'INTEGER', false, 4);

		$tMap->addColumn('DATE_OF_BIRTH', 'DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('HEIGHT', 'Height', 'INTEGER', false, 4);

		$tMap->addColumn('WEIGHT', 'Weight', 'INTEGER', false, 4);

		$tMap->addColumn('AVAILABILITY_WEEKDAYS', 'AvailabilityWeekdays', 'TINYINT', false, 1);

		$tMap->addColumn('AVAILABILITY_WEEKNIGHTS', 'AvailabilityWeeknights', 'TINYINT', false, 1);

		$tMap->addColumn('AVAILABILITY_WEEKENDS', 'AvailabilityWeekends', 'TINYINT', false, 1);

		$tMap->addColumn('AVAILABILITY_NOTICE', 'AvailabilityNotice', 'TINYINT', false, 1);

		$tMap->addColumn('AVAILABILITY_LAST_MINUTE', 'AvailabilityLastMinute', 'TINYINT', false, 1);

		$tMap->addColumn('AVAILABILITY_COPILOT', 'AvailabilityCopilot', 'TINYINT', false, 1);

		$tMap->addColumn('AFFIRMATION_AGREED', 'AffirmationAgreed', 'TINYINT', false, 1);

		$tMap->addColumn('INSURANCE_AGREED', 'InsuranceAgreed', 'TINYINT', false, 1);

		$tMap->addColumn('VOLUNTEER_INTEREST', 'VolunteerInterest', 'VARCHAR', false, 255);

		$tMap->addColumn('COMPANY_NAME', 'CompanyName', 'VARCHAR', false, 40);

		$tMap->addColumn('COMPANY_POSITION', 'CompanyPosition', 'VARCHAR', false, 40);

		$tMap->addColumn('COMPANY_MATCH_FUNDS', 'CompanyMatchFunds', 'TINYINT', false, 1);

		$tMap->addColumn('COMPANY_BUSINESS_CATEGORY_ID', 'CompanyBusinessCategoryId', 'INTEGER', false, 4);

		$tMap->addColumn('REFERRAL_SOURCE', 'ReferralSource', 'INTEGER', false, 11);

		$tMap->addColumn('PREMIUM_CHOICE', 'PremiumChoice', 'INTEGER', false, 4);

		$tMap->addColumn('PREMIUM_SIZE', 'PremiumSize', 'INTEGER', false, 4);

		$tMap->addColumn('DUES_AMOUNT_PAID', 'DuesAmountPaid', 'INTEGER', false, 8);

		$tMap->addColumn('DONATION_AMOUNT_PAID', 'DonationAmountPaid', 'INTEGER', false, 8);

		$tMap->addColumn('METHOD_OF_PAYMENT_ID', 'MethodOfPaymentId', 'INTEGER', false, 4);

		$tMap->addColumn('CCARD_APPROVAL_NUMBER', 'CcardApprovalNumber', 'VARCHAR', false, 20);

		$tMap->addColumn('CCARD_ERROR_CODE', 'CcardErrorCode', 'VARCHAR', false, 10);

		$tMap->addColumn('CCARD_AVS_RESULT', 'CcardAvsResult', 'VARCHAR', false, 25);

		$tMap->addColumn('PROCESSED_DATE', 'ProcessedDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('MEMBER_ID', 'MemberId', 'INTEGER', false, 4);

		$tMap->addColumn('MISSION_ORIENTATION', 'MissionOrientation', 'TINYINT', false, 1);

		$tMap->addColumn('MISSION_COORDINATION', 'MissionCoordination', 'TINYINT', false, 1);

		$tMap->addColumn('PILOT_RECRUITMENT', 'PilotRecruitment', 'TINYINT', false, 1);

		$tMap->addColumn('FUND_RAISING', 'FundRaising', 'TINYINT', false, 1);

		$tMap->addColumn('CELEBRITY_CONTACTS', 'CelebrityContacts', 'TINYINT', false, 1);

		$tMap->addColumn('HOSPITAL_OUTREACH', 'HospitalOutreach', 'TINYINT', false, 1);

		$tMap->addColumn('MEDIA_RELATIONS', 'MediaRelations', 'TINYINT', false, 1);

		$tMap->addColumn('TELEPHONE_WORK', 'TelephoneWork', 'TINYINT', false, 1);

		$tMap->addColumn('COMPUTERS', 'Computers', 'TINYINT', false, 1);

		$tMap->addColumn('CLERICAL', 'Clerical', 'TINYINT', false, 1);

		$tMap->addColumn('PUBLICITY', 'Publicity', 'TINYINT', false, 1);

		$tMap->addColumn('WRITING', 'Writing', 'TINYINT', false, 1);

		$tMap->addColumn('SPEAKERS_BUREAU', 'SpeakersBureau', 'TINYINT', false, 1);

		$tMap->addColumn('WING_TEAM', 'WingTeam', 'TINYINT', false, 1);

		$tMap->addColumn('GRAPHIC_ARTS', 'GraphicArts', 'TINYINT', false, 1);

		$tMap->addColumn('EVENT_PLANNING', 'EventPlanning', 'TINYINT', false, 1);

		$tMap->addColumn('WEB_INTERNET', 'WebInternet', 'TINYINT', false, 1);

		$tMap->addColumn('FOUNDATION_CONTACTS', 'FoundationContacts', 'TINYINT', false, 1);

		$tMap->addColumn('AVIATION_CONTACTS', 'AviationContacts', 'TINYINT', false, 1);

		$tMap->addColumn('PRINTING', 'Printing', 'TINYINT', false, 1);

		$tMap->addColumn('MEMBER_AOPA', 'MemberAopa', 'TINYINT', false, 1);

		$tMap->addColumn('MEMBER_KIWANIS', 'MemberKiwanis', 'TINYINT', false, 1);

		$tMap->addColumn('MEMBER_ROTARY', 'MemberRotary', 'TINYINT', false, 1);

		$tMap->addColumn('MEMBER_LIONS', 'MemberLions', 'TINYINT', false, 1);

		$tMap->addColumn('PERSON_ID', 'PersonId', 'INTEGER', false, 4);

		$tMap->addColumn('NOVAPOINTE_ID', 'NovapointeId', 'INTEGER', false, 4);

		$tMap->addColumn('PREMIUM_SHIP_DATE', 'PremiumShipDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('PREMIUM_SHIP_METHOD', 'PremiumShipMethod', 'VARCHAR', false, 10);

		$tMap->addColumn('PREMIUM_SHIP_COST', 'PremiumShipCost', 'INTEGER', false, 8);

		$tMap->addColumn('PREMIUM_SHIP_TRACKING_NUMBER', 'PremiumShipTrackingNumber', 'VARCHAR', false, 35);

		$tMap->addColumn('REFERER_NAME', 'RefererName', 'VARCHAR', false, 40);

		$tMap->addColumn('REFERRAL_SESSION_ID', 'ReferralSessionId', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_THIRD_ID', 'AircraftThirdId', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_THIRD_OWN', 'AircraftThirdOwn', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_THIRD_ICE', 'AircraftThirdIce', 'TINYINT', false, 1);

		$tMap->addColumn('AIRCRAFT_THIRD_SEATS', 'AircraftThirdSeats', 'INTEGER', false, 4);

		$tMap->addColumn('AIRCRAFT_THIRD_N_NUMBER', 'AircraftThirdNNumber', 'VARCHAR', false, 10);

		$tMap->addColumn('IP_ADDRESS', 'IpAddress', 'VARCHAR', false, 20);

		$tMap->addColumn('PAGER_EMAIL', 'PagerEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('MEMBER_99S', 'Member99s', 'TINYINT', false, 1);

		$tMap->addColumn('MEMBER_WIA', 'MemberWia', 'TINYINT', false, 1);

		$tMap->addColumn('MISSION_EMAIL_OPTIN', 'MissionEmailOptin', 'TINYINT', false, 1);

		$tMap->addColumn('HSEATS_INTEREST', 'HseatsInterest', 'TINYINT', false, 1);

		$tMap->addColumn('MASTER_APPLICATION_ID', 'MasterApplicationId', 'INTEGER', false, 4);

		$tMap->addColumn('MASTER_MEMBER_ID', 'MasterMemberId', 'INTEGER', false, 4);

		$tMap->addColumn('REFERRAL_SOURCE_OTHER', 'ReferralSourceOther', 'VARCHAR', false, 40);

		$tMap->addColumn('SECONDARY_EMAIL', 'SecondaryEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('PAYMENT_TRANSACTION_ID', 'PaymentTransactionId', 'INTEGER', false, 4);

		$tMap->addColumn('MIDDLE_NAME', 'MiddleName', 'VARCHAR', false, 40);

		$tMap->addColumn('SUFFIX', 'Suffix', 'VARCHAR', false, 25);

		$tMap->addColumn('NICKNAME', 'Nickname', 'VARCHAR', false, 40);

		$tMap->addColumn('VETERAN', 'Veteran', 'TINYINT', false, 1);

		$tMap->addColumn('GENDER', 'Gender', 'VARCHAR', false, 7);

		$tMap->addColumn('EMERGENCY_CONTACT_NAME', 'EmergencyContactName', 'VARCHAR', false, 40);

		$tMap->addColumn('EMERGENCY_CONTACT_PHONE', 'EmergencyContactPhone', 'VARCHAR', false, 40);

		$tMap->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 30);

		$tMap->addColumn('DRIVERS_LICENSE_STATE', 'DriversLicenseState', 'VARCHAR', false, 2);

		$tMap->addColumn('DRIVERS_LICENSE_NUMBER', 'DriversLicenseNumber', 'VARCHAR', false, 25);

		$tMap->addColumn('CCARD_NUMBER', 'CcardNumber', 'VARCHAR', false, 20);

		$tMap->addColumn('CCARD_CODE', 'CcardCode', 'VARCHAR', false, 5);

		$tMap->addColumn('CCARD_EXPIRE', 'CcardExpire', 'DATE', false, null);

		$tMap->addColumn('IS_COMPLETE', 'IsComplete', 'TINYINT', true, 1);

		$tMap->addColumn('MEMBER_CLASS_ID', 'MemberClassId', 'INTEGER', false, 11);

		$tMap->addColumn('WING_ID', 'WingId', 'INTEGER', false, 11);

	} // doBuild()

} // ApplicationTempMapBuilder