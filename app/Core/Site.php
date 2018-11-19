<?php

namespace Core;


use Slim\App;

/**
 * Class Site
 * @package Core
 * implements Singleton
 */
class Site extends App
{
    public static $instance;

    /**
     * @param $config
     * @return mixed
     */
    public static function getInstance($config) : Site
    {
        if (!static::$instance instanceof self) {
            static::$instance = new self($config);
        }

        return static::$instance;

    }

    private function __construct($container = [])
    {
        parent::__construct($container);
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

}
