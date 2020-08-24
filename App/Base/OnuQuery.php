<?php

namespace Base;

use \Onu as ChildOnu;
use \OnuQuery as ChildOnuQuery;
use \Exception;
use \PDO;
use Map\OnuTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'onu' table.
 *
 *
 *
 * @method     ChildOnuQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOnuQuery orderByMac($order = Criteria::ASC) Order by the mac column
 * @method     ChildOnuQuery orderByOlt($order = Criteria::ASC) Order by the olt column
 * @method     ChildOnuQuery orderBySlot($order = Criteria::ASC) Order by the slot column
 * @method     ChildOnuQuery orderByPon($order = Criteria::ASC) Order by the pon column
 * @method     ChildOnuQuery orderByOnu($order = Criteria::ASC) Order by the onu column
 * @method     ChildOnuQuery orderByModelo($order = Criteria::ASC) Order by the modelo column
 * @method     ChildOnuQuery orderByNome($order = Criteria::ASC) Order by the nome column
 *
 * @method     ChildOnuQuery groupById() Group by the id column
 * @method     ChildOnuQuery groupByMac() Group by the mac column
 * @method     ChildOnuQuery groupByOlt() Group by the olt column
 * @method     ChildOnuQuery groupBySlot() Group by the slot column
 * @method     ChildOnuQuery groupByPon() Group by the pon column
 * @method     ChildOnuQuery groupByOnu() Group by the onu column
 * @method     ChildOnuQuery groupByModelo() Group by the modelo column
 * @method     ChildOnuQuery groupByNome() Group by the nome column
 *
 * @method     ChildOnuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOnuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOnuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOnuQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOnuQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOnuQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOnu findOne(ConnectionInterface $con = null) Return the first ChildOnu matching the query
 * @method     ChildOnu findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOnu matching the query, or a new ChildOnu object populated from the query conditions when no match is found
 *
 * @method     ChildOnu findOneById(int $id) Return the first ChildOnu filtered by the id column
 * @method     ChildOnu findOneByMac(string $mac) Return the first ChildOnu filtered by the mac column
 * @method     ChildOnu findOneByOlt(int $olt) Return the first ChildOnu filtered by the olt column
 * @method     ChildOnu findOneBySlot(int $slot) Return the first ChildOnu filtered by the slot column
 * @method     ChildOnu findOneByPon(int $pon) Return the first ChildOnu filtered by the pon column
 * @method     ChildOnu findOneByOnu(int $onu) Return the first ChildOnu filtered by the onu column
 * @method     ChildOnu findOneByModelo(string $modelo) Return the first ChildOnu filtered by the modelo column
 * @method     ChildOnu findOneByNome(string $nome) Return the first ChildOnu filtered by the nome column *

 * @method     ChildOnu requirePk($key, ConnectionInterface $con = null) Return the ChildOnu by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOne(ConnectionInterface $con = null) Return the first ChildOnu matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOnu requireOneById(int $id) Return the first ChildOnu filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByMac(string $mac) Return the first ChildOnu filtered by the mac column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByOlt(int $olt) Return the first ChildOnu filtered by the olt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneBySlot(int $slot) Return the first ChildOnu filtered by the slot column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByPon(int $pon) Return the first ChildOnu filtered by the pon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByOnu(int $onu) Return the first ChildOnu filtered by the onu column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByModelo(string $modelo) Return the first ChildOnu filtered by the modelo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOnu requireOneByNome(string $nome) Return the first ChildOnu filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOnu[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOnu objects based on current ModelCriteria
 * @method     ChildOnu[]|ObjectCollection findById(int $id) Return ChildOnu objects filtered by the id column
 * @method     ChildOnu[]|ObjectCollection findByMac(string $mac) Return ChildOnu objects filtered by the mac column
 * @method     ChildOnu[]|ObjectCollection findByOlt(int $olt) Return ChildOnu objects filtered by the olt column
 * @method     ChildOnu[]|ObjectCollection findBySlot(int $slot) Return ChildOnu objects filtered by the slot column
 * @method     ChildOnu[]|ObjectCollection findByPon(int $pon) Return ChildOnu objects filtered by the pon column
 * @method     ChildOnu[]|ObjectCollection findByOnu(int $onu) Return ChildOnu objects filtered by the onu column
 * @method     ChildOnu[]|ObjectCollection findByModelo(string $modelo) Return ChildOnu objects filtered by the modelo column
 * @method     ChildOnu[]|ObjectCollection findByNome(string $nome) Return ChildOnu objects filtered by the nome column
 * @method     ChildOnu[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OnuQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OnuQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Onu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOnuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOnuQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOnuQuery) {
            return $criteria;
        }
        $query = new ChildOnuQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOnu|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OnuTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OnuTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOnu A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mac, olt, slot, pon, onu, modelo, nome FROM onu WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOnu $obj */
            $obj = new ChildOnu();
            $obj->hydrate($row);
            OnuTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOnu|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OnuTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OnuTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OnuTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OnuTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the mac column
     *
     * Example usage:
     * <code>
     * $query->filterByMac('fooValue');   // WHERE mac = 'fooValue'
     * $query->filterByMac('%fooValue%', Criteria::LIKE); // WHERE mac LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mac The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByMac($mac = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mac)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_MAC, $mac, $comparison);
    }

    /**
     * Filter the query on the olt column
     *
     * Example usage:
     * <code>
     * $query->filterByOlt(1234); // WHERE olt = 1234
     * $query->filterByOlt(array(12, 34)); // WHERE olt IN (12, 34)
     * $query->filterByOlt(array('min' => 12)); // WHERE olt > 12
     * </code>
     *
     * @param     mixed $olt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByOlt($olt = null, $comparison = null)
    {
        if (is_array($olt)) {
            $useMinMax = false;
            if (isset($olt['min'])) {
                $this->addUsingAlias(OnuTableMap::COL_OLT, $olt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($olt['max'])) {
                $this->addUsingAlias(OnuTableMap::COL_OLT, $olt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_OLT, $olt, $comparison);
    }

    /**
     * Filter the query on the slot column
     *
     * Example usage:
     * <code>
     * $query->filterBySlot(1234); // WHERE slot = 1234
     * $query->filterBySlot(array(12, 34)); // WHERE slot IN (12, 34)
     * $query->filterBySlot(array('min' => 12)); // WHERE slot > 12
     * </code>
     *
     * @param     mixed $slot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterBySlot($slot = null, $comparison = null)
    {
        if (is_array($slot)) {
            $useMinMax = false;
            if (isset($slot['min'])) {
                $this->addUsingAlias(OnuTableMap::COL_SLOT, $slot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($slot['max'])) {
                $this->addUsingAlias(OnuTableMap::COL_SLOT, $slot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_SLOT, $slot, $comparison);
    }

    /**
     * Filter the query on the pon column
     *
     * Example usage:
     * <code>
     * $query->filterByPon(1234); // WHERE pon = 1234
     * $query->filterByPon(array(12, 34)); // WHERE pon IN (12, 34)
     * $query->filterByPon(array('min' => 12)); // WHERE pon > 12
     * </code>
     *
     * @param     mixed $pon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByPon($pon = null, $comparison = null)
    {
        if (is_array($pon)) {
            $useMinMax = false;
            if (isset($pon['min'])) {
                $this->addUsingAlias(OnuTableMap::COL_PON, $pon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pon['max'])) {
                $this->addUsingAlias(OnuTableMap::COL_PON, $pon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_PON, $pon, $comparison);
    }

    /**
     * Filter the query on the onu column
     *
     * Example usage:
     * <code>
     * $query->filterByOnu(1234); // WHERE onu = 1234
     * $query->filterByOnu(array(12, 34)); // WHERE onu IN (12, 34)
     * $query->filterByOnu(array('min' => 12)); // WHERE onu > 12
     * </code>
     *
     * @param     mixed $onu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByOnu($onu = null, $comparison = null)
    {
        if (is_array($onu)) {
            $useMinMax = false;
            if (isset($onu['min'])) {
                $this->addUsingAlias(OnuTableMap::COL_ONU, $onu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($onu['max'])) {
                $this->addUsingAlias(OnuTableMap::COL_ONU, $onu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_ONU, $onu, $comparison);
    }

    /**
     * Filter the query on the modelo column
     *
     * Example usage:
     * <code>
     * $query->filterByModelo('fooValue');   // WHERE modelo = 'fooValue'
     * $query->filterByModelo('%fooValue%', Criteria::LIKE); // WHERE modelo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $modelo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByModelo($modelo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($modelo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_MODELO, $modelo, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%', Criteria::LIKE); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OnuTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOnu $onu Object to remove from the list of results
     *
     * @return $this|ChildOnuQuery The current query, for fluid interface
     */
    public function prune($onu = null)
    {
        if ($onu) {
            $this->addUsingAlias(OnuTableMap::COL_ID, $onu->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the onu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OnuTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OnuTableMap::clearInstancePool();
            OnuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OnuTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OnuTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OnuTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OnuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OnuQuery
