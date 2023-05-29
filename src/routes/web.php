<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('homepage', new Route(URL_SUBFOLDER . '/', array('controller' => 'PageController', 'method' => 'indexAction'), array()));
$routes->add('product', new Route(URL_SUBFOLDER . '/product/{id}', array('controller' => 'PageController', 'method' => 'productAction'), array('id' => '[0-9]+')));
$routes->add('cart', new Route(URL_SUBFOLDER . '/cart', array('controller' => 'PageController', 'method' => 'cartAction'), array()));

//Auth routes
$routes->add('login', new Route(URL_SUBFOLDER . '/login', array('controller' => 'PageController', 'method' => 'loginAction', ), array()));
$routes->add('register', new Route(URL_SUBFOLDER . '/register', array('controller' => 'PageController', 'method' => 'registerAction'), array()));
$routes->add('logout', new Route(URL_SUBFOLDER . '/logout', array('controller' => 'PageController', 'method' => 'logoutAction'), array()));