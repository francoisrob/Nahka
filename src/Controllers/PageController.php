<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Symfony\Component\Routing\RouteCollection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PageController
{
	public function indexAction(RouteCollection $routes)
	{
		$product = new Product();
		$featuredProducts = [7, 10, 12, 4];
		$featuredProducts = $product->getFeaturedProducts($featuredProducts);
		$products = $product->getProducts();
		require_once "../src/Views/Partials/header.php";
		require_once "../src/Views/Partials/navbar.php";
		require_once __DIR__ . '/../Views/home.php';
		require_once "../src/Views/Partials/footer.php";

	}
	public function cartAction(RouteCollection $routes)
	{
		$this->NeedLogin();
		$CartClass = new Cart();
		$product = new Product();
		$cart = $CartClass->getCart(unserialize($_SESSION['user']));
		$cartItems = $product->getProductsByIds(array_column($cart, 'product_id'));
		require_once "../src/Views/Partials/header.php";
		require_once "../src/Views/Partials/navbar.php";
		require_once __DIR__ . '/../Views/cart.php';
		require_once "../src/Views/Partials/footer.php";

	}
	public function registerAction(RouteCollection $routes)
	{
		$user = new User();
		require_once "../src/Views/Partials/header.php";
		require_once "../src/Views/Partials/navbar.php";
		require_once __DIR__ . '/../Views/Auth/register.php';
		require_once "../src/Views/Partials/footer.php";

	}
	public function loginAction(RouteCollection $routes)
	{
		$user = new User();
		require_once "../src/Views/Partials/header.php";
		require_once "../src/Views/Partials/navbar.php";
		require_once __DIR__ . '/../Views/Auth/login.php';
		require_once "../src/Views/Partials/footer.php";

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
		require_once "../src/Views/Partials/header.php";
		require_once "../src/Views/Partials/navbar.php";
		require_once __DIR__ . '/../Views/product.php';
		require_once "../src/Views/Partials/footer.php";
	}
	public function logoutAction(RouteCollection $routes)
	{
		session_destroy();
		header('Location: ' . constant('URL_SUBFOLDER') . '/');
	}

	public function NeedLogin()
	{
		if (!unserialize($_SESSION['user'])) {
			header('Location: /login');
			exit();
		}
	}
	public function addToCart(RouteCollection $routes)
	{
		$userid = unserialize($_SESSION['user']);
		$productid = $_POST['productId'];
		$amount = $_POST['amount'];
		$cart = new Cart();
		$cart->addToCart($userid, $productid, $amount);
		http_response_code(200);
		echo json_encode(array('status' => 'success'));
	}
	public function clearCart(RouteCollection $routes)
	{
		$userid = unserialize($_SESSION['user']);
		$cart = new Cart();
		$cart->clearCart($userid);
		http_response_code(200);
		echo json_encode(array('status' => 'success'));
	}

	public function sendMail(RouteCollection $routes)
	{
		$mail = new PHPMailer(true);
		try {
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->SMTPAuth = true;
			$mail->Username = SMTP_USERNAME;
			$mail->Password = SMTP_PASSWORD;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = SMTP_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			$mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
			$mail->addAddress('joe@example.net', 'Joe User');
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			http_response_code(200);
		} catch (Exception $e) {
			http_response_code(500);
			error_log($mail->ErrorInfo);
			return false;
		}
	}
}