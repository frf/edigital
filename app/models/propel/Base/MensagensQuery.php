<?php

namespace Base;

use \Mensagens as ChildMensagens;
use \MensagensQuery as ChildMensagensQuery;
use \Exception;
use \PDO;
use Map\MensagensTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'mensagens' table.
 *
 *
 *
 * @method     ChildMensagensQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMensagensQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 * @method     ChildMensagensQuery orderByIdChamado($order = Criteria::ASC) Order by the id_chamado column
 * @method     ChildMensagensQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     ChildMensagensQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildMensagensQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildMensagensQuery orderByIdusuario($order = Criteria::ASC) Order by the idusuario column
 *
 * @method     ChildMensagensQuery groupById() Group by the id column
 * @method     ChildMensagensQuery groupByMensagem() Group by the mensagem column
 * @method     ChildMensagensQuery groupByIdChamado() Group by the id_chamado column
 * @method     ChildMensagensQuery groupByData() Group by the data column
 * @method     ChildMensagensQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildMensagensQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildMensagensQuery groupByIdusuario() Group by the idusuario column
 *
 * @method     ChildMensagensQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMensagensQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMensagensQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMensagensQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildMensagensQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildMensagensQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     \UsuariosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMensagens findOne(ConnectionInterface $con = null) Return the first ChildMensagens matching the query
 * @method     ChildMensagens findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMensagens matching the query, or a new ChildMensagens object populated from the query conditions when no match is found
 *
 * @method     ChildMensagens findOneById(int $id) Return the first ChildMensagens filtered by the id column
 * @method     ChildMensagens findOneByMensagem(string $mensagem) Return the first ChildMensagens filtered by the mensagem column
 * @method     ChildMensagens findOneByIdChamado(int $id_chamado) Return the first ChildMensagens filtered by the id_chamado column
 * @method     ChildMensagens findOneByData(string $data) Return the first ChildMensagens filtered by the data column
 * @method     ChildMensagens findOneByCreatedAt(string $created_at) Return the first ChildMensagens filtered by the created_at column
 * @method     ChildMensagens findOneByUpdatedAt(string $updated_at) Return the first ChildMensagens filtered by the updated_at column
 * @method     ChildMensagens findOneByIdusuario(int $idusuario) Return the first ChildMensagens filtered by the idusuario column *

 * @method     ChildMensagens requirePk($key, ConnectionInterface $con = null) Return the ChildMensagens by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOne(ConnectionInterface $con = null) Return the first ChildMensagens matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMensagens requireOneById(int $id) Return the first ChildMensagens filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByMensagem(string $mensagem) Return the first ChildMensagens filtered by the mensagem column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByIdChamado(int $id_chamado) Return the first ChildMensagens filtered by the id_chamado column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByData(string $data) Return the first ChildMensagens filtered by the data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByCreatedAt(string $created_at) Return the first ChildMensagens filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByUpdatedAt(string $updated_at) Return the first ChildMensagens filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMensagens requireOneByIdusuario(int $idusuario) Return the first ChildMensagens filtered by the idusuario column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMensagens[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMensagens objects based on current ModelCriteria
 * @method     ChildMensagens[]|ObjectCollection findById(int $id) Return ChildMensagens objects filtered by the id column
 * @method     ChildMensagens[]|ObjectCollection findByMensagem(string $mensagem) Return ChildMensagens objects filtered by the mensagem column
 * @method     ChildMensagens[]|ObjectCollection findByIdChamado(int $id_chamado) Return ChildMensagens objects filtered by the id_chamado column
 * @method     ChildMensagens[]|ObjectCollection findByData(string $data) Return ChildMensagens objects filtered by the data column
 * @method     ChildMensagens[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildMensagens objects filtered by the created_at column
 * @method     ChildMensagens[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildMensagens objects filtered by the updated_at column
 * @method     ChildMensagens[]|ObjectCollection findByIdusuario(int $idusuario) Return ChildMensagens objects filtered by the idusuario column
 * @method     ChildMensagens[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MensagensQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MensagensQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Mensagens', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMensagensQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMensagensQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMensagensQuery) {
            return $criteria;
        }
        $query = new ChildMensagensQuery();
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
     * @return ChildMensagens|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MensagensTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MensagensTableMap::DATABASE_NAME);
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
     * @return ChildMensagens A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, mensagem, id_chamado, data, created_at, updated_at, idusuario FROM mensagens WHERE id = :p0';
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
            /** @var ChildMensagens $obj */
            $obj = new ChildMensagens();
            $obj->hydrate($row);
            MensagensTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildMensagens|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MensagensTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MensagensTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MensagensTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MensagensTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MensagensTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MensagensTableMap::COL_MENSAGEM, $mensagem, $comparison);
    }

    /**
     * Filter the query on the id_chamado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdChamado(1234); // WHERE id_chamado = 1234
     * $query->filterByIdChamado(array(12, 34)); // WHERE id_chamado IN (12, 34)
     * $query->filterByIdChamado(array('min' => 12)); // WHERE id_chamado > 12
     * </code>
     *
     * @param     mixed $idChamado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByIdChamado($idChamado = null, $comparison = null)
    {
        if (is_array($idChamado)) {
            $useMinMax = false;
            if (isset($idChamado['min'])) {
                $this->addUsingAlias(MensagensTableMap::COL_ID_CHAMADO, $idChamado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idChamado['max'])) {
                $this->addUsingAlias(MensagensTableMap::COL_ID_CHAMADO, $idChamado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MensagensTableMap::COL_ID_CHAMADO, $idChamado, $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MensagensTableMap::COL_DATA, $data, $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(MensagensTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(MensagensTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MensagensTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(MensagensTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(MensagensTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MensagensTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByIdusuario($idusuario = null, $comparison = null)
    {
        if (is_array($idusuario)) {
            $useMinMax = false;
            if (isset($idusuario['min'])) {
                $this->addUsingAlias(MensagensTableMap::COL_IDUSUARIO, $idusuario['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idusuario['max'])) {
                $this->addUsingAlias(MensagensTableMap::COL_IDUSUARIO, $idusuario['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MensagensTableMap::COL_IDUSUARIO, $idusuario, $comparison);
    }

    /**
     * Filter the query by a related \Usuarios object
     *
     * @param \Usuarios|ObjectCollection $usuarios The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMensagensQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \Usuarios) {
            return $this
                ->addUsingAlias(MensagensTableMap::COL_IDUSUARIO, $usuarios->getId(), $comparison);
        } elseif ($usuarios instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MensagensTableMap::COL_IDUSUARIO, $usuarios->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function joinUsuarios($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useUsuariosQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuarios', '\UsuariosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildMensagens $mensagens Object to remove from the list of results
     *
     * @return $this|ChildMensagensQuery The current query, for fluid interface
     */
    public function prune($mensagens = null)
    {
        if ($mensagens) {
            $this->addUsingAlias(MensagensTableMap::COL_ID, $mensagens->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the mensagens table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MensagensTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MensagensTableMap::clearInstancePool();
            MensagensTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MensagensTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MensagensTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MensagensTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MensagensTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MensagensQuery
