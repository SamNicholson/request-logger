<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$app = new \Slim\App();

/**
 * Very simply logs this request, if a GET of a POST
 *
 * @var $request \Slim\Http\Request
 * @var $response \Slim\Http\Response
 */
$app->get('/[{path:.*}]', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $arguments = []) {
    $logger = new \SNicholson\RequestLogger\RequestLogger($request, $response);
    return $response->withJSON($logger->log());
});


// Run!
$app->run();