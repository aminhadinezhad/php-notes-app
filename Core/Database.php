<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $stmt;

    // NOTE: when we create an instance of the Database class, the __construct method automatically runs
    public function __construct($config)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';'); // example.com?host=localhost&port=3306&dbname=myapp // NOTE: this one is better than the one below
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']};"; // connection string
        $this->connection = new PDO($dsn, $config['user'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        ]); // create instance of a PDO class
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection->prepare($query); // prepare a new query to send to MySQL
        $this->stmt->execute($params); // MySQL execute that query

        return $this;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function get()
    {
        return $this->stmt->fetchAll();
    }
}
