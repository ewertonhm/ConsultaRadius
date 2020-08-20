<?php

namespace Map;

use \Cliente;
use \ClienteQuery;
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
 * This class defines the structure of the 'cliente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ClienteTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClienteTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cliente';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Cliente';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Cliente';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the id field
     */
    const COL_ID = 'cliente.id';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'cliente.nome';

    /**
     * the column name for the ip field
     */
    const COL_IP = 'cliente.ip';

    /**
     * the column name for the concentrador field
     */
    const COL_CONCENTRADOR = 'cliente.concentrador';

    /**
     * the column name for the vlan field
     */
    const COL_VLAN = 'cliente.vlan';

    /**
     * the column name for the pppoe field
     */
    const COL_PPPOE = 'cliente.pppoe';

    /**
     * the column name for the senha field
     */
    const COL_SENHA = 'cliente.senha';

    /**
     * the column name for the stcontrato field
     */
    const COL_STCONTRATO = 'cliente.stcontrato';

    /**
     * the column name for the servico field
     */
    const COL_SERVICO = 'cliente.servico';

    /**
     * the column name for the velocidade field
     */
    const COL_VELOCIDADE = 'cliente.velocidade';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'cliente.status';

    /**
     * the column name for the anotacoes field
     */
    const COL_ANOTACOES = 'cliente.anotacoes';

    /**
     * the column name for the documento field
     */
    const COL_DOCUMENTO = 'cliente.documento';

    /**
     * the column name for the endereco field
     */
    const COL_ENDERECO = 'cliente.endereco';

    /**
     * the column name for the cidade field
     */
    const COL_CIDADE = 'cliente.cidade';

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
        self::TYPE_PHPNAME       => array('Id', 'Nome', 'Ip', 'Concentrador', 'Vlan', 'Pppoe', 'Senha', 'Stcontrato', 'Servico', 'Velocidade', 'Status', 'Anotacoes', 'Documento', 'Endereco', 'Cidade', ),
        self::TYPE_CAMELNAME     => array('id', 'nome', 'ip', 'concentrador', 'vlan', 'pppoe', 'senha', 'stcontrato', 'servico', 'velocidade', 'status', 'anotacoes', 'documento', 'endereco', 'cidade', ),
        self::TYPE_COLNAME       => array(ClienteTableMap::COL_ID, ClienteTableMap::COL_NOME, ClienteTableMap::COL_IP, ClienteTableMap::COL_CONCENTRADOR, ClienteTableMap::COL_VLAN, ClienteTableMap::COL_PPPOE, ClienteTableMap::COL_SENHA, ClienteTableMap::COL_STCONTRATO, ClienteTableMap::COL_SERVICO, ClienteTableMap::COL_VELOCIDADE, ClienteTableMap::COL_STATUS, ClienteTableMap::COL_ANOTACOES, ClienteTableMap::COL_DOCUMENTO, ClienteTableMap::COL_ENDERECO, ClienteTableMap::COL_CIDADE, ),
        self::TYPE_FIELDNAME     => array('id', 'nome', 'ip', 'concentrador', 'vlan', 'pppoe', 'senha', 'stcontrato', 'servico', 'velocidade', 'status', 'anotacoes', 'documento', 'endereco', 'cidade', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Nome' => 1, 'Ip' => 2, 'Concentrador' => 3, 'Vlan' => 4, 'Pppoe' => 5, 'Senha' => 6, 'Stcontrato' => 7, 'Servico' => 8, 'Velocidade' => 9, 'Status' => 10, 'Anotacoes' => 11, 'Documento' => 12, 'Endereco' => 13, 'Cidade' => 14, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nome' => 1, 'ip' => 2, 'concentrador' => 3, 'vlan' => 4, 'pppoe' => 5, 'senha' => 6, 'stcontrato' => 7, 'servico' => 8, 'velocidade' => 9, 'status' => 10, 'anotacoes' => 11, 'documento' => 12, 'endereco' => 13, 'cidade' => 14, ),
        self::TYPE_COLNAME       => array(ClienteTableMap::COL_ID => 0, ClienteTableMap::COL_NOME => 1, ClienteTableMap::COL_IP => 2, ClienteTableMap::COL_CONCENTRADOR => 3, ClienteTableMap::COL_VLAN => 4, ClienteTableMap::COL_PPPOE => 5, ClienteTableMap::COL_SENHA => 6, ClienteTableMap::COL_STCONTRATO => 7, ClienteTableMap::COL_SERVICO => 8, ClienteTableMap::COL_VELOCIDADE => 9, ClienteTableMap::COL_STATUS => 10, ClienteTableMap::COL_ANOTACOES => 11, ClienteTableMap::COL_DOCUMENTO => 12, ClienteTableMap::COL_ENDERECO => 13, ClienteTableMap::COL_CIDADE => 14, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nome' => 1, 'ip' => 2, 'concentrador' => 3, 'vlan' => 4, 'pppoe' => 5, 'senha' => 6, 'stcontrato' => 7, 'servico' => 8, 'velocidade' => 9, 'status' => 10, 'anotacoes' => 11, 'documento' => 12, 'endereco' => 13, 'cidade' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('cliente');
        $this->setPhpName('Cliente');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Cliente');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 60, null);
        $this->addColumn('ip', 'Ip', 'VARCHAR', false, 15, null);
        $this->addColumn('concentrador', 'Concentrador', 'VARCHAR', false, 45, null);
        $this->addColumn('vlan', 'Vlan', 'INTEGER', false, null, null);
        $this->addColumn('pppoe', 'Pppoe', 'VARCHAR', true, 45, null);
        $this->addColumn('senha', 'Senha', 'VARCHAR', false, 45, null);
        $this->addColumn('stcontrato', 'Stcontrato', 'VARCHAR', false, 45, null);
        $this->addColumn('servico', 'Servico', 'VARCHAR', false, 45, null);
        $this->addColumn('velocidade', 'Velocidade', 'VARCHAR', false, 45, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 45, null);
        $this->addColumn('anotacoes', 'Anotacoes', 'VARCHAR', false, 500, null);
        $this->addColumn('documento', 'Documento', 'VARCHAR', false, 30, null);
        $this->addColumn('endereco', 'Endereco', 'VARCHAR', false, 120, null);
        $this->addColumn('cidade', 'Cidade', 'VARCHAR', false, 30, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Autenticacao', '\\Autenticacao', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':cliente_id',
    1 => ':id',
  ),
), null, null, 'Autenticacaos', false);
        $this->addRelation('Log', '\\Log', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':cliente_id',
    1 => ':id',
  ),
), null, null, 'Logs', false);
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
        return $withPrefix ? ClienteTableMap::CLASS_DEFAULT : ClienteTableMap::OM_CLASS;
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
     * @return array           (Cliente object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClienteTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClienteTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClienteTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClienteTableMap::OM_CLASS;
            /** @var Cliente $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClienteTableMap::addInstanceToPool($obj, $key);
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
            $key = ClienteTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClienteTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Cliente $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClienteTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ClienteTableMap::COL_ID);
            $criteria->addSelectColumn(ClienteTableMap::COL_NOME);
            $criteria->addSelectColumn(ClienteTableMap::COL_IP);
            $criteria->addSelectColumn(ClienteTableMap::COL_CONCENTRADOR);
            $criteria->addSelectColumn(ClienteTableMap::COL_VLAN);
            $criteria->addSelectColumn(ClienteTableMap::COL_PPPOE);
            $criteria->addSelectColumn(ClienteTableMap::COL_SENHA);
            $criteria->addSelectColumn(ClienteTableMap::COL_STCONTRATO);
            $criteria->addSelectColumn(ClienteTableMap::COL_SERVICO);
            $criteria->addSelectColumn(ClienteTableMap::COL_VELOCIDADE);
            $criteria->addSelectColumn(ClienteTableMap::COL_STATUS);
            $criteria->addSelectColumn(ClienteTableMap::COL_ANOTACOES);
            $criteria->addSelectColumn(ClienteTableMap::COL_DOCUMENTO);
            $criteria->addSelectColumn(ClienteTableMap::COL_ENDERECO);
            $criteria->addSelectColumn(ClienteTableMap::COL_CIDADE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.ip');
            $criteria->addSelectColumn($alias . '.concentrador');
            $criteria->addSelectColumn($alias . '.vlan');
            $criteria->addSelectColumn($alias . '.pppoe');
            $criteria->addSelectColumn($alias . '.senha');
            $criteria->addSelectColumn($alias . '.stcontrato');
            $criteria->addSelectColumn($alias . '.servico');
            $criteria->addSelectColumn($alias . '.velocidade');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.anotacoes');
            $criteria->addSelectColumn($alias . '.documento');
            $criteria->addSelectColumn($alias . '.endereco');
            $criteria->addSelectColumn($alias . '.cidade');
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
        return Propel::getServiceContainer()->getDatabaseMap(ClienteTableMap::DATABASE_NAME)->getTable(ClienteTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClienteTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClienteTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClienteTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Cliente or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Cliente object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Cliente) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClienteTableMap::DATABASE_NAME);
            $criteria->add(ClienteTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ClienteQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClienteTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClienteTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClienteQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Cliente or Criteria object.
     *
     * @param mixed               $criteria Criteria or Cliente object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Cliente object
        }

        if ($criteria->containsKey(ClienteTableMap::COL_ID) && $criteria->keyContainsValue(ClienteTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClienteTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ClienteQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClienteTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClienteTableMap::buildTableMap();
