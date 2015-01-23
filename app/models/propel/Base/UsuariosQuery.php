<?php

namespace Base;

use \Usuarios as ChildUsuarios;
use \UsuariosQuery as ChildUsuariosQuery;
use \Exception;
use \PDO;
use Map\UsuariosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'usuarios' table.
 *
 *
 *
 * @method     ChildUsuariosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUsuariosQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildUsuariosQuery orderBySenha($order = Criteria::ASC) Order by the senha column
 * @method     ChildUsuariosQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ChildUsuariosQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     ChildUsuariosQuery orderByRememberToken($order = Criteria::ASC) Order by the remember_token column
 * @method     ChildUsuariosQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildUsuariosQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildUsuariosQuery groupById() Group by the id column
 * @method     ChildUsuariosQuery groupByEmail() Group by the email column
 * @method     ChildUsuariosQuery groupBySenha() Group by the senha column
 * @method     ChildUsuariosQuery groupByNome() Group by the nome column
 * @method     ChildUsuariosQuery groupByTipo() Group by the tipo column
 * @method     ChildUsuariosQuery groupByRememberToken() Group by the remember_token column
 * @method     ChildUsuariosQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildUsuariosQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildUsuariosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsuariosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsuariosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsuarios findOne(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query
 * @method     ChildUsuarios findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query, or a new ChildUsuarios object populated from the query conditions when no match is found
 *
 * @method     ChildUsuarios findOneById(int $id) Return the first ChildUsuarios filtered by the id column
 * @method     ChildUsuarios findOneByEmail(string $email) Return the first ChildUsuarios filtered by the email column
 * @method     ChildUsuarios findOneBySenha(string $senha) Return the first ChildUsuarios filtered by the senha column
 * @method     ChildUsuarios findOneByNome(string $nome) Return the first ChildUsuarios filtered by the nome column
 * @method     ChildUsuarios findOneByTipo(string $tipo) Return the first ChildUsuarios filtered by the tipo column
 * @method     ChildUsuarios findOneByRememberToken(string $remember_token) Return the first ChildUsuarios filtered by the remember_token column
 * @method     ChildUsuarios findOneByCreatedAt(string $created_at) Return the first ChildUsuarios filtered by the created_at column
 * @method     ChildUsuarios findOneByUpdatedAt(string $updated_at) Return the first ChildUsuarios filtered by the updated_at column *

 * @method     ChildUsuarios requirePk($key, ConnectionInterface $con = null) Return the ChildUsuarios by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOne(ConnectionInterface $con = null) Return the first ChildUsuarios matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsuarios requireOneById(int $id) Return the first ChildUsuarios filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByEmail(string $email) Return the first ChildUsuarios filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneBySenha(string $senha) Return the first ChildUsuarios filtered by the senha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByNome(string $nome) Return the first ChildUsuarios filtered by the nome column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByTipo(string $tipo) Return the first ChildUsuarios filtered by the tipo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByRememberToken(string $remember_token) Return the first ChildUsuarios filtered by the remember_token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByCreatedAt(string $created_at) Return the first ChildUsuarios filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsuarios requireOneByUpdatedAt(string $updated_at) Return the first ChildUsuarios filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsuarios[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsuarios objects based on current ModelCriteria
 * @method     ChildUsuarios[]|ObjectCollection findById(int $id) Return ChildUsuarios objects filtered by the id column
 * @method     ChildUsuarios[]|ObjectCollection findByEmail(string $email) Return ChildUsuarios objects filtered by the email column
 * @method     ChildUsuarios[]|ObjectCollection findBySenha(string $senha) Return ChildUsuarios objects filtered by the senha column
 * @method     ChildUsuarios[]|ObjectCollection findByNome(string $nome) Return ChildUsuarios objects filtered by the nome column
 * @method     ChildUsuarios[]|ObjectCollection findByTipo(string $tipo) Return ChildUsuarios objects filtered by the tipo column
 * @method     ChildUsuarios[]|ObjectCollection findByRememberToken(string $remember_token) Return ChildUsuarios objects filtered by the remember_token column
 * @method     ChildUsuarios[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildUsuarios objects filtered by the created_at column
 * @method     ChildUsuarios[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildUsuarios objects filtered by the updated_at column
 * @method     ChildUsuarios[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsuariosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UsuariosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Usuarios', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsuariosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsuariosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsuariosQuery) {
            return $criteria;
        }
        $query = new ChildUsuariosQuery();
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
     * @return ChildUsuarios|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UsuariosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsuariosTableMap::DATABASE_NAME);
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
     * @return ChildUsuarios A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, email, senha, nome, tipo, remember_token, created_at, updated_at FROM usuarios WHERE id = :p0';
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
            /** @var ChildUsuarios $obj */
            $obj = new ChildUsuarios();
            $obj->hydrate($row);
            UsuariosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildUsuarios|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsuariosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsuariosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the senha column
     *
     * Example usage:
     * <code>
     * $query->filterBySenha('fooValue');   // WHERE senha = 'fooValue'
     * $query->filterBySenha('%fooValue%'); // WHERE senha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterBySenha($senha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senha)) {
                $senha = str_replace('*', '%', $senha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_SENHA, $senha, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuariosTableMap::COL_NOME, $nome, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UsuariosTableMap::COL_TIPO, $tipo, $comparison);
    }

    /**
     * Filter the query on the remember_token column
     *
     * Example usage:
     * <code>
     * $query->filterByRememberToken('fooValue');   // WHERE remember_token = 'fooValue'
     * $query->filterByRememberToken('%fooValue%'); // WHERE remember_token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rememberToken The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByRememberToken($rememberToken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rememberToken)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rememberToken)) {
                $rememberToken = str_replace('*', '%', $rememberToken);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_REMEMBER_TOKEN, $rememberToken, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(UsuariosTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsuariosTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUsuarios $usuarios Object to remove from the list of results
     *
     * @return $this|ChildUsuariosQuery The current query, for fluid interface
     */
    public function prune($usuarios = null)
    {
        if ($usuarios) {
            $this->addUsingAlias(UsuariosTableMap::COL_ID, $usuarios->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the usuarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsuariosTableMap::clearInstancePool();
            UsuariosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsuariosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsuariosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsuariosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsuariosQuery
