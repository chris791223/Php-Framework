<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




$input = isset($_GET['name']) ? $_GET['name'] : 'world';

$request = Request::createFromGlobals();
$response = new Response();
