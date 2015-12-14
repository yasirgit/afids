<?php


/**
 * This class adds structure of 'renewal' table to 'propel' DatabaseMap object.
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
class RenewalMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RenewalMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RenewalPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RenewalPeer::TABLE_NAME);
		$tMap->setPhpName('Renewal');
		$tMap->setClassname('Renewal');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('RENEWAL_DATE', 'RenewalDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('RENEWAL_DESC', 'RenewalDesc', 'VARCHAR', false, 25);

		$tMap->addColumn('RENEWAL_MONTH', 'RenewalMonth', 'INTEGER', false, 4);

		$tMap->addColumn('RENEWAL_YEAR', 'RenewalYear', 'INTEGER', false, 4);

		$tMap->addColumn('LETTER_COUNT', 'LetterCount', 'INTEGER', false, 4);

		$tMap->addColumn('INVOICE_TOTAL', 'InvoiceTotal', 'INTEGER', false, 4);

		$tMap->addColumn('PRODUCT_PRICE', 'ProductPrice', 'INTEGER', false, 4);

		$tMap->addColumn('PRINTING_COST_TOTAL', 'PrintingCostTotal', 'INTEGER', false, 4);

		$tMap->addColumn('VERIFIED_POSTAGE_COUNT', 'VerifiedPostageCount', 'INTEGER', false, 4);

		$tMap->addColumn('VERIFIED_POSTAGE_COST', 'VerifiedPostageCost', 'INTEGER', false, 4);

		$tMap->addColumn('UNVERIFIED_POSTAGE_COUNT', 'UnverifiedPostageCount', 'INTEGER', false, 4);

		$tMap->addColumn('UNVERIFIED_POSTAGE_COST', 'UnverifiedPostageCost', 'INTEGER', false, 4);

		$tMap->addColumn('UNDELIVERABLE_POSTAGE_COUNT', 'UndeliverablePostageCount', 'INTEGER', false, 4);

		$tMap->addColumn('UNDELIVERABLE_POSTAGE_COST', 'UndeliverablePostageCost', 'INTEGER', false, 4);

		$tMap->addColumn('INTERNATIONAL_POSTAGE_COUNT', 'InternationalPostageCount', 'INTEGER', false, 4);

		$tMap->addColumn('INTERNATIONAL_POSTAGE_COST', 'InternationalPostageCost', 'INTEGER', false, 4);

		$tMap->addColumn('POSTAGE_COST_TOTAL', 'PostageCostTotal', 'INTEGER', false, 4);

		$tMap->addColumn('MAILERS_CLUB_ORDER_NUMBER', 'MailersClubOrderNumber', 'INTEGER', false, 4);

		$tMap->addColumn('MAILERS_CLUB_ORDER_DATE', 'MailersClubOrderDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('MAILERS_CLUB_COMPLETED_DATE', 'MailersClubCompletedDate', 'TIMESTAMP', false, null);

		$tMap->addColumn('MAILERS_CLUB_MAILING_NAME', 'MailersClubMailingName', 'VARCHAR', false, 40);

		$tMap->addColumn('PROCESSING_LOG_TEXT', 'ProcessingLogText', 'VARCHAR', false, 2500);

		$tMap->addColumn('DATA_FILE_NAME', 'DataFileName', 'VARCHAR', false, 75);

		$tMap->addColumn('DATA_FILE_SIZE', 'DataFileSize', 'INTEGER', false, 4);

		$tMap->addColumn('PROOF_URL', 'ProofUrl', 'VARCHAR', false, 125);

		$tMap->addColumn('PROOF_APPROVED_DATE', 'ProofApprovedDate', 'TIMESTAMP', false, null);

	} // doBuild()

} // RenewalMapBuilder
