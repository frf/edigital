<?php

namespace Map;

use \Usuarios;
use \UsuariosQuery;
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
 * This class defines the structure of the 'usuarios' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UsuariosTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UsuariosTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'edigital';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'usuarios';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Usuarios';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Usuarios';

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
     * the column name for the idcliente field
     */
    const COL_IDCLIENTE = 'usuarios.idcliente';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'usuarios.updated_at';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'usuarios.created_at';

    /**
     * the column name for the remember_token field
     */
    const COL_REMEMBER_TOKEN = 'usuarios.remember_token';

    /**
     * the column name for the tipo field
     */
    const COL_TIPO = 'usuarios.tipo';

    /**
     * the column name for the nome field
     */
    const COL_NOME = 'usuarios.nome';

    /**
     * the column name for the senha field
     */
    const COL_SENHA = 'usuarios.senha';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'usuarios.email';

    /**
     * the column name for the id field
     */
    const COL_ID = 'usuarios.id';

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
        self::TYPE_PHPNAME       => array('Idcliente', 'UpdatedAt', 'CreatedAt', 'RememberToken', 'Tipo', 'Nome', 'Senha', 'Email', 'Id', ),
        self::TYPE_CAMELNAME     => array('idcliente', 'updatedAt', 'createdAt', 'rememberToken', 'tipo', 'nome', 'senha', 'email', 'id', ),
        self::TYPE_COLNAME       => array(UsuariosTableMap::COL_IDCLIENTE, UsuariosTableMap::COL_UPDATED_AT, UsuariosTableMap::COL_CREATED_AT, UsuariosTableMap::COL_REMEMBER_TOKEN, UsuariosTableMap::COL_TIPO, UsuariosTableMap::COL_NOME, UsuariosTableMap::COL_SENHA, UsuariosTableMap::COL_EMAIL, UsuariosTableMap::COL_ID, ),
        self::TYPE_FIELDNAME     => array('idcliente', 'updated_at', 'created_at', 'remember_token', 'tipo', 'nome', 'senha', 'email', 'id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Idcliente' => 0, 'UpdatedAt' => 1, 'CreatedAt' => 2, 'RememberToken' => 3, 'Tipo' => 4, 'Nome' => 5, 'Senha' => 6, 'Email' => 7, 'Id' => 8, ),
        self::TYPE_CAMELNAME     => array('idcliente' => 0, 'updatedAt' => 1, 'createdAt' => 2, 'rememberToken' => 3, 'tipo' => 4, 'nome' => 5, 'senha' => 6, 'email' => 7, 'id' => 8, ),
        self::TYPE_COLNAME       => array(UsuariosTableMap::COL_IDCLIENTE => 0, UsuariosTableMap::COL_UPDATED_AT => 1, UsuariosTableMap::COL_CREATED_AT => 2, UsuariosTableMap::COL_REMEMBER_TOKEN => 3, UsuariosTableMap::COL_TIPO => 4, UsuariosTableMap::COL_NOME => 5, UsuariosTableMap::COL_SENHA => 6, UsuariosTableMap::COL_EMAIL => 7, UsuariosTableMap::COL_ID => 8, ),
        self::TYPE_FIELDNAME     => array('idcliente' => 0, 'updated_at' => 1, 'created_at' => 2, 'remember_token' => 3, 'tipo' => 4, 'nome' => 5, 'senha' => 6, 'email' => 7, 'id' => 8, ),
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
        $this->setName('usuarios');
        $this->setPhpName('Usuarios');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Usuarios');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        $this->setPrimaryKeyMethodInfo('usuarios_id_seq');
        // columns
        $this->addForeignKey('idcliente', 'Idcliente', 'INTEGER', 'cliente', 'id', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', true, null, null);
        $this->addColumn('remember_token', 'RememberToken', 'VARCHAR', false, 100, null);
        $this->addColumn('tipo', 'Tipo', 'VARCHAR', true, 255, null);
        $this->addColumn('nome', 'Nome', 'VARCHAR', true, 255, null);
        $this->addColumn('senha', 'Senha', 'VARCHAR', true, 60, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cliente', '\\Cliente', RelationMap::MANY_TO_ONE, array('idcliente' => 'id', ), 'RESTRICT', 'RESTRICT');
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 8 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
                ? 8 + $offset
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
        return $withPrefix ? UsuariosTableMap::CLASS_DEFAULT : UsuariosTableMap::OM_CLASS;
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
     * @return array           (Usuarios object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UsuariosTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsuariosTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsuariosTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsuariosTableMap::OM_CLASS;
            /** @var Usuarios $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsuariosTableMap::addInstanceToPool($obj, $key);
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
            $key = UsuariosTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsuariosTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Usuarios $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsuariosTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UsuariosTableMap::COL_IDCLIENTE);
            $criteria->addSelectColumn(UsuariosTableMap::COL_UPDATED_AT);
            $criteria->addSelectColumn(UsuariosTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(UsuariosTableMap::COL_REMEMBER_TOKEN);
            $criteria->addSelectColumn(UsuariosTableMap::COL_TIPO);
            $criteria->addSelectColumn(UsuariosTableMap::COL_NOME);
            $criteria->addSelectColumn(UsuariosTableMap::COL_SENHA);
            $criteria->addSelectColumn(UsuariosTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UsuariosTableMap::COL_ID);
        } else {
            $criteria->addSelectColumn($alias . '.idcliente');
            $criteria->addSelectColumn($alias . '.updated_at');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.remember_token');
            $criteria->addSelectColumn($alias . '.tipo');
            $criteria->addSelectColumn($alias . '.nome');
            $criteria->addSelectColumn($alias . '.senha');
            $criteria->addSelectColumn($alias . '.email');
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
        return Propel::getServiceContainer()->getDatabaseMap(UsuariosTableMap::DATABASE_NAME)->getTable(UsuariosTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UsuariosTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UsuariosTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UsuariosTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Usuarios or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Usuarios object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Usuarios) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsuariosTableMap::DATABASE_NAME);
            $criteria->add(UsuariosTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UsuariosQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsuariosTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsuariosTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the usuarios table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UsuariosQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Usuarios or Criteria object.
     *
     * @param mixed               $criteria Criteria or Usuarios object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Usuarios object
        }

        if ($criteria->containsKey(UsuariosTableMap::COL_ID) && $criteria->keyContainsValue(UsuariosTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsuariosTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UsuariosQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UsuariosTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UsuariosTableMap::buildTableMap();
