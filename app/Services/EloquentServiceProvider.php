<?php

namespace App\Services;


use Illuminate\Database\Capsule\Manager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class EloquentServiceProvider
 * @package Core\Services
 */
class EloquentServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $container A container instance
     */
    public function register(Container $container)
    {
        $congigArray = $container['settings']['database'];
        $capsule = new Manager();

        foreach ($congigArray as $nameCfg => $params) {
            $capsule->addConnection($params, $nameCfg);
        }
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $container['eloquent'] = function ($container) use ($capsule) {
            return $capsule;
        };
    }

}
