<?php
namespace App\Models;

use PDO;
use PDOException;

class Database
{
    protected $user = DB_USER;
    protected $password = DB_PASS;
    protected $host = DB_HOST;
    protected $port = DB_PORT;
    protected $dbname = DB_NAME;
    protected $ssl = DB_SSL;
    protected $dbh;
    protected $stmt;
    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';sslmode=' . $this->ssl;
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
    public function single()
    {
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