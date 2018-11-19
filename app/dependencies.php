<?php


// DIC configuration
$container = $app->getContainer();

$container->register(new \Core\Services\EloquentServiceProvider()); // Plug in eloquent database provider
$container->register(new \Core\Services\PhpViewServiceProvider()); // Plug in PhpView renderer

