<?php

namespace Base;

use \Autenticacao as ChildAutenticacao;
use \AutenticacaoQuery as ChildAutenticacaoQuery;
use \Exception;
use \PDO;
use Map\AutenticacaoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'autenticacao' table.
 *
 *
 *
 * @method     ChildAutenticacaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAutenticacaoQuery orderByConcentrador($order = Criteria::ASC) Order by the concentrador column
 * @method     ChildAutenticacaoQuery orderByInicio($order = Criteria::ASC) Order by the inicio column
 * @method     ChildAutenticacaoQuery orderByTermino($order = Criteria::ASC) Order by the termino column
 * @method     ChildAutenticacaoQuery orderByTrafegoupload($order = Criteria::ASC) Order by the trafegoupload column
 * @method     ChildAutenticacaoQuery orderByTrafegodownload($order = Criteria::ASC) Order by the trafegodownload column
 * @method     ChildAutenticacaoQuery orderByMovitodesconexao($order = Criteria::ASC) Order by the movitodesconexao column
 * @method     ChildAutenticacaoQuery orderByIpconexao($order = Criteria::ASC) Order by the ipconexao column
 * @method     ChildAutenticacaoQuery orderByIpconcentrador($order = Criteria::ASC) Order by the ipconcentrador column
 * @method     ChildAutenticacaoQuery orderByIpv6($order = Criteria::ASC) Order by the ipv6 column
 * @method     ChildAutenticacaoQuery orderByMac($order = Criteria::ASC) Order by the mac column
 * @method     ChildAutenticacaoQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 *
 * @method     ChildAutenticacaoQuery groupById() Group by the id column
 * @method     ChildAutenticacaoQuery groupByConcentrador() Group by the concentrador column
 * @method     ChildAutenticacaoQuery groupByInicio() Group by the inicio column
 * @method     ChildAutenticacaoQuery groupByTermino() Group by the termino column
 * @method     ChildAutenticacaoQuery groupByTrafegoupload() Group by the trafegoupload column
 * @method     ChildAutenticacaoQuery groupByTrafegodownload() Group by the trafegodownload column
 * @method     ChildAutenticacaoQuery groupByMovitodesconexao() Group by the movitodesconexao column
 * @method     ChildAutenticacaoQuery groupByIpconexao() Group by the ipconexao column
 * @method     ChildAutenticacaoQuery groupByIpconcentrador() Group by the ipconcentrador column
 * @method     ChildAutenticacaoQuery groupByIpv6() Group by the ipv6 column
 * @method     ChildAutenticacaoQuery groupByMac() Group by the mac column
 * @method     ChildAutenticacaoQuery groupByClienteId() Group by the cliente_id column
 *
 * @method     ChildAutenticacaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAutenticacaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAutenticacaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAutenticacaoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAutenticacaoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAutenticacaoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAutenticacaoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ChildAutenticacaoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ChildAutenticacaoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ChildAutenticacaoQuery joinWithCliente($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cliente relation
 *
 * @method     ChildAutenticacaoQuery leftJoinWithCliente() Adds a LEFT JOIN clause and with to the query using the Cliente relation
 * @method     ChildAutenticacaoQuery rightJoinWithCliente() Adds a RIGHT JOIN clause and with to the query using the Cliente relation
 * @method     ChildAutenticacaoQuery innerJoinWithCliente() Adds a INNER JOIN clause and with to the query using the Cliente relation
 *
 * @method     \ClienteQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAutenticacao findOne(ConnectionInterface $con = null) Return the first ChildAutenticacao matching the query
 * @method     ChildAutenticacao findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAutenticacao matching the query, or a new ChildAutenticacao object populated from the query conditions when no match is found
 *
 * @method     ChildAutenticacao findOneById(int $id) Return the first ChildAutenticacao filtered by the id column
 * @method     ChildAutenticacao findOneByConcentrador(string $concentrador) Return the first ChildAutenticacao filtered by the concentrador column
 * @method     ChildAutenticacao findOneByInicio(string $inicio) Return the first ChildAutenticacao filtered by the inicio column
 * @method     ChildAutenticacao findOneByTermino(string $termino) Return the first ChildAutenticacao filtered by the termino column
 * @method     ChildAutenticacao findOneByTrafegoupload(string $trafegoupload) Return the first ChildAutenticacao filtered by the trafegoupload column
 * @method     ChildAutenticacao findOneByTrafegodownload(string $trafegodownload) Return the first ChildAutenticacao filtered by the trafegodownload column
 * @method     ChildAutenticacao findOneByMovitodesconexao(string $movitodesconexao) Return the first ChildAutenticacao filtered by the movitodesconexao column
 * @method     ChildAutenticacao findOneByIpconexao(string $ipconexao) Return the first ChildAutenticacao filtered by the ipconexao column
 * @method     ChildAutenticacao findOneByIpconcentrador(string $ipconcentrador) Return the first ChildAutenticacao filtered by the ipconcentrador column
 * @method     ChildAutenticacao findOneByIpv6(string $ipv6) Return the first ChildAutenticacao filtered by the ipv6 column
 * @method     ChildAutenticacao findOneByMac(string $mac) Return the first ChildAutenticacao filtered by the mac column
 * @method     ChildAutenticacao findOneByClienteId(int $cliente_id) Return the first ChildAutenticacao filtered by the cliente_id column *

 * @method     ChildAutenticacao requirePk($key, ConnectionInterface $con = null) Return the ChildAutenticacao by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOne(ConnectionInterface $con = null) Return the first ChildAutenticacao matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAutenticacao requireOneById(int $id) Return the first ChildAutenticacao filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByConcentrador(string $concentrador) Return the first ChildAutenticacao filtered by the concentrador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByInicio(string $inicio) Return the first ChildAutenticacao filtered by the inicio column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByTermino(string $termino) Return the first ChildAutenticacao filtered by the termino column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByTrafegoupload(string $trafegoupload) Return the first ChildAutenticacao filtered by the trafegoupload column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByTrafegodownload(string $trafegodownload) Return the first ChildAutenticacao filtered by the trafegodownload column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByMovitodesconexao(string $movitodesconexao) Return the first ChildAutenticacao filtered by the movitodesconexao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByIpconexao(string $ipconexao) Return the first ChildAutenticacao filtered by the ipconexao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByIpconcentrador(string $ipconcentrador) Return the first ChildAutenticacao filtered by the ipconcentrador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByIpv6(string $ipv6) Return the first ChildAutenticacao filtered by the ipv6 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByMac(string $mac) Return the first ChildAutenticacao filtered by the mac column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAutenticacao requireOneByClienteId(int $cliente_id) Return the first ChildAutenticacao filtered by the cliente_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAutenticacao[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAutenticacao objects based on current ModelCriteria
 * @method     ChildAutenticacao[]|ObjectCollection findById(int $id) Return ChildAutenticacao objects filtered by the id column
 * @method     ChildAutenticacao[]|ObjectCollection findByConcentrador(string $concentrador) Return ChildAutenticacao objects filtered by the concentrador column
 * @method     ChildAutenticacao[]|ObjectCollection findByInicio(string $inicio) Return ChildAutenticacao objects filtered by the inicio column
 * @method     ChildAutenticacao[]|ObjectCollection findByTermino(string $termino) Return ChildAutenticacao objects filtered by the termino column
 * @method     ChildAutenticacao[]|ObjectCollection findByTrafegoupload(string $trafegoupload) Return ChildAutenticacao objects filtered by the trafegoupload column
 * @method     ChildAutenticacao[]|ObjectCollection findByTrafegodownload(string $trafegodownload) Return ChildAutenticacao objects filtered by the trafegodownload column
 * @method     ChildAutenticacao[]|ObjectCollection findByMovitodesconexao(string $movitodesconexao) Return ChildAutenticacao objects filtered by the movitodesconexao column
 * @method     ChildAutenticacao[]|ObjectCollection findByIpconexao(string $ipconexao) Return ChildAutenticacao objects filtered by the ipconexao column
 * @method     ChildAutenticacao[]|ObjectCollection findByIpconcentrador(string $ipconcentrador) Return ChildAutenticacao objects filtered by the ipconcentrador column
 * @method     ChildAutenticacao[]|ObjectCollection findByIpv6(string $ipv6) Return ChildAutenticacao objects filtered by the ipv6 column
 * @method     ChildAutenticacao[]|ObjectCollection findByMac(string $mac) Return ChildAutenticacao objects filtered by the mac column
 * @method     ChildAutenticacao[]|ObjectCollection findByClienteId(int $cliente_id) Return ChildAutenticacao objects filtered by the cliente_id column
 * @method     ChildAutenticacao[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AutenticacaoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AutenticacaoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Autenticacao', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAutenticacaoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAutenticacaoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAutenticacaoQuery) {
            return $criteria;
        }
        $query = new ChildAutenticacaoQuery();
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
     * @return ChildAutenticacao|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AutenticacaoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AutenticacaoTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAutenticacao A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, concentrador, inicio, termino, trafegoupload, trafegodownload, movitodesconexao, ipconexao, ipconcentrador, ipv6, mac, cliente_id FROM autenticacao WHERE id = :p0';
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
            /** @var ChildAutenticacao $obj */
            $obj = new ChildAutenticacao();
            $obj->hydrate($row);
            AutenticacaoTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAutenticacao|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the concentrador column
     *
     * Example usage:
     * <code>
     * $query->filterByConcentrador('fooValue');   // WHERE concentrador = 'fooValue'
     * $query->filterByConcentrador('%fooValue%', Criteria::LIKE); // WHERE concentrador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $concentrador The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByConcentrador($concentrador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($concentrador)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_CONCENTRADOR, $concentrador, $comparison);
    }

    /**
     * Filter the query on the inicio column
     *
     * Example usage:
     * <code>
     * $query->filterByInicio('fooValue');   // WHERE inicio = 'fooValue'
     * $query->filterByInicio('%fooValue%', Criteria::LIKE); // WHERE inicio LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inicio The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByInicio($inicio = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inicio)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_INICIO, $inicio, $comparison);
    }

    /**
     * Filter the query on the termino column
     *
     * Example usage:
     * <code>
     * $query->filterByTermino('fooValue');   // WHERE termino = 'fooValue'
     * $query->filterByTermino('%fooValue%', Criteria::LIKE); // WHERE termino LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termino The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByTermino($termino = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termino)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_TERMINO, $termino, $comparison);
    }

    /**
     * Filter the query on the trafegoupload column
     *
     * Example usage:
     * <code>
     * $query->filterByTrafegoupload('fooValue');   // WHERE trafegoupload = 'fooValue'
     * $query->filterByTrafegoupload('%fooValue%', Criteria::LIKE); // WHERE trafegoupload LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trafegoupload The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByTrafegoupload($trafegoupload = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trafegoupload)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_TRAFEGOUPLOAD, $trafegoupload, $comparison);
    }

    /**
     * Filter the query on the trafegodownload column
     *
     * Example usage:
     * <code>
     * $query->filterByTrafegodownload('fooValue');   // WHERE trafegodownload = 'fooValue'
     * $query->filterByTrafegodownload('%fooValue%', Criteria::LIKE); // WHERE trafegodownload LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trafegodownload The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByTrafegodownload($trafegodownload = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trafegodownload)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_TRAFEGODOWNLOAD, $trafegodownload, $comparison);
    }

    /**
     * Filter the query on the movitodesconexao column
     *
     * Example usage:
     * <code>
     * $query->filterByMovitodesconexao('fooValue');   // WHERE movitodesconexao = 'fooValue'
     * $query->filterByMovitodesconexao('%fooValue%', Criteria::LIKE); // WHERE movitodesconexao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $movitodesconexao The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByMovitodesconexao($movitodesconexao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($movitodesconexao)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_MOVITODESCONEXAO, $movitodesconexao, $comparison);
    }

    /**
     * Filter the query on the ipconexao column
     *
     * Example usage:
     * <code>
     * $query->filterByIpconexao('fooValue');   // WHERE ipconexao = 'fooValue'
     * $query->filterByIpconexao('%fooValue%', Criteria::LIKE); // WHERE ipconexao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipconexao The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByIpconexao($ipconexao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipconexao)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_IPCONEXAO, $ipconexao, $comparison);
    }

    /**
     * Filter the query on the ipconcentrador column
     *
     * Example usage:
     * <code>
     * $query->filterByIpconcentrador('fooValue');   // WHERE ipconcentrador = 'fooValue'
     * $query->filterByIpconcentrador('%fooValue%', Criteria::LIKE); // WHERE ipconcentrador LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipconcentrador The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByIpconcentrador($ipconcentrador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipconcentrador)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_IPCONCENTRADOR, $ipconcentrador, $comparison);
    }

    /**
     * Filter the query on the ipv6 column
     *
     * Example usage:
     * <code>
     * $query->filterByIpv6('fooValue');   // WHERE ipv6 = 'fooValue'
     * $query->filterByIpv6('%fooValue%', Criteria::LIKE); // WHERE ipv6 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipv6 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByIpv6($ipv6 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipv6)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_IPV6, $ipv6, $comparison);
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
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByMac($mac = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mac)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_MAC, $mac, $comparison);
    }

    /**
     * Filter the query on the cliente_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClienteId(1234); // WHERE cliente_id = 1234
     * $query->filterByClienteId(array(12, 34)); // WHERE cliente_id IN (12, 34)
     * $query->filterByClienteId(array('min' => 12)); // WHERE cliente_id > 12
     * </code>
     *
     * @see       filterByCliente()
     *
     * @param     mixed $clienteId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByClienteId($clienteId = null, $comparison = null)
    {
        if (is_array($clienteId)) {
            $useMinMax = false;
            if (isset($clienteId['min'])) {
                $this->addUsingAlias(AutenticacaoTableMap::COL_CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clienteId['max'])) {
                $this->addUsingAlias(AutenticacaoTableMap::COL_CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AutenticacaoTableMap::COL_CLIENTE_ID, $clienteId, $comparison);
    }

    /**
     * Filter the query by a related \Cliente object
     *
     * @param \Cliente|ObjectCollection $cliente The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof \Cliente) {
            return $this
                ->addUsingAlias(AutenticacaoTableMap::COL_CLIENTE_ID, $cliente->getId(), $comparison);
        } elseif ($cliente instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AutenticacaoTableMap::COL_CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCliente() only accepts arguments of type \Cliente or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cliente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function joinCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cliente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cliente');
        }

        return $this;
    }

    /**
     * Use the Cliente relation Cliente object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClienteQuery A secondary query class using the current class as primary query
     */
    public function useClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCliente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cliente', '\ClienteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAutenticacao $autenticacao Object to remove from the list of results
     *
     * @return $this|ChildAutenticacaoQuery The current query, for fluid interface
     */
    public function prune($autenticacao = null)
    {
        if ($autenticacao) {
            $this->addUsingAlias(AutenticacaoTableMap::COL_ID, $autenticacao->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the autenticacao table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AutenticacaoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AutenticacaoTableMap::clearInstancePool();
            AutenticacaoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AutenticacaoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AutenticacaoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AutenticacaoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AutenticacaoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AutenticacaoQuery
