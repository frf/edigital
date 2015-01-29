<?php

namespace Map;

use \ClientePgtos;
use \ClientePgtosQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'cliente_pgtos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClientePgtosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClientePgtosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'edigital';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'cliente_pgtos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ClientePgtos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ClientePgtos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'cliente_pgtos.id';

    /**
     * the column name for the valor field
     */
    const COL_VALOR = 'cliente_pgtos.valor';

    /**
     * the column name for the idproduto field
     */
    const COL_IDPRODUTO = 'cliente_pgtos.idproduto';

    /**
     * the column name for the idcliente field
     */
    const COL_IDCLIENTE = 'cliente_pgtos.idcliente';

    /**
     * the column name for the idmoeda field
     */
    const COL_IDMOEDA = 'cliente_pgtos.idmoeda';

    /**
     * the column name for the descricao field
     */
    const COL_DESCRICAO = 'cliente_pgtos.descricao';

    /**
     * the column name for the ispaid field
     */
    const COL_ISPAID = 'cliente_pgtos.ispaid';

    /**
     * the column name for the nota field
     */
    const COL_NOTA = 'cliente_pgtos.nota';

    /**
     * the column name for the dtpagamento field
     */
    const COL_DTPAGAMENTO = 'cliente_pgtos.dtpagamento';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Valor', 'Idproduto', 'Idcliente', 'Idmoeda', 'Descricao', 'Ispaid', 'Nota', 'Dtpagamento', ),
        self::TYPE_CAMELNAME     => array('id', 'valor', 'idproduto', 'idcliente', 'idmoeda', 'descricao', 'ispaid', 'nota', 'dtpagamento', ),
        self::TYPE_COLNAME       => array(ClientePgtosTableMap::COL_ID, ClientePgtosTableMap::COL_VALOR, ClientePgtosTableMap::COL_IDPRODUTO, ClientePgtosTableMap::COL_IDCLIENTE, ClientePgtosTableMap::COL_IDMOEDA, ClientePgtosTableMap::COL_DESCRICAO, ClientePgtosTableMap::COL_ISPAID, ClientePgtosTableMap::COL_NOTA, ClientePgtosTableMap::COL_DTPAGAMENTO, ),
        self::TYPE_FIELDNAME     => array('id', 'valor', 'idproduto', 'idcliente', 'idmoeda', 'descricao', 'ispaid', 'nota', 'dtpagamento', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Valor' => 1, 'Idproduto' => 2, 'Idcliente' => 3, 'Idmoeda' => 4, 'Descricao' => 5, 'Ispaid' => 6, 'Nota' => 7, 'Dtpagamento' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'valor' => 1, 'idproduto' => 2, 'idcliente' => 3, 'idmoeda' => 4, 'descricao' => 5, 'ispaid' => 6, 'nota' => 7, 'dtpagamento' => 8, ),
        self::TYPE_COLNAME       => array(ClientePgtosTableMap::COL_ID => 0, ClientePgtosTableMap::COL_VALOR => 1, ClientePgtosTableMap::COL_IDPRODUTO => 2, ClientePgtosTableMap::COL_IDCLIENTE => 3, ClientePgtosTableMap::COL_IDMOEDA => 4, ClientePgtosTableMap::COL_DESCRICAO => 5, ClientePgtosTableMap::COL_ISPAID => 6, ClientePgtosTableMap::COL_NOTA => 7, ClientePgtosTableMap::COL_DTPAGAMENTO => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'valor' => 1, 'idproduto' => 2, 'idcliente' => 3, 'idmoeda' => 4, 'descricao' => 5, 'ispaid' => 6, 'nota' => 7, 'dtpagamento' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('cliente_pgtos');
        $this->setPhpName('ClientePgtos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ClientePgtos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('cliente_pgtos_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('valor', 'Valor', 'DECIMAL', false, 10, null);
        $this->addForeignKey('idproduto', 'Idproduto', 'INTEGER', 'produtos', 'id', false, null, null);
        $this->addForeignKey('idcliente', 'Idcliente', 'INTEGER', 'cliente', 'id', false, null, null);
        $this->addForeignKey('idmoeda', 'Idmoeda', 'INTEGER', 'moeda', 'id', false, null, null);
        $this->addColumn('descricao', 'Descricao', 'VARCHAR', false, 200, null);
        $this->addColumn('ispaid', 'Ispaid', 'BOOLEAN', false, 1, false);
        $this->addColumn('nota', 'Nota', 'VARCHAR', false, 200, null);
        $this->addColumn('dtpagamento', 'Dtpagamento', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cliente', '\\Cliente', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idcliente',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Moeda', '\\Moeda', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idmoeda',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Produtos', '\\Produtos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idproduto',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ClientePgtosTableMap::CLASS_DEFAULT : ClientePgtosTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (ClientePgtos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClientePgtosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClientePgtosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClientePgtosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientePgtosTableMap::OM_CLASS;
            /** @var ClientePgtos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClientePgtosTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ClientePgtosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClientePgtosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ClientePgtos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientePgtosTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_ID);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_VALOR);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_IDPRODUTO);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_IDCLIENTE);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_IDMOEDA);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_DESCRICAO);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_ISPAID);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_NOTA);
            $criteria->addSelectColumn(ClientePgtosTableMap::COL_DTPAGAMENTO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.valor');
            $criteria->addSelectColumn($alias . '.idproduto');
            $criteria->addSelectColumn($alias . '.idcliente');
            $criteria->addSelectColumn($alias . '.idmoeda');
            $criteria->addSelectColumn($alias . '.descricao');
            $criteria->addSelectColumn($alias . '.ispaid');
            $criteria->addSelectColumn($alias . '.nota');
            $criteria->addSelectColumn($alias . '.dtpagamento');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ClientePgtosTableMap::DATABASE_NAME)->getTable(ClientePgtosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClientePgtosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClientePgtosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClientePgtosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ClientePgtos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ClientePgtos object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientePgtosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ClientePgtos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientePgtosTableMap::DATABASE_NAME);
            $criteria->add(ClientePgtosTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ClientePgtosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClientePgtosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClientePgtosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the cliente_pgtos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClientePgtosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ClientePgtos or Criteria object.
     *
     * @param mixed               $criteria Criteria or ClientePgtos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientePgtosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ClientePgtos object
        }

        if ($criteria->containsKey(ClientePgtosTableMap::COL_ID) && $criteria->keyContainsValue(ClientePgtosTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientePgtosTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ClientePgtosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClientePgtosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClientePgtosTableMap::buildTableMap();
