<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

function is_leap_year($year = null){
    if ($year === null){
        $year = date('Y');
    }

    return $year % 400 === 0 || ($year % 4 === 0 && $year % 100 !== 0);
}

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', array(
    'name' => 'world',
    '_controller' => 'render_template'
)));
$routes->add('bye', new Route('/bye', array(
    '_controller' => 'render_template'
)));

$routes->add('leap_year', new Route('/is_leap_year/{year}', array(
    'year' =>null,
    '_controller' => function (Request $request) {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year');
    }
)));

return $routes;





















