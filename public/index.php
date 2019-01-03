<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$request = Request::createFromGlobals();
$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', array('name' => 'world')));
$routes->add('bye', new Route('/bye'));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$attributes = $matcher->match($request->getPathInfo());

print_r($attributes);























