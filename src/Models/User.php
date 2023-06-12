<?php
namespace App\Models;

use App\Models\Database;

class User
{
    private $db;
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getEmail($id)
    {   
        $this->db->query('SELECT email FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $email = $this->db->single();
        return $email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function create($name, $surname, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query('INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)');
        $this->db->bind(':name', $name);
        $this->db->bind(':surname', $surname);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashed_password);
        $this->db->execute();
    }
    public function update(int $id)
    {
        $this->db->query('UPDATE users SET name = :name, surname = :surname, email = :email, password = :password WHERE id = :id');
        $this->db->bind(':name', $this->name);
        $this->db->bind(':surname', $this->surname);
        $this->db->bind(':email', $this->email);
        $this->db->bind(':password', $this->password);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function delete(int $id)
    {
        return $this;
    }
    public function read()
    {
        return $this;
    }
    public function createUser($name, $surname, $email, $password)
    {
        $hashed_password = password_hash($password, '2y');
        $this->db->query('INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)');
        $this->db->bind(':name', $name);
        $this->db->bind(':surname', $surname);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashed_password);
        return $this->db->execute();
    }
    public function getUserByEmail(string $email = null)
    {
        if ($email) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);
            $user = $this->db->single();
            if ($user) {
                $this->id = $user['id'];
                $this->name = $user['name'];
                $this->surname = $user['surname'];
                $this->email = $user['email'];
                $this->password = $user['password'];
            } else {
                $this->id = null;
            }
        } else {
            $this->id = null;
        }
        return $this->id;
    }
}