<?php

namespace Model;

use Core\Database;
use PDO;

class AppModel
{
    /**
     * @var PDO
     */
    protected $db;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect_to_sql();
    }
}
