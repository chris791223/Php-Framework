<?php
declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require_once '../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = include '../src/app.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    include sprintf('../src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
} catch (ResourceNotFoundException $rne) {
    $response = new Response('Not Found',404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

//$generator = new UrlGenerator($routes, $context);
//echo $generator->generate(
//    'hello',
//    array('name' => 'Fabien'),
//    UrlGeneratorInterface::ABSOLUTE_URL);
$response->send();
























