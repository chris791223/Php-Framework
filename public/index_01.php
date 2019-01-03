<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


require_once  '../vendor/autoload.php';

$request = Request::createFromGlobals();

$map = array(
    '/hello' =>  'hello',
    '/bye' => 'bye',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    include sprintf('../src/pages/%s.php',$map[$path]);
    $response = new Response(ob_get_clean());
} else {
    $response = new Response('NOT FOUND', 404);
//    $response->setStatusCode(404);
//    $response->setContent('Not Fount');
}

$response->send();