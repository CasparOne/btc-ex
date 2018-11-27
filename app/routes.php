<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get('/', function (Request $request, Response $response, array $args) {
    //echo rand(100000000, time());
    $faker = \Faker\Factory::create();

    $a = new \App\Models\User();
    //$a->createUser($faker->userName, '123', $faker->email, $faker->lastName);

    //var_dump(\App\Models\Transaction::createTransaction(5744602452, rand(-999.99, 999.99)));

    return $this->renderer->render($response, 'index.html', $args);

});

$app->get('/login', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response,'login.html', $args);
});
