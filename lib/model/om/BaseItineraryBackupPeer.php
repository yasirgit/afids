<?php

/**
 * Base static class for performing query and update operations on the 'itinerary_backup' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:26 2011
 *
 * @package    lib.model.om
 */
abstract class BaseItineraryBackupPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'itinerary_backup';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.ItineraryBackup';

	/** The total number of columns. */
	const NUM_COLUMNS = 20;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'itinerary_backup.ID';

	/** the column name for the DATE_REQUESTED field */
	const DATE_REQUESTED = 'itinerary_backup.DATE_REQUESTED';

	/** the column name for the MISSION_REQUEST_ID field */
	const MISSION_REQUEST_ID = 'itinerary_backup.MISSION_REQUEST_ID';

	/** the column name for the MISSION_TYPE_ID field */
	const MISSION_TYPE_ID = 'itinerary_backup.MISSION_TYPE_ID';

	/** the column name for the APOINT_TIME field */
	const APOINT_TIME = 'itinerary_backup.APOINT_TIME';

	/** the column name for the PASSENGER_ID field */
	const PASSENGER_ID = 'itinerary_backup.PASSENGER_ID';

	/** the column name for the REQUESTER_ID field */
	const REQUESTER_ID = 'itinerary_backup.REQUESTER_ID';

	/** the column name for the FACILITY field */
	const FACILITY = 'itinerary_backup.FACILITY';

	/** the column name for the LODGING field */
	const LODGING = 'itinerary_backup.LODGING';

	/** the column name for the ORGIN_CITY field */
	const ORGIN_CITY = 'itinerary_backup.ORGIN_CITY';

	/** the column name for the ORGIN_STATE field */
	const ORGIN_STATE = 'itinerary_backup.ORGIN_STATE';

	/** the column name for the DEST_CITY field */
	const DEST_CITY = 'itinerary_backup.DEST_CITY';

	/** the column name for the DEST_STATE field */
	const DEST_STATE = 'itinerary_backup.DEST_STATE';

	/** the column name for the WAIVER_NEED field */
	const WAIVER_NEED = 'itinerary_backup.WAIVER_NEED';

	/** the column name for the NEED_MEDICAL_RELEASE field */
	const NEED_MEDICAL_RELEASE = 'itinerary_backup.NEED_MEDICAL_RELEASE';

	/** the column name for the COMMENT field */
	const COMMENT = 'itinerary_backup.COMMENT';

	/** the column name for the AGENCY_ID field */
	const AGENCY_ID = 'itinerary_backup.AGENCY_ID';

	/** the column name for the CAMP_ID field */
	const CAMP_ID = 'itinerary_backup.CAMP_ID';

	/** the column name for the LEG_ID field */
	const LEG_ID = 'itinerary_backup.LEG_ID';

	/** the column name for the POINT_TIME field */
	const POINT_TIME = 'itinerary_backup.POINT_TIME';

	/**
	 * An identiy map to hold any loaded instances of ItineraryBackup objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array ItineraryBackup[]
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
		BasePeer::TYPE_PHPNAME => array ('Id', 'DateRequested', 'MissionRequestId', 'MissionTypeId', 'ApointTime', 'PassengerId', 'RequesterId', 'Facility', 'Lodging', 'OrginCity', 'OrginState', 'DestCity', 'DestState', 'WaiverNeed', 'NeedMedicalRelease', 'Comment', 'AgencyId', 'CampId', 'LegId', 'PointTime', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'dateRequested', 'missionRequestId', 'missionTypeId', 'apointTime', 'passengerId', 'requesterId', 'facility', 'lodging', 'orginCity', 'orginState', 'destCity', 'destState', 'waiverNeed', 'needMedicalRelease', 'comment', 'agencyId', 'campId', 'legId', 'pointTime', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::DATE_REQUESTED, self::MISSION_REQUEST_ID, self::MISSION_TYPE_ID, self::APOINT_TIME, self::PASSENGER_ID, self::REQUESTER_ID, self::FACILITY, self::LODGING, self::ORGIN_CITY, self::ORGIN_STATE, self::DEST_CITY, self::DEST_STATE, self::WAIVER_NEED, self::NEED_MEDICAL_RELEASE, self::COMMENT, self::AGENCY_ID, self::CAMP_ID, self::LEG_ID, self::POINT_TIME, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'date_requested', 'mission_request_id', 'mission_type_id', 'apoint_time', 'passenger_id', 'requester_id', 'facility', 'lodging', 'orgin_city', 'orgin_state', 'dest_city', 'dest_state', 'waiver_need', 'need_medical_release', 'comment', 'agency_id', 'camp_id', 'leg_id', 'point_time', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateRequested' => 1, 'MissionRequestId' => 2, 'MissionTypeId' => 3, 'ApointTime' => 4, 'PassengerId' => 5, 'RequesterId' => 6, 'Facility' => 7, 'Lodging' => 8, 'OrginCity' => 9, 'OrginState' => 10, 'DestCity' => 11, 'DestState' => 12, 'WaiverNeed' => 13, 'NeedMedicalRelease' => 14, 'Comment' => 15, 'AgencyId' => 16, 'CampId' => 17, 'LegId' => 18, 'PointTime' => 19, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'dateRequested' => 1, 'missionRequestId' => 2, 'missionTypeId' => 3, 'apointTime' => 4, 'passengerId' => 5, 'requesterId' => 6, 'facility' => 7, 'lodging' => 8, 'orginCity' => 9, 'orginState' => 10, 'destCity' => 11, 'destState' => 12, 'waiverNeed' => 13, 'needMedicalRelease' => 14, 'comment' => 15, 'agencyId' => 16, 'campId' => 17, 'legId' => 18, 'pointTime' => 19, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::DATE_REQUESTED => 1, self::MISSION_REQUEST_ID => 2, self::MISSION_TYPE_ID => 3, self::APOINT_TIME => 4, self::PASSENGER_ID => 5, self::REQUESTER_ID => 6, self::FACILITY => 7, self::LODGING => 8, self::ORGIN_CITY => 9, self::ORGIN_STATE => 10, self::DEST_CITY => 11, self::DEST_STATE => 12, self::WAIVER_NEED => 13, self::NEED_MEDICAL_RELEASE => 14, self::COMMENT => 15, self::AGENCY_ID => 16, self::CAMP_ID => 17, self::LEG_ID => 18, self::POINT_TIME => 19, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_requested' => 1, 'mission_request_id' => 2, 'mission_type_id' => 3, 'apoint_time' => 4, 'passenger_id' => 5, 'requester_id' => 6, 'facility' => 7, 'lodging' => 8, 'orgin_city' => 9, 'orgin_state' => 10, 'dest_city' => 11, 'dest_state' => 12, 'waiver_need' => 13, 'need_medical_release' => 14, 'comment' => 15, 'agency_id' => 16, 'camp_id' => 17, 'leg_id' => 18, 'point_time' => 19, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new ItineraryBackupMapBuilder();
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
	 * @param      string $column The column name for current table. (i.e. ItineraryBackupPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ItineraryBackupPeer::TABLE_NAME.'.', $alias.'.', $column);
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

		$criteria->addSelectColumn(ItineraryBackupPeer::ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::DATE_REQUESTED);

		$criteria->addSelectColumn(ItineraryBackupPeer::MISSION_REQUEST_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::MISSION_TYPE_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::APOINT_TIME);

		$criteria->addSelectColumn(ItineraryBackupPeer::PASSENGER_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::REQUESTER_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::FACILITY);

		$criteria->addSelectColumn(ItineraryBackupPeer::LODGING);

		$criteria->addSelectColumn(ItineraryBackupPeer::ORGIN_CITY);

		$criteria->addSelectColumn(ItineraryBackupPeer::ORGIN_STATE);

		$criteria->addSelectColumn(ItineraryBackupPeer::DEST_CITY);

		$criteria->addSelectColumn(ItineraryBackupPeer::DEST_STATE);

		$criteria->addSelectColumn(ItineraryBackupPeer::WAIVER_NEED);

		$criteria->addSelectColumn(ItineraryBackupPeer::NEED_MEDICAL_RELEASE);

		$criteria->addSelectColumn(ItineraryBackupPeer::COMMENT);

		$criteria->addSelectColumn(ItineraryBackupPeer::AGENCY_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::CAMP_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::LEG_ID);

		$criteria->addSelectColumn(ItineraryBackupPeer::POINT_TIME);

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
		$criteria->setPrimaryTableName(ItineraryBackupPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ItineraryBackupPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseItineraryBackupPeer', $criteria, $con);
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
	 * @return     ItineraryBackup
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ItineraryBackupPeer::doSelect($critcopy, $con);
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
		return ItineraryBackupPeer::populateObjects(ItineraryBackupPeer::doSelectStmt($criteria, $con));
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

    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseItineraryBackupPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ItineraryBackupPeer::addSelectColumns($criteria);
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
	 * @param      ItineraryBackup $value A ItineraryBackup object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(ItineraryBackup $obj, $key = null)
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
	 * @param      mixed $value A ItineraryBackup object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof ItineraryBackup) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or ItineraryBackup object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     ItineraryBackup Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		$cls = ItineraryBackupPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ItineraryBackupPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ItineraryBackupPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ItineraryBackupPeer::addInstanceToPool($obj, $key);
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
		return ItineraryBackupPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a ItineraryBackup or Criteria object.
	 *
	 * @param      mixed $values Criteria or ItineraryBackup object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseItineraryBackupPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from ItineraryBackup object
		}

		if ($criteria->containsKey(ItineraryBackupPeer::ID) && $criteria->keyContainsValue(ItineraryBackupPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ItineraryBackupPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseItineraryBackupPeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a ItineraryBackup or Criteria object.
	 *
	 * @param      mixed $values Criteria or ItineraryBackup object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseItineraryBackupPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ItineraryBackupPeer::ID);
			$selectCriteria->add(ItineraryBackupPeer::ID, $criteria->remove(ItineraryBackupPeer::ID), $comparison);

		} else { // $values is ItineraryBackup object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseItineraryBackupPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseItineraryBackupPeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the itinerary_backup table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ItineraryBackupPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a ItineraryBackup or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or ItineraryBackup object or primary key or array of primary keys
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
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ItineraryBackupPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof ItineraryBackup) {
			// invalidate the cache for this single object
			ItineraryBackupPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ItineraryBackupPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				ItineraryBackupPeer::removeInstanceFromPool($singleval);
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
	 * Validates all modified columns of given ItineraryBackup object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      ItineraryBackup $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(ItineraryBackup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ItineraryBackupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ItineraryBackupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ItineraryBackupPeer::DATABASE_NAME, ItineraryBackupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ItineraryBackupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     ItineraryBackup
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ItineraryBackupPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ItineraryBackupPeer::DATABASE_NAME);
		$criteria->add(ItineraryBackupPeer::ID, $pk);

		$v = ItineraryBackupPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ItineraryBackupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ItineraryBackupPeer::DATABASE_NAME);
			$criteria->add(ItineraryBackupPeer::ID, $pks, Criteria::IN);
			$objs = ItineraryBackupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseItineraryBackupPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the ItineraryBackupPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the ItineraryBackupPeer class:
//
// Propel::getDatabaseMap(ItineraryBackupPeer::DATABASE_NAME)->addTableBuilder(ItineraryBackupPeer::TABLE_NAME, ItineraryBackupPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseItineraryBackupPeer::DATABASE_NAME)->addTableBuilder(BaseItineraryBackupPeer::TABLE_NAME, BaseItineraryBackupPeer::getMapBuilder());

