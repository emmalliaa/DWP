<?php

namespace Models;

class DatabaseClient
{

    protected static $instance;
    private $host;
    private $database;
    private $user;
    private $password;
    private $connection;


    private function __construct()
    {
        $this->host = 'localhost';
        $this->database = "CoffeeShopDB";
        $this->user = "root";
        $this->password = "root";
        // $this->createConnection();
        $this->connection = new \mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Could not connect to database");
        }
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function createConnection()
    {
        try {
            $this->conn = new \mysqli($this->host, $this->user, $this->password, $this->database);

            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        } catch (\mysqli_sql_exception $e) {
            throw new \mysqli_sql_exception("Error retrieving data: {$e->getMessage()}", $e->getCode(), $e);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getAllFromTable(string $table)
    {
        try {
            $query = "SELECT * FROM $table";

            $result = mysqli_query($this->connection, $query);

            return $result;
        } catch (\mysqli_sql_exception $e) {
            echo "Error getting from $table : " . $e->getMessage();
            throw new \mysqli_sql_exception("Error getting from $table", $e->getCode(), $e);
        }

    }


}