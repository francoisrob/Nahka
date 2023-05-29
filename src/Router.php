<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        $matcher = new UrlMatcher($routes, $context);
        try {
            $arrayUri = explode('?', $_SERVER['REQUEST_URI']);
            $matcher = $matcher->match($arrayUri[0]);

            array_walk($matcher, function (&$param) {
                if (is_numeric($param)) {
                    $param = (int) $param;
                }
            });

            $className = '\\App\\Controllers\\' . $matcher['controller'];
            $classInstance = new $className();

            $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));

            call_user_func_array(array($classInstance, $matcher['method']), $params);

        } catch (MethodNotAllowedException $e) {
            require_once __DIR__ . '/Views/405.php';
        } catch (ResourceNotFoundException $e) {
            require_once __DIR__ . '/Views/404.php';
        }
    }
}

$router = new Router();
$router($routes);