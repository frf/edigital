<?php

namespace Base;

<<<<<<< HEAD
=======
use \Cliente as ChildCliente;
use \ClienteQuery as ChildClienteQuery;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
use \UsuariosQuery as ChildUsuariosQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\UsuariosTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'usuarios' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Usuarios implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UsuariosTableMap';


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
<<<<<<< HEAD
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the senha field.
     * @var        string
     */
    protected $senha;
=======
     * The value for the idcliente field.
     * @var        int
     */
    protected $idcliente;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the remember_token field.
     * @var        string
     */
    protected $remember_token;

    /**
     * The value for the tipo field.
     * @var        string
     */
    protected $tipo;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

    /**
     * The value for the nome field.
     * @var        string
     */
    protected $nome;

    /**
<<<<<<< HEAD
     * The value for the tipo field.
     * @var        string
     */
    protected $tipo;

    /**
     * The value for the remember_token field.
     * @var        string
     */
    protected $remember_token;

    /**
     * The value for the created_at field.
     * @var        \DateTime
     */
    protected $created_at;

    /**
     * The value for the updated_at field.
     * @var        \DateTime
     */
    protected $updated_at;
=======
     * The value for the senha field.
     * @var        string
     */
    protected $senha;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * @var        ChildCliente
     */
    protected $aCliente;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\Usuarios object.
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
     * Compares this with another <code>Usuarios</code> instance.  If
     * <code>obj</code> is an instance of <code>Usuarios</code>, delegates to
     * <code>equals(Usuarios)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Usuarios The current object, for fluid interface
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
<<<<<<< HEAD
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Get the [senha] column value.
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Get the [nome] column value.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
=======
     * Get the [idcliente] column value.
     *
     * @return int
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTime ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [remember_token] column value.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
<<<<<<< HEAD
     * Get the [remember_token] column value.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Get the [optionally formatted] temporal [created_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->created_at;
        } else {
            return $this->created_at instanceof \DateTime ? $this->created_at->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [updated_at] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getUpdatedAt($format = NULL)
    {
        if ($format === null) {
            return $this->updated_at;
        } else {
            return $this->updated_at instanceof \DateTime ? $this->updated_at->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
=======
     * Get the [nome] column value.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the [senha] column value.
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of [idcliente] column.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     *
     * @param  int $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
<<<<<<< HEAD
    public function setId($v)
=======
    public function setIdcliente($v)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {
        if ($v !== null) {
            $v = (int) $v;
        }

<<<<<<< HEAD
        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [email] column.
=======
        if ($this->idcliente !== $v) {
            $this->idcliente = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_IDCLIENTE] = true;
        }

        if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
            $this->aCliente = null;
        }

        return $this;
    } // setIdcliente()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($dt !== $this->updated_at) {
                $this->updated_at = $dt;
                $this->modifiedColumns[UsuariosTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($dt !== $this->created_at) {
                $this->created_at = $dt;
                $this->modifiedColumns[UsuariosTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Set the value of [remember_token] column.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     *
     * @param  string $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
<<<<<<< HEAD
    public function setEmail($v)
=======
    public function setRememberToken($v)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {
        if ($v !== null) {
            $v = (string) $v;
        }

<<<<<<< HEAD
        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [senha] column.
=======
        if ($this->remember_token !== $v) {
            $this->remember_token = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_REMEMBER_TOKEN] = true;
        }

        return $this;
    } // setRememberToken()

    /**
     * Set the value of [tipo] column.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     *
     * @param  string $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
<<<<<<< HEAD
    public function setSenha($v)
=======
    public function setTipo($v)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {
        if ($v !== null) {
            $v = (string) $v;
        }

<<<<<<< HEAD
        if ($this->senha !== $v) {
            $this->senha = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_SENHA] = true;
        }

        return $this;
    } // setSenha()
=======
        if ($this->tipo !== $v) {
            $this->tipo = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_TIPO] = true;
        }

        return $this;
    } // setTipo()
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

    /**
     * Set the value of [nome] column.
     *
     * @param  string $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setNome($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->nome !== $v) {
            $this->nome = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_NOME] = true;
        }

        return $this;
    } // setNome()

    /**
<<<<<<< HEAD
     * Set the value of [tipo] column.
=======
     * Set the value of [senha] column.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     *
     * @param  string $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
<<<<<<< HEAD
    public function setTipo($v)
=======
    public function setSenha($v)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {
        if ($v !== null) {
            $v = (string) $v;
        }

<<<<<<< HEAD
        if ($this->tipo !== $v) {
            $this->tipo = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_TIPO] = true;
        }

        return $this;
    } // setTipo()

    /**
     * Set the value of [remember_token] column.
=======
        if ($this->senha !== $v) {
            $this->senha = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_SENHA] = true;
        }

        return $this;
    } // setSenha()

    /**
     * Set the value of [email] column.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     *
     * @param  string $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
<<<<<<< HEAD
    public function setRememberToken($v)
=======
    public function setEmail($v)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {
        if ($v !== null) {
            $v = (string) $v;
        }

<<<<<<< HEAD
        if ($this->remember_token !== $v) {
            $this->remember_token = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_REMEMBER_TOKEN] = true;
        }

        return $this;
    } // setRememberToken()

    /**
     * Sets the value of [created_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setCreatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created_at !== null || $dt !== null) {
            if ($dt !== $this->created_at) {
                $this->created_at = $dt;
                $this->modifiedColumns[UsuariosTableMap::COL_CREATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedAt()

    /**
     * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setUpdatedAt($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->updated_at !== null || $dt !== null) {
            if ($dt !== $this->updated_at) {
                $this->updated_at = $dt;
                $this->modifiedColumns[UsuariosTableMap::COL_UPDATED_AT] = true;
            }
        } // if either are not null

        return $this;
    } // setUpdatedAt()
=======
        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return $this|\Usuarios The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UsuariosTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

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

<<<<<<< HEAD
            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UsuariosTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UsuariosTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UsuariosTableMap::translateFieldName('Senha', TableMap::TYPE_PHPNAME, $indexType)];
            $this->senha = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UsuariosTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;
=======
            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UsuariosTableMap::translateFieldName('Idcliente', TableMap::TYPE_PHPNAME, $indexType)];
            $this->idcliente = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UsuariosTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UsuariosTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UsuariosTableMap::translateFieldName('RememberToken', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remember_token = (null !== $col) ? (string) $col : null;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UsuariosTableMap::translateFieldName('Tipo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->tipo = (null !== $col) ? (string) $col : null;

<<<<<<< HEAD
            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UsuariosTableMap::translateFieldName('RememberToken', TableMap::TYPE_PHPNAME, $indexType)];
            $this->remember_token = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UsuariosTableMap::translateFieldName('CreatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UsuariosTableMap::translateFieldName('UpdatedAt', TableMap::TYPE_PHPNAME, $indexType)];
            $this->updated_at = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
=======
            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UsuariosTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UsuariosTableMap::translateFieldName('Senha', TableMap::TYPE_PHPNAME, $indexType)];
            $this->senha = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UsuariosTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UsuariosTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

<<<<<<< HEAD
            return $startcol + 8; // 8 = UsuariosTableMap::NUM_HYDRATE_COLUMNS.
=======
            return $startcol + 9; // 9 = UsuariosTableMap::NUM_HYDRATE_COLUMNS.
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Usuarios'), 0, $e);
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
<<<<<<< HEAD
=======
        if ($this->aCliente !== null && $this->idcliente !== $this->aCliente->getId()) {
            $this->aCliente = null;
        }
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
            $con = Propel::getServiceContainer()->getReadConnection(UsuariosTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUsuariosQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

<<<<<<< HEAD
=======
            $this->aCliente = null;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Usuarios::setDeleted()
     * @see Usuarios::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUsuariosQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsuariosTableMap::DATABASE_NAME);
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
                UsuariosTableMap::addInstanceToPool($this);
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

<<<<<<< HEAD
=======
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

>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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

        $this->modifiedColumns[UsuariosTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsuariosTableMap::COL_ID . ')');
        }
        if (null === $this->id) {
            try {
                $dataFetcher = $con->query("SELECT nextval('usuarios_id_seq')");
                $this->id = $dataFetcher->fetchColumn();
            } catch (Exception $e) {
                throw new PropelException('Unable to get sequence id.', 0, $e);
            }
        }


         // check the columns in natural order for more readable SQL queries
<<<<<<< HEAD
        if ($this->isColumnModified(UsuariosTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_SENHA)) {
            $modifiedColumns[':p' . $index++]  = 'senha';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
=======
        if ($this->isColumnModified(UsuariosTableMap::COL_IDCLIENTE)) {
            $modifiedColumns[':p' . $index++]  = 'idcliente';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_REMEMBER_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = 'remember_token';
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_TIPO)) {
            $modifiedColumns[':p' . $index++]  = 'tipo';
        }
<<<<<<< HEAD
        if ($this->isColumnModified(UsuariosTableMap::COL_REMEMBER_TOKEN)) {
            $modifiedColumns[':p' . $index++]  = 'remember_token';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_CREATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'created_at';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_UPDATED_AT)) {
            $modifiedColumns[':p' . $index++]  = 'updated_at';
=======
        if ($this->isColumnModified(UsuariosTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_SENHA)) {
            $modifiedColumns[':p' . $index++]  = 'senha';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        }

        $sql = sprintf(
            'INSERT INTO usuarios (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
<<<<<<< HEAD
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'senha':
                        $stmt->bindValue($identifier, $this->senha, PDO::PARAM_STR);
                        break;
                    case 'nome':
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
=======
                    case 'idcliente':
                        $stmt->bindValue($identifier, $this->idcliente, PDO::PARAM_INT);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'remember_token':
                        $stmt->bindValue($identifier, $this->remember_token, PDO::PARAM_STR);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
                        break;
                    case 'tipo':
                        $stmt->bindValue($identifier, $this->tipo, PDO::PARAM_STR);
                        break;
<<<<<<< HEAD
                    case 'remember_token':
                        $stmt->bindValue($identifier, $this->remember_token, PDO::PARAM_STR);
                        break;
                    case 'created_at':
                        $stmt->bindValue($identifier, $this->created_at ? $this->created_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'updated_at':
                        $stmt->bindValue($identifier, $this->updated_at ? $this->updated_at->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
=======
                    case 'nome':
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
                        break;
                    case 'senha':
                        $stmt->bindValue($identifier, $this->senha, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
        $pos = UsuariosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
<<<<<<< HEAD
                return $this->getId();
                break;
            case 1:
                return $this->getEmail();
                break;
            case 2:
                return $this->getSenha();
                break;
            case 3:
                return $this->getNome();
=======
                return $this->getIdcliente();
                break;
            case 1:
                return $this->getUpdatedAt();
                break;
            case 2:
                return $this->getCreatedAt();
                break;
            case 3:
                return $this->getRememberToken();
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
                break;
            case 4:
                return $this->getTipo();
                break;
            case 5:
<<<<<<< HEAD
                return $this->getRememberToken();
                break;
            case 6:
                return $this->getCreatedAt();
                break;
            case 7:
                return $this->getUpdatedAt();
=======
                return $this->getNome();
                break;
            case 6:
                return $this->getSenha();
                break;
            case 7:
                return $this->getEmail();
                break;
            case 8:
                return $this->getId();
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
<<<<<<< HEAD
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
=======
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    {

        if (isset($alreadyDumpedObjects['Usuarios'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Usuarios'][$this->hashCode()] = true;
        $keys = UsuariosTableMap::getFieldNames($keyType);
        $result = array(
<<<<<<< HEAD
            $keys[0] => $this->getId(),
            $keys[1] => $this->getEmail(),
            $keys[2] => $this->getSenha(),
            $keys[3] => $this->getNome(),
            $keys[4] => $this->getTipo(),
            $keys[5] => $this->getRememberToken(),
            $keys[6] => $this->getCreatedAt(),
            $keys[7] => $this->getUpdatedAt(),
=======
            $keys[0] => $this->getIdcliente(),
            $keys[1] => $this->getUpdatedAt(),
            $keys[2] => $this->getCreatedAt(),
            $keys[3] => $this->getRememberToken(),
            $keys[4] => $this->getTipo(),
            $keys[5] => $this->getNome(),
            $keys[6] => $this->getSenha(),
            $keys[7] => $this->getEmail(),
            $keys[8] => $this->getId(),
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        );

        $utc = new \DateTimeZone('utc');
        if ($result[$keys[6]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[6]];
            $result[$keys[6]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        if ($result[$keys[7]] instanceof \DateTime) {
            // When changing timezone we don't want to change existing instances
            $dateTime = clone $result[$keys[7]];
            $result[$keys[7]] = $dateTime->setTimezone($utc)->format('Y-m-d\TH:i:s\Z');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

<<<<<<< HEAD
=======
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
        }
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b

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
     * @return $this|\Usuarios
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UsuariosTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Usuarios
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
<<<<<<< HEAD
                $this->setId($value);
                break;
            case 1:
                $this->setEmail($value);
                break;
            case 2:
                $this->setSenha($value);
                break;
            case 3:
                $this->setNome($value);
=======
                $this->setIdcliente($value);
                break;
            case 1:
                $this->setUpdatedAt($value);
                break;
            case 2:
                $this->setCreatedAt($value);
                break;
            case 3:
                $this->setRememberToken($value);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
                break;
            case 4:
                $this->setTipo($value);
                break;
            case 5:
<<<<<<< HEAD
                $this->setRememberToken($value);
                break;
            case 6:
                $this->setCreatedAt($value);
                break;
            case 7:
                $this->setUpdatedAt($value);
=======
                $this->setNome($value);
                break;
            case 6:
                $this->setSenha($value);
                break;
            case 7:
                $this->setEmail($value);
                break;
            case 8:
                $this->setId($value);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
        $keys = UsuariosTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
<<<<<<< HEAD
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setEmail($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSenha($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setNome($arr[$keys[3]]);
=======
            $this->setIdcliente($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setUpdatedAt($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCreatedAt($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setRememberToken($arr[$keys[3]]);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setTipo($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
<<<<<<< HEAD
            $this->setRememberToken($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCreatedAt($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setUpdatedAt($arr[$keys[7]]);
=======
            $this->setNome($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setSenha($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setEmail($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setId($arr[$keys[8]]);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
     * @return $this|\Usuarios The current object, for fluid interface
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
        $criteria = new Criteria(UsuariosTableMap::DATABASE_NAME);

<<<<<<< HEAD
        if ($this->isColumnModified(UsuariosTableMap::COL_ID)) {
            $criteria->add(UsuariosTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_EMAIL)) {
            $criteria->add(UsuariosTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_SENHA)) {
            $criteria->add(UsuariosTableMap::COL_SENHA, $this->senha);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_NOME)) {
            $criteria->add(UsuariosTableMap::COL_NOME, $this->nome);
=======
        if ($this->isColumnModified(UsuariosTableMap::COL_IDCLIENTE)) {
            $criteria->add(UsuariosTableMap::COL_IDCLIENTE, $this->idcliente);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_UPDATED_AT)) {
            $criteria->add(UsuariosTableMap::COL_UPDATED_AT, $this->updated_at);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_CREATED_AT)) {
            $criteria->add(UsuariosTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_REMEMBER_TOKEN)) {
            $criteria->add(UsuariosTableMap::COL_REMEMBER_TOKEN, $this->remember_token);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_TIPO)) {
            $criteria->add(UsuariosTableMap::COL_TIPO, $this->tipo);
        }
<<<<<<< HEAD
        if ($this->isColumnModified(UsuariosTableMap::COL_REMEMBER_TOKEN)) {
            $criteria->add(UsuariosTableMap::COL_REMEMBER_TOKEN, $this->remember_token);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_CREATED_AT)) {
            $criteria->add(UsuariosTableMap::COL_CREATED_AT, $this->created_at);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_UPDATED_AT)) {
            $criteria->add(UsuariosTableMap::COL_UPDATED_AT, $this->updated_at);
=======
        if ($this->isColumnModified(UsuariosTableMap::COL_NOME)) {
            $criteria->add(UsuariosTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_SENHA)) {
            $criteria->add(UsuariosTableMap::COL_SENHA, $this->senha);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_EMAIL)) {
            $criteria->add(UsuariosTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(UsuariosTableMap::COL_ID)) {
            $criteria->add(UsuariosTableMap::COL_ID, $this->id);
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
        $criteria = ChildUsuariosQuery::create();
        $criteria->add(UsuariosTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Usuarios (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
<<<<<<< HEAD
        $copyObj->setEmail($this->getEmail());
        $copyObj->setSenha($this->getSenha());
        $copyObj->setNome($this->getNome());
        $copyObj->setTipo($this->getTipo());
        $copyObj->setRememberToken($this->getRememberToken());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
=======
        $copyObj->setIdcliente($this->getIdcliente());
        $copyObj->setUpdatedAt($this->getUpdatedAt());
        $copyObj->setCreatedAt($this->getCreatedAt());
        $copyObj->setRememberToken($this->getRememberToken());
        $copyObj->setTipo($this->getTipo());
        $copyObj->setNome($this->getNome());
        $copyObj->setSenha($this->getSenha());
        $copyObj->setEmail($this->getEmail());
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
     * @return \Usuarios Clone of current object.
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
<<<<<<< HEAD
=======
     * Declares an association between this object and a ChildCliente object.
     *
     * @param  ChildCliente $v
     * @return $this|\Usuarios The current object (for fluent API support)
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
            $v->addUsuarios($this);
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
                $this->aCliente->addUsuarioss($this);
             */
        }

        return $this->aCliente;
    }

    /**
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
<<<<<<< HEAD
        $this->id = null;
        $this->email = null;
        $this->senha = null;
        $this->nome = null;
        $this->tipo = null;
        $this->remember_token = null;
        $this->created_at = null;
        $this->updated_at = null;
=======
        if (null !== $this->aCliente) {
            $this->aCliente->removeUsuarios($this);
        }
        $this->idcliente = null;
        $this->updated_at = null;
        $this->created_at = null;
        $this->remember_token = null;
        $this->tipo = null;
        $this->nome = null;
        $this->senha = null;
        $this->email = null;
        $this->id = null;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
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
        } // if ($deep)

<<<<<<< HEAD
=======
        $this->aCliente = null;
>>>>>>> b8d39d004e8d70d7608919c9d53d0e5ce0f95c9b
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UsuariosTableMap::DEFAULT_STRING_FORMAT);
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
