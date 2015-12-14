<?php


/**
 * This class adds structure of 'passenger' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:29 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PassengerMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PassengerMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(PassengerPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PassengerPeer::TABLE_NAME);
		$tMap->setPhpName('Passenger');
		$tMap->setClassname('Passenger');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addForeignKey('PERSON_ID', 'PersonId', 'INTEGER', 'person', 'ID', true, 11);

		$tMap->addForeignKey('PASSENGER_TYPE_ID', 'PassengerTypeId', 'INTEGER', 'passenger_type', 'ID', false, 11);

		$tMap->addColumn('PARENT', 'Parent', 'VARCHAR', false, 50);

		$tMap->addColumn('DATE_OF_BIRTH', 'DateOfBirth', 'TIMESTAMP', false, null);

		$tMap->addColumn('ILLNESS', 'Illness', 'VARCHAR', false, 60);

		$tMap->addColumn('FINANCIAL', 'Financial', 'VARCHAR', false, 255);

		$tMap->addColumn('WEIGHT', 'Weight', 'INTEGER', false, 2);

		$tMap->addColumn('PUBLIC_CONSIDERATIONS', 'PublicConsiderations', 'VARCHAR', false, 255);

		$tMap->addColumn('PRIVATE_CONSIDERATIONS', 'PrivateConsiderations', 'VARCHAR', false, 255);

		$tMap->addColumn('RELEASING_PHYSICIAN', 'ReleasingPhysician', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASING_PHONE', 'ReleasingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('LODGING_NAME', 'LodgingName', 'VARCHAR', false, 40);

		$tMap->addColumn('LODGING_PHONE', 'LodgingPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('LODGING_PHONE_COMMENT', 'LodgingPhoneComment', 'VARCHAR', false, 40);

		$tMap->addColumn('FACILITY_NAME', 'FacilityName', 'VARCHAR', false, 40);

		$tMap->addColumn('FACILITY_CITY', 'FacilityCity', 'VARCHAR', false, 50);

		$tMap->addColumn('FACILITY_STATE', 'FacilityState', 'VARCHAR', false, 2);

		$tMap->addColumn('FACILITY_PHONE', 'FacilityPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('FACILITY_PHONE_COMMENT', 'FacilityPhoneComment', 'VARCHAR', false, 40);

		$tMap->addForeignKey('REQUESTER_ID', 'RequesterId', 'INTEGER', 'requester', 'ID', false, 4);

		$tMap->addColumn('MEDICAL_RELEASE_REQUESTED', 'MedicalReleaseRequested', 'TIMESTAMP', false, null);

		$tMap->addColumn('MEDICAL_RELEASE_RECEIVED', 'MedicalReleaseReceived', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('PASSENGER_ILLNESS_CATEGORY_ID', 'PassengerIllnessCategoryId', 'INTEGER', 'passenger_illness_category', 'ID', false, 4);

		$tMap->addColumn('RELEASING_FAX1', 'ReleasingFax1', 'INTEGER', false, 16);

		$tMap->addColumn('RELEASING_FAX1_COMMENT', 'ReleasingFax1Comment', 'VARCHAR', false, 40);

		$tMap->addColumn('RELEASING_EMAIL', 'ReleasingEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('TREATING_PHYSICIAN', 'TreatingPhysician', 'VARCHAR', false, 40);

		$tMap->addColumn('TREATING_PHONE', 'TreatingPhone', 'INTEGER', false, 16);

		$tMap->addColumn('TREATING_FAX1', 'TreatingFax1', 'VARCHAR', false, 16);

		$tMap->addColumn('TREATING_FAX1_COMMENT', 'TreatingFax1Comment', 'VARCHAR', false, 80);

		$tMap->addColumn('TREATING_EMAIL', 'TreatingEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('LANGUAGE_SPOKEN', 'LanguageSpoken', 'VARCHAR', false, 30);

		$tMap->addColumn('BEST_CONTACT_METHOD', 'BestContactMethod', 'VARCHAR', false, 80);

		$tMap->addColumn('EMERGENCY_CONTACT_NAME', 'EmergencyContactName', 'VARCHAR', false, 40);

		$tMap->addColumn('EMERGENCY_CONTACT_PRIMARY_PHONE', 'EmergencyContactPrimaryPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_CONTACT_SECONDARY_PHONE', 'EmergencyContactSecondaryPhone', 'VARCHAR', false, 16);

		$tMap->addColumn('EMERGENCY_CONTACT_PRIMARY_COMMENT', 'EmergencyContactPrimaryComment', 'VARCHAR', false, 80);

		$tMap->addColumn('EMERGENCY_CONTACT_SECONDARY_COMMENT', 'EmergencyContactSecondaryComment', 'VARCHAR', false, 80);

		$tMap->addColumn('TRAVEL_HISTORY_NOTES', 'TravelHistoryNotes', 'VARCHAR', false, 255);

		$tMap->addColumn('NEED_MEDICAL_RELEASE', 'NeedMedicalRelease', 'TINYINT', false, 1);

		$tMap->addColumn('GROUND_TRANSPORTATION_COMMENT', 'GroundTransportationComment', 'VARCHAR', false, 255);

	} // doBuild()

} // PassengerMapBuilder
