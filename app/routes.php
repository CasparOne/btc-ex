<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.html', $args);

});

$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'login.html', $args);
});
