<?php
namespace Models;
require_once("Core/Database.php");

class Model{
    private $host = "localhost"; //172.20.111.136 - localhost:8889
    private $db_name = "filelec";
    private $user = "root"; //jeremy - root
    private $password = ""; //jeremy - root

    public function __construct()
    {
        $this->pdo = \Database::getPdo($this->host, $this->db_name, $this->user, $this->password);
    }
}