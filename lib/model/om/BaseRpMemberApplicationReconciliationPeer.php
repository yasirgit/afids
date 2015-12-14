<?php

/**
 * Base static class for performing query and update operations on the 'rp_member_application_reconciliation' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:32 2011
 *
 * @package    lib.model.om
 */
abstract class BaseRpMemberApplicationReconciliationPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'rp_member_application_reconciliation';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.RpMemberApplicationReconciliation';

	/** The total number of columns. */
	const NUM_COLUMNS = 21;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the FIRST_NAME field */
	const FIRST_NAME = 'rp_member_application_reconciliation.FIRST_NAME';

	/** the column name for the LAST_NAME field */
	const LAST_NAME = 'rp_member_application_reconciliation.LAST_NAME';

	/** the column name for the EXTERNAL_ID field */
	const EXTERNAL_ID = 'rp_member_application_reconciliation.EXTERNAL_ID';

	/** the column name for the RENEWAL field */
	const RENEWAL = 'rp_member_application_reconciliation.RENEWAL';

	/** the column name for the DUES_AMOUNT_PAID field */
	const DUES_AMOUNT_PAID = 'rp_member_application_reconciliation.DUES_AMOUNT_PAID';

	/** the column name for the METHOD_OF_PAYMENT field */
	const METHOD_OF_PAYMENT = 'rp_member_application_reconciliation.METHOD_OF_PAYMENT';

	/** the column name for the CHECK_NUMBER field */
	const CHECK_NUMBER = 'rp_member_application_reconciliation.CHECK_NUMBER';

	/** the column name for the DONATION_AMOUNT_PAID field */
	const DONATION_AMOUNT_PAID = 'rp_member_application_reconciliation.DONATION_AMOUNT_PAID';

	/** the column name for the APPLICATION_DATE field */
	const APPLICATION_DATE = 'rp_member_application_reconciliation.APPLICATION_DATE';

	/** the column name for the APPLICATIONDATEDISPLAY field */
	const APPLICATIONDATEDISPLAY = 'rp_member_application_reconciliation.APPLICATIONDATEDISPLAY';

	/** the column name for the PROCESSEDDATE field */
	const PROCESSEDDATE = 'rp_member_application_reconciliation.PROCESSEDDATE';

	/** the column name for the CCARD_APPROVAL_NUMBER field */
	const CCARD_APPROVAL_NUMBER = 'rp_member_application_reconciliation.CCARD_APPROVAL_NUMBER';

	/** the column name for the PAYMENT_TRANSACTION_ID field */
	const PAYMENT_TRANSACTION_ID = 'rp_member_application_reconciliation.PAYMENT_TRANSACTION_ID';

	/** the column name for the MEMBER_CLASS_ID field */
	const MEMBER_CLASS_ID = 'rp_member_application_reconciliation.MEMBER_CLASS_ID';

	/** the column name for the MEMBERCLASS field */
	const MEMBERCLASS = 'rp_member_application_reconciliation.MEMBERCLASS';

	/** the column name for the MASTER_MEMBER_ID field */
	const MASTER_MEMBER_ID = 'rp_member_application_reconciliation.MASTER_MEMBER_ID';

	/** the column name for the MASTERMEMBEREXTERNALID field */
	const MASTERMEMBEREXTERNALID = 'rp_member_application_reconciliation.MASTERMEMBEREXTERNALID';

	/** the column name for the MASTERMEMBERFIRSTNAME field */
	const MASTERMEMBERFIRSTNAME = 'rp_member_application_reconciliation.MASTERMEMBERFIRSTNAME';

	/** the column name for the MASTERMEMBERLASTNAME field */
	const MASTERMEMBERLASTNAME = 'rp_member_application_reconciliation.MASTERMEMBERLASTNAME';

	/** the column name for the RENEWAL_DATE field */
	const RENEWAL_DATE = 'rp_member_application_reconciliation.RENEWAL_DATE';

	/** the column name for the ID field */
	const ID = 'rp_member_application_reconciliation.ID';

	/**
	 * An identiy map to hold any loaded instances of RpMemberApplicationReconciliation objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array RpMemberApplicationReconciliation[]
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
		BasePeer::TYPE_PHPNAME => array ('FirstName', 'LastName', 'ExternalId', 'Renewal', 'DuesAmountPaid', 'MethodOfPayment', 'CheckNumber', 'DonationAmountPaid', 'ApplicationDate', 'Applicationdatedisplay', 'Processeddate', 'CcardApprovalNumber', 'PaymentTransactionId', 'MemberClassId', 'Memberclass', 'MasterMemberId', 'Mastermemberexternalid', 'Mastermemberfirstname', 'Mastermemberlastname', 'RenewalDate', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('firstName', 'lastName', 'externalId', 'renewal', 'duesAmountPaid', 'methodOfPayment', 'checkNumber', 'donationAmountPaid', 'applicationDate', 'applicationdatedisplay', 'processeddate', 'ccardApprovalNumber', 'paymentTransactionId', 'memberClassId', 'memberclass', 'masterMemberId', 'mastermemberexternalid', 'mastermemberfirstname', 'mastermemberlastname', 'renewalDate', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::FIRST_NAME, self::LAST_NAME, self::EXTERNAL_ID, self::RENEWAL, self::DUES_AMOUNT_PAID, self::METHOD_OF_PAYMENT, self::CHECK_NUMBER, self::DONATION_AMOUNT_PAID, self::APPLICATION_DATE, self::APPLICATIONDATEDISPLAY, self::PROCESSEDDATE, self::CCARD_APPROVAL_NUMBER, self::PAYMENT_TRANSACTION_ID, self::MEMBER_CLASS_ID, self::MEMBERCLASS, self::MASTER_MEMBER_ID, self::MASTERMEMBEREXTERNALID, self::MASTERMEMBERFIRSTNAME, self::MASTERMEMBERLASTNAME, self::RENEWAL_DATE, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('first_name', 'last_name', 'external_id', 'renewal', 'dues_amount_paid', 'method_of_payment', 'check_number', 'donation_amount_paid', 'application_date', 'applicationDateDisplay', 'processedDate', 'ccard_approval_number', 'payment_transaction_id', 'member_class_id', 'memberClass', 'master_member_id', 'masterMemberExternalID', 'masterMemberFirstName', 'masterMemberLastName', 'renewal_date', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('FirstName' => 0, 'LastName' => 1, 'ExternalId' => 2, 'Renewal' => 3, 'DuesAmountPaid' => 4, 'MethodOfPayment' => 5, 'CheckNumber' => 6, 'DonationAmountPaid' => 7, 'ApplicationDate' => 8, 'Applicationdatedisplay' => 9, 'Processeddate' => 10, 'CcardApprovalNumber' => 11, 'PaymentTransactionId' => 12, 'MemberClassId' => 13, 'Memberclass' => 14, 'MasterMemberId' => 15, 'Mastermemberexternalid' => 16, 'Mastermemberfirstname' => 17, 'Mastermemberlastname' => 18, 'RenewalDate' => 19, 'Id' => 20, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('firstName' => 0, 'lastName' => 1, 'externalId' => 2, 'renewal' => 3, 'duesAmountPaid' => 4, 'methodOfPayment' => 5, 'checkNumber' => 6, 'donationAmountPaid' => 7, 'applicationDate' => 8, 'applicationdatedisplay' => 9, 'processeddate' => 10, 'ccardApprovalNumber' => 11, 'paymentTransactionId' => 12, 'memberClassId' => 13, 'memberclass' => 14, 'masterMemberId' => 15, 'mastermemberexternalid' => 16, 'mastermemberfirstname' => 17, 'mastermemberlastname' => 18, 'renewalDate' => 19, 'id' => 20, ),
		BasePeer::TYPE_COLNAME => array (self::FIRST_NAME => 0, self::LAST_NAME => 1, self::EXTERNAL_ID => 2, self::RENEWAL => 3, self::DUES_AMOUNT_PAID => 4, self::METHOD_OF_PAYMENT => 5, self::CHECK_NUMBER => 6, self::DONATION_AMOUNT_PAID => 7, self::APPLICATION_DATE => 8, self::APPLICATIONDATEDISPLAY => 9, self::PROCESSEDDATE => 10, self::CCARD_APPROVAL_NUMBER => 11, self::PAYMENT_TRANSACTION_ID => 12, self::MEMBER_CLASS_ID => 13, self::MEMBERCLASS => 14, self::MASTER_MEMBER_ID => 15, self::MASTERMEMBEREXTERNALID => 16, self::MASTERMEMBERFIRSTNAME => 17, self::MASTERMEMBERLASTNAME => 18, self::RENEWAL_DATE => 19, self::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('first_name' => 0, 'last_name' => 1, 'external_id' => 2, 'renewal' => 3, 'dues_amount_paid' => 4, 'method_of_payment' => 5, 'check_number' => 6, 'donation_amount_paid' => 7, 'application_date' => 8, 'applicationDateDisplay' => 9, 'processedDate' => 10, 'ccard_approval_number' => 11, 'payment_transaction_id' => 12, 'member_class_id' => 13, 'memberClass' => 14, 'master_member_id' => 15, 'masterMemberExternalID' => 16, 'masterMemberFirstName' => 17, 'masterMemberLastName' => 18, 'renewal_date' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RpMemberApplicationReconciliationMapBuilder();
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
	 * @param      string $column The column name for current table. (i.e. RpMemberApplicationReconciliationPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RpMemberApplicationReconciliationPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::FIRST_NAME);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::LAST_NAME);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::EXTERNAL_ID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::RENEWAL);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::DUES_AMOUNT_PAID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::METHOD_OF_PAYMENT);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::CHECK_NUMBER);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::DONATION_AMOUNT_PAID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::APPLICATION_DATE);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::APPLICATIONDATEDISPLAY);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::PROCESSEDDATE);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::CCARD_APPROVAL_NUMBER);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::PAYMENT_TRANSACTION_ID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MEMBER_CLASS_ID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MEMBERCLASS);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MASTER_MEMBER_ID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MASTERMEMBEREXTERNALID);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MASTERMEMBERFIRSTNAME);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::MASTERMEMBERLASTNAME);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::RENEWAL_DATE);

		$criteria->addSelectColumn(RpMemberApplicationReconciliationPeer::ID);

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
		$criteria->setPrimaryTableName(RpMemberApplicationReconciliationPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RpMemberApplicationReconciliationPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $criteria, $con);
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
	 * @return     RpMemberApplicationReconciliation
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RpMemberApplicationReconciliationPeer::doSelect($critcopy, $con);
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
		return RpMemberApplicationReconciliationPeer::populateObjects(RpMemberApplicationReconciliationPeer::doSelectStmt($criteria, $con));
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

    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RpMemberApplicationReconciliationPeer::addSelectColumns($criteria);
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
	 * @param      RpMemberApplicationReconciliation $value A RpMemberApplicationReconciliation object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(RpMemberApplicationReconciliation $obj, $key = null)
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
	 * @param      mixed $value A RpMemberApplicationReconciliation object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RpMemberApplicationReconciliation) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RpMemberApplicationReconciliation object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     RpMemberApplicationReconciliation Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		if ($row[$startcol + 20] === null) {
			return null;
		}
		return (string) $row[$startcol + 20];
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
		$cls = RpMemberApplicationReconciliationPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RpMemberApplicationReconciliationPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RpMemberApplicationReconciliationPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RpMemberApplicationReconciliationPeer::addInstanceToPool($obj, $key);
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
		return RpMemberApplicationReconciliationPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a RpMemberApplicationReconciliation or Criteria object.
	 *
	 * @param      mixed $values Criteria or RpMemberApplicationReconciliation object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from RpMemberApplicationReconciliation object
		}

		if ($criteria->containsKey(RpMemberApplicationReconciliationPeer::ID) && $criteria->keyContainsValue(RpMemberApplicationReconciliationPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RpMemberApplicationReconciliationPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a RpMemberApplicationReconciliation or Criteria object.
	 *
	 * @param      mixed $values Criteria or RpMemberApplicationReconciliation object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RpMemberApplicationReconciliationPeer::ID);
			$selectCriteria->add(RpMemberApplicationReconciliationPeer::ID, $criteria->remove(RpMemberApplicationReconciliationPeer::ID), $comparison);

		} else { // $values is RpMemberApplicationReconciliation object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseRpMemberApplicationReconciliationPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseRpMemberApplicationReconciliationPeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the rp_member_application_reconciliation table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RpMemberApplicationReconciliationPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a RpMemberApplicationReconciliation or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or RpMemberApplicationReconciliation object or primary key or array of primary keys
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
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RpMemberApplicationReconciliationPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof RpMemberApplicationReconciliation) {
			// invalidate the cache for this single object
			RpMemberApplicationReconciliationPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RpMemberApplicationReconciliationPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				RpMemberApplicationReconciliationPeer::removeInstanceFromPool($singleval);
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
	 * Validates all modified columns of given RpMemberApplicationReconciliation object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      RpMemberApplicationReconciliation $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(RpMemberApplicationReconciliation $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RpMemberApplicationReconciliationPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RpMemberApplicationReconciliationPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RpMemberApplicationReconciliationPeer::DATABASE_NAME, RpMemberApplicationReconciliationPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RpMemberApplicationReconciliationPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     RpMemberApplicationReconciliation
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RpMemberApplicationReconciliationPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RpMemberApplicationReconciliationPeer::DATABASE_NAME);
		$criteria->add(RpMemberApplicationReconciliationPeer::ID, $pk);

		$v = RpMemberApplicationReconciliationPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(RpMemberApplicationReconciliationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RpMemberApplicationReconciliationPeer::DATABASE_NAME);
			$criteria->add(RpMemberApplicationReconciliationPeer::ID, $pks, Criteria::IN);
			$objs = RpMemberApplicationReconciliationPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRpMemberApplicationReconciliationPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the RpMemberApplicationReconciliationPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the RpMemberApplicationReconciliationPeer class:
//
// Propel::getDatabaseMap(RpMemberApplicationReconciliationPeer::DATABASE_NAME)->addTableBuilder(RpMemberApplicationReconciliationPeer::TABLE_NAME, RpMemberApplicationReconciliationPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseRpMemberApplicationReconciliationPeer::DATABASE_NAME)->addTableBuilder(BaseRpMemberApplicationReconciliationPeer::TABLE_NAME, BaseRpMemberApplicationReconciliationPeer::getMapBuilder());

