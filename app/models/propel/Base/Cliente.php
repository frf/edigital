<?php

namespace Base;

use \Categorias as ChildCategorias;
use \CategoriasQuery as ChildCategoriasQuery;
use \Cliente as ChildCliente;
use \ClientePgtos as ChildClientePgtos;
use \ClientePgtosQuery as ChildClientePgtosQuery;
use \ClienteQuery as ChildClienteQuery;
use \Documentos as ChildDocumentos;
use \DocumentosQuery as ChildDocumentosQuery;
use \Idoc as ChildIdoc;
use \IdocQuery as ChildIdocQuery;
use \Produtos as ChildProdutos;
use \ProdutosQuery as ChildProdutosQuery;
use \Usuarios as ChildUsuarios;
use \UsuariosQuery as ChildUsuariosQuery;
use \Exception;
use \PDO;
use Map\ClienteTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'cliente' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Cliente implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ClienteTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the obscontrato field.
     * @var        string
     */
    protected $obscontrato;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the ativo field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $ativo;

    /**
     * The value for the nome field.
     * @var        string
     */
    protected $nome;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * @var        ObjectCollection|ChildCategorias[] Collection to store aggregation of ChildCategorias objects.
     */
    protected $collCategoriass;
    protected $collCategoriassPartial;

    /**
     * @var        ObjectCollection|ChildClientePgtos[] Collection to store aggregation of ChildClientePgtos objects.
     */
    protected $collClientePgtoss;
    protected $collClientePgtossPartial;

    /**
     * @var        ObjectCollection|ChildDocumentos[] Collection to store aggregation of ChildDocumentos objects.
     */
    protected $collDocumentoss;
    protected $collDocumentossPartial;

    /**
     * @var        ObjectCollection|ChildIdoc[] Collection to store aggregation of ChildIdoc objects.
     */
    protected $collIdocs;
    protected $collIdocsPartial;

    /**
     * @var        ObjectCollection|ChildProdutos[] Collection to store aggregation of ChildProdutos objects.
     */
    protected $collProdutoss;
    protected $collProdutossPartial;

    /**
     * @var        ObjectCollection|ChildUsuarios[] Collection to store aggregation of ChildUsuarios objects.
     */
    protected $collUsuarioss;
    protected $collUsuariossPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildCategorias[]
     */
    protected $categoriassScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildClientePgtos[]
     */
    protected $clientePgtossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDocumentos[]
     */
    protected $documentossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildIdoc[]
     */
    protected $idocsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProdutos[]
     */
    protected $produtossScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildUsuarios[]
     */
    protected $usuariossScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->ativo = false;
    }

    /**
     * Initializes internal state of Base\Cliente object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Cliente</code> instance.  If
     * <code>obj</code> is an instance of <code>Cliente</code>, delegates to
     * <code>equals(Cliente)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Cliente The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [obscontrato] column value.
     *
     * @return string
     */
    public function getObscontrato()
    {
        return $this->obscontrato;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [ativo] column value.
     *
     * @return boolean
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Get the [ativo] column value.
     *
     * @return boolean
     */
    public function isAtivo()
    {
        return $this->getAtivo();
    }

    /**
     * Get the [nome] column value.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of [obscontrato] column.
     *
     * @param  string $v new value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setObscontrato($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->obscontrato !== $v) {
            $this->obscontrato = $v;
            $this->modifiedColumns[ClienteTableMap::COL_OBSCONTRATO] = true;
        }

        return $this;
    } // setObscontrato()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[ClienteTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Sets the value of the [ativo] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param  boolean|integer|string $v The new value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setAtivo($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->ativo !== $v) {
            $this->ativo = $v;
            $this->modifiedColumns[ClienteTableMap::COL_ATIVO] = true;
        }

        return $this;
    } // setAtivo()

    /**
     * Set the value of [nome] column.
     *
     * @param  string $v new value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setNome($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome !== $v) {
            $this->nome = $v;
            $this->modifiedColumns[ClienteTableMap::COL_NOME] = true;
        }

        return $this;
    } // setNome()

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ClienteTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->ativo !== false) {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ClienteTableMap::translateFieldName('Obscontrato', TableMap::TYPE_PHPNAME, $indexType)];
            $this->obscontrato = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ClienteTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ClienteTableMap::translateFieldName('Ativo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ativo = (null !== $col) ? (boolean) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ClienteTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ClienteTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 5; // 5 = ClienteTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Cliente'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClienteTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildClienteQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collCategoriass = null;

            $this->collClientePgtoss = null;

            $this->collDocumentoss = null;

            $this->collIdocs = null;

            $this->collProdutoss = null;

            $this->collUsuarioss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Cliente::setDeleted()
     * @see Cliente::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildClienteQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ClienteTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->categoriassScheduledForDeletion !== null) {
                if (!$this->categoriassScheduledForDeletion->isEmpty()) {
                    \CategoriasQuery::create()
                        ->filterByPrimaryKeys($this->categoriassScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->categoriassScheduledForDeletion = null;
                }
            }

            if ($this->collCategoriass !== null) {
                foreach ($this->collCategoriass as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->clientePgtossScheduledForDeletion !== null) {
                if (!$this->clientePgtossScheduledForDeletion->isEmpty()) {
                    foreach ($this->clientePgtossScheduledForDeletion as $clientePgtos) {
                        // need to save related object because we set the relation to null
                        $clientePgtos->save($con);
                    }
                    $this->clientePgtossScheduledForDeletion = null;
                }
            }

            if ($this->collClientePgtoss !== null) {
                foreach ($this->collClientePgtoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->documentossScheduledForDeletion !== null) {
                if (!$this->documentossScheduledForDeletion->isEmpty()) {
                    foreach ($this->documentossScheduledForDeletion as $documentos) {
                        // need to save related object because we set the relation to null
                        $documentos->save($con);
                    }
                    $this->documentossScheduledForDeletion = null;
                }
            }

            if ($this->collDocumentoss !== null) {
                foreach ($this->collDocumentoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->idocsScheduledForDeletion !== null) {
                if (!$this->idocsScheduledForDeletion->isEmpty()) {
                    \IdocQuery::create()
                        ->filterByPrimaryKeys($this->idocsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->idocsScheduledForDeletion = null;
                }
            }

            if ($this->collIdocs !== null) {
                foreach ($this->collIdocs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->produtossScheduledForDeletion !== null) {
                if (!$this->produtossScheduledForDeletion->isEmpty()) {
                    foreach ($this->produtossScheduledForDeletion as $produtos) {
                        // need to save related object because we set the relation to null
                        $produtos->save($con);
                    }
                    $this->produtossScheduledForDeletion = null;
                }
            }

            if ($this->collProdutoss !== null) {
                foreach ($this->collProdutoss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usuariossScheduledForDeletion !== null) {
                if (!$this->usuariossScheduledForDeletion->isEmpty()) {
                    foreach ($this->usuariossScheduledForDeletion as $usuarios) {
                        // need to save related object because we set the relation to null
                        $usuarios->save($con);
                    }
                    $this->usuariossScheduledForDeletion = null;
                }
            }

            if ($this->collUsuarioss !== null) {
                foreach ($this->collUsuarioss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[ClienteTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClienteTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('cliente_id_seq')");
                $this->id = $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClienteTableMap::COL_OBSCONTRATO)) {
            $modifiedColumns[':p' . $index++]  = 'obscontrato';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ATIVO)) {
            $modifiedColumns[':p' . $index++]  = 'ativo';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }

        $sql = sprintf(
            'INSERT INTO cliente (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'obscontrato':
                        $stmt->bindValue($identifier, $this->obscontrato, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'ativo':
                        $stmt->bindValue($identifier, $this->ativo, PDO::PARAM_BOOL);
                        break;
                    case 'nome':
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ClienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getObscontrato();
                break;
            case 1:
                return $this->getEmail();
                break;
            case 2:
                return $this->getAtivo();
                break;
            case 3:
                return $this->getNome();
                break;
            case 4:
                return $this->getId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Cliente'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Cliente'][$this->hashCode()] = true;
        $keys = ClienteTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getObscontrato(),
            $keys[1] => $this->getEmail(),
            $keys[2] => $this->getAtivo(),
            $keys[3] => $this->getNome(),
            $keys[4] => $this->getId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collCategoriass) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'categoriass';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'categoriass';
                        break;
                    default:
                        $key = 'Categoriass';
                }

                $result[$key] = $this->collCategoriass->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collClientePgtoss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'clientePgtoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cliente_pgtoss';
                        break;
                    default:
                        $key = 'ClientePgtoss';
                }

                $result[$key] = $this->collClientePgtoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDocumentoss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'documentoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'documentoss';
                        break;
                    default:
                        $key = 'Documentoss';
                }

                $result[$key] = $this->collDocumentoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collIdocs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'idocs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'idocs';
                        break;
                    default:
                        $key = 'Idocs';
                }

                $result[$key] = $this->collIdocs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProdutoss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'produtoss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'produtoss';
                        break;
                    default:
                        $key = 'Produtoss';
                }

                $result[$key] = $this->collProdutoss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUsuarioss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'usuarioss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'usuarioss';
                        break;
                    default:
                        $key = 'Usuarioss';
                }

                $result[$key] = $this->collUsuarioss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Cliente
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ClienteTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Cliente
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setObscontrato($value);
                break;
            case 1:
                $this->setEmail($value);
                break;
            case 2:
                $this->setAtivo($value);
                break;
            case 3:
                $this->setNome($value);
                break;
            case 4:
                $this->setId($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ClienteTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setObscontrato($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEmail($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAtivo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNome($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setId($arr[$keys[4]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Cliente The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ClienteTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ClienteTableMap::COL_OBSCONTRATO)) {
            $criteria->add(ClienteTableMap::COL_OBSCONTRATO, $this->obscontrato);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_EMAIL)) {
            $criteria->add(ClienteTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ATIVO)) {
            $criteria->add(ClienteTableMap::COL_ATIVO, $this->ativo);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOME)) {
            $criteria->add(ClienteTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ID)) {
            $criteria->add(ClienteTableMap::COL_ID, $this->id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildClienteQuery::create();
        $criteria->add(ClienteTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Cliente (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setObscontrato($this->getObscontrato());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setAtivo($this->getAtivo());
        $copyObj->setNome($this->getNome());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getCategoriass() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCategorias($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getClientePgtoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientePgtos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDocumentoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDocumentos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getIdocs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addIdoc($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProdutoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProdutos($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsuarioss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsuarios($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Cliente Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Categorias' == $relationName) {
            return $this->initCategoriass();
        }
        if ('ClientePgtos' == $relationName) {
            return $this->initClientePgtoss();
        }
        if ('Documentos' == $relationName) {
            return $this->initDocumentoss();
        }
        if ('Idoc' == $relationName) {
            return $this->initIdocs();
        }
        if ('Produtos' == $relationName) {
            return $this->initProdutoss();
        }
        if ('Usuarios' == $relationName) {
            return $this->initUsuarioss();
        }
    }

    /**
     * Clears out the collCategoriass collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addCategoriass()
     */
    public function clearCategoriass()
    {
        $this->collCategoriass = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collCategoriass collection loaded partially.
     */
    public function resetPartialCategoriass($v = true)
    {
        $this->collCategoriassPartial = $v;
    }

    /**
     * Initializes the collCategoriass collection.
     *
     * By default this just sets the collCategoriass collection to an empty array (like clearcollCategoriass());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCategoriass($overrideExisting = true)
    {
        if (null !== $this->collCategoriass && !$overrideExisting) {
            return;
        }
        $this->collCategoriass = new ObjectCollection();
        $this->collCategoriass->setModel('\Categorias');
    }

    /**
     * Gets an array of ChildCategorias objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildCategorias[] List of ChildCategorias objects
     * @throws PropelException
     */
    public function getCategoriass(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collCategoriassPartial && !$this->isNew();
        if (null === $this->collCategoriass || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCategoriass) {
                // return empty collection
                $this->initCategoriass();
            } else {
                $collCategoriass = ChildCategoriasQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collCategoriassPartial && count($collCategoriass)) {
                        $this->initCategoriass(false);

                        foreach ($collCategoriass as $obj) {
                            if (false == $this->collCategoriass->contains($obj)) {
                                $this->collCategoriass->append($obj);
                            }
                        }

                        $this->collCategoriassPartial = true;
                    }

                    return $collCategoriass;
                }

                if ($partial && $this->collCategoriass) {
                    foreach ($this->collCategoriass as $obj) {
                        if ($obj->isNew()) {
                            $collCategoriass[] = $obj;
                        }
                    }
                }

                $this->collCategoriass = $collCategoriass;
                $this->collCategoriassPartial = false;
            }
        }

        return $this->collCategoriass;
    }

    /**
     * Sets a collection of ChildCategorias objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $categoriass A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setCategoriass(Collection $categoriass, ConnectionInterface $con = null)
    {
        /** @var ChildCategorias[] $categoriassToDelete */
        $categoriassToDelete = $this->getCategoriass(new Criteria(), $con)->diff($categoriass);


        $this->categoriassScheduledForDeletion = $categoriassToDelete;

        foreach ($categoriassToDelete as $categoriasRemoved) {
            $categoriasRemoved->setCliente(null);
        }

        $this->collCategoriass = null;
        foreach ($categoriass as $categorias) {
            $this->addCategorias($categorias);
        }

        $this->collCategoriass = $categoriass;
        $this->collCategoriassPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Categorias objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Categorias objects.
     * @throws PropelException
     */
    public function countCategoriass(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collCategoriassPartial && !$this->isNew();
        if (null === $this->collCategoriass || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCategoriass) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCategoriass());
            }

            $query = ChildCategoriasQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collCategoriass);
    }

    /**
     * Method called to associate a ChildCategorias object to this object
     * through the ChildCategorias foreign key attribute.
     *
     * @param  ChildCategorias $l ChildCategorias
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addCategorias(ChildCategorias $l)
    {
        if ($this->collCategoriass === null) {
            $this->initCategoriass();
            $this->collCategoriassPartial = true;
        }

        if (!$this->collCategoriass->contains($l)) {
            $this->doAddCategorias($l);
        }

        return $this;
    }

    /**
     * @param ChildCategorias $categorias The ChildCategorias object to add.
     */
    protected function doAddCategorias(ChildCategorias $categorias)
    {
        $this->collCategoriass[]= $categorias;
        $categorias->setCliente($this);
    }

    /**
     * @param  ChildCategorias $categorias The ChildCategorias object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeCategorias(ChildCategorias $categorias)
    {
        if ($this->getCategoriass()->contains($categorias)) {
            $pos = $this->collCategoriass->search($categorias);
            $this->collCategoriass->remove($pos);
            if (null === $this->categoriassScheduledForDeletion) {
                $this->categoriassScheduledForDeletion = clone $this->collCategoriass;
                $this->categoriassScheduledForDeletion->clear();
            }
            $this->categoriassScheduledForDeletion[]= clone $categorias;
            $categorias->setCliente(null);
        }

        return $this;
    }

    /**
     * Clears out the collClientePgtoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addClientePgtoss()
     */
    public function clearClientePgtoss()
    {
        $this->collClientePgtoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collClientePgtoss collection loaded partially.
     */
    public function resetPartialClientePgtoss($v = true)
    {
        $this->collClientePgtossPartial = $v;
    }

    /**
     * Initializes the collClientePgtoss collection.
     *
     * By default this just sets the collClientePgtoss collection to an empty array (like clearcollClientePgtoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initClientePgtoss($overrideExisting = true)
    {
        if (null !== $this->collClientePgtoss && !$overrideExisting) {
            return;
        }
        $this->collClientePgtoss = new ObjectCollection();
        $this->collClientePgtoss->setModel('\ClientePgtos');
    }

    /**
     * Gets an array of ChildClientePgtos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildClientePgtos[] List of ChildClientePgtos objects
     * @throws PropelException
     */
    public function getClientePgtoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collClientePgtossPartial && !$this->isNew();
        if (null === $this->collClientePgtoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collClientePgtoss) {
                // return empty collection
                $this->initClientePgtoss();
            } else {
                $collClientePgtoss = ChildClientePgtosQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collClientePgtossPartial && count($collClientePgtoss)) {
                        $this->initClientePgtoss(false);

                        foreach ($collClientePgtoss as $obj) {
                            if (false == $this->collClientePgtoss->contains($obj)) {
                                $this->collClientePgtoss->append($obj);
                            }
                        }

                        $this->collClientePgtossPartial = true;
                    }

                    return $collClientePgtoss;
                }

                if ($partial && $this->collClientePgtoss) {
                    foreach ($this->collClientePgtoss as $obj) {
                        if ($obj->isNew()) {
                            $collClientePgtoss[] = $obj;
                        }
                    }
                }

                $this->collClientePgtoss = $collClientePgtoss;
                $this->collClientePgtossPartial = false;
            }
        }

        return $this->collClientePgtoss;
    }

    /**
     * Sets a collection of ChildClientePgtos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $clientePgtoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setClientePgtoss(Collection $clientePgtoss, ConnectionInterface $con = null)
    {
        /** @var ChildClientePgtos[] $clientePgtossToDelete */
        $clientePgtossToDelete = $this->getClientePgtoss(new Criteria(), $con)->diff($clientePgtoss);


        $this->clientePgtossScheduledForDeletion = $clientePgtossToDelete;

        foreach ($clientePgtossToDelete as $clientePgtosRemoved) {
            $clientePgtosRemoved->setCliente(null);
        }

        $this->collClientePgtoss = null;
        foreach ($clientePgtoss as $clientePgtos) {
            $this->addClientePgtos($clientePgtos);
        }

        $this->collClientePgtoss = $clientePgtoss;
        $this->collClientePgtossPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ClientePgtos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ClientePgtos objects.
     * @throws PropelException
     */
    public function countClientePgtoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collClientePgtossPartial && !$this->isNew();
        if (null === $this->collClientePgtoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collClientePgtoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getClientePgtoss());
            }

            $query = ChildClientePgtosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collClientePgtoss);
    }

    /**
     * Method called to associate a ChildClientePgtos object to this object
     * through the ChildClientePgtos foreign key attribute.
     *
     * @param  ChildClientePgtos $l ChildClientePgtos
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addClientePgtos(ChildClientePgtos $l)
    {
        if ($this->collClientePgtoss === null) {
            $this->initClientePgtoss();
            $this->collClientePgtossPartial = true;
        }

        if (!$this->collClientePgtoss->contains($l)) {
            $this->doAddClientePgtos($l);
        }

        return $this;
    }

    /**
     * @param ChildClientePgtos $clientePgtos The ChildClientePgtos object to add.
     */
    protected function doAddClientePgtos(ChildClientePgtos $clientePgtos)
    {
        $this->collClientePgtoss[]= $clientePgtos;
        $clientePgtos->setCliente($this);
    }

    /**
     * @param  ChildClientePgtos $clientePgtos The ChildClientePgtos object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeClientePgtos(ChildClientePgtos $clientePgtos)
    {
        if ($this->getClientePgtoss()->contains($clientePgtos)) {
            $pos = $this->collClientePgtoss->search($clientePgtos);
            $this->collClientePgtoss->remove($pos);
            if (null === $this->clientePgtossScheduledForDeletion) {
                $this->clientePgtossScheduledForDeletion = clone $this->collClientePgtoss;
                $this->clientePgtossScheduledForDeletion->clear();
            }
            $this->clientePgtossScheduledForDeletion[]= $clientePgtos;
            $clientePgtos->setCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cliente is new, it will return
     * an empty collection; or if this Cliente has previously
     * been saved, it will retrieve related ClientePgtoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildClientePgtos[] List of ChildClientePgtos objects
     */
    public function getClientePgtossJoinMoeda(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClientePgtosQuery::create(null, $criteria);
        $query->joinWith('Moeda', $joinBehavior);

        return $this->getClientePgtoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cliente is new, it will return
     * an empty collection; or if this Cliente has previously
     * been saved, it will retrieve related ClientePgtoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildClientePgtos[] List of ChildClientePgtos objects
     */
    public function getClientePgtossJoinProdutos(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClientePgtosQuery::create(null, $criteria);
        $query->joinWith('Produtos', $joinBehavior);

        return $this->getClientePgtoss($query, $con);
    }

    /**
     * Clears out the collDocumentoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDocumentoss()
     */
    public function clearDocumentoss()
    {
        $this->collDocumentoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDocumentoss collection loaded partially.
     */
    public function resetPartialDocumentoss($v = true)
    {
        $this->collDocumentossPartial = $v;
    }

    /**
     * Initializes the collDocumentoss collection.
     *
     * By default this just sets the collDocumentoss collection to an empty array (like clearcollDocumentoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDocumentoss($overrideExisting = true)
    {
        if (null !== $this->collDocumentoss && !$overrideExisting) {
            return;
        }
        $this->collDocumentoss = new ObjectCollection();
        $this->collDocumentoss->setModel('\Documentos');
    }

    /**
     * Gets an array of ChildDocumentos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDocumentos[] List of ChildDocumentos objects
     * @throws PropelException
     */
    public function getDocumentoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDocumentossPartial && !$this->isNew();
        if (null === $this->collDocumentoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDocumentoss) {
                // return empty collection
                $this->initDocumentoss();
            } else {
                $collDocumentoss = ChildDocumentosQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDocumentossPartial && count($collDocumentoss)) {
                        $this->initDocumentoss(false);

                        foreach ($collDocumentoss as $obj) {
                            if (false == $this->collDocumentoss->contains($obj)) {
                                $this->collDocumentoss->append($obj);
                            }
                        }

                        $this->collDocumentossPartial = true;
                    }

                    return $collDocumentoss;
                }

                if ($partial && $this->collDocumentoss) {
                    foreach ($this->collDocumentoss as $obj) {
                        if ($obj->isNew()) {
                            $collDocumentoss[] = $obj;
                        }
                    }
                }

                $this->collDocumentoss = $collDocumentoss;
                $this->collDocumentossPartial = false;
            }
        }

        return $this->collDocumentoss;
    }

    /**
     * Sets a collection of ChildDocumentos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $documentoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setDocumentoss(Collection $documentoss, ConnectionInterface $con = null)
    {
        /** @var ChildDocumentos[] $documentossToDelete */
        $documentossToDelete = $this->getDocumentoss(new Criteria(), $con)->diff($documentoss);


        $this->documentossScheduledForDeletion = $documentossToDelete;

        foreach ($documentossToDelete as $documentosRemoved) {
            $documentosRemoved->setCliente(null);
        }

        $this->collDocumentoss = null;
        foreach ($documentoss as $documentos) {
            $this->addDocumentos($documentos);
        }

        $this->collDocumentoss = $documentoss;
        $this->collDocumentossPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Documentos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Documentos objects.
     * @throws PropelException
     */
    public function countDocumentoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDocumentossPartial && !$this->isNew();
        if (null === $this->collDocumentoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDocumentoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDocumentoss());
            }

            $query = ChildDocumentosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collDocumentoss);
    }

    /**
     * Method called to associate a ChildDocumentos object to this object
     * through the ChildDocumentos foreign key attribute.
     *
     * @param  ChildDocumentos $l ChildDocumentos
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addDocumentos(ChildDocumentos $l)
    {
        if ($this->collDocumentoss === null) {
            $this->initDocumentoss();
            $this->collDocumentossPartial = true;
        }

        if (!$this->collDocumentoss->contains($l)) {
            $this->doAddDocumentos($l);
        }

        return $this;
    }

    /**
     * @param ChildDocumentos $documentos The ChildDocumentos object to add.
     */
    protected function doAddDocumentos(ChildDocumentos $documentos)
    {
        $this->collDocumentoss[]= $documentos;
        $documentos->setCliente($this);
    }

    /**
     * @param  ChildDocumentos $documentos The ChildDocumentos object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeDocumentos(ChildDocumentos $documentos)
    {
        if ($this->getDocumentoss()->contains($documentos)) {
            $pos = $this->collDocumentoss->search($documentos);
            $this->collDocumentoss->remove($pos);
            if (null === $this->documentossScheduledForDeletion) {
                $this->documentossScheduledForDeletion = clone $this->collDocumentoss;
                $this->documentossScheduledForDeletion->clear();
            }
            $this->documentossScheduledForDeletion[]= $documentos;
            $documentos->setCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cliente is new, it will return
     * an empty collection; or if this Cliente has previously
     * been saved, it will retrieve related Documentoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDocumentos[] List of ChildDocumentos objects
     */
    public function getDocumentossJoinCategorias(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDocumentosQuery::create(null, $criteria);
        $query->joinWith('Categorias', $joinBehavior);

        return $this->getDocumentoss($query, $con);
    }

    /**
     * Clears out the collIdocs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addIdocs()
     */
    public function clearIdocs()
    {
        $this->collIdocs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collIdocs collection loaded partially.
     */
    public function resetPartialIdocs($v = true)
    {
        $this->collIdocsPartial = $v;
    }

    /**
     * Initializes the collIdocs collection.
     *
     * By default this just sets the collIdocs collection to an empty array (like clearcollIdocs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initIdocs($overrideExisting = true)
    {
        if (null !== $this->collIdocs && !$overrideExisting) {
            return;
        }
        $this->collIdocs = new ObjectCollection();
        $this->collIdocs->setModel('\Idoc');
    }

    /**
     * Gets an array of ChildIdoc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildIdoc[] List of ChildIdoc objects
     * @throws PropelException
     */
    public function getIdocs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collIdocsPartial && !$this->isNew();
        if (null === $this->collIdocs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collIdocs) {
                // return empty collection
                $this->initIdocs();
            } else {
                $collIdocs = ChildIdocQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collIdocsPartial && count($collIdocs)) {
                        $this->initIdocs(false);

                        foreach ($collIdocs as $obj) {
                            if (false == $this->collIdocs->contains($obj)) {
                                $this->collIdocs->append($obj);
                            }
                        }

                        $this->collIdocsPartial = true;
                    }

                    return $collIdocs;
                }

                if ($partial && $this->collIdocs) {
                    foreach ($this->collIdocs as $obj) {
                        if ($obj->isNew()) {
                            $collIdocs[] = $obj;
                        }
                    }
                }

                $this->collIdocs = $collIdocs;
                $this->collIdocsPartial = false;
            }
        }

        return $this->collIdocs;
    }

    /**
     * Sets a collection of ChildIdoc objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $idocs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setIdocs(Collection $idocs, ConnectionInterface $con = null)
    {
        /** @var ChildIdoc[] $idocsToDelete */
        $idocsToDelete = $this->getIdocs(new Criteria(), $con)->diff($idocs);


        $this->idocsScheduledForDeletion = $idocsToDelete;

        foreach ($idocsToDelete as $idocRemoved) {
            $idocRemoved->setCliente(null);
        }

        $this->collIdocs = null;
        foreach ($idocs as $idoc) {
            $this->addIdoc($idoc);
        }

        $this->collIdocs = $idocs;
        $this->collIdocsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Idoc objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Idoc objects.
     * @throws PropelException
     */
    public function countIdocs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collIdocsPartial && !$this->isNew();
        if (null === $this->collIdocs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collIdocs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getIdocs());
            }

            $query = ChildIdocQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collIdocs);
    }

    /**
     * Method called to associate a ChildIdoc object to this object
     * through the ChildIdoc foreign key attribute.
     *
     * @param  ChildIdoc $l ChildIdoc
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addIdoc(ChildIdoc $l)
    {
        if ($this->collIdocs === null) {
            $this->initIdocs();
            $this->collIdocsPartial = true;
        }

        if (!$this->collIdocs->contains($l)) {
            $this->doAddIdoc($l);
        }

        return $this;
    }

    /**
     * @param ChildIdoc $idoc The ChildIdoc object to add.
     */
    protected function doAddIdoc(ChildIdoc $idoc)
    {
        $this->collIdocs[]= $idoc;
        $idoc->setCliente($this);
    }

    /**
     * @param  ChildIdoc $idoc The ChildIdoc object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeIdoc(ChildIdoc $idoc)
    {
        if ($this->getIdocs()->contains($idoc)) {
            $pos = $this->collIdocs->search($idoc);
            $this->collIdocs->remove($pos);
            if (null === $this->idocsScheduledForDeletion) {
                $this->idocsScheduledForDeletion = clone $this->collIdocs;
                $this->idocsScheduledForDeletion->clear();
            }
            $this->idocsScheduledForDeletion[]= $idoc;
            $idoc->setCliente(null);
        }

        return $this;
    }

    /**
     * Clears out the collProdutoss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProdutoss()
     */
    public function clearProdutoss()
    {
        $this->collProdutoss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProdutoss collection loaded partially.
     */
    public function resetPartialProdutoss($v = true)
    {
        $this->collProdutossPartial = $v;
    }

    /**
     * Initializes the collProdutoss collection.
     *
     * By default this just sets the collProdutoss collection to an empty array (like clearcollProdutoss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProdutoss($overrideExisting = true)
    {
        if (null !== $this->collProdutoss && !$overrideExisting) {
            return;
        }
        $this->collProdutoss = new ObjectCollection();
        $this->collProdutoss->setModel('\Produtos');
    }

    /**
     * Gets an array of ChildProdutos objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProdutos[] List of ChildProdutos objects
     * @throws PropelException
     */
    public function getProdutoss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProdutossPartial && !$this->isNew();
        if (null === $this->collProdutoss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProdutoss) {
                // return empty collection
                $this->initProdutoss();
            } else {
                $collProdutoss = ChildProdutosQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProdutossPartial && count($collProdutoss)) {
                        $this->initProdutoss(false);

                        foreach ($collProdutoss as $obj) {
                            if (false == $this->collProdutoss->contains($obj)) {
                                $this->collProdutoss->append($obj);
                            }
                        }

                        $this->collProdutossPartial = true;
                    }

                    return $collProdutoss;
                }

                if ($partial && $this->collProdutoss) {
                    foreach ($this->collProdutoss as $obj) {
                        if ($obj->isNew()) {
                            $collProdutoss[] = $obj;
                        }
                    }
                }

                $this->collProdutoss = $collProdutoss;
                $this->collProdutossPartial = false;
            }
        }

        return $this->collProdutoss;
    }

    /**
     * Sets a collection of ChildProdutos objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $produtoss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setProdutoss(Collection $produtoss, ConnectionInterface $con = null)
    {
        /** @var ChildProdutos[] $produtossToDelete */
        $produtossToDelete = $this->getProdutoss(new Criteria(), $con)->diff($produtoss);


        $this->produtossScheduledForDeletion = $produtossToDelete;

        foreach ($produtossToDelete as $produtosRemoved) {
            $produtosRemoved->setCliente(null);
        }

        $this->collProdutoss = null;
        foreach ($produtoss as $produtos) {
            $this->addProdutos($produtos);
        }

        $this->collProdutoss = $produtoss;
        $this->collProdutossPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Produtos objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Produtos objects.
     * @throws PropelException
     */
    public function countProdutoss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProdutossPartial && !$this->isNew();
        if (null === $this->collProdutoss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProdutoss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProdutoss());
            }

            $query = ChildProdutosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collProdutoss);
    }

    /**
     * Method called to associate a ChildProdutos object to this object
     * through the ChildProdutos foreign key attribute.
     *
     * @param  ChildProdutos $l ChildProdutos
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addProdutos(ChildProdutos $l)
    {
        if ($this->collProdutoss === null) {
            $this->initProdutoss();
            $this->collProdutossPartial = true;
        }

        if (!$this->collProdutoss->contains($l)) {
            $this->doAddProdutos($l);
        }

        return $this;
    }

    /**
     * @param ChildProdutos $produtos The ChildProdutos object to add.
     */
    protected function doAddProdutos(ChildProdutos $produtos)
    {
        $this->collProdutoss[]= $produtos;
        $produtos->setCliente($this);
    }

    /**
     * @param  ChildProdutos $produtos The ChildProdutos object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeProdutos(ChildProdutos $produtos)
    {
        if ($this->getProdutoss()->contains($produtos)) {
            $pos = $this->collProdutoss->search($produtos);
            $this->collProdutoss->remove($pos);
            if (null === $this->produtossScheduledForDeletion) {
                $this->produtossScheduledForDeletion = clone $this->collProdutoss;
                $this->produtossScheduledForDeletion->clear();
            }
            $this->produtossScheduledForDeletion[]= $produtos;
            $produtos->setCliente(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Cliente is new, it will return
     * an empty collection; or if this Cliente has previously
     * been saved, it will retrieve related Produtoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Cliente.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProdutos[] List of ChildProdutos objects
     */
    public function getProdutossJoinMoeda(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProdutosQuery::create(null, $criteria);
        $query->joinWith('Moeda', $joinBehavior);

        return $this->getProdutoss($query, $con);
    }

    /**
     * Clears out the collUsuarioss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUsuarioss()
     */
    public function clearUsuarioss()
    {
        $this->collUsuarioss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUsuarioss collection loaded partially.
     */
    public function resetPartialUsuarioss($v = true)
    {
        $this->collUsuariossPartial = $v;
    }

    /**
     * Initializes the collUsuarioss collection.
     *
     * By default this just sets the collUsuarioss collection to an empty array (like clearcollUsuarioss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsuarioss($overrideExisting = true)
    {
        if (null !== $this->collUsuarioss && !$overrideExisting) {
            return;
        }
        $this->collUsuarioss = new ObjectCollection();
        $this->collUsuarioss->setModel('\Usuarios');
    }

    /**
     * Gets an array of ChildUsuarios objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUsuarios[] List of ChildUsuarios objects
     * @throws PropelException
     */
    public function getUsuarioss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUsuariossPartial && !$this->isNew();
        if (null === $this->collUsuarioss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUsuarioss) {
                // return empty collection
                $this->initUsuarioss();
            } else {
                $collUsuarioss = ChildUsuariosQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUsuariossPartial && count($collUsuarioss)) {
                        $this->initUsuarioss(false);

                        foreach ($collUsuarioss as $obj) {
                            if (false == $this->collUsuarioss->contains($obj)) {
                                $this->collUsuarioss->append($obj);
                            }
                        }

                        $this->collUsuariossPartial = true;
                    }

                    return $collUsuarioss;
                }

                if ($partial && $this->collUsuarioss) {
                    foreach ($this->collUsuarioss as $obj) {
                        if ($obj->isNew()) {
                            $collUsuarioss[] = $obj;
                        }
                    }
                }

                $this->collUsuarioss = $collUsuarioss;
                $this->collUsuariossPartial = false;
            }
        }

        return $this->collUsuarioss;
    }

    /**
     * Sets a collection of ChildUsuarios objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $usuarioss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setUsuarioss(Collection $usuarioss, ConnectionInterface $con = null)
    {
        /** @var ChildUsuarios[] $usuariossToDelete */
        $usuariossToDelete = $this->getUsuarioss(new Criteria(), $con)->diff($usuarioss);


        $this->usuariossScheduledForDeletion = $usuariossToDelete;

        foreach ($usuariossToDelete as $usuariosRemoved) {
            $usuariosRemoved->setCliente(null);
        }

        $this->collUsuarioss = null;
        foreach ($usuarioss as $usuarios) {
            $this->addUsuarios($usuarios);
        }

        $this->collUsuarioss = $usuarioss;
        $this->collUsuariossPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Usuarios objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Usuarios objects.
     * @throws PropelException
     */
    public function countUsuarioss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUsuariossPartial && !$this->isNew();
        if (null === $this->collUsuarioss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsuarioss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsuarioss());
            }

            $query = ChildUsuariosQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collUsuarioss);
    }

    /**
     * Method called to associate a ChildUsuarios object to this object
     * through the ChildUsuarios foreign key attribute.
     *
     * @param  ChildUsuarios $l ChildUsuarios
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addUsuarios(ChildUsuarios $l)
    {
        if ($this->collUsuarioss === null) {
            $this->initUsuarioss();
            $this->collUsuariossPartial = true;
        }

        if (!$this->collUsuarioss->contains($l)) {
            $this->doAddUsuarios($l);
        }

        return $this;
    }

    /**
     * @param ChildUsuarios $usuarios The ChildUsuarios object to add.
     */
    protected function doAddUsuarios(ChildUsuarios $usuarios)
    {
        $this->collUsuarioss[]= $usuarios;
        $usuarios->setCliente($this);
    }

    /**
     * @param  ChildUsuarios $usuarios The ChildUsuarios object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeUsuarios(ChildUsuarios $usuarios)
    {
        if ($this->getUsuarioss()->contains($usuarios)) {
            $pos = $this->collUsuarioss->search($usuarios);
            $this->collUsuarioss->remove($pos);
            if (null === $this->usuariossScheduledForDeletion) {
                $this->usuariossScheduledForDeletion = clone $this->collUsuarioss;
                $this->usuariossScheduledForDeletion->clear();
            }
            $this->usuariossScheduledForDeletion[]= $usuarios;
            $usuarios->setCliente(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->obscontrato = null;
        $this->email = null;
        $this->ativo = null;
        $this->nome = null;
        $this->id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collCategoriass) {
                foreach ($this->collCategoriass as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collClientePgtoss) {
                foreach ($this->collClientePgtoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDocumentoss) {
                foreach ($this->collDocumentoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collIdocs) {
                foreach ($this->collIdocs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProdutoss) {
                foreach ($this->collProdutoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsuarioss) {
                foreach ($this->collUsuarioss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collCategoriass = null;
        $this->collClientePgtoss = null;
        $this->collDocumentoss = null;
        $this->collIdocs = null;
        $this->collProdutoss = null;
        $this->collUsuarioss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClienteTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
