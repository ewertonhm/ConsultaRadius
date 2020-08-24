<?php

namespace Map;

use \Onu;
use \OnuQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'onu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OnuTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OnuTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'onu';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Onu';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Onu';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'onu.id';

    /**
     * the column name for the mac field
     */
    const COL_MAC = 'onu.mac';

    /**
     * the column name for the olt field
     */
    const COL_OLT = 'onu.olt';

    /**
     * the column name for the slot field
     */
    const COL_SLOT = 'onu.slot';

    /**
     * the column name for the pon field
     */
    const COL_PON = 'onu.pon';

    /**
     * the column name for the onu field
     */
    const COL_ONU = 'onu.onu';

    /**
     * the column name for the modelo field
     */
    const COL_MODELO = 'onu.modelo';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'onu.nome';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Mac', 'Olt', 'Slot', 'Pon', 'Onu', 'Modelo', 'Nome', ),
        self::TYPE_CAMELNAME     => array('id', 'mac', 'olt', 'slot', 'pon', 'onu', 'modelo', 'nome', ),
        self::TYPE_COLNAME       => array(OnuTableMap::COL_ID, OnuTableMap::COL_MAC, OnuTableMap::COL_OLT, OnuTableMap::COL_SLOT, OnuTableMap::COL_PON, OnuTableMap::COL_ONU, OnuTableMap::COL_MODELO, OnuTableMap::COL_NOME, ),
        self::TYPE_FIELDNAME     => array('id', 'mac', 'olt', 'slot', 'pon', 'onu', 'modelo', 'nome', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Mac' => 1, 'Olt' => 2, 'Slot' => 3, 'Pon' => 4, 'Onu' => 5, 'Modelo' => 6, 'Nome' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'mac' => 1, 'olt' => 2, 'slot' => 3, 'pon' => 4, 'onu' => 5, 'modelo' => 6, 'nome' => 7, ),
        self::TYPE_COLNAME       => array(OnuTableMap::COL_ID => 0, OnuTableMap::COL_MAC => 1, OnuTableMap::COL_OLT => 2, OnuTableMap::COL_SLOT => 3, OnuTableMap::COL_PON => 4, OnuTableMap::COL_ONU => 5, OnuTableMap::COL_MODELO => 6, OnuTableMap::COL_NOME => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'mac' => 1, 'olt' => 2, 'slot' => 3, 'pon' => 4, 'onu' => 5, 'modelo' => 6, 'nome' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('onu');
        $this->setPhpName('Onu');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Onu');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('mac', 'Mac', 'LONGVARCHAR', true, null, null);
        $this->addColumn('olt', 'Olt', 'INTEGER', true, null, null);
        $this->addColumn('slot', 'Slot', 'INTEGER', true, null, null);
        $this->addColumn('pon', 'Pon', 'INTEGER', true, null, null);
        $this->addColumn('onu', 'Onu', 'INTEGER', true, null, null);
        $this->addColumn('modelo', 'Modelo', 'LONGVARCHAR', false, null, null);
        $this->addColumn('nome', 'Nome', 'LONGVARCHAR', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? OnuTableMap::CLASS_DEFAULT : OnuTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Onu object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OnuTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OnuTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OnuTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OnuTableMap::OM_CLASS;
            /** @var Onu $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OnuTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OnuTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OnuTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Onu $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OnuTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OnuTableMap::COL_ID);
            $criteria->addSelectColumn(OnuTableMap::COL_MAC);
            $criteria->addSelectColumn(OnuTableMap::COL_OLT);
            $criteria->addSelectColumn(OnuTableMap::COL_SLOT);
            $criteria->addSelectColumn(OnuTableMap::COL_PON);
            $criteria->addSelectColumn(OnuTableMap::COL_ONU);
            $criteria->addSelectColumn(OnuTableMap::COL_MODELO);
            $criteria->addSelectColumn(OnuTableMap::COL_NOME);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.mac');
            $criteria->addSelectColumn($alias . '.olt');
            $criteria->addSelectColumn($alias . '.slot');
            $criteria->addSelectColumn($alias . '.pon');
            $criteria->addSelectColumn($alias . '.onu');
            $criteria->addSelectColumn($alias . '.modelo');
            $criteria->addSelectColumn($alias . '.nome');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(OnuTableMap::DATABASE_NAME)->getTable(OnuTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OnuTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OnuTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OnuTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Onu or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Onu object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OnuTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Onu) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OnuTableMap::DATABASE_NAME);
            $criteria->add(OnuTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OnuQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OnuTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OnuTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the onu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OnuQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Onu or Criteria object.
     *
     * @param mixed               $criteria Criteria or Onu object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OnuTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Onu object
        }

        if ($criteria->containsKey(OnuTableMap::COL_ID) && $criteria->keyContainsValue(OnuTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OnuTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OnuQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OnuTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OnuTableMap::buildTableMap();
