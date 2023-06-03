<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	public function indexAction(RouteCollection $routes)
	{
		$product = new Product();
		$products = $product->getProducts();
		require_once __DIR__ . '/../Views/home.php';
	}
	public function cartAction(RouteCollection $routes)
	{
		$this->NeedLogin();
		$cart = new Cart();
		$product = new Product();
		$cart = $cart->getCart(unserialize($_SESSION['user']));
		require_once __DIR__ . '/../Views/cart.php';
	}
	public function registerAction(RouteCollection $routes)
	{
		$user = new User();
		require_once __DIR__ . '/../Views/Auth/register.php';
	}
	public function loginAction(RouteCollection $routes)
	{
		$user = new User();
		require_once __DIR__ . '/../Views/Auth/login.php';
	}
	public function productAction(int $id, RouteCollection $routes)
	{
		$this->NeedLogin();
		$product = new Product();
		$product = $product->getProduct($id);

		if (!$product) {
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
	public function addToCart(RouteCollection $routes)
	{
		$userid = unserialize($_SESSION['user']);
		$productid = (int) $_POST['productId'];
		$cart = new Cart();
		$cart->addToCart($userid, $productid, 1);
		if ($_SESSION['error']) {
			http_response_code(400);
			echo json_encode(array('status' => 'error', 'message' => $_SESSION['error']));
			unset($_SESSION['error']);
			exit();
		}
		http_response_code(200);
		echo json_encode(array('status' => 'success'));
	}

}