<?php

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	public function indexAction(RouteCollection $routes)
	{
		$routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());

		require_once __DIR__ . '/../Views/home.php';
	}
	public function cartAction(int $id, RouteCollection $routes)
	{
		
		require_once __DIR__ . '/../Views/cart.php';
	}
	public function registerAction(RouteCollection $routes)
	{
		require_once __DIR__ . '/../Views/Auth/register.php';
	}
	public function loginAction(RouteCollection $routes)
	{
		require_once __DIR__ . '/../Views/Auth/login.php';
	}
	public function productAction(int $id, RouteCollection $routes)
	{
		$product = new Product($id);

		require_once __DIR__ . '/../Views/product.php';
	}
	public function logoutAction(RouteCollection $routes)
	{
		session_destroy();
		header('Location: ' . constant('URL_SUBFOLDER') . '/');
	}

}