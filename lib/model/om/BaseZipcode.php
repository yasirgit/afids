<?php

/**
 * Base class that represents a row from the 'zipcode' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:33 2011
 *
 * @package    lib.model.om
 */
abstract class BaseZipcode extends BaseObject  implements Persistent {


  const PEER = 'ZipcodePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ZipcodePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the city field.
	 * @var        string
	 */
	protected $city;

	/**
	 * The value for the state field.
	 * @var        string
	 */
	protected $state;

	/**
	 * The value for the zipcode field.
	 * @var        string
	 */
	protected $zipcode;

	/**
	 * The value for the area_code field.
	 * @var        string
	 */
	protected $area_code;

	/**
	 * The value for the fips_code field.
	 * @var        int
	 */
	protected $fips_code;

	/**
	 * The value for the county_name field.
	 * @var        string
	 */
	protected $county_name;

	/**
	 * The value for the preferred field.
	 * @var        string
	 */
	protected $preferred;

	/**
	 * The value for the time_zone field.
	 * @var        string
	 */
	protected $time_zone;

	/**
	 * The value for the dst_flag field.
	 * @var        string
	 */
	protected $dst_flag;

	/**
	 * The value for the zip_type field.
	 * @var        string
	 */
	protected $zip_type;

	/**
	 * The value for the gmt_offset field.
	 * @var        int
	 */
	protected $gmt_offset;

	/**
	 * The value for the dst_offset field.
	 * @var        int
	 */
	protected $dst_offset;

	/**
	 * The value for the afa_org_id field.
	 * @var        int
	 */
	protected $afa_org_id;

	/**
	 * The value for the latitude field.
	 * @var        double
	 */
	protected $latitude;

	/**
	 * The value for the longitude field.
	 * @var        double
	 */
	protected $longitude;

	/**
	 * The value for the wing_id field.
	 * @var        int
	 */
	protected $wing_id;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseZipcode object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [city] column value.
	 * 
	 * @return     string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Get the [state] column value.
	 * 
	 * @return     string
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * Get the [zipcode] column value.
	 * 
	 * @return     string
	 */
	public function getZipcode()
	{
		return $this->zipcode;
	}

	/**
	 * Get the [area_code] column value.
	 * 
	 * @return     string
	 */
	public function getAreaCode()
	{
		return $this->area_code;
	}

	/**
	 * Get the [fips_code] column value.
	 * 
	 * @return     int
	 */
	public function getFipsCode()
	{
		return $this->fips_code;
	}

	/**
	 * Get the [county_name] column value.
	 * 
	 * @return     string
	 */
	public function getCountyName()
	{
		return $this->county_name;
	}

	/**
	 * Get the [preferred] column value.
	 * 
	 * @return     string
	 */
	public function getPreferred()
	{
		return $this->preferred;
	}

	/**
	 * Get the [time_zone] column value.
	 * 
	 * @return     string
	 */
	public function getTimeZone()
	{
		return $this->time_zone;
	}

	/**
	 * Get the [dst_flag] column value.
	 * 
	 * @return     string
	 */
	public function getDstFlag()
	{
		return $this->dst_flag;
	}

	/**
	 * Get the [zip_type] column value.
	 * 
	 * @return     string
	 */
	public function getZipType()
	{
		return $this->zip_type;
	}

	/**
	 * Get the [gmt_offset] column value.
	 * 
	 * @return     int
	 */
	public function getGmtOffset()
	{
		return $this->gmt_offset;
	}

	/**
	 * Get the [dst_offset] column value.
	 * 
	 * @return     int
	 */
	public function getDstOffset()
	{
		return $this->dst_offset;
	}

	/**
	 * Get the [afa_org_id] column value.
	 * 
	 * @return     int
	 */
	public function getAfaOrgId()
	{
		return $this->afa_org_id;
	}

	/**
	 * Get the [latitude] column value.
	 * 
	 * @return     double
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [longitude] column value.
	 * 
	 * @return     double
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [wing_id] column value.
	 * 
	 * @return     int
	 */
	public function getWingId()
	{
		return $this->wing_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ZipcodePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [city] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setCity($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[] = ZipcodePeer::CITY;
		}

		return $this;
	} // setCity()

	/**
	 * Set the value of [state] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setState($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->state !== $v) {
			$this->state = $v;
			$this->modifiedColumns[] = ZipcodePeer::STATE;
		}

		return $this;
	} // setState()

	/**
	 * Set the value of [zipcode] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setZipcode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->zipcode !== $v) {
			$this->zipcode = $v;
			$this->modifiedColumns[] = ZipcodePeer::ZIPCODE;
		}

		return $this;
	} // setZipcode()

	/**
	 * Set the value of [area_code] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setAreaCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->area_code !== $v) {
			$this->area_code = $v;
			$this->modifiedColumns[] = ZipcodePeer::AREA_CODE;
		}

		return $this;
	} // setAreaCode()

	/**
	 * Set the value of [fips_code] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setFipsCode($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fips_code !== $v) {
			$this->fips_code = $v;
			$this->modifiedColumns[] = ZipcodePeer::FIPS_CODE;
		}

		return $this;
	} // setFipsCode()

	/**
	 * Set the value of [county_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setCountyName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->county_name !== $v) {
			$this->county_name = $v;
			$this->modifiedColumns[] = ZipcodePeer::COUNTY_NAME;
		}

		return $this;
	} // setCountyName()

	/**
	 * Set the value of [preferred] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setPreferred($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->preferred !== $v) {
			$this->preferred = $v;
			$this->modifiedColumns[] = ZipcodePeer::PREFERRED;
		}

		return $this;
	} // setPreferred()

	/**
	 * Set the value of [time_zone] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setTimeZone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->time_zone !== $v) {
			$this->time_zone = $v;
			$this->modifiedColumns[] = ZipcodePeer::TIME_ZONE;
		}

		return $this;
	} // setTimeZone()

	/**
	 * Set the value of [dst_flag] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setDstFlag($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dst_flag !== $v) {
			$this->dst_flag = $v;
			$this->modifiedColumns[] = ZipcodePeer::DST_FLAG;
		}

		return $this;
	} // setDstFlag()

	/**
	 * Set the value of [zip_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setZipType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->zip_type !== $v) {
			$this->zip_type = $v;
			$this->modifiedColumns[] = ZipcodePeer::ZIP_TYPE;
		}

		return $this;
	} // setZipType()

	/**
	 * Set the value of [gmt_offset] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setGmtOffset($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gmt_offset !== $v) {
			$this->gmt_offset = $v;
			$this->modifiedColumns[] = ZipcodePeer::GMT_OFFSET;
		}

		return $this;
	} // setGmtOffset()

	/**
	 * Set the value of [dst_offset] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setDstOffset($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dst_offset !== $v) {
			$this->dst_offset = $v;
			$this->modifiedColumns[] = ZipcodePeer::DST_OFFSET;
		}

		return $this;
	} // setDstOffset()

	/**
	 * Set the value of [afa_org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setAfaOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->afa_org_id !== $v) {
			$this->afa_org_id = $v;
			$this->modifiedColumns[] = ZipcodePeer::AFA_ORG_ID;
		}

		return $this;
	} // setAfaOrgId()

	/**
	 * Set the value of [latitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = ZipcodePeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [longitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = ZipcodePeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [wing_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Zipcode The current object (for fluent API support)
	 */
	public function setWingId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->wing_id !== $v) {
			$this->wing_id = $v;
			$this->modifiedColumns[] = ZipcodePeer::WING_ID;
		}

		return $this;
	} // setWingId()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->city = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->state = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->zipcode = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->area_code = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->fips_code = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->county_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->preferred = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->time_zone = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->dst_flag = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->zip_type = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->gmt_offset = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->dst_offset = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->afa_org_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->latitude = ($row[$startcol + 14] !== null) ? (double) $row[$startcol + 14] : null;
			$this->longitude = ($row[$startcol + 15] !== null) ? (double) $row[$startcol + 15] : null;
			$this->wing_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 17; // 17 = ZipcodePeer::NUM_COLUMNS - ZipcodePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Zipcode object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ZipcodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ZipcodePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseZipcode:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ZipcodePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ZipcodePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseZipcode:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseZipcode:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ZipcodePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseZipcode:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			ZipcodePeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ZipcodePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ZipcodePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ZipcodePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = ZipcodePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ZipcodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCity();
				break;
			case 2:
				return $this->getState();
				break;
			case 3:
				return $this->getZipcode();
				break;
			case 4:
				return $this->getAreaCode();
				break;
			case 5:
				return $this->getFipsCode();
				break;
			case 6:
				return $this->getCountyName();
				break;
			case 7:
				return $this->getPreferred();
				break;
			case 8:
				return $this->getTimeZone();
				break;
			case 9:
				return $this->getDstFlag();
				break;
			case 10:
				return $this->getZipType();
				break;
			case 11:
				return $this->getGmtOffset();
				break;
			case 12:
				return $this->getDstOffset();
				break;
			case 13:
				return $this->getAfaOrgId();
				break;
			case 14:
				return $this->getLatitude();
				break;
			case 15:
				return $this->getLongitude();
				break;
			case 16:
				return $this->getWingId();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ZipcodePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCity(),
			$keys[2] => $this->getState(),
			$keys[3] => $this->getZipcode(),
			$keys[4] => $this->getAreaCode(),
			$keys[5] => $this->getFipsCode(),
			$keys[6] => $this->getCountyName(),
			$keys[7] => $this->getPreferred(),
			$keys[8] => $this->getTimeZone(),
			$keys[9] => $this->getDstFlag(),
			$keys[10] => $this->getZipType(),
			$keys[11] => $this->getGmtOffset(),
			$keys[12] => $this->getDstOffset(),
			$keys[13] => $this->getAfaOrgId(),
			$keys[14] => $this->getLatitude(),
			$keys[15] => $this->getLongitude(),
			$keys[16] => $this->getWingId(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ZipcodePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCity($value);
				break;
			case 2:
				$this->setState($value);
				break;
			case 3:
				$this->setZipcode($value);
				break;
			case 4:
				$this->setAreaCode($value);
				break;
			case 5:
				$this->setFipsCode($value);
				break;
			case 6:
				$this->setCountyName($value);
				break;
			case 7:
				$this->setPreferred($value);
				break;
			case 8:
				$this->setTimeZone($value);
				break;
			case 9:
				$this->setDstFlag($value);
				break;
			case 10:
				$this->setZipType($value);
				break;
			case 11:
				$this->setGmtOffset($value);
				break;
			case 12:
				$this->setDstOffset($value);
				break;
			case 13:
				$this->setAfaOrgId($value);
				break;
			case 14:
				$this->setLatitude($value);
				break;
			case 15:
				$this->setLongitude($value);
				break;
			case 16:
				$this->setWingId($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ZipcodePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCity($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setState($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setZipcode($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAreaCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFipsCode($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCountyName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPreferred($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTimeZone($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDstFlag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setZipType($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setGmtOffset($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDstOffset($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAfaOrgId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLatitude($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLongitude($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setWingId($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ZipcodePeer::DATABASE_NAME);

		if ($this->isColumnModified(ZipcodePeer::ID)) $criteria->add(ZipcodePeer::ID, $this->id);
		if ($this->isColumnModified(ZipcodePeer::CITY)) $criteria->add(ZipcodePeer::CITY, $this->city);
		if ($this->isColumnModified(ZipcodePeer::STATE)) $criteria->add(ZipcodePeer::STATE, $this->state);
		if ($this->isColumnModified(ZipcodePeer::ZIPCODE)) $criteria->add(ZipcodePeer::ZIPCODE, $this->zipcode);
		if ($this->isColumnModified(ZipcodePeer::AREA_CODE)) $criteria->add(ZipcodePeer::AREA_CODE, $this->area_code);
		if ($this->isColumnModified(ZipcodePeer::FIPS_CODE)) $criteria->add(ZipcodePeer::FIPS_CODE, $this->fips_code);
		if ($this->isColumnModified(ZipcodePeer::COUNTY_NAME)) $criteria->add(ZipcodePeer::COUNTY_NAME, $this->county_name);
		if ($this->isColumnModified(ZipcodePeer::PREFERRED)) $criteria->add(ZipcodePeer::PREFERRED, $this->preferred);
		if ($this->isColumnModified(ZipcodePeer::TIME_ZONE)) $criteria->add(ZipcodePeer::TIME_ZONE, $this->time_zone);
		if ($this->isColumnModified(ZipcodePeer::DST_FLAG)) $criteria->add(ZipcodePeer::DST_FLAG, $this->dst_flag);
		if ($this->isColumnModified(ZipcodePeer::ZIP_TYPE)) $criteria->add(ZipcodePeer::ZIP_TYPE, $this->zip_type);
		if ($this->isColumnModified(ZipcodePeer::GMT_OFFSET)) $criteria->add(ZipcodePeer::GMT_OFFSET, $this->gmt_offset);
		if ($this->isColumnModified(ZipcodePeer::DST_OFFSET)) $criteria->add(ZipcodePeer::DST_OFFSET, $this->dst_offset);
		if ($this->isColumnModified(ZipcodePeer::AFA_ORG_ID)) $criteria->add(ZipcodePeer::AFA_ORG_ID, $this->afa_org_id);
		if ($this->isColumnModified(ZipcodePeer::LATITUDE)) $criteria->add(ZipcodePeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(ZipcodePeer::LONGITUDE)) $criteria->add(ZipcodePeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(ZipcodePeer::WING_ID)) $criteria->add(ZipcodePeer::WING_ID, $this->wing_id);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ZipcodePeer::DATABASE_NAME);

		$criteria->add(ZipcodePeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Zipcode (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCity($this->city);

		$copyObj->setState($this->state);

		$copyObj->setZipcode($this->zipcode);

		$copyObj->setAreaCode($this->area_code);

		$copyObj->setFipsCode($this->fips_code);

		$copyObj->setCountyName($this->county_name);

		$copyObj->setPreferred($this->preferred);

		$copyObj->setTimeZone($this->time_zone);

		$copyObj->setDstFlag($this->dst_flag);

		$copyObj->setZipType($this->zip_type);

		$copyObj->setGmtOffset($this->gmt_offset);

		$copyObj->setDstOffset($this->dst_offset);

		$copyObj->setAfaOrgId($this->afa_org_id);

		$copyObj->setLatitude($this->latitude);

		$copyObj->setLongitude($this->longitude);

		$copyObj->setWingId($this->wing_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Zipcode Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ZipcodePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ZipcodePeer();
		}
		return self::$peer;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseZipcode:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseZipcode::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseZipcode
