<?php
namespace Framework\Db;

/**
 * Class SQLite
 * @package Framework\Db
 */
class SQLite implements InterfaceDb
{
    /**
     * Db Connection
     *
     * @var \PDO
     */
    private $_connection;

    /**
     * Main constructor
     *
     * @param string $databaseName
     */
    public function __construct($databaseName = 'default')
    {
        // Set default timezone
        date_default_timezone_set('UTC');

        // Create (connect to) SQLite database in file
        $this->_connection = new \PDO('sqlite:'.$databaseName.'.sqlite3');
        // Set errormode to exceptions
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Returns the PDO Object
     *
     * @return \PDO
     */
    public function getPDO()
    {
        return $this->_connection;
    }
}