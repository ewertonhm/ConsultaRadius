<?php

namespace Base;

use \Autenticacao as ChildAutenticacao;
use \AutenticacaoQuery as ChildAutenticacaoQuery;
use \Cliente as ChildCliente;
use \ClienteQuery as ChildClienteQuery;
use \Log as ChildLog;
use \LogQuery as ChildLogQuery;
use \Exception;
use \PDO;
use Map\AutenticacaoTableMap;
use Map\ClienteTableMap;
use Map\LogTableMap;
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
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the nome field.
     *
     * @var        string
     */
    protected $nome;

    /**
     * The value for the documento field.
     *
     * @var        string
     */
    protected $documento;

    /**
     * The value for the endereco field.
     *
     * @var        string
     */
    protected $endereco;

    /**
     * The value for the cidade field.
     *
     * @var        string
     */
    protected $cidade;

    /**
     * The value for the ip field.
     *
     * @var        string
     */
    protected $ip;

    /**
     * The value for the concentrador field.
     *
     * @var        string
     */
    protected $concentrador;

    /**
     * The value for the vlan field.
     *
     * @var        int
     */
    protected $vlan;

    /**
     * The value for the pppoe field.
     *
     * @var        string
     */
    protected $pppoe;

    /**
     * The value for the senha field.
     *
     * @var        string
     */
    protected $senha;

    /**
     * The value for the stcontrato field.
     *
     * @var        string
     */
    protected $stcontrato;

    /**
     * The value for the servico field.
     *
     * @var        string
     */
    protected $servico;

    /**
     * The value for the velocidade field.
     *
     * @var        string
     */
    protected $velocidade;

    /**
     * The value for the status field.
     *
     * @var        string
     */
    protected $status;

    /**
     * The value for the anotacoes field.
     *
     * @var        string
     */
    protected $anotacoes;

    /**
     * The value for the macroteador field.
     *
     * @var        string
     */
    protected $macroteador;

    /**
     * The value for the maconu field.
     *
     * @var        string
     */
    protected $maconu;

    /**
     * @var        ObjectCollection|ChildAutenticacao[] Collection to store aggregation of ChildAutenticacao objects.
     */
    protected $collAutenticacaos;
    protected $collAutenticacaosPartial;

    /**
     * @var        ObjectCollection|ChildLog[] Collection to store aggregation of ChildLog objects.
     */
    protected $collLogs;
    protected $collLogsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAutenticacao[]
     */
    protected $autenticacaosScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildLog[]
     */
    protected $logsScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Cliente object.
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
     * @return $this The current object, for fluid interface
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
     * @return void
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        Propel::log(get_class($this) . ': ' . $msg, $priority);
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

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
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
     * Get the [nome] column value.
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the [documento] column value.
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Get the [endereco] column value.
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Get the [cidade] column value.
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Get the [ip] column value.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the [concentrador] column value.
     *
     * @return string
     */
    public function getConcentrador()
    {
        return $this->concentrador;
    }

    /**
     * Get the [vlan] column value.
     *
     * @return int
     */
    public function getVlan()
    {
        return $this->vlan;
    }

    /**
     * Get the [pppoe] column value.
     *
     * @return string
     */
    public function getPppoe()
    {
        return $this->pppoe;
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
     * Get the [stcontrato] column value.
     *
     * @return string
     */
    public function getStcontrato()
    {
        return $this->stcontrato;
    }

    /**
     * Get the [servico] column value.
     *
     * @return string
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Get the [velocidade] column value.
     *
     * @return string
     */
    public function getVelocidade()
    {
        return $this->velocidade;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [anotacoes] column value.
     *
     * @return string
     */
    public function getAnotacoes()
    {
        return $this->anotacoes;
    }

    /**
     * Get the [macroteador] column value.
     *
     * @return string
     */
    public function getMacroteador()
    {
        return $this->macroteador;
    }

    /**
     * Get the [maconu] column value.
     *
     * @return string
     */
    public function getMaconu()
    {
        return $this->maconu;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v New value
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
     * Set the value of [nome] column.
     *
     * @param string $v New value
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
     * Set the value of [documento] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setDocumento($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->documento !== $v) {
            $this->documento = $v;
            $this->modifiedColumns[ClienteTableMap::COL_DOCUMENTO] = true;
        }

        return $this;
    } // setDocumento()

    /**
     * Set the value of [endereco] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setEndereco($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->endereco !== $v) {
            $this->endereco = $v;
            $this->modifiedColumns[ClienteTableMap::COL_ENDERECO] = true;
        }

        return $this;
    } // setEndereco()

    /**
     * Set the value of [cidade] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setCidade($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->cidade !== $v) {
            $this->cidade = $v;
            $this->modifiedColumns[ClienteTableMap::COL_CIDADE] = true;
        }

        return $this;
    } // setCidade()

    /**
     * Set the value of [ip] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setIp($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->ip !== $v) {
            $this->ip = $v;
            $this->modifiedColumns[ClienteTableMap::COL_IP] = true;
        }

        return $this;
    } // setIp()

    /**
     * Set the value of [concentrador] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setConcentrador($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->concentrador !== $v) {
            $this->concentrador = $v;
            $this->modifiedColumns[ClienteTableMap::COL_CONCENTRADOR] = true;
        }

        return $this;
    } // setConcentrador()

    /**
     * Set the value of [vlan] column.
     *
     * @param int|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setVlan($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->vlan !== $v) {
            $this->vlan = $v;
            $this->modifiedColumns[ClienteTableMap::COL_VLAN] = true;
        }

        return $this;
    } // setVlan()

    /**
     * Set the value of [pppoe] column.
     *
     * @param string $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setPppoe($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pppoe !== $v) {
            $this->pppoe = $v;
            $this->modifiedColumns[ClienteTableMap::COL_PPPOE] = true;
        }

        return $this;
    } // setPppoe()

    /**
     * Set the value of [senha] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setSenha($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->senha !== $v) {
            $this->senha = $v;
            $this->modifiedColumns[ClienteTableMap::COL_SENHA] = true;
        }

        return $this;
    } // setSenha()

    /**
     * Set the value of [stcontrato] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setStcontrato($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->stcontrato !== $v) {
            $this->stcontrato = $v;
            $this->modifiedColumns[ClienteTableMap::COL_STCONTRATO] = true;
        }

        return $this;
    } // setStcontrato()

    /**
     * Set the value of [servico] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setServico($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->servico !== $v) {
            $this->servico = $v;
            $this->modifiedColumns[ClienteTableMap::COL_SERVICO] = true;
        }

        return $this;
    } // setServico()

    /**
     * Set the value of [velocidade] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setVelocidade($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->velocidade !== $v) {
            $this->velocidade = $v;
            $this->modifiedColumns[ClienteTableMap::COL_VELOCIDADE] = true;
        }

        return $this;
    } // setVelocidade()

    /**
     * Set the value of [status] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[ClienteTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [anotacoes] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setAnotacoes($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->anotacoes !== $v) {
            $this->anotacoes = $v;
            $this->modifiedColumns[ClienteTableMap::COL_ANOTACOES] = true;
        }

        return $this;
    } // setAnotacoes()

    /**
     * Set the value of [macroteador] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setMacroteador($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->macroteador !== $v) {
            $this->macroteador = $v;
            $this->modifiedColumns[ClienteTableMap::COL_MACROTEADOR] = true;
        }

        return $this;
    } // setMacroteador()

    /**
     * Set the value of [maconu] column.
     *
     * @param string|null $v New value
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function setMaconu($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->maconu !== $v) {
            $this->maconu = $v;
            $this->modifiedColumns[ClienteTableMap::COL_MACONU] = true;
        }

        return $this;
    } // setMaconu()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ClienteTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ClienteTableMap::translateFieldName('Nome', TableMap::TYPE_PHPNAME, $indexType)];
            $this->nome = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ClienteTableMap::translateFieldName('Documento', TableMap::TYPE_PHPNAME, $indexType)];
            $this->documento = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ClienteTableMap::translateFieldName('Endereco', TableMap::TYPE_PHPNAME, $indexType)];
            $this->endereco = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ClienteTableMap::translateFieldName('Cidade', TableMap::TYPE_PHPNAME, $indexType)];
            $this->cidade = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ClienteTableMap::translateFieldName('Ip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ClienteTableMap::translateFieldName('Concentrador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->concentrador = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ClienteTableMap::translateFieldName('Vlan', TableMap::TYPE_PHPNAME, $indexType)];
            $this->vlan = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ClienteTableMap::translateFieldName('Pppoe', TableMap::TYPE_PHPNAME, $indexType)];
            $this->pppoe = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ClienteTableMap::translateFieldName('Senha', TableMap::TYPE_PHPNAME, $indexType)];
            $this->senha = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ClienteTableMap::translateFieldName('Stcontrato', TableMap::TYPE_PHPNAME, $indexType)];
            $this->stcontrato = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ClienteTableMap::translateFieldName('Servico', TableMap::TYPE_PHPNAME, $indexType)];
            $this->servico = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ClienteTableMap::translateFieldName('Velocidade', TableMap::TYPE_PHPNAME, $indexType)];
            $this->velocidade = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ClienteTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ClienteTableMap::translateFieldName('Anotacoes', TableMap::TYPE_PHPNAME, $indexType)];
            $this->anotacoes = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ClienteTableMap::translateFieldName('Macroteador', TableMap::TYPE_PHPNAME, $indexType)];
            $this->macroteador = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ClienteTableMap::translateFieldName('Maconu', TableMap::TYPE_PHPNAME, $indexType)];
            $this->maconu = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 17; // 17 = ClienteTableMap::NUM_HYDRATE_COLUMNS.

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

            $this->collAutenticacaos = null;

            $this->collLogs = null;

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

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClienteTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
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

            if ($this->autenticacaosScheduledForDeletion !== null) {
                if (!$this->autenticacaosScheduledForDeletion->isEmpty()) {
                    foreach ($this->autenticacaosScheduledForDeletion as $autenticacao) {
                        // need to save related object because we set the relation to null
                        $autenticacao->save($con);
                    }
                    $this->autenticacaosScheduledForDeletion = null;
                }
            }

            if ($this->collAutenticacaos !== null) {
                foreach ($this->collAutenticacaos as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->logsScheduledForDeletion !== null) {
                if (!$this->logsScheduledForDeletion->isEmpty()) {
                    foreach ($this->logsScheduledForDeletion as $log) {
                        // need to save related object because we set the relation to null
                        $log->save($con);
                    }
                    $this->logsScheduledForDeletion = null;
                }
            }

            if ($this->collLogs !== null) {
                foreach ($this->collLogs as $referrerFK) {
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

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClienteTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOME)) {
            $modifiedColumns[':p' . $index++]  = 'nome';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_DOCUMENTO)) {
            $modifiedColumns[':p' . $index++]  = 'documento';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ENDERECO)) {
            $modifiedColumns[':p' . $index++]  = 'endereco';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CIDADE)) {
            $modifiedColumns[':p' . $index++]  = 'cidade';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_IP)) {
            $modifiedColumns[':p' . $index++]  = 'ip';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CONCENTRADOR)) {
            $modifiedColumns[':p' . $index++]  = 'concentrador';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_VLAN)) {
            $modifiedColumns[':p' . $index++]  = 'vlan';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_PPPOE)) {
            $modifiedColumns[':p' . $index++]  = 'pppoe';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_SENHA)) {
            $modifiedColumns[':p' . $index++]  = 'senha';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_STCONTRATO)) {
            $modifiedColumns[':p' . $index++]  = 'stcontrato';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_SERVICO)) {
            $modifiedColumns[':p' . $index++]  = 'servico';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_VELOCIDADE)) {
            $modifiedColumns[':p' . $index++]  = 'velocidade';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'status';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ANOTACOES)) {
            $modifiedColumns[':p' . $index++]  = 'anotacoes';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_MACROTEADOR)) {
            $modifiedColumns[':p' . $index++]  = 'macroteador';
        }
        if ($this->isColumnModified(ClienteTableMap::COL_MACONU)) {
            $modifiedColumns[':p' . $index++]  = 'maconu';
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
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case 'nome':
                        $stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
                        break;
                    case 'documento':
                        $stmt->bindValue($identifier, $this->documento, PDO::PARAM_STR);
                        break;
                    case 'endereco':
                        $stmt->bindValue($identifier, $this->endereco, PDO::PARAM_STR);
                        break;
                    case 'cidade':
                        $stmt->bindValue($identifier, $this->cidade, PDO::PARAM_STR);
                        break;
                    case 'ip':
                        $stmt->bindValue($identifier, $this->ip, PDO::PARAM_STR);
                        break;
                    case 'concentrador':
                        $stmt->bindValue($identifier, $this->concentrador, PDO::PARAM_STR);
                        break;
                    case 'vlan':
                        $stmt->bindValue($identifier, $this->vlan, PDO::PARAM_INT);
                        break;
                    case 'pppoe':
                        $stmt->bindValue($identifier, $this->pppoe, PDO::PARAM_STR);
                        break;
                    case 'senha':
                        $stmt->bindValue($identifier, $this->senha, PDO::PARAM_STR);
                        break;
                    case 'stcontrato':
                        $stmt->bindValue($identifier, $this->stcontrato, PDO::PARAM_STR);
                        break;
                    case 'servico':
                        $stmt->bindValue($identifier, $this->servico, PDO::PARAM_STR);
                        break;
                    case 'velocidade':
                        $stmt->bindValue($identifier, $this->velocidade, PDO::PARAM_STR);
                        break;
                    case 'status':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case 'anotacoes':
                        $stmt->bindValue($identifier, $this->anotacoes, PDO::PARAM_STR);
                        break;
                    case 'macroteador':
                        $stmt->bindValue($identifier, $this->macroteador, PDO::PARAM_STR);
                        break;
                    case 'maconu':
                        $stmt->bindValue($identifier, $this->maconu, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

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
                return $this->getId();
                break;
            case 1:
                return $this->getNome();
                break;
            case 2:
                return $this->getDocumento();
                break;
            case 3:
                return $this->getEndereco();
                break;
            case 4:
                return $this->getCidade();
                break;
            case 5:
                return $this->getIp();
                break;
            case 6:
                return $this->getConcentrador();
                break;
            case 7:
                return $this->getVlan();
                break;
            case 8:
                return $this->getPppoe();
                break;
            case 9:
                return $this->getSenha();
                break;
            case 10:
                return $this->getStcontrato();
                break;
            case 11:
                return $this->getServico();
                break;
            case 12:
                return $this->getVelocidade();
                break;
            case 13:
                return $this->getStatus();
                break;
            case 14:
                return $this->getAnotacoes();
                break;
            case 15:
                return $this->getMacroteador();
                break;
            case 16:
                return $this->getMaconu();
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
            $keys[0] => $this->getId(),
            $keys[1] => $this->getNome(),
            $keys[2] => $this->getDocumento(),
            $keys[3] => $this->getEndereco(),
            $keys[4] => $this->getCidade(),
            $keys[5] => $this->getIp(),
            $keys[6] => $this->getConcentrador(),
            $keys[7] => $this->getVlan(),
            $keys[8] => $this->getPppoe(),
            $keys[9] => $this->getSenha(),
            $keys[10] => $this->getStcontrato(),
            $keys[11] => $this->getServico(),
            $keys[12] => $this->getVelocidade(),
            $keys[13] => $this->getStatus(),
            $keys[14] => $this->getAnotacoes(),
            $keys[15] => $this->getMacroteador(),
            $keys[16] => $this->getMaconu(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAutenticacaos) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'autenticacaos';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'autenticacaos';
                        break;
                    default:
                        $key = 'Autenticacaos';
                }

                $result[$key] = $this->collAutenticacaos->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLogs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'logs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'logs';
                        break;
                    default:
                        $key = 'Logs';
                }

                $result[$key] = $this->collLogs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
                $this->setId($value);
                break;
            case 1:
                $this->setNome($value);
                break;
            case 2:
                $this->setDocumento($value);
                break;
            case 3:
                $this->setEndereco($value);
                break;
            case 4:
                $this->setCidade($value);
                break;
            case 5:
                $this->setIp($value);
                break;
            case 6:
                $this->setConcentrador($value);
                break;
            case 7:
                $this->setVlan($value);
                break;
            case 8:
                $this->setPppoe($value);
                break;
            case 9:
                $this->setSenha($value);
                break;
            case 10:
                $this->setStcontrato($value);
                break;
            case 11:
                $this->setServico($value);
                break;
            case 12:
                $this->setVelocidade($value);
                break;
            case 13:
                $this->setStatus($value);
                break;
            case 14:
                $this->setAnotacoes($value);
                break;
            case 15:
                $this->setMacroteador($value);
                break;
            case 16:
                $this->setMaconu($value);
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
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setNome($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setDocumento($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEndereco($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setCidade($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setIp($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setConcentrador($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setVlan($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setPppoe($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSenha($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setStcontrato($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setServico($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setVelocidade($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setStatus($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setAnotacoes($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setMacroteador($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setMaconu($arr[$keys[16]]);
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

        if ($this->isColumnModified(ClienteTableMap::COL_ID)) {
            $criteria->add(ClienteTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_NOME)) {
            $criteria->add(ClienteTableMap::COL_NOME, $this->nome);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_DOCUMENTO)) {
            $criteria->add(ClienteTableMap::COL_DOCUMENTO, $this->documento);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ENDERECO)) {
            $criteria->add(ClienteTableMap::COL_ENDERECO, $this->endereco);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CIDADE)) {
            $criteria->add(ClienteTableMap::COL_CIDADE, $this->cidade);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_IP)) {
            $criteria->add(ClienteTableMap::COL_IP, $this->ip);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_CONCENTRADOR)) {
            $criteria->add(ClienteTableMap::COL_CONCENTRADOR, $this->concentrador);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_VLAN)) {
            $criteria->add(ClienteTableMap::COL_VLAN, $this->vlan);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_PPPOE)) {
            $criteria->add(ClienteTableMap::COL_PPPOE, $this->pppoe);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_SENHA)) {
            $criteria->add(ClienteTableMap::COL_SENHA, $this->senha);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_STCONTRATO)) {
            $criteria->add(ClienteTableMap::COL_STCONTRATO, $this->stcontrato);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_SERVICO)) {
            $criteria->add(ClienteTableMap::COL_SERVICO, $this->servico);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_VELOCIDADE)) {
            $criteria->add(ClienteTableMap::COL_VELOCIDADE, $this->velocidade);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_STATUS)) {
            $criteria->add(ClienteTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_ANOTACOES)) {
            $criteria->add(ClienteTableMap::COL_ANOTACOES, $this->anotacoes);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_MACROTEADOR)) {
            $criteria->add(ClienteTableMap::COL_MACROTEADOR, $this->macroteador);
        }
        if ($this->isColumnModified(ClienteTableMap::COL_MACONU)) {
            $criteria->add(ClienteTableMap::COL_MACONU, $this->maconu);
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
        $copyObj->setNome($this->getNome());
        $copyObj->setDocumento($this->getDocumento());
        $copyObj->setEndereco($this->getEndereco());
        $copyObj->setCidade($this->getCidade());
        $copyObj->setIp($this->getIp());
        $copyObj->setConcentrador($this->getConcentrador());
        $copyObj->setVlan($this->getVlan());
        $copyObj->setPppoe($this->getPppoe());
        $copyObj->setSenha($this->getSenha());
        $copyObj->setStcontrato($this->getStcontrato());
        $copyObj->setServico($this->getServico());
        $copyObj->setVelocidade($this->getVelocidade());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setAnotacoes($this->getAnotacoes());
        $copyObj->setMacroteador($this->getMacroteador());
        $copyObj->setMaconu($this->getMaconu());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAutenticacaos() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAutenticacao($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLog($relObj->copy($deepCopy));
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
        if ('Autenticacao' === $relationName) {
            $this->initAutenticacaos();
            return;
        }
        if ('Log' === $relationName) {
            $this->initLogs();
            return;
        }
    }

    /**
     * Clears out the collAutenticacaos collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAutenticacaos()
     */
    public function clearAutenticacaos()
    {
        $this->collAutenticacaos = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAutenticacaos collection loaded partially.
     */
    public function resetPartialAutenticacaos($v = true)
    {
        $this->collAutenticacaosPartial = $v;
    }

    /**
     * Initializes the collAutenticacaos collection.
     *
     * By default this just sets the collAutenticacaos collection to an empty array (like clearcollAutenticacaos());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAutenticacaos($overrideExisting = true)
    {
        if (null !== $this->collAutenticacaos && !$overrideExisting) {
            return;
        }

        $collectionClassName = AutenticacaoTableMap::getTableMap()->getCollectionClassName();

        $this->collAutenticacaos = new $collectionClassName;
        $this->collAutenticacaos->setModel('\Autenticacao');
    }

    /**
     * Gets an array of ChildAutenticacao objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAutenticacao[] List of ChildAutenticacao objects
     * @throws PropelException
     */
    public function getAutenticacaos(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAutenticacaosPartial && !$this->isNew();
        if (null === $this->collAutenticacaos || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collAutenticacaos) {
                    $this->initAutenticacaos();
                } else {
                    $collectionClassName = AutenticacaoTableMap::getTableMap()->getCollectionClassName();

                    $collAutenticacaos = new $collectionClassName;
                    $collAutenticacaos->setModel('\Autenticacao');

                    return $collAutenticacaos;
                }
            } else {
                $collAutenticacaos = ChildAutenticacaoQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAutenticacaosPartial && count($collAutenticacaos)) {
                        $this->initAutenticacaos(false);

                        foreach ($collAutenticacaos as $obj) {
                            if (false == $this->collAutenticacaos->contains($obj)) {
                                $this->collAutenticacaos->append($obj);
                            }
                        }

                        $this->collAutenticacaosPartial = true;
                    }

                    return $collAutenticacaos;
                }

                if ($partial && $this->collAutenticacaos) {
                    foreach ($this->collAutenticacaos as $obj) {
                        if ($obj->isNew()) {
                            $collAutenticacaos[] = $obj;
                        }
                    }
                }

                $this->collAutenticacaos = $collAutenticacaos;
                $this->collAutenticacaosPartial = false;
            }
        }

        return $this->collAutenticacaos;
    }

    /**
     * Sets a collection of ChildAutenticacao objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $autenticacaos A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setAutenticacaos(Collection $autenticacaos, ConnectionInterface $con = null)
    {
        /** @var ChildAutenticacao[] $autenticacaosToDelete */
        $autenticacaosToDelete = $this->getAutenticacaos(new Criteria(), $con)->diff($autenticacaos);


        $this->autenticacaosScheduledForDeletion = $autenticacaosToDelete;

        foreach ($autenticacaosToDelete as $autenticacaoRemoved) {
            $autenticacaoRemoved->setCliente(null);
        }

        $this->collAutenticacaos = null;
        foreach ($autenticacaos as $autenticacao) {
            $this->addAutenticacao($autenticacao);
        }

        $this->collAutenticacaos = $autenticacaos;
        $this->collAutenticacaosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Autenticacao objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Autenticacao objects.
     * @throws PropelException
     */
    public function countAutenticacaos(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAutenticacaosPartial && !$this->isNew();
        if (null === $this->collAutenticacaos || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAutenticacaos) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAutenticacaos());
            }

            $query = ChildAutenticacaoQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collAutenticacaos);
    }

    /**
     * Method called to associate a ChildAutenticacao object to this object
     * through the ChildAutenticacao foreign key attribute.
     *
     * @param  ChildAutenticacao $l ChildAutenticacao
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addAutenticacao(ChildAutenticacao $l)
    {
        if ($this->collAutenticacaos === null) {
            $this->initAutenticacaos();
            $this->collAutenticacaosPartial = true;
        }

        if (!$this->collAutenticacaos->contains($l)) {
            $this->doAddAutenticacao($l);

            if ($this->autenticacaosScheduledForDeletion and $this->autenticacaosScheduledForDeletion->contains($l)) {
                $this->autenticacaosScheduledForDeletion->remove($this->autenticacaosScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAutenticacao $autenticacao The ChildAutenticacao object to add.
     */
    protected function doAddAutenticacao(ChildAutenticacao $autenticacao)
    {
        $this->collAutenticacaos[]= $autenticacao;
        $autenticacao->setCliente($this);
    }

    /**
     * @param  ChildAutenticacao $autenticacao The ChildAutenticacao object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeAutenticacao(ChildAutenticacao $autenticacao)
    {
        if ($this->getAutenticacaos()->contains($autenticacao)) {
            $pos = $this->collAutenticacaos->search($autenticacao);
            $this->collAutenticacaos->remove($pos);
            if (null === $this->autenticacaosScheduledForDeletion) {
                $this->autenticacaosScheduledForDeletion = clone $this->collAutenticacaos;
                $this->autenticacaosScheduledForDeletion->clear();
            }
            $this->autenticacaosScheduledForDeletion[]= $autenticacao;
            $autenticacao->setCliente(null);
        }

        return $this;
    }

    /**
     * Clears out the collLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addLogs()
     */
    public function clearLogs()
    {
        $this->collLogs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collLogs collection loaded partially.
     */
    public function resetPartialLogs($v = true)
    {
        $this->collLogsPartial = $v;
    }

    /**
     * Initializes the collLogs collection.
     *
     * By default this just sets the collLogs collection to an empty array (like clearcollLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLogs($overrideExisting = true)
    {
        if (null !== $this->collLogs && !$overrideExisting) {
            return;
        }

        $collectionClassName = LogTableMap::getTableMap()->getCollectionClassName();

        $this->collLogs = new $collectionClassName;
        $this->collLogs->setModel('\Log');
    }

    /**
     * Gets an array of ChildLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildCliente is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildLog[] List of ChildLog objects
     * @throws PropelException
     */
    public function getLogs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collLogsPartial && !$this->isNew();
        if (null === $this->collLogs || null !== $criteria || $partial) {
            if ($this->isNew()) {
                // return empty collection
                if (null === $this->collLogs) {
                    $this->initLogs();
                } else {
                    $collectionClassName = LogTableMap::getTableMap()->getCollectionClassName();

                    $collLogs = new $collectionClassName;
                    $collLogs->setModel('\Log');

                    return $collLogs;
                }
            } else {
                $collLogs = ChildLogQuery::create(null, $criteria)
                    ->filterByCliente($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collLogsPartial && count($collLogs)) {
                        $this->initLogs(false);

                        foreach ($collLogs as $obj) {
                            if (false == $this->collLogs->contains($obj)) {
                                $this->collLogs->append($obj);
                            }
                        }

                        $this->collLogsPartial = true;
                    }

                    return $collLogs;
                }

                if ($partial && $this->collLogs) {
                    foreach ($this->collLogs as $obj) {
                        if ($obj->isNew()) {
                            $collLogs[] = $obj;
                        }
                    }
                }

                $this->collLogs = $collLogs;
                $this->collLogsPartial = false;
            }
        }

        return $this->collLogs;
    }

    /**
     * Sets a collection of ChildLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $logs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function setLogs(Collection $logs, ConnectionInterface $con = null)
    {
        /** @var ChildLog[] $logsToDelete */
        $logsToDelete = $this->getLogs(new Criteria(), $con)->diff($logs);


        $this->logsScheduledForDeletion = $logsToDelete;

        foreach ($logsToDelete as $logRemoved) {
            $logRemoved->setCliente(null);
        }

        $this->collLogs = null;
        foreach ($logs as $log) {
            $this->addLog($log);
        }

        $this->collLogs = $logs;
        $this->collLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Log objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Log objects.
     * @throws PropelException
     */
    public function countLogs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collLogsPartial && !$this->isNew();
        if (null === $this->collLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLogs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLogs());
            }

            $query = ChildLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByCliente($this)
                ->count($con);
        }

        return count($this->collLogs);
    }

    /**
     * Method called to associate a ChildLog object to this object
     * through the ChildLog foreign key attribute.
     *
     * @param  ChildLog $l ChildLog
     * @return $this|\Cliente The current object (for fluent API support)
     */
    public function addLog(ChildLog $l)
    {
        if ($this->collLogs === null) {
            $this->initLogs();
            $this->collLogsPartial = true;
        }

        if (!$this->collLogs->contains($l)) {
            $this->doAddLog($l);

            if ($this->logsScheduledForDeletion and $this->logsScheduledForDeletion->contains($l)) {
                $this->logsScheduledForDeletion->remove($this->logsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildLog $log The ChildLog object to add.
     */
    protected function doAddLog(ChildLog $log)
    {
        $this->collLogs[]= $log;
        $log->setCliente($this);
    }

    /**
     * @param  ChildLog $log The ChildLog object to remove.
     * @return $this|ChildCliente The current object (for fluent API support)
     */
    public function removeLog(ChildLog $log)
    {
        if ($this->getLogs()->contains($log)) {
            $pos = $this->collLogs->search($log);
            $this->collLogs->remove($pos);
            if (null === $this->logsScheduledForDeletion) {
                $this->logsScheduledForDeletion = clone $this->collLogs;
                $this->logsScheduledForDeletion->clear();
            }
            $this->logsScheduledForDeletion[]= $log;
            $log->setCliente(null);
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
        $this->id = null;
        $this->nome = null;
        $this->documento = null;
        $this->endereco = null;
        $this->cidade = null;
        $this->ip = null;
        $this->concentrador = null;
        $this->vlan = null;
        $this->pppoe = null;
        $this->senha = null;
        $this->stcontrato = null;
        $this->servico = null;
        $this->velocidade = null;
        $this->status = null;
        $this->anotacoes = null;
        $this->macroteador = null;
        $this->maconu = null;
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
            if ($this->collAutenticacaos) {
                foreach ($this->collAutenticacaos as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLogs) {
                foreach ($this->collLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAutenticacaos = null;
        $this->collLogs = null;
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
