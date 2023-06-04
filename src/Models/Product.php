<?php
namespace App\Models;

use App\Models\Database;

class Product
{
	protected $db;
	protected $id;
	protected $product_name;
	protected $product_description;
	protected $price;
	protected $image;
	protected $created_at;

	public function __construct()
	{
		$this->db = new Database();
	}
	public function getFeaturedProducts($featuredProducts = [])
	{
		$featuredProductsIds = implode(',', $featuredProducts);
		$this->db->query("SELECT * FROM products WHERE id IN ($featuredProductsIds)");
		return $this->db->resultSet();
	}
	public function getProducts()
	{
		$this->db->query('SELECT * FROM products');
		return $this->db->resultSet();
	}
	public function getProduct(int $id = null)
	{
		if (!$id) {
			return null;
		}
		$this->db->query('SELECT * FROM products WHERE id = :id');
		$this->db->bind(':id', $id);
		$product = $this->db->single();
		if (!$product) {
			return null;
		}
		$this->id = $product['id'];
		$this->product_name = $product['product_name'];
		$this->product_description = $product['product_description'];
		$this->price = $product['price'];
		$this->image = $product['image'];
		$this->created_at = $product['created_at'];
		return $this;
	}
	public function getId()
	{
		return $this->id;
	}

	public function getProduct_name()
	{
		return $this->product_name;
	}

	public function getProduct_Description()
	{
		return $this->product_description;
	}

	public function getPrice()
	{
		return $this->price;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function getCreatedAt()
	{
		return $this->created_at;
	}
	public function setProduct_name(string $product_name)
	{
		$this->product_name = $product_name;
	}

	public function setDescription(string $product_description)
	{
		$this->product_description = $product_description;
	}

	public function setPrice(string $price)
	{
		$this->price = $price;
	}
	public function setImage(string $image)
	{
		$this->image = $image;
	}

	public function create(int $id)
	{
		return $this;
	}

	public function read(int $id)
	{
		return $this;
	}

	public function update(int $id, array $data)
	{
		return $this;
	}

	public function delete(int $id)
	{
		return $this;
	}
}