<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

use Simplex\ContentLengthListener;
use Simplex\GoogleListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$request = Request::createFromGlobals();
$routes = include '../src/app.php';

$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$dispatcher= new EventDispatcher();

/**
 * using listener
 */
//$dispatcher->addListener('response', array(new Simplex\ContentLengthListener(), 'onListener');
//$dispatcher->addListener('response', new Simplex\GoogleListener());


/**
 * using subscriber
 */
$googleSubscriber = new GoogleListener();
$contentLengthSubscriber = new ContentLengthListener();
$dispatcher->addSubscriber($googleSubscriber);
$dispatcher->addSubscriber($contentLengthSubscriber);

$framework = new Simplex\Framework($dispatcher, $matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();

























