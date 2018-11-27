<?php

namespace App\Services;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Views\PhpRenderer;

class PhpViewServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $container)
    {
        // Get path to templates
        $path = $container['settings']['renderer']['template_path'];

        $container['renderer'] = function ($container) use ($path) {
            return new PhpRenderer($path);
        };
    }
}