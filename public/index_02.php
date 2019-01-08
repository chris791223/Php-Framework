<?php
declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once  '../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', array('name' => 'world')));
$routes->add('bye', new Route('/bye'));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$attributes = $matcher->match($request->getPathInfo());

extract($attributes, EXTR_SKIP);
print_r($_route);
print_r($name);























