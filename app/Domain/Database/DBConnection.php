<?php

namespace App\Domain\Database;

use PDO;

/**
 * @package Database
 */
class DBConnection
{
    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var PDO
     */
    private $pdo;

    /**
     *
     */
    public function __construct(string $dbName, string $host, string $username, string $password)
    {
        $this->dbName = $dbName;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO(
            "mysql:dbname=$this->dbName;host:$this->host",
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8',
            ]);
    }
}
