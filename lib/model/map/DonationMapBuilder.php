<?php


/**
 * This class adds structure of 'donation' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:26 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class DonationMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DonationMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(DonationPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DonationPeer::TABLE_NAME);
		$tMap->setPhpName('Donation');
		$tMap->setClassname('Donation');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addForeignKey('DONOR_ID', 'DonorId', 'INTEGER', 'donor', 'ID', true, 11);

		$tMap->addColumn('GIFT_DATE', 'GiftDate', 'DATE', false, null);

		$tMap->addColumn('GIFT_AMOUNT', 'GiftAmount', 'INTEGER', false, 8);

		$tMap->addColumn('DEDUCTIBLE_AMOUNT', 'DeductibleAmount', 'INTEGER', false, 8);

		$tMap->addForeignKey('GIFT_TYPE', 'GiftType', 'INTEGER', 'gift_type', 'ID', true, 11);

		$tMap->addColumn('CHECK_NUMBER', 'CheckNumber', 'VARCHAR', false, 10);

		$tMap->addForeignKey('CAMPAIN_ID', 'CampainId', 'INTEGER', 'campaign', 'ID', true, 11);

		$tMap->addForeignKey('FUND_ID', 'FundId', 'INTEGER', 'fund', 'ID', true, 11);

		$tMap->addColumn('GIFT_NOTE', 'GiftNote', 'VARCHAR', false, 125);

		$tMap->addColumn('PRINTED_NOTE', 'PrintedNote', 'VARCHAR', false, 255);

		$tMap->addColumn('RECEIPT_GENERATED_DATE', 'ReceiptGeneratedDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('FOLLOW_UP', 'FollowUp', 'TINYINT', false, 1);

		$tMap->addColumn('PREMIUM_ORDER_DATE', 'PremiumOrderDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('TRIBUTE_FIRST_NAME', 'TributeFirstName', 'VARCHAR', false, 30);

		$tMap->addColumn('TRIBUTE_LAST_NAME', 'TributeLastName', 'VARCHAR', false, 30);

		$tMap->addColumn('TRIBUTE_ADDRESS1', 'TributeAddress1', 'VARCHAR', false, 30);

		$tMap->addColumn('TRIBUTE_ADDRESS2', 'TributeAddress2', 'VARCHAR', false, 30);

		$tMap->addColumn('TRIBUTE_CITY', 'TributeCity', 'VARCHAR', false, 30);

		$tMap->addColumn('TRIBUTE_STATE', 'TributeState', 'VARCHAR', false, 2);

		$tMap->addColumn('TRIBUTE_ZIPCODE', 'TributeZipcode', 'VARCHAR', false, 10);

		$tMap->addColumn('TRIBUTE_EMAIL', 'TributeEmail', 'VARCHAR', false, 80);

		$tMap->addColumn('TRIBUTE_CATEGORY', 'TributeCategory', 'VARCHAR', false, 20);

		$tMap->addColumn('TRIBUTE_MESSAGE', 'TributeMessage', 'VARCHAR', false, 255);

		$tMap->addColumn('TRIBUTE_DELIVER_BY', 'TributeDeliverBy', 'VARCHAR', false, 20);

		$tMap->addColumn('TRIBUTE_GIFT_ID', 'TributeGiftId', 'INTEGER', false, 11);

		$tMap->addColumn('PERSON_ID', 'PersonId', 'INTEGER', false, 11);

		$tMap->addColumn('PROCESSEDDATE', 'Processeddate', 'DATE', false, null);

		$tMap->addColumn('NOVAPOINTE_ID', 'NovapointeId', 'VARCHAR', false, 30);

		$tMap->addColumn('CCARD_APPROVAL_NUMBER', 'CcardApprovalNumber', 'VARCHAR', false, 30);

		$tMap->addColumn('NOVAPOINTE_FULFILLMENT_ID', 'NovapointeFulfillmentId', 'VARCHAR', false, 30);

		$tMap->addColumn('NOVAPOINTE_TRACKING_NUMBER', 'NovapointeTrackingNumber', 'VARCHAR', false, 40);

		$tMap->addColumn('NOVAPOINTE_SHIP_DATE', 'NovapointeShipDate', 'DATE', false, null);

		$tMap->addColumn('TRIBUTE_LETTER_SENT_DATE', 'TributeLetterSentDate', 'DATE', false, null);

		$tMap->addColumn('SEND_TRIBUTE_CARD', 'SendTributeCard', 'TINYINT', false, 1);

		$tMap->addColumn('TRIBUTE_IMAGE_ID', 'TributeImageId', 'INTEGER', false, 11);

		$tMap->addColumn('ECARD_READ_DATE', 'EcardReadDate', 'DATE', false, null);

		$tMap->addColumn('ECARDEMAILSENTDATE', 'Ecardemailsentdate', 'DATE', false, null);

		$tMap->addColumn('ECARD_EMAIL_SENT_RESULT', 'EcardEmailSentResult', 'INTEGER', false, 11);

	} // doBuild()

} // DonationMapBuilder