<?php


/**
 * This class adds structure of 'rp_member_photos' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:32 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RpMemberPhotosMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RpMemberPhotosMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(RpMemberPhotosPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RpMemberPhotosPeer::TABLE_NAME);
		$tMap->setPhpName('RpMemberPhotos');
		$tMap->setClassname('RpMemberPhotos');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('MEMBERID', 'Memberid', 'INTEGER', true, 4);

		$tMap->addColumn('PASSID', 'Passid', 'INTEGER', true, 11);

		$tMap->addColumn('PHOTOID', 'Photoid', 'INTEGER', true, 4);

		$tMap->addColumn('SUBMISSIONDATE', 'Submissiondate', 'VARCHAR', false, 10);

		$tMap->addColumn('MISSIONDATE', 'Missiondate', 'VARCHAR', false, 10);

		$tMap->addColumn('PASSENGERNAME', 'Passengername', 'VARCHAR', true, 81);

		$tMap->addColumn('PILOTNAME', 'Pilotname', 'VARCHAR', true, 81);

		$tMap->addColumn('PHOTO_QUALITY', 'PhotoQuality', 'INTEGER', false, 4);

		$tMap->addColumn('PHOTO_FILENAME', 'PhotoFilename', 'VARCHAR', false, 75);

		$tMap->addColumn('PHOTOTHUMB', 'Photothumb', 'VARCHAR', false, 235);

		$tMap->addColumn('WING_ID', 'WingId', 'INTEGER', false, 4);

		$tMap->addColumn('PASSLASTNAME', 'Passlastname', 'VARCHAR', true, 40);

		$tMap->addColumn('PILOTLASTNAME', 'Pilotlastname', 'VARCHAR', true, 40);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // RpMemberPhotosMapBuilder
