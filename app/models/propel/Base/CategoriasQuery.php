<?php

namespace Base;

use \Categorias as ChildCategorias;
use \CategoriasQuery as ChildCategoriasQuery;
use \Exception;
use \PDO;
use Map\CategoriasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'categorias' table.
 *
 *
 *
 * @method     ChildCategoriasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoriasQuery orderByIdClientes($order = Criteria::ASC) Order by the id_clientes column
 * @method     ChildCategoriasQuery orderByNomecategoria($order = Criteria::ASC) Order by the nomecategoria column
 *
 * @method     ChildCategoriasQuery groupById() Group by the id column
 * @method     ChildCategoriasQuery groupByIdClientes() Group by the id_clientes column
 * @method     ChildCategoriasQuery groupByNomecategoria() Group by the nomecategoria column
 *
 * @method     ChildCategoriasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoriasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoriasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoriasQuery leftJoinDocumentos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Documentos relation
 * @method     ChildCategoriasQuery rightJoinDocumentos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Documentos relation
 * @method     ChildCategoriasQuery innerJoinDocumentos($relationAlias = null) Adds a INNER JOIN clause to the query using the Documentos relation
 *
 * @method     \DocumentosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategorias findOne(ConnectionInterface $con = null) Return the first ChildCategorias matching the query
 * @method     ChildCategorias findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategorias matching the query, or a new ChildCategorias object populated from the query conditions when no match is found
 *
 * @method     ChildCategorias findOneById(int $id) Return the first ChildCategorias filtered by the id column
 * @method     ChildCategorias findOneByIdClientes(int $id_clientes) Return the first ChildCategorias filtered by the id_clientes column
 * @method     ChildCategorias findOneByNomecategoria(string $nomecategoria) Return the first ChildCategorias filtered by the nomecategoria column *

 * @method     ChildCategorias requirePk($key, ConnectionInterface $con = null) Return the ChildCategorias by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategorias requireOne(ConnectionInterface $con = null) Return the first ChildCategorias matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategorias requireOneById(int $id) Return the first ChildCategorias filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategorias requireOneByIdClientes(int $id_clientes) Return the first ChildCategorias filtered by the id_clientes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategorias requireOneByNomecategoria(string $nomecategoria) Return the first ChildCategorias filtered by the nomecategoria column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategorias[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategorias objects based on current ModelCriteria
 * @method     ChildCategorias[]|ObjectCollection findById(int $id) Return ChildCategorias objects filtered by the id column
 * @method     ChildCategorias[]|ObjectCollection findByIdClientes(int $id_clientes) Return ChildCategorias objects filtered by the id_clientes column
 * @method     ChildCategorias[]|ObjectCollection findByNomecategoria(string $nomecategoria) Return ChildCategorias objects filtered by the nomecategoria column
 * @method     ChildCategorias[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoriasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CategoriasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Categorias', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoriasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoriasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategoriasQuery) {
            return $criteria;
        }
        $query = new ChildCategoriasQuery();
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
     * @return ChildCategorias|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoriasTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoriasTableMap::DATABASE_NAME);
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
     * @return ChildCategorias A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_clientes, nomecategoria FROM categorias WHERE id = :p0';
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
            /** @var ChildCategorias $obj */
            $obj = new ChildCategorias();
            $obj->hydrate($row);
            CategoriasTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCategorias|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoriasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoriasTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoriasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoriasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoriasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_clientes column
     *
     * Example usage:
     * <code>
     * $query->filterByIdClientes(1234); // WHERE id_clientes = 1234
     * $query->filterByIdClientes(array(12, 34)); // WHERE id_clientes IN (12, 34)
     * $query->filterByIdClientes(array('min' => 12)); // WHERE id_clientes > 12
     * </code>
     *
     * @param     mixed $idClientes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterByIdClientes($idClientes = null, $comparison = null)
    {
        if (is_array($idClientes)) {
            $useMinMax = false;
            if (isset($idClientes['min'])) {
                $this->addUsingAlias(CategoriasTableMap::COL_ID_CLIENTES, $idClientes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idClientes['max'])) {
                $this->addUsingAlias(CategoriasTableMap::COL_ID_CLIENTES, $idClientes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoriasTableMap::COL_ID_CLIENTES, $idClientes, $comparison);
    }

    /**
     * Filter the query on the nomecategoria column
     *
     * Example usage:
     * <code>
     * $query->filterByNomecategoria('fooValue');   // WHERE nomecategoria = 'fooValue'
     * $query->filterByNomecategoria('%fooValue%'); // WHERE nomecategoria LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomecategoria The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterByNomecategoria($nomecategoria = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomecategoria)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomecategoria)) {
                $nomecategoria = str_replace('*', '%', $nomecategoria);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriasTableMap::COL_NOMECATEGORIA, $nomecategoria, $comparison);
    }

    /**
     * Filter the query by a related \Documentos object
     *
     * @param \Documentos|ObjectCollection $documentos  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoriasQuery The current query, for fluid interface
     */
    public function filterByDocumentos($documentos, $comparison = null)
    {
        if ($documentos instanceof \Documentos) {
            return $this
                ->addUsingAlias(CategoriasTableMap::COL_ID, $documentos->getIdCategorias(), $comparison);
        } elseif ($documentos instanceof ObjectCollection) {
            return $this
                ->useDocumentosQuery()
                ->filterByPrimaryKeys($documentos->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDocumentos() only accepts arguments of type \Documentos or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Documentos relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function joinDocumentos($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Documentos');

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
            $this->addJoinObject($join, 'Documentos');
        }

        return $this;
    }

    /**
     * Use the Documentos relation Documentos object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DocumentosQuery A secondary query class using the current class as primary query
     */
    public function useDocumentosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocumentos($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Documentos', '\DocumentosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCategorias $categorias Object to remove from the list of results
     *
     * @return $this|ChildCategoriasQuery The current query, for fluid interface
     */
    public function prune($categorias = null)
    {
        if ($categorias) {
            $this->addUsingAlias(CategoriasTableMap::COL_ID, $categorias->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the categorias table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoriasTableMap::clearInstancePool();
            CategoriasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoriasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoriasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoriasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CategoriasQuery
