<?php
/**
 * TODO: Реализовать загрузку конфига без ручного определения бд
 *
 */
return [
    'btc_ex' => [
        'driver' => getenv('DB_DRIVER'),
        'host' => getenv('DB_HOST'),
        'database' => getenv('DB_DATABASE2'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'port' => getenv('DB_PORT'),
        'charset' => getenv('DB_CHARSET'),
        'collation' => getenv('DB_COLLATION'),
        'prefix' => getenv('DB_PREFIX'),
    ],
];