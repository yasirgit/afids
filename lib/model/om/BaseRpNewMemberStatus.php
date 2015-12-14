<?php

/**
 * Base class that represents a row from the 'rp_new_member_status' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:33 2011
 *
 * @package    lib.model.om
 */
abstract class BaseRpNewMemberStatus extends BaseObject  implements Persistent {


  const PEER = 'RpNewMemberStatusPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RpNewMemberStatusPeer
	 */
	protected static $peer;

	/**
	 * The value for the firstname field.
	 * @var        string
	 */
	protected $firstname;

	/**
	 * The value for the lastname field.
	 * @var        string
	 */
	protected $lastname;

	/**
	 * The value for the joindate field.
	 * @var        string
	 */
	protected $joindate;

	/**
	 * The value for the flightstatus field.
	 * @var        string
	 */
	protected $flightstatus;

	/**
	 * The value for the insurancereceived field.
	 * @var        string
	 */
	protected $insurancereceived;

	/**
	 * The value for the badgemade field.
	 * @var        string
	 */
	protected $badgemade;

	/**
	 * The value for the notebooksent field.
	 * @var        string
	 */
	protected $notebooksent;

	/**
	 * The value for the joindatesort field.
	 * @var        string
	 */
	protected $joindatesort;

	/**
	 * The value for the wing_id field.
	 * @var        int
	 */
	protected $wing_id;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * Initializes internal state of BaseRpNewMemberStatus object.
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
	 * Get the [firstname] column value.
	 * 
	 * @return     string
	 */
	public function getFirstname()
	{
		return $this->firstname;
	}

	/**
	 * Get the [lastname] column value.
	 * 
	 * @return     string
	 */
	public function getLastname()
	{
		return $this->lastname;
	}

	/**
	 * Get the [joindate] column value.
	 * 
	 * @return     string
	 */
	public function getJoindate()
	{
		return $this->joindate;
	}

	/**
	 * Get the [flightstatus] column value.
	 * 
	 * @return     string
	 */
	public function getFlightstatus()
	{
		return $this->flightstatus;
	}

	/**
	 * Get the [insurancereceived] column value.
	 * 
	 * @return     string
	 */
	public function getInsurancereceived()
	{
		return $this->insurancereceived;
	}

	/**
	 * Get the [badgemade] column value.
	 * 
	 * @return     string
	 */
	public function getBadgemade()
	{
		return $this->badgemade;
	}

	/**
	 * Get the [notebooksent] column value.
	 * 
	 * @return     string
	 */
	public function getNotebooksent()
	{
		return $this->notebooksent;
	}

	/**
	 * Get the [optionally formatted] temporal [joindatesort] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getJoindatesort($format = 'Y-m-d')
	{
		if ($this->joindatesort === null) {
			return null;
		}


		if ($this->joindatesort === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->joindatesort);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->joindatesort, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Set the value of [firstname] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setFirstname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->firstname !== $v) {
			$this->firstname = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::FIRSTNAME;
		}

		return $this;
	} // setFirstname()

	/**
	 * Set the value of [lastname] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setLastname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->lastname !== $v) {
			$this->lastname = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::LASTNAME;
		}

		return $this;
	} // setLastname()

	/**
	 * Set the value of [joindate] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setJoindate($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->joindate !== $v) {
			$this->joindate = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::JOINDATE;
		}

		return $this;
	} // setJoindate()

	/**
	 * Set the value of [flightstatus] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setFlightstatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->flightstatus !== $v) {
			$this->flightstatus = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::FLIGHTSTATUS;
		}

		return $this;
	} // setFlightstatus()

	/**
	 * Set the value of [insurancereceived] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setInsurancereceived($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->insurancereceived !== $v) {
			$this->insurancereceived = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::INSURANCERECEIVED;
		}

		return $this;
	} // setInsurancereceived()

	/**
	 * Set the value of [badgemade] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setBadgemade($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->badgemade !== $v) {
			$this->badgemade = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::BADGEMADE;
		}

		return $this;
	} // setBadgemade()

	/**
	 * Set the value of [notebooksent] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setNotebooksent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->notebooksent !== $v) {
			$this->notebooksent = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::NOTEBOOKSENT;
		}

		return $this;
	} // setNotebooksent()

	/**
	 * Sets the value of [joindatesort] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setJoindatesort($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->joindatesort !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->joindatesort !== null && $tmpDt = new DateTime($this->joindatesort)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->joindatesort = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = RpNewMemberStatusPeer::JOINDATESORT;
			}
		} // if either are not null

		return $this;
	} // setJoindatesort()

	/**
	 * Set the value of [wing_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setWingId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->wing_id !== $v) {
			$this->wing_id = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::WING_ID;
		}

		return $this;
	} // setWingId()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     RpNewMemberStatus The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RpNewMemberStatusPeer::ID;
		}

		return $this;
	} // setId()

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

			$this->firstname = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->lastname = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->joindate = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->flightstatus = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->insurancereceived = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->badgemade = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->notebooksent = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->joindatesort = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->wing_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 11; // 11 = RpNewMemberStatusPeer::NUM_COLUMNS - RpNewMemberStatusPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating RpNewMemberStatus object", $e);
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
			$con = Propel::getConnection(RpNewMemberStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RpNewMemberStatusPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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

    foreach (sfMixer::getCallables('BaseRpNewMemberStatus:delete:pre') as $callable)
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
			$con = Propel::getConnection(RpNewMemberStatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RpNewMemberStatusPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseRpNewMemberStatus:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseRpNewMemberStatus:save:pre') as $callable)
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
			$con = Propel::getConnection(RpNewMemberStatusPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseRpNewMemberStatus:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			RpNewMemberStatusPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = RpNewMemberStatusPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RpNewMemberStatusPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += RpNewMemberStatusPeer::doUpdate($this, $con);
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


			if (($retval = RpNewMemberStatusPeer::doValidate($this, $columns)) !== true) {
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
		$pos = RpNewMemberStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFirstname();
				break;
			case 1:
				return $this->getLastname();
				break;
			case 2:
				return $this->getJoindate();
				break;
			case 3:
				return $this->getFlightstatus();
				break;
			case 4:
				return $this->getInsurancereceived();
				break;
			case 5:
				return $this->getBadgemade();
				break;
			case 6:
				return $this->getNotebooksent();
				break;
			case 7:
				return $this->getJoindatesort();
				break;
			case 8:
				return $this->getWingId();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getId();
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
		$keys = RpNewMemberStatusPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFirstname(),
			$keys[1] => $this->getLastname(),
			$keys[2] => $this->getJoindate(),
			$keys[3] => $this->getFlightstatus(),
			$keys[4] => $this->getInsurancereceived(),
			$keys[5] => $this->getBadgemade(),
			$keys[6] => $this->getNotebooksent(),
			$keys[7] => $this->getJoindatesort(),
			$keys[8] => $this->getWingId(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getId(),
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
		$pos = RpNewMemberStatusPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFirstname($value);
				break;
			case 1:
				$this->setLastname($value);
				break;
			case 2:
				$this->setJoindate($value);
				break;
			case 3:
				$this->setFlightstatus($value);
				break;
			case 4:
				$this->setInsurancereceived($value);
				break;
			case 5:
				$this->setBadgemade($value);
				break;
			case 6:
				$this->setNotebooksent($value);
				break;
			case 7:
				$this->setJoindatesort($value);
				break;
			case 8:
				$this->setWingId($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setId($value);
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
		$keys = RpNewMemberStatusPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFirstname($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLastname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setJoindate($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFlightstatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInsurancereceived($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBadgemade($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNotebooksent($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJoindatesort($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWingId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RpNewMemberStatusPeer::DATABASE_NAME);

		if ($this->isColumnModified(RpNewMemberStatusPeer::FIRSTNAME)) $criteria->add(RpNewMemberStatusPeer::FIRSTNAME, $this->firstname);
		if ($this->isColumnModified(RpNewMemberStatusPeer::LASTNAME)) $criteria->add(RpNewMemberStatusPeer::LASTNAME, $this->lastname);
		if ($this->isColumnModified(RpNewMemberStatusPeer::JOINDATE)) $criteria->add(RpNewMemberStatusPeer::JOINDATE, $this->joindate);
		if ($this->isColumnModified(RpNewMemberStatusPeer::FLIGHTSTATUS)) $criteria->add(RpNewMemberStatusPeer::FLIGHTSTATUS, $this->flightstatus);
		if ($this->isColumnModified(RpNewMemberStatusPeer::INSURANCERECEIVED)) $criteria->add(RpNewMemberStatusPeer::INSURANCERECEIVED, $this->insurancereceived);
		if ($this->isColumnModified(RpNewMemberStatusPeer::BADGEMADE)) $criteria->add(RpNewMemberStatusPeer::BADGEMADE, $this->badgemade);
		if ($this->isColumnModified(RpNewMemberStatusPeer::NOTEBOOKSENT)) $criteria->add(RpNewMemberStatusPeer::NOTEBOOKSENT, $this->notebooksent);
		if ($this->isColumnModified(RpNewMemberStatusPeer::JOINDATESORT)) $criteria->add(RpNewMemberStatusPeer::JOINDATESORT, $this->joindatesort);
		if ($this->isColumnModified(RpNewMemberStatusPeer::WING_ID)) $criteria->add(RpNewMemberStatusPeer::WING_ID, $this->wing_id);
		if ($this->isColumnModified(RpNewMemberStatusPeer::EMAIL)) $criteria->add(RpNewMemberStatusPeer::EMAIL, $this->email);
		if ($this->isColumnModified(RpNewMemberStatusPeer::ID)) $criteria->add(RpNewMemberStatusPeer::ID, $this->id);

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
		$criteria = new Criteria(RpNewMemberStatusPeer::DATABASE_NAME);

		$criteria->add(RpNewMemberStatusPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RpNewMemberStatus (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFirstname($this->firstname);

		$copyObj->setLastname($this->lastname);

		$copyObj->setJoindate($this->joindate);

		$copyObj->setFlightstatus($this->flightstatus);

		$copyObj->setInsurancereceived($this->insurancereceived);

		$copyObj->setBadgemade($this->badgemade);

		$copyObj->setNotebooksent($this->notebooksent);

		$copyObj->setJoindatesort($this->joindatesort);

		$copyObj->setWingId($this->wing_id);

		$copyObj->setEmail($this->email);


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
	 * @return     RpNewMemberStatus Clone of current object.
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
	 * @return     RpNewMemberStatusPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RpNewMemberStatusPeer();
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
    if (!$callable = sfMixer::getCallable('BaseRpNewMemberStatus:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseRpNewMemberStatus::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseRpNewMemberStatus