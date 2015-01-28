<?php

namespace Base;

use \Chamados as ChildChamados;
use \ChamadosQuery as ChildChamadosQuery;
use \Exception;
use \PDO;
use Map\ChamadosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'chamados' table.
 *
 *
 *
 * @method     ChildChamadosQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildChamadosQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildChamadosQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildChamadosQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 * @method     ChildChamadosQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildChamadosQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     ChildChamadosQuery orderByCategoria($order = Criteria::ASC) Order by the categoria column
 * @method     ChildChamadosQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method     ChildChamadosQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     ChildChamadosQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildChamadosQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildChamadosQuery groupByData() Group by the data column
 * @method     ChildChamadosQuery groupByMensagem() Group by the mensagem column
 * @method     ChildChamadosQuery groupByStatus() Group by the status column
 * @method     ChildChamadosQuery groupByTitulo() Group by the titulo column
 * @method     ChildChamadosQuery groupByCategoria() Group by the categoria column
 * @method     ChildChamadosQuery groupByUsuario() Group by the usuario column
 * @method     ChildChamadosQuery groupById() Group by the id column
 *
 * @method     ChildChamadosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildChamadosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildChamadosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildChamados findOne(ConnectionInterface $con = null) Return the first ChildChamados matching the query
 * @method     ChildChamados findOneOrCreate(ConnectionInterface $con = null) Return the first ChildChamados matching the query, or a new ChildChamados object populated from the query conditions when no match is found
 *
 * @method     ChildChamados findOneByUpdatedAt(string $updated_at) Return the first ChildChamados filtered by the updated_at column
 * @method     ChildChamados findOneByCreatedAt(string $created_at) Return the first ChildChamados filtered by the created_at column
 * @method     ChildChamados findOneByData(string $data) Return the first ChildChamados filtered by the data column
 * @method     ChildChamados findOneByMensagem(string $mensagem) Return the first ChildChamados filtered by the mensagem column
 * @method     ChildChamados findOneByStatus(int $status) Return the first ChildChamados filtered by the status column
 * @method     ChildChamados findOneByTitulo(string $titulo) Return the first ChildChamados filtered by the titulo column
 * @method     ChildChamados findOneByCategoria(int $categoria) Return the first ChildChamados filtered by the categoria column
 * @method     ChildChamados findOneByUsuario(string $usuario) Return the first ChildChamados filtered by the usuario column
 * @method     ChildChamados findOneById(int $id) Return the first ChildChamados filtered by the id column
 *
 * @method     ChildChamados[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildChamados objects based on current ModelCriteria
 * @method     ChildChamados[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildChamados objects filtered by the updated_at column
 * @method     ChildChamados[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildChamados objects filtered by the created_at column
 * @method     ChildChamados[]|ObjectCollection findByData(string $data) Return ChildChamados objects filtered by the data column
 * @method     ChildChamados[]|ObjectCollection findByMensagem(string $mensagem) Return ChildChamados objects filtered by the mensagem column
 * @method     ChildChamados[]|ObjectCollection findByStatus(int $status) Return ChildChamados objects filtered by the status column
 * @method     ChildChamados[]|ObjectCollection findByTitulo(string $titulo) Return ChildChamados objects filtered by the titulo column
 * @method     ChildChamados[]|ObjectCollection findByCategoria(int $categoria) Return ChildChamados objects filtered by the categoria column
 * @method     ChildChamados[]|ObjectCollection findByUsuario(string $usuario) Return ChildChamados objects filtered by the usuario column
 * @method     ChildChamados[]|ObjectCollection findById(int $id) Return ChildChamados objects filtered by the id column
 * @method     ChildChamados[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ChamadosQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\ChamadosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Chamados', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildChamadosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildChamadosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildChamadosQuery) {
            return $criteria;
        }
        $query = new ChildChamadosQuery();
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
     * @return ChildChamados|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ChamadosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ChamadosTableMap::DATABASE_NAME);
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
     * @return ChildChamados A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT updated_at, created_at, data, mensagem, status, titulo, categoria, usuario, id FROM chamados WHERE id = :p0';
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
            /** @var ChildChamados $obj */
            $obj = new ChildChamados();
            $obj->hydrate($row);
            ChamadosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildChamados|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ChamadosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ChamadosTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the data column
     *
     * Example usage:
     * <code>
     * $query->filterByData('fooValue');   // WHERE data = 'fooValue'
     * $query->filterByData('%fooValue%'); // WHERE data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $data The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByData($data = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($data)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $data)) {
                $data = str_replace('*', '%', $data);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_DATA, $data, $comparison);
    }

    /**
     * Filter the query on the mensagem column
     *
     * Example usage:
     * <code>
     * $query->filterByMensagem('fooValue');   // WHERE mensagem = 'fooValue'
     * $query->filterByMensagem('%fooValue%'); // WHERE mensagem LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mensagem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByMensagem($mensagem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mensagem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mensagem)) {
                $mensagem = str_replace('*', '%', $mensagem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_MENSAGEM, $mensagem, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the titulo column
     *
     * Example usage:
     * <code>
     * $query->filterByTitulo('fooValue');   // WHERE titulo = 'fooValue'
     * $query->filterByTitulo('%fooValue%'); // WHERE titulo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titulo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByTitulo($titulo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titulo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $titulo)) {
                $titulo = str_replace('*', '%', $titulo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_TITULO, $titulo, $comparison);
    }

    /**
     * Filter the query on the categoria column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoria(1234); // WHERE categoria = 1234
     * $query->filterByCategoria(array(12, 34)); // WHERE categoria IN (12, 34)
     * $query->filterByCategoria(array('min' => 12)); // WHERE categoria > 12
     * </code>
     *
     * @param     mixed $categoria The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByCategoria($categoria = null, $comparison = null)
    {
        if (is_array($categoria)) {
            $useMinMax = false;
            if (isset($categoria['min'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_CATEGORIA, $categoria['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoria['max'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_CATEGORIA, $categoria['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_CATEGORIA, $categoria, $comparison);
    }

    /**
     * Filter the query on the usuario column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
     * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usuario The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterByUsuario($usuario = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usuario)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $usuario)) {
                $usuario = str_replace('*', '%', $usuario);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_USUARIO, $usuario, $comparison);
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
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ChamadosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ChamadosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildChamados $chamados Object to remove from the list of results
     *
     * @return $this|ChildChamadosQuery The current query, for fluid interface
     */
    public function prune($chamados = null)
    {
        if ($chamados) {
            $this->addUsingAlias(ChamadosTableMap::COL_ID, $chamados->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the chamados table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChamadosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ChamadosTableMap::clearInstancePool();
            ChamadosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ChamadosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ChamadosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ChamadosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ChamadosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ChamadosQuery
