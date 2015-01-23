<?php

namespace Base;

use \PasswordReminders as ChildPasswordReminders;
use \PasswordRemindersQuery as ChildPasswordRemindersQuery;
use \Exception;
use Map\PasswordRemindersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'password_reminders' table.
 *
 *
 *
<<<<<<< HEAD
 * @method     ChildPasswordRemindersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildPasswordRemindersQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildPasswordRemindersQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildPasswordRemindersQuery groupByEmail() Group by the email column
 * @method     ChildPasswordRemindersQuery groupByToken() Group by the token column
 * @method     ChildPasswordRemindersQuery groupByCreatedAt() Group by the created_at column
=======
 * @method     ChildPasswordRemindersQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildPasswordRemindersQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildPasswordRemindersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     ChildPasswordRemindersQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildPasswordRemindersQuery groupByToken() Group by the token column
 * @method     ChildPasswordRemindersQuery groupByEmail() Group by the email column
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
 *
 * @method     ChildPasswordRemindersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPasswordRemindersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPasswordRemindersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPasswordReminders findOne(ConnectionInterface $con = null) Return the first ChildPasswordReminders matching the query
 * @method     ChildPasswordReminders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPasswordReminders matching the query, or a new ChildPasswordReminders object populated from the query conditions when no match is found
 *
<<<<<<< HEAD
 * @method     ChildPasswordReminders findOneByEmail(string $email) Return the first ChildPasswordReminders filtered by the email column
 * @method     ChildPasswordReminders findOneByToken(string $token) Return the first ChildPasswordReminders filtered by the token column
 * @method     ChildPasswordReminders findOneByCreatedAt(string $created_at) Return the first ChildPasswordReminders filtered by the created_at column *

 * @method     ChildPasswordReminders requirePk($key, ConnectionInterface $con = null) Return the ChildPasswordReminders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReminders requireOne(ConnectionInterface $con = null) Return the first ChildPasswordReminders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPasswordReminders requireOneByEmail(string $email) Return the first ChildPasswordReminders filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReminders requireOneByToken(string $token) Return the first ChildPasswordReminders filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReminders requireOneByCreatedAt(string $created_at) Return the first ChildPasswordReminders filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPasswordReminders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPasswordReminders objects based on current ModelCriteria
 * @method     ChildPasswordReminders[]|ObjectCollection findByEmail(string $email) Return ChildPasswordReminders objects filtered by the email column
 * @method     ChildPasswordReminders[]|ObjectCollection findByToken(string $token) Return ChildPasswordReminders objects filtered by the token column
 * @method     ChildPasswordReminders[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPasswordReminders objects filtered by the created_at column
=======
 * @method     ChildPasswordReminders findOneByCreatedAt(string $created_at) Return the first ChildPasswordReminders filtered by the created_at column
 * @method     ChildPasswordReminders findOneByToken(string $token) Return the first ChildPasswordReminders filtered by the token column
 * @method     ChildPasswordReminders findOneByEmail(string $email) Return the first ChildPasswordReminders filtered by the email column
 *
 * @method     ChildPasswordReminders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPasswordReminders objects based on current ModelCriteria
 * @method     ChildPasswordReminders[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPasswordReminders objects filtered by the created_at column
 * @method     ChildPasswordReminders[]|ObjectCollection findByToken(string $token) Return ChildPasswordReminders objects filtered by the token column
 * @method     ChildPasswordReminders[]|ObjectCollection findByEmail(string $email) Return ChildPasswordReminders objects filtered by the email column
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
 * @method     ChildPasswordReminders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PasswordRemindersQuery extends ModelCriteria
{
<<<<<<< HEAD
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';
=======
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

    /**
     * Initializes internal state of \Base\PasswordRemindersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\PasswordReminders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPasswordRemindersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPasswordRemindersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPasswordRemindersQuery) {
            return $criteria;
        }
        $query = new ChildPasswordRemindersQuery();
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
     * @return ChildPasswordReminders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The PasswordReminders object has no primary key');
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
        throw new LogicException('The PasswordReminders object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The PasswordReminders object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The PasswordReminders object has no primary key');
    }

    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
<<<<<<< HEAD
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

        return $this->addUsingAlias(PasswordRemindersTableMap::COL_EMAIL, $email, $comparison);
=======
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt, $comparison);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $token)) {
                $token = str_replace('*', '%', $token);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PasswordRemindersTableMap::COL_TOKEN, $token, $comparison);
    }

    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
<<<<<<< HEAD
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasswordRemindersTableMap::COL_CREATED_AT, $createdAt, $comparison);
=======
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

        return $this->addUsingAlias(PasswordRemindersTableMap::COL_EMAIL, $email, $comparison);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPasswordReminders $passwordReminders Object to remove from the list of results
     *
     * @return $this|ChildPasswordRemindersQuery The current query, for fluid interface
     */
    public function prune($passwordReminders = null)
    {
        if ($passwordReminders) {
            throw new LogicException('PasswordReminders object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the password_reminders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PasswordRemindersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PasswordRemindersTableMap::clearInstancePool();
            PasswordRemindersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PasswordRemindersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PasswordRemindersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PasswordRemindersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PasswordRemindersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PasswordRemindersQuery
