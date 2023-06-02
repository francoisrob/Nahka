<?php

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	public function indexAction(RouteCollection $routes)
	{
		require_once __DIR__ . '/../Views/home.php';
	}
	public function cartAction(RouteCollection $routes)
	{
		$this->NeedLogin();
		require_once __DIR__ . '/../Views/cart.php';
	}
	public function registerAction(RouteCollection $routes)
	{
		$user = new \App\Models\User();
		require_once __DIR__ . '/../Views/Auth/register.php';
	}
	public function loginAction(RouteCollection $routes)
	{
		$user = new \App\Models\User();
		require_once __DIR__ . '/../Views/Auth/login.php';
	}
	public function productAction(int $id, RouteCollection $routes)
	{
		$this->NeedLogin();
		$product = new Product($id);
		if (!$product->getId()) {
			header('Location: ' . constant('URL_SUBFOLDER') . '/');
			exit();
		}
		require_once __DIR__ . '/../Views/product.php';
	}
	public function logoutAction(RouteCollection $routes)
	{
		session_destroy();
		header('Location: ' . constant('URL_SUBFOLDER') . '/');
	}

	public function NeedLogin()
	{
		if (!$_SESSION['user']) {
			header('Location: /login');
			exit();
		}
	}
	public function addToCart()
	{
		// $productId = $_POST['productId'];
		// $user = $_SESSION['user'];
		// $db = new \App\Models\Database();
		// $db->query('SELECT cart FROM users WHERE id = :id');
		// $db->bind(':id', $user);
		// $result = $db->single();
		// $cart = $result['cart'];
		// $cart = unserialize($cart);
		// $cart[] = $productId;
		// $cart = serialize($cart);
		// $db->query('UPDATE users SET cart = :cart WHERE id = :id');
		// $db->bind(':cart', $cart);
		// $db->bind(':id', $user);
		// $db->execute();
		echo json_encode(array('status' => 'success'));
		http_response_code(200);
	}

}