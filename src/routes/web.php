<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route('/', array('controller' => 'PageController', 'method' => 'indexAction')));
$routes->add('product', new Route('/product/{id}', array('controller' => 'PageController', 'method' => 'productAction'), array('id' => '[0-9]+')));
$routes->add('cart', new Route('/cart', array('controller' => 'PageController', 'method' => 'cartAction'), array()));


//Auth routes
$routes->add('login', new Route('/login', array('controller' => 'PageController', 'method' => 'loginAction', ), array()));
$routes->add('register', new Route('/register', array('controller' => 'PageController', 'method' => 'registerAction'), array()));
$routes->add('logout', new Route('/logout', array('controller' => 'PageController', 'method' => 'logoutAction'), array()));