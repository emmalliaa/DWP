<?php


class DBConnect
{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $database = "CoffeeShopDB";
    private $conn;

    public function __construct()
    {

        try {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (mysqli_sql_exception $e) {
            throw new \mysqli_sql_exception("Error retrieving data: {$e->getMessage()}", $e->getCode(), $e);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}


?>