<?php

namespace Base;

use \Cliente as ChildCliente;
use \ClientePgtos as ChildClientePgtos;
use \ClientePgtosQuery as ChildClientePgtosQuery;
use \ClienteQuery as ChildClienteQuery;
use \Moeda as ChildMoeda;
use \MoedaQuery as ChildMoedaQuery;
use \Produtos as ChildProdutos;
use \ProdutosQuery as ChildProdutosQuery;
use \Exception;
use \PDO;
use Map\ProdutosTableMap;
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
 * Base class that represents a row from the 'produtos' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Produtos implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ProdutosTableMap';


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
     * The value for the tipo field.
     * @var        string
     */
    protected $tipo;

    /**
     * The value for the idcliente field.
     * @var        int
     */
    protected $idcliente;

    /**
     * The value for the idmoeda field.
     * @var        int
     */
    protected $idmoeda;

    /**
     * The value for the valor field.
     * @var        string
     */
    protected $valor;

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
     * @var        ChildCliente
     */
    protected $aCliente;

    /**
     * @var        ChildMoeda
     */
    protected $aMoeda;

    /**
     * @var        ObjectCollection|ChildClientePgtos[] Collection to store aggregation of ChildClientePgtos objects.
     */
    protected $collClientePgtoss;
    protected $collClientePgtossPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildClientePgtos[]
     */
    protected $clientePgtossScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Produtos object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>Produtos</code> instance.  If
     * <code>obj</code> is an instance of <code>Produtos</code>, delegates to
     * <code>equals(Produtos)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Produtos The current object, for fluid interface
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
     * Get the [tipo] column value.
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Get the [idcliente] column value.
     *
     * @return int
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the [idmoeda] column value.
     *
     * @return int
     */
    public function getIdmoeda()
    {
        return $this->idmoeda;
    }

    /**
     * Get the [valor] column value.
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
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
     * Set the value of [tipo] column.
     *
     * @param  string $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setTipo($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tipo !== $v) {
            $this->tipo = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_TIPO] = true;
        }

        return $this;
    } // setTipo()

    /**
     * Set the value of [idcliente] column.
     *
     * @param  int $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setIdcliente($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idcliente !== $v) {
            $this->idcliente = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_IDCLIENTE] = true;
        }

        if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
            $this->aCliente = null;
        }

        return $this;
    } // setIdcliente()

    /**
     * Set the value of [idmoeda] column.
     *
     * @param  int $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setIdmoeda($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->idmoeda !== $v) {
            $this->idmoeda = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_IDMOEDA] = true;
        }

        if ($this->aMoeda !== null && $this->aMoeda->getId() !== $v) {
            $this->aMoeda = null;
        }

        return $this;
    } // setIdmoeda()

    /**
     * Set the value of [valor] column.
     *
     * @param  string $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setValor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->valor !== $v) {
            $this->valor = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_VALOR] = true;
        }

        return $this;
    } // setValor()

    /**
     * Set the value of [nome] column.
     *
     * @param  string $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setNome($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome !== $v) {
            $this->nome = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_NOME] = true;
        }

        return $this;
    } // setNome()

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return $this|\Produtos The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ProdutosTableMap::COL_ID] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ProdutosTableMap::translateFieldName('Tipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ProdutosTableMap::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idcliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ProdutosTableMap::translateFieldName('Idmoeda', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idmoeda = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ProdutosTableMap::translateFieldName('Valor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->valor = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ProdutosTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ProdutosTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = ProdutosTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Produtos'), 0, $e);
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
        if ($this->aCliente !== null && $this->idcliente !== $this->aCliente->getId()) {
            $this->aCliente = null;
        }
        if ($this->aMoeda !== null && $this->idmoeda !== $this->aMoeda->getId()) {
            $this->aMoeda = null;
        }
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
            $con = Propel::getServiceContainer()->getReadConnection(ProdutosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildProdutosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aCliente = null;
            $this->aMoeda = null;
            $this->collClientePgtoss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Produtos::setDeleted()
     * @see Produtos::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProdutosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildProdutosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProdutosTableMap::DATABASE_NAME);
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
                ProdutosTableMap::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCliente !== null) {
                if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
                    $affectedRows += $this->aCliente->save($con);
                }
                $this->setCliente($this->aCliente);
            }

            if ($this->aMoeda !== null) {
                if ($this->aMoeda->isModified() || $this->aMoeda->isNew()) {
                    $affectedRows += $this->aMoeda->save($con);
                }
                $this->setMoeda($this->aMoeda);
            }

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

        $this->modifiedColumns[ProdutosTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProdutosTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('produtos_id_seq')");
                $this->id = $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProdutosTableMap::COL_TIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo';
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_IDCLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'idcliente';
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_IDMOEDA)) {
            $modifiedColumns[':p' . $index++]  = 'idmoeda';
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_VALOR)) {
            $modifiedColumns[':p' . $index++]  = 'valor';
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }

        $sql = sprintf(
            'INSERT INTO produtos (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'tipo':
                        $stmt->bindValue($identifier, $this->tipo, PDO::PARAM_STR);
                        break;
                    case 'idcliente':
                        $stmt->bindValue($identifier, $this->idcliente, PDO::PARAM_INT);
                        break;
                    case 'idmoeda':
                        $stmt->bindValue($identifier, $this->idmoeda, PDO::PARAM_INT);
                        break;
                    case 'valor':
                        $stmt->bindValue($identifier, $this->valor, PDO::PARAM_STR);
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
        $pos = ProdutosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getTipo();
                break;
            case 1:
                return $this->getIdcliente();
                break;
            case 2:
                return $this->getIdmoeda();
                break;
            case 3:
                return $this->getValor();
                break;
            case 4:
                return $this->getNome();
                break;
            case 5:
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

        if (isset($alreadyDumpedObjects['Produtos'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Produtos'][$this->hashCode()] = true;
        $keys = ProdutosTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTipo(),
            $keys[1] => $this->getIdcliente(),
            $keys[2] => $this->getIdmoeda(),
            $keys[3] => $this->getValor(),
            $keys[4] => $this->getNome(),
            $keys[5] => $this->getId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCliente) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'cliente';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'cliente';
                        break;
                    default:
                        $key = 'Cliente';
                }

                $result[$key] = $this->aCliente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMoeda) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'moeda';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'moeda';
                        break;
                    default:
                        $key = 'Moeda';
                }

                $result[$key] = $this->aMoeda->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\Produtos
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProdutosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Produtos
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTipo($value);
                break;
            case 1:
                $this->setIdcliente($value);
                break;
            case 2:
                $this->setIdmoeda($value);
                break;
            case 3:
                $this->setValor($value);
                break;
            case 4:
                $this->setNome($value);
                break;
            case 5:
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
        $keys = ProdutosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setTipo($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setIdcliente($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setIdmoeda($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setValor($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setNome($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setId($arr[$keys[5]]);
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
     * @return $this|\Produtos The current object, for fluid interface
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
        $criteria = new Criteria(ProdutosTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ProdutosTableMap::COL_TIPO)) {
            $criteria->add(ProdutosTableMap::COL_TIPO, $this->tipo);
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_IDCLIENTE)) {
            $criteria->add(ProdutosTableMap::COL_IDCLIENTE, $this->idcliente);
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_IDMOEDA)) {
            $criteria->add(ProdutosTableMap::COL_IDMOEDA, $this->idmoeda);
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_VALOR)) {
            $criteria->add(ProdutosTableMap::COL_VALOR, $this->valor);
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_NOME)) {
            $criteria->add(ProdutosTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(ProdutosTableMap::COL_ID)) {
            $criteria->add(ProdutosTableMap::COL_ID, $this->id);
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
        $criteria = ChildProdutosQuery::create();
        $criteria->add(ProdutosTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Produtos (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTipo($this->getTipo());
        $copyObj->setIdcliente($this->getIdcliente());
        $copyObj->setIdmoeda($this->getIdmoeda());
        $copyObj->setValor($this->getValor());
        $copyObj->setNome($this->getNome());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getClientePgtoss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addClientePgtos($relObj->copy($deepCopy));
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
     * @return \Produtos Clone of current object.
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
     * Declares an association between this object and a ChildCliente object.
     *
     * @param  ChildCliente $v
     * @return $this|\Produtos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCliente(ChildCliente $v = null)
    {
        if ($v === null) {
            $this->setIdcliente(NULL);
        } else {
            $this->setIdcliente($v->getId());
        }

        $this->aCliente = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildCliente object, it will not be re-added.
        if ($v !== null) {
            $v->addProdutos($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildCliente object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildCliente The associated ChildCliente object.
     * @throws PropelException
     */
    public function getCliente(ConnectionInterface $con = null)
    {
        if ($this->aCliente === null && ($this->idcliente !== null)) {
            $this->aCliente = ChildClienteQuery::create()->findPk($this->idcliente, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCliente->addProdutoss($this);
             */
        }

        return $this->aCliente;
    }

    /**
     * Declares an association between this object and a ChildMoeda object.
     *
     * @param  ChildMoeda $v
     * @return $this|\Produtos The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMoeda(ChildMoeda $v = null)
    {
        if ($v === null) {
            $this->setIdmoeda(NULL);
        } else {
            $this->setIdmoeda($v->getId());
        }

        $this->aMoeda = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildMoeda object, it will not be re-added.
        if ($v !== null) {
            $v->addProdutos($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildMoeda object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildMoeda The associated ChildMoeda object.
     * @throws PropelException
     */
    public function getMoeda(ConnectionInterface $con = null)
    {
        if ($this->aMoeda === null && ($this->idmoeda !== null)) {
            $this->aMoeda = ChildMoedaQuery::create()->findPk($this->idmoeda, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMoeda->addProdutoss($this);
             */
        }

        return $this->aMoeda;
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
        if ('ClientePgtos' == $relationName) {
            return $this->initClientePgtoss();
        }
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
     * If this ChildProdutos is new, it will return
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
                    ->filterByProdutos($this)
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
     * @return $this|ChildProdutos The current object (for fluent API support)
     */
    public function setClientePgtoss(Collection $clientePgtoss, ConnectionInterface $con = null)
    {
        /** @var ChildClientePgtos[] $clientePgtossToDelete */
        $clientePgtossToDelete = $this->getClientePgtoss(new Criteria(), $con)->diff($clientePgtoss);


        $this->clientePgtossScheduledForDeletion = $clientePgtossToDelete;

        foreach ($clientePgtossToDelete as $clientePgtosRemoved) {
            $clientePgtosRemoved->setProdutos(null);
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
                ->filterByProdutos($this)
                ->count($con);
        }

        return count($this->collClientePgtoss);
    }

    /**
     * Method called to associate a ChildClientePgtos object to this object
     * through the ChildClientePgtos foreign key attribute.
     *
     * @param  ChildClientePgtos $l ChildClientePgtos
     * @return $this|\Produtos The current object (for fluent API support)
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
        $clientePgtos->setProdutos($this);
    }

    /**
     * @param  ChildClientePgtos $clientePgtos The ChildClientePgtos object to remove.
     * @return $this|ChildProdutos The current object (for fluent API support)
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
            $clientePgtos->setProdutos(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Produtos is new, it will return
     * an empty collection; or if this Produtos has previously
     * been saved, it will retrieve related ClientePgtoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Produtos.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildClientePgtos[] List of ChildClientePgtos objects
     */
    public function getClientePgtossJoinCliente(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildClientePgtosQuery::create(null, $criteria);
        $query->joinWith('Cliente', $joinBehavior);

        return $this->getClientePgtoss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Produtos is new, it will return
     * an empty collection; or if this Produtos has previously
     * been saved, it will retrieve related ClientePgtoss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Produtos.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aCliente) {
            $this->aCliente->removeProdutos($this);
        }
        if (null !== $this->aMoeda) {
            $this->aMoeda->removeProdutos($this);
        }
        $this->tipo = null;
        $this->idcliente = null;
        $this->idmoeda = null;
        $this->valor = null;
        $this->nome = null;
        $this->id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
            if ($this->collClientePgtoss) {
                foreach ($this->collClientePgtoss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collClientePgtoss = null;
        $this->aCliente = null;
        $this->aMoeda = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProdutosTableMap::DEFAULT_STRING_FORMAT);
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