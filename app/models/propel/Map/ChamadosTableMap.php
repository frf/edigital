<?php

namespace Map;

use \Chamados;
use \ChamadosQuery;
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
 * This class defines the structure of the 'chamados' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ChamadosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ChamadosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'edigital';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'chamados';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Chamados';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Chamados';

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
    const COL_ID = 'chamados.id';

    /**
     * the column name for the usuario field
     */
    const COL_USUARIO = 'chamados.usuario';

    /**
     * the column name for the categoria field
     */
    const COL_CATEGORIA = 'chamados.categoria';

    /**
     * the column name for the titulo field
     */
    const COL_TITULO = 'chamados.titulo';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'chamados.status';

    /**
     * the column name for the mensagem field
     */
    const COL_MENSAGEM = 'chamados.mensagem';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'chamados.data';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'chamados.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'chamados.updated_at';

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
        self::TYPE_PHPNAME       => array('Id', 'Usuario', 'Categoria', 'Titulo', 'Status', 'Mensagem', 'Data', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'usuario', 'categoria', 'titulo', 'status', 'mensagem', 'data', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(ChamadosTableMap::COL_ID, ChamadosTableMap::COL_USUARIO, ChamadosTableMap::COL_CATEGORIA, ChamadosTableMap::COL_TITULO, ChamadosTableMap::COL_STATUS, ChamadosTableMap::COL_MENSAGEM, ChamadosTableMap::COL_DATA, ChamadosTableMap::COL_CREATED_AT, ChamadosTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'usuario', 'categoria', 'titulo', 'status', 'mensagem', 'data', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Usuario' => 1, 'Categoria' => 2, 'Titulo' => 3, 'Status' => 4, 'Mensagem' => 5, 'Data' => 6, 'CreatedAt' => 7, 'UpdatedAt' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'usuario' => 1, 'categoria' => 2, 'titulo' => 3, 'status' => 4, 'mensagem' => 5, 'data' => 6, 'createdAt' => 7, 'updatedAt' => 8, ),
        self::TYPE_COLNAME       => array(ChamadosTableMap::COL_ID => 0, ChamadosTableMap::COL_USUARIO => 1, ChamadosTableMap::COL_CATEGORIA => 2, ChamadosTableMap::COL_TITULO => 3, ChamadosTableMap::COL_STATUS => 4, ChamadosTableMap::COL_MENSAGEM => 5, ChamadosTableMap::COL_DATA => 6, ChamadosTableMap::COL_CREATED_AT => 7, ChamadosTableMap::COL_UPDATED_AT => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'usuario' => 1, 'categoria' => 2, 'titulo' => 3, 'status' => 4, 'mensagem' => 5, 'data' => 6, 'created_at' => 7, 'updated_at' => 8, ),
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
        $this->setName('chamados');
        $this->setPhpName('Chamados');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Chamados');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('chamados_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('usuario', 'Usuario', 'VARCHAR', true, 255, null);
        $this->addColumn('categoria', 'Categoria', 'INTEGER', true, null, null);
        $this->addColumn('titulo', 'Titulo', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'INTEGER', true, null, null);
        $this->addColumn('mensagem', 'Mensagem', 'VARCHAR', true, 255, null);
        $this->addColumn('data', 'Data', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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
        return $withPrefix ? ChamadosTableMap::CLASS_DEFAULT : ChamadosTableMap::OM_CLASS;
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
     * @return array           (Chamados object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ChamadosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ChamadosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ChamadosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ChamadosTableMap::OM_CLASS;
            /** @var Chamados $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ChamadosTableMap::addInstanceToPool($obj, $key);
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
            $key = ChamadosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ChamadosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Chamados $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ChamadosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ChamadosTableMap::COL_ID);
            $criteria->addSelectColumn(ChamadosTableMap::COL_USUARIO);
            $criteria->addSelectColumn(ChamadosTableMap::COL_CATEGORIA);
            $criteria->addSelectColumn(ChamadosTableMap::COL_TITULO);
            $criteria->addSelectColumn(ChamadosTableMap::COL_STATUS);
            $criteria->addSelectColumn(ChamadosTableMap::COL_MENSAGEM);
            $criteria->addSelectColumn(ChamadosTableMap::COL_DATA);
            $criteria->addSelectColumn(ChamadosTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(ChamadosTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.usuario');
            $criteria->addSelectColumn($alias . '.categoria');
            $criteria->addSelectColumn($alias . '.titulo');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.mensagem');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(ChamadosTableMap::DATABASE_NAME)->getTable(ChamadosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ChamadosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ChamadosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ChamadosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Chamados or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Chamados object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ChamadosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Chamados) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ChamadosTableMap::DATABASE_NAME);
            $criteria->add(ChamadosTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ChamadosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ChamadosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ChamadosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the chamados table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ChamadosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Chamados or Criteria object.
     *
     * @param mixed               $criteria Criteria or Chamados object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ChamadosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Chamados object
        }

        if ($criteria->containsKey(ChamadosTableMap::COL_ID) && $criteria->keyContainsValue(ChamadosTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ChamadosTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ChamadosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ChamadosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ChamadosTableMap::buildTableMap();
