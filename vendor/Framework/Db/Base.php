<?php
namespace Framework\Db;

/**
 * Class SQLite
 * @package Framework\Db
 */
class Base
{
    /**
     * Db Service
     *
     * @var mixed
     */
    private $_dbService;

    /**
     * Main constructor
     *
     * @throws \Framework\ServiceProvider\ServiceNotFoundException
     */
    public function __construct()
    {
        $service = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $this->_dbService = $service->get('DatabaseProvider')->getPDO();
    }

    /**
     * Returns the Db Service
     *
     * @return \PDO
     */
    public function getDbService()
    {
        return $this->_dbService;
    }

    /**
     * Closing the connection
     */
    public function __destruct()
    {
        $this->_dbService = null;
    }
}