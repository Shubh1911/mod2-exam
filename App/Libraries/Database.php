<?php
namespace App\Libraries;

/**
 * Database
 * database class creates a database connection and has all the values to create a connection
 */
class Database
{
    private $host = "localhost";
    private $user = "shubham";
    private $pass = "Shubham@1911";
    private $dbname = "parking";
    private $conn;
    public function __construct()
    {
        $this->conn = new \mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname,
        );
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
          
        }
    }
    /**
     * execute
     *executes any query
     * @param  string $query
     * @return mixed
     */
    public function execute($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }


}