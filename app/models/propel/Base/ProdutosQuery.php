<?php

namespace Base;

use \Produtos as ChildProdutos;
use \ProdutosQuery as ChildProdutosQuery;
use \Exception;
use \PDO;
use Map\ProdutosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'produtos' table.
 *
 *
 *
 * @method     ChildProdutosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProdutosQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildProdutosQuery orderByValor($order = Criteria::ASC) Order by the valor column
 * @method     ChildProdutosQuery orderByIdmoeda($order = Criteria::ASC) Order by the idmoeda column
 * @method     ChildProdutosQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     ChildProdutosQuery orderByIdcliente($order = Criteria::ASC) Order by the idcliente column
 *
 * @method     ChildProdutosQuery groupById() Group by the id column
 * @method     ChildProdutosQuery groupByNome() Group by the nome column
 * @method     ChildProdutosQuery groupByValor() Group by the valor column
 * @method     ChildProdutosQuery groupByIdmoeda() Group by the idmoeda column
 * @method     ChildProdutosQuery groupByTipo() Group by the tipo column
 * @method     ChildProdutosQuery groupByIdcliente() Group by the idcliente column
 *
 * @method     ChildProdutosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProdutosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProdutosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProdutosQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ChildProdutosQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ChildProdutosQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ChildProdutosQuery leftJoinMoeda($relationAlias = null) Adds a LEFT JOIN clause to the query using the Moeda relation
 * @method     ChildProdutosQuery rightJoinMoeda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Moeda relation
 * @method     ChildProdutosQuery innerJoinMoeda($relationAlias = null) Adds a INNER JOIN clause to the query using the Moeda relation
 *
 * @method     ChildProdutosQuery leftJoinClientePgtos($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientePgtos relation
 * @method     ChildProdutosQuery rightJoinClientePgtos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientePgtos relation
 * @method     ChildProdutosQuery innerJoinClientePgtos($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientePgtos relation
 *
 * @method     \ClienteQuery|\MoedaQuery|\ClientePgtosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProdutos findOne(ConnectionInterface $con = null) Return the first ChildProdutos matching the query
 * @method     ChildProdutos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProdutos matching the query, or a new ChildProdutos object populated from the query conditions when no match is found
 *
 * @method     ChildProdutos findOneById(int $id) Return the first ChildProdutos filtered by the id column
 * @method     ChildProdutos findOneByNome(string $nome) Return the first ChildProdutos filtered by the nome column
 * @method     ChildProdutos findOneByValor(string $valor) Return the first ChildProdutos filtered by the valor column
 * @method     ChildProdutos findOneByIdmoeda(int $idmoeda) Return the first ChildProdutos filtered by the idmoeda column
 * @method     ChildProdutos findOneByTipo(string $tipo) Return the first ChildProdutos filtered by the tipo column
 * @method     ChildProdutos findOneByIdcliente(int $idcliente) Return the first ChildProdutos filtered by the idcliente column *

 * @method     ChildProdutos requirePk($key, ConnectionInterface $con = null) Return the ChildProdutos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOne(ConnectionInterface $con = null) Return the first ChildProdutos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProdutos requireOneById(int $id) Return the first ChildProdutos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOneByNome(string $nome) Return the first ChildProdutos filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOneByValor(string $valor) Return the first ChildProdutos filtered by the valor column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOneByIdmoeda(int $idmoeda) Return the first ChildProdutos filtered by the idmoeda column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOneByTipo(string $tipo) Return the first ChildProdutos filtered by the tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProdutos requireOneByIdcliente(int $idcliente) Return the first ChildProdutos filtered by the idcliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProdutos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProdutos objects based on current ModelCriteria
 * @method     ChildProdutos[]|ObjectCollection findById(int $id) Return ChildProdutos objects filtered by the id column
 * @method     ChildProdutos[]|ObjectCollection findByNome(string $nome) Return ChildProdutos objects filtered by the nome column
 * @method     ChildProdutos[]|ObjectCollection findByValor(string $valor) Return ChildProdutos objects filtered by the valor column
 * @method     ChildProdutos[]|ObjectCollection findByIdmoeda(int $idmoeda) Return ChildProdutos objects filtered by the idmoeda column
 * @method     ChildProdutos[]|ObjectCollection findByTipo(string $tipo) Return ChildProdutos objects filtered by the tipo column
 * @method     ChildProdutos[]|ObjectCollection findByIdcliente(int $idcliente) Return ChildProdutos objects filtered by the idcliente column
 * @method     ChildProdutos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProdutosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProdutosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Produtos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProdutosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProdutosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProdutosQuery) {
            return $criteria;
        }
        $query = new ChildProdutosQuery();
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
     * @return ChildProdutos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProdutosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProdutosTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
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
     * @return ChildProdutos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nome, valor, idmoeda, tipo, idcliente FROM produtos WHERE id = :p0';
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
            /** @var ChildProdutos $obj */
            $obj = new ChildProdutos();
            $obj->hydrate($row);
            ProdutosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildProdutos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProdutosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProdutosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nome column
     *
     * Example usage:
     * <code>
     * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
     * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nome The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByNome($nome = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nome)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nome)) {
                $nome = str_replace('*', '%', $nome);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_NOME, $nome, $comparison);
    }

    /**
     * Filter the query on the valor column
     *
     * Example usage:
     * <code>
     * $query->filterByValor(1234); // WHERE valor = 1234
     * $query->filterByValor(array(12, 34)); // WHERE valor IN (12, 34)
     * $query->filterByValor(array('min' => 12)); // WHERE valor > 12
     * </code>
     *
     * @param     mixed $valor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByValor($valor = null, $comparison = null)
    {
        if (is_array($valor)) {
            $useMinMax = false;
            if (isset($valor['min'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_VALOR, $valor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valor['max'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_VALOR, $valor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_VALOR, $valor, $comparison);
    }

    /**
     * Filter the query on the idmoeda column
     *
     * Example usage:
     * <code>
     * $query->filterByIdmoeda(1234); // WHERE idmoeda = 1234
     * $query->filterByIdmoeda(array(12, 34)); // WHERE idmoeda IN (12, 34)
     * $query->filterByIdmoeda(array('min' => 12)); // WHERE idmoeda > 12
     * </code>
     *
     * @see       filterByMoeda()
     *
     * @param     mixed $idmoeda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByIdmoeda($idmoeda = null, $comparison = null)
    {
        if (is_array($idmoeda)) {
            $useMinMax = false;
            if (isset($idmoeda['min'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_IDMOEDA, $idmoeda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idmoeda['max'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_IDMOEDA, $idmoeda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_IDMOEDA, $idmoeda, $comparison);
    }

    /**
     * Filter the query on the tipo column
     *
     * Example usage:
     * <code>
     * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
     * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByTipo($tipo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipo)) {
                $tipo = str_replace('*', '%', $tipo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_TIPO, $tipo, $comparison);
    }

    /**
     * Filter the query on the idcliente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdcliente(1234); // WHERE idcliente = 1234
     * $query->filterByIdcliente(array(12, 34)); // WHERE idcliente IN (12, 34)
     * $query->filterByIdcliente(array('min' => 12)); // WHERE idcliente > 12
     * </code>
     *
     * @see       filterByCliente()
     *
     * @param     mixed $idcliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByIdcliente($idcliente = null, $comparison = null)
    {
        if (is_array($idcliente)) {
            $useMinMax = false;
            if (isset($idcliente['min'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_IDCLIENTE, $idcliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcliente['max'])) {
                $this->addUsingAlias(ProdutosTableMap::COL_IDCLIENTE, $idcliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProdutosTableMap::COL_IDCLIENTE, $idcliente, $comparison);
    }

    /**
     * Filter the query by a related \Cliente object
     *
     * @param \Cliente|ObjectCollection $cliente The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof \Cliente) {
            return $this
                ->addUsingAlias(ProdutosTableMap::COL_IDCLIENTE, $cliente->getId(), $comparison);
        } elseif ($cliente instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdutosTableMap::COL_IDCLIENTE, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildProdutosQuery The current query, for fluid interface
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
     * Filter the query by a related \Moeda object
     *
     * @param \Moeda|ObjectCollection $moeda The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByMoeda($moeda, $comparison = null)
    {
        if ($moeda instanceof \Moeda) {
            return $this
                ->addUsingAlias(ProdutosTableMap::COL_IDMOEDA, $moeda->getId(), $comparison);
        } elseif ($moeda instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProdutosTableMap::COL_IDMOEDA, $moeda->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMoeda() only accepts arguments of type \Moeda or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Moeda relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function joinMoeda($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Moeda');

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
            $this->addJoinObject($join, 'Moeda');
        }

        return $this;
    }

    /**
     * Use the Moeda relation Moeda object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \MoedaQuery A secondary query class using the current class as primary query
     */
    public function useMoedaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMoeda($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Moeda', '\MoedaQuery');
    }

    /**
     * Filter the query by a related \ClientePgtos object
     *
     * @param \ClientePgtos|ObjectCollection $clientePgtos  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProdutosQuery The current query, for fluid interface
     */
    public function filterByClientePgtos($clientePgtos, $comparison = null)
    {
        if ($clientePgtos instanceof \ClientePgtos) {
            return $this
                ->addUsingAlias(ProdutosTableMap::COL_ID, $clientePgtos->getIdproduto(), $comparison);
        } elseif ($clientePgtos instanceof ObjectCollection) {
            return $this
                ->useClientePgtosQuery()
                ->filterByPrimaryKeys($clientePgtos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientePgtos() only accepts arguments of type \ClientePgtos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ClientePgtos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function joinClientePgtos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ClientePgtos');

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
            $this->addJoinObject($join, 'ClientePgtos');
        }

        return $this;
    }

    /**
     * Use the ClientePgtos relation ClientePgtos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientePgtosQuery A secondary query class using the current class as primary query
     */
    public function useClientePgtosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClientePgtos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ClientePgtos', '\ClientePgtosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProdutos $produtos Object to remove from the list of results
     *
     * @return $this|ChildProdutosQuery The current query, for fluid interface
     */
    public function prune($produtos = null)
    {
        if ($produtos) {
            $this->addUsingAlias(ProdutosTableMap::COL_ID, $produtos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the produtos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdutosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProdutosTableMap::clearInstancePool();
            ProdutosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdutosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProdutosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProdutosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProdutosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProdutosQuery
