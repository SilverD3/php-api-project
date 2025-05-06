<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\Database;

use \PDO;
use Core\Configure;

/**
 * This class is used to create and manage connection with DBMS
 */
class ConnectionManager
{
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    private $_connection_error;

    private $_connection;

    public function __construct()
    {
        $config = (new Configure())->read('DataSource');

        if (empty($config)) {
            $this->_connection_error = "No datasource configuration found.";
        } else {
            $this->setConfig($config);

            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8mb4";

            try {
                $this->_connection = new PDO($dsn, $this->username, $this->password);
                $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                $this->_connection_error = $e->getMessage();
            }
        }
    }

    /**
     * Get the connection object
     */
    public function getConnection()
    {
        return $this->_connection;
    }

    /**
     * Set connection properties
     *
     * @param array $config 
     * @return void
     */
    public function setConfig(array $config)
    {
        if (isset($config['host'])) {
            $this->host = $config['host'];
        }

        if (isset($config['username'])) {
            $this->username = $config['username'];
        }

        if (isset($config['password'])) {
            $this->password = $config['password'];
        }

        if (isset($config['database'])) {
            $this->database = $config['database'];
        }
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function getError()
    {
        return $this->_connection_error;
    }

    public function closeConnection(): void
    {
        $this->_connection = null;
    }
}
