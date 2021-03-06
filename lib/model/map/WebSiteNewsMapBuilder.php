<?php


/**
 * This class adds structure of 'web_site_news' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue May 24 06:33:33 2011
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class WebSiteNewsMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WebSiteNewsMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(WebSiteNewsPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(WebSiteNewsPeer::TABLE_NAME);
		$tMap->setPhpName('WebSiteNews');
		$tMap->setClassname('WebSiteNews');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 4);

		$tMap->addColumn('NEWS_ITEM', 'NewsItem', 'INTEGER', true, 4);

		$tMap->addColumn('ITEM_DATE', 'ItemDate', 'DATE', false, null);

		$tMap->addColumn('EXPIRE_DATE', 'ExpireDate', 'DATE', false, null);

		$tMap->addColumn('ARCHIVE_DATE', 'ArchiveDate', 'DATE', false, null);

		$tMap->addColumn('HEADLINE', 'Headline', 'VARCHAR', false, 75);

		$tMap->addColumn('AUTHOR', 'Author', 'VARCHAR', false, 50);

		$tMap->addColumn('WING_LIST', 'WingList', 'VARCHAR', false, 255);

		$tMap->addColumn('CONTACT_NAME', 'ContactName', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACT_EMAIL', 'ContactEmail', 'VARCHAR', false, 75);

		$tMap->addColumn('NEWS_BODY', 'NewsBody', 'VARCHAR', false, 5000);

		$tMap->addColumn('SHORT_DESCRIPTION', 'ShortDescription', 'VARCHAR', false, 255);

		$tMap->addColumn('PRIORITY', 'Priority', 'INTEGER', false, 4);

	} // doBuild()

} // WebSiteNewsMapBuilder
