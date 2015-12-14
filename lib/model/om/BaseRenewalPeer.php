<?php

/**
 * Base static class for performing query and update operations on the 'renewal' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:31 2011
 *
 * @package    lib.model.om
 */
abstract class BaseRenewalPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'renewal';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Renewal';

	/** The total number of columns. */
	const NUM_COLUMNS = 27;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'renewal.ID';

	/** the column name for the RENEWAL_DATE field */
	const RENEWAL_DATE = 'renewal.RENEWAL_DATE';

	/** the column name for the RENEWAL_DESC field */
	const RENEWAL_DESC = 'renewal.RENEWAL_DESC';

	/** the column name for the RENEWAL_MONTH field */
	const RENEWAL_MONTH = 'renewal.RENEWAL_MONTH';

	/** the column name for the RENEWAL_YEAR field */
	const RENEWAL_YEAR = 'renewal.RENEWAL_YEAR';

	/** the column name for the LETTER_COUNT field */
	const LETTER_COUNT = 'renewal.LETTER_COUNT';

	/** the column name for the INVOICE_TOTAL field */
	const INVOICE_TOTAL = 'renewal.INVOICE_TOTAL';

	/** the column name for the PRODUCT_PRICE field */
	const PRODUCT_PRICE = 'renewal.PRODUCT_PRICE';

	/** the column name for the PRINTING_COST_TOTAL field */
	const PRINTING_COST_TOTAL = 'renewal.PRINTING_COST_TOTAL';

	/** the column name for the VERIFIED_POSTAGE_COUNT field */
	const VERIFIED_POSTAGE_COUNT = 'renewal.VERIFIED_POSTAGE_COUNT';

	/** the column name for the VERIFIED_POSTAGE_COST field */
	const VERIFIED_POSTAGE_COST = 'renewal.VERIFIED_POSTAGE_COST';

	/** the column name for the UNVERIFIED_POSTAGE_COUNT field */
	const UNVERIFIED_POSTAGE_COUNT = 'renewal.UNVERIFIED_POSTAGE_COUNT';

	/** the column name for the UNVERIFIED_POSTAGE_COST field */
	const UNVERIFIED_POSTAGE_COST = 'renewal.UNVERIFIED_POSTAGE_COST';

	/** the column name for the UNDELIVERABLE_POSTAGE_COUNT field */
	const UNDELIVERABLE_POSTAGE_COUNT = 'renewal.UNDELIVERABLE_POSTAGE_COUNT';

	/** the column name for the UNDELIVERABLE_POSTAGE_COST field */
	const UNDELIVERABLE_POSTAGE_COST = 'renewal.UNDELIVERABLE_POSTAGE_COST';

	/** the column name for the INTERNATIONAL_POSTAGE_COUNT field */
	const INTERNATIONAL_POSTAGE_COUNT = 'renewal.INTERNATIONAL_POSTAGE_COUNT';

	/** the column name for the INTERNATIONAL_POSTAGE_COST field */
	const INTERNATIONAL_POSTAGE_COST = 'renewal.INTERNATIONAL_POSTAGE_COST';

	/** the column name for the POSTAGE_COST_TOTAL field */
	const POSTAGE_COST_TOTAL = 'renewal.POSTAGE_COST_TOTAL';

	/** the column name for the MAILERS_CLUB_ORDER_NUMBER field */
	const MAILERS_CLUB_ORDER_NUMBER = 'renewal.MAILERS_CLUB_ORDER_NUMBER';

	/** the column name for the MAILERS_CLUB_ORDER_DATE field */
	const MAILERS_CLUB_ORDER_DATE = 'renewal.MAILERS_CLUB_ORDER_DATE';

	/** the column name for the MAILERS_CLUB_COMPLETED_DATE field */
	const MAILERS_CLUB_COMPLETED_DATE = 'renewal.MAILERS_CLUB_COMPLETED_DATE';

	/** the column name for the MAILERS_CLUB_MAILING_NAME field */
	const MAILERS_CLUB_MAILING_NAME = 'renewal.MAILERS_CLUB_MAILING_NAME';

	/** the column name for the PROCESSING_LOG_TEXT field */
	const PROCESSING_LOG_TEXT = 'renewal.PROCESSING_LOG_TEXT';

	/** the column name for the DATA_FILE_NAME field */
	const DATA_FILE_NAME = 'renewal.DATA_FILE_NAME';

	/** the column name for the DATA_FILE_SIZE field */
	const DATA_FILE_SIZE = 'renewal.DATA_FILE_SIZE';

	/** the column name for the PROOF_URL field */
	const PROOF_URL = 'renewal.PROOF_URL';

	/** the column name for the PROOF_APPROVED_DATE field */
	const PROOF_APPROVED_DATE = 'renewal.PROOF_APPROVED_DATE';

	/**
	 * An identiy map to hold any loaded instances of Renewal objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Renewal[]
	 */
	public static $instances = array();

	/**
	 * The MapBuilder instance for this peer.
	 * @var        MapBuilder
	 */
	private static $mapBuilder = null;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'RenewalDate', 'RenewalDesc', 'RenewalMonth', 'RenewalYear', 'LetterCount', 'InvoiceTotal', 'ProductPrice', 'PrintingCostTotal', 'VerifiedPostageCount', 'VerifiedPostageCost', 'UnverifiedPostageCount', 'UnverifiedPostageCost', 'UndeliverablePostageCount', 'UndeliverablePostageCost', 'InternationalPostageCount', 'InternationalPostageCost', 'PostageCostTotal', 'MailersClubOrderNumber', 'MailersClubOrderDate', 'MailersClubCompletedDate', 'MailersClubMailingName', 'ProcessingLogText', 'DataFileName', 'DataFileSize', 'ProofUrl', 'ProofApprovedDate', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'renewalDate', 'renewalDesc', 'renewalMonth', 'renewalYear', 'letterCount', 'invoiceTotal', 'productPrice', 'printingCostTotal', 'verifiedPostageCount', 'verifiedPostageCost', 'unverifiedPostageCount', 'unverifiedPostageCost', 'undeliverablePostageCount', 'undeliverablePostageCost', 'internationalPostageCount', 'internationalPostageCost', 'postageCostTotal', 'mailersClubOrderNumber', 'mailersClubOrderDate', 'mailersClubCompletedDate', 'mailersClubMailingName', 'processingLogText', 'dataFileName', 'dataFileSize', 'proofUrl', 'proofApprovedDate', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::RENEWAL_DATE, self::RENEWAL_DESC, self::RENEWAL_MONTH, self::RENEWAL_YEAR, self::LETTER_COUNT, self::INVOICE_TOTAL, self::PRODUCT_PRICE, self::PRINTING_COST_TOTAL, self::VERIFIED_POSTAGE_COUNT, self::VERIFIED_POSTAGE_COST, self::UNVERIFIED_POSTAGE_COUNT, self::UNVERIFIED_POSTAGE_COST, self::UNDELIVERABLE_POSTAGE_COUNT, self::UNDELIVERABLE_POSTAGE_COST, self::INTERNATIONAL_POSTAGE_COUNT, self::INTERNATIONAL_POSTAGE_COST, self::POSTAGE_COST_TOTAL, self::MAILERS_CLUB_ORDER_NUMBER, self::MAILERS_CLUB_ORDER_DATE, self::MAILERS_CLUB_COMPLETED_DATE, self::MAILERS_CLUB_MAILING_NAME, self::PROCESSING_LOG_TEXT, self::DATA_FILE_NAME, self::DATA_FILE_SIZE, self::PROOF_URL, self::PROOF_APPROVED_DATE, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'renewal_date', 'renewal_desc', 'renewal_month', 'renewal_year', 'letter_count', 'invoice_total', 'product_price', 'printing_cost_total', 'verified_postage_count', 'verified_postage_cost', 'unverified_postage_count', 'unverified_postage_cost', 'undeliverable_postage_count', 'undeliverable_postage_cost', 'international_postage_count', 'international_postage_cost', 'postage_cost_total', 'mailers_club_order_number', 'mailers_club_order_date', 'mailers_club_completed_date', 'mailers_club_mailing_name', 'processing_log_text', 'data_file_name', 'data_file_size', 'proof_url', 'proof_approved_date', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'RenewalDate' => 1, 'RenewalDesc' => 2, 'RenewalMonth' => 3, 'RenewalYear' => 4, 'LetterCount' => 5, 'InvoiceTotal' => 6, 'ProductPrice' => 7, 'PrintingCostTotal' => 8, 'VerifiedPostageCount' => 9, 'VerifiedPostageCost' => 10, 'UnverifiedPostageCount' => 11, 'UnverifiedPostageCost' => 12, 'UndeliverablePostageCount' => 13, 'UndeliverablePostageCost' => 14, 'InternationalPostageCount' => 15, 'InternationalPostageCost' => 16, 'PostageCostTotal' => 17, 'MailersClubOrderNumber' => 18, 'MailersClubOrderDate' => 19, 'MailersClubCompletedDate' => 20, 'MailersClubMailingName' => 21, 'ProcessingLogText' => 22, 'DataFileName' => 23, 'DataFileSize' => 24, 'ProofUrl' => 25, 'ProofApprovedDate' => 26, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'renewalDate' => 1, 'renewalDesc' => 2, 'renewalMonth' => 3, 'renewalYear' => 4, 'letterCount' => 5, 'invoiceTotal' => 6, 'productPrice' => 7, 'printingCostTotal' => 8, 'verifiedPostageCount' => 9, 'verifiedPostageCost' => 10, 'unverifiedPostageCount' => 11, 'unverifiedPostageCost' => 12, 'undeliverablePostageCount' => 13, 'undeliverablePostageCost' => 14, 'internationalPostageCount' => 15, 'internationalPostageCost' => 16, 'postageCostTotal' => 17, 'mailersClubOrderNumber' => 18, 'mailersClubOrderDate' => 19, 'mailersClubCompletedDate' => 20, 'mailersClubMailingName' => 21, 'processingLogText' => 22, 'dataFileName' => 23, 'dataFileSize' => 24, 'proofUrl' => 25, 'proofApprovedDate' => 26, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::RENEWAL_DATE => 1, self::RENEWAL_DESC => 2, self::RENEWAL_MONTH => 3, self::RENEWAL_YEAR => 4, self::LETTER_COUNT => 5, self::INVOICE_TOTAL => 6, self::PRODUCT_PRICE => 7, self::PRINTING_COST_TOTAL => 8, self::VERIFIED_POSTAGE_COUNT => 9, self::VERIFIED_POSTAGE_COST => 10, self::UNVERIFIED_POSTAGE_COUNT => 11, self::UNVERIFIED_POSTAGE_COST => 12, self::UNDELIVERABLE_POSTAGE_COUNT => 13, self::UNDELIVERABLE_POSTAGE_COST => 14, self::INTERNATIONAL_POSTAGE_COUNT => 15, self::INTERNATIONAL_POSTAGE_COST => 16, self::POSTAGE_COST_TOTAL => 17, self::MAILERS_CLUB_ORDER_NUMBER => 18, self::MAILERS_CLUB_ORDER_DATE => 19, self::MAILERS_CLUB_COMPLETED_DATE => 20, self::MAILERS_CLUB_MAILING_NAME => 21, self::PROCESSING_LOG_TEXT => 22, self::DATA_FILE_NAME => 23, self::DATA_FILE_SIZE => 24, self::PROOF_URL => 25, self::PROOF_APPROVED_DATE => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'renewal_date' => 1, 'renewal_desc' => 2, 'renewal_month' => 3, 'renewal_year' => 4, 'letter_count' => 5, 'invoice_total' => 6, 'product_price' => 7, 'printing_cost_total' => 8, 'verified_postage_count' => 9, 'verified_postage_cost' => 10, 'unverified_postage_count' => 11, 'unverified_postage_cost' => 12, 'undeliverable_postage_count' => 13, 'undeliverable_postage_cost' => 14, 'international_postage_count' => 15, 'international_postage_cost' => 16, 'postage_cost_total' => 17, 'mailers_club_order_number' => 18, 'mailers_club_order_date' => 19, 'mailers_club_completed_date' => 20, 'mailers_club_mailing_name' => 21, 'processing_log_text' => 22, 'data_file_name' => 23, 'data_file_size' => 24, 'proof_url' => 25, 'proof_approved_date' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RenewalMapBuilder();
		}
		return self::$mapBuilder;
	}
	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. RenewalPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RenewalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RenewalPeer::ID);

		$criteria->addSelectColumn(RenewalPeer::RENEWAL_DATE);

		$criteria->addSelectColumn(RenewalPeer::RENEWAL_DESC);

		$criteria->addSelectColumn(RenewalPeer::RENEWAL_MONTH);

		$criteria->addSelectColumn(RenewalPeer::RENEWAL_YEAR);

		$criteria->addSelectColumn(RenewalPeer::LETTER_COUNT);

		$criteria->addSelectColumn(RenewalPeer::INVOICE_TOTAL);

		$criteria->addSelectColumn(RenewalPeer::PRODUCT_PRICE);

		$criteria->addSelectColumn(RenewalPeer::PRINTING_COST_TOTAL);

		$criteria->addSelectColumn(RenewalPeer::VERIFIED_POSTAGE_COUNT);

		$criteria->addSelectColumn(RenewalPeer::VERIFIED_POSTAGE_COST);

		$criteria->addSelectColumn(RenewalPeer::UNVERIFIED_POSTAGE_COUNT);

		$criteria->addSelectColumn(RenewalPeer::UNVERIFIED_POSTAGE_COST);

		$criteria->addSelectColumn(RenewalPeer::UNDELIVERABLE_POSTAGE_COUNT);

		$criteria->addSelectColumn(RenewalPeer::UNDELIVERABLE_POSTAGE_COST);

		$criteria->addSelectColumn(RenewalPeer::INTERNATIONAL_POSTAGE_COUNT);

		$criteria->addSelectColumn(RenewalPeer::INTERNATIONAL_POSTAGE_COST);

		$criteria->addSelectColumn(RenewalPeer::POSTAGE_COST_TOTAL);

		$criteria->addSelectColumn(RenewalPeer::MAILERS_CLUB_ORDER_NUMBER);

		$criteria->addSelectColumn(RenewalPeer::MAILERS_CLUB_ORDER_DATE);

		$criteria->addSelectColumn(RenewalPeer::MAILERS_CLUB_COMPLETED_DATE);

		$criteria->addSelectColumn(RenewalPeer::MAILERS_CLUB_MAILING_NAME);

		$criteria->addSelectColumn(RenewalPeer::PROCESSING_LOG_TEXT);

		$criteria->addSelectColumn(RenewalPeer::DATA_FILE_NAME);

		$criteria->addSelectColumn(RenewalPeer::DATA_FILE_SIZE);

		$criteria->addSelectColumn(RenewalPeer::PROOF_URL);

		$criteria->addSelectColumn(RenewalPeer::PROOF_APPROVED_DATE);

	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(RenewalPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RenewalPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseRenewalPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseRenewalPeer', $criteria, $con);
    }


		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Renewal
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RenewalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return RenewalPeer::populateObjects(RenewalPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRenewalPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseRenewalPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RenewalPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      Renewal $value A Renewal object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Renewal $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A Renewal object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Renewal) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Renewal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     Renewal Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = RenewalPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RenewalPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RenewalPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RenewalPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array();
  }
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return RenewalPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a Renewal or Criteria object.
	 *
	 * @param      mixed $values Criteria or Renewal object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRenewalPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRenewalPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Renewal object
		}

		if ($criteria->containsKey(RenewalPeer::ID) && $criteria->keyContainsValue(RenewalPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RenewalPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseRenewalPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseRenewalPeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a Renewal or Criteria object.
	 *
	 * @param      mixed $values Criteria or Renewal object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRenewalPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRenewalPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RenewalPeer::ID);
			$selectCriteria->add(RenewalPeer::ID, $criteria->remove(RenewalPeer::ID), $comparison);

		} else { // $values is Renewal object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseRenewalPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseRenewalPeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the renewal table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RenewalPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Renewal or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Renewal object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RenewalPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Renewal) {
			// invalidate the cache for this single object
			RenewalPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RenewalPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				RenewalPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Renewal object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Renewal $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Renewal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RenewalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RenewalPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(RenewalPeer::DATABASE_NAME, RenewalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RenewalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Renewal
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RenewalPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RenewalPeer::DATABASE_NAME);
		$criteria->add(RenewalPeer::ID, $pk);

		$v = RenewalPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RenewalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RenewalPeer::DATABASE_NAME);
			$criteria->add(RenewalPeer::ID, $pks, Criteria::IN);
			$objs = RenewalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRenewalPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the RenewalPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the RenewalPeer class:
//
// Propel::getDatabaseMap(RenewalPeer::DATABASE_NAME)->addTableBuilder(RenewalPeer::TABLE_NAME, RenewalPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseRenewalPeer::DATABASE_NAME)->addTableBuilder(BaseRenewalPeer::TABLE_NAME, BaseRenewalPeer::getMapBuilder());

