<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('homepage', new Route('/', array('controller' => 'PageController', 'method' => 'indexAction')));
$routes->add('product', new Route('/product/{id}', array('controller' => 'PageController', 'method' => 'productAction'), array('id' => '[0-9]+')));
$routes->add('cart', new Route('/cart', array('controller' => 'PageController', 'method' => 'cartAction')));

$routes->add('login', new Route('/login', array('controller' => 'PageController', 'method' => 'loginAction', )));
$routes->add('register', new Route('/register', array('controller' => 'PageController', 'method' => 'registerAction')));
$routes->add('logout', new Route('/logout', array('controller' => 'PageController', 'method' => 'logoutAction')));

$routes->add('cartAdd', new Route('/cart/add', array('controller' => 'PageController', 'method' => 'addToCart')));
$routes->add('cartClear', new Route('/cart/clear', array('controller' => 'PageController', 'method' => 'clearCart')));
$routes->add('Checkout', new Route('/cart/checkout', array('controller' => 'PageController', 'method' => 'sendMail')));