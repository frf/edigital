<?php

namespace Map;

use \Mensagens;
use \MensagensQuery;
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
 * This class defines the structure of the 'mensagens' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MensagensTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MensagensTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'edigital';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'mensagens';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Mensagens';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Mensagens';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the idusuario field
     */
    const COL_IDUSUARIO = 'mensagens.idusuario';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'mensagens.updated_at';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'mensagens.created_at';

    /**
     * the column name for the data field
     */
    const COL_DATA = 'mensagens.data';

    /**
     * the column name for the id_chamado field
     */
    const COL_ID_CHAMADO = 'mensagens.id_chamado';

    /**
     * the column name for the mensagem field
     */
    const COL_MENSAGEM = 'mensagens.mensagem';

    /**
     * the column name for the id field
     */
    const COL_ID = 'mensagens.id';

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
        self::TYPE_PHPNAME       => array('Idusuario', 'UpdatedAt', 'CreatedAt', 'Data', 'IdChamado', 'Mensagem', 'Id', ),
        self::TYPE_CAMELNAME     => array('idusuario', 'updatedAt', 'createdAt', 'data', 'idChamado', 'mensagem', 'id', ),
        self::TYPE_COLNAME       => array(MensagensTableMap::COL_IDUSUARIO, MensagensTableMap::COL_UPDATED_AT, MensagensTableMap::COL_CREATED_AT, MensagensTableMap::COL_DATA, MensagensTableMap::COL_ID_CHAMADO, MensagensTableMap::COL_MENSAGEM, MensagensTableMap::COL_ID, ),
        self::TYPE_FIELDNAME     => array('idusuario', 'updated_at', 'created_at', 'data', 'id_chamado', 'mensagem', 'id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idusuario' => 0, 'UpdatedAt' => 1, 'CreatedAt' => 2, 'Data' => 3, 'IdChamado' => 4, 'Mensagem' => 5, 'Id' => 6, ),
        self::TYPE_CAMELNAME     => array('idusuario' => 0, 'updatedAt' => 1, 'createdAt' => 2, 'data' => 3, 'idChamado' => 4, 'mensagem' => 5, 'id' => 6, ),
        self::TYPE_COLNAME       => array(MensagensTableMap::COL_IDUSUARIO => 0, MensagensTableMap::COL_UPDATED_AT => 1, MensagensTableMap::COL_CREATED_AT => 2, MensagensTableMap::COL_DATA => 3, MensagensTableMap::COL_ID_CHAMADO => 4, MensagensTableMap::COL_MENSAGEM => 5, MensagensTableMap::COL_ID => 6, ),
        self::TYPE_FIELDNAME     => array('idusuario' => 0, 'updated_at' => 1, 'created_at' => 2, 'data' => 3, 'id_chamado' => 4, 'mensagem' => 5, 'id' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('mensagens');
        $this->setPhpName('Mensagens');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Mensagens');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('mensagens_id_seq');
        // columns
        $this->addForeignKey('idusuario', 'Idusuario', 'INTEGER', 'usuarios', 'id', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('data', 'Data', 'VARCHAR', true, 255, null);
        $this->addColumn('id_chamado', 'IdChamado', 'INTEGER', true, null, null);
        $this->addColumn('mensagem', 'Mensagem', 'LONGVARCHAR', true, null, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Usuarios', '\\Usuarios', RelationMap::MANY_TO_ONE, array('idusuario' => 'id', ), null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 6 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 6 + $offset
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
        return $withPrefix ? MensagensTableMap::CLASS_DEFAULT : MensagensTableMap::OM_CLASS;
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
     * @return array           (Mensagens object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MensagensTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MensagensTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MensagensTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MensagensTableMap::OM_CLASS;
            /** @var Mensagens $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MensagensTableMap::addInstanceToPool($obj, $key);
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
            $key = MensagensTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MensagensTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Mensagens $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MensagensTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MensagensTableMap::COL_IDUSUARIO);
            $criteria->addSelectColumn(MensagensTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(MensagensTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(MensagensTableMap::COL_DATA);
            $criteria->addSelectColumn(MensagensTableMap::COL_ID_CHAMADO);
            $criteria->addSelectColumn(MensagensTableMap::COL_MENSAGEM);
            $criteria->addSelectColumn(MensagensTableMap::COL_ID);
        } else {
            $criteria->addSelectColumn($alias . '.idusuario');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.data');
            $criteria->addSelectColumn($alias . '.id_chamado');
            $criteria->addSelectColumn($alias . '.mensagem');
            $criteria->addSelectColumn($alias . '.id');
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
        return Propel::getServiceContainer()->getDatabaseMap(MensagensTableMap::DATABASE_NAME)->getTable(MensagensTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MensagensTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MensagensTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MensagensTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Mensagens or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Mensagens object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MensagensTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Mensagens) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MensagensTableMap::DATABASE_NAME);
            $criteria->add(MensagensTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MensagensQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MensagensTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MensagensTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the mensagens table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MensagensQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Mensagens or Criteria object.
     *
     * @param mixed               $criteria Criteria or Mensagens object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MensagensTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Mensagens object
        }

        if ($criteria->containsKey(MensagensTableMap::COL_ID) && $criteria->keyContainsValue(MensagensTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MensagensTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MensagensQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MensagensTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MensagensTableMap::buildTableMap();