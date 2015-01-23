<?php

namespace Base;

use \ClientePgtos as ChildClientePgtos;
use \ClientePgtosQuery as ChildClientePgtosQuery;
use \Exception;
use \PDO;
use Map\ClientePgtosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cliente_pgtos' table.
 *
 *
 *
 * @method     ChildClientePgtosQuery orderByIdcliente($order = Criteria::ASC) Order by the idcliente column
 * @method     ChildClientePgtosQuery orderByIdproduto($order = Criteria::ASC) Order by the idproduto column
 * @method     ChildClientePgtosQuery orderByValor($order = Criteria::ASC) Order by the valor column
 * @method     ChildClientePgtosQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildClientePgtosQuery groupByIdcliente() Group by the idcliente column
 * @method     ChildClientePgtosQuery groupByIdproduto() Group by the idproduto column
 * @method     ChildClientePgtosQuery groupByValor() Group by the valor column
 * @method     ChildClientePgtosQuery groupById() Group by the id column
 *
 * @method     ChildClientePgtosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClientePgtosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClientePgtosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClientePgtosQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ChildClientePgtosQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ChildClientePgtosQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ChildClientePgtosQuery leftJoinProdutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produtos relation
 * @method     ChildClientePgtosQuery rightJoinProdutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produtos relation
 * @method     ChildClientePgtosQuery innerJoinProdutos($relationAlias = null) Adds a INNER JOIN clause to the query using the Produtos relation
 *
 * @method     \ClienteQuery|\ProdutosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildClientePgtos findOne(ConnectionInterface $con = null) Return the first ChildClientePgtos matching the query
 * @method     ChildClientePgtos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClientePgtos matching the query, or a new ChildClientePgtos object populated from the query conditions when no match is found
 *
 * @method     ChildClientePgtos findOneByIdcliente(int $idcliente) Return the first ChildClientePgtos filtered by the idcliente column
 * @method     ChildClientePgtos findOneByIdproduto(int $idproduto) Return the first ChildClientePgtos filtered by the idproduto column
 * @method     ChildClientePgtos findOneByValor(string $valor) Return the first ChildClientePgtos filtered by the valor column
 * @method     ChildClientePgtos findOneById(int $id) Return the first ChildClientePgtos filtered by the id column
 *
 * @method     ChildClientePgtos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClientePgtos objects based on current ModelCriteria
 * @method     ChildClientePgtos[]|ObjectCollection findByIdcliente(int $idcliente) Return ChildClientePgtos objects filtered by the idcliente column
 * @method     ChildClientePgtos[]|ObjectCollection findByIdproduto(int $idproduto) Return ChildClientePgtos objects filtered by the idproduto column
 * @method     ChildClientePgtos[]|ObjectCollection findByValor(string $valor) Return ChildClientePgtos objects filtered by the valor column
 * @method     ChildClientePgtos[]|ObjectCollection findById(int $id) Return ChildClientePgtos objects filtered by the id column
 * @method     ChildClientePgtos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClientePgtosQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\ClientePgtosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\ClientePgtos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClientePgtosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClientePgtosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClientePgtosQuery) {
            return $criteria;
        }
        $query = new ChildClientePgtosQuery();
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
     * @return ChildClientePgtos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientePgtosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClientePgtosTableMap::DATABASE_NAME);
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
     * @return ChildClientePgtos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idcliente, idproduto, valor, id FROM cliente_pgtos WHERE id = :p0';
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
            /** @var ChildClientePgtos $obj */
            $obj = new ChildClientePgtos();
            $obj->hydrate($row);
            ClientePgtosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildClientePgtos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByIdcliente($idcliente = null, $comparison = null)
    {
        if (is_array($idcliente)) {
            $useMinMax = false;
            if (isset($idcliente['min'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_IDCLIENTE, $idcliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idcliente['max'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_IDCLIENTE, $idcliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePgtosTableMap::COL_IDCLIENTE, $idcliente, $comparison);
    }

    /**
     * Filter the query on the idproduto column
     *
     * Example usage:
     * <code>
     * $query->filterByIdproduto(1234); // WHERE idproduto = 1234
     * $query->filterByIdproduto(array(12, 34)); // WHERE idproduto IN (12, 34)
     * $query->filterByIdproduto(array('min' => 12)); // WHERE idproduto > 12
     * </code>
     *
     * @see       filterByProdutos()
     *
     * @param     mixed $idproduto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByIdproduto($idproduto = null, $comparison = null)
    {
        if (is_array($idproduto)) {
            $useMinMax = false;
            if (isset($idproduto['min'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_IDPRODUTO, $idproduto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idproduto['max'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_IDPRODUTO, $idproduto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePgtosTableMap::COL_IDPRODUTO, $idproduto, $comparison);
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
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByValor($valor = null, $comparison = null)
    {
        if (is_array($valor)) {
            $useMinMax = false;
            if (isset($valor['min'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_VALOR, $valor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valor['max'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_VALOR, $valor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePgtosTableMap::COL_VALOR, $valor, $comparison);
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
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query by a related \Cliente object
     *
     * @param \Cliente|ObjectCollection $cliente The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByCliente($cliente, $comparison = null)
    {
        if ($cliente instanceof \Cliente) {
            return $this
                ->addUsingAlias(ClientePgtosTableMap::COL_IDCLIENTE, $cliente->getId(), $comparison);
        } elseif ($cliente instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientePgtosTableMap::COL_IDCLIENTE, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
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
     * Filter the query by a related \Produtos object
     *
     * @param \Produtos|ObjectCollection $produtos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildClientePgtosQuery The current query, for fluid interface
     */
    public function filterByProdutos($produtos, $comparison = null)
    {
        if ($produtos instanceof \Produtos) {
            return $this
                ->addUsingAlias(ClientePgtosTableMap::COL_IDPRODUTO, $produtos->getId(), $comparison);
        } elseif ($produtos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientePgtosTableMap::COL_IDPRODUTO, $produtos->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProdutos() only accepts arguments of type \Produtos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Produtos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function joinProdutos($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Produtos');

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
            $this->addJoinObject($join, 'Produtos');
        }

        return $this;
    }

    /**
     * Use the Produtos relation Produtos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProdutosQuery A secondary query class using the current class as primary query
     */
    public function useProdutosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProdutos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Produtos', '\ProdutosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClientePgtos $clientePgtos Object to remove from the list of results
     *
     * @return $this|ChildClientePgtosQuery The current query, for fluid interface
     */
    public function prune($clientePgtos = null)
    {
        if ($clientePgtos) {
            $this->addUsingAlias(ClientePgtosTableMap::COL_ID, $clientePgtos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cliente_pgtos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientePgtosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientePgtosTableMap::clearInstancePool();
            ClientePgtosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientePgtosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClientePgtosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClientePgtosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClientePgtosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClientePgtosQuery
