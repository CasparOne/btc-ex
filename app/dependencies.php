<?php


// DIC configuration
$container = $app->getContainer();

$container->register(new \App\Services\EloquentServiceProvider()); // Plug in eloquent database provider
$container->register(new \App\Services\PhpViewServiceProvider()); // Plug in PhpView renderer

