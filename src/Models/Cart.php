<!-- CRUD for cart -->
<?php
namespace App\Models;

use App\Models\Database;

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function create()
    {
        return $this;
    }
    public function read()
    {
        return $this;
    }
    public function update()
    {
        return $this;
    }
    public function delete()
    {
        return $this;
    }
}