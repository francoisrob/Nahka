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
		$products = $product->getProducts();

		include_once "../src/Views/Partials/header.php";
		include_once "../src/Views/Partials/navbar.php";
		include_once __DIR__ . '/../Views/home.php';
		include_once "../src/Views/Partials/footer.php";

	}
	public function cartAction(RouteCollection $routes)
	{
		$this->NeedLogin();
		$CartClass = new Cart();
		$product = new Product();
		$cart = $CartClass->getCart(unserialize($_SESSION['user']));

		include_once "../src/Views/Partials/header.php";
		include_once "../src/Views/Partials/navbar.php";
		include_once __DIR__ . '/../Views/cart.php';
		include_once "../src/Views/Partials/footer.php";

	}
	public function registerAction(RouteCollection $routes)
	{
		$user = new User();

		include_once "../src/Views/Partials/header.php";
		include_once "../src/Views/Partials/navbar.php";
		include_once __DIR__ . '/../Views/Auth/register.php';
		include_once "../src/Views/Partials/footer.php";

	}
	public function loginAction(RouteCollection $routes)
	{
		$user = new User();

		include_once "../src/Views/Partials/header.php";
		include_once "../src/Views/Partials/navbar.php";
		include_once __DIR__ . '/../Views/Auth/login.php';
		include_once "../src/Views/Partials/footer.php";

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
		include_once "../src/Views/Partials/header.php";
		include_once "../src/Views/Partials/navbar.php";
		include_once __DIR__ . '/../Views/product.php';
		include_once "../src/Views/Partials/footer.php";
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
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = SMTP_HOST;
			$mail->SMTPAuth = true;
			$mail->Username = SMTP_USERNAME;
			$mail->Password = SMTP_PASSWORD;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = SMTP_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
			$mail->addAddress('joe@example.net', 'Joe User');
			// $mail->addAddress('ellen@example.com');
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			http_response_code(200);
			// echo json_encode(array('status' => 'success'));
		} catch (Exception $e) {
			http_response_code(500);
			error_log($mail->ErrorInfo);
			return false;
			// echo json_encode(array('status' => 'error', 'message' => $mail->ErrorInfo));
		}
	}
}