<?php

/**
 * Base static class for performing query and update operations on the 'rp_new_member_badge' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:32 2011
 *
 * @package    lib.model.om
 */
abstract class BaseRpNewMemberBadgePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'rp_new_member_badge';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.RpNewMemberBadge';

	/** The total number of columns. */
	const NUM_COLUMNS = 21;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the APPLICATIONID field */
	const APPLICATIONID = 'rp_new_member_badge.APPLICATIONID';

	/** the column name for the PERSONID field */
	const PERSONID = 'rp_new_member_badge.PERSONID';

	/** the column name for the MEMBERID field */
	const MEMBERID = 'rp_new_member_badge.MEMBERID';

	/** the column name for the EXTERNALID field */
	const EXTERNALID = 'rp_new_member_badge.EXTERNALID';

	/** the column name for the FIRSTNAME field */
	const FIRSTNAME = 'rp_new_member_badge.FIRSTNAME';

	/** the column name for the LASTNAME field */
	const LASTNAME = 'rp_new_member_badge.LASTNAME';

	/** the column name for the EMAIL field */
	const EMAIL = 'rp_new_member_badge.EMAIL';

	/** the column name for the ADDRESSONE field */
	const ADDRESSONE = 'rp_new_member_badge.ADDRESSONE';

	/** the column name for the ADDRESSTWO field */
	const ADDRESSTWO = 'rp_new_member_badge.ADDRESSTWO';

	/** the column name for the CITY field */
	const CITY = 'rp_new_member_badge.CITY';

	/** the column name for the STATE field */
	const STATE = 'rp_new_member_badge.STATE';

	/** the column name for the ZIPCODE field */
	const ZIPCODE = 'rp_new_member_badge.ZIPCODE';

	/** the column name for the BADGEMADE field */
	const BADGEMADE = 'rp_new_member_badge.BADGEMADE';

	/** the column name for the NOTEBOOKSENT field */
	const NOTEBOOKSENT = 'rp_new_member_badge.NOTEBOOKSENT';

	/** the column name for the ED_NEW_MEMBER_NOTIFY field */
	const ED_NEW_MEMBER_NOTIFY = 'rp_new_member_badge.ED_NEW_MEMBER_NOTIFY';

	/** the column name for the WN_NEW_MEMBERN_NTIFY field */
	const WN_NEW_MEMBERN_NTIFY = 'rp_new_member_badge.WN_NEW_MEMBERN_NTIFY';

	/** the column name for the JOINDATE field */
	const JOINDATE = 'rp_new_member_badge.JOINDATE';

	/** the column name for the FLIGHTSTATUS field */
	const FLIGHTSTATUS = 'rp_new_member_badge.FLIGHTSTATUS';

	/** the column name for the WING_ID field */
	const WING_ID = 'rp_new_member_badge.WING_ID';

	/** the column name for the JOINDATESORT field */
	const JOINDATESORT = 'rp_new_member_badge.JOINDATESORT';

	/** the column name for the ID field */
	const ID = 'rp_new_member_badge.ID';

	/**
	 * An identiy map to hold any loaded instances of RpNewMemberBadge objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array RpNewMemberBadge[]
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
		BasePeer::TYPE_PHPNAME => array ('Applicationid', 'Personid', 'Memberid', 'Externalid', 'Firstname', 'Lastname', 'Email', 'Addressone', 'Addresstwo', 'City', 'State', 'Zipcode', 'Badgemade', 'Notebooksent', 'EdNewMemberNotify', 'WnNewMembernNtify', 'Joindate', 'Flightstatus', 'WingId', 'Joindatesort', 'Id', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('applicationid', 'personid', 'memberid', 'externalid', 'firstname', 'lastname', 'email', 'addressone', 'addresstwo', 'city', 'state', 'zipcode', 'badgemade', 'notebooksent', 'edNewMemberNotify', 'wnNewMembernNtify', 'joindate', 'flightstatus', 'wingId', 'joindatesort', 'id', ),
		BasePeer::TYPE_COLNAME => array (self::APPLICATIONID, self::PERSONID, self::MEMBERID, self::EXTERNALID, self::FIRSTNAME, self::LASTNAME, self::EMAIL, self::ADDRESSONE, self::ADDRESSTWO, self::CITY, self::STATE, self::ZIPCODE, self::BADGEMADE, self::NOTEBOOKSENT, self::ED_NEW_MEMBER_NOTIFY, self::WN_NEW_MEMBERN_NTIFY, self::JOINDATE, self::FLIGHTSTATUS, self::WING_ID, self::JOINDATESORT, self::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('applicationID', 'personID', 'memberID', 'externalID', 'firstName', 'lastName', 'email', 'addressOne', 'addressTwo', 'city', 'state', 'zipcode', 'badgeMade', 'notebookSent', 'ed_new_member_notify', 'wn_new_memberN_ntify', 'joinDate', 'flightStatus', 'wing_id', 'joinDateSort', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Applicationid' => 0, 'Personid' => 1, 'Memberid' => 2, 'Externalid' => 3, 'Firstname' => 4, 'Lastname' => 5, 'Email' => 6, 'Addressone' => 7, 'Addresstwo' => 8, 'City' => 9, 'State' => 10, 'Zipcode' => 11, 'Badgemade' => 12, 'Notebooksent' => 13, 'EdNewMemberNotify' => 14, 'WnNewMembernNtify' => 15, 'Joindate' => 16, 'Flightstatus' => 17, 'WingId' => 18, 'Joindatesort' => 19, 'Id' => 20, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('applicationid' => 0, 'personid' => 1, 'memberid' => 2, 'externalid' => 3, 'firstname' => 4, 'lastname' => 5, 'email' => 6, 'addressone' => 7, 'addresstwo' => 8, 'city' => 9, 'state' => 10, 'zipcode' => 11, 'badgemade' => 12, 'notebooksent' => 13, 'edNewMemberNotify' => 14, 'wnNewMembernNtify' => 15, 'joindate' => 16, 'flightstatus' => 17, 'wingId' => 18, 'joindatesort' => 19, 'id' => 20, ),
		BasePeer::TYPE_COLNAME => array (self::APPLICATIONID => 0, self::PERSONID => 1, self::MEMBERID => 2, self::EXTERNALID => 3, self::FIRSTNAME => 4, self::LASTNAME => 5, self::EMAIL => 6, self::ADDRESSONE => 7, self::ADDRESSTWO => 8, self::CITY => 9, self::STATE => 10, self::ZIPCODE => 11, self::BADGEMADE => 12, self::NOTEBOOKSENT => 13, self::ED_NEW_MEMBER_NOTIFY => 14, self::WN_NEW_MEMBERN_NTIFY => 15, self::JOINDATE => 16, self::FLIGHTSTATUS => 17, self::WING_ID => 18, self::JOINDATESORT => 19, self::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('applicationID' => 0, 'personID' => 1, 'memberID' => 2, 'externalID' => 3, 'firstName' => 4, 'lastName' => 5, 'email' => 6, 'addressOne' => 7, 'addressTwo' => 8, 'city' => 9, 'state' => 10, 'zipcode' => 11, 'badgeMade' => 12, 'notebookSent' => 13, 'ed_new_member_notify' => 14, 'wn_new_memberN_ntify' => 15, 'joinDate' => 16, 'flightStatus' => 17, 'wing_id' => 18, 'joinDateSort' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new RpNewMemberBadgeMapBuilder();
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
	 * @param      string $column The column name for current table. (i.e. RpNewMemberBadgePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(RpNewMemberBadgePeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(RpNewMemberBadgePeer::APPLICATIONID);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::PERSONID);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::MEMBERID);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::EXTERNALID);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::FIRSTNAME);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::LASTNAME);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::EMAIL);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::ADDRESSONE);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::ADDRESSTWO);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::CITY);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::STATE);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::ZIPCODE);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::BADGEMADE);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::NOTEBOOKSENT);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::ED_NEW_MEMBER_NOTIFY);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::WN_NEW_MEMBERN_NTIFY);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::JOINDATE);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::FLIGHTSTATUS);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::WING_ID);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::JOINDATESORT);

		$criteria->addSelectColumn(RpNewMemberBadgePeer::ID);

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
		$criteria->setPrimaryTableName(RpNewMemberBadgePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			RpNewMemberBadgePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseRpNewMemberBadgePeer', $criteria, $con);
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
	 * @return     RpNewMemberBadge
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = RpNewMemberBadgePeer::doSelect($critcopy, $con);
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
		return RpNewMemberBadgePeer::populateObjects(RpNewMemberBadgePeer::doSelectStmt($criteria, $con));
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

    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseRpNewMemberBadgePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			RpNewMemberBadgePeer::addSelectColumns($criteria);
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
	 * @param      RpNewMemberBadge $value A RpNewMemberBadge object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(RpNewMemberBadge $obj, $key = null)
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
	 * @param      mixed $value A RpNewMemberBadge object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof RpNewMemberBadge) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RpNewMemberBadge object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     RpNewMemberBadge Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		$cls = RpNewMemberBadgePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = RpNewMemberBadgePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = RpNewMemberBadgePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				RpNewMemberBadgePeer::addInstanceToPool($obj, $key);
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
		return RpNewMemberBadgePeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a RpNewMemberBadge or Criteria object.
	 *
	 * @param      mixed $values Criteria or RpNewMemberBadge object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRpNewMemberBadgePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from RpNewMemberBadge object
		}

		if ($criteria->containsKey(RpNewMemberBadgePeer::ID) && $criteria->keyContainsValue(RpNewMemberBadgePeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.RpNewMemberBadgePeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseRpNewMemberBadgePeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a RpNewMemberBadge or Criteria object.
	 *
	 * @param      mixed $values Criteria or RpNewMemberBadge object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseRpNewMemberBadgePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(RpNewMemberBadgePeer::ID);
			$selectCriteria->add(RpNewMemberBadgePeer::ID, $criteria->remove(RpNewMemberBadgePeer::ID), $comparison);

		} else { // $values is RpNewMemberBadge object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseRpNewMemberBadgePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseRpNewMemberBadgePeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the rp_new_member_badge table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(RpNewMemberBadgePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a RpNewMemberBadge or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or RpNewMemberBadge object or primary key or array of primary keys
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
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			RpNewMemberBadgePeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof RpNewMemberBadge) {
			// invalidate the cache for this single object
			RpNewMemberBadgePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RpNewMemberBadgePeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				RpNewMemberBadgePeer::removeInstanceFromPool($singleval);
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
	 * Validates all modified columns of given RpNewMemberBadge object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      RpNewMemberBadge $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(RpNewMemberBadge $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RpNewMemberBadgePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RpNewMemberBadgePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RpNewMemberBadgePeer::DATABASE_NAME, RpNewMemberBadgePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RpNewMemberBadgePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     RpNewMemberBadge
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = RpNewMemberBadgePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(RpNewMemberBadgePeer::DATABASE_NAME);
		$criteria->add(RpNewMemberBadgePeer::ID, $pk);

		$v = RpNewMemberBadgePeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(RpNewMemberBadgePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(RpNewMemberBadgePeer::DATABASE_NAME);
			$criteria->add(RpNewMemberBadgePeer::ID, $pks, Criteria::IN);
			$objs = RpNewMemberBadgePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseRpNewMemberBadgePeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the RpNewMemberBadgePeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the RpNewMemberBadgePeer class:
//
// Propel::getDatabaseMap(RpNewMemberBadgePeer::DATABASE_NAME)->addTableBuilder(RpNewMemberBadgePeer::TABLE_NAME, RpNewMemberBadgePeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseRpNewMemberBadgePeer::DATABASE_NAME)->addTableBuilder(BaseRpNewMemberBadgePeer::TABLE_NAME, BaseRpNewMemberBadgePeer::getMapBuilder());

