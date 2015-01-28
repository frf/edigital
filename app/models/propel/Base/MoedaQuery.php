<?php

namespace Base;

use \Moeda as ChildMoeda;
use \MoedaQuery as ChildMoedaQuery;
use \Exception;
use \PDO;
use Map\MoedaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'moeda' table.
 *
 *
 *
 * @method     ChildMoedaQuery orderBySigla($order = Criteria::ASC) Order by the sigla column
 * @method     ChildMoedaQuery orderByCodigo($order = Criteria::ASC) Order by the codigo column
 * @method     ChildMoedaQuery orderBySimbolo($order = Criteria::ASC) Order by the simbolo column
 * @method     ChildMoedaQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildMoedaQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildMoedaQuery groupBySigla() Group by the sigla column
 * @method     ChildMoedaQuery groupByCodigo() Group by the codigo column
 * @method     ChildMoedaQuery groupBySimbolo() Group by the simbolo column
 * @method     ChildMoedaQuery groupByNome() Group by the nome column
 * @method     ChildMoedaQuery groupById() Group by the id column
 *
 * @method     ChildMoedaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMoedaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMoedaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMoedaQuery leftJoinClientePgtos($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientePgtos relation
 * @method     ChildMoedaQuery rightJoinClientePgtos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientePgtos relation
 * @method     ChildMoedaQuery innerJoinClientePgtos($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientePgtos relation
 *
 * @method     ChildMoedaQuery leftJoinProdutos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Produtos relation
 * @method     ChildMoedaQuery rightJoinProdutos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Produtos relation
 * @method     ChildMoedaQuery innerJoinProdutos($relationAlias = null) Adds a INNER JOIN clause to the query using the Produtos relation
 *
 * @method     \ClientePgtosQuery|\ProdutosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMoeda findOne(ConnectionInterface $con = null) Return the first ChildMoeda matching the query
 * @method     ChildMoeda findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMoeda matching the query, or a new ChildMoeda object populated from the query conditions when no match is found
 *
 * @method     ChildMoeda findOneBySigla(string $sigla) Return the first ChildMoeda filtered by the sigla column
 * @method     ChildMoeda findOneByCodigo(string $codigo) Return the first ChildMoeda filtered by the codigo column
 * @method     ChildMoeda findOneBySimbolo(string $simbolo) Return the first ChildMoeda filtered by the simbolo column
 * @method     ChildMoeda findOneByNome(string $nome) Return the first ChildMoeda filtered by the nome column
 * @method     ChildMoeda findOneById(int $id) Return the first ChildMoeda filtered by the id column
 *
 * @method     ChildMoeda[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMoeda objects based on current ModelCriteria
 * @method     ChildMoeda[]|ObjectCollection findBySigla(string $sigla) Return ChildMoeda objects filtered by the sigla column
 * @method     ChildMoeda[]|ObjectCollection findByCodigo(string $codigo) Return ChildMoeda objects filtered by the codigo column
 * @method     ChildMoeda[]|ObjectCollection findBySimbolo(string $simbolo) Return ChildMoeda objects filtered by the simbolo column
 * @method     ChildMoeda[]|ObjectCollection findByNome(string $nome) Return ChildMoeda objects filtered by the nome column
 * @method     ChildMoeda[]|ObjectCollection findById(int $id) Return ChildMoeda objects filtered by the id column
 * @method     ChildMoeda[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MoedaQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MoedaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Moeda', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMoedaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMoedaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMoedaQuery) {
            return $criteria;
        }
        $query = new ChildMoedaQuery();
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
     * @return ChildMoeda|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MoedaTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MoedaTableMap::DATABASE_NAME);
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
     * @return ChildMoeda A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sigla, codigo, simbolo, nome, id FROM moeda WHERE id = :p0';
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
            /** @var ChildMoeda $obj */
            $obj = new ChildMoeda();
            $obj->hydrate($row);
            MoedaTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildMoeda|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MoedaTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MoedaTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sigla column
     *
     * Example usage:
     * <code>
     * $query->filterBySigla('fooValue');   // WHERE sigla = 'fooValue'
     * $query->filterBySigla('%fooValue%'); // WHERE sigla LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sigla The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterBySigla($sigla = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sigla)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sigla)) {
                $sigla = str_replace('*', '%', $sigla);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MoedaTableMap::COL_SIGLA, $sigla, $comparison);
    }

    /**
     * Filter the query on the codigo column
     *
     * Example usage:
     * <code>
     * $query->filterByCodigo('fooValue');   // WHERE codigo = 'fooValue'
     * $query->filterByCodigo('%fooValue%'); // WHERE codigo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codigo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterByCodigo($codigo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codigo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codigo)) {
                $codigo = str_replace('*', '%', $codigo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MoedaTableMap::COL_CODIGO, $codigo, $comparison);
    }

    /**
     * Filter the query on the simbolo column
     *
     * Example usage:
     * <code>
     * $query->filterBySimbolo('fooValue');   // WHERE simbolo = 'fooValue'
     * $query->filterBySimbolo('%fooValue%'); // WHERE simbolo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $simbolo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterBySimbolo($simbolo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($simbolo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $simbolo)) {
                $simbolo = str_replace('*', '%', $simbolo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MoedaTableMap::COL_SIMBOLO, $simbolo, $comparison);
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
     * @return $this|ChildMoedaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MoedaTableMap::COL_NOME, $nome, $comparison);
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
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MoedaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MoedaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MoedaTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query by a related \ClientePgtos object
     *
     * @param \ClientePgtos|ObjectCollection $clientePgtos  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMoedaQuery The current query, for fluid interface
     */
    public function filterByClientePgtos($clientePgtos, $comparison = null)
    {
        if ($clientePgtos instanceof \ClientePgtos) {
            return $this
                ->addUsingAlias(MoedaTableMap::COL_ID, $clientePgtos->getIdmoeda(), $comparison);
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
     * @return $this|ChildMoedaQuery The current query, for fluid interface
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
     * Filter the query by a related \Produtos object
     *
     * @param \Produtos|ObjectCollection $produtos  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildMoedaQuery The current query, for fluid interface
     */
    public function filterByProdutos($produtos, $comparison = null)
    {
        if ($produtos instanceof \Produtos) {
            return $this
                ->addUsingAlias(MoedaTableMap::COL_ID, $produtos->getIdmoeda(), $comparison);
        } elseif ($produtos instanceof ObjectCollection) {
            return $this
                ->useProdutosQuery()
                ->filterByPrimaryKeys($produtos->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildMoedaQuery The current query, for fluid interface
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
     * @param   ChildMoeda $moeda Object to remove from the list of results
     *
     * @return $this|ChildMoedaQuery The current query, for fluid interface
     */
    public function prune($moeda = null)
    {
        if ($moeda) {
            $this->addUsingAlias(MoedaTableMap::COL_ID, $moeda->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the moeda table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MoedaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MoedaTableMap::clearInstancePool();
            MoedaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MoedaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MoedaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MoedaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MoedaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MoedaQuery
