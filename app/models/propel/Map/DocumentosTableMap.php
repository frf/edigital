<?php

namespace Map;

use \Documentos;
use \DocumentosQuery;
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
 * This class defines the structure of the 'documentos' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DocumentosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DocumentosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'edigital';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'documentos';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Documentos';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Documentos';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'documentos.id';

    /**
     * the column name for the idcategoria field
     */
    const COL_IDCATEGORIA = 'documentos.idcategoria';

    /**
     * the column name for the idcliente field
     */
    const COL_IDCLIENTE = 'documentos.idcliente';

    /**
     * the column name for the caminhodoc field
     */
    const COL_CAMINHODOC = 'documentos.caminhodoc';

    /**
     * the column name for the datainclusao field
     */
    const COL_DATAINCLUSAO = 'documentos.datainclusao';

    /**
     * the column name for the nomedocumento field
     */
    const COL_NOMEDOCUMENTO = 'documentos.nomedocumento';

    /**
     * the column name for the descricao field
     */
    const COL_DESCRICAO = 'documentos.descricao';

    /**
     * the column name for the nomefisicodocumento field
     */
    const COL_NOMEFISICODOCUMENTO = 'documentos.nomefisicodocumento';

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
        self::TYPE_PHPNAME       => array('Id', 'Idcategoria', 'Idcliente', 'Caminhodoc', 'Datainclusao', 'Nomedocumento', 'Descricao', 'Nomefisicodocumento', ),
        self::TYPE_CAMELNAME     => array('id', 'idcategoria', 'idcliente', 'caminhodoc', 'datainclusao', 'nomedocumento', 'descricao', 'nomefisicodocumento', ),
        self::TYPE_COLNAME       => array(DocumentosTableMap::COL_ID, DocumentosTableMap::COL_IDCATEGORIA, DocumentosTableMap::COL_IDCLIENTE, DocumentosTableMap::COL_CAMINHODOC, DocumentosTableMap::COL_DATAINCLUSAO, DocumentosTableMap::COL_NOMEDOCUMENTO, DocumentosTableMap::COL_DESCRICAO, DocumentosTableMap::COL_NOMEFISICODOCUMENTO, ),
        self::TYPE_FIELDNAME     => array('id', 'idcategoria', 'idcliente', 'caminhodoc', 'datainclusao', 'nomedocumento', 'descricao', 'nomefisicodocumento', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Idcategoria' => 1, 'Idcliente' => 2, 'Caminhodoc' => 3, 'Datainclusao' => 4, 'Nomedocumento' => 5, 'Descricao' => 6, 'Nomefisicodocumento' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'idcategoria' => 1, 'idcliente' => 2, 'caminhodoc' => 3, 'datainclusao' => 4, 'nomedocumento' => 5, 'descricao' => 6, 'nomefisicodocumento' => 7, ),
        self::TYPE_COLNAME       => array(DocumentosTableMap::COL_ID => 0, DocumentosTableMap::COL_IDCATEGORIA => 1, DocumentosTableMap::COL_IDCLIENTE => 2, DocumentosTableMap::COL_CAMINHODOC => 3, DocumentosTableMap::COL_DATAINCLUSAO => 4, DocumentosTableMap::COL_NOMEDOCUMENTO => 5, DocumentosTableMap::COL_DESCRICAO => 6, DocumentosTableMap::COL_NOMEFISICODOCUMENTO => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'idcategoria' => 1, 'idcliente' => 2, 'caminhodoc' => 3, 'datainclusao' => 4, 'nomedocumento' => 5, 'descricao' => 6, 'nomefisicodocumento' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
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
        $this->setName('documentos');
        $this->setPhpName('Documentos');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Documentos');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('documentos_id_seq');
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('idcategoria', 'Idcategoria', 'INTEGER', 'categorias', 'id', false, null, null);
        $this->addForeignKey('idcliente', 'Idcliente', 'INTEGER', 'documentos', 'id', false, null, null);
        $this->addColumn('caminhodoc', 'Caminhodoc', 'VARCHAR', false, 200, null);
        $this->addColumn('datainclusao', 'Datainclusao', 'TIMESTAMP', false, null, null);
        $this->addColumn('nomedocumento', 'Nomedocumento', 'VARCHAR', false, 200, null);
        $this->addColumn('descricao', 'Descricao', 'VARCHAR', false, 200, null);
        $this->addColumn('nomefisicodocumento', 'Nomefisicodocumento', 'VARCHAR', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Categorias', '\\Categorias', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idcategoria',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('DocumentosRelatedByIdcliente', '\\Documentos', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':idcliente',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('DocumentosRelatedById', '\\Documentos', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':idcliente',
    1 => ':id',
  ),
), null, null, 'DocumentossRelatedById', false);
        $this->addRelation('DocumentosDownloads', '\\DocumentosDownloads', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':iddocumento',
    1 => ':id',
  ),
), null, null, 'DocumentosDownloadss', false);
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
        return $withPrefix ? DocumentosTableMap::CLASS_DEFAULT : DocumentosTableMap::OM_CLASS;
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
     * @return array           (Documentos object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DocumentosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DocumentosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DocumentosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DocumentosTableMap::OM_CLASS;
            /** @var Documentos $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DocumentosTableMap::addInstanceToPool($obj, $key);
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
            $key = DocumentosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DocumentosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Documentos $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DocumentosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DocumentosTableMap::COL_ID);
            $criteria->addSelectColumn(DocumentosTableMap::COL_IDCATEGORIA);
            $criteria->addSelectColumn(DocumentosTableMap::COL_IDCLIENTE);
            $criteria->addSelectColumn(DocumentosTableMap::COL_CAMINHODOC);
            $criteria->addSelectColumn(DocumentosTableMap::COL_DATAINCLUSAO);
            $criteria->addSelectColumn(DocumentosTableMap::COL_NOMEDOCUMENTO);
            $criteria->addSelectColumn(DocumentosTableMap::COL_DESCRICAO);
            $criteria->addSelectColumn(DocumentosTableMap::COL_NOMEFISICODOCUMENTO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.idcategoria');
            $criteria->addSelectColumn($alias . '.idcliente');
            $criteria->addSelectColumn($alias . '.caminhodoc');
            $criteria->addSelectColumn($alias . '.datainclusao');
            $criteria->addSelectColumn($alias . '.nomedocumento');
            $criteria->addSelectColumn($alias . '.descricao');
            $criteria->addSelectColumn($alias . '.nomefisicodocumento');
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
        return Propel::getServiceContainer()->getDatabaseMap(DocumentosTableMap::DATABASE_NAME)->getTable(DocumentosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DocumentosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DocumentosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DocumentosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Documentos or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Documentos object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Documentos) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DocumentosTableMap::DATABASE_NAME);
            $criteria->add(DocumentosTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DocumentosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DocumentosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DocumentosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the documentos table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DocumentosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Documentos or Criteria object.
     *
     * @param mixed               $criteria Criteria or Documentos object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DocumentosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Documentos object
        }

        if ($criteria->containsKey(DocumentosTableMap::COL_ID) && $criteria->keyContainsValue(DocumentosTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DocumentosTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DocumentosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DocumentosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DocumentosTableMap::buildTableMap();
