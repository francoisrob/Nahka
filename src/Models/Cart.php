<?php

namespace App\Models;

use App\Models\Database;

class Cart
{
    private $db;
    private $amount;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function addToCart($userId, $productId, $amount)
    {
        $haveCart = $this->getProductCart($userId, $productId);
        var_dump($haveCart);
        if ($haveCart) {
            $this->db->query('UPDATE carts SET amount = :amount WHERE user_id = :user_id AND product_id = :product_id');
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $productId);
            $this->db->bind(':amount', $this->amount + $amount);
            $this->db->execute();
        } else {
            $this->db->query('INSERT INTO carts (user_id, product_id, amount) VALUES (:user_id, :product_id, :amount)');
            $this->db->bind(':user_id', $userId);
            $this->db->bind(':product_id', $productId);
            $this->db->bind(':amount', $amount);
            $this->db->execute();
        }
        return $this;
    }
    public function getProductCart($userId, $productId)
    {
        $this->db->query('SELECT * FROM carts WHERE user_id = :user_id AND product_id = :product_id');
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':product_id', $productId);
        $result = $this->db->single();
        $this->amount = $result['amount'];
        return $result;
    }
    public function getCart($userId)
    {
        $this->db->query('SELECT * FROM carts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $userId);
        $result = $this->db->resultSet();
        return $result;
    }

    public function create()
    {
        return $this;
    }
    public function clearCart($userId)
    {
        $this->db->query('DELETE FROM carts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $userId);
        $this->db->execute();
        return $this;
    }
}