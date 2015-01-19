<?php

namespace Base;

use \Migrations as ChildMigrations;
use \MigrationsQuery as ChildMigrationsQuery;
use \Exception;
use Map\MigrationsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'migrations' table.
 *
 *
 *
 * @method     ChildMigrationsQuery orderByBatch($order = Criteria::ASC) Order by the batch column
 * @method     ChildMigrationsQuery orderByMigration($order = Criteria::ASC) Order by the migration column
 *
 * @method     ChildMigrationsQuery groupByBatch() Group by the batch column
 * @method     ChildMigrationsQuery groupByMigration() Group by the migration column
 *
 * @method     ChildMigrationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMigrationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMigrationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMigrations findOne(ConnectionInterface $con = null) Return the first ChildMigrations matching the query
 * @method     ChildMigrations findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMigrations matching the query, or a new ChildMigrations object populated from the query conditions when no match is found
 *
 * @method     ChildMigrations findOneByBatch(int $batch) Return the first ChildMigrations filtered by the batch column
 * @method     ChildMigrations findOneByMigration(string $migration) Return the first ChildMigrations filtered by the migration column
 *
 * @method     ChildMigrations[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMigrations objects based on current ModelCriteria
 * @method     ChildMigrations[]|ObjectCollection findByBatch(int $batch) Return ChildMigrations objects filtered by the batch column
 * @method     ChildMigrations[]|ObjectCollection findByMigration(string $migration) Return ChildMigrations objects filtered by the migration column
 * @method     ChildMigrations[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MigrationsQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\MigrationsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Migrations', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMigrationsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMigrationsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMigrationsQuery) {
            return $criteria;
        }
        $query = new ChildMigrationsQuery();
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
     * @return ChildMigrations|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Migrations object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Migrations object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildMigrationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Migrations object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMigrationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Migrations object has no primary key');
    }

    /**
     * Filter the query on the batch column
     *
     * Example usage:
     * <code>
     * $query->filterByBatch(1234); // WHERE batch = 1234
     * $query->filterByBatch(array(12, 34)); // WHERE batch IN (12, 34)
     * $query->filterByBatch(array('min' => 12)); // WHERE batch > 12
     * </code>
     *
     * @param     mixed $batch The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMigrationsQuery The current query, for fluid interface
     */
    public function filterByBatch($batch = null, $comparison = null)
    {
        if (is_array($batch)) {
            $useMinMax = false;
            if (isset($batch['min'])) {
                $this->addUsingAlias(MigrationsTableMap::COL_BATCH, $batch['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($batch['max'])) {
                $this->addUsingAlias(MigrationsTableMap::COL_BATCH, $batch['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MigrationsTableMap::COL_BATCH, $batch, $comparison);
    }

    /**
     * Filter the query on the migration column
     *
     * Example usage:
     * <code>
     * $query->filterByMigration('fooValue');   // WHERE migration = 'fooValue'
     * $query->filterByMigration('%fooValue%'); // WHERE migration LIKE '%fooValue%'
     * </code>
     *
     * @param     string $migration The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMigrationsQuery The current query, for fluid interface
     */
    public function filterByMigration($migration = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($migration)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $migration)) {
                $migration = str_replace('*', '%', $migration);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MigrationsTableMap::COL_MIGRATION, $migration, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMigrations $migrations Object to remove from the list of results
     *
     * @return $this|ChildMigrationsQuery The current query, for fluid interface
     */
    public function prune($migrations = null)
    {
        if ($migrations) {
            throw new LogicException('Migrations object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the migrations table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MigrationsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MigrationsTableMap::clearInstancePool();
            MigrationsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MigrationsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MigrationsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MigrationsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MigrationsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MigrationsQuery
