<?php

namespace Base;

use \Documentos as ChildDocumentos;
use \DocumentosQuery as ChildDocumentosQuery;
use \Exception;
use \PDO;
use Map\DocumentosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'documentos' table.
 *
 *
 *
 * @method     ChildDocumentosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDocumentosQuery orderByIdCategorias($order = Criteria::ASC) Order by the id_categorias column
 * @method     ChildDocumentosQuery orderByEndereco($order = Criteria::ASC) Order by the endereco column
 * @method     ChildDocumentosQuery orderByDatainclusao($order = Criteria::ASC) Order by the datainclusao column
 * @method     ChildDocumentosQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ChildDocumentosQuery orderByNomedocumento($order = Criteria::ASC) Order by the nomedocumento column
 * @method     ChildDocumentosQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 *
 * @method     ChildDocumentosQuery groupById() Group by the id column
 * @method     ChildDocumentosQuery groupByIdCategorias() Group by the id_categorias column
 * @method     ChildDocumentosQuery groupByEndereco() Group by the endereco column
 * @method     ChildDocumentosQuery groupByDatainclusao() Group by the datainclusao column
 * @method     ChildDocumentosQuery groupByIdCliente() Group by the id_cliente column
 * @method     ChildDocumentosQuery groupByNomedocumento() Group by the nomedocumento column
 * @method     ChildDocumentosQuery groupByDescricao() Group by the descricao column
 *
 * @method     ChildDocumentosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDocumentosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDocumentosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDocumentosQuery leftJoinCategorias($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categorias relation
 * @method     ChildDocumentosQuery rightJoinCategorias($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categorias relation
 * @method     ChildDocumentosQuery innerJoinCategorias($relationAlias = null) Adds a INNER JOIN clause to the query using the Categorias relation
 *
 * @method     ChildDocumentosQuery leftJoinClientes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientes relation
 * @method     ChildDocumentosQuery rightJoinClientes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientes relation
 * @method     ChildDocumentosQuery innerJoinClientes($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientes relation
 *
 * @method     \CategoriasQuery|\ClientesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDocumentos findOne(ConnectionInterface $con = null) Return the first ChildDocumentos matching the query
 * @method     ChildDocumentos findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDocumentos matching the query, or a new ChildDocumentos object populated from the query conditions when no match is found
 *
 * @method     ChildDocumentos findOneById(int $id) Return the first ChildDocumentos filtered by the id column
 * @method     ChildDocumentos findOneByIdCategorias(int $id_categorias) Return the first ChildDocumentos filtered by the id_categorias column
 * @method     ChildDocumentos findOneByEndereco(string $endereco) Return the first ChildDocumentos filtered by the endereco column
 * @method     ChildDocumentos findOneByDatainclusao(string $datainclusao) Return the first ChildDocumentos filtered by the datainclusao column
 * @method     ChildDocumentos findOneByIdCliente(int $id_cliente) Return the first ChildDocumentos filtered by the id_cliente column
 * @method     ChildDocumentos findOneByNomedocumento(string $nomedocumento) Return the first ChildDocumentos filtered by the nomedocumento column
 * @method     ChildDocumentos findOneByDescricao(string $descricao) Return the first ChildDocumentos filtered by the descricao column *

 * @method     ChildDocumentos requirePk($key, ConnectionInterface $con = null) Return the ChildDocumentos by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOne(ConnectionInterface $con = null) Return the first ChildDocumentos matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDocumentos requireOneById(int $id) Return the first ChildDocumentos filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByIdCategorias(int $id_categorias) Return the first ChildDocumentos filtered by the id_categorias column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByEndereco(string $endereco) Return the first ChildDocumentos filtered by the endereco column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByDatainclusao(string $datainclusao) Return the first ChildDocumentos filtered by the datainclusao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByIdCliente(int $id_cliente) Return the first ChildDocumentos filtered by the id_cliente column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByNomedocumento(string $nomedocumento) Return the first ChildDocumentos filtered by the nomedocumento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDocumentos requireOneByDescricao(string $descricao) Return the first ChildDocumentos filtered by the descricao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDocumentos[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDocumentos objects based on current ModelCriteria
 * @method     ChildDocumentos[]|ObjectCollection findById(int $id) Return ChildDocumentos objects filtered by the id column
 * @method     ChildDocumentos[]|ObjectCollection findByIdCategorias(int $id_categorias) Return ChildDocumentos objects filtered by the id_categorias column
 * @method     ChildDocumentos[]|ObjectCollection findByEndereco(string $endereco) Return ChildDocumentos objects filtered by the endereco column
 * @method     ChildDocumentos[]|ObjectCollection findByDatainclusao(string $datainclusao) Return ChildDocumentos objects filtered by the datainclusao column
 * @method     ChildDocumentos[]|ObjectCollection findByIdCliente(int $id_cliente) Return ChildDocumentos objects filtered by the id_cliente column
 * @method     ChildDocumentos[]|ObjectCollection findByNomedocumento(string $nomedocumento) Return ChildDocumentos objects filtered by the nomedocumento column
 * @method     ChildDocumentos[]|ObjectCollection findByDescricao(string $descricao) Return ChildDocumentos objects filtered by the descricao column
 * @method     ChildDocumentos[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DocumentosQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DocumentosQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'edigital', $modelName = '\\Documentos', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDocumentosQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDocumentosQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDocumentosQuery) {
            return $criteria;
        }
        $query = new ChildDocumentosQuery();
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
     * @return ChildDocumentos|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DocumentosTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DocumentosTableMap::DATABASE_NAME);
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
     * @return ChildDocumentos A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, id_categorias, endereco, datainclusao, id_cliente, nomedocumento, descricao FROM documentos WHERE id = :p0';
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
            /** @var ChildDocumentos $obj */
            $obj = new ChildDocumentos();
            $obj->hydrate($row);
            DocumentosTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildDocumentos|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DocumentosTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DocumentosTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the id_categorias column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategorias(1234); // WHERE id_categorias = 1234
     * $query->filterByIdCategorias(array(12, 34)); // WHERE id_categorias IN (12, 34)
     * $query->filterByIdCategorias(array('min' => 12)); // WHERE id_categorias > 12
     * </code>
     *
     * @see       filterByCategorias()
     *
     * @param     mixed $idCategorias The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByIdCategorias($idCategorias = null, $comparison = null)
    {
        if (is_array($idCategorias)) {
            $useMinMax = false;
            if (isset($idCategorias['min'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID_CATEGORIAS, $idCategorias['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategorias['max'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID_CATEGORIAS, $idCategorias['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_ID_CATEGORIAS, $idCategorias, $comparison);
    }

    /**
     * Filter the query on the endereco column
     *
     * Example usage:
     * <code>
     * $query->filterByEndereco('fooValue');   // WHERE endereco = 'fooValue'
     * $query->filterByEndereco('%fooValue%'); // WHERE endereco LIKE '%fooValue%'
     * </code>
     *
     * @param     string $endereco The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByEndereco($endereco = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($endereco)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $endereco)) {
                $endereco = str_replace('*', '%', $endereco);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_ENDERECO, $endereco, $comparison);
    }

    /**
     * Filter the query on the datainclusao column
     *
     * Example usage:
     * <code>
     * $query->filterByDatainclusao('2011-03-14'); // WHERE datainclusao = '2011-03-14'
     * $query->filterByDatainclusao('now'); // WHERE datainclusao = '2011-03-14'
     * $query->filterByDatainclusao(array('max' => 'yesterday')); // WHERE datainclusao > '2011-03-13'
     * </code>
     *
     * @param     mixed $datainclusao The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByDatainclusao($datainclusao = null, $comparison = null)
    {
        if (is_array($datainclusao)) {
            $useMinMax = false;
            if (isset($datainclusao['min'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_DATAINCLUSAO, $datainclusao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datainclusao['max'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_DATAINCLUSAO, $datainclusao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_DATAINCLUSAO, $datainclusao, $comparison);
    }

    /**
     * Filter the query on the id_cliente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCliente(1234); // WHERE id_cliente = 1234
     * $query->filterByIdCliente(array(12, 34)); // WHERE id_cliente IN (12, 34)
     * $query->filterByIdCliente(array('min' => 12)); // WHERE id_cliente > 12
     * </code>
     *
     * @see       filterByClientes()
     *
     * @param     mixed $idCliente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByIdCliente($idCliente = null, $comparison = null)
    {
        if (is_array($idCliente)) {
            $useMinMax = false;
            if (isset($idCliente['min'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCliente['max'])) {
                $this->addUsingAlias(DocumentosTableMap::COL_ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_ID_CLIENTE, $idCliente, $comparison);
    }

    /**
     * Filter the query on the nomedocumento column
     *
     * Example usage:
     * <code>
     * $query->filterByNomedocumento('fooValue');   // WHERE nomedocumento = 'fooValue'
     * $query->filterByNomedocumento('%fooValue%'); // WHERE nomedocumento LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomedocumento The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByNomedocumento($nomedocumento = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomedocumento)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomedocumento)) {
                $nomedocumento = str_replace('*', '%', $nomedocumento);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_NOMEDOCUMENTO, $nomedocumento, $comparison);
    }

    /**
     * Filter the query on the descricao column
     *
     * Example usage:
     * <code>
     * $query->filterByDescricao('fooValue');   // WHERE descricao = 'fooValue'
     * $query->filterByDescricao('%fooValue%'); // WHERE descricao LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descricao The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByDescricao($descricao = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descricao)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descricao)) {
                $descricao = str_replace('*', '%', $descricao);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DocumentosTableMap::COL_DESCRICAO, $descricao, $comparison);
    }

    /**
     * Filter the query by a related \Categorias object
     *
     * @param \Categorias|ObjectCollection $categorias The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByCategorias($categorias, $comparison = null)
    {
        if ($categorias instanceof \Categorias) {
            return $this
                ->addUsingAlias(DocumentosTableMap::COL_ID_CATEGORIAS, $categorias->getId(), $comparison);
        } elseif ($categorias instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentosTableMap::COL_ID_CATEGORIAS, $categorias->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCategorias() only accepts arguments of type \Categorias or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Categorias relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function joinCategorias($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Categorias');

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
            $this->addJoinObject($join, 'Categorias');
        }

        return $this;
    }

    /**
     * Use the Categorias relation Categorias object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CategoriasQuery A secondary query class using the current class as primary query
     */
    public function useCategoriasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategorias($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Categorias', '\CategoriasQuery');
    }

    /**
     * Filter the query by a related \Clientes object
     *
     * @param \Clientes|ObjectCollection $clientes The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDocumentosQuery The current query, for fluid interface
     */
    public function filterByClientes($clientes, $comparison = null)
    {
        if ($clientes instanceof \Clientes) {
            return $this
                ->addUsingAlias(DocumentosTableMap::COL_ID_CLIENTE, $clientes->getId(), $comparison);
        } elseif ($clientes instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DocumentosTableMap::COL_ID_CLIENTE, $clientes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClientes() only accepts arguments of type \Clientes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function joinClientes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientes');

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
            $this->addJoinObject($join, 'Clientes');
        }

        return $this;
    }

    /**
     * Use the Clientes relation Clientes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientesQuery A secondary query class using the current class as primary query
     */
    public function useClientesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientes', '\ClientesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDocumentos $documentos Object to remove from the list of results
     *
     * @return $this|ChildDocumentosQuery The current query, for fluid interface
     */
    public function prune($documentos = null)
    {
        if ($documentos) {
            $this->addUsingAlias(DocumentosTableMap::COL_ID, $documentos->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the documentos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DocumentosTableMap::clearInstancePool();
            DocumentosTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DocumentosTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DocumentosTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DocumentosTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DocumentosQuery
