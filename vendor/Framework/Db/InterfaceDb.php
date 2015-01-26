<?php
namespace Framework\Db;

interface InterfaceDb
{
    /**
     * Returns the PDO Object
     *
     * @return \PDO
     */
    public function getPDO();
}
