<?php

namespace Base;

use \DocumentosDownloads as ChildDocumentosDownloads;
use \DocumentosDownloadsQuery as ChildDocumentosDownloadsQuery;
use \Exception;
use \PDO;
use Map\DocumentosDownloadsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'documentos_downloads' table.
 *
 *
 *
 * @method     ChildDocumentosDownloadsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDocumentosDownloadsQuery orderByDtdownload($order = Criteria::ASC) Order by the dtdownload column
 * @method     ChildDocumentosDownloadsQuery orderByIdusuario($order = Criteria::ASC) Order by the idusuario column
 * @method     ChildDocumentosDownloadsQuery orderByIddocumento($order = Criteria::ASC) Order by the iddocumento column
 *
 * @method     ChildDocumentosDownloadsQuery groupById() Group by the id column
 * @method     ChildDocumentosDownloadsQuery groupByDtdownload() Group by the dtdownload column
 * @method     ChildDocumentosDownloadsQuery groupByIdusuario() Group by the idusuario column
 * @method     ChildDocumentosDownloadsQuery groupByIddocumento() Group by the iddocumento column
 *
 * @method     ChildDocumentosDownloadsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDocumentosDownloadsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDocumentosDownloadsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDocumentosDownloadsQuery leftJoinDocumentos($relationAlias = null) Adds a LEFT JOIN clause to the query using the Documentos relation
 * @method     ChildDocumentosDownloadsQuery rightJoinDocumentos($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Documentos relation
 * @method     ChildDocumentosDownloadsQuery innerJoinDocumentos($relationAlias = null) Adds a INNER JOIN clause to the query using the Documentos relation
 *
 * @method     ChildDocumentosDownloadsQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildDocumentosDownloadsQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildDocumentosDownloadsQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     \DocumentosQuery|\UsuariosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDocumentosDownloads findOne(ConnectionInterface $con = null) Return the first ChildDocumentosDownloads matching the query
 * @method     ChildDocumentosDownloads findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDocumentosDownloads matching the query, or a new ChildDocumentosDownloads object populated from the query conditions when no match is found
 *
 * @method     ChildDocumentosDownloads findOneById(int $id) Return the first ChildDocumentosDownloads filtered by the id column
 * @method     ChildDocumentosDownloads findOneByDtdownload(string $dtdownload) Return the first ChildDocumentosDownloads filtered by the dtdownload column
 * @method     ChildDocumentosDownloads findOneByIdusuario(int $idusuario) Return the first ChildDocumentosDownloads filtered by the idusuario column
 * @method     ChildDocumentosDownloads findOneByIddocumento(int $iddocumento) Return the first ChildDocumentosDownloads filtered by the iddocumento column
 *
 * @method     ChildDocumentosDownloads[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDocumentosDownloads objects based on current ModelCriteria
 * @method     ChildDocumentosDownloads[]|ObjectCollection findById(int $id) Return ChildDocumentosDownloads objects filtered by the id column
 * @method     ChildDocumentosDownloads[]|ObjectCollection findByDtdownload(string $dtdownload) Return ChildDocumentosDownloads objects filtered by the dtdownload column
 * @method     ChildDocumentosDownloads[]|ObjectCollection findByIdusuario(int $idusuario) Return ChildDocumentosDownloads objects filtered by the idusuario column
 * @method     ChildDocumentosDownloads[]|ObjectCollection findByIddocumento(int $iddocumento) Return ChildDocumentosDownloads objects filtered by the iddocumento column
 * @method     ChildDocumentosDownloads[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DocumentosDownloadsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\DocumentosDownloadsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\DocumentosDownloads', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDocumentosDownloadsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDocumentosDownloadsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDocumentosDownloadsQuery) {
            return $criteria;
        }
        $query = new ChildDocumentosDownloadsQuery();
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
     * @return ChildDocumentosDownloads|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DocumentosDownloadsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DocumentosDownloadsTableMap::DATABASE_NAME);
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
     * @return ChildDocumentosDownloads A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, dtdownload, idusuario, iddocumento FROM documentos_downloads WHERE id = :p0';
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
            /** @var ChildDocumentosDownloads $obj */
            $obj = new ChildDocumentosDownloads();
            $obj->hydrate($row);
            DocumentosDownloadsTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDocumentosDownloads|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the dtdownload column
     *
     * Example usage:
     * <code>
     * $query->filterByDtdownload('2011-03-14'); // WHERE dtdownload = '2011-03-14'
     * $query->filterByDtdownload('now'); // WHERE dtdownload = '2011-03-14'
     * $query->filterByDtdownload(array('max' => 'yesterday')); // WHERE dtdownload > '2011-03-13'
     * </code>
     *
     * @param     mixed $dtdownload The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByDtdownload($dtdownload = null, $comparison = null)
    {
        if (is_array($dtdownload)) {
            $useMinMax = false;
            if (isset($dtdownload['min'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_DTDOWNLOAD, $dtdownload['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dtdownload['max'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_DTDOWNLOAD, $dtdownload['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_DTDOWNLOAD, $dtdownload, $comparison);
    }

    /**
     * Filter the query on the idusuario column
     *
     * Example usage:
     * <code>
     * $query->filterByIdusuario(1234); // WHERE idusuario = 1234
     * $query->filterByIdusuario(array(12, 34)); // WHERE idusuario IN (12, 34)
     * $query->filterByIdusuario(array('min' => 12)); // WHERE idusuario > 12
     * </code>
     *
     * @see       filterByUsuarios()
     *
     * @param     mixed $idusuario The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByIdusuario($idusuario = null, $comparison = null)
    {
        if (is_array($idusuario)) {
            $useMinMax = false;
            if (isset($idusuario['min'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDUSUARIO, $idusuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idusuario['max'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDUSUARIO, $idusuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDUSUARIO, $idusuario, $comparison);
    }

    /**
     * Filter the query on the iddocumento column
     *
     * Example usage:
     * <code>
     * $query->filterByIddocumento(1234); // WHERE iddocumento = 1234
     * $query->filterByIddocumento(array(12, 34)); // WHERE iddocumento IN (12, 34)
     * $query->filterByIddocumento(array('min' => 12)); // WHERE iddocumento > 12
     * </code>
     *
     * @see       filterByDocumentos()
     *
     * @param     mixed $iddocumento The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByIddocumento($iddocumento = null, $comparison = null)
    {
        if (is_array($iddocumento)) {
            $useMinMax = false;
            if (isset($iddocumento['min'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDDOCUMENTO, $iddocumento['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddocumento['max'])) {
                $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDDOCUMENTO, $iddocumento['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosDownloadsTableMap::COL_IDDOCUMENTO, $iddocumento, $comparison);
    }

    /**
     * Filter the query by a related \Documentos object
     *
     * @param \Documentos|ObjectCollection $documentos The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByDocumentos($documentos, $comparison = null)
    {
        if ($documentos instanceof \Documentos) {
            return $this
                ->addUsingAlias(DocumentosDownloadsTableMap::COL_IDDOCUMENTO, $documentos->getId(), $comparison);
        } elseif ($documentos instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentosDownloadsTableMap::COL_IDDOCUMENTO, $documentos->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
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
     * Filter the query by a related \Usuarios object
     *
     * @param \Usuarios|ObjectCollection $usuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \Usuarios) {
            return $this
                ->addUsingAlias(DocumentosDownloadsTableMap::COL_IDUSUARIO, $usuarios->getId(), $comparison);
        } elseif ($usuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentosDownloadsTableMap::COL_IDUSUARIO, $usuarios->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsuarios() only accepts arguments of type \Usuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuarios relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function joinUsuarios($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuarios');

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
            $this->addJoinObject($join, 'Usuarios');
        }

        return $this;
    }

    /**
     * Use the Usuarios relation Usuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsuariosQuery A secondary query class using the current class as primary query
     */
    public function useUsuariosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuarios', '\UsuariosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDocumentosDownloads $documentosDownloads Object to remove from the list of results
     *
     * @return $this|ChildDocumentosDownloadsQuery The current query, for fluid interface
     */
    public function prune($documentosDownloads = null)
    {
        if ($documentosDownloads) {
            $this->addUsingAlias(DocumentosDownloadsTableMap::COL_ID, $documentosDownloads->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the documentos_downloads table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosDownloadsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DocumentosDownloadsTableMap::clearInstancePool();
            DocumentosDownloadsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosDownloadsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DocumentosDownloadsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DocumentosDownloadsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DocumentosDownloadsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DocumentosDownloadsQuery
