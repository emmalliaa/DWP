<?php
namespace Controllers;

use Models as M;

include_once('../Models/DatabaseClient.php');

class HomeController
{
    private $dbClient;

    public function __construct()
    {
        $this->dbClient = M\DatabaseClient::getInstance();
    }

    public function getAllFromTable(string $table)
    {
        $this->dbClient->getAllFromTable($table);
    }
}