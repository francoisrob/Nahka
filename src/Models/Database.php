<?php
namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $user = DB_USER;
    private $password = DB_PASS;
    private $host = DB_HOST;
    private $port = DB_PORT;
    private $dbname = DB_NAME;
    private $ssl = DB_SSL;
    private $dbh;
    private $stmt;

    protected $db;

    public function __construct()
    {   
        $dsn= 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';sslmode=' . $this->ssl;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

}