<?php

namespace Map;

use \Autenticacao;
use \AutenticacaoQuery;
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
 * This class defines the structure of the 'autenticacao' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AutenticacaoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AutenticacaoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'autenticacao';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Autenticacao';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Autenticacao';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'autenticacao.id';

    /**
     * the column name for the concentrador field
     */
    const COL_CONCENTRADOR = 'autenticacao.concentrador';

    /**
     * the column name for the inicio field
     */
    const COL_INICIO = 'autenticacao.inicio';

    /**
     * the column name for the termino field
     */
    const COL_TERMINO = 'autenticacao.termino';

    /**
     * the column name for the trafegoupload field
     */
    const COL_TRAFEGOUPLOAD = 'autenticacao.trafegoupload';

    /**
     * the column name for the trafegodownload field
     */
    const COL_TRAFEGODOWNLOAD = 'autenticacao.trafegodownload';

    /**
     * the column name for the movitodesconexao field
     */
    const COL_MOVITODESCONEXAO = 'autenticacao.movitodesconexao';

    /**
     * the column name for the ipconexao field
     */
    const COL_IPCONEXAO = 'autenticacao.ipconexao';

    /**
     * the column name for the ipconcentrador field
     */
    const COL_IPCONCENTRADOR = 'autenticacao.ipconcentrador';

    /**
     * the column name for the ipv6 field
     */
    const COL_IPV6 = 'autenticacao.ipv6';

    /**
     * the column name for the mac field
     */
    const COL_MAC = 'autenticacao.mac';

    /**
     * the column name for the cliente_id field
     */
    const COL_CLIENTE_ID = 'autenticacao.cliente_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Concentrador', 'Inicio', 'Termino', 'Trafegoupload', 'Trafegodownload', 'Movitodesconexao', 'Ipconexao', 'Ipconcentrador', 'Ipv6', 'Mac', 'ClienteId', ),
        self::TYPE_CAMELNAME     => array('id', 'concentrador', 'inicio', 'termino', 'trafegoupload', 'trafegodownload', 'movitodesconexao', 'ipconexao', 'ipconcentrador', 'ipv6', 'mac', 'clienteId', ),
        self::TYPE_COLNAME       => array(AutenticacaoTableMap::COL_ID, AutenticacaoTableMap::COL_CONCENTRADOR, AutenticacaoTableMap::COL_INICIO, AutenticacaoTableMap::COL_TERMINO, AutenticacaoTableMap::COL_TRAFEGOUPLOAD, AutenticacaoTableMap::COL_TRAFEGODOWNLOAD, AutenticacaoTableMap::COL_MOVITODESCONEXAO, AutenticacaoTableMap::COL_IPCONEXAO, AutenticacaoTableMap::COL_IPCONCENTRADOR, AutenticacaoTableMap::COL_IPV6, AutenticacaoTableMap::COL_MAC, AutenticacaoTableMap::COL_CLIENTE_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'concentrador', 'inicio', 'termino', 'trafegoupload', 'trafegodownload', 'movitodesconexao', 'ipconexao', 'ipconcentrador', 'ipv6', 'mac', 'cliente_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Concentrador' => 1, 'Inicio' => 2, 'Termino' => 3, 'Trafegoupload' => 4, 'Trafegodownload' => 5, 'Movitodesconexao' => 6, 'Ipconexao' => 7, 'Ipconcentrador' => 8, 'Ipv6' => 9, 'Mac' => 10, 'ClienteId' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'concentrador' => 1, 'inicio' => 2, 'termino' => 3, 'trafegoupload' => 4, 'trafegodownload' => 5, 'movitodesconexao' => 6, 'ipconexao' => 7, 'ipconcentrador' => 8, 'ipv6' => 9, 'mac' => 10, 'clienteId' => 11, ),
        self::TYPE_COLNAME       => array(AutenticacaoTableMap::COL_ID => 0, AutenticacaoTableMap::COL_CONCENTRADOR => 1, AutenticacaoTableMap::COL_INICIO => 2, AutenticacaoTableMap::COL_TERMINO => 3, AutenticacaoTableMap::COL_TRAFEGOUPLOAD => 4, AutenticacaoTableMap::COL_TRAFEGODOWNLOAD => 5, AutenticacaoTableMap::COL_MOVITODESCONEXAO => 6, AutenticacaoTableMap::COL_IPCONEXAO => 7, AutenticacaoTableMap::COL_IPCONCENTRADOR => 8, AutenticacaoTableMap::COL_IPV6 => 9, AutenticacaoTableMap::COL_MAC => 10, AutenticacaoTableMap::COL_CLIENTE_ID => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'concentrador' => 1, 'inicio' => 2, 'termino' => 3, 'trafegoupload' => 4, 'trafegodownload' => 5, 'movitodesconexao' => 6, 'ipconexao' => 7, 'ipconcentrador' => 8, 'ipv6' => 9, 'mac' => 10, 'cliente_id' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('autenticacao');
        $this->setPhpName('Autenticacao');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Autenticacao');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('concentrador', 'Concentrador', 'VARCHAR', false, 45, null);
        $this->addColumn('inicio', 'Inicio', 'VARCHAR', false, 45, null);
        $this->addColumn('termino', 'Termino', 'VARCHAR', false, 45, null);
        $this->addColumn('trafegoupload', 'Trafegoupload', 'FLOAT', false, null, null);
        $this->addColumn('trafegodownload', 'Trafegodownload', 'FLOAT', false, null, null);
        $this->addColumn('movitodesconexao', 'Movitodesconexao', 'VARCHAR', false, 45, null);
        $this->addColumn('ipconexao', 'Ipconexao', 'VARCHAR', false, 15, null);
        $this->addColumn('ipconcentrador', 'Ipconcentrador', 'VARCHAR', false, 15, null);
        $this->addColumn('ipv6', 'Ipv6', 'VARCHAR', false, 40, null);
        $this->addColumn('mac', 'Mac', 'VARCHAR', false, 17, null);
        $this->addForeignKey('cliente_id', 'ClienteId', 'INTEGER', 'cliente', 'id', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cliente', '\\Cliente', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':cliente_id',
    1 => ':id',
  ),
), null, null, null, false);
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
        return $withPrefix ? AutenticacaoTableMap::CLASS_DEFAULT : AutenticacaoTableMap::OM_CLASS;
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
     * @return array           (Autenticacao object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AutenticacaoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AutenticacaoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AutenticacaoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AutenticacaoTableMap::OM_CLASS;
            /** @var Autenticacao $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AutenticacaoTableMap::addInstanceToPool($obj, $key);
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
            $key = AutenticacaoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AutenticacaoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Autenticacao $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AutenticacaoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_ID);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_CONCENTRADOR);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_INICIO);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_TERMINO);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_TRAFEGOUPLOAD);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_TRAFEGODOWNLOAD);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_MOVITODESCONEXAO);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_IPCONEXAO);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_IPCONCENTRADOR);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_IPV6);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_MAC);
            $criteria->addSelectColumn(AutenticacaoTableMap::COL_CLIENTE_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.concentrador');
            $criteria->addSelectColumn($alias . '.inicio');
            $criteria->addSelectColumn($alias . '.termino');
            $criteria->addSelectColumn($alias . '.trafegoupload');
            $criteria->addSelectColumn($alias . '.trafegodownload');
            $criteria->addSelectColumn($alias . '.movitodesconexao');
            $criteria->addSelectColumn($alias . '.ipconexao');
            $criteria->addSelectColumn($alias . '.ipconcentrador');
            $criteria->addSelectColumn($alias . '.ipv6');
            $criteria->addSelectColumn($alias . '.mac');
            $criteria->addSelectColumn($alias . '.cliente_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(AutenticacaoTableMap::DATABASE_NAME)->getTable(AutenticacaoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AutenticacaoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AutenticacaoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AutenticacaoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Autenticacao or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Autenticacao object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AutenticacaoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Autenticacao) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AutenticacaoTableMap::DATABASE_NAME);
            $criteria->add(AutenticacaoTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AutenticacaoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AutenticacaoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AutenticacaoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the autenticacao table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AutenticacaoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Autenticacao or Criteria object.
     *
     * @param mixed               $criteria Criteria or Autenticacao object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AutenticacaoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Autenticacao object
        }

        if ($criteria->containsKey(AutenticacaoTableMap::COL_ID) && $criteria->keyContainsValue(AutenticacaoTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AutenticacaoTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AutenticacaoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AutenticacaoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AutenticacaoTableMap::buildTableMap();
