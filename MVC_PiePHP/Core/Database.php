<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private $user = 'root';
    private $pwd = 'root';
    private $name = 'mysql:dbname=cinema;host=localhost';

    private $connexion_sql;

    public function connect_to_sql()
    {
        try {
            $this->connexion_sql = new PDO($this->name, $this->user, $this->pwd);
            return $this->connexion_sql;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
    }
}
