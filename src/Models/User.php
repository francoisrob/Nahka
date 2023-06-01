<?php
namespace App\Models;

use PDO;
use PDOException;

class user
{
    private $id = ID;
    private $name = NAME;
    private $surname = SURNAME;
    private $email = EMAIL;
    private $cart = CART;

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
    public function getEmail()
    {
        return $this->email;
    }
    public function getCart()
    {
        return $this->cart;
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
    public function setCart(string $cart)
    {
        $this->cart = $cart;
    }
    public function create(int $id)
    {
        return $this;
    }
    public function update(int $id)
    {
        return $this;
    }
    public function delete(int $id)
    {
        return $this;
    }
    public function read(string $email)
    {   
        $db = new \App\Models\Database();
        $db->query('SELECT * FROM users WHERE email = :email');
        $db->bind(':email', $email);
        $user = $db->single();

        $this->id = $user['id'];
        $this->name = $user['name'];
        $this->surname = $user['surname'];
        $this->email = $user['email'];
        $this->cart = $user['cart'];

        return $this;
    }
}