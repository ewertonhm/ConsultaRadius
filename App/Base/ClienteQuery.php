<?php

namespace Base;

use \Cliente as ChildCliente;
use \ClienteQuery as ChildClienteQuery;
use \Exception;
use \PDO;
use Map\ClienteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cliente' table.
 *
 *
 *
 * @method     ChildClienteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClienteQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildClienteQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     ChildClienteQuery orderByConcentrador($order = Criteria::ASC) Order by the concentrador column
 * @method     ChildClienteQuery orderByVlan($order = Criteria::ASC) Order by the vlan column
 * @method     ChildClienteQuery orderByPppoe($order = Criteria::ASC) Order by the pppoe column
 * @method     ChildClienteQuery orderBySenha($order = Criteria::ASC) Order by the senha column
 * @method     ChildClienteQuery orderByStcontrato($order = Criteria::ASC) Order by the stcontrato column
 * @method     ChildClienteQuery orderByServico($order = Criteria::ASC) Order by the servico column
 * @method     ChildClienteQuery orderByVelocidade($order = Criteria::ASC) Order by the velocidade column
 * @method     ChildClienteQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildClienteQuery orderByAnotacoes($order = Criteria::ASC) Order by the anotacoes column
 * @method     ChildClienteQuery orderByDocumento($order = Criteria::ASC) Order by the documento column
 * @method     ChildClienteQuery orderByEndereco($order = Criteria::ASC) Order by the endereco column
 * @method     ChildClienteQuery orderByCidade($order = Criteria::ASC) Order by the cidade column
 *
 * @method     ChildClienteQuery groupById() Group by the id column
 * @method     ChildClienteQuery groupByNome() Group by the nome column
 * @method     ChildClienteQuery groupByIp() Group by the ip column
 * @method     ChildClienteQuery groupByConcentrador() Group by the concentrador column
 * @method     ChildClienteQuery groupByVlan() Group by the vlan column
 * @method     ChildClienteQuery groupByPppoe() Group by the pppoe column
 * @method     ChildClienteQuery groupBySenha() Group by the senha column
 * @method     ChildClienteQuery groupByStcontrato() Group by the stcontrato column
 * @method     ChildClienteQuery groupByServico() Group by the servico column
 * @method     ChildClienteQuery groupByVelocidade() Group by the velocidade column
 * @method     ChildClienteQuery groupByStatus() Group by the status column
 * @method     ChildClienteQuery groupByAnotacoes() Group by the anotacoes column
 * @method     ChildClienteQuery groupByDocumento() Group by the documento column
 * @method     ChildClienteQuery groupByEndereco() Group by the endereco column
 * @method     ChildClienteQuery groupByCidade() Group by the cidade column
 *
 * @method     ChildClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClienteQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClienteQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClienteQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClienteQuery leftJoinAutenticacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Autenticacao relation
 * @method     ChildClienteQuery rightJoinAutenticacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Autenticacao relation
 * @method     ChildClienteQuery innerJoinAutenticacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Autenticacao relation
 *
 * @method     ChildClienteQuery joinWithAutenticacao($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Autenticacao relation
 *
 * @method     ChildClienteQuery leftJoinWithAutenticacao() Adds a LEFT JOIN clause and with to the query using the Autenticacao relation
 * @method     ChildClienteQuery rightJoinWithAutenticacao() Adds a RIGHT JOIN clause and with to the query using the Autenticacao relation
 * @method     ChildClienteQuery innerJoinWithAutenticacao() Adds a INNER JOIN clause and with to the query using the Autenticacao relation
 *
 * @method     ChildClienteQuery leftJoinLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the Log relation
 * @method     ChildClienteQuery rightJoinLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Log relation
 * @method     ChildClienteQuery innerJoinLog($relationAlias = null) Adds a INNER JOIN clause to the query using the Log relation
 *
 * @method     ChildClienteQuery joinWithLog($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Log relation
 *
 * @method     ChildClienteQuery leftJoinWithLog() Adds a LEFT JOIN clause and with to the query using the Log relation
 * @method     ChildClienteQuery rightJoinWithLog() Adds a RIGHT JOIN clause and with to the query using the Log relation
 * @method     ChildClienteQuery innerJoinWithLog() Adds a INNER JOIN clause and with to the query using the Log relation
 *
 * @method     \AutenticacaoQuery|\LogQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCliente findOne(ConnectionInterface $con = null) Return the first ChildCliente matching the query
 * @method     ChildCliente findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCliente matching the query, or a new ChildCliente object populated from the query conditions when no match is found
 *
 * @method     ChildCliente findOneById(int $id) Return the first ChildCliente filtered by the id column
 * @method     ChildCliente findOneByNome(string $nome) Return the first ChildCliente filtered by the nome column
 * @method     ChildCliente findOneByIp(string $ip) Return the first ChildCliente filtered by the ip column
 * @method     ChildCliente findOneByConcentrador(string $concentrador) Return the first ChildCliente filtered by the concentrador column
 * @method     ChildCliente findOneByVlan(int $vlan) Return the first ChildCliente filtered by the vlan column
 * @method     ChildCliente findOneByPppoe(string $pppoe) Return the first ChildCliente filtered by the pppoe column
 * @method     ChildCliente findOneBySenha(string $senha) Return the first ChildCliente filtered by the senha column
 * @method     ChildCliente findOneByStcontrato(string $stcontrato) Return the first ChildCliente filtered by the stcontrato column
 * @method     ChildCliente findOneByServico(string $servico) Return the first ChildCliente filtered by the servico column
 * @method     ChildCliente findOneByVelocidade(string $velocidade) Return the first ChildCliente filtered by the velocidade column
 * @method     ChildCliente findOneByStatus(string $status) Return the first ChildCliente filtered by the status column
 * @method     ChildCliente findOneByAnotacoes(string $anotacoes) Return the first ChildCliente filtered by the anotacoes column
 * @method     ChildCliente findOneByDocumento(string $documento) Return the first ChildCliente filtered by the documento column
 * @method     ChildCliente findOneByEndereco(string $endereco) Return the first ChildCliente filtered by the endereco column
 * @method     ChildCliente findOneByCidade(string $cidade) Return the first ChildCliente filtered by the cidade column *

 * @method     ChildCliente requirePk($key, ConnectionInterface $con = null) Return the ChildCliente by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOne(ConnectionInterface $con = null) Return the first ChildCliente matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCliente requireOneById(int $id) Return the first ChildCliente filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByNome(string $nome) Return the first ChildCliente filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByIp(string $ip) Return the first ChildCliente filtered by the ip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByConcentrador(string $concentrador) Return the first ChildCliente filtered by the concentrador column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByVlan(int $vlan) Return the first ChildCliente filtered by the vlan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByPppoe(string $pppoe) Return the first ChildCliente filtered by the pppoe column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneBySenha(string $senha) Return the first ChildCliente filtered by the senha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByStcontrato(string $stcontrato) Return the first ChildCliente filtered by the stcontrato column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByServico(string $servico) Return the first ChildCliente filtered by the servico column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByVelocidade(string $velocidade) Return the first ChildCliente filtered by the velocidade column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByStatus(string $status) Return the first ChildCliente filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByAnotacoes(string $anotacoes) Return the first ChildCliente filtered by the anotacoes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByDocumento(string $documento) Return the first ChildCliente filtered by the documento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByEndereco(string $endereco) Return the first ChildCliente filtered by the endereco column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCliente requireOneByCidade(string $cidade) Return the first ChildCliente filtered by the cidade column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCliente[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCliente objects based on current ModelCriteria
 * @method     ChildCliente[]|ObjectCollection findById(int $id) Return ChildCliente objects filtered by the id column
 * @method     ChildCliente[]|ObjectCollection findByNome(string $nome) Return ChildCliente objects filtered by the nome column
 * @method     ChildCliente[]|ObjectCollection findByIp(string $ip) Return ChildCliente objects filtered by the ip column
 * @method     ChildCliente[]|ObjectCollection findByConcentrador(string $concentrador) Return ChildCliente objects filtered by the concentrador column
 * @method     ChildCliente[]|ObjectCollection findByVlan(int $vlan) Return ChildCliente objects filtered by the vlan column
 * @method     ChildCliente[]|ObjectCollection findByPppoe(string $pppoe) Return ChildCliente objects filtered by the pppoe column
 * @method     ChildCliente[]|ObjectCollection findBySenha(string $senha) Return ChildCliente objects filtered by the senha column
 * @method     ChildCliente[]|ObjectCollection findByStcontrato(string $stcontrato) Return ChildCliente objects filtered by the stcontrato column
 * @method     ChildCliente[]|ObjectCollection findByServico(string $servico) Return ChildCliente objects filtered by the servico column
 * @method     ChildCliente[]|ObjectCollection findByVelocidade(string $velocidade) Return ChildCliente objects filtered by the velocidade column
 * @method     ChildCliente[]|ObjectCollection findByStatus(string $status) Return ChildCliente objects filtered by the status column
 * @method     ChildCliente[]|ObjectCollection findByAnotacoes(string $anotacoes) Return ChildCliente objects filtered by the anotacoes column
 * @method     ChildCliente[]|ObjectCollection findByDocumento(string $documento) Return ChildCliente objects filtered by the documento column
 * @method     ChildCliente[]|ObjectCollection findByEndereco(string $endereco) Return ChildCliente objects filtered by the endereco column
 * @method     ChildCliente[]|ObjectCollection findByCidade(string $cidade) Return ChildCliente objects filtered by the cidade column
 * @method     ChildCliente[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClienteQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClienteQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cliente', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClienteQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClienteQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClienteQuery) {
            return $criteria;
        }
        $query = new ChildClienteQuery();
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
     * @return ChildCliente|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClienteTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClienteTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCliente A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, ip, concentrador, vlan, pppoe, senha, stcontrato, servico, velocidade, status, anotacoes, documento, endereco, cidade FROM cliente WHERE id = :p0';
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
            /** @var ChildCliente $obj */
            $obj = new ChildCliente();
            $obj->hydrate($row);
            ClienteTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCliente|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClienteTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClienteTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the ip column
     *
     * Example usage:
     * <code>
     * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
     * $query->filterByIp('%fooValue%', Criteria::LIKE); // WHERE ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByIp($ip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_IP, $ip, $comparison);
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
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByConcentrador($concentrador = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($concentrador)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_CONCENTRADOR, $concentrador, $comparison);
    }

    /**
     * Filter the query on the vlan column
     *
     * Example usage:
     * <code>
     * $query->filterByVlan(1234); // WHERE vlan = 1234
     * $query->filterByVlan(array(12, 34)); // WHERE vlan IN (12, 34)
     * $query->filterByVlan(array('min' => 12)); // WHERE vlan > 12
     * </code>
     *
     * @param     mixed $vlan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByVlan($vlan = null, $comparison = null)
    {
        if (is_array($vlan)) {
            $useMinMax = false;
            if (isset($vlan['min'])) {
                $this->addUsingAlias(ClienteTableMap::COL_VLAN, $vlan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($vlan['max'])) {
                $this->addUsingAlias(ClienteTableMap::COL_VLAN, $vlan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_VLAN, $vlan, $comparison);
    }

    /**
     * Filter the query on the pppoe column
     *
     * Example usage:
     * <code>
     * $query->filterByPppoe('fooValue');   // WHERE pppoe = 'fooValue'
     * $query->filterByPppoe('%fooValue%', Criteria::LIKE); // WHERE pppoe LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pppoe The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByPppoe($pppoe = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pppoe)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_PPPOE, $pppoe, $comparison);
    }

    /**
     * Filter the query on the senha column
     *
     * Example usage:
     * <code>
     * $query->filterBySenha('fooValue');   // WHERE senha = 'fooValue'
     * $query->filterBySenha('%fooValue%', Criteria::LIKE); // WHERE senha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senha The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterBySenha($senha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senha)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_SENHA, $senha, $comparison);
    }

    /**
     * Filter the query on the stcontrato column
     *
     * Example usage:
     * <code>
     * $query->filterByStcontrato('fooValue');   // WHERE stcontrato = 'fooValue'
     * $query->filterByStcontrato('%fooValue%', Criteria::LIKE); // WHERE stcontrato LIKE '%fooValue%'
     * </code>
     *
     * @param     string $stcontrato The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByStcontrato($stcontrato = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($stcontrato)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_STCONTRATO, $stcontrato, $comparison);
    }

    /**
     * Filter the query on the servico column
     *
     * Example usage:
     * <code>
     * $query->filterByServico('fooValue');   // WHERE servico = 'fooValue'
     * $query->filterByServico('%fooValue%', Criteria::LIKE); // WHERE servico LIKE '%fooValue%'
     * </code>
     *
     * @param     string $servico The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByServico($servico = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($servico)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_SERVICO, $servico, $comparison);
    }

    /**
     * Filter the query on the velocidade column
     *
     * Example usage:
     * <code>
     * $query->filterByVelocidade('fooValue');   // WHERE velocidade = 'fooValue'
     * $query->filterByVelocidade('%fooValue%', Criteria::LIKE); // WHERE velocidade LIKE '%fooValue%'
     * </code>
     *
     * @param     string $velocidade The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByVelocidade($velocidade = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($velocidade)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_VELOCIDADE, $velocidade, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the anotacoes column
     *
     * Example usage:
     * <code>
     * $query->filterByAnotacoes('fooValue');   // WHERE anotacoes = 'fooValue'
     * $query->filterByAnotacoes('%fooValue%', Criteria::LIKE); // WHERE anotacoes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $anotacoes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByAnotacoes($anotacoes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($anotacoes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_ANOTACOES, $anotacoes, $comparison);
    }

    /**
     * Filter the query on the documento column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumento('fooValue');   // WHERE documento = 'fooValue'
     * $query->filterByDocumento('%fooValue%', Criteria::LIKE); // WHERE documento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $documento The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByDocumento($documento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($documento)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_DOCUMENTO, $documento, $comparison);
    }

    /**
     * Filter the query on the endereco column
     *
     * Example usage:
     * <code>
     * $query->filterByEndereco('fooValue');   // WHERE endereco = 'fooValue'
     * $query->filterByEndereco('%fooValue%', Criteria::LIKE); // WHERE endereco LIKE '%fooValue%'
     * </code>
     *
     * @param     string $endereco The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByEndereco($endereco = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endereco)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_ENDERECO, $endereco, $comparison);
    }

    /**
     * Filter the query on the cidade column
     *
     * Example usage:
     * <code>
     * $query->filterByCidade('fooValue');   // WHERE cidade = 'fooValue'
     * $query->filterByCidade('%fooValue%', Criteria::LIKE); // WHERE cidade LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cidade The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function filterByCidade($cidade = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cidade)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClienteTableMap::COL_CIDADE, $cidade, $comparison);
    }

    /**
     * Filter the query by a related \Autenticacao object
     *
     * @param \Autenticacao|ObjectCollection $autenticacao the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByAutenticacao($autenticacao, $comparison = null)
    {
        if ($autenticacao instanceof \Autenticacao) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_ID, $autenticacao->getClienteId(), $comparison);
        } elseif ($autenticacao instanceof ObjectCollection) {
            return $this
                ->useAutenticacaoQuery()
                ->filterByPrimaryKeys($autenticacao->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAutenticacao() only accepts arguments of type \Autenticacao or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Autenticacao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function joinAutenticacao($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Autenticacao');

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
            $this->addJoinObject($join, 'Autenticacao');
        }

        return $this;
    }

    /**
     * Use the Autenticacao relation Autenticacao object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AutenticacaoQuery A secondary query class using the current class as primary query
     */
    public function useAutenticacaoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAutenticacao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Autenticacao', '\AutenticacaoQuery');
    }

    /**
     * Filter the query by a related \Log object
     *
     * @param \Log|ObjectCollection $log the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClienteQuery The current query, for fluid interface
     */
    public function filterByLog($log, $comparison = null)
    {
        if ($log instanceof \Log) {
            return $this
                ->addUsingAlias(ClienteTableMap::COL_ID, $log->getClienteId(), $comparison);
        } elseif ($log instanceof ObjectCollection) {
            return $this
                ->useLogQuery()
                ->filterByPrimaryKeys($log->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLog() only accepts arguments of type \Log or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Log relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function joinLog($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Log');

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
            $this->addJoinObject($join, 'Log');
        }

        return $this;
    }

    /**
     * Use the Log relation Log object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LogQuery A secondary query class using the current class as primary query
     */
    public function useLogQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Log', '\LogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCliente $cliente Object to remove from the list of results
     *
     * @return $this|ChildClienteQuery The current query, for fluid interface
     */
    public function prune($cliente = null)
    {
        if ($cliente) {
            $this->addUsingAlias(ClienteTableMap::COL_ID, $cliente->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cliente table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClienteTableMap::clearInstancePool();
            ClienteTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClienteTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClienteTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClienteTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClienteQuery
